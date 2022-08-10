<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Blockquote Slider
 */
class Progrisaas_Blockquote_Slider extends Widget_Base {

	public function get_name() {
		return 'iquoteslider';
	}

	public function get_title() {
		return __( 'OT Blockquote Slider', 'progrisaas' );
	}

	public function get_icon() {
		return 'eicon-blockquote';
	}

	public function get_keywords() {
		return [ 'blockquote', 'quote' ];
	}

	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_blockquote_content',
			[
				'label' => __( 'Blockquote', 'progrisaas' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'blockquote_content',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '« Build modern chat and messaging experiences with offline messaging and analytics.»', 'progrisaas' ),
				'placeholder' => __( 'Enter your quote', 'progrisaas' ),
				'rows' => 10,
			]
		);
		$repeater->add_control(
			'author_name',
			[
				'label' => __( 'Author', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Adam Smith', 'progrisaas' ),
			]
		);
		$repeater->add_control(
			'author_job',
			[
				'label' => __( 'Job', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( ' , founder', 'progrisaas' ),
			]
		);
		$this->add_control(
		    'blockquote_carousel',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'fields'      => $repeater->get_controls(),
		        'title_field' => '{{{author_name}}}',
		        'default'     => [
		        	[
		             	'blockquote_content'       => __( '« Build modern chat and messaging experiences with offline messaging and analytics.»', 'progrisaas' ),
		                'author_name' => __( 'Adam Smith', 'progrisaas' ),
		                'author_job' => __( ' , founder', 'progrisaas' ),
		            ],
		        ],
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

		$this->add_responsive_control(
			'quote_spacing',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-blockquote__content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ot-blockquote__content',
			]
		);

		$this->add_control(
			'heading_author_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Author', 'progrisaas' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'author_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-blockquote__author' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'selector' => '{{WRAPPER}} .ot-blockquote__author',
			]
		);

		$this->add_control(
			'heading_job_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Job', 'progrisaas' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'job_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-blockquote__author span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'selector' => '{{WRAPPER}} .ot-blockquote__author span',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_quote_style',
			[
				'label' => __( 'Quote', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'quote_bg_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} blockquote:before' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'quote_size',
			[
				'label' => __( 'Size', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} blockquote:before' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'quote_gap',
			[
				'label' => __( 'Gap', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} blockquote' => 'padding-left: {{SIZE}}{{UNIT}}',
				],
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
					'{{WRAPPER}} .custom-nav' => 'margin-top: {{SIZE}}{{UNIT}};',
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

		if ( empty( $settings['blockquote_carousel'] ) ) {
			return;
		}
		$shows  = !empty( $settings['tshow'] ) ? $settings['tshow'] : 1;
		$tshows = !empty( $settings['tshow_tablet'] ) ? $settings['tshow_tablet'] : $shows;
		$mshows = !empty( $settings['tshow_mobile'] ) ? $settings['tshow_mobile'] : $tshows;
		$gaps   = isset( $settings['quote_spacing']['size'] ) && is_numeric( $settings['quote_spacing']['size'] ) ? $settings['quote_spacing']['size'] : 70;
		$tgaps  = isset( $settings['quote_spacing_tablet']['size'] ) && is_numeric( $settings['quote_spacing_tablet']['size'] ) ? $settings['quote_spacing_tablet']['size'] : $gaps;
		$mgaps  = isset( $settings['quote_spacing_mobile']['size'] ) && is_numeric( $settings['quote_spacing_mobile']['size'] ) ? $settings['quote_spacing_mobile']['size'] : $tgaps;
		$timeout  = $settings['timeout']['size'] ? $settings['timeout']['size'] : '';
		$dots   = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$arrows_custom = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );

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
			'arrows-custom'        => $arrows_custom,
			'arrows'        	   => false,
			'dots'          	   => $dots
		];

		$this->add_render_attribute(
			'slides', [
				'class'               => 'ot-blockquote-slider',
				'data-slider_options' => wp_json_encode( $owl_options ),
			]
		);

		?>
		<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
			<div class="owl-carousel owl-theme">
				<?php foreach ( $settings['blockquote_carousel'] as $key => $blockquote ) { ?>
				<div class="ot-blockquote-item">
					<blockquote>
						<p class="ot-blockquote__content">
							<?php echo $blockquote['blockquote_content']; ?>
						</p>
						<?php if ( ! empty( $blockquote['author_name'] ) ) : ?>
						<p class="ot-blockquote__author">
							<?php echo $blockquote['author_name']; ?>
							<span><?php echo $blockquote['author_job']; ?></span>
						</p>
						<?php endif; ?>
					</blockquote>
				</div>
				<?php } ?>
			</div>
			<?php if( $arrows_custom ){ ?>
			<div class="custom-nav">
				<button type="button" class="owl-prev"><i class="ot-flaticon-left-arrow"></i></button>
				<button type="button" class="owl-next"><i class="ot-flaticon-right-arrow"></i></button>
			</div>
			<?php } ?>
		</div>

		<?php
	}

	/**
	 * Render Blockquote widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */
	protected function content_template() {
		
	}
}
// After the Progrisaas_Blockquote_Slider class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Progrisaas_Blockquote_Slider() );
