<?php
/**
 * Banner Shortcode
 *
 * Register banner shortcode.
 *
 * @class     PWC_Panorama_Shortcode
 * @version   1.0
 * @author    Innwithemes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PWC_Panorama_Shortcode Class.
 */
class PWC_Panorama_Shortcode {

	private $conditional_rules;
	private $apply = array();
	private $action = array();
	

	// Empty assignment
	private $output = '';
	private $active_key;
	private $encoded_key;
	private $active_item;	
	private $default_encoded_key;
	private $default_item;
	private $defaut_active_key;
	private $role;
	public $total_views;

	/**
	 * Hook in methods.
	 */
	public function __construct() {
		add_shortcode( 'pwc_panorama', array( $this, 'iniatialize_shortcode' ) );

		// Get the encoded active value if its set
		$this->encoded_key = isset( $_GET['key'] ) ? $_GET['key'] : '';
		$this->active_item = !empty( $this->encoded_key ) ? array_unique( explode( ',', base64_decode( $this->encoded_key ) ) ) : '';

		// Get default active item key helps to reset
		$this->default_encoded_key = isset( $_GET['default'] ) ? $_GET['default'] : '';
		$this->default_item = !empty( $this->default_encoded_key ) ? base64_decode( $this->default_encoded_key ) : '';

		// Get current user role
		$this->role = function_exists( 'pwc_user_role' ) ? pwc_user_role() : 'editor';

		add_action('wp_ajax_pwc_panorama_save_inspiration', array( $this, 'save_inspiration' ) );
		add_action('wp_ajax_nopriv_pwc_panorama_save_inspiration', array( $this, 'save_inspiration' ) );
	}

