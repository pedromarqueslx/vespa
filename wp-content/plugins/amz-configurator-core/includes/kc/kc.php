<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Init KC */
add_action('init', 'configurator_core_kc_int', 99 );

function configurator_core_kc_int() {

	global $kc;

	// set template path for override
	$kc->set_template_path( CONFIGURATOR_CORE_INC_DIR .'kc/templates/' );

	// By default, KingConfigurator is available to Page type only. Let KingConfigurator support various content types
	$kc->add_content_type( 'product' );

	// Create and Map shortocde
	require_once( CONFIGURATOR_CORE_CLASS_DIR . 'class-amz-shortcodes.php' );
	foreach ( glob( CONFIGURATOR_CORE_INC_DIR . 'kc/shortcodes/*/index.php') as $filename ) {
		require_once( $filename );
	}

	// Function that helps to add or update default kc map params
	configurator_kc_add_update_kc_map( $kc );

}

function configurator_kc_add_update_kc_map( $kc ) {

	// Button
	$kc->add_map_param( 
		'kc_button', 
		array(
			'name' => 'btn_style',
	   		'label' => esc_html__( 'Button Style', 'amz-configurator-core' ),
	   		'type' => 'select',
	   		'options' => array(
				'btn-solid'   => esc_html__( 'Solid', 'amz-configurator-core' ),
				'btn-outline' => esc_html__( 'Outline', 'amz-configurator-core' )
			),
	   		'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' )
		),
		3,
		'general'
	);

	$kc->add_map_param( 
		'kc_button', 
		array(
			'name' => 'btn_text_style',
	   		'label' => esc_html__( 'Button Text Style', 'amz-configurator-core' ),
	   		'type' => 'select',
	   		'options' => array(
				'btn-uppercase'  => esc_html__( 'Uppercase', 'amz-configurator-core' ),
				'btn-lowercase'  => esc_html__( 'Lowercase', 'amz-configurator-core' ),
				'btn-capitalize' => esc_html__( 'Capitalize', 'amz-configurator-core' )
			),
	   		'description' => esc_html__( 'Choose the button text style', 'amz-configurator-core' )
		),
		4,
		'general'
	);

	$kc->add_map_param( 
		'kc_button', 
		array(
			'name' => 'btn_size',
	   		'label' => esc_html__( 'Button Size', 'amz-configurator-core' ),
	   		'type' => 'select',
	   		'options' => array(
				'btn-sm' => esc_html__( 'Small', 'amz-configurator-core' ),
				'btn-md' => esc_html__( 'Medium', 'amz-configurator-core' ),
				'btn-lg' => esc_html__( 'Large', 'amz-configurator-core' )
			),
	   		'description' => esc_html__( 'Choose the button size', 'amz-configurator-core' )
		),
		5,
		'general'
	);

	$kc->add_map_param( 
		'kc_button', 
		array(
			'name' => 'btn_type',
	   		'label' => esc_html__( 'Button Type', 'amz-configurator-core' ),
	   		'type' => 'select',
	   		'options' => array(
				'btn-oval'      => esc_html__( 'Oval', 'amz-configurator-core' ),
				'btn-rectangle' => esc_html__( 'Rectangle', 'amz-configurator-core' )
			),
	   		'description' => esc_html__( 'Choose the button type', 'amz-configurator-core' )
		),
		6,
		'general'
	);

	$kc->add_map_param( 
		'kc_button', 
		array(
			'name' => 'btn_color',
	   		'label' => esc_html__( 'Button Color', 'amz-configurator-core' ),
	   		'type' => 'select',
	   		'options' => array(
				'btn-gradient' => esc_html__( 'Gradient', 'amz-configurator-core' ),
				'btn-black'    => esc_html__( 'Black', 'amz-configurator-core' ),
				'btn-white'    => esc_html__( 'White', 'amz-configurator-core' ),
				'btn-primary'  => esc_html__( 'Primary Color', 'amz-configurator-core' ),
				'btn-custom'   => esc_html__( 'Custom', 'amz-configurator-core' )
			),
	   		'description' => esc_html__( 'Choose the button color', 'amz-configurator-core' )
		),
		7,
		'general'
	);

	// Single Image
	$kc->add_map_param( 
		'kc_single_image', 
		array(
			'name' => 'background_text',
	   		'label' => esc_html__( 'Background Text', 'amz-configurator-core' ),
	   		'type' => 'text',
	   		'description' => esc_html__( 'Type the Background Text', 'amz-configurator-core' )
		),
		3,
		'general'
	);

	/*
	 * Update KC default parameter
	*/

	// Single Image
	$kc->update_map( 
		'kc_single_image', 
		'params',
		array(
			'styling' => array(
				array(
					'name'    => 'css_custom',
					'type'    => 'css',
					'options'		=> array(
						array(
							"screens" => "any,1024,999,767,479",
							'Image Style' => array(
								array('property' => 'text-align', 'label' => 'Image Alignment'),
								array('property' => 'display', 'label' => 'Image Display'),
								array('property' => 'background-color', 'label' => 'Background Color', 'selector' => 'img'),
								array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'img'),
								array('property' => 'border', 'label' => 'Border', 'selector' => 'img'),
								array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'img'),
								array('property' => 'width', 'label' => 'Width', 'selector' => 'img'),
								array('property' => 'height', 'label' => 'Height', 'selector' => 'img'),
								array('property' => 'max-width', 'label' => 'Max Width', 'selector' => 'img'),
								array('property' => 'vertical-align', 'label' => 'Vertical Align', 'selector' => 'img'),
								array('property' => 'margin', 'label' => 'Margin', 'selector' => 'img'),
								array('property' => 'padding', 'label' => 'Padding', 'selector' => 'img')
							),
							'Caption' => array(
								array('property' => 'color', 'label' => 'Color', 'selector' => '.scapt'),
								array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.scapt'),
								array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.scapt'),
								array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.scapt'),
								array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.scapt'),
								array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.scapt'),
								array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.scapt'),
								array('property' => 'text-align', 'label' => 'Text Alignment', 'selector' => '.scapt'),
								array('property' => 'border', 'label' => 'Border', 'selector' => '.scapt'),
								array('property' => 'margin', 'label' => 'Margin', 'selector' => '.scapt'),
								array('property' => 'padding', 'label' => 'Padding', 'selector' => '.scapt')
							),
							'Overlay Effect' => array(
								array('property' => 'background-color', 'label' => 'Overlay Background Color', 'selector' => '.kc-image-overlay'),
								array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => '.kc-image-overlay i'),
								array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc-image-overlay i'),
								array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => '.kc-image-overlay i'),
								array('property' => 'line-height', 'label' => 'Icon Line Height', 'selector' => '.kc-image-overlay i'),
								array('property' => 'width', 'label' => 'Icon Width', 'selector' => '.kc-image-overlay i'),
								array('property' => 'height', 'label' => 'Icon Height', 'selector' => '.kc-image-overlay i'),
								array('property' => 'border', 'label' => 'Icon Border', 'selector' => '.kc-image-overlay i'),
								array('property' => 'border-radius', 'label' => 'Icon Border Radius', 'selector' => '.kc-image-overlay i')
							),
							'Background Text' => array(
								array('property' => 'color', 'label' => 'Text Color', 'selector' => '.image-background-text'),
								array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.image-background-text'),
								array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.image-background-text'),
								array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.image-background-text'),
								array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.image-background-text'),
								array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.image-background-text'),
								array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.image-background-text'),
								array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.image-background-text'),
								array('property' => 'top', 'label' => 'Top Position', 'selector' => '.image-background-text'),
								array('property' => 'right', 'label' => 'Right Position', 'selector' => '.image-background-text'),
								array('property' => 'bottom', 'label' => 'Bottom Position', 'selector' => '.image-background-text'),
								array('property' => 'left', 'label' => 'Left Position', 'selector' => '.image-background-text'),
							),
						)
					)
				)
			)
		)
	);
}

/* Load Scripts */
add_action( 'wp_enqueue_scripts', 'configurator_enqueue_scripts' );

function configurator_enqueue_scripts() {

	$url = plugin_dir_url( __FILE__ );

	wp_enqueue_style( 'configurator-sc-styles', $url . 'assets/css/sc-styles.css', array('owl-carousel'), '1.0', 'all' );

	wp_enqueue_script( 'configurator-sc-scripts', $url . 'assets/js/sc-scripts.js', array('jquery', 'owl-carousel'), CONFIGURATOR_CORE_VERSION, true );
}
