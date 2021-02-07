<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Configurator
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php configurator_head(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<?php 

	$configurator_prefix = configurator_get_prefix();

	if ( $configurator_prefix != '' ) {

		if( configurator_is_shop() || configurator_is_product_category() || configurator_is_product_tag() ) {
			$configurator_id = wc_get_page_id( 'shop' );
		}
		else if( is_home() || is_archive() || is_search() || is_404() ) {
			$configurator_id = get_option('page_for_posts');
		}
		else {
			global $wp_query; 
			$configurator_id = ( 0 == get_the_ID() || NULL == get_the_ID() ) ? $wp_query->post->ID : get_the_ID();
		}

		$configurator_header_visibility = configurator_get_meta_value( $configurator_id, '_amz_header_visibility', 'default', 'header_visibility', 'show' );
		$configurator_header_layout = configurator_get_meta_value( $configurator_id, '_amz_header_layout', 'default', 'header_layout', 'header2' );
		$configurator_header_background_style = configurator_get_meta_value( $configurator_id, '_amz_header_background_style', 'default', 'header_background_style', 'light' );
		$configurator_transparent_header = configurator_get_meta_value( $configurator_id, '_amz_transparent_header', 'default', 'transparent_header', 'hide' );
		$configurator_transparent_header_opacity = configurator_get_meta_value( $configurator_id, '_amz_transparent_header_opacity', '', 'transparent_header_opacity', '0' ); 

		if( 'dark' === $configurator_header_background_style ){
			$configurator_header_bg_class = ' dark';
		} else {
			$configurator_header_bg_class = '';			
		}

		$configurator_header_con_class = '';

		$configurator_sticky_header = configurator_get_option_value( 'sticky_header', 'scroll_up' );
		$configurator_sticky_header_color = configurator_get_option_value( 'sticky_header_color', 'light' );
		$configurator_sticky_header_class = ( $configurator_sticky_header_color === 'light' ) ? ' sticky-light ' : ' sticky-dark ';

		if( 'enable' === $configurator_sticky_header || 'scroll_up' === $configurator_sticky_header ){

			if( 'enable' === $configurator_sticky_header ) {
				$configurator_header_con_class .= ' pix-sticky-header';
			} elseif ( 'scroll_up' === $configurator_sticky_header ) {
				$configurator_header_con_class .= ' pix-sticky-header pix-sticky-header-scroll-up';
			}

		}

		$configurator_sub_menu = get_theme_mod( 'dropdown_menu_style', 'light' );

		if( 'dark' === $configurator_sub_menu ){
			$configurator_sub_class = ' sub-menu-dark';
		} else {
			$configurator_sub_class = '';			
		}

		// Mobile Menu Enable or Disable Dropdown function
		$configurator_mobile_menu_dropdown =  get_theme_mod( 'mobile_menu_dropdown', 'show' );
		if( $configurator_mobile_menu_dropdown === 'hide' ){
			$configurator_mobile_menu_dropdown = ' mobile-menu-dropdown-none ';
		} else{
			$configurator_mobile_menu_dropdown = '';
		}

		// Mobile Menu Enable or Disable Dropdown function
		$configurator_mobile_menu_background_color =  get_theme_mod( 'mobile_menu_background_color', 'light' );
		if( $configurator_mobile_menu_background_color === 'dark' ){
			$configurator_mobile_menu_background_color = ' mobile-menu-dark ';
		} else{
			$configurator_mobile_menu_background_color = '';
		}

	}

?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'configurator' ); ?></a>

	<div class="mobile-menu-nav <?php echo esc_attr( $configurator_mobile_menu_background_color . $configurator_mobile_menu_dropdown ); ?>"><div class="mobile-menu-inner"><div class="widget-right widget-bottom"><?php echo configurator_print_header_element(); ?></div></div></div>

	<div id="content-pusher">

	<?php 
		if( 'show' === $configurator_header_visibility ){

			if( 'show' === $configurator_transparent_header ){
				echo '<div class="transparent-header opacity-'. esc_attr( $configurator_transparent_header_opacity ) .'">';
			}
	?>

			<div class="header-wrap <?php echo esc_attr( $configurator_sticky_header_class . $configurator_header_bg_class . $configurator_sub_class ); ?>">
				<div class="header-con <?php echo esc_attr( $configurator_header_con_class ); ?>">
					<?php
						get_template_part ( 'templates/headers/'.$configurator_header_layout );
					?>
				</div>
			</div>

	<?php 	
			if( 'show' === $configurator_transparent_header ){
				echo '</div>';
			}
		}
	?>
	
	<div id="main-wrapper" class="clearfix" >

	<div class="page-gradient">

	<?php 
		if ( is_customize_preview() ) { echo '<div class="customize-tile-bar">'; }
			echo configurator_print_title_bar();
		if ( is_customize_preview() ) { echo '</div>'; }
	?>
	<div id="content" class="site-content">