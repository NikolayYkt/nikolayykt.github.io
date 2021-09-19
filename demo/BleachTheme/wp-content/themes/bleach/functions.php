<?php
/**
 * bleach functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bleach
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bleach_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bleach_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bleach, use a find and replace
		 * to change 'bleach' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bleach', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'bleach' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		/*add_theme_support(
			'custom-background',
			apply_filters(
				'bleach_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);*/

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'bleach_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bleach_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bleach_content_width', 640 );
}
add_action( 'after_setup_theme', 'bleach_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bleach_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Правый виджет', 'bleach' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bleach' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал', 'bleach' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'bleach' ),
			'before_widget' => '<div id="%1$s" class="col widget %2$s"><div class="footer-section1 mb-3">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
}
add_action( 'widgets_init', 'bleach_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function bleach_scripts() {
	// plugins //
	wp_enqueue_style( 'bleach-carousel', get_template_directory_uri() .'/assets/plugins/OwlCarousel/css/owl.carousel.min.css',array(), '1' );	
	wp_enqueue_style( 'bleach-simplebar', get_template_directory_uri() .'/assets/plugins/simplebar/css/simplebar.css',array(), '1' );
	wp_enqueue_style( 'bleach-scrollbar', get_template_directory_uri() .'/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css',array(), '1' );
	wp_enqueue_style( 'bleach-metisMenu', get_template_directory_uri() .'/assets/plugins/metismenu/css/metisMenu.min.css',array(), '1' );
    // loader //
	wp_enqueue_style( 'bleach-pace', get_template_directory_uri() .'/assets/css/pace.min.css',array(), '1' );
	wp_enqueue_script( 'bleach-pace-js', get_template_directory_uri() . '/assets/js/pace.min.js', array(), '1', true );
	// Bootstrap CSS //
	wp_enqueue_style( 'bleach-bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css',array(), '1' );
	wp_enqueue_style( 'bleach-fonts.google', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap',  array(), '1' );
	wp_enqueue_style( 'bleach-app', get_template_directory_uri() .'/assets/css/app.css',  array(), '1');
	wp_enqueue_style( 'bleach-icon', get_template_directory_uri() .'/assets/css/icons.css',  array(), '1' );	
	// Bootstrap JS //
	wp_enqueue_script( 'bleach-bundle-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '1', true );
    //--plugins--//
    wp_enqueue_script( 'jquery' );
   // wp_enqueue_script( 'bleach-jquery-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1', true );
    wp_enqueue_script( 'bleach-simplebar-js', get_template_directory_uri() . '/assets/plugins/simplebar/js/simplebar.min.js', array(), '1', true );
    wp_enqueue_script( 'bleach-carousel-js', get_template_directory_uri() . '/assets/plugins/OwlCarousel/js/owl.carousel.min.js', array(), '1', true );    
    wp_enqueue_script( 'bleach-carousel2-js', get_template_directory_uri() . '/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js', array(), '1', true );   
    wp_enqueue_script( 'bleach-metisMenu-js', get_template_directory_uri() . '/assets/plugins/metismenu/js/metisMenu.min.js', array(), '1', true );  
    wp_enqueue_script( 'bleach-perfect-js', get_template_directory_uri() . '/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js', array(), '1', true );      
	//--app JS--//
    wp_enqueue_script( 'bleach-apps-js', get_template_directory_uri() . '/assets/js/app.js', array(), '1', true );  
    wp_enqueue_script( 'bleach-index-js', get_template_directory_uri() . '/assets/js/index.js', array(), '1', true );  	    
	//========================================================================================================//	
	wp_enqueue_style( 'bleach-style', get_stylesheet_uri(), 'bleach-icon', _S_VERSION );
	wp_style_add_data( 'bleach-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bleach_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/wp-bootstrap.php';

require get_template_directory() . '/inc/bleach-function.php';