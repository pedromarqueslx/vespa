<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id = $product->get_id();

if( is_singular( 'product' ) ) {
	$btn_on_hover = get_theme_mod( 'shop_related_on_hover', 'yes' );
	$btn_on_hover = ( 'yes' == $btn_on_hover ) ? 'btn-on-hover' : '';
}
else {
	$btn_on_hover = get_theme_mod( 'shop_btn_on_hover', 'yes' );
	$btn_on_hover = ( 'yes' == $btn_on_hover ) ? 'btn-on-hover' : '';
}

?>
<li <?php wc_product_class( $btn_on_hover, $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	do_action( 'woocommerce_before_shop_loop_item_title' );

	echo '<div class="woo-product-item">'; //Product Container

		echo '<div class="product-img amz-product-thumbnail">';
			woocommerce_template_loop_product_link_open();
			
				woocommerce_show_product_loop_sale_flash();

				$thumb = configurator_get_meta_value( $product_id, '_amz_catalog_img' );
				$thumb_id = !empty( $thumb ) ? json_decode( $thumb ) : '';
				$thumb_id = !empty( $thumb_id ) ? $thumb_id[0]->itemId : get_post_thumbnail_id();

				$width = get_theme_mod( 'shop_width', '370' );
				$height = get_theme_mod( 'shop_height', '200' );

				echo configurator_get_image_by_id( (int)$width, (int)$height, $thumb_id, 0, 0, 1 );

			woocommerce_template_loop_product_link_close();

		echo '</div>';

		//Product Name and content
		echo '<div class="product-content clearfix">'; //Product Content

			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			do_action( 'woocommerce_shop_loop_item_title' );

			
			echo '<h3 class="title"> <a href='. esc_url( get_permalink() ) .'> '.esc_html( get_the_title() ).'</a></h3>'; //title


			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );

			woocommerce_template_loop_price();

			$btn_class = array();

			if( is_singular( 'product' ) ) {
				$btn_class[] = isset( $class ) ? $class.' related-product-customize-btn btn' : 'related-product-customize-btn button btn ';
				$btn_class[] = configurator_get_option_value( 'related_product_customize_btn_style', 'default', 'btn_style', 'btn-solid' );
				$btn_class[] = configurator_get_option_value( 'related_product_customize_btn_text_style', 'default', 'btn_text_style', 'btn-uppercase' );
				$btn_class[] = configurator_get_option_value( 'related_product_customize_btn_size', 'default', 'btn_size', 'btn-md' );
				$btn_class[] = configurator_get_option_value( 'related_product_customize_btn_color', 'default', 'btn_color', 'btn-primary' );
				$btn_class[] = configurator_get_option_value( 'related_product_customize_btn_type', 'default', 'btn_type', 'btn-oval' );
			}
			else {
				$btn_class[] = 'shop-customize-btn btn';
				$btn_class[] = configurator_get_option_value( 'shop_customize_btn_style', 'default', 'btn_style', 'btn-solid' );
				$btn_class[] = configurator_get_option_value( 'shop_customize_btn_text_style', 'default', 'btn_text_style', 'btn-uppercase' );
				$btn_class[] = configurator_get_option_value( 'shop_customize_btn_size', 'default', 'btn_size', 'btn-md' );
				$btn_class[] = configurator_get_option_value( 'shop_customize_btn_color', 'default', 'btn_color', 'btn-primary' );
				$btn_class[] = configurator_get_option_value( 'shop_customize_btn_type', 'default', 'btn_type', 'btn-oval' );
			}
				
			echo '<div class="btn-wrap">';
				echo '<div class="btn-wrap-inner">';
					woocommerce_template_loop_add_to_cart();
				echo '</div>';
				$config_id = get_post_meta( get_the_id(), '_configurator_post_id', true );

				if( $config_id && defined( 'PWC_VERSION' ) ) {
					echo '<div class="btn-wrap-inner">';
						echo '<a href='. esc_url( get_permalink() ) .' class="'. esc_attr( implode( ' ', $btn_class ) ) .'"> '. esc_html__( 'Customize', 'configurator' ) .'</a>';
					echo '</div>';
				}
				
			echo '</div>';

		echo '</div>'; //End of Product Content

	echo '</div>'; //End of Product Container

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
