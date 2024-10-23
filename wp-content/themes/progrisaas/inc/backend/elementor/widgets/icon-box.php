<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Icon Box
 */
class ProgrisaaS_IconBox extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iiconbox';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Icon Box', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-icon-box';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Icon Box', 'progrisaas' ),
			]
		);

		$this->add_control(
			'icon_font',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		
		$this->add_control(
			'icon_view',
			[
				'label' => __( 'View Icon', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'progrisaas' ),
					'stacked' => __( 'Stacked', 'progrisaas' ),
				],
				'default' => 'default',
				'prefix_class' => 'ot-view-',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Total Control', 'progrisaas' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'header_size',
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
				'default' => 'h5',
			]
		);

		$this->add_control(
			'content',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Real-time notifications and detailed transaction data helps you understand your money better.', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				]
			]
		);

		$repeater->add_control(
			'iconbox_feature_text',
			[
				'label'       => __('Feature', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default' 	  => __( 'Feature', 'progrisaas' ),
				'placeholder' => __('Enter your feature', 'progrisaas'),
			]
		);

		$this->add_control(
			'iconbox_features',
			[
				'label'      => __('Features', 'progrisaas'),
				'type'       => Controls_Manager::REPEATER,
				'show_label' => true,
				'default'    => [],
				'fields'     =>  $repeater->get_controls(),
				'title_field' => '{{{ iconbox_feature_text }}}',
				'prevent_empty' => false,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default'	=> [],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read more <i class="ot-flaticon-right-arrow"></i>', 'progrisaas' ),
				'label_block' => 'true',
				'condition' => [
					'link[url]!' => '',
				]
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Icon Position', 'progrisaas' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'progrisaas' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'progrisaas' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __( 'Right', 'progrisaas' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'ot-position-',
				'toggle' => false,
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'icon_font[value]',
							'operator' => '!=',
							'value' => '',
						],
					],
				],
			]
		);

		$this->end_controls_section();

		//Style
		
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_space',
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
					'{{WRAPPER}}.ot-position-right .ot-icon-box__icon' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ot-position-left .ot-icon-box__icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ot-position-top .ot-icon-box__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .ot-icon-box__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'condition' => [
					'icon_view' => 'stacked',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'icon_view' => 'stacked',
				],
			]
		);
		$this->start_controls_tabs( 'ot_icon_colors' );

		$this->start_controls_tab(
			'ot_icon_colors_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-box__icon svg' => 'fill: {{VALUE}};'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'	=> 'icon_bgcolor',
				'label' => __( 'Background', 'progrisaas' ),
				'types' => [ 'classic', 'gradient' ],
				'default' => '',
				'selector' => '{{WRAPPER}} .ot-icon-box__icon',
				'condition'	=> [
					'icon_view' => 'stacked'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'label' => __( 'Box Shadow', 'progrisaas' ),
				'selector' => '{{WRAPPER}} .ot-icon-box__icon',
				'condition'	=> [
					'icon_view' => 'stacked'
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'ot_icon_colors_hover',
			[
				'label' => __( 'Hover', 'progrisaas' ),
			]
		);
		$this->add_control(
			'icon_hcolor',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box:hover .ot-icon-box__icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-box:hover .ot-icon-box__icon svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'	=> 'icon_bghcolor',
				'label' => __( 'Background', 'progrisaas' ),
				'types' => [ 'classic', 'gradient' ],
				'default' => '',
				'selector' => '{{WRAPPER}} .ot-icon-box:hover .ot-icon-box__icon',
				'condition'	=> [
					'icon_view' => 'stacked'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_hshadow',
				'label' => __( 'Box Shadow', 'progrisaas' ),
				'selector' => '{{WRAPPER}} .ot-icon-box:hover .ot-icon-box__icon',
				'condition'	=> [
					'icon_view' => 'stacked'
				]
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'progrisaas' ),
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
					]
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
			]
		);
		$this->add_control(
			'content_vertical_alignment',
			[
				'label' => __( 'Vertical Alignment', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top' => __( 'Top', 'progrisaas' ),
					'middle' => __( 'Middle', 'progrisaas' ),
					'bottom' => __( 'Bottom', 'progrisaas' ),
				],
				'default' => 'top',
				'prefix_class' => 'ot-vertical-align-',
				'separator' => 'after',
				'condition'	=> [
					'position!' => 'top'
				]
			]
		);
		$this->add_control(
			'box_hover_color_item',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'box_hover_title_color',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box:hover .icon-box-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-box:hover .icon-box-title a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'box_hover_btn_hcolor',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box:hover .icon-box-btn a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'btn_text!' => '',
				]
			]
		);
		$this->add_control(
			'box_hover_content_color',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box:hover .icon-box-des' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-box:hover .ot-icon-box__content ul li:before' => 'border-color: {{VALUE}};',
				],
				'description' => __( 'Color of content items after hovering iconbox block', 'progrisaas' ),
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
		$this->add_responsive_control(
			'title_space_top',
			[
				'label' => __( 'Spacing Top', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_space',
			[
				'label' => __( 'Spacing Bottom', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .icon-box-title a' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box .icon-box-title a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'link[url]!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .icon-box-title',
			]
		);

		$this->add_control(
			'is_divider',
			[
				'label'   => esc_html__( 'Divider', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);
		$this->add_control(
			'divider_color',
			[
				'label' => __( 'Divider Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-divider span' => 'background: {{VALUE}};',
				],
				'condition' => [
					'is_divider' => 'yes',
				]
			]
		);
		$this->add_control(
			'divider_height',
			[
				'label' => __( 'Divider Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
						'step' => 0.1,
					],
				],
				'condition' => [
					'is_divider' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box-divider span' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		//Description
		$this->add_control(
			'heading_content',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'des_space',
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
					'{{WRAPPER}} .icon-box-des' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'btn_text!' => '',
				]
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box-des' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-box__content ul li:before' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .icon-box-des',
			]
		);

		//Button
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'btn_text!' => '',
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
					'{{WRAPPER}} .icon-box-btn a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'btn_text!' => '',
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
					'{{WRAPPER}} .ot-icon-box .icon-box-btn a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'btn_text!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .icon-box-btn',
				'condition' => [
					'btn_text!' => '',
				]
			]
		);

		$this->end_controls_section();

		//Features
		$this->start_controls_section(
			'section_style_features',
			[
				'label' => __( 'Features', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'Space Between', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__content ul li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_feature_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'ficon_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__content ul .icon-box-features-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ficon_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__content ul .icon-box-features-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ficon_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__content ul .icon-box-features-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-icon-box__content ul .icon-box-features-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_feature_text',
			[
				'label' => __( 'Text', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'ftext_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-icon-box__content ul li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ftext_typography',
				'selector' => '{{WRAPPER}} .ot-icon-box__content ul li',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'heading', 'class', 'icon-box-title' );
		$title = $settings['title'];
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'iconbox', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'iconbox', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'iconbox', 'rel', 'nofollow' );
			}
			$title_html = sprintf( '<%1$s %2$s><a ' .$this->get_render_attribute_string( 'iconbox' ). '>%3$s</a></%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );
		}

		?>
		<div class="ot-icon-box">
			<?php if( !empty( $settings['icon_font']['value'] ) ){ ?>
			<div class="ot-icon-box__icon">
		    	<?php Icons_Manager::render_icon( $settings['icon_font'], [ 'aria-hidden' => 'true' ] ) ?>
	        </div>
	    	<?php } ?>
	        <div class="ot-icon-box__content">
	        	<?php if( $settings['title'] ) { echo $title_html; } ?>
	        	<?php if( $settings['is_divider'] ) { ?>
	        	<div class="icon-box-divider"><span></span></div>
				<?php } ?>
				<?php if( $settings['content'] ) { echo '<div class="icon-box-des">' .$settings['content']. '</div>'; } ?>
				<?php if( !empty( $settings['iconbox_features'] ) ) { ?>
				<div class="icon-box-features-list">
					<ul class="icon-box-features-items">
						<?php foreach ( $settings['iconbox_features'] as $item ) : ?>
						<li class="icon-box-features-item">
							<span class="icon-box-features-icon">
							<?php Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</span>
							<span class="icon-box-features-text"><?php echo $item['iconbox_feature_text']; ?></span>
						</li>
						<?php endforeach ?>
					</ul>
				</div>
				<?php } ?>
				<?php if( $settings['btn_text'] ) { ?>
	        	<div class="icon-box-btn">
	        		<a href="<?php echo esc_url( $settings['link']['url'] ); ?>"><?php echo $settings['btn_text']; ?></a>
	        	</div>
	        	<?php } ?>
			</div>	
	    </div>
	    <?php
	}

	protected function content_template() {}

}
// After the ProgrisaaS_IconBox class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgrisaaS_IconBox() );