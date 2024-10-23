<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Cart
 */
class ProgriSaaS_Cart extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'icart';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Cart', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-cart';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas_header' ];
	}

	protected function register_controls() {

		//Content
		$this->start_controls_section(
			'cart_section',
			[
				'label' => __( 'Cart', 'progrisaas' ),
			]
        );	

		$this->add_control(
			'c_style',
			[
				'label' => __( 'Style', 'progrisaas' ),
				'type'  => Controls_Manager::SELECT,
				'default' => 's2',
				'options' => [
					's1' 	=> __( 'Basic', 'progrisaas' ),
					's2' 	=> __( 'With Text', 'progrisaas' ),
				]
			]
		);
		$this->add_control(
			'cart_text',
			[
				'label' => __( 'Cart Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'My Cart', 'progrisaas' ),
				'condition' => [
					'c_style' => 's2',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Style', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_general',
			[
				'label' => __( 'General', 'progrisaas' ),
				'type'  => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'padding_cart',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => .1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .s2 .cart-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'c_style' => 's2',
				]
			]
		);
		$this->add_control(
			'bg_cart',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type'  => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cart-content' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'hbg_cart',
			[
				'label' => __( 'Background Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cart-content:hover' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'cart_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cart-content' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'cart_hcolor',
			[
				'label' => __( 'Text Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cart-content:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-cart i' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .octf-cart i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'heading_count',
			[
				'label' => __( 'Count', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'count_typography',				
				'selector' => '{{WRAPPER}} .octf-cart .cart-count',
			]
		);
		$this->add_control(
			'bg_count',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-cart .cart-count' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'count_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-cart .cart-count' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( null === WC()->cart ) {
			return;
		}
		$product_count = sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );
		$cart_url = esc_url( wc_get_cart_url() );

		$widget_cart_is_hidden = apply_filters( 'woocommerce_widget_cart_is_hidden', false );
		?>
		<?php if ( ! $widget_cart_is_hidden ) : ?>
			<div class="octf-cart octf-cta-header <?php echo esc_attr( $settings['c_style'] ); ?>">
				<a class="cart-content" href="<?php echo esc_url( $cart_url ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'progrisaas' ); ?>">
					<i class="ot-flaticon-cart"></i><?php if( $settings['c_style'] == 's2' ) echo $settings['cart_text']; ?><span class="cart-count"><?php echo $product_count; ?></span>
				</a>
				<?php if( !is_cart() && !is_checkout() ) { ?>
				<div class="site-header-cart">
					<?php the_widget( 'WC_Widget_Cart', array( 'title' => '' ) ); ?>
				</div>	
				<?php } ?>
			</div>
		<?php endif;
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Cart class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Cart() );