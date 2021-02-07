<?php

// Header
if( !function_exists( 'configurator_print_header_element' ) ) {
	function configurator_print_header_element() {

		$header_icons = get_theme_mod( 'header_icon', array( 'search_icon', 'wishlist', 'cart' ) );
		ob_start();
		foreach ( $header_icons as $key => $icons ) {
			configurator_display_elements( $icons );
		}
		$header_elements = ob_get_clean();

		return $header_elements;
	}
}

// Title bar
if( !function_exists( 'configurator_print_title_bar' ) ) {
	function configurator_print_title_bar() {

		$values = array();

		// get page id
		if ( configurator_is_shop() ) { 
			$page_id = wc_get_page_id( 'shop' ); 
		}
		else if( is_home() || is_archive() || is_search() || is_404() ) {
			$page_id = get_option('page_for_posts');
		}
		else {
			global $wp_query; 
			$page_id = ( 0 == get_the_ID() || NULL == get_the_ID() ) ? $wp_query->post->ID : get_the_ID();
		}

		$prefix = configurator_get_prefix();

		if( is_home() || is_archive() || is_search() || is_404() || configurator_is_shop() ) {

			$values['title_bar']           = get_theme_mod( $prefix.'title_bar', 'show' );
			$values['title_bar_align']     = get_theme_mod( $prefix.'title_bar_align', 'sub-banner-center' );	
			$values['title_bar_method']    = get_theme_mod( $prefix.'title_bar_method', 'hyphen' );	
			$values['go_back']             = get_theme_mod( $prefix.'title_bar_goback', 'show' );
			$values['show_title']          = get_theme_mod( $prefix.'title_bar_title', 'show' );
			$values['sub_title']           = get_theme_mod( $prefix.'sub_title', '' );		
			$values['on_right_side']       = get_theme_mod( $prefix.'title_bar_on_right_side', 'breadcrumbs' );
			$values['on_right_side_title'] = get_theme_mod( $prefix.'title_bar_on_right_side_title', esc_html__( 'Share with friends', 'configurator' ) );
			$values['share']               = get_theme_mod( $prefix.'title_bar_share_option', array( 'facebook', 'twitter', 'gplus', 'linkedin', 'pinterest' ) );
			$values['share_below_title']   = get_theme_mod( $prefix.'share_below_title', 'hide' );
			$values['header_layout']       = get_theme_mod( $prefix.'header_layout', 'header-1' );
			$values['header_transparency'] = get_theme_mod( $prefix.'transparent_header', 'hide' );

		}
		else {

			$opt_prefix = '';
			if( is_singular( 'post' ) ) {
				$opt_prefix = 'single_';
			}
			else if( is_singular( 'product' ) ) {
				$opt_prefix = 'single_product_';
			}
			

			$facebook  = configurator_get_meta_value( $page_id, '_amz_show_facebook', 'facebook' );
			$twitter   = configurator_get_meta_value( $page_id, '_amz_show_twitter', 'twitter' );
			$linkedin  = configurator_get_meta_value( $page_id, '_amz_show_linkedin', 'linkedin' );
			$gplus     = configurator_get_meta_value( $page_id, '_amz_show_gplus', 'gplus' );
			$pinterest = configurator_get_meta_value( $page_id, '_amz_show_pinterest', 'pinterest' );

			$values['title_bar']           = configurator_get_meta_value( $page_id, '_amz_title_bar', 'default', $opt_prefix.'title_bar', 'show' );
			$values['title_bar_style']     = configurator_get_meta_value( $page_id, '_amz_title_bar_style', 'default' );
			$values['title_bar_align']     = configurator_get_meta_value( $page_id, '_amz_title_bar_align', 'default', $opt_prefix.'title_bar_align', 'sub-banner-center' );
			$values['title_bar_method']    = configurator_get_meta_value( $page_id, '_amz_title_bar_method', 'default', $opt_prefix.'title_bar_method', 'hyphen' );		
			$values['go_back']             = configurator_get_meta_value( $page_id, '_amz_go_back', 'default', $opt_prefix.'title_bar_goback', 'show' );		
			$values['show_title']          = configurator_get_meta_value( $page_id, '_amz_show_title', 'default', $opt_prefix.'title_bar_title', 'show' );		
			$values['sub_title']           = configurator_get_meta_value( $page_id, '_amz_sub_title', '', 'sub_title', '' );
			$values['share']               = configurator_get_meta_value( $page_id, '_amz_share_option', array( $facebook, $twitter, $linkedin, $gplus, $pinterest ), $opt_prefix.'title_bar_share_option', array( 'facebook', 'twitter', 'gplus', 'linkedin', 'pinterest' ) );		
			$values['share_below_title']   = configurator_get_meta_value( $page_id, '_amz_share_below_title', 'default', $opt_prefix.'title_bar_share_below_title', 'hide' );	
			$values['on_right_side']       = configurator_get_meta_value( $page_id, '_amz_on_right_side', 'default', $opt_prefix.'title_bar_on_right_side', 'breadcrumbs' );		
			$values['on_right_side_title'] = configurator_get_meta_value( $page_id, '_amz_on_right_side_title', esc_html__( 'Share with friends', 'configurator' ), $opt_prefix.'title_bar_on_right_side_title', esc_html__( 'Share with friends', 'configurator' ) );		
			$values['header_layout']       = configurator_get_meta_value( $page_id, '_amz_header_layout', 'default', 'header_layout', 'header-1' );
			$values['header_transparency'] = configurator_get_meta_value( $page_id, '_amz_transparent_header', 'default', 'transparent_header', 'hide' );

		}

		// Page Title
		$values['title'] = configurator_get_page_title();

		ob_start();
			echo configurator_sub_banner( $values );
        $output = ob_get_clean();

		return $output;
	}
}

