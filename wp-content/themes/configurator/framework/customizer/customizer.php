<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once( CONFIGURATOR_CUSTOMIZER . '/customizer-helper.php' );

add_action( 'customize_preview_init', 'configurator_customize_preview_js' );
function configurator_customize_preview_js() {
	wp_enqueue_script( 'configurator_customizer_js', CONFIGURATOR_CUSTOMIZER_URI . '/js/customizer.js', array( 'customize-preview' ), '20170207', true );		
}

// Useful values assigned to the variables

// Image url path
$url =  CONFIGURATOR_ADMIN_URI . '/_img/';

// All pages
$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,					
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 

if ( class_exists('Woocommerce') ) {
	$args['exclude'] = array(
		get_option( 'woocommerce_shop_page_id' ), 
		get_option( 'woocommerce_cart_page_id' ), 
		get_option( 'woocommerce_checkout_page_id' ),
		get_option( 'woocommerce_pay_page_id' ), 
		get_option( 'woocommerce_thanks_page_id' ), 
		get_option( 'woocommerce_myaccount_page_id' ), 
		get_option( 'woocommerce_edit_address_page_id' ), 
		get_option( 'woocommerce_view_order_page_id' ), 
		get_option( 'woocommerce_terms_page_id' )
	);
}

$pages = get_pages( $args );

$all_pages = array( '' => esc_html__('Choose A Page', 'configurator' ) );

$all_pages['dashboard'] = esc_html__( 'Dashboard', 'configurator' );
foreach( $pages as $page ) {
	$all_pages[$page->ID] = $page->post_title;
}

// Header layouts
$headers = array(
	'header1' => $url . 'header-layout/header1.png',
	'header2' => $url . 'header-layout/header2.png',
	'header3' => $url . 'header-layout/header3.png',
	'header4' => $url . 'header-layout/header4.png'
);

// Blog & Single Blog & Archives
$blog_style = array(
	'list'         => esc_html__( 'List ', 'configurator' ),
	'normal'       => esc_html__( 'Normal', 'configurator' ),
	'normal_split' => esc_html__( 'Normal Split', 'configurator' )
);

$sidebar = array(
	'full-width'    => esc_html__( 'Full Width', 'configurator' ),
	'left-sidebar'  => esc_html__( 'Left Sidebar', 'configurator' ),
	'right-sidebar' => esc_html__( 'Right Sidebar', 'configurator' )
);

$pagination = array(
	'number'    => esc_html__( 'Number', 'configurator' ),
	'text'      => esc_html__( 'Text', 'configurator' )
);

$animation = array(
	'flash'             => esc_html__( 'flash', 'configurator' ),
	'bounce'            => esc_html__( 'bounce', 'configurator' ),
	'shake'             => esc_html__( 'shake', 'configurator' ),
	'tada'              => esc_html__( 'tada', 'configurator' ),
	'swing'             => esc_html__( 'swing', 'configurator' ),
	'wobble'            => esc_html__( 'wobble', 'configurator' ),
	'pulse'             => esc_html__( 'pulse', 'configurator' ),
	'flip'              => esc_html__( 'flip', 'configurator' ),
	'flipInX'           => esc_html__( 'flipInX', 'configurator' ),
	'flipInY'           => esc_html__( 'flipInY', 'configurator' ),
	'fadeIn'            => esc_html__( 'fadeIn', 'configurator' ),
	'fadeInUp'          => esc_html__( 'fadeInUp', 'configurator' ),
	'fadeInDown'        => esc_html__( 'fadeInDown', 'configurator' ),
	'fadeInLeft'        => esc_html__( 'fadeInLeft', 'configurator' ),
	'fadeInRight'       => esc_html__( 'fadeInRight', 'configurator' ),
	'fadeInUpBig'       => esc_html__( 'fadeInUpBig', 'configurator' ),
	'fadeInDownBig'     => esc_html__( 'fadeInDownBig', 'configurator' ),
	'fadeInLeftBig'     => esc_html__( 'fadeInLeftBig', 'configurator' ),
	'fadeInRightBig'    => esc_html__( 'fadeInRightBig', 'configurator' ),
	'slideInDown'       => esc_html__( 'slideInDown', 'configurator' ),
	'slideInLeft'       => esc_html__( 'slideInLeft', 'configurator' ),
	'slideInRight'      => esc_html__( 'slideInRight', 'configurator' ),
	'bounceIn'          => esc_html__( 'bounceIn', 'configurator' ),
	'bounceInUp'        => esc_html__( 'bounceInUp', 'configurator' ),
	'bounceInDown'      => esc_html__( 'bounceInDown', 'configurator' ),
	'bounceInLeft'      => esc_html__( 'bounceInLeft', 'configurator' ),
	'bounceInRight'     => esc_html__( 'bounceInRight', 'configurator' ),
	'rotateIn'          => esc_html__( 'rotateIn', 'configurator' ),
	'rotateInDownLeft'  => esc_html__( 'rotateInDownLeft', 'configurator' ),
	'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'configurator' ),
	'rotateInUpLeft'    => esc_html__( 'rotateInUpLeft', 'configurator' ),
	'rotateInUpRight'   => esc_html__( 'rotateInUpRight', 'configurator' ),
	'lightSpeedIn'      => esc_html__( 'lightSpeedIn', 'configurator' ),
	'hinge'             => esc_html__( 'hinge', 'configurator' ),
	'rollIn'            => esc_html__( 'rollIn', 'configurator' )
);

$social = array(
	'facebook'  => esc_attr__( 'Facebook', 'configurator' ),
	'twitter'   => esc_attr__( 'Twitter', 'configurator' ),
	'linkedin'  => esc_attr__( 'Linkedin', 'configurator' ),
	'pinterest' => esc_attr__( 'Pinterest', 'configurator' ),
	'gplus'     => esc_attr__( 'Google Plus', 'configurator' )
);

$footer_layout = array(
	'layout1'  => $url . 'footer-layout/layout1.png',
	'layout2'  => $url . 'footer-layout/layout2.png',
	'layout3'  => $url . 'footer-layout/layout2.png',
	'layout4'  => $url . 'footer-layout/layout4.png',
	'layout5'  => $url . 'footer-layout/layout5.png',
	'layout6'  => $url . 'footer-layout/layout6.png',
	'layout7'  => $url . 'footer-layout/layout7.png',
	'layout8'  => $url . 'footer-layout/layout8.png',
	'layout9'  => $url . 'footer-layout/layout9.png',
	'layout10' => $url . 'footer-layout/layout10.png',
	'layout11' => $url . 'footer-layout/layout11.png',
	'layout12' => $url . 'footer-layout/layout12.png',
	'layout13' => $url . 'footer-layout/layout13.png',
	'layout14' => $url . 'footer-layout/layout14.png',
	'layout15' => $url . 'footer-layout/layout15.png',
	'layout16' => $url . 'footer-layout/layout16.png',
	'layout17' => $url . 'footer-layout/layout16.png',
	'layout18' => $url . 'footer-layout/layout18.png',
	'layout19' => $url . 'footer-layout/layout19.png',
	'layout20' => $url . 'footer-layout/layout20.png',
	'layout21' => $url . 'footer-layout/layout21.png',
	'layout22' => $url . 'footer-layout/layout22.png'
);

$pattern = array(
	'none'     => $url . 'pattern/none.png',
	'pat1'     => $url . 'pattern/pat1.png',
	'pat2'     => $url . 'pattern/pat2.png',
	'pat3'     => $url . 'pattern/pat3.png',
	'pat4'     => $url . 'pattern/pat4.png',
	'pat5'     => $url . 'pattern/pat5.png'
);


// General
Kirki::add_section( 'general_option', array(
    'priority'    => 1,
    'title'       => esc_html__( 'General', 'configurator' ),
    'description' => esc_html__( 'General settings can be changed here.', 'configurator' )
) );

