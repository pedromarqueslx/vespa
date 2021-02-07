<?php
/*
Register Fonts
*/

function configurator_theme_fonts_url() {

	$font_url = $font_encode_url = '';

	if( ! is_admin() ) {

		$protocol = is_ssl() ? 'https' : 'http';

		$advance_typography = configurator_get_option_value( 'advance_typography', 'no' );

		// Heading Font
		$primary_font = configurator_get_option_value( 'primary_font', array( 'font-family' => 'Montserrat' ) );
		$font_url .= $primary_font['font-family'].':100,300,400,500,600,700,900';

		// Body Font
		$content_font = configurator_get_option_value( 'content_font', array( 'font-family' => 'Raleway' ) );
		$font_url .= '|'.$content_font['font-family'].':100,300,400,500,600,700,900';

		if( 'no' == $advance_typography ) { 

			/*
		    Translators: If there are characters in your language that are not supported
		    by chosen font(s), translate this to 'off'. Do not translate into your own language.
		     */

		    if ( 'off' !== _x( 'on', 'Google font: on or off', 'configurator' ) ) {
		    	$font_encode_url = add_query_arg( 'family', urlencode( $font_url ), "//fonts.googleapis.com/css" );
		    }
		}
		else {

			// H1 Font
			$h1 = configurator_get_option_value( 'h1_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$h1['font-family'].':'.$h1['variant'];

			// H2 Font
			$h2 = configurator_get_option_value( 'h2_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$h2['font-family'].':'.$h2['variant'];

			// H3 Font
			$h3 = configurator_get_option_value( 'h3_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$h3['font-family'].':'.$h3['variant'];

			// H4 Font
			$h4 = configurator_get_option_value( 'h4_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$h4['font-family'].':'.$h4['variant'];

			// H5 Font
			$h5 = configurator_get_option_value( 'h5_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$h5['font-family'].':'.$h5['variant'];

			// H6 Font
			$h6 = configurator_get_option_value( 'h6_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$h6['font-family'].':'.$h6['variant'];

			// List Font
			$list = configurator_get_option_value( 'list_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$list['font-family'].':'.$list['variant'];

			// Link Font
			$link = configurator_get_option_value( 'link_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$link['font-family'].':'.$link['variant'];

			// Logo Font
			$logo = configurator_get_option_value( 'logo_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$logo['font-family'].':'.$logo['variant'];

			// Blockquote Font
			$blockquote = configurator_get_option_value( 'blockquote_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$blockquote['font-family'].':'.$blockquote['variant'];

			// Main Menu Font
			$main_menu = configurator_get_option_value( 'main_menu_font', array( 'font-family' => 'Montserrat', 'variant' => '400' ) );
			$font_url .= '|'.$main_menu['font-family'].':'.$main_menu['variant'];

			// Sub Menu Font
			$sub_menu = configurator_get_option_value( 'sub_menu_font', array( 'font-family' => 'Montserrat', 'variant' => '400' ) );
			$font_url .= '|'.$sub_menu['font-family'].':'.$sub_menu['variant'];

			// Button Extra Small Font
			$btn_xs = configurator_get_option_value( 'btn_xs_font', array( 'font-family' => 'Montserrat', 'variant' => '500' ) );
			$font_url .= '|'.$btn_xs['font-family'].':'.$btn_xs['variant'];

			// Button Small Font
			$btn_sm = configurator_get_option_value( 'btn_sm_font', array( 'font-family' => 'Montserrat', 'variant' => '500' ) );
			$font_url .= '|'.$btn_sm['font-family'].':'.$btn_sm['variant'];

			// Button Medium Font
			$btn_md = configurator_get_option_value( 'btn_md_font', array( 'font-family' => 'Montserrat', 'variant' => '500' ) );
			$font_url .= '|'.$btn_md['font-family'].':'.$btn_md['variant'];

			// Button Large Font
			$btn_lg = configurator_get_option_value( 'btn_lg_font', array( 'font-family' => 'Montserrat', 'variant' => '500' ) );
			$font_url .= '|'.$btn_lg['font-family'].':'.$btn_lg['variant'];

			// Title Bar Title Font
			$title_bar_title = configurator_get_option_value( 'title_bar_title_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$title_bar_title['font-family'].':'.$title_bar_title['variant'];

			// Title Bar Sub Title Font
			$title_bar_sub_title = configurator_get_option_value( 'title_bar_sub_title_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$title_bar_sub_title['font-family'].':'.$title_bar_sub_title['variant'];

			// Go Back Font
			$goback = configurator_get_option_value( 'goback_font', array( 'font-family' => 'Montserrat', 'variant' => '300' ) );
			$font_url .= '|'.$goback['font-family'].':'.$goback['variant'];

			// Breadcrumbs Font
			$breadcrumbs = configurator_get_option_value( 'breadcrumbs_font', array( 'font-family' => 'Montserrat', 'variant' => '300' ) );
			$font_url .= '|'.$breadcrumbs['font-family'].':'.$breadcrumbs['variant'];

			// Blog / Archives / Search Title Font
			$blog_title = configurator_get_option_value( 'blog_title_font', array( 'font-family' => 'Montserrat', 'variant' => '600' ) );
			$font_url .= '|'.$blog_title['font-family'].':'.$blog_title['variant'];

			// Blog / Archives / Search Meta Font
			$blog_meta = configurator_get_option_value( 'blog_meta_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$blog_meta['font-family'].':'.$blog_meta['variant'];

			// Blog / Archives / Search Content Font
			$blog_content = configurator_get_option_value( 'blog_content_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$blog_content['font-family'].':'.$blog_content['variant'];

			// Blog / Archives / Search Button Link Font
			$blog_btn_link = configurator_get_option_value( 'blog_btn_link_font', array( 'font-family' => 'Montserrat', 'variant' => '400' ) );
			$font_url .= '|'.$blog_btn_link['font-family'].':'.$blog_btn_link['variant'];

			// Single Blog Title Font
			$single_blog_title = configurator_get_option_value( 'single_blog_title_font', array( 'font-family' => 'Raleway', 'variant' => '700' ) );
			$font_url .= '|'.$single_blog_title['font-family'].':'.$single_blog_title['variant'];

			// Single Blog Tag Font
			$single_blog_tag = configurator_get_option_value( 'single_blog_tag_font', array( 'font-family' => 'Raleway', 'variant' => '500' ) );
			$font_url .= '|'.$single_blog_tag['font-family'].':'.$single_blog_tag['variant'];

			// Single Blog Author Font
			$single_blog_author = configurator_get_option_value( 'single_blog_author_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$single_blog_author['font-family'].':'.$single_blog_author['variant'];

			// Single Blog Author Description Font
			$single_blog_author_description = configurator_get_option_value( 'single_blog_author_description_font', array( 'font-family' => 'Raleway', 'variant' => '500' ) );
			$font_url .= '|'.$single_blog_author_description['font-family'].':'.$single_blog_author_description['variant'];

			// Single Blog Comment Author Font
			$single_blog_comment_author = configurator_get_option_value( 'single_blog_comment_author_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$single_blog_comment_author['font-family'].':'.$single_blog_comment_author['variant'];

			// Single Blog Comment Meta Font
			$single_blog_comment_meta = configurator_get_option_value( 'single_blog_comment_meta_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$single_blog_comment_meta['font-family'].':'.$single_blog_comment_meta['variant'];

			// Single Blog Comment Reply Font
			$single_blog_comment_reply = configurator_get_option_value( 'single_blog_comment_reply_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$single_blog_comment_reply['font-family'].':'.$single_blog_comment_reply['variant'];

			// Single Blog Comment Font
			$single_blog_comment = configurator_get_option_value( 'single_blog_comment_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$single_blog_comment['font-family'].':'.$single_blog_comment['variant'];

			// Sidebar Widget Title Font
			$sidebar_widget_title = configurator_get_option_value( 'sidebar_widget_title_font', array( 'font-family' => 'Montserrat', 'variant' => '600' ) );
			$font_url .= '|'.$sidebar_widget_title['font-family'].':'.$sidebar_widget_title['variant'];

			// Sidebar Widget Content Font
			$sidebar_widget_content = configurator_get_option_value( 'sidebar_widget_content_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$sidebar_widget_content['font-family'].':'.$sidebar_widget_content['variant'];

			// Sidebar Widget Link Font
			$sidebar_widget_link = configurator_get_option_value( 'sidebar_widget_link_font', array( 'font-family' => 'Raleway', 'variant' => '400' ) );
			$font_url .= '|'.$sidebar_widget_link['font-family'].':'.$sidebar_widget_link['variant'];

			// Footer Widget Title Font
			$footer_widget_title = configurator_get_option_value( 'footer_widget_title_font', array( 'font-family' => 'Montserrat', 'variant' => '600' ) );
			$font_url .= '|'.$footer_widget_title['font-family'].':'.$footer_widget_title['variant'];

			// Footer Widget Content Font
			$footer_widget_content = configurator_get_option_value( 'footer_widget_content_font', array( 'font-family' => 'Raleway', 'variant' => '500' ) );
			$font_url .= '|'.$footer_widget_content['font-family'].':'.$footer_widget_content['variant'];

			// Footer Widget Link Font
			$footer_widget_link = configurator_get_option_value( 'footer_widget_link_font', array( 'font-family' => 'Raleway', 'variant' => '500' ) );
			$font_url .= '|'.$footer_widget_link['font-family'].':'.$footer_widget_link['variant'];

			// Product Result Font
			$product_result_count = configurator_get_option_value( 'product_result_count_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$product_result_count['font-family'].':'.$product_result_count['variant'];

			// Product Sort Font
			$product_sort = configurator_get_option_value( 'product_sort_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$product_sort['font-family'].':'.$product_sort['variant'];

			// Product Title Font
			$product_title = configurator_get_option_value( 'product_title_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$product_title['font-family'].':'.$product_title['variant'];

			// Product Price Font
			$product_price = configurator_get_option_value( 'product_price_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$product_price['font-family'].':'.$product_price['variant'];

			// Product Button Font
			$product_btn = configurator_get_option_value( 'product_btn_font', array( 'font-family' => 'Raleway', 'variant' => '600' ) );
			$font_url .= '|'.$product_btn['font-family'].':'.$product_btn['variant'];

			/*
		    Translators: If there are characters in your language that are not supported
		    by chosen font(s), translate this to 'off'. Do not translate into your own language.
		     */

		    if ( 'off' !== _x( 'on', 'Google font: on or off', 'configurator' ) ) {
		    	$font_encode_url = add_query_arg( 'family', urlencode( $font_url ), "//fonts.googleapis.com/css" );
		    }
		}

		
	}
    
    return $font_encode_url;
}
/*
Enqueue scripts and styles.
*/
function configurator_theme_fonts_scripts() {
    wp_enqueue_style( 'pix_theme_fonts', configurator_theme_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'configurator_theme_fonts_scripts' );

//Seperate font weight & font Style

if( ! function_exists('configurator_font_variant') ) {
	function configurator_font_variant($fv = ''){

	    //Font Style
	    if(stristr($fv, 'italic') !== FALSE){
	        $fs = 'italic';
	    }else{
	        $fs = 'normal';
	    }

	    //Font Weight
	    $fw = substr($fv, 0, 3);
	    if($fw === FALSE || $fw == 'reg' || $fw == 'ita'){
	        $fw = '400';
	    }

	    return array($fs, $fw);
	}
}

//Page Title Bar
if( ! function_exists( 'configurator_sub_banner' ) ) {

	function configurator_sub_banner( $values ) {

		if( !empty( $values ) ) {
			extract( $values );
		}

		// Empty assignment
		$output = $social_share = '';

		if ( ( ! is_front_page() || is_home() ) && 'show' === $title_bar ) {

			$header_layout = 'sub-'.$header_layout;

			$header_transparency = ( 'show' === $header_transparency ) ? 'header-trans' : '';

			// get page id
			if( configurator_is_shop() || configurator_is_product_category() || configurator_is_product_tag() ) { 
				$page_id = wc_get_page_id( 'shop' ); 
			}
			else if( is_home() || is_archive() || is_search() || is_404() ) {
				$page_id = get_option('page_for_posts');
			}
			else {
				$page_id = get_the_ID();
			}

			// Build social share
			if( !empty( $share ) ) {

				$url = get_permalink( $page_id );

				$social_share .= function_exists( 'configurator_banner_share' ) ? configurator_banner_share( $share, $url ) : '';
			}

			$output .= '<div id="sub-header" class="clear medium align-center '. esc_attr( $header_layout .' '. $header_transparency .' '. $title_bar_align . ' ' .$title_bar_method . ' clearfix' ) .'" >';

				$output .= '<div class="container">';
					$output .= '<div id="banner">';
						$output .= '<div class="sub-header-inner">';

							if( 'show' == $go_back ) {
								$output .= '<div class="go-back">';
										$output .= '<p><a href="#">' . esc_html__( 'Go Back', 'configurator' ) . '</a></p>';
								$output .= '</div>';
							} // .go-back

							if( 'breadcrumbs' === $on_right_side || 'share' == $on_right_side ) {

								$output .= '<nav class="pix-breadcrumbs">';						

									if( 'breadcrumbs' === $on_right_side ) {
										$breadcrumbs_blog = get_theme_mod( 'blog_page_title', esc_html__('Blog', 'configurator' ) );

										if( function_exists( 'configurator_breadcrumbs' ) ) {

											if ( !is_home() ) {

												$output .= configurator_breadcrumbs();
												
											} elseif ( is_home() ) {
												$output .= '<ul class="breadcrumb"><li><a href="' . esc_url(home_url( '/' ) ) . '">'. esc_html__( 'Home', 'configurator' ) .'</a></li><li> <span class="current"> '. esc_html( $breadcrumbs_blog ) .'</span></li></ul>';
											}
										}
									}
									else if( 'share' == $on_right_side ) {
										$output .= '<p class="share-title">'. $on_right_side_title .'</p>';
										if( !empty( $social_share ) ) {
						                    $output .= '<div class="social-share">'. $social_share .'</div>';
						                }
									}

								$output .= '</nav>'; // .pix-breadcrumbs
							}

							if( 'show' == $show_title || !empty( $sub_title ) || 'show' == $social_share ) {
								$output .= '<div class="banner-header">';
									if( 'show' == $show_title ) {
										$output .= '<h2>' . esc_html( $title ) . '</h2>';
										if( !empty( $sub_title ) ) {
											$output .= '<p class="sub-title">' . esc_html( $sub_title ) . '</p>';
										}

									}

									if( is_singular( 'post' ) ) {
										$meta = get_theme_mod( 'single_meta_sort', array( 'author', 'comment', 'date' ) );
										
										$output .= configurator_meta( $meta ); // author, comment, date
									}

									if( 'show' == $share_below_title && !empty( $social_share ) ) {
					                    $output .= '<div class="social-share">'. $social_share .'</div>';
					                }
								$output .= '</div>'; // header
							}

						$output .= '</div>'; // .sub-header-inner
					$output .= '</div>'; // #banner
				$output .= '</div>'; // .container
			$output .= '</div>'; // #sub-header

		}

		return $output;

	}

}

//Breadcrumbs
if( ! function_exists( 'configurator_breadcrumbs' ) ) {

	function configurator_breadcrumbs() {

		// Empty assignment
		$output = '';

		if( configurator_is_shop() || configurator_is_product() || configurator_is_product_category() || configurator_is_product_tag() ) {
			ob_start();
			woocommerce_breadcrumb();
			$output .= ob_get_clean();
		}

		$show_on_home = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter    = ''; // delimiter between crumbs
		$home         = esc_html__( 'Home', 'configurator' ); // text for the 'Home' link
		$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before       = '<span class="current">'; // tag before the current crumb
		$after        = '</span>'; // tag after the current crumb

		global $post;
		$homeLink = home_url( '/' );

		if ( is_home() || is_front_page() ) {

			if ( $show_on_home == 1 ) {
				$output .= '<ul class="breadcrumb"><li><a href="' . esc_url( $homeLink ) . '">' . ucwords( $home ) . '</a></li></ul>';
			}

		}
		else if( !configurator_is_shop() && !configurator_is_product() && !configurator_is_product_category() && !configurator_is_product_tag() ) {

			$output .= '<ul class="breadcrumb" itemprop="breadcrumb"><li><a href="' . esc_url( $homeLink ) . '">' . ucwords( $home ) . '</a> ' . $delimiter . '</li>';

				if ( is_category() ) {
					global $wp_query;
					$cat_obj = $wp_query->get_queried_object(); 
					$this_cat = $cat_obj->term_id;
					$this_cat = get_category( $this_cat );
					$parent_cat = get_category( $this_cat->parent );
					if ( $this_cat->parent != 0 ) {
						$output .= ( get_category_parents( $parent_cat, TRUE, ' ' . $delimiter . ' ' ) );
					}
					$output .= '<li>' .$before . esc_html( single_cat_title( '', false ) ) . $after.'</li>';

				}
				else if ( is_search() ) {
					$output .= '<li>' . $before . esc_html( get_search_query() ) . $after .'</li>';

				}
				else if ( is_day() ) {
					$output .= '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . $delimiter . '</li>';
					$output .= '<li><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time('F') ) . '</a> ' . $delimiter . '</li>';
					$output .= '<li>' . $before . esc_html( get_the_time('d') ) . $after . '</li>';

				}
				else if ( is_month() ) {
					$output .= '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . '</li>';
					$output .= '<li>' . $before . esc_html( get_the_time('F') ) . $after . '</li>';

				}
				else if ( is_year() ) {
					$output .= '<li>' . $before . esc_html( get_the_time('Y') ) . $after . '</li>';

				}
				else if ( is_single() && !is_attachment() ) {
					if ( get_post_type() != 'post' ) {
						$post_type = get_post_type_object(get_post_type());
						$slug = $post_type->rewrite;
						if ( $show_current == 1 ){
							$output .= '<li> ' . $before . ucwords( esc_html( get_the_title() ) ) . $after . '</li>';
						}
					}
					else {
						$cat = get_the_category(); $cat = $cat[0];
						$cats = get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
						if ( $show_current == 0 ){
							$cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
							$output .= '<li>'. $before . esc_html( $cats ) . $after . '</li>';
						}
						if ( $show_current == 1 ){
							$output .= '<li>'. $before . ucwords( configurator_shorten_text( esc_html( get_the_title() ), 20 ) ) . $after . '</li>';
						}
					}

				}
				else if ( !is_single() && !is_page() && get_post_type() != 'post' && !configurator_is_shop() && !is_404() ) {

					$post_type = get_post_type_object( get_post_type() );
					$output .= '<li>'. $before . esc_html( ucwords( $post_type->labels->singular_name ) ) . $after.'</li>';

				}
				else if ( is_attachment() ) {
					$parent = get_post( $post->post_parent );
					$cat = get_the_category( $parent->ID ); 
					if(!empty($cat)){
						$cat = $cat[0];
						$output .= get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
					}
					$output .= '<li><a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( ucwords( $parent->post_title ) ) . '</a></li>';
					if ( $show_current == 1 ) {
						$output .= '<li>' . $delimiter . ' ' . $before . ucwords( esc_html( get_the_title() ) ) . $after . '</li>';
					}

				} 
				elseif ( is_page() && !$post->post_parent ) {
					if ( $show_current == 1 ) {
						$output .= '<li>' . $before . ucwords( esc_html( get_the_title() ) ) . $after .'</li>';
					}

				}
				elseif ( is_page() && $post->post_parent ) {
					$parent_id  = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page( $parent_id );
						$breadcrumbs[] = '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( ucwords( get_the_title( $page->ID ) ) ) . '</a></li>';
						$parent_id  = $page->post_parent;
					}
					$breadcrumbs = array_reverse( $breadcrumbs );
					for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
						$output .= $breadcrumbs[$i]; //escaped Properly on five lines before from here
						if ( $i != count( $breadcrumbs ) -1 ) {
							$output .= ' ' . $delimiter . ' ';
						}
					}
					if ( $show_current == 1 ) {
						$output .= '<li>' . $delimiter . ' ' . $before . ucwords( esc_html(get_the_title() ) ) . $after . '</li>';
					}

				}
				elseif ( is_tag() ) {
					$output .= '<li>' . $before . esc_html__( 'Posts Tag: ', 'configurator' ) . esc_html( ucwords(single_tag_title('', false) . '') ) . $after . '</li>';

				}
				elseif ( is_author() ) {
					global $author;
					$userdata = get_userdata($author);
					$output .= '<li>' .$before . esc_html__( 'Posted By: ', 'configurator' ) . esc_html( ucwords($userdata->display_name ) ) . $after .'</li>';

				}
				elseif ( is_404() ) {
					$output .= '<li>' .$before . esc_html__('Error 404', 'configurator' ) . $after .'</li>';
				}

				if ( get_query_var( 'paged' ) ) {
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						$output .= ' (';
							$output .= esc_html__(' - Page', 'configurator' ) . ' ' . get_query_var( 'paged' );
						$output .= ')';
					}
				}

			$output .= '</ul>';

		}

		return $output;
		
	}

}

/* WMPL */
function configurator_languages_list(){
	if( class_exists( 'SitePress' ) ){
	
		global $smof_data;

		$show_lang_sel = isset($smof_data['show_lang_sel'])? $smof_data['show_lang_sel'] : 'no';

		if( 'yes' === $show_lang_sel ){
			$lang_display_style = isset($smof_data['wpml_lang_style'])? $smof_data['wpml_lang_style'] : 'normal'; //normal, dropdown
			$lang_list_style = isset($smof_data['language_style'])? $smof_data['language_style'] : 'lang_code'; // lang_code (en / fr / ta), lang_name (english, tamil, french), flag, flag_with_name
			$skip_missing_lang = isset($smof_data['skip_missing_lang'])? $smof_data['skip_missing_lang'] : 'yes';

			if( 'yes' === $skip_missing_lang ) {
				$skip_missing_lang = '1';
			} else {
				$skip_missing_lang = '0';
			}

			$languages = icl_get_languages('skip_missing='.$skip_missing_lang.'&orderby=custom');

			$lang_count = count($languages);
			$count = 1;

			if(1 < $lang_count){
				$trans_status = esc_html__('translated', 'configurator' );			
			}else{
				$trans_status = esc_html__('not-translated', 'configurator' );
			}

			if(!empty($languages)){
				echo '<div id="lang-list" class="lang-'. $lang_display_style .' '. $lang_list_style .' '. $trans_status .'" >';
				if($lang_display_style == 'dropdown'){
						//Check If Drop-down Add Current
						if($lang_display_style == 'dropdown'){

							echo '<div id="lang-dropdown-btn">';
								foreach($languages as $l){
									if($l['active']){
										if($lang_list_style == 'lang_code'){
											echo esc_html( $l['language_code'] );
										}elseif ($lang_list_style == 'lang_name') {
											echo icl_disp_language( $l['native_name'], $l['translated_name'] );
										}elseif ($lang_list_style == 'flag') {
											if($l['country_flag_url']){
												echo '<img src="'. esc_url( $l['country_flag_url'] ) .'" height="12" alt="'. esc_attr( $l['language_code'] ).'" width="18" />';
											}
										}else{
											if($l['country_flag_url']){
												echo '<img src="'. esc_url( $l['country_flag_url'] ) .'" height="12" alt="'.esc_attr( $l['language_code'] ) .'" width="18" />';
												echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
											}
										}
										break;
									}
								}
							if(1 < $lang_count){	
								echo '<span class="pixicon-arrow-angle-down"></span></div>';
							}
							else{
								echo '<span class="already-liked">'. esc_html__('Not Translated','configurator' ) .'</span></div>';
							}
						}

					echo '<div class="lang-dropdown-inner">';
				}

				foreach($languages as $l){

					if($l['active']){
						$active_class = ' class="active"';
					}else{
						$active_class = '';
					}
					// lang_code(en / fr / ta)
					if($lang_list_style == 'lang_code'){

						echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
						echo esc_html( $l['language_code'] );
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}

					}
					 // lang_name (english, tamil, french)
					elseif ($lang_list_style == 'lang_name') {

						echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
						echo icl_disp_language($l['native_name'], $l['translated_name']);
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}
					}
					// display flag
					elseif ($lang_list_style == 'flag'){

						if($l['country_flag_url']){
							echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
							echo '<img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'. esc_attr( $l['language_code'] ) .'" width="18" />';
							echo '</a>';
						}
					}
					// flag with name
					elseif($lang_list_style == 'flag_with_name'){
						
						if($l['country_flag_url']){
							echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
							echo '<img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'. esc_attr( $l['language_code'] ) .'" width="18" />';
							echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
							echo '</a>';
						}
				
					}
					$count++;
				}

				if($lang_display_style == 'dropdown'){
					echo '</div>';
				}
				echo '</div>';
			}
		}
	}
}	

function configurator_get_page_title() {

	if ( !is_single() && !is_page() && get_post_type() != 'post' && !configurator_is_shop() && !is_404() && !is_search() ) {

		$post_type = get_post_type_object( get_post_type() );
		$page_title = esc_html( ucwords( $post_type->labels->singular_name ) );

	}
	elseif ( is_home() ) {
		$page_title = get_theme_mod( 'blog_page_title', esc_html__('Blog', 'configurator' ) );
	}
	elseif ( is_category() ) {
		$page_title = esc_html__('Posts Categorized:', 'configurator' ) . ' ' . single_cat_title( $prefix = '', $display = false );
	}
	elseif ( is_tag() ) { 
		$page_title = esc_html__('Posts Tagged:', 'configurator' ) . ' ' . single_tag_title( $prefix = '', $display = false );
	}
	elseif ( is_author() ) { 
		global $post;
		$author_id = $post->post_author;

		$page_title = esc_html__('Posts By:', 'configurator' ) . ' ' . get_the_author_meta('display_name', $author_id);

	}
	elseif ( is_day() ) { 
		$page_title = esc_html__('Daily Archives:', 'configurator' ) . ' ' . get_the_time('l, F j, Y');
	}
	elseif ( is_month() ) {  
		$page_title = esc_html__('Monthly Archives:', 'configurator' ) . ' ' . get_the_time('F Y');
	}
	elseif ( is_year() ) {  
		$page_title = esc_html__('Posts Categorized:', 'configurator' ) . ' ' . get_the_time('Y');
	}
	elseif ( is_search() ) {  
		$page_title = esc_html__('Search Result: ', 'configurator' ) .get_search_query();
	}
	elseif ( is_404() ) {  
		$page_title = esc_html__('404 Error', 'configurator' );
	}
	elseif ( configurator_is_shop() ) { 
		$shop_page_id = wc_get_page_id( 'shop' ); 
		$page_title = get_the_title( $shop_page_id );
	}
	elseif ( configurator_is_product_category() ) {
		$page_title = single_cat_title( '', false );
	}
	else {  
		$page_title = esc_html( get_the_title() );
	}

	return $page_title;
}

//Sidebar
if( !function_exists( 'configurator_sidebar' ) ){

    function configurator_sidebar( $sidebar_name , $default ){
        echo '<div id="aside" class="sidebar col-md-3">';
            if ( is_active_sidebar( $sidebar_name ) ){
                dynamic_sidebar( $sidebar_name );
            }
            elseif( $sidebar_name == 0 ){

                if ( is_active_sidebar( $default ) ){
                    dynamic_sidebar( $default );
                }
                else{
                    echo '<p class="sidebar-info">'. esc_html__('Please active sidebar widget or disable it from theme option.', 'configurator' ).'</p>';
                }
            }
        echo '</div>';

    }
}

/*
 * Function: Feature Thumbnail
 * Version : 1.2
 */

if( ! function_exists( 'configurator_featured_thumbnail' ) ) {

    function configurator_featured_thumbnail( $width, $height, $only_src, $show_placeholder, $force_lazy_load_off ) {

        $output = $alt = '';

        $lazy_load = get_theme_mod( 'lazy_load', 1 );

        if( $force_lazy_load_off ) { // if it's turned on, it force the lazy load to turned off
            $lazy_load = 0;
        }

        $image_thumb_url = '';

        if( has_post_thumbnail() ){

            $image_id = get_post_thumbnail_id();

            $image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' );

        	$alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
        }

        if( !is_int( $width ) ) {
            $width = 1920;
        } 

        if( !is_int( $height ) ) {
            $height = 1020;
        }

        if( ! empty( $image_thumb_url ) ) {
            $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

            if( $only_src ) {
                if($img){
                    $output = $img;
                }
                else{
                	$url = get_the_post_thumbnail( get_the_ID(), 'full' );
                    $output = $image_thumb_url[0];
                }
            }
            else {

                $img_url = ( $img ) ? $img : $image_thumb_url[0];

                if( $img ) {
                    $img_url = $img;
                } else {
                    $img_url = $image_thumb_url[0];
                    $width = $image_thumb_url[1];
                    $height = $image_thumb_url[2];
                }

                if ( $lazy_load ) {
                    $placeholder = get_template_directory_uri(). '/_img/img-placeholder.png';
                    $output = '<img class="amz-lazy" src="'. esc_url( $placeholder ) .'" data-original="' . esc_url( $img_url ) . '" alt="'. esc_attr( $alt ) .'">';
                } else {
                    
                    $output = '<img src="' . esc_url( $img_url ) . '" alt="'. esc_attr( $alt ) .'">';
                }

            }
        }
        else if( empty( $image_thumb_url ) && $show_placeholder ) {
            $protocol = is_ssl() ? 'https' : 'http';

            if( $only_src ) {
                $output = $protocol.'://placehold.it/'.$width.'x'.$height;
            }
            else {
                $output = '<img src="'.esc_url( $protocol.'://placehold.it/'.$width.'x'.$height ) .'" alt="'. esc_attr__( 'Placeholder', 'configurator' ) .'">';
            }
        }

        return $output;                  

    }
}

/*
 * Function : Get Metabox value
 * Version  : 1.1
 * Required : SMOF Theme Option
 * Desc  : It's only for get values from metabox
 */
if(!function_exists('configurator_get_meta_value')){

	function configurator_get_meta_value( $id, $meta_key, $meta_default = '', $themeoption_key = '', $themeoption_default = '' ) {

		$value = ( null != get_post_meta( $id, $meta_key, true ) ) ? get_post_meta( $id, $meta_key, true ) : $meta_default;

		if( ( 'default' == $value || '' == $value ) && !empty( $themeoption_key ) ) {
			$value = get_theme_mod( $themeoption_key, $themeoption_default );
		}

		return $value;
	}
}

/*
 * Function : Compare Option value
 * Version  : 1.0
 */
if( !function_exists( 'configurator_get_option_value' ) ) {

	function configurator_get_option_value( $option_key='', $option_default = '', $compare_with_option_key = '', $compare_with_option_default = '' ) {

		$value = ( isset( $option_key ) && !empty( $option_key ) ) ? get_theme_mod( $option_key, $option_default ) : '';

		if( ( 'default' == $value || '' == $value ) && !empty( $compare_with_option_key ) ) {
			$value = get_theme_mod( $compare_with_option_key, $compare_with_option_default );
		}

		return $value;
	}
}



function configurator_title_tag( $title_tag ){
	$title_tag_array = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

	if( in_array( $title_tag, $title_tag_array ) ) {
		return $title_tag;
	}
	else {
		return 'h2';
	}
}

//configurator_shorten_text
function configurator_shorten_text($text , $no_of__limit)
{
	$chars_limit = $no_of__limit;
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	if ($chars_text > $chars_limit)
	{

		$text = $text."...";

	}
	return $text;
}

/*
 * Function : Get Image Src from Media Object
 * Version  : 1.0
 * Required : Aqua Resize
 * Desc  : It's only for get image from metabox
 */

if( ! function_exists( 'configurator_get_image_by_id' ) ) {

    function configurator_get_image_by_id( $width, $height, $image_id, $only_src = true, $placeholder = false, $force_lazy_load_off = true ) {

    	//Lazy load
		global $smof_data;
    	$lazy_load = isset( $smof_data['lazy_load'] ) ? $smof_data['lazy_load'] : 1;

    	if( $force_lazy_load_off ) { // if it's turned on, it force the lazy load to turned off
    		$lazy_load = 0;
    	}

        $image_thumb_url = '';

        if( !empty( $image_id ) ) {

			$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' ); // full iamge URL
        }

        if( !is_int( $width ) ) {
            $width = 1920;
        } 

        if( !is_int( $height ) ) {
            $height = 1020;
        }

        $output = '';

        $alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

        if( ! empty( $image_thumb_url ) ) {
            $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

            if( $only_src ) {
                if($img){
                    $output = $img;
                }
                else{
                    $output = $image_thumb_url[0];
                }
            }
            else {

            	$img_url = ( $img ) ? $img : $image_thumb_url[0];

            	if( $img ) {
            		$img_url = $img;
            	} else {
            		$img_url = $image_thumb_url[0];
            		$width = $image_thumb_url[1];
            		$height = $image_thumb_url[2];
            	}

            	if ( $lazy_load ) {
            		$placeholder = get_template_directory_uri(). '/_img/img-placeholder.png';
            		$output = '<img class="amz-lazy" src="'. $placeholder .'" data-original="' . esc_url( $img_url ) . '" alt="'. esc_attr( $alt ) .'">';
            	} else {
            		
                	$output = '<img src="' . esc_url( $img_url ) . '" alt="'. esc_attr( $alt ) .'">';
            	}

            }
        }
        else if( empty( $image_thumb_url ) && $placeholder ) {
            $protocol = is_ssl() ? 'https' : 'http';

            if( $only_src ) {
                $output = $protocol.'://placehold.it/'.$width.'x'.$height;
            }
            else {
                $output = '<img src="'.$protocol.'://placehold.it/'.$width.'x'.$height.'" alt="'. esc_attr__( 'Placeholder', 'configurator' ) .'" >';
            }
        }

        return $output;                  

    }
}

// Get wishlist Cookie
//$wishlist = ( isset( $smof_data['shop_wishlist'] ) && $smof_data['shop_wishlist'] == 1 ) ? 1 : 0;

//if ( $wishlist ) {
	if ( ! function_exists( 'amz_get_cookie' ) ) {
		function amz_get_cookie( ){
			$GLOBALS['amz_wishlist_items'] = ( isset( $_COOKIE['amz-wishlist-items'] ) ) ?  json_decode( str_replace( '\"', '"', $_COOKIE['amz-wishlist-items'] ), true ) : array();
			$GLOBALS['amz_wishlist_items'] = array_values( $GLOBALS['amz_wishlist_items'] );
		}
		add_action( 'wp_head', 'amz_get_cookie' );
	}
//}

//Get saved dynamic css value
if( ! function_exists('configurator_dynamic_css_option') ) {

	function configurator_dynamic_css_option( $key, $default ) {

		$data = $GLOBALS["amz_option_data"];

		return isset( $data[$key] ) ? $data[$key] : $default;

	}

}

//Get saved dynamic css value
if( ! function_exists('configurator_dynamic_css_option_compare') ) {

	function configurator_dynamic_css_option_compare( $option_key='', $option_default = '', $compare_with_option_key = '', $compare_with_option_default = '' ) {

		$data = $GLOBALS["amz_option_data"];

		$value = ( isset( $data[$option_key] ) && !empty( $data[$option_key] ) ) ? $data[$option_key] : $option_default;

		if( ( 'default' == $value || '' == $value ) && !empty( $compare_with_option_key ) ) {
			$value = isset( $data[$compare_with_option_key] ) ? $data[$compare_with_option_key] : $compare_with_option_default;
		}

		return $value;

	}

}

//Get saved themeoption array value
if(!function_exists('configurator_get_prefix')){

	function configurator_get_prefix() {

		if( is_singular( 'page' ) ) {
			$prefix = 'page_';
		}
		elseif ( is_singular( 'product' ) ) {
			$prefix = 'single_product_';
		}
		elseif ( is_singular( 'post' ) ) {
			$prefix = 'single_';
		}
		elseif( is_home() || is_front_page() ) {
			$prefix = 'blog_';
		}
		elseif ( configurator_is_shop() ) {
			$prefix = 'shop_';
		}
		elseif ( is_archive() ) {
			$prefix = 'archives_';
		}
		elseif ( is_search() ) {
			$prefix = 'search_';
		}
		elseif ( is_404() ) {
			$prefix = '404_';
		}
		else {
			$prefix = 'page_';
		}

		return $prefix;
	}
}

if( !function_exists( 'configurator_pagination' ) ) {

	// Return pagination style
    function configurator_pagination( $args = array(), $values = array() ) {

        //Empty assignment
        $output = '';      

        // Set max number of pages
        if( $args == '' ) {
            global $wp_query;
            $max_num_pages = $wp_query->max_num_pages;
            if ( $max_num_pages <= 1 )
                return;
        }
        else {
            // Assign and call query
            $q = new WP_Query( $args );
            $max_num_pages = $q->max_num_pages;
            if ( $max_num_pages <= 1 )
                return;
        } 

        // Set page number
        if( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        }
        elseif( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        }
        else {
            $paged = 1;
        }

        // Add max number of pages to the values array
        $values['max']   = $max_num_pages;
        $values['prefix'] = configurator_get_prefix(); 

        if( 'number' == $values['style']  ) {

            $bignum = 999999999; 

            $base = str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) );
        
            $pagination = paginate_links( array(
                'base'         => $base,
                'format'       => '',
                'current'      => max( 1, $paged ),
                'total'        => $max_num_pages,
                'prev_text'    => '&larr;',
                'next_text'    => '&rarr;',
                'type'         => 'list',
                'end_size'     => 3,
                'mid_size'     => 3
            ) );

            $output .= '<nav class="pagination clearfix">';
                $output .= $pagination;
            $output .= '</nav>';

        }
        else {
            if( get_next_posts_link() || get_previous_posts_link() ) {
                $output .= '<nav class="wp-prev-next ">
                    <ul class="clearfix">';
                    if( get_next_posts_link() ) {
                        $output .= '<li class="prev-link">'. get_next_posts_link( __( '&laquo; Older Entries', 'configurator' ) ) .'</li>';
                    }
                    if( get_previous_posts_link() ) {
                        $output .= '<li class="next-link">'. get_previous_posts_link( __( 'Newer Entries &raquo;', 'configurator' ) ) .'</li>';
                    }
                    $output .= '</ul>
                </nav>';
            }
        }

        return $output;
    }
}

function configurator_is_shop () {
	if ( function_exists('is_shop') ){
		return is_shop();
	} else {
		return false;
	}
}

function configurator_is_product_category () {
	if ( function_exists('is_product_category') ){
		return is_product_category();
	} else {
		return false;
	}
}

function configurator_is_product_tag () {
	if ( function_exists('is_product_tag') ){
		return is_product_tag();
	} else {
		return false;
	}
}

function configurator_is_product() {
	if ( function_exists('is_product') ){
		return is_product();
	} else {
		return false;
	}
}

if( !function_exists( 'configurator_get_registered_sidebars' ) ) {
	function configurator_get_registered_sidebars( $hide_sidebars = array() ) {
		global $wp_registered_sidebars;
		
		$sidebars = $wp_registered_sidebars;
		$new_sidebars = array( '0' => esc_attr__( 'Default', 'configurator' ) );
		
		foreach ( $sidebars as $sidebar ) {

			if ( ! in_array( $sidebar['id'], $hide_sidebars ) ) {
				$new_sidebars[$sidebar['id']] = $sidebar['name'];
			}
			
		}

		return $new_sidebars;
	}
}