	/**
	 * Shortcode function
	 */
	public function iniatialize_shortcode( $atts ) {

		$id = isset( $atts['id'] ) && ! empty( $atts['id'] ) ? $atts['id'] : 0;

		$conditional_rules = pwc_get_meta_value( $id, '_pwc_rules', '' );

		if( !empty( $conditional_rules ) ) {
			foreach ( $conditional_rules as $parent_key => $option ) {

				$set = array();
				foreach ( $option['options'] as $key => $value ) {

					$set[] = $value['value'];
				}

				$this->apply[$option['apply']][$parent_key] = $set;
				$this->action[$option['apply']][$parent_key] = $option['action'];
			}
		}

		if( $id == 0 ) {
			return;
		}

		$url = '';

		if( isset( $_GET['product_id'] ) && $_GET['product_id'] ) {
			$url = add_query_arg( 'product_id', $_GET['product_id'], $url );			
		} else {
			$product_id = pwc_get_meta_value( $id, '_pwc_product_id', '' );
		}

		if( $product_id ) {
			$url = add_query_arg( 'addtocart', true, $url );			
		}

		$configuration_settings = pwc_get_meta_value( $id, 'components', array() );

		$logo = get_option( 'panorama_logo', '' );
		$logo = str_replace( '\\', '', $logo );
		$logo = ! empty( $logo ) ? json_decode( $logo ) : '';

		$menu = get_option( 'panorama_menu', 'none' );

		$this->output .= '<div class="content-pusher">';

		$this->output .= '<header class="clearfix">';

			if( empty( $logo ) ) {
				$this->output .= '<div id="logo"><a href="'. get_home_url() .'"><img src="'. PWCP_PLUGIN_URL .'/includes/assets/img/logo.png" alt=""></a></div>';
			}
			else {
				$logo_url = ( null != $logo[0]->itemId ) ? wp_get_attachment_image_src( $logo[0]->itemId, 'full' ) : '';
				if( ! empty( $logo_url[0] ) ) {
					$this->output .= '<div id="logo"><a id="logo" href="'. get_home_url() .'"><img src="'. esc_url( $logo_url[0] ) .'" alt=""></a></div>';
				}
			}

			$price_suffix = get_option( 'woocommerce_price_display_suffix' );
			$tax_text = get_option( 'woocommerce_prices_include_tax' );

			$tax_text = ( 'no' == $tax_text ) ? 'EXCL' : 'INCL';
			$price_suffix_html = ! empty( $price_suffix ) ? sprintf( '<span class="text vat">%s<br>%s</span>', esc_html( $price_suffix ), esc_html( $tax_text ) ) : '';

			$this->output .= '<div id="total-cart-price" class="cat-set">
				<a id="total-cart-price-link" href="' . esc_url( $url ) . '">
					<div class="prices"><p class="value">'. pwc_apply_currency_postion('0') .'</p>'. $price_suffix_html .'</div>
					<div class="icon pwc-cart"></div>
				</a>
				<div class="right-icon pwc-sort-simple"></div>
			</div>';			

			if( ! empty( $menu ) && 'none' != $menu ) {
				ob_start();
				$this->output .= '<nav class="single-panorama-menu">';
				wp_nav_menu(array(
					'menu'            => $menu,
					'container'       => false,                     // remove nav container
					'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
					'menu_class'      => 'menu clearfix',           // adding custom nav class
					'theme_location'  => 'main-nav',                // where it's located in the theme
					'link_before'     => '',                        // before each link
					'link_after'      => '',                        // after each link
					'depth'           => 1                          // limit the depth of the nav
				));

				$this->output .= ob_get_clean();
				$this->output .= '</nav>';
			}	
			
		$this->output .= '</header>';

		$this->output .= '<ul id="left-bar-menu" class="left-icon-menu">';
			$this->output .= '<li data-text="'. esc_attr__( 'Inspiration', 'panorama' ) .'"><a href="#" class="icon-view"><span class="icon pwc-pix-fonts-3"></span></a></li>';
			$this->output .= '<li data-text="'. esc_attr__( 'Reload', 'panorama' ) .'"><a class="reset" href="#" data-key=""><span class="icon pwc-reload-simple"></span></a></li>';
			$this->output .= '<li data-text="'. esc_attr__( 'Share', 'panorama' ) .'"><a class="share" href="#"><span class="icon pwc-share"></span></a></li>';
			$this->output .= '<li id="take-photo" data-text="'. esc_attr__( 'Take Photo', 'panorama' ) .'"><span class="icon pwc-camera-simple"></span></li>';

			if( 'administrator' == $this->role ) {
				$this->output .= '<li data-text="'. esc_attr__( 'Save as Inspiration', 'panorama' ) .'"><a class="inspiration-popup" href="#"><span class="icon pwc-gear-simple"></span></a></li>';
			}

		$this->output .= '</ul>';

		$inspiration = pwc_get_meta_value( $id, '_pwc_inspiration', array() );

		if( 'administrator' == $this->role ) {

			$this->output .= '<div class="inpiration-parent-wrap">';

				// Inspiration List
				$this->output .= '<div class="inspiration-wrap popup" data-config-id="'. esc_attr( $id ) .'">';

					// Inspiration List
					$this->output .= '<div class="inspiration-form">';

						$this->output .= '<span class="form-notice"></span>';

						$this->output .= '<div class="add-new-inspiration">';

							$this->output .= '<h3 class="title">'. esc_html__( 'Add New', 'product-woo-configurator' ) .'</h3>';

							$this->output .= '<div class="ins-field-group">';
								if( isset( $inspiration['group'] ) && !empty( $inspiration['group'] ) ) {
									$this->output .= '<select class="existing-group">';
										$this->output .= '<option value="0">'. esc_html__( 'Choose Group Name', 'product-woo-configurator' ) .'</option>';
										foreach ( $inspiration['group'] as $key => $group ) {
											$this->output .= '<option value="'. esc_attr( $group ) .'">'. esc_html( $group ) .'</option>';
										}
									$this->output .= '</select>';
								}
							$this->output .= '</div>';	

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-group" type="text"  placeholder="'. esc_attr__( 'Or Create New Group', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error group-error"></span>';
							$this->output .= '</div>';	

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-name" type="text" placeholder="'. esc_attr__( 'Inspiration Name', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error name-error"></span>';
							$this->output .= '</div>';					

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-desc" type="text" placeholder="'. esc_attr__( 'Description', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error"></span>';
							$this->output .= '</div>';

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-image" type="text" placeholder="'. esc_attr__( 'Image Url', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error"></span>';
							$this->output .= '</div>';

							$this->output .= '<div class="ins-field-btn">';
								$this->output .= '<a href="#" data-type="add-new" class="save-inspiration btn btn-md btn-solid btn-oval btn-primary btn-uppercase">'. esc_html__( 'Create', 'product-woo-configurator' ) .'</a>';
								$this->output .= '<a href="#" class="cancel-inspiration-form btn btn-md btn-solid btn-oval btn-black btn-uppercase">'. esc_html__( 'Cancel', 'product-woo-configurator' ) .'</a>';
							$this->output .= '</div>';

						$this->output .= '</div>';

						$this->output .= '<div class="update-inspiration">';

							$this->output .= '<h3 class="title">'. esc_html__( 'Update', 'product-woo-configurator' ) .'</h3>';

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-name" type="text" placeholder="'. esc_attr__( 'Inspiration Name', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error name-error"></span>';
							$this->output .= '</div>';					

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-desc" type="text" placeholder="'. esc_attr__( 'Description', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error"></span>';
							$this->output .= '</div>';

							$this->output .= '<div class="ins-field-group">';
								$this->output .= '<input class="ins-field custom-ins-image" type="text" placeholder="'. esc_attr__( 'Image Url', 'product-woo-configurator' ) .'">';
								$this->output .= '<span class="error"></span>';
							$this->output .= '</div>';

							$this->output .= '<div class="ins-field-btn">';
								$this->output .= '<a href="#" data-type="update" class="update-inspiration-list btn btn-md btn-solid btn-oval btn-gradient btn-uppercase">'. esc_html__( 'Update', 'product-woo-configurator' ) .'</a>';
								$this->output .= '<a href="#" class="cancel-inspiration-form btn btn-md btn-solid btn-oval btn-black btn-uppercase">'. esc_html__( 'Cancel', 'product-woo-configurator' ) .'</a>';
							$this->output .= '</div>';

						$this->output .= '</div>';

					$this->output .= '</div>'; // .inspiration-form

				$this->output .= '</div>'; // .inspiration-form

			$this->output .= '</div>'; // .inspiration-form
		}

		$this->output .= '<div id="share-wrap" class="share-popup-con popup">';
			$this->output .= '<div class="share-popup">';
				$this->output .= '<div class="close-icon close-popup"><i class="pwc-cross"></i></div>';	
				$this->output .= '<h2>'. esc_html__( 'Share your Creation', 'panorama' ) .'</h2>';
				$this->output .= '<p>'. esc_html__( 'Select how do you want to share', 'panorama' ) .'</p>';
				$this->output .= '<div class="share-icon-con">';

					$this->output .= '<div class="share-icon">
						<a href="#" class="icon link-bg copy-link"><i class="pwc-link"></i></a>
						<span class="icon-name">'. esc_html__( 'Copy the link', 'panorama' ) .'</span>
					</div>';

					$this->output .= '<div class="share-icon">
						<a href="https://www.facebook.com/sharer/sharer.php?u=" class="icon facebook-bg facebook-link"><i class="pwc-facebook"></i></a>
						<span class="icon-name">'. esc_html__( 'Facebook', 'panorama' ) .'</span>
					</div>';

					$this->output .= '<div class="share-icon">
						<a href="https://twitter.com/intent/tweet?url=" class="icon twitter-bg twitter-link"><i class="pwc-twitter"></i></a>
						<span class="icon-name">'. esc_html__( 'Twitter', 'panorama' ) .'</span>
					</div>';

					$this->output .= '<div class="share-icon">
						<a href="https://plus.google.com/share?url=" class="icon google-bg gplus-link"><i class="pwc-google-plus"></i></a>
						<span class="icon-name">'. esc_html__( 'Google Plus', 'panorama' ) .'</span>
					</div>';

					$this->output .= '<div class="share-icon">
						<a href="https://www.linkedin.com/shareArticle?url=" class="icon linkedin-bg linkedin-link"><i class="pwc-linkedin"></i></a>
						<span class="icon-name">'. esc_html__( 'Linkedin', 'panorama' ) .'</span>
					</div>';

					$this->output .= '<div class="share-icon">
						<a href="https://pinterest.com/pin/create/button/?url=" class="icon pinterest-bg pinterest-link"><i class="pwc-pinterest"></i></a>
						<span class="icon-name">'. esc_html__( 'Pinterest', 'panorama' ) .'</span>
					</div>';

				$this->output .= '</div>';

				$this->output .= '<span class="or">'. esc_html__( 'Or', 'panorama' ) .'</span>';
				$this->output .= '<h3>'. esc_html__( 'Copy the share link manually', 'panorama' ) .'</h3>';
				$this->output .= '<input type="text" name="" class="share-link-input">';
			
			$this->output .= '</div>';
		$this->output .= '</div>';

		//$this->output .= '<div id="zoom-image"></div>';

		// Base Image
		$this->output .= '<div id="configurator" class="banner">';

			$owl_class = ' class="owl-carousel"'; 
 
			$this->output .= '<div id="configurator-view"'. $owl_class .' data-nav="false">';

				$this->total_views = pwc_get_meta_value( $id, '_pwc_views', array( 'front'=> esc_html__( 'Front', 'product-woo-configurator' ) ) );

				foreach ( $this->total_views as $preview_key => $preview_key ) {

					/* Preview images */
					$this->output .= '<div id="pwc-'. esc_attr( $preview_key ) .'" class="pwc-preview-inner loading" data-type="'. esc_attr( $preview_key ) .'">';

						foreach ( $configuration_settings as $key => $value ) {	

							$single = '';
							if( isset( $value['single'] ) ) {
								$single = ( 'false' == $value['single'] || '' == $value['single']) ? 'false' : 'true';
							}

							$single_key = ( 'true' == $single ) ? $key : '';

							if( isset( $value[$preview_key]['image'] ) && !empty( $value[$preview_key]['image'] ) ) {

								if( !empty( $this->active_item ) ) {
									$active = in_array( $key, $this->active_item ) ? 'true' : 'false';
								}
								else {
									$active = $value['active'];
								}

								if( 'true' == $active ) {

									$src = pwc_get_image_by_id( 'full', 'full', $value[$preview_key]['image'], 1, 0 );
									$width   = $value[$preview_key]['width'];
									$height  = $value[$preview_key]['height'];
									$pos_x   = $value[$preview_key]['pos_x'];
									$pos_y   = $value[$preview_key]['pos_y'];
									$align_h = $value[$preview_key]['align_h'];
									$align_v = $value[$preview_key]['align_v'];
									$z_index   = $value[$preview_key]['z_index'];

									$data = ' data-align-h="' . esc_attr( $align_h ) . '" data-align-v="' . esc_attr( $align_v ) . '" data-offset-x="' . esc_attr( $pos_x ) . '" data-offset-y="' . esc_attr( $pos_y ) . '" data-width="' . esc_attr( $width ) . '" data-height="' . esc_attr( $height ) . '" data-z-index="' . esc_attr( $z_index ) . '"';

								
									$this->output .= '<div class="subset active" data-uid="'. esc_attr( $value['uid'] ) .'" data-single="'. esc_attr( $single_key ) .'" '. $data .'>
										<img src="'. esc_url( $src ).'" alt="" width="'. esc_attr( $width ) .'" height="'. esc_attr( $height ) .'">
									</div>';

									$this->active_key .= $key .', ';

								}

								if( 'true' == $value['active'] ) {
									$this->defaut_active_key .= $key . ', ';
								}

							}

							// hotspot
							if( isset( $value[$preview_key]['hs_enable'] ) && $value[$preview_key]['hs_enable'] == 'true' ) {

								$pos_x   = $value[$preview_key]['hs_pos_x'];
								$pos_y   = $value[$preview_key]['hs_pos_y'];
								$align_h = $value[$preview_key]['hs_align_h'];
								$align_v = $value[$preview_key]['hs_align_v'];

								$data = ' data-align-h="' . esc_attr( $align_h ) . '" data-align-v="' . esc_attr( $align_v ) . '" data-offset-x="' . esc_attr( $pos_x ) . '" data-offset-y="' . esc_attr( $pos_y ) . '"';

								$this->output .= '<div class="pwc-hotspot" id="hotspot-'. esc_attr( $preview_key ) .'-'. esc_attr( $value['uid'] ) .'" data-hotspot-uid="'. esc_attr( $value['uid'] ) .'"'. $data .'><span></span></div>';
							}

							if( isset( $value['values'] ) && !empty( $value['values'] ) ) {
								foreach ( $value['values'] as $sub_key => $val ) {

									if( isset( $val[$preview_key]['image'] ) && !empty( $val[$preview_key]['image'] ) ) {

										if( !empty( $this->active_item ) ) {
											$active = in_array( $sub_key, $this->active_item ) ? 'true' : 'false';
										}
										else {
											$active = $val['active'];
										}

										if( 'true' == $active ) {

											$sub_src = pwc_get_image_by_id( 'full', 'full', $val[$preview_key]['image'], 1, 0 );
											$sub_width  = $val[$preview_key]['width'];
											$sub_height = $val[$preview_key]['height'];
											$pos_x      = $val[$preview_key]['pos_x'];
											$pos_y      = $val[$preview_key]['pos_y'];
											$align_h    = $val[$preview_key]['align_h'];
											$align_v    = $val[$preview_key]['align_v'];
											$z_index    = $val[$preview_key]['z_index'];

											$data = ' data-align-h="' . esc_attr( $align_h ) . '" data-align-v="' . esc_attr( $align_v ) . '" data-offset-x="' . esc_attr( $pos_x ) . '" data-offset-y="' . esc_attr( $pos_y ) . '" data-width="' . esc_attr( $sub_width ) . '" data-height="' . esc_attr( $sub_height ) . '" data-z-index="' . esc_attr( $z_index ) . '"';

											$this->output .= '<div class="subset active" data-uid="'. esc_attr( $val['uid'] ) .'" data-parent-uid="'. esc_attr( $value['uid'] ) .'" data-single="'. esc_attr( $single_key ) .'" '. $data .'>
												<img src="'. esc_url( $sub_src ).'" alt="" width="'. esc_attr( $sub_width ) .'" height="'. esc_attr( $sub_height ) .'">
											</div>';

											$this->active_key .= $sub_key .', ';

										}

										if( 'true' == $val['active'] ) {
											$this->defaut_active_key .= $sub_key . ', ';
										}

									}

									// hotspot
									if( isset( $val[$preview_key]['hs_enable'] ) && $val[$preview_key]['hs_enable'] == 'true' ) {

										$pos_x   = $value[$preview_key]['hs_pos_x'];
										$pos_y   = $value[$preview_key]['hs_pos_y'];
										$align_h = $value[$preview_key]['hs_align_h'];
										$align_v = $value[$preview_key]['hs_align_v'];

										$data = ' data-align-h="' . esc_attr( $align_h ) . '" data-align-v="' . esc_attr( $align_v ) . '" data-offset-x="' . esc_attr( $pos_x ) . '" data-offset-y="' . esc_attr( $pos_y ) . '"';

										$this->output .= '<div class="pwc-hotspot" id="hotspot-'. esc_attr( $preview_key ) .'-'. esc_attr( $value['uid'] ) .'" data-hotspot-uid="'. esc_attr( $value['uid'] ) .'"'. $data .'><span></span></div>';
									}

									if( isset( $val['values'] ) && !empty( $val['values'] ) ) {
										$this->output .= $this->get_sub_layer_image( $single_key, $val['uid'], $preview_key, $val['values'] );
									}

								}
							}

						}

					$this->output .= '</div>'; // .pwc-preview-inner
				}

			$this->output .= '</div>'; // #configurator-view

			// Remove duplicate string
			if( !empty( $this->default_item ) ) {
				$key_string = $this->default_item;
			}
			else {
				$key_string = $this->remove_duplicate( $this->active_key );
			}

			if( !empty( $this->defaut_active_key ) ) {
				$reset_key_string = $this->remove_duplicate( $this->defaut_active_key );
			} else {
				$reset_key_string = '';
			}
			
			$this->output .= '<input id="default-active-key" type="hidden" value="'. esc_attr( $key_string ) .'">';
			$this->output .= '<input id="reset-active-key" type="hidden" value="'. esc_attr( $reset_key_string ) .'">';
			
		$this->output .= '</div>'; // #configurator

		if( !empty( $configuration_settings ) ) {

			$parent_optionset = pwc_random_string(4).'-'.pwc_random_string(4). '-default';

			$this->output .= '<div class="banner-list-con">';

				// primary options
				$this->output .= '<div class="banner-list-sec main-sec">';					

					$this->output .= '<ul class="banner-img-list" data-optionset="'. esc_attr( $parent_optionset ) .'">';

						foreach ( $configuration_settings as $key => $settings ) {

							$open_optionset = $settings['uid'] .'-'. $settings['name'] ;

							$hide_controls = ( isset( $settings['hide_control'] ) && $settings['hide_control'] == 'true' ) ? true : false;

								if( ! $hide_controls ) : // hide control condition started

								// Its only for parent ID to the parent element for grouping child element, its just dummy value
								$random = pwc_random_string(4).'-'.pwc_random_string(4);

								if( array_key_exists( $settings['uid'], $this->apply ) ) {
									foreach ( $this->apply[$settings['uid']] as $apply_key => $apply_value ) {
										
										$apply_data .= "data-selection-". $apply_key ."='". json_encode( $apply_value ) ."'";
									}
								}
								else {
									$apply_data = '';
								}

								if( array_key_exists( $settings['uid'], $this->action ) ) {
									foreach ( $this->action[$settings['uid']] as $action_key => $action_value ) {
										$action_data .= "data-action-". $action_key ."='". $action_value ."' ";
									}
								}
								else {
									$action_data = '';
								}


								$this->output .= "<li data-random='". esc_attr( $random ) ."' data-key='". esc_attr( $key ) ."' data-uid='". esc_attr( $settings['uid'] ) ."' ". $apply_data . $action_data ."class='banner-list-img'";

									// Title
									if( isset( $settings['name'] ) && !empty( $settings['name'] )) {
										$this->output .= "data-text='". esc_attr( $settings['name'] ) ."'";
									}

									// parent name it helps to trigger the subset
									if( ( isset( $settings['values'] ) && !empty( $settings['values'] ) ) && ( isset( $settings['name'] ) && !empty( $settings['name'] ) ) ) {

										$this->output .= "data-open-optionset='". esc_attr( $open_optionset ) ."'";
									}

									if( ! empty( $this->total_views ) ) {
										foreach ( $this->total_views as $preview_key => $preview_key ) {
											// Front
											$view_data['src']   = isset( $settings[$preview_key]['image'] ) ? pwc_get_image_by_id( 'full', 'full', $settings[$preview_key]['image'], 1, 0 ) : '';

											$view_data['width'] = isset( $settings[$preview_key]['width'] ) ? $settings[$preview_key]['width'] : '';

											$view_data['height'] = isset( $settings[$preview_key]['height'] ) ? $settings[$preview_key]['height'] : '';

											$view_data['pos_x'] = isset( $settings[$preview_key]['pos_x'] ) ? $settings[$preview_key]['pos_x'] : '';

											$view_data['pos_y'] = isset( $settings[$preview_key]['pos_y'] ) ? $settings[$preview_key]['pos_y'] : '';

											$view_data['align_h'] = isset( $settings[$preview_key]['align_h'] ) ? $settings[$preview_key]['align_h'] : '';

											$view_data['align_v'] = isset( $settings[$preview_key]['align_v'] ) ? $settings[$preview_key]['align_v'] : '';

											$view_data['z_index'] = isset( $settings[$preview_key]['z_index'] ) ? $settings[$preview_key]['z_index'] : '';

											if( !empty( $view_data['src'] ) ) {
												$this->output .= "data-". esc_attr( $preview_key ) ."='". json_encode( $view_data ) ."'";
												$this->output .= ' data-changeimage ';
											}
										}
									}

									$settings['price'] = ( empty( $settings['price'] ) ) ? '0' : '';
									$this->output .= "data-price='". esc_attr( $settings['price'] ) ."'";

								$this->output .= ">";

									if( isset( $settings['icon'] ) && !empty( $settings['icon'] ) ) {
										$this->output .= pwc_get_image_by_id( 65, 65, $settings['icon'], 0, 0 );
									}

									if( isset( $settings['description'] ) && !empty( $settings['description'] ) ) {
										$this->output .= '<div class="li-desc">'. esc_html( $settings['description'] ) .'</div>';
									}

									$this->output .= '<span class="li-loader"></span>';
									
								$this->output .= "</li>";

							endif;  // hide control condition ended

							// Pass parent id
							$parent_id[] = $settings['uid'];

						}

					$this->output .= '</ul>';

				$this->output .= '</div>'; // .banner-list-sec

				// Sub options
				$i = 0; 
				foreach ( $configuration_settings as $key => $settings ) {

					$multiple = ( 'false' == $settings['multiple'] || '' == $settings['multiple'] ) ? 'false' : 'true';
					$required = ( 'false' == $settings['required'] || '' == $settings['required']) ? 'false' : 'true';

					$single_key = '';

					if( isset( $settings['single'] ) ) {

						$single = ( 'false' == $settings['single'] || '' == $settings['single']) ? 'false' : 'true';
						$single_key = ( 'true' == $single ) ? $key : '';

					}				

					if( isset( $settings['values'] ) && !empty( $settings['values'] ) ) {
						$this->get_sub_options( $parent_optionset, $single_key, $multiple, $required, $parent_id[$i], $settings['name'], $settings['values'] );
					}
				$i++;}

			$this->output .= '</div>'; // .banner-list-con

		}

		$this->output .= '</div>';

		$this->output .= '<div class="left-position-content">';

			if( !empty( $inspiration ) ) {
				
				$this->output .= '<div class="more-product-con" data-config-id="'. esc_attr( $id ) .'">';

					$this->output .= '<h2 class="title">'. esc_html__( 'INSPIRATION', 'panorama' ) .'</h2>';

					$this->output .= '<a href="#" class="close-icon"><i class="pwc-cross"></i></a>';


					$this->output .= '<div class="more-product-list">';

						// Tab menu
						
						if( ! empty( $inspiration ) ) {

							if( isset( $inspiration['group'] ) ) {
								$this->output .= '<ul class="tab-menu">';
									foreach( $inspiration['group'] as $key => $group_name ) {

										$active = ( 0 == $key ) ? ' class="active"' : '';

										$this->output .= '<li'. $active .' data-anchor="'. esc_attr( strtolower( str_replace(' ', '-', $group_name ) ) ) .'">'. esc_html( $group_name );

											if( 'administrator' == $this->role ) {
												$this->output .= '<span class="delete-inspiration-group delete-btn" data-type="delete-group" data-group="'. esc_attr( $group_name ) .'" data-group-index="'. esc_attr( $key ) .'"><i class="icon '. apply_filters( 'pwc_icons', 'pwc-cross' ) .'"></i></span>';
											}

										$this->output .= '</li>';
										
									}
								$this->output .= '</ul>';// .tab-menu
							}
							
							$this->output .= '<div id="inspiration-con" class="tab-content">';

								if( !empty( $inspiration ) && isset( $inspiration['list'] ) ) {

									$j=0;
									foreach( $inspiration['list'] as $group => $value ){

										$current = isset( $inspiration['group'][0] ) && ( $group == $inspiration['group'][0] ) ? 'current' : '';

										$this->output .= '<div class="tab '. esc_attr( strtolower( str_replace(' ', '-', $group ) ) .' '.$current ) .'">';

											$this->output .= '<div class="product-con">';

												foreach( $value as $index => $list ) {

													$name  = isset( $list['name'] ) ? $list['name'] : '';
													$desc  = isset( $list['desc'] ) ? $list['desc'] : '';
													$image = isset( $list['image'] ) ? $list['image'] : '';
													$price = isset( $list['price'] ) ? $list['price'] : '';
													$key   = isset( $list['key'] ) ? $list['key'] : '';

													$val          = array();
													$val['index'] = $index;
													$val['name']  = $name;
													$val['desc']  = $desc;
													$val['group'] = $group;
													$val['image'] = $image;
													$val['price'] = $price;
													$val['key']   = $key;

													if( !empty( $name ) ) {
														$this->output .= "<div class='product ins-list' data-value='". json_encode( $val ) ."'>";

															if( ! empty( $image ) ) {
																$this->output .= '<div class="product-img">';
																	$this->output .= '<img src="'. esc_url( $image ) .'" alt="">';
																$this->output .= '</div>';
																
															}

															$this->output .= '<div class="content">';

																$this->output .= '<h2 class="title">'. esc_html( $name ) .'</h2>';
																if( !empty( $desc ) ) {
																	$this->output .= '<span class="text">'. esc_html( $desc ) .'</span>';
																}

																if( !empty( $price ) ) {
																	$this->output .= '<p class="price">'. esc_html( $price ) .'<span class="symbol"></span></p>';
																}

																$this->output .= '<a href="#" class="reset-components btn btn-md btn-solid btn-oval btn-primary btn-uppercase">'. esc_html__( 'Select', 'product-woo-configurator' ) .'</a>';

															$this->output .= '</div>';															

															if( 'administrator' == $this->role ) {
																$this->output .= '<div class="ins-icons">';
																	$this->output .= '<span class="update-form"><i class="icon pwc-pencil"></i></span>';
																	$this->output .= '<span data-type="reset" class="reset-inspiration"><i class="icon pwc-reload"></i></span>';
																	$this->output .= '<span data-type="delete" class="delete-inspiration"><i class="icon pwc-trash"></i></span>';
																$this->output .= '</div>';
															}

														$this->output .= '</div>';
													}
												}

											$this->output .= '</div>';

										$this->output .= '</div>'; // .tab-content
									$j++;}
								}

							$this->output .= '</div>'; // .tab-content
						}

					$this->output .= '</div>'; // .more-product-list



				$this->output .= '</div>'; // .more-product-con

			}
		$this->output .= '</div>'; // .left-position-content

		$this->output .= '<div class="right-icon-cart"><div class="right-icon-cart-inner">
			<div class="right-icon-cart-logo">';
				$cart_logo = get_option( 'panorama_cart_logo', '' );
				$cart_logo = str_replace( '\\', '', $cart_logo );
				$cart_logo = ! empty( $cart_logo ) ? json_decode( $cart_logo ) : '';

				if( empty( $cart_logo ) ) {
					$this->output .= '<a href="#" class="logo-white"><img src="'. PWCP_PLUGIN_URL .'/includes/assets/img/white-logo.png" alt=""></a>';
				}
				else {
					$cart_logo_url = ( null != $cart_logo[0]->itemId ) ? wp_get_attachment_image_src( $cart_logo[0]->itemId, 'full' ) : '';
					if( ! empty( $cart_logo_url[0] ) ) {
						$this->output .= '<a href="#" class="logo-white"><img src="'. esc_url( $cart_logo_url[0] ) .'" alt=""></a>';
					}
				}
				$this->output .= '<a href="#" class="close-icon"><i class="pwc-cross"></i></a>
			</div>';

			// Base price
			$base_price = pwc_get_meta_value( $id, '_pwc_base_price', '0' );

			$this->output .= '<div class="cart-list-con">';
				// Print data dynamically
				$this->output .= '<div id="cart-list-wrap">';

					if( ! empty( $base_price ) ) {
						$this->output .= '<div class="cart-list base-price">';
							$this->output .= '<div class="cart-item">';
								
								$this->output .= '<div class="cart-content">';
									$this->output .= '<h2 class="title">';
										$this->output .= '<span class="parent-title">'. esc_html__( 'Base Price', 'panorama' ) .'</span>';
									$this->output .= '</h2>';
									$this->output .= '<p class="price" data-price="'. esc_attr( $base_price ) .'">'. pwc_apply_currency_postion( $base_price ) .'</p>';
								$this->output .= '</div>';
								
							$this->output .= '</div>';
						$this->output .= '</div>';
					}
					

					foreach ( $configuration_settings as $key => $value ) {	

						$multiple = ( 'false' == $value['multiple'] || '' == $value['multiple'] ) ? 'false' : 'true';

						$single_key = '';

						if( isset( $settings['single'] ) ) {
							$single = ( 'false' == $value['single'] || '' == $value['single']) ? 'false' : 'true';
							$single_key = ( 'true' == $single ) ? $key : '';
						}
						
						if( isset( $value['values'] ) ) {

							$this->get_sidebar_content( $single_key, $value['uid'], $multiple, $value['name'], $value['values'] );
						}

					}

				$this->output .= '</div>';

				// Print total price dynamically
				$this->output .= '<div id="cart-price" data-base-price="'. esc_attr( $base_price ) .'"><div class="cart-price-inner">';

					$this->output .= '<div class="button">';
					
						$this->output .= '<p><span class="price"></span>'. $price_suffix_html .'</p>';

						$this->output .= '<div class="cart-icon">';
							$this->output .= '<a id="cart-btn-on-push" href="' . esc_url( $url ) . '" class="pwc-cart"></a>';
						$this->output .= '</div>';

					$this->output .= '</div>';

				$this->output .= '</div></div>';

			$this->output .= '</div>';

		$this->output .= '</div></div>';

		return $this->output;
	}

