<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function configurator_generate_css() {
	configurator_generate_options_css();
}
add_action( 'customize_save_after', 'configurator_generate_css' );

/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */
function configurator_customizer_basic_style( $config ) {
	return wp_parse_args( array(
		'logo_image'   => get_template_directory_uri(). '/framework/admin/_img/logo.png',
		'description'  => esc_html__( 'Configurator created to help you make awesome websites in just minutes. It has everything you need with hundreds of shortcodes there is no need for coding knowledge.', 'configurator' ),
		'disable_loader' => true
	), $config );
}

add_filter( 'kirki/config', 'configurator_customizer_basic_style' );

/**
 * For use in themes
 *
 * @since forever
 */
if( ! function_exists( 'configurator_generate_options_css' ) && ! defined( 'CONFIGURATOR_FILESYSTEM_FIX' ) ) {
	function configurator_generate_options_css() {

		$data = get_theme_mods();	
		$GLOBALS["amz_option_data"] = $data;

		$uploads = wp_upload_dir();
		$css_upload_dir = $uploads['basedir'] . '/'. get_option( 'stylesheet' );

		$css_dir = CONFIGURATOR_CUSTOMIZER . '/_css/';

		WP_Filesystem();
		global $wp_filesystem;

		/* directory didn't exist, so let's create it */
		if( ! $wp_filesystem->is_dir( $css_upload_dir ) ) {
			$wp_filesystem->mkdir( $css_upload_dir );
		}

		@chmod( $css_dir, 0755 );
		@chmod( $css_dir . 'dynamic-css.php', 0664 );
		
		/** Capture CSS output **/
		ob_start();
		require($css_dir . 'dynamic-css.php');
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", "  " ), '', trim( ob_get_clean() ) );

		set_theme_mod( 'to_last_saved_time', time() );
		
		/** Write to options.css file **/	
		if ( ! $wp_filesystem->put_contents( $css_upload_dir . '/custom.css', $css, 0644 ) ) {
			return true;
		}

	}
}
