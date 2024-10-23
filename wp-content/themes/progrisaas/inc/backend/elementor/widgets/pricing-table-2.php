<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table
 */
class ProgriSaaS_Pricing_Table_2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipricingtable2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Pricing Table 2', 'progrisaas' );
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

		//Content Pricing Table
		$this->start_controls_section(
			'section_header',
			[
				'label' => __( 'Title & Price', 'progrisaas' ),
			]
		);

		$this->add_control(
			'table_style',
			[
				'label' 	=> __( 'Table Style Color', 'progrisaas' ),
				'type'  	=> Controls_Manager::SELECT,
				'default' 	=> '--second-color',
				'options' 	=> [
					'--main-color' 	 => __( 'Main Color', 'progrisaas' ),
					'--second-color' => __( 'Second Color', 'progrisaas' ),
					'--third-color'  => __( 'Third Color', 'progrisaas' ),
					'--dark-color' 	 => __( 'Dark Color', 'progrisaas' ),
				]
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Enter your title', 'progrisaas' ),
			]
		);

		$this->add_control(
			'heading_tag',
			[
				'label' => __( 'Title HTML Tag', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h4',
				'condition'	=> [
					'heading!'	=> ''
				]
			]
		);
		$this->add_control(
			'sub_price',
			[
				'label' => __( 'Sub Price', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'As low as', 'progrisaas' ),
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '1.99',
			]
		);

		$this->add_control(
			'desc_price',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '$2.15 /mo when you renew', 'progrisaas' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_features',
			[
				'label' => __( 'Features', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_features_text',
			[
				'label' => __( 'Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Item', 'progrisaas' ),
			]
		);

		$default_icon = [
			'value' => 'fas fa-check',
			'library' => 'fa-solid',
		];

		$repeater->add_control(
			'selected_item_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'item_icon',
				'default' => $default_icon,
			]
		);

		$repeater->add_control(
			'item_icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'features_list',
			[
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'item_features_text' => __( 'List Item #1', 'progrisaas' ),
						'selected_item_icon' => $default_icon,
					],
					[
						'item_features_text' => __( 'List Item #2', 'progrisaas' ),
						'selected_item_icon' => $default_icon,
					],
					[
						'item_features_text' => __( 'List Item #3', 'progrisaas' ),
						'selected_item_icon' => $default_icon,
					],
				],
				'title_field' => '{{{ item_features_text }}}',
				'prevent_empty' => false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_footer',
			[
				'label' => __( 'Footer', 'progrisaas' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Click Here', 'progrisaas' ),
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_table_section',
			[
				'label' => __( 'Table Box', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .ot-pricing-table' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .ot-pricing-table__footer' => 'display: block;',
				],
				'default' => 'center',
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		
		$this->end_controls_section();

		//Title
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'condition'	=>[
					'heading!'	=> ''
				]
			]
		);
		$this->add_responsive_control(
			'title_space',
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
					'{{WRAPPER}} .ot-pricing-table__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'	=>[
					'heading!'	=> ''
				]
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__title' => 'color: {{VALUE}};',
				],
				'condition'	=>[
					'heading!'	=> ''
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__title',
				'condition'	=>[
					'heading!'	=> ''
				],
			]
		);

		//Price
		$this->add_control(
			'heading_price',
			[
				'label' => __( 'Price', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'price_space',
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
					'{{WRAPPER}} .ot-pricing-table__price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__price' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__price-main',
				'separator' => 'after',
			]
		);

		//Price extra

		$this->add_control(
			'heading_oprice',
			[
				'label' => __( 'Over Price', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'oprice_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__subprice' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'oprice_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__subprice',
			]
		);

		$this->add_control(
			'heading_dprice',
			[
				'label' => __( 'Under Price', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'dprice_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__price-extra' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'dprice_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__price-extra',
			]
		);

		//Features
		$this->add_control(
			'heading_features',
			[
				'label' => __( 'Features', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'features_spacing',
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
					'{{WRAPPER}} .pricing-features-items' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'features_icon_size',
			[
				'label' => __( 'Icon Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing-features-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'features_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__features-list' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'features_icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pricing-features-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pricing-features-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'selector' => '{{WRAPPER}} li.pricing-features-item',
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

		$this->add_responsive_control(
			'btn_width',
			[
				'label' => __( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'btn_padding',
			[
				'label' => 'Padding',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .octf-btn',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .octf-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'progrisaas' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'btn_bg_hover_color',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'border_hover_color',
			[
				'label' => __( 'Border Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$heading_tag = $settings['heading_tag'];
		$this->add_render_attribute( 'heading', 'class', 'ot-pricing-table__title' );

		if ( $settings['table_style'] == '--main-color' ) {
			$this->add_render_attribute( 'button_detail', 'class', 'octf-btn' );
		}elseif ( $settings['table_style'] == '--second-color' ) {
			$this->add_render_attribute( 'button_detail', 'class', 'octf-btn octf-btn-second' );
		}elseif ( $settings['table_style'] == '--third-color' ) {
			$this->add_render_attribute( 'button_detail', 'class', 'octf-btn octf-btn-third' );
		}elseif ( $settings['table_style'] == '--dark-color' ) {
			$this->add_render_attribute( 'button_detail', 'class', 'octf-btn octf-btn-dark' );
		}else{
			$this->add_render_attribute( 'button_detail', 'class', 'octf-btn' );
		}

		if ( ! empty( $settings['btn_link']['url'] ) ) {
			$this->add_render_attribute( 'button_detail', 'href', $settings['btn_link']['url'] );

			if ( $settings['btn_link']['is_external'] ) {
				$this->add_render_attribute( 'button_detail', 'target', '_blank' );
			}

			if ( $settings['btn_link']['nofollow'] ) {
				$this->add_render_attribute( 'button_detail', 'rel', 'nofollow' );
			}
		}
		?>

		<div class="ot-pricing-table <?php echo esc_attr( $settings['table_style'] ); ?>">
			<div class="ot-pricing-table__header">
				<?php if ( ! empty( $settings['heading'] ) ) : ?>
					<<?php echo $heading_tag . ' ' . $this->get_render_attribute_string( 'heading' ); ?>><?php echo $settings['heading'] . '</' . $heading_tag; ?>>
				<?php endif; ?>
			</div>
			<div class="ot-pricing-table__price">
				<div class="ot-pricing-table__price-main --with-sub">
					<span class="ot-pricing-table__subprice"><?php echo esc_html( $settings['sub_price'] ); ?></span>
					<?php echo $settings['price']; ?>
				</div>
				<?php if($settings['desc_price']){ ?><span class="ot-pricing-table__price-extra"><?php echo esc_html( $settings['desc_price'] ); ?></span><?php } ?>
			</div>
			<?php if( !empty($settings['features_list']) ){ ?>
			<div class="ot-pricing-table__features-list">
				<ul class="pricing-features-items">
					<?php foreach ( $settings['features_list'] as $item ) : ?>
					<li class="pricing-features-item">
						<span class="pricing-features-icon">
						<?php Icons_Manager::render_icon( $item['selected_item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
						<span class="icon-box-features-text"><?php echo $item['item_features_text']; ?></span>
					</li>
					<?php endforeach ?>
				</ul>
			</div>
			<?php } ?>
			<div class="ot-pricing-table__footer">
				<?php if( !empty($settings['button_text']) ){ ?><a <?php echo $this->get_render_attribute_string( 'button_detail' ); ?>><?php echo esc_html( $settings['button_text'] ); ?></a><?php } ?>
			</div>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Pricing_Table_2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Pricing_Table_2() );