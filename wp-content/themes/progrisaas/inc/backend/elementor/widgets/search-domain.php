<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**

 * Widget Name: Search Domain 

 */

class ProgriSaaS_SearchDomain extends Widget_Base{
 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {
		return 'isdomain';
	}
	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'OT Domain Checker', 'progrisaas' );

	}
	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {
		return 'eicon-search';
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
				'label' => __( 'Form', 'progrisaas' ),
			]

		);
		$this->add_control(
			'placeholder',
			[
				'label' => __( 'Input Placeholder', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Search for tour domain here', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'label_btn',
			[
				'label' => __( 'Label Button', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Search', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Action', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_responsive_control(
			'text_align',
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
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-domain-checker' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		//Style

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style Form', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Input
		$this->add_control(
			'heading_input',
			[
				'label' => __( 'Input', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'input_bg',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-domain-checker input' => 'background: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'input_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-domain-checker input' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'input_typography',
				'selector' => '{{WRAPPER}} .ot-domain-checker input',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'input_border',
				'selector' => '{{WRAPPER}} .ot-domain-checker input',
			]
		);

		$this->add_control(
			'input_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-domain-checker input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		//Button
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .octf-btn',
			]
		);

		$this->add_control(
			'btn_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		//Hover

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
					'{{WRAPPER}} .octf-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'background-color: {{VALUE}};',
				],
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
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'background-color: {{VALUE}};',
				],
			]

		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['link']['url'] ) ) {

			$this->add_render_attribute( 'action', 'action', $settings['link']['url'] );
			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'action', 'target', '_blank' );
			}
			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'action', 'rel', 'nofollow' );
			}
		}
		?>
		<div class="ot-domain-checker">
			<form <?php echo $this->get_render_attribute_string( 'action' ); ?>>
				<input type="text" name="domain" placeholder="<?php echo $settings['placeholder']; ?>" />
				<button type="submit" class="octf-btn"><?php echo $settings['label_btn']; ?></button>
			</form>
		</div>
		<?php
	}
	protected function content_template() {}
}

// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_SearchDomain() );