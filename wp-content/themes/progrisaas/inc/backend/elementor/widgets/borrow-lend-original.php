<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Borrow Lend 
 */
class ProgriSaaS_Borrow_Lend3 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iborrow-lend3';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Borrow Lend', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-t-letter';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Borrow/Lend', 'progrisaas' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Lend', 'progrisaas' ),
				'placeholder' => __( 'Borrow/Lend', 'progrisaas' ),
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Select an asset to lend', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'asset_title',
			[
				'label' => __( 'Title Asset', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'ETH', 'progrisaas' ),
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);

		$repeater->add_control(
			'interest_rate',
			[
				'label' => __( 'Interest Rate', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'term',
			[
				'label' => __( 'Term', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'borrow_limit',
			[
				'label' => __( 'Borrow limit', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'borrow_lend_list',
			[
				'label' => __( 'Tabs Items', 'progrisaas' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'asset_title' => __( 'ETH', 'progrisaas' ),
						'selected_icon' => [
							'value' => 'fas fa-star',
							'library' => 'fa-solid',
						],
						'interest_rate' => __( '0.10%<sup>apr</sup>', 'progrisaas' ),
						'term' => '28 days',
						'borrow_limit' => '250<sup>ETH</sup>'
					],
					[
						'asset_title' => __( 'DAI', 'progrisaas' ),
						'selected_icon' => [
							'value' => 'fas fa-star',
							'library' => 'fa-solid',
						],
						'interest_rate' => __( '0.10%<sup>apr</sup>', 'progrisaas' ),
						'term' => '28 days',
						'borrow_limit' => '250<sup>ETH</sup>',
						'link' =>  [
							'url' => '#',
						],
					],
				],
				'title_field' => '{{{ asset_title }}}',
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'heading_style_section',
			[
				'label' => __( 'Heading', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bl-title_typography',
				'selector' => '{{WRAPPER}} .ot-borow-lend__title',
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bl-title_background',
				'label' => __( 'Background', 'progrisaas' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ot-borow-lend__title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'desc_style_section',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'desc_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-borow-lend__info > p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-borow-lend__info > p' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ot-borow-lend__info > p',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style_section',
			[
				'label' => __( 'Asset Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-borow-lend__info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'content_background',
				'label' => __( 'Background', 'progrisaas' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .ot-borow-lend__info',
			]
		);

		$this->add_control(
			'tab_title_heading',
			[
				'label' => __( 'Tab Title Asset', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'tab_title_size',
			[
				'label' => __( 'Width', 'progrisaas' ) . ' (px)',
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
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-borow-lend__info .asset-tab-title' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'tab_icon_size',
			[
				'label' => __( 'Icon Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .asset-tab-title .asset-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tab_icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .asset-tab-title .asset-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .asset-tab-title .asset-icon svg' => 'fill: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'tab_icon_bgcolor',
			[
				'label' => __( 'Icon Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .asset-tab-title .asset-icon' => 'background: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'tab_icon_padding',
			[
				'label' => __( 'Icon Padding', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .asset-tab-title .asset-icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-borow-lend__info .asset-tab-title' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_active_color',
			[
				'label' => __( 'Border Active', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-borow-lend__info .asset-tab-title.current' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_asset_title_color',
			[
				'label' => __( 'Title Asset', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .asset-tab-title .asset-title' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_asset_title_typography',
				'selector' => '{{WRAPPER}} .asset-tab-title .asset-title',
			]
		);

		$this->add_control(
			'asset_info_heading',
			[
				'label' => __( 'Tab Info Asset', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'asset_info' );

		$this->start_controls_tab(
			'asset_info_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
			]
		);
		$this->add_responsive_control(
			'info_title_space',
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
					'{{WRAPPER}} .asset-info-inner .info-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'info_title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .asset-info-inner .info-title' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'info_title_typography',
				'selector' => '{{WRAPPER}} .asset-info-inner .info-title',
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'asset_info_content',
			[
				'label' => __( 'Content', 'progrisaas' ),
			]
		);

		$this->add_control(
			'info_content_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .asset-info-inner .info-content' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'info_content_typography',
				'selector' => '{{WRAPPER}} .asset-info-inner .info-content',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
			<div class="ot-borow-lend">
				<div class="ot-borow-lend__title">
					<h3><?php echo $settings['title']; ?></h3>
				</div>
				<div class="ot-borow-lend__info">
					<p><?php echo $settings['desc']; ?></p>
					<?php $random = rand(1,1000); if ( $settings['borrow_lend_list'] ) : ?>
					<ul class="asset-heading unstyle">
					<?php $i = 1; foreach ( $settings['borrow_lend_list'] as $key => $data ) { 
							$migration_allowed = Icons_Manager::is_migration_allowed();
						?>
						<li class="asset-tab-title" data-tab="tab-<?php echo esc_attr($i.$random); ?>">
							<?php
								if ( ! empty( $data['link']['url'] ) ) {
									$link_key = 'link_' . $key;

									$this->add_render_attribute( $link_key, 'href', $data['link']['url'] );

									if ( $data['link']['is_external'] ) {
										$this->add_render_attribute( $link_key, 'target', '_blank' );
									}

									if ( $data['link']['nofollow'] ) {
										$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									}

									echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
								}
								$migrated = isset( $data['__fa4_migrated']['selected_icon'] );
								$is_new = ! isset( $data['icon'] ) && $migration_allowed;
								if ( ! empty( $data['icon'] ) || ( ! empty( $data['selected_icon']['value'] ) && $is_new ) ) :
							?>
							<span class="asset-icon">
								<?php
								if ( $is_new || $migrated ) {
									Icons_Manager::render_icon( $data['selected_icon'], [ 'aria-hidden' => 'true' ] );
								} else { ?>
									<i class="<?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i>
								<?php } ?>
							</span>
							<?php endif; ?>
							<span class="asset-title"><?php echo $data['asset_title']; ?></span>
							<?php if ( ! empty( $data['link']['url'] ) ) : ?>
								</a>
							<?php endif; ?>
						</li>
					<?php $i++; } ?>
					</ul>
					<?php $j = 1; foreach ( $settings['borrow_lend_list'] as $key => $data ) { ?>
					<div class="asset-info-wrapper" id="tab-<?php echo esc_attr($j.$random); ?>">
						<div class="asset-info-inner">
							<div class="info-item">
								<p class="info-title">Interest Rate</p>
								<p class="info-content"><?php echo $data['interest_rate']; ?></p>
							</div>
							
							<div class="info-item">
								<p class="info-title">Term</p>
								<p class="info-content"><?php echo $data['term']; ?></p>
							</div>
							
							<div class="info-item">
								<p class="info-title">Borrow limit</p>
								<p class="info-content"><?php echo $data['borrow_limit']; ?></p>
							</div>
						</div>
					</div>
					<?php $j++; } endif; ?>
				</div>
			</div>
		<?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Borrow_Lend3 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Borrow_Lend3() );