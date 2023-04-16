(function($){
	"use strict";

	$(document).ready(function($) {

	/* global google: false */
	/*jshint -W018 */
	
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
					lazyLoad : true,
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

	/*-------------------------------------------------*/
	/* =  services toggle content
	/*-------------------------------------------------*/

    let toggleBtn = $('div.services-title');
    
    toggleBtn.on('click', function() {
		$(this).toggleClass('active');
		$(this).next().slideToggle();
	});
	

	/* ---------------------------------------------------------------------- */
	/*	Header animate after scroll
	/* ---------------------------------------------------------------------- */
	
	var docElem = document.documentElement,
		didScroll = false,
		changeHeaderOn = 120;
		document.querySelector( 'header, a.go-top' );
	function init() {
		window.addEventListener( 'scroll', function() {
			if( !didScroll ) {
				didScroll = true;
				scrollPage();
			}
		}, false );
	}
	
	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			$( 'header' ).addClass('active');
		}
		else {
			$( 'header' ).removeClass('active');
		}
		didScroll = false;
	}
	
	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}
	
	init();
	
	/*-------------------------------------------------*/
	/* =  Scroll to TOP
	/*-------------------------------------------------*/

	var animateTopButton = $('.go-top'),
		htmBody = $('html, body');
		
	animateTopButton.on('click', function(){
		htmBody.animate({scrollTop: 0}, 'slow');
		return false;
	});
	
	/*-------------------------------------------------*/
	/* =  Home 5 background change with hoverState class
	/*-------------------------------------------------*/
	
	$('.fixed-images .overlay-post2').on('mouseenter', function(){
		$('.fixed-images .overlay-post2').removeClass('hoverState');
		$(this).addClass('hoverState');
	});
	
	/*-------------------------------------------------*/
	/* =  Flexslider for home 2 & home 3
	/*-------------------------------------------------*/

	
	$('.flexslider').flexslider({
		animation: "fade",
		customDirectionNav: $(".custom-navigation a")
	});

	$('.carousel-section').addClass('loaded-owl');
	$("html, body").animate({scrollTop: 2});
	
	/*-------------------------------------------------*/
	/* =  Open & Close Search Form
	/*-------------------------------------------------*/

	$('a.open-search').on('click', function(event) {
		event.preventDefault();

		$('.search-form-fullscreen').addClass('active');

	});

	$('a.close-search').on('click', function(event) {
		event.preventDefault();

		$('.search-form-fullscreen').removeClass('active');

	});
	
	/*-------------------------------------------------*/
	/* =  check if child exists
	/*-------------------------------------------------*/

	$('a.comment-reply-link').on('click', function() {
		if($('.comments-form').has('#wp-temp-form-div')) {
			$('.comments-form').fadeOut(200);
		}
	});

	$('a#cancel-comment-reply-link, #submit').on('click', function() {
		$('.comments-form').fadeIn(200);
	});

	if($('p.form-submit input').hasClass('logged-in-submit')) {
		$('p.form-submit').addClass('logged-in')
	}
	

	/*-------------------------------------------------*/
	/* =  filter events
	/*-------------------------------------------------*/

	$('ul.filter-block li a').on('click', function(event){
		event.preventDefault();
		let $this = $(this);
		if( !$this.parent('li').hasClass('active') ) {
			$('ul.filter-block li').removeClass('active');
			$this.parent('li').addClass('active');

			let $categoryNameSelected = $this.attr('data-cat').toLowerCase();

			$('#categoryfilter option').val($categoryNameSelected);
			$('#filter').trigger('submit');

			console.log($categoryNameSelected);
		};
	});

	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				$('.upp-overlay').fadeIn(200);
			},
			success:function(data){
				$('.upp-overlay').fadeOut(200);
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
	
	/*-------------------------------------------------*/
	/* =  Mobile menu toggle
	/*-------------------------------------------------*/

	$('a.tooggle-mobile').on('click', function(event) {
		event.preventDefault();

		$(this).toggleClass('active');
		$('.mobile-menu .navbar-nav').slideToggle(400);

	});
	
	$('.mobile-menu li.menu-item-has-children > a').on('click', function(event) {
		event.preventDefault();

		$(this).parent('li').children('ul.sub-menu').slideToggle(400);

	});



	function recalOwlforEditor() {
		
		var owlWrap = $('.block-editor-page .owl-wrapper');

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

		$('.block-editor-page .flexslider').flexslider({
			animation: "fade",
			customDirectionNav: $(".custom-navigation a")
		});
	
	}

	function Resize() {
		$('.block-editor-page').trigger('resize');
	}

	setInterval(Resize, 2000);
	setInterval(recalOwlforEditor, 2000);

});


})(jQuery);

