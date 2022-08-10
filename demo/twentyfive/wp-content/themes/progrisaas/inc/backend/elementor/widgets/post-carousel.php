<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: News Slider
 */
class ProgriSaaS_Post_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipost_carousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Post Carousel', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-posts-carousel';
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
				'label' => __( 'Post Carousel', 'progrisaas' ),
			]
		);

		$this->add_control(
			'post_cat',
			[
				'label' => __( 'Select Categories', 'progrisaas' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_cate_post(),
				'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'progrisaas' ),
			]
		);

		$this->add_control(
			'number_show',
			[
				'label' => __( 'Show Number Posts', 'progrisaas' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '9',
			]
		);

		$this->add_control(
			'post_thumbnail',
			[
				'label' => __( 'Image Size', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'progrisaas-post-thumbnail-grid',
				'options' => [					
					'progrisaas-post-thumbnail-grid' => __( 'Default', 'progrisaas' ),
					'medium_large' => __( 'Medimum Large 768x0', 'progrisaas' ),
					'large' => __( 'Large 1024x1024', 'progrisaas' ),
					'full' => __( 'Full', 'progrisaas' ),
				],
			]
		);

		$this->add_control(
			'text_btn',
			[
				'label' => __( 'Label Button', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Read More', 'progrisaas' ),
			]
		);

		$this->add_control(
			'heading_slider',
			[
				'label' => __( 'Slider', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
			'item_spacing',
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

		/*Style*/
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					]
				],
				'selectors' => [
					'{{WRAPPER}} .post-box .post-inner' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
			]
		);
		$this->add_responsive_control(
			'info_padd',
			[
				'label' => __( 'Padding', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .post-box .inner-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'radius_thumb',
			[
				'label' => __( 'Border Radius Image', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-box .entry-media img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'img_feature_spacing',
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
					'{{WRAPPER}} .entry-media' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

		//Content Style
		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'heading_meta',
			[
				'label' => __( 'Entry Meta', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'entry_meta_spacing',
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
					'{{WRAPPER}} .post-box .inner-post .post-cat' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'entry_meta_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-box .post-cat a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .post-box .post-cat a:after' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'entry_meta_color_hover',
			[
				'label' => __( 'Color Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-box .post-cat a:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'entry_meta_typography',
				'selector' => '{{WRAPPER}} .post-box .post-cat a'
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_spacing',
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
					'{{WRAPPER}} .post-box .entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .post-box .entry-title a' => 'color: {{VALUE}}; background-image: linear-gradient(0deg, {{VALUE}}, {{VALUE}});',
				]
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Hover Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-box .entry-title a:hover' => 'color: {{VALUE}}; background-image: linear-gradient(0deg, {{VALUE}}, {{VALUE}});',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .post-box .entry-title a',
			]
		);

		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'text_btn!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .btn-detail',
				'condition' => [
					'text_btn!' => '',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_btn_style' );

        $this->start_controls_tab(
			'tab_btn_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
				'condition' => [
					'text_btn!' => '',
				],
			]
		);

        $this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-detail' => 'color: {{VALUE}};',
				],
				'condition' => [
					'text_btn!' => '',
				],
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-detail' => 'background: {{VALUE}};',
				],
				'condition' => [
					'text_btn!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_btn_active',
			[
				'label' => __( 'Hover', 'progrisaas' ),
				'condition' => [
					'text_btn!' => '',
				],
			]
		);
		$this->add_control(
			'active_btn_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-detail:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'text_btn!' => '',
				],
			]
		);
		$this->add_control(
			'active_btn_bg',
			[
				'label' => __( 'Background', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-detail:hover' => 'background: {{VALUE}};',
				],
				'condition' => [
					'text_btn!' => '',
				],
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
		$shows  = !empty( $settings['tshow'] ) ? $settings['tshow'] : 3;
		$tshows = !empty( $settings['tshow_tablet'] ) ? $settings['tshow_tablet'] : $shows;
		$mshows = !empty( $settings['tshow_mobile'] ) ? $settings['tshow_mobile'] : $tshows;
		$gaps   = isset( $settings['item_spacing']['size'] ) && is_numeric( $settings['item_spacing']['size'] ) ? $settings['item_spacing']['size'] : 30;
		$tgaps  = isset( $settings['item_spacing_tablet']['size'] ) && is_numeric( $settings['item_spacing_tablet']['size'] ) ? $settings['item_spacing_tablet']['size'] : $gaps;
		$mgaps  = isset( $settings['item_spacing_mobile']['size'] ) && is_numeric( $settings['item_spacing_mobile']['size'] ) ? $settings['item_spacing_mobile']['size'] : $tgaps;
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
			'arrows'        	   => $arrows,
			'dots'          	   => $dots
		];

		$class = array();
		$class[] = 'ot-blog-slider';
		$this->add_render_attribute(
			'slides', [
				'class'               => implode(' ', $class),
				'data-slider_options' => wp_json_encode( $owl_options ),
			]
		);
		?>

		<div <?php echo $this->get_render_attribute_string( 'slides' ); ?>>
			<div class="owl-carousel owl-theme">
	        <?php
	        	$number_show = (!empty($settings['number_show']) ? $settings['number_show'] : 9);

	        	if( $settings['post_cat'] ){
	                $args = array(
			            'post_type' => 'post',
			            'post_status' => 'publish',
			            'posts_per_page' => $number_show,
			            'tax_query' => array(
					        array(
					            'taxonomy' => 'category',
					            'field'    => 'slug',
					            'terms'    => $settings['post_cat']
					        ),
					    ),
			        );
	            }else{
	                $args = array(
	                    'post_type' => 'post',
			            'post_status' => 'publish',
			            'posts_per_page' => $number_show,
	                );
	            }

		        $blogpost = new \WP_Query($args);
		        if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post(); ?> 
					<article id="post-<?php the_ID(); ?>" <?php post_class('post-box post-item'); ?>>
						<div class="post-inner">
							<div class="entry-date <?php if(!has_post_thumbnail()) {echo 'entry-date-no-img';} ?>">
			                    <span class="day"><?php the_time('d'); ?></span>
			                    <span class="month"><?php the_time('M'); ?></span>
			                </div>
						    
							<div class="entry-media post-cat-abs">
					            <a href="<?php the_permalink(); ?>">
					                <?php the_post_thumbnail( $settings['post_thumbnail'] ); ?>
					            </a>
					        </div>					       
						    
						    <div class="inner-post">
						    	<?php progrisaas_posted_in(); ?>
								<div class="entry-header">
									<?php the_title( '<h4 class="entry-title"><a class="title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
								</div><!-- .entry-header -->
								<?php if( $settings['text_btn'] ){ ?>
			                        <a href="<?php the_permalink(); ?>" class="octf-btn octf-btn-second btn-detail"><?php echo $settings['text_btn']; ?></a>
			                    <?php } ?>
							</div>
						</div>
					</article>
		        <?php endwhile; wp_reset_postdata(); endif; ?>
		    </div>
	    </div>
		<?php
	}

	protected function content_template() {}

	protected function select_param_cate_post() {
		$args = array( 'orderby=name&order=ASC&hide_empty=0' );
		$terms = get_terms( 'category', $args );
		$cat = array();
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){		    
		    foreach ( $terms as $term ) {
		        $cat[$term->slug] = $term->name;
		    }
		}
	  	return $cat;
	}
}
// After the ProgriSaaS_Post_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Post_Carousel() );