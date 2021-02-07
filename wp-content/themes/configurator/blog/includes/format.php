<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// global $values;
$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

/*
 * Blog Post Format: Standard
 */

$type = get_theme_mod( $prefix.'style', 'normal' );
$layout = get_theme_mod( $prefix.'layout', 'full-width' );

/*
 * For: List
 */

if( 'list' == $type ) {

	$width = 550;
	$height = 570;

	if( 'full-width' != $layout ) { // Left/Right Sidebar
		$width = 405;
		$height = 425;
	}

}

/*
 * For: Normal Style
 */
else if( 'normal' == $type ) {
	$width = 1170;
	$height = 350;

	if( 'full-width' != $layout ) { // Left/Right Sidebar
		$width = 870;
		$height = 350;
	}
}

/*
 * For: Normal Split Style
 */
else if( 'normal_split' == $type ) {
	$width = 370;
	$height = 370;

	if( 'full-width' != $layout ) { // Left/Right Sidebar
		$width = 370;
		$height = 370;
	}
}

/*
 * If you want add any blog style top part in standard post format, Check condition here
 */

/*
 * For: Grid, Normal & Normal Split
 */

//Top Section
echo '<div class="post-standard">';
	echo '<a href="'. esc_url( get_permalink() ) .'">';
    echo configurator_featured_thumbnail( $width, $height, 0, 0, 1 );
    echo '</a>';
echo '</div>';


//Bottom Section

get_template_part( 'blog/includes/blog', 'entrycontent');

get_template_part( 'blog/loop/blog', 'articleend'); 
