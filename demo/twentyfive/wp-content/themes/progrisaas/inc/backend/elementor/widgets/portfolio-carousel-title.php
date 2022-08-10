<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class ProgriSaaS_Portfolio_Slider_Title extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipcarouseltitle';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Portfolio Carousel With Title', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-slider-push';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Title
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'progrisaas' ),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => 'Sub Title',
				'type' => Controls_Manager::TEXT,
				'default' => __( 'our cases', 'progrisaas' ),
				'placeholder' => __( 'Enter your subtitle', 'progrisaas' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'We Build Successful,<br> Lasting Products', 'progrisaas' ),
				'placeholder' => __( 'Enter your title', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title_html_tag',
			[
				'label' => __( 'Title HTML Tag', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'subtitle_style',
			[
				'label'   => esc_html__( 'Subtitle Style', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'prefix_class' => 'ssub-',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'project_section',
			[
				'label' => __( 'Project', 'progrisaas' ),
			]
		);

		$this->add_control(
			'project_cat',
			[
				'label' => __( 'Select Categories', 'progrisaas' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_cate_project(),
				'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'progrisaas' ),
			]
		);
		$this->add_control(
			'project_num',
			[
				'label' => __( 'Show Number Projects', 'progrisaas' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
			]
		);
		$this->add_control(
			'layout',
			[
				'label' => __( 'Style Layout', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'p-grid',
				'options' => [
					'p-grid'  	 => __( 'Grid', 'progrisaas' ),
					'p-masonry'  => __( 'Masonry', 'progrisaas' ),
				],
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Info Box Style', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1'  	=> __( 'Background Overlay', 'progrisaas' ),
					'style-2' 	=> __( 'Under Image', 'progrisaas' ),
					'style-3' 	=> __( 'Hidden', 'progrisaas' ),
				],
			]
		);
		$this->add_control(
			'popup_thumb',
			[
				'label' => __( 'Popup Gallery', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => ['style-2','style-3'],
				],
			]
		);

		$this->add_control(
			'is_exc',
			[
				'label' => __( 'Show Excerpt', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);

		$this->add_control(
			'is_btn',
			[
				'label' => __( 'Show Button', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Explore more <i class="ot-flaticon-right-arrow"></i>', 'progrisaas' ),
				'label_block' => 'true',
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'option_slider_section',
			[
				'label' => __( 'Option Slider', 'progrisaas' ),
			]
		);
		

		$slides_show = range( 1, 10 );
		$slides_show = array_combine( $slides_show, $slides_show );

		$this->add_responsive_control(
			'tshow',
			[
				'label' => __( 'Slides To Show', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'progrisaas' ),
				] + $slides_show,
				'default' => ''
			]
		);

		$this->add_control(
			'visible_outside',
			[
				'label'   => esc_html__( 'Visible Item Outside', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
				'selectors_dictionary' => [
				    'yes' => 'overflow: visible',
				],
				'selectors' => [
				    '{{WRAPPER}} .owl-carousel .owl-stage-outer' => '{{VALUE}}',
				]
			]
		);

		$this->add_control(
			'loop',
			[
				'label'   => esc_html__( 'Loop', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'   => esc_html__( 'Autoplay', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		$this->add_control(
			'timeout',
			[
				'label' => __( 'Autoplay Timeout', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1000,
						'max'  => 20000,
						'step' => 1000,
					],
				],
				'default' => [
					'size' => 7000,
				],
				'condition' => [
					'autoplay' => 'yes',
				]
			]
		);
		
		$this->add_responsive_control(
			'item_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'both' => __( 'Arrows and Dots', 'progrisaas' ),
					'arrows' => __( 'Arrows', 'progrisaas' ),
					'dots' => __( 'Dots', 'progrisaas' ),
					'none' => __( 'None', 'progrisaas' ),
				],
			]
		);
		$this->end_controls_section();

		// Start Style
		$this->start_controls_section(
			'style_section_heading',
			[
				'label' => __( 'Heading', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Subtitle
		$this->add_control(
			'heading_stitle',
			[
				'label' => __( 'Subtitle', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'stitle_bottom_space',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-heading__sub' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'stitle_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-heading__sub' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stitle_typography',
				'selector' => '{{WRAPPER}} .ot-heading__sub',
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-heading__title' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-heading__title',
			]
		);

		$this->end_controls_section();

		// Style Project
		$this->start_controls_section(
			'overlay_style_section',
			[
				'label' => __( 'Project Items', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_general',
			[
				'label' => __( 'General', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'overlay_align',
			[
				'label' => __( 'Alignment Info', 'progrisaas' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'progrisaas' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'progrisaas' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'progrisaas' ),
						'icon' => 'eicon-text-align-right',
					],
				],				
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info .portfolio-info-inner' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_responsive_control(
			'info_padding',
			[
				'label' => 'Padding Info',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-info-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout' => ['style-1','style-2'],
				],
			]
		);
		$this->add_control(
			'overlay_background',
			[
				'label' => __( 'Background Overlay', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .style-1 .portfolio-info, {{WRAPPER}} .projects-box .overlay' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .projects-thumbnail i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['style-2','style-3'],
				]
			]
		);
		$this->add_control(
			'scale_thumb',
			[
				'label' => __( 'Animation Image Hover', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'radius_thumb',
			[
				'label' => __( 'Border Radius Image', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .projects-box, {{WRAPPER}} .projects-thumbnail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		/* title */
		$this->add_control(
			'heading_ptitle',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'ptitle_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info h5 a' => 'color: {{VALUE}}; background-image: linear-gradient(0deg, {{VALUE}}, {{VALUE}});',
				],
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info h5 a' => 'background-image: linear-gradient(0deg, {{VALUE}}, {{VALUE}});',
					'{{WRAPPER}} .projects-box .portfolio-info h5 a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ptitle_typography',
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info h5 a',
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);

		/* category */
		$this->add_control(
			'heading_cat',
			[
				'label' => __( 'Category', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'show_cat',
			[
				'label' => __( 'Show Category', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'progrisaas' ),
				'label_off' => __( 'Hide', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_responsive_control(
			'cat_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-info .portfolio-cates' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_cat' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-info .portfolio-cates a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .portfolio-info .portfolio-cates a:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'show_cat' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'cat_hcolor',
			[
				'label' => __( 'Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info .portfolio-cates a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_cat' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info .portfolio-cates a',
				'condition' => [
					'show_cat' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);

		/* Excerpt */
		$this->add_control(
			'heading_exc',
			[
				'label' => __( 'Excerpt', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'is_exc' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'exc_color',
			[
				'label' => __( 'Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-info .portfolio-exc' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_exc' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'exc_typography',
				'selector' => '{{WRAPPER}} .portfolio-info .portfolio-exc',
				'condition' => [
					'is_exc' => 'yes',
					'style' => ['style-1','style-2'],
				]
			]
		);

		/* Button */
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-btn a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->add_control(
			'btn_hcolor',
			[
				'label' => __( 'Color hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-btn a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .portfolio-btn a',
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->end_controls_section();	

		// Dots.
		$this->start_controls_section(
			'navigation_section',
			[
				'label' => __( 'Dots', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_responsive_control(
			'dots_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .owl-dots' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
            'dots_bgcolor',
            [
                'label' => __( 'Color', 'progrisaas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .ot-custom-dots .owl-dot span' => 'background: {{VALUE}};',
				],
            ]
        );

        $this->add_control(
            'dots_active_bgcolor',
            [
                'label' => __( 'Color Active', 'progrisaas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .ot-custom-dots .owl-dot.active span' => 'background: {{VALUE}};',
				],
            ]
        );

        $this->end_controls_section();

        // Arrow.
		$this->start_controls_section(
			'style_nav',
			[
				'label' => __( 'Arrows', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				]
			]
		);
		$this->add_responsive_control(
			'arrow_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .heading-project-slider' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav button' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_hcolor',
			[
				'label' => __( 'Color Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav button:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_bg_color',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav button' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_bg_hcolor',
			[
				'label' => __( 'Background Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav button:hover' => 'background: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$dots   = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );
		$shows  = !empty( $settings['tshow'] ) ? $settings['tshow'] : 3;
		$tshows = !empty( $settings['tshow_tablet'] ) ? $settings['tshow_tablet'] : $shows;
		$mshows = !empty( $settings['tshow_mobile'] ) ? $settings['tshow_mobile'] : $tshows;
		$gaps   = isset( $settings['item_spacing']['size'] ) && is_numeric( $settings['item_spacing']['size'] ) ? $settings['item_spacing']['size'] : 30;
		$tgaps  = isset( $settings['item_spacing_tablet']['size'] ) && is_numeric( $settings['item_spacing_tablet']['size'] ) ? $settings['item_spacing_tablet']['size'] : $gaps;
		$mgaps  = isset( $settings['item_spacing_mobile']['size'] ) && is_numeric( $settings['item_spacing_mobile']['size'] ) ? $settings['item_spacing_mobile']['size'] : $tgaps;
		$timeout  = isset( $settings['timeout']['size'] ) ? $settings['timeout']['size'] : '';
		$owl_options = [
			'slides_show_desktop'  => absint( $shows ),
			'slides_show_tablet'   => absint( $tshows ),
			'slides_show_mobile'   => absint( $mshows ),
			'margin_desktop'   	   => absint( $gaps ),
			'margin_tablet'   	   => absint( $tgaps ),
			'margin_mobile'   	   => absint( $mgaps ),
			'autoplay'      	   => $settings['autoplay'] ? $settings['autoplay'] : 'no',
			'autoplay_time_out'    => absint( $timeout ),
			'loop'      		   => $settings['loop'] ? $settings['loop'] : 'no' ,
			'arrows'        	   => $arrows,
			'dots'          	   => $dots
		];

		$class = array();
		$class[] = 'ot-project-slider with-title';
		$class[] = $settings['style'];
		$class[] = 'yes' === $settings['popup_thumb'] ? 'img-popup' : '';
		$class[] = 'yes' === $settings['scale_thumb'] ? 'img-scale' : '';
		$class[] = 'yes' === $settings['show_cat'] ? '' : 'no-cat';
		$class[] = 'yes' === $settings['is_exc'] ? 'is-exc' : 'no-exc';
		$this->add_render_attribute(
			'slides', [
				'class'               => implode(' ', $class),
				'data-slider_options' => wp_json_encode( $owl_options ),
			]
		);

		$this->add_render_attribute( 'subtitle', 'class', 'ot-heading__sub' );
		$this->add_render_attribute( 'heading', 'class', 'ot-heading__title' );
		$title = $settings['title'];
		$titletag = $settings['title_html_tag'];
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $titletag, $this->get_render_attribute_string( 'heading' ), $title );
		?>
		<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="heading-project-slider">
							<?php if( ! empty( $settings['subtitle'] ) || ! empty( $settings['title'] ) ){ ?>
						    <div class="ot-heading">
						        <?php if( ! empty( $settings['subtitle'] ) ) { echo '<span '.$this->get_render_attribute_string( 'subtitle' ).'>' .$settings['subtitle']. '</span>'; } ?>
						        <?php if( ! empty( $settings['title'] ) ) { echo $title_html; } ?>
						    </div>
						    <?php } if( $arrows ){ ?>
						    <div class="custom-nav">
								<button type="button" class="owl-prev"><i class="ot-flaticon-left-arrow"></i></button>
								<button type="button" class="owl-next"><i class="ot-flaticon-right-arrow"></i></button>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>	
			</div>
			
			<div class="project-slider-wrap">
				<div class="owl-carousel owl-theme">
					<?php 
						if( $settings['project_cat'] ){
			                $args = array(	                    
			                    'post_type' => 'ot_portfolio',
			                    'post_status' => 'publish',
			                    'posts_per_page' => $settings['project_num'],
			                    'tax_query' => array(
			                        array(
			                            'taxonomy' => 'portfolio_cat',
			                            'field' => 'slug',
			                            'terms' => $settings['project_cat'],
			                        ),
			                    ),              
			                );
			            }else{
			                $args = array(
			                    'post_type' => 'ot_portfolio',
			                    'post_status' => 'publish',
			                    'posts_per_page' => $settings['project_num'],
			                );
			            }			
						$wp_query = new \WP_Query($args);					
						while ($wp_query -> have_posts()) : $wp_query -> the_post(); 

						if( $settings['layout'] == 'p-masonry' ){
							get_template_part( 'template-parts/content', 'project-masonry', array(
								'btn_text' => $settings['btn_text'],
							));
						}else{
							get_template_part( 'template-parts/content', 'project', array(
								'btn_text' => $settings['btn_text'],
							));
						}

						endwhile; wp_reset_postdata(); 
					?>
				</div>
			</div>
	    </div>
	    <?php
	}

	protected function content_template() {}

	public function get_keywords() {
		return [ 'slider', 'carousel', 'project' ];
	}

	protected function select_param_cate_project() {
	  	$category = get_terms( 'portfolio_cat' );
	  	$cat = array();
	  	foreach( $category as $item ) {
	     	if( $item ) {
	        	$cat[$item->slug] = $item->name;
	     	}
	  	}
	  	return $cat;
	}
}
// After the ProgriSaaS_Portfolio_Slider_Title class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Portfolio_Slider_Title() );