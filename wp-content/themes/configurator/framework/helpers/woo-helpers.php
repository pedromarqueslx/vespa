<?php

	//Woo cart
	if( !function_exists( 'configurator_woo_cart' ) ) {
		function configurator_woo_cart(){

			echo '<div class="header-elem">';
				echo '<div class="pix-cart">';

					echo '<div class="cart-trigger">';
						echo '<div class="pix-cart-contents-con">';                 
							echo '<a class="pix-cart-contents" href="'. esc_url( wc_get_cart_url() ) .'" title="'. esc_html__( 'View your shopping cart', 'configurator' ) .'">';
								echo '<span class="ct-cart-icon pix-cart-icon"></span><span class="pix-item-icon">'. esc_html( WC()->cart->cart_contents_count ) .'</span>';
							echo '</a>';
						echo '</div>';

						if( !is_cart() && !is_checkout()){
							//Dropwon widget 
							echo '<div class="woo-cart-dropdown">';
								echo '<div class="woo-cart-content">';
									woocommerce_mini_cart();
								echo '</div>';
							echo '</div>';
						}

					echo '</div>';

				echo '</div>';
			echo '</div>';

		}
	}

	add_filter( 'loop_shop_per_page', 'configurator_products_per_page');
	if( !function_exists( 'configurator_products_per_page' ) ) {
		function configurator_products_per_page() {

			$shop_count = get_theme_mod( 'shop_items', 8 );
			
			return $shop_count;
		}
	}

	// Disable woocommerce css
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	add_filter( 'woocommerce_output_related_products_args', 'configurator_related_products_args' );
	if( !function_exists( 'configurator_related_products_args' ) ) {
		function configurator_related_products_args( $args ) {
			$prefix = configurator_get_prefix();
			$args['posts_per_page'] = get_theme_mod( $prefix.'related_items', 3 );
			$args['order'] = get_theme_mod( $prefix.'related_order', 'desc' );
			$args['orderby'] = get_theme_mod( $prefix.'related_orderby', 'date' );
			return $args;
		}
	}

	//Reposition WooCommerce breadcrumb
	if( !function_exists( 'configurator_woocommerce_remove_breadcrumb' ) ) { 
		function configurator_woocommerce_remove_breadcrumb(){
			remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
		}
	}
	add_action('woocommerce_before_main_content', 'configurator_woocommerce_remove_breadcrumb');

	if( !function_exists( 'configurator_woocommerce_custom_breadcrumb' ) ) { 
		function configurator_woocommerce_custom_breadcrumb(){
			woocommerce_breadcrumb();
		}
	}
	add_action( 'woo_custom_breadcrumb', 'configurator_woocommerce_custom_breadcrumb' );

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

	remove_action( 'woocommerce_after_single_product', 'woocommerce_template_loop_add_to_cart', 10);
	
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);

	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter('woocommerce_add_to_cart_fragments', 'configurator_woocommerce_header_add_to_cart_fragment');
	if( !function_exists( 'configurator_woocommerce_header_add_to_cart_fragment' ) ) { 
		function configurator_woocommerce_header_add_to_cart_fragment( $fragments ) {
			
			ob_start();

			echo '<div class="pix-cart-contents-con">';             
				echo '<a class="pix-cart-contents" href="'. esc_url( wc_get_cart_url() ) .'" title="'. esc_html__('View your shopping cart', 'configurator' ) .'"><span class="ct-cart-icon pix-cart-icon"></span><span class="pix-item-icon">'. esc_html( WC()->cart->cart_contents_count ) .'</span></a>';
			echo '</div>';
			
			$fragments['div.pix-cart-contents-con'] = ob_get_clean();
			
			return $fragments;
			
		}
	}

	add_filter( 'loop_shop_columns', 'configurator_loop_columns' );
	if ( !function_exists( 'configurator_loop_columns' ) ) {
		function configurator_loop_columns() {
			return 4; // 3 products per row
		}
	}

		// Ajax Remove cart
	if ( ! function_exists( 'configurator_flyin_cart_remove_item' ) ) {
		function configurator_cart_remove_item() {

			$item_key = $_POST['item_key'];
			$cart = WC()->instance()->cart;
			$removed = $cart->remove_cart_item( $item_key );

			if( $removed ) {

				echo '<div>';
					// status
					echo '<div id="status">1</div>';

					// Woo Notice
					echo '<div id="amz-wc-notice">';
						wc_print_notices();
					echo '</div>';

					// Header Cart Count
					echo '<div id="amz-cart-count">'. intval( WC()->cart->cart_contents_count ) .'</div>';

					// Updated mini cart
					echo '<div id="amz-mini-cart">';
						woocommerce_mini_cart();
					echo '</div>';
				echo '</div>';

			} else {	
				// status
				echo '<div><div id="status">0</div></div>';
			}

			die();

		}
	}
	add_action( 'wp_ajax_nopriv_configurator_cart_remove_item', 'configurator_cart_remove_item' );
	add_action( 'wp_ajax_configurator_cart_remove_item', 'configurator_cart_remove_item' );

	function configurator_update_mini_cart() {
		woocommerce_mini_cart();

		die();
	}
	add_filter( 'wp_ajax_nopriv_configurator_update_mini_cart', 'configurator_update_mini_cart' );
	add_filter( 'wp_ajax_configurator_update_mini_cart', 'configurator_update_mini_cart' );

	// Customize WooCommerce Checkout Field
	function configurator_woocommerce_checkout_fields( $fields = array() ) {

		// Billing: First name
		$fields['billing']['billing_first_name']['placeholder'] = esc_attr_x( 'First Name', 'placeholder', 'configurator' );
		$fields['billing']['billing_first_name']['class'] = array( 'form-row-first' );
		$fields['billing']['billing_first_name']['priority'] = 10;

		// Billing: Last name
		$fields['billing']['billing_last_name']['placeholder'] = esc_attr_x( 'Last Name', 'placeholder', 'configurator' );
		$fields['billing']['billing_last_name']['class'] = array( 'form-row-last' );
		$fields['billing']['billing_last_name']['priority'] = 20;

	    // Billing: Company Name
	    $fields['billing']['billing_company']['placeholder'] = esc_attr_x( 'Company Name', 'placeholder', 'configurator' );
		$fields['billing']['billing_company']['class'] = array( 'form-row-wide' );
		$fields['billing']['billing_company']['priority'] = 30;

	    // Billing: Town / City
	    $fields['billing']['billing_city']['placeholder'] = esc_attr_x( 'Town / City', 'placeholder', 'configurator' );
		$fields['billing']['billing_city']['class'] = array( 'form-row-wide' );
		$fields['billing']['billing_city']['priority'] = 70;

	    // Billing: ZIP
	    $fields['billing']['billing_postcode']['placeholder'] = esc_attr_x( 'ZIP', 'placeholder', 'configurator' );
		$fields['billing']['billing_postcode']['class'] = array( 'form-row-wide' );
		$fields['billing']['billing_postcode']['priority'] = 90;

	    // Billing: Phone
	    $fields['billing']['billing_phone']['placeholder'] = esc_attr_x( 'Phone', 'placeholder', 'configurator' );
		$fields['billing']['billing_phone']['class'] = array( 'form-row-first' );
		$fields['billing']['billing_phone']['priority'] = 100;

	    // Billing: Email Address
	    $fields['billing']['billing_email']['placeholder'] = esc_attr_x( 'Email Address', 'placeholder', 'configurator' );
		$fields['billing']['billing_email']['class'] = array( 'form-row-last' );
		$fields['billing']['billing_email']['priority'] = 110;

	    // Shipping: First name
		$fields['shipping']['shipping_first_name']['placeholder'] = esc_attr_x( 'First Name', 'placeholder', 'configurator' );
		$fields['shipping']['shipping_first_name']['class'] = array('form-row-first');

	    // Shipping: Last name
	    $fields['shipping']['shipping_last_name']['placeholder'] = esc_attr_x( 'Last Name', 'placeholder', 'configurator' );
		$fields['shipping']['shipping_last_name']['class'] = array('form-row-last');

	    // Shipping: Company Name
	    $fields['shipping']['shipping_company']['placeholder'] = esc_attr_x( 'Company Name', 'placeholder', 'configurator' );
		$fields['shipping']['shipping_company']['class'] = array('form-row-wide');

		// Shipping: Town / City
		$fields['shipping']['shipping_city']['placeholder'] = esc_attr_x( 'Town / City', 'placeholder', 'configurator' );
		$fields['shipping']['shipping_city']['class'] = array('form-row-wide');

	    // Shipping: ZIP
	    $fields['shipping']['shipping_postcode']['placeholder'] = esc_attr_x( 'ZIP', 'placeholder', 'configurator' );
		$fields['shipping']['shipping_postcode']['class'] = array('form-row-wide');

	    return $fields;
	}
	add_filter('woocommerce_checkout_fields','configurator_woocommerce_checkout_fields');


    function configurator_woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => '',
                'wrap_before' => '',
                'wrap_after'  => '',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'configurator' ),
            );
    }
    add_filter( 'woocommerce_breadcrumb_defaults', 'configurator_woocommerce_breadcrumbs' );

    if( !function_exists( 'configurator_apply_currency_postion' ) ) {
	    function configurator_apply_currency_postion( $price, $cur = '$' ) {
			$currency_pos = get_option('woocommerce_currency_pos');

			if( function_exists( 'get_woocommerce_currency_symbol' ) ) {

				if( 'left' == $currency_pos ) {
					return get_woocommerce_currency_symbol() . $price;
				} elseif ( 'right' == $currency_pos ) {
					return $price . get_woocommerce_currency_symbol();
				} elseif ( 'left_space' == $currency_pos ) {
					return get_woocommerce_currency_symbol() . ' ' . $price;
				} elseif ( 'right_space' == $currency_pos ) {
					return $price . ' ' . get_woocommerce_currency_symbol();
				} else {
					return get_woocommerce_currency_symbol() . $price;
				}
			
			} else {
				return $cur . $price;
			}	

		}
	}

	if( !function_exists( 'configurator_product_reviews_tab_title' ) ) {
		function configurator_product_reviews_tab_title ( $title, $key ) { 

			global $product;

			if( 'reviews' == $key ) {
				$title = __( 'Reviews', 'configurator' ) . '<span>'. $product->get_review_count() . '</span>';
			}

			return $title;
		}
	}
	add_filter( 'woocommerce_product_reviews_tab_title', 'configurator_product_reviews_tab_title', 10, 2 );