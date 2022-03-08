<h3>filter using isotop jquery</h3>
<?php
$tool_cat = get_categories(array('taxonomy' => 'tool-cat','hide_empty' => true,));
$queryArr = array(
    'posts_per_page' => -1,
    'post_type' => 'tool',
    'post_status' => array('publish'),
);
$res = new wp_Query($queryArr);
?>
<div>
    <ul class="filter-btns">
        <li>
            <a class="btn iso-btn tool_cats" data-atr="" data-iso=".tool">All</a>
        </li>
        <?php 
            if ($tool_cat) {
                foreach($tool_cat as $val){
                    if ($val->parent == 0) {
                        ?>
                            <li>
                                <a class="btn iso-btn tool_cats" data-atr="<?php echo $val->term_id; ?>" data-iso=".<?php echo $val->slug; ?>"><?php echo $val->name; ?></a>
                            </li>
                        <?php
                    }
                }
            }
        ?>
    </ul>
    <ul class="sub-filter-btns">
        <?php 
            if ($tool_cat) {
                foreach($tool_cat as $val){
                    if ($val->parent != 0) {
                        ?>
                            <li class="hide-me">
                                <a class="btn iso-btn tool_sub_cat" data-atr="<?php echo $val->term_id; ?>" data-prt="<?php echo $val->parent; ?>" data-iso=".<?php echo $val->slug; ?>"><?php echo $val->name; ?></a>
                            </li>
                        <?php
                    }
                }
            }
        ?>
    </ul>
    <ul class="filter-items-isotop filter-item"> <?php 
        if ($res->found_posts < 1) {
            ?>
            <li><p>No More Tools :(</p></li>
            <?php
        }
        while ( $res->have_posts() ) { 
            $res->the_post(); 
            $current_post_id = get_the_ID();
            $logo = get_field('tool_logo');
            $link = get_field('tool_link');
            $cats = get_the_terms( $current_post_id , "tool-cat");
            $title = get_the_title();
            $class_list = "tool";
            foreach($cats as $val) {
                if ( $val->slug ) {
                    $class_list .= " ".$val->slug;
                } 
            }
            ?>
            <li class="<?php echo $class_list ?>">
                <?php
                if ( $logo ) { ?>
                    <img src='<?php echo $logo['url']; ?>' alt='<?php echo $logo['alt']; ?>'>
                <?php }
                if ( $title && $link) {
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo $title;?></a>
                    <?php
                } ?>
            </li>
            <?php
        }?>
    </ul>
</div>