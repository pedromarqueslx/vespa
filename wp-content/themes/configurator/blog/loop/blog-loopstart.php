<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

//Blog 
$type    = get_theme_mod( $prefix.'style', 'normal' );
$sidebar = get_theme_mod( $prefix.'sidebar', 0 );
$layout  = get_theme_mod( $prefix.'layout', 'layout' );
$layout  = ( is_active_sidebar( $sidebar ) || is_active_sidebar( 'blog-sidebar' ) ) ? $layout : 'full-width';

//Assign blog style column settings
if( 'full-width' != $layout ){
	$columns = ' col-md-9 ';
}
else{
	$columns = ' col-md-12 ';
}

echo '<div id="style-'. esc_attr( $type ) .'" class="blog load-container '. esc_attr( $layout . $columns ) .'">';