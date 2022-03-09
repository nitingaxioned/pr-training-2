<?php 
/**
* Template Name: Home
*/
get_header();
$title = get_field('title');
$disc = get_field('description');
$filters_title = get_field('filters_title');
?>
<!--main section start-->
<main>
    <div class="wrapper">
      <?php if($title) {?>
        <h2><?php echo $title; ?></h2>
      <?php } ?>
      <?php if($disc) {?>
        <p><?php echo $disc; ?></p>
      <?php } ?>
      <?php if($filters_title) {?>
        <h3><?php echo $filters_title; ?></h3>
        <?php get_template_part('template-parts/pages/home/content', 'filters'); ?>
      <?php } ?>
      <?php get_template_part('template-parts/pages/home/content', 'isotop'); ?>
      <?php get_template_part('template-parts/pages/home/content', 'slick'); ?>
    </div>
</main>
<!--main section end-->
<?php
get_footer(); 