<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/child-theme-style.css');
    //wp_enqueue_style( 'boostrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css' );

}

