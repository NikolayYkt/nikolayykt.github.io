<?php

function progrisaas_preloader_customize_settings() {
	/**
	 * Customizer configuration
	 */

	$settings = array(
		'theme' => 'progrisaas',
	);

	$panels = array(

	);

	$sections = array(
		'preload_section'     => array(
			'title'       => esc_attr__( 'Preloader', 'progrisaas' ),
			'description' => '',
			'priority'    => 22,
			'capability'  => 'edit_theme_options',
		),
	);

	$fields = array(	
        /* preloader */
        'preload'     => array(
            'type'        => 'toggle',
            'label'       => esc_attr__( 'Preloader', 'progrisaas' ),
            'section'     => 'preload_section',
            'default'     => 0,
            'priority'    => 10,
        ),
        'preload_logo'    => array(
            'type'     => 'image',
            'label'    => esc_html__( 'Logo Preload', 'progrisaas' ),
            'section'  => 'preload_section',
            'default'  => trailingslashit( get_template_directory_uri() ) . 'images/logo.svg',
            'priority' => 11,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_logo_width'     => array(
            'type'     => 'slider',
            'label'    => esc_html__( 'Logo Width', 'progrisaas' ),
            'section'  => 'preload_section',
            'default'  => 211,
            'priority' => 12,
            'choices'   => array(
                'min'  => 0,
                'max'  => 400,
                'step' => 1,
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_logo_height'    => array(
            'type'     => 'slider',
            'label'    => esc_html__( 'Logo Height', 'progrisaas' ),
            'section'  => 'preload_section',
            'default'  => 40,
            'priority' => 13,
            'choices'   => array(
                'min'  => 0,
                'max'  => 200,
                'step' => 1,
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_text_color'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Percent Text Color', 'progrisaas' ),
            'section'  => 'preload_section',
            'default'  => '#223354',
            'priority' => 14,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_bgcolor'    => array(
            'type'     => 'color',
            'label'    => esc_html__( 'Background Color', 'progrisaas' ),
            'section'  => 'preload_section',
            'default'  => '#fff',
            'priority' => 15,
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
        'preload_typo' => array(
            'type'        => 'typography',
            'label'       => esc_attr__( 'Percent Preload Font', 'progrisaas' ),
            'section'     => 'preload_section',
            'default'     => array(
                'font-family'    => 'DM Sans',
                'variant'        => 'regular',
                'font-size'      => '16px',
                'line-height'    => '40px',
                'letter-spacing' => '2px',
                'subsets'        => array( 'latin-ext' ),                
                'text-transform' => 'none',
                'text-align'     => 'center',
            ),
            'priority'    => 16,
            'output'      => array(
                array(
                    'element' => '#royal_preloader.royal_preloader_logo .royal_preloader_percentage',
                ),
            ),
            'active_callback' => array(
                array(
                    'setting'  => 'preload',
                    'operator' => '==',
                    'value'    => 1,
                ),
            ),
        ),
	);

	$settings['panels']   = apply_filters( 'progrisaas_customize_panels', $panels );
	$settings['sections'] = apply_filters( 'progrisaas_customize_sections', $sections );
	$settings['fields']   = apply_filters( 'progrisaas_customize_fields', $fields );

	return $settings;
}

$progrisaas_customize = new ProgriSaaS_Customize( progrisaas_preloader_customize_settings() );

if( progrisaas_get_option('preload') != false ){

    function progrisaas_body_classes( $classes ) {

        $classes[] = 'royal_preloader';

        return $classes;
    }
    add_filter( 'body_class', 'progrisaas_body_classes' );

    function progrisaas_preload_body_open_script() {
        echo '<div id="royal_preloader" data-width="'.progrisaas_get_option('preload_logo_width').'" data-height="'.progrisaas_get_option('preload_logo_height').'" data-url="'.progrisaas_get_option('preload_logo').'" data-color="'.progrisaas_get_option('preload_text_color').'" data-bgcolor="'.progrisaas_get_option('preload_bgcolor').'"></div>';
        
    }
    add_action( 'wp_body_open', 'progrisaas_preload_body_open_script' );

    function progrisaas_preload_scripts() {
        wp_enqueue_style('progrisaas-preload', get_template_directory_uri().'/css/royal-preload.css');
    }
    add_action( 'wp_enqueue_scripts', 'progrisaas_preload_scripts' );

}