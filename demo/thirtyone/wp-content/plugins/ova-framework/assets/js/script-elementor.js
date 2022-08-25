(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
        
		
	/* Menu Shrink */
        elementorFrontend.hooks.addAction('frontend/element_ready/ova_menu.default', function(){
        	

			$( '.ova_menu_clasic .ova_openNav' ).on( 'click', function(){
				$( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).removeClass( 'hide' );
				$( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).addClass( 'show' );
				$( '.ova_menu_clasic  .ova_closeCanvas' ).addClass( 'show');

				
				$( 'body' ).css( 'background-color', 'rgba(0,0,0,0.6)' );
				
			});

			$( '.ova_menu_clasic  .ova_closeNav' ).on( 'click', function(){
				$( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).removeClass( 'show' );
				$( this ).closest('.ova_wrap_nav').find( '.ova_nav' ).addClass( 'hide' );
				$( '.ova_closeCanvas' ).removeClass( 'show');

				$('.ova_menu_clasic .menu .dropdown-menu').css( 'display','none' );
				
				$( 'body' ).css( 'background-color', 'transparent' );
				
			});

			// Display in mobile
			$( '.ova_menu_clasic li.menu-item button.dropdown-toggle').off('click').on( 'click', function() {
			    $(this).parent().find('.dropdown-menu').first().toggle('fast');
			});

        	if( $('.ovamenu_shrink').length > 0 && $( 'body' ).data('elementor-device-mode') == 'desktop' ){
				
				if( !$('.show_mask_header').hasClass( 'mask_header_shrink' ) ){
					$( '<div class="show_mask_header mask_header_shrink" style="position: relative; height: 0;"></div>' ).insertAfter('.ovamenu_shrink');
					

				}

				
				var header = $('.ovamenu_shrink');
				var header_shrink_height = header.height();
				

				$(window).scroll(function () {
						
						var scroll = $(this).scrollTop();

						if (scroll >= header_shrink_height+150 ) {
							header.addClass( 'active_fixed' );
							$('.mask_header_shrink').css('height',header_shrink_height);
							$('#active_fixed').css('margin', '0');
				        } else {
				            header.removeClass('active_fixed');
				            $('.mask_header_shrink').css('height','0');
				            $('#active_fixed').css('margin', '');
				        }
				});
			}

			if( $('.ovamenu_shrink_mobile').length > 0 && $( 'body' ).data('elementor-device-mode') != 'desktop' ){
				
				if( !$('.show_mask_header_mobile').hasClass( 'mask_header_shrink_mobile' ) ){
					$( '<div class="show_mask_header_mobile mask_header_shrink_mobile" style="position: relative; height: 0;"></div>' ).insertAfter('.ovamenu_shrink_mobile');
					
				}
				
				var header = $('.ovamenu_shrink_mobile');
				var header_shrink_height = header.height();
				

				$(window).scroll(function () {
						
						var scroll = $(this).scrollTop();

						if (scroll >= header_shrink_height+150 ) {
							header.addClass( 'active_fixed' );
							$('.mask_header_shrink_mobile').css('height',header_shrink_height);
							$('#active_fixed').css('margin', '0');
				        } else {
				            header.removeClass('active_fixed');
				            $('.mask_header_shrink_mobile').css('height','0');
				            $('#active_fixed').css('margin', '');
				        }
				});
			}
			$(window).resize(function(){
				if( $(window).width() > 1024 ){
					$('.ova_menu_clasic .menu .dropdown-menu').css( 'display','block' );
					$('.ova_closeCanvas').css('display', 'none');
					$( 'body' ).css( 'background-color', 'transparent' );
				}else{
					$('.ova_closeCanvas').css('display', 'block');
					$('.ova_menu_clasic .menu .dropdown-menu').css( 'display','none' );
				}
			});

        });

        /* End Shrink menu */

        /* Search Popup */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_search_popup.default', function(){
			$( '.ova_wrap_search_popup i' ).on( 'click', function(){
				$( this ).closest( '.ova_wrap_search_popup' ).addClass( 'show' );
			});

			$( '.btn_close' ).on( 'click', function(){
				$( this ).closest( '.ova_wrap_search_popup' ).removeClass( 'show' );

			});
		});
		/* end Search Popup */

		/* Skill bar */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_skill_bar.default', function(){
			$('.skillbar').appear();
			$(document.body).on( 'appear', '.skillbar', function(){
				jQuery(this).find('.skillbar-bar').animate({
					width:jQuery(this).attr('data-percent'),
				},3000);

				jQuery(this).find('.percent').animate({
					left: jQuery(this).attr('data-percent') 
				},{
					duration: 3000,
					step: function( now, fx ){
						// console.log( 'now: ' + now );
						var data = Math.round(now);
						$(this).find('.relative span').html(data + '%');
					}

				});

			});

		});
		/* end skill bar */


		/* Form email */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_form_mail.default', function(){
			$('.ova-form-mail input[type="submit"]').on('click', function(e){
				var that = $(this);
				var flag = true;
				$('.ova-form-mail .con .input .error').css({'display':'none'});
				that.closest('.ova-form-mail').find('.field').each(function( index ){
					if( $(this).hasClass('required') && $(this).val() == '' ){
						flag = false;
						$(this).parent('.input').children('.error').css({'display':'block'});
					}
				});

				if( ! flag ){
					e.preventDefault();
					return false;
				}
				
			})
		});
		/* end email */


		/* testimonial */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_testimonial.default', function(){
			$(".slide-testimonials").each(function(){
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		              items:1,
		              nav:false
		            },
		            576:{
		              items:1

		            },
		            992:{
		              items:1
		            },
		            1170:{
		              items:owlsl_ops.items
		            }
		        };
		        
		        owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          nav: owlsl_ops.nav,
		          dots: owlsl_ops.dots,
		          thumbs: owlsl_ops.thumbs,
		          autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          slideBy: owlsl_ops.slideBy,
		          smartSpeed: owlsl_ops.smartSpeed,
		          navText:[
		          '<i class="lnr lnr-chevron-left" ></i>',
		          '<i class="lnr lnr-chevron-right" ></i>'
		          ],
		          responsive: responsive_value,
		        });

		      });
		});
		/* end testimonial */

		/* contact */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_contact_slide.default', function(){
			$(".slide-contact").each(function(){
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		              items:1,
		              nav:false
		            },
		            576:{
		              items:1

		            },
		            992:{
		              items:2
		            },
		            1170:{
		              items:owlsl_ops.items
		            }
		        };
		        
		        owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          nav: true,
		          dots: owlsl_ops.dots,
		          thumbs: owlsl_ops.thumbs,
		          autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          slideBy: owlsl_ops.slideBy,
		          smartSpeed: owlsl_ops.smartSpeed,
		          navText:[
		          '<i class="arrow_carrot-left" ></i>',
		          '<i class="arrow_carrot-right" ></i>'
		          ],
		          responsive: responsive_value,
		        });

		      });
		});
		/* end contact */

		/* Time Coundown */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_time_countdown.default', function(){
			
			var date = $('.due_date').data('day').split(' ');
			var day = date[0].split('-');
			var time = date[1].split(':');
			var date_countdown = new Date( day[0], day[1]-1, day[2], time[0], time[1] );
			$('.due_date').countdown({until: date_countdown, format: 'DHMS'});
			
		});
      // end time countdown 
      

      /* ova_history */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_history.default', function(){
			

			$(window).scroll(function() {
				var wS = $(this).scrollTop();
	      		$('.ova-history .wp-item').each(function(){
	      			var hT = $(this).offset().top;
				    var hH = $(this).outerHeight();
				    var wH = $(window).height();
				    
				   if (wS + 250 > (hT+hH-wH)){
				      $(this).addClass('active');
				   }
		  		})
			});
			
		});
      // end ova_history
      
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_our_skill.default', function(){


      $( ".circle" ).each(function( index ) {
        var circle = $(this);
        var size_value = circle.attr('data-size');
        var color_value = circle.attr('data-color');
        var color_empty = circle.attr('data-empty');
        $(circle).circleProgress({
         value: 0,
         size: size_value,
         emptyFill: color_empty,
       });

      });

      var circles = $('.circle');

      circles.appear({ force_process: true });

      circles.on('appear', function() {
        var circle = $(this);
        var number_value = parseInt(circle.attr('data-number'));
        console.log(number_value);
        var size_value = circle.attr('data-size');
        var color_value = circle.attr('data-color');
        var color_empty = circle.attr('data-empty');
        var time = parseInt(circle.attr('data-time'));
        if (!circle.data('inited')) {
          circle.circleProgress({
            value: (number_value) / 100,
            size: size_value,
            fill: {color:color_value},
            emptyFill: color_empty,
            animation: { duration: time},
          }).on('circle-animation-progress', function(event, progress, stepValue) {
            $(this).find('strong').html(Math.round(100 * stepValue) + '%');
          });
          circle.data('inited', true);
        }
      });

    });
    /* end price table  tab */

    /* Tabs */
	elementorFrontend.hooks.addAction('frontend/element_ready/ova_tabs.default', function(){

		$( ".ova_tab_items" ).on( "click" , function(){
			var id = $(this).data("id");
			$( ".ova_tab_items" ).removeClass( "active" );
			$( ".session-pricing" ).hide();
			$( "#"+id ).show();
			$( "."+id ).addClass('active');
		});
		$( ".ova_tab_items.active" ).click();

		$( ".ova_tab_items_v2" ).on( "click" , function(){
			var id = $(this).data("id");
			$( ".ova_tab_items_v2" ).removeClass( "active" );
			$( ".ova_session_item" ).hide();
			$( "#"+id ).show();
			$( "."+id ).addClass('active');
		});
		$( ".ova_tab_items_v2.active" ).click();
		
	});
	/* end Tabs */

	/* Products */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_products.default', function(){
			$(".ova_product_carousel").each(function(){
		        var owlsl = $(this) ;
		        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

		        var responsive_value = {
		            0:{
		              items:1,
		              nav:false
		            },
		            576:{
		              items:1

		            },
		            640:{
		              items:2
		            },
		            800:{
		              items:3
		            },
		            // 1024:{
		            //   items:3
		            // },
		            1170:{
		              items:owlsl_ops.items
		            }
		        };
		        
		        owlsl.owlCarousel({
		          autoWidth: owlsl_ops.autoWidth,
		          margin: owlsl_ops.margin,
		          items: owlsl_ops.items,
		          loop: owlsl_ops.loop,
		          autoplay: owlsl_ops.autoplay,
		          autoplayTimeout: owlsl_ops.autoplayTimeout,
		          center: owlsl_ops.center,
		          nav: owlsl_ops.nav,
		          dots: owlsl_ops.dots,
		          thumbs: owlsl_ops.thumbs,
		          autoplayHoverPause: owlsl_ops.autoplayHoverPause,
		          slideBy: owlsl_ops.slideBy,
		          smartSpeed: owlsl_ops.smartSpeed,
		          navText:[
		          '<i class="lnr lnr-chevron-left" ></i>',
		          '<i class="lnr lnr-chevron-right" ></i>'
		          ],
		          responsive: responsive_value,
		        });

		      });
		});
	/* end Products */


		/* before after */
		elementorFrontend.hooks.addAction('frontend/element_ready/ova_before_after.default', function(){
			$(".ova_before_after").each(function(){

				var divisor = document.getElementById("divisor"),
				handle = document.getElementById("handle"),
				slider = document.getElementById("slider");

				$("#slider").on("input change", (e)=>{
					handle.style.left = slider.value+"%";
					divisor.style.width = slider.value+"%";
				});

	

		      });
		});
		/* before after */



		jQuery( '.ova_toggle_custom_js_autoglow' ).find('.elementor-toggle-item').first().find( '.elementor-tab-title' ).addClass( 'elementor-active' );
		jQuery( '.ova_toggle_custom_js_autoglow' ).find('.elementor-toggle-item').first().find( '.elementor-tab-content' ).css( 'display','block' );


   });

})(jQuery);
