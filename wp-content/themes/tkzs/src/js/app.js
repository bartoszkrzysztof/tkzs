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
    var homeSlider = $('#sliderHome');
    // var logoItem = $('.slider-logo');

    //slick init
    homeSlider.slick({
        arrows: false,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        pauseOnFocus: false
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
     * slider 
     */
    var reviewSlider = '#reviewSlider';
    var reviewSliderNav = '.review-slider-nav';
    
    //slick init
    $(reviewSlider).slick({
        arrows: true,
        autoplay: true,
        prevArrow: '<span class="events-slider__arrow events-slider__arrow--prev"><span class="icon-angel-left"></span></span>',
        nextArrow: '<span class="events-slider__arrow events-slider__arrow--next"><span class="icon-angel-right"></span></span>',
        autoplaySpeed: 5000
    })
    .on('afterChange', function(event, slick, currentSlide) {
        $(reviewSliderNav).each(function() {
            $(this).removeClass('active');
        })
        $(reviewSliderNav + '[rel="' + currentSlide + '"]').addClass('active');
    });
    
    $(reviewSliderNav).click(function() {
        $(reviewSlider).slick('slickGoTo', $(this).attr('rel'));
    })


    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
            showArrows: true
        });
    });
    
    var map;
    function initmap() {
        map = new L.Map('mapid');

        var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 24, attribution: osmAttrib});		

        map.setView(new L.LatLng(52.61551, 16.57792),17);
        map.addLayer(osm);

        if ($(window).width() < 1025) {
            map.scrollWheelZoom.disable();
            map.touchZoom.disable();
            map.dragging.disable();
        }

        var marker = L.marker([52.61551, 16.57792]).addTo(map);
    }

    var contactMap = document.getElementById('mapid');

    if (contactMap !== null) {
        initmap();
    }

    
    var homeMap;
    function initmaphome() {
        homeMap = new L.Map('mapHome');

        var osmUrl='https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib='Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {
            minZoom: 8, 
            maxZoom: 24, 
            attribution: osmAttrib,
        });		

        homeMap.setView(new L.LatLng(52.61551, 16.57792),17);
        homeMap.addLayer(osm);

        if ($(window).width() < 1025) {
            homeMap.scrollWheelZoom.disable();
            homeMap.touchZoom.disable();
            homeMap.dragging.disable();
        }

        var marker = L.marker([52.61551, 16.57792]).addTo(homeMap);
        marker.bindPopup('<span class="popup-title">Towarzystwo Kultury Ziemi Szamotulskiej</span><br />ul. Wroniecka 30, 64-500 Szamotuły<br /><a href="mailto:tkzsz@tlen.pl">tkzsz@tlen.pl</a><br />tel. +48 61/ 29 218 13').openPopup();
    }

    var homeMapCont = document.getElementById('mapHome');

    if (homeMapCont !== null) {
        initmaphome();
    }

    var borderHome = $('#sliderBorder');
    var borderHomeItem = '.color-border__item';

    borderHome.find(borderHomeItem).each(function() {
        var translate = $(this).css('transform');
        console.log(translate);
    })



    $(window).bind('scroll',function(e){
        scrollBorder();
    });

    
    $(document).ready(function() {
        scrollBorder();
    });

    function scrollBorder() {
        var scrolled = $(window).scrollTop();
        var scroll1 = -100 + (scrolled * .3);
        var scroll2 = -110 + (scrolled * .2);
        var scroll3 = -120 + (scrolled * .3);
        var scroll4 = -130 + (scrolled * .2); 
        var scroll5 = -140 + (scrolled * .3);

        if (scroll1 <= 0) {
            $('.color-border__item--1').css('transform', 'matrix(1, 0, 0, 1, 0, ' + scroll1 +  ')');
        }
        else {
            $('.color-border__item--1').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
        }

        if (scroll2 <= 0) {
            $('.color-border__item--2').css('transform', 'matrix(1, 0, 0, 1, 0, ' + scroll2 +  ')');
        }
        else {
            $('.color-border__item--2').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
        }

        if (scroll3 <= 0) {
            $('.color-border__item--3').css('transform', 'matrix(1, 0, 0, 1, 0, ' + scroll3 +  ')');
        }
        else {
            $('.color-border__item--3').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
        }

        if (scroll4 <= 0) {
            $('.color-border__item--4').css('transform', 'matrix(1, 0, 0, 1, 0, ' + scroll4 +  ')');
        }
        else {
            $('.color-border__item--4').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
        }

        if (scroll5 <= 0) {
            $('.color-border__item--5').css('transform', 'matrix(1, 0, 0, 1, 0, ' + scroll5 +  ')');
        }
        else {
            $('.color-border__item--5').css('transform', 'matrix(1, 0, 0, 1, 0, 0)');
        }
    }
}); 