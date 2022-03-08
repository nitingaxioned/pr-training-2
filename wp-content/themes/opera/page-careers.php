<?php 
get_header();
$list_title = get_field('title');
?>
<!--main section start-->
<main>
    <div class="wrapper">
        <?php if($list_title) {?>
            <h2><?php echo $title; ?></h2>
            <?php get_template_part('template-parts/pages/careers/content', 'job_list'); ?>
        <?php } ?>
    </div>
</main>
<!--main section end-->
<?php
get_footer(); 