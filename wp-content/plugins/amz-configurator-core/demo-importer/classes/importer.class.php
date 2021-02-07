<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *
 * Framework Class
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class AMZ_Demo_Importer extends AMZ_Demo_Importer_Abstract {
	/**
	 *
	 * option database/data name
	 * @access public
	 * @var string
	 *
	 */
	public $opt_id = '_amz_importer';
	/**
	 *
	 * framework option database/data name
	 * @access public
	 * @var string
	 *
	 */
	public $framework_id = '_cs_options';
	/**
	 *
	 * demo items
	 * @access public
	 * @var array
	 *
	 */
	public $items = array();
	/**
	 *
	 * instance
	 * @access private
	 * @var class
	 *
	 */
	private static $instance = null;
	// run framework construct
	public function __construct( $settings, $items ) {
		$this->settings = apply_filters( 'amz_importer_settings', $settings );
		$this->items    = apply_filters( 'amz_importer_items', $items );
		if( ! empty( $this->items ) ) {
			$this->addAction( 'admin_menu', 'admin_menu' );
			$this->addAction( 'wp_ajax_amz_demo_importer', 'import_process' );
		}

	}
	// instance
	public static function instance( $settings = array(), $items = array() ) {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self( $settings, $items );
		}
		return self::$instance;
	}

	// adding option page
	public function admin_menu() {
		$defaults_menu_args = array(
			'menu_parent'     => '',
			'menu_title'      => '',
			'menu_type'       => '',
			'menu_slug'       => '',
			'menu_icon'       => '',
			'menu_capability' => 'manage_options',
			'menu_position'   => null,
		);
		$args = wp_parse_args( $this->settings, $defaults_menu_args );
		if( $args['menu_type'] == 'add_submenu_page' ) {
			call_user_func( $args['menu_type'], $args['menu_parent'], $args['menu_title'], $args['menu_title'], $args['menu_capability'], $args['menu_slug'], array( &$this, 'admin_page' ) );
		} else {
			call_user_func( $args['menu_type'], $args['menu_title'], $args['menu_title'], $args['menu_capability'], $args['menu_slug'], array( &$this, 'admin_page' ), $args['menu_icon'], $args['menu_position'] );
		}
	}
	// output demo items
	public function admin_page() {
		$nonce = wp_create_nonce('amz_importer');
		?>
		<div class="wrap amz-importer">
			<h2><?php _e( 'Configurator Theme Demo Importer', 'amz-configurator-core' ); ?></h2>
			<div class="amz-demo-browser">
				<?php
				foreach ($this->items as $item => $value ) :
					$opt = get_option($this->opt_id);

					$imported_class = '';
					$btn_text = '';
					$status = '';
					if (!empty($opt[$item])) {
						$imported_class = 'imported';
						$btn_text .= __( 'Re-Import', 'amz-configurator-core' );
						$status .= __( 'Imported', 'amz-configurator-core' );
					} else {
						$btn_text .= __( 'Import', 'amz-configurator-core' );
						$status .= __( 'Not Imported', 'amz-configurator-core' );
					}

					if( isset( $value['main_demo'] ) && $value['main_demo'] ) {
						$imported_class .= ' main-demo';
					}
				?>
				<div class="amz-demo-item <?php echo esc_attr($imported_class); ?>" data-amz-importer>
					<div class="amz-demo-screenshot">
						<div class="amz-tag">
							<?php echo esc_attr($status); ?>
						</div>
						<?php
							$image_url = '';
							if (file_exists(CONFIGURATOR_IMPORTER_CONTENT_DIR . $item . '/screenshot.jpg')) {
								$image_url = CONFIGURATOR_IMPORTER_CONTENT_URI . $item . '/screenshot.jpg';
							} else {
								$image_url = CONFIGURATOR_IMPORTER_URI . '/assets/img/screenshot.jpg';
							}
						?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr($value['title']); ?>">
					</div>

					<h2 class="amz-demo-name"><?php echo esc_attr($value['title']); ?></h2>
					<div class="amz-demo-actions">
						<a class="button button-secondary" href="#" data-import="<?php echo esc_attr($item); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>"><?php echo esc_attr($btn_text); ?></a>
						<a class="button button-primary" target="_blank" href="<?php echo esc_url($value['preview_url']); ?>"><?php _e( 'Preview', 'amz-configurator-core' ); ?></a>
					</div>
					
					<div class="amz-importer-response"><span class="dismiss" title="Dismiss this messages.">X</span></div>
				</div><!-- /.amz-demo-item -->
				<?php endforeach; ?>
				<div class="clear"></div>
				<div class="amz-importer-footer">
				<?php // _e( 'One-Click Installer Brought you by <a href="https://github.com/AminulBD/amz-demo-importer">Aminul Islam</a>', 'amz-configurator-core' ); ?>
				</div>
			</div><!-- /.amz-demo-browser -->
		</div><!-- /.wrap -->
		<?php
	}

	/**
	 * Import Proccess
	 */
	public function import_process() {
		$id = $_POST['id'];

		// Import XML Data
		$this->import_xml_data();

		// Setup Option Data from Codestar
		// $this->import_cs_options_data();

		//Setup Customizer import.
		$this->import_customizer_data();

		// Setup Reading
		$this->set_pages_for_reading();

		// Setup Menu
		if (isset($this->items[$id]['menus'])) {
			$this->set_menu();
		}

		if ( class_exists( 'RevSlider' ) ) {
			// Import Rev Slider
			$this->import_rev_slider();
		}

		die();
	}


	/**
	 * Import XML data by WordPress Importer
	 */
	public function import_xml_data() {

		if ( ! wp_verify_nonce( $_POST['nonce'], 'amz_importer' ) )
			echo die( 'Authentication Error!!!' );

		$id = $_POST['id'];
		$file = CONFIGURATOR_IMPORTER_CONTENT_DIR . $id . '/content.xml';

		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
			require_once ABSPATH . 'wp-admin/includes/import.php';
			$importer_error = false;
			if ( !class_exists( 'WP_Importer' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				if ( file_exists( $class_wp_importer ) ){
					require_once($class_wp_importer);
				} else {
					$importer_error = true;
				}
			}
			if ( !class_exists( 'WP_Import' ) ) {
				$class_wp_import = dirname( __FILE__ ) .'/wordpress-importer.php';
				if ( file_exists( $class_wp_import ) )
					require_once($class_wp_import);
				else
					$importer_error = true;
			}
			if($importer_error){
				die(__("Error on import", 'amz-configurator-core'));
			} else {
			if(!is_file( $file )){
				esc_html_e("File Error!!!", 'amz-configurator-core');
			} else {
				$wp_import = new WP_Import();
				$wp_import->fetch_attachments = true;
				$wp_import->import( $file );
				$options = get_option($this->opt_id);
				$options[$id] = true;
				update_option( $this->opt_id, $options );
			}
		}

	}

	public function import_customizer_data() {
		$id = $_POST['id'];
		$file = CONFIGURATOR_IMPORTER_CONTENT_DIR . $id . '/options.dat';

		if ( ! file_exists( $file ) ) {
			return;
		}

		// Setup global vars.
		global $wp_customize;
		global $wp_filesystem;
		if (empty($wp_filesystem)) {
		  require_once (ABSPATH . '/wp-admin/includes/file.php');
		  WP_Filesystem();
		}

		// Get file contents and decode
		$data = $wp_filesystem->get_contents( $file );

		if( $data ) {
			$data = @unserialize( $data );

			// $data['mods'] = $this->_import_images( $data['mods'] );

			// Import custom options.
			if ( isset( $data['options'] ) ) {

				// Require modified customizer options class.
				require_once CONFIGURATOR_IMPORTER_DIR . '/classes/class.customizer.option.php';

				foreach ( $data['options'] as $option_key => $option_value ) {
					$option = new AmzCustomizerOption( $wp_customize, $option_key, array(
						'default'    => '',
						'type'       => 'option',
						'capability' => 'edit_theme_options',
					) );

					$option->import( $option_value );
				}
			}

			// If wp_css is set then import it.
			if( function_exists( 'wp_update_custom_css_post' ) && isset( $data['wp_css'] ) && '' !== $data['wp_css'] ) {
				wp_update_custom_css_post( $data['wp_css'] );
			}

			// Call the customize_save action.
			do_action( 'customize_save', $wp_customize );

			// Loop through the mods.
			foreach ( $data['mods'] as $key => $val ) {

				// Call the customize_save_ dynamic action.
				do_action( 'customize_save_' . $key, $wp_customize );

				// Save the mod.
				set_theme_mod( $key, $val );
			}

			// Call the customize_save_after action.
			do_action( 'customize_save_after', $wp_customize );

		}

	}

	/**
	 * Imports images for settings saved as mods.
	 *
	 * @since 0.1
	 * @access private
	 * @param array $mods An array of customizer mods.
	 * @return array The mods array with any new import data.
	 */
	public function _import_images( $mods ) {

		foreach ( $mods as $key => $val ) {
			if ( $this->customizer_is_image_url( $val ) ) {
				$data = $this->customizer_sideload_image( $val );
				if ( ! is_wp_error( $data ) ) {
					$mods[ $key ] = $data->url;

					// Handle header image controls.
					if ( isset( $mods[ $key . '_data' ] ) ) {
						$mods[ $key . '_data' ] = $data;
						update_post_meta( $data->attachment_id, '_wp_attachment_is_custom_header', get_stylesheet() );
					}
				}
			}
		}

		return $mods;

	}

	/**
	 * Helper function: Customizer import
	 * Taken from the core media_sideload_image function and
	 * modified to return an array of data instead of html.
	 *
	 * @since 1.1.1.
	 * @param string $file The image file path.
	 * @return array An array of image data.
	 */
	public function customizer_sideload_image( $file ) {
		$data = new \stdClass();

		if ( ! function_exists( 'media_handle_sideload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
		}
		if ( ! empty( $file ) ) {
			// Set variables for storage, fix file filename for query strings.
			preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
			$file_array = array();
			$file_array['name'] = basename( $matches[0] );

			// Download file to temp location.
			$file_array['tmp_name'] = download_url( $file );

			// If error storing temporarily, return the error.
			if ( is_wp_error( $file_array['tmp_name'] ) ) {
				return $file_array['tmp_name'];
			}

			// Do the validation and storage stuff.
			$id = media_handle_sideload( $file_array, 0 );

			// If error storing permanently, unlink.
			if ( is_wp_error( $id ) ) {
				unlink( $file_array['tmp_name'] );
				return $id;
			}

			// Build the object to return.
			$meta                = wp_get_attachment_metadata( $id );
			$data->attachment_id = $id;
			$data->url           = wp_get_attachment_url( $id );
			$data->thumbnail_url = wp_get_attachment_thumb_url( $id );
			$data->height        = $meta['height'];
			$data->width         = $meta['width'];
		}

		return $data;
	}

	/**
	 * Checks to see whether a string is an image url or not.
	 *
	 * @since 0.1
	 * @access private
	 * @param string $string The string to check.
	 * @return bool Whether the string is an image url or not.
	 */
	public function customizer_is_image_url( $string = '' ) {
		if ( is_string( $string ) ) {
			if ( preg_match( '/\.(jpg|jpeg|png|gif)/i', $string ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Import Rev Slider
	 */
	public function import_rev_slider() {

		$id = $_POST['id'];
		
		if ( isset( $this->items[$id]['rev_slider'] ) ) {

			$slider = new RevSlider();

			foreach( $this->items[$id]['rev_slider'] as $filepath ){
				$slider->importSliderFromPost( true, true, $filepath );
			}

			// echo ' Slider processed';

		} else {			

			$file = CONFIGURATOR_IMPORTER_CONTENT_DIR . $id . '/rev-slider.zip';

			if ( file_exists( $file ) ) {
				$slider = new RevSlider();
				$slider->importSliderFromPost( true, true, $file );

				// echo ' Slider processed';
			}

		}

	}

	/**
	 * Update Codestar Framework Options Data
	 */
	public function import_cs_options_data() {
		$id = $_POST['id'];
		$file = CONFIGURATOR_IMPORTER_CONTENT_DIR . $id . '/options.txt';

		if ( file_exists( $file ) ) {

			global $wp_filesystem;
			if (empty($wp_filesystem)) {
			  require_once (ABSPATH . '/wp-admin/includes/file.php');
			  WP_Filesystem();
			}

			// Get file contents and decode
			$data = $wp_filesystem->get_contents( $file );

			if( $data ) {

				$data = apply_filters('of_options_before_save', $data);
				foreach ( $data as $k=>$v ) {
					if (!isset($smof_data[$k]) || $smof_data[$k] != $v) { // Only write to the DB when we need to
						set_theme_mod($k, $v);
					} else if (is_array($v)) {
						foreach ($v as $key=>$val) {
							if ($key != $k && $v[$key] == $val) {
								set_theme_mod($k, $v);
								break;
							}
						}
					}
				}
				// update_option( $this->framework_id, $decoded_data );
			}
			/*else { ?>
				<div>
					<h4 class="error" style="width:80%;text-align:center;margin:auto;">The file <?php // echo esc_url($this->content_demo); ?> can't be read. Please change file permission to 775.</h4>
				</div>
			<?php
			}*/
			
		}
	}

	/**
	 * Set Homepage and Front page
	 */
	public function set_pages_for_reading() {
		$id = $_POST['id'];

		// Set Home
		if (isset($this->items[$id]['front_page'])) {
			$page = get_page_by_title($this->items[$id]['front_page']);

			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

		// Set Blog
		if (isset($this->items[$id]['blog_page'])) {
			$page = get_page_by_title($this->items[$id]['blog_page']);

			if ( isset( $page->ID ) ) {
				update_option( 'page_for_posts', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}
	}

	/**
	 * Setup Menu
	 */
	public function set_menu() {
		$id = $_POST['id'];
		
		// Store All Menu
		$menu_locations = array();

		foreach ($this->items[$id]['menus'] as $key => $value) {
			$menu = get_term_by( 'name', $value, 'nav_menu' );
			if (isset($menu->term_id)) {
				$menu_locations[$key] = $menu->term_id;
			}
		}

		// Set Menu If has
		if (isset($menu_locations)) {
			set_theme_mod( 'nav_menu_locations', $menu_locations );
		}
	}

}
