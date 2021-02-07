<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_wishlist_btn extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-wishlist';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Wishlist Button', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product wishlist button', 'amz-configurator-core'),
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
							'label'       => esc_html__( 'Wishlist Text', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the Wishlist Text', 'amz-configurator-core' ),
							'name'        => 'wishlist_text',
							'type'        => 'text',
							'value'       => esc_html__( 'Add to Wishlist', 'amz-configurator-core' )
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
									'Wishlist Text' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.wishlist a'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.wishlist a'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.wishlist a'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.wishlist a'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.wishlist a'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.wishlist a'),
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
			'id'            => '',
			'wishlist_text' => esc_html__( 'Add to Wishlist', 'amz-configurator-core' )
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		$id = !empty( $id ) ? $id : get_the_ID();

		$product = wc_get_product( $id );

		ob_start();

		$active_class = in_array( $id, $GLOBALS['amz_wishlist_items'] ) ? ' active' : '';
		$html = '<a href="#" class="amz-wishlist' . esc_attr( $active_class ) . '" data-id="'. esc_attr( $id ) .'"><i class="ct-heart icon"></i><span class="wishlist-text">'. esc_html( $wishlist_text ) .'</span></a>';
		?>
			
			<div class="product-wishlist-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product wishlist">
					<?php echo $html; ?>
				</div>
			</div> <!-- .product-wishlist-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_wishlist_btn();

