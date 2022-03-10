<?php
$banner = get_field('banner');
if ($banner) {
?>
<section class="banner-home scrollify-sec">
    <?php
    $bg_video = $banner['bg-video'];
    $banner_data = $banner['banner_data'];
    if ($bg_video) { ?>
    <video class="video-bg" preload="none" autoplay loop muted playsinline>
        <source src="<?php echo $bg_video['url']; ?>" type="video/mp4">
    </video>
    <?php }
    if ($banner_data) { ?>
        <div class="banner-data">
            <?php echo $banner_data; ?>
        </div>
    <?php } ?>
</section>
<?php
}