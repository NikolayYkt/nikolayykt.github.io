jQuery(function() {
    "use strict";

	
	jQuery('.new-arrivals').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		nav:false,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			576:{
				items:2
			},
			768:{
				items:3
			},
			1366:{
				items:4
			},
			1400:{
				items:5
			}
	     },
    	})




		jQuery('.browse-category').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			nav:false,
			dots: false,
			responsive:{
					0:{
						items:1
					},
					576:{
						items:3
					},
					768:{
						items:4
					},
					1366:{
						items:5
					},
					1400:{
						items:6
					}
				 },
			})


			jQuery('.latest-news').owlCarousel({
				loop:true,
				margin:10,
				responsiveClass:true,
				nav:false,
				dots: false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1024:{
						items:3
					 },
					1366:{
						items:4
					 }
				  }
				})


				jQuery('.brands-shops').owlCarousel({
					loop:true,
					margin:0,
					responsiveClass:true,
					nav:false,
					autoplay:true,
					autoplayTimeout:5000,
					dots: false,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1024:{
							items:3
						 },
						1366:{
							items:5
						 }
					  }
					})


					jQuery('.product-gallery').owlCarousel({
						loop:true,
						margin:10,
						responsiveClass:true,
						nav:false,
						dots: false,
						thumbs: true,
						thumbsPrerendered: true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:1
							},
							1000:{
								items:1
							 }
						  }
						})



		
		
   });	 
   

   	jQuery('.wp-block-search__inside-wrapper').append('<div class="position-absolute top-50 end-0 translate-middle"><i class="bx bx-search fs-4 text-white"></i></div>'); 
   	jQuery('.wp-block-search__inside-wrapper').addClass("position-relative blog-search mb-3");
   	jQuery('.wp-block-search__label').addClass("mb-4");
   	jQuery('.widget ul li a').prepend('<i class="bx bx-chevron-right me-1"></i>'); 
    jQuery('.wp-block-latest-comments footer').prepend('<i class="bx bx-comment-detail me-1"></i>');
    jQuery('.dropdown-toggle').attr("href", "#")
    