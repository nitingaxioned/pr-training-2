<?php
$slides = get_field('click_slide');
if ($slides) {
?>
<section class="slide-sec scrollify-sec">
    <div class="wrapper">
        <div class="slides-container">
            <div class="slide-imgs-container">
                <ul class="slide-imgs">
                <?php
                foreach( $slides as $slide ) {
                    $img = $slide['img'];
                    $title = $slide['title'];
                    if ($title && $img) {
                        ?>
                        <li>
                            <img class="slide-img" src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">
                        </li>
                        <?php
                    }
                }?>
                </ul>
            </div>
            <div class="slide-progress-bar"><span>slide progress bar</span></div>
            <div class="slide-titles-container">
                <ul class="slide-titles">
                    <?php
                    foreach( $slides as $slide ) {
                        $img = $slide['img'];
                        $title = $slide['title'];
                        if ($title && $img) {
                            ?>
                            <li>
                                <h3><?php echo $title; ?></h3>
                            </li>
                            <?php
                        }
                    }?>
                </ul>
                <div class="slide-controls">
                    <a href="#FIXME" class="prv"><</a>
                    <a href="#FIXME" class="nxt">></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}