jQuery(function() {
	"use strict";


  new PerfectScrollbar('.cart-list');

// Prevent closing from click inside dropdown

/*jQuery(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});*/



 // jquery ready start
 jQuery(document).ready(function() {
  // jQuery code

  jQuery("[data-trigger]").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var offcanvas_id =  jQuery(this).attr('data-trigger');
    jQuery(offcanvas_id).toggleClass("show");
    jQuery('body').toggleClass("offcanvas-active");
    jQuery(".screen-overlay").toggleClass("show");
  }); 

  // Close menu when pressing ESC
  jQuery(document).on('keydown', function(event) {
    if(event.keyCode === 27) {
    jQuery(".mobile-offcanvas").removeClass("show");
    jQuery("body").removeClass("overlay-active");
    }
  });

  jQuery(".btn-close, .screen-overlay").click(function(e){
    jQuery(".screen-overlay").removeClass("show");
    jQuery(".mobile-offcanvas").removeClass("show");
    jQuery("body").removeClass("offcanvas-active");


  }); 


}); // jquery end




jQuery('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!jQuery(this).next().hasClass('show')) {
    jQuery(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var jQuerysubMenu = jQuery(this).next(".dropdown-menu");
  jQuerysubMenu.toggleClass('show');


  jQuery(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    jQuery('.submenu .show').removeClass("show");
  });


  return false;
});




	jQuery(document).ready(function() {
		jQuery(window).on("scroll", function() {
			jQuery(this).scrollTop() > 300 ? jQuery(".back-to-top").fadeIn() : jQuery(".back-to-top").fadeOut()
		}), jQuery(".back-to-top").on("click", function() {
			return jQuery("html, body").animate({
				scrollTop: 0
			}, 600), !1
		})
	}),



	jQuery(".btn-mobile-filter").on("click", function() {
		jQuery(".filter-sidebar").removeClass("d-none")
	}),
  
  jQuery(".btn-mobile-filter-close").on("click", function() {
		jQuery(".filter-sidebar").addClass("d-none")
	}),


	
	jQuery(".switcher-btn").on("click", function() {
		jQuery(".switcher-wrapper").toggleClass("switcher-toggled")
	}),
  
  jQuery(".close-switcher").on("click", function() {
		jQuery(".switcher-wrapper").removeClass("switcher-toggled")
	}),


	jQuery('#theme1').click(theme1);
    jQuery('#theme2').click(theme2);
    jQuery('#theme3').click(theme3);
    jQuery('#theme4').click(theme4);
    jQuery('#theme5').click(theme5);
    jQuery('#theme6').click(theme6);
    jQuery('#theme7').click(theme7);
    jQuery('#theme8').click(theme8);
    jQuery('#theme9').click(theme9);
    jQuery('#theme10').click(theme10);
    jQuery('#theme11').click(theme11);
    jQuery('#theme12').click(theme12);
    jQuery('#theme13').click(theme13);
    jQuery('#theme14').click(theme14);
    jQuery('#theme15').click(theme15);

    function theme1() {
      jQuery('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
      jQuery('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
      jQuery('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
      jQuery('body').attr('class', 'bg-theme bg-theme4');
    }
	
	function theme5() {
      jQuery('body').attr('class', 'bg-theme bg-theme5');
    }
	
	function theme6() {
      jQuery('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
      jQuery('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
      jQuery('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
      jQuery('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
      jQuery('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
      jQuery('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
      jQuery('body').attr('class', 'bg-theme bg-theme12');
    }

	function theme13() {
		jQuery('body').attr('class', 'bg-theme bg-theme13');
	  }
	  
	  function theme14() {
		jQuery('body').attr('class', 'bg-theme bg-theme14');
	  }
	  
	  function theme15() {
		jQuery('body').attr('class', 'bg-theme bg-theme15');
	  }



});