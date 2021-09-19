<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bleach
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class("bg-theme bg-theme1"); ?>>
	<b class="screen-overlay"></b>
<?php wp_body_open(); ?>
<div class="wrapper">
	<!--start top header wrapper-->
		<div class="header-wrapper bg-dark-1">
			<div class="header-content pb-3 pb-md-0">
				<div class="container">
					<div class="row align-items-center">
						<div class="col col-md-auto">
							<div class="d-flex align-items-center">
								<div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
								</div>
								<div class="logo d-none d-lg-flex">

									<a href="<?php echo home_url();?>">
										<?php $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
										<img src="<?php echo $custom_logo__url[0];?>" class="logo-icon" alt="" />
									</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-md order-4 order-md-2 d-none d-sm-block d-sm-none d-md-block">
							<div class="input-group flex-nowrap px-xl-4">
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<div class="item-forms">
	<input type="text"  class="form-control w-100" placeholder="Поиск по сайту" value="<?php echo get_search_query() ?>" name="s" id="s" />
	</div>
    <div class="item-forms">
	<button class="input-group-text cursor-pointer" type="submit" id="searchsubmit" value="найти"><i class='bx bx-search'></i></button>
</form>
</div>

							</div>
						</div>
						<div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
							<div class="fs-1 text-white"><i class='bx bx-headphone'></i>
							</div>
							<div class="ms-2">
								<p class="mb-0 font-13"><?php echo get_bloginfo('name');?></p>
								<h5 class="mb-0"><?php echo get_bloginfo('description');?></h5>
							</div>
						</div>
						<div class="col col-md-auto order-2 order-md-4">
							<div class="top-cart-icons">
								<nav class="navbar navbar-expand">
									<ul class="navbar-nav ms-auto">
										<li class="nav-item"><a href="<?php echo wp_registration_url();?>" class="nav-link cart-link"><i class='bx bx-user'></i></a>
										</li>
										<li class="nav-item"><a href="javascript:;" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>



			<div class="primary-menu border-top">
				<div class="container">



<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
						<div class="offcanvas-header">
							<button class="btn-close float-end"></button>
							<h5 class="py-2 text-white">Navigation</h5>
						</div>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>

</nav>				
				</div>
			</div>
		</div>
		<!--end top header wrapper-->

<div class="cart-list">

</div>
