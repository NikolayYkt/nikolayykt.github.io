<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Client Logos
 */
class ProgriSaaS_Image_Slider_Sync_Tab extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iimage-slider-sync-tab';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Image Slider Sync Tab', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-slider-push';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Image Slider Sync Tab', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image_slider',
			[
				'label' => __( 'Image', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Tab title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Customer Care', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Tab Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Automate frequently asked questions and seamlessly connect people to a human when necessary using Facebook Inbox or other platforms.', 'progrisaas' ),
				'placeholder' => __( 'Tab Content', 'progrisaas' ),
			]
		);

		$this->add_control(
		    'ot_slider_with_tabs',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{tab_title}}}',
		    ]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'ot_slider_with_tabs_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => ['1536x1536', '2048x2048'],
				'include' => [],
				'default' => 'full',
			]
		);

		$this->end_controls_section();

		//Style

		//Slider
		$this->start_controls_section(
			'slider_style_section',
			[
				'label' => __( 'Slider', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'slider_width',
			[
				'label' => __( 'Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .part-image-slider' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Arrow.
		$this->add_control(
			'heading_arrow',
			[
				'label' => __( 'Arrows', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'custom_arrow_tspacing',
			[
				'label' => __( 'Spacing Top', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .custom-nav' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'custom_arrow_bspacing',
			[
				'label' => __( 'Spacing Bottom', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .custom-nav' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav [class*=owl-]' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_hcolor',
			[
				'label' => __( 'Color Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav [class*=owl-]:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_bg_color',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav [class*=owl-]' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'arrow_bg_hcolor',
			[
				'label' => __( 'Background Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-nav [class*=owl-]:hover' => 'background: {{VALUE}};',
				]
			]
		);

		// Dots.
		$this->add_control(
			'heading_dots',
			[
				'label' => __( 'Dots Mobile', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
            'dots_bgcolor',
            [
                'label' => __( 'Color', 'progrisaas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .ot-custom-dots .owl-dot span' => 'background: {{VALUE}};',
				],
            ]
        );

        $this->add_control(
            'dots_active_bgcolor',
            [
                'label' => __( 'Color Active', 'progrisaas' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .ot-custom-dots .owl-dot.active span' => 'background: {{VALUE}};',
				],
            ]
        );

		$this->end_controls_section();

		// Tab
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Tabs', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Tab Title
		$this->add_control(
			'style_title_tab',
			[
				'label' => __( 'Tab Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'tab_title_space',
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
					'{{WRAPPER}} .ot-tabs__heading .tab-link' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .ot-tabs__heading' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
				],
			]
		);

		$this->add_control(
			'tab_title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link:not(.current)' => 'color: {{VALUE}}; opacity: 1;',
				]
			]
		);

		$this->add_control(
			'tab_title_color_active',
			[
				'label' => __( 'Color Active', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__heading .tab-link.current, {{WRAPPER}} .ot-tabs__heading .tab-link:hover' => 'color: {{VALUE}}; opacity: 1;',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_title_typography',
				'selector' => '{{WRAPPER}} .ot-tabs__heading .tab-link',
			]
		);

		//Content
		$this->add_control(
			'tab_style_content',
			[
				'label' => __( 'Tab Content', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'tab_content_space',
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
					'{{WRAPPER}} .ot-tabs__content' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'tab_content_padding',
			[
				'label' => __( 'Padding Content', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'tab_content_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-tabs__content' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-tabs__content ul li:before, {{WRAPPER}} .ot-tabs__content ol li:before' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_content_typography',
				'selector' => '{{WRAPPER}} .ot-tabs__content',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['ot_slider_with_tabs'] ) ) {
			return;
		}
		$owl_options = [
			'slides_show_desktop'  => 1,
			'slides_show_tablet'   => 1,
			'slides_show_mobile'   => 1,
			'margin_desktop'   	   => 0,
			'margin_tablet'   	   => 0,
			'margin_mobile'   	   => 0,
			'autoplay'      	   => false,
			'loop'      		   => false,
			'arrows-custom'        => true,
			'arrows'        	   => false,
			'dots'          	   => true
		];

		$this->add_render_attribute(
			'slides', [
				'class'               => 'ot-image-slider-sync-tab',
				'data-slider_options' => wp_json_encode( $owl_options ),
			]
		);

		$slides = [];

		foreach ( $settings['ot_slider_with_tabs'] as $key => $item ) {
			$title = $item['tab_title'];
            $image_url = Group_Control_Image_Size::get_attachment_image_src( $item['image_slider']['id'], 'ot_slider_with_tabs_size', $settings );
            $image_html = '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( $title ) . '">';
            $link_tag = '';
            if ( ! empty( $item['image_link']['url'] ) ) {
				$this->add_render_attribute( 'link' . $key, 'href', $item['image_link']['url'] );

				if ( $item['image_link']['is_external'] ) {
					$this->add_render_attribute( 'link' . $key, 'target', '_blank' );
				}

				if ( $item['image_link']['nofollow'] ) {
					$this->add_render_attribute( 'link' . $key, 'rel', 'nofollow' );
				}
				$link_tag = '<a '.$this->get_render_attribute_string('link' . $key).'>';
			}
            
			$slide_html = $link_tag . '<figure>' . $image_html . '</figure>';

			if( $link_tag ){
				$slide_html .= '</a>';
			}
			if( $image_url ){
				$slides[] = $slide_html;
			}
		}
		if ( empty( $slides ) ) {
			return;
		}
		?>
		
		<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
			<div class="part-image-slider">
				<div class="owl-carousel owl-theme">
			        <?php echo implode( '', $slides ); ?>
			    </div>
		    </div>
		    <div class="part-tab">
		    	<div class="custom-nav">
					<button type="button" class="owl-prev"><i class="ot-flaticon-left-arrow"></i></button>
					<button type="button" class="owl-next"><i class="ot-flaticon-right-arrow"></i></button>
				</div>
		    	<div class="ot-tabs">
					<?php $random = rand(1,1000); if ( $settings['ot_slider_with_tabs'] ) : ?>
					<ul class="ot-tabs__heading unstyle">
						<?php $i = 1; foreach ( $settings['ot_slider_with_tabs'] as $tabs ) { ?>
						<li class="tab-link" data-tab="tab-<?php echo esc_attr($i.$random); ?>"><?php echo $tabs['tab_title']; ?></li>
						<?php $i++; } ?>
					</ul>
					<?php $j = 1; foreach ( $settings['ot_slider_with_tabs'] as $tabs ) { ?>
					<div id="tab-<?php echo esc_attr($j.$random); ?>" class="ot-tabs__content">
						<?php echo $tabs['tab_content']; ?>
					</div>
					<?php $j++; } endif; ?>
			    </div>
		    </div>
	    </div>
		<?php 
		
	}

	protected function content_template() {}

	public function get_keywords() {
		return [ 'slider', 'carousel' ];
	}

}
// After the ProgriSaaS_Image_Slider_Sync_Tab class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Image_Slider_Sync_Tab() );