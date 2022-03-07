<?php 
get_header();
$title = get_the_title();
$content = get_the_content();
if (has_post_thumbnail()) {
    $img_url = get_the_post_thumbnail_url();
    $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
}
$author = get_the_author();
$image = get_field('image');
$link = get_field('specific_link');
?>
<!--main section start-->
<main>
    <div class="wrapper">
        <?php if($title) {?>
            <h2><?php echo $title; ?></h2>
        <?php } ?>
        <?php if($author) {?>
            <p>Author: <?php echo $author; ?></p>
        <?php } ?>
        <?php if ( $img_url ) {?>
            <img src='<?php echo $img_url; ?>' alt='<?php echo $alt; ?>'>
        <?php }  ?>
        <?php if ( $image ) {?>
            <img src='<?php echo $image['url']; ?>' alt='<?php echo $image['alt']; ?>'>
        <?php }  ?>
        <?php if ( $link ) {
             $link_url = $link['url'];
             $link_title = $link['title'];
             $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a>
        <?php }  ?>
        <?php if ( $content ) {?>
            <p><?php echo $content; ?></p>
        <?php } ?>
    </div>
</main>
<!--main section end-->
<?php
get_footer(); 