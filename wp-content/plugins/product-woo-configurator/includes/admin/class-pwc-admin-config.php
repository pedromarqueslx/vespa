<?php
/**
 * Admin Settings
 *
 * @class     PWC_Admin_config
 * @version   1.0.6
 * @author    Innwithemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PWC_Admin_config Class.
 */

if( ! class_exists( 'PWC_Admin_config' ) ) {

	class PWC_Admin_config {

		/**
		 * Hook in methods.
		 */
		public function __construct() {
			add_filter('get_user_option_screen_layout_amz_configurator', array( $this, 'screen_layout' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Register css and scripts
		 */
		public function enqueue_scripts( $hook_suffix ){

			// Base Suffix
			$suffix = array();
			$suffix[] = 'post.php';
			$suffix[] = 'post-new.php';
			$suffix[] = 'amz_configurator_page_pwc-settings';

			$suffix = apply_filters( 'pwc_admin_enqueue_scripts', $suffix );

			if( in_array( $hook_suffix, $suffix ) ) {
				wp_enqueue_media();

				// Load css
				wp_enqueue_style( 'pwc-icon-css', PWC_ASSETS_URL.'backend/css/pwc-backend-icon.css', array(), '1.2' );
				wp_enqueue_style( 'pwc-configurator-admin-css', PWC_ASSETS_URL.'backend/css/pwc-configurator-admin.css', array(), '1.2' );

				// Scripts
				wp_enqueue_style( 'wp-color-picker' );

				wp_enqueue_script( 'pwc-configurator-admin-plugin-js', PWC_ASSETS_URL.'backend/js/pwc-configurator-admin-plugin.js', array( 'jquery','jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-resizable' ), '1.2' );

				wp_enqueue_script( 'pwc-configurator-admin-media-upload-js', PWC_ASSETS_URL.'backend/js/media-upload.js', array( 'pwc-configurator-admin-plugin-js' ), '1.2' );

				wp_enqueue_script( 'pwc-configurator-admin-script-js', PWC_ASSETS_URL.'backend/js/pwc-configurator-admin-script.js', array( 'pwc-configurator-admin-plugin-js' ), '1.2' );

				wp_enqueue_script( 'metabox_media_manager', PWC_ASSETS_URL.'backend/js/custom-media-upload.js', array( 'jquery' ), '1.2' );

			}

			if( 'amz_configurator_page_pwc-settings' == $hook_suffix ) {
				wp_enqueue_style( 'pwc-configurator-admin-css', PWC_ASSETS_URL.'backend/css/pwc-configurator-admin.css', array(), '1.2' );
				
			}
			
		}

		/**
		 * Screen column layout
		 */
		public function screen_layout(){
			return 1;
		}
	}

}

return new PWC_Admin_config();