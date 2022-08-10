<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class ProgriSaaS_Accordions_Schedule extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iacc-schedule';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Accordions Schedule', 'progrisaas' );
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
				'label' => __( 'Accordions Schedules', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'schedules_time',
			[
				'label' => __( 'Schedules Time', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '10.00 – 10.30', 'progrisaas' ),
				'placeholder' => __( 'Schedules Time', 'progrisaas' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'schedules_title',
			[
				'label' => __( 'Schedules Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Introduction', 'progrisaas' ),
				'placeholder' => __( 'Schedules Title', 'progrisaas' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'schedules_content',
			[
				'label' => __( 'Schedules Content', 'progrisaas' ),
				'default' => __( 'Schedules Content', 'progrisaas' ),
				'placeholder' => __( 'Schedules Content', 'progrisaas' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'author_image',
			[
				'label' => __( 'Avatar', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'author_name',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Alex Sollerio', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'author_job',
			[
				'label' => __( 'Job', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Developer', 'progrisaas' ),
			]
		);

		$this->add_control(
			'ot_accs_schedules',
			[
				'label' => __( 'Schedules Items', 'progrisaas' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'schedules_time' => __( '10.00 – 10.30', 'progrisaas' ),
						'schedules_title' => __( 'Introduction', 'progrisaas' ),
						'schedules_content' => __( 'This conference is created by profeshional designers for other designers, who want to impprove their knowledge in design sphere. We have been building the active community.', 'progrisaas' ),
						'author_image'  => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'author_name'	  => __( 'Alex Sollerio', 'progrisaas' ),
						'author_job'	  => __( 'Developer', 'progrisaas' ),
					],
					[
						'schedules_time' => __( '11:00 – 11:45', 'progrisaas' ),
						'schedules_title' => __( 'Product Design in Automotive', 'progrisaas' ),
						'schedules_content' => __( 'This conference is created by profeshional designers for other designers, who want to impprove their knowledge in design sphere. We have been building the active community.', 'progrisaas' ),
						'author_image'  => [
							'url' => Utils::get_placeholder_image_src(),
						],
						'author_name'	  => __( 'Debra Miles', 'progrisaas' ),
						'author_job'	  => __( 'Developer', 'progrisaas' ),
					],
				],
				'title_field' => '{{{ schedules_title }}}',
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
					'{{WRAPPER}} .schedule-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .schedule-item' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .schedule-item.current' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'acc_border_color',
			[
				'label' => __( 'Border Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .schedule-item' => 'border-top-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'acc_border_radius',
			[
				'label' => __( 'Border Radius Active', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .schedule-item.current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'acc_box_shadow',
				'selector' => '{{WRAPPER}} .schedule-item.current',
			]
		);

		$this->end_controls_section();

		//Title
		$this->start_controls_section(
			'style_title',
			[
				'label' => __( 'Title & Time', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
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
					'{{WRAPPER}} .schedule-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .schedule-title svg' => 'fill: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .schedule-title',
			]
		);
		$this->add_control(
			'heading_time',
			[
				'label' => __( 'Time', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'time_spacing',
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
					'{{WRAPPER}} .schedule-item__time' => 'margin-right: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .schedule-item__time' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'time_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .schedule-item__time' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'time_typography',
				'selector' => '{{WRAPPER}} .schedule-item__time',
			]
		);
		
		$this->end_controls_section();

		// Image, Name, Job
		$this->start_controls_section(
			'style_author',
			[
				'label' => __( 'Author', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_img',
			[
				'label' => __( 'Avatar', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'spacing_img',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .schedule-author img' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .schedule-author img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .schedule-author img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		//Name
		$this->add_control(
			'heading_name',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'spacing_name',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .schedule-author h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .schedule-author h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .schedule-author h6',
			]
		);

		//Job
		$this->add_control(
			'heading_job',
			[
				'label' => __( 'Job', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'job_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .schedule-author span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'selector' => '{{WRAPPER}} .schedule-author span',
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
					'{{WRAPPER}} .schedule-detail' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .schedule-detail',
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
		$this->add_render_attribute( 'wrapper', 'class', [ 'ot-accordions-schedule' ] );
		?>

		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<?php if ( $settings['ot_accs_schedules'] ) : foreach ( $settings['ot_accs_schedules'] as $key => $item ) { 
				// echo"<pre>";print_r($settings['ot_accs_schedules']);die;
				$tab_count = $key + 1;
				$tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $key );
				$this->add_render_attribute( $tab_title_setting_key, [
					'class' => [ 'schedule-title', 'flex-middle' ],
					'data-tab' => $tab_count,
					'role' => 'tab',
					'data-default' => $key == 0 ? 'yes' : ''
				] );
				if( $item['author_image']['id'] ){
					$image_html = wp_get_attachment_image( $item['author_image']['id'], 'thumbnail' ); // Get Value widget Image Size Control by name widget:  $settings['timage_size_size']
				}else{
					$image_html = '<img src="' . esc_attr( $item['author_image']['url'] ) . '" alt="' . esc_attr( $item['author_name'] ) . '">';
				}

			?>
			<div class="schedule-item">
				<div class="schedule-item__time">
			    	<span><?php echo $item['schedules_time']; ?></span>
		        </div>
		        <div class="schedule-item__content">
					<<?php echo $settings['header_size']; ?> <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?> ><?php echo $item['schedules_title']; ?> 
						<?php if ( $has_icon ) : ?>
							<?php
							if ( $is_new || $migrated ) { ?>
								<span class="down"><?php Icons_Manager::render_icon( $settings['icon_close'] ); ?></span>
								<span class="up"><?php Icons_Manager::render_icon( $settings['icon_active'] ); ?></span>
							<?php } else { ?>
								<i class="down <?php echo esc_attr( $settings['icon'] ); ?>"></i>
								<i class="up <?php echo esc_attr( $settings['select_icon_active'] ); ?>"></i>
							<?php } ?>
						<?php endif; ?>
					</<?php echo $settings['header_size']; ?>>
					<?php if( $item['author_image']['url'] || $item['author_name'] ){ ?>
					<div class="schedule-author flex-middle">
						<?php if( $item['author_image']['url'] ) { echo $image_html; } ?>
						<div class="author-info">
			        		<h6><?php echo $item['author_name']; ?></h6>
			        		<?php if( $item['author_job'] ) { ?><span><?php echo $item['author_job']; ?></span><?php } ?>
			        	</div>
					</div>
					<?php } ?>
					<div class="schedule-detail"><p><?php echo $item['schedules_content']; ?></p></div>
				</div>
			</div>
			<?php } endif; ?>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Accordions_Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Accordions_Schedule() );