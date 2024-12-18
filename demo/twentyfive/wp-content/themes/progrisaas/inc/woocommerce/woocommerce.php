<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package ProgriSaaS
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function progrisaas_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'progrisaas_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function progrisaas_woocommerce_scripts() {
	wp_enqueue_style( 'progrisaas-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css' );
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'progrisaas-woocommerce-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'progrisaas_woocommerce_scripts' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function progrisaas_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'progrisaas_woocommerce_active_body_class' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function progrisaas_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'progrisaas_woocommerce_thumbnail_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function progrisaas_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'progrisaas_woocommerce_related_products_args' );

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'progrisaas_wc_breadcrumbs' );
function progrisaas_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	add_action( 'progrisaas_woocommerce_breadcrumb', 'woocommerce_breadcrumb' );
}

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'progrisaas_woocommerce_breadcrumbs' );
function progrisaas_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul id="breadcrumbs" class="breadcrumbs" itemprop="breadcrumb">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'progrisaas' ),
        );
}

/**
 * Remove the product link 
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_shop_loop_item_title', 'progrisaas_change_products_title', 10 );
function progrisaas_change_products_title() {
    echo '<h2 class="woocommerce-loop-product__title"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
}

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'progrisaas_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function progrisaas_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area <?php progrisaas_shop_content_columns(); ?>">
			<main id="main" class="site-main" role="main">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'progrisaas_woocommerce_wrapper_before' );

if ( ! function_exists( 'progrisaas_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function progrisaas_woocommerce_wrapper_after() {
			?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'progrisaas_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'progrisaas_woocommerce_header_cart' ) ) {
			progrisaas_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'progrisaas_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function progrisaas_woocommerce_cart_link_fragment( $fragments ) {
		$item_count_text = sprintf( WC()->cart->get_cart_contents_count() );

		$fragments['span.cart-count'] = '<span class="cart-count">'.$item_count_text.'</span>';

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'progrisaas_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'progrisaas_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function progrisaas_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php progrisaas_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

//Get layout shop page.
if ( ! function_exists( 'progrisaas_get_shop_layout' ) ) :
	function progrisaas_get_shop_layout() {
		// Get layout.
		if( is_product() ){
			$page_layout = progrisaas_get_option( 'single_shop_layout' );
		}else{
			$page_layout = progrisaas_get_option( 'shop_layout' );
		}

		return $page_layout;
	}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'progrisaas_shop_content_columns' ) ) :
	function progrisaas_shop_content_columns() {

		$shop_content_width = array();

		// Check if layout is one column.
		if ( 'content-sidebar' === progrisaas_get_shop_layout() && is_active_sidebar( 'shop-sidebar' ) ) {
			$shop_content_width[] = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
		}elseif ('sidebar-content' === progrisaas_get_shop_layout() && is_active_sidebar( 'shop-sidebar' ) ) {
			$shop_content_width[] = 'col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right';
		}else{
			$shop_content_width[] = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
		}

		// return the $classes array
    	echo implode( ' ', $shop_content_width );
	}
endif;

/**
 * Register widget area for shop page.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function progrisaas_woocommerce_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Shop Sidebar', 'progrisaas' ),
        'id'            => 'shop-sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'progrisaas_woocommerce_widgets_init' );


/* Customizer Shop */
function progrisaas_shop_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'progrisaas',
	);

	$panels = array();

	$sections = array(		
        'single_product'           => array(
			'title'       => esc_html__( 'Single Product', 'progrisaas' ),
			'description' => '',
			'priority'    => 16,
			'capability'  => 'edit_theme_options',
			'panel'       => 'woocommerce',
		),
	);

	$fields = array(
		// Shop Page
		'shop_layout'           => array(
			'type'        => 'radio-image',
			'label'       => esc_html__( 'Shop Layout', 'progrisaas' ),
			'section'     => 'woocommerce_product_catalog',
			'default'     => 'sidebar-content',
			'priority'    => 7,
			'description' => esc_html__( 'Select default sidebar for the shop page.', 'progrisaas' ),
			'choices'     => array(
				'content-sidebar' 	=> get_template_directory_uri() . '/inc/backend/images/right.png',
				'sidebar-content' 	=> get_template_directory_uri() . '/inc/backend/images/left.png',
				'full-content' 		=> get_template_directory_uri() . '/inc/backend/images/full.png',
			)
		),		

        // Single Product Page
        'single_shop_layout'           => array(
            'type'        => 'radio-image',
            'label'       => esc_html__( 'Single Product Layout', 'progrisaas' ),
            'section'     => 'single_product',
            'default'     => 'full-content',
            'priority'    => 1,
            'choices'     => array(
				'content-sidebar' 	=> get_template_directory_uri() . '/inc/backend/images/right.png',
				'sidebar-content' 	=> get_template_directory_uri() . '/inc/backend/images/left.png',
				'full-content' 		=> get_template_directory_uri() . '/inc/backend/images/full.png',
			)
        ),
        'page_title_product'    => array(
            'type'     => 'text',
            'label'    => esc_html__( 'Title Page Header', 'progrisaas' ),
            'section'  => 'single_product',
            'default'  => 'Shop Single',
            'priority' => 1,
        ),
	);

	$settings['panels']   = apply_filters( 'progrisaas_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'progrisaas_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'progrisaas_customize_fields', $fields );

	return $settings;
}

$progrisaas_customize = new ProgriSaaS_Customize( progrisaas_shop_customize_settings() );
