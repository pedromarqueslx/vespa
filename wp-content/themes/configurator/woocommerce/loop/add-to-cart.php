<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$btn_class = array();

if( is_singular( 'product' ) ) {

	$btn_class[] = isset( $args['class'] ) ? $args['class'] : 'button';
	$btn_class[] = 'related-product-normal-btn btn';	
	$btn_class[] = configurator_get_option_value( 'related_product_normal_btn_style', 'default', 'btn_style', 'btn-solid' );
	$btn_class[] = configurator_get_option_value( 'related_product_normal_btn_text_style', 'default', 'btn_text_style', 'btn-uppercase' );
	$btn_class[] = configurator_get_option_value( 'related_product_normal_btn_size', 'default', 'btn_size', 'btn-md' );
	$btn_class[] = configurator_get_option_value( 'related_product_normal_btn_color', 'default', 'btn_color', 'btn-primary' );
	$btn_class[] = configurator_get_option_value( 'related_product_normal_btn_type', 'default', 'btn_type', 'btn-oval' );
}
else {

	$btn_class[] = isset( $args['class'] ) ? $args['class'] : 'button';
	$btn_class[] = 'shop-normal-btn btn';
	$btn_class[] = configurator_get_option_value( 'shop_normal_btn_style', 'default', 'btn_style', 'btn-solid' );
	$btn_class[] = configurator_get_option_value( 'shop_normal_btn_text_style', 'default', 'btn_text_style', 'btn-uppercase' );
	$btn_class[] = configurator_get_option_value( 'shop_normal_btn_size', 'default', 'btn_size', 'btn-md' );
	$btn_class[] = configurator_get_option_value( 'shop_normal_btn_color', 'default', 'btn_color', 'btn-primary' );
	$btn_class[] = configurator_get_option_value( 'shop_normal_btn_type', 'default', 'btn_type', 'btn-oval' );
}

echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf( '<a href="%s" data-quantity="%s" class="%s" %s><span class="btn-text">%s</span><span class="adding shop-loading">%s</span><span class="shop-added">%s</span></a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( implode( ' ', $btn_class ) ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() ),
		esc_html__( 'adding...', 'configurator' ),
		esc_html__( 'In Cart', 'configurator' )
	),
$product, $args );