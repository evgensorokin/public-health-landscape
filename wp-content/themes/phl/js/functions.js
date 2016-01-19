/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {

    if($("#owl-carousel").length > 0) {
        $("#owl-carousel").owlCarousel({
            items: 5,
            loop: true,
            nav: true,
            navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>']
        });
    }

    if($(".nicescroll").length > 0) {
        $(".nicescroll").niceScroll({
            cursorcolor: "#AE9E7C"
        });
    }

    if($('select').length > 0) {
        $('select').niceSelect();
    }

    $("[data-modal]").on("click", function(){
        $("body").addClass("popup-open");

        var _this = $(this);
        $("#" + _this.data("modal")).fadeIn("fast", function(){
            if($("#owl-carousel-popup").length > 0) {
                $("#owl-carousel-popup").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>']
                });
            }

            $(".close-btn").on("click", function(){
                $("#" + _this.data("modal")).fadeOut("fast", function(){
                    $("body").removeClass("popup-open");
                });
            });
        });
    });

} )( jQuery );