<?php
/**
 * Importer Path
 */
if( ! function_exists( 'amz_importer_get_path_locate' ) ) {
	function amz_importer_get_path_locate() {
		$dirname        = wp_normalize_path( dirname( __FILE__ ) );
		$plugin_dir     = wp_normalize_path( WP_PLUGIN_DIR );
		$located_plugin = ( preg_match( '#'. $plugin_dir .'#', $dirname ) ) ? true : false;
		$directory      = ( $located_plugin ) ? $plugin_dir : get_template_directory();
		$directory_uri  = ( $located_plugin ) ? WP_PLUGIN_URL : get_template_directory_uri();
		$basename       = str_replace( wp_normalize_path( $directory ), '', $dirname );
		$dir            = $directory . $basename;
		$uri            = $directory_uri . $basename;
		return apply_filters( 'amz_importer_get_path_locate', array(
			'basename' => wp_normalize_path( $basename ),
			'dir'      => wp_normalize_path( $dir ),
			'uri'      => $uri
			) );
	}
}

/**
 * Importer constants
 */
$get_path = amz_importer_get_path_locate();

define( 'CONFIGURATOR_IMPORTER_VER' , '1.0.0' );
define( 'CONFIGURATOR_IMPORTER_DIR' , CONFIGURATOR_CORE_PLUGIN_DIR . 'demo-importer' );
define( 'CONFIGURATOR_IMPORTER_URI' , CONFIGURATOR_CORE_PLUGIN_URL . '/demo-importer' );
define( 'CONFIGURATOR_IMPORTER_CONTENT_DIR' , CONFIGURATOR_IMPORTER_DIR . '/demos/' );
define( 'CONFIGURATOR_IMPORTER_CONTENT_URI' , CONFIGURATOR_IMPORTER_URI . '/demos/' );



/**
 * Scripts and styles for admin
 */
function amz_importer_enqueue_scripts() {

	wp_enqueue_script( 'amz-importer', CONFIGURATOR_IMPORTER_URI . '/assets/js/amz-importer.js', array( 'jquery' ), CONFIGURATOR_IMPORTER_VER, true);
	wp_enqueue_style( 'amz-importer-css', CONFIGURATOR_IMPORTER_URI . '/assets/css/amz-importer.css', null, CONFIGURATOR_IMPORTER_VER);
}

add_action( 'admin_enqueue_scripts', 'amz_importer_enqueue_scripts' );

/**
 *
 * Decode string for backup options (Source from codestar)
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
	function cs_decode_string( $string ) {
		return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	}
}

/**
 * Load Importer
 */
require_once CONFIGURATOR_IMPORTER_DIR . '/classes/abstract.class.php';
require_once CONFIGURATOR_IMPORTER_DIR . '/classes/importer.class.php';

/**
 * large image size : 
 * small image size : 350 x 263
 * @var array
 */

$settings      = array(
	'menu_parent' => 'themes.php',
	'menu_title'  => esc_html__( 'Import Demos', 'amz-configurator-core' ),
	'menu_type'   => 'add_submenu_page',
	'menu_slug'   => 'amz_demo_importer'
);

$options = array(
	'shoes' => array(
		'title'       => esc_html__( 'Shoes', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/shoes/',
		'front_page'  => 'Shoes Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Bag Main Menu', // Menu Location and Title
		),
		/*'rev_slider'     => array(
			get_template_directory()."/demo/default/home-slider-1.zip", // slider location
			get_template_directory()."/demo/default/home-slider-2.zip",
		),*/
	),
    'helmets' => array(
		'title'       => esc_html__( 'Helmets', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/helmet/',
		'front_page'  => 'Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'headphones' => array(
		'title'       => esc_html__( 'Headphones', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/headphones/',
		'front_page'  => 'Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'corralejo-sunglasses' => array(
		'title'       => esc_html__( 'Corralejo Sunglasses', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/corralejo/',
		'front_page'  => 'Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'motorbikes' => array(
		'title'       => esc_html__( 'Motorbikes', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/motorbikes/',
		'front_page'  => 'Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'makiavelo-bikes' => array(
		'title'       => esc_html__( 'Makiavelo Bikes', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/bike/',
		'front_page'  => 'Home Bike',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'handbags' => array(
		'title'       => esc_html__( 'Handbags', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/handbags/',
		'front_page'  => 'Bag Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'tshirt' => array(
		'title'       => esc_html__( 'Tshirt', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/tshirt/',
		'front_page'  => 'Bag Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Bag Main Menu', // Menu Location and Title
		)
    ),
    'smartwatch' => array(
		'title'       => esc_html__( 'Smartwatch', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/smartwatch/',
		'front_page'  => 'Shoes Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Bag Main Menu', // Menu Location and Title
		)
    ),
    'classic-sunglasses' => array(
		'title'       => esc_html__( 'Classic Sunglasses', 'amz-configurator-core' ),
		'preview_url' => 'https://wpconfigurator.com/sunglasses/',
		'front_page'  => 'Home',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
    ),
    'classic-bikes' => array(
		'title'       => esc_html__( 'Classic Bikes', 'amz-configurator-core' ), 
		'preview_url' => 'https://wpconfigurator.com/bikesdemo/',
		'front_page'  => 'Home Bike',
		'blog_page'   => 'Blog',
		'menus'     => array(
			'main-nav'   => 'Main Menu', // Menu Location and Title
		)
		
    ),
    
);

AMZ_Demo_Importer::instance( $settings, $options );
