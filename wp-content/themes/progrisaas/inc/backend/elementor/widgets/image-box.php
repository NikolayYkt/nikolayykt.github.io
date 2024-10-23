<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Image Box
 */
class ProgrisaaS_ImageBox extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iimagebox';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Image Box', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-image-box';
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
				'label' => __( 'Image Box', 'progrisaas' ),
			]
		);

		$this->add_control(
			'image_box',
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
				'name' => 'image_box_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
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
				'default' => __( 'Real-time notifications and detailed transaction data helps you understand your money better.', 'progrisaas' ),
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

		$this->end_controls_section();

		//Style
		
		$this->start_controls_section(
			'style_image_section',
			[
				'label' => __( 'Image', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_space',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} figure.ot-image-box__img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_size',
			[
				'label' => __( 'Size', 'progrisaas' ) . ' (%)',
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
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-image-box__img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_box_border',
				'selector' => '{{WRAPPER}} .ot-image-box__img img',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_box_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ot-image-box__img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'ot_image_effects' );

		$this->start_controls_tab(
			'ot_image_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_shadow',
				'label' => __( 'Box Shadow', 'progrisaas' ),
				'selector' => '{{WRAPPER}} .ot-image-box__img img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ot_image_hover',
			[
				'label' => __( 'Hover', 'progrisaas' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_hshadow',
				'label' => __( 'Box Shadow', 'progrisaas' ),
				'selector' => '{{WRAPPER}} .ot-image-box:hover .ot-image-box__img img',
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
					'{{WRAPPER}} .ot-image-box' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
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
					'{{WRAPPER}} .image-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .image-box-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .image-box-title a' => 'color: {{VALUE}}; background-image: linear-gradient(0deg, #fff, {{VALUE}});',
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
					'{{WRAPPER}} .image-box-title a' => 'background-image: linear-gradient(0deg, #fff, {{VALUE}});',
					'{{WRAPPER}} .image-box-title a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .image-box-title',
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
					'{{WRAPPER}} .image-box-des' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .image-box-des' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-image-box__content ul li:before' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .image-box-des',
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
					'{{WRAPPER}} .image-box-btn a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .image-box-btn a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .image-box-btn',
				'condition' => [
					'btn_text!' => '',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}

		if ( ! empty( $settings['image_box']['url'] ) ) {
			$this->add_render_attribute( 'image_box', 'src', $settings['image_box']['url'] );
			$this->add_render_attribute( 'image_box', 'alt', Control_Media::get_image_alt( $settings['image_box'] ) );
			$this->add_render_attribute( 'image_box', 'title', Control_Media::get_image_title( $settings['image_box'] ) );

			$image_box_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_box_size', 'image_box' );

			if ( ! empty( $settings['link']['url'] ) ) {
				$image_box_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $image_box_html . '</a>';
			}

			$image_box_html = '<figure class="ot-image-box__img">' . $image_box_html . '</figure>';
		}

		if( $settings['btn_text'] ) {
			$image_box_btn = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $settings['btn_text'] . '</a>';
		}

		$this->add_render_attribute( 'heading', 'class', 'image-box-title' );
		$title = $settings['title'];
		$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'link', 'class', 'title-link' );
			$title_html = sprintf( '<%1$s %2$s><a ' .$this->get_render_attribute_string( 'link' ). '>%3$s</a></%1$s>', $settings['header_size'], $this->get_render_attribute_string( 'heading' ), $title );
		}

		?>
		<div class="ot-image-box">
			<?php if( $image_box_html ) echo $image_box_html; ?>
	        <div class="ot-image-box__content">
	        	<?php if( $settings['title'] ) { echo $title_html; } ?>
				<?php if( $settings['content'] ) { echo '<div class="image-box-des">' .$settings['content']. '</div>'; } ?>
				<?php if( $settings['btn_text'] ) { ?>
	        	<div class="image-box-btn">
	        		<?php echo $image_box_btn; ?>
	        	</div>
	        	<?php } ?>	
			</div>	
	    </div>
	    <?php
	}

	protected function content_template() {}

}
// After the ProgrisaaS_ImageBox class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgrisaaS_ImageBox() );