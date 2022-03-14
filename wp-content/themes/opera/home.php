<?php 
/**
* Template Name: Home
*/
$work = get_field('work_post');
get_header();
?>
<!--main section start-->
<main class="home">
  <?php 
  get_template_part('template-parts/pages/home/content', 'banner');
  get_template_part('template-parts/pages/home/content', 'click-slide-img');
  if ($work) {
    get_template_part('template-parts/pages/home/content', 'work');
  } ?>
</main>
<!--main section end-->
<?php
get_footer(); 