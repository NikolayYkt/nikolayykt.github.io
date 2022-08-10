<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: OT Domain List
 */
class ProgriSaaS_Domain_List extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ot-domain-list';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Domain List', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Domains', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '.com', 'progrisaas' ),
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
			]
		);

		$this->add_control(
			'domains_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'progrisaas' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [],
				'fa4compatibility' => 'icon',
			]
		);

		$this->add_control(
			'link_btn',
			[
				'label' => __( 'Link Detail', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default'	=> [],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '+', 'progrisaas' ),
				'label_block' => 'true',
				'condition' => [
					'link_btn[url]!' => '',
				]
			]
		);

		$this->end_controls_section();

		/*STYLE*/

		$this->start_controls_section(
			'section_general_style',
			[
				'label' => __( 'General', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'item_width',
			[
				'label' => __( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .ot-domain-list .domain-item' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'item_height',
			[
				'label' => __( 'Height', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .ot-domain-list .domain-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'item_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .ot-domain-list' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'domain_border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-domain-list .domain-item' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-domain-list .domain-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'domain_box_shadow',
				'selector' => '{{WRAPPER}} .ot-domain-list .domain-item',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_domain_style',
			[
				'label' => __( 'Domain', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_name',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item' => 'color: {{VALUE}};',
				],
			]

		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .ot-domain-list .domain-name',
			]

		);

		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon Check', 'progrisaas' ),
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
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .domain-item .domain-icon-check' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .domain-item .domain-icon-check i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .domain-item .domain-icon-check svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'icon_bgcolor',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .domain-item .domain-icon-check' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( empty( $settings['domains_list'] ) ) {
			return;
		}
		?>

		<ul class="ot-domain-list dflex unstyle">
			<?php foreach ( $settings['domains_list'] as $key => $domain ) { 

				$link_tag = '';
				if ( ! empty( $domain['link']['url'] ) ) {

					$this->add_render_attribute( 'link' . $key, 'href', $domain['link']['url'] );	

					if ( $domain['link']['is_external'] ) {

						$this->add_render_attribute( 'link' . $key, 'target', '_blank' );

					}				
					if ( $domain['link']['nofollow'] ) {

						$this->add_render_attribute( 'link' . $key, 'rel', 'nofollow' );

					}

					$link_tag = '<a '.$this->get_render_attribute_string('link' . $key) . '></a>';

				}
			?>
			<li class="domain-item flex-middle">
				<h4 class="domain-name"><?php echo $domain['title'] ?></h4>
				<?php echo $link_tag ; ?>
				<?php if( ! empty( $settings['selected_icon']['value'] )){ ?>
				<span class="domain-icon-check">
					<?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
				<?php } ?>
			</li>
			<?php } ?>
			<?php if( ! empty( $settings['btn_text'] ) ){ ?>
			<li class="domain-item read-more flex-middle">
				<h4 class="domain-name"><?php echo $settings['btn_text']; ?></h4>
				<a href="<?php echo esc_url( $settings['link_btn']['url'] ); ?>"></a>
			</li>
			<?php } ?>
		</ul>
	        
	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Domain_List class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Domain_List() );