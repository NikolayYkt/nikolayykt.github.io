<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class ProgriSaaS_Heading2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iheading2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Heading 2', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-t-letter';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'progrisaas' ),
			]
		);

		$this->add_control(
			'sub_behind',
			[
				'label' => __( 'Sub Title & Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'our services', 'progrisaas' ),
				'placeholder' => __( 'Enter your sub title', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => '',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'What we do', 'progrisaas' ),
				'placeholder' => __( 'Enter your title', 'progrisaas' ),
				'show_label' => false,
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading_size',
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
					],
				],
				// 'prefix_class' => 'progrisaas%s-align-',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
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
			'stitle_left_space',
			[
				'label' => __( 'Position Horizontal', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-heading__behind' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'stitle_top_space',
			[
				'label' => __( 'Position Vertical', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-heading__behind' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-heading__behind' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stitle_typography',
				'selector' => '{{WRAPPER}} .ot-heading__behind',
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

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'behind', 'class', 'ot-heading__behind' );
		$this->add_render_attribute( 'heading', 'class', 'ot-heading__title' );
		$title = $settings['title'];
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['heading_size'], $this->get_render_attribute_string( 'heading' ), $title );
		?>
		<div class="ot-heading -sub-behind">
	        <?php if( ! empty( $settings['sub_behind'] ) ) { echo '<span '.$this->get_render_attribute_string( 'behind' ).'>' .$settings['sub_behind']. '</span>'; } ?>
	        <?php if( ! empty( $settings['title'] ) ) { echo $title_html; } ?>
	    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Heading2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Heading2() );