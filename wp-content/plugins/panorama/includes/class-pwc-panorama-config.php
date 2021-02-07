<?php
/**
 * Frontend Config
 *
 * Frontend Settings
 *
 * @class     PWC_Panorama_config
 * @version   1.0
 * @author    Innwithemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PWC_Panorama_config Class.
 */
class PWC_Panorama_config {

	public $first_view = '';
	private $active_array = '';
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

	/**
	 * Hook in methods.
	 */
	public function __construct() {

		add_filter( 'template_include', array( $this, 'single_product_configurator_template' ), 99 );

		add_filter( 'pwc_config_styles', array( $this,'add_style' ) );

	}

	/* Adding custom template for single configurator */
	public function single_product_configurator_template( $page_template ) {

		if( is_singular( 'product' ) ) {

			$config_id = get_the_id();			

			$style = get_post_meta( $config_id, '_configurator_style', true );

			if ( 'panorama' == $style ) {			

				$page_template = $this->locate_template( 'single-configurator.php' );

				if ( ( isset( $_GET['addtocart'] ) && $_GET['addtocart'] ) ) {
					
					$encoded_key = ( isset( $_GET['key'] ) && !empty($_GET['key']) ) ? $_GET['key'] : '';
					$custom_vars = ( isset( $_GET['custom'] ) && !empty($_GET['custom']) ) ? $_GET['custom'] : '';

					$product_id = get_the_id();

					if( ( isset( $_GET['config_id'] ) && !empty($_GET['config_id']) ) ) {
						$config_id = $_GET['config_id'];
					} else {
						$config_id = pwc_get_meta_value( $config_id, '_configurator_post_id', '' );
					}

					$views = pwc_get_meta_value( $config_id, '_pwc_views', array( 'front'=> esc_html__( 'Front', 'product-woo-configurator' ) ) );
					$base_price = pwc_get_meta_value( $config_id, '_pwc_base_price', '0' );

					PWCAF()->first_view = key( $views );

					$active_item = !empty( $encoded_key ) ? array_unique( explode( ',', base64_decode( $encoded_key ) ) ) : array();

					if( ! empty( $active_item ) ) {

						// configurator data
						$cs = pwc_get_meta_value( $config_id, 'components', array() );

						$active_array = PWCAF()->get_active_array( $cs, $active_item );

					} else {

						$active_array = array();

					}

					// add to cart
					// todo: check active_key is equal, if equal then add count or add new.
					if( function_exists( 'WC' ) && $product_id ) {

						WC()->cart->add_to_cart( $product_id, 1, 0, array(), array( 'pwc' => $active_item, 'user_config' => $active_array, 'config_id' => $config_id, 'config_id' => $config_id, 'pwc_base_price' => $base_price, 'views' => $views ) );


						/*  Redirect to cart page */
						$cart_page_url = wc_get_cart_url();
						if ( $cart_page_url ) {

							wp_safe_redirect( $cart_page_url, 302 );
							exit;

						}
						
					} 	

				}
				
			}

		}

		return $page_template;
		
	}

	// Include style to the prouct option
	public function add_style( $style ) {

		$style['panorama'] = esc_html__( 'Panorama', 'panorama' );
		return $style;

	}

	public function get_configurated_price( $active_array ) {

		$price = 0;

		foreach ( $active_array as $key => $value ) {

			if( $value['price'] ) {
				$price += floatval( $value['price'] );
			}
			
		}

		return $price;

	}

	public function get_active_array( $cs, $active_item ) {

		$this->active_array = '';
		$this->build_active_array( $cs, $active_item );

		$active_array = $this->active_array;
		$this->active_array = '';

		return $active_array;
	}

	public function build_active_array( $components, $active_item, $parent = '' ) {

		foreach ( $components as $key => $value ) {

			if( in_array( $key, $active_item ) ) {
				$temp = array();
				
				$temp['uid'] = $value['uid'];
				$temp['name'] = $value['name'];
				$temp['price'] = $value['price'];
				$temp[$this->first_view] = $value[$this->first_view];
				
				$temp['parent_name'] = ( $parent ) ? $parent : '';

				if( isset( $value['values'] ) && !empty( $value['values'] ) ) {					
					$temp['parent'] = true;
				} else {
					$temp['parent'] = false;
				}

				$this->active_array[$key] = $temp;

			}

			if( isset( $value['values'] ) && !empty( $value['values'] ) ) {
				$this->build_active_array( $value['values'] , $active_item, $value['name'] );
			} else {
				// $temp['parent'] = '';
			}

		}

	}

	public function locate_template( $template_name, $template_path = '', $default_path = '' ) {
		if ( ! $template_path ) {
			$template_path = PWCP()->template_path();
		}

		if ( ! $default_path ) {
			$default_path = PWCP()->plugin_path() . '/templates/';
		}

	    // Look within passed path within the theme - this is priority.
		$template = locate_template(
			array(
				trailingslashit( $template_path ) . $template_name,
				$template_name
				)
			);

	    // Get default template/
		if ( ! $template ) {
			$template = $default_path . $template_name;
		}

	    // Return what we found.
		return apply_filters( 'pwcp_locate_template', $template, $template_name, $template_path );
	}

}

function PWCPC() {
	// return new Pamapamar();
	return PWC_Panorama_config::instance();
}

$pwc_panorama = PWCPC();
