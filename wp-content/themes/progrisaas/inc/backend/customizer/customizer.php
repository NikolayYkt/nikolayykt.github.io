<?php
/**
 * Theme customizer
 *
 * @package ProgriSaaS
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ProgriSaaS_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {

		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {

		$default = $this->get_option_default( $name );

		return get_theme_mod( $name, $default );
	}

	/**
	 * Get default option values
	 *
	 * @param $name
	 *
	 * @return mixed
	 */
	public function get_option_default( $name ) {
		if ( ! isset( $this->config['fields'][ $name ] ) ) {
			return false;
		}
		return isset( $this->config['fields'][ $name ]['default'] ) ? $this->config['fields'][ $name ]['default'] : false;
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function progrisaas_get_option( $name ) {
	global $progrisaas_customize;

	$value = false;

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( 'progrisaas', $name );
	} elseif ( ! empty( $progrisaas_customize ) ) {
		$value = $progrisaas_customize->get_option( $name );
	}

	return apply_filters( 'progrisaas_get_option', $value, $name );
}

/**
 * Get default option values
 *
 * @param $name
 *
 * @return mixed
 */
function progrisaas_get_option_default( $name ) {
	global $progrisaas_customize;

	if ( empty( $progrisaas_customize ) ) {
		return false;
	}

	return $progrisaas_customize->get_option_default( $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function progrisaas_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}

add_action( 'customize_register', 'progrisaas_customize_modify' );


/**
 * Get customize settings
 *
 * Priority (Order) WordPress Live Customizer default: 
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @return array
 */
function progrisaas_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'progrisaas',
	);

	$panels = array(
		'general'     => array(
			'priority' => 5,
			'title'    => esc_html__( 'General', 'progrisaas' ),
		),
        'blog'        => array(
            'title'      => esc_html__( 'Blog', 'progrisaas' ),
            'priority'   => 10,
            'capability' => 'edit_theme_options',
        ),
        'portfolio'       => array(
            'title'       => esc_html__( 'Portfolio', 'progrisaas' ),
            'priority'    => 10,
            'capability'  => 'edit_theme_options',          
        ),
	);

	$sections = array(
        /*header*/
        'main_header'     => array(
            'title'       => esc_html__( 'Header', 'progrisaas' ),
            'description' => '',
            'priority'    => 8,
            'capability'  => 'edit_theme_options',
        ),
        /*page header*/
        'page_header'     => array(
            'title'       => esc_html__( 'Page Header', 'progrisaas' ),
            'description' => '',
            'priority'    => 9,
            'capability'  => 'edit_theme_options',
        ),
        /* blog */
        'blog_page'           => array(
            'title'       => esc_html__( 'Blog Page', 'progrisaas' ),
            'description' => '',
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'panel'       => 'blog',
        ),
        'single_post'           => array(
            'title'       => esc_html__( 'Single Post', 'progrisaas' ),
            'description' => '',
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'panel'       => 'blog',
        ),
        // footer
        'footer'         => array(
            'title'      => esc_html__( 'Footer', 'progrisaas' ),
            'priority'   => 10,
            'capability' => 'edit_theme_options',
        ),
        /* portfolio */
        'portfolio_page'  => array(
            'title'       => esc_html__( 'Archive Page', 'progrisaas' ),
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'panel'       => 'portfolio',           
        ),
        'portfolio_post'  => array(
            'title'       => esc_html__( 'Single Page', 'progrisaas' ),
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'panel'       => 'portfolio',           
        ),
		/* typography */
		'typography'           => array(
            'title'       => esc_html__( 'Typography', 'progrisaas' ),
            'description' => '',
            'priority'    => 15,
            'capability'  => 'edit_theme_options',
        ),
		/* 404 */
		'error_404'       => array(
            'title'       => esc_html__( '404', 'progrisaas' ),
            'description' => '',
            'priority'    => 11,
            'capability'  => 'edit_theme_options',
        ),
        /* color scheme */
        'color_scheme'   => array(
			'title'      => esc_html__( 'Color Scheme', 'progrisaas' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		),
		/* js code */
		'script_code'   => array(
			'title'      => esc_html__( 'Google Analytics(Script Code)', 'progrisaas' ),
			'priority'   => 210,
			'capability' => 'edit_theme_options',
		),
	);

	$fields = array(
        /* header settings */
        'header_layout'   => array(
            'type'        => 'select',  
            'label'       => esc_attr__( 'Select Header Desktop', 'progrisaas' ), 
            'description' => esc_attr__( 'Choose the header on desktop.', 'progrisaas' ), 
            'section'     => 'main_header', 
            'default'     => '', 
            'priority'    => 3,
            'placeholder' => esc_attr__( 'Select a header', 'progrisaas' ), 
            'choices'     => ( class_exists( 'Kirki_Helper' ) ) ? Kirki_Helper::get_posts( array( 'post_type' => 'ot_header_builders', 'posts_per_page' => -1 ) ) : array(),
        ),
        'header_fixed'    => array(
            'type'        => 'toggle',
            'label'       => esc_html__( 'Header Transparent?', 'progrisaas' ),
            'description' => esc_attr__( 'Enable when your header is transparent.', 'progrisaas' ), 
            'section'     => 'main_header',
            'default'     => '0',
            'priority'    => 4,
        ),
        'header_mobile'   => array(
            'type'        => 'select',  
            'label'       => esc_attr__( 'Select Header Mobile', 'progrisaas' ), 
            'description' => esc_attr__( 'Choose the header on mobile.', 'progrisaas' ), 
            'section'     => 'main_header', 
            'default'     => '', 
            'priority'    => 5,
            'placeholder' => esc_attr__( 'Select a header', 'progrisaas' ), 
            'choices'     => ( class_exists( 'Kirki_Helper' ) ) ? Kirki_Helper::get_posts( array( 'post_type' => 'ot_header_builders', 'posts_per_page' => -1 ) ) : array(),
        ),
        'sidepanel_layout'     => array(
            'type'        => 'select',  
            'label'       => esc_attr__( 'Select Side Panel', 'progrisaas' ), 
            'description' => esc_attr__( 'Choose the side panel on header.', 'progrisaas' ), 
            'section'     => 'main_header', 
            'default'     => '', 
            'priority'    => 6,
            'placeholder' => esc_attr__( 'Select a panel', 'progrisaas' ), 
            'choices'     => ( class_exists( 'Kirki_Helper' ) ) ? Kirki_Helper::get_posts( array( 'post_type' => 'ot_header_builders', 'posts_per_page' => -1 ) ) : array(),
        ),
        'panel_left'     => array(
            'type'        => 'toggle',
            'label'       => esc_html__( 'Side Panel On Left', 'progrisaas' ),
            'section'     => 'main_header',
            'default'     => '0',
            'priority'    => 7,
        ),
        /*page header */
        'pheader_switch'  => array(
            'type'        => 'toggle',
            'label'       => esc_html__( 'Page Header On/Off', 'progrisaas' ),
            'section'     => 'page_header',
            'default'     => 1,
            'priority'    => 10,
        ),
        'breadcrumbs'     => array(
            'type'        => 'toggle',
            'label'       => esc_html__( 'Breadcrumbs On/Off', 'progrisaas' ),
            'section'     => 'page_header',
            'default'     => 1,
            'priority'    => 10,
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'pheader_align'    => array(
            'type'     => 'radio',
            'label'    => esc_html__( 'Text Align', 'progrisaas' ),
            'section'  => 'page_header',
            'default'  => 'text-center',
            'priority' => 10,
            'choices'     => array(
                'text-center'   => esc_html__( 'Center', 'progrisaas' ),
                'text-left'     => esc_html__( 'Left', 'progrisaas' ),
                'text-right'    => esc_html__( 'Right', 'progrisaas' ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'pheader_img'  => array(
            'type'     => 'image',
            'label'    => esc_html__( 'Background Image', 'progrisaas' ),
            'section'  => 'page_header',
            'default'  => '',
            'priority' => 10,
            'output'    => array(
                array(
                    'element'  => '.page-header',
                    'property' => 'background-image'
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'pheader_color'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Color', 'progrisaas' ),
            'section'  => 'page_header',
            'priority' => 10,
            'output'    => array(
                array(
                    'element'  => '.page-header',
                    'property' => 'background-color'
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'ptitle_color'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Title Color', 'progrisaas' ),
            'section'  => 'page_header',
            'priority' => 10,
            'output'    => array(
                array(
                    'element'  => '.page-header .page-title',
                    'property' => 'color'
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'bread_color'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Breadcrumbs Color', 'progrisaas' ),
            'section'  => 'page_header',
            'priority' => 10,
            'output'    => array(
                array(
                    'element'  => '.page-header .breadcrumbs li, .page-header .breadcrumbs li a, .page-header .breadcrumbs li a:hover, .page-header .breadcrumbs li:before',
                    'property' => 'color'
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
                array(
                    'setting'  => 'breadcrumbs',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'pheader_height'  => array(
            'type'     => 'dimensions',
            'label'    => esc_html__( 'Page Header Height (Ex: 300px)', 'progrisaas' ),
            'section'  => 'page_header',
            'transport' => 'auto',
            'priority' => 10,
            'choices'   => array(
                'desktop' => esc_attr__( 'Desktop', 'progrisaas' ),
                'tablet'  => esc_attr__( 'Tablet', 'progrisaas' ),
                'mobile'  => esc_attr__( 'Mobile', 'progrisaas' ),
            ),
            'output'   => array(
                array(
                    'choice'      => 'mobile',
                    'element'     => '.page-header',
                    'property'    => 'height',
                    'media_query' => '@media (max-width: 767px)',
                ),
                array(
                    'choice'      => 'tablet',
                    'element'     => '.page-header',
                    'property'    => 'height',
                    'media_query' => '@media (min-width: 768px) and (max-width: 1024px)',
                ),
                array(
                    'choice'      => 'desktop',
                    'element'     => '.page-header',
                    'property'    => 'height',
                    'media_query' => '@media (min-width: 1024px)',
                ),
            ),
            'default' => array(
                'desktop' => '',
                'tablet'  => '',
                'mobile'  => '',
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'head_size'  => array(
            'type'     => 'dimensions',
            'label'    => esc_html__( 'Page Title Size (Ex: 30px)', 'progrisaas' ),
            'section'  => 'page_header',
            'transport' => 'auto',
            'priority' => 10,
            'choices'   => array(
                'desktop' => esc_attr__( 'Desktop', 'progrisaas' ),
                'tablet'  => esc_attr__( 'Tablet', 'progrisaas' ),
                'mobile'  => esc_attr__( 'Mobile', 'progrisaas' ),
            ),
            'output'   => array(
                array(
                    'choice'      => 'mobile',
                    'element'     => '.page-header .page-title',
                    'property'    => 'font-size',
                    'media_query' => '@media (max-width: 767px)',
                ),
                array(
                    'choice'      => 'tablet',
                    'element'     => '.page-header .page-title',
                    'property'    => 'font-size',
                    'media_query' => '@media (min-width: 768px) and (max-width: 1024px)',
                ),
                array(
                    'choice'      => 'desktop',
                    'element'     => '.page-header .page-title',
                    'property'    => 'font-size',
                    'media_query' => '@media (min-width: 1024px)',
                ),
            ),
            'default' => array(
                'desktop' => '',
                'tablet'  => '',
                'mobile'  => '',
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'pheader_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        /* blog settings */
        'blog_layout'           => array(
            'type'        => 'radio-image',
            'label'       => esc_html__( 'Blog Layout', 'progrisaas' ),
            'section'     => 'blog_page',
            'default'     => 'content-sidebar',
            'priority'    => 7,
            'description' => esc_html__( 'Select default sidebar for the blog page.', 'progrisaas' ),
            'choices'     => array(
                'content-sidebar'   => get_template_directory_uri() . '/inc/backend/images/right.png',
                'sidebar-content'   => get_template_directory_uri() . '/inc/backend/images/left.png',
                'full-content'      => get_template_directory_uri() . '/inc/backend/images/full.png',
            )
        ),  
        'blog_date'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Meta Date', 'progrisaas' ),
            'section'     => 'blog_page',
            'default'     => true,
            'priority'    => 10,
        ),
        'blog_categories'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Category Show', 'progrisaas' ),
            'section'     => 'blog_page',
            'default'     => true,
            'priority'    => 10,
        ),
        'blog_author_post'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Show Author Post', 'progrisaas' ),
            'section'     => 'blog_page',
            'default'     => true,
            'priority'    => 10,
        ),
        'blog_comment_post'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Show Comment Post', 'progrisaas' ),
            'section'     => 'blog_page',
            'default'     => true,
            'priority'    => 10,
        ),
        'blog_read_more'  => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Button text', 'progrisaas' ),
            'section'     => 'blog_page',
            'default'     => esc_html__( 'Read More', 'progrisaas' ),
            'priority'    => 10,
        ),
        /* single blog */
        'single_post_layout'           => array(
            'type'        => 'radio-image',
            'label'       => esc_html__( 'Layout', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => 'content-sidebar',
            'priority'    => 10,
            'choices'     => array(
                'content-sidebar'   => get_template_directory_uri() . '/inc/backend/images/right.png',
                'sidebar-content'   => get_template_directory_uri() . '/inc/backend/images/left.png',
                'full-content'      => get_template_directory_uri() . '/inc/backend/images/full.png',
            )
        ),
        'ptitle_post'               => array(
            'type'            => 'text',
            'label'           => esc_html__( 'Page Title', 'progrisaas' ),
            'section'         => 'single_post',
            'default'         => esc_html__( 'Blog Single', 'progrisaas' ),
            'priority'        => 10,
        ),
        'post_categories'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Category Show', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'post_entry_meta' => array(
            'type'     => 'multicheck',
            'label'    => esc_html__( 'Entry Meta', 'progrisaas' ),
            'section'  => 'single_post',
            'default'  => array( 'comments', 'date', 'author' ),
            'choices'  => array(
                'author'  => esc_html__( 'Author', 'progrisaas' ),
                'date'    => esc_html__( 'Date', 'progrisaas' ),
                'comments'    => esc_html__( 'Comment', 'progrisaas' ),
            ),
            'priority' => 10,
        ),
        'single_separator2'     => array(
            'type'        => 'custom',
            'label'       => esc_html__( 'Entry Footer', 'progrisaas' ),
            'section'     => 'single_post',
            'priority'    => 10,
        ),
        'post_entry_footer'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Entry Footer', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'post_socials'              => array(
            'type'     => 'multicheck',
            'section'  => 'single_post',
            'default'  => array( 'twitter', 'facebook', 'pinterest', 'linkedin' ),
            'choices'  => array(
                'twit'      => esc_html__( 'Twitter', 'progrisaas' ),
                'face'      => esc_html__( 'Facebook', 'progrisaas' ),
                'pint'      => esc_html__( 'Pinterest', 'progrisaas' ),
                'link'      => esc_html__( 'Linkedin', 'progrisaas' ),
                'google'    => esc_html__( 'Google Plus', 'progrisaas' ),
                'tumblr'    => esc_html__( 'Tumblr', 'progrisaas' ),
                'reddit'    => esc_html__( 'Reddit', 'progrisaas' ),
                'vk'        => esc_html__( 'VK', 'progrisaas' ),
            ),
            'priority' => 10,
        ),
        'author_box'      => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Author Info Box', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'post_nav'        => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Post Navigation', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'related_post'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Related Posts', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'author_box'      => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Author Info Box', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'post_nav'        => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Post Navigation', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'related_post'    => array(
            'type'        => 'checkbox',
            'label'       => esc_attr__( 'Related Posts', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => true,
            'priority'    => 10,
        ),
        'relate_button'  => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Details Button On Relate Post', 'progrisaas' ),
            'section'     => 'single_post',
            'default'     => esc_html__( 'Read More', 'progrisaas' ),
            'priority'    => 10,
        ),
        /* project settings */
        'portfolio_archive'           => array(
            'type'        => 'select',
            'label'       => esc_html__( 'Portfolio Archive', 'progrisaas' ),
            'section'     => 'portfolio_page',
            'default'     => 'archive_default',
            'priority'    => 1,
            'description' => esc_html__( 'Select page default for the portfolio archive page.', 'progrisaas' ),
            'choices'     => array(
                'archive_default' => esc_attr__( 'Archive page default', 'progrisaas' ),
                'archive_custom' => esc_attr__( 'Archive page custom', 'progrisaas' ),
            ),
        ),
        'archive_page_custom'     => array(
            'type'        => 'dropdown-pages',  
            'label'       => esc_attr__( 'Select Page', 'progrisaas' ), 
            'description' => esc_attr__( 'Choose a custom page for archive portfolio page.', 'progrisaas' ), 
            'section'     => 'portfolio_page', 
            'default'     => '', 
            'priority'    => 2,         
            'active_callback' => array(
                array(
                    'setting'  => 'portfolio_archive',
                    'operator' => '==',
                    'value'    => 'archive_custom',
                ),
            ),
        ),
        'portfolio_column'           => array(
            'type'        => 'select',
            'label'       => esc_html__( 'Portfolio Columns', 'progrisaas' ),
            'section'     => 'portfolio_page',
            'default'     => '3cl',
            'priority'    => 3,
            'description' => esc_html__( 'Select default column for the portfolio page.', 'progrisaas' ),
            'choices'     => array(
                '2cl' => esc_attr__( '2 Column', 'progrisaas' ),
                '3cl' => esc_attr__( '3 Column', 'progrisaas' ),
                '4cl' => esc_attr__( '4 Column', 'progrisaas' ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'portfolio_archive',
                    'operator' => '==',
                    'value'    => 'archive_default',
                ),
            ),
        ),
        'portfolio_style'           => array(
            'type'        => 'select',
            'label'       => esc_html__( 'Hover Style', 'progrisaas' ),
            'section'     => 'portfolio_page',
            'default'     => 'style-1',
            'priority'    => 4,
            'description' => esc_html__( 'Select default style for the portfolio page.', 'progrisaas' ),
            'choices'     => array(
                'style-1' => esc_attr__( 'Background Overlay', 'progrisaas' ),
                'style-2' => esc_attr__( 'Under Image', 'progrisaas' ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'portfolio_archive',
                    'operator' => '==',
                    'value'    => 'archive_default',
                ),
            ),
        ),
        'portfolio_posts_per_page' => array(
            'type'        => 'number',
            'section'     => 'portfolio_page',
            'priority'    => 5,
            'label'       => esc_html__( 'Posts per page', 'progrisaas' ),          
            'description' => esc_html__( 'Change Posts Per Page for Portfolio Archive, Taxonomy.', 'progrisaas' ),
            'default'     => '6',
            'active_callback' => array(
                array(
                    'setting'  => 'portfolio_archive',
                    'operator' => '==',
                    'value'    => 'archive_default',
                ),
            ),
        ),
        'pf_nav'          => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Projects Navigation On/Off', 'progrisaas' ),
            'section'     => 'portfolio_post',
            'default'     => 1,
            'priority'    => 7,
        ),
        'pf_related_switch'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Related Projects On/Off', 'progrisaas' ),
            'section'     => 'portfolio_post',
            'default'     => 1,
            'priority'    => 7,
        ),
        'pf_related_text'      => array(
            'type'            => 'text',
            'label'           => esc_html__( 'Related Projects Heading', 'progrisaas' ),
            'section'         => 'portfolio_post',
            'default'         => esc_html__( 'Related Projects', 'progrisaas' ),
            'priority'        => 7,
            'active_callback' => array(
                array(
                    'setting'  => 'pf_related_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        /* footer settings */
        'footer_layout'     => array(
            'type'        => 'select',  
            'label'       => esc_attr__( 'Select Footer', 'progrisaas' ), 
            'description' => esc_attr__( 'Choose a footer for all site here.', 'progrisaas' ), 
            'section'     => 'footer', 
            'default'     => '', 
            'priority'    => 1,
            'placeholder' => esc_attr__( 'Select a footer', 'progrisaas' ), 
            'choices'     => ( class_exists( 'Kirki_Helper' ) ) ? Kirki_Helper::get_posts( array( 'post_type' => 'ot_footer_builders', 'posts_per_page' => -1 ) ) : array(),
        ),
        'backtotop_separator'     => array(
            'type'        => 'custom',
            'label'       => '',
            'section'     => 'footer',
            'default'     => '<hr>',
            'priority'    => 2,
        ),
        'backtotop'  => array(
            'type'        => 'toggle',
            'label'       => esc_html__( 'Back To Top On/Off?', 'progrisaas' ),
            'section'     => 'footer',
            'default'     => 1,
            'priority'    => 3,
        ),
        'bg_backtotop'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Color', 'progrisaas' ),
            'section'  => 'footer',
            'priority' => 4,
            'default'     => '',
            'output'    => array(
                array(
                    'element'  => '#back-to-top',
                    'property' => 'background',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'backtotop',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'color_backtotop' => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Color', 'progrisaas' ),
            'section'  => 'footer',
            'priority' => 5,
            'default'     => '',
            'output'    => array(
                array(
                    'element'  => '#back-to-top > i:before',
                    'property' => 'color',
                )
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'backtotop',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'spacing_backtotop' => array(
            'type'     => 'dimensions',
            'label'    => esc_html__( 'Spacing', 'progrisaas' ),
            'section'  => 'footer',
            'priority' => 6,
            'default'     => array(
                'bottom'  => '',
                'right' => '',
            ),
            'choices'     => array(
                'labels' => array(
                    'bottom'  => esc_html__( 'Bottom (Ex: 20px)', 'progrisaas' ),
                    'right'   => esc_html__( 'Right (Ex: 20px)', 'progrisaas' ),
                ),
            ),
            'output'    => array(
                array(
                    'choice'      => 'bottom',
                    'element'     => '#back-to-top.show',
                    'property'    => 'bottom',
                ),
                array(
                    'choice'      => 'right',
                    'element'     => '#back-to-top.show',
                    'property'    => 'right',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'backtotop',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
		/* typography */
        'typography_switch'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Typography Customize?', 'progrisaas' ),
            'section'     => 'typography',
            'default'     => 0,
            'priority'    => 1,
        ),
        'body_typo'    => array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Body Font', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 2,
            'default'  => array(
                'font-family'    => '',
                'variant'        => 'regular',
                'font-size'      => '16px',
                'line-height'    => '1.875',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#646e83',
                'text-transform' => 'none',
            ),
            'output'      => array(
                array(
                    'element' => 'body, p, .elementor-element .elementor-widget-text-editor, .elementor-element .elementor-widget-icon-list .elementor-icon-list-item',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'heading1_typo'=> array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 1', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 3,
            'default'  => array(
                'font-family'    => '',
                'variant'        => '500',
                'font-size'      => '48px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#223354',
                'text-transform' => 'none',
            ),
            'output'      => array(
                array(
                    'element' => 'h1, .elementor-widget.elementor-widget-heading h1.elementor-heading-title',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'heading2_typo'=> array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 2', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 4,
            'default'  => array(
                'font-family'    => '',
                'variant'        => '500',
                'font-size'      => '42px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#223354',
                'text-transform' => 'none',
            ),
            'output'      => array(
                array(
                    'element' => 'h2, .elementor-widget.elementor-widget-heading h2.elementor-heading-title',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'heading3_typo'=> array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 3', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 5,
            'default'  => array(
                'font-family'    => '',
                'variant'        => '500',
                'font-size'      => '36px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#223354',
                'text-transform' => 'none',
            ),
            'output'      => array(
                array(
                    'element' => 'h3, .elementor-widget.elementor-widget-heading h3.elementor-heading-title',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'heading4_typo'=> array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 4', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 6,
            'default'  => array(
                'font-family'    => '',
                'variant'        => '500',
                'font-size'      => '30px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#223354',
                'text-transform' => 'none',
            ),
            'output'      => array(
                array(
                    'element' => 'h4, .elementor-widget.elementor-widget-heading h4.elementor-heading-title',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'heading5_typo'=> array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 5', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 7,
            'default'  => array(
                'font-family'    => '',
                'variant'        => '500',
                'font-size'      => '24px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#223354',
                'text-transform' => 'none',
            ),
            'output'      => array(
                array(
                    'element' => 'h5, .elementor-widget.elementor-widget-heading h5.elementor-heading-title',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'heading6_typo'=> array(
            'type'     => 'typography',
            'label'    => esc_html__( 'Heading 6', 'progrisaas' ),
            'section'  => 'typography',
            'priority' => 8,
            'default'  => array(
                'font-family'    => '',
                'variant'        => '500',
                'font-size'      => '20px',
                'line-height'    => '1.2',
                'letter-spacing' => '0',
                'subsets'        => array( 'latin', 'latin-ext' ),
                'color'          => '#223354',
                'text-transform' => 'h6',
            ),
            'output'      => array(
                array(
                    'element' => 'h6, .elementor-widget.elementor-widget-heading h6.elementor-heading-title',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'typography_switch',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),

		/* 404 */
		'page_404'   	  => array(
			'type'        => 'dropdown-pages',  
	 		'label'       => esc_attr__( 'Select Page', 'progrisaas' ), 
	 		'description' => esc_attr__( 'Choose a template in pages.', 'progrisaas' ), 
	 		'section'     => 'error_404', 
            'placeholder' => esc_attr__( 'Select a page 404', 'progrisaas' ),
	 		'default'     => '', 
			'priority'    => 3,
		),

		/*color scheme*/
        'bg_body'      => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Body', 'progrisaas' ),
            'section'  => 'color_scheme',
            'default'  => '',
            'priority' => 10,
            'output'   => array(
                array(
                    'element'  => 'body, .site-content',
                    'property' => 'background-color',
                ),
            ),
        ),
        'main_color'   => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Primary Color', 'progrisaas' ),
            'section'  => 'color_scheme',
            'default'  => '#ff6b52',
            'priority' => 10,
        ),
        'second_color'   => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Second Color', 'progrisaas' ),
            'section'  => 'color_scheme',
            'default'  => '#1080d0',
            'priority' => 10,
        ),

        /*google atlantic*/
        'js_code'  => array(
            'type'        => 'code',
            'label'       => esc_html__( 'Code', 'progrisaas' ),
            'section'     => 'script_code',
            'choices'     => [
				'language' => 'js',
			],
            'priority'    => 3,
        ),
		
	);
	$settings['panels']   = apply_filters( 'progrisaas_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'progrisaas_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'progrisaas_customize_fields', $fields );

	return $settings;
}

$progrisaas_customize = new ProgriSaaS_Customize( progrisaas_customize_settings() );
