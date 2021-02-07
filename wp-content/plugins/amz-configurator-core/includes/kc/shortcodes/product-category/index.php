<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_category extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-category';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Catogory', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product category', 'amz-configurator-core'),
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
							'label'       => esc_html__( 'Category Seperator', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the seperator', 'amz-configurator-core' ),
							'name'        => 'seperator',
							'type'        => 'text',
							'value'        => ', '
						),

						array(
							'label'       => esc_html__( 'Singular Prefix', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the prefix', 'amz-configurator-core' ),
							'name'        => 'singular_prefix',
							'type'        => 'text',
							'value'        => esc_html__( 'Category:', 'amz-configurator-core' )
						),

						array(
							'label'       => esc_html__( 'Plural Prefix', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the prefix', 'amz-configurator-core' ),
							'name'        => 'plural_prefix',
							'type'        => 'text',
							'value'        => esc_html__( 'Categories:', 'amz-configurator-core' )
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
									'Category Title' => array(
										array('property' => 'text-align', 'label' => 'Alignment'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.category .title'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.category .title'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.category .title'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.category .title'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.category .title'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.category .title')
									),
									'Category Link' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.category a'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc-single-product.category a'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc-single-product.category a'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc-single-product.category a'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc-single-product.category a'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc-single-product.category a')
									),
									'Seperator' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc-single-product.category a')
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
			'id'              => '',
			'seperator'       => ', ',
			'singular_prefix' => esc_html__( 'Category:', 'amz-configurator-core' ),
			'plural_prefix'   => esc_html__( 'Categories:', 'amz-configurator-core' ) 
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		$id = !empty( $id ) ? $id : get_the_ID();

		$product = wc_get_product( $id );

		$prefix = '';

		if( count( $product->get_category_ids() ) > 1 ) {
			$prefix = $plural_prefix;
		}
		else {
			$prefix = $singular_prefix;
		}

		ob_start();
		?>
			
			<div class="product-category-wrap summary <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product category">
					<?php echo wc_get_product_category_list( $id, '<span class="category-sep">'. esc_html( $seperator ) .'</span>', '<span class="title">'. esc_html( $prefix ) .'</span>' ); ?>
				</div>
			</div> <!-- .product-category-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_category();