// Blog | Archives | Search
if( !function_exists( 'configurator_print_link_btn' ) ) {
	function configurator_print_link_btn() {

		// Empty assignment
		$btn = '';

		$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

		// Single post link
		$single_link = get_theme_mod( $prefix.'link_btn', 'show' );
		$single_link_text = get_theme_mod( $prefix.'link_text', esc_html__( 'Read More', 'configurator' ) );

		if( 'show' === $single_link ){
            $btn = '<div class="link-btn"><a href="'. esc_url( get_permalink() ) .'" class="link-text">'. esc_html( $single_link_text ) .'</a></div>';
        }

		return $btn;
	}
}

if( !function_exists( 'configurator_print_post_meta' ) ) {
	function configurator_print_post_meta() {

		$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

		$meta = get_theme_mod( $prefix.'meta', 'date' ); // for list style
		$meta_sort = get_theme_mod( $prefix.'meta_sort', array( 'author', 'comment', 'date' ) ); // for normal & normal_split style

		$type = get_theme_mod( $prefix.'style', 'normal' );

		ob_start();

		if( 'list' == $type ) {
			if( !empty( $meta ) ) {
				echo configurator_meta( $meta );
			}				
		}
		else {
			foreach ( $meta_sort as $key => $value ) {
				echo configurator_meta( $value );
			}				
		}
		
		$meta = ob_get_clean();

		return $meta;
	}
}

if( !function_exists( 'configurator_print_post_title' ) ) {
	function configurator_print_post_title() {

		$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

		//Shorten Blog Title
		$title_limit = get_theme_mod( $prefix.'title_limit', '80' );
		$post_title = configurator_shorten_text( get_the_title(), $title_limit );
		
		$link = '<a href="'. esc_url( get_permalink() ) .'">'. esc_html( $post_title ) .'</a>';

		return $link;
	}
}

if( !function_exists( 'configurator_print_pagination' ) ) {
	function configurator_print_pagination() {

		$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

		$values['style'] = get_theme_mod( $prefix.'pagination', 'number' );

		// Default
		$args = array(
		    'posts_per_page' => get_option( 'posts_per_page' ),
		    'ignore_sticky_posts' => 1
		);

		// Archive Category
		if ( is_category() ) {
		    $category_arr = get_the_category();
		    $slug = $category_arr[0]->slug;
		    $category = array(
		        'category_name' => $slug
		    );
		    $args = array_merge( $args, $category );
		}
		// Archive Author
		elseif ( is_author() ) {
		    global $post;
		    $author_id = $post->post_author;
		    $author = array(
		        'author' => $author_id
		    );
		    $args = array_merge( $args, $author );
		}
		// Archive Tag
		elseif ( is_tag() ) {        
		    $posttags = get_the_tags();
		    $slug = $posttags[0]->slug;
		    $tag = array(
		        'tag' => $slug
		    );
		    $args = array_merge( $args, $tag );
		}
		// Archive Day
		elseif ( is_day() ) {
		    $day = array(
		        'day' => get_the_time('j'),
		        'monthnum' => get_the_time('m'),
		        'year' => get_the_time('Y')
		    );
		    $args = array_merge( $args, $day );
		}
		// Archive Month
		elseif ( is_month() ) { 
		    $month = array(
		        'monthnum' => get_the_time('m'),
		        'year' => get_the_time('Y')
		    );
		    $args = array_merge( $args, $month );
		}
		// Archive Year
		elseif ( is_year() ) { 
		    $year = array(
		        'year' => get_the_time('Y')
		    );
		    $args = array_merge( $args, $year );
		}
		// Search
		elseif ( is_search() ) { 
		    $search = array(
		        's' => get_search_query()
		    );
		    $args = array_merge( $args, $search );        
		}

		ob_start();
			echo configurator_pagination( $args, $values ); // args, values
		$pagination = ob_get_clean();

		return $pagination;
	}
}

