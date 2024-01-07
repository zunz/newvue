
//Sticky Header
jQuery(function($){
	var offset = $(".header-main").offset();
	var sticky = document.getElementById("header-main");
	var additionalPixels = 0;
	$(window).scroll(function () {
	    if ($(document).scrollTop() > offset.top - additionalPixels) {
		   $('.header-main').addClass('fixed2');
	    } else {
		   $('.header-main').removeClass('fixed2');
	    }
	});
});


// Sticky - Header
jQuery(function($){
		
	// Hide header on scroll down
	var didScroll;
	var lastScrollTop = 0;
	var delta = 0;
	var navbarHeight = 0;
	
	$(window).scroll(function(event){
		didScroll = true;
	});
	
	setInterval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	});
	
	function hasScrolled() {
		var st = $(this).scrollTop();
		
		// Make scroll more than delta
		if(Math.abs(lastScrollTop - st) <= delta)
			return;
		
		// If scrolled down and past the navbar, add class .nav-up.
		if (st > lastScrollTop && st > navbarHeight){
			// Scroll Down
			$('.header-main').removeClass('fixed');
		} else {
			// Scroll Up
			if(st + $(window).height() < $(document).height()) {
				$('.header-main').addClass('fixed');
			}
		}
	  
		lastScrollTop = st;
	}
	
});


