<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* ==========================================================================
	Product Slider
========================================================================== */

function configurator_product_slider( $atts, $content = null, $code ) {

	extract( shortcode_atts( array(
		'id'   => '',
		'order'	=> 'desc',
		'orderby' => 'date',
		'items'	=> '3',
		'btn_text'	=> esc_html__( 'Select', 'configurator' )
	), $atts ) );

	// Empty assignment
	$output = '';

	// Base query
	$args = array(
		'post_type'           => 'product',
		'order'               => $order,
		'posts_per_page'      => $items,
		'orderby'             => $orderby,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1
	);

	// Products depends on ID
	if( !empty( $id ) ) {

		// Build id array
		$id = explode( ',', $id );

		// Id query
		$id_args = array( 
			'post__in' => $id
		);

		// Merge Id query with base query
		$args = array_merge( $args, $id_args );
	}	

	$q = new WP_Query( $args );

	if ( $q->have_posts() ) : 
		$output .= '<div class="slider-cover">';
			$output .= '<div id="slider">';

				while ( $q->have_posts() ) : $q->the_post();

					global $post;

					// Product ID
					$id = get_the_ID();

					// Product Object
					$product = wc_get_product( $id );

					$output .= '<div class="slider-content">';

						$output .= configurator_featured_thumbnail( 'full', 'full', 0, 1, 1 );

						if( !empty( $bg_text ) ) {
							$output .= '<span class="bg-text">'. esc_html( $bg_text ) .'</span>';
						}

						$output .= '<h3 class="title">'. esc_html( get_the_title() ) .'</h3>';

						$output .= apply_filters( 'woocommerce_short_description', $post->post_excerpt );

						$output .= '<p class="price">'. esc_html__( 'Base Price') .' - '. configurator_apply_currency_postion( $product->get_price(), get_woocommerce_currency_symbol() ) . '</p>';

						$output .= '<a href="'. esc_url( get_permalink() ) .'" class="btn border-radius">'. esc_html( $btn_text ) .'</a>';

					$output .= '</div>'; // .slider-content
				endwhile;

			$output .= '</div>'; // #slider
		$output .= '</div>'; // .slider-cover
	endif;

	wp_reset_query();

	return $output;
}

add_shortcode( 'product_slider', 'configurator_product_slider' );

/* ==========================================================================
	Quote
========================================================================== */

function configurator_quote( $atts, $content = null, $code ) {

	extract( shortcode_atts( array(
		'style'   => 'style1',
		'author' => ''
	), $atts ) );

	// Empty assignment
	$output = '';

	$output .= '<div class="quote '. esc_attr( $style ) .'">';
		$output .= '<span class="content">'. esc_html( $content ) .'</span>';
		if( !empty( $author ) ) {
			$output .= '<p class="name">– '. esc_html( $author ) .'</p>';
		}
		
	$output .= '</div>'; // .quote

	return $output;
}
add_shortcode( 'quote', 'configurator_quote' );


/* ==========================================================================
	Counter
========================================================================== */

function configurator_static_counter( $atts, $content = null, $code ) {

	extract( shortcode_atts( array(
		'title'   => '',
		'number' => '',
		'text'	=> ''
	), $atts ) );

	// Empty assignment
	$output = '';

	$output .= '<div class="static-counter">';
		if( !empty( $title ) ) {
			$output .= '<h2 class="title">'. esc_html( $title ) .'</h2>';
		}
		
		$output .= '<p class="number">';

			if( !empty( $number ) ) {
				$output .= '<span class="value">'. esc_html( $number ) .' </span>';
			}
			
			if( !empty( $text ) ) {
				$output .= '<span class="text">'. esc_html( $text ) .'</span>';
			}

		$output .= '</p>'; // .number
		
		if( !empty( $content ) ) {
			$output .= '<p>'. esc_html( $content ) .'</p>';
		}
		
	$output .= '</div>'; // .static-counter

	return $output;
}
add_shortcode( 'static_counter', 'configurator_static_counter' );