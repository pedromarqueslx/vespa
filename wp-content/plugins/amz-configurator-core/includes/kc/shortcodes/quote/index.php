<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_quote extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-quote';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Quote', 'amz-configurator-core' ),
				'description' => esc_html__('Display a quote', 'amz-configurator-core'),
				'is_container' => true,
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// General
					'general' => array(
						array(
							'label'       => esc_html__( 'Style', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the quote style', 'amz-configurator-core' ),
							'admin_label' => true,
							'name'        => 'style',
							'type'        => 'select',
							'value'       => 'style1',
							'options' => array(
								'style1' => esc_html__( 'Style 1', 'amz-configurator-core' ),
								'style2' => esc_html__( 'Style 2', 'amz-configurator-core' ),
								'style3' => esc_html__( 'Style 3', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__('Content', 'amz-configurator-core'),
							'description' => esc_html__('Type the quote content', 'amz-configurator-core'),
							'name'        => 'description',
							'type'        => 'textarea',
							'value'       => '',
						),

						array(
							'label'       => esc_html__( 'Author', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the author name', 'amz-configurator-core' ),
							'name'        => 'author',
							'type'        => 'text',
							'value'       => '',
						)
					),
					// Styling
					'styling' => array(
						array(
							'type'			=> 'css',
							'label'			=> __( 'css', 'kingcomposer' ),
							'name'			=> 'custom_css',
							'options'		=> array(
								array(
									'screens' => 'any,1024,999,767,479',
									'Quote' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.quote .content'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.quote .content'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.quote .content'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.quote .content'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.quote .content'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.quote .content'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.quote .content'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.quote .content'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.quote .content')
									),
									'Author' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.quote .name'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.quote .name'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.quote .name'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.quote .name'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.quote .name'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.quote .name'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.quote .name'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.quote .name'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.quote .name')
									)
								)
							)
						),
					),
					
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
			'style'   => 'style1',
			'description' => '',
			'author' => ''
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$output = '';

		// Title
		if( !empty( $author ) ) {
			$author = '<p class="name">– '. esc_html( $author ) .'</p>';
		}

		ob_start();
		?>
			
			<div class="quote-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="quote <?php echo esc_attr( $style ); ?>">
					<span class="content"><?php echo esc_html( $description ); ?></span>
					<?php echo $author; ?>
				</div> <!-- .quote  -->
			</div> <!-- .quote-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_quote();
