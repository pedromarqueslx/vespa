<?php
/**
 * Menu
 *
 * Add Menus
 *
 * @class     Configurator_Admin_Menu
 * @version   1.0
 * @author    Innwithemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configurator_Admin_Menu Class.
 */

if( ! class_exists( 'Configurator_Admin_Menu' ) ) {

	class Configurator_Admin_Menu {

		/**
		 * Hook in methods.
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'register_menus' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}

		/**
		 * Register plugin menu
		 */
		public function admin_enqueue_scripts() {

			wp_enqueue_style( 'configurator-core-admin-css', CONFIGURATOR_CORE_PLUGIN_URL .'/assets/css/admin.css', false, '1.0.0' );
		}

		/**
		 * Register plugin menu
		 */
		public function register_menus() {

			add_theme_page( esc_html__( 'System Status', 'amz-configurator-core' ), esc_html__( 'System Status', 'amz-configurator-core' ), 'edit_theme_options', 'system-status', array( $this, 'system_status' ) );

		}

		/**
		 * Callback function for Settings
		 */
		public function system_status() {

			global $wpdb;

			$data 	= array(
				'server'          => $_SERVER[ 'SERVER_SOFTWARE' ],
				'php'             => phpversion(),
				'mysql'           => $wpdb->db_version(),
				'memory_limit'    => wp_convert_hr_to_bytes( @ini_get( 'memory_limit' ) ),
				'time_limit'      => ini_get( 'max_execution_time' ),
				'max_input_vars'  => ini_get( 'max_input_vars' ),
				'max_upload_size' => size_format( wp_max_upload_size() ),				
				'home'            => get_option( 'home' ),
				'siteurl'         => get_option( 'siteurl' ),
				'wp_version'      => get_bloginfo( 'version' ),
				'language'        => get_locale(),
				'rtl'             => is_rtl() ? 'RTL' : 'LTR'
			);

			$status = array(
				'php'            => version_compare( PHP_VERSION, '7.0' ) >= 0,
				'suhosin'        => extension_loaded( 'suhosin' ),
				'memory_limit'   => $data['memory_limit'] >= 268435456,
				'time_limit'     => ( ( $data['time_limit'] >= 180 ) || ( $data['time_limit'] == 0 ) ),
				'max_input_vars' => $data['max_input_vars'] >= 5000,
				'curl'           => extension_loaded( 'curl' ),
				'dom'            => class_exists( 'DOMDocument' ),				
				'siteurl'        => false,
				'wp_version'     => version_compare( get_bloginfo( 'version' ), '4.9' ) >= 0,
				'multisite'      => is_multisite(),
				'debug'          => defined( 'WP_DEBUG' ) && WP_DEBUG
			);
			?>
				<div class="settings-wrap">

					<h2 class="title"><?php esc_html_e( 'System Status', 'amz-configurator-core' ); ?></h2>
					<p class="sub-title"><?php esc_html_e( 'Please make sure the below requirements are properly achieved', 'amz-configurator-core' ); ?></p>

					<div class="left-right-side">
						<div class="left-side">

							<h3 class="primary"><?php esc_html_e( 'Server Environment', 'amz-configurator-core' ); ?></h3>

							<ul>

								<li>
									<span class="label"><?php esc_html_e( 'Server Info', 'amz-configurator-core' ); ?></span>
									<span class="desc"><?php echo esc_html( $data['server'] ); ?></span>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'MySQL Version', 'amz-configurator-core' ); ?></span>
									<span class="desc"><?php echo esc_html( $data['mysql'] ); ?></span>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'PHP Version', 'amz-configurator-core' ); ?></span>
									<?php if( $status['php'] ): ?>
										<span class="status yes dashicons dashicons-yes"></span>
										<span class="desc"><?php echo PHP_VERSION; ?></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
										<span class="desc"><?php echo PHP_VERSION; ?></span>
										<p class="status-notice status-error"><?php _e( 'WordPress requires PHP version 7 or greater. <a target="_blank" href="https://wordpress.org/about/requirements/">Learn more</a>', 'amz-configurator-core' ); ?></p>
									<?php endif; ?>
								</li>

								<?php if( $status[ 'suhosin' ] ): ?>

									<li>
										<span class="label"><?php esc_html_e( 'SUHOSIN Installed', 'amz-configurator-core' ); ?></span>
										<span class="status info dashicons dashicons-info"></span>
										<p class="status-notice"><?php esc_html_e( 'Suhosin may need to be configured to increase its data submission limits.', 'amz-configurator-core' ); ?></p>
									</li>

								<?php else: ?>

									<li>
										<span class="label"><?php esc_html_e( 'PHP Memory Limit', 'amz-configurator-core' ); ?></span>
										<?php if( $status['memory_limit'] ): ?>
											<span class="status yes dashicons dashicons-yes"></span>
											<span class="desc"><?php echo size_format( $data['memory_limit'] ); ?></span>
										<?php else: ?>

											<?php if( $data['memory_limit'] < 134217728 ): ?>

												<span class="status no dashicons dashicons-no"></span>
												<span class="desc"><?php echo size_format( $data['memory_limit'] ); ?></span>
												<?php _e( '<p class="status-notice status-error">Minimum <strong>128 MB</strong> is required, <strong>256 MB</strong> is recommended. </p>', 'amz-configurator-core' ); ?>

											<?php else: ?>

												<span class="status info dashicons dashicons-info"></span>
												<span class="desc"><?php echo size_format( $data['memory_limit'] ); ?></span>
												<?php _e( '<p class="status-notice status-error">Current memory limit is OK, however <strong>256 MB</strong> is recommended. </p>', 'amz-configurator-core' ); ?>

											<?php endif; ?>

										<?php endif; ?>
									</li>

									<li>
										<span class="label"><?php esc_html_e( 'PHP Time Limit', 'amz-configurator-core' ); ?></span>
										<?php if( $status['time_limit'] ): ?>
											<span class="status yes dashicons dashicons-yes"></span>
											<span class="desc"><?php echo esc_html( $data['time_limit'] ); ?></span>
										<?php else: ?>

											<?php if( $data['time_limit'] < 60 ): ?>

												<span class="status no dashicons dashicons-no"></span>
												<span class="desc"><?php echo $data['time_limit']; ?></span>
												<?php _e( '<p class="status-notice status-error">Minimum <strong>60</strong> is required, <strong>180</strong> is recommended.</p>', 'amz-configurator-core' ); ?>

											<?php else: ?>

												<span class="status info dashicons dashicons-info"></span>
												<span class="desc"><?php echo $data['time_limit']; ?></span>
												<?php _e( '<p class="status-notice status-error">Current time limit is OK, however <strong>180</strong> is recommended.</p>', 'amz-configurator-core' ); ?>

											<?php endif; ?>

										<?php endif; ?>
									</li>

									<li>
										<span class="label"><?php esc_html_e( 'PHP Max Input Vars', 'amz-configurator-core' ); ?></span>
										<?php if( $status['max_input_vars'] ): ?>
											<span class="status yes dashicons dashicons-yes"></span>
											<span class="desc"><?php echo esc_html( $data['max_input_vars'] ); ?></span>
										<?php else: ?>
											<span class="status no dashicons dashicons-no"></span>
											<span class="desc"><?php echo esc_html( $data['max_input_vars'] ); ?></span>
											<p class="status-notice status-error"><?php esc_html_e( 'Minimum 5000 is required', 'amz-configurator-core' ); ?></p>
										<?php endif; ?>
									</li>

								<?php endif; ?>

								<li>
									<span class="label"><?php esc_html_e( 'WP Max Upload Size', 'amz-configurator-core' ); ?></span>
									<span class="desc"><?php echo esc_html( $data['max_upload_size'] ); ?></span>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'cURL', 'amz-configurator-core' ); ?></span>
									<?php if( $status['curl'] ): ?>
										<span class="status yes dashicons dashicons-yes"></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
										<p class="status-notice status-error"><?php _e( 'Your server does not have <strong>cURL</strong> enabled. Please contact your hosting provider.', 'amz-configurator-core' ); ?></p>
									<?php endif; ?>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'DOMDocument', 'amz-configurator-core' ); ?></span>
									<?php if( $status['dom'] ): ?>
										<span class="status yes dashicons dashicons-yes"></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
										<p class="status-notice status-error"><?php esc_html_e( 'DOMDocument is required for WordPress Importer. Please contact your hosting provider.', 'amz-configurator-core' ); ?></p>
									<?php endif; ?>
								</li>

								<li class="info">
									<?php _e( 'php.ini values are shown above. Real values may vary, please check your limits using <a target="_blank" href="http://php.net/manual/en/function.phpinfo.php">php_info()</a>.<br />
									For more details about file creation, please <a target="_blank" href="https://mediatemple.net/community/products/dv/204643880/how-can-i-create-a-phpinfo.php-page">see this tutorial</a>.', 'amz-configurator-core' ); ?>
								</li>

							</ul>

						</div>

						<div class="right-side">

							<h3 class="primary"><?php esc_html_e( 'WordPress Environment', 'amz-configurator-core' ); ?></h3>

							<ul>

								<li>
									<span class="label"><?php esc_html_e( 'Home URL', 'amz-configurator-core' ); ?></span>
									<span class="desc"><?php echo esc_html( $data['home'] ); ?></span>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'Site URL', 'amz-configurator-core' ); ?></span>
									<?php if( $status['siteurl'] ): ?>
										<span class="desc"><?php echo esc_html( $data['siteurl'] ); ?></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
										<span class="desc"><?php echo esc_html( $data['siteurl'] ); ?></span>
										<p class="status-notice status-error"><?php esc_html_e( 'Home URL host must be the same as Site URL host.', 'amz-configurator-core' ); ?></p>
									<?php endif; ?>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'WP Version', 'amz-configurator-core' ); ?></span>
									<?php if( $status['wp_version'] ): ?>
										<span class="status yes dashicons dashicons-yes"></span>
										<span class="desc"><?php echo esc_html( $data['wp_version'] ); ?></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
										<span class="desc"><?php echo esc_html( $data['wp_version'] ); ?></span>
										<p class="status-notice status-error"><?php esc_html_e( 'Please update WordPress to the latest version.', 'amz-configurator-core' ); ?></p>
									<?php endif; ?>
								</li>

								<li class="secondary">
									<span class="label"><?php esc_html_e( 'WP Multisite', 'amz-configurator-core' ); ?></span>
									<?php if( $status['multisite'] ): ?>
										<span class="status yes dashicons dashicons-yes"></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
									<?php endif; ?>
								</li>

								<li class="secondary">
									<span class="label"><?php esc_html_e( 'WP Debug', 'amz-configurator-core' ); ?></span>
									<?php if( $status['debug'] ): ?>
										<span class="status yes dashicons dashicons-yes"></span>
									<?php else: ?>
										<span class="status no dashicons dashicons-no"></span>
									<?php endif; ?>
								</li>

								<li>
									<span class="label"><?php esc_html_e( 'Language', 'amz-configurator-core' ); ?></span>
									<span class="desc"><?php echo sprintf( '%s, text direction: %s', $data['language'], $data['rtl'] ); ?></span>
								</li>

							</ul>

						</div>
					</div>

				</div> <!-- .settings-wrap -->

			<?php
		}
	}

}

new Configurator_Admin_Menu();