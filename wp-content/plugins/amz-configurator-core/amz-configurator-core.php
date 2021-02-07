<?php
/*
	Plugin Name: Configurator Theme Core
	Plugin URI: http://themeforest.net
	Description: Core plugin for the Configurator theme. This plugin is required for Configurator theme to work properly
	Version: 1.2.3
	Author: Amazee & Innwithemes
	Author URI: http://innwithemes.com
	Text Domain: amz-configurator-core
	Domain Path: /languages/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/*
 * The Ocean Core Plugins Iniatialize class
 */
class Configurator_Core {

	protected static $_instance = null;

	public $version = '1.0';

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct(){

		$this->define_constants();
		$this->includes();
		$this->init_hooks();

		// call metabox iniatialization
		add_action( 'init', array( $this, 'configurator_core_init' ) );

		do_action( 'configurator_core_loaded' );
		
	}

	/**
	 * Define configurator core constants.
	 */
	private function define_constants() {

		$path = plugin_dir_path( __FILE__ );

		define( 'CONFIGURATOR_CORE_VERSION', 	$this->version );
		define( 'CONFIGURATOR_CORE_PLUGIN_DIR', $path );
		define( 'CONFIGURATOR_CORE_PLUGIN_URL', plugins_url( '', __FILE__ ) );		
		define( 'CONFIGURATOR_CORE_INC_DIR',    $path . 'includes/' );
		define( 'CONFIGURATOR_CORE_CLASS_DIR',  CONFIGURATOR_CORE_INC_DIR . 'class/' );
		define( 'CONFIGURATOR_CORE_KC_LIVE',    $path . 'includes/kc/kc-live/' );

	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {

		$this->init_metabox();

		// configurator core helper
		require( CONFIGURATOR_CORE_CLASS_DIR . 'configurator-helper.php' );

		require( CONFIGURATOR_CORE_CLASS_DIR . 'class-admin-menus.php' );

		require( CONFIGURATOR_CORE_CLASS_DIR . 'class-customizer-reset.php' );

		// init KC
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if( is_plugin_active( 'kingcomposer/kingcomposer.php' ) || is_plugin_active_for_network( 'kingcomposer/kingcomposer.php' ) ) {
			require( CONFIGURATOR_CORE_INC_DIR . 'kc/kc.php' );
		}

		

		require( CONFIGURATOR_CORE_PLUGIN_DIR . 'demo-importer/init.php' );

	}

	private function init_hooks() {
		// call plugin text-domain
		add_action( 'plugins_loaded', array( $this, 'amz_load_plugin_textdomain' ) );
		
	}
	
	/* Load Text Domain */
	function amz_load_plugin_textdomain() {
	    load_plugin_textdomain( 'amz-configurator-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/* Configurator code initialize */
	function configurator_core_init() {
		
	}

	/* Iniatialize Metaboxes */
	function init_metabox() {		

		// Metabox Class
		require_once( CONFIGURATOR_CORE_CLASS_DIR . 'class-metaboxes.php' );

		foreach ( glob( CONFIGURATOR_CORE_INC_DIR . 'metaboxes/*.php') as $filename ) {
			require_once( $filename );
		}

	}

	/**
	 * Get the plugin url.
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}
	
}

/**
 * Main instance of Configurator core.
 *
 * Returns the main instance of CFC to prevent the need to use globals.
 *
 * @since  1.0
 * @return Configurator_Core
 */
function CFC() {
	return Configurator_Core::instance();
}

$configurator_theme = wp_get_theme();

if( 'configurator' == strtolower( $configurator_theme->template ) ) {
	$configurator_core = CFC();
} else {

	if ( is_multisite() && is_network_admin() ) {
		add_action('network_admin_notices','configurator_core_notice');
	} else {
		add_action('admin_notices', 'configurator_core_notice');
	}

}

function configurator_core_notice() {

    $plugin_data = get_plugin_data( __FILE__ );
    echo '<div class="updated"><p>' . sprintf(__( '<strong>%s</strong> Plugin requires <strong><a href="https://themeforest.net/item/configurator-responsive-multipurpose-theme/18710102" target="_blank">Configurator - Responsive Multi-Purpose Theme</a></strong> to be installed and activated on your site.', 'amz-configurator-core'), $plugin_data['Name'] ) . '</p></div>';

}

