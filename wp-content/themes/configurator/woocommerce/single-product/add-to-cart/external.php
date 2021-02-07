<?php
/**
 * External product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/external.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_add_to_cart_form' );

$btn_class = array();

$btn_class[] = 'single_add_to_cart_button button alt single-product-cart-btn btn';
$btn_class[] = configurator_get_option_value( 'single_product_cart_btn_style', 'default', 'btn_style', 'btn-solid' );
$btn_class[] = configurator_get_option_value( 'single_product_cart_btn_text_style', 'default', 'btn_text_style', 'btn-uppercase' );
$btn_class[] = configurator_get_option_value( 'single_product_cart_btn_size', 'default', 'btn_size', 'btn-md' );
$btn_class[] = configurator_get_option_value( 'single_product_cart_btn_color', 'default', 'btn_color', 'btn-primary' );
$btn_class[] = configurator_get_option_value( 'single_product_cart_btn_type', 'default', 'btn_type', 'btn-oval' );

?>

<div class="config-cart-form">

	<form class="cart" action="<?php echo esc_url( $product_url ); ?>" method="get">
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" class="<?php echo esc_attr( implode( ' ', $btn_class ) ); ?>"><?php echo esc_html( $button_text ); ?></button>

		<?php wc_query_string_form_fields( $product_url ); ?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

</div>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
