<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Tabs
 */
class ProgriSaaS_Tabs extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itabs';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Tabs', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-tabs';
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
				'label' => __( 'Tabs', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Title & Description', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Tab Title', 'progrisaas' ),
				'placeholder' => __( 'Tab Title', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'default' => __( 'Tab Content', 'progrisaas' ),
				'placeholder' => __( 'Tab Content', 'progrisaas' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$this->add_control(
			'ot_tabs',
			[
				'label' => __( 'Tabs Items', 'progrisaas' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'progrisaas' ),
						'tab_content' => __( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'progrisaas' ),
					],
					[
						'tab_title' => __( 'Tab #2', 'progrisaas' ),
						'tab_content' => __( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'progrisaas' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Tabs', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'style_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_width',
			[
				'label' => __( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link' => 'width: {{SIZE}}{{UNIT}};',
				],
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
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .ot-tabs__heading' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-tabs__heading .tab-link',
				'separator' => 'before',
			]
		);
		
		$this->start_controls_tabs( 'tabs_title_style' );

		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);

		$this->add_control(
			'title_bgcolor',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link:not(.current)' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .ot-tabs__heading .tab-link:not(.current)' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'selector' => '{{WRAPPER}} .ot-tabs__heading .tab-link',
			]
		);
		$this->add_control(
			'title_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => __( 'Active/Hover', 'progrisaas' ),
			]
		);

		$this->add_control(
			'title_bg_active',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link.current, {{WRAPPER}} .ot-tabs__heading .tab-link:hover' => 'background: {{VALUE}};',
				]
			]
		);
		
		$this->add_control(
			'title_color_active',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link.current, {{WRAPPER}} .ot-tabs__heading .tab-link:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border_active',
				'selector' => '{{WRAPPER}} .ot-tabs__heading .tab-link.current, {{WRAPPER}} .ot-tabs__heading .tab-link:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		//Content
		$this->add_control(
			'style_content',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__content' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-tabs__content ul li:before, {{WRAPPER}} .ot-tabs__content ol li:before' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-tabs__content',
			]
		);
		
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="ot-tabs">
			<?php $random = rand(1,1000); if ( $settings['ot_tabs'] ) : ?>
			<ul class="ot-tabs__heading unstyle">
				<?php $i = 1; foreach ( $settings['ot_tabs'] as $tabs ) { ?>
				<li class="tab-link" data-tab="tab-<?php echo esc_attr($i.$random); ?>"><?php echo $tabs['tab_title']; ?></li>
				<?php $i++; } ?>
			</ul>
			<?php $j = 1; foreach ( $settings['ot_tabs'] as $tabs ) { ?>
			<div id="tab-<?php echo esc_attr($j.$random); ?>" class="ot-tabs__content">
				<?php echo $tabs['tab_content']; ?>
			</div>
			<?php $j++; } endif; ?>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Tabs class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Tabs() );