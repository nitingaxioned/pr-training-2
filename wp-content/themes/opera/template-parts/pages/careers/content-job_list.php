<?php
$job_typ = get_categories(array('taxonomy' => 'job-typ','hide_empty' => true,));
$mail = get_field('email');
$queryArr = array(
    'posts_per_page' => -1,
    'post_type' => 'job',
    'post_status' => array('publish'),
);
$res = new wp_Query($queryArr);
?>
    <select name="type" class='type'>
        <option value="*">Show All</option>
        <?php
        if ($job_typ) {
            foreach($job_typ as $val){ ?>
                    <option value="<?php echo ".".$val->slug;?>"><?php echo $val->name;?></option>
            <?php }
        }
        ?>
    </select>
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
                <a href="<?php echo $link_url; ?>">
                <?php
                if ( $title ) { ?>
                    <h3><?php echo $title ?></h3>
                <?php }
                if ( $disc ) { ?>
                    <div><?php echo $disc; ?></div>
                <?php } ?>
                <span>VIEW DETAILS</span>
                </a>
            </li><?php
        }?>
    </ul>
<div class="career-mail">
    <p>Can’t find what you’re looking for?</p>
    <a href="mailto:<?php echo $mail;?>">
    <img src="https://axioned.com/wp-content/webp-express/webp-images/uploads/2021/04/email-500x500-1.png.webp" alt="mail">
    <?php echo $mail;?></a>
</div>