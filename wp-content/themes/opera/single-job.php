<?php 
get_header();
$title = get_the_title();
$job_role = get_field('your_role');
$experience = get_field('experience');
?>
<!--main section start-->
<main>
    <div class="wrapper">
        <?php if($title)  {?>
            <h2><?php echo $title; ?></h2>
        <?php }
        if($job_role) { ?>
            <div>
                <h3>Your Role</h3>
                <?php echo $job_role; ?>
            </div>
        <?php } 
        if($experience) { ?>
            <div>
                <h3>Your Background/Experience</h3>
                <?php echo $experience; ?>
            </div>
        <?php } ?>
        <div class="contact-form">
            <?php echo do_shortcode('[contact-form-7 id="44" title="Contact For Job"]'); ?>
        </div>
    </div>
</main>
<!--main section end-->
<?php
get_footer(); 