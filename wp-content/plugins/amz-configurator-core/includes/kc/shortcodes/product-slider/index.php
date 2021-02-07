<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_product_slider extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product-slider';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product Slider', 'amz-configurator-core' ),
				'description' => esc_html__('Display a product slider', 'amz-configurator-core'),
				'icon' => 'sl-paper-plane',
				'category' => esc_html__( 'Configurator', 'amz-configurator-core' ),
				'live_editor' => $sc_path . 'live.php',
				'params' => array(

					// General
					'General' => array(

						array(
							'label'       => esc_html__( 'Depends On', 'amz-configurator-core'),
							'description' => esc_html__( 'How you want to insert items?', 'amz-configurator-core' ),
							'admin_label' => true,
							'name'        => 'depends_on',
							'type'        => 'select',
							'value'       => 'recent_product',
							'options' => array(
								'recent_product'  => esc_html__( 'Recent Product', 'amz-configurator-core' ),
								'id'              => esc_html__( 'ID', 'amz-configurator-core' ),
								'feature_product' => esc_html__( 'Feature Product', 'amz-configurator-core' ),
								'category'        => esc_html__( 'category', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Product ID', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the product IDs separated with commas', 'amz-configurator-core'),
							'name'        => 'product_id',
							'type'        => 'text',
							'value'       => '',
						),

						array(
							'label'       => esc_html__( 'Product Category', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the product category slugs separated with commas', 'amz-configurator-core'),
							'name'        => 'category',
							'type'        => 'text',
							'value'       => '',
						),

						array(
							'label'       => esc_html__( 'Number of items', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the number of items you want to display (only numbers), Enter -1 for all items', 'amz-configurator-core' ),
							'name'        => 'items',
							'type'        => 'text',
							'value'       => '3',
						),

						array(
							'label'       => esc_html__( 'Order', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the sorting order', 'amz-configurator-core' ),
							'name'        => 'order',
							'type'        => 'select',
							'value'       => '',
							'options' => $this->get_array( 'order' )
						),

						array(
							'label'       => esc_html__( 'Orderby', 'amz-configurator-core'),
							'description' => esc_html__( 'Which way you want to order?', 'amz-configurator-core' ),
							'name'        => 'orderby',
							'type'        => 'select',
							'value'       => '',
							'options' => $this->get_array( 'orderby' )
						),

						array(
							'label'       => esc_html__( 'Slider Background Text Font Size', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the font size in px', 'amz-configurator-core' ),
							'name'        => 'slider_bg_text_fs',
							'type'        => 'text',
							'value'       => '400px',
						),

						array(
							'label'       => esc_html__( 'Slider Title', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to show slider title', 'amz-configurator-core' ),
							'name'        => 'slider_title',
							'type'        => 'select',
							'value'       => 'show',
							'options' => array(
								'show' => esc_html__( 'Show', 'amz-configurator-core' ),
								'hide' => esc_html__( 'Hide', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Slider Description', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to show slider short description', 'amz-configurator-core' ),
							'name'        => 'slider_description',
							'type'        => 'select',
							'value'       => 'show',
							'options' => array(
								'show' => esc_html__( 'Show', 'amz-configurator-core' ),
								'hide' => esc_html__( 'Hide', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Slider Price', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to show slider price', 'amz-configurator-core' ),
							'name'        => 'slider_price',
							'type'        => 'select',
							'value'       => 'show',
							'options' => array(
								'show' => esc_html__( 'Show', 'amz-configurator-core' ),
								'hide' => esc_html__( 'Hide', 'amz-configurator-core' )
							)
						),

					),

					// Button
					'Button' => array(

						array(
							'label'       => esc_html__( 'Button Style', 'amz-configurator-core' ),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'btn_style',
							'type'        => 'select',
							'value'       => 'btn-solid',
							'options' => array(
								'btn-solid'   => esc_html__( 'Solid', 'amz-configurator-core' ),
								'btn-outline' => esc_html__( 'Outline', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Text Style', 'amz-configurator-core' ),
							'description' => esc_html__( 'Choose the button text style', 'amz-configurator-core' ),
							'name'        => 'btn_text_style',
							'type'        => 'select',
							'value'       => 'btn-uppercase',
							'options' => array(
								'btn-uppercase'  => esc_html__( 'Uppercase', 'amz-configurator-core' ),
								'btn-lowercase'  => esc_html__( 'Lowercase', 'amz-configurator-core' ),
								'btn-capitalize' => esc_html__( 'Capitalize', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Size', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the button Size', 'amz-configurator-core' ),
							'name'        => 'btn_size',
							'type'        => 'select',
							'value'       => 'btn-md',
							'options' => array(
								'btn-sm' => esc_html__( 'Small', 'amz-configurator-core' ),
								'btn-md' => esc_html__( 'Medium', 'amz-configurator-core' ),
								'btn-lg' => esc_html__( 'Large', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Type', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the button Type', 'amz-configurator-core' ),
							'name'        => 'btn_type',
							'type'        => 'select',
							'value'       => 'btn-oval',
							'options' => array(
								'btn-oval'      => esc_html__( 'Oval', 'amz-configurator-core' ),
								'btn-rectangle' => esc_html__( 'Rectangle', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Color', 'amz-configurator-core' ),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'btn_color',
							'type'        => 'select',
							'value'       => 'btn-gradient',
							'options' => array(
								'btn-gradient' => esc_html__( 'Gradient', 'amz-configurator-core' ),
								'btn-black'    => esc_html__( 'Black', 'amz-configurator-core' ),
								'btn-white'    => esc_html__( 'White', 'amz-configurator-core' ),
								'btn-primary'  => esc_html__( 'Primary Color', 'amz-configurator-core' ),
								'btn-custom'   => esc_html__( 'Custom', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Button Text', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the button text', 'amz-configurator-core' ),
							'name'        => 'btn_text',
							'type'        => 'text',
							'value'       => esc_html__( 'Select', 'configurator' )
						),

						array(
							'label'       => esc_html__( 'Button Target', 'amz-configurator-core' ),
							'description' => esc_html__( 'Choose the link target', 'amz-configurator-core' ),
							'name'        => 'btn_target',
							'type'        => 'select',
							'value'       => '_blank',
							'options' => array(
								'_blank' => esc_html__( 'Open Same Page', 'amz-configurator-core' ),
								'_self'  => esc_html__( 'Open Same Page', 'amz-configurator-core' )
							)
						),
						
					),

					// Slider
					'Slider' => array(
						array(
							'label'       => esc_html__( 'Enable autoplay', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to enable autoplay', 'amz-configurator-core' ),
							'name'        => 'autoplay',
							'type'        => 'select',
							'value'       => 'false',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Slide Speed', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the Value in milesecond (Ex: 5000)', 'amz-configurator-core' ),
							'name'        => 'slide_speed',
							'type'        => 'text',
							'value'       => '5000'
						),

						array(
							'label'       => esc_html__( 'Slide Margin', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the integer value (Ex: 30)', 'amz-configurator-core' ),
							'name'        => 'slide_margin',
							'type'        => 'text',
							'value'       => '30'
						),

						array(
							'label'       => esc_html__( 'Stage Padding', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the integer value (Ex: 30)', 'amz-configurator-core' ),
							'name'        => 'stage_padding',
							'type'        => 'text',
							'value'       => '50'
						),

						array(
							'label'       => esc_html__( 'Arrow', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to display arrows?', 'amz-configurator-core' ),
							'name'        => 'slide_arrow',
							'type'        => 'select',
							'value'       => 'false',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Pagination', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to display pagination dots?', 'amz-configurator-core' ),
							'name'        => 'slider_pagination',
							'type'        => 'select',
							'value'       => 'true',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Loop', 'amz-configurator-core'),
							'description' => esc_html__( 'Inifnity loop. Duplicate last and first items to get loop illusion.', 'amz-configurator-core' ),
							'name'        => 'loop',
							'type'        => 'select',
							'value'       => 'false',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Mouse Drag', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to change the slide using mouse drag', 'amz-configurator-core' ),
							'name'        => 'mouse_drag',
							'type'        => 'select',
							'value'       => 'true',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Touch Drag', 'amz-configurator-core'),
							'description' => esc_html__( 'Do you want to change the slide using touch drag(in touch devices)', 'amz-configurator-core' ),
							'name'        => 'touch_drag',
							'type'        => 'select',
							'value'       => 'true',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Stop on Hover', 'amz-configurator-core'),
							'description' => esc_html__( 'If the mouse pointer is placed on slider it will pause', 'amz-configurator-core' ),
							'name'        => 'stop_on_hover',
							'type'        => 'select',
							'value'       => 'true',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Auto Height', 'amz-configurator-core'),
							'description' => esc_html__( 'slider Auto height', 'amz-configurator-core' ),
							'name'        => 'auto_height',
							'type'        => 'select',
							'value'       => 'true',
							'options' => array(
								'true'       => esc_html__( 'Yes', 'amz-configurator-core' ),
								'false'   => esc_html__( 'No', 'amz-configurator-core' )
							)
						),

					),

					// Styling
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Title' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.slider-content .title'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.slider-content .title'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.slider-content .title'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.slider-content .title'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.slider-content .title'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.slider-content .title'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.slider-content .title'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.slider-content .title'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.slider-content .title'),
										array('property' => 'width', 'selector' => '.slider-content .title'),
										array('property' => 'height', 'selector' => '.slider-content .title'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.slider-content .title'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.slider-content .title'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.slider-content .title'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.slider-content .title')
									),
									'Description' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.slider-content .slider-description'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.slider-content .slider-description'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.slider-content .slider-description'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.slider-content .slider-description'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.slider-content .slider-description'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.slider-content .slider-description'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.slider-content .slider-description'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.slider-content .slider-description'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.slider-content .slider-description'),
										array('property' => 'width', 'selector' => '.slider-content .slider-description'),
										array('property' => 'height', 'selector' => '.slider-content .slider-description'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.slider-content .slider-description'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.slider-content .slider-description'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.slider-content .slider-description'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.slider-content .slider-description')
									),
									'Price' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.slider-content .price'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.slider-content .price'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.slider-content .price'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.slider-content .price'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.slider-content .price'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.slider-content .price'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.slider-content .price'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.slider-content .price'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.slider-content .price'),
										array('property' => 'width', 'selector' => '.slider-content .price'),
										array('property' => 'height', 'selector' => '.slider-content .price'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.slider-content .price'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.slider-content .price'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.slider-content .price'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.slider-content .price')
									),
									'Button' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.slider-content .btn'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.slider-content .btn'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.slider-content .btn'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.slider-content .btn'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.slider-content .btn'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.slider-content .btn'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.slider-content .btn'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.slider-content .btn'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.slider-content .btn'),
										array('property' => 'width', 'selector' => '.slider-content .btn'),
										array('property' => 'height', 'selector' => '.slider-content .btn'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.slider-content .btn'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.slider-content .btn'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.slider-content .btn'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.slider-content .btn')
									),
									'Background Text' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.slider-content .bg-text'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.slider-content .bg-text'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.slider-content .bg-text'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.slider-content .bg-text'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.slider-content .bg-text'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.slider-content .bg-text'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.slider-content .bg-text'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.slider-content .bg-text'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.slider-content .bg-text'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.slider-content .bg-text'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.slider-content .bg-text'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.slider-content .bg-text'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.slider-content .bg-text')
									)
								)
							)
						)
					)
					
				)
			)
		);
		$this->map( $args );

	}

	public function output( $atts = array(), $content, $shortcode ) {

		$content = str_replace( array('&#8221;', '&#8243;' ), array( '"', '"' ), $content );
		$content = apply_filters( 'kc_shortcode_content', $content, $shortcode );

		if( isset( $atts['content'] ) && isset( $content ) && !empty( $content ) )
			$atts['content'] = $content;

		$atts = apply_filters( 'kc_shortcode_attributes', $atts, $shortcode );

		extract( shortcode_atts( array(
			// General
			'depends_on'        => 'recent_product', // feature_product, id, category, recent_product
			'product_id'        => '',
			'category'          => '',
			'items'             => '3',
			'order'             => 'desc',
			'orderby'           => 'date',
			'slider_title' => 'show',
			'slider_description' => 'show',
			'slider_price' => 'show',
			// Button
			'btn_style'         => 'btn-solid',
			'btn_text_style'    => 'btn-uppercase',			
			'btn_size'          => 'btn-md',			
			'btn_type'          => 'btn-oval', // rectangle, oval			
			'btn_color'         => 'btn-gradient', // btn-black, btn-gradient, btn-primary, btn-custom
			'btn_text'          => esc_html__( 'Select', 'configurator' ),						
			'btn_target'        => '_blank', // _blank, _self
			// Slider
			'autoplay'          => 'false',
			'slide_speed'       => '5000',
			'slide_margin'      => '30',
			'stage_padding'     => '50',
			'slide_arrow'       => 'false',
			'slider_pagination' => 'true',
			'loop'              => 'false',
			'mouse_drag'        => 'true',
			'touch_drag'        => 'true',
			'stop_on_hover'     => 'true',
			'auto_height'       => 'true'
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$slider_content = '';
		$slider_data = array();

		// Build slider data
		$slider_data[] 	= 'data-items="1"';
		$slider_data[] 	= 'data-center="true"';
		$slider_data[] 	= 'data-autoplay="'. esc_attr( $autoplay ) .'"';
		$slider_data[] 	= 'data-autoplay-timeout="'. esc_attr( $slide_speed ) .'"';
		$slider_data[] 	= 'data-margin="'. esc_attr( $slide_margin ) .'"';
		$slider_data[] 	= 'data-stage-padding="'. esc_attr( $stage_padding ) .'"';
		$slider_data[] 	= 'data-nav="'. esc_attr( $slide_arrow ) .'"';
		$slider_data[] 	= 'data-dots="'. esc_attr( $slider_pagination ) .'"';
		$slider_data[] 	= 'data-loop="'. esc_attr( $loop ) .'"';
		$slider_data[] 	= 'data-mouse-drag="'. esc_attr( $mouse_drag ) .'"';
		$slider_data[] 	= 'data-touch-drag="'. esc_attr( $touch_drag ) .'"';
		$slider_data[] 	= 'data-auto-height="'. esc_attr( $auto_height ) .'"';
		$slider_data[] 	= 'data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'"';
		// Base query
		$args = array(
			'post_type' => 'product',
			'order'	=> $order,
			'orderby'	=> $orderby,
			'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $items
		);

		// Depends on ID
		if( 'id' == $depends_on && !empty( $product_id ) ) {

			// Build id array
			$id = explode( ',', $product_id );

			// Id query
			$id_args = array( 
				'post__in' => $id,
				'posts_per_page' => -1
			);

			// Merge Id query with base query
			$args = array_merge( $args, $id_args );
		}
		// Depends on Feature product
		else if( 'feature_product' == $depends_on ) {
			// Featured product query
			$featured_args = array(
			    'meta_key' => '_featured',  
			    'meta_value' => 'yes'  
			);

			// Merge Id query with base query
			$args = array_merge( $args, $featured_args );
		}
		// Depends on Category
		else if( 'category' == $depends_on && !empty( $category ) ) {

			// Build category array
			$category = explode( ',', $category );

			// Category query
			$category_args = array(
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'product_cat',
			            'field' => 'slug',
			            'terms' => $category
			        )
			    )
			);

			// Merge Id query with base query
			$args = array_merge( $args, $category_args );
		}

		$q = new WP_Query( $args );

		if ( $q->have_posts() ) : 

			while ( $q->have_posts() ) : $q->the_post();

				global $post;

				// Product ID
				$id = get_the_ID();

				// Product Object
				$product = wc_get_product( $id );

				$slider_content .= '<div class="slider-content">';

					$slider_image = configurator_get_meta_value( $id, '_amz_slider_img' );
					$slider_image_id = !empty( $slider_image ) ? json_decode( $slider_image ) : 0;

					if( !empty( $slider_image_id ) ) {
						$slider_content .= configurator_get_image_by_id( 'full', 'full', $slider_image_id[0]->itemId, 0, 1, 1 );
					}

					// Slider background text
					$slider_background_text = configurator_get_meta_value( $id, '_amz_slider_background_text' );

					if( !empty( $slider_background_text ) ) {
						$slider_content .= '<span class="bg-text">'. esc_html( $slider_background_text ) .'</span>';
					}					

					if( 'show' == $slider_title ) {
						$slider_content .= '<h3 class="title"><a href="'. esc_url( get_permalink() ) .'">'. esc_html( get_the_title() ) .'</a></h3>';
					}

					// Slider description
					$slider_short_content = configurator_get_meta_value( $id, '_amz_slider_description' );

					if( 'show' == $slider_description && !empty( $slider_short_content ) ) {
						$slider_content .= '<p class="slider-description">'. esc_html( $slider_description ) .'</p>';
					}
					
					if( 'show' == $slider_price ) {
						$slider_content .= '<p class="price">'. esc_html__( 'Base Price') .' - '. configurator_apply_currency_postion( $product->get_price(), get_woocommerce_currency_symbol() ) . '</p>';
					}

					// Button class
					$btn_class = array();
					$btn_class[] = 'btn';
					$btn_class[] = $btn_color;
					$btn_class[] = $btn_type;
					$btn_class[] = $btn_size;
					$btn_class[] = $btn_style;
					$btn_class[] = $btn_text_style;

					// Button attribute
					$btn_atttribute = array();
					$btn_atttribute[] = 'class="'. esc_attr( implode( ' ', $btn_class ) ) .'"';

					$btn_atttribute[] = 'target="'. esc_attr( $btn_target ) .'"';	

					$slider_content .= '<a href="'. esc_url( get_permalink() ) .'" '. implode( ' ', $btn_atttribute ) .'>'. esc_html( $btn_text ) .'</a>';

				$slider_content .= '</div>'; // .slider-content
			endwhile;
		endif;

		wp_reset_query();

		ob_start();
		?>
			
			<div class="product-slider-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="slider-cover">
					<div class="slider big-center owl-carousel-slider owl-carousel" <?php echo implode( ' ', $slider_data ); ?>>
						<?php echo $slider_content; // It prints all slides ?>
					</div> <!-- #slider  -->
				</div> <!-- .sliderc-cover  -->
			</div> <!-- .product-slider-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_product_slider();
