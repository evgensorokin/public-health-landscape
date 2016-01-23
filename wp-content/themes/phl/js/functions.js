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
        var startSlide = startMonthCarouselPopup - 2;
        if(_this.closest('li').hasClass('issues')){
            popup = 'issues';
            startSlide = startSeasonCarouselPopup - 2;
        }

        $(".popup." + popup).fadeIn("fast", function(){
            $("body").addClass("popup-open");

            if($(".owl-carousel").length > 0) {
                $(".popup." + popup + " .owl-carousel").owlCarousel({
                    items: 4,
                    loop: true,
                    nav: true,
                    navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>'],
                    startPosition: startSlide
                });
            }

            $(".close-btn").on("click", function(){
                $(".popup").fadeOut("fast", function(){
                    $("body").removeClass("popup-open");
                });
            });
        });
    });

    $(".popup-pagination.calendar li").on("click", function(){
        var _this = $(this);
        var categoryLoader = $(this).data("slug");

        $('.popup.calendar .box-slider').html('<p class="ajaxLoading">Loading...</p>');
        var data = {
            'action': 'loadpostpopupcalendar',
            'categoryLoader': categoryLoader
        };
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function (data) {
                $(".popup-pagination.calendar li").removeClass("active");
                _this.addClass("active");

                if (data) {
                    var posts = jQuery.parseJSON(data);
                    var carousel = '<div class="owl-carousel">';

                    jQuery.each(posts, function(i, v){
                        var active = v.active == true ? 'active' : '';
                        startSlide = v.active == true ? i : 1;
                        if(v.clickable){
                            carousel += '<a href="'+ v.link +'" class="slide ' + active + '"><p>'+ v.title +'<span>'+ v.category +'</span></p></a>';
                        } else {
                            carousel += '<div class="slide"><p>'+ v.title +'<span>'+ v.category +'</span></p></div>';
                        }
                    });
                    carousel += '</div>';

                    $('.ajaxLoading').remove();
                    $('.popup.calendar .box-slider').append(carousel);
                    $(".owl-carousel").owlCarousel({
                        items: 4,
                        loop: true,
                        nav: true,
                        navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>'],
                        startPosition: startSlide - 2
                    });
                }
            }
        });
    });

    $(".popup-pagination.issues li").on("click", function(){
        var _this = $(this);
        var categoryLoader = $(this).data("id");

        $('.popup.issues .box-slider').html('<p class="ajaxLoading">Loading...</p>');
        var data = {
            'action': 'loadpostpopupissues',
            'categoryLoader': categoryLoader
        };
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function (data) {
                $(".popup-pagination.issues li").removeClass("active");
                _this.addClass("active");

                if (data) {
                    var posts = jQuery.parseJSON(data);
                    var carousel = '<div class="owl-carousel">';

                    jQuery.each(posts, function(i, v){
                        var active = v.active == true ? 'active' : '';
                        startSlide = v.active == true ? i : 1;
                        if(v.clickable){
                            carousel += '<a href="'+ v.link +'" class="slide ' + active + '"><p>'+ v.title +'<span>'+ v.category +'</span></p></a>';
                        } else {
                            carousel += '<div class="slide"><p>'+ v.title +'<span>'+ v.category +'</span></p></div>';
                        }
                    });
                    carousel += '</div>';

                    $('.ajaxLoading').remove();
                    $('.popup.issues .box-slider').append(carousel);
                    $(".owl-carousel").owlCarousel({
                        items: 4,
                        loop: true,
                        nav: true,
                        navText: ['<span class="arrow left"></span>', '<span class="arrow right"></span>'],
                        startPosition: startSlide
                    });
                }
            }
        });
    });

} )( jQuery );

function redirectLink(link) {
    window.location.href = link;
}