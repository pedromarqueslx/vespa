<?php
/**
 * The template for displaying product content in the single-product-configurator.php template
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
 do_action( 'woocommerce_before_single_product' );

 if ( post_password_required() ) {
 	echo get_the_password_form();
 	return;
 }

/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

?>

<div id="product-<?php the_ID(); ?>" <?php post_class('single-product-wrap'); ?>>

	<div class="single-product-content clearfix">

		<?php

		$id = get_the_id();
		$config_id = get_post_meta( $id, '_configurator_post_id', true );

		echo '<div class="single-product-titlewrap">';

			echo '<h2 class="single-product-title">'. get_the_title() .'</h2>';

			echo '<p>'. wp_kses_post( get_post_meta( get_the_id(), '_amz_product_description', true ) ) .'</p>';

		echo '</div>';

		$style = get_post_meta( get_the_id(), '_configurator_style', true );

		$style = ( $style ) ? $style : 'style1';

		echo do_shortcode( "[pwc_config id='$config_id' product_id='$id' style='$style']" );

		?>

	</div>

	<div class="single-product-upsells clearfix">

		<div class="container">

			<?php

			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
			do_action( 'woocommerce_after_single_product_summary' );

			?>

		</div>

	</div>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
