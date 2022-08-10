<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Multi Scroll
 */
class ProgriSaaS_Multi_Scroll extends Widget_Base {

	/**
	 * Get Elementor Page List
	 *
	 * Returns an array of Elementor templates
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return $options array Elementor Templates
	 */

	public function select_param_list_pages() {

		$pagelist = get_posts(
			array(
				'post_type' => 'elementor_library',
				'showposts' => 999,
			)
		);

		if ( ! empty( $pagelist ) && ! is_wp_error( $pagelist ) ) {

			foreach ( $pagelist as $post ) {
				$options[ $post->post_title ] = $post->post_title;
			}

			update_option( 'temp_count', $options );

			return $options;
		}
	}


	/**
	 * Get ID By Title
	 *
	 * Get Elementor Template ID by title
	 *
	 * @since 3.6.0
	 * @access public
	 *
	 * @param string $title template title.
	 *
	 * @return string $template_id template ID.
	 */

	public function get_id_by_title( $title ) {

		$template = get_page_by_title( $title, OBJECT, 'elementor_library' );

		$template_id = isset( $template->ID ) ? $template->ID : $title;

		return $template_id;
	}

	/**
	 * Get Elementor Template HTML Content
	 *
	 * @since 3.6.0
	 * @access public
	 *
	 * @param string $title Template Title.
	 *
	 * @return $template_content string HTML Markup of the selected template.
	 */

	public function get_template_content( $title ) {

		$frontend = \Elementor\Plugin::$instance->frontend;

		$id = $this->get_id_by_title( $title );

		// $id = apply_filters( 'wpml_object_id', $id, 'elementor_library', true );
		$template_content = $frontend->get_builder_content_for_display( $id, true );

		return $template_content;

	}

	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-multi-scroll';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Multi Scroll', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-scroll';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	/**
	 * Get Repeater Controls
	 */
	protected function get_repeater_controls( $repeater ) {

		$repeater->add_control(
			'left_side_page',
			[
				'label'       => __( 'Left Template', 'progrisaas' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->select_param_list_pages(),
				'multiple'    => false,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'right_side_page',
			[
				'label'       => __( 'Right Template', 'progrisaas' ),
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->select_param_list_pages(),
				'multiple'    => false,
				'label_block' => true,
			]
		);

	}

	/**
	 * Register Multi Scroll controls.
	 */
	protected function register_controls() { 

		$this->start_controls_section(
			'content_templates',
			[
				'label' => __( 'Content', 'progrisaas' ),
			]
		);

		$this->add_control(
			'template_height_hint',
			[
				'label' => '<span>It\'s recommended that templates be the same height</span>',
				'type'  => Controls_Manager::RAW_HTML,
			]
		);

		$repeater = new REPEATER();

		$this->get_repeater_controls( $repeater );

		$this->add_control(
			'multi_scroll_repeater',
			[
				'label'  => __( 'Sections', 'progrisaas' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'nav_menu',
			[
				'label' => __( 'Navigation', 'progrisaas' ),
			]
		);
		
		$this->add_control(
			'navigation_dots',
			[
				'label'     => __( 'Navigation Dots', 'progrisaas' ),
				'type'      => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'navigation_dots_pos',
			[
				'label'     => __( 'Dots Horizontal Position', 'progrisaas' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'left'  => __( 'Left', 'progrisaas' ),
					'right' => __( 'Right', 'progrisaas' ),
				],
				'default'   => 'right',
				'condition' => [
					'navigation_dots' => 'yes',
				],
			]
		);

		$this->add_control(
			'scroll_speed',
			[
				'label'     => __( 'Scroll Speed', 'progrisaas' ),
				'type'      => Controls_Manager::NUMBER,
				'title'     => __( 'Set scolling speed in milliseconds, default: 700', 'progrisaas' ),
				'min' => 100,
				'max' => 5000,
				'step' => 10,
				'default'   => 700,
				'selectors' => [
					'{{WRAPPER}} .ot-ms-inner .ot-scroll-easing:not(.ms-notransition)'    => '-webkit-transition:all {{VALUE}}ms ease-out 0s!important; -moz-transition:all {{VALUE}}ms ease-out 0s!important; -o-transition:all {{VALUE}}ms ease-out 0s!important; transition:all {{VALUE}}ms ease-out 0s!important',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'navigation_style',
			[
				'label'     => __( 'Navigation Dots', 'progrisaas' ),
				'tab'       => CONTROLS_MANAGER::TAB_STYLE,
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label'     => __( 'Dots Color', 'progrisaas' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'#multiscroll-nav ul li a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'active_dot_color',
			[
				'label'     => __( 'Active Dot Color', 'progrisaas' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'#multiscroll-nav ul li a.active'  => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Mutli Scroll widget output on the frontend.
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$id = $this->get_id();

		$scoll_settings = [
			'dots'       => ( 'yes' === $settings['navigation_dots'] ) ? true : false,
			'dotsPos'    => $settings['navigation_dots_pos'],
			'id'         => esc_attr( $id ),
		];

		$this->add_render_attribute( 'ot-ms_wrapper', 'class', 'ot-ms-wrap' );

		$this->add_render_attribute(
			'ot-ms_inner',
			[
				'id'    => 'ot-ms-' . $id,
				'class' =>[
					'ot-ms-inner'
				],
			]
		);

		$this->add_render_attribute( 'right_template', 'class', array( 'ot-ms-temp', 'ot-ms-right-temp', 'ot-ms-temp-' . $id ) );

		$this->add_render_attribute( 'left_template', 'class', array( 'ot-ms-temp', 'ot-ms-left-temp', 'ot-ms-temp-' . $id ) );

		$this->add_render_attribute( 'left_side', 'class', [ 'ot-ms-left-'. $id, 'ot-scroll-easing', ] );

		$this->add_render_attribute( 'right_side', 'class', [ 'ot-ms-right-'. $id, 'ot-scroll-easing' ] );

		$pages = $settings['multi_scroll_repeater'];

		?>

		<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'ot-ms_wrapper' ) ); ?> data-ms_settings='<?php echo wp_json_encode( $scoll_settings ); ?>'>
			<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'ot-ms_inner' ) ); ?>>
				<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'left_side' ) ); ?>>
					<?php foreach ( $pages as $index => $section ) : ?>
					<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'left_template' ) ); ?>>
						<?php
							$template = $section['left_side_page'];
							echo $this->get_template_content( $template );
						?>
					</div>
					<?php endforeach; ?>
				</div>
				<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'right_side' ) ); ?>>
					<?php foreach ( $pages as $index => $section ) : ?>
					<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'right_template' ) ); ?>>
						<?php
							$template = $section['right_side_page'];
							echo $this->get_template_content( $template );
						?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<?php

	}
}
// After the ProgriSaaS_Multi_Scroll class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Multi_Scroll() );