	public function get_sub_options( $open_optionset, $single_key, $multiple, $required, $parent_uid, $parent, $sub_values ) {

		$parent_optionset = $parent_uid .'-'. $parent;

		$single_data = !empty( $single_key ) ? 'data-single="'. esc_attr( $single_key ) .'"' : '';

		$this->output .= '<div class="banner-list-sec inner-sec hover-hide">';

			$this->output .= '<ul '. $single_data .' data-multiple="'. esc_attr( $multiple ) .'" data-required="'. esc_attr( $required ) .'" class="banner-img-list" data-optionset="'. esc_attr( $parent_optionset ) .'" data-text="'. esc_attr( $parent ) .'" data-parent-uid="'. esc_attr( $parent_uid ) .'">';

				$this->output .= '<li class="banner-list-img animated fadeOutUp" data-text="close" data-open-optionset="'. esc_attr( $open_optionset ) .'">
					<i class="closes pwc-thin-cross"></i>
				</li>';

				// Sub Values
				if( !empty( $sub_values ) ) {
					foreach ( $sub_values as $key => $value ) {

						$hide_controls = ( isset( $value['hide_control'] ) && $value['hide_control'] == 'true' ) ? true : false;

							if( ! $hide_controls ) : // hide control condition started

							if( ( !empty( $this->active_item ) && in_array( $key, $this->active_item ) ) ) {
								$class = 'current';
							}
							else if( empty( $this->active_item ) && 'true' == $value['active'] ) {
								$class = 'current';
							}
							else {
								$class = '';
							}

							if( array_key_exists( $value['uid'], $this->apply ) ) {
								foreach ( $this->apply[$value['uid']] as $apply_key => $apply_value ) {
									
									$apply_data .= "data-selection-". $apply_key ."='". json_encode( $apply_value ) ."'";
								}
							}
							else {
								$apply_data = '';
							}

							if( array_key_exists( $value['uid'], $this->action ) ) {
								foreach ( $this->action[$value['uid']] as $action_key => $action_value ) {
									$action_data .= "data-action-". $action_key ."='". $action_value ."' ";
								}
							}
							else {
								$action_data = '';
							}

							$this->output .= "<li data-key='". esc_attr( $key ) ."' data-uid='". esc_attr( $value['uid'] ) ."' ". $apply_data . $action_data ." class='banner-list-img animated fadeOutUp ". esc_attr( $class ) ."'";

								// Title
								if( isset( $value['name'] ) && !empty( $value['name'] )) {
									$this->output .= "data-text='". esc_attr( $value['name'] ) ."'";
								}

								// parent name it helps to trigger the subset
								if( ( isset( $value['values'] ) && !empty( $value['values'] ) ) && ( isset( $value['name'] ) && !empty( $value['name'] ) ) ) {

									$open_optionset = $value['uid'] .'-'. $value['name'] ;

									$this->output .= "data-open-optionset='". esc_attr( $open_optionset ) ."'";
								}

								if( ! empty( $this->total_views ) ) {
									foreach ( $this->total_views as $preview_key => $preview_key ) {
										$view_data['src']   = isset( $value[$preview_key]['image'] ) ? esc_url( pwc_get_image_by_id( 'full', 'full', $value[$preview_key]['image'], 1, 0 ) ) : '';

										$view_data['width'] = isset( $value[$preview_key]['width'] ) ? $value[$preview_key]['width'] : '';

										$view_data['height'] = isset( $value[$preview_key]['height'] ) ? $value[$preview_key]['height'] : '';

										$view_data['pos_x'] = isset( $value[$preview_key]['pos_x'] ) ? $value[$preview_key]['pos_x'] : '';

										$view_data['pos_y'] = isset( $value[$preview_key]['pos_y'] ) ? $value[$preview_key]['pos_y'] : '';

										$view_data['align_h'] = isset( $value[$preview_key]['align_h'] ) ? $value[$preview_key]['align_h'] : '';

										$view_data['align_v'] = isset( $value[$preview_key]['align_v'] ) ? $value[$preview_key]['align_v'] : '';

										$view_data['z_index'] = isset( $value[$preview_key]['z_index'] ) ? $value[$preview_key]['z_index'] : '';

										if( !empty( $view_data['src'] ) ) {
											$this->output .= "data-". esc_attr( $preview_key ) ."='". json_encode( $view_data ) ."'";
											$this->output .= ' data-changeimage ';
										}
									}
								}

								$value['price'] = empty( $value['price'] ) ? '0' : $value['price'];
								$this->output .= "data-price='". esc_attr( $value['price'] ) ."'";

							$this->output .= ">"; // li open tag

								// Icon
								if( isset( $value['icon'] ) && !empty( $value['icon'] ) ) {
									$this->output .= pwc_get_image_by_id( 65, 65, $value['icon'], 0, 0 );
								}

								if( isset( $value['description'] ) && !empty( $value['description'] ) ) {
									$this->output .= '<div class="li-desc">'. esc_html( $value['description'] ) .'</div>';
								}

								$this->output .= '<span class="li-loader"></span>';
								
							$this->output .= "</li>"; // li

						endif; // end of hide_control if

					}
				}

			$this->output .= '</ul>';

		$this->output .= '</div>';

		// Sub options
		foreach ( $sub_values as $key => $value ) {
			$multiple = ( 'false' == $value['multiple'] || '' == $value['multiple'] ) ? 'false' : 'true';
			$required = ( 'false' == $value['required'] || '' == $value['required'] ) ? 'false' : 'true';
			if( isset( $value['values'] ) && !empty( $value['values'] ) ) {
				$this->get_sub_options( $parent_optionset, $single_key, $multiple, $required, $value['uid'], $value['name'], $value['values'] );
			}
		}

		return $this->output;
	}

