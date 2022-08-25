(function($){
	"use strict";

	$(window).on('elementor/frontend/init', function () {

		
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
      /* end Form email */	
            /* ova_archive_sev_slide */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_sev_slide.default', function(){
         $(".ova_sev_slide").each(function(){
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
                nav: owlsl_ops.nav,
                dots: owlsl_ops.dots,
                thumbs: owlsl_ops.thumbs,
                autoplayHoverPause: owlsl_ops.autoplayHoverPause,
                slideBy: owlsl_ops.slideBy,
                smartSpeed: owlsl_ops.smartSpeed,
                navText:[
                '<i class="fa fa-angle-left" ></i>',
                '<i class="fa fa-angle-right" ></i>'
                ],
                responsive: responsive_value,
              });

            });
      });
      /* end ova_archive_sev_slide */ 

          /* Project Grid */
      elementorFrontend.hooks.addAction('frontend/element_ready/ova_sev_grid.default', function(){
         var slide = $('.ovapo_project_slide .grid ');
         var data = $('.ovapo_project_slide .grid ').data('owl');

         if (slide.length > 0) {
            slide.owlCarousel(
               data
               );
         }

         $('.ovapo_project_grid .button-filter button:first-child').addClass('active');
         var button = $('.ovapo_project_grid .button-filter');
         button.each(function() {
            button.on('click', 'button', function() {
               button.find('.active').removeClass('active');
               $(this).addClass('active');
            });
         });

         button.on('click', 'button', function(e) {
            e.preventDefault();

            var filter = $(this).data('filter');
            var order = $(this).data('order');
            var orderby = $(this).data('orderby');
            var number_post = $(this).data('number_post');
            var first_term = $(this).data('first_term');
            var term_id_filter_string = $(this).data('term_id_filter_string');
      
            $(this).parents('.ovapo_project_grid').find('.wrap_loader').fadeIn(100);



            

            $.ajax({
               url: ajax_object.ajax_url,
               type: 'POST',
               data: ({
                  action: 'filter_elementor_grid',
                  filter: filter,
                  order: order,
                  orderby: orderby,
                  number_post: number_post,
                  first_term: first_term,
                  term_id_filter_string: term_id_filter_string,
                  
               }),
               success: function(response){

                  $('.ovapo_project_grid .wrap_loader').fadeOut(200);

                  var items = $('.ovapo_project_grid .items');

                  items.html( response ).fadeIn(300);
                  feather.replace();


                  items.trigger('destroy.owl.carousel');
                  items.owlCarousel(data);


               },
            })
         });

         $(window).resize(function() {
             var items = $('.ovapo_project_grid .items');

                  // items.html( response ).fadeIn(300);
                  // feather.replace();


                  items.trigger('destroy.owl.carousel');
                  items.owlCarousel(data);
         });

      }); 

   });
 
})(jQuery);
