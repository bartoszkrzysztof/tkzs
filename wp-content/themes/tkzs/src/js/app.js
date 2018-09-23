// jQuery functions
jQuery(function($){
    /** 
     * klasa visible na body
     */
    $(document).ready(function() {
        $('body').addClass('ready');

        /** 
         * aos init
         */
        AOS.init();
    });

    /** 
     * tooltipy
     */
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="popover"]').click(function() {
        $('[data-toggle="popover"]').not(this).popover('hide');
    });
    $('body').on('click', function(e) {
        if ($(e.target).data('toggle') !== 'popover'
            && $(e.target).parents('.popover.in').length === 0
            && !$(e.target).hasClass('popover')
            && !$(e.target).parent().hasClass('popover')) { 
            $('[data-toggle="popover"]').popover('hide');
        }
    });

    /** 
     * match height
     */
    $('.equal-headline').matchHeight();
    $('.equal-text').matchHeight();

    /**
     * clamp.js
     */
    $('.clamp-text').each(function(index, element) {
        // $clamp(element, { clamp: '3', useNativeClamp: false });
        var ellipsis = new Ellipsis(element);
        ellipsis.calc();
        ellipsis.set();
    });

    /** 
     * smooth scroll
     */
    // $('a.smooth-scroll').click(function() {
    //     var target = $(this).attr('href');
    //     smoothScroll(event, target);
    // });

    /**
     * Scroll menu
     */
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop(),
            header = $('#mainHeader'),
            nav = $('#navHeader');

        if (scroll >= 100) { 
            header.addClass('site-header--scroll'); 
            nav.addClass('header-menu--scroll'); 
        }
        else { 
            header.removeClass('site-header--scroll'); 
            nav.removeClass('header-menu--scroll'); 
        }
    });

    /**
     * Counter
     */
    $('.count').each(function () {
        var dur = parseInt($(this).attr('data-count-time'));
        if (dur !== NaN) {
            dur = 3000;
        }

        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: dur,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    /** 
     * slider 
     */
    var eventsSlider = $('#eventsSlider');
    // var logoItem = $('.slider-logo');

    //slick init
    eventsSlider.slick({
        arrows: true,
        autoplay: true,
        prevArrow: '<span class="events-slider__arrow events-slider__arrow--prev"><span class="icon-angel-left"></span></span>',
        nextArrow: '<span class="events-slider__arrow events-slider__arrow--next"><span class="icon-angel-right"></span></span>',
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              }
            },
        ]
    });

    
    /**
     * parallax scroll
    //  */
    // $(window).scroll(function(e){
    //     parallaxScroll();
    // });

    // function parallaxScroll(){
	// 	var scrolled = $(window).scrollTop();
    //     $('.parallax-1').each(function() {
    //         var h = ($(this).height() / 2);
    //         $(this).css('transform', 'translateY(' + (h - (scrolled * .1))+'px)');
    //     });
    //     $('.parallax-2').each(function() {
    //         var h = $(this).height()
    //         $(this).css('transform', 'translateY(' + (h - (scrolled * .2))+'px)');
    //     });
	// }

}); 


// /**
//  * inicjalizacja mapy
//  * @param (string) - id kontenera mapy
//  * @param (float) - pozycja: lat
//  * @param (float) - pozycja: lng
//  * @param (number) - zoom mapy
//  */
// function initMap(container, lat, lng, zoom) {
//     var center = {lat: lat, lng: lng};

//     var map = new google.maps.Map(document.getElementById(container), {
//         zoom: zoom,
//         center: center,
//         styles: mapColors,
//         zoomControlOptions: {
//             position: google.maps.ControlPosition.RIGHT_CENTER
//         },
//         streetViewControlOptions: {
//             position: google.maps.ControlPosition.RIGHT_CENTER
//         },
//     });

//     var marker = new google.maps.Marker({
//         position: center,
//         map: map,
//         icon: mapPin
//     });
// }