	public function get_sub_layer_image( $single_key, $parent_id, $preview_key, $value ){

		if( !empty( $value ) ) {
			foreach ( $value as $key => $subfield ) {
				if( isset( $subfield[$preview_key]['image'] ) && !empty( $subfield[$preview_key]['image'] ) ) {

					if( !empty( $this->active_item ) ) {
						$active = in_array( $key, $this->active_item ) ? 'true' : 'false';
					}
					else {
						$active = $subfield['active'];
					}

					if( 'true' ==  $active ) {
					
						$sub_src = pwc_get_image_by_id( 'full', 'full', $subfield[$preview_key]['image'], 1, 0 );
						$sub_width  = $subfield[$preview_key]['width'];
						$sub_height = $subfield[$preview_key]['height'];
						$pos_x      = $subfield[$preview_key]['pos_x'];
						$pos_y      = $subfield[$preview_key]['pos_y'];
						$align_h    = $subfield[$preview_key]['align_h'];
						$align_v    = $subfield[$preview_key]['align_v'];
						$z_index    = $subfield[$preview_key]['z_index'];

						$data = ' data-align-h="' . esc_attr( $align_h ) . '" data-align-v="' . esc_attr( $align_v ) . '" data-offset-x="' . esc_attr( $pos_x ) . '" data-offset-y="' . esc_attr( $pos_y ) . '" data-width="' . esc_attr( $sub_width ) . '" data-height="' . esc_attr( $sub_height ) . '" data-z-index="' . esc_attr( $z_index ) . '"';

						$this->output .= '<div class="subset active" data-uid="'. esc_attr( $subfield['uid'] ) .'" data-parent-uid="'. esc_attr( $parent_id ) .'" data-single="'. esc_attr( $single_key ) .'" '. $data .'>
							<img src="'. esc_url( $sub_src ).'" alt="" width="'. esc_attr( $sub_width ) .'" height="'. esc_attr( $sub_height ) .'">
						</div>';

						$this->active_key .= $key .', ';
					}

					if( 'true' == $subfield['active'] ) {
						$this->defaut_active_key .= $key . ', ';
					}
	                
	            }

	            // hotspot
				if( isset( $subfield[$preview_key]['hs_enable'] ) && $subfield[$preview_key]['hs_enable'] == 'true' ) {

					$pos_x   = $subfield[$preview_key]['hs_pos_x'];
					$pos_y   = $subfield[$preview_key]['hs_pos_y'];
					$align_h = $subfield[$preview_key]['hs_align_h'];
					$align_v = $subfield[$preview_key]['hs_align_v'];

					$data = ' data-align-h="' . esc_attr( $align_h ) . '" data-align-v="' . esc_attr( $align_v ) . '" data-offset-x="' . esc_attr( $pos_x ) . '" data-offset-y="' . esc_attr( $pos_y ) . '"';

					$this->output .= '<div class="pwc-hotspot" id="hotspot-'. esc_attr( $preview_key ) .'-'. esc_attr( $subfield['uid'] ) .'" data-hotspot-uid="'. esc_attr( $subfield['uid'] ) .'"'. $data .'><span></span></div>';
				}

				if( isset( $subfield['values'] ) ) {
                	$this->output .= $this->get_sub_layer_image( $single_key, $subfield['uid'], $preview_key, $subfield['values'] );
                }
			}
		}
	}

