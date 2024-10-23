<?php 

//Custom Style Frontend
if(!function_exists('progrisaas_color_scheme')){
    function progrisaas_color_scheme(){
        $color_scheme = '';

        //Main Color
        if( progrisaas_get_option('main_color') != '#ff6b52' ){
            $color_scheme .= 
            '
            /****Main Color****/

        	/*Background Color*/
            blockquote:before,
            .bg-primary,
            .octf-btn,
            .main-navigation > ul > li > a:before, .vertical-main-navigation > ul > li > a:before,
            .post-box .btn-play:hover,
            .page-pagination li span,.page-pagination li a:hover,
            .blog-post .tagcloud a:hover,
            .related-posts .btn-detail:hover, .ot-blog-slider .btn-detail:hover,
            .widget .tagcloud a:hover,
            .widget-area .widget_categories ul li a:before,.widget-area .widget_product_categories ul li a:before,.widget-area .widget_archive ul li a:before,
            .search-form .search-submit,
            .service-menu-v2 ul li a:before,
            .ot-view-stacked .ot-icon-box__icon,
            .ot-blockquote-slider .custom-nav [class*=owl-]:hover,
            .career-link .elementor-icon-list-item a:before,
            .s2 .cart-content:hover,
            .mc4wp-form-fields .main-form input[type=submit]:hover,
            #back-to-top,
            .woocommerce ul.products li.product .added_to_cart, .woocommerce ul.products li.product .product_type_grouped, .woocommerce-page ul.products li.product .added_to_cart, 
            .woocommerce-page ul.products li.product .product_type_grouped,
            .woocommerce-product-details__short-description ul li:before,
            .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce input.button, .woocommerce button.button.alt.disabled,
            .woocommerce button.button,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range, 
            .wc-pagination .page-pagination li a:hover,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{background:'.progrisaas_get_option('main_color').';}

            /*Border Color*/
            .post-box .btn-play:hover,
            .page-pagination li span,.page-pagination li a:hover,
            .blog-post .tagcloud a:hover,
            .widget .tagcloud a:hover,
            .wc-pagination .page-pagination li a:hover,
            .ot-progress-circle__inner:after{border-color:'.progrisaas_get_option('main_color').';}
            .woocommerce-message,
            .woocommerce-info{border-top-color:'.progrisaas_get_option('main_color').';}

            /*Color*/
            .text-primary,
            a:hover, a:focus, a:active,
            .main-navigation > ul > li.current-menu-item > a,.vertical-main-navigation ul > li.current-menu-item > a,
            .main-navigation ul > li > a:hover, .vertical-main-navigation ul > li > a:hover,
            .main-navigation ul > li.menu-item-has-children:hover > a,
            .main-navigation ul > li.menu-item-has-children:hover > a:after,
            .main-navigation ul > li.menu-item-has-children:hover > a:after,.main-navigation ul > li.current-menu-item > a:after,
            .main-navigation ul li li a:hover,.main-navigation ul ul li.current-menu-item > a,
            .header_mobile .mobile_nav .mobile_mainmenu li li a:hover,.header_mobile .mobile_nav .mobile_mainmenu ul > li > ul > li.current-menu-ancestor > a,
            .header_mobile .mobile_nav .mobile_mainmenu > li > a:hover, .header_mobile .mobile_nav .mobile_mainmenu > li.current-menu-item > a,.header_mobile .mobile_nav .mobile_mainmenu > li.current-menu-ancestor > a,
            .page-header .breadcrumbs li a:hover,
            .post-box .entry-meta > span.comment-num i,
            .post-box .entry-title a:hover,
            .post-box .link-box a:hover,
            .post-box .link-box i,
            .post-box .quote-box i,
            .post-box .btn-readmore > a,
            .blog-post .entry-post-meta .comment-num i,
            .blog-post blockquote:before,
            .drop-cap span,
            .post-nav .post-prev a:hover h6,
            .post-nav .post-next a:hover h6,
            .comments-area .comment-item .comment-meta .comment-author a,
            .comment-respond .comment-reply-title small a:hover,
            .widget-area .widget ul:not(.recent-news) > li a:hover,
            .widget-area .widget_categories ul li a:hover,.widget-area .widget_product_categories ul li a:hover,.widget-area .widget_archive ul li a:hover,
            .widget .recent-news .entry-header h6 a:hover,
            .service-menu-v2 ul li a:hover,
            .ot-heading__sub,
            .ot-title-link a:hover,
            .ot-icon-box__content .icon-box-title a:hover,
            .ot-image-box__content .image-box-title a:hover,
            .service-box__content .service-box-title a:hover,
            .style-1 .ot-acc-item.current .ot-acc-item__title,
            .ot-countdown li span,
            .ot-countdown li.seperator,
            .ot-blockquote__author,
            .ot-form-fields-wrapper .ot-remember-me [type=checkbox]:not(:checked) + span:after,.ot-form-fields-wrapper .ot-remember-me [type=checkbox]:checked + span:after, .ot-form-fields-wrapper .ot-policy-term [type=checkbox]:not(:checked) + span:after,.ot-form-fields-wrapper .ot-policy-term [type=checkbox]:checked + span:after,
            .video-popup a,
            .video-popup > span,
            .ot-tab-title__item:hover h5, .ot-tab-title__item.active h5,
            .ot-tab-title__item:hover .tab-icon, .ot-tab-title__item.active .tab-icon,
            .ot-pricing-table.--main-color .ot-pricing-table__price,
            .ot-pricing-table.--main-color .ot-pricing-table__features-list ul li:before, .ot-pricing-table.--main-color .ot-pricing-table__features-list ol li:before,
            .ot-pricing-table.--main-color .octf-price-link-detail,
            .ot-cpt-text span.ot-flaticon-close,
            .projects-grid.style-2 .portfolio-info h5 a:hover,.ot-project-slider.style-2 .portfolio-info h5 a:hover,
            .projects-box .portfolio-info .portfolio-btn a:hover,
            .ot-testimonial-s1__item .tcontent .ticon,
            .ot-team__info span,
            .wpcf7 .main-form .wpcf7-checkbox [type=checkbox]:not(:checked) + span:after,.wpcf7 .main-form .wpcf7-checkbox [type=checkbox]:checked + span:after,
            .octf-cta-header .toggle_search i:hover,
            .cart-content:hover,
            .mc4wp-form-fields .main-form [type=checkbox]:not(:checked) + span:after,
            .mc4wp-form-fields .main-form [type=checkbox]:checked + span:after,
            .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta strong,
            .woocommerce table.shop_table td.product-price, .woocommerce table.shop_table td.product-subtotal,
            .woocommerce-message:before,
            .woocommerce-info:before,
            .woocommerce .site ul.product_list_widget li a:not(.remove):hover,
            .woocommerce .woocommerce-widget-layered-nav-list li a:hover,
            .woocommerce div.product p.price, 
            .woocommerce div.product span.price{color: '.progrisaas_get_option('main_color').';}

            /*Other*/
            .title-link{background-image: linear-gradient(0deg, #fff, '.progrisaas_get_option('main_color').');}
            .vertical-main-navigation ul > li.current-menu-item > a span.arrow svg,
            .vertical-main-navigation ul > li.menu-item-has-children > a:hover span.arrow svg,
            .ot-acc-item.current .ot-acc-item__title svg,
            .style-1 .ot-acc-item.current .ot-acc-item__title svg,
            .ot-tab-title__item:hover .tab-icon svg, 
            .ot-tab-title__item.active .tab-icon svg{fill: '.progrisaas_get_option('main_color').';}

			';
        }

        //Second Color
        if( progrisaas_get_option('second_color') != '#1080d0' ){
            $color_scheme .= 
            '
            /****Second Color****/

            /*Background Color*/
            .bg-second,
            .octf-btn-second,
            .post-box .entry-date:hover,
            .owl-theme .owl-nav [class*=owl-]:hover,
            .post-nav .post-prev a:hover .post-nav-btn,
            .post-nav .post-next a:hover .post-nav-btn,
            .search-form .search-submit:hover,
            .service-box__number span,
            .ot-switcher span.active,
            .ot-progress-line__inner .progress-bar,
            .projects-grid.style-2 .portfolio-info .portfolio-cates a:before,.ot-project-slider.style-2 .portfolio-info .portfolio-cates a:before,
            .mc4wp-form-fields .main-form input[type=submit],
            .woocommerce-mini-cart__buttons a.button.wc-forward{background:'.progrisaas_get_option('second_color').';}

            /*Border Color*/
            .ot-icon-box__content ul li:before, .ot-icon-box__content ol li:before{border-color:'.progrisaas_get_option('second_color').';}

            /*Color*/
            .text-second,
            a,
            a:visited,
            .page-header .breadcrumbs li a,
            .post-box .entry-date,
            .post-box .entry-meta > span.byline i,
            .blog-post .entry-post-meta .byline i,
            .blog-post .share-post a,
            .comments-area .comment-item .comment-reply-link,
            .comment-form .logged-in-as a:hover,
            .widget-area .widget .widget-title,
            .widget-area .widget_categories ul li a:hover + span,.widget-area .widget_product_categories ul li a:hover + span,.widget-area .widget_archive ul li a:hover + span,
            .author-widget_social a,
            .ot-icon-box__icon i,
            .ot-icon-box__content .icon-box-btn a:hover,
            .ot-image-box__content .image-box-btn a:hover,
            .ot-counter span,
            .ot-message-box__icon,
            .ot-progress-line__inner .ppercent,
            .ot-progress-circle__inner > span,
            .ot-pricing-table__icon i,
            .ot-pricing-table.--second-color .ot-pricing-table__price,
            .ot-pricing-table.--second-color .ot-pricing-table__features-list ul li:before, .ot-pricing-table.--second-color .ot-pricing-table__features-list ol li:before,
            .ot-pricing-table.--second-color .octf-price-link-detail,
            .projects-grid.style-2 .portfolio-info .portfolio-cates a,.ot-project-slider.style-2 .portfolio-info .portfolio-cates a,
            .ot-team__info .team-social a,
            .woocommerce .woocommerce-Price-amount,
            .woocommerce .widget_price_filter .price_slider_amount button.button{color: '.progrisaas_get_option('second_color').';}

            /*Other*/
            .ot-icon-box__icon svg,
            .ot-pricing-table__icon svg,
            .ot-team__info .team-social a svg{fill: '.progrisaas_get_option('second_color').';}

            ';
        }

        if(! empty($color_scheme)){
			echo '<style type="text/css">'.$color_scheme.'</style>';
		}
    }
}
add_action('wp_head', 'progrisaas_color_scheme');
