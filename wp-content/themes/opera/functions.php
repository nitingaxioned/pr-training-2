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