	public function get_sidebar_content( $single_key, $parent_uid, $multiple, $name, $values ){

		foreach ( $values as $key => $list ) {

			if( !empty( $this->active_item ) ) {
				$active = in_array( $key, $this->active_item ) ? 'true' : 'false';
			}
			else {
				$active = $list['active'];
			}

			if( empty( $single_key ) ) {
				$uid = ( 'false' == $multiple || '' == $multiple ) ? $parent_uid : $list['uid'];
			}
			else {
				$uid = $single_key;
			}
			

			if( 'true' == $active ) {

				$this->output .= '<div id="cart-list-'. esc_attr( $uid ).'" class="cart-list">';
					$this->output .= '<div class="cart-item">';
						if( !empty( $list['icon'] ) ) {
							$src = pwc_get_image_by_id( 'full', 'full', $list['icon'], 1, 0 );
							$this->output .= '<div class="cart-img"><img src="'. esc_attr( $src ) .'" alt=""></div>';
						}
						$this->output .= '<div class="cart-content">';
							$this->output .= '<h2 class="title">';
								if( !empty( $name ) ) {
									$this->output .= '<span class="parent-title">'. esc_html( $name ) .'</span>';
								}
								if( !empty( $list['name'] ) ) {
									$this->output .= '<span class="child-title text">'. esc_html( $list['name'] ) .'</span>';
								}
							$this->output .= '</h2>';
							$price = empty( $list['price'] ) ? '0' : $list['price'];
							$this->output .= '<p class="price" data-price="'. esc_attr( $price ) .'">'. pwc_apply_currency_postion( $price ) .'</p>';
						$this->output .= '</div>';
						$this->output .= '<span class="icon-add-close"></span>';
					$this->output .= '</div>';

					$this->output .= '<div class="content">';
						if( !empty( $list['description'] ) ) {
							$this->output .= '<p class="desc">'. esc_html( $list['description'] ) .'</p>';
						}		
						$this->output .= '<a href="#" data-parent-uid="'. esc_attr( $parent_uid ) .'" class="btn change-btn">'. esc_html__( 'Change', 'panorama' ) .'</a>';
						$this->output .= '<a href="#" data-uid="'. esc_attr( $list['uid'] ) .'" class="btn remove-btn">'. esc_html__( 'Remove', 'panorama' ) .'</a>';
					$this->output .= '</div>';

				$this->output .= '</div>';
			}

			if( isset( $list['values'] ) ) {

				$this->get_sidebar_content( $single_key, $list['uid'], $list['multiple'], $list['name'], $list['values'] );
			}

		}
	}

