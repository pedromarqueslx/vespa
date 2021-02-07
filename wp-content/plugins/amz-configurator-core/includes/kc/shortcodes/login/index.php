<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_login extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-login';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Login Form', 'amz-configurator-core' ),
				'description' => esc_html__('Display a Login form', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// General
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
			// General
			'login_form_title'    => esc_attr__( 'Login', 'amz-configurator-plugins' ),
			'login_btn_txt'       => esc_attr__( 'Login', 'amz-configurator-plugins' )
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$login_form_html = '';

		if( !is_user_logged_in() ) {

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

						$login_form_html .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-login-form">'. esc_html( $login_btn_txt ) .'</a><span class="success"></span></p>';

					$login_form_html .= '</form>';

				$login_form_html .= '</div>'; // .login-form-con

			$login_form_html .= '</div>'; // .login-form-cover
		}

		ob_start();
		?>
			
			<div class="my-account-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<?php echo $login_form_html; ?>
			</div> <!-- .my-account-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_login();