// Custom Codes
jQuery(function($){			
	
	$('.modal-content .container').prepend('<a href="javascript:;" class="icon-close" data-bs-dismiss="modal">Close</a>');
	$('.modal').appendTo('body');
	
	$('.header-main').append('<div class="overlay-menu"></div>');
	$('.nav-bar').wrapInner('<div class="nav-max"></div>');
	$('.nav-bar .nav-max').wrapInner('<div class="nav-inn"></div>');
	$('.nav-bar .nav-inn').prepend('<a href="javascript:;" class="close-btn">Close</a>');
	
	$('.menu-btn').click(function() {
		$('.menu-btn').toggleClass('active');
		$('.nav-bar').toggleClass('active');
		$('.overlay-menu').toggleClass('active');
		$('body').toggleClass('hiddenscroll-menu');
	});		
	
	$('.close-btn, .overlay-menu').click(function() {
		$('.menu-btn').removeClass('active');
		$('.nav-bar').removeClass('active');
		$('.overlay-menu').removeClass('active');
		$('body').removeClass('hiddenscroll-menu');
	});		
		
	$('.fc-menu .menu-item-has-children>a').focus(function(){
		$(this).parent().addClass("nav-menu-open");
	}).blur(function(){
		$(this).parent().removeClass("nav-menu-open");
	});	
	$('.fc-menu .menu-item-has-children>ul>li>a').focus(function(){
		$(this).parent().parent().addClass("nav-menu-open");
		$(this).parent().parent().parent().addClass("nav-menu-open");
	}).blur(function(){
		$(this).parent().parent().removeClass("nav-menu-open");
		$(this).parent().parent().parent().removeClass("nav-menu-open");
	});	
	
	$('.mega-menu-item a').focus(function(){
		var item = $(this).closest('.mega-menu-item');
		item.addClass("nav-menu-open");
		$('.overlay-menu').addClass('show-over');
	}).blur(function(){
		var item = $(this).closest('.mega-menu-item');
		item.removeClass("nav-menu-open");
		$('.overlay-menu').removeClass('show-over');
	});
	
	$('.fc-menu>ul>.menu-item-has-children>.sub-menu').before($('<div class="menu-txt"></div>'));
	$('.fc-menu>ul>.mega-menu-item>.mega-menu').before($('<div class="menu-txt"></div>'));
	
	$('.primary-menu>ul>.menu-item-has-children:nth-child(1)>a').each(function(){
		$('.primary-menu>ul>.menu-item-has-children:nth-child(1)>.menu-txt').html($(this).text());
	});	
	$('.primary-menu>ul>.menu-item-has-children:nth-child(2)>a').each(function(){
		$('.primary-menu>ul>.menu-item-has-children:nth-child(2)>.menu-txt').html($(this).text());
	});
	$('.primary-menu>ul>.menu-item-has-children:nth-child(3)>a').each(function(){
		$('.primary-menu>ul>.menu-item-has-children:nth-child(3)>.menu-txt').html($(this).text());
	});
	$('.primary-menu>ul>.menu-item-has-children:nth-child(4)>a').each(function(){
		$('.primary-menu>ul>.menu-item-has-children:nth-child(4)>.menu-txt').html($(this).text());
	});
	$('.primary-menu>ul>.menu-item-has-children:nth-child(5)>a').each(function(){
		$('.primary-menu>ul>.menu-item-has-children:nth-child(5)>.menu-txt').html($(this).text());
	});
	$('.primary-menu>ul>.menu-item-has-children:nth-child(6)>a').each(function(){
		$('.primary-menu>ul>.menu-item-has-children:nth-child(6)>.menu-txt').html($(this).text());
	});
	
	$('.fc-menu>ul>.mega-menu-item>a').each(function(){
		$('.fc-menu>ul>.mega-menu-item>.menu-txt').html($(this).text());
	});
	
	$('.top-menu>ul>.menu-item-has-children:nth-child(1)>a').each(function(){
		$('.top-menu>ul>.menu-item-has-children:nth-child(1)>.menu-txt').html($(this).text());
	});	
	$('.top-menu>ul>.menu-item-has-children:nth-child(2)>a').each(function(){
		$('.top-menu>ul>.menu-item-has-children:nth-child(2)>.menu-txt').html($(this).text());
	});
	$('.top-menu>ul>.menu-item-has-children:nth-child(3)>a').each(function(){
		$('.top-menu>ul>.menu-item-has-children:nth-child(3)>.menu-txt').html($(this).text());
	});
	$('.top-menu>ul>.menu-item-has-children:nth-child(4)>a').each(function(){
		$('.top-menu>ul>.menu-item-has-children:nth-child(4)>.menu-txt').html($(this).text());
	});
	$('.top-menu>ul>.menu-item-has-children:nth-child(5)>a').each(function(){
		$('.top-menu>ul>.menu-item-has-children:nth-child(5)>.menu-txt').html($(this).text());
	});
	$('.top-menu>ul>.menu-item-has-children:nth-child(6)>a').each(function(){
		$('.top-menu>ul>.menu-item-has-children:nth-child(6)>.menu-txt').html($(this).text());
	});
	
	$('.menu-txt').click(function() {
		$('.menu-txt').removeClass('active');
		$('.fc-menu>ul>.menu-item-has-children>.sub-menu, .fc-menu>ul>.mega-menu-item .sub-menu').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('active');
			$(this).next().slideDown('normal');
		} 
	});
	
	$('.header-main .fc-menu ul li .mega-menu .aside-cont h3').click(function() {
		$('.header-main .fc-menu ul li .mega-menu .aside-cont h3').removeClass('active');
		$('.header-main .fc-menu ul li .mega-menu .aside-cont ul').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('active');
			$(this).next().slideDown('normal');
		} 
	});
	
	$('.submenu-item .submenu-title').click(function() {
		$('.submenu-item .submenu-title').removeClass('active');
		$('.submenu-item .submenu-list').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('active');
			$(this).next().slideDown('normal');
		} 
	});
		
	$('input,textarea').focus(function(){
		$(this).data('placeholder',$(this).attr('placeholder')).attr('placeholder','');
	}).blur(function(){
		$(this).attr('placeholder',$(this).data('placeholder'));
	});		
	
	//Header Search
	$('.header-main .search-box input').focus(function(){
		$(".header-main .search-box").addClass("open");
	}).blur(function(){
		$(".header-main .search-box").removeClass("open");
	});	
	$('.header-main .search-box input[type="text"]').keyup(function(){
		if($(this).val().length) {
			$('.header-main .search-box').removeClass('btn-disabled');
		} else {
			$('.header-main .search-box').addClass('btn-disabled');
		}
	});
	
	$('.filter-links ul li a').on('click', function() {		
		$('.filter-links').removeClass('show');
		$('.filter-links .dropdown-toggle').removeClass('show');
        $('.filter-links .dropdown-menu').removeClass('show');
    });
	
});


