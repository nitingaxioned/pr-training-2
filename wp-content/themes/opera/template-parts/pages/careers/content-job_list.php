<?php
$job_typ = get_categories(array('taxonomy' => 'job_typ','hide_empty' => true,));
$queryArr = array(
    'posts_per_page' => -1,
    'post_type' => 'job',
    'post_status' => array('publish'),
);
$res = new wp_Query($queryArr);
?>
<div>
    <ul class="careers-list"><?php 
        if ($res->found_posts < 1) {
            ?>
            <li><p>No More Tools :(</p></li>
            <?php
        }
        while ( $res->have_posts() ){ 
            $res->the_post(); 
            $title = get_the_title();
            $disc = get_disc_50(get_field('your_role'));
            $current_post_id = get_the_ID();
            $link_url = get_permalink($current_post_id);
            $type = get_the_terms( $current_post_id , "job-typ");
            $class_list = "job-card";
            foreach($type as $val) {
                if ( $val->slug ) {
                    $class_list .= " ".$val->slug;
                } 
            }?>
            <li class="<?php echo $class_list ?>">
                <?php
                if ( $title ) { ?>
                    <h3><?php echo $title ?></h3>
                <?php }
                if ( $disc ) { ?>
                    <div><?php echo $disc; ?></div>
                <?php } ?>
                <a href="<?php echo $link_url; ?>">VIEW DETAILS</a>
            </li><?php
        }?>
    </ul>
</div>