<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_contact_form extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-contact-form';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		// Html template
		$this->default_html_template = '<html>
			<body>
				<table>
					<tbody>
						<tr>
							<td>Name</td>
							<td>{{Name}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{Email}}</td>
						</tr>
					</tbody>
				</table>
			</body>
		</html>';

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Contact Form', 'amz-configurator-core' ),
				'description' => esc_html__('Display a contact form', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// Appearance
					'Appearance' => array(
						array(
							'label'       => esc_html__('Form Style', 'amz-configurator-core'),
							'description' => esc_html__('Choose the form style', 'amz-configurator-core'),
							'name'        => 'style',
							'type'        => 'radio_image',
							'value'       => 'style-1',
							'options'     => array(
								'simple'      => CONFIGURATOR_CORE_PLUGIN_URL .'/assets/img/cf-simple.png',
								'round'       => CONFIGURATOR_CORE_PLUGIN_URL .'/assets/img/cf-round.png',
								'line'        => CONFIGURATOR_CORE_PLUGIN_URL .'/assets/img/cf-line.png',
								'modern-line' => CONFIGURATOR_CORE_PLUGIN_URL .'/assets/img/cf-modern-line.png'
							)
						)
						
					),

					// Form Fields
					'Form Fields' => array(
						array(
							'type'			=> 'group',
							'label'			=> esc_html__( 'Form Fields', 'amz-configurator-core' ),
							'name'			=> 'form_fields',
							'description'	=> esc_html__( 'Repeat this fields with each item created, Each item corresponding form fields.', 'amz-configurator-core' ),
							'options'		=> array(
								'add_text' => esc_html__( 'Add Field', 'amz-configurator-core' )
							),
							'value' => base64_encode( json_encode( array(
								'1' => array(
									'type'        => 'text',
									'name'        => 'Name',
									'label'       => 'Name',
									'placeholder' => 'Name',
									'required'    => 'yes'
								),
								'2' => array(
									'type'        => 'email',
									'name'        => 'Email',
									'label'       => 'Email',
									'placeholder' => 'Email',
									'required'    => 'yes'
								),
								'3' => array(
									'type'     => 'submit',
									'btn_text' => 'Submit'
								)
							))),
							'params' => array(
								array(
									'label'       => esc_html__( 'Input Type', 'amz-configurator-core'),
									'admin_label' => true,
									'description' => esc_html__( 'Choose the Input type', 'amz-configurator-core' ),
									'name'        => 'type',
									'type'        => 'select',
									'value'       => 'text',
									'options' => array(
										'text'     => esc_attr__( 'Text', 'amz-configurator-core' ),
										'email'    => esc_attr__( 'Email', 'amz-configurator-core' ),
										'number'   => esc_attr__( 'Number', 'amz-configurator-core' ),
										'textarea' => esc_attr__( 'Text Area', 'amz-configurator-core' ),
										'select'   => esc_attr__( 'Select', 'amz-configurator-core' ),
										'radio'    => esc_attr__( 'Radio', 'amz-configurator-core' ),
										'checkbox' => esc_attr__( 'Checkbox', 'amz-configurator-core' ),
										'submit'   => esc_attr__( 'Submit', 'amz-configurator-core' )
									)
								),

								array(
									'label'       => esc_html__('Field Name', 'amz-configurator-core'),
									'description' => esc_html__('Please type the unique name. It helps to denote via email', 'amz-configurator-core'),
									'name'        => 'name',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'hide_when' => array( 'submit' )
									)
								),

								array(
									'label'       => esc_html__('Label', 'amz-configurator-core'),
									'description' => esc_html__('Please type the label.', 'amz-configurator-core'),
									'name'        => 'label',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'hide_when' => array( 'submit', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__('Placeholder', 'amz-configurator-core'),
									'description' => esc_html__('Please type the placeholder', 'amz-configurator-core'),
									'name'        => 'placeholder',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'hide_when' => array( 'submit', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__('Input Width', 'amz-configurator-core'),
									'description' => esc_html__('Select the input width', 'amz-configurator-core'),
									'name'        => 'width',
									'type'        => 'select',
									'value'       => 'col4',
									'options'     => array(
										'col1'  => '1 Column',
										'col2'  => '2 Column',
										'col3'  => '3 Column',
										'col4'  => '4 Column',
										'col5'  => '5 Column',
										'col6'  => '6 Column',
										'col7'  => '7 Column',
										'col8'  => '8 Column',
										'col9'  => '9 Column',
										'col10'  => '10 Column',
										'col11'  => '11 Column',
										'col12'  => '12 Column'
									)
								),

								array(
									'label'       => esc_html__( 'Line Wrapping', 'amz-configurator-core'),
									'description' => esc_html__( 'Move the field to next line', 'amz-configurator-core' ),
									'name'        => 'clear',
									'type'        => 'select',
									'value'       => 'no',
									'options' => array(
										'yes' => esc_attr__( 'Yes', 'amz-configurator-core' ),
										'no'  => esc_attr__( 'No', 'amz-configurator-core' )
									)
								),

								array(
									'label'       => esc_html__( 'Alphanumeric', 'amz-configurator-core'),
									'description' => esc_html__( 'Allow only alpha numeric characters', 'amz-configurator-core' ),
									'name'        => 'alphanumeric',
									'type'        => 'select',
									'value'       => 'no',
									'options' => array(
										'yes' => esc_attr__( 'Yes', 'amz-configurator-core' ),
										'no'  => esc_attr__( 'No', 'amz-configurator-core' )
									),
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'text', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__( 'Required', 'amz-configurator-core'),
									'description' => esc_html__( 'Is this required field?', 'amz-configurator-core' ),
									'name'        => 'required',
									'type'        => 'select',
									'value'       => 'no',
									'options' => array(
										'yes' => esc_attr__( 'Yes', 'amz-configurator-core' ),
										'no'  => esc_attr__( 'No', 'amz-configurator-core' )
									),
									'relation' => array(
										'parent'    => 'form_fields-type',
										'hide_when' => array( 'submit', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__('Option Set', 'amz-configurator-core'),
									'description' => esc_html__('Type the values separated with | symbol> Eg: value1|value2', 'amz-configurator-core'),
									'name'        => 'options',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'radio', 'checkbox', 'select' )
									)
								),

								array(
									'label'       => esc_html__('Minimum Character Length', 'amz-configurator-core'),
									'description' => esc_html__('Type the numeric value. ', 'amz-configurator-core'),
									'name'        => 'min',
									'type'        => 'text',
									'value'       => '1',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'text', 'number', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__('Maximum Character Length', 'amz-configurator-core'),
									'description' => esc_html__('Type the numeric value. ', 'amz-configurator-core'),
									'name'        => 'max',
									'type'        => 'text',
									'value'       => '10',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'text', 'number', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__('Minimum Checkbox Quantity', 'amz-configurator-core'),
									'description' => esc_html__('Type the numeric value. ', 'amz-configurator-core'),
									'name'        => 'min_quantity',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'checkbox' )
									)
								),

								array(
									'label'       => esc_html__('Help Text', 'amz-configurator-core'),
									'description' => esc_html__('Enter the help text', 'amz-configurator-core'),
									'name'        => 'help',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'checkbox' )
									)
								),

								array(
									'label'       => esc_html__('Maximum Checkbox Quantity', 'amz-configurator-core'),
									'description' => esc_html__('Type the numeric value. ', 'amz-configurator-core'),
									'name'        => 'max_quantity',
									'type'        => 'text',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'checkbox' )
									)
								),

								array(
									'label'       => esc_html__('Icon', 'amz-configurator-core'),
									'description' => esc_html__('Choose icon if you want, it place inside the field', 'amz-configurator-core'),
									'name'        => 'icon',
									'type'        => 'icon_picker',
									'value'       => '',
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'text', 'number', 'url', 'email', 'textarea' )
									)
								),

								array(
									'label'       => esc_html__('Submit Button Text', 'amz-configurator-core'),
									'description' => esc_html__('Please type the submit button text', 'amz-configurator-core'),
									'name'        => 'btn_text',
									'type'        => 'text',
									'value'       => esc_html__('Submit', 'amz-configurator-core'),
									'relation' => array(
										'parent'    => 'form_fields-type',
										'show_when' => array( 'submit' )
									)
								)
							)
						)
						
					),

					// Styling
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options' => array(
								
								array(
									"screens" => "any",
									'Label' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => 'label'),
										array('property' => 'background', 'label' => 'Background Color', 'selector' => 'label'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'label'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'label'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'label'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => 'label'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'label'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => 'label'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => 'label'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => 'label'),
									),
									'Input' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.textfield'),
										array('property' => 'background', 'label' => 'Background Color', 'selector' => '.textfield'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.textfield'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.textfield'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.textfield'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.textfield'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.textfield'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.textfield'),
										array('property' => 'width', 'selector' => '.textfield'),
										array('property' => 'height', 'selector' => '.textfield'),
										array('property' => 'border', 'selector' => '.textfield'),
										array('property' => 'border-radius', 'selector' => '.textfield'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.textfield'),
										array('property' => 'padding', 'selector' => '.textfield'),
									),
									'Text Area' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.textarea'),
										array('property' => 'background', 'label' => 'Background Color', 'selector' => '.textarea'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.textarea'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.textarea'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.textarea'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.textarea'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.textarea'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.textarea'),
										array('property' => 'width', 'selector' => '.textarea'),
										array('property' => 'height', 'selector' => '.textarea'),
										array('property' => 'border', 'selector' => '.textarea'),
										array('property' => 'border-radius', 'selector' => '.textarea'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.textarea'),
										array('property' => 'padding', 'selector' => '.textarea'),
									),									
									'Select' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => 'select'),
										array('property' => 'background', 'label' => 'Background Color', 'selector' => 'select'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'select'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'select'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'select'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => 'select'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => 'select'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => 'select'),
										array('property' => 'width', 'selector' => 'select'),
										array('property' => 'height', 'selector' => 'select'),
										array('property' => 'border', 'selector' => 'select'),
										array('property' => 'border-radius', 'selector' => 'select'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => 'select'),
										array('property' => 'padding', 'selector' => 'select'),
									),
									'Radio' => array(
										array('property' => 'color', 'selector' => '.radio'),
										array('property' => 'background-color', 'selector' => '.radio'),
										array('property' => 'display', 'selector' => '.radio'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.radio'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.radio'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.radio'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.radio'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.radio'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.radio'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.radio'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.radio'),
									),
									'Checkbox' => array(
										array('property' => 'color', 'selector' => '.checkbox'),
										array('property' => 'background-color', 'selector' => '.checkbox'),
										array('property' => 'display', 'selector' => '.checkbox'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.checkbox'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.checkbox'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.checkbox'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.checkbox'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.checkbox'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.checkbox'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.checkbox'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.checkbox'),
									),
									
									'Submit' => array(
										array('property' => 'color', 'selector' => '.submit'),
										array('property' => 'background', 'selector' => '.submit'),
										array('property' => 'display', 'selector' => '.submit'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.submit'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.submit'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.submit'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.submit'),
										array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '.submit'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.submit'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.submit'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.submit'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.submit'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.submit'),
									)
								)
								
							)
						)
					),
					
					// Button Style
					'Button Style' => array(

						array(
							'label'       => esc_html__( 'Button Style', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'btn_style',
							'type'        => 'select',
							'value'       => 'btn-solid',
							'options' => array(
								'btn-solid'   => esc_attr__( 'Solid', 'amz-configurator-core' ),
								'btn-outline' => esc_attr__( 'Outline', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Text Style', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the button text style', 'amz-configurator-core' ),
							'name'        => 'btn_text_style',
							'type'        => 'select',
							'value'       => 'btn-uppercase',
							'options' => array(
								'btn-uppercase'  => esc_attr__( 'Uppercase', 'amz-configurator-core' ),
								'btn-lowercase'  => esc_attr__( 'Lowercase', 'amz-configurator-core' ),
								'btn-capitalize' => esc_attr__( 'Capitalize', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Size', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the button size', 'amz-configurator-core' ),
							'name'        => 'btn_size',
							'type'        => 'select',
							'value'       => 'btn-md',
							'options' => array(
								'btn-sm' => esc_attr__( 'Small', 'amz-configurator-core' ),
								'btn-md' => esc_attr__( 'Medium', 'amz-configurator-core' ),
								'btn-lg' => esc_attr__( 'Large', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Type', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'btn_type',
							'type'        => 'select',
							'value'       => 'btn-oval',
							'options' => array(
								'btn-oval'      => esc_attr__( 'Oval', 'amz-configurator-core' ),
								'btn-rectangle' => esc_attr__( 'Rectangle', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Color', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'btn_color',
							'type'        => 'select',
							'value'       => 'btn-primary',
							'options' => array(
								'btn-gradient' => esc_attr__( 'Gradient', 'amz-configurator-core' ),
								'btn-primary'  => esc_attr__( 'Primary', 'amz-configurator-core' ),
								'btn-black'    => esc_attr__( 'Black', 'amz-configurator-core' ),
								'btn-white'    => esc_attr__( 'White', 'amz-configurator-core' ),
								'btn-custom'   => esc_attr__( 'Custom', 'amz-configurator-core' )
							)
						)
					),

					// Notices
					'Notices' => array(						

						array(
							'label'       => esc_html__('Success Mesage', 'amz-configurator-core'),
							'description' => esc_html__('Enter the success message', 'amz-configurator-core'),
							'name'        => '_n_success',
							'type'        => 'text',
							'value'       => esc_html__('Your message was successfully sent', 'amz-configurator-core')
						),

						array(
							'label'       => esc_html__('Mail Disabled Message', 'amz-configurator-core'),
							'description' => esc_html__('Enter the mail disabled notice', 'amz-configurator-core'),
							'name'        => '_n_mail_disabled',
							'type'        => 'text',
							'value'       => esc_html__( 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__('Required Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the required notice', 'amz-configurator-core'),
							'name'        => '_n_required',
							'type'        => 'text',
							'value'       => esc_html__( 'You cannot leave this field as empty', 'amz-configurator-core')
						),

						array(
							'label'       => esc_html__('Email Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the email notice', 'amz-configurator-core'),
							'name'        => '_n_email_error',
							'type'        => 'text',
							'value'       => esc_html__( 'You have not given a correct e-mail address', 'amz-configurator-core')
						),

						array(
							'label'       => esc_html__('URL Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the URL notice', 'amz-configurator-core'),
							'name'        => '_n_url',
							'type'        => 'text',
							'value'       => esc_html__( 'The input value is not a correct URL', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__('Number Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the number notice', 'amz-configurator-core'),
							'name'        => '_n_number',
							'type'        => 'text',
							'value'       => esc_html__( 'The input value was not a correct number', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__('Character Length Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the character length notice', 'amz-configurator-core'),
							'name'        => '_n_length',
							'type'        => 'text',
							'value'       => esc_html__( 'Please follow the character range', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__('Alphanumeric Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the alphanumeric notice', 'amz-configurator-core'),
							'name'        => '_n_alphanumeric',
							'type'        => 'text',
							'value'       => esc_html__( 'The input value can only contain alphanumeric characters', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__('Checkbox Quantity Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the alphanumeric notice', 'amz-configurator-core'),
							'name'        => '_n_quantity',
							'type'        => 'text',
							'value'       => esc_html__( 'Please choose between in this range of items', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__('reCaptcha Error Notice', 'amz-configurator-core'),
							'description' => esc_html__('Enter the recaptcha notice', 'amz-configurator-core'),
							'name'        => '_n_recaptcha',
							'type'        => 'text',
							'value'       => esc_html__( 'You are a robot', 'amz-configurator-core' )
						)
						
					),

					// Form Settings
					'Form Settings' => array(

						array(
							'label'       => esc_html__( 'Send To', 'amz-configurator-core'),
							'admin_label' => true,
							'description' => esc_html__( 'Please pick the email address', 'amz-configurator-core' ),
							'name'        => 'send_to',
							'type'        => 'select',
							'value'       => 'admin_email',
							'options' => array(
								'admin_email'     => esc_attr__( 'Admin Email', 'amz-configurator-core' ),
								'different_email' => esc_attr__( 'Different Email', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__('Email Address', 'amz-configurator-core'),
							'description' => esc_html__('Enter the email address', 'amz-configurator-core'),
							'name'        => 'email_address',
							'type'        => 'text',
							'value'       => '',
							'relation' => array(
								'parent'    => 'send_to',
								'show_when' => array( 'different_email' )
							)
						),

						array(
							'label'       => esc_html__( 'Enable reCaptcha', 'amz-configurator-core'),
							'admin_label' => true,
							'description' => esc_html__( 'Do you want to enable reptcha?', 'amz-configurator-core' ),
							'name'        => 'recaptcha',
							'type'        => 'select',
							'value'       => 'no',
							'options' => array(
								'yes' => esc_attr__( 'Yes', 'amz-configurator-core' ),
								'no'  => esc_attr__( 'No', 'amz-configurator-core' )
							)
						)
						
					),

					// Email Settings
					'Email Settings' => array(
						array(
							'label'       => esc_html__('Subject', 'amz-configurator-core'),
							'description' => esc_html__('Enter the subject', 'amz-configurator-core'),
							'name'        => 'subject',
							'type'        => 'text',
							'value'       => ''
						),						

						array(
							'label'       => esc_html__( 'Email Template', 'amz-configurator-core'),
							'admin_label' => true,
							'description' => esc_html__( 'Please choose the email template', 'amz-configurator-core' ),
							'name'        => 'email_template',
							'type'        => 'select',
							'value'       => 'text',
							'options' => array(
								'text' => esc_attr__( 'Text', 'amz-configurator-core' ),
								'html' => esc_attr__( 'Html', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__('Html Template', 'amz-configurator-core'),
							'description' => esc_html__('Type the email template, For replacing form element use label like this {{Name}}, It prints the user value', 'amz-configurator-core'),
							'name'        => 'html_template',
							'type'        => 'textarea',
							'value'       => $this->default_html_template,
							'relation' => array(
								'parent'    => 'email_template',
								'show_when' => array( 'html' )
							)
						)
					)
					
				)
			)
		);
		$this->map( $args );

	}

	public function output( $atts = array(), $content, $shortcode ) {

		$content = str_replace( array('&#8221;', '&#8243;' ), array( '"', '"' ), $content );
		$content = apply_filters( 'kc_shortcode_content', $content, $shortcode );

		if( isset( $atts['content'] ) && isset( $content ) && !empty( $content ) )
			$atts['content'] = $content;

		$atts = apply_filters( 'kc_shortcode_attributes', $atts, $shortcode );

		extract( shortcode_atts( array(
			// Appearance
			'style'            => 'simple', // simple, round, line, modern-line
			// Form Fields
			'form_fields'      => '',
			// Styling
			'css_custom'       => '',
			// Button Style
			'btn_style'        => 'btn-solid', // btn-solid, btn-outline
			'btn_text_style'   => 'btn-uppercase', // btn-uppercase, btn-lowercase, btn-capitalize
			'btn_size'         => 'btn-md', // btn-sm, btn-md, btn-lg
			'btn_type'         => 'btn-oval', // btn-oval, btn-rectangle
			'btn_color'        => 'btn-primary', // btn-primary, btn-black, btn-white
			// Notices
			'_n_success'       => esc_html__( 'Your message was successfully sent', 'amz-configurator-core'),
			'_n_mail_disabled' => esc_html__( 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.', 'amz-configurator-core' ),
			'_n_required'      => esc_html__( 'You cannot leave this field as empty', 'amz-configurator-core'),
			'_n_email_error'   => esc_html__( 'You have not given a correct e-mail address', 'amz-configurator-core'),
			'_n_url'           => esc_html__( 'The input value is not a correct URL', 'amz-configurator-core' ),
			'_n_number'        => esc_html__( 'The input value was not a correct number', 'amz-configurator-core' ),
			'_n_length'        => esc_html__( 'Please follow the character range', 'amz-configurator-core' ),
			'_n_alphanumeric'  => esc_html__( 'The input value can only contain alphanumeric characters', 'amz-configurator-core' ),
			'_n_quantity'      => esc_html__( 'Please choose between in this range of items', 'amz-configurator-core' ),
			'_n_recaptcha'     => esc_html__( 'You are a robot', 'amz-configurator-core' ),
			// Form Settings
			'send_to'          => 'admin_email', //admin_email, different_email
			'email_address'    => '',
			'recaptcha'        => 'no', // yes, no
			// Email Settings
			'subject'          => '',
			'email_template'   => 'text', // text, html
			'html_template'    => $this->default_html_template
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		// Empty assignment
		$template_html = $field_html = $field_uid = $validation_range = $quantity_range = $recaptcha_html = '';
		$notice = $values = array();

		// For passing those values to retrieve in mail ajax function
		$values['email']            = ( 'admin_email' == $send_to ) ? get_option( 'admin_email' ) : $email_address;
		$values['subject']          = !empty( $subject ) ? $subject : '';
		$values['success_notice']   = !empty( $_n_success ) ? $_n_success : esc_html__( 'Your message was successfully sent', 'amz-configurator-core');
		$values['mail_disabled']    = !empty( $_n_mail_disabled ) ? $_n_mail_disabled : esc_html__( 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.', 'amz-configurator-core' );
		$values['recaptcha_notice'] = !empty( $_n_recaptcha ) ? $_n_recaptcha : esc_html__( 'You are a robot', 'amz-configurator-core' );
		$values['email_template']   = $email_template;
		$values['recaptcha']        = $recaptcha;

		// Html tags
		$wrap_start     = '<div class="'. esc_attr( 'form-'.$style ) .'">';
		$wrap_end       = '</div>';

		foreach ( $form_fields as $key => $field ) {

			// Empty assignment
			$attr = $notice = $error_message = array();

			// Field values
			$type         = isset( $field->type ) && !empty( $field->type ) ? $field->type : 'text';
			$label        = isset( $field->label ) && !empty( $field->label ) ? $field->label : '';
			$required     = isset( $field->required ) && !empty( $field->required ) ? $field->required : 'no';
			$alphanumeric = isset( $field->alphanumeric ) && !empty( $field->alphanumeric ) ? $field->alphanumeric : 'no';
			$placeholder  = isset( $field->placeholder ) && !empty( $field->placeholder ) ? $field->placeholder : '';
			$width        = isset( $field->width ) && !empty( $field->width ) ? $field->width : 'col4';
			$clear        = isset( $field->clear ) && !empty( $field->clear ) ? $field->clear : 'no';
			$name         = isset( $field->name ) && !empty( $field->name ) ? $field->name : '';
			$icon         = isset( $field->icon ) && !empty( $field->icon ) ? $field->icon : '';
			$min          = isset( $field->min ) && !empty( $field->min ) ? $field->min : '1';
			$max          = isset( $field->max ) && !empty( $field->max ) ? $field->max : '10';
			$min_quantity = isset( $field->min_quantity ) && !empty( $field->min_quantity ) ? $field->min_quantity : 1;
			$max_quantity = isset( $field->max_quantity ) && !empty( $field->max_quantity ) ? $field->max_quantity : '';
			$help         = isset( $field->help ) && !empty( $field->help ) ? $field->help : '';
			$options      = isset( $field->options ) && !empty( $field->options ) ? $field->options : '';
			$btn_text     = isset( $field->btn_text ) && !empty( $field->btn_text ) ? $field->btn_text : esc_html__('Submit', 'amz-configurator-core');

			$clear        = ( 'yes' == $clear ) ? 'clear' : '';
			$optional     = ( 'no' == $required ) ? 'data-validation-optional="true"' : '';
			$required     = ( 'yes' == $required ) ? 'required' : '';
			$alphanumeric = ( 'yes' == $alphanumeric ) ? 'alphanumeric' : '';
			$options      = !empty( $options ) ? explode( '|', $options ) : array();

			// Validation range
			if( !empty( $min ) && !empty( $max ) ) {
				$validation_range = $min.'-'.$max;
			}
			else if( !empty( $min ) ) {
				$validation_range = 'min'.$min;
			}
			else if( !empty( $max ) ) {
				$validation_range = 'max'.$max;
			}

			// Quantity range
			if( !empty( $min_quantity ) && !empty( $max_quantity ) ) {
				$quantity_range = $min_quantity.'-'.$max_quantity;
			}
			else if( !empty( $min_quantity ) ) {
				$quantity_range = 'min'.$min_quantity;
			}
			else if( !empty( $max_quantity ) ) {
				$quantity_range = 'max'.$max_quantity;
			}

			// Error notices array
			$notice['required']     = !empty( $_n_required ) ? 'data-validation-error-msg-required="'. esc_attr( $_n_required ) .'"' : '';
			$notice['email']        = !empty( $_n_email_error ) ? 'data-validation-error-msg-email="'. esc_attr( $_n_email_error ) .'"' : '';
			$notice['url']          = !empty( $_n_url ) ? 'data-validation-error-msg-email="'. esc_attr( $_n_url ) .'"' : '';
			$notice['number']       = !empty( $_n_number ) ? 'data-validation-error-msg-number="'. esc_attr( $_n_number ) .'"' : '';
			$notice['length']       = !empty( $_n_length ) ? 'data-validation-error-msg-length="'. esc_attr( $_n_length .' '. $validation_range ) .'"' : '';
			$notice['alphanumeric'] = !empty( $_n_alphanumeric ) ? 'data-validation-error-msg-alphanumeric="'. esc_attr( $_n_alphanumeric ) .'"' : '';
			$notice['quantity']     = !empty( $_n_quantity ) ? 'data-validation-error-msg-qty="'. esc_attr( $_n_quantity .' '. $quantity_range  ) .'"' : '';

			$icon_html  = !empty( $icon ) ? '<i class="'. esc_attr( $icon ) .'"></i>' : '';
			$icon_class = !empty( $icon ) ? 'with-icon' : '';

			// Generate unique id
			if( 'radio' != $type && 'checkbox' != $type ) {
				$field_uid = configurator_random( 4 ).'-'.configurator_random( 4 );
			}

			// Email Template
			if( 'html' == $email_template ) {
				$template_html = $html_template;
			}


			// Html tags
			$before_field   = '<div class="field-group '. esc_attr( $width .' '. $clear ) .'">';
			$after_field    = '</div>';

			// It wraps the field
			$field_html .= $before_field;

			if( !empty( $label ) ) {
				if( 'radio' != $type && 'checkbox' != $type ) {
					$field_html .= '<label for="'. esc_attr( $field_uid ) .'">'. esc_html( $label ) .'</label>';
				}
				else {
					$field_html .= '<label>'. esc_html( $label ) .'</label>';
				}
			}

			switch ( $type ) {

				case 'text':

					$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
					$attr[] = 'type="text"';
					$attr[] = 'name="'. esc_attr( $name ) .'"';
					$attr[] = 'placeholder="'. esc_attr( $placeholder ) .'"';
					$attr[] = 'class="textfield"';
					$attr[] = 'data-validation="'. esc_attr( $required .' '. $alphanumeric ) .' length"';
					$attr[] = 'data-validation-length="'. esc_attr( $validation_range ) .'"';
					$attr[] = $optional;
					$attr[] = 'data-validation-help="'. esc_attr( $help ) .'"';
					$attr[] = $notice['required'] .' '. $notice['alphanumeric'] .' '. $notice['length'];

					$field_html .= '<div class="input-wrap '. esc_attr( $icon_class ) .'">';
					$field_html .= '<input '. implode( ' ', $attr ) .'>';
					$field_html .= $icon_html;
					$field_html .= '</div>';
					$field_html .= '<span class="error"></span>';
				break;

				case 'email':

					$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
					$attr[] = 'type="text"';
					$attr[] = 'name="'. esc_attr( $name ) .'"';
					$attr[] = 'placeholder="'. esc_attr( $placeholder ) .'"';
					$attr[] = 'class="textfield"';
					$attr[] = 'data-validation="email"';
					$attr[] = $optional;
					$attr[] = 'data-validation-help="'. esc_attr( $help ).'"';
					$attr[] = $notice['required'] .' '. $notice['email'];

					$field_html .= '<div class="input-wrap '. esc_attr( $icon_class ) .'">';
					$field_html .= '<input '. implode( ' ', $attr ) .'>';
					$field_html .= $icon_html;
					$field_html .= '</div>';
					$field_html .= '<span class="error"></span>';
				break;

				case 'number':

					$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
					$attr[] = 'type="text"';
					$attr[] = 'name="'. esc_attr( $name ) .'"';
					$attr[] = 'placeholder="'. esc_attr( $placeholder ) .'"';
					$attr[] = 'class="textfield"';
					$attr[] = 'data-validation="'. esc_attr( $required ) .' number length"';
					$attr[] = 'data-validation-length="'. esc_attr( $validation_range ) .'"';
					$attr[] = $optional;
					$attr[] = 'data-validation-help="'. esc_attr( $help ).'"';
					$attr[] = $notice['required'] .' '. $notice['number'] .' '. $notice['length'];

					$field_html .= '<div class="input-wrap '. esc_attr( $icon_class ) .'">';
					$field_html .= '<input '. implode( ' ', $attr ) .'>';
					$field_html .= $icon_html;
					$field_html .= '</div>';
					$field_html .= '<span class="error"></span>';
				break;

				case 'url':

					$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
					$attr[] = 'type="text"';
					$attr[] = 'name="'. esc_attr( $name ) .'"';
					$attr[] = 'placeholder="'. esc_attr( $placeholder ) .'"';
					$attr[] = 'class="textfield"';
					$attr[] = 'data-validation="'. esc_attr( $required ) .' url"';
					$attr[] = $optional;
					$attr[] = 'data-validation-help="'. esc_attr( $help ).'"';
					$attr[] = $notice['required'] .' '. $notice['url'];

					$field_html .= '<div class="input-wrap '. esc_attr( $icon_class ) .'">';
					$field_html .= '<input '. implode( ' ', $attr ) .'>';
					$field_html .= $icon_html;
					$field_html .= '</div>';
					$field_html .= '<span class="error"></span>';
				break;

				case 'textarea':

					$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
					$attr[] = 'name="'. esc_attr( $name ) .'"';
					$attr[] = 'placeholder="'. esc_attr( $placeholder ) .'"';
					$attr[] = 'class="textarea"';
					$attr[] = 'data-validation="'. esc_attr( $required .' '. $alphanumeric ) .' length"';
					$attr[] = 'data-validation-length="'. esc_attr( $validation_range ) .'"';
					$attr[] = $optional;
					$attr[] = 'data-validation-help="'. esc_attr( $help ).'"';
					$attr[] = $notice['required'] .' '. $notice['alphanumeric'] .' '. $notice['length'];
					
					$field_html .= '<div class="input-wrap '. esc_attr( $icon_class ) .'">';
					$field_html .= '<textarea '. implode( ' ', $attr ) .'></textarea>';
					$field_html .= $icon_html;
					$field_html .= '</div>';
					$field_html .= '<span class="error"></span>';
				break;

				case 'radio':

					if( !empty( $options ) ) {

						foreach ( $options as $key => $opt ) {

							$attr = array();

							$field_uid = configurator_random( 4 ).'-'.configurator_random( 4 );

							$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
							$attr[] = 'type="radio"';
							$attr[] = 'name="'. esc_attr( $name ) .'"';
							$attr[] = 'class="radio"';
							$attr[] = 'value="'. esc_attr( $opt ) .'"';
							$attr[] = ( ( 0 == $key ) ? 'checked' : '' );
							$attr[] = 'data-validation="'. esc_attr( $required ) .'"';
							$attr[] = $optional;
							$attr[] = $notice['required'];

							$field_html .= '<input '. implode( ' ', $attr ) .'>';
							$field_html .= '<label for="'. esc_attr( $field_uid ) .'">'. esc_html( $opt ) .'</label>';
						}

						$field_html .= '<span class="error"></span>';
					}
					
				break;

				case 'checkbox':

					if( !empty( $options ) ) {

						foreach ( $options as $key => $opt ) {

							$field_uid = configurator_random( 4 ).'-'.configurator_random( 4 );

							$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
							$attr[] = 'type="checkbox"';
							$attr[] = 'name="'. esc_attr( $name ) .'[]"';
							$attr[] = 'class="checkbox"';
							$attr[] = 'value="'. esc_attr( $opt ) .'"';
							$attr[] = 'data-validation="'. esc_attr( $required ) .' checkbox_group"';
							$attr[] = 'data-validation-qty="'. esc_attr( $quantity_range ) .'"';
							$attr[] = $optional;
							$attr[] = $notice['required'] .' '. $notice['quantity'];

							$field_html .= '<input '. implode( ' ', $attr ) .'>';
							$field_html .= '<label for="'. esc_attr( $field_uid ) .'">'. esc_html( $opt ) .'</label>';
						}

						$field_html .= '<span class="error"></span>';
					}
					
				break;

				case 'select':

					if( !empty( $options ) ) {

						$attr[] = 'id="'. esc_attr( $field_uid ) .'"';
						$attr[] = 'name="'. esc_attr( $name ) .'"';
						$attr[] = 'class="select"';
						$attr[] = 'data-validation="'. esc_attr( $required ) .'"';
						$attr[] = $optional;
						$attr[] = $notice['required'];

						$field_html .= '<select '. implode( ' ', $attr ) .'>';
							$field_html .= '<option value="empty">'. esc_html__( 'Choose the option', 'amz-configurator-core' ) .'</option>';
							foreach ( $options as $key => $opt ) {
								$field_html .= '<option value="'. esc_attr( $opt ) .'">'. esc_html( $opt ) .'</option>';
							}
						$field_html .= '</select>';
					}
					
				break;

				case 'submit':

					$btn_class = array();
					$btn_class[] = 'submit submit-contact-form btn';
					$btn_class[] = $btn_style;
					$btn_class[] = $btn_text_style;
					$btn_class[] = $btn_size;
					$btn_class[] = $btn_type;
					$btn_class[] = $btn_color;

					$attr[] = 'type="submit"';
					$attr[] = 'name="submit"';
					$attr[] = 'class=" '. esc_attr( implode( ' ', $btn_class ) ) .'"';

					$field_html .= '<button '. implode( ' ', $attr ) .'>'. esc_html( $btn_text ) .'</button>';
				break;
				
				default:
				break;
			}

			// It wraps the field
			$field_html .= $after_field;
		}

		// Recaptcha
		$sitekey = get_theme_mod( 'recaptcha_sitekey' );
		$secretkey = get_theme_mod( 'recaptcha_secretkey' );
		if( 'yes' == $recaptcha && !empty( $sitekey ) && !empty( $secretkey ) ) {
			//Protocol
	        $protocol = is_ssl() ? 'https' : 'http';

	        // Enque recaptcha api
			wp_enqueue_script( 'recaptcha', $protocol.'://www.google.com/recaptcha/api.js', array(), '1.0', true );		

			$recaptcha_html = '<div class="g-recaptcha" data-sitekey="'. esc_attr( $sitekey ) .'"></div>';
		}

		ob_start();
		?>
			
			<div class="contact-form-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<form action='POST' class='contact-form' data-values='<?php echo json_encode( $values ); ?>'>
					<span class="notice"></span>
					<script class="email-template" type="text/template"><?php echo $template_html; ?></script>
					<?php echo $wrap_start; ?>
						<div class="field-wrap">
							<?php echo $field_html; ?>
						</div>
						<?php echo $recaptcha_html; ?>
					<?php echo $wrap_end; ?>
				</form>
				
			</div> <!-- .contact-form-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_contact_form();