//Onload animation
// jQuery(function($){
   // $('.wow').css('opacity', '1');
   // $('.wow').css('visibility', 'visible');
// });


// Dropdown Menu Outer Close	
jQuery('.dropdown-menu').on('click', function(event){
    event.stopPropagation();
});


// Scoll
jQuery(function($){
	$('a[href*="#sec"]:not([href="#sec"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	  if (target.length) {
		$('html, body').animate({
		  scrollTop: target.offset().top - 0
		}, 10);
		return false;
	  }
	}
	});
});


// Load More
jQuery(function($){
    $(".loadmore-articles>div").slice(0, 12).show();
	if ($(".loadmore-articles>div:hidden").length == 0) {
		$(".loadmore-articles-btn").hide();
	}
    $(".loadmore-articles-btn a").on('click', function (e) {
        e.preventDefault();
        $(".loadmore-articles>div:hidden").slice(0, 12).slideDown();
        if ($(".loadmore-articles>div:hidden").length == 0) {
            $(".loadmore-articles-btn").fadeOut('slow');
        }
    });
});


//Owl Slider Control
jQuery(function($){
	
	$('#cta-slider').owlCarousel({						
		margin: 0,
		items: 1,
		loop: true,
		nav: true,
		dots: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoHeight: true,
		navText: [
			'<span aria-label="' + 'Previous' + '"><em class="fal fa-chevron-left"></em></span>',
			'<span aria-label="' + 'Next' + '"><em class="fal fa-chevron-right"></em></span>'
		],
	});
	
	$('#testimonial-slider').owlCarousel({						
		margin: 0,
		items: 1,
		loop: true,		
		autoplay: true,
		autoplayHoverPause: true,
		autoHeight: true,
		responsive:{
			0:{
				nav: false,
				dots: true,
			},			
			768:{
				nav: true,
				dots: false,
			}
		}
	});
	
	$('#gallery-slider').owlCarousel({						
		margin: 0,
		items: 1,
		loop: true,
		nav: true,
		dots: false,
		autoplay: true,
		autoplayHoverPause: true,
	});
		
});

jQuery(function($){
	// Animates
	$('.hero-inner').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.hero-inner').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.cta-cont').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.cta-cont').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.icons-list2').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.icons-list2').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.content-inner3').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.content-inner3').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(1)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(1)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(2)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(2)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(3)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(3)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(4)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(4)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(5)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(5)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(6)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(6)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(7)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(7)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(8)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(8)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(9)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(9)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(10)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(10)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(11)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(11)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

	$('.articles-list .loadmore-articles > div:nth-child(12)').on('inview', function(event, visible, visiblePartX, visiblePartY) {
	if (visible) {
		$('.articles-list .loadmore-articles > div:nth-child(12)').addClass('show-animate');
	$(this).unbind('inview');
	}
	});

});


// Select
(function($) {
// Color the empty select
$.fn.selectColored = function(options) {
	var defaults = {
		def        : -1,
		classSel   : 'colorize',
		classEmpty : 'empty',
		classDef   : 'def'
	};
	// extend default options with those provided
	var opts = $.extend(defaults, options);

	// implementation code
	return this.each(function() {
		var $select = $(this);
		$select
			.addClass(opts.classSel)
			.find('option[value="' + opts.def + '"]')
			.addClass(opts.classDef);

		function color() {
			$select.toggleClass(opts.classEmpty, ($select.val() == opts.def));
		}

		$select.bind('change', function() {
			color();
		});

		// initialize
		color();
	});
};// end plugin definition
})(jQuery);
jQuery(function($){
	$('select').selectColored();
});