Kirki::add_field( 'boxed_content', array(
	'type'     => 'radio-buttonset',
	'settings' => 'boxed_content',
	'label'    => esc_html__( 'Wide & Boxed & Frame Layout', 'configurator' ),
	'section'  => 'general_option',
	'default'  => 'wide',
	'choices'  => array(
		'wide'  => esc_attr__( 'Wide', 'configurator' ),
		'boxed' => esc_attr__( 'Boxed', 'configurator' ),
		'frame' => esc_attr__( 'Frame', 'configurator' )
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'main_wrap', array(
	'type'     => 'slider',
	'settings' => 'main_wrap',
	'label'    => esc_html__( 'Main Wrap', 'configurator' ),
	'section'  => 'general_option',
	'default'  => 1366,
	'choices'  => array(
		'min'  => '940',
		'max'  => '1366',
		'step' => '1'
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'content_wrap', array(
	'type'     => 'slider',
	'settings' => 'content_wrap',
	'label'    => esc_html__( 'Content Wrap', 'configurator' ),
	'section'  => 'general_option',
	'default'  => 1170,
	'choices'  => array(
		'min'  => '940',
		'max'  => '1366',
		'step' => '1',
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'content_margin_top', array(
	'type'     => 'text',
	'settings' => 'content_margin_top',
	'label'    => esc_html__( 'Page Content Margin Top', 'configurator' ),
	'section'  => 'general_option',
	'default'  => '',
    'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'content_margin_bottom', array(
	'type'     => 'text',
	'settings' => 'content_margin_bottom',
	'label'    => esc_html__( 'Page Content Margin Bottom', 'configurator' ),
	'section'  => 'general_option',
	'default'  => '',
    'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'kc_padding_top', array(
	'type'     => 'text',
	'settings' => 'kc_padding_top',
	'label'    => esc_html__( 'Row Top Padding', 'configurator' ),
	'section'  => 'general_option',
	'default'  => '',
    'description' => esc_html__( 'Type the button letter spacing. Eg: 0', 'configurator' ),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'kc_padding_bottom', array(
	'type'     => 'text',
	'settings' => 'kc_padding_bottom',
	'label'    => esc_html__( 'Row Bottom Padding', 'configurator' ),
	'section'  => 'general_option',
	'default'  => '',
    'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'responsive', array(
	'type'     => 'radio-buttonset',
	'settings' => 'responsive',
	'label'    => esc_html__( 'Responsive', 'configurator' ),
	'section'  => 'general_option',
	'default'  => 'yes',
	'choices'  => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'search_text', array(
	'type'     => 'text',
	'settings' => 'search_text',
	'label'    => esc_html__( 'Search Text', 'configurator' ),
	'section'  => 'general_option',
	'default'  => esc_attr__( 'Search', 'configurator' ),
	'transport' => 'postMessage'
) );


Kirki::add_field( 'form_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'form_style',
	'label'    => esc_html__( 'Form Style', 'configurator' ),
	'section'  => 'general_option',
	'default'  => 'square',
	'choices'  => array(
		'square'  => esc_attr__( 'Square', 'configurator' ),
		'line'    => esc_attr__( 'Line', 'configurator' ),
		'rounded' => esc_attr__( 'Rounded', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'recaptcha_sitekey', array(
	'type'     => 'text',
	'settings' => 'recaptcha_sitekey',
	'label'    => esc_html__( 'reCaptcha Sitekey', 'configurator' ),
	'section'  => 'general_option',
	'default'  => ''
) );

Kirki::add_field( 'recaptcha_secretkey', array(
	'type'     => 'text',
	'settings' => 'recaptcha_secretkey',
	'label'    => esc_html__( 'reCaptcha Secret key', 'configurator' ),
	'section'  => 'general_option',
	'default'  => ''
) );

// Button
Kirki::add_panel( 'button', array(	
    'priority'    => 2,
    'title'       => esc_html__( 'Button Setting', 'configurator' ),
    'description' => esc_html__( 'Select the button setting', 'configurator' )
) );

// Button > General
Kirki::add_section( 'button_general', array(
    'title'          => esc_html__( 'General', 'configurator' ),
    'description'    => esc_html__( 'General Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'btn_style',
	'label'    => esc_html__( 'Style', 'configurator' ),
	'section'  => 'button_general',
	'default'  => 'btn-solid',
	'choices'  => array(
		'btn-solid' => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'btn_text_style',
	'label'    => esc_html__( 'Text Style', 'configurator' ),
	'section'  => 'button_general',
	'default'  => 'btn-uppercase',
	'choices'  => array(
		'btn-uppercase' => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase' => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'btn_size',
	'label'    => esc_html__( 'Size', 'configurator' ),
	'section'  => 'button_general',
	'default'  => 'btn-sm',
	'choices'  => array(
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm' => esc_attr__( 'Small', 'configurator' ),
		'btn-md' => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg' => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'btn_type',
	'label'    => esc_html__( 'Type', 'configurator' ),
	'section'  => 'button_general',
	'default'  => 'btn-oval',
	'choices'  => array(
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_general',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_general',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_general',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'btn_text_color', array(
	'type'     => 'color',
	'settings' => 'btn_text_color',
	'label'    => esc_html__( 'Button Text Color', 'configurator' ),
	'section'  => 'button_general',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'btn_letter_spacing', array(
	'type'     => 'text',
	'settings' => 'btn_letter_spacing',
	'label'    => esc_html__( 'Letter Spacing', 'configurator' ),
    'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'  => 'button_general',
	'default'  => '',
	'transport' => 'postMessage'
) );

// Button > Shop Normal Button
Kirki::add_section( 'button_shop_normal', array(
    'title'          => esc_html__( 'Shop Normal Button', 'configurator' ),
    'description'    => esc_html__( 'Shop Normal Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'shop_normal_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_normal_btn_style',
	'label'    => esc_html__( 'Normal Button Style', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_normal_btn_text_style',
	'label'    => esc_html__( 'Normal Button Text Style', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_normal_btn_size',
	'label'    => esc_html__( 'Normal Button Size', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_normal_btn_type',
	'label'    => esc_html__( 'Normal Button Type', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_normal_btn_color',
	'label'    => esc_html__( 'Normal Button Color', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'shop_normal_btn_custom_color',
	'label'    => esc_html__( 'Normal Button Custom Color', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'shop_normal_btn_gradient',
	'label'    => esc_html__( 'Normal Button Gradient Color', 'configurator' ),
	'section'  => 'button_shop_normal',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'shop_normal_btn_text_color',
	'label'    => esc_html__( 'Normal Button Text Color', 'configurator' ),
	'section'  => 'button_shop_normal',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'shop_normal_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'shop_normal_btn_letter_spacing',
	'label'       => esc_html__( 'Normal Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_shop_normal',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Shop Customize Button
Kirki::add_section( 'button_shop_customize', array(
    'title'          => esc_html__( 'Shop Customize Button', 'configurator' ),
    'description'    => esc_html__( 'Shop Customize Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'shop_customize_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_customize_btn_style',
	'label'    => esc_html__( 'Customize Button Style', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_customize_btn_text_style',
	'label'    => esc_html__( 'Customize Button Text Style', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_customize_btn_size',
	'label'    => esc_html__( 'Customize Button Size', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_customize_btn_type',
	'label'    => esc_html__( 'Customize Button Type', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_customize_btn_color',
	'label'    => esc_html__( 'Customize Button Color', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'shop_customize_btn_custom_color',
	'label'    => esc_html__( 'Customize Button Custom Color', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'shop_customize_btn_gradient',
	'label'    => esc_html__( 'Customize Button Gradient Color', 'configurator' ),
	'section'  => 'button_shop_customize',	
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'shop_customize_btn_text_color',
	'label'    => esc_html__( 'Customize Button Text Color', 'configurator' ),
	'section'  => 'button_shop_customize',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'shop_customize_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'shop_customize_btn_letter_spacing',
	'label'       => esc_html__( 'Customize Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_shop_customize',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Single Product Cart Button
Kirki::add_section( 'button_single_product_cart', array(
    'title'          => esc_html__( 'Single Product Cart Button', 'configurator' ),
    'description'    => esc_html__( 'Single Product Cart Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'single_product_cart_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_cart_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_cart_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_cart_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_cart_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_cart_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'single_product_cart_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'single_product_cart_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'single_product_cart_btn_text_color',
	'label'    => esc_html__( 'Button Text Color', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'single_product_cart_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_single_product_cart',
	'default'     => '',
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'single_product_cart_btn_overlap', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_cart_btn_overlap',
	'label'    => esc_html__( 'Button Overlap', 'configurator' ),
	'section'  => 'button_single_product_cart',
	'default'  => 'overlap',
	'choices'  => array(
		'overlap'    => esc_attr__( 'Overlap', 'configurator' ),
		'no-overlap' => esc_attr__( 'No Overlap', 'configurator' )
	),
	'transport' => 'postMessage'
) );

// Button > Related Product Normal Button
Kirki::add_section( 'button_related_product_normal', array(
    'title'          => esc_html__( 'Related Product Normal Button', 'configurator' ),
    'description'    => esc_html__( 'Related Product Normal Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'related_product_normal_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_normal_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_normal_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_normal_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_normal_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_normal_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'related_product_normal_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'related_product_normal_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'related_product_normal_btn_text_color',
	'label'    => esc_html__( 'Button Text Color', 'configurator' ),
	'section'  => 'button_related_product_normal',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'related_product_normal_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'related_product_normal_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_related_product_normal',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Related Product Customize Button
Kirki::add_section( 'button_related_product_customize', array(
    'title'          => esc_html__( 'Related Product Customize Button', 'configurator' ),
    'description'    => esc_html__( 'Related Product Customize Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'related_product_customize_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_customize_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_customize_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_customize_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_customize_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'related_product_customize_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'related_product_customize_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'related_product_customize_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'related_product_customize_btn_text_color',
	'label'    => esc_html__( 'Button Text Color', 'configurator' ),
	'section'  => 'button_related_product_customize',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'related_product_customize_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'related_product_customize_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_related_product_customize',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Cart Page Apply Coupon Button
Kirki::add_section( 'button_cart_apply_coupon', array(
    'title'          => esc_html__( 'Cart Apply Coupon Button', 'configurator' ),
    'description'    => esc_html__( 'Cart Apply Coupon Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'cart_apply_coupon_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_apply_coupon_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_apply_coupon_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_apply_coupon_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_apply_coupon_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_apply_coupon_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'cart_apply_coupon_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'cart_apply_coupon_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'cart_apply_coupon_btn_text_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_cart_apply_coupon',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'cart_apply_coupon_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'cart_apply_coupon_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_cart_apply_coupon',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Cart Page Update Cart Button
Kirki::add_section( 'button_cart_update', array(
    'title'          => esc_html__( 'Update Cart Button', 'configurator' ),
    'description'    => esc_html__( 'Update Cart Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'update_cart_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'update_cart_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'update_cart_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'update_cart_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'update_cart_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'update_cart_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'update_cart_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'update_cart_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_cart_update',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'update_cart_btn_text_color',
	'label'    => esc_html__( 'Button Text Color', 'configurator' ),
	'section'  => 'button_cart_update',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'update_cart_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'update_cart_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_cart_update',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Cart Page Checkout Button
Kirki::add_section( 'button_cart_checkout', array(
    'title'          => esc_html__( 'Cart Checkout Button', 'configurator' ),
    'description'    => esc_html__( 'Cart Checkout Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'cart_checkout_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_checkout_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_checkout_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_checkout_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_checkout_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_checkout_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'cart_checkout_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'cart_checkout_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'cart_checkout_btn_text_color',
	'label'    => esc_html__( 'Button Text Color', 'configurator' ),
	'section'  => 'button_cart_checkout',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'cart_checkout_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'cart_checkout_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_cart_checkout',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Button > Check Out Page Order Button
Kirki::add_section( 'button_checkout_order', array(
    'title'          => esc_html__( 'Checkout Order Button', 'configurator' ),
    'description'    => esc_html__( 'Checkout Order Button Settings', 'configurator' ),
    'panel'			 => 'button'
) );

Kirki::add_field( 'checkout_order_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'checkout_order_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => 'default',
	'choices'  => array(
		'default'     => esc_attr__( 'Default', 'configurator' ),
		'btn-solid'   => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'checkout_order_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => 'default',
	'choices'  => array(
		'default'        => esc_attr__( 'Default', 'configurator' ),
		'btn-uppercase'  => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase'  => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'checkout_order_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => 'default',
	'choices'  => array(
		'default' => esc_attr__( 'Default', 'configurator' ),
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm'  => esc_attr__( 'Small', 'configurator' ),
		'btn-md'  => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg'  => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'checkout_order_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => 'default',
	'choices'  => array(
		'default'       => esc_attr__( 'Default', 'configurator' ),
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'checkout_order_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => 'btn-primary',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-white'    => esc_attr__( 'White', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_custom_color', array(
	'type'     => 'color',
	'settings' => 'checkout_order_btn_custom_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_gradient', array(
	'type'     => 'multicolor',
	'settings' => 'checkout_order_btn_gradient',
	'label'    => esc_html__( 'Button Gradient Color', 'configurator' ),
	'section'  => 'button_checkout_order',
	'choices'     => array(
        'top'    => esc_attr__( 'Top', 'configurator' ),
        'bottom'  => esc_attr__( 'Bottom', 'configurator' )
    ),
    'default'     => array(
        'top'    => '#8579af',
        'bottom'  => '#be3658'
    ),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_text_color', array(
	'type'     => 'color',
	'settings' => 'checkout_order_btn_text_color',
	'label'    => esc_html__( 'Button Custom Color', 'configurator' ),
	'section'  => 'button_checkout_order',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport'   => 'postMessage'
) );

Kirki::add_field( 'checkout_order_btn_letter_spacing', array(
	'type'        => 'text',
	'settings'    => 'checkout_order_btn_letter_spacing',
	'label'       => esc_html__( 'Button Letter Spacing', 'configurator' ),
	'description' => esc_html__( 'Type the button letter spacing in px. Eg: 2px', 'configurator' ),
	'section'     => 'button_checkout_order',
	'default'     => '',
	'transport'   => 'postMessage'
) );

// Social Icons
Kirki::add_section( 'social', array(
    'priority'    => 2,
    'title'       => esc_html__( 'Social Icons', 'configurator' ),
    'description' => esc_html__( 'Type the social icons url', 'configurator' )
) );

Kirki::add_field( 'facebook', array(
	'type'     => 'text',
	'settings' => 'facebook',
	'label'    => esc_html__( 'Facebook', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'facebook' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'twitter', array(
	'type'     => 'text',
	'settings' => 'twitter',
	'label'    => esc_html__( 'Twitter', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'twitter' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'gplus', array(
	'type'     => 'text',
	'settings' => 'gplus',
	'label'    => esc_html__( 'Google Plus', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'gplus' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'linkedin', array(
	'type'     => 'text',
	'settings' => 'linkedin',
	'label'    => esc_html__( 'Linkedin', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'linkedin' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'dribbble', array(
	'type'     => 'text',
	'settings' => 'dribbble',
	'label'    => esc_html__( 'Dribbble', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'dribbble' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'flickr', array(
	'type'     => 'text',
	'settings' => 'flickr',
	'label'    => esc_html__( 'Flickr', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'flickr' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'pinterest', array(
	'type'     => 'text',
	'settings' => 'pinterest',
	'label'    => esc_html__( 'Pinterest', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'pinterest' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'tumblr', array(
	'type'     => 'text',
	'settings' => 'tumblr',
	'label'    => esc_html__( 'Tumblr', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'tumblr' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'instagram', array(
	'type'     => 'text',
	'settings' => 'instagram',
	'label'    => esc_html__( 'Instagram', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'instagram' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'rss', array(
	'type'     => 'text',
	'settings' => 'rss',
	'label'    => esc_html__( 'RSS', 'configurator' ),
	'section'  => 'social',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'rss' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)
) );

Kirki::add_field( 'social_icons', array(
	'type'        => 'sortable',
	'settings'    => 'social_icons',
	'label'       => esc_html__( 'Social Icons Order', 'configurator' ),
	'section'     => 'social',
	'default'     => array(
		'facebook',
		'twitter',
		'gplus',
		'linkedin',
		'dribbble',
		'flickr',
		'pinterest',
		'tumblr',
		'rss',
		'instagram'
	),
	'choices'     => array(
		'facebook'  => esc_attr__( 'Facebook', 'configurator' ),
		'twitter'   => esc_attr__( 'Twitter', 'configurator' ),
		'gplus'     => esc_attr__( 'Google Plus', 'configurator' ),
		'linkedin'  => esc_attr__( 'Linkedin', 'configurator' ),
		'dribbble'  => esc_attr__( 'Dribbble', 'configurator' ),
		'flickr'    => esc_attr__( 'Flickr', 'configurator' ),
		'pinterest' => esc_attr__( 'Pinterest', 'configurator' ),
		'tumblr'    => esc_attr__( 'Tumblr', 'configurator' ),
		'rss'       => esc_attr__( 'RSS', 'configurator' ),
		'instagram' => esc_attr__( 'Instagram', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'social_icons' => array(
			'selector'        => '.header-elem .social-icons',
			'render_callback' => 'configurator_social_icons_order',
		),
	)

) );

// Header
Kirki::add_section( 'header_options', array(
    'title'          => esc_html__( 'Header Options', 'configurator' ),
    'priority'    => 3,
    'description'    => esc_html__( 'Adjust header options', 'configurator' )
) );

Kirki::add_field( 'header_visibility', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_visibility',
	'label'    => esc_html__( 'Show/Hide Header?', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'show',
	'choices'  => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'header_layout', array(
	'type'     => 'radio-image',
	'settings' => 'header_layout',
	'label'    => esc_html__( 'Main Header Layout', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'header2',
	'choices'  => $headers,
	'transport' => 'refresh'
) );

Kirki::add_field( 'transparent_header', array(
	'type'     => 'radio-buttonset',
	'settings' => 'transparent_header',
	'label'    => esc_html__( 'Enable Transparent Header?', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'hide',
	'choices'  => array(
		'show'  => esc_attr__( 'Yes', 'configurator' ),
		'hide'  => esc_attr__( 'No', 'configurator' )
	),
) );

Kirki::add_field( 'transparent_header_opacity', array(
	'type'     => 'slider',
	'settings' => 'transparent_header_opacity',
	'label'    => esc_html__( 'Adjust transparent header alpha value?', 'configurator' ),
	'section'  => 'header_options',
	'default'  => '0',
	'choices'  => array(
		'min'  => '0',
		'max'  => '90',
		'step' => '10',
	),
	'transport' => 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'transparent_header',
			'operator' => '==',
			'value'    => 'show',
		)
	)
) );

Kirki::add_field( 'header_background_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_background_style',
	'label'    => esc_html__( 'Header Background Style', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'light',
	'choices'  => array(
		'light' => esc_attr__( 'Light', 'configurator' ),
		'dark'  => esc_attr__( 'Dark', 'configurator' )
	)
) );

Kirki::add_field( 'dropdown_menu_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'dropdown_menu_style',
	'label'    => esc_html__( 'Dropdown Menu Style', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'light',
	'choices'  => array(
		'light' => esc_attr__( 'Light', 'configurator' ),
		'dark'  => esc_attr__( 'Dark', 'configurator' )
	)
) );

Kirki::add_field( 'mobile_menu_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_menu_align',
	'label'    => esc_html__( 'Mobile Menu Position', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'left',
	'choices'  => array(
		'left'  => esc_attr__( 'Left', 'configurator' ),
		'right' => esc_attr__( 'Right', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'mobile_menu_dropdown', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_menu_dropdown',
	'label'    => esc_html__( 'Show Mobile Menu Dropdown', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'show',
	'choices'  => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'mobile_menu_background_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_menu_background_color',
	'label'    => esc_html__( 'Mobile Menu Background Color', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'light',
	'choices'  => array(
		'light' => esc_attr__( 'Light', 'configurator' ),
		'dark'  => esc_attr__( 'Dark', 'configurator' )
	)
) );

Kirki::add_field( 'sticky_header', array(
	'type'     => 'radio-buttonset',
	'settings' => 'sticky_header',
	'label'    => esc_html__( 'Sticky Header?', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'scroll_up',
	'choices'  => array(
		'disable'   => esc_attr__( 'Disable', 'configurator' ),
		'enable'    => esc_attr__( 'Enable', 'configurator' ),
		'scroll_up' => esc_attr__( 'Show On Scroll Up', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'mobile_sticky_header', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_sticky_header',
	'label'    => esc_html__( 'Enable Sticky Header on Mobile Devices?', 'configurator' ),
	'section'  => 'header_options',
	'default'  => 'disable',
	'choices'  => array(
		'disable' => esc_attr__( 'Disable', 'configurator' ),
		'enable'  => esc_attr__( 'Enable', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'header_sticky_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_sticky_color',
	'label'    => esc_html__( 'Sticky Header Background', 'configurator' ),
	'section'  => 'header_option_section',
	'default'  => 'light',
	'choices'  => array(
		'dark'  => esc_attr__( 'Dark', 'configurator' ),
		'light'  => esc_attr__( 'Light', 'configurator' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'header_sticky',
			'operator' => '==',
			'value'    => 'enable'
		)
	),
	'transport' => 'postMessage',
) );

Kirki::add_field( 'header_icon', array(
	'type'        => 'sortable',
	'settings'    => 'header_icon',
	'label'       => esc_html__( 'Header Icon', 'configurator' ),
	'section'     => 'header_options',
	'default'     => array(
		'search_icon',
		'wishlist',
		'cart'
	),
	'choices'     => array(
		'search_icon'   => esc_attr__( 'Search Icon', 'configurator' ),
		'wishlist' => esc_attr__( 'Wishlist', 'configurator' ),
		'cart'     => esc_attr__( 'Cart', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'header_layout' => array(
			'selector'        => '.widget-right',
			'render_callback' => 'configurator_print_header_element',
		),
	)
) );

Kirki::add_field( 'wishlist_page_id', array(
	'type'      => 'select',
	'settings'  => 'wishlist_page_id',
	'label'     => esc_html__( 'Choose Wishlist Page', 'configurator' ),
	'section'   => 'header_options',
	'choices'   => $all_pages,
	'transport' => 'refresh'
) );

// Title Bar
Kirki::add_panel( 'title_bar', array(	
    'priority'    => 4,
    'title'       => esc_html__( 'Title Bar', 'configurator' ),
    'description' => esc_html__( 'All title bar settings can be changed here.', 'configurator' )
) );

// Title Bar: Page
Kirki::add_section( 'title_bar', array(
    'title'          => esc_html__( 'Page', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

// Title Bar: 404
Kirki::add_section( 'title_bar', array(
    'title'          => esc_html__( 'General', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: Blog
Kirki::add_section( 'blog_title_bar', array(
    'title'          => esc_html__( 'Blog', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'blog_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'blog_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'blog_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'blog_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title', array(
	'type'     => 'text',
	'settings' => 'blog_title',
	'label'    => esc_html__( 'Blog Title', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => esc_attr__( 'Blog', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'blog_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'blog_sub_title', array(
	'type'     => 'text',
	'settings' => 'blog_sub_title',
	'label'    => esc_html__( 'Blog Sub Title', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'blog_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'blog_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'blog_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'blog_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'blog_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'blog_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: Archives
Kirki::add_section( 'archives_title_bar', array(
    'title'          => esc_html__( 'Archives', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'archives_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'archives_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'archives_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'archives_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_sub_title', array(
	'type'     => 'text',
	'settings' => 'archives_sub_title',
	'label'    => esc_html__( 'Archives Sub Title', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'archives_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'archives_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'archives_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'archives_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'archives_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'archives_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: Search
Kirki::add_section( 'search_title_bar', array(
    'title'          => esc_html__( 'Search', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'search_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'search_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'search_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'search_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_sub_title', array(
	'type'     => 'text',
	'settings' => 'search_sub_title',
	'label'    => esc_html__( 'Search Sub Title', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'search_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'search_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'search_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'search_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'search_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'search_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'search_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: Single Blog
Kirki::add_section( 'single_title_bar', array(
    'title'          => esc_html__( 'Single Blog', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'single_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'hide',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'single_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'single_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		),
		array(
			'setting'  => 'single_title_bar_title',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_meta_sort', array(
	'type'        => 'sortable',
	'settings'    => 'single_meta_sort',
	'label'       => esc_html__( 'Meta', 'configurator' ),
	'section'     => 'single_title_bar',
	'default'     => array(
		'author',
		'comment',
		'date'
	),
	'choices'     => array(
		'author'   => esc_attr__( 'Author', 'configurator' ),
		'comment'  => esc_attr__( 'Comment', 'configurator' ),
		'date'     => esc_attr__( 'Date', 'configurator' ),
		'category' => esc_attr__( 'Category', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'single_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'single_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'single_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'single_title_bar',
			'operator' => '==',
			'value'    => 'show'
		),
		array(
			'setting'  => 'single_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share'
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: Shop
Kirki::add_section( 'shop_title_bar', array(
    'title'          => esc_html__( 'Shop', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'shop_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'shop_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'shop_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'shop_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_sub_title', array(
	'type'     => 'text',
	'settings' => 'shop_sub_title',
	'label'    => esc_html__( 'Shop Sub Title', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'shop_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'shop_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'shop_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'shop_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'shop_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'shop_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: Single Product
Kirki::add_section( 'single_product_title_bar', array(
    'title'          => esc_html__( 'Single Product', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( 'single_product_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'single_product_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'single_product_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'single_product_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( 'single_product_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => 'single_product_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => 'single_product_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'single_product_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );

// Title Bar: 404
Kirki::add_section( '404_title_bar', array(
    'title'          => esc_html__( 'Error Page', 'configurator' ),
    'description'    => esc_html__( 'Adjust title bar', 'configurator' ),
    'panel'			 => 'title_bar'
) );

Kirki::add_field( '404_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_align', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar_align',
	'label'    => esc_html__( 'Title Bar Style', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'sub-banner-center',
	'choices' => array(
		'sub-banner-center' => esc_attr__( 'Sub Banner Center', 'configurator' ),
		'sub-banner-left'   => esc_attr__( 'Sub Banner Left', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_method', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar_method',
	'label'    => esc_html__( 'Title Bar Method', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'hyphen',
	'choices' => array(
		'hyphen' => esc_attr__( 'Hyphen', 'configurator' ),
		'slash'  => esc_attr__( 'Slash', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar_method' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_goback', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar_goback',
	'label'    => esc_html__( 'Show/Hide Title Bar Goback Link', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar_goback' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_title', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Title', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_share_option', array(
	'type'        => 'sortable',
	'settings'    => '404_title_bar_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => '404_title_bar',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar_share_option' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_share_below_title', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar_share_below_title',
	'label'    => esc_html__( 'Show/Hide Title Bar Share Below Title', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => '404_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar_share_below_title' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_sub_title', array(
	'type'     => 'text',
	'settings' => '404_sub_title',
	'label'    => esc_html__( '404 Sub Title', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => '404_title_bar_title',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( '404_title_bar_on_right_side', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_title_bar_on_right_side',
	'label'    => esc_html__( 'On Right Side', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => 'breadcrumbs',
	'choices' => array(
		'breadcrumbs' => esc_attr__( 'Breadcrumbs', 'configurator' ),
		'share'       => esc_attr__( 'Share', 'configurator' ),
		'none'        => esc_attr__( 'None', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'404_title_bar_on_right_side' => array(
			'selector'        => '.customize-tile-bar',
			'render_callback' => 'configurator_print_title_bar'
		)
	)
) );

Kirki::add_field( '404_title_bar_on_right_side_title', array(
	'type'     => 'text',
	'settings' => '404_title_bar_on_right_side_title',
	'label'    => esc_html__( 'On Right Side Title', 'configurator' ),
	'section'  => '404_title_bar',
	'default'  => esc_attr__( 'Share with friends', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => '404_title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => '404_title_bar_on_right_side',
			'operator' => '==',
			'value'    => 'share',
		)
	),
	'transport' => 'postMessage'
) );


// Blog
Kirki::add_section( 'blog', array(
	'title'    => esc_html__( 'Blog', 'configurator' ),	
    'priority'    => 5,
    'description' => esc_html__( 'All blog settings can be changed here.', 'configurator' )
) );

Kirki::add_field( 'blog_style', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'blog_style',
	'label'     => esc_html__( 'Blog Style', 'configurator' ),
	'section'   => 'blog',
	'default'   => 'normal',
	'choices'   => $blog_style,
	'transport' => 'refresh'
) );

Kirki::add_field( 'blog_slider', array(
	'type'      => 'text',
	'settings'  => 'blog_slider',
	'label'     => esc_html__( 'Slider Shortcode', 'configurator' ),
    'description' => esc_html__( 'Type the slider shortcode to display slider. Eg: [revslider demo]', 'configurator' ),
	'section'   => 'blog',
	'default'   => '',
	'transport' => 'refresh'
) );

Kirki::add_field( 'blog_layout', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'blog_layout',
	'label'     => esc_html__( 'Layout', 'configurator' ),
	'section'   => 'blog',
	'default'   => 'right-sidebar',
	'choices'   => $sidebar,
	'transport' => 'refresh'
) );

Kirki::add_field( 'blog_sidebar', array(
	'type'      => 'select',
	'settings'  => 'blog_sidebar',
	'label'     => esc_html__( 'Choose the Registered Sidebar?', 'configurator' ),
	'section'   => 'blog',
	'default'   => '0',
	'choices'   => configurator_get_registered_sidebars( array( 'blog-sidebar' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_layout',
			'operator' => '!=',
			'value'    => 'full-width',
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'blog_title_limit', array(
	'type'      => 'text',
	'settings'  => 'blog_title_limit',
	'label'     => esc_html__( 'Title Limit', 'configurator' ),
	'section'   => 'blog',
	'default'   => '20',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_title_limit' => array(
			'selector'        => 'body.blog .entry-content h3',
			'render_callback' => 'configurator_print_post_title',
		)
	)
) );

Kirki::add_field( 'blog_content_limit', array(
	'type'      => 'text',
	'settings'  => 'blog_content_limit',
	'label'     => esc_html__( 'Content Limit', 'configurator' ),
	'section'   => 'blog',
	'default'   => '180',
	'transport' => 'refresh'
) );

Kirki::add_field( 'blog_meta_sort', array(
	'type'        => 'sortable',
	'settings'    => 'blog_meta_sort',
	'label'       => esc_html__( 'Meta', 'configurator' ),
	'section'     => 'blog',
	'default'     => array(
		'author',
		'comment',
		'date'
	),
	'choices'     => array(
		'author'   => esc_attr__( 'Author', 'configurator' ),
		'comment'  => esc_attr__( 'Comment', 'configurator' ),
		'date'     => esc_attr__( 'Date', 'configurator' ),
		'category' => esc_attr__( 'Category', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_style',
			'operator' => '!=',
			'value'    => 'list'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_meta_sort' => array(
			'selector'        => 'body.blog .blog-meta',
			'render_callback' => 'configurator_print_post_meta'
		)
	)
) );

Kirki::add_field( 'blog_meta', array(
	'type'     => 'select',
	'settings' => 'blog_meta',
	'label'    => esc_html__( 'Meta', 'configurator' ),
	'section'  => 'blog',
	'default'  => 'date',
	'choices' => array(
		'author'   => esc_attr__( 'Author', 'configurator' ),
		'comment'  => esc_attr__( 'Comment', 'configurator' ),
		'date'     => esc_attr__( 'Date', 'configurator' ),
		'category' => esc_attr__( 'Category', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_style',
			'operator' => '==',
			'value'    => 'list',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_meta' => array(
			'selector'        => 'body.blog .blog-meta',
			'render_callback' => 'configurator_print_post_meta'
		)
	)
) );

Kirki::add_field( 'blog_link_btn', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_link_btn',
	'label'    => esc_html__( 'Show/Hide Link Button', 'configurator' ),
	'section'  => 'blog',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_link_btn' => array(
			'selector'        => 'body.blog .customize-post-link-btn',
			'render_callback' => 'configurator_print_link_btn'
		)
	)
) );

Kirki::add_field( 'blog_link_text', array(
	'type'      => 'text',
	'settings'  => 'blog_link_text',
	'label'     => esc_html__( 'Link Text', 'configurator' ),
	'section'   => 'blog',
	'default'   => esc_html__( 'Read More', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_link_btn',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.blog .link-btn a',
			'function' => 'html',
			'property' => 'blog_link_text'
		)
	)
) );

Kirki::add_field( 'blog_pagination', array(
	'type'     => 'select',
	'settings' => 'blog_pagination',
	'label'    => esc_html__( 'Pagination Type', 'configurator' ),
	'section'  => 'blog',
	'default'  => 'number',
	'choices'  => $pagination,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'blog_pagination' => array(
			'selector'        => '.customize-post-pagination',
			'render_callback' => 'configurator_print_pagination'
		)
	)
) );

// Archives
Kirki::add_section( 'archives', array(
	'title'    => esc_html__( 'Archives', 'configurator' ),	
    'priority'    => 6,
    'description' => esc_html__( 'All archives settings can be changed here.', 'configurator' )
) );

Kirki::add_field( 'archives_style', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'archives_style',
	'label'     => esc_html__( 'Archives Style', 'configurator' ),
	'section'   => 'archives',
	'default'   => 'normal',
	'choices'   => $blog_style,
	'transport' => 'refresh'
) );

Kirki::add_field( 'archives_slider', array(
	'type'      => 'text',
	'settings'  => 'archives_slider',
	'label'     => esc_html__( 'Slider Shortcode', 'configurator' ),
    'description' => esc_html__( 'Type the slider shortcode to display slider. Eg: [revslider demo]', 'configurator' ),
	'section'   => 'archives',
	'default'   => '',
	'transport' => 'refresh'
) );

Kirki::add_field( 'archives_layout', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'archives_layout',
	'label'     => esc_html__( 'Layout', 'configurator' ),
	'section'   => 'archives',
	'default'   => 'right-sidebar',
	'choices'   => $sidebar,
	'transport' => 'refresh'
) );

Kirki::add_field( 'archives_sidebar', array(
	'type'      => 'select',
	'settings'  => 'archives_sidebar',
	'label'     => esc_html__( 'Choose the Registered Sidebar?', 'configurator' ),
	'section'   => 'archives',
	'default'   => '0',
	'choices'   => configurator_get_registered_sidebars( array( 'blog-sidebar' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'single_layout',
			'operator' => '!=',
			'value'    => 'full-width'
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'archives_title_limit', array(
	'type'      => 'text',
	'settings'  => 'archives_title_limit',
	'label'     => esc_html__( 'Title Limit', 'configurator' ),
	'section'   => 'archives',
	'default'   => '20',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_title_limit' => array(
			'selector'        => 'body.archive .entry-content h3',
			'render_callback' => 'configurator_print_post_title'
		)
	)
) );

Kirki::add_field( 'archives_content_limit', array(
	'type'      => 'text',
	'settings'  => 'archives_content_limit',
	'label'     => esc_html__( 'Content Limit', 'configurator' ),
	'section'   => 'archives',
	'default'   => '180',
	'transport' => 'refresh'
) );

Kirki::add_field( 'archives_meta_sort', array(
	'type'        => 'sortable',
	'settings'    => 'archives_meta_sort',
	'label'       => esc_html__( 'Meta', 'configurator' ),
	'section'     => 'archives',
	'default'     => array(
		'author',
		'comment',
		'date'
	),
	'choices'     => array(
		'author'  => esc_attr__( 'Author', 'configurator' ),
		'comment' => esc_attr__( 'Comment', 'configurator' ),
		'date'    => esc_attr__( 'Date', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_style',
			'operator' => '!=',
			'value'    => 'list'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_meta_sort' => array(
			'selector'        => 'body.archive .blog-meta',
			'render_callback' => 'configurator_print_post_meta'
		)
	)
) );

Kirki::add_field( 'archives_meta', array(
	'type'     => 'select',
	'settings' => 'archives_meta',
	'label'    => esc_html__( 'Meta', 'configurator' ),
	'section'  => 'archives',
	'default'  => 'date',
	'choices' => array(
		'author'   => esc_attr__( 'Author', 'configurator' ),
		'comment'  => esc_attr__( 'Comment', 'configurator' ),
		'date'     => esc_attr__( 'Date', 'configurator' ),
		'category' => esc_attr__( 'Category', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_style',
			'operator' => '==',
			'value'    => 'list'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_meta' => array(
			'selector'        => 'body.archive .blog-meta',
			'render_callback' => 'configurator_print_post_meta'
		)
	)
) );

Kirki::add_field( 'archives_link_btn', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_link_btn',
	'label'    => esc_html__( 'Show/Hide Link Button', 'configurator' ),
	'section'  => 'archives',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_link_btn' => array(
			'selector'        => 'body.archive .customize-post-link-btn',
			'render_callback' => 'configurator_print_link_btn'
		)
	)
) );

Kirki::add_field( 'archives_link_text', array(
	'type'      => 'text',
	'settings'  => 'archives_link_text',
	'label'     => esc_html__( 'Link Text', 'configurator' ),
	'section'   => 'archives',
	'default'   => esc_html__( 'Read More', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_link_btn',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.archive .link-btn a',
			'function' => 'html',
			'property' => 'archives_link_text',
		)
	)
) );

Kirki::add_field( 'archives_pagination', array(
	'type'     => 'select',
	'settings' => 'archives_pagination',
	'label'    => esc_html__( 'Pagination Type', 'configurator' ),
	'section'  => 'archives',
	'default'  => 'number',
	'choices'  => $pagination,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'archives_pagination' => array(
			'selector'        => 'body.archive .customize-post-pagination',
			'render_callback' => 'configurator_print_pagination'
		)
	)
) );

// Search
Kirki::add_section( 'search', array(
	'title'    => esc_html__( 'Search', 'configurator' ),	
    'priority'    => 6,
    'description' => esc_html__( 'All search page settings can be changed here.', 'configurator' )
) );

Kirki::add_field( 'search_style', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'search_style',
	'label'     => esc_html__( 'Search Style', 'configurator' ),
	'section'   => 'search',
	'default'   => 'normal',
	'choices'   => $blog_style,
	'transport' => 'refresh'
) );

Kirki::add_field( 'search_slider', array(
	'type'      => 'text',
	'settings'  => 'search_slider',
	'label'     => esc_html__( 'Slider Shortcode', 'configurator' ),
    'description' => esc_html__( 'Type the slider shortcode to display slider. Eg: [revslider demo]', 'configurator' ),
	'section'   => 'search',
	'default'   => '',
	'transport' => 'refresh'
) );

Kirki::add_field( 'search_layout', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'search_layout',
	'label'     => esc_html__( 'Layout', 'configurator' ),
	'section'   => 'search',
	'default'   => 'right-sidebar',
	'choices'   => $sidebar,
	'transport' => 'refresh'
) );

Kirki::add_field( 'search_sidebar', array(
	'type'      => 'select',
	'settings'  => 'search_sidebar',
	'label'     => esc_html__( 'Choose the Registered Sidebar?', 'configurator' ),
	'section'   => 'search',
	'default'   => '0',
	'choices'   => configurator_get_registered_sidebars( array( 'blog-sidebar' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'single_layout',
			'operator' => '!=',
			'value'    => 'full-width',
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'search_title_limit', array(
	'type'      => 'text',
	'settings'  => 'search_title_limit',
	'label'     => esc_html__( 'Title Limit', 'configurator' ),
	'section'   => 'search',
	'default'   => '20',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_title_limit' => array(
			'selector'        => 'body.search .entry-content h3',
			'render_callback' => 'configurator_print_post_title'
		)
	)
) );

Kirki::add_field( 'search_content_limit', array(
	'type'      => 'text',
	'settings'  => 'search_content_limit',
	'label'     => esc_html__( 'Content Limit', 'configurator' ),
	'section'   => 'search',
	'default'   => '180',
	'transport' => 'refresh'
) );

Kirki::add_field( 'search_meta_sort', array(
	'type'        => 'sortable',
	'settings'    => 'search_meta_sort',
	'label'       => esc_html__( 'Meta', 'configurator' ),
	'section'     => 'search',
	'default'     => array(
		'author',
		'comment',
		'date'
	),
	'choices'     => array(
		'author'  => esc_attr__( 'Author', 'configurator' ),
		'comment' => esc_attr__( 'Comment', 'configurator' ),
		'date'    => esc_attr__( 'Date', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_style',
			'operator' => '!=',
			'value'    => 'list'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_meta_sort' => array(
			'selector'        => 'body.search .blog-meta',
			'render_callback' => 'configurator_print_post_meta'
		)
	)
) );

Kirki::add_field( 'search_meta', array(
	'type'     => 'select',
	'settings' => 'search_meta',
	'label'    => esc_html__( 'Meta', 'configurator' ),
	'section'  => 'search',
	'default'  => 'date',
	'choices' => array(
		'author'   => esc_attr__( 'Author', 'configurator' ),
		'comment'  => esc_attr__( 'Comment', 'configurator' ),
		'date'     => esc_attr__( 'Date', 'configurator' ),
		'category' => esc_attr__( 'Category', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_style',
			'operator' => '==',
			'value'    => 'list'
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_meta_sort' => array(
			'selector'        => 'body.search .blog-meta',
			'render_callback' => 'configurator_print_post_meta'
		)
	)
) );

Kirki::add_field( 'search_link_btn', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_link_btn',
	'label'    => esc_html__( 'Show/Hide Link Button', 'configurator' ),
	'section'  => 'search',
	'default'  => 'show',
	'choices' => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_link_btn' => array(
			'selector'        => 'body.search .customize-post-link-btn',
			'render_callback' => 'configurator_print_link_btn'
		)
	)
) );

Kirki::add_field( 'search_link_text', array(
	'type'      => 'text',
	'settings'  => 'search_link_text',
	'label'     => esc_html__( 'Link Text', 'configurator' ),
	'section'   => 'search',
	'default'   => esc_html__( 'Read More', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'search_link_btn',
			'operator' => '==',
			'value'    => 'show'
		)
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.search .link-btn a',
			'function' => 'html',
			'property' => 'search_link_text'
		)
	)
) );

Kirki::add_field( 'search_pagination', array(
	'type'     => 'select',
	'settings' => 'search_pagination',
	'label'    => esc_html__( 'Pagination Type', 'configurator' ),
	'section'  => 'search',
	'default'  => 'number',
	'choices'  => $pagination,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'search_pagination' => array(
			'selector'        => 'body.search .customize-post-pagination',
			'render_callback' => 'configurator_print_pagination'
		)
	)
) );

// Single Blog
Kirki::add_panel( 'single_blog', array(
    'title'       => esc_html__( 'Single Blog', 'configurator' ),	
    'priority'    => 7,
    'description' => esc_html__( 'Adjust single blog settings.', 'configurator' )
) );

// Single Blog : General
Kirki::add_section( 'single_general', array(
	'title'    => esc_html__( 'General', 'configurator' ),
	'panel'    => 'single_blog'
) );

Kirki::add_field( 'single_layout', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'single_layout',
	'label'     => esc_html__( 'Layout', 'configurator' ),
	'section'   => 'single_general',
	'default'   => 'right-sidebar',
	'choices'   => $sidebar,
	'transport' => 'refresh'
) );

Kirki::add_field( 'single_sidebar', array(
	'type'      => 'select',
	'settings'  => 'single_sidebar',
	'label'     => esc_html__( 'Choose the Registered Sidebar?', 'configurator' ),
	'section'   => 'single_general',
	'default'   => '0',
	'choices'   => configurator_get_registered_sidebars( array( 'blog-sidebar' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'single_layout',
			'operator' => '!=',
			'value'    => 'full-width',
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'single_tag', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_tag',
	'label'    => esc_html__( 'Single Tag', 'configurator' ),
	'section'  => 'single_general',
	'default'  => 'show',
	'choices'  => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_tag' => array(
			'selector'        => '.customize-single-post-tag-share',
			'render_callback' => 'configurator_print_single_post_tag_share'
		)
	)
) ); 

Kirki::add_field( 'single_share', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_share',
	'label'       => esc_html__( 'Show Share', 'configurator' ),
	'description' => esc_html__( 'Show share options on bottom of the content', 'configurator' ),
	'section'     => 'single_general',
	'default'     => 'show',
	'choices'     => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_share' => array(
			'selector'        => '.customize-single-post-tag-share',
			'render_callback' => 'configurator_print_single_post_tag_share'
		)
	)
) );

Kirki::add_field( 'single_share_option', array(
	'type'        => 'sortable',
	'settings'    => 'single_share_option',
	'label'       => esc_html__( 'Share Options', 'configurator' ),
	'section'     => 'single_general',
	'default'     => array(
		'facebook',
		'twitter',
		'linkedin',
		'pinterest',
		'gplus'
	),
	'choices'     => $social,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_share_option' => array(
			'selector'        => '.customize-single-post-tag-share',
			'render_callback' => 'configurator_print_single_post_tag_share'
		)
	)
) );

Kirki::add_field( 'single_author_box', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_author_box',
	'label'    => esc_html__( 'Author Box', 'configurator' ),
	'section'  => 'single_general',
	'default'  => 'show',
	'choices'  => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide' => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_author_box' => array(
			'selector'        => '.customize-single-post-author-box',
			'render_callback' => 'configurator_print_single_post_author_box'
		)
	)
) );

// Single Blog : Comments section
Kirki::add_section( 'single_comment', array(
	'title'    => esc_html__( 'Comment Section', 'configurator' ),
	'panel'    => 'single_blog'
) );

Kirki::add_field( 'single_comment_form_title', array(
	'type'     => 'text',
	'settings' => 'single_comment_form_title',
	'label'    => esc_html__( 'Comment Form Title', 'configurator' ),
	'section'  => 'single_comment',
	'default'  => esc_attr__( 'Leave a Comment', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.comment-reply-title',
			'function' => 'html',
			'property' => 'single_comment_form_title'
		)
	)
) );

Kirki::add_field( 'single_comment_form_btn_text', array(
	'type'     => 'text',
	'settings' => 'single_comment_form_btn_text',
	'label'    => esc_html__( 'Comment Form Button Text', 'configurator' ),
	'section'  => 'single_comment',
	'default'  => esc_attr__( 'Post Comment', 'configurator' ),
	'transport' => 'postMessage'
) );

// Shop
Kirki::add_panel( 'shop', array(
	'title'       => esc_html__( 'Shop', 'configurator' ),	
	'priority'    => 8,
	'description' => esc_html__( 'Adjust shop settings.', 'configurator' )
) );

// Shop: General
Kirki::add_section( 'shop_general', array(
    'title'          => esc_html__( 'Shop', 'configurator' ),
    'panel'			 => 'shop'
) );

Kirki::add_field( 'shop_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_style',
	'label'    => esc_html__( 'Style', 'configurator' ),
	'section'  => 'shop_general',
	'default'  => 'list',
	'choices'  => array(
		'list' => esc_attr__( 'List', 'configurator' ),
		'grid' => esc_attr__( 'Grid', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_layout', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'shop_layout',
	'label'     => esc_html__( 'Layout', 'configurator' ),
	'section'   => 'shop_general',
	'default'   => 'full-width',
	'choices'   => $sidebar,
	'transport' => 'refresh'
) );

Kirki::add_field( 'shop_sidebar', array(
	'type'      => 'select',
	'settings'  => 'shop_sidebar',
	'label'     => esc_html__( 'Choose the Registered Sidebar?', 'configurator' ),
	'section'   => 'shop_general',
	'default'   => '0',
	'choices'   => configurator_get_registered_sidebars( array( 'blog-sidebar' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'shop_layout',
			'operator' => '!=',
			'value'    => 'full-width',
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'shop_btn_on_hover', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_btn_on_hover',
	'label'    => esc_html__( 'Button on Hover', 'configurator' ),
	'section'  => 'shop_general',
	'default'  => 'no',
	'choices'  => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_items', array(
	'type'     => 'text',
	'settings' => 'shop_items',
	'label'    => esc_html__( 'Number of Products', 'configurator' ),
	'section'  => 'shop_general',
	'default'  => 8,
	'transport' => 'refresh'
) );

Kirki::add_field( 'shop_width', array(
	'type'     => 'text',
	'settings' => 'shop_width',
	'label'    => esc_html__( 'Shop Width', 'configurator' ),
	'section'  => 'shop_general',
	'default'  => 370,
	'transport' => 'refresh'
) );

Kirki::add_field( 'shop_height', array(
	'type'     => 'text',
	'settings' => 'shop_height',
	'label'    => esc_html__( 'Shop Height', 'configurator' ),
	'section'  => 'shop_general',
	'default'  => 200,
	'transport' => 'refresh'
) );

// Shop: Button Style
Kirki::add_section( 'shop_button_style', array(
    'title'          => esc_html__( 'Button Style', 'configurator' ),
    'panel'			 => 'shop'
) );

Kirki::add_field( 'shop_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'shop_button_style',
	'default'  => 'btn-solid',
	'choices'  => array(
		'btn-solid' => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'shop_button_style',
	'default'  => 'btn-uppercase',
	'choices'  => array(
		'btn-uppercase' => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase' => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'shop_button_style',
	'default'  => 'btn-sm',
	'choices'  => array(
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm' => esc_attr__( 'Small', 'configurator' ),
		'btn-md' => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg' => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'shop_button_style',
	'default'  => 'btn-gradient',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'shop_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'shop_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'shop_button_style',
	'default'  => 'btn-oval',
	'choices'  => array(
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

// Single Product
Kirki::add_panel( 'shop_single', array(
	'title'       => esc_html__( 'Single Product', 'configurator' ),	
	'priority'    => 9,
	'description' => esc_html__( 'Adjust single products settings.', 'configurator' )
) );

Kirki::add_section( 'shop_single_general', array(
	'title'       => esc_html__( 'General', 'configurator' ),
    'panel'			 => 'shop_single'
) );

Kirki::add_field( 'single_product_wishlist_btn', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_wishlist_btn',
	'label'    => esc_html__( 'Show Wishlist Button', 'configurator' ),
	'section'  => 'shop_single_general',
	'default'  => 'show',
	'choices'  => array(
		'show' => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' )
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'single_product_wishlist_btn' => array(
			'selector'        => '.customize-single-product-wishlist',
			'render_callback' => 'configurator_print_single_product_wishlist'
		)
	)
) );

Kirki::add_field( 'single_product_wishlist_text', array(
	'type'     => 'text',
	'settings' => 'single_product_wishlist_text',
	'label'    => esc_html__( 'Wishlist Text', 'configurator' ),
	'section'  => 'shop_single_general',
	'default'  => esc_html__( 'Add to wishlist', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'single_product_wishlist_btn',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.woo-products .wishlist-text',
			'function' => 'html',
			'property' => 'single_product_wishlist_text'
		)
	)
) );

Kirki::add_field( 'single_product_related_product_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_related_product_style',
	'label'    => esc_html__( 'Related Product Style', 'configurator' ),
	'section'  => 'shop_single_general',
	'default'  => 'product-grid',
	'choices'  => array(
		'product-list' => esc_attr__( 'List', 'configurator' ),
		'product-grid' => esc_attr__( 'Grid', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_related_product_column', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_related_product_column',
	'label'    => esc_html__( 'Related Product Column', 'configurator' ),
	'section'  => 'shop_single_general',
	'default'  => 'col2',
	'choices'  => array(
		'col2' => esc_attr__( '2 Column', 'configurator' ),
		'col3' => esc_attr__( '3 Column', 'configurator' ),
		'col4' => esc_attr__( '4 Column', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_related_on_hover', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_related_on_hover',
	'label'    => esc_html__( 'Button on Hover', 'configurator' ),
	'section'  => 'shop_single_general',
	'default'  => 'no',
	'choices'  => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_related_product_title', array(
	'type'      => 'text',
	'settings'  => 'single_product_related_product_title',
	'label'     => esc_html__( 'Related Product Title', 'configurator' ),
	'section'   => 'shop_single_general',
	'default'   => esc_attr__( 'Other styles you might like', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.woo-products .related-title',
			'function' => 'html',
			'property' => 'single_product_related_product_title'
		)
	)
) );

Kirki::add_field( 'single_product_related_product_sub_title', array(
	'type'      => 'text',
	'settings'  => 'single_product_related_product_sub_title',
	'label'     => esc_html__( 'Related Product Sub Title', 'configurator' ),
	'section'   => 'shop_single_general',
	'default'   => esc_attr__( 'Select and customize', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.woo-products .tagline',
			'function' => 'html',
			'property' => 'single_product_related_product_sub_title'
		)
	)
) );

Kirki::add_field( 'single_product_related_product_items', array(
	'type'     => 'text',
	'settings' => 'single_product_related_product_items',
	'label'    => esc_html__( 'Number of Related Products', 'configurator' ),
	'section'  => 'shop_single_general',
	'default'  => 3,
	'transport' => 'refresh'
) );


// Shop: Button Style
Kirki::add_section( 'shop_single_button_style', array(
    'title'          => esc_html__( 'Button Style', 'configurator' ),
    'panel'			 => 'shop_single'
) );

Kirki::add_field( 'single_product_btn_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_btn_style',
	'label'    => esc_html__( 'Button Style', 'configurator' ),
	'section'  => 'shop_single_button_style',
	'default'  => 'btn-solid',
	'choices'  => array(
		'btn-solid' => esc_attr__( 'Solid', 'configurator' ),
		'btn-outline' => esc_attr__( 'Outline', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_btn_text_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_btn_text_style',
	'label'    => esc_html__( 'Button Text Style', 'configurator' ),
	'section'  => 'shop_single_button_style',
	'default'  => 'btn-uppercase',
	'choices'  => array(
		'btn-uppercase' => esc_attr__( 'Uppercase', 'configurator' ),
		'btn-lowercase' => esc_attr__( 'Lowercase', 'configurator' ),
		'btn-capitalize' => esc_attr__( 'Capitalize', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_btn_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_btn_size',
	'label'    => esc_html__( 'Button Size', 'configurator' ),
	'section'  => 'shop_single_button_style',
	'default'  => 'btn-sm',
	'choices'  => array(
		'btn-xs' => esc_attr__( 'Ex Small', 'configurator' ),
		'btn-sm' => esc_attr__( 'Small', 'configurator' ),
		'btn-md' => esc_attr__( 'Medium', 'configurator' ),
		'btn-lg' => esc_attr__( 'Large', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_btn_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_btn_color',
	'label'    => esc_html__( 'Button Color', 'configurator' ),
	'section'  => 'shop_single_button_style',
	'default'  => 'btn-gradient',
	'choices'  => array(
		'btn-gradient' => esc_attr__( 'Gradient', 'configurator' ),
		'btn-black'    => esc_attr__( 'Black', 'configurator' ),
		'btn-primary'  => esc_attr__( 'Primary Color', 'configurator' ),
		'btn-custom'   => esc_attr__( 'Custom', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'single_product_btn_type', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_product_btn_type',
	'label'    => esc_html__( 'Button Type', 'configurator' ),
	'section'  => 'shop_single_button_style',
	'default'  => 'btn-oval',
	'choices'  => array(
		'btn-oval'      => esc_attr__( 'Oval', 'configurator' ),
		'btn-rectangle' => esc_attr__( 'Rectangle', 'configurator' )
	),
	'transport' => 'postMessage'
) );

// 404 Page
Kirki::add_section( 'error', array(
	'title'       => esc_html__( 'Error Page', 'configurator' ),	
	'priority'    => 10,
	'description' => esc_html__( 'Adjust 404 page settings.', 'configurator' )
) );

Kirki::add_field( '404_title', array(
	'type'     => 'text',
	'settings' => '404_title',
	'label'    => esc_html__( '404 Error Title', 'configurator' ),
	'section'  => 'error',
	'default'  => esc_html__( 'Oops!', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.error404 .article-header h1',
			'function' => 'html',
			'property' => '404_title'
		)
	)
) );

Kirki::add_field( '404_sub_title', array(
	'type'     => 'text',
	'settings' => '404_sub_title',
	'label'    => esc_html__( '404 Error Sub Title', 'configurator' ),
	'section'  => 'error',
	'default'  => esc_html__( 'Seems like that page can\'t be found.', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.error404 .article-header p',
			'function' => 'html',
			'property' => '404_sub_title'
		)
	)
) );

Kirki::add_field( '404_description', array(
	'type'     => 'textarea',
	'settings' => '404_description',
	'label'    => esc_html__( '404 Error Description', 'configurator' ),
	'section'  => 'error',
	'default'  => esc_html__( 'Please feel free to browse the rest of our site.', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.error404 .404-description',
			'function' => 'html',
			'property' => '404_description'
		)
	)
) );

Kirki::add_field( '404_home_btn', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_home_btn',
	'label'    => esc_html__( 'Show/Hide Home Button', 'configurator' ),
	'section'  => 'error',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'hide', 'configurator' )
	),
	'transport' => 'refresh'
) );

Kirki::add_field( '404_home_btn_text', array(
	'type'     => 'text',
	'settings' => '404_home_btn_text',
	'label'    => esc_html__( '404 Home Button Text', 'configurator' ),
	'section'  => 'error',
	'default'  => esc_html__( 'Back to Home', 'configurator' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.error404 .404-btn',
			'function' => 'html',
			'property' => '404_home_btn_text'
		)
	)
) );

// Footer
Kirki::add_section( 'footer', array(
    'title'       => esc_html__( 'Footer Options', 'configurator' ),	
	'priority'    => 11,
	'description' => esc_html__( 'Adjust footer settings.', 'configurator' )
) );

Kirki::add_field( 'footer_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_style',
	'label'    => esc_html__( 'Footer Style', 'configurator' ),
	'section'  => 'footer',
	'default'  => 'dark',
	'choices'  => array(
		'dark'  => esc_attr__( 'Dark', 'configurator' ),
		'light' => esc_attr__( 'Light', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'footer_fixed', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_fixed',
	'label'    => esc_html__( 'Choose Fixed Footer?', 'configurator' ),
	'section'  => 'footer',
	'default'  => 'no',
	'choices'  => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'footer_widget', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_widget',
	'label'    => esc_html__( 'Show/Hide Footer Widget', 'configurator' ),
	'section'  => 'footer',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' ),
	)
) );

Kirki::add_field( 'footer_widget_col', array(
	'type'     => 'radio-image',
	'settings' => 'footer_widget_col',
	'label'    => esc_html__( 'Footer Column', 'configurator' ),
	'section'  => 'footer',
	'default'  => 'layout12',
	'choices'  => $footer_layout,
	'active_callback'    => array(
		array(
			'setting'  => 'footer_widget',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage'
) );

Kirki::add_field( 'footer_widget_area', array(
	'type'     => 'select',
	'settings' => 'footer_widget_area',
	'label'    => esc_html__( 'Choose the Registered Widgets', 'configurator' ),
	'section'  => 'footer',
	'default'  => '0',
	'choices'  => configurator_get_registered_sidebars( array( 'footer-widgets' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_widget',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'refresh'
) );

Kirki::add_field( 'footer_small', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_small',
	'label'    => esc_html__( 'Show/Hide Small footer', 'configurator' ),
	'section'  => 'footer',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Show', 'configurator' ),
		'hide'  => esc_attr__( 'Hide', 'configurator' ),
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'footer_small' => array(
			'selector'        => '.customize-footer-small',
			'render_callback' => 'configurator_print_small_footer'
		),
	)
) );

Kirki::add_field( 'footer_small_element_position', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'footer_small_element_position',
	'label'       => esc_html__( 'Footer Small Element', 'configurator' ),
	'section'     => 'footer',
	'default'     => 'left_right',
	'choices'     => array(
		'left_right' => esc_attr__( 'Left and Right', 'configurator' ),
		'top_bottom' => esc_attr__( 'Top and Bottom', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_small',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'footer_small_element_position' => array(
			'selector'        => '.customize-footer-small',
			'render_callback' => 'configurator_print_small_footer'
		),
	)
) );

Kirki::add_field( 'footer_small_element', array(
	'type'        => 'sortable',
	'settings'    => 'footer_small_element',
	'label'       => esc_html__( 'Footer Small Element', 'configurator' ),
	'section'     => 'footer',
	'default'     => array(
		'copyright_text',
		'sicons'
	),
	'choices'     => array(
		'copyright_text' => esc_attr__( 'Copyright', 'configurator' ),
		'sicons'         => esc_attr__( 'Social Icons', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_small',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'footer_small_element' => array(
			'selector'        => '.customize-footer-small',
			'render_callback' => 'configurator_print_small_footer'
		)
	)
) );

Kirki::add_field( 'footer_copyright_text', array(
	'type'     => 'textarea',
	'settings' => 'footer_copyright_text',
	'label'    => esc_html__( 'Copyright Text', 'configurator' ),
	'section'  => 'footer',
	'default'  => 'Copyright &copy; '. date('Y') .' '. esc_html__( ' All Rights Reserved.', 'configurator' ),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_small',
			'operator' => '==',
			'value'    => 'show',
		)
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.header-elem .copyright-text',
			'function' => 'html',
			'property' => 'footer_copyright_text'
		)
	)
) );

// Typography
Kirki::add_section( 'typography', array(
	'title'       => esc_html__( 'Typography', 'configurator' ),	
	'priority'    => 12,
	'description' => esc_html__( 'Adjust Typography settings.', 'configurator' )
) );

Kirki::add_field( 'primary_font', array(
	'type'        => 'typography',
	'settings'    => 'primary_font',
	'label'       => esc_attr__( 'Primary Font', 'configurator' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Montserrat'
	)
) );

Kirki::add_field( 'content_font', array(
	'type'        => 'typography',
	'settings'    => 'content_font',
	'label'       => esc_attr__( 'Content Font', 'configurator' ),
	'section'     => 'typography',
	'default'     => array(
		'font-family'    => 'Raleway'
	)
) );

// Advance Typography
Kirki::add_section( 'advance_typography', array(
	'title'       => esc_html__( 'Advance Typography', 'configurator' ),	
	'priority'    => 13,
	'description' => esc_html__( 'Adjust Typography settings specifically.', 'configurator' )
) );

Kirki::add_field( 'advance_typography', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'advance_typography',
	'label'       => esc_html__( 'Advance Font Settings', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	)
) );

Kirki::add_field( 'h1_font', array(
	'type'        => 'typography',
	'settings'    => 'h1_font',
	'label'       => esc_attr__( 'H1 Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '2em',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'h2_font', array(
	'type'        => 'typography',
	'settings'    => 'h2_font',
	'label'       => esc_attr__( 'H2 Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '1.5em',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'h3_font', array(
	'type'        => 'typography',
	'settings'    => 'h3_font',
	'label'       => esc_attr__( 'H3 Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '1.17em',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'h4_font', array(
	'type'        => 'typography',
	'settings'    => 'h4_font',
	'label'       => esc_attr__( 'H4 Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '1em',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'h5_font', array(
	'type'        => 'typography',
	'settings'    => 'h5_font',
	'label'       => esc_attr__( 'H5 Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '0.83em',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'h6_font', array(
	'type'        => 'typography',
	'settings'    => 'h6_font',
	'label'       => esc_attr__( 'H6 Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '0.67em',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'list_font', array(
	'type'        => 'typography',
	'settings'    => 'list_font',
	'label'       => esc_attr__( 'List Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'link_font', array(
	'type'        => 'typography',
	'settings'    => 'link_font',
	'label'       => esc_attr__( 'Link Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#af476f',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'logo_font', array(
	'type'        => 'typography',
	'settings'    => 'logo_font',
	'label'       => esc_attr__( 'Logo Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '30px',
		'line-height'    => '135px',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'blockquote_font', array(
	'type'        => 'typography',
	'settings'    => 'blockquote_font',
	'label'       => esc_attr__( 'Blockquote Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'main_menu_font', array(
	'type'        => 'typography',
	'settings'    => 'main_menu_font',
	'label'       => esc_attr__( 'Main Menu Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '400',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '4px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'sub_menu_font', array(
	'type'        => 'typography',
	'settings'    => 'sub_menu_font',
	'label'       => esc_attr__( 'Sub Menu Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '400',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'btn_xs_font', array(
	'type'        => 'typography',
	'settings'    => 'btn_xs_font',
	'label'       => esc_attr__( 'Button Extra Small Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '500',
		'font-size'      => '10px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#fff',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'btn_sm_font', array(
	'type'        => 'typography',
	'settings'    => 'btn_sm_font',
	'label'       => esc_attr__( 'Button Small Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '500',
		'font-size'      => '12px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#fff',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'btn_md_font', array(
	'type'        => 'typography',
	'settings'    => 'btn_md_font',
	'label'       => esc_attr__( 'Button Medium Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '500',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#fff',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'btn_lg_font', array(
	'type'        => 'typography',
	'settings'    => 'btn_lg_font',
	'label'       => esc_attr__( 'Button Large Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '500',
		'font-size'      => '15px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#fff',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'title_bar_title_font', array(
	'type'        => 'typography',
	'settings'    => 'title_bar_title_font',
	'label'       => esc_attr__( 'Title Bar Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '3vh',
		'line-height'    => '1.8',
		'letter-spacing' => '3px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'title_bar_sub_title_font', array(
	'type'        => 'typography',
	'settings'    => 'title_bar_sub_title_font',
	'label'       => esc_attr__( 'Title Bar Sub Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '18px',
		'line-height'    => '1.4',
		'letter-spacing' => '3.6px',
		'color'          => '#282219',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'goback_font', array(
	'type'        => 'typography',
	'settings'    => 'goback_font',
	'label'       => esc_attr__( 'Go Back Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '300',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#282219',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'breadcrumbs_font', array(
	'type'        => 'typography',
	'settings'    => 'breadcrumbs_font',
	'label'       => esc_attr__( 'Breadcrumbs Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '300',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#282219',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'blog_title_font', array(
	'type'        => 'typography',
	'settings'    => 'blog_title_font',
	'label'       => esc_attr__( 'Blog / Archives / Search Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '600',
		'font-size'      => '40px',
		'line-height'    => '43px',
		'letter-spacing' => '4.3px',
		'color'          => '#282219',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'blog_meta_font', array(
	'type'        => 'typography',
	'settings'    => 'blog_meta_font',
	'label'       => esc_attr__( 'Blog / Archives / Search Meta Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '12px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'blog_content_font', array(
	'type'        => 'typography',
	'settings'    => 'blog_content_font',
	'label'       => esc_attr__( 'Blog / Archives / Search Content Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0.6px',
		'color'          => '#282219',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'blog_btn_link_font', array(
	'type'        => 'typography',
	'settings'    => 'blog_btn_link_font',
	'label'       => esc_attr__( 'Blog / Archives / Search Button Link Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '400',
		'font-size'      => '12px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#af476f',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_title_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_title_font',
	'label'       => esc_attr__( 'Single Blog Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '21px',
		'line-height'    => '1',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_tag_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_tag_font',
	'label'       => esc_attr__( 'Single Blog Tag Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '500',
		'font-size'      => '11px',
		'line-height'    => '2.1',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_author_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_author_font',
	'label'       => esc_attr__( 'Single Blog Author Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '600',
		'font-size'      => '12px',
		'line-height'    => '1',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_author_description_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_author_description_font',
	'label'       => esc_attr__( 'Single Blog Author Description Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '500',
		'font-size'      => '14px',
		'line-height'    => '2.1',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_comment_author_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_comment_author_font',
	'label'       => esc_attr__( 'Single Blog Comment Author Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '12px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#af476f',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_comment_meta_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_comment_meta_font',
	'label'       => esc_attr__( 'Single Blog Comment Meta Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '10px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#b2b2b2',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_comment_reply_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_comment_reply_font',
	'label'       => esc_attr__( 'Single Blog Comment Reply Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '600',
		'font-size'      => '11px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#d2d2d2',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'single_blog_comment_font', array(
	'type'        => 'typography',
	'settings'    => 'single_blog_comment_font',
	'label'       => esc_attr__( 'Single Blog Comment Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '600',
		'font-size'      => '12px',
		'line-height'    => '2.1',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'sidebar_widget_title_font', array(
	'type'        => 'typography',
	'settings'    => 'sidebar_widget_title_font',
	'label'       => esc_attr__( 'Sidebar Widget Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '600',
		'font-size'      => '17px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'sidebar_widget_content_font', array(
	'type'        => 'typography',
	'settings'    => 'sidebar_widget_content_font',
	'label'       => esc_attr__( 'Sidebar Widget Content Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'sidebar_widget_link_font', array(
	'type'        => 'typography',
	'settings'    => 'sidebar_widget_link_font',
	'label'       => esc_attr__( 'Sidebar Widget Link Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#a5a5a5',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'footer_widget_title_font', array(
	'type'        => 'typography',
	'settings'    => 'footer_widget_title_font',
	'label'       => esc_attr__( 'Footer Widget Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '600',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'footer_widget_content_font', array(
	'type'        => 'typography',
	'settings'    => 'footer_widget_content_font',
	'label'       => esc_attr__( 'Footer Widget Content Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#000',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'footer_widget_link_font', array(
	'type'        => 'typography',
	'settings'    => 'footer_widget_link_font',
	'label'       => esc_attr__( 'Footer Widget Link Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '0px',
		'color'          => '#a5a5a5',
		'text-transform' => 'none'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'product_result_count_font', array(
	'type'        => 'typography',
	'settings'    => 'product_result_count_font',
	'label'       => esc_attr__( 'Product Result Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '400',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#808080',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'product_sort_font', array(
	'type'        => 'typography',
	'settings'    => 'product_sort_font',
	'label'       => esc_attr__( 'Product Sort Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '400',
		'font-size'      => '13px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#333',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'product_title_font', array(
	'type'        => 'typography',
	'settings'    => 'product_title_font',
	'label'       => esc_attr__( 'Product Title Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Raleway',
		'variant'        => '700',
		'font-size'      => '18px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'product_price_font', array(
	'type'        => 'typography',
	'settings'    => 'product_price_font',
	'label'       => esc_attr__( 'Product Price Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '700',
		'font-size'      => '17px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#000',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

Kirki::add_field( 'product_btn_font', array(
	'type'        => 'typography',
	'settings'    => 'product_btn_font',
	'label'       => esc_attr__( 'Product Button Font', 'configurator' ),
	'section'     => 'advance_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => '700',
		'font-size'      => '14px',
		'line-height'    => '1.8',
		'letter-spacing' => '1px',
		'color'          => '#fff',
		'text-transform' => 'uppercase'
	),
	'active_callback'    => array(
		array(
			'setting'  => 'advance_typography',
			'operator' => '==',
			'value'    => 'yes'
		)
	)
) );

// Styling Option
Kirki::add_panel( 'styling_option', array(	
    'priority'    => 14,
    'title'       => esc_html__( 'Styling Option', 'configurator' ),
    'description' => esc_html__( 'All styling settings can be changed here.', 'configurator' ),
) );

// Styling Option: General
Kirki::add_section( 'general_styling', array(
    'title'          => esc_html__( 'General', 'configurator' ),
    'description'    => esc_html__( 'Adjust genral styling options', 'configurator' ),
    'panel'			 => 'styling_option'
) );

Kirki::add_field( 'custom_general_styles', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'custom_general_styles',
	'label'       => esc_html__( 'Custom General Style', 'configurator' ),
	'section'     => 'general_styling',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	)
) );

Kirki::add_field( 'primary_color', array(
	'type'     => 'color',
	'settings' => 'primary_color',
	'label'    => esc_html__( 'Primary Color', 'configurator' ),
	'section'  => 'general_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_general_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => 'a, blockquote:before, blockquote:after, .main-nav li a:hover, .cart_list.product_list_widget .quantity .price-mini, .product-content .price, .product-content .woocommerce-Price-amount, .single-product-price .total-text, .summary .single-product-price .price ins, .woocommerce-tabs .tabs li.active a, .woocommerce .cart-form .product-price .woocommerce-Price-amount, .woocommerce-checkout-review-order-table tfoot .order-total td, .icon-hover-inner span.config-hover-price, .sidebar #wp-calendar #today, .quote .content:after, .quote .content:before, #style-normal .entry-content .title a:hover, #style-normal .link-btn a, .widget li a:hover, #footer .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover, .widget .product_list_widget ins, .pix-breadcrumbs li a:hover, .product_list_widget .amount, #wp-calendar td a, #style-list .entry-content .title a:hover, #style-normal_split .entry-content .title a:hover, #style-normal_split .entry-content .title a:hover, .go-back a:hover, .comment_author_details time a:hover, .comment_author_details .comment-reply-link:hover, .comment_author_details .comment-edit-link:hover, .logged-in-as a:hover, .cart_list.product_list_widget li a:hover, .cart_list.product_list_widget li a.remove:hover, .cart_list.product_list_widget li a.remove:hover span, .page-numbers li a:hover, .product-content .title a:hover, .woocommerce .cart-form .product-name a:hover, .woocommerce .cart-form .product-name a:hover.remove i, .page-numbers li .current, .btn.btn-outline.btn-primary, .button.btn.btn-outline.btn-primary, .pix-cart .buttons .button:hover, .widget_shopping_cart_content .buttons .button:hover, #style-list .link-btn a, #style-normal .link-btn a, #style-normal_split .link-btn a, span.wpcf7-not-valid-tip, .main-nav .menu li.current-menu-item > a, .overlay .main-nav > .menu > li.current-menu-item > a, .stuck .overlay .main-nav > .menu > li.current-menu-item > a',
			'property' => 'color',
		),
		array(
			'element'  => '.mobile-menu-nav .current-menu-item > a, .mobile-menu-nav .menu-item-has-children > .pix-dropdown-arrow:hover:after, .mobile-menu-nav.mobile-menu-dark .menu-item-has-children > .pix-dropdown-arrow:hover:after',
			'property' => 'color',
			'value_pattern' => '$ !important',
		),
		array(
			'element'  => '.widget .price_slider_wrapper .price_slider_amount .button, .btn.btn-outline.btn-primary, .button.btn.btn-primary.btn-outline, .wpcf7-form-control-wrap input.wpcf7-not-valid',
			'property' => 'border-color',
		),
		array(
			'element'  => 'abbr[title],abbr, acronym, .main-nav > ul > li.current-menu-item > a:after',
			'property' => 'border-bottom-color',
		),
		array(
			'element'  => '.btn-outline .shop-loading:before',
			'property' => 'border-top-color',
		),
		array(
			'element'  => 'mark, ins, .onsale, .woocommerce-MyAccount-navigation li.is-active, .woocommerce-message, .widget .price_slider, .widget .price_slider .ui-slider-handle, .widget .price_slider_wrapper .price_slider_amount .button,.widget .tagcloud a, .added_to_cart, .added_to_cart:hover, .comment-form .form-submit input#submit, .btn.btn-solid.btn-primary, .button.btn.btn-solid.btn-primary, .slider-cover .owl-dots .owl-dot.active, button, .post-password-form input[type="submit"]',
			'property' => 'background',
		),
	),
) );

Kirki::add_field( 'body_bg', array(
	'type'     => 'color',
	'settings' => 'body_bg',
	'label'    => esc_html__( 'Body Background', 'configurator' ),
	'section'  => 'general_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_general_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => 'body',
			'property' => 'background',
		),
	),
) );

Kirki::add_field( 'selection_text_color', array(
	'type'     => 'color',
	'settings' => 'selection_text_color',
	'label'    => esc_html__( 'Selection Text Color', 'configurator' ),
	'section'  => 'general_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_general_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '::selection',
			'property' => 'color',
		),
		array(
			'element'  => '::-moz-selection',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'selection_bg_color', array(
	'type'     => 'color',
	'settings' => 'selection_bg_color',
	'label'    => esc_html__( 'Selection Background Color', 'configurator' ),
	'section'  => 'general_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_general_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '::selection',
			'property' => 'background',
		),
		array(
			'element'  => '::-moz-selection',
			'property' => 'background',
		),
	),
) );

Kirki::add_field( 'input_color', array(
	'type'     => 'color',
	'settings' => 'input_color',
	'label'    => esc_html__( 'Input Color', 'configurator' ),
	'section'  => 'general_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_general_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"],input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'placeholder_color', array(
	'type'     => 'color',
	'settings' => 'placeholder_color',
	'label'    => esc_html__( 'Placeholder Color', 'configurator' ),
	'section'  => 'general_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_general_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '#main-wrapper ::-webkit-input-placeholder',
			'property' => 'color',
		),
		array(
			'element'  => '#main-wrapper ::-moz-placeholder',
			'property' => 'color',
		),
		array(
			'element'  => '#main-wrapper::-ms-input-placeholder',
			'property' => 'color',
		),
	),
) );

// Styling Option: Header
Kirki::add_section( 'header_styling', array(
    'title'          => esc_html__( 'Header', 'configurator' ),
    'description'    => esc_html__( 'Adjust header styling options', 'configurator' ),
    'panel'			 => 'styling_option'
) );

Kirki::add_field( 'custom_header_styles', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'custom_header_styles',
	'label'       => esc_html__( 'Custom Header Style', 'configurator' ),
	'section'     => 'header_styling',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	)
) );

Kirki::add_field( 'main_header_height', array(
	'type'        => 'text',
	'settings'    => 'main_header_height',
	'label'       => esc_html__( 'Main Header Height', 'configurator' ),
	'description' => esc_html__( 'Type the height in px. Eg: 100px. Leave it to empty to apply default', 'configurator' ),
	'section'     => 'header_styling',
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.header-wrap .header',
			'property' => 'height',
		),
		array(
			'element'  => '#logo, .main-nav',
			'property' => 'line-height',
		),
		array(
			'element'  => '.header .pix-cart',
			'property' => 'margin-top',
			'value_pattern' => 'calc( 48px + ( $ - 135px ) / 2  )',
		),
		array(
			'element'  => '.woo-cart-dropdown',
			'property' => 'top',
			'value_pattern' => '70px',
		),
		array(
			'element'  => '.header .search-btn',
			'property' => 'margin-top',
			'value_pattern' => 'calc( ( $ / 2 ) - 20px )',
		),
		array(
			'element'  => '.header .wishlist',
			'property' => 'margin-top',
			'value_pattern' => 'calc( ( $ / 2 ) - 13px )',
		),
		array(
			'element'  => '.pix-menu',
			'property' => 'height',
			'media_query' => '@media (max-width: 1024px)',
		),
	)
) );

Kirki::add_field( 'main_header_background_color', array(
	'type'     => 'color',
	'settings' => 'main_header_background_color',
	'label'    => esc_html__( 'Header Background Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.header-wrap',
			'property' => 'background',
		),
	),
) );

Kirki::add_field( 'main_header_iconcolor', array(
	'type'     => 'color',
	'settings' => 'main_header_iconcolor',
	'label'    => esc_html__( 'Header Icon Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.header .search-btn .search-icon, .header .pix-cart-icon, .header .ct-heart, .header a.pix-cart-contents',
			'property' => 'color',
		),
	),
) );



Kirki::add_field( 'header_icon_hovercolor', array(
	'type'     => 'color',
	'settings' => 'header_icon_hovercolor',
	'label'    => esc_html__( 'Header Icon Hover Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.header .search-btn .search-icon:hover, .header .pix-cart-contents:hover, .header .pix-cart-contents:hover .pix-cart-icon, .header .wishlist a:hover, .header .wishlist a:hover .ct-heart',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'menu_link_color', array(
	'type'     => 'color',
	'settings' => 'menu_link_color',
	'label'    => esc_html__( 'Menu Link Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav > ul > li > a, .main-nav li a',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'menu_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'menu_link_hover_color',
	'label'    => esc_html__( 'Menu Link Hover Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav > ul > li > a:hover, .main-nav li a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'sub_menu_background_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_background_color',
	'label'    => esc_html__( 'Sub Menu Background Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav .sub-menu',
			'property' => 'background',
		),
	),
) );

Kirki::add_field( 'sub_menu_border_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_border_color',
	'label'    => esc_html__( 'Sub Menu Border Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav .sub-menu',
			'property' => 'border-color',
		),
	),
) );

Kirki::add_field( 'sub_menu_link_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_link_color',
	'label'    => esc_html__( 'Sub Menu Link Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav .sub-menu li a',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'sub_menu_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_link_hover_color',
	'label'    => esc_html__( 'Sub Menu Link Hover Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav .sub-menu li a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'mega_menu_title_color', array(
	'type'     => 'color',
	'settings' => 'mega_menu_title_color',
	'label'    => esc_html__( 'Mega Menu Title Color', 'configurator' ),
	'section'  => 'header_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover',
			'property' => 'color',
		),
	),
) );

// Styling Option: Footer
Kirki::add_section( 'footer_styling', array(
    'title'          => esc_html__( 'Footer', 'configurator' ),
    'description'    => esc_html__( 'Adjust footer styling options', 'configurator' ),
    'panel'			 => 'styling_option'
) );

Kirki::add_field( 'custom_footer_styles', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'custom_footer_styles',
	'label'       => esc_html__( 'Custom Footer Style', 'configurator' ),
	'section'     => 'footer_styling',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	)
) );

Kirki::add_field( 'footer_widget_title_color', array(
	'type'     => 'color',
	'settings' => 'footer_widget_title_color',
	'label'    => esc_html__( 'Footer Widget Title Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '#footer .widget .widgettitle, .footer-dark .widget .widgettitle, #footer.footer-dark .textwidget',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'footer_widget_text_color', array(
	'type'     => 'color',
	'settings' => 'footer_widget_text_color',
	'label'    => esc_html__( 'Footer Widget Text Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '#footer .widget li, #footer p, #footer.footer-dark .widget #woocommerce-product-search-field, #footer.footer-dark .widget .product_list_widget ins, #footer.footer-dark .product_list_widget .amount',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'footer_widget_link_color', array(
	'type'     => 'color',
	'settings' => 'footer_widget_link_color',
	'label'    => esc_html__( 'Footer Widget Link Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '#footer .widget li a, #footer .widget .widget_shopping_cart_content .buttons .button, .footer-dark .recentpost .content p a, .footer-dark .popularpost .content p a, #footer.footer-dark .widget #recentcomments .comment-author-link, #footer.footer-dark .widget.widget_rss a, #footer.footer-dark .widget .tagcloud a, #footer .widget li a, #footer.footer-dark .widget .cart_list.product_list_widget .quantity, #footer.footer-dark .pix-cart .total, #footer.footer-dark .pix-cart .buttons, #footer.footer-dark .widget_shopping_cart_content .total, #footer.footer-dark .widget_shopping_cart_content .buttons, #footer.footer-dark .widget .widget_shopping_cart_content .buttons .button',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'footer_widget_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'footer_widget_link_hover_color',
	'label'    => esc_html__( 'Footer Widget Link Hover Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '#footer .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover, #footer.footer-dark .widget li:hover, #footer.footer-dark .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'footer_background_color', array(
	'type'     => 'color',
	'settings' => 'footer_background_color',
	'label'    => esc_html__( 'Footer Background Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.footer-dark .pageFooterCon, .footer-bottom, .footer-dark .footer-bottom',
			'property' => 'background-color',
		)
	)
) );

Kirki::add_field( 'footer_pattern', array(
	'type'     => 'radio-image',
	'settings' => 'footer_pattern',
	'label'    => esc_html__( 'Choose Footer Pattern', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => $pattern,
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),	
	'transport' => 'postMessage'
) );

Kirki::add_field( 'footer_bg', array(
	'type'     => 'upload',
	'settings' => 'footer_bg',
	'label'    => esc_html__( 'Upload Footer Background', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),	
	'transport' => 'postMessage'
) );

Kirki::add_field( 'footer_background_attachment', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_background_attachment',
	'label'    => esc_html__( 'Background Attachment', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => 'scroll',
	'choices'  => array(
		'scroll' => esc_attr__( 'Scroll', 'configurator' ),
		'fixed'  => esc_attr__( 'Fixed', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.footer-dark .pageFooterCon, .footer-bottom, .footer-dark .footer-bottom',
			'property' => 'background-attachment',
		)
	)
) );

Kirki::add_field( 'footer_background_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_background_size',
	'label'    => esc_html__( 'Background Size', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => 'cover',
	'choices'  => array(
		'auto'    => esc_attr__( 'Auto', 'configurator' ),
		'cover'   => esc_attr__( 'Cover', 'configurator' ),
		'contain' => esc_attr__( 'Contain', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.footer-dark .pageFooterCon, .footer-bottom, .footer-dark .footer-bottom',
			'property' => 'background-size',
		)
	)
) );

Kirki::add_field( 'footer_background_repeat', array(
	'type'     => 'radio-buttonset',
	'settings' => 'footer_background_repeat',
	'label'    => esc_html__( 'Background Repeat', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => 'repeat',
	'choices'  => array(
		'repeat'    => esc_attr__( 'Repeat', 'configurator' ),
		'repeat-x'  => esc_attr__( 'Repeat-x', 'configurator' ),
		'repeat-y'  => esc_attr__( 'Repeat-y', 'configurator' ),
		'no-repeat' => esc_attr__( 'No Repeat', 'configurator' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.footer-dark .pageFooterCon, .footer-bottom, .footer-dark .footer-bottom',
			'property' => 'background-repeat',
		)
	)
) );

Kirki::add_field( 'copyright_background_color', array(
	'type'     => 'color',
	'settings' => 'copyright_background_color',
	'label'    => esc_html__( 'Copyright Background Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.footer-bottom, .footer-dark .footer-bottom',
			'property' => 'background',
		)
	)
) );

Kirki::add_field( 'copyright_text_color', array(
	'type'     => 'color',
	'settings' => 'copyright_text_color',
	'label'    => esc_html__( 'Copyright Text Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.footer-dark .copyright, #footer p, .footer-dark .footer-bottom',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'copyright_link_color', array(
	'type'     => 'color',
	'settings' => 'copyright_link_color',
	'label'    => esc_html__( 'Copyright Link Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.copyright a',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'copyright_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'copyright_link_hover_color',
	'label'    => esc_html__( 'Copyright Link Hover Color', 'configurator' ),
	'section'  => 'footer_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_footer_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.copyright a:hover',
			'property' => 'color',
		)
	)
) );

// Styling Option: Sidebar
Kirki::add_section( 'sidebar_styling', array(
    'title'          => esc_html__( 'Sidebar', 'configurator' ),
    'description'    => esc_html__( 'Adjust sidebar styling options', 'configurator' ),
    'panel'			 => 'styling_option'
) );

Kirki::add_field( 'custom_sidebar_styles', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'custom_sidebar_styles',
	'label'       => esc_html__( 'Custom Sidebar Style', 'configurator' ),
	'section'     => 'sidebar_styling',
	'default'     => 'no',
	'choices'     => array(
		'yes' => esc_attr__( 'Yes', 'configurator' ),
		'no'  => esc_attr__( 'No', 'configurator' )
	)
) );

Kirki::add_field( 'sidebar_widget_title_color', array(
	'type'     => 'color',
	'settings' => 'sidebar_widget_title_color',
	'label'    => esc_html__( 'Sidebar Widget Title Color', 'configurator' ),
	'section'  => 'sidebar_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_sidebar_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.widget .widgettitle',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'sidebar_widget_text_color', array(
	'type'     => 'color',
	'settings' => 'sidebar_widget_text_color',
	'label'    => esc_html__( 'Sidebar Widget Text Color', 'configurator' ),
	'section'  => 'sidebar_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_sidebar_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.widget li, .widget #recentcomments .comment-author-link',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'sidebar_widget_link_color', array(
	'type'     => 'color',
	'settings' => 'sidebar_widget_link_color',
	'label'    => esc_html__( 'Sidebar Widget Link Color', 'configurator' ),
	'section'  => 'sidebar_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_sidebar_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.widget #recentcomments a, .widget.widget_rss a, .widget.widget_rss .comment-author-link, .widget li a, .widget #recentcomments .comment-author-link a, .widget .tagcloud a',
			'property' => 'color',
		)
	)
) );

Kirki::add_field( 'sidebar_widget_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'sidebar_widget_link_hover_color',
	'label'    => esc_html__( 'Sidebar Widget Link Hover Color', 'configurator' ),
	'section'  => 'sidebar_styling',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_sidebar_styles',
			'operator' => '==',
			'value'    => 'yes'
		)
	),
	'transport'   => 'auto',
	'output' => array(
		array(
			'element'  => '.quote .content:after, .quote .content:before, #style-normal .entry-content .title a:hover, #style-normal_split .entry-content .title a:hover, #style-normal .link-btn a, .widget li a:hover, #footer .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover,.widget #recentcomments a:hover,.widget.widget_rss a:hover, .widget #recentcomments .comment-author-link a:hover',
			'property' => 'color',
		)
	)
) );

// Add option to the default wordpress panels
Kirki::add_field( 'logo', array(
	'type'     => 'upload',
	'settings' => 'logo',
	'label'    => esc_html__( 'Logo', 'configurator' ),
	'section'  => 'title_tagline',
	'default'  => $url . 'logo.png',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo' => array(
			'selector'        => '#logo a',
			'render_callback' => 'configurator_get_logo'
		)
	)
) );

Kirki::add_field( 'retina_logo', array(
	'type'     => 'upload',
	'settings' => 'retina_logo',
	'label'    => esc_html__( 'Retina Logo', 'configurator' ),
	'section'  => 'title_tagline',
	'default'  => $url . 'retina-logo.png',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo' => array(
			'selector'        => '#logo a',
			'render_callback' => 'configurator_get_logo'
		)
	)
) );

Kirki::add_field( 'light_logo', array(
	'type'     => 'upload',
	'settings' => 'light_logo',
	'label'    => esc_html__( 'Light Logo', 'configurator' ),
	'section'  => 'title_tagline',
	'default'  => $url . 'light-logo.png',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo' => array(
			'selector'        => '#logo a',
			'render_callback' => 'configurator_get_logo'
		)
	)
) );

Kirki::add_field( 'light_retina_logo', array(
	'type'     => 'upload',
	'settings' => 'light_retina_logo',
	'label'    => esc_html__( 'Light Retina Logo', 'configurator' ),
	'section'  => 'title_tagline',
	'default'  => $url . 'light-retina-logo.png',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo' => array(
			'selector'        => '#logo a',
			'render_callback' => 'configurator_get_logo'
		)
	)
) );