<?php
// Load the theme's custom Widgets so that they appear in the Elementor element panel.
add_action( 'elementor/widgets/widgets_registered', 'progrisaas_register_elementor_widgets' );
function progrisaas_register_elementor_widgets() {

    require_once( get_template_directory() . '/inc/backend/elementor/widgets/widgets.php' );
    require_once( get_template_directory() . '/inc/backend/elementor/widgets/header/widgets.php' );

}

// Add a custom 'category_progrisaas' category for to the Elementor element panel so that our theme's widgets have their own category.
add_action( 'elementor/init', function() {
    \Elementor\Plugin::$instance->elements_manager->add_category( 
        'category_progrisaas',
        [
            'title' => __( 'ProgriSaaS', 'progrisaas' ),
            'icon' => 'fa fa-plug', //default icon
        ],
        1 // position
    );
    \Elementor\Plugin::$instance->elements_manager->add_category( 
        'category_progrisaas_header',
        [
            'title' => __( 'OT Header', 'progrisaas' ),
            'icon' => 'fa fa-plug', //default icon
        ],
        2 // position
    );
});

// Post types with Elementor
function progrisaas_add_cpt_support() {
    
    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    //check if option DOESN'T exist in db
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'ot_portfolio', 'ot_header_builders', 'ot_footer_builders' ]; //create array of our default supported post types
        update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
    }
    
    //if it DOES exist, but portfolio is NOT defined
    else {
        $ot_portfolio       = in_array( 'ot_portfolio', $cpt_support );
        $ot_header_builders = in_array( 'ot_header_builders', $cpt_support );
        $ot_footer_builders = in_array( 'ot_footer_builders', $cpt_support );
        if( !$ot_portfolio ){
            $cpt_support[] = 'ot_portfolio'; //append to array
        }
        if( !$ot_header_builders ){
            $cpt_support[] = 'ot_header_builders'; //append to array
        }
        if( !$ot_footer_builders ){
            $cpt_support[] = 'ot_footer_builders'; //append to array
        }
        update_option( 'elementor_cpt_support', $cpt_support ); //update database
    }
    
    //otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'elementor/init', 'progrisaas_add_cpt_support' );

// Upload SVG for Elementor
function progrisaas_unfiltered_files_upload() {
    
    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_unfiltered_files_upload' );
    
    //check if option DOESN'T exist in db
    if( ! $cpt_support ) {
        $cpt_support = '1'; //create string value default to enable upload svg
        update_option( 'elementor_unfiltered_files_upload', $cpt_support ); //write it to the database
    }
}
add_action( 'elementor/init', 'progrisaas_unfiltered_files_upload' );

