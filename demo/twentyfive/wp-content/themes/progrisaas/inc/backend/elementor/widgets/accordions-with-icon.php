<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Accordions With Icon
 */
class ProgriSaaS_Accordions_With_Icon extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-accordions-with-icon';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Accordions With Icon', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-accordion';
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
				'label' => __( 'Accordions', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'acc_title',
			[
				'label' => __( 'Title & Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Accordion Title', 'progrisaas' ),
				'placeholder' => __( 'Accordion Title', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'acc_content',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'default' => __( 'Accordion Content', 'progrisaas' ),
				'placeholder' => __( 'Accordion Content', 'progrisaas' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'icon_title',
			[
				'label' => __( 'Icon Title', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$this->add_control(
			'ot_accs',
			[
				'label' => __( 'Accordion Items', 'progrisaas' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'acc_title' => __( 'Accordion #1', 'progrisaas' ),
						'acc_content' => __( 'We reimburse all expenses of the Client for the payment of fines and penalties that were caused by mistakes made by us in accounting and tax accounting and reporting.', 'progrisaas' ),
					],
					[
						'acc_title' => __( 'Accordion #2', 'progrisaas' ),
						'acc_content' => __( 'We reimburse all expenses of the Client for the payment of fines and penalties that were caused by mistakes made by us in accounting and tax accounting and reporting.', 'progrisaas' ),
					],
				],
				'title_field' => '{{{ acc_title }}}',
			]
		);
		$this->add_control(
			'icon_close',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-plus',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-down',
						'angle-down',
						'angle-double-down',
						'caret-down',
						'caret-square-down',
					],
					'fa-regular' => [
						'caret-square-down',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
			]
		);
		$this->add_control(
			'icon_active',
			[
				'label' => __( 'Active Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'select_icon_active',
				'default' => [
					'value' => 'far fa-window-minimize',
					'library' => 'fa-regular',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-up',
						'angle-up',
						'angle-double-up',
						'caret-up',
						'caret-square-up',
					],
					'fa-regular' => [
						'caret-square-up',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
				'condition'	=> [
					'icon_close[value]!' => '',
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
				],
				'default' => 'h5',
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Accordions', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'acc_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bg_acc',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_acc_active',
			[
				'label' => __( 'Background Active', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accs_border',
				'selector' => '{{WRAPPER}} .ot-acc-item',
			]
		);

		$this->end_controls_section();

		//Title & Icon
		$this->start_controls_section(
			'style_title_icon',
			[
				'label' => __( 'Title & Icon', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__title' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_color_active',
			[
				'label' => __( 'Active Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item.current .ot-acc-item__title' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-acc-item__title',
			]
		);

		// Icon
		$this->add_control(
			'heading_icon_title',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);
		$this->add_control(
			'icon_title_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_title_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-acc-item__icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_title_color_active',
			[
				'label' => __( 'Active Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item.current .ot-acc-item__icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-acc-item.current .ot-acc-item__icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		// Icon Toggle
		$this->add_control(
			'heading_icon_toggle',
			[
				'label' => __( 'Icon Toggle', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);

		$this->add_responsive_control(
			'icon_toggle_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__title svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-acc-item__title i:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_toggle_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__title i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-acc-item__title svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_toggle_color_active',
			[
				'label' => __( 'Active Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item.current .ot-acc-item__title i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-acc-item.current .ot-acc-item__title svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		//Content
		$this->start_controls_section(
			'style_content',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__content' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-acc-item__content',
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-acc-item__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$migrated = isset( $settings['__fa4_migrated']['icon_close'] );

		if ( ! isset( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			// add old default
			$settings['icon'] = 'fas fa-plus';
			$settings['select_icon_active'] = 'far fa-window-minimize';
		}
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		$has_icon = ( ! $is_new || ! empty( $settings['icon_close']['value'] ) );
		$this->add_render_attribute( 'wrapper', 'class', [ 'ot-acc-wrapper', 'ot-acc--with-icon' ] );
		$this->add_render_attribute( 'acc-title', 'class', [ 'ot-acc-item__title', 'flex-middle' ] );
		?>

		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<?php if ( $settings['ot_accs'] ) : foreach ( $settings['ot_accs'] as $key => $accs ) { 
				$tab_count = $key + 1;
				$tab_trigger_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $key );
				$this->add_render_attribute( $tab_trigger_setting_key, [
					'class' => [ 'ot-acc-item__trigger', 'flex-middle' ],
					'data-tab' => $tab_count,
					'role' => 'tab',
					'data-default' => $key == 0 ? 'yes' : ''
				] );
			?>
			<div class="ot-acc-item">
				<div <?php echo $this->get_render_attribute_string( $tab_trigger_setting_key ); ?>>
				<span class="ot-acc-item__icon"><?php Icons_Manager::render_icon( $accs['icon_title'], [ 'aria-hidden' => 'true' ] ); ?></span>
				<<?php echo $settings['header_size']; ?> <?php echo $this->get_render_attribute_string('acc-title'); ?> ><?php echo $accs['acc_title']; ?> 
					<?php if ( $has_icon ) : ?>
						<?php
						if ( $is_new || $migrated ) { ?>
							<div class="icon-toggle">
								<span class="down"><?php Icons_Manager::render_icon( $settings['icon_close'] ); ?></span>
								<span class="up"><?php Icons_Manager::render_icon( $settings['icon_active'] ); ?></span>
							</div>
						<?php } else { ?>
							<div class="icon-toggle">
								<i class="down <?php echo esc_attr( $settings['icon'] ); ?>"></i>
								<i class="up <?php echo esc_attr( $settings['select_icon_active'] ); ?>"></i>
							</div>
						<?php } ?>
					<?php endif; ?>
				</<?php echo $settings['header_size']; ?>>
				</div>
				<div class="ot-acc-item__content">
					<?php echo $accs['acc_content']; ?>
				</div>
			</div>
			<?php } endif; ?>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Accordions_With_Icon class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Accordions_With_Icon() );