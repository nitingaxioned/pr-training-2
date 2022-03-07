<?php

###################################
# //Enqueue Theme scripts & style
###################################
add_action( 'wp_enqueue_scripts', 'load_script_css' );
function load_script_css() {
    // for css
	wp_enqueue_style('main_style',get_theme_file_uri('/css/style.css'));

    // for jQuery
	wp_enqueue_script('jquery_mini_cdn','https://code.jquery.com/jquery-3.6.0.min.js');
}


###################################
# // Theme supports 
###################################
// to display thumbnail img
add_theme_support( 'post-thumbnails' );

// to display custom logo
add_theme_support( 'custom-logo', array(
	'header-text' => array('site-tittle', 'site-description'),
	'height' => 50,
	'width' => 200,
    'flex-height'  => true,
    'flex-width' => true,
	)
);

###################################
# // register menues
###################################
register_nav_menus(
    array(
        'primary-menu' => 'header menu',
    )
);

###################################
# // register sidebar
###################################

// register sidebar for footer
add_action( 'widgets_init', 'register_custom_sidebar' );

function register_custom_sidebar(){
 register_sidebar(array(
 'name' => 'Footer widget',
 'id' => 'footer-widget',
 'description' => 'Custom Sidebar for footer',
 'before_title' => '<h4>',
 'after_title' => '</h4>',
 ));
}

###################################
# // Coustom post types tool
###################################

add_action('init', 'custom_post_types');

function custom_post_types() {
	register_post_type('tool', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
          'name' => 'Tool',
          'add_new_item' => 'Add New Tool',
          'edit_item' => 'Edit Tool',
          'all_items' => 'All Tools',
          'singular_name' => 'Tool',
        ),
        'has_archive' => true,
        'publicly_queryable' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-plus-alt',
        'supports' => array('title')
    ));

    //taxonomys for tool
    
	register_taxonomy('tool-cat', 'tool', array(
	  'hierarchical' => true,
	  'labels' => array(
		'name' => _x( 'Tool Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Category', 'taxonomy singular name' ),
		'menu_name' => 'Tool Category'
	  ),
	  'rewrite'       => true, 
	  'query_var'     => true 
	));
}

###################################
# // Ajax Functions
###################################

// Scripts for ajax
add_action( 'wp_enqueue_scripts', 'ajax_script' );
function ajax_script() {
    // for ajax
    wp_enqueue_script( 'ajax-script', get_theme_file_uri('/js/script.js'), array('jquery') );
	wp_localize_script(
        'ajax-script',
        'ajax_object',
        array( 
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'hook' => 'filter',
            'sub_hook' => 'sub_filter',
        )
    );
}

// hooks for filter ajax
add_action( 'wp_ajax_filter', 'filter_ajax' );
add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );

// callback for filter_ajax
function filter_ajax(){
    $data_atr = $_POST['data_atr'];
	$queryArr = array(
		'posts_per_page' => -1,
		'post_type' => 'tool',
        'post_status' => array('publish'),
	);
    if($data_atr != "") {
        $tool_cat = get_categories(array('taxonomy' => 'tool-cat','hide_empty' => false,));
        if ($tool_cat) { ?>
            <ul class="filter-btns">
                <?php
                foreach($tool_cat as $val){
                    if ($val->parent == $data_atr) {
                        ?>
                            <li>
                                <button class="btn tool_sub_cat_btn" data-atr="<?php echo $val->term_id; ?>"><?php echo $val->name; ?></button>
                            </li>
                        <?php
                    }
                }?>
            </ul>
        <?php
        }
        $queryArr['tax_query'] = array(
            array(
                'taxonomy' => 'tool-cat',
                'field' => 'term_id',
                'terms' => $data_atr,
            ),
        );
    }?>
    <ul class="filter-items">
        <?php show_tools($queryArr); ?>
    </ul>
    <?php
    die();
}

// hooks for sub_filter ajax
add_action( 'wp_ajax_sub_filter', 'sub_filter_ajax' );
add_action( 'wp_ajax_nopriv_sub_filter', 'sub_filter_ajax' );

// callback for sub_filter_ajax
function sub_filter_ajax(){
    $data_atr = $_POST['data_atr'];
	$queryArr = array(
		'posts_per_page' => -1,
		'post_type' => 'tool',
        'post_status' => array('publish'),
        'tax_query' => array(
            array(
            'taxonomy' => 'tool-cat',
            'field' => 'term_id',
            'terms' => $data_atr,
            ),
        ),
	);
    show_tools($queryArr);
	die();
}


###################################
# // Custom Functions
###################################

// used to display list of tools
function show_tools($queryArr) {
    $res = new wp_Query($queryArr);
    if ($res->found_posts < 1) {
        ?>
        <li><p>No More Tools :(</p></li>
        <?php
    }
    while ( $res->have_posts() ) { 
        $res->the_post(); 
        $logo = get_field('tool_logo');
        $link = get_field('tool_link');
        ?>
        <li>
        <?php 
        if ( $logo ) {
            if ( $link ) {
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
               ?>
               <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"> 
                <?php 
            } ?>
            <img src='<?php echo $logo['url']; ?>' alt='<?php echo $logo['alt']; ?>'>
            <?php 
            if ( $link ) { ?>
               </a>
            <?php 
            }
        }  
        ?>
        </li>
        <?php
    }
}