// Header post type
add_action( 'init', 'progrisaas_create_header_builder' ); 
function progrisaas_create_header_builder() {
    register_post_type( 'ot_header_builders',
        array(
            'labels' => array(
                'name'              => esc_html__( 'Header Builder', 'progrisaas' ),
                'singular_name'     => esc_html__( 'Header Builder', 'progrisaas' ),
                'add_new'           => esc_html__( 'Add New', 'progrisaas' ),
                'add_new_item'      => esc_html__( 'Add New Header', 'progrisaas' ),
                'edit'              => esc_html__( 'Edit', 'progrisaas' ),
                'edit_item'         => esc_html__( 'Edit Header', 'progrisaas' ),
                'all_items'         => esc_html__( 'All Headers', 'progrisaas' ),
                'new_item'          => esc_html__( 'New Header', 'progrisaas' ),
                'view'              => esc_html__( 'View', 'progrisaas' ),
                'view_item'         => esc_html__( 'View Header', 'progrisaas' ),
                'search_items'      => esc_html__( 'Search Header', 'progrisaas' ),
                'not_found'         => esc_html__( 'No Header found', 'progrisaas' ),
                'not_found_in_trash'=> esc_html__( 'No Header found in Trash', 'progrisaas' ),
                'parent'            => esc_html__( 'Parent Header', 'progrisaas' )
            ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'menu_position'         => 60,
            'supports'              => array( 'title', 'editor' ),
            'menu_icon'             => 'dashicons-editor-kitchensink',
            'publicly_queryable'    => true,
            'exclude_from_search'   => true,
            'has_archive'           => true,
            'query_var'             => true,
            'can_export'            => true,
            'capability_type'       => 'post'
        )
    );
}

// Footer post type
add_action( 'init', 'progrisaas_create_footer_builder' ); 
function progrisaas_create_footer_builder() {
    register_post_type( 'ot_footer_builders',
        array(
            'labels' => array(
                'name'              => esc_html__( 'Footer Builder', 'progrisaas' ),
                'singular_name'     => esc_html__( 'Footer Builder', 'progrisaas' ),
                'add_new'           => esc_html__( 'Add New', 'progrisaas' ),
                'add_new_item'      => esc_html__( 'Add New Footer', 'progrisaas' ),
                'edit'              => esc_html__( 'Edit', 'progrisaas' ),
                'edit_item'         => esc_html__( 'Edit Footer', 'progrisaas' ),
                'all_items'         => esc_html__( 'All Footers', 'progrisaas' ),
                'new_item'          => esc_html__( 'New Footer', 'progrisaas' ),
                'view'              => esc_html__( 'View', 'progrisaas' ),
                'view_item'         => esc_html__( 'View Footer', 'progrisaas' ),
                'search_items'      => esc_html__( 'Search Footer Builders', 'progrisaas' ),
                'not_found'         => esc_html__( 'No Footer found', 'progrisaas' ),
                'not_found_in_trash'=> esc_html__( 'No Footer found in Trash', 'progrisaas' ),
                'parent'            => esc_html__( 'Parent Footer', 'progrisaas' )
            ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'menu_position'         => 60,
            'supports'              => array( 'title', 'editor' ),
            'menu_icon'             => 'dashicons-editor-kitchensink',
            'publicly_queryable'    => true,
            'exclude_from_search'   => true,
            'has_archive'           => true,
            'query_var'             => true,
            'can_export'            => true,
            'capability_type'       => 'post'
        )
    );
}

/*Fix Elementor Pro*/
function progrisaas_register_elementor_locations( $elementor_theme_manager ) {

    $elementor_theme_manager->register_all_core_location();

}
add_action( 'elementor/theme/register_locations', 'progrisaas_register_elementor_locations' );

/*** add options to sections ***/
add_action('elementor/element/section/section_structure/after_section_end', function( $section, $args ) {

    /* header options */
    $section->start_controls_section(
        'section_custom_class',
        [
            'label' => __( 'For Header', 'progrisaas' ),
            'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
    $section->add_control(
        'sticky_class',
        [
            'label'        => __( 'Sticky On/Off', 'progrisaas' ),
            'type'         => Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'is-fixed',
            'prefix_class' => '',
        ]
    );
    $section->add_control(
        'sticky_background',
        [
            'label'     => __( 'Background Scroll', 'progrisaas' ),
            'type'      => Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.is-stuck' => 'background: {{VALUE}};',
            ],
            'condition' => [
                'sticky_class' => 'is-fixed',
            ],
        ]
    );
    $section->add_responsive_control(
        'offset_space',
        [
            'label' => __( 'Offset', 'progrisaas' ),
            'type' => Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.is-stuck' => 'top: {{SIZE}}{{UNIT}};',
                '.admin-bar {{WRAPPER}}.is-stuck' => 'top: calc({{SIZE}}{{UNIT}} + 32px);',
            ],
            'condition' => [
                'sticky_class' => 'is-fixed',
            ],
        ]
    );
    $section->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sticky_box_shadow',
                'label' => __( 'Box Shadow', 'progrisaas' ),
                'selector' => '{{WRAPPER}}.is-stuck',
                'condition' => [
                    'sticky_class' => 'is-fixed',
                ],
            ]
        );

    $section->end_controls_section();

    
}, 10, 2 );


add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {

    /*Particles*/
    $section->start_controls_section(
        'section_custom_particles',
        [
            'label' => __( 'Particles', 'progrisaas' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $section->add_control(
        'particles_class',
        [
            'label'        => __( 'Particles On/Off', 'progrisaas' ),
            'type'         => Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'particles-js',
            'prefix_class' => '',
        ]
    );
    $section->add_control(
        'add_particles_color',
        [
            'label'        => __( 'Particles Colors', 'progrisaas' ),
            'type'         => Elementor\Controls_Manager::TEXT,
            'default'      => '#fe4c1c,#00c3ff,#0160e7',
            'condition' => [
                'particles_class' => 'particles-js',
            ]
        ]
    );
    $section->end_controls_section();

    /*Particles*/
    $section->start_controls_section(
        'section_custom_margin_section',
        [
            'label' => __( 'Margin', 'progrisaas' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $section->add_control(
        'margin_section_class',
        [
            'label'        => __( 'Margin Section On/Off', 'progrisaas' ),
            'type'         => Elementor\Controls_Manager::SWITCHER,
            'return_value' => 'add-margin',
            'prefix_class' => '',
        ]
    );
    $section->add_responsive_control(
        'margin_section',
        [
            'label' => 'Margin',
            'type' => Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'condition' => [
                'margin_section_class' => 'add-margin',
            ],
            'selectors' => [
                '.add-margin' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $section->end_controls_section();

}, 10, 2 );

add_action( 'elementor/frontend/section/before_render',function( $element ) {
    // Make sure we are in a section element
    if( 'section' !== $element->get_name() ) {
        return;
    }
    $section = $element->get_settings_for_display();
    if( $section['add_particles_color'] ){
        $element->add_render_attribute( '_wrapper', 'data-color', $section['add_particles_color'] );
    }
    
});
/*** add options to columns ***/
require get_template_directory() . '/inc/backend/elementor/column.php';