	public function remove_duplicate( $string ){

		$string = str_replace(' ', '', $string );

		$array = explode( ',', $string );
		$array = array_unique(array_filter($array));

		$string = implode(',', $array);

		return $string;
	}

	/**
	 * Save Inspiration Meta box values via ajax
	 */
	public function save_inspiration() {

		// Get current user role
		$role = function_exists( 'pwc_user_role' ) ? pwc_user_role() : 'editor';

		$type        = isset( $_POST['type'] ) ? $_POST['type'] : '';
		$values      = isset( $_POST['values'] ) ? $_POST['values'] : '';
		$id          = isset($values['configurator_id']) ? $values['configurator_id'] : '';
		$index       = isset($values['index']) ? $values['index'] : '';
		$group_index = isset($values['group-index']) ? $values['group-index'] : '';
		$group       = isset($values['group']) ? $values['group'] : '';
		$name        = isset($values['name']) ? $values['name'] : '';
		$desc        = isset($values['desc']) ? $values['desc'] : '';
		$image       = isset($values['image']) ? $values['image'] : '';
		$key         = isset($values['key']) ? $values['key'] : '';
		$price       = isset($values['price']) ? $values['price'] : '';

		echo '<div id="ajax-inspiration-data">';

			$old_val = pwc_get_meta_value( $id, '_pwc_inspiration', array() );

			// Empty assignment
			$values = $list = $all_group = $all_list = array();

			if( 'add-new' == $type ) {

				$list['name']  = $name;
				$list['desc']  = $desc;
				$list['image'] = $image;
				$list['key']   = $key;
				$list['price'] = $price;

				$old_group = isset( $old_val['group'] ) && ! empty( $old_val['group'] ) ? $old_val['group'] : array();
				$old_list_item = isset( $old_val['list'][$group] ) && ! empty( $old_val['list'][$group] ) ? $old_val['list'][$group] : array();
				$old_list = isset( $old_val['list'] ) && ! empty( $old_val['list'] ) ? $old_val['list'] : array();

				$all_list[$group] = array_merge( $old_list_item, array( $list ) );

				$all_group = array_merge( $old_group, array( $group ) );
				$all_list = array_filter( array_merge( $old_list, $all_list ) );

				$values['group'] = array_unique( $all_group );
				$values['list'] = $all_list;

				if( !empty( $name ) && !empty( $group ) ) {
					update_post_meta( $id, '_pwc_inspiration', $values );
					echo '<div id="ins-data" data-error="false">';
						echo '<span class="success">'. esc_html__( 'Created Successfully', 'configurator' ) .'</span>';
					echo '</div>';
				}
				else {
					echo '<div id="ins-data" data-error="true">';
						if( empty( $name ) ) {
							echo '<span class="name-error">'. esc_html__( 'Please type the inspiration name', 'configurator' ) .'</span>';
						}
						if( empty( $group ) ) {
							echo '<span class="group-error">'. esc_html__( 'Please type the group name', 'configurator' ) .'</span>';
						}
					echo '</div>';
				}

			}
			else if( 'reset' == $type ) {
				$old_list = isset( $old_val['list'][$group] ) && ! empty( $old_val['list'][$group] ) ? array_filter( $old_val['list'][$group] ) : array();

				$old_list[$index]['key']   = $key;
				$old_list[$index]['price'] = $price;

				$old_val['list'][$group] = array_values( $old_list );
				
				if( 0 == $index || !empty( $index ) ) {
					update_post_meta( $id, '_pwc_inspiration', $old_val );
					echo '<div id="ins-data" data-error="false">';
						echo '<span class="success">'. esc_html__( 'Overwrite Successfully', 'configurator' ) .'</span>';
					echo '</div>';
				}
				else {
					echo '<div id="ins-data" data-error="true">';
						echo '<span class="error">'. esc_html__( 'Please choose the item to replace', 'configurator' ) .'</span>';
					echo '</div>';
				}
			}
			else if( 'update' == $type ) {
				$old_list = isset( $old_val['list'][$group] ) && ! empty( $old_val['list'][$group] ) ? array_filter( $old_val['list'][$group] ) : array();

				$old_list[$index]['name']  = $name;
				$old_list[$index]['desc']  = $desc;
				$old_list[$index]['image'] = $image;

				$old_val['list'][$group] = array_values( $old_list );
				
				if( 0 == $index || !empty( $index ) ) {
					update_post_meta( $id, '_pwc_inspiration', $old_val );
					echo '<div id="ins-data" data-error="false">';
						echo '<span class="success">'. esc_html__( 'Update Successfully', 'configurator' ) .'</span>';
					echo '</div>';
				}
				else {
					echo '<div id="ins-data" data-error="true">';
						echo '<span class="error">'. esc_html__( 'Please choose the item to replace', 'configurator' ) .'</span>';
					echo '</div>';
				}
			}
			else if( 'delete' == $type ) {
				
				$old_list = isset( $old_val['list'][$group] ) && ! empty( $old_val['list'][$group] ) ? array_filter( $old_val['list'][$group] ) : array();

				unset( $old_list[$index]);

				$old_val['list'][$group] = array_values( $old_list );

				if( 0 == $index || !empty( $index ) ) {
					update_post_meta( $id, '_pwc_inspiration', $old_val );
					echo '<div id="ins-data" data-error="false">';
						echo '<span class="success">'. esc_html__( 'Deleted Successfully', 'configurator' ) .'</span>';
					echo '</div>';
				}
				else {
					echo '<div id="ins-data" data-error="true">';
						echo '<span class="error">'. esc_html__( 'Please choose the item to delete', 'configurator' ) .'</span>';
					echo '</div>';
				}
			}
			else if( 'delete-group' == $type ) {

				unset( $old_val['group'][$group_index]);
				$old_val['group'] = array_values( $old_val['group'] );
				
				$old_group = isset( $old_val['list'] ) && ! empty( $old_val['list'] ) ? $old_val['list'] : array();
				unset( $old_group[$group]);
				$old_val['list'] = array_values( $old_group );

				if( 0 == $group_index || !empty( $group_index ) ) {
					update_post_meta( $id, '_pwc_inspiration', $old_val );
					echo '<div id="ins-data" data-error="false">';
						echo '<span class="success">'. esc_html__( 'Group Deleted Successfully', 'configurator' ) .'</span>';
					echo '</div>';
				}
				else {
					echo '<div id="ins-data" data-error="true">';
						echo '<span class="error">'. esc_html__( 'Please choose the group to delete', 'configurator' ) .'</span>';
					echo '</div>';
				}
			}
			

			// Get inspiration list
			$inspiration = pwc_get_meta_value( $id, '_pwc_inspiration', array() );

			// Inspiration Tab
			echo '<div class="more-product-list tab">';

				// Build Group array
				$lists = array();
				foreach ( $inspiration['list'] as $key => $list ) {
					// $lists[] = $list['group'];
				}

				$lists = array_unique( $lists );

				// Tab menu
				
				if( ! empty( $inspiration ) ) {

					if( isset( $inspiration['group'] ) ) {
						echo '<ul class="tab-menu">';
							$i=0;
							foreach( $inspiration['group'] as $key => $group_name ) {

								$active = ( 0 == $i ) ? ' class="active"' : '';

								echo '<li'. $active .' data-anchor="'. esc_attr( strtolower( str_replace(' ', '-', $group_name ) ) ) .'">'. esc_html( $group_name );

									if( 'administrator' == $this->role ) {
										echo '<span class="delete-inspiration-group delete-btn" data-type="delete-group" data-group="'. esc_attr( $group_name ) .'" data-group-index="'. esc_attr( $key ) .'"><i class="icon '. apply_filters( 'pwc_icons', 'pwc-cross' ) .'"></i></span>';
									}

								echo '</li>';
								
							$i++;}
						echo '</ul>';// .tab-menu
					}

					echo '<div id="inspiration-con" class="tab-content">';

						if( !empty( $inspiration ) && isset( $inspiration['list'] ) ) {

							$j=0;
							foreach( $inspiration['list'] as $group => $value ){

								$current = ( 0 == $j ) ? 'current' : '';

								echo '<div class="tab '. esc_attr( strtolower( str_replace(' ', '-', $group ) ) .' '.$current ) .'">';

									echo '<div class="product-con">';

										foreach( $value as $index => $list ) {

											$name  = isset( $list['name'] ) ? $list['name'] : '';
											$desc  = isset( $list['desc'] ) ? $list['desc'] : '';
											$image = isset( $list['image'] ) ? $list['image'] : '';
											$price = isset( $list['price'] ) ? $list['price'] : '';
											$key   = isset( $list['key'] ) ? $list['key'] : '';

											$val          = array();
											$val['index'] = $index;
											$val['name']  = $name;
											$val['desc']  = $desc;
											$val['group'] = $group;
											$val['image'] = $image;
											$val['price'] = $price;
											$val['key']   = $key;

											if( !empty( $name ) ) {
												echo "<div class='product ins-list' data-value='". json_encode( $val ) ."'>";

													if( ! empty( $image ) ) {
														echo '<div class="product-img">';
															echo '<img src="'. esc_url( $image ) .'" alt="">';
														echo '</div>';
														
													}

													echo '<div class="content">';

														echo '<h2 class="title">'. esc_html( $name ) .'</h2>';
														if( !empty( $desc ) ) {
															echo '<span class="text">'. esc_html( $desc ) .'</span>';
														}

														if( !empty( $price ) ) {
															echo '<p class="price">'. esc_html( $price ) .'<span class="symbol"></span></p>';
														}

														echo '<a href="#" class="reset-components btn btn-md btn-solid btn-oval btn-primary btn-uppercase">'. esc_html__( 'Select', 'product-woo-configurator' ) .'</a>';

													echo '</div>';															

													if( 'administrator' == $this->role ) {
														echo '<div class="ins-icons">';
															echo '<span class="update-form"><i class="icon pwc-pencil"></i></span>';
															echo '<span data-type="reset" class="reset-inspiration"><i class="icon pwc-reload"></i></span>';
															echo '<span data-type="delete" class="delete-inspiration"><i class="icon pwc-trash"></i></span>';
														echo '</div>';
													}

												echo '</div>';
											}
										}

									echo '</div>';

								echo '</div>'; // .tab-content
							$j++;}
						}

					echo '</div>'; // .tab-content
				}

			echo '</div>'; // .more-product-list

		echo '</div>'; // #ajax-inspiration-data

		die();
	}
}

return new PWC_Panorama_Shortcode();