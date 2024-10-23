<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Menu
 */
class ProgriSaaS_Menu extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imenu';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Nav Menu', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-nav-menu';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas_header' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Menu', 'progrisaas' ),
			]
		);

		$menus = $this->get_available_menus();
		$this->add_control(
			'nav_menu',
			[
				'label' => esc_html__( 'Select Menu', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'multiple' => false,
				'options' => $menus,
				'default' => array_keys( $menus )[0],
				'save_default' => true,

			]
		);
		$this->add_control(
			'layout_menu',
			[
				'label' => __( 'Layout', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => __( 'Horizontal', 'progrisaas' ),
					'vertical' => __( 'Vertical', 'progrisaas' ),
				],
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
			]
		);

		$this->end_controls_section();

		/*** Style ***/
		//menu parents
		$this->start_controls_section(
			'style_menu_section',
			[
				'label' => __( 'Menu Parents', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a, 
					 {{WRAPPER}} .main-navigation > ul > li.menu-item-has-children > a:after,
					 {{WRAPPER}} .main-navigation > ul > li.is-mega-menu > a:after,
					 {{WRAPPER}} .vertical-main-navigation ul > li > a' => 'color: {{VALUE}} ',
					'{{WRAPPER}} .main-navigation > ul > li > a:before, 
					 {{WRAPPER}} .vertical-main-navigation > ul > li > a:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .vertical-main-navigation ul > li.menu-item-has-children > a span.arrow svg' => 'fill: {{VALUE}} ',
					'{{WRAPPER}} .main-navigation > ul > li > a.mPS2id-highlight' => 'color: {{VALUE}} ',
					
				]
			]
		);
		$this->add_control(
			'text_hover_color',
			[
				'label' => __( 'Text Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a:hover, {{WRAPPER}} .main-navigation > ul > li:hover > a, {{WRAPPER}} .main-navigation > ul > li:hover > a:after, {{WRAPPER}} .main-navigation > ul > li.current-menu-item > a, {{WRAPPER}} .main-navigation > ul > li > a.mPS2id-highlight' => 'color: {{VALUE}};',
					'{{WRAPPER}} .main-navigation > ul > li > a:before' => 'background-color: {{VALUE}};',

					'{{WRAPPER}} .vertical-main-navigation ul > li > a:hover, {{WRAPPER}} .vertical-main-navigation > ul > li.current-menu-item > a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .vertical-main-navigation > ul > li > a:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .vertical-main-navigation ul > li.menu-item-has-children > a:hover span.arrow svg' => 'fill: {{VALUE}} ',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_typography',
				'selector' => '{{WRAPPER}} .main-navigation > ul > li > a, {{WRAPPER}} .vertical-main-navigation > ul > li > a',
			]
		);

		$this->add_control(
			'underline_menu',
			[
				'label' => __( 'Underline', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'underline_width',
			[
				'label' => __( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a:hover:before, {{WRAPPER}} .main-navigation > ul > li > a.mPS2id-highlight:before,
					{{WRAPPER}} .main-navigation > ul > li.current-menu-item > a:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'underline_height',
			[
				'label' => __( 'Height', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a:before, 
					{{WRAPPER}} .vertical-main-navigation > ul > li > a:before' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'underline_bottom',
			[
				'label' => __( 'Bottom', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -2,
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul > li > a:before, 
					{{WRAPPER}} .vertical-main-navigation > ul > li > a:before' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//menu child
		$this->start_controls_section(
			'style_smenu_section',
			[
				'label' => __( 'Dropdown Menus', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'smenu_width',
			[
				'label' => __( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul li ul.sub-menu:not(.sub-mega-menu)' => 'min-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout_menu' => 'horizontal'
				]
			]
		);
		$this->add_responsive_control(
			'smenu_top',
			[
				'label' => __( 'Top', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul > li:hover > ul' => 'transform: translateY({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .main-navigation ul li ul ul' => 'top: calc(-20px - {{SIZE}}{{UNIT}});',
				],
				'condition' => [
					'layout_menu' => 'horizontal'
				]
			]
		);
		$this->add_control(
			'bg_s_color',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation ul ul.sub-menu:not(.sub-mega-menu)' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_menu' => 'horizontal'
				]
			]
		);
		$this->add_control(
			'text_s_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) a, {{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) > li.menu-item-has-children > a:after' => 'color: {{VALUE}};',
					'{{WRAPPER}} .vertical-main-navigation > ul ul a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .vertical-main-navigation > ul ul > li.menu-item-has-children > a span.arrow svg' => 'fill: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'text_s_hover_color',
			[
				'label' => __( 'Text Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) li:hover > a, {{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) li:hover a:after, {{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) li.current-menu-item > a' => 'color: {{VALUE}};',

					'{{WRAPPER}} .vertical-main-navigation > ul ul li > a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .vertical-main-navigation > ul ul li > a:hover span.arrow svg, {{WRAPPER}} .vertical-main-navigation > ul ul li.current-menu-item > a span.arrow svg' => 'fill: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'bg_s_hover_color',
			[
				'label' => __( 'Background Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) li:hover > a, {{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu, .elementor-icon-list-items, .ot-icon-list-items) li.current-menu-item > a' => 'background: {{VALUE}};',
				],
				'condition' => [
					'layout_menu' => 'horizontal'
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'smenu_typography',
				'selector' => '{{WRAPPER}} .main-navigation > ul ul:not(.sub-mega-menu) a, {{WRAPPER}} .vertical-main-navigation > ul ul:not(.sub-mega-menu) li > a',
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
		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		// multisite
		if ( is_multisite() ) {
		// this plugin is network activated - Mega menu must be network activated
		if ( is_plugin_active_for_network( plugin_basename(__FILE__) ) ) {
			$active_mmenu = is_plugin_active_for_network('ot_mega-menu/ot_mega-menu.php') ? true : false;
		// this plugin is locally activated - Mega menu can be network or locally activated
		} else {
			$active_mmenu = is_plugin_active( 'ot_mega-menu/ot_mega-menu.php') ? true : false;
		}
		// this plugin runs on a single site
		} else {
			$active_mmenu = is_plugin_active( 'ot_mega-menu/ot_mega-menu.php') ? true : false;
		}

		$menu_class = $settings['layout_menu'] == 'horizontal' ? 'main-navigation' : 'vertical-main-navigation';
		?>
			
	    	<nav id="site-navigation" class="<?php echo esc_attr($menu_class); ?>">		
				<?php
					wp_nav_menu( array(
						'menu' 			 => $settings['nav_menu'],
						'menu_id'        => 'primary-menu',
						'container'      => 'ul',
						'theme_location' => '__no_such_location',
    					'fallback_cb'    => '__return_empty_string', 
						'walker'         => $active_mmenu ? new \Ot_Mega_Menu_Walker() : '',
					) );
				?>
			</nav>
			
	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Menu class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Menu() );