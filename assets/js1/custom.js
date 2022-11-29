/* ----------------- Start JS Document ----------------- */
(function($) {
    "use strict";


    $(document).ready(function() {
    
        // Our client
        var ourClient = $(".client-slider");
        ourClient.owlCarousel({
            items: 3,
            nav: false,
            dots: false,
            autoplay: true,
            center: true,
            loop: true,
            autoplayHoverPause: true,
            responsive:{
                0:{
                    items:3,
                    nav:false
                },
                768:{
                    items:5,
                }

            },
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });
        
        // Widget About
        var aboutSlide = $(".wi-about-slide");
        aboutSlide.owlCarousel({
            items: 1,
            nav: false,
            dots: false,
            autoplay: true,
            center: true,
            loop: true,
            autoplayHoverPause: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });

      
        // Customer Review
        var reviewSlider = $(".review-slider");
        reviewSlider.owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            autoplay: true,
            center: true,
            loop: true,
            autoplayHoverPause: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });

        /* Animated skills Bars */
        function DemoProgressbars(){

            var prog;

            $('.bar-progres').each(function() {
                prog = $(this);
                prog.LineProgressbar({
                    percentage: prog.data('percent'),
                    fillBackgroundColor: prog.data('color'),
                    duration: 2500
                });
            });

        }


        $('.progressbar-start').waypoint(function(){
            DemoProgressbars();
        },{
            offset: '100%',
            triggerOnce: true 
        }); 


        // Video Popup
        $(".various").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });

        $("[data-fancybox]").fancybox({
            // Options will go here
            toolbar : true,
            animationEffect : "zoom-in-out",
            transitionEffect : "circular",
            thumbs : {
                autoStart   : false,                  // Display thumbnails on opening
                hideOnClose : true,                   // Hide thumbnail grid when closing animation starts
                parentEl    : '.fancybox-container',  // Container is injected into this element
                axis        : 'y'                     // Vertical (y) or horizontal (x) scrolling
            },
            buttons : [
                'slideShow',
                'fullScreen',
                'thumbs',
                // 'share',
                //'download',
                //'zoom',
                'close'
            ],

        });
        
         /* Init Counterup */
        $('.counter').counterUp({
            delay: 4,
            time: 100
        });

        // carousel to mobile touchable
        $('.carousel').each(function() {
            var el = $(this);
            el.swiperight(function() {  
                el.carousel('prev');  
            }); 
            el.swipeleft(function() {  
                el.carousel('next');  
            }); 
        }); 


        // Click me to the my section
        $('.click-to-next').on('click',function() {
            var secHeight = $('#main-slider').height();
            $('html').animate({
                scrollTop: secHeight -61
            }, 900);
        });

        // Slick Slider || Testimonial
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            dots: true,
            centerPadding: 0,
            asNavFor: '.slider-nav'
        });

        $('.slider-nav').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          asNavFor: '.slider-for',
          dots: false,
          infinite: true,
          centerMode: true,
          centerPadding: 0,
          focusOnSelect: true,
          responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1
              }
            }
          ]
        });

        // Sick Slider || Services
        $('.service-slider-content').slick({
            slidesToShow: 1,
            arrows: false,
            draggable: false,
            speed: 500,
            asNavFor: '.slider-thumb',

        });
        $('.slider-thumb').slick({
            arrows: false,
            asNavFor: '.service-slider-content',
            centerMode: false,
            centerPadding: '15px',
            dots: false,
            infinite: false,
            focusOnSelect: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 3,
                  }
                }
            ]
        });

        $('.service-slider-content-2nd').slick({
            slidesToShow: 1,
            arrows: false,
            draggable: false,
            speed: 500,
            asNavFor: '.slider-thumb-2nd',

        });
        $('.slider-thumb-2nd').slick({
            arrows: false,
            asNavFor: '.service-slider-content-2nd',
            centerMode: false,
            centerPadding: '15px',
            dots: false,
            infinite: false,
            focusOnSelect: true,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 6,
                  }
                }
            ]
        });

        
         //Slick Nav 
        $('.wpb-mobile-menu').slicknav({
            prependTo: '.navbar-header',
            parentTag: 'margo',
            allowParentLinks: true,
            duplicate: false,
            label: '',
            closedSymbol: '<i class="fa fa-plus"></i>',
            openedSymbol: '<i class="fa fa-minus"></i>',
        });


        // Menu Area Start
        
        //for mobile menu
        $( '.toggle-inner' ).on( 'click', function (e) {
            e.preventDefault();
            $( 'body' ).toggleClass( 'going' );
            $( '.close-menu' ).on( 'click', function() {
                $( 'body' ).removeClass( 'going' );
            });
        });
        
        var Concertina = function (el, multiple) {
            this.el = el || {};

            this.multiple = multiple || false;

            var dropdown_here = this.el.find('.dropdown-here');
            dropdown_here.on('click', {
                    el: this.el,
                    multiple: this.multiple
                },
                this.dropdown);
        };
        
        Concertina.prototype.dropdown = function (e) {
            e.preventDefault();
            var $el = e.data.el,
                 $this = $(this),

                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                //show only one menu at the same time
                $el.find('.submenuItems').not($next).slideUp().parent().removeClass('open');
            }
        }
        var accordion = new Concertina($('.slide-menu'), false);
        // Menu Area End

        
    }); //$(document).ready


    
    //Back Top Link

    var offset = 200;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').fadeIn(400);
        } else {
            $('.back-to-top').fadeOut(400);
        }
    });
    
    $('.back-to-top').on('click',function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });




    $(window).on( 'load', function() {

        $('#loader').fadeOut();
            
       // Isotope portfolio
        var $container = $('.portfolio-container');
        
        $container.isotope({
            filter: '*',
            masonry: {
                horizontalOrder: true
            },
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        $('.portfolio-filter a').on('click', function() {
            $('.portfolio-filter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                percentPosition: true,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    }); //Window Load End



    // Google Map
    function initMap() {

        $('.init-gmap').each(function() {

            var element = $(this);

            var uluru = {lat: element.data('lat'), lng: element.data('lng')};

            var map = new google.maps.Map( element.get(0), {
                scrollwheel: true,
                zoom: element.data('zoom'),
                center: uluru
            });

            var marker = new google.maps.Marker({
                position: uluru,
                icon: 'assets/images/marker.png',
                map: map,
                title: 'Khulna 9000, Bangladesh'
            });

        });
    }

    $(window).on( 'load', function() {
        initMap();
    });

})(jQuery);













