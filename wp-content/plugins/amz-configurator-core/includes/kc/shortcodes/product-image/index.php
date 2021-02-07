<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class product_image extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-image';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Image', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product image', 'amz-configurator-core'),
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
							'label'       => esc_html__( 'Image Width', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the image width in integer', 'amz-configurator-core' ),
							'name'        => 'width',
							'type'        => 'text',
							'value'       => '600'
						),

						array(
							'label'       => esc_html__( 'Image Height', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the image height in integer', 'amz-configurator-core' ),
							'name'        => 'height',
							'type'        => 'text',
							'value'       => '600'
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
			'id'     => '',
			'width'  => '600',
			'height' => '600'
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		$id = !empty( $id ) ? $id : get_the_ID();

		// Product Object
		$product = wc_get_product( $id );

		$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
		$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
		$post_thumbnail_id = get_post_thumbnail_id( $id );
		$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
		$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
		$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
			'woocommerce-product-gallery',
			'woocommerce-product-gallery--' . $placeholder,
			'woocommerce-product-gallery--columns-' . absint( $columns ),
			'images',
		) );

		ob_start();
		?>
			
			<div class="product-image-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="kc-single-product product-image">
					<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
						<figure class="woocommerce-product-gallery__wrapper">
							<?php

							$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $id, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
							$html .= configurator_get_image_by_id( (int)$width, (int)$height, get_post_thumbnail_id( $id ), 0, 0, 1 );
							$html .= '</a></div>';

							echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $id ) );

							$attachment_ids = $product->get_gallery_image_ids();

							if ( $attachment_ids && has_post_thumbnail() ) {
								foreach ( $attachment_ids as $attachment_id ) {
									$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
									$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
									

									$html  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
									$html .= configurator_get_image_by_id( (int)$width, (int)$height, $attachment_id, 0, 0, 1 );
							 		$html .= '</a></div>';

									echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
								}
							}
							?>
						</figure>
					</div>
				</div>
			</div> <!-- .product-image-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new product_image();

