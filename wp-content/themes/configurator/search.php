<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();

$prefix = configurator_get_prefix();

//Slider    
$configurator_slider = get_theme_mod( $prefix.'slider', '' );

if( !empty( $configurator_slider ) ){
    echo do_shortcode( $configurator_slider );
}

get_template_part( 'blog/loop/blog', 'containerstart' );

    //Get blog sidebar values from theme option
    $configurator_sidebar = get_theme_mod( $prefix.'sidebar', 0 );
    $configurator_layout = get_theme_mod( $prefix.'layout', 'right-sidebar' );
    $configurator_layout = ( is_active_sidebar( $configurator_sidebar ) || is_active_sidebar( 'blog-sidebar' ) ) ? $configurator_layout : 'full-width';

    get_template_part( 'blog/loop/blog', 'loopstart' );

        if ( have_posts() ) : while ( have_posts() ) : the_post();

            get_template_part( 'blog/blog', 'content' );

            endwhile;

            else :
                get_template_part( 'blog/post', 'error' );

        endif;


    get_template_part( 'blog/loop/blog', 'loopend' );

    //If the sidebar position is right or left sidebar, it ll apply
    if( 'full-width' != $configurator_layout ) {

        configurator_sidebar( $configurator_sidebar, 'blog-sidebar' );
    }

get_template_part( 'blog/loop/blog', 'containerend' );

get_footer();