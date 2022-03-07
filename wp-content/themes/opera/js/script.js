let ajax_status = false;
jQuery(document).ready(function () {
    // click functionality for tool_cat_btns
    jQuery(".tool_cat_btn").click(function() {
        if (!ajax_status) {
            let data_atr = $(this).attr("data-atr");
            filtertools(data_atr);
        }
    });

    // for defalult values of all tool
    filtertools("");
});

// function to make ajax call
function filtertools(data_atr) {
    jQuery('.filter-data').html("<p>Loading....</p>");
    ajax_status = true;
    jQuery.ajax({
        url : ajax_object.ajax_url,
        data : {
            action : ajax_object.hook,
            data_atr : data_atr,
        },
        type : 'post',
        success : function(data) {
            jQuery('.filter-data').html(data);
            subCatAction();
            ajax_status = false;
        },
        error : function(errorThrown){
            alert(errorThrown);
            jQuery('.filter-data').html("<h5>Something went Wrong.</h5><p>Please try again...</p>");
        }
    });
}

function filtersubtools(data_atr) {
    jQuery('.filter-items').html("<li><p>Loading....</p></li>");
    ajax_status = true;
    jQuery.ajax({
        url : ajax_object.ajax_url,
        data : {
            action : ajax_object.sub_hook,
            data_atr : data_atr,
        },
        type : 'post',
        success : function(data) {
            jQuery('.filter-items').html(data);
            ajax_status = false;
        },
        error : function(errorThrown){
            alert(errorThrown);
            jQuery('.filter-items').html("<li><h5>Something went Wrong.</h5><p>Please try again...</p></li>");
        }
    });
}

function subCatAction() {
    jQuery(".tool_sub_cat_btn").click(function() {
        if (!ajax_status) {
            let data_atr = $(this).attr("data-atr");
            filtersubtools(data_atr);
        }
    });
}