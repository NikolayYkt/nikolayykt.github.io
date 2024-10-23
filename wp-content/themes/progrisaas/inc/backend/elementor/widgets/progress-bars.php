<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Progress Bars 
 */
class ProgriSaaS_Progress_Bars extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iprogress';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Progress Bars', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-skill-bar';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content Progress Bars
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'progrisaas' ),
			]
		);

		$this->add_control(
			'bar_style',
			[
				'label' 	=> __( 'Bar Style', 'progrisaas' ),
				'type'  	=> Controls_Manager::SELECT,
				'default' 	=> 'line',
				'options' 	=> [
					'line'    => __( 'Style 1: Line', 'progrisaas' ),
					'circle'  => __( 'Style 2: Circle', 'progrisaas' ),
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => 'Title',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Prosperity', 'progrisaas' ),
				'condition' => [
					'bar_style' => 'circle',
				]
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
					'p' => 'p',
				],
				'default' => 'h5',
				'condition' => [
					'bar_style' => 'circle',
				]
			]
		);
		$this->add_control(
			'content',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'As technology layers deeper and deeper into the fabricof our', 'progrisaas' ),
			]
		);
		$this->add_control(
			'percent',
			[
				'label' => 'Percentage',
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 70,
					'unit' => '%',
				],
			]
		);
		$this->add_control(
			'percent_text',
			[
				'label'   => esc_html__( 'Show Percentage', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'bar_style' => 'circle',
				]
			]
		);

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
			'bar_style_section',
			[
				'label' => __( 'Progress Bar', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'progress_space',
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
					'{{WRAPPER}} .ot-progress-circle__inner' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-progress-line__inner' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bar_color_circle',
			[
				'label' => __( 'Progress Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1080d0',
				'condition' => [
					'bar_style' => 'circle',
				],
			]
		);
		$this->add_responsive_control(
			'bar_height',
			[
				'label' => __( 'Height', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 4,
				],
				'condition' => [
					'bar_style' => 'circle',
				]
			]
		);
		$this->add_responsive_control(
			'bar_size',
			[
				'label' => __( 'Circle Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'default' => [
					'size' => 165,
				],
				'condition' => [
					'bar_style' => 'circle',
				]
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Line Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-progress-line__inner .progress-bar' => 'background: {{VALUE}};',
					'{{WRAPPER}} .ot-progress-line__inner .ppercent' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-progress-circle__inner:after' => 'border-color: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'line_height_line',
			[
				'label' => __( 'Line Height', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-progress-line__inner' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bar_style' => 'line',
				]
			]
		);

		$this->add_responsive_control(
			'line_height_circle',
			[
				'label' => __( 'Line Height', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-progress-circle__inner:after' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bar_style' => 'circle',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_text_section',
			[
				'label' => __( 'Text', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'bar_style' => 'circle',
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
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-progress-circle__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'bar_style' => 'circle',
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
					'{{WRAPPER}} .ot-progress-circle__title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'bar_style' => 'circle',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-progress-circle__title',
				'condition' => [
					'bar_style' => 'circle',
				],
				'separator' => 'after',
			]
		);

		//Percentage
		$this->add_control(
			'heading_percent',
			[
				'label' => __( 'Percentage', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'per_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-progress-line__inner .ppercent, {{WRAPPER}} .ot-progress-circle__inner > span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'per_typography',
				'selector' => '{{WRAPPER}} .ot-progress-line__inner .ppercent, {{WRAPPER}} .ot-progress-circle__inner > span',
			]
		);

		//Desc
		$this->add_control(
			'heading_desc',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-progress-circle__des, {{WRAPPER}} .progress-des' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ot-progress-circle__des, {{WRAPPER}} .progress-des',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'heading', 'class', 'ot-progress-circle__title' );
		$title = $settings['title'];
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );
		?>

		<?php if( $settings['bar_style'] == 'line' ) { ?>
		<div class="ot-progress-line" data-percent="<?php echo esc_attr( $settings['percent']['size'] ); ?>">
	        <div class="ot-progress-line__inner">
				<div class="progress-bar">
					<?php if( $settings['percent_text'] ) echo '<span class="ppercent"></span>'; ?>
				</div>
			</div>
			<?php if( $settings['content'] ) { echo '<p class="progress-des">' .$settings['content']. '</p>'; } ?>
	    </div>
		<?php }else{ ?>
		<div class="ot-progress-circle" data-color="<?php echo esc_attr( $settings['bar_color_circle'] ); ?>" data-height="<?php echo esc_attr( $settings['bar_height']['size'] ); ?>" data-size="<?php echo esc_attr( $settings['bar_size']['size'] ); ?>">
			<div class="ot-progress-circle__inner" data-percent="<?php echo esc_attr( $settings['percent']['size'] ); ?>">
				<span>
					<?php if( $settings['percent_text'] ) echo '<span class="percent">' . $settings['percent']['size'] . '</span>'; ?>
				</span>
			</div>
			<?php if( $settings['title'] ) { echo $title_html; } ?>
			<?php if( $settings['content'] ) { echo '<p class="ot-progress-circle__des">' .$settings['content']. '</p>'; } ?>
		</div>
		
	    <?php }
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Progress_Bars class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Progress_Bars() );