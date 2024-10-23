<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Testimonial Slider 2
 */
class ProgriSaaS_Testimonials2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itestimonials2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Testimonial Slider 2', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_testimonials',
			[
				'label' => __( 'Testimonials', 'progrisaas' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'ttitle',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'tcontent',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => '10',
				'default' => __( '"You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed."', 'progrisaas' ),
			]
		);

		$repeater->add_control(
			'timage',
			[
				'label' => __( 'Avatar', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'tname',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Anna Paulina', 'progrisaas' ),
			]
		);

		$repeater->add_control(
			'tjob',
			[
				'label' => __( 'Job', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Client of Company', 'progrisaas' ),
			]
		);

		$this->add_control(
		    'testi_slider',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [
		            [
		             	'tcontent' => __( 'You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed.', 'progrisaas' ),
						'tname'	  => __( 'Anna Paulina', 'progrisaas' ),
						'tjob'	  => __( 'Client of Company', 'progrisaas' ),
		            ],
		            [
		             	'tcontent' => __( 'You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed.', 'progrisaas' ),
						'tname'	  => __( 'Anna Paulina', 'progrisaas' ),
						'tjob'	  => __( 'Client of Company', 'progrisaas' ),
		            ],
		            [
		             	'tcontent' => __( 'You will never fake the feeling of being in such a place. The live minimalism base on the natural materials & alive unprocessed.', 'progrisaas' ),
						'tname'	  => __( 'Anna Paulina', 'progrisaas' ),
						'tjob'	  => __( 'Client of Company', 'progrisaas' ),
		            ]
		        ],
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{tname}}}',
		    ]
		);

		$this->add_control(
			'testi_slider_image_position',
			[
				'label' => __( 'Avatar Position', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'aside',
				'options' => [
					'aside' => __( 'Aside', 'progrisaas' ),
					'top' => __( 'Top', 'progrisaas' ),
				],
				'style_transfer' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'is_rate',
			[
				'label'   => esc_html__( 'Rate', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_rate',
			[
				'label' => __( 'Image Rate', 'progrisaas' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'is_rate'	=> 'yes'
				]
			]
		);

		$slides_show = range( 1, 10 );
		$slides_show = array_combine( $slides_show, $slides_show );

		$this->add_control(
			'heading_slider_option',
			[
				'label' => __( 'Slider Option', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
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
			'is_fade',
			[
				'label'   => esc_html__( 'Fade', 'progrisaas' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
		$this->add_responsive_control(
			'slider_spacing',
			[
				'label' => __( 'Slider Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
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
			'arr_position',
			[
				'label'        => esc_html__( 'Arrows Position', 'progrisaas' ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'arr-vertical'   => [
						'title' => esc_html__( 'Vertical', 'progrisaas' ),
						'icon'  => 'eicon-ellipsis-v',
					],
					'arr-horizontal' => [
						'title' => esc_html__( 'Horizontal', 'progrisaas' ),
						'icon'  => 'eicon-ellipsis-h',
					],
				],
				'default'      => 'arr-vertical',
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				]
			]
		);

		$this->end_controls_section();

		// Styling.
		$this->start_controls_section(
			'style_tcontent',
			[
				'label' => __( 'General', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ttitle_heading',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'ttitle_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item .tcontent .ttitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ttitle_typography',
				'selector' => '{{WRAPPER}} .ot-testimonial-s2__item .tcontent .ttitle',
			]
		);

		$this->add_control(
			'heading_cbox',
			[
				'label' => __( 'Content Box', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_responsive_control(
			'spacing_star_rate',
			[
				'label' => __( 'Star Rate', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item .star-rate' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'is_rate'		=> 'yes',
					'image_rate[url]!'	=> '',
				]
			]
		);
		$this->add_responsive_control(
			'spacing_tcontent',
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
					'{{WRAPPER}} .ot-testimonial-s2__item .tcontent' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-testimonial-s2__item .tcontent',
			]
		);

		$this->add_control(
			'tcontent_color',
			[
				'label' => __( 'Content Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item .tcontent' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tcontent_bgcolor',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'tcontent_padding',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tcontent_border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tcontent_box_shadow',
				'selector' => '{{WRAPPER}} .ot-testimonial-s2__item',
			]
		);

		$this->end_controls_section();

		// Image.
		$this->start_controls_section(
			'style_timage',
			[
				'label' => __( 'Avatars', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
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
					'{{WRAPPER}} .tmeta:not(.--top) img' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tmeta.--top img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
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
					'{{WRAPPER}} .tmeta img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tmeta img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Name.
		$this->start_controls_section(
			'style_tname',
			[
				'label' => __( 'Name', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item .tmeta h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .ot-testimonial-s2__item .tmeta h6',
			]
		);

		$this->add_responsive_control(
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
					'{{WRAPPER}} .ot-testimonial-s2__item .tmeta h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Job.
		$this->start_controls_section(
			'style_tjob',
			[
				'label' => __( 'Job', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'job_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2__item .tmeta span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'selector' => '{{WRAPPER}} .ot-testimonial-s2__item .tmeta span',
			]
		);		

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
			'spacing_nav',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
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
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-testimonial-s2 .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .owl-nav button' => 'color: {{VALUE}};',
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
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$dots   = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );
		$shows  = !empty( $settings['tshow'] ) ? $settings['tshow'] : 1;
		$tshows = !empty( $settings['tshow_tablet'] ) ? $settings['tshow_tablet'] : $shows;
		$mshows = !empty( $settings['tshow_mobile'] ) ? $settings['tshow_mobile'] : $tshows;
		$gaps   = isset( $settings['slider_spacing']['size'] ) && is_numeric( $settings['slider_spacing']['size'] ) ? $settings['slider_spacing']['size'] : 30;
		$tgaps  = isset( $settings['slider_spacing_tablet']['size'] ) && is_numeric( $settings['slider_spacing_tablet']['size'] ) ? $settings['slider_spacing_tablet']['size'] : $gaps;
		$mgaps  = isset( $settings['slider_spacing_mobile']['size'] ) && is_numeric( $settings['slider_spacing_mobile']['size'] ) ? $settings['slider_spacing_mobile']['size'] : $tgaps;
		$timeout  = isset( $settings['timeout']['size'] ) ? $settings['timeout']['size'] : '';
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
			'fade'      		   => $settings['is_fade'] ? $settings['is_fade'] : 'no' ,
			'arrows'        	   => $arrows,
			'dots'          	   => $dots
		];

		$class = [];
		$class[] = 'ot-testimonial-slider ot-testimonial-s2';
		$class[] = $settings['arr_position'];

		$this->add_render_attribute(
			'slides', [
				'class'               => implode(' ', $class),
				'data-slider_options' => wp_json_encode( $owl_options ),
			]
		);
		?>

		<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
			<div class="owl-carousel owl-theme">
			<?php if ( ! empty( $settings['testi_slider'] ) ) : foreach ( $settings['testi_slider'] as $testi ) : 

				if( $testi['timage']['id'] ){
					$image_html = wp_get_attachment_image( $testi['timage']['id'], 'thumbnail' ); // Get Value widget Image Size Control by name widget:  $settings['timage_size_size']
				}else{
					$image_html = '<img src="' . esc_attr( $testi['timage']['url'] ) . '" alt="' . esc_attr( $testi['tname'] ) . '">';
				}
				?>
				<div class="ot-testimonial-s2__item">
					<?php if( $settings['is_rate'] && !empty( $settings['image_rate']['url'] ) ) { ?>
	        			<div class="star-rate"><img src="<?php echo esc_attr( $settings['image_rate']['url'] ); ?>" alt="<?php echo esc_attr( $testi['tname'] ); ?>"></div>
	        		<?php } ?>
	        		<?php if( 'top' === $settings['testi_slider_image_position'] && ! empty( $testi['timage']['url'] ) ){ ?>
	        		<div class="tmeta --top">
	        		<?php echo $image_html; ?>
	        		</div>
	        		<?php } ?>
			        <div class="tcontent">
			        	<?php if( $testi['ttitle'] ){ ?><h5 class="ttitle"><?php echo $testi['ttitle']; ?></h5><?php } ?>
			        	<div class="tdesc"><?php echo $testi['tcontent']; ?></div>
			        </div>
			        <div class="tmeta <?php if( 'aside' === $settings['testi_slider_image_position'] && ! empty( $testi['timage']['url'] ) ){ echo 'flex-middle';} ?>">
			        	<?php if( 'aside' === $settings['testi_slider_image_position'] && ! empty( $testi['timage']['url'] ) ){ echo $image_html; } ?>
			        	<div class="tinfo">
			        		<h6><?php echo $testi['tname']; ?></h6>
			        		<?php if($testi['tjob']) { ?><span><?php echo $testi['tjob']; ?></span><?php } ?>
			        	</div>
		        	</div>
	        	</div>
			<?php endforeach; endif; ?>
			</div>			
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Testimonials2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Testimonials2() );