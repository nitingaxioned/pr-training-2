<?php 
get_header();
$tagline = get_field('tagline');
$list_title = get_field('list_title');
?>
<!--main section start-->
<main>
    <div class="wrapper">
        <?php if($tagline) {?>
            <?php get_template_part('template-parts/pages/careers/content', 'banner'); ?>
        <?php } ?>
        <?php if($list_title) {?>
            <div class="job_list">
                <h2><span><?php echo $list_title; ?></span></h2>
                <?php get_template_part('template-parts/pages/careers/content', 'job_list'); ?>
            </div>
        <?php } ?>
    </div>
</main>
<!--main section end-->
<?php
get_footer(); 