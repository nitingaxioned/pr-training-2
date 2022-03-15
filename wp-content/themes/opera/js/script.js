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

function filtersubtools(data_atrbute) {
    jQuery('.filter-items').html("<li><p>Loading....</p></li>");
    ajax_status = true;
    jQuery.ajax({
        url : ajax_object.ajax_url,
        data : {
            action : ajax_object.sub_hook,
            data_atr : data_atrbute,
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
    // click functionality for iso btn
    jQuery(".iso-btn").click(function() {
        let data_iso = $(this).attr("data-iso");
        $('.filter-items-isotop').isotope({
            filter : data_iso,
        });
    });

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

    // filteration with jquery
    // jQuery(".iso-btn").click(function() {
    //     let data_iso = $(this).attr("data-iso");
    //     data_iso = data_iso.substring(1, data_iso.length);
    //     $('.tool').each(function() {
    //         if($(this).hasClass(data_iso)) {
    //             $(this).removeClass("hide-me");
    //         } else  {
    //             $(this).addClass("hide-me");
    //         }
    //     });
    // });

    // isotop fot job filter
    jQuery(".type").on('change',function() {
        let data_iso = this.value;
        $('.careers-list').isotope({
            filter : data_iso,
        });
        console.log("dd");
    });
});

$(document).ready(function(){
    // slick slide
    $(".slick-slide-1").slick({
        dots: false,
        infinite: true,
        speed: 50,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 100,
        arrows: true,
        responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 400,
           settings: {
              arrows: false,
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }]
    });

    // for scroll effect on nav
    $(window).scroll(function() {
		let b = $(".nav-list");
        let windowpos = $(window).scrollTop();
        let pos = b.position(); 
        if (windowpos > pos.top) {
            b.addClass("padding-scroll");
        } else {
            b.removeClass("padding-scroll");
        }
	});

    // for nav click
    $("header .nav-list ul").click(function() {
        $(this).toggleClass("show-hidden");
    });

    // scrollyfy
    $.scrollify({
        // section : ".scrollify-sec",
    });

    // for click slide 
    setslide();

    $(window).resize(function(){
        setslide();
    });

    
});

// for click slide 
function  setslide() {
    let slide = $(".slide-titles li").length;
    let x = 100/slide;

    if ($(window).width() > 995) {
        $(".slide-progress-bar span").css("height", x+'%');
        $(".slide-progress-bar span").css("width", '100%');

        $(".slide-titles li").click(function() {
            let i = $(this).index();
            $(".slide-imgs").css("transform", "translateX(-"+100*i+"%)");
            $(".slide-progress-bar span").css("height", x*(i+1)+'%');
        });
    } else {
        $(".slide-progress-bar span").css("width", x+'%');
        $(".slide-progress-bar span").css("height", '100%');
        let i = 0;
        $(".nxt").click(function() {
            if (i < slide-1) {
                i++;
                $(".slide-imgs").css("transform", "translateX(-"+100*i+"%)");
                $(".slide-titles li").css("transform", "translateX(-"+100*i+"%)");
                $(".slide-progress-bar span").css("width", x*(i+1)+'%');
            }
        });

        $(".prv").click(function() {
            if (i > 0) {
                i--;
                $(".slide-imgs").css("transform", "translateX(-"+100*i+"%)");
                $(".slide-titles li").css("transform", "translateX(-"+100*i+"%)");
                $(".slide-progress-bar span").css("width", x*(i+1)+'%');
            }
        });
    }
}