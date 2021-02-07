<?php

/**
 * Pixel8es Header
 *
 * Functions for the Theme Header.
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Funtions Required For Header
 *
 * @return required meta tags and link tags for favicon, Apple Touch Icon etc
 */

if ( ! function_exists( 'configurator_head' ) ) {

	function configurator_head() { 
		global $smof_data, $configurator_theme_pri_color;

		$mobile_responsive = isset( $smof_data['responsive'] ) ? $smof_data['responsive'] : 'yes';

		if ( 'yes' === $mobile_responsive ) : ?>

			<meta name="HandheldFriendly" content="True">
			<meta name="MobileOptimized" content="320">
			<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0"/>

		<?php
		endif;

		// Apple Touch Icon
		if ( isset( $smof_data['apple_touch_icon'] ) && !empty( $smof_data['apple_touch_icon'] ) ) : ?>
			<link rel="apple-touch-icon" href="<?php echo esc_url($smof_data['apple_touch_icon']); ?>">		
		<?php
		endif;

		/* FavIcon */
		if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
			if ( isset( $smof_data['fav_icon'] ) && ! empty( $smof_data['fav_icon'] ) ) {
				echo '<link rel="shortcut icon" href="'.esc_url($smof_data['fav_icon']).'">';
			}
		}

		/* Window Tile Icon */
		if ( isset( $smof_data['win_tile_icon'] ) && ! empty( $smof_data['win_tile_icon'] ) ) : ?>
			<meta name="msapplication-TileColor" content="<?php echo esc_attr( $configurator_theme_pri_color ); ?>">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/_images/win8-tile-icon.png">
		<?php 
		endif;

		// For Android L header
		?>		
		<meta name="theme-color" content="<?php echo esc_attr( $configurator_theme_pri_color ); ?>">
		<?php
	}

}

/*------------[ Wp Head ]-------------*/
if ( ! function_exists( 'configurator_wphead' ) ){

	function configurator_wphead() {
		global $smof_data;

		// Custom CSS from ThemeOptions
		if( isset( $smof_data['custom_css'] ) && ! empty( $smof_data['custom_css'] ) ){
			echo '<style>'. $smof_data['custom_css'] . '</style>';
		}

	}

	add_action('wp_head', 'configurator_wphead');

}


