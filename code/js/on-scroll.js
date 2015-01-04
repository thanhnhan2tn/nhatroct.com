// srolling menu
// - your scrollFix  
$.fn.onScrollFix = function(lrpaddingsum) {
    var onTop = $(this).offset().top; // Khi dang keo len dau
    var self = this;
    $(window).resize(function() {
        $(self).width($(self).parent().width() - lrpaddingsum);
    });
    window.onscroll = function() { // khi sroll xuống
        return self.each(function() {
            var w = $(this).parent().width();
            if (w > 760) {

                var scTop = ($(window).scrollTop());
                if (parseInt(onTop) - parseInt(scTop) < 0) {
                    $(self).css({
                        "position": "fixed",
                        "zIndex": "1",
                        "top": "0",
                        "left": "0",
                        "width": "100%"
                    });
                    //$(this).addClass('navbar-fixed-top');
                    // $(this).addClass('navbar-static-top');
                    $(".login-box").removeClass("hide");
                    //  $(".navi").removeClass("hide");
                } else if (parseInt(scTop) <= parseInt(onTop)) {
                    $(self).css({
                        "position": "relative",
                        "top": "0px"
                    });
                    //$(this).removeClass('navbar-fixed-top');
                    //  $(this).removeClass('navbar-static-top');
                    $(".login-box").addClass("hide");
                    // $(".navi").addClass("hide");
                } else {
                    $("nav").removeAttr('style');
                    $(".login-box").addClass("hide");
                    // $(".navi").addClass("hide");
                }

            } else if (w > 680) {
                $("nav").removeAttr("style");
                $(".login-box").addClass("hide");
                //$(".navi").addClass("hide");
            } else {
                // $(".navi").removeClass("hide");

            }

        });
    }

}
// - jQuery ready  
$(function() {
    //$(".navi").addClass("hide");
    $("nav").onScrollFix(0);
    var width = $("body").width();
    if (width < 990) {
        $("nav").removeAttr("style");
        $(".login-box").addClass("hide");
        //$(".navi").addClass("hide");
    } else {
        // $(".navi").addClass("hide");
        $(".login-box").addClass("hide");
    }

});