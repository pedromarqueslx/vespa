<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class amz_product extends amz_shortcodes {

	public function __construct() {

		$sc_name = 'amz-product';

		$this->add_shortcode( $sc_name, array( $this, 'output' ) );

		$sc_path = plugin_dir_path( __FILE__ );
		$sc_url = plugin_dir_url( __FILE__ );

		$args = array(
			$sc_name => array(
				'name' => esc_html__( 'Product', 'amz-configurator-core' ),
				'description' => esc_html__('Display a products', 'amz-configurator-core'),
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
							'value'       => ''
						),

						array(
							'label'       => esc_html__( 'Product Category', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the product category slugs separated with commas', 'amz-configurator-core'),
							'name'        => 'category',
							'type'        => 'text',
							'value'       => ''
						),

						array(
							'label'       => esc_html__( 'Number of items', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the number of items you want to display (only numbers), Enter -1 for all items', 'amz-configurator-core' ),
							'name'        => 'items',
							'type'        => 'text',
							'value'       => '3'
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
							'label'       => esc_html__( 'Style', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the style', 'amz-configurator-core' ),
							'admin_label' => true,
							'name'        => 'style',
							'type'        => 'select',
							'value'       => 'style2',
							'options' => array(
								'style1' => esc_html__( 'Style 1', 'amz-configurator-core' ),
								'style2' => esc_html__( 'Style 2', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Column', 'amz-configurator-core'),
							'description' => esc_html__( 'Choose the column. This setting only applies at style2', 'amz-configurator-core' ),
							'admin_label' => true,
							'name'        => 'column',
							'type'        => 'select',
							'value'       => 'col3',
							'options' => array(
								'col3' => esc_html__( '3 Column', 'amz-configurator-core' ),
								'col4' => esc_html__( '4 Column', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Title Length', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the integer value for the character limits.', 'amz-configurator-core' ),
							'name'        => 'limit',
							'type'        => 'text',
							'value'       => '20'
						),

						array(
							'label'       => esc_html__( 'Price', 'amz-configurator-core' ),
							'description' => esc_html__( 'Show/Hide Price', 'amz-configurator-core' ),
							'name'        => 'price',
							'type'        => 'select',
							'value'       => 'show',
							'options' => array(
								'show' => esc_html__( 'Show', 'amz-configurator-core' ),
								'hide' => esc_html__( 'Hide', 'amz-configurator-core' )
							)
						),

						array(
							'label'       => esc_html__( 'Width', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the image width in integer.', 'amz-configurator-core' ),
							'name'        => 'width',
							'type'        => 'text',
							'value'       => '370'
						),

						array(
							'label'       => esc_html__( 'Height', 'amz-configurator-core' ),
							'description' => esc_html__( 'Enter the image height in integer.', 'amz-configurator-core' ),
							'name'        => 'height',
							'type'        => 'text',
							'value'       => '400'
						)

					),

					// Cart Button
					'Cart Button' => array(

						array(
							'label'       => esc_html__( 'Button Style', 'amz-configurator-core' ),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'cart_btn_style',
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
							'name'        => 'cart_btn_text_style',
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
							'name'        => 'cart_btn_size',
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
							'name'        => 'cart_btn_type',
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
							'name'        => 'cart_btn_color',
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
							'name'        => 'cart_btn_text',
							'type'        => 'text',
							'value'       => esc_html__( 'Add to Cart', 'configurator' )
						)
						
					),

					// Customize Button
					'Customize Button' => array(

						array(
							'label'       => esc_html__( 'Button Style', 'amz-configurator-core' ),
							'description' => esc_html__( 'Choose the button style', 'amz-configurator-core' ),
							'name'        => 'customize_btn_style',
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
							'name'        => 'customize_btn_text_style',
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
							'name'        => 'customize_btn_size',
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
							'name'        => 'customize_btn_type',
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
							'name'        => 'customize_btn_color',
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
							'label'       => esc_html__( 'Customize Button Text', 'amz-configurator-core' ),
							'description' => esc_html__( 'Type the button text', 'amz-configurator-core' ),
							'name'        => 'customize_btn_text',
							'type'        => 'text',
							'value'       => esc_html__( 'Select', 'configurator' )
						)
						
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
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'width', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'height', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.product-cover .product-content .title'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.product-cover .product-content .title')
									),
									'Price' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'width', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'height', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.product-cover .product-content .price'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.product-cover .product-content .price')
									),
									'Cart Button' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'width', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'height', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.product-cover .product-content .add_to_cart_button'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.product-cover .product-content .add_to_cart_button')
									),
									'Customize Button' => array(
										array('property' => 'color', 'label' => 'Text Color', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'text-align', 'label' => 'Align'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'width', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'height', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.product-cover .product-content .customize-btn'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.product-cover .product-content .customize-btn')
									),
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
			'depends_on'               => 'recent_product', // feature_product, id, category, recent_product
			'product_id'               => '',
			'category'                 => '',
			'items'                    => '3',
			'order'                    => 'desc',
			'orderby'                  => 'date',
			'style'                    => 'style2', // style1, style2
			'column'                   => 'col3', // col3, col4
			'limit'                    => '20',
			'price'                    => 'show', // show, hide,
			'width'                    => '370',
			'height'                   => '400',
			// Cart Button
			'cart_btn_style'           => 'btn-solid',
			'cart_btn_text_style'      => 'btn-uppercase',			
			'cart_btn_size'            => 'btn-md',			
			'cart_btn_type'            => 'btn-oval', // rectangle, oval			
			'cart_btn_color'           => 'btn-gradient', // btn-black, btn-gradient, btn-primary, btn-custom
			'cart_btn_text'            => esc_html__( 'Add to Cart', 'configurator' ),
			// Customize Button
			'customize_btn_style'      => 'btn-solid',
			'customize_btn_text_style' => 'btn-uppercase',			
			'customize_btn_size'       => 'btn-md',			
			'customize_btn_type'       => 'btn-oval', // rectangle, oval			
			'customize_btn_color'      => 'btn-gradient', // btn-black, btn-gradient, btn-primary, btn-custom
			'customize_btn_text'       => esc_html__( 'Select', 'configurator' )
		), $atts ) );

		$el_classes = apply_filters( 'kc-el-class', $atts );

		ob_start();

		// Empty assignment
		$product_content = $after_content = '';

		// Base query
		$args = array(
			'post_type'           => 'product',
			'posts_per_page'      => $items,
			'order'               => $order,
			'orderby'             => $orderby,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1
		);

		// Depends on ID
		if( 'id' == $depends_on && !empty( $product_id ) ) {

			// Build id array
			$id = explode( ',', $product_id );

			// Id query
			$id_args = array( 
				'post__in'       => $id,
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

				global $product;

				// Product ID
				$id = $product->get_id();

				$link = get_permalink();

				$product_content .= '<div class="product-content">';

					$thumb = configurator_get_meta_value( $id, '_amz_catalog_img' );
					$thumb_id = !empty( $thumb ) ? json_decode( $thumb ) : '';
					$thumb_id = !empty( $thumb_id ) ? $thumb_id[0]->itemId : 0;
					$thumb_id = ( $thumb_id ) ? $thumb_id : get_post_thumbnail_id();

					$product_content .= configurator_get_image_by_id( (int)$width, (int)$height, $thumb_id, 0, 1, 1 );

					$product_content .= '<h3 class="title"><a href="'. esc_url( $link ) .'">'. esc_html( get_the_title() ) .'</a></h3>';

					$product_content .= '<p class="price">'. configurator_apply_currency_postion( $product->get_price(), get_woocommerce_currency_symbol() ) . '</p>';

					// Add to cart button class
					$cart_btn_class = array();
					if ( $product ) {
						$cart_btn_class[] = 'btn button';
						$cart_btn_class[] = 'product_type_' . $product->get_type();
						$cart_btn_class[] = $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '';
						$cart_btn_class[] = $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '';
					}
					$cart_btn_class[] = $cart_btn_style;
					$cart_btn_class[] = $cart_btn_text_style;
					$cart_btn_class[] = $cart_btn_size;
					$cart_btn_class[] = $cart_btn_type;
					$cart_btn_class[] = $cart_btn_color;

					// Add to cart button
					$ac_btn_html = apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><span class="btn-text"> %s </span><span class="adding shop-loading">%s</span><span class="shop-added">%s</span></a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $quantity ) ? $quantity : 1 ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							esc_attr( implode( ' ', $cart_btn_class ) ),
							esc_html( $product->add_to_cart_text() ),
							esc_html__( 'adding...', 'configurator' ),
							esc_html__( 'In Cart', 'configurator' )
						),
					$product );
						
					$product_content .= '<div class="btn-wrap">';

						$product_content .= '<div class="btn-wrap-inner cart-btn-add">';
							$product_content .= $ac_btn_html;
						$product_content .= '</div>';

						// Add to cart button class
						$customize_btn_class = array();

						$customize_btn_class[] = 'customize-btn btn';
						$customize_btn_class[] = $customize_btn_style;
						$customize_btn_class[] = $customize_btn_text_style;
						$customize_btn_class[] = $customize_btn_size;
						$customize_btn_class[] = $customize_btn_type;
						$customize_btn_class[] = $customize_btn_color;

						$config_id = get_post_meta( $id, '_configurator_post_id', true );

						if( $config_id && defined( 'PWC_VERSION' ) ) {
							$product_content .= '<div class="btn-wrap-inner cart-btn-customize">';
								$product_content .= '<a href="'. esc_url( $link ) .'" class="'. implode( ' ', $customize_btn_class ) .'">'. esc_html( $customize_btn_text ) .'</a>';
							$product_content .= '</div>';
						}

					$product_content .= '</div>';

				$product_content .= '</div>'; // .product-content

			endwhile;
		endif;

		wp_reset_query();

		ob_start();
		?>
			
			<div class="product-wrap <?php echo esc_attr( implode( ' ', $el_classes ) ); ?>">
				<div class="product-cover <?php echo esc_attr( $style .' '. $column ); ?>">
					<div class="product">
						<?php echo $product_content; // It prints all products ?>
						<?php echo $after_content; // It prints shop button ?>
					</div> <!-- .product  -->
				</div> <!-- .product-cover  -->
			</div> <!-- .product-wrap  -->

		<?php

		$result = ob_get_contents();
		ob_end_clean();
		$output = $result;

		return $output;

	}

}

new amz_product();
