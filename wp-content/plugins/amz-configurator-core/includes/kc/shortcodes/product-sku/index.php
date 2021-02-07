<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_sku extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-sku';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product SKU', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product sku', 'amz-configurator-core'),
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
						array(
							'label'       => esc_html__( 'Title', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the title', 'amz-configurator-core' ),
							'name'        => 'title',
							'type'        => 'text',
							'value'       => esc_html__( 'SKU:', 'amz-configurator-core' )
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
									'SKU Title' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.sku .sku-title'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.sku .sku-title'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.sku .sku-title'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.sku .sku-title'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.sku .sku-title'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.sku .sku-title')
									),
									'SKU Value' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.sku .sku-value'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.sku .sku-value'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.sku .sku-value'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.sku .sku-value'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.sku .sku-value'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.sku .sku-value')
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
			'id'    => '',
			'title' => esc_html__( 'SKU:', 'amz-configurator-core' )
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		$id = !empty( $id ) ? $id : get_the_ID();

		$product = wc_get_product( $id );

		ob_start();
		?>
			
			<div class="product-sku-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product sku">
					<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

						<span class="sku_wrapper"><span class="sku-title"><?php echo esc_html( $title ); ?></span> <span class="sku-value"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'amz-configurator-core' ); ?></span></span>

					<?php endif; ?>
				</div>
			</div> <!-- .product-sku-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_sku();

