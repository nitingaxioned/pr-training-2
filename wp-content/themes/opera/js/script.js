let ajax_status = false;
let data_atr = "";
jQuery(document).ready(function () {
    // click functionality for tool_cat_btns
    jQuery(".tool_prt_cats").click(function() {
        data_atr = $(this).attr("data-atr");
        jQuery(".tool_sub_cats").each(function( i ) {
            if( $(this).attr("data-prt") == data_atr ) {
                $(this).parent().removeClass("hide-me");
            } else  {
                $(this).parent().addClass("hide-me");
            }
        });
    });
    jQuery(".tool_btn").click(function() {
        if (!ajax_status) {
            data_atr = $(this).attr("data-atr");
            filtersubtools(data_atr);
        }
    });
    filtersubtools("");
});

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

jQuery(document).ready(function () {
    // // click functionality for iso btn
    // jQuery(".iso-btn").click(function() {
    //     let data_iso = $(this).attr("data-iso");
    //     $('.filter-items-isotop').isotope({
    //         itemSelector: data_iso,
    //         layoutMode: 'fitRows'
    //     });
    // });

    // tab filteration
    jQuery(".tool_cats").click(function() {
        let data_atrr = $(this).attr("data-atr");
        jQuery(".tool_sub_cat").each(function( i ) {
            if( $(this).attr("data-prt") == data_atrr ) {
                $(this).parent().removeClass("hide-me");
            } else  {
                $(this).parent().addClass("hide-me");
            }
        });
    });

    //  tab filteration
    jQuery(".iso-btn").click(function() {
        let data_iso = $(this).attr("data-iso");
        data_iso = data_iso.substring(1, data_iso.length);
        $('.tool').each(function() {
            if($(this).hasClass(data_iso)) {
                $(this).removeClass("hide-me");
            } else  {
                $(this).addClass("hide-me");
            }
        });
    });
});