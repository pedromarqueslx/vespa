<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

$type = get_theme_mod( $prefix.'style', 'normal' );

echo '</article>';

echo '</div>'; // load-element