/* =============================================================================
Page Headers
========================================================================== */
//Social Icons
function configurator_social_icons( $icons ) {

	$facebook  = get_theme_mod( 'facebook', '' );
	$twitter   = get_theme_mod( 'twitter', '' );
	$gplus     = get_theme_mod( 'gplus', '' );
	$linkedin  = get_theme_mod( 'linkedin', '' );
	$dribbble  = get_theme_mod( 'dribbble', '' );
	$flickr    = get_theme_mod( 'flickr', '' );
	$pinterest = get_theme_mod( 'pinterest', '' );
	$tumblr    = get_theme_mod( 'tumblr', '' );
	$rss       = get_theme_mod( 'rss', '' );
	$instagram = get_theme_mod( 'instagram', '' );

	$social_icons = '';

	switch ( $icons ) {

		case 'facebook':
			if( !empty( $facebook ) ) {
				$social_icons .= '<a href="'. esc_url( $facebook ) .'" target="_blank" class="facebook"><i class="ct-facebook"></i></a>';
			}
		break;

		case 'twitter':
			if( !empty( $twitter ) ) {
				$social_icons .= '<a href="'. esc_url( $twitter ) .'" target="_blank" class="twitter"><i class="ct-twitter"></i></a>';
			}
		break;

		case 'gplus':
			if( !empty( $gplus ) ) {
				$social_icons .= '<a href="'. esc_url( $gplus ) .'" target="_blank" class="google-plus"><i class="ct-google-plus"></i></a>';
			}
		break;

		case 'linkedin':
			if( !empty( $linkedin ) ) {
				$social_icons .= '<a href="'. esc_url( $linkedin ) .'" target="_blank" class="linkedin"><i class="ct-linkedin"></i></a>';
			}
		break;

		case 'dribbble':
			if( !empty( $dribbble ) ) {
				$social_icons .= '<a href="'. esc_url( $dribbble ) .'" target="_blank" class="dribbble"><i class="ct-dribbble"></i></a>';
			}
		break;

		case 'flickr':
			if( !empty( $flickr ) ) {
				$social_icons .= '<a href="'. esc_url( $flickr ) .'" target="_blank" class="flickr"><i class="ct-flickr"></i></a>';
			}
		break;

		case 'pinterest':
			if( !empty( $pinterest ) ) {
				$social_icons .= '<a href="'. esc_url( $pinterest ) .'" target="_blank" class="pinterest"><i class="ct-pinterest"></i></a>';
			}
		break;

		case 'tumblr':
			if( !empty( $tumblr ) ) {
				$social_icons .= '<a href="'. esc_url( $tumblr ) .'" target="_blank" class="tumblr"><i class="ct-tumblr"></i></a>';
			}
		break;

		case 'rss':
			if( !empty( $rss ) ) {
				$social_icons .= '<a href="'. esc_url( $rss ) .'" target="_blank" class="rss"><i class="ct-rss"></i></a>';
			}
		break;

		case 'instagram':
			if( !empty( $instagram ) ) {
				$social_icons .= '<a href="'. esc_url( $instagram ) .'" target="_blank" title="Instagram" class="instagram"><i class="ct-instagram"></i></a>';
			}
		break;
		
		default:
		break;
	}

	return $social_icons;
}

function configurator_social_icons_order() {
	$output = '';
	
	$social_icons_order = get_theme_mod( 'social_icons', array( 'facebook', 'twitter', 'gplus', 'linkedin', 'dribbble', 'flickr', 'pinterest', 'tumblr', 'rss', 'instagram' ) );
	
	foreach ( $social_icons_order as $key => $icon ) {
		$output .= configurator_social_icons( $icon );
	}

	return $output;
}

// Header Search
function configurator_header_search() {

	$search_text = get_theme_mod( 'search_text', esc_attr__( 'Search', 'configurator' ) );

	$form = '<div class="search-btn"><i class="ct-search search-icon"></i><form method="get" class="topSearchForm" action="' . esc_url( home_url( '/' ) ) . '" ><input type="text" value="' . esc_attr( get_search_query() ) . '" name="s" class="textfield" placeholder="'. esc_attr( $search_text ) .'" autocomplete="off"></form></div>';

	return $form;
}


/*------------[ Header Elements ]-------------*/
function configurator_display_elements( $elems ) {

	if( $elems == 'wishlist' ){

		$wishlist_count = isset( $GLOBALS['amz_wishlist_items'] ) ? count( $GLOBALS['amz_wishlist_items'] ) : '0'; 
		$wishlist_page = get_theme_mod( 'wishlist_page_id', '' );

		if( ! empty( $wishlist_page ) ) {
			echo '<div class="header-elem">';
				echo '<div class="wishlist">';

					if( !empty( $wishlist_page ) ) {
						$url = get_permalink( $wishlist_page );
					}
					else {
						$url = get_permalink( home_url( '/' ) );
					}
					
					echo '<a class="" href="'. esc_url( $url ) .'" title="'. esc_html__( 'Wishlist', 'configurator' ) .'">';
						echo '<span class="ct-heart"></span>';
						echo '<span class="pix-item-icon">'. esc_html( $wishlist_count ) .'</span>';
					echo '</a>';
				echo '</div>';
			echo '</div>';
		}		

	}
	else if( $elems == 'cart' ){
		if ( class_exists( 'Woocommerce' ) ) {
			configurator_woo_cart();
		}	

	}
	elseif( $elems == 'sicons' ){
		echo '<div class="header-elem"><p class="social-icons">';
			echo configurator_social_icons_order();
		echo '</p></div>';
	}
	elseif( $elems == 'footer_menu' ){

		echo '<div class="header-elem">';
			configurator_footer_nav();	
		echo '</div>';

	}
	elseif( $elems == 'search' ){

		echo '<div class="header-elem">';
			get_search_form();			
		echo '</div>';

	}
	elseif( $elems == 'search_icon' ){

		echo '<div class="header-elem">';
			echo configurator_header_search();
		echo '</div>';
	}
	elseif( $elems == 'copyright_text' ){

		echo '<div class="header-elem">';

			$footer_copyright_t = get_theme_mod( 'footer_copyright_text', 'Copyright &copy; '. date('Y') .' '. esc_html__('All Rights Reserved.', 'configurator' ) );

			echo '<p class="copyright-text">' . do_shortcode( $footer_copyright_t )  . '</p>'; // it escaped properly above

		echo '</div>';
	}
}

