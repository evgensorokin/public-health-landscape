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

    $("ul.menu li.modal-link a").on("click", function(){
        var _this = $(this);
        var popup = 'calendar';
        if(_this.closest('li').hasClass('issues')){
            popup = 'issues';
        }

        $(".popup." + popup).fadeIn("fast", function(){
            $("body").addClass("popup-open");

            if($("#owl-carousel-popup").length > 0) {
                $("#owl-carousel-popup").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>']
                });
            }

            $(".close-btn").on("click", function(){
                $(".popup").fadeOut("fast", function(){
                    $("body").removeClass("popup-open");
                });
            });
        });
    });

} )( jQuery );