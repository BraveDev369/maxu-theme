(function($) {
    'use strict';
	
	/*----------------------
    	Mobile Menu
    ------------------------*/
    $('.mobile-menu nav').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu",
        onePage: true,
    });

    // top quearys menu 
    var emsmenu = $(".em-quearys-menu i.t-quearys");
    var emscmenu = $(".em-quearys-menu i.t-close");
    var emsinner = $(".em-quearys-inner");
    emsmenu.on('click', function() {
        emsinner.addClass('em-s-open');
        $(this).addClass('em-s-hiddens');
        emscmenu.removeClass('em-s-hidden');
    });
    emscmenu.on('click', function() {
        emsinner.removeClass('em-s-open');
        $(this).addClass('em-s-hidden');
        emsmenu.removeClass('em-s-hidden');
    });
	
	
   /*--
    	One Page Nav
    ----------------------------------- */
    var top_offset = $('.one_page').height() + 100;
    $('.one_page .maxu_menu .nav_scroll').onePageNav({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 1000,
        scrollOffset: top_offset,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',
    });

    $(".nav_scroll > li:first-child").addClass("current");
	

    /* sticky nav 2 */
    var headers1 = $('.trp_nav_area');
    $(window).on('scroll resize load', function() {

        if( $(window).scrollTop() > 150 ){
			if( $('.menu-height-control').length < 1 && !$('body').hasClass('home_3') ){
				headers1.after('<div class="menu-height-control"></div>');
			}
			$('.menu-height-control').height(headers1.height());
            headers1.addClass('hbg2');
		}
		else{
			$('.menu-height-control').remove();
            headers1.removeClass('hbg2');
        }

    });	
	

	// slick slider
	
	
    $('.witr_dsider_js_active').slick({
        dots: false,
        speed: 300,
        arrows: true,
        rtl: true,
        autoplay: true,
        fade: true,
        autoplaySpeed: 6000,
        responsive: [{
            breakpoint: 769,
            settings: {
                arrows: false,
            }
        }]
    });	
	/*---------------------
	counterUp
	--------------------- */	
	$('.countr_text h1').counterUp({
		delay: 10,
		time: 1000
	});

    /* Portfolio Isotope  */

    $('.em_load').imagesLoaded(function() {

        if ($.fn.isotope) {

            var $portfolio = $('.em_load');

            $portfolio.isotope({
                itemSelector: '.grid-item',
                filter: '*',
                resizesContainer: true,
                layoutMode: 'masonry',
                originLeft: false,
                transitionDuration: '0.8s'
            });


            $('.filter_menu li').on('click', function() {

                $('.filter_menu li').removeClass('current_menu_item');

                $(this).addClass('current_menu_item');

                var selector = $(this).attr('data-filter');

                $portfolio.isotope({
                    filter: selector,
					originLeft: false
                });

            });

        };

    });
	
    /*--------------------
    	testimonial 
    -----------------------------------*/

    $('.testimonial_list').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
        dots: true,
        rtl: true,
        nav: false,
        navText: ["<i class='fa fa-long-arrow-right'></i>", "<i class='fa fa-long-arrow-left'></i>"],
        responsive:    {
            0: {  
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1000: {
                items: 1
            },
            1920: {
                items: 1
            }
        }
    })
	
	/*--------------------
    	blog 
    -----------------------------------*/

    $('.blog_active').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 10000,
		dots: false,
		rtl: true,
        nav: true,
        navText: ["<i class='fa fa-long-arrow-right'></i>", "<i class='fa fa-long-arrow-left'></i>"],
        responsive:    {
            0: {  
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1000: {
                items: 3
            },
            1920: {
                items: 3
            }
        }
    })
	
		
    /*--------------------------
     scrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });		
		
    // Venubox

    $('.venobox').venobox({

        numeratio: true,

        infinigall: true

    });		


})(jQuery);