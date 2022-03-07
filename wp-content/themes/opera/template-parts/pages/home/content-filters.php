<?php
$tool_cat = get_categories(array('taxonomy' => 'tool-cat','hide_empty' => false,));
?>
<div>
    <ul class="filter-btns">
        <li>
            <button class="btn tool_btn tool_prt_cats" data-atr="">All</button>
        </li>
        <?php 
            if ($tool_cat) {
                foreach($tool_cat as $val){
                    if ($val->parent == 0) {
                        ?>
                            <li>
                                <button class="btn tool_btn tool_prt_cats" data-atr="<?php echo $val->term_id; ?>"><?php echo $val->name; ?></button>
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
                                <button class="btn tool_btn tool_sub_cats" data-atr="<?php echo $val->term_id; ?>" data-prt="<?php echo $val->parent; ?>"><?php echo $val->name; ?></button>
                            </li>
                        <?php
                    }
                }
            }
        ?>
    </ul>
    <ul class="filter-items">
        <li><p>Loading..</p></li>
    </ul>
</div>