/*------------[ Logo ]-------------*/
if ( ! function_exists( 'configurator_get_logo' ) ){

	function configurator_get_logo(){

		$id = get_the_ID();

		$logo_location = get_template_directory_uri().'/framework/admin/_img/logo.png';
		$custom_logo = get_theme_mod( 'logo', $logo_location );
		$custom_logo = ( $custom_logo != $logo_location ) ? configurator_get_image_by_id( 'full', 'full', $custom_logo, 1, 0, 1 ) : $custom_logo;

		$logo_light_location = get_template_directory_uri().'/framework/admin/_img/light-logo.png';
		$custom_light_logo = get_theme_mod( 'light_logo', $logo_light_location );
		$custom_light_logo = ( $custom_light_logo != $logo_light_location ) ? configurator_get_image_by_id( 'full', 'full', $custom_light_logo, 1, 0, 1 ) : $custom_light_logo;

		$custom_logo2x_location = get_template_directory_uri().'/framework/admin/_img/retina-logo.png';
		$custom_logo2x = get_theme_mod( 'retina_logo', $custom_logo2x_location );
		$custom_logo2x = ( $custom_logo2x != $custom_logo2x_location ) ? configurator_get_image_by_id( 'full', 'full', $custom_logo2x, 1, 0, 1 ) : $custom_logo2x_location;

		$custom_light_logo2x_location = get_template_directory_uri().'/framework/admin/_img/light-retina-logo.png';
		$custom_light_logo2x = get_theme_mod( 'light_retina_logo', $custom_light_logo2x_location );
		$custom_light_logo2x = ( $custom_light_logo2x != $custom_light_logo2x_location ) ? configurator_get_image_by_id( 'full', 'full', $custom_light_logo2x, 1, 0, 1 ) : $custom_light_logo2x_location;

		// Specific Page Logo
		$logo = configurator_get_meta_value( $id, '_amz_logo' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
		$logo = !empty( $logo ) ? json_decode( $logo ) : '';

		$custom_logo = ( !empty( $logo ) ) ? configurator_get_image_by_id( 'full', 'full', $logo[0]->itemId, 1, 0, 1 ) : $custom_logo;

		$logo_alt = get_bloginfo( 'name' );

		$output = '<div id="logo">';
			$output .= '<a href="'. esc_url( home_url( '/' ) ) .'" rel="nofollow">';
 
				$output .= '<img src="'. esc_url( $custom_logo ) .'" data-rjs="'. esc_attr( $custom_logo2x ) .'" alt="'. esc_attr( $logo_alt ) .'" class="dark-logo">';
 
				$output .= '<img src="'. esc_url( $custom_light_logo ) .'" data-rjs="'. esc_attr( $custom_light_logo2x ) .'" alt="'. esc_attr( $logo_alt ) .'" class="light-logo">';

			$output .= '</a>';
		$output .= '</div>';

		return $output;
	}

}

