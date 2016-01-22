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
            navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>'],
            startPosition: startMonthCarousel - 2
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

            if($("#owl-carousel-calendar-popup").length > 0) {
                $("#owl-carousel-calendar-popup").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>'],
                    startPosition: startMonthCarouselPopup - 2
                });
            }

            $(".close-btn").on("click", function(){
                $(".popup").fadeOut("fast", function(){
                    $("body").removeClass("popup-open");
                });
            });
        });
    });

    $(".popup-pagination li").on("click", function(){
        var _this = $(this);
        var categoryLoader = $(this).data("slug");

        $('.popup .box-slider').html('<p class="ajaxLoading">Loading...</p>');
        var data = {
            'action': 'loadpostpopup',
            'categoryLoader': categoryLoader
        };
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function (data) {
                $(".popup-pagination li").removeClass("active");
                _this.addClass("active");

                if (data) {
                    var posts = jQuery.parseJSON(data);
                    var carousel = '<div class="owl-carousel" id="owl-carousel-calendar-popup">';

                    jQuery.each(posts, function(i, v){
                        var active = i == 0 ? 'active' : '';
                        carousel += '<a href="'+ v.link +'" class="slide ' + active + '"><p>'+ v.title +' <span>'+ v.category +'</span></p></a>';
                    });
                    carousel += '</div>';

                    $('.ajaxLoading').remove();
                    $('.popup .box-slider').append(carousel);
                    $("#owl-carousel-calendar-popup").owlCarousel({
                        items: 4,
                        loop: true,
                        nav: true,
                        navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>']
                    });
                }
            }
        });
    });

} )( jQuery );

function redirectLink(link) {
    window.location.href = link;
}