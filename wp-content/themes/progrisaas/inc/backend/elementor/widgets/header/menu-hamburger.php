<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Menu Hamburger
 */
class ProgriSaaS_Menu_Hamburger extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imenu_hamburger';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Menu Hamburger', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-menu-bar';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Select Menu', 'progrisaas' ),
			]
		);

		$this->add_control(
			'hbuilder_page',
			[
				'label' => __( 'Select Header Builder Page', 'progrisaas' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_list_header_pages(),
				'multiple' => false,
				'label_block' => true,
				'placeholder' => __( 'Header Builder', 'progrisaas' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_menu_section',
			[
				'label' => __( 'Additional options', 'progrisaas' ),
			]
		);
		$this->add_control(
			'select_menu_width',
			[
				'label' => esc_html__( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'full-screen',
				'options' => [
					'full-screen' => esc_html__( 'Full Screen', 'progrisaas' ),
					'side-menu'  => esc_html__( 'Custom', 'progrisaas' ),
				],
			]
		);
		$this->add_control(
			'content_menu_width',
			[
				'label' => __( '', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 100,
						'max'  => 3000,
						'step' => 10,
					],
				],
				'show_label' => false,
				'selectors' => [
					'.octf-menu-hamburger' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'select_menu_width' => 'side-menu',
				],
			]
		);
		$this->add_control(
			'pos_menu',
			[
				'label' => __( 'Menu Position', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'on-right',
				'options' => [
					'on-left' 	=> __( 'On Left', 'progrisaas' ),
					'on-right'  => __( 'On Right', 'progrisaas' ),
				],
				'condition' => [
					'select_menu_width' => 'side-menu',
				],
			]
		);
		$this->add_control(
			'pos_close_btn',
			[
				'label' => __( 'Button Close Position', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'on-left',
				'options' => [
					'on-left' 	=> __( 'On Left', 'progrisaas' ),
					'on-right'  => __( 'On Right', 'progrisaas' ),
				]
			]
		);

		$this->end_controls_section();
		
		/*** Style ***/
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
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
					'{{WRAPPER}} .menu-hamburger-toggle a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-hamburger-toggle a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'bg_icon',
			[
				'label' => __( 'Background Icon', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .menu-hamburger-toggle a' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'bg_overlay',
			[
				'label' => __( 'Background Overlay (For Side Menu)', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-overlay' => 'background: {{VALUE}};',
				],
				'condition' =>[
					'select_menu_width' => 'side-menu',
				]
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .menu-hamburger-toggle a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function get_available_menus(){

		$menus = wp_get_nav_menus();
		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
    }

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="octf-menu-hamburger-area">
			<?php if( $settings['select_menu_width'] == 'side-menu' ){ ?><div class="site-overlay menu-overlay"></div><?php } ?>
	    	<div class="menu-hamburger-toggle">
				<a href="javascript:void(0)"><i class="ot-flaticon-menu-of-three-lines"></i></a>
			</div>
			<div class="octf-menu-hamburger <?php echo esc_attr( $settings['pos_menu'].' '.$settings['select_menu_width'] ); ?>">
				<a href="javascript:void(0)" class="<?php echo esc_attr( $settings['pos_close_btn'] ); ?>" id="menu-hamburger-close"><i class="ot-flaticon-close"></i></a>
				<?php if( $settings['hbuilder_page'] != '' ){ echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $settings['hbuilder_page'] ); } ?>
			</div>
		</div>
	    <?php
	}

	protected function content_template() {}

	protected function select_list_header_pages() {
		$pages = get_posts( array( 'post_type' => 'ot_header_builders', 'posts_per_page' => -1, ) ); 
		$list_page = array();
		foreach ( $pages as $page ) {
			$list_page[$page->ID] = $page->post_title;
		}
		return $list_page;	  	
	}
}
// After the ProgriSaaS_Menu_Hamburger class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Menu_Hamburger() );