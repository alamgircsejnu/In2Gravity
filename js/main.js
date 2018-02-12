// Isotope activation js codes

jQuery(document).ready(function () {

    $('.portfolio-item').mixItUp()


    $('.counter-wrapper').bind('inview', function (event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({
                    Counter: 0
                }).animate({
                    Counter: $this.text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).unbind('inview');
        }
    });

    $(".testimonial-slider").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: false,

    });


    $(".post-image-slide").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: true,
        autoPlay: false,
    });


    /* === magnificPopup === */
    if ($('.tt-lightbox').length > 0) {

        $('.tt-lightbox').magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false
                // other options
        });
    }




    $(".header-area").sticky({

        topSpacing: 0

    });


    // jQuery smooth scroll
    $('.navbar-nav li.smooth-scroll a').bind('click', function (event) {
        var $anchor = $(this);
        var headerH = '10';
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
        }, 1200, 'easeInOutExpo');

        event.preventDefault();
    });


    // jQuery scroll psy
    $('body').scrollspy({
        target: '.navbar-collapse',
        offset: 95
    });


    $(".navbar-toggle").click(function (){
        $("body").addClass("mobile-menu-activated");

    });

    $("ul.nav.navbar-nav li a").click(function (){
        $(".navbar-collapse").removeClass("in");

    });

});