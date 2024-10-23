<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Portfolio Filter
 */
class Progrisaas_PortfolioGrid extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipfilter';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Portfolio Filter', 'progrisaas' );
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

		//Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'progrisaas' ),
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Style Layout', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'p-grid',
				'options' => [
					'p-grid'  	 => __( 'Grid', 'progrisaas' ),
					'p-masonry'  => __( 'Masonry', 'progrisaas' ),
				],
			]
		);
		$this->add_control(
			'project_cat',
			[
				'label' => __( 'Select Categories', 'progrisaas' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_cate_project(),
				'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'progrisaas' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'filter',
			[
				'label' => __( 'Show Filter', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'progrisaas' ),
				'label_off' => __( 'Hide', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'all_text',
			[
				'label' => __( 'Text All', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'All',
				'condition' => [
					'filter' => 'yes',
				],
			]
		);
		$this->add_control(
			'arrow',
			[
				'label' => __( 'Underline', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'progrisaas' ),
				'label_off' => __( 'Hide', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'filter' => 'yes',
				],
			]
		);
		$this->add_control(
			'column',
			[
				'label' => __( 'Columns', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pf_3_cols',
				'options' => [
					'pf_2_cols' => __( '2 Column', 'progrisaas' ),
					'pf_3_cols'	=> __( '3 Column', 'progrisaas' ),
					'pf_4_cols' => __( '4 Column', 'progrisaas' ),
				],
				'separator' => 'before',
			]
		);		
		$this->add_responsive_control(
			'w_gaps',
			[
				'label' => __( 'Gap Width', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .project-item' => 'padding: calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .project-item.double_w .projects-thumbnail img' => 'margin-top: calc(-{{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .projects-grid' => 'margin: calc(-{{SIZE}}{{UNIT}}/2);',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'project_num',
			[
				'label' => __( 'Show Number Projects', 'progrisaas' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '6',
				'separator' => 'before',
			]
		);		
		$this->add_control(
			'load_more',
			[
				'label' => __( 'Load More Button', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Load More',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'loading_more',
			[
				'label' => __( 'Loading Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Loading...',
				'condition' => [
					'load_more[value]!' => '',
				]
			]
		);
		$this->add_control(
			'p_more',
			[
				'label' => __( 'Load Number Projects', 'progrisaas' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
				'condition' => [
					'load_more[value]!' => '',
				]
			]
		);
		$this->add_control(
			'layout',
			[
				'label' => __( 'Info Box Style', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1'  	=> __( 'Background Overlay', 'progrisaas' ),
					'style-2' 	=> __( 'Under Image', 'progrisaas' ),
					'style-3' 	=> __( 'Hidden', 'progrisaas' ),
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'popup_thumb',
			[
				'label' => __( 'Popup Gallery', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'layout' => ['style-2','style-3'],
				],
			]
		);
		$this->add_control(
			'is_exc',
			[
				'label' => __( 'Show Excerpt', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);

		$this->add_control(
			'is_btn',
			[
				'label' => __( 'Show Button', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Explore more <i class="ot-flaticon-right-arrow"></i>', 'progrisaas' ),
				'label_block' => 'true',
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'filter_style_section',
			[
				'label' => __( 'Filter', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'filter' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'filter_align',
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
					'{{WRAPPER}} .project_filters' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'filter_spacing',
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
					'{{WRAPPER}} .project_filters' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'filter_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .project_filters li a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'filter_hcolor',
			[
				'label' => __( 'Active Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .project_filters li a:hover, {{WRAPPER}} .project_filters li a.selected, {{WRAPPER}} .project_filters li a:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project_filters li a:before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',
				'selector' => '{{WRAPPER}} .project_filters li a',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'overlay_style_section',
			[
				'label' => __( 'Project Items', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'heading_general',
			[
				'label' => __( 'General', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'overlay_align',
			[
				'label' => __( 'Alignment Info', 'progrisaas' ),
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
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info .portfolio-info-inner' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_responsive_control(
			'info_padding',
			[
				'label' => 'Padding Info',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-info-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout' => ['style-1','style-2'],
				],
			]
		);
		$this->add_control(
			'overlay_background',
			[
				'label' => __( 'Background Overlay', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .style-1 .portfolio-info, {{WRAPPER}} .projects-box .overlay' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .projects-thumbnail i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['style-2','style-3'],
				]
			]
		);
		$this->add_control(
			'scale_thumb',
			[
				'label' => __( 'Animation Image Hover', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'progrisaas' ),
				'label_off' => __( 'No', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'radius_thumb',
			[
				'label' => __( 'Border Radius Image', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .projects-box, {{WRAPPER}} .projects-thumbnail' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		/* title */
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info h5 a' => 'color: {{VALUE}}; background-image: linear-gradient(0deg, {{VALUE}}, {{VALUE}});',
				],
				'condition' => [
					'layout' => ['style-1','style-2'],
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
					'{{WRAPPER}} .projects-box .portfolio-info h5 a' => 'background-image: linear-gradient(0deg, {{VALUE}}, {{VALUE}});',
					'{{WRAPPER}} .projects-box .portfolio-info h5 a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info h5 a',
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);

		/* category */
		$this->add_control(
			'heading_cat',
			[
				'label' => __( 'Category', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'show_cat',
			[
				'label' => __( 'Show Category', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'progrisaas' ),
				'label_off' => __( 'Hide', 'progrisaas' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_responsive_control(
			'cat_spacing',
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
					'{{WRAPPER}} .portfolio-info .portfolio-cates' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_cat' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-info .portfolio-cates a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .portfolio-info .portfolio-cates a:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'show_cat' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'cat_hcolor',
			[
				'label' => __( 'Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .projects-box .portfolio-info .portfolio-cates a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_cat' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .projects-box .portfolio-info .portfolio-cates a',
				'condition' => [
					'show_cat' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);
		/* Excerpt */
		$this->add_control(
			'heading_exc',
			[
				'label' => __( 'Excerpt', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'is_exc' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_control(
			'exc_color',
			[
				'label' => __( 'Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-info .portfolio-exc' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_exc' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'exc_typography',
				'selector' => '{{WRAPPER}} .portfolio-info .portfolio-exc',
				'condition' => [
					'is_exc' => 'yes',
					'layout' => ['style-1','style-2'],
				]
			]
		);

		/* Button */
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-btn a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->add_control(
			'btn_hcolor',
			[
				'label' => __( 'Color hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .portfolio-btn a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .portfolio-btn a',
				'condition' => [
					'is_btn' => 'yes',
				]
			]
		);
		$this->end_controls_section();	
		
		/* Load More Button */
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Load More Button', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'load_more[value]!' => '',
				]
			]
		);

		$this->add_responsive_control(
			'lm_btn_align',
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
					'{{WRAPPER}} .btn-block' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'lm_btn_spacing',
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
					'{{WRAPPER}} .octf-btn' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'lm_btn_padding',
			[
				'label' => 'Padding Button',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'lm_btn_typography',
				'selector' => '{{WRAPPER}} .octf-btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'progrisaas' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'progrisaas' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="project-filter-wrapper">
			<?php if( 'yes' === $settings['filter'] ) { ?>
	        	<div class="container">
	        		<ul class="project_filters <?php if( 'yes' !== $settings['arrow'] ) echo 'no-arrow'; ?>">
	        			<?php if( $settings['all_text'] != '' ) { ?>
	        			 	<li><a href="#" data-filter="*" class="selected"><?php echo esc_html( $settings['all_text'] ); ?></a></li>
	        			<?php } ?>
		                <?php
		                if( $settings['project_cat'] ){
		                    $categories = $settings['project_cat'];
		                    foreach( (array)$categories as $categorie){
		                        $cates = get_term_by('term_id', $categorie, 'portfolio_cat');
		                        $cat_name = $cates->name;
		                        $cat_slug = $cates->slug;
		                        $cat_id   = 'category-' . $cates->term_id;

		                ?>
		                	<li>
								<a href='#' data-filter='.<?php echo esc_attr( $cat_id ); ?>'><?php echo esc_html( $cat_name ); ?></a>
							</li>	                   
		                <?php } }else{
		                    $categories = get_terms('portfolio_cat');
		                    foreach( (array)$categories as $categorie){
		                        $cat_name = $categorie->name;
		                        $cat_slug = $categorie->slug;
		                        $cat_id   = 'category-' . $categorie->term_id;
		                    ?>
		                    <li>
								<a href='#' data-filter='.<?php echo esc_attr( $cat_id ); ?>'><?php echo esc_html( $cat_name ); ?></a>
							</li>	                    
		                <?php } } ?>
					</ul>
				</div>
	        <?php } ?>
			<?php 
				$cat_ids = '';
	        	if( $settings['project_cat'] ) {
	                $args = array(	                    
	                    'post_type' => 'ot_portfolio',
	                    'post_status' => 'publish',
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'portfolio_cat',
	                            'field' => 'term_id',
	                            'terms' => $settings['project_cat'],
	                        ),
	                    ),              
					);
					$cat_ids = implode(",", $settings['project_cat']);
	            } else {
	                $args = array(
	                    'post_type' => 'ot_portfolio',
	                    'post_status' => 'publish',
	                );
	            }
	            $the_query = new \WP_Query($args);
				$count = $the_query->found_posts;

				$class 	 = array();
				$class[] = 'projects-grid';
				$class[] = $settings['column'];
				$class[] = $settings['layout'];
				$class[] = 'yes' === $settings['popup_thumb'] ? 'img-popup' : '';
				$class[] = 'yes' === $settings['scale_thumb'] ? 'img-scale' : '';
				$class[] = 'yes' === $settings['show_cat'] ? '' : 'no-cat';
				$class[] = 'yes' === $settings['is_exc'] ? 'is-exc' : 'no-exc';

				$this->add_render_attribute(
					'wrapper', [
						'class'      => implode(' ', $class),
						'data-load'  => $settings['p_more'],
						'data-count' => $count,
					]
				);
	        ?>
	        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<div class="grid-sizer"></div>
	            <?php
	            if( $settings['project_cat'] ){
	                $args = array(	                    
	                    'post_type' => 'ot_portfolio',
	                    'post_status' => 'publish',
	                    'posts_per_page' => $settings['project_num'],
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'portfolio_cat',
	                            'field' => 'term_id',
	                            'terms' => $settings['project_cat'],
	                        ),
	                    ),              
	                );
	            }else{
	                $args = array(
	                    'post_type' => 'ot_portfolio',
	                    'post_status' => 'publish',
	                    'posts_per_page' => $settings['project_num'],
	                );
	            }
	            $wp_query = new \WP_Query($args);
	            while ($wp_query -> have_posts()) : $wp_query -> the_post();
				
				if( $settings['style'] == 'p-masonry' ){
					get_template_part( 'template-parts/content', 'project-masonry', array(
						'btn_text' => $settings['btn_text'],
					));
				}else{
					get_template_part( 'template-parts/content', 'project', array(
						'btn_text' => $settings['btn_text'],
					));
				}

	            endwhile; wp_reset_postdata(); ?>
			</div>

			<?php if( $settings['load_more'] && $count >= $settings['project_num'] ) echo '<div class="btn-block"><span class="btn-loadmore octf-btn" data-category="'.$cat_ids.'" data-loaded="'.$settings['load_more'].'" data-loading="'.$settings['loading_more'].'" data-style="'.$settings['style'].'">'.$settings['load_more'].'</span></div>'; ?>
	    </div>
										
	    <?php
	}

	protected function content_template() {}

	public function get_keywords() {
		return [ 'isotope', 'project', 'grid' ];
	}

	protected function select_param_cate_project() {
		$category = get_terms( 'portfolio_cat' );
		$cat = array();
		foreach( $category as $item ) {
		   if( $item ) {
			  $cat[$item->term_id] = $item->name;
		   }
		}
		return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Progrisaas_PortfolioGrid() );