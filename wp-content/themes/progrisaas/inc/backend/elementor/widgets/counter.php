<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Counter
 */
class ProgriSaaS_Counter extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icounter';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Counter', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-counter';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Counter', 'progrisaas' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title:', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Downloads', 'progrisaas' ),
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'before_number',
			[
				'label' => __( 'Before Number:', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'progrisaas' ),
			]
		);

		$this->add_control(
			'number',
			[
				'label' => 'Number:',
				'type' => Controls_Manager::TEXT,
				'default' => __( '512', 'progrisaas' ),
			]
		);

		$this->add_control(
			'after_number',
			[
				'label' => __( 'After Number:', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'progrisaas' ),
			]
		);		

		$this->add_control(
			'time',
			[
				'label' => __( 'Duration', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1000,
						'max'  => 10000,
						'step' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2000,
				],
			]
		);
		
		$this->add_control(
			'position',
			[
				'label' => __( 'Number Position', 'progrisaas' ),
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
				'prefix_class' => 'ot-align-',
				'selectors' => [
					'{{WRAPPER}} .ot-counter' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'position' => 'top'
				]
			]
		);
		$this->end_controls_section();

		//Style

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Style', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Icon
		$this->add_control(
			'heading_number',
			[
				'label' => __( 'Number', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-counter span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .ot-counter span',
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
					'{{WRAPPER}}.ot-position-top .ot-counter h6' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ot-position-left .ot-counter > div' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ot-position-right .ot-counter > div' => 'margin-left: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-counter h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-counter h6',
			]
		);

		// Description
		$this->add_control(
			'heading_desc',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'desc!' => ''
				]
			]
		);
		$this->add_responsive_control(
			'desc_space',
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
					'{{WRAPPER}} .ot-counter p' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'desc!' => ''
				]
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-counter p' => 'color: {{VALUE}};',
				],
				'condition' => [
					'desc!' => ''
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ot-counter p',
				'condition' => [
					'desc!' => ''
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
    	<div class="ot-counter" data-counter="<?php echo $settings['number']; ?>">
        	<div class="dflex number-wrapper">
        		<span class="ot-counter__num-prefix"><?php echo $settings['before_number']; ?></span>
        		<span class="ot-counter__num" data-to="<?php echo $settings['number']; ?>" data-time= "<?php echo $settings['time']['size']; ?>"></span>
        		<span class="ot-counter__num-suffix"><?php echo $settings['after_number']; ?></span>
        	</div>
        	<div class="title-desc-wrapper">
        	<?php if( $settings['title'] ) { ?><h6><?php echo $settings['title']; ?></h6><?php } ?>  
        	<?php if( $settings['desc'] ) { ?><p><?php echo $settings['desc']; ?></p><?php } ?>  	
        	</div>	        
	    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Counter class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Counter() );