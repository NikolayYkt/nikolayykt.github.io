<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Sign Up
 */
class Progrisaas_Sign_Up extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'isignup';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'OT Sign Up', 'progrisaas' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-lock-user';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_progrisaas' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_fields_content',
			[
				'label' => __( 'Form Option', 'progrisaas' ),
			]
		);

		$this->add_control(
			'show_labels',
			[
				'label' => __( 'Label', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_off' => __( 'Hide', 'progrisaas' ),
				'label_on' => __( 'Show', 'progrisaas' ),
			]
		);

		$this->add_control(
			'policy_and_term',
			[
				'label' => __( 'Policy and Terms?', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_off' => __( 'Hide', 'progrisaas' ),
				'label_on' => __( 'Show', 'progrisaas' ),
			]
		);

		$this->add_control(
			'custom_labels',
			[
				'label' => __( 'Custom Label', 'progrisaas' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'user_label',
			[
				'label' => __( 'Username Label', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Username: ', 'progrisaas' ),
				'condition' => [
					'show_labels' => 'yes',
					'custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'user_placeholder',
			[
				'label' => __( 'Username *', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Username *', 'progrisaas' ),
				'condition' => [
					'custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'email_label',
			[
				'label' => __( 'Email Label', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Email: ', 'progrisaas' ),
				'condition' => [
					'show_labels' => 'yes',
					'custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'email_placeholder',
			[
				'label' => __( 'Your Email *', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Your Email *', 'progrisaas' ),
				'condition' => [
					'custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'password_label',
			[
				'label' => __( 'Password Label', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Password: ', 'progrisaas' ),
				'condition' => [
					'show_labels' => 'yes',
					'custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'password_placeholder',
			[
				'label' => __( 'Password *', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Password *', 'progrisaas' ),
				'condition' => [
					'custom_labels' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_content',
			[
				'label' => __( 'Button', 'progrisaas' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Text', 'progrisaas' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Sign Up', 'progrisaas' ),
			]
		);

		$this->add_control(
			'btn_style',
			[
				'label' => __( 'Style Color', 'progrisaas' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'main',
				'options' => self::get_button_color(),
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Form', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'row_gap',
			[
				'label' => __( 'Rows Gap', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-field-group' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ot-form-fields-wrapper' => 'margin-bottom: -{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_labels',
			[
				'label' => __( 'Label', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_labels!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'label_spacing',
			[
				'label' => __( 'Spacing', 'progrisaas' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ot-form-fields-wrapper label' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					// for the label position = above option
				],
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-form-fields-wrapper label' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .ot-form-fields-wrapper label',
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_field_style',
			[
				'label' => __( 'Fields', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'field_text_color',
			[
				'label' => __( 'Text Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-field-group .ot-field-textual' => 'color: {{VALUE}};',
					'{{WRAPPER}} .ot-field-group input:-webkit-autofill' => '-webkit-text-fill-color: {{VALUE}}!important;',
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'field_typography',
				'selector' => '{{WRAPPER}} .ot-field-group .ot-field-textual',
			]
		);

		$this->add_control(
			'field_background_color',
			[
				'label' => __( 'Background Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .ot-field-group .ot-field-textual' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .ot-field-group input:-webkit-autofill' => '-webkit-box-shadow: 0 0 0 1000px {{VALUE}} inset !important;',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'field_border_color',
			[
				'label' => __( 'Border Color', 'progrisaas' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ot-field-group .ot-field-textual' => 'border-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'field_border_width',
			[
				'label' => __( 'Border Width', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .ot-field-group .ot-field-textual' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'field_border_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ot-field-group .ot-field-textual' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'progrisaas' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => 'Padding',
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_radius',
			[
				'label' => __( 'Border Radius', 'progrisaas' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .octf-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .octf-btn',
			]
		);
        
		//Hover
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

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'	=> 'btn_bg',
				'label' => __( 'Background', 'progrisaas' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .octf-btn',
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

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'	=> 'button_background_hover_color',
				'label' => __( 'Background', 'progrisaas' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .octf-btn:hover, {{WRAPPER}} .octf-btn:focus',
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}
	private function get_button_color() {
		return [
			'main' 	 => __( 'Main Color', 'progrisaas' ),
			'second' => __( 'Second Color', 'progrisaas' ),
			'dark' 	 => __( 'Dark Color', 'progrisaas' ),
			'light'  => __( 'Light Color', 'progrisaas' ),
		];
	}

	private function form_fields_render_attributes() {
		$settings = $this->get_settings();

		$this->add_render_attribute( 'button', 'class', 'octf-btn' );
		$this->add_render_attribute( 'button', 'class', 'octf-btn-'.$settings['btn_style'] );
		

		$this->add_render_attribute(
			[
				'wrapper' => [
					'class' => [
						'ot-form-fields-wrapper',
					],
				],
				'field-group' => [
					'class' => [
						'ot-field-type-text',
						'ot-field-group',
						'ot-column',
						'ot-col-100',
					],
				],
				'submit-group' => [
					'class' => [
						'ot-field-group',
						'ot-column',
						'ot-field-type-submit',
						'ot-col-100',
					],
				],

				'button' => [
					'name' => 'wp-submit',
				],
				'user_label' => [
					'for' => 'ot-user-login',
				],
				'user_input' => [
					'type' => 'text',
					'name' => 'user_login',
					'id' => 'ot-user-login',
					'placeholder' => $settings['user_placeholder'],
					'class' => [
						'ot-field-textual',
					],
				],
				'email_label' => [
					'for' => 'ot-user-email',
				],
				'email_input' => [
					'type' => 'text',
					'name' => 'user_email',
					'id' => 'ot-user-email',
					'placeholder' => $settings['email_placeholder'],
					'class' => [
						'ot-field-textual',
					],
				],
				'password_label' => [
					'for' => 'ot-user-pwd',
				],
				'password_input' => [
					'type' => 'password',
					'name' => 'user_pwd',
					'id' => 'ot-user-pwd',
					'placeholder' => $settings['password_placeholder'],
					'class' => [
						'ot-field-textual',
					],
				],
			]
		);

		$this->add_render_attribute( 'field-group', 'class', 'ot-field-required' )
			 ->add_render_attribute( 'input', 'required', true )
			 ->add_render_attribute( 'input', 'aria-required', 'true' );

	}

	protected function render() {
		$settings = $this->get_settings();
		$current_url = remove_query_arg( 'fake_arg' );

		$this->form_fields_render_attributes();
		?>
		<form class="ot-sign-up ot-form" method="post" action="<?php echo wp_registration_url(); ?>">
			<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
				<div <?php echo $this->get_render_attribute_string( 'field-group' ); ?>>
					<?php
					if ( $settings['show_labels'] ) {
						echo '<label ' . $this->get_render_attribute_string( 'user_label' ) . '>' . $settings['user_label'] . '</label>';
					}

					echo '<input size="30" ' . $this->get_render_attribute_string( 'user_input' ) . '>';

					?>
				</div>
				<div <?php echo $this->get_render_attribute_string( 'field-group' ); ?>>
					<?php
					if ( $settings['show_labels'] ) {
						echo '<label ' . $this->get_render_attribute_string( 'email_label' ) . '>' . $settings['email_label'] . '</label>';
					}

					echo '<input size="30" ' . $this->get_render_attribute_string( 'email_input' ) . '>';

					?>
				</div>
				<div <?php echo $this->get_render_attribute_string( 'field-group' ); ?>>
					<?php
					if ( $settings['show_labels'] ) :
						echo '<label ' . $this->get_render_attribute_string( 'password_label' ) . '>' . $settings['password_label'] . '</label>';
					endif;

					echo '<input size="30" ' . $this->get_render_attribute_string( 'password_input' ) . '>';
					?>
				</div>
				<?php if ( 'yes' === $settings['policy_and_term'] ) : ?>
					<div class="ot-field-type-checkbox ot-field-group ot-column ot-col-100 ot-policy-term">
						<label for="ot-user-policy-term">
							<input type="checkbox" id="ot-user-policy-term" name="user_policy" value="">
							<span><?php echo __( 'By signing and clicking Sing Up, you affirm you have read and agree to the Privacy Policy and Terms of Use and want to receive news.', 'progrisaas' ); ?></span>
						</label>
					</div>
				<?php endif; ?>
				<div <?php echo $this->get_render_attribute_string( 'submit-group' ); ?>>
					<button type="submit" <?php echo $this->get_render_attribute_string( 'button' ); ?>>
							<?php if ( ! empty( $settings['button_text'] ) ) : ?>
								<?php echo $settings['button_text']; ?>
							<?php endif; ?>
					</button>
				</div>
			</div>
		</form>
		<?php
	}

	protected function content_template() {}
}
// After the Progrisaas_Sign_Up class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Progrisaas_Sign_Up() );