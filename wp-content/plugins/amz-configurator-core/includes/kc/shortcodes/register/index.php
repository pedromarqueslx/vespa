<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_register extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-register';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Register', 'amz-configurator-core' ),
				'description' => esc_html__('Display a Register Form', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// Register
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
			// Register
			'register_form_title' => esc_attr__( 'Register', 'amz-configurator-plugins' ),
			'register_btn_txt'    => esc_attr__( 'Register', 'amz-configurator-plugins' )
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$register_form_html = '';
		

		if( !is_user_logged_in() ) {			

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

		ob_start();
		?>
			
			<div class="my-account-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<?php echo $register_form_html; ?>
			</div> <!-- .my-account-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_register();
