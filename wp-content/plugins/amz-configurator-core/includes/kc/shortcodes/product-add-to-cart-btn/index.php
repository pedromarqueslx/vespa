<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_add_to_cart_btn extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-add-to-cart-btn';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Add to Cart Form', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product add to cart form', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Shop', 'amz-configurator-core' ),
				'params' => array(

					// General
					'general' => array(
						array(
							'label'       => esc_html__( 'Product ID', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the Product ID, Leave it empty if you adding on single product page', 'amz-configurator-core' ),
							'name'        => 'id',
							'type'        => 'text'
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
									'Input' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'width', 'label' => 'Width', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'display', 'label' => 'Display', 'selector' => '.kc-single-product .quantity .amz-qty-inner'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-single-product .quantity .amz-qty-inner'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product .quantity .input-text'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product .quantity .input-text')
									),
									'Button' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'width', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'height', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc-single-product .single_add_to_cart_button.btn'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc-single-product .single_add_to_cart_button.btn')
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
			'id' => ''
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		$id = !empty( $id ) ? $id : get_the_ID();

		$product = wc_get_product( $id );

		ob_start();
		?>
			
			<div class="product-add-to-cart-btn-wrap summary <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product add-to-cart-btn">
					<?php do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' ); ?>
				</div>
			</div> <!-- .product-add-to-cart-btn-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_add_to_cart_btn();