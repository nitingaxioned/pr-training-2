<h3>slick sliders</h3>
<?php
$queryArr = array(
    'posts_per_page' => -1,
    'post_type' => 'tool',
    'post_status' => array('publish'),
);
$res = new wp_Query($queryArr);
?>
<ul class="slick-slide-1"> <?php 
        if ($res->found_posts < 1) {
            ?>
            <li><p>No More Tools :(</p></li>
            <?php
        }
        while ( $res->have_posts() ) { 
            $res->the_post(); 
            $current_post_id = get_the_ID();
            $logo = get_field('tool_logo');
            $link = get_field('tool_link');
            $cats = get_the_terms( $current_post_id , "tool-cat");
            $title = get_the_title();
            $class_list = "tool";
            foreach($cats as $val) {
                if ( $val->slug ) {
                    $class_list .= " ".$val->slug;
                } 
            }
            ?>
            <li class="<?php echo $class_list ?>">
                <?php
                if ( $logo ) { ?>
                    <img src='<?php echo $logo['url']; ?>' alt='<?php echo $logo['alt']; ?>'>
                <?php }
                if ( $title && $link) {
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo $title;?></a>
                    <?php
                } ?>
            </li>
            <?php
        }?>
    </ul>