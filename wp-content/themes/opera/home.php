<?php 
/**
* Template Name: Home
*/
$work = get_field('work');
get_header();
?>
<!--main section start-->
<main class="home">
  <?php 
  get_template_part('template-parts/pages/home/content', 'banner');
  if ($work) {
    get_template_part('template-parts/pages/home/content', 'work');
  } ?>
</main>
<!--main section end-->
<?php
get_footer(); 