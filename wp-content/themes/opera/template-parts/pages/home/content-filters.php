<?php
$tool_cat = get_categories(array('taxonomy' => 'tool-cat','hide_empty' => false,));
?>
<div>
    <ul class="filter-btns">
        <li>
            <button class="btn tool_cat_btn" data-atr="">All</button>
        </li>
        <?php 
            if ($tool_cat) {
                foreach($tool_cat as $val){
                    if ($val->parent == 0) {
                        ?>
                            <li>
                                <button class="btn tool_cat_btn" data-atr="<?php echo $val->term_id; ?>"><?php echo $val->name; ?></button>
                            </li>
                        <?php
                    }
                }
            }
        ?>
    </ul>
    <div class="filter-data">
        <p>Loading..</p>
    </div>
</div>