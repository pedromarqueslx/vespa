<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$btn_class = array();

$btn_class[] = 'checkout-button button alt wc-forward cart-checkout-btn btn';
$btn_class[] = configurator_get_option_value( 'cart_checkout_btn_style', 'default', 'btn_style', 'btn-solid' );
$btn_class[] = configurator_get_option_value( 'cart_checkout_btn_text_style', 'default', 'btn_text_style', 'btn-uppercase' );
$btn_class[] = configurator_get_option_value( 'cart_checkout_btn_size', 'default', 'btn_size', 'btn-md' );
$btn_class[] = configurator_get_option_value( 'cart_checkout_btn_color', 'default', 'btn_color', 'btn-primary' );
$btn_class[] = configurator_get_option_value( 'cart_checkout_btn_type', 'default', 'btn_type', 'btn-oval' );

?>

<a href="<?php echo esc_url( wc_get_checkout_url() ) ;?>" class="<?php echo esc_attr( implode( ' ', $btn_class ) ); ?>">
	<?php echo __( 'Proceed to Checkout', 'configurator' ); ?>
</a>
