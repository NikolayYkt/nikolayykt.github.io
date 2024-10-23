<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Borrow Lend 
 */
class ProgriSaaS_Borrow_Lend extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iborrow-lend';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Borrow Lend', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-database';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content
		$this->start_controls_section(
			'section_general',
			[
				'label' => __('General', 'progrisaas')
			]
		);
		$this->add_control(
			'asset_count',
			[
				'label'       => __('Asset Amount', 'progrisaas'),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 2,
				'min'         => 1,
				'max'         => 5,
				'placeholder' => __('Plan', 'progrisaas'),
				'description' => __( 'Min: 1 - Max: 5', 'progrisaas' ),
			]
		);

		$this->add_control(
			'title_box_heading',
			[
				'label'       => __('Heading', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('Borrow', 'progrisaas'),
			]
		);

		$this->add_control(
			'desc_box_heading',
			[
				'label'       => __('Description', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('Select an asset to borrow', 'progrisaas'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_feature',
			[
				'label' => __('Feature Asset', 'progrisaas')
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'legend_feature_text',
			[
				'label'       => __('Feature', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'feature',
				'placeholder' => __('Enter your feature', 'progrisaas'),
			]
		);

		$this->add_control(
			'features_text',
			[
				'label'      => __('Features', 'progrisaas'),
				'type'       => Controls_Manager::REPEATER,
				'show_label' => true,
				'default'    => [
					[
						'legend_feature_text' => __('Interest Rate', 'progrisaas'),
					],
					[
						'legend_feature_text' => __('Term', 'progrisaas'),
					],
					[
						'legend_feature_text' => __('Borrow limit', 'progrisaas'),
					],
				],
				'fields'     =>  $repeater->get_controls(),
				'title_field' => '{{{ legend_feature_text }}}',
			]
		);
		$this->end_controls_section();

		$this->add_tables();

		//Style general
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

	function add_tables()
	{

		$repeater = new Repeater();

		$repeater->add_control(
			'feature_text',
			[
				'label'       => __('Value', 'progrisaas'),
				'type'        => Controls_Manager::TEXT,
				'default'     => __('0.10%<sup>apr</sup>', 'progrisaas'),
			]
		);
		for ($i = 1; $i < 6; $i++) {
			$this->start_controls_section(
				'section_table_' . $i,
				[
					'label'     => __('Asset ' . $i, 'progrisaas'),
					'operator'  => '>',
					'condition' => [
						'asset_count' => $this->add_condition_value($i),
					]
				]
			);
			$this->add_control(
				'selected_icon_' . $i,
				[
					'label' => __( 'Icon', 'progrisaas' ),
					'type' => Controls_Manager::ICONS,
					'label_block' => true,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'fa-solid',
					],
					'fa4compatibility' => 'icon_'.$i,
				]
			);
			$this->add_control(
				'asset_title_' . $i,
				[
					'label'       => __('Title', 'progrisaas'),
					'type'        => Controls_Manager::TEXT,
					'default'     => __('ETH', 'progrisaas'),
				]
			);
			$this->add_control(
				'link_' . $i,
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
				'feature_items_' . $i,
				[
					'label'      => __('Features Value', 'progrisaas'),
					'type'       => Controls_Manager::REPEATER,
					'show_label' => true,
					'default'    => [
						[
							'feature_text' => '0.10%<sup>apr</sup>',
						],
						[
							'feature_text' => '28 days',
						],
						[
							'feature_text' => '250<sup>ETH</sup>',
						],
					],
					'title_field' => '{{{ feature_text }}}',
					'fields'     =>  $repeater->get_controls(),
				]
			);

			$this->add_control(
				'override_style_' . $i,
				[
					'label'        => __('Override Style', 'progrisaas'),
					'type'         => Controls_Manager::SWITCHER,
					'return_value' => 'yes',
					'default'      => 'no',
					'separator'    => 'before'
				]
			);

			$this->add_control(
				'custom_asset_items_' . $i,
				[
					'label'     => __('Icon', 'progrisaas'),
					'type'      => Controls_Manager::HEADING,
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_responsive_control(
				'custom_icon_asset_item_size_' . $i,
				[
					'label' => __( 'Icon Size', 'progrisaas' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_icon_asset_item_padding_' . $i,
				[
					'label' => __( 'Icon Padding', 'progrisaas' ),
					'type' => Controls_Manager::SLIDER,
					'selectors' => [
						'{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-icon' => 'padding: {{SIZE}}{{UNIT}};',
					],
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 100,
						],
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_icon_asset_item_color_' . $i,
				[
					'label'     => __('Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-icon' => 'color: {{VALUE}};',
						'{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-icon svg' => 'fill: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			
			$this->add_control(
				'custom_icon_asset_item_bgcolor_' . $i,
				[
					'label'     => __('Background Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-icon' => 'background: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			
			$this->add_control(
				'custom_icon_asset_item_bcolor_' . $i,
				[
					'label' => __( 'Border', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ot-borow-lend__info .asset-tab-title.asset-item-' . $i . '' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'custom_icon_asset_item_bacolor_' . $i,
				[
					'label' => __( 'Border Active', 'progrisaas' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .ot-borow-lend__info .asset-tab-title.asset-item-' . $i . '.current' => 'border-color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->add_control(
				'custom__heading_' . $i,
				[
					'label'     => __('Title Asset', 'progrisaas'),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_control(
				'title_asset_color_custom_' . $i,
				[
					'label'     => __('Color', 'progrisaas'),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-title' => 'color: {{VALUE}};',
					],
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_asset_typography_custom_' . $i,
					'selector' => '{{WRAPPER}} .asset-tab-title.asset-item-' . $i . ' .asset-title',
					'condition' => [
						'override_style_' . $i => 'yes',
					]
				]
			);

			$this->end_controls_section();
		}
	}

	function add_condition_value($j)
	{
		$value = [];
		for ($i = $j; $i < 6; $i++) {
			$value[] = $i;
		}

		return $value;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$random = rand(1,1000);

		?>
		<div class="ot-borow-lend">
			<div class="ot-borow-lend__title">
				<h3><?php echo $settings['title_box_heading']; ?></h3>
			</div>
			<div class="ot-borow-lend__info">
				<p><?php echo $settings['desc_box_heading']; ?></p>
				
				<ul class="asset-heading unstyle">

					<?php 
						for ($i = 1; $i <= $settings['asset_count']; $i++) {
							$migration_allowed = Icons_Manager::is_migration_allowed();
							echo '<li class="asset-tab-title asset-item-' . $i . '" data-tab="tab-' . $i.$random .'">';

							if ( ! empty( $settings['link_'. $i]['url'] ) ) {
								$link_key = 'link_' . $i;

								$this->add_render_attribute( $link_key, 'href', $settings['link_'. $i]['url'] );

								if ( $settings['link_'. $i]['is_external'] ) {
									$this->add_render_attribute( $link_key, 'target', '_blank' );
								}

								if ( $settings['link_'. $i]['nofollow'] ) {
									$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
								}

								echo '<a ' . $this->get_render_attribute_string( $link_key ) . '>';
							}
								$migrated = isset( $settings['__fa4_migrated']['selected_icon_'. $i] );
								$is_new = ! isset( $settings['icon_'. $i] ) && $migration_allowed;
								if ( ! empty( $settings['icon_'. $i] ) || ( ! empty( $settings['selected_icon_'. $i]['value'] ) && $is_new ) ) {
									echo '<span class="asset-icon">';
									if ( $is_new || $migrated ) {
										Icons_Manager::render_icon( $settings['selected_icon_'. $i], [ 'aria-hidden' => 'true' ] );
									} else { 
										echo '<i class="'.esc_attr( $settings['icon_'. $i] ).'" aria-hidden="true"></i>';
									}
									echo '</span>';
								}
								echo '<span class="asset-title">'.$settings['asset_title_'. $i].'</span>';
							if ( ! empty( $settings['link_'. $i]['url'] ) ){
								echo '</a>';
							}
							echo '</li>';
						}
					?>

				</ul>
				
				<?php 
					for ($i = 1; $i <= $settings['asset_count']; $i++) {
						echo '<div class="asset-info-wrapper" id="tab-' . $i.$random .'">';
							echo '<div class="asset-info-inner">';
							for ($x = 1; $x <= count($settings['features_text']); $x++) {
								echo '<div class="info-item">';
									echo '<p class="info-title">'. $settings['features_text'][$x - 1]['legend_feature_text'] . '</p>';
									if( !empty($settings['feature_items_'. $i][$x - 1]['feature_text']) ){
									echo '<p class="info-content">'. $settings['feature_items_'. $i][$x - 1]['feature_text'] . '</p>';
									}
								echo '</div>';
							}
							echo '</div>';
						echo '</div>';
					}
				?>

			</div>
		</div>
			
		<?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Borrow_Lend class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Borrow_Lend() );