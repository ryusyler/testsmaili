// NAVIGATION CALLBACK
(function( $ ) {
	var ww = jQuery(window).width();
	jQuery(document).ready(function() { 
		jQuery(".menu-sec .nav li a").each(function() {
			if (jQuery(this).next().length > 0) {
				jQuery(this).addClass("parent");
			};
		})
		jQuery(".toggleMenu").click(function(e) { 
			e.preventDefault();
			jQuery(this).toggleClass("active");
			jQuery(".menu-sec .nav").slideToggle('fast');
		});
		adjustMenu();
	})

	// navigation orientation resize callbak
	jQuery(window).bind('resize orientationchange', function() {
		ww = jQuery(window).width();
		adjustMenu();
	});

	var adjustMenu = function() {
		if (ww < 720) {
			jQuery(".toggleMenu").css("display", "block");
			if (!jQuery(".toggleMenu").hasClass("active")) {
				jQuery(".menu-sec .nav").hide();
			} else {
				jQuery(".menu-sec .nav").show();
			}
			jQuery(".menu-sec .nav li").unbind('mouseenter mouseleave');
		} else {
			jQuery(".toggleMenu").css("display", "none");
			jQuery(".menu-sec .nav").show();
			jQuery(".menu-sec .nav li").removeClass("hover");
			jQuery(".menu-sec .nav li a").unbind('click');
			jQuery(".menu-sec .nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				jQuery(this).toggleClass('hover');
			});
		}
	}



	//TOP MENU NAVIGATION CALLBACK
	// NAVIGATION CALLBACK FOR Woocommerce MENU
	var ww = jQuery(window).width();
	jQuery(document).ready(function() { 
		jQuery(".topbar .nav li a").each(function() {
			if (jQuery(this).next().length > 0) {
				jQuery(this).addClass("parent");
		};
	})
	jQuery(".toggleTopMenu").click(function(e) { 
	e.preventDefault();
	jQuery(this).toggleClass("active");
	jQuery(".topbar .nav").slideToggle('fast');
	});
	adjustMenu();
	})

	// navigation orientation resize callbak
	jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
	});

	var adjustMenu = function() {
	if (ww < 720) {
	jQuery(".toggleTopMenu").css("display", "block");
	if (!jQuery(".toggleTopMenu").hasClass("active")) {
	jQuery(".topbar .nav").hide();
	} else {
	jQuery(".topbar .nav").show();
	}
	jQuery(".topbar .nav li").unbind('mouseenter mouseleave');
	} else {
	jQuery(".toggleTopMenu").css("display", "none");
	jQuery(".topbar .nav").show();
	jQuery(".topbar .nav li").removeClass("hover");
	jQuery(".topbar .nav li a").unbind('click');
	jQuery(".topbar .nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
	jQuery(this).toggleClass('hover');
	});
	}
	}

	/**** Hidden search box ***/
	jQuery('document').ready(function($){
		$('.search-box span i').click(function(){
	        $(".serach_outer").slideDown(700);
	    });

	    $('.closepop i').click(function(){
	        $(".serach_outer").slideUp(700);
	    });
	});
})( jQuery );