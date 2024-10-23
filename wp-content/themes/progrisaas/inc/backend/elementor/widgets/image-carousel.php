<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Client Logos
 */
class ProgriSaaS_Image_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iimageslider';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Image Carousel', 'progrisaas' );
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
				'label' => __( 'Image', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'image_partner',
			[
				'label' => __( 'Image', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'image_link',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'default' => [],
			]
		);
		$this->add_control(
		    'image_carousel',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{title}}}',
		    ]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image_carousel_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => ['1536x1536', '2048x2048'],
				'include' => [],
				'default' => 'full',
			]
		);

		$slides_show = range( 1, 10 );
		$slides_show = array_combine( $slides_show, $slides_show );

		$this->add_responsive_control(
			'tshow',
			[
				'label' => __( 'Slides To Show', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'progrisaas' ),
				] + $slides_show,
				'default' => ''
			]
		);

		$this->add_control(
			'visible_outside',
			[
				'label'   => esc_html__( 'Visible Item Outside', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
				'selectors_dictionary' => [
				    'yes' => 'overflow: visible',
				],
				'selectors' => [
				    '{{WRAPPER}} .owl-carousel .owl-stage-outer' => '{{VALUE}}',
				]
			]
		);
		$this->add_control(
			'loop',
			[
				'label'   => esc_html__( 'Loop', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'   => esc_html__( 'Autoplay', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'timeout',
			[
				'label' => __( 'Autoplay Timeout', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min'  => 1000,
						'max'  => 20000,
						'step' => 1000,
					],
				],
				'default' => [
					'size' => 7000,
				],
				'condition' => [
					'autoplay' => 'yes',
				]
			]
		);
		
		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'both' => __( 'Arrows and Dots', 'progrisaas' ),
					'arrows' => __( 'Arrows', 'progrisaas' ),
					'dots' => __( 'Dots', 'progrisaas' ),
					'none' => __( 'None', 'progrisaas' ),
				],
			]
		);
		$this->add_control(
			'arr_top',
			[
				'label'   => esc_html__( 'Arrow On Top', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				]
			]
		);

		$this->end_controls_section();

		//Style

		$this->start_controls_section(
			'image_style_section',
			[
				'label' => __( 'Image', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Vertical Align', 'progrisaas' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start'    => [
						'title' => __( 'Top', 'progrisaas' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => __( 'Center', 'progrisaas' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => __( 'Bottom', 'progrisaas' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-image-slider .owl-stage' => 'align-items: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'img_height',
			[
				'label' => __( 'Height', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-image-slider .owl-item img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'img_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 70,
				],
			]
		);

		$this->add_control(
			'img_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-image-slider .owl-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'img_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => __( 'Opacity', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-image-slider .owl-item img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'img_css_filters',
				'selector' => '{{WRAPPER}} .ot-image-slider .owl-item img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'img_hover_effects',
			[
				'label' => __( 'Hover', 'progrisaas' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => __( 'Opacity', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-image-slider .owl-item img:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'img_css_filters_hover',
				'selector' => '{{WRAPPER}} .ot-image-slider .owl-item img:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Dots.
		$this->start_controls_section(
			'navigation_section',
			[
				'label' => __( 'Dots', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_responsive_control(
			'dots_align',
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
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .owl-dots' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'dots_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .owl-dots' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
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

        // Arrow.
		$this->start_controls_section(
			'style_nav',
			[
				'label' => __( 'Arrows', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				]
			]
		);
		$this->add_responsive_control(
			'arrow_spacing',
			[
				'label' => __( 'Spacing', 'engitech' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .owl-nav button.owl-prev' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .owl-nav button.owl-next' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'arr_top!' => 'yes'
				]
			]
		);
		$this->add_responsive_control(
			'custom_arrow_spacing',
			[
				'label' => __( 'Spacing', 'engitech' ),
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
				'condition' => [
					'arr_top' => 'yes'
				]
			]
		);
		$this->add_control(
			'custom_arrow_align',
			[
				'label' => __( 'Position Align', 'progrisaas' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'progrisaas' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'progrisaas' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .custom-nav' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'arr_top' => 'yes'
				]
			]
		);
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .owl-nav button' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .owl-nav button:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .owl-nav button' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .owl-nav button:hover' => 'background: {{VALUE}};',
					'{{WRAPPER}} .custom-nav [class*=owl-]:hover' => 'background: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['image_carousel'] ) ) {
			return;
		}
		$shows    = !empty( $settings['tshow'] ) ? $settings['tshow'] : 3;
		$tshows   = !empty( $settings['tshow_tablet'] ) ? $settings['tshow_tablet'] : $shows;
		$mshows   = !empty( $settings['tshow_mobile'] ) ? $settings['tshow_mobile'] : $tshows;
		$gaps     = isset( $settings['img_spacing']['size'] ) && is_numeric( $settings['img_spacing']['size'] ) ? $settings['img_spacing']['size'] : 70;
		$tgaps    = isset( $settings['img_spacing_tablet']['size'] ) && is_numeric( $settings['img_spacing_tablet']['size'] ) ? $settings['img_spacing_tablet']['size'] : $gaps;
		$mgaps    = isset( $settings['img_spacing_mobile']['size'] ) && is_numeric( $settings['img_spacing_mobile']['size'] ) ? $settings['img_spacing_mobile']['size'] : $tgaps;
		$timeout  = isset( $settings['timeout']['size'] ) ? $settings['timeout']['size'] : '';
		$dots     = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$arrows   = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );
		if( $settings['arr_top'] ){
			$arrows = false;
		}
		$owl_options = [
			'slides_show_desktop'  => absint( $shows ),
			'slides_show_tablet'   => absint( $tshows ),
			'slides_show_mobile'   => absint( $mshows ),
			'margin_desktop'   	   => absint( $gaps ),
			'margin_tablet'   	   => absint( $tgaps ),
			'margin_mobile'   	   => absint( $mgaps ),
			'autoplay'      	   => $settings['autoplay'] ? $settings['autoplay'] : 'no',
			'autoplay_time_out'    => absint( $timeout ),
			'loop'      		   => $settings['loop'] ? $settings['loop'] : 'no' ,
			'arrows-custom'        => 'yes' === $settings['arr_top'],
			'arrows'        	   => $arrows,
			'dots'          	   => $dots
		];

		$this->add_render_attribute(
			'slides', [
				'class'               => 'ot-image-slider',
				'data-slider_options' => wp_json_encode( $owl_options ),
			]
		);

		$slides = [];

		foreach ( $settings['image_carousel'] as $key => $attachment ) {
			$title = $attachment['title'];
            $image_url = Group_Control_Image_Size::get_attachment_image_src( $attachment['image_partner']['id'], 'image_carousel_size', $settings );
            $image_html = '<img src="' . esc_attr( $image_url ) . '" alt="' . esc_attr( $title ) . '">';
            $link_tag = '';
            if ( ! empty( $attachment['image_link']['url'] ) ) {
				$this->add_render_attribute( 'link' . $key, 'href', $attachment['image_link']['url'] );

				if ( $attachment['image_link']['is_external'] ) {
					$this->add_render_attribute( 'link' . $key, 'target', '_blank' );
				}

				if ( $attachment['image_link']['nofollow'] ) {
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
			<?php if( $settings['arr_top'] ){ ?>
			<div class="custom-nav">
				<button type="button" class="owl-prev"><i class="ot-flaticon-left-arrow"></i></button>
				<button type="button" class="owl-next"><i class="ot-flaticon-right-arrow"></i></button>
			</div>
			<?php } ?>
			<div class="owl-carousel owl-theme">
		        <?php echo implode( '', $slides ); ?>
		    </div>
	    </div>
		<?php 
		
	}

	protected function content_template() {}

	public function get_keywords() {
		return [ 'slider', 'carousel' ];
	}

}
// After the ProgriSaaS_Image_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Image_Carousel() );