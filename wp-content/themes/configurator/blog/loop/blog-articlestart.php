<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

echo '<div class="load-element">';

echo '<article id="post-'. esc_attr( get_the_ID() ).'" class="' . implode( ' ', get_post_class( 'post post-container clearfix', get_the_ID() ) ) .'">';