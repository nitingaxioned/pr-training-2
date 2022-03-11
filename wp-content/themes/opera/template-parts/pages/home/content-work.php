<?php
$work = get_field('work_post');
$work_no = 1;
if ($work) {
    foreach ($work as $val) {
        if($val->post_status == "publish") {
            $current_post_id = $val->ID;
			if (has_post_thumbnail($current_post_id)) {
				$img_url = get_the_post_thumbnail_url($current_post_id);
				$alt = get_post_meta( get_post_thumbnail_id($current_post_id), '_wp_attachment_image_alt', true);
			}
            $work_data = $val->post_content;
            ?>
            <section class="work-sec scrollify-sec">
                <?php
                if ($img_url) { ?>
                    <img class="work-bg" src="<?php echo $img_url;?>" alt="<?php echo $alt;?>">
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
}