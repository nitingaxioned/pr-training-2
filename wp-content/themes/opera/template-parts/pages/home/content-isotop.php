<h3>filter using isotop</h3>
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
            <button class="btn tool_cats" data-atr="">All</button>
        </li>
        <?php 
            if ($tool_cat) {
                foreach($tool_cat as $val){
                    if ($val->parent == 0) {
                        ?>
                            <li>
                                <button class="btn tool_cats" data-atr="<?php echo $val->term_id; ?>"><?php echo $val->name; ?></button>
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
                                <button class="btn tool_sub_cats" data-atr="<?php echo $val->term_id; ?>" data-prt="<?php echo $val->parent; ?>"><?php echo $val->name; ?></button>
                            </li>
                        <?php
                    }
                }
            }
        ?>
    </ul>
    <ul> <?php 
        if ($res->found_posts < 1) {
            ?>
            <li><p>No More Tools :(</p></li>
            <?php
        }
        while ( $res->have_posts() ) { 
            $res->the_post(); 
            $logo = get_field('tool_logo');
            $link = get_field('tool_link');
            ?>
            <pre>
            <?php print_r($res); ?>
            <li>
            
            </li>
            <?php
        }?>
    </ul>
</div>