<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/* Put in your theme functions.php to auto verify
 * Make sure that you've registered your theme to valid this license
 */
define('KC_LICENSE', 'miguuei4-pzox-t4mr-zb0j-zcrj-ygu5ek4m8ujl');

if ( ! function_exists( 'configurator_setup' ) ) :

/**
 * The Require file
 *
 * @package Configurator
 */

function configurator_require_file ( $file_path ) {
	require_once ( $file_path );
}


function configurator_setup() {

	load_theme_textdomain( 'configurator', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	if ( class_exists( 'WooCommerce' ) ) {
        //WooCommerce theme support
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-slider' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
    }


	// the main menu
	function configurator_main_nav() {

		$menu = configurator_get_meta_value( get_the_ID(), '_amz_main_navigation', 'default' ); // id, meta_key, meta_default
		$menu = ( 'default' != $menu ) ? $menu : '';

		// display the wp3 menu if available
		wp_nav_menu(array(
			'menu'            => $menu,
			'container'       => false,                     // remove nav container
			'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
			'menu_class'      => 'menu clearfix',           // adding custom nav class
			'theme_location'  => 'main-nav',                // where it's located in the theme
			'before'          => '',                        // before the menu
			'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
			'link_before'     => '',                        // before each link
			'link_after'      => '',                        // after each link
			'depth'           => 4,                         // limit the depth of the nav
			'fallback_cb'     => '',                        // fallback function
			'walker'          => new Configurator_Menu_Extend_Walker()
		));


	} /* end configurator main nav */

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'main-nav'       => esc_html__( 'The Main Menu', 'configurator' ),   // main nav in header
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'configurator_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_filter( 'get_search_form', 'configurator_wpsearch' );
}
endif;
add_action( 'after_setup_theme', 'configurator_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function configurator_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'configurator_content_width', 1170 );
}
add_action( 'after_setup_theme', 'configurator_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function configurator_widgets_init() {

    register_sidebar( array(
        'id' => 'primary-sidebar',
        'name' => esc_html__( 'Primary Sidebar', 'configurator' ),
        'description' => esc_html__( 'The primary sidebar this will be the default sidebar for pages.', 'configurator' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'id' => 'blog-sidebar',
        'name' => esc_html__( 'Blog Sidebar', 'configurator' ),
        'description' => esc_html__( 'This is default sidebar for Blog, catergories, Archives and single posts pages.', 'configurator' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ) );

    $configurator_footer_widget_layout = get_theme_mod( 'footer_widget_col', 'layout12' );

    // Footer Layouts
    register_sidebar(
        array(
            'id' => 'footer-first-column',
            'name' => esc_html__('Footer First Column', 'configurator' ),
            'description' => esc_html__('Add Widgets to display in footer layout first column.', 'configurator' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'id' => 'footer-second-column',
            'name' => esc_html__('Footer Second Column', 'configurator' ),
            'description' => esc_html__('Add Widgets to display in footer layout second column.', 'configurator' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        )
    );

    if( 'layout6' != $configurator_footer_widget_layout && 'layout8' != $configurator_footer_widget_layout &&'layout9' != $configurator_footer_widget_layout ) {

        register_sidebar(
            array(
                'id' => 'footer-third-column',
                'name' => esc_html__('Footer Third Column', 'configurator' ),
                'description' => esc_html__('Add Widgets to display in footer layout third column.', 'configurator' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>'
            )
        );

        if( 'layout1' != $configurator_footer_widget_layout && 'layout2' != $configurator_footer_widget_layout && 'layout3' != $configurator_footer_widget_layout && 'layout6' != $configurator_footer_widget_layout && 'layout7' != $configurator_footer_widget_layout && 'layout8' != $configurator_footer_widget_layout && 'layout9' != $configurator_footer_widget_layout && 'layout10' != $configurator_footer_widget_layout && 'layout11' != $configurator_footer_widget_layout && 'layout12' != $configurator_footer_widget_layout && 'layout16' != $configurator_footer_widget_layout && 'layout17' != $configurator_footer_widget_layout && 'layout18' != $configurator_footer_widget_layout ) {

            register_sidebar(
                array(
                    'id' => 'footer-fourth-column',
                    'name' => esc_html__('Footer Fourth Column', 'configurator' ),
                    'description' => esc_html__('Add Widgets to display in footer layout fourth column.', 'configurator' ),
                    'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widgettitle">',
                    'after_title' => '</h3>'
                )
            );

            if( 'layout15' == $configurator_footer_widget_layout || 'layout21' == $configurator_footer_widget_layout || 'layout22' == $configurator_footer_widget_layout ) {

                register_sidebar(
                    array(
                        'id' => 'footer-fifth-column',
                        'name' => esc_html__('Footer Fifth Column', 'configurator' ),
                        'description' => esc_html__('Add Widgets to display in footer layout fifth column.', 'configurator' ),
                        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                        'after_widget' => '</div>',
                        'before_title' => '<h3 class="widgettitle">',
                        'after_title' => '</h3>'
                    )
                );

            }

            if( 'layout21' == $configurator_footer_widget_layout || 'layout22' == $configurator_footer_widget_layout ) {

                register_sidebar(
                    array(
                        'id' => 'footer-sixth-column',
                        'name' => esc_html__('Footer Sixth Column', 'configurator' ),
                        'description' => esc_html__('Add Widgets to display in footer layout sixth column.', 'configurator' ),
                        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                        'after_widget' => '</div>',
                        'before_title' => '<h3 class="widgettitle">',
                        'after_title' => '</h3>'
                    )
                );

            }

            if( 'layout22' == $configurator_footer_widget_layout ) {

                register_sidebar(
                    array(
                        'id' => 'footer-seventh-column',
                        'name' => esc_html__('Footer Seventh Column', 'configurator' ),
                        'description' => esc_html__('Add Widgets to display in footer layout seventh column.', 'configurator' ),
                        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                        'after_widget' => '</div>',
                        'before_title' => '<h3 class="widgettitle">',
                        'after_title' => '</h3>'
                    )
                );

            }

        }

    }

    $configurator_header_widget = get_theme_mod( 'header_widget', 'hide' );

    if( 'show' == $configurator_header_widget ) {
        register_sidebar(
            array(
                'id' => 'header-widgets',
                'name' => esc_html__('Header Widgets', 'configurator' ),
                'description' => esc_html__('Add Widgets to display in Header Widget Area.', 'configurator' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>'
            )
        );
    }

    if ( class_exists( 'Woocommerce' ) ) {
        register_sidebar( array(
            'id' => 'shop',
            'name' => esc_html__('Shop', 'configurator' ),
            'description' => esc_html__('Add Widgets to display in Shop Page.', 'configurator' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>',
        ) );
    }

}
add_action( 'widgets_init', 'configurator_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function configurator_scripts() {

    $responsive = get_theme_mod( 'responsive', 'yes' );
    $responsive = ( 'yes' == $responsive ) ? '' : 'non-';

    $to_last_saved_time = get_theme_mod( 'to_last_saved_time', '1.0' );

    $uploads = wp_upload_dir();
    $css_upload_dir  = $uploads['baseurl'] . '/'. get_option( 'stylesheet' );
    $custom_css_path = $uploads['basedir'] . '/'. get_option( 'stylesheet' ) . '/custom.css';


    /* CSS */
    wp_enqueue_style( 'configurator-fonts', get_template_directory_uri() . '/assets/css/ct-icons.css', array(), '1.0', 'all' );
    wp_enqueue_style('fontawesome', "//use.fontawesome.com/releases/v5.3.1/css/all.css", array(), '5.3.1');
	wp_enqueue_style( 'configurator-stylesheet', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2.3', 'all' );
    wp_enqueue_style( 'configurator-responsive-stylesheet', get_template_directory_uri() . '/assets/css/'. $responsive .'responsive.css', array('configurator-stylesheet'), '1.2.3', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl-carousel.css', array( 'configurator-responsive-stylesheet' ), '1.2.3', 'all' );

    if( is_file( $custom_css_path ) && filesize( $custom_css_path ) > 0 ) {
        wp_enqueue_style( 'configurator-custom-css', $css_upload_dir . '/custom.css', array( 'owl-carousel' ), $to_last_saved_time, 'all' );
    }

    /* JS */
	wp_enqueue_script( 'configurator-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/libs/modernizr.custom.min.js', array( 'jquery' ), '2.5.3', false );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array( 'jquery' ), '2.0.4', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl-carousel.js', array( 'waypoints' ), '2.3.0', true );
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/assets/js/classie.js', array( 'owl-carousel' ), '1.0', true );
    wp_enqueue_script( 'jquery-validator', get_template_directory_uri() . '/assets/js/jquery-validator.js', array( 'classie' ), '2.3.6', true );
    wp_enqueue_script( 'retina', get_template_directory_uri() . '/assets/js/retina.js', array( 'jquery-validator' ), '2.1.0', true );
    wp_enqueue_script( 'responsive-iframe-videos', get_template_directory_uri() . '/assets/js/responsive-iframe-videos.js', array( 'retina' ), '1.0', true );
    wp_enqueue_script( 'sticky-elements', get_template_directory_uri() . '/assets/js/sticky-elements.js', array( 'responsive-iframe-videos' ), '2.0.4', true );
    wp_enqueue_script( 'one-page-nav', get_template_directory_uri() . '/assets/js/one-page-nav.js', array( 'sticky-elements' ), '3.0', true );

    wp_localize_script( 'one-page-nav', 'pix_configurator',
		array(
            'rootUrl'     => esc_url( home_url( '/' ) ),
            'ajaxurl'     => esc_url( admin_url( 'admin-ajax.php' ) ),
            'rtl'         => is_rtl() ? 'true' : 'false',
            'admin_email' => get_option( 'admin_email' )
		)
	);

	wp_enqueue_script( 'configurator-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.2.3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'configurator_scripts' );

if( ! function_exists( 'configurator_add_inline_css' ) ) {

    function configurator_add_inline_css() {

        if( is_home() || is_archive() || is_search() || is_404() ) {
            $id = get_option('page_for_posts');
        } else {
            $id = get_the_ID();
        }

        $prefix = configurator_get_prefix();

        // Empty Assignment
        $sub_header_css = $sub_header_text_color = $sub_header_sep_color = $sub_header_overlay = '';

        $title_bar_style         = configurator_get_meta_value( $id, '_amz_title_bar_style', 'default', 'title_bar_style', 'default' );
        $title_bar_bg_color      = configurator_get_meta_value( $id, '_amz_title_bar_bg_color', 'default', 'title_bar_bg_color', '' );
        $title_bar_text_color    = configurator_get_meta_value( $id, '_amz_title_bar_text_color', 'default', 'title_bar_text_color', '' );
        $title_bar_bg_image_opt  = configurator_get_option_value( 'title_bar_bg_image', '' );
        $title_bar_bg_image_meta = configurator_get_meta_value( $id, '_amz_title_bar_bg_image' );

        if( $title_bar_style == 'custom' && !empty( $title_bar_bg_image_meta ) ){

            $header_bg_image = json_decode( htmlspecialchars_decode( $title_bar_bg_image_meta ),true );

            if( is_array( $header_bg_image ) && !empty( $header_bg_image ) ){
                $header_bg_image = $header_bg_image[0]['full'];
            }
        }
        else if( $title_bar_style == 'custom' && !empty( $title_bar_bg_image_opt ) ){

            $header_bg_image = $title_bar_bg_image_opt;
        }

        if( ( $title_bar_style == 'custom' ) && ( !empty($header_bg_image ) || !empty( $title_bar_bg_color ) || !empty( $title_bar_text_color ) ) ){

            if( $title_bar_style == 'custom' && !empty( $title_bar_bg_color ) ){
                $sub_header_css .= !empty( $title_bar_bg_color ) ? 'background-color:'. $title_bar_bg_color .';' : '';
            }

            if( $title_bar_style == 'custom' && !empty( $header_bg_image ) ){
                $sub_header_css .= 'background-image: url('. esc_url( $header_bg_image ) .');';
                $sub_header_css .= 'background-size: cover;';
                $sub_header_css .= 'background-repeat: no-repeat;background-position: center center;';
            }

            if( $title_bar_style == 'custom' && !empty( $title_bar_text_color ) ){
                $sub_header_text_color .= 'color:'. $title_bar_text_color .';';
                $sub_header_sep_color .= 'background:'. $title_bar_text_color .';';
            }
        }

        $custom_css = "
            #sub-header, .configurator-header-dark #sub-header {
                {$sub_header_css}
            }
            #sub-header h2, .banner-header h2, .breadcrumb li a, .breadcrumb li span, #sub-header .current {
                {$sub_header_text_color}
            }
            .pix-breadcrumbs li:after{
                {$sub_header_sep_color}
            }
        ";

        wp_add_inline_style( 'configurator-responsive-stylesheet', wp_strip_all_tags( stripslashes( $custom_css ) ) );

    }
}

add_action( 'wp_enqueue_scripts', 'configurator_add_inline_css' );

/**
* Theme Framework
*/
require get_template_directory() . '/framework/theme-init.php';

add_action( 'customize_register', 'configurator_modify_predefined_customizer' );
function configurator_modify_predefined_customizer( $wp_customize ) {

    $wp_customize->remove_control( 'custom_logo' );

}

/**
 * Create random string
 */
function configurator_random( $length = 7 ) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen( $characters );
    $randomString = '';
    for ( $i = 0; $i < $length; $i++ ) {
        $randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
    }
    return $randomString;
}
