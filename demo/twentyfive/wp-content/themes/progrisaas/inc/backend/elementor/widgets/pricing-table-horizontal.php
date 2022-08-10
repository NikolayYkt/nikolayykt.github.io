<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table
 */
class ProgriSaaS_Pricing_Table_Horizontal extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ihpricingtable';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Pricing Table Horizontal', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-price-table';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {

		//Content Pricing Table
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Pricing Table', 'progrisaas' ),
			]
		);

		$this->add_control(
			'table_style',
			[
				'label' 	=> __( 'Table Style Color', 'progrisaas' ),
				'type'  	=> Controls_Manager::SELECT,
				'default' 	=> '--second-color',
				'options' 	=> [
					'--main-color' 	 => __( 'Main Color', 'progrisaas' ),
					'--second-color' => __( 'Second Color', 'progrisaas' ),
					'--third-color'  => __( 'Third Color', 'progrisaas' ),
					'--dark-color' 	 => __( 'Dark Color', 'progrisaas' ),
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Digital', 'progrisaas' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label' => __( 'Title HTML Tag', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h5',
				'condition'	=> [
					'title!'	=> ''
				]
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'The easy, safe way to manage online spending at work', 'progrisaas' ),
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '$15', 'progrisaas' ),
			]
		);

		$this->add_control(
			'pperiod',
			[
				'label' => __( 'Period', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '/m', 'progrisaas' ),
			]
		);

		$this->add_control(
			'ex_price',
			[
				'label' => __( 'Price Extra', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '$159/year', 'progrisaas' ),
			]
		);

		$this->add_control(
			'pfeatures_list',
			[
				'label' => 'Features',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<ul><li>Easy to use app</li><li>Widget generator</li></ul>', 'progrisaas' ),
			]
		);

		$this->start_controls_tabs( 'tabs_button' );

		$this->start_controls_tab(
			'tab_button_trial',
			[
				'label' => __( 'Button 1', 'progrisaas' ),
			]
		);
		$this->add_control(
			'label_link_trial',
			[
				'label' => 'Label',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Start a Free 30-day Trial', 'progrisaas' ),
			]
		);

		$this->add_control(
			'link_trial',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default'	=> [
					'url'	=> '#'
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_detail',
			[
				'label' => __( 'Button 2', 'progrisaas' ),
			]
		);
		$this->add_control(
			'label_link_detail',
			[
				'label' => 'Label',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Learn More', 'progrisaas' ),
			]
		);
		$this->add_control(
			'link_detail',
			[
				'label' => __( 'Link', 'progrisaas' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'progrisaas' ),
				'default'	=> [
					'url'	=> '#'
				]
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_table_section',
			[
				'label' => __( 'Table Box', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table.--horizontal' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'condition'	=>[
					'title!'	=> ''
				]
			]
		);
		$this->add_responsive_control(
			'title_space',
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
					'{{WRAPPER}} .ot-pricing-table__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'	=>[
					'title!'	=> ''
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
					'{{WRAPPER}} .ot-pricing-table__title' => 'color: {{VALUE}};',
				],
				'condition'	=>[
					'title!'	=> ''
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__title',
				'condition'	=>[
					'title!'	=> ''
				],
			]
		);

		//Desc
		$this->add_control(
			'heading_desc',
			[
				'label' => __( 'Description', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'condition'	=>[
					'sub_heading!'	=> ''
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'desc_space',
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
					'{{WRAPPER}} .ot-pricing-table__subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'	=>[
					'sub_heading!'	=> ''
				]
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__subtitle' => 'color: {{VALUE}};',
				],
				'condition'	=>[
					'sub_heading!'	=> ''
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__subtitle',
				'condition'	=>[
					'sub_heading!'	=> ''
				],
			]
		);	

		//Price
		$this->add_control(
			'heading_price',
			[
				'label' => __( 'Price', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'price_space',
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
					'{{WRAPPER}} .ot-pricing-table__price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__price' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__price-main',
				'separator' => 'after',
			]
		);

		//Under Price
		$this->add_control(
			'heading_pperiod',
			[
				'label' => __( 'Under Price', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'pperiod_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__period' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pperiod_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__period',
			]
		);

		//Features
		$this->add_control(
			'heading_des',
			[
				'label' => __( 'Features', 'progrisaas' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'features_color',
			[
				'label' => __( 'Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__features-list' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'features_icon_color',
			[
				'label' => __( 'Icon Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ot-pricing-table__features-list ul li:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-pricing-table__features-list ol li:before' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'selector' => '{{WRAPPER}} .ot-pricing-table__features-list',
			]
		);

		$this->end_controls_section();

		//Button
		$this->start_controls_section(
			'btn_style_section',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .octf-btn, {{WRAPPER}} .octf-price-link-detail',
			]
		);
        
		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_style_trial',
			[
				'label' => __( 'Button 1', 'progrisaas' ),
			]
		);

		$this->add_control(
			'btn_trial_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_bg',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_border',
			[
				'label' => __( 'Border Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_trial_text_hcolor',
			[
				'label' => __( 'Text Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_hbg',
			[
				'label' => __( 'Background Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_trial_hborder',
			[
				'label' => __( 'Border Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-btn.--price-link-trial:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_style_detail',
			[
				'label' => __( 'Button 2', 'progrisaas' ),
			]
		);

		$this->add_control(
			'btn_detail_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .octf-price-link-detail' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_detail_hcolor',
			[
				'label' => __( 'Text Hover', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .octf-price-link-detail:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$heading_tag = $settings['heading_tag'];
		$this->add_render_attribute( 'title', 'class', 'ot-pricing-table__title' );
		$this->add_render_attribute( 'sub_heading', 'class', 'ot-pricing-table__subtitle' );
		if ( ! empty( $settings['link_trial']['url'] ) ) {
			$this->add_render_attribute( 'button_trial', 'href', $settings['link_trial']['url'] );

			if ( $settings['link_trial']['is_external'] ) {
				$this->add_render_attribute( 'button_trial', 'target', '_blank' );
			}

			if ( $settings['link_trial']['nofollow'] ) {
				$this->add_render_attribute( 'button_trial', 'rel', 'nofollow' );
			}
		}
		if ( $settings['table_style'] == '--main-color' ) {
			$this->add_render_attribute( 'button_trial', 'class', 'octf-btn --price-link-trial' );
		}elseif ( $settings['table_style'] == '--second-color' ) {
			$this->add_render_attribute( 'button_trial', 'class', 'octf-btn octf-btn-second --price-link-trial' );
		}elseif ( $settings['table_style'] == '--third-color' ) {
			$this->add_render_attribute( 'button_trial', 'class', 'octf-btn octf-btn-third --price-link-trial' );
		}elseif ( $settings['table_style'] == '--dark-color' ) {
			$this->add_render_attribute( 'button_trial', 'class', 'octf-btn octf-btn-dark --price-link-trial' );
		}else{
			$this->add_render_attribute( 'button_trial', 'class', 'octf-btn --price-link-trial' );
		}

		if ( ! empty( $settings['link_detail']['url'] ) ) {
			$this->add_render_attribute( 'button_detail', 'href', $settings['link_detail']['url'] );

			if ( $settings['link_detail']['is_external'] ) {
				$this->add_render_attribute( 'button_detail', 'target', '_blank' );
			}

			if ( $settings['link_detail']['nofollow'] ) {
				$this->add_render_attribute( 'button_detail', 'rel', 'nofollow' );
			}
		}
		$this->add_render_attribute( 'button_detail', 'class', 'octf-price-link-detail' );

		?>

		<div class="ot-pricing-table --horizontal <?php echo esc_attr( $settings['table_style'] ); ?>">
			<div class="ot-pricing-table__part-left">
				<div class="ot-pricing-table__header">
					<?php if ( ! empty( $settings['title'] ) ) : ?>
						<<?php echo $heading_tag . ' ' . $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title'] . '</' . $heading_tag; ?>>
					<?php endif; ?>
					<?php if ( ! empty( $settings['sub_heading'] ) ) : ?><span <?php echo $this->get_render_attribute_string( 'sub_heading' ); ?>><?php echo $settings['sub_heading']; ?></span>
					<?php endif; ?>
					<div class="ot-pricing-table__features-list">
						<?php echo $settings['pfeatures_list']; ?>
					</div>
				</div>
			</div>
			<div class="ot-pricing-table__part-right">
				<div class="ot-pricing-table__price">
					<div class="ot-pricing-table__price-main">
						<?php echo $settings['price']; ?>
						<span class="ot-pricing-table__period"><?php echo esc_html( $settings['pperiod'] ); ?></span>
					</div>
					<?php if($settings['ex_price']){ ?><span class="ot-pricing-table__price-extra"><?php echo esc_html( $settings['ex_price'] ); ?></span><?php } ?>
				</div>
				<div class="ot-pricing-table__footer">
					<?php if( !empty($settings['label_link_trial']) ){ ?><a <?php echo $this->get_render_attribute_string( 'button_trial' ); ?>><?php echo esc_html( $settings['label_link_trial'] ); ?></a><?php } ?>
					<?php if( !empty($settings['label_link_detail']) ){ ?><a <?php echo $this->get_render_attribute_string( 'button_detail' ); ?>><?php echo esc_html( $settings['label_link_detail'] ); ?></a><?php } ?>
				</div>
			</div>
			
			
		</div>

	    <?php
	}

	protected function content_template() {}
}
// After the ProgriSaaS_Pricing_Table_Horizontal class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new ProgriSaaS_Pricing_Table_Horizontal() );