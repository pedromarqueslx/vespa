<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_go_back extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-go-back';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Go Back Link', 'amz-configurator-core' ),
				'description' => esc_html__('Display a go back link', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Shop', 'amz-configurator-core' ),
				'params' => array(

					// General
					'general' => array(
						array(
							'label'       => esc_html__( 'Go Back Text', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the go back text', 'amz-configurator-core' ),
							'name'        => 'text',
							'type'        => 'text',
							'value'       => esc_html__( 'Go Back', 'amz-configurator-core' )
						)
					),

					// Styling
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Go Back' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'position', 'label' => 'Position', 'selector' => '.kc-single-product.go-back'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.go-back a'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.go-back a'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.go-back a'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.go-back a'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.go-back a'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.go-back a')
									)
								)
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
			// General
			'style' => 'underline', // underline, arrow
			'text' => esc_html__( 'Go Back', 'amz-configurator-core' )
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();
		?>
			
			<div class="product-go-back-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product go-back <?php echo esc_attr( $style ); ?>">
					<p><a href="#"><?php echo esc_html( $text ); ?></a></p>
				</div>
			</div> <!-- .product-go-back-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_go_back();