//Horizontal Scroll
jQuery(function($){		
	var page = document.getElementById('history-cont');
	if(page) {
	var last_pane = page.getElementsByClassName('history-cont');
	last_pane = last_pane[last_pane.length-1];
	var dummy_x = null;
	
	window.onscroll = function () {
	  // Horizontal Scroll.
	  var y = document.body.getBoundingClientRect().top;
	  page.scrollLeft = -y;
	  
	  // Looping Scroll.
	  var diff = window.scrollY - dummy_x;
	  if (diff > 0) {
		window.scrollTo(0, diff);
	  }
	  else if (window.scrollY == 0) {
		window.scrollTo(0, dummy_x);
	  }
	}
	// Adjust the body height if the window resizes.
	window.onresize = resize;
	// Initial resize.
	resize();
	
	// Reset window-based vars
	function resize() {
	  var w = page.scrollWidth-window.innerWidth+window.innerHeight;
	  document.body.style.height = w + 'px';
	  
	  dummy_x = last_pane.getBoundingClientRect().left+window.scrollY;
	}
	}
});


// Flying Focus
jQuery(function($){
	
	// Flying Focus - http://n12v.com/focus-transition/
	(function() {
	
	if (document.getElementById('flying-focus')) return;
	
	var flyingFocus = document.createElement('flying-focus'); // use uniq element name to decrease the chances of a conflict with website styles
	flyingFocus.id = 'flying-focus';
	document.body.appendChild(flyingFocus);
	
	var DURATION = 100;
	flyingFocus.style.transitionDuration = flyingFocus.style.WebkitTransitionDuration = DURATION / 1000 + 's';
	
	function offsetOf(elem) {
		var rect = elem.getBoundingClientRect();
		var docElem = document.documentElement;
		var win = document.defaultView;
		var body = document.body;
	
		var clientTop  = docElem.clientTop  || body.clientTop  || 0,
			clientLeft = docElem.clientLeft || body.clientLeft || 0,
			scrollTop  = win.pageYOffset || docElem.scrollTop  || body.scrollTop,
			scrollLeft = win.pageXOffset || docElem.scrollLeft || body.scrollLeft,
			top  = rect.top  + scrollTop  - clientTop,
			left = rect.left + scrollLeft - clientLeft;
	
		return {top: top, left: left};
	}
	
	var movingId = 0;
	var prevFocused = null;
	var isFirstFocus = true;
	var keyDownTime = 0;
	
	document.documentElement.addEventListener('keydown', function(event) {
		var code = event.which;
		// Show animation only upon Tab or Arrow keys press.
		if (code === 9 || (code > 36 && code < 41)) {
			keyDownTime = now();
		}
	}, false);
	
	document.documentElement.addEventListener('focus', function(event) {
		var target = event.target;
		if (target.id === 'flying-focus') {
			return;
		}
		var offset = offsetOf(target);
		flyingFocus.style.left = offset.left + 'px';
		flyingFocus.style.top = offset.top + 'px';
		flyingFocus.style.width = target.offsetWidth + 'px';
		flyingFocus.style.height = target.offsetHeight + 'px';
	
		// Would be nice to use:
		//
		//   flyingFocus.style['outline-offset'] = getComputedStyle(target, null)['outline-offset']
		//
		// but it always '0px' in WebKit and Blink for some reason :(
	
		if (isFirstFocus) {
			isFirstFocus = false;
			return;
		}
	
		if (now() - keyDownTime > 42) {
			return;
		}
	
		onEnd();
		target.classList.add('flying-focus_target');
		flyingFocus.classList.add('flying-focus_visible');
		prevFocused = target;
		movingId = setTimeout(onEnd, DURATION);
	}, true);
	
	document.documentElement.addEventListener('blur', function() {
		onEnd();
	}, true);
	
	function onEnd() {
		if (!movingId) {
			return;
		}
		clearTimeout(movingId);
		movingId = 0;
		flyingFocus.classList.remove('flying-focus_visible');
		prevFocused.classList.remove('flying-focus_target');
		prevFocused = null;
	}
	
	function now() {
		return new Date().valueOf();
	}
	
	})();

});


jQuery(function($){
	$('.submenu-items li.current-menu-item').each(function(){
		var item = $(this).closest('.submenu-item');
		item.find('.submenu-title').addClass('active');
		item.find('.submenu-list').addClass('active');
	});
});