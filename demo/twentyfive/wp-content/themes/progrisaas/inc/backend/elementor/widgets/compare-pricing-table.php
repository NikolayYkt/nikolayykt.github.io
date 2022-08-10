<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table
 */
class ProgriSaaS_Compare_Pricing_Table extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icomparetable';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Compare Pricing Table', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-price-table';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content Compare Pricing Table
		$this->start_controls_section(
			'section_general',
			[
				'label' => __('General', 'progrisaas')
			]
		);
		$this->add_control(
			'table_count',
			[
				'label'       => __('Plan', 'progrisaas'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 3,
				'min'         => 2,
				'max'         => 5,
				'placeholder' => __('Plan', 'progrisaas'),
				'description' => __( 'Min: 2 - Max: 5', 'progrisaas' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_feature',
			[
				'label' => __('Feature Box', 'progrisaas')
			]
		);

		$this->add_control(
			'feature_box_heading',
			[
				'label'       => __('Heading', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('Time Tracking', 'progrisaas'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'legend_feature_text',
			[
				'label'       => __('Feature', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'feature',
				'placeholder' => __('Enter your feature', 'progrisaas'),
			]
		);

		$this->add_control(
			'features_text',
			[
				'label'      => __('Features', 'progrisaas'),
				'type'       => Controls_Manager::REPEATER,
				'show_label' => true,
				'default'    => [
					[
						'legend_feature_text' => __('Adding time manually', 'progrisaas'),
					],
					[
						'legend_feature_text' => __('Timeline', 'progrisaas'),
					],
					[
						'legend_feature_text' => __('Tracking time', 'progrisaas'),
					],
				],
				'fields'     =>  $repeater->get_controls(),
				'title_field' => '{{{ legend_feature_text }}}',
			]
		);
		$this->end_controls_section();

		$this->add_tables();
	}

	function add_tables()
	{

		$repeater = new Repeater();

		$repeater->add_control(
			'table_content_type',
			[
				'label'       => __('Content', 'progrisaas'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'fas fa-check' => [
						'title' => __('Yes', 'progrisaas'),
						'icon'  => 'fas fa-check',
					],
					'fas fa-times' => [
						'title' => __('No', 'progrisaas'),
						'icon'  => 'fas fa-times',
					],
					'text'        => [
						'title' => __('Text', 'progrisaas'),
						'icon'  => 'fas fa-font',
					]
				],
				'default'     => 'fas fa-check',
			]
		);
		$repeater->add_control(
			'feature_text',
			[
				'label'       => __('Feature', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __('Feature', 'progrisaas'),
				'condition'   => [
					'table_content_type' => 'text'
				]
			]
		);
		for ($i = 1; $i < 6; $i++) {
			$this->start_controls_section(
				'section_table_' . $i,
				[
					'label'     => __('Plan ' . $i, 'progrisaas'),
					'operator'  => '>',
					'condition' => [
						'table_count' => $this->add_condition_value($i),
					]
				]
			);
			$this->add_control(
				'table_title_' . $i,
				[
					'label'       => __('Title', 'progrisaas'),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('Digital', 'progrisaas'),
				]
			);
			$this->add_control(
				'table_price_' . $i,
				[
					'label'       => __('Price', 'progrisaas'),
					'type'        => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'default'     => __('$155', 'progrisaas'),
				]
			);
			$this->add_control(
				'table_duration_' . $i,
				[
					'label'       => __('Period', 'progrisaas'),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('/year', 'progrisaas'),
				]
			);

			$this->start_controls_tabs( 'tabs_button_' . $i );

			$this->start_controls_tab(
				'tab_button_trial_' . $i,
				[
					'label' => __( 'Button 1', 'progrisaas' ),
				]
			);
			$this->add_control(
				'label_link_trial_' . $i,
				[
					'label' => 'Label',
					'type' => Controls_Manager::TEXTAREA,
					'default' => __( 'Free 30-day Trial', 'progrisaas' ),
				]
			);

			$this->add_control(
				'link_trial_' . $i,
				[
					'label' => __( 'Link', 'progrisaas' ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
					'default'	=> [
						'url'	=> '#'
					]
				]
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_button_detail_' . $i,
				[
					'label' => __( 'Button 2', 'progrisaas' ),
				]
			);
			$this->add_control(
				'label_link_detail_' . $i,
				[
					'label' => 'Label',
					'type' => Controls_Manager::TEXTAREA,
					'default' => __( 'Learn More', 'progrisaas' ),
				]
			);
			$this->add_control(
				'link_detail_' . $i,
				[
					'label' => __( 'Link', 'progrisaas' ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
					'default'	=> [
						'url'	=> '#'
					]
				]
			);
			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_control(
				'feature_items_' . $i,
				[
					'label'      => __('Features', 'progrisaas'),
					'type'       => Controls_Manager::REPEATER,
					'show_label' => true,
					'default'    => [
						[
							'table_content_type' => 'fas fa-check',
						],
						[
							'table_content_type' => 'fas fa-check',
						],
						[
							'table_content_type' => 'fas fa-close',
						],
					],
					'fields'     =>  $repeater->get_controls(),
				]
			);


			$this->add_control(
				'override_style_' . $i,
				[
					'label'        => __('Override Style', 'progrisaas'),
					'type'         => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'    => 'before'
				]
			);

			$this->add_control(
				'custom__heading_' . $i,
				[
					'label'     => __('Heading', 'progrisaas'),
					'type'      => Controls_Manager::HEADING,
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'heading_text_color_custom_' . $i,
				[
					'label'     => __('Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-table-' . $i . '.ot-cpt-heading' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'heading_text_bg_color_custom_' . $i,
				[
					'label'     => __('Background Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-table-' . $i . '.ot-cpt-heading' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_price_heading_' . $i,
				[
					'label'     => __('Price', 'progrisaas'),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_price_color_' . $i,
				[
					'label'     => __('Price Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-table-' . $i . ' .ot-cpt-price-wrapper .ot-cpt-price' => 'color: {{VALUE}};',
						'{{WRAPPER}} .ot-cpt-table-' . $i . ' .ot-cpt-price-wrapper .ot-cpt-period' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_table_items_' . $i,
				[
					'label'     => __('Features', 'progrisaas'),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_table_item_color_' . $i,
				[
					'label'     => __('Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . '.ot-cpt-text' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_features_check_color_' . $i,
				[
					'label'     => __('Check Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-wrapper td.ot-cpt-table-' . $i . ' span.ot-flaticon-check' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_table_check_bg_color_' . $i,
				[
					'label'     => __('Check Background Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-wrapper td.ot-cpt-table-' . $i . ' span.ot-flaticon-check' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_features_close_color_' . $i,
				[
					'label'     => __('Close Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-wrapper td.ot-cpt-table-' . $i . ' span.ot-flaticon-close' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_table_close_bg_color_' . $i,
				[
					'label'     => __('Close Background Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ot-cpt-wrapper td.ot-cpt-table-' . $i . ' span.ot-flaticon-close' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'custom_button_heading_' . $i,
				[
					'label'     => __('Button', 'progrisaas'),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->start_controls_tabs( 'tabs_button_custom_style' . $i );

			$this->start_controls_tab(
				'tab_button_custom_style_trial' . $i,
				[
					'label' => __( 'Button 1', 'progrisaas' ),
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_trial_custom_text_color' . $i,
				[
					'label' => __( 'Text Color', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-btn.--price-link-trial' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_trial_custom_bg' . $i,
				[
					'label' => __( 'Background Color', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-btn.--price-link-trial' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_trial_custom_border' . $i,
				[
					'label' => __( 'Border Color', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-btn.--price-link-trial' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'btn_trial_custom_text_hcolor' . $i,
				[
					'label' => __( 'Text Hover', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-btn.--price-link-trial:hover' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_trial_custom_hbg' . $i,
				[
					'label' => __( 'Background Hover', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-btn.--price-link-trial:hover' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_trial_custom_hborder' . $i,
				[
					'label' => __( 'Border Hover', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-btn.--price-link-trial:hover' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'tab_button_custom_style_detail' . $i,
				[
					'label' => __( 'Button 2', 'progrisaas' ),
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_detail_custom_text_color' . $i,
				[
					'label' => __( 'Text Color', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-price-link-detail' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'btn_detail_custom_hcolor' . $i,
				[
					'label' => __( 'Text Color Hover', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} td.ot-cpt-table-' . $i . ' .octf-price-link-detail:hover' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();
		}

		//General
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => __('General', 'progrisaas'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'odd_color',
			[
				'label'     => __('Odd Column Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '#f8f8f8',
				'selectors' => [
					'{{WRAPPER}} tr td:nth-child(odd)' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'even_color',
			[
				'label'     => __('Even Column Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} tr td:nth-child(even)' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'        => 'table_border',
				'label'       => __('Border', 'progrisaas'),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width'  => [
						'default' => [
							'top'    => 1,
							'right'  => 1,
							'bottom' => 1,
							'left'   => 1,
							'unit'   => 'px'
						],
					],
					'color'  => [
						'default' => '#DDD',
					]
				],
				'selector'    => '{{WRAPPER}} .ot-cpt-wrapper table tr:first-child td, {{WRAPPER}} .ot-cpt-wrapper table tr:last-child td, {{WRAPPER}} .ot-cpt-wrapper td,{{WRAPPER}} .ot-cpt-wrapper td,{{WRAPPER}} .ot-cpt-wrapper th',
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		//Feature Box
		$this->start_controls_section(
			'section_feature_style',
			[
				'label' => __('Feature Box', 'progrisaas'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'features_text_color',
			[
				'label'     => __('Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-feature' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'feature_bg_color',
			[
				'label'     => __('Background Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-wrapper tr:not(.ot-cpt-header) td:first-child' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'feature_text_typography',
				'selector' => '{{WRAPPER}} .ot-cpt-feature',
			]
		);

		$this->add_responsive_control(
			'feature_text_align',
			[
				'label'     => __('Alignment', 'progrisaas'),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __('Left', 'progrisaas'),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'progrisaas'),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __('Right', 'progrisaas'),
						'icon'  => 'eicon-text-align-right',
					]
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-feature' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'feature_text_padding',
			[
				'label'      => __('Padding', 'progrisaas'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .ot-cpt-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'feature_box_heading_style',
			[
				'label'     => __('Heading', 'progrisaas'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'feature_box_heading!' => ''
				]
			]
		);

		$this->add_control(
			'feature_heading_color',
			[
				'label'     => __('Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-fbox-heading' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-cpt-hide.ot-cpt-fbox-heading' => 'color: {{VALUE}};',
				],
				'condition' => [
					'feature_box_heading!' => ''
				]
			]
		);
		$this->add_control(
			'feature_heading_bg_color',
			[
				'label'     => __('Background Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} tr td.ot-cpt-fbox-heading' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} tr td.ot-cpt-hide.ot-cpt-fbox-heading' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'feature_box_heading!' => ''
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'feature_heading_typography',
				'selector' => '{{WRAPPER}} .ot-cpt-fbox-heading , {{WRAPPER}} .ot-cpt-hide.ot-cpt-fbox-heading',
				'condition' => [
					'feature_box_heading!' => ''
				]
			]
		);


		$this->end_controls_section();

		//Heading
		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => __('Heading', 'progrisaas'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ot_th_height',
			[
				'label'     => __('Height', 'progrisaas'),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-fbox-heading' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-cpt-heading' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_text_color',
			[
				'label'     => __('Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-heading' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'active_tab_color',
			[
				'label'     => __('Active Heading Background Color (On Mobile)', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-heading.active' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'heading_text_color_active',
			[
				'label'     => __('Active Heading Text Color (On Mobile)', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-heading.active' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'heading_text_bg_color',
			[
				'label'     => __('Background Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} tr td.ot-cpt-heading' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_text_typography',
				'selector' => '{{WRAPPER}} .ot-cpt-heading',
			]
		);
		$this->add_responsive_control(
			'heading_text_align',
			[
				'label'     => __('Alignment', 'progrisaas'),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __('Left', 'progrisaas'),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'progrisaas'),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __('Right', 'progrisaas'),
						'icon'  => 'eicon-text-align-right',
					]
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-heading' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'heading_text_padding',
			[
				'label'      => __('Padding', 'progrisaas'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .ot-cpt-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//Price
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __('Price', 'progrisaas'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'price_heading',
			[
				'label'     => __('Price', 'progrisaas'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'price_text_color',
			[
				'label'     => __('Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-price' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'price_text_typography',
				'label'    => __('Typography', 'progrisaas'),
				'selector' => '{{WRAPPER}} .ot-cpt-price',
			]
		);
		$this->add_control(
			'duration_heading',
			[
				'label'     => __('Period', 'progrisaas'),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'duration_text_color',
			[
				'label'     => __('Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-period' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'duration_text_typography',
				'label'    => __('Typography', 'progrisaas'),
				'selector' => '{{WRAPPER}} .ot-cpt-period',
			]
		);

		$this->end_controls_section();

		//Features
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __('Features', 'progrisaas'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'features_itext_color',
			[
				'label'     => __('Text Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_check_color',
			[
				'label'     => __('Check Icon Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.ot-flaticon-check' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'feature_check_bg_color',
			[
				'label'     => __('Check Background Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.ot-flaticon-check' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'features_close_color',
			[
				'label'     => __('Close Icon Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.ot-flaticon-close' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'feature_close_bg_color',
			[
				'label'     => __('Close Background Color', 'progrisaas'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} span.ot-flaticon-close' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'ifeature_text_typography',
				'selector' => '{{WRAPPER}} .ot-cpt-text',
			]
		);

		$this->add_responsive_control(
			'ifeature_text_align',
			[
				'label'     => __('Alignment', 'progrisaas'),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __('Left', 'progrisaas'),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'progrisaas'),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __('Right', 'progrisaas'),
						'icon'  => 'eicon-text-align-right',
					]
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ot-cpt-text' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		//Button
		$this->start_controls_section(
			'btn_style_section',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .octf-btn, {{WRAPPER}} .octf-price-link-detail',
			]
		);
        
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_style_trial',
			[
				'label' => __( 'Button 1', 'progrisaas' ),
			]
		);

		$this->add_control(
			'btn_trial_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_bg',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_border',
			[
				'label' => __( 'Border Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_trial_text_hcolor',
			[
				'label' => __( 'Text Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_hbg',
			[
				'label' => __( 'Background Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_hborder',
			[
				'label' => __( 'Border Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_style_detail',
			[
				'label' => __( 'Button 2', 'progrisaas' ),
			]
		);

		$this->add_control(
			'btn_detail_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-price-link-detail' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_detail_hcolor',
			[
				'label' => __( 'Text Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-price-link-detail:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	function add_condition_value($j)
	{
		$value = [];
		for ($i = $j; $i < 6; $i++) {
			$value[] = $i;
		}

		return $value;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('ot-cpt-wrapper', 'class', 'ot-cpt-wrapper');
		if ($settings['feature_box_heading'] == '') {
			$this->add_render_attribute('ot-cpt-wrapper', 'class', 'feature-heading-blank');
		}

		?>

		<article <?php echo $this->get_render_attribute_string('ot-cpt-wrapper'); ?>>

			<ul>
				<?php
				for ($i = 1; $i <= $settings['table_count']; $i++) {
					
					echo '<li class="flex-middle ot-cpt-heading ot-cpt-table-' . $i . '">';
					echo '<div class="ot-cpt-title-price">';
					echo $settings['table_title_' . $i];
					echo '<div class="ot-cpt-price-wrapper">';
					echo '<span class="ot-cpt-price">' . $settings['table_price_' . $i] . '</span>
						  <span class="ot-cpt-period">' . $settings['table_duration_' . $i] . '</span>';
					echo '</div>';
					echo '</div>';
					echo '</li>';
				}
				?>
			</ul>

			<table>
				<tbody>
					<tr class="ot-cpt-header">
						<?php
						$class = 'hide';
						$cont = "";
						$rowspan = "";
						if (!empty($settings['feature_box_heading'])) {
							$rowspan = 2;
							$class   = "ot-cpt-fbox-heading";
							$cont    = $settings['feature_box_heading'];
						} ?>

						<td class="<?php echo $class; ?>" rowspan="<?php echo $rowspan; ?>"> <?php echo $cont; ?></td>
						<?php

						for ($i = 1; $i <= $settings['table_count']; $i++) {
							
							echo '<td class="ot-cpt-heading ot-cpt-table-' . $i . '">';
							echo '<div class="ot-cpt-title-price">';
							echo $settings['table_title_' . $i];
							echo '<div class="ot-cpt-price-wrapper">';
							echo '<span class="ot-cpt-price">' . $settings['table_price_' . $i] . '</span>
								  <span class="ot-cpt-period">' . $settings['table_duration_' . $i] . '</span>';
							echo '</div>';
							echo '</div>';
							echo '</td>';
						}
						?>
					</tr>
					<?php
					echo '<tr>';
					$cls = "hide ot-cpt-hide";
					if (!empty($settings['feature_box_heading'])) {
						$cls = "hide ot-cpt-hide ot-cpt-fbox-heading";
					}
					?>
					<td class="<?php echo $cls; ?>"><?php echo $settings['feature_box_heading']; ?></td>
					<!-- <td class="hide ot-cpt-hide"></td> -->
					<?php
					for ($j = 1; $j <= $settings['table_count']; $j++) {
						echo '<td class="hide ot-cpt-hide"></td>';
					// 	echo '<td class="hide ot-cpt-hide ot-cpt-table-' . $j .'"><div class="ot-cpt-price-wrapper">';
					// 	echo '<span class="ot-cpt-price">' . $settings['table_price_' . $j] . '</span>';
					// 	echo '</div>';
					// 	echo '<span class="ot-cpt-period">' . $settings['table_duration_' . $j] . '</span>';
					// 	echo '</td>';
					}
					echo '</tr>';

					for ($x = 1; $x <= count($settings['features_text']); $x++) {
						echo '<tr>';
						echo '<td  class="ot-cpt-feature">';
							echo $settings['features_text'][$x - 1]['legend_feature_text'];
						echo '</td>';

						for ($j = 1; $j <= $settings['table_count']; $j++) {
							echo '<td class="ot-cpt-text ot-cpt-table-' . $j . '">';
							if (count($settings['feature_items_' . $j]) >= $x) {
								if ($settings['feature_items_' . $j][$x - 1]['table_content_type'] !== 'text') {
									if ($settings['feature_items_' . $j][$x - 1]['table_content_type'] == 'fas fa-times') {
										$icon  = 'ot-flaticon-close';
									} else {
										$icon  = 'ot-flaticon-check';
									}
									echo '<div><span class="' . $icon . '"></span></div>';
								} else {
									echo $settings['feature_items_' . $j][$x - 1]['feature_text'];
								}
							} else {
								echo '';
							}
							echo '</td>';
						}
						echo '</tr>';
					}
					
					echo '<td></td>';
					for ($j = 1; $j <= $settings['table_count']; $j++) {

						if ( !empty( $settings['link_trial_' . $j]['url'] ) ) {
							$this->add_render_attribute('button_trial_' . $j, 'href', $settings['link_trial_' . $j]['url']);

							if ( $settings['link_trial_' . $j]['is_external'] ) {
								$this->add_render_attribute('button_trial_' . $j, 'target', '_blank');
							}

							if ( $settings['link_trial_' . $j]['nofollow'] ) {
								$this->add_render_attribute('button_trial_' . $j, 'rel', 'nofollow');
							}
						}
						$this->add_render_attribute('button_trial_' . $j, 'class', 'octf-btn --price-link-trial');

						if ( ! empty( $settings['link_detail_' . $j]['url'] ) ) {
							$this->add_render_attribute( 'button_detail_' . $j, 'href', $settings['link_detail_' . $j]['url'] );

							if ( $settings['link_detail_' . $j]['is_external'] ) {
								$this->add_render_attribute( 'button_detail_' . $j, 'target', '_blank' );
							}

							if ( $settings['link_detail_' . $j]['nofollow'] ) {
								$this->add_render_attribute( 'button_detail_' . $j, 'rel', 'nofollow' );
							}
						}
						$this->add_render_attribute( 'button_detail_' . $j, 'class', 'octf-price-link-detail' );

						echo '<td class="ot-cpt-btn ot-cpt-table-' . $j . '">';
						if ($settings['label_link_trial_' . $j] !== '') {
							echo '<a ' . $this->get_render_attribute_string('button_trial_' . $j) . '>' . $settings['label_link_trial_' . $j] . '</a>';
						}
						if ($settings['label_link_detail_' . $j] !== '') {
							echo '<a ' . $this->get_render_attribute_string('button_detail_' . $j) . '>' . $settings['label_link_detail_' . $j] . '</a>';
						}
						echo '</td>';
					}
						?>
				</tbody>
			</table>
		</article>
	<?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Compare_Pricing_Table class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Compare_Pricing_Table() );