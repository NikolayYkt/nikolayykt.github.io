(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {

		
		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Large-Carousel.default', function(){
				
			/*-------------------------------------------------*/
			/* =  OWL carousell
			/*-------------------------------------------------*/

			var owlWrap = $('.owl-wrapper');

			if (owlWrap.length > 0) {

				if (jQuery().owlCarousel) {
					owlWrap.each(function(){

						var carousel= $(this).find('.owl-carousel'),
							dataNum = $(this).find('.owl-carousel').attr('data-num'),
							dataNum2,
							dataNum3;

						if ( dataNum == 1 ) {
							dataNum2 = 1;
							dataNum3 = 1;
						} else if ( dataNum == 2 ) {
							dataNum2 = 2;
							dataNum3 = dataNum - 1;
						} else if (dataNum > 5) {
							dataNum2 = dataNum - 2;
							dataNum3 = dataNum - 4;
						} else {
							dataNum2 = dataNum - 1;
							dataNum3 = dataNum - 2;
						}

						carousel.owlCarousel({
							autoPlay: 10000,
							navigation : true,
							navigationText: [
								"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176;' xml:space='preserve'><g> <path d='M2.34,82.34l80-80c2.29-2.29,5.71-2.96,8.72-1.73C94.05,1.84,96,4.77,96,8v40h142.48v16H88c-4.41,0-8-3.59-8-8V27.31 L19.32,88L80,148.69V120c0-4.41,3.59-8,8-8h150.48v16H96v40c0,3.23-1.95,6.16-4.95,7.39C90.07,175.81,89.03,176,88,176 c-2.08,0-4.13-0.82-5.66-2.35l-80-80C-0.78,90.53-0.78,85.46,2.34,82.34z'/></g></svg> <svg version='1.1' class='hover-svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176;' xml:space='preserve'><g><path d='M2.34,82.34l80-80c2.29-2.29,5.71-2.96,8.72-1.73C94.05,1.84,96,4.77,96,8v40h142.48v16H88c-4.41,0-8-3.59-8-8V27.31 L19.32,88L80,148.69V120c0-4.41,3.59-8,8-8h150.48v16H96v40c0,3.23-1.95,6.16-4.95,7.39C90.07,175.81,89.03,176,88,176 c-2.08,0-4.13-0.82-5.66-2.35l-80-80C-0.78,90.53-0.78,85.46,2.34,82.34z'/></g></svg>",
								"<svg version='1.1' class='hover-svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176' xml:space='preserve'><g><path d='M236.14,93.66l-80,80c-2.29,2.29-5.71,2.96-8.72,1.73c-2.99-1.23-4.95-4.16-4.95-7.39v-40H0l0-16h150.48c4.41,0,8,3.59,8,8 v28.69L219.17,88l-60.69-60.69V56c0,4.41-3.59,8-8,8H0l0-16h142.48V8c0-3.23,1.95-6.16,4.95-7.39c0.99-0.42,2.03-0.61,3.05-0.61 c2.08,0,4.13,0.82,5.66,2.35l80,80C239.26,85.47,239.26,90.54,236.14,93.66z'/></g></svg><svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176' xml:space='preserve'><g><path d='M236.14,93.66l-80,80c-2.29,2.29-5.71,2.96-8.72,1.73c-2.99-1.23-4.95-4.16-4.95-7.39v-40H0l0-16h150.48c4.41,0,8,3.59,8,8 v28.69L219.17,88l-60.69-60.69V56c0,4.41-3.59,8-8,8H0l0-16h142.48V8c0-3.23,1.95-6.16,4.95-7.39c0.99-0.42,2.03-0.61,3.05-0.61 c2.08,0,4.13,0.82,5.66,2.35l80,80C239.26,85.47,239.26,90.54,236.14,93.66z'/></g></svg>"
							],
							items : dataNum,
							itemsDesktop : [1199,dataNum2],
							itemsDesktopSmall : [991,dataNum2],
							itemsTablet : [768, dataNum3]
						});

					});
				}
			}
			
		});
		
		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Small-Carousel.default', function(){
				
			/*-------------------------------------------------*/
			/* =  OWL carousell
			/*-------------------------------------------------*/

			var owlWrap = $('.owl-wrapper');

			if (owlWrap.length > 0) {

				if (jQuery().owlCarousel) {
					owlWrap.each(function(){

						var carousel= $(this).find('.owl-carousel'),
							dataNum = $(this).find('.owl-carousel').attr('data-num'),
							dataNum2,
							dataNum3;

						if ( dataNum == 1 ) {
							dataNum2 = 1;
							dataNum3 = 1;
						} else if ( dataNum == 2 ) {
							dataNum2 = 2;
							dataNum3 = dataNum - 1;
						} else if (dataNum > 5) {
							dataNum2 = dataNum - 2;
							dataNum3 = dataNum - 4;
						} else {
							dataNum2 = dataNum - 1;
							dataNum3 = dataNum - 2;
						}

						carousel.owlCarousel({
							autoPlay: 10000,
							navigation : true,
							navigationText: [
								"<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176;' xml:space='preserve'><g> <path d='M2.34,82.34l80-80c2.29-2.29,5.71-2.96,8.72-1.73C94.05,1.84,96,4.77,96,8v40h142.48v16H88c-4.41,0-8-3.59-8-8V27.31 L19.32,88L80,148.69V120c0-4.41,3.59-8,8-8h150.48v16H96v40c0,3.23-1.95,6.16-4.95,7.39C90.07,175.81,89.03,176,88,176 c-2.08,0-4.13-0.82-5.66-2.35l-80-80C-0.78,90.53-0.78,85.46,2.34,82.34z'/></g></svg> <svg version='1.1' class='hover-svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176;' xml:space='preserve'><g><path d='M2.34,82.34l80-80c2.29-2.29,5.71-2.96,8.72-1.73C94.05,1.84,96,4.77,96,8v40h142.48v16H88c-4.41,0-8-3.59-8-8V27.31 L19.32,88L80,148.69V120c0-4.41,3.59-8,8-8h150.48v16H96v40c0,3.23-1.95,6.16-4.95,7.39C90.07,175.81,89.03,176,88,176 c-2.08,0-4.13-0.82-5.66-2.35l-80-80C-0.78,90.53-0.78,85.46,2.34,82.34z'/></g></svg>",
								"<svg version='1.1' class='hover-svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176' xml:space='preserve'><g><path d='M236.14,93.66l-80,80c-2.29,2.29-5.71,2.96-8.72,1.73c-2.99-1.23-4.95-4.16-4.95-7.39v-40H0l0-16h150.48c4.41,0,8,3.59,8,8 v28.69L219.17,88l-60.69-60.69V56c0,4.41-3.59,8-8,8H0l0-16h142.48V8c0-3.23,1.95-6.16,4.95-7.39c0.99-0.42,2.03-0.61,3.05-0.61 c2.08,0,4.13,0.82,5.66,2.35l80,80C239.26,85.47,239.26,90.54,236.14,93.66z'/></g></svg><svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 238.48 176' style='enable-background:new 0 0 238.48 176' xml:space='preserve'><g><path d='M236.14,93.66l-80,80c-2.29,2.29-5.71,2.96-8.72,1.73c-2.99-1.23-4.95-4.16-4.95-7.39v-40H0l0-16h150.48c4.41,0,8,3.59,8,8 v28.69L219.17,88l-60.69-60.69V56c0,4.41-3.59,8-8,8H0l0-16h142.48V8c0-3.23,1.95-6.16,4.95-7.39c0.99-0.42,2.03-0.61,3.05-0.61 c2.08,0,4.13,0.82,5.66,2.35l80,80C239.26,85.47,239.26,90.54,236.14,93.66z'/></g></svg>"
							],
							items : dataNum,
							itemsDesktop : [1199,dataNum2],
							itemsDesktopSmall : [991,dataNum2],
							itemsTablet : [768, dataNum3]
						});

					});
				}
			}
			
		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Grid-Block.default', function(){
			/*-------------------------------------------------*/
			/* =  posts isotope
			/*-------------------------------------------------*/
			
			$('.iso-call').isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:750,
					easing:'linear'
				}
			});
	
			$(window).on('resize', function(){
	
				$('.iso-call').isotope({ 
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Grid-Standard.default', function(){
			/*-------------------------------------------------*/
			/* =  posts isotope
			/*-------------------------------------------------*/
			
			$('.iso-call').isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:750,
					easing:'linear'
				}
			});
	
			$(window).on('resize', function(){
	
				$('.iso-call').isotope({ 
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Magic-Block.default', function(){
			/*-------------------------------------------------*/
			/* =  posts isotope
			/*-------------------------------------------------*/
			
			$('.iso-call').isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:750,
					easing:'linear'
				}
			});
	
			$(window).on('resize', function(){
	
				$('.iso-call').isotope({ 
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Most-Commented.default', function(){
			/*-------------------------------------------------*/
			/* =  posts isotope
			/*-------------------------------------------------*/
			
			$('.iso-call').isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:750,
					easing:'linear'
				}
			});
	
			$(window).on('resize', function(){
	
				$('.iso-call').isotope({ 
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Fullgrid-Block.default', function(){
			/*-------------------------------------------------*/
			/* =  posts isotope
			/*-------------------------------------------------*/
			
			$('.iso-call').isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:750,
					easing:'linear'
				}
			});
	
			$(window).on('resize', function(){
	
				$('.iso-call').isotope({ 
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Fullgrid-Block2.default', function(){
			/*-------------------------------------------------*/
			/* =  posts isotope
			/*-------------------------------------------------*/
			
			$('.iso-call').isotope({
				filter:'*',
				layoutMode:'masonry',
				animationOptions:{
					duration:750,
					easing:'linear'
				}
			});
	
			$(window).on('resize', function(){
	
				$('.iso-call').isotope({ 
					filter:'*',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});
			
			/*-------------------------------------------------*/
			/* =  Home 5 background change with hoverState class
			/*-------------------------------------------------*/
			
			$('.fixed-images .overlay-post2').on('mouseenter', function(){
				$('.fixed-images .overlay-post2').removeClass('hoverState');
				$(this).addClass('hoverState');
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Slider-Block.default', function(){

			/*-------------------------------------------------*/
			/* =  Flexslider for home 2 & home 3
			/*-------------------------------------------------*/

			
			$('.flexslider').flexslider({
				animation: "fade",
				customDirectionNav: $(".custom-navigation a")
			});

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/Mountania-Global-Widgets-Slider-Block2.default', function(){

			/*-------------------------------------------------*/
			/* =  Flexslider for home 2 & home 3
			/*-------------------------------------------------*/

			
			$('.flexslider').flexslider({
				animation: "fade",
				customDirectionNav: $(".custom-navigation a")
			});

		});

	});

})(jQuery);