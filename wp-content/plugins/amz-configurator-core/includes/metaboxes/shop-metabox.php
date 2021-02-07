<?php

	$amz_prefix = '_amz_';

	$shop_metabox = array(
		'metabox'	=> array( 
			'id'         => 'product',
			'title'      => esc_html__( 'Shop Options', 'amz-configurator-core' ),
			'post_type'  => 'product',
			'context'    => 'normal',
			'priority'   => 'low',
			'tabs' 		 => true,
		),
		'fields'     => array(

			array(
				'title' => esc_html__('Product', 'amz-configurator-core'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'catalog_img',
				'title'        => esc_html__('Product Thumb', 'amz-configurator-core'),
				'description'  => esc_html__('This is the catelog image for products', 'amz-configurator-core'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager'
			),

			array(
				'id' => $amz_prefix . 'product_description',
				'title' => esc_html__('Product description', 'amz-configurator-core'),
				'description' => esc_html__('Enter the product description here if you enable KingComposer', 'amz-configurator-core'),
				'placeholder' => '',
				'std'	=> '',
				'type' => 'textarea'
			),

			array(
				'id'           => $amz_prefix . 'slider_img',
				'title'        => esc_html__('Slider Image', 'amz-configurator-core'),
				'description'  => esc_html__('This image only apply for product slider shortcode', 'amz-configurator-core'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager'
			),

			array(
				'id' => $amz_prefix . 'slider_description',
				'title' => esc_html__('Slider Description', 'amz-configurator-core'),
				'description' => esc_html__('Type the slider description', 'amz-configurator-core'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> '',
				'type' => 'text'
			),

			array(
				'id' => $amz_prefix . 'slider_background_text',
				'title' => esc_html__('Slider Background Text', 'amz-configurator-core'),
				'description' => esc_html__('Type the slider background text', 'amz-configurator-core'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> '',
				'type' => 'text'
			),

			array(
				'title' => esc_html__('General', 'amz-configurator-core'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'demo_logo',
				'title'        => esc_html__('Logo', 'amz-configurator-core'),
				'description'  => esc_html__('Choose logo for this page.', 'amz-configurator-core'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager'
			),

			array( 	
				'id'		  => $amz_prefix . 'boxed_content',
				'title'		  => esc_html__('Wide &amp; Boxed &amp; Frame Layout', 'amz-configurator-core' ),
				'description' => esc_html__('Choose Header Layout. Boxed = max header width is 1200px; Wide = header covers the viewport. Frame = White space around the edges.', 'amz-configurator-core' ),
				'std'		  => 'default',
				'type' 		  => 'switch',
				'options' 	  => array(
					'default' => 'Default',
					'wide'	  => 'Wide',
					'boxed'	  => 'Boxed',
					'frame'	  => 'Frame'
					),
			),

			array(
				'id'          => $amz_prefix . 'main_navigation',
				'title'       => esc_html__('Main Navigation', 'amz-configurator-core'),
				'description' => esc_html__('Select main navigation for this page', 'amz-configurator-core'),
				'std'         => 'default',
				'options'     => $menu_list,
				'type' 	      => 'select'
			),

			array(
				'id'          => $amz_prefix . 'body_bgcolor',
				'title'       => esc_html__('Body Background Color', 'amz-configurator-core'),
				'description' => esc_html__('You can choose body background color here. Leave it empty to apply defaults', 'amz-configurator-core'),
				'std'         => '',
				'type'        => 'colorpicker'
			),

			array(
				'id'          => $amz_prefix . 'footer',
				'title'       => esc_html__('Show/Hide Footer', 'amz-configurator-core'),
				'description' => esc_html__('Do you want to display footer?', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' => 'Default',
					'show'    => 'Show',
					'hide'    => 'Hide'
				),
				'type' 		  => 'switch'
			),

			array(
				'title' => esc_html__('Layout', 'amz-configurator-core'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'layout',
				'title' 	   => esc_html__('Page Layout', 'amz-configurator-core'),
				'description'  => esc_html__('Choose page layout', 'amz-configurator-core'),
				'std' 		   => 'default',
				'options'	   => array(
					'default'       => 'full_width.png',
					'left-sidebar'  => 'left_sidebar.png',	
					'right-sidebar' => 'right_sidebar.png',					
					'left-nav'      => 'left_nav.png',
					'right-nav'     => 'right_nav.png',
				),
				'type' 		   => 'image_select'
			),

			array(
				'id'           => $amz_prefix . 'sidebar',
				'title'        => esc_html__('Select Sidebar', 'amz-configurator-core'),
				'description'  => esc_html__('Select Sidebar For this page.', 'amz-configurator-core'),
				'hide_sidebar' => array('footer-widget-1', 'footer-widget-2'),
				'type'         => 'select_sidebar',
			),

			array(
				'title' => esc_html__('Header', 'amz-configurator-core'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => $amz_prefix . 'header_visibility',
				'title'       => esc_html__('Show/Hide Header?', 'amz-configurator-core'),
				'description' => esc_html__('Do you want to show/hide the header?', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'           => $amz_prefix . 'header_layout',
				'title' 	   => esc_html__('Header Layout', 'amz-configurator-core'),
				'description'  => esc_html__('Choose header layout', 'amz-configurator-core'),
				'std' 		   => 'default',
				'options'	   => array(
					'default'  => 'default.png',
					'header1' => 'header-layout/header1.png',
					'header2' => 'header-layout/header2.png',
				),
				'type' 		   => 'image_select',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'header_width',
				'title'       => esc_html__('Header Layout Style.', 'amz-configurator-core'),
				'description' => esc_html__('Choose Header Layout. Boxed = max header width is 1200px; Wide = header covers the viewport.', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	=> 'Default',
					'wide' 		=> 'Wide',
					'boxed' 	=> 'Boxed'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix . 'header_background_style',
				'title'       => esc_html__('Header Background Style', 'amz-configurator-core'),
				'description' => esc_html__('Choose the Header Background Style', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'light' 	  => 'Light',
					'dark' 	  => 'Dark'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'header_line',
				'title'       => esc_html__('Show Header border?', 'amz-configurator-core'),
				'description' => esc_html__('Show/Hide Header border', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'yes' 	  => 'Yes',
					'no' 	  => 'No'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'transparent_header',
				'title'       => esc_html__('Transparent Header', 'amz-configurator-core'),
				'description' => esc_html__('Do you want to enable the transparent header?', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
				'class' => 'header', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'transparent_header_opacity',
				'title' => esc_html__('Transparent Header Opacity', 'amz-configurator-core'),
				'description' => esc_html__('Type the alpha value. Eg: 0 to 90', 'amz-configurator-core'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> '0',
				'type' => 'text',
				'fold'         => array ( $amz_prefix . 'transparent_header' => array('show')),
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'top_header',
				'title'       => esc_html__('Top Header', 'amz-configurator-core'),
				'description' => esc_html__('Do you want to show the top header?', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide'  => 'Hide'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'top_header_position',
				'title'       => esc_html__('Top Header Position', 'amz-configurator-core'),
				'description' => esc_html__('Select the position of the top header', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'top' 	  => 'Top',
					'bottom'  => 'Bottom'
					),
				'type' 		  => 'switch',
				'fold'         => array ( $amz_prefix . 'top_header' => array('show')),
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'top_section_style',
				'title'       => esc_html__('Top Section Style', 'amz-configurator-core'),
				'description' => esc_html__('Choose the Top Section Style', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'light' 	  => 'Light',
					'dark' 	  => 'Dark'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'title' => esc_html__('Title Bar', 'amz-configurator-core'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => $amz_prefix . 'title_bar',
				'title'       => esc_html__('Title bar', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide Title bar in this page', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'title_bar_style',
				'title'       => esc_html__('Title bar style', 'amz-configurator-core'),
				'description' => esc_html__('Choose the title bar style', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default'           => esc_html__('Default', 'amz-configurator-core'),
					'sub-banner-left'   => esc_html__('Sub Banner Left', 'amz-configurator-core'),					
					'sub-banner-center' => esc_html__('Sub Banner Center', 'amz-configurator-core')
				),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'title_bar_method',
				'title'       => esc_html__('Title bar method', 'amz-configurator-core'),
				'description' => esc_html__('Choose the title bar method', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => esc_html__('Default', 'amz-configurator-core'),
					'hyphen' 	  => esc_html__('Hyphen', 'amz-configurator-core'),
					'slash' 	  => esc_html__('Slash', 'amz-configurator-core')				),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'go_back',
				'title'       => esc_html__('Go back link', 'amz-configurator-core'),
				'description' => esc_html__('Show/hide go back link', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => esc_html__('Default', 'amz-configurator-core'),
					'show' 	  => esc_html__('Show', 'amz-configurator-core'),
					'hide' 	  => esc_html__('Hide', 'amz-configurator-core')				),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'show_title',
				'title'       => esc_html__('Show title', 'amz-configurator-core'),
				'description' => esc_html__('Show/hide title bar title', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => esc_html__('Default', 'amz-configurator-core'),
					'show' 	  => esc_html__('Show', 'amz-configurator-core'),
					'hide' 	  => esc_html__('Hide', 'amz-configurator-core')				),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'sub_title',
				'title' => esc_html__('Sub title', 'amz-configurator-core'),
				'description' => esc_html__('Type the sub title', 'amz-configurator-core'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> '',
				'type' => 'text',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'share_below_title',
				'title'       => esc_html__('Share Below Title', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide share option in Title bar', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' => 'Default',
					'show' => 'Show',
					'hide'     => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'show_facebook',
				'title'       => esc_html__('Facebook share', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide facebook share in Title bar', 'amz-configurator-core'),
				'std'         => 'facebook',
				'options' 	  => array(
					'facebook' => 'Show',
					'hide'     => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'show_twitter',
				'title'       => esc_html__('Twitter share', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide twitter share in Title bar', 'amz-configurator-core'),
				'std'         => 'twitter',
				'options' 	  => array(
					'twitter' => 'Show',
					'hide'    => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'show_linkedin',
				'title'       => esc_html__('Linkedin share', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide linkedin share in Title bar', 'amz-configurator-core'),
				'std'         => 'linkedin',
				'options' 	  => array(
					'linkedin' => 'Show',
					'hide'     => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'show_gplus',
				'title'       => esc_html__('Google plus share', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide gplus share in Title bar', 'amz-configurator-core'),
				'std'         => 'gplus',
				'options' 	  => array(
					'gplus' => 'Show',
					'hide'  => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'show_pinterest',
				'title'       => esc_html__('Pinterest share', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide pinterest share in Title bar', 'amz-configurator-core'),
				'std'         => 'pinterest',
				'options' 	  => array(
					'pinterest' => 'Show',
					'hide'      => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'breadcrumbs',
				'title'       => esc_html__('Breadcrumbs', 'amz-configurator-core'),
				'description' => esc_html__('Show / Hide breadcrumbs in Title bar', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'on_right_side',
				'title' => esc_html__('Title Bar Right Side', 'amz-configurator-core'),
				'description' => esc_html__('Choose which thing you want to display on right side of the title bar?', 'amz-configurator-core'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> 'default',
				'options' => array(
					'default' 	  => 'Default',
					'breadcrumbs' => 'Breadcrumbs',
					'share' => 'Share',
					'none' => 'None'
					),
				'type' => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'on_right_side_title',
				'title' => esc_html__('Title bar right side title', 'amz-configurator-core'),
				'description' => esc_html__('Type the title bar right side title', 'amz-configurator-core'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> esc_html__( 'Share with friends', 'amz-configurator-core' ),
				'type' => 'text',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'title_bar_style',
				'title'       => esc_html__('Title Bar Style', 'amz-configurator-core'),
				'description' => esc_html__('Choose title bar style', 'amz-configurator-core'),
				'std'         => 'default',
				'options' 	  => array(
					'default'   => 'Default',
					'custom'  => 'Custom'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'title_bar_bg_color',
				'title'       => esc_html__('Title Bar Background Color', 'amz-configurator-core'),
				'description' => esc_html__('Choose Title bar background color. Leave it empty apply default', 'amz-configurator-core'),
				'std'         => '',
				'type'        => 'colorpicker',
				'fold'		  => array ( $amz_prefix . 'title_bar_style' => array('custom')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'           => $amz_prefix . 'title_bar_bg_image',
				'title'        => esc_html__('Title Bar Background Image', 'amz-configurator-core'),
				'description'  => esc_html__('Choose Title bar background image. Leave it empty apply default from themeoption', 'amz-configurator-core'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'fold'		   => array ( $amz_prefix . 'title_bar_style' => array('custom')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'title_bar_text_color',
				'title'       => esc_html__('Title Bar text Color', 'amz-configurator-core'),
				'description' => esc_html__('Choose Title bar text color. Leave it empty apply default', 'amz-configurator-core'),
				'std'         => '',
				'type'        => 'colorpicker',
				'fold'		  => array ( $amz_prefix . 'title_bar_style' => array('custom')),
			),			

		),
	);

	$shop_metabox = new Amazee_Metabox( $shop_metabox );