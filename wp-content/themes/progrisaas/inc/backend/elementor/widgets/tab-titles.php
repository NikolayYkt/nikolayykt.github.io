<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Tab Titles
 */
class ProgriSaaS_Tab_Titles extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itabtitle';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Tab Titles', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-site-title';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Titles', 'progrisaas' ),
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'Layout', 'progrisaas' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'vertical',
				'options' => [
					'vertical' => [
						'title' => __( 'Default', 'progrisaas' ),
						'icon' => 'eicon-editor-list-ul',
					],
					'horizontal' => [
						'title' => __( 'Inline', 'progrisaas' ),
						'icon' => 'eicon-ellipsis-h',
					],
				],
				'render_type' => 'template',/*Live load*/
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon_font',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);
		$repeater->add_control(
			'titles',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Campaigns', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'title_link',
			[
				'label' => __( 'Link to ID Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '#tab-1', 'progrisaas' ),
			]
		);

		$this->add_control(
		    'title_boxes',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{titles}}}',
		    ]
		);

		$this->end_controls_section();

		//Styling
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width_tabs',
			[
				'label' => __( 'Width', 'progrisaas' ),
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
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-tab-title__item' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'titles_space',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-tab-title__item:not(:last-child, .--inline-item)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-tab-title__item.--inline-item:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'items_align',
			[
				'label' => __( 'Alignment', 'progrisaas' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'progrisaas' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'progrisaas' ),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'progrisaas' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'selectors_dictionary' => [
				    'left' => 'flex-start',
				    'center' => 'center',
				    'right' => 'flex-end',
				],
				'selectors' => [
				    '{{WRAPPER}} .ot-tab-title__item' => 'justify-content: {{VALUE}}',
				    '{{WRAPPER}} .ot-tab-title.--inline-items' => 'justify-content: {{VALUE}}',
				]
			]
		);

		//Icon
		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tab-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_space',
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
					'{{WRAPPER}} .tab-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tab-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tab-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_hcolor',
			[
				'label' => __( 'Hover/Active', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tab-title__item:hover .tab-icon svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-tab-title__item.active .tab-icon svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-tab-title__item:hover .tab-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-tab-title__item.active .tab-icon' => 'color: {{VALUE}};',
				]
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
			'title_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tab-title__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .ot-tab-title__item h5' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Hover/Active', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tab-title__item:hover h5' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-tab-title__item.active h5' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-tab-title__item h5',
			]
		);
		
		$this->start_controls_tabs( 'tabs_title_style' );

		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'selector' => '{{WRAPPER}} .ot-tab-title__item',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => __( 'Active/Hover', 'progrisaas' ),
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border_active',
				'selector' => '{{WRAPPER}} .ot-tab-title__item.active, {{WRAPPER}} .ot-tab-title__item:hover',
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="ot-tab-title <?php if( 'horizontal' === $settings['view'] ) echo "--inline-items"; ?>">
			<?php foreach ( $settings['title_boxes'] as $box ) : ?>
			<div class="ot-tab-title__item <?php if( 'horizontal' === $settings['view'] ) echo "--inline-item"; ?>" data-link="<?php echo esc_url( $box['title_link'] ); ?>">
				<?php if( $box['icon_font']['value'] != '' ) { ?>
				<div class="tab-icon">
					<?php Icons_Manager::render_icon( $box['icon_font'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<?php } ?>
				<div class="tab-title">
					<h5><?php echo $box['titles']; ?></h5>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Tab_Titles class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Tab_Titles() );