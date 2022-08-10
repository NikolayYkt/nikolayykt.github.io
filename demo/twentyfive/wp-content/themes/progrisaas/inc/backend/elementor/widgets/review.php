<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Review
 */
class ProgriSaaS_Review extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-review';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Review', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-review';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_reviews',
			[
				'label' => __( 'Reviews', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'image_rate',
			[
				'label' => __( 'Image Rate', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'name',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Peter Smith', 'progrisaas' ),
			]
		);

		$repeater->add_control(
			'address',
			[
				'label' => __( 'Address', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'San Francisco', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => '10',
				'default' => __( '"You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed."', 'progrisaas' ),
			]
		);
		
		$this->add_control(
		    'data_reviews',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [
		            [
		             	'content' => __( '"You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed."', 'progrisaas' ),
		                'image'  => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'name'	  => __( 'Anna Paulina', 'progrisaas' ),
						'address'	  => __( 'Client of Company', 'progrisaas' ),
		            ],
		            [
		             	'content' => __( '"You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed."', 'progrisaas' ),
		                'image'  => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'name'	  => __( 'Anna Paulina', 'progrisaas' ),
						'address'	  => __( 'Client of Company', 'progrisaas' ),
		            ],
		            [
		             	'content' => __( '"You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed."', 'progrisaas' ),
		                'image'  => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'name'	  => __( 'Anna Paulina', 'progrisaas' ),
						'address'	  => __( 'Client of Company', 'progrisaas' ),
		            ]
		        ],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{name}}}',
		    ]
		);

		$this->end_controls_section();

		// Styling.
		$this->start_controls_section(
			'style_tcontent',
			[
				'label' => __( 'General', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_cbox',
			[
				'label' => __( 'Content Box', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'content_bg',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-reviews__item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-reviews__item' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .review-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .review-content',
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-reviews__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Author Detail.
		$this->start_controls_section(
			'style_author_detail',
			[
				'label' => __( 'Author Detail', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => __( 'Width (px)', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .review-author' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Name.
		$this->add_control(
			'heading_name',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'spacing_name',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .review-author .author_name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .review-author .author_name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .review-author .author_name',
			]
		);

		// Address.
		$this->add_control(
			'heading_address',
			[
				'label' => __( 'Address', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'spacing_add',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .review-author .author_add' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'address_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .review-author .author_add' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'address_typography',
				'selector' => '{{WRAPPER}} .review-author .author_add',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="ot-reviews">
			<?php if ( ! empty( $settings['data_reviews'] ) ) : foreach ( $settings['data_reviews'] as $testi ) : 
				?>
				<div class="ot-reviews__item">
			        <div class="review-author">
			        	<h6 class="author_name"><?php echo $testi['name']; ?></h6>
			        	<?php if($testi['address']) { ?><p class="author_add"><?php echo $testi['address']; ?></p><?php } ?>
			        	<div class="author_rating">
			        	<img src="<?php echo esc_url( $testi['image_rate']['url'] ) ?>" alt="<?php echo $testi['name']; ?>">
			        	</div>
			        </div>
			        <div class="review-content">
			        	<p><?php echo $testi['content']; ?></p>
		        	</div>
	        	</div>
			<?php endforeach; endif; ?>		
	    </div>
	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Review class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Review() );