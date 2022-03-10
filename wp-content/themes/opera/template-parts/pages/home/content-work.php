<?php
$work = get_field('work');
$work_no = 1;
if ($work) {
    foreach ($work as $val) {
        ?>
        <section class="work-sec scrollify-sec">
            <?php
            $bg_img = $val['bg-img'];
            $work_data = $val['work_data'];
            if ($bg_img) { ?>
                <img class="work-bg" src="<?php echo $bg_img['url'];?>" alt="<?php echo $bg_img['alt'];?>">
            <?php }
            if ($work_data) { ?>
                <div class="wrapper">
                    <p class="sub-work-title"><?php echo $work_no++; ?>. work:</p>
                    <?php echo $work_data; ?>
                </div>
            <?php } ?>
        </section>
        <?php
    }
}