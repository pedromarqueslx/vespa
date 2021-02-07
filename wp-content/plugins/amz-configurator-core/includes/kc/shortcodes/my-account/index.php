<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_my_account extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-my-account';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'My Account', 'amz-configurator-core' ),
				'description' => esc_html__('Display a Login form/Register Form/My Account', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// Login
					'Login' => array(
						array(
							'label'       => esc_html__('Login Form Title', 'amz-configurator-core'),
							'description' => esc_html__('Enter the login form title', 'amz-configurator-core'),
							'name'        => 'login_form_title',
							'type'        => 'text',
							'value'       => esc_attr__( 'Login', 'amz-configurator-plugins' )
						),

						array(
							'label'       => esc_html__('Login Button Text', 'amz-configurator-core'),
							'description' => esc_html__('Enter the login button text', 'amz-configurator-core'),
							'name'        => 'login_btn_txt',
							'type'        => 'text',
							'value'       => esc_attr__( 'Login', 'amz-configurator-plugins' )
						),

						array(
							'label'       => esc_html__('Reset Title', 'amz-configurator-core'),
							'description' => esc_html__('Enter the reset form title', 'amz-configurator-core'),
							'name'        => 'reset_title',
							'type'        => 'text',
							'value'       => esc_attr__( 'Reset Password', 'amz-configurator-plugins' )
						),

						array(
							'label'       => esc_html__('Reset Button Text', 'amz-configurator-core'),
							'description' => esc_html__('Enter the reset form button text', 'amz-configurator-core'),
							'name'        => 'reset_btn_txt',
							'type'        => 'text',
							'value'       => esc_attr__( 'Reset Password', 'amz-configurator-plugins' )
						)
					),

					// My Account
					'My Account' => array(
						array(
							'label'       => esc_html__('My Account Title', 'amz-configurator-core'),
							'description' => esc_html__('Enter the my account title', 'amz-configurator-core'),
							'name'        => 'my_account_title',
							'type'        => 'text',
							'value'       => esc_attr__( 'My Account', 'amz-configurator-plugins' )
						),

						array(
							'label'       => esc_html__('Update Button Text', 'amz-configurator-core'),
							'description' => esc_html__('Enter the update button text', 'amz-configurator-core'),
							'name'        => 'update_btn_txt',
							'type'        => 'text',
							'value'       => esc_attr__( 'Update', 'amz-configurator-plugins' )
						),

						array(
							'type'			=> 'group',
							'label'			=> esc_html__( 'Custom Fields', 'amz-configurator-core' ),
							'name'			=> 'custom_fields',
							'description'	=> esc_html__( 'The default field created in this name( first_name | last_name | nice_name | display_name | website | email | password ). You can add custom fields as well using unique field name. By accessing the field value like this [usermeta field="first_name"]', 'amz-configurator-core' ),
							'options'		=> array(
								'add_text' => esc_html__( 'Add Field', 'amz-configurator-core' )
							),
							'value' => base64_encode( json_encode( array(
								'1' => array(
									'name'        => 'first_name',
									'label'       => 'First Name',
									'placeholder' => 'First Name'
								),
								'2' => array(
									'name'        => 'last_name',
									'label'       => 'Last Name',
									'placeholder' => 'Last Name'
								),
								'3' => array(
									'name'        => 'nice_name',
									'label'       => 'Nice Name',
									'placeholder' => 'Nice Name'
								),
								'4' => array(
									'name'        => 'display_name',
									'label'       => 'Display Name',
									'placeholder' => 'Display Name'
								),
								'5' => array(
									'name'        => 'website',
									'label'       => 'Website',
									'placeholder' => 'Website'
								),
								'6' => array(
									'name'        => 'email',
									'label'       => 'Email',
									'placeholder' => 'Email'
								),
								'7' => array(
									'name'        => 'password',
									'label'       => 'Password',
									'placeholder' => 'Password'
								)
							))),
							'params' => array(

								array(
									'label'       => esc_html__('Field Name', 'amz-configurator-core'),
									'description' => esc_html__('Please type the unique name.', 'amz-configurator-core'),
									'name'        => 'name',
									'type'        => 'text',
									'value'       => ''
								),

								array(
									'label'       => esc_html__('Label', 'amz-configurator-core'),
									'description' => esc_html__('Please type the label.', 'amz-configurator-core'),
									'name'        => 'label',
									'type'        => 'text',
									'value'       => ''
								),

								array(
									'label'       => esc_html__('Placeholder', 'amz-configurator-core'),
									'description' => esc_html__('Please type the placeholder.', 'amz-configurator-core'),
									'name'        => 'placeholder',
									'type'        => 'text',
									'value'       => ''
								)
							)
						)
					),

					// Register
					'Register' => array(

						array(
							'label'       => esc_html__('Register Form Title', 'amz-configurator-core'),
							'description' => esc_html__('Enter the register form title', 'amz-configurator-core'),
							'name'        => 'register_form_title',
							'type'        => 'text',
							'value'       => esc_attr__( 'Register', 'amz-configurator-plugins' )
						),

						array(
							'label'       => esc_html__('Register Button Text', 'amz-configurator-core'),
							'description' => esc_html__('Enter the register button text', 'amz-configurator-core'),
							'name'        => 'register_btn_txt',
							'type'        => 'text',
							'value'       => esc_attr__( 'Register', 'amz-configurator-plugins' )
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
			// Login
			'login_form_title'    => esc_attr__( 'Login', 'amz-configurator-plugins' ),
			'login_btn_txt'       => esc_attr__( 'Login', 'amz-configurator-plugins' ),
			'forgot_title'        => esc_attr__( 'Forgot Password', 'amz-configurator-plugins' ),
			'forgot_btn_txt'      => esc_attr__( 'Submit', 'amz-configurator-plugins' ),
			'reset_title'         => esc_attr__( 'Reset Password', 'amz-configurator-plugins' ),
			'reset_btn_txt'       => esc_attr__( 'Reset Password', 'amz-configurator-plugins' ),
			// My Account
			'my_account_title'    => esc_attr__( 'My Account', 'amz-configurator-plugins' ),
			'update_btn_txt'      => esc_attr__( 'Update', 'amz-configurator-plugins' ),
			// Register
			'register_form_title' => esc_attr__( 'Register', 'amz-configurator-plugins' ),
			'register_btn_txt'    => esc_attr__( 'Register', 'amz-configurator-plugins' ),
			'custom_fields'       => ''
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$reset_form_html = $login_form_html = $register_form_html = $my_account_html = '';
		

		$action = isset( $_GET['action'] ) ? $_GET['action'] : '';
		$key = isset( $_GET['key'] ) ? $_GET['key'] : '';
		$login = isset( $_GET['login'] ) ? $_GET['login'] : '';

		if( $action == 'rp' ) {
			$reset_form_html .= '<div class="reset-password-con">';

				$reset_form_html .= '<form method="post" class="reset-form" data-key="'. esc_attr( $key ) .'">';

					$reset_form_html .= '<h3 class="title">'. esc_html( $reset_title ) .'</h3>';

					$reset_form_html .= '<p class="field">';
						$reset_form_html .= '<label>'. esc_html__( 'Password', 'composer' ) .'</label>';
						$reset_form_html .= '<input type="password" class="password" name="password" value="'. esc_attr( $key ) .'">';
					$reset_form_html .= '</p>';

					$reset_form_html .= '<p><a href="#" data-login="'. esc_attr( $login ) .'" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-reset-form">'. esc_html( $reset_btn_txt ) .'</a><span class="success"></span></p>';

				$reset_form_html .= '</form>';

			$reset_form_html .= '</div>'; // .reset-password-con
		}
		else if( !is_user_logged_in() ) {

			$login_form_html .= '<div class="login-form-cover">';

				$login_form_html .= '<div class="login-form-con">';
					$login_form_html .= '<form method="post" class="login-form">';
						$login_form_html .= '<span class="reset-notice"></span>';

						$login_form_html .= '<h3 class="title">'. esc_html( $login_form_title ) .'</h3>';

						$login_form_html .= '<p class="field">';
							$login_form_html .= '<label for="login-username">'. esc_html__( 'Username', 'composer' ) .'</label>';
							$login_form_html .= '<input id="login-username" type="text" class="username" name="username">';
							$login_form_html .= '<span class="username-notice error"></span>';
						$login_form_html .= '</p>';

						$login_form_html .= '<p class="field">';
							$login_form_html .= '<label for="login-password">'. esc_html__( 'Password', 'composer' ) .'</label>';
							$login_form_html .= '<input id="login-password" type="password" class="password" name="password">';
							$login_form_html .= '<span class="password-notice error"></span>';
						$login_form_html .= '</p>';

						$login_form_html .= '<p class="form-field form-checkbox"><input type="checkbox" name="remember_me" class="remember_me"><label for="remember_me">'. esc_html__( 'Remember Me?', 'composer' ) .'</label><span class="remember-me"></span></p>';

						$login_form_html .= '<p class="field">'. esc_html__( 'Cant\'t access your account?', 'composer' ) .'<a href="#" class="forgot-password">'. esc_html__( 'Forget Password?', 'composer' ) .'</a></p>';

						$login_form_html .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-login-form">'. esc_html( $login_btn_txt ) .'</a><span class="success"></span></p>';

					$login_form_html .= '</form>';

				$login_form_html .= '</div>'; // .login-form-con

				$login_form_html .= '<div class="forgot-password-con">';

					$login_form_html .= '<form method="post" class="forgot-form">';

						$login_form_html .= '<h3 class="title">'. esc_html( $forgot_title ) .'</h3>';

						$login_form_html .= '<p>'. esc_html__( 'Enter your email address and we\'ll send you a link you can use to pick a new password', 'composer' ) .'</p>';

						$login_form_html .= '<p class="field">';
							$login_form_html .= '<label>'. esc_html__( 'Username or Email', 'composer' ) .'</label>';
							$login_form_html .= '<input type="text" class="user_login" name="user_login">';
							$login_form_html .= '<span class="user-login-notice error"></span>';
						$login_form_html .= '</p>';

						$login_form_html .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-forgot-form">'. esc_html( $forgot_btn_txt ) .'</a><span class="or">'. esc_html__( '-OR-', 'composer' ) .'</span><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color show-login-form">'. esc_html__( 'Cancel', 'composer' ) .'</a><span class="success"></span></p>';

					$login_form_html .= '</form>';

				$login_form_html .= '</div>'; // .forgot-password-con

			$login_form_html .= '</div>'; // .login-form-cover

			$member = get_option( 'users_can_register', '0' );

			if( '1' == $member ) {

				$register_form_html .= '<div class="register-form-con">';

					$register_form_html .= '<form method="post" class="register-form">';
						$register_form_html .= '<h3 class="title">'. esc_html( $register_form_title ) .'</h3>';

						$register_form_html .= '<p class="general-notice"></p>';
						$register_form_html .= '<div class="row">';

							$register_form_html .= '<p class="field col-md-12">';
								$register_form_html .= '<label>'. esc_html__( 'Username', 'composer' ) .'</label>';
								$register_form_html .= '<input type="text" class="username" name="username">';
								$register_form_html .= '<span class="username-notice error"></span>';
							$register_form_html .= '</p>';

							$register_form_html .= '<p class="field col-md-12">';
								$register_form_html .= '<label>'. esc_html__( 'Email', 'composer' ) .'</label>';
								$register_form_html .= '<input type="email" class="email" name="email">';
								$register_form_html .= '<span class="email-notice error"></span>';
							$register_form_html .= '</p>';

							$register_form_html .= '<p class="field col-md-12"><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-register-form">'. esc_html( $register_btn_txt ) .'</a><span class="success"></span></p>';

						$register_form_html .= '<div>'; // .row

					$register_form_html .= '</form>'; // .register-form

				$register_form_html .= '<div>'; // .register-form-con
					
			}
			else {
				$register_form_html .= '<div class="disable-registration"><p>'. esc_html__( 'Registration has been disabled for this site', 'composer' ) .'</p></div>'; // .register-form
			}
		}
		else if( is_user_logged_in() ) {

			// Get redirect link
	        $redirect = get_option( 'login_page_id' );

	        // Login page url
	        if( !empty( $redirect ) ) {
	                $redirect_url = esc_url( get_permalink( $redirect ) );
	        }
	        else {
	            $redirect_url = esc_url( home_url( '/' ) );               
	        }

			// Get current user details
			$userid       = get_current_user_id();
			$user_info    = get_userdata( $userid );
			
			$fname        = $user_info->first_name;
			$lname        = $user_info->last_name;
			$nice_name    = $user_info->user_nicename;
			$display_name = $user_info->display_name;
			$website      = $user_info->user_url;
			$email        = $user_info->user_email;
        
			$my_account_html .= '<div class="my-account-con">';

				$my_account_html .= '<form method="post" class="update-form">';

					$my_account_html .= '<h3 class="title">'. esc_html( $my_account_title ) .'<a href="'. esc_url( wp_logout_url( $redirect_url ) ) .'">'. esc_html__( 'Logout?', 'composer' ) .'</a></h3>';

					$my_account_html .= '<div class="row">';

						if( !empty( $custom_fields ) ) {
							foreach ( $custom_fields as $key => $field ) {


								switch( $field->name ) {

									case 'first_name':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'First Name', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="first_name" name="first_name" value="'. esc_attr( $fname ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;

									case 'last_name':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'Last Name', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="last_name" name="last_name" value="'. esc_attr( $lname ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;

									case 'nice_name':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'Nice Name', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="nice_name" name="nice_name"  value="'. esc_attr( $nice_name ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;

									case 'display_name':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'Display Name', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="display_name" name="display_name" value="'. esc_attr( $display_name ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;

									case 'website':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'Website', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="website" name="website" value="'. esc_attr( $website ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;

									case 'email':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'Email', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="email" name="email" value="'. esc_attr( $email ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;

									case 'password':
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'Old Password', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="old_password" name="old_password">';
											$my_account_html .= '<span class="password-notice error"></span>';
										$my_account_html .= '</p>';

										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html__( 'New Password', 'composer' ) .'</label>';
											$my_account_html .= '<input type="text" class="new_password" name="new_password">';
											$my_account_html .= '<span class="new-password-notice error"></span>';
										$my_account_html .= '</p>';
									break;

									default:
										$field_value = get_user_meta( $userid, $field->name, true );
										$my_account_html .= '<p class="field col-md-6">';
											$my_account_html .= '<label>'. esc_html( $field->label ) .'</label>';
											$my_account_html .= '<input type="text" class="'. esc_attr( $field->name ) .'" name="'. esc_attr( $field->name ) .'" value="'. esc_attr( $field_value ) .'">';
											$my_account_html .= '<span class="error"></span>';
										$my_account_html .= '</p>';
									break;
								}
							}
						}

					$my_account_html .= '</div>';

					$my_account_html .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-update-form">'. esc_html( $update_btn_txt ) .'</a><span class="success"></span></p>';

				$my_account_html .= '</form>';

			$my_account_html .= '</div>'; // .change-password-con
		}

		ob_start();
		?>
			
			<div class="my-account-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<?php echo $reset_form_html; ?>
				<?php echo $login_form_html; ?>
				<?php echo $register_form_html; ?>
				<?php echo $my_account_html; ?>
			</div> <!-- .my-account-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_my_account();
