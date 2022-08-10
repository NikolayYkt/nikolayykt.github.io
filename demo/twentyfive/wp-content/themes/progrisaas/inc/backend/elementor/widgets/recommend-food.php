<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Recommend Food
 */
class ProgrisaaS_Recommend_Food extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-recommend-food';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Recommend Food', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-product-images';
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
			'image_food',
			[
				'label' => __( 'Choose Image', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image_food_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => ['1536x1536', '2048x2048'],
				'default' => 'full',
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
				'default' => __( 'Food Point Restaurant', 'progrisaas' ),
			]
		);

		$this->add_control(
			'icon_rate',
			[
				'label' => __( 'Icon Rate', 'progrisaas' ),
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
			'number_rate',
			[
				'label' => __( 'Point Rate', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'is_sale',
			[
				'label'   => esc_html__( 'Sale Off', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->add_control(
			'sale_off',
			[
				'label' => __( 'Sale', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'is_sale' => 'yes',
				]
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

		$this->end_controls_section();

		//Style
		
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Image', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', '%' ],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
					'px' => [
						'min' => 10,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-recommend-food__image' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-recommend-food__content' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'(mobile){{WRAPPER}} .ot-recommend-food__content' => 'width: 100%;',
				],
			]
		);

		$this->add_control(
			'sale_heading',
			[
				'label' => __( 'Sale Off', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'is_sale' => 'yes',
				]
			]
		);

		$this->add_control(
			'sale_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-food-sale' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_sale' => 'yes',
				]
			]
		);

		$this->add_control(
			'sale_bgcolor',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-food-sale' => 'background: {{VALUE}};',
				],
				'condition' => [
					'is_sale' => 'yes',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sale_typography',
				'selector' => '{{WRAPPER}} .ot-food-sale',
				'condition' => [
					'is_sale' => 'yes',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_bgcolor',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-recommend-food__content' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding Box', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-recommend-food__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-recommend-food' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_content_shadow' );

		$this->start_controls_tab(
			'content_shadow_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'label' => __( 'Box Shadow', 'progrisaas' ),
				'selector' => '{{WRAPPER}} .ot-recommend-food',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'content_shadow_hover',
			[
				'label' => __( 'Hover', 'progrisaas' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_hshadow',
				'label' => __( 'Box Shadow', 'progrisaas' ),
				'selector' => '{{WRAPPER}} .ot-recommend-food:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		
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
					'{{WRAPPER}} .ot-food-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-food-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-food-title a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .ot-food-title a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .ot-food-title',
			]
		);

		//Description
		$this->add_control(
			'heading_desc',
			[
				'label' => __( 'Description', 'progrisaas' ),
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
					'{{WRAPPER}} .ot-food-des' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-food-des',
			]
		);

		//Rate
		$this->add_control(
			'heading_rate',
			[
				'label' => __( 'Rate', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-food-rate i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-food-rate svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'rate_icolor',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-food-rate i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-food-rate svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rate_tcolor',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-food-rate' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rate_bgcolor',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-food-rate' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rate_typography',
				'selector' => '{{WRAPPER}} .ot-food-rate',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$title = $settings['title'];
		$this->add_render_attribute( 'heading', 'class', 'ot-food-title' );
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );

			$title_html = sprintf( '<%1$s %2$s><a ' .$this->get_render_attribute_string( 'link' ). '>%3$s</a></%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );
		}

		if ( ! empty( $settings['image_food']['url'] ) ) {
			$this->add_render_attribute( 'image_food', 'src', $settings['image_food']['url'] );
			$this->add_render_attribute( 'image_food', 'alt', Control_Media::get_image_alt( $settings['image_food'] ) );
			$this->add_render_attribute( 'image_food', 'title', Control_Media::get_image_title( $settings['image_food'] ) );

			$image_food_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_food_size', 'image_food' );

			if ( ! empty( $settings['link']['url'] ) ) {
				$image_food_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $image_food_html . '</a>';
			}

			$image_food_html = '<div class="ot-recommend-food__image">' . $image_food_html . '</div>';
		}

		?>
		<div class="ot-recommend-food dflex">
			<?php if( !empty( $image_food_html ) ) echo $image_food_html; ?>
	        <div class="ot-recommend-food__content dflex">
	        	<div>
	        		<?php if( $title ) { echo $title_html; } ?>
					<?php if( $settings['content'] ) { echo '<p class="ot-food-des">' .$settings['content']. '</p>'; } ?>
	        	</div>
				<?php if( !empty( $settings['number_rate'] ) || !empty( $settings['icon_rate'] ) ) { ?>
	        	<div class="ot-food-rate flex-middle">
	        		<?php if( !empty( $settings['icon_rate']['value'] ) ) Icons_Manager::render_icon( $settings['icon_rate'], [ 'aria-hidden' => 'true' ] ); ?>
	        		<?php if( !empty( $settings['number_rate'] ) ) echo '<span>' .$settings['number_rate']. '</span>'; ?>
	        	</div>
	        	<?php } ?>
			</div>	
			<?php if( !empty( $settings['sale_off'] ) ){ echo '<span class="ot-food-sale">'. $settings['sale_off']. '</span>'; } ?>
	    </div>
	    <?php
	}

	protected function content_template() {}

}
// After the ProgrisaaS_Recommend_Food class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgrisaaS_Recommend_Food() );