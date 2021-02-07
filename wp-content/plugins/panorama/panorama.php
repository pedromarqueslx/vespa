<?php
/*
	Plugin Name: Panorama - Addon for WP Configurator
	Plugin URI: https://luminesthemes.com/items/panorama-skin-addon/
	Description: WooCommerce configurator plugin.
	Version: 1.4.2
	Author: Luminesthemes
	Author URI: http://luminesthemes.com
	Text Domain: panorama
	Domain Path: /languages/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if( ( is_plugin_active( 'woocommerce/woocommerce.php' ) || is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) && 
	( is_plugin_active( 'product-woo-configurator/product-woo-configurator.php' ) || is_plugin_active_for_network( 'product-woo-configurator/product-woo-configurator.php' ) ) ) {

	/*
	 * Iniatialize class
	 */
	if( ! class_exists( 'PWC_Panorama' ) ) {

		class PWC_Panorama {

			/**
			 * The single instance of the class.
			 *
			 */
			protected static $_instance = null;

			/**
			 * Main Helper Instance.
			 *
			 * Ensures only one instance of Helper is loaded or can be loaded.
			 *
			 * @static
			 * @return PWC - Main instance.
			 */
			public static function instance() {
			    if ( is_null( self::$_instance ) ) {
			        self::$_instance = new self();
			    }
			    return self::$_instance;
			}

			public function __construct(){

				$this->define_constants();

				add_action( 'init', array( $this, 'init' ) );

				add_action( 'plugins_loaded', array( $this, 'includes' ) );

				add_action( 'plugins_loaded', array( $this, 'pwcp_textdomain' ) ); // call plugin text-domain

				do_action( 'pwcp_loaded' );

			}

			/**
			 * Init hook
			 */
			public function init() {

				add_action( 'admin_notices', array( $this, 'licence_activation' ) );

			}

			/**
			 * Notice
			 */
			public function licence_activation() {

				if ( is_multisite() && ( is_plugin_active_for_network( 'panorama/panorama.php' ) || is_network_only_plugin( 'panorama/panorama.php' ) ) ) {
					$redirect = network_admin_url( 'edit.php?post_type=amz_configurator&page=pwc-settings&tab=addon&subtab=panorama' );
				}
				else {
					$redirect = admin_url( 'edit.php?post_type=amz_configurator&page=pwc-settings&tab=addon&subtab=panorama' );
				}

				$status = get_option( 'pwcp_license_status' );

				if( $status == false || $status != 'valid' ) {
					echo '<div class="notice notice-warning"><p>' . sprintf( __( 'Hola! Would you like to receive automatic updates and unlock premium support? Please <a href="%s">activate your copy</a> of Panorama - Addon for Product WooCommerce Configurator.', 'product-woo-configurator' ), wp_nonce_url( $redirect ) ) . '</p>' . '</div>';
				}

			}

			/**
			 * Define Constants.
			 */
			private function define_constants() {

				$plugin_data = get_plugin_data( __FILE__ );
				$plugin_data['Version'];

				define( 'PWCP_VERSION', $plugin_data['Version'] );

				define( 'PWCP_PLUGIN_DIR', 		plugin_dir_path( __FILE__ ) );
				define( 'PWCP_INCLUDE_DIR', 	PWCP_PLUGIN_DIR. 'includes/' );
				define( 'PWCP_TEMPLATES_DIR', 	PWCP_PLUGIN_DIR. 'templates/' );
				define( 'PWCP_CLASS_DIR', 		PWCP_INCLUDE_DIR. 'class/' );
				define( 'PWCP_SHORTCODES_DIR', 	PWCP_INCLUDE_DIR. 'shortcodes/' );
				
				define( 'PWCP_PLUGIN_URL', 		plugins_url( '', __FILE__ ) );
				define( 'PWCP_ASSETS_URL', 		PWCP_PLUGIN_URL .'/assets/' );
				
				define( 'PWCP_PLUGIN_FILE', 	__FILE__ );
				define( 'PWCP_TEMPLATE_PATH', 	$this->template_path() );

			}

			/**
			 * Include required core files used in admin and on the frontend.
			 */
			public function includes() {

				require PWCP_INCLUDE_DIR .'class-panorama-shortcode.php';
				require PWCP_INCLUDE_DIR .'class-pwc-panorama-config.php';
				require PWCP_INCLUDE_DIR .'pwc-panorama-admin-options.php';
				require PWCP_INCLUDE_DIR .'updater/pwc-update-handler.php';

			}

			/**
			 * Get the plugin path.
			 * @return string
			 */
			public function plugin_path() {
				return untrailingslashit( plugin_dir_path( __FILE__ ) );
			}

			public function pwcp_textdomain() {
			    load_plugin_textdomain( 'panorama', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
			}

			/**
			 * Get the template path.
			 * @return string
			 */
			public function template_path() {
				return apply_filters( 'panorama_template_path', 'panorama/' );
			}

		}

	}

	/**
	 * Main instance of PWC.
	 *
	 * Returns the main instance of PWC to prevent the need to use globals.
	 *
	 */
	function PWCP() {
		return PWC_Panorama::instance();
	}

	// Global for backwards compatibility.
	$pwcp = PWCP();

}
else {
	
	add_action( 'admin_notices', 'pwc_panorama_requirements_notice' );

	function pwc_panorama_requirements_notice() {
		echo '<div class="updated"><p>' . __( 'Panorama Addon requires <strong>WooCommerce and Product WooCommerce Configurator</strong> to be installed and activated on your site.', 'panorama' )  . '</p></div>';
	}

	// Deactivate the plugin
	deactivate_plugins(__FILE__);
}