// Single Blog
if( !function_exists( 'configurator_print_single_post_tag_share' ) ) {
	function configurator_print_single_post_tag_share() {

		$prefix = configurator_get_prefix();

		// Tag
		$show_tag = get_theme_mod( $prefix.'tag', 'show' );

		$show_share = '';

		// Share
		$show_share = get_theme_mod( $prefix.'share', 'show' );
		$share_options = get_theme_mod( $prefix.'share_option', array( 'facebook', 'twitter', 'gplus', 'linkedin', 'pinterest' ) );
		
		ob_start();
		$tags = get_the_tag_list('<p class="tag-group"><i class="tag ct-tags"></i>',', ','</p>');
		if( ( 'show' == $show_tag && $tags ) || ( function_exists( 'configurator_social_share' ) && 'show' == $show_share && ! empty( $share_options ) ) ) {
			echo '<div class="post-bottom">';
				if( 'show' == $show_tag ) {
					echo $tags;
				}

			    if( 'show' == $show_share && !empty( $share_options ) ) {

					echo '<p class="social-share">';
				    	foreach ( $share_options as $key => $value ) {
				    		echo configurator_social_share( $value );
						}
					echo '</p>';

			    }
			echo '</div>'; // .post-bottom
		}

	    $output = ob_get_clean();

		return $output;
	}
}

if( !function_exists( 'configurator_print_single_post_author_box' ) ) {
	function configurator_print_single_post_author_box() {

		$prefix = configurator_get_prefix();

		global $post;

		$userdata = get_user_meta( $post->post_author );
		$description = $userdata['description'][0];

		$output = '';

		// Author Box
		$author_box = get_theme_mod( $prefix.'author_box', 'show' );

        //Author Box
        if( 'show' == $author_box && !empty( $description ) ) {
        	$output = configurator_author_box();
        }

		return $output;
	}
}

// Single Product
if( !function_exists( 'configurator_print_single_product_wishlist' ) ) {
	function configurator_print_single_product_wishlist() {

		$output = '';

		// Author Box
		$show_wishlist = get_theme_mod( 'single_product_wishlist_btn', 'show' );
		$wishlist_text = get_theme_mod( 'single_product_wishlist_text', esc_html__( 'Add to wishlist', 'configurator' ) );

		if( 'show' == $show_wishlist ) {
			$active_class = in_array( get_the_ID(), $GLOBALS['amz_wishlist_items'] ) ? ' active' : '';
			$output = '<a href="#" class="amz-wishlist' . esc_attr( $active_class ) . '" data-id="'. esc_attr( get_the_ID() ) .'"><i class="ct-heart icon"></i><span class="wishlist-text">'. esc_html( $wishlist_text ) .'</span></a>';
		}
        

		return $output;
	}
}

// Footer
if( !function_exists( 'configurator_print_small_footer' ) ) {
	function configurator_print_small_footer() {

		$footer_small = get_theme_mod( 'footer_small', 'show' );
		$element_position = get_theme_mod( 'footer_small_element_position', 'left_right' );
		$footer_small_element = get_theme_mod( 'footer_small_element', array( 'copyright_text', 'sicons' ) );

		ob_start();

		if( 'show' == $footer_small ) {
			echo '<div class="footer-bottom '. esc_attr( $element_position ) .'">';
				echo '<div class="container">';
					echo '<div class="copyright row">';
						if( 'left_right' == $element_position ) {

							foreach ( $footer_small_element as $key => $element ) {
								echo '<div class="col-md-6 '.$element.'">';
									echo configurator_display_elements( $element );
								echo '</div>';
							}
						}
						else {
							echo '<div class="col-md-12">';
								foreach ( $footer_small_element as $key => $element ) {
									echo configurator_display_elements( $element );
								}
							echo '</div>';

						}

					echo '</div>'; // .copyright
				echo '</div>'; // .container
			echo '</div>'; // .footer-bottom
		}

		$output = ob_get_clean();

		return $output;
	}
}