<?php

class Product_Wishlist {

	public function __construct(){
		add_action('wp_enqueue_scripts', array($this, 'amz_wishlist_scripts'));
		add_action("wp_ajax_woo_wishlist", array($this,"amz_update_wishlist"));
		add_action("wp_ajax_nopriv_woo_wishlist", array($this,"amz_update_wishlist"));
	}

	//enqueue all required scripts
	public function amz_wishlist_scripts() {
		wp_enqueue_script( 'amz-wishlist-js', CONFIGURATOR_EXTRAS_URI .'/amz-wishlist/js/wishlist.js', array( 'jquery' ), '1.0', true);
		wp_localize_script( 'amz-wishlist-js', 'wishlist',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'no_item_text' => esc_html__( 'No wishlist found', 'configurator' )
			)
		);
	}

	public function amz_update_wishlist() {

		$post_id = isset($_POST['postid']) ? $_POST['postid'] : NULL;

		//If postid empty or null
		if( $post_id == NULL || get_post_type( $post_id ) != 'product' ) die();

		// Get cookie
		$wishlist = ( isset( $_COOKIE['amz-wishlist-items'] ) ) ?  json_decode( str_replace( '\"', '"', $_COOKIE['amz-wishlist-items'] ), true ) : array();

		// Check already exit
		if( ! empty( $wishlist ) && in_array( $post_id, $wishlist ) ) {

			$response['count'] = count( $wishlist ) - 1;
			$this->remove_item( $post_id, $wishlist ); //removing item from cookie
			$response['status'] = 0;

		} else {

			$response['count'] = count( $wishlist ) + 1;
			$this->add_item( $post_id, $wishlist ); //adding item from cookie
			$response['status'] = 1;

		}

		echo json_encode( $response );

		die();
	}

	// Add to wishlist
	private function add_item( $post_id, $wishlist ){
		$wishlist[] = $post_id;
		wc_setcookie( "amz-wishlist-items", json_encode( stripslashes_deep( $wishlist ) ), strtotime( '+30 days' ), false );
	}

	// Remove from wishlist
	private function remove_item( $post_id, $wishlist ) {

		$to_remove = array( $post_id );
		$new_wishlist = array_diff( $wishlist, $to_remove );
		wc_setcookie( "amz-wishlist-items", json_encode( stripslashes_deep( $new_wishlist ) ), strtotime( '+30 days' ), false );

	}
}

// instantiate class
$GLOBALS['amz_wishlist'] = new Product_Wishlist ();