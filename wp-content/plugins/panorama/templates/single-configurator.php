<?php

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php _wp_render_title_tag(); ?>
	
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo PWCP_PLUGIN_URL.'/includes/assets/css/pwc-icon.css'; ?>" type="text/css" media="all" /> 
	<link rel="stylesheet" href="<?php echo PWCP_PLUGIN_URL.'/includes/assets/css/pwc-configurator-plugin.css'; ?>" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo PWCP_PLUGIN_URL.'/includes/assets/css/pwc-configurator.css'; ?>" type="text/css" media="all" />
	
	<?php
	$theme_styles = wp_get_custom_css();
	if( $theme_styles ) :
		?>
		<style type="text/css">
			<?php echo strip_tags( $theme_styles ); ?>
		</style>
		<?php
	endif;

	$custom_css = get_option( 'pwc_custom_css' );
	if( $custom_css ) :
		?>
		<style type="text/css">
			<?php echo strip_tags( $custom_css ); ?>
		</style>
		<?php
	endif;
	?>

	<style type="text/css"><?php echo $custom_css; ?></style>

	<?php
		$currency_pos = 'left'; $symbol = '$';
		if( class_exists('Woocommerce') ) {
			$currency_pos = get_option('woocommerce_currency_pos');
			$symbol = get_woocommerce_currency_symbol();
		}
	?>
	<script>
		window.pwc_plugin = {};
		window.pwc_plugin.ajaxurl = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
		window.pwc_plugin.currency_pos = '<?php echo $currency_pos; ?>';
		window.pwc_plugin.currency_symbol = '<?php echo $symbol; ?>';
		window.pwc_plugin.change_text = '<?php echo esc_html__( 'Change', 'panorama' ); ?>';
		window.pwc_plugin.remove_text = '<?php echo esc_html__( 'Remove', 'panorama' ); ?>';
	</script>

	<script>
		window.lib           = {};
		window.lib.symbol    = '<?php echo get_woocommerce_currency_symbol(); ?>';
		window.lib.format    = '<?php echo str_replace( array( '%1$s', '%2$s' ), array( '%s', '%v' ), get_woocommerce_price_format() ); ?>';
		window.lib.decimal   = '<?php echo wc_get_price_decimal_separator(); ?>';
		window.lib.thousand  = '<?php echo wc_get_price_thousand_separator(); ?>';
		window.lib.precision = '<?php echo  wc_get_price_decimals(); ?>';
	</script>
	
</head>

<?php /* should use get_header('configurator'); and create a header for configurator */ ?>
<body <?php body_class(); ?>>

<div id="wrapper">
	<div class="container">

		<?php

			$id = get_the_id();

			$config_id = get_post_meta( $id, '_configurator_post_id', true );

			echo do_shortcode( '[pwc_panorama id="'. $config_id .'"]' );

		?>

	</div>
</div>

<script type="text/javascript" src="<?php echo PWCP_PLUGIN_URL.'/includes/assets/js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PWCP_PLUGIN_URL.'/includes/assets/js/jquery.base64.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo WC()->plugin_url() .'/assets/js/accounting/accounting.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PWCP_PLUGIN_URL.'/includes/assets/js/pwc-configurator-plugin.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PWCP_PLUGIN_URL.'/includes/assets/js/pwc-configurator-script.js'; ?>"></script>

</body>

</html>