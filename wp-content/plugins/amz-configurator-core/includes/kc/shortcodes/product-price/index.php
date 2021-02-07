<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_price extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-price';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Price', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product price', 'amz-configurator-core'),
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
						),
					),

					// Styling
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Regular Price' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.price del, .kc-single-product.price'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.price del, .kc-single-product.price'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.price del, .kc-single-product.price'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.price del, .kc-single-product.price'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.price del, .kc-single-product.price'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.price del, .kc-single-product.price'),
									),
									'Sale Price' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.price ins'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.price ins'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.price ins'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.price ins'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.price ins'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.price ins'),
									),
									'Currency Symbol' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.price .woocommerce-Price-currencySymbol'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.price .woocommerce-Price-currencySymbol'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.price .woocommerce-Price-currencySymbol'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.price .woocommerce-Price-currencySymbol'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.price .woocommerce-Price-currencySymbol'),
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
			
			<div class="product-price-wrap summary <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<?php if( $product ) : ?>
					<p class="kc-single-product price"><?php echo $product->get_price_html(); ?></p>
				<?php endif; ?>
			</div> <!-- .product-price-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_price();

