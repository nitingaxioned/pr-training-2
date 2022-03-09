<?php
$pg_title = get_the_title();
$bg_img = get_field('bg_banner');
$tagline1 = get_field('tagline');
$tagline2 = get_field('tagline_2');
?>
<div class="job_banner">
    <img class="banner-bg" src="<?php echo $bg_img['url']; ?>" alt="<?php echo $bg_img['alt']; ?>">
    <div class="banner_text">
        <span><?php echo $pg_title; ?></span>
        <h6><?php echo $tagline1; ?></h6>
        <h6><?php echo $tagline2; ?></h6>
    </div>
</div>