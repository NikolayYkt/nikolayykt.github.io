<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Tab Schedule
 */
class ProgriSaaS_Tab_Schedule extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itab-schedule';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Tab Schedule', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-site-title';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Schedule', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'First Day', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'tab_date',
			[
				'label' => 'Date - Time',
				'type' => Controls_Manager::DATE_TIME,
				'default' => gmdate( 'Y-m-d H:i', strtotime( '+7 days' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
			]
		);
		$repeater->add_control(
			'tab_link',
			[
				'label' => __( 'Link to ID Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '#tab-1', 'progrisaas' ),
			]
		);

		$this->add_control(
		    'ot_tab_schedules',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{tab_title}}}',
		    ]
		);

		$this->end_controls_section();

		//Styling
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tab-schedule__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Bottom Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tab-schedule__item:after' => 'background: {{VALUE}};',
				]
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
					'{{WRAPPER}} .ot-tab-schedule__item h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-tab-schedule__item h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Active', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tab-schedule__item.active h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-tab-schedule__item h6',
			]
		);
		//Date
		$this->add_control(
			'heading_date',
			[
				'label' => __( 'Date', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

		$this->add_control(
			'date_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tab-schedule__item' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .ot-tab-schedule__item span',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['ot_tab_schedules'] ) ) {
			return;
		}
		?>

		<div class="ot-tab-schedule">
			<?php foreach ( $settings['ot_tab_schedules'] as $item ) : ?>
			<div class="ot-tab-schedule__item" data-link="<?php echo esc_url($item['tab_link']); ?>">
				<h6><?php echo $item['tab_title']; ?></h6>
				<span><?php echo date('F j, Y', strtotime($item['tab_date'])); ?></span>
			</div>
			<?php endforeach; ?>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Tab_Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Tab_Schedule() );