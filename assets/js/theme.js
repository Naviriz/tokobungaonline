'use strict';
var theme = function () {

    // make main menu sticky
    // -------------------------------------------------------------------------------------------
    function handleStickyMenu() {
        if ( ! /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $("header.header").sticky({topSpacing: 0});
        } else {}

    }

    // prevent empty links
    // ---------------------------------------------------------------------------------------
    function handlePreventEmptyLinks() {
        $('a[href=#]').click(function (event) {
            event.preventDefault();
        });
    }

    // Placeholdem
    // ---------------------------------------------------------------------------------------
    function handlePlaceholdem() {
        Placeholdem(document.querySelectorAll('[placeholder]'));
    }

    // BootstrapSelect
    // ---------------------------------------------------------------------------------------
    function handleBootstrapSelect() {
        $('.selectpicker').selectpicker();
    }

    // add hover class for correct view on mobile devices
    // ---------------------------------------------------------------------------------------
    function handleHoverClass() {
        var hover = $('.thumbnail');
        hover.hover(
            function () {
                $(this).addClass('hover');
            },
            function () {
                $(this).removeClass('hover');
            }
        );
    }

    // superfish menu
    // ---------------------------------------------------------------------------------------
    function handleSuperFish() {
        $('ul.sf-menu').superfish();
        $('ul.sf-menu a').click(function() {
            $('body').scrollspy('refresh');
        });
        // fixed menu toggle
        $('.menu-toggle').on('click', function(){
            if($('.navigation').hasClass('opened')) {
                $(this).find('.fa').removeClass('fa-times').addClass('fa-bars');
                $('.navigation').removeClass('opened').addClass('closed');
            } else {
                $(this).find('.fa').removeClass('fa-bars').addClass('fa-times');
                $('.navigation').removeClass('closed').addClass('opened');
            }
        });
        // submenu fix
        $('.mobile-submenu').click(function () {
            $(this).parent().toggleClass('mobile-submenu-open');
        });
        $('ul.sf-menu a').click(function() {
            $('ul.sf-menu li').removeClass('mobile-submenu-open');
        });
    }

    // Smooth scrolling
    // ---------------------------------------------------------------------------------------
    function handleSmoothScroll(){
        $('.sf-menu a, .scroll-to').click(function () {

            //var headerH = $('header').outerHeight();
            var headerH = 100;
            $('.sf-menu a').removeClass('active');
            $(this).addClass('active');
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - headerH + 'px'
            }, {
                duration: 1200,
                easing: 'easeInOutExpo'
            });
            return false;
        });
    }
    // prettyPhoto
    // ---------------------------------------------------------------------------------------
    function handlePrettyPhoto() {
        $("a[data-gal^='prettyPhoto']").prettyPhoto({
            theme: 'dark_square'
        });
    }

    // Scroll totop button
    // ---------------------------------------------------------------------------------------
    function handleToTopButton() {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 1) {
                $('.to-top').css({bottom: '10px'});
            } else {
                $('.to-top').css({bottom: '-100px'});
            }
        });
        $('.to-top').click(function () {
            $('html, body').animate({scrollTop: '0px'}, 800);
            return false;
        });
    }

    // preloader
    // ---------------------------------------------------------------------------------------
    $(window).load(function() {
        $('#status').fadeOut();
        $('#preloader').delay(200).fadeOut(100);
    });

    // Shrink header on scroll
    // ---------------------------------------------------------------------------------------
    function handleAnimatedHeader() {
        var header = $('.header.fixed');
        function refresh() {
            var scroll = $(window).scrollTop();
            if (scroll >= 31) {
                header.addClass('shrink');
            } else {
                header.removeClass('shrink');
            }
        };
        $(window).load(function () { refresh(); });
        $(window).scroll(function () { refresh(); });
        $(window).on('touchstart',function(){ refresh(); });
        $(window).on('scrollstart',function(){ refresh(); });
        $(window).on('scrollstop',function(){ refresh(); });
        $(window).on('touchmove',function(){ refresh(); });

    }

    // Widget Menu switch
    // ---------------------------------------------------------------------------------------
    function handleWidgetMenuSwitch() {

        $('.widget-menu .sub-menu').slideUp();

        $('.widget-menu .sign').on('click',function(){
            $(this).next().next().slideToggle();
            $(this).parent().toggleClass('open');
        });
    }


    // Find Doctor toggle class
    // ---------------------------------------------------------------------------------------
    function handleFindDoctor() {
        var btn = $('#doc-search-switch');
        btn.on('click',function(){
            $('#doc-search').toggleClass('doc-search-visible');
        });
    }

    // handleTabsFAQ
    // ---------------------------------------------------------------------------------------
    function handleTabsFAQ() {
        if($('#tabs-faq').length){
            var tabs = $('#tabs-faq');
            tabs.find('a').on('click', function () {
                tabs.find('.fa-angle-right').removeClass('fa-angle-right').addClass('fa-plus');
                $(this).find('.fa').removeClass('fa-plus').addClass('fa-angle-right');
            });
        }
    }
    // handleAccordion
    // ---------------------------------------------------------------------------------------
    function handleAccordion() {
        var $active = $('.accordion .panel-collapse.in').prev().addClass('active');
        $('.accordion').on('show.bs.collapse', function (e) {
            $('.accordion .panel-heading.active').removeClass('active');
            $(e.target).prev().addClass('active');
            $(e.target).parents('.projects.panel-group').css('margin-bottom',$(e.target).height());
        })
    }

    // handleTwitter
    // ---------------------------------------------------------------------------------------
    function handleTwitter() {
        $('.recent-tweets').twittie({
            dateFormat: '%b. %d, %Y',
            count: 2,
            hideReplies: true,
            template: '{{tweet}}. <small>{{date}}</small>',
            username: 'twitter'
        });
    }

    // resize page
    // ---------------------------------------------------------------------------------------
    function resizePage() {
        if ($('body').hasClass('boxed')) {
            $('#main-slider').find('.page').each(function () {
                $(this).removeAttr('style');
            });
        } else {
            $('.page').css('min-height', $(window).height());
        }
        $('#main-slider').trigger('refresh');
        $('#testimonials').trigger('refresh');
        $('#about-us').trigger('refresh');
        $('#team-members').trigger('refresh');
        $('.product-carousel').trigger('refresh');
        $('#image-carousel').trigger('refresh');
        $('#featured-projects').trigger('refresh');
        $('.partners-carousel .owl-carousel').trigger('refresh');
        $('.listing-carousel .owl-carousel').trigger('refresh');
        $('#security-cat').trigger('refresh');
        handleAccordion();
    }

    // INIT FUNCTIONS
    // ---------------------------------------------------------------------------------------
    return {
        onResize: function() {
            resizePage();
        },
        init: function () {
            handleWidgetMenuSwitch();
            handleAccordion();
            handleTwitter();
            handleFindDoctor();
            handlePreventEmptyLinks();
            handlePlaceholdem();
            handleBootstrapSelect();
            handleHoverClass();
            handleSuperFish();
            handleSmoothScroll();
            handlePrettyPhoto();
            handleToTopButton();
            handleAnimatedHeader();
            handleTabsFAQ();
        },
        // Isotope
        initIsotope: function () {
            var $container = $('.projects');
            // init
            $container.isotope({
                // options
                itemSelector: '.item',
                layoutMode: 'vertical'
            });

            // filter items on button click
            $('#filtrable').on( 'click', 'a', function() {
                var filterValue = $(this).attr('data-filter');
                $("#filtrable li").removeClass("current");
                $(this).parent().addClass("current");
                $container.isotope({ filter: filterValue });
            });
        },
        // Main Slider
        initMainSlider: function () {
            $('#main-slider').owlCarousel({
                //items: 1,
                autoplay: false,
                autoplayHoverPause: true,
                loop: false,
                margin: 0,
                dots: true,
                nav: false,
                navText: [
                    "<i class='fa fa-angle-left'></i>",
                    "<i class='fa fa-angle-right'></i>"
                ],
                responsiveRefreshRate: 100,
                responsive: {
                    0:    {items: 1},
                    479:  {items: 1},
                    768:  {items: 1},
                    991:  {items: 1},
                    1024: {items: 1}
                }
            });

        },
        // CountDown
        initCountDown: function () {
            var austDay = new Date();
            austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());
        },
        // Flex Slider Single Listing
        initFlexSingleListing: function () {
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        },
        // Partners Slider
        initPartnerSlider: function () {
            $('.partners-carousel .owl-carousel').owlCarousel({
                autoplay: true,
                loop: true,
                margin: 25,
                dots: false,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 2},
                    768:  {items: 3},
                    991:  {items: 5},
                    1024: {items: 6}
                }
            });
        },
        // Listing Slider
        initListingSlider: function () {
            $('.listing-carousel .owl-carousel').owlCarousel({
                autoplay: true,
                loop: true,
                margin: 0,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 1},
                    768:  {items: 1},
                    991:  {items: 1},
                    1024: {items: 1}
                }
            });
        },
        // Listing Slider Horziontal
        initListingSliderHorziontal: function () {
            $('.listing-carousel .owl-carousel').owlCarousel({
                autoplay: true,
                loop: true,
                margin: 30,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 2},
                    768:  {items: 2},
                    991:  {items: 3},
                    1024: {items: 3},
                    1280: {items: 4}
                }
            });
        },
        // Prod Image Height
        initProdImageHeight: function () {
            // Get an array of all element heights
            var elementHeights = $('.product-image-info > div').map(function() {
                return $(this).height() + 40;
            }).get();

            // Math.max takes a variable number of arguments
            // `apply` is equivalent to passing each height as an argument
            var maxHeight = Math.max.apply(null, elementHeights);

            // Set each height to the max height
            $('.product-image-info > div').css('height',maxHeight);
        },
        // Security Categories
        initSecurityCategories: function () {
            $('#security-cat').owlCarousel({
                autoplay: true,
                loop: true,
                margin: 25,
                dots: true,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 2},
                    768:  {items: 2},
                    991:  {items: 2},
                    1024: {items: 2}
                }
            });
        },
        // Testimonials
        initTestimonials: function () {
            $('#testimonials').owlCarousel({
                items: 1,
                autoplay: false,
                loop: true,
                margin: 10,
                dots: true,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 1},
                    768:  {items: 1},
                    991:  {items: 1},
                    1024: {items: 1}
                }
            });
        },
        // About Us
        initAboutUs: function () {
            $('#about-us').owlCarousel({
                items: 1,
                autoplay: false,
                loop: true,
                margin: 10,
                dots: true,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 1},
                    768:  {items: 1},
                    991:  {items: 1},
                    1024: {items: 1}
                }
            });
        },
        // Our Doctors
        initOurDoctors: function () {
            $('.our-doctors .owl-carousel').owlCarousel({
                autoplay: true,
                loop: true,
                margin: 25,
                dots: true,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 1},
                    768:  {items: 1},
                    991:  {items: 2},
                    1024: {items: 2}
                }
            });
        },
        // Team Members
        initTeamMembers: function (q1024,q991,q768,q479,q0) {
            $('#team-members').owlCarousel({
                autoplay: true,
                margin: 20,
                loop: true,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: q0},
                    479:  {items: q479},
                    768:  {items: q768},
                    991:  {items: q991},
                    1024: {items: q1024}
                }
            });
        },
        // Product Carousel
        initProductCarousel: function (q1024,q991,q768,q479,q0) {
            $('.product-carousel').owlCarousel({
                autoplay: true,
                margin: 20,
                loop: true,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: q0},
                    479:  {items: q479},
                    768:  {items: q768},
                    991:  {items: q991},
                    1024: {items: q1024}
                }
            });
        },
        // Image Carousel
        initImageCarousel: function (q1024,q991,q768,q479,q0) {
            $('#image-carousel').owlCarousel({
                autoplay: true,
                margin: 10,
                loop: true,
                dots: false,
                nav: true,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: q0},
                    479:  {items: q479},
                    768:  {items: q768},
                    991:  {items: q991},
                    1024: {items: q1024}
                }
            });
        },
        // Featured Projects
        initFeaturedProjects: function () {
            $('#featured-projects').owlCarousel({
                items: 5,
                autoplay: true,
                loop: true,
                dots: false,
                nav: false,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                responsive: {
                    0:    {items: 1},
                    479:  {items: 2},
                    768:  {items: 3},
                    991:  {items: 4},
                    1024: {items: 4}
                }
            });
        },
        // Animation on Scroll
        initAnimation: function () {
            var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            if (isMobile == false) {
                $('*[data-animation]').addClass('animated');
                $('.animated').waypoint(function (down) {
                    var elem = $(this);
                    var animation = elem.data('animation');
                    if (!elem.hasClass('visible')) {
                        var animationDelay = elem.data('animation-delay');
                        if (animationDelay) {
                            setTimeout(function () {
                                elem.addClass(animation + ' visible');
                            }, animationDelay);
                        } else {
                            elem.addClass(animation + ' visible');
                        }
                    }
                }, {
                    offset: $.waypoints('viewportHeight')
                    //offset: 'bottom-in-view'
                    //offset: '95%'
                });
            }
            // Refresh Waypoints on tab click / animation
            $('#tabs-lv1 li a[data-toggle="tab"]').on('shown.bs.tab', function () { $.waypoints('refresh'); });
            $('#tabs-lv2 li a[data-toggle="tab"]').on('shown.bs.tab', function () { $.waypoints('refresh'); });
        },
        // Listing Search Range
        initListingSearchRange: function() {
            //filter range
            //price
            var slider_price = $( "#slider-range-price" );
            slider_price.slider({
                range: true,
                min: 0,
                max: 100000,
                values: [ 1500, 30000 ],
                slide: function( event, ui ) {
                    $( "#price" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            $( "#price" ).val( "$" + slider_price.slider( "values", 0 ) +
                " - $" + slider_price.slider( "values", 1 ) );
            //year
            var slider_year = $( "#slider-range-year" );
            slider_year.slider({
                range: true,
                min: 1970,
                max: 2015,
                values: [ 2000, 2014 ],
                slide: function( event, ui ) {
                    jQuery( "#year" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
            });
            jQuery( "#year" ).val( "$" + slider_year.slider( "values", 0 ) +
                " - $" + slider_year.slider( "values", 1 ) );
        },
        // Google map
        initGoogleMap: function() {
            var map;
            function initialize() {
                var mapOptions = {
                    scrollwheel: false,
                    zoom: 12,
                    center: new google.maps.LatLng(40.9807648, 28.9866516)
                };
                map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        }
    };

}();