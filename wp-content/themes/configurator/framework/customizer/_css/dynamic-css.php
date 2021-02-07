<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/*
 * Styling Options
 */

// Styling Options: General
$custom_general_styles = configurator_dynamic_css_option( 'custom_general_styles', 'no' );

if( 'yes' == $custom_general_styles ) {

	// Body Background
	$body_bg = configurator_dynamic_css_option( 'body_bg', '' );

	if( !empty( $body_bg ) ) {
		echo 'body {
			background:	'. stripslashes( wp_strip_all_tags( $body_bg ) ) .';
		}';
	}

	// Primary Color
	$primary_color = configurator_dynamic_css_option( 'primary_color', '' );

	if( !empty( $primary_color ) ) {
		echo 'a, blockquote:before, blockquote:after, .main-nav li a:hover, .main-nav .sub-menu li a:hover, .cart_list.product_list_widget .quantity .price-mini, .product-content .price, .product-content .woocommerce-Price-amount, .single-product-price .total-text, .summary .single-product-price .price ins, .woocommerce-tabs .tabs li.active a, .woocommerce .cart-form .product-price .woocommerce-Price-amount, .woocommerce-checkout-review-order-table tfoot .order-total td, .icon-hover-inner span.config-hover-price, .sidebar #wp-calendar #today, .quote .content:after, .quote .content:before, #style-normal .entry-content .title a:hover, #style-normal .link-btn a, .widget li a:hover, #footer .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover, .widget .product_list_widget ins, .pix-breadcrumbs li a:hover, .product_list_widget .amount, #wp-calendar td a, #style-list .entry-content .title a:hover, #style-normal_split .entry-content .title a:hover, #style-normal_split .entry-content .title a:hover, .go-back a:hover, .comment_author_details time a:hover, .comment_author_details .comment-reply-link:hover, .comment_author_details .comment-edit-link:hover, .logged-in-as a:hover, .cart_list.product_list_widget li a:hover, .cart_list.product_list_widget li a.remove:hover, .cart_list.product_list_widget li a.remove:hover span, .page-numbers li a:hover, .product-content .title a:hover, .woocommerce .cart-form .product-name a:hover, .woocommerce .cart-form .product-name a:hover.remove i, .page-numbers li .current, .btn.btn-outline.btn-primary, .button.btn.btn-outline.btn-primary, .pix-cart .buttons .button:hover, .widget_shopping_cart_content .buttons .button:hover, #style-list .link-btn a, #style-normal .link-btn a, #style-normal_split .link-btn a, span.wpcf7-not-valid-tip, .main-nav .menu li.current-menu-item > a, .overlay .main-nav > .menu > li.current-menu-item > a, .stuck .overlay .main-nav > .menu > li.current-menu-item > a {
			color:	'. stripslashes( wp_strip_all_tags( $primary_color ) ) .';
		}';

		echo '.mobile-menu-nav .current-menu-item > a, .mobile-menu-nav .menu-item-has-children > .pix-dropdown-arrow:hover:after, .mobile-menu-nav.mobile-menu-dark .menu-item-has-children > .pix-dropdown-arrow:hover:after {
			color:	'. stripslashes( wp_strip_all_tags( $primary_color ) ) .' !important;
		}';

		// Border Color
		echo '.widget .price_slider_wrapper .price_slider_amount .button, .btn.btn-outline.btn-primary, .button.btn.btn-primary.btn-outline, .wpcf7-form-control-wrap input.wpcf7-not-valid {
			border-color:	'. stripslashes( wp_strip_all_tags( $primary_color ) ) .';
		}';

		// Border Bottom
		echo 'abbr[title],abbr, acronym, .main-nav > ul > li.current-menu-item > a:after {
			border-bottom-color: '. stripslashes( wp_strip_all_tags( $primary_color ) ) .';
		}';

		echo '.btn-outline .shop-loading:before {
			border-top-color:	'. stripslashes( wp_strip_all_tags( $primary_color ) ) .';
		}';

		// Background Color
		echo 'mark, ins, .onsale, .woocommerce-MyAccount-navigation li.is-active, .woocommerce-message, .widget .price_slider, .widget .price_slider .ui-slider-handle, .widget .price_slider_wrapper .price_slider_amount .button,.widget .tagcloud a, .added_to_cart, .added_to_cart:hover, .comment-form .form-submit input#submit, .btn.btn-solid.btn-primary, .button.btn.btn-solid.btn-primary, .slider-cover .owl-dots .owl-dot.active, button, .post-password-form input[type="submit"], .pwc-configurator-view .owl-dot.active {
			background: '. stripslashes( wp_strip_all_tags( $primary_color ) ) .';
			color: #fff;
		}';

	}

	// Selection Text Color
	$selection_text_color = configurator_dynamic_css_option( 'selection_text_color', '' );

	if( !empty( $selection_text_color ) ) {
		echo '::selection{
			color: '. stripslashes( wp_strip_all_tags( $selection_text_color ) ) .';
		}';

		echo '::-moz-selection {
			color: '. stripslashes( wp_strip_all_tags( $selection_text_color ) ) .';
		}';
	}

	// Selection Background Color
	$selection_bg_color = configurator_dynamic_css_option( 'selection_bg_color', '' );

	if( !empty( $selection_bg_color ) ) {
		echo '::selection {
			background:	'. stripslashes( wp_strip_all_tags( $selection_bg_color ) ) .';
		}';

		echo '::-moz-selection {
			background:	'. stripslashes( wp_strip_all_tags( $selection_bg_color ) ) .';
		}';
	}

	// Input Color
	$input_color = configurator_dynamic_css_option( 'input_color', '' );

	if( !empty( $input_color ) ) {
		echo 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"],input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus {
			color:	'. stripslashes( wp_strip_all_tags( $input_color ) ) .';
		}';
	}

	// Placeholder Color
	$placeholder_color = configurator_dynamic_css_option( 'placeholder_color', '' );

	if( !empty( $placeholder_color ) ) {
		echo '#main-wrapper ::-webkit-input-placeholder{
			color:	'. stripslashes( wp_strip_all_tags( $placeholder_color ) ) .';
		}';

		echo '#main-wrapper ::-moz-placeholder {
			color:	'. stripslashes( wp_strip_all_tags( $placeholder_color ) ) .';
		}';

		echo '#main-wrapper ::-ms-input-placeholder{
			color:	'. stripslashes( wp_strip_all_tags( $placeholder_color ) ) .';
		}';
		
	}

}

// Content Wrapper Top and Bottom Padding default is 100px
$content_margin_top = configurator_dynamic_css_option( 'content_margin_top', '' );
$content_margin_bottom = configurator_dynamic_css_option( 'content_margin_bottom', '' );

if( !empty( $content_margin_top ) && !empty( $content_margin_bottom ) ) {
	echo '#content {
		margin:	'. stripslashes( wp_strip_all_tags( $content_margin_top ) ) .'px 0 '. stripslashes( wp_strip_all_tags( $content_margin_bottom ) ) .'px;
	}';

	echo '.kingcomposer #content {
		margin-top: 0;
		margin-bottom: 0;
	}';

	echo '.single-configurator-enabled.single-product #content {
		margin: 0 0 0;
	}';
}

// KC Top and Bottom Padding default is 0
$kc_padding_top = configurator_dynamic_css_option( 'kc_padding_top', '' );
$kc_padding_bottom = configurator_dynamic_css_option( 'kc_padding_bottom', '' );

if( !empty( $kc_padding_top ) && !empty( $kc_padding_bottom ) ) {
	echo '.kc_row {
		padding-top: '. stripslashes( wp_strip_all_tags( $kc_padding_top ) ) .'px;
		padding-bottom: '. stripslashes( wp_strip_all_tags( $kc_padding_bottom ) ) .'px;
	}';
}

// Styling Options: Header
$custom_header_styles = configurator_dynamic_css_option( 'custom_header_styles', 'no' );

if( 'yes' == $custom_header_styles ) {

	// Main Header Height
	$main_header_height = configurator_dynamic_css_option( 'main_header_height', '' );

	if( !empty( $main_header_height ) ) {
		echo '.header-wrap .header {
			height:	'. stripslashes( wp_strip_all_tags( $main_header_height ) ) .';
		}';

		echo 'div#logo, .main-nav {
			line-height: '. stripslashes( wp_strip_all_tags( $main_header_height ) ) .';
		}';

		echo '.header .pix-cart {
			margin-top: calc( 48px + ( '. stripslashes( wp_strip_all_tags( $main_header_height ) ) .' - 135px ) / 2  );
		}';

		echo '.woo-cart-dropdown {
			top: 70px;
		}';

		echo '.header .search-btn {
			 margin-top: calc( ( '. stripslashes( wp_strip_all_tags( $main_header_height ) ) .' / 2 ) - 20px );
		}';

		echo '.header .wishlist {
			 margin-top: calc( ( '. stripslashes( wp_strip_all_tags( $main_header_height ) ) .' / 2 ) - 13px );
		}';

		echo '@media (max-width: 1024px) {
			.pix-menu {
				height:	'. stripslashes( wp_strip_all_tags( $main_header_height ) ) .';
			}
		}';

	}

	// Main Header Background Color
	$main_header_background_color = configurator_dynamic_css_option( 'main_header_background_color', '' );

	if( !empty( $main_header_background_color ) ) {
		echo '.header-wrap {
			background:	'. stripslashes( wp_strip_all_tags( $main_header_background_color ) ) .';
		}';
	}

	// Main Header icon Color
	$main_header_iconcolor = configurator_dynamic_css_option( 'main_header_iconcolor', '' );

	if( !empty( $main_header_iconcolor ) ) {
		echo '.header .search-btn .search-icon, .header .pix-cart-icon, .header .ct-heart, .header a.pix-cart-contents {
			color:	'. stripslashes( wp_strip_all_tags( $main_header_iconcolor ) ) .';
		}';
	}

	// Main Header Icon Hover Color
	$header_icon_hovercolor = configurator_dynamic_css_option( 'header_icon_hovercolor', '' );

	if( !empty( $header_icon_hovercolor ) ) {
		echo '.header .search-btn .search-icon:hover, .header .pix-cart-contents:hover, .header .pix-cart-contents:hover .pix-cart-icon, .header .wishlist a:hover, .header .wishlist a:hover .ct-heart {
			color:	'. stripslashes( wp_strip_all_tags( $header_icon_hovercolor ) ) .';
		}';
	}

	// Menu Link Color
	$menu_link_color = configurator_dynamic_css_option( 'menu_link_color', '' );

	if( !empty( $menu_link_color ) ) {
		echo '.main-nav > ul > li > a, .main-nav li a {
			color:	'. stripslashes( wp_strip_all_tags( $menu_link_color ) ) .';
		}';
	}

	// Menu Link Hover Color
	$menu_link_hover_color = configurator_dynamic_css_option( 'menu_link_hover_color', '' );

	if( !empty( $menu_link_hover_color ) ) {
		echo '.main-nav > ul > li > a:hover, .main-nav li a:hover {
			color:	'. stripslashes( wp_strip_all_tags( $menu_link_hover_color ) ) .';
		}';
	}

	// Sub Menu Background Color
	$sub_menu_background_color = configurator_dynamic_css_option( 'sub_menu_background_color', '' );

	if( !empty( $sub_menu_background_color ) ) {
		echo '.main-nav .sub-menu {
			background:	'. stripslashes( wp_strip_all_tags( $sub_menu_background_color ) ) .';
		}';
	}

	// Sub Menu Border Color
	$sub_menu_border_color = configurator_dynamic_css_option( 'sub_menu_border_color', '' );

	if( !empty( $sub_menu_border_color ) ) {
		echo '.main-nav .sub-menu {
			border-color:	'. stripslashes( wp_strip_all_tags( $sub_menu_border_color ) ) .';
		}';
	}

	// Sub Menu Link Color
	$sub_menu_link_color = configurator_dynamic_css_option( 'sub_menu_link_color', '' );

	if( !empty( $sub_menu_link_color ) ) {
		echo '.main-nav .sub-menu li a {
			color:	'. stripslashes( wp_strip_all_tags( $sub_menu_link_color ) ) .';
		}';
	}

	// Sub Menu Link Hover Color
	$sub_menu_link_hover_color = configurator_dynamic_css_option( 'sub_menu_link_hover_color', '' );

	if( !empty( $sub_menu_link_hover_color ) ) {
		echo '.main-nav .sub-menu li a:hover {
			color:	'. stripslashes( wp_strip_all_tags( $sub_menu_link_hover_color ) ) .';
		}';
	}

	// Mega Menu Title Color
	$mega_menu_title_color = configurator_dynamic_css_option( 'mega_menu_title_color', '' );

	if( !empty( $mega_menu_title_color ) ) {
		echo '.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover {
			color:	'. stripslashes( wp_strip_all_tags( $mega_menu_title_color ) ) .';
		}';
	}
}

// Styling Options: Footer
$custom_footer_styles = configurator_dynamic_css_option( 'custom_footer_styles', 'no' );

if( 'yes' == $custom_footer_styles ) {

	// Footer Widget Title Color
	$footer_widget_title_color = configurator_dynamic_css_option( 'footer_widget_title_color', '' );

	if( !empty( $footer_widget_title_color ) ) {
		echo '#footer .widget .widgettitle, .footer-dark .widget .widgettitle, #footer.footer-dark .textwidget {
			color:	'. stripslashes( wp_strip_all_tags( $footer_widget_title_color ) ) .';
		}';
	}

	// Footer Widget Text Color
	$footer_widget_text_color = configurator_dynamic_css_option( 'footer_widget_text_color', '' );

	if( !empty( $footer_widget_text_color ) ) {
		echo '#footer .widget li, #footer p, #footer.footer-dark .widget #woocommerce-product-search-field, #footer.footer-dark .widget .product_list_widget ins, #footer.footer-dark .product_list_widget .amount{
			color:	'. stripslashes( wp_strip_all_tags( $footer_widget_text_color ) ) .';
		}';
	}

	// Footer Widget Link Color
	$footer_widget_link_color = configurator_dynamic_css_option( 'footer_widget_link_color', '' );

	if( !empty( $footer_widget_link_color ) ) {
		echo '#footer .widget li a, #footer .widget .widget_shopping_cart_content .buttons .button, .footer-dark .recentpost .content p a, .footer-dark .popularpost .content p a, #footer.footer-dark .widget #recentcomments .comment-author-link, #footer.footer-dark .widget.widget_rss a, #footer.footer-dark .widget .tagcloud a, #footer .widget li a, #footer.footer-dark .widget .cart_list.product_list_widget .quantity, #footer.footer-dark .pix-cart .total, #footer.footer-dark .pix-cart .buttons, #footer.footer-dark .widget_shopping_cart_content .total, #footer.footer-dark .widget_shopping_cart_content .buttons, #footer.footer-dark .widget .widget_shopping_cart_content .buttons .button {
			color:	'. stripslashes( wp_strip_all_tags( $footer_widget_link_color ) ) .';
		}';
	}

	// Footer Widget Link Hover Color
	$footer_widget_link_hover_color = configurator_dynamic_css_option( 'footer_widget_link_hover_color', '' );

	if( !empty( $footer_widget_link_hover_color ) ) {
		echo '#footer .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover, #footer.footer-dark .widget li:hover, #footer.footer-dark .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover{
			color:	'. stripslashes( wp_strip_all_tags( $footer_widget_link_hover_color ) ) .';
		}';
	}

	// Footer Background
	$footer_background_color = configurator_dynamic_css_option( 'footer_background_color', '' );
	$footer_pattern = configurator_dynamic_css_option( 'footer_pattern', '' );
	$footer_bg = configurator_dynamic_css_option( 'footer_bg', '' );
	$footer_background_attachment = configurator_dynamic_css_option( 'footer_background_attachment', 'scroll' );
	$footer_background_size = configurator_dynamic_css_option( 'footer_background_size', 'cover' );
	$footer_background_repeat = configurator_dynamic_css_option( 'footer_background_repeat', 'repeat' );

	if( !empty( $footer_background_color ) || !empty( $footer_pattern ) || !empty( $footer_bg ) ) {
		echo '.footer-dark .pageFooterCon, .footer-bottom, .footer-dark .footer-bottom {
			background:';

				// Footer Background Color
				if( !empty( $footer_background_color ) ) {
					echo ' '. stripslashes( wp_strip_all_tags( $footer_background_color ) ) ;
				}

				// Footer Background Image or Pattern
				if( !empty( $footer_pattern ) && 'none' != $footer_pattern ) {
					echo ' url('. CONFIGURATOR_ADMIN_URI . '/_img/pattern/'. stripslashes( wp_strip_all_tags( $footer_pattern ) ) .'.png )';
				}
				else if( !empty( $footer_bg ) ) {
					echo ' url('. CONFIGURATOR_ADMIN_URI . '/_img/pattern/'. stripslashes( wp_strip_all_tags( $footer_bg ) ) .'.png )';
				}

				// Footer Background Attachment
				if( !empty( $footer_background_attachment ) ) {
					echo ' '. stripslashes( wp_strip_all_tags( $footer_background_attachment ) );
				}

				// Footer Background Repeat
				if( !empty( $footer_background_repeat ) ) {
					echo ' '. stripslashes( wp_strip_all_tags( $footer_background_repeat ) );
				}

			echo ';';

			// Footer Background Size
			if( !empty( $footer_background_size ) ) {
				echo 'background-size: '. stripslashes( wp_strip_all_tags( $footer_background_size ) ) .';';
			}

		echo '}';
	}

	// Copyright Background Color
	$copyright_background_color = configurator_dynamic_css_option( 'copyright_background_color', '' );

	if( !empty( $copyright_background_color ) ) {
		echo '.footer-bottom, .footer-dark .footer-bottom{
			background:	'. stripslashes( wp_strip_all_tags( $copyright_background_color ) ) .';
		}';
	}

	// Copyright Text Color
	$copyright_text_color = configurator_dynamic_css_option( 'copyright_text_color', '' );

	if( !empty( $copyright_text_color ) ) {
		echo '.footer-dark .copyright, #footer p, .footer-dark .footer-bottom {
			color:	'. stripslashes( wp_strip_all_tags( $copyright_text_color ) ) .';
		}';
	}

	// Copyright Link Color
	$copyright_link_color = configurator_dynamic_css_option( 'copyright_link_color', '' );

	if( !empty( $copyright_link_color ) ) {
		echo '.copyright a {
			color:	'. stripslashes( wp_strip_all_tags( $copyright_link_color ) ) .';
		}';
	}

	// Copyright Link Hover Color
	$copyright_link_hover_color = configurator_dynamic_css_option( 'copyright_link_hover_color', '' );

	if( !empty( $copyright_link_hover_color ) ) {
		echo '.copyright a:hover {
			color:	'. stripslashes( wp_strip_all_tags( $copyright_link_hover_color ) ) .';
		}';
	}
}

// Styling Options: Sidebar
$custom_sidebar_styles = configurator_dynamic_css_option( 'custom_sidebar_styles', 'no' );

if( 'yes' == $custom_sidebar_styles ) {

	// Sidebar Widget Title Color
	$sidebar_widget_title_color = configurator_dynamic_css_option( 'sidebar_widget_title_color', '' );

	if( !empty( $sidebar_widget_title_color ) ) {
		echo '.widget .widgettitle {
			color:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title_color ) ) .';
		}';
	}

	// Sidebar Widget Text Color
	$sidebar_widget_text_color = configurator_dynamic_css_option( 'sidebar_widget_text_color', '' );

	if( !empty( $sidebar_widget_text_color ) ) {
		echo '.widget li, .widget #recentcomments .comment-author-link {
			color:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_text_color ) ) .';
		}';
	}

	// Sidebar Widget Link Color
	$sidebar_widget_link_color = configurator_dynamic_css_option( 'sidebar_widget_link_color', '' );

	if( !empty( $sidebar_widget_link_color ) ) {
		echo '.widget #recentcomments a, .widget.widget_rss a, .widget.widget_rss .comment-author-link, .widget li a, .widget #recentcomments .comment-author-link a, .widget .tagcloud a  {
			color:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_color ) ) .';
		}';
	}

	// Sidebar Widget Link Hover Color
	$sidebar_widget_link_hover_color = configurator_dynamic_css_option( 'sidebar_widget_link_hover_color', '' );

	if( !empty( $sidebar_widget_link_hover_color ) ) {
		echo '.quote .content:after, .quote .content:before, #style-normal .entry-content .title a:hover, #style-normal_split .entry-content .title a:hover, #style-normal .link-btn a, .widget li a:hover, #footer .widget li a:hover, #footer .widget .widget_shopping_cart_content .buttons .button:hover,.widget #recentcomments a:hover,.widget.widget_rss a:hover, .widget #recentcomments .comment-author-link a:hover {
			color:	'. $sidebar_widget_link_hover_color.';
		}';
	}
	
}

/*
 * Typography
 */
$advance_typography = configurator_dynamic_css_option( 'advance_typography', 'no' );

// Typography: Basic

// Primary Font
$primary = configurator_dynamic_css_option( 'primary_font', array( 'font-family' => 'Montserrat' ) );

if( !empty( $primary ) ) {
	echo 'h1, h2, h3, h4, h5, h6, .btn, .button.btn, .added_to_cart, .added_to_cart:hover, .main-nav .menu li, .woocommerce-result-count, .woocommerce-ordering select, .product-content .price, .summary .quantity .input-text, .woocommerce .cart-form .product-name a.remove.woocommerce .cart-form .product-subtotal .woocommerce-Price-amount, .woocommerce .cart-form .product-price .woocommerce-Price-amount, .woocommerce .cart-form .product-quantity .input-text, .woocommerce-checkout-review-order-table tbody .product-name, #style-normal .entry-content .title, #style-normal .entry-content .title, #style-normal .entry-content p, #style-normal .entry-content .blog-meta > span, #style-normal .link-btn a, .slider-content .price, .static-counter .number, #footer.footer-dark .widget li, #footer.footer-dark .widget li a, .header .header-elem, .woocommerce .cart-form .cart_item > div.product-quantity {
		font-family:	'. stripslashes( wp_strip_all_tags( $primary['font-family'] ) ) .';
	}';
}

// Content Font
$content = configurator_dynamic_css_option( 'content_font', array( 'font-family' => 'Raleway' ) );

if( !empty( $content ) ) {
	echo 'body {
		font-family:	'. stripslashes( wp_strip_all_tags( $content['font-family'] ) ) .';
	}';
}

// Typography: Advance
if( 'yes' == $advance_typography ) {

	// H1 Font
	$h1 = configurator_dynamic_css_option( 'h1_font', array() );

	if( !empty( $h1 ) ) {
		echo 'h1 {';
			echo ( isset( $h1['font-family'] ) && 'Raleway' != $h1['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $h1['font-family'] ) ) .';' : '';
			echo ( isset( $h1['font-size'] ) && '2em' != $h1['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $h1['font-size'] ) ) .';' : '';
			echo ( isset( $h1['line-height'] ) && '1.8' != $h1['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $h1['line-height'] ) ) .';' : '';
			echo ( isset( $h1['color'] ) && '#000' != $h1['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $h1['color'] ) ) .';' : '';
			echo ( isset( $h1['font-weight'] ) && '700' != $h1['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $h1['font-weight'] ) ) .';' : '';
			echo ( isset( $h1['letter-spacing'] ) && '0px' != $h1['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $h1['letter-spacing'] ) ) .';' : '';
			echo ( isset( $h1['text-transform'] ) && 'none' != $h1['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $h1['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// H2 Font
	$h2 = configurator_dynamic_css_option( 'h2_font', array() );

	if( !empty( $h2 ) ) {
		echo 'h2 {';
			echo ( isset( $h2['font-family'] ) && 'Raleway' != $h2['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $h2['font-family'] ) ) .';' : '';
			echo ( isset( $h2['font-size'] ) && '2em' != $h2['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $h2['font-size'] ) ) .';' : '';
			echo ( isset( $h2['line-height'] ) && '1.8' != $h2['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $h2['line-height'] ) ) .';' : '';
			echo ( isset( $h2['color'] ) && '#000' != $h2['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $h2['color'] ) ) .';' : '';
			echo ( isset( $h2['font-weight'] ) && '700' != $h2['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $h2['font-weight'] ) ) .';' : '';
			echo ( isset( $h2['letter-spacing'] ) && '0px' != $h2['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $h2['letter-spacing'] ) ) .';' : '';
			echo ( isset( $h2['text-transform'] ) && 'none' != $h2['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $h2['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// H3 Font
	$h3 = configurator_dynamic_css_option( 'h3_font', array() );

	if( !empty( $h3 ) ) {
		echo 'h3 {';
			echo ( isset( $h3['font-family'] ) && 'Raleway' != $h3['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $h3['font-family'] ) ) .';' : '';
			echo ( isset( $h3['font-size'] ) && '1.17em' != $h3['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $h3['font-size'] ) ) .';' : '';
			echo ( isset( $h3['line-height'] ) && '1.8' != $h3['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $h3['line-height'] ) ) .';' : '';
			echo ( isset( $h3['color'] ) && '#000' != $h3['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $h3['color'] ) ) .';' : '';
			echo ( isset( $h3['font-weight'] ) && '700' != $h3['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $h3['font-weight'] ) ) .';' : '';
			echo ( isset( $h3['letter-spacing'] ) && '0px' != $h3['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $h3['letter-spacing'] ) ) .';' : '';
			echo ( isset( $h3['text-transform'] ) && 'none' != $h3['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $h3['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// H4 Font
	$h4 = configurator_dynamic_css_option( 'h4_font', array() );

	if( !empty( $h4 ) ) {
		echo 'h4 {';
			echo ( isset( $h4['font-family'] ) && 'Raleway' != $h4['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $h4['font-family'] ) ) .';' : '';
			echo ( isset( $h4['font-size'] ) && '1em' != $h4['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $h4['font-size'] ) ) .';' : '';
			echo ( isset( $h4['line-height'] ) && '1.8' != $h4['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $h4['line-height'] ) ) .';' : '';
			echo ( isset( $h4['color'] ) && '#000' != $h4['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $h4['color'] ) ) .';' : '';
			echo ( isset( $h4['font-weight'] ) && '700' != $h4['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $h4['font-weight'] ) ) .';' : '';
			echo ( isset( $h4['letter-spacing'] ) && '0px' != $h4['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $h4['letter-spacing'] ) ) .';' : '';
			echo ( isset( $h4['text-transform'] ) && 'none' != $h4['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $h4['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// H5 Font
	$h5 = configurator_dynamic_css_option( 'h5_font', array() );

	if( !empty( $h5 ) ) {
		echo 'h5 {';
			echo ( isset( $h5['font-family'] ) && 'Raleway' != $h5['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $h5['font-family'] ) ) .';' : '';
			echo ( isset( $h5['font-size'] ) && '0.83em' != $h5['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $h5['font-size'] ) ) .';' : '';
			echo ( isset( $h5['line-height'] ) && '1.8' != $h5['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $h5['line-height'] ) ) .';' : '';
			echo ( isset( $h5['color'] ) && '#000' != $h5['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $h5['color'] ) ) .';' : '';
			echo ( isset( $h5['font-weight'] ) && '700' != $h5['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $h5['font-weight'] ) ) .';' : '';
			echo ( isset( $h5['letter-spacing'] ) && '0px' != $h5['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $h5['letter-spacing'] ) ) .';' : '';
			echo ( isset( $h5['text-transform'] ) && 'none' != $h5['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $h5['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// H6 Font
	$h6 = configurator_dynamic_css_option( 'h6_font', array() );

	if( !empty( $h6 ) ) {
		echo 'h6 {';
			echo ( isset( $h6['font-family'] ) && 'Raleway' != $h6['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $h6['font-family'] ) ) .';' : '';
			echo ( isset( $h6['font-size'] ) && '0.67em' != $h6['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $h6['font-size'] ) ) .';' : '';
			echo ( isset( $h6['line-height'] ) && '1.8' != $h6['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $h6['line-height'] ) ) .';' : '';
			echo ( isset( $h6['color'] ) && '#000' != $h6['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $h6['color'] ) ) .';' : '';
			echo ( isset( $h6['font-weight'] ) && '700' != $h6['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $h6['font-weight'] ) ) .';' : '';
			echo ( isset( $h6['letter-spacing'] ) && '0px' != $h6['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $h6['letter-spacing'] ) ) .';' : '';
			echo ( isset( $h6['text-transform'] ) && 'none' != $h6['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $h6['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// List Font
	$list = configurator_dynamic_css_option( 'list_font', array() );

	if( !empty( $list ) ) {
		echo 'li, li a {';
			echo ( isset( $list['font-family'] ) && 'Raleway' != $list['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $list['font-family'] ) ) .';' : '';
			echo ( isset( $list['font-size'] ) && '14px' != $list['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $list['font-size'] ) ) .';' : '';
			echo ( isset( $list['line-height'] ) && '1.8' != $list['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $list['line-height'] ) ) .';' : '';
			echo ( isset( $list['color'] ) && '#000' != $list['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $list['color'] ) ) .';' : '';
			echo ( isset( $list['font-weight'] ) && '400' != $list['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $list['font-weight'] ) ) .';' : '';
			echo ( isset( $list['letter-spacing'] ) && '0px' != $list['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $list['letter-spacing'] ) ) .';' : '';
			echo ( isset( $list['text-transform'] ) && 'none' != $list['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $list['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Link Font
	$link = configurator_dynamic_css_option( 'link_font', array() );

	if( !empty( $link ) ) {
		echo 'a {';
			echo ( isset( $link['font-family'] ) && 'Raleway' != $link['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $link['font-family'] ) ) .';' : '';
			echo ( isset( $link['font-size'] ) && '14px' != $link['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $link['font-size'] ) ) .';' : '';
			echo ( isset( $link['line-height'] ) && '1.8' != $link['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $link['line-height'] ) ) .';' : '';
			echo ( isset( $link['color'] ) && '#af476f' != $link['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $link['color'] ) ) .';' : '';
			echo ( isset( $link['font-weight'] ) && '400' != $link['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $link['font-weight'] ) ) .';' : '';
			echo ( isset( $link['letter-spacing'] ) && '0px' != $link['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $link['letter-spacing'] ) ) .';' : '';
			echo ( isset( $link['text-transform'] ) && 'none' != $link['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $link['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Logo Font
	$logo = configurator_dynamic_css_option( 'logo_font', array() );

	if( !empty( $logo ) ) {
		echo 'div#logo {';
			echo ( isset( $logo['font-family'] ) && 'Raleway' != $logo['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $logo['font-family'] ) ) .';' : '';
			echo ( isset( $logo['font-size'] ) && '30px' != $logo['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $logo['font-size'] ) ) .';' : '';
			echo ( isset( $logo['line-height'] ) && '135px' != $logo['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $logo['line-height'] ) ) .';' : '';
			echo ( isset( $logo['color'] ) && '#000' != $logo['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $logo['color'] ) ) .';' : '';
			echo ( isset( $logo['font-weight'] ) && '700' != $logo['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $logo['font-weight'] ) ) .';' : '';
			echo ( isset( $logo['letter-spacing'] ) && '0px' != $logo['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $logo['letter-spacing'] ) ) .';' : '';
			echo ( isset( $logo['text-transform'] ) && 'none' != $logo['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $logo['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Blockquote Font
	$blockquote = configurator_dynamic_css_option( 'blockquote_font', array() );

	if( !empty( $blockquote ) ) {
		echo 'blockquote {';
			echo ( isset( $blockquote['font-family'] ) && 'Raleway' != $blockquote['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $blockquote['font-family'] ) ) .';' : '';
			echo ( isset( $blockquote['font-size'] ) && '14px' != $blockquote['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $blockquote['font-size'] ) ) .';' : '';
			echo ( isset( $blockquote['line-height'] ) && '1.8' != $blockquote['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $blockquote['line-height'] ) ) .';' : '';
			echo ( isset( $blockquote['color'] ) && '#000' != $blockquote['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $blockquote['color'] ) ) .';' : '';
			echo ( isset( $blockquote['font-weight'] ) && '400' != $blockquote['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $blockquote['font-weight'] ) ) .';' : '';
			echo ( isset( $blockquote['letter-spacing'] ) && '0px' != $blockquote['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $blockquote['letter-spacing'] ) ) .';' : '';
			echo ( isset( $blockquote['text-transform'] ) && 'none' != $blockquote['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $blockquote['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Main Menu Font
	$main_menu = configurator_dynamic_css_option( 'main_menu_font', array() );

	if( !empty( $main_menu ) ) {
		echo '.main-nav .menu li, .main-nav .menu li a {';
			echo ( isset( $main_menu['font-family'] ) && 'Montserrat' != $main_menu['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $main_menu['font-family'] ) ) .';' : '';
			echo ( isset( $main_menu['font-size'] ) && '13px' != $main_menu['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $main_menu['font-size'] ) ) .';' : '';
			echo ( isset( $main_menu['line-height'] ) && '1.8' != $main_menu['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $main_menu['line-height'] ) ) .';' : '';
			echo ( isset( $main_menu['color'] ) && '#000' != $main_menu['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $main_menu['color'] ) ) .';' : '';
			echo ( isset( $main_menu['font-weight'] ) && '400' != $main_menu['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $main_menu['font-weight'] ) ) .';' : '';
			echo ( isset( $main_menu['letter-spacing'] ) && '4px' != $main_menu['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $main_menu['letter-spacing'] ) ) .';' : '';
			echo ( isset( $main_menu['text-transform'] ) && 'uppercase' != $main_menu['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $main_menu['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Sub Menu Font
	$sub_menu = configurator_dynamic_css_option( 'sub_menu_font', array() );

	if( !empty( $sub_menu ) ) {
		echo '.main-nav .sub-menu, .main-nav .menu .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a {';
			echo ( isset( $main_menu['font-family'] ) && 'Montserrat' != $main_menu['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $main_menu['font-family'] ) ) .';' : '';
			echo ( isset( $main_menu['font-size'] ) && '13px' != $main_menu['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $main_menu['font-size'] ) ) .';' : '';
			echo ( isset( $main_menu['line-height'] ) && '1.8' != $main_menu['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $main_menu['line-height'] ) ) .';' : '';
			echo ( isset( $main_menu['color'] ) && '#000' != $main_menu['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $main_menu['color'] ) ) .';' : '';
			echo ( isset( $main_menu['font-weight'] ) && '400' != $main_menu['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $main_menu['font-weight'] ) ) .';' : '';
			echo ( isset( $main_menu['letter-spacing'] ) && '1px' != $main_menu['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $main_menu['letter-spacing'] ) ) .';' : '';
			echo ( isset( $main_menu['text-transform'] ) && 'none' != $main_menu['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $main_menu['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Button Small Font
	$btn_xs = configurator_dynamic_css_option( 'btn_xs_font', array() );

	if( !empty( $btn_xs ) ) {
		echo '.btn.btn-xs, .button.btn.btn-xs {';
			echo ( isset( $btn_xs['font-family'] ) && 'Montserrat' != $btn_xs['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $btn_xs['font-family'] ) ) .';' : '';
			echo ( isset( $btn_xs['font-size'] ) && '10px' != $btn_xs['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $btn_xs['font-size'] ) ) .';' : '';
			echo ( isset( $btn_xs['line-height'] ) && '1.8' != $btn_xs['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $btn_xs['line-height'] ) ) .';' : '';
			echo ( isset( $btn_xs['color'] ) && '#fff' != $btn_xs['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $btn_xs['color'] ) ) .';' : '';
			echo ( isset( $btn_xs['font-weight'] ) && '500' != $btn_xs['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $btn_xs['font-weight'] ) ) .';' : '';
			echo ( isset( $btn_xs['letter-spacing'] ) && '1px' != $btn_xs['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $btn_xs['letter-spacing'] ) ) .';' : '';
			echo ( isset( $btn_xs['text-transform'] ) && 'uppercase' != $btn_xs['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $btn_xs['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Button Small Font
	$btn_sm = configurator_dynamic_css_option( 'btn_sm_font', array() );

	if( !empty( $btn_sm ) ) {
		echo '.btn, .button.btn, .added_to_cart, .added_to_cart:hover {';
			echo ( isset( $btn_sm['font-family'] ) && 'Montserrat' != $btn_sm['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $btn_sm['font-family'] ) ) .';' : '';
			echo ( isset( $btn_sm['font-size'] ) && '12px' != $btn_sm['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $btn_sm['font-size'] ) ) .';' : '';
			echo ( isset( $btn_sm['line-height'] ) && '1.8' != $btn_sm['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $btn_sm['line-height'] ) ) .';' : '';
			echo ( isset( $btn_sm['color'] ) && '#fff' != $btn_sm['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $btn_sm['color'] ) ) .';' : '';
			echo ( isset( $btn_sm['font-weight'] ) && '500' != $btn_sm['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $btn_sm['font-weight'] ) ) .';' : '';
			echo ( isset( $btn_sm['letter-spacing'] ) && '1px' != $btn_sm['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $btn_sm['letter-spacing'] ) ) .';' : '';
			echo ( isset( $btn_sm['text-transform'] ) && 'uppercase' != $btn_sm['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $btn_sm['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Button Medium Font
	$btn_md = configurator_dynamic_css_option( 'btn_md_font', array() );

	if( !empty( $btn_md ) ) {
		echo '.btn.btn-md, .button.btn.btn-md {';
			echo ( isset( $btn_md['font-family'] ) && 'Montserrat' != $btn_md['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $btn_md['font-family'] ) ) .';' : '';
			echo ( isset( $btn_md['font-size'] ) && '14px' != $btn_md['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $btn_md['font-size'] ) ) .';' : '';
			echo ( isset( $btn_md['line-height'] ) && '1.8' != $btn_md['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $btn_md['line-height'] ) ) .';' : '';
			echo ( isset( $btn_md['color'] ) && '#fff' != $btn_md['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $btn_md['color'] ) ) .';' : '';
			echo ( isset( $btn_md['font-weight'] ) && '500' != $btn_md['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $btn_md['font-weight'] ) ) .';' : '';
			echo ( isset( $btn_md['letter-spacing'] ) && '1px' != $btn_md['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $btn_md['letter-spacing'] ) ) .';' : '';
			echo ( isset( $btn_md['text-transform'] ) && 'uppercase' != $btn_md['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $btn_md['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Button Large Font
	$btn_lg = configurator_dynamic_css_option( 'btn_lg_font', array() );

	if( !empty( $btn_lg ) ) {
		echo '.btn.btn-lg, .button.btn.btn-lg {';
			echo ( isset( $btn_lg['font-family'] ) && 'Montserrat' != $btn_lg['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $btn_lg['font-family'] ) ) .';' : '';
			echo ( isset( $btn_lg['font-size'] ) && '15px' != $btn_lg['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $btn_lg['font-size'] ) ) .';' : '';
			echo ( isset( $btn_lg['line-height'] ) && '1.8' != $btn_lg['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $btn_lg['line-height'] ) ) .';' : '';
			echo ( isset( $btn_lg['color'] ) && '#fff' != $btn_lg['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $btn_lg['color'] ) ) .';' : '';
			echo ( isset( $btn_lg['font-weight'] ) && '500' != $btn_lg['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $btn_lg['font-weight'] ) ) .';' : '';
			echo ( isset( $btn_lg['letter-spacing'] ) && '1px' != $btn_lg['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $btn_lg['letter-spacing'] ) ) .';' : '';
			echo ( isset( $btn_lg['text-transform'] ) && 'uppercase' != $btn_lg['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $btn_lg['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Title Bar Title Font
	$title_bar_title = configurator_dynamic_css_option( 'title_bar_title_font', array() );

	if( !empty( $title_bar_title ) ) {
		echo '.banner-header h2 {';
			echo ( isset( $title_bar_title['font-family'] ) && 'Raleway' != $title_bar_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $title_bar_title['font-family'] ) ) .';' : '';
			echo ( isset( $title_bar_title['font-size'] ) && '3vh' != $title_bar_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $title_bar_title['font-size'] ) ) .';' : '';
			echo ( isset( $title_bar_title['line-height'] ) && '1.8' != $title_bar_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $title_bar_title['line-height'] ) ) .';' : '';
			echo ( isset( $title_bar_title['color'] ) && '#000' != $title_bar_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $title_bar_title['color'] ) ) .';' : '';
			echo ( isset( $title_bar_title['font-weight'] ) && '700' != $title_bar_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $title_bar_title['font-weight'] ) ) .';' : '';
			echo ( isset( $title_bar_title['letter-spacing'] ) && '3px' != $title_bar_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $title_bar_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $title_bar_title['text-transform'] ) && 'uppercase' != $title_bar_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $title_bar_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Title Bar Sub Title Font
	$title_bar_sub_title = configurator_dynamic_css_option( 'title_bar_sub_title_font', array() );

	if( !empty( $title_bar_sub_title ) ) {
		echo '.banner-header .sub-title {';
			echo ( isset( $title_bar_sub_title['font-family'] ) && 'Raleway' != $title_bar_sub_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['font-family'] ) ) .';' : '';
			echo ( isset( $title_bar_sub_title['font-size'] ) && '18px' != $title_bar_sub_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['font-size'] ) ) .';' : '';
			echo ( isset( $title_bar_sub_title['line-height'] ) && '1.4' != $title_bar_sub_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['line-height'] ) ) .';' : '';
			echo ( isset( $title_bar_sub_title['color'] ) && '#282219' != $title_bar_sub_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['color'] ) ) .';' : '';
			echo ( isset( $title_bar_sub_title['font-weight'] ) && '400' != $title_bar_sub_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['font-weight'] ) ) .';' : '';
			echo ( isset( $title_bar_sub_title['letter-spacing'] ) && '3.6px' != $title_bar_sub_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $title_bar_sub_title['text-transform'] ) && 'uppercase' != $title_bar_sub_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $title_bar_sub_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Go Back Font
	$goback = configurator_dynamic_css_option( 'goback_font', array() );

	if( !empty( $goback ) ) {
		echo '.banner-header .go-back a {';
			echo ( isset( $goback['font-family'] ) && 'Montserrat' != $goback['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $goback['font-family'] ) ) .';' : '';
			echo ( isset( $goback['font-size'] ) && '13px' != $goback['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $goback['font-size'] ) ) .';' : '';
			echo ( isset( $goback['line-height'] ) && '1.8' != $goback['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $goback['line-height'] ) ) .';' : '';
			echo ( isset( $goback['color'] ) && '#282219' != $goback['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $goback['color'] ) ) .';' : '';
			echo ( isset( $goback['font-weight'] ) && '300' != $goback['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $goback['font-weight'] ) ) .';' : '';
			echo ( isset( $goback['letter-spacing'] ) && '1px' != $goback['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $goback['letter-spacing'] ) ) .';' : '';
			echo ( isset( $goback['text-transform'] ) && 'uppercase' != $goback['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $goback['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Breadcrumbs Font
	$breadcrumbs = configurator_dynamic_css_option( 'breadcrumbs_font', array() );

	if( !empty( $breadcrumbs ) ) {
		echo '.pix-breadcrumbs li a, .pix-breadcrumbs li a, .pix-breadcrumbs li span {';
			echo ( isset( $breadcrumbs['font-family'] ) && 'Montserrat' != $breadcrumbs['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['font-family'] ) ) .';' : '';
			echo ( isset( $breadcrumbs['font-size'] ) && '13px' != $breadcrumbs['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['font-size'] ) ) .';' : '';
			echo ( isset( $breadcrumbs['line-height'] ) && '1.8' != $breadcrumbs['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['line-height'] ) ) .';' : '';
			echo ( isset( $breadcrumbs['color'] ) && '#000' != $breadcrumbs['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['color'] ) ) .';' : '';
			echo ( isset( $breadcrumbs['font-weight'] ) && '300' != $breadcrumbs['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['font-weight'] ) ) .';' : '';
			echo ( isset( $breadcrumbs['letter-spacing'] ) && '1px' != $breadcrumbs['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['letter-spacing'] ) ) .';' : '';
			echo ( isset( $breadcrumbs['text-transform'] ) && 'uppercase' != $breadcrumbs['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $breadcrumbs['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Blog Title Font
	$blog_title = configurator_dynamic_css_option( 'blog_title_font', array() );

	if( !empty( $blog_title ) ) {
		echo '#style-normal .entry-content .title, #style-normal .entry-content .title a, #style-list .entry-content .title, #style-list .entry-content .title a, #style-normal_split .entry-content .title, #style-normal_split .entry-content .title a {';
			echo ( isset( $blog_title['font-family'] ) && 'Montserrat' != $blog_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $blog_title['font-family'] ) ) .';' : '';
			echo ( isset( $blog_title['font-size'] ) && '40px' != $blog_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $blog_title['font-size'] ) ) .';' : '';
			echo ( isset( $blog_title['line-height'] ) && '43px' != $blog_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $blog_title['line-height'] ) ) .';' : '';
			echo ( isset( $blog_title['color'] ) && '#282219' != $blog_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $blog_title['color'] ) ) .';' : '';
			echo ( isset( $blog_title['font-weight'] ) && '600' != $blog_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $blog_title['font-weight'] ) ) .';' : '';
			echo ( isset( $blog_title['letter-spacing'] ) && '4.3px' != $blog_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $blog_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $blog_title['text-transform'] ) && 'uppercase' != $blog_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $blog_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Blog Meta Font
	$blog_meta = configurator_dynamic_css_option( 'blog_meta_font', array() );

	if( !empty( $blog_meta ) ) {
		echo '#style-list .entry-content .blog-meta > span, #style-normal .entry-content .blog-meta > span, #style-normal_split .entry-content .blog-meta > span {';
			echo ( isset( $blog_meta['font-family'] ) && 'Raleway' != $blog_meta['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $blog_meta['font-family'] ) ) .';' : '';
			echo ( isset( $blog_meta['font-size'] ) && '12px' != $blog_meta['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $blog_meta['font-size'] ) ) .';' : '';
			echo ( isset( $blog_meta['line-height'] ) && '1.8' != $blog_meta['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $blog_meta['line-height'] ) ) .';' : '';
			echo ( isset( $blog_meta['color'] ) && '#000' != $blog_meta['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $blog_meta['color'] ) ) .';' : '';
			echo ( isset( $blog_meta['font-weight'] ) && '400' != $blog_meta['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $blog_meta['font-weight'] ) ) .';' : '';
			echo ( isset( $blog_meta['letter-spacing'] ) && '1px' != $blog_meta['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $blog_meta['letter-spacing'] ) ) .';' : '';
			echo ( isset( $blog_meta['text-transform'] ) && 'none' != $blog_meta['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $blog_meta['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Blog Content Font
	$blog_content = configurator_dynamic_css_option( 'blog_content_font', array() );

	if( !empty( $blog_content ) ) {
		echo '#style-list .entry-content p, #style-normal .entry-content p, #style-normal_split .entry-content p {';
			echo ( isset( $blog_content['font-family'] ) && 'Raleway' != $blog_content['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $blog_content['font-family'] ) ) .';' : '';
			echo ( isset( $blog_content['font-size'] ) && '14px' != $blog_content['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $blog_content['font-size'] ) ) .';' : '';
			echo ( isset( $blog_content['line-height'] ) && '1.8' != $blog_content['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $blog_content['line-height'] ) ) .';' : '';
			echo ( isset( $blog_content['color'] ) && '#282219' != $blog_content['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $blog_content['color'] ) ) .';' : '';
			echo ( isset( $blog_content['font-weight'] ) && '400' != $blog_content['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $blog_content['font-weight'] ) ) .';' : '';
			echo ( isset( $blog_content['letter-spacing'] ) && '0.6px' != $blog_content['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $blog_content['letter-spacing'] ) ) .';' : '';
			echo ( isset( $blog_content['text-transform'] ) && 'none' != $blog_content['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $blog_content['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Blog Button Link Font
	$blog_btn_link = configurator_dynamic_css_option( 'blog_btn_link_font', array() );

	if( !empty( $blog_btn_link ) ) {
		echo '#style-list .link-btn a, #style-normal .link-btn a, #style-normal_split .link-btn a {';
			echo ( isset( $blog_btn_link['font-family'] ) && 'Raleway' != $blog_btn_link['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['font-family'] ) ) .';' : '';
			echo ( isset( $blog_btn_link['font-size'] ) && '14px' != $blog_btn_link['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['font-size'] ) ) .';' : '';
			echo ( isset( $blog_btn_link['line-height'] ) && '1.8' != $blog_btn_link['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['line-height'] ) ) .';' : '';
			echo ( isset( $blog_btn_link['color'] ) && '#282219' != $blog_btn_link['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['color'] ) ) .';' : '';
			echo ( isset( $blog_btn_link['font-weight'] ) && '400' != $blog_btn_link['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['font-weight'] ) ) .';' : '';
			echo ( isset( $blog_btn_link['letter-spacing'] ) && '0.6px' != $blog_btn_link['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['letter-spacing'] ) ) .';' : '';
			echo ( isset( $blog_btn_link['text-transform'] ) && 'none' != $blog_btn_link['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $blog_btn_link['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Title Font
	$single_blog_title = configurator_dynamic_css_option( 'single_blog_title_font', array() );

	if( !empty( $single_blog_title ) ) {
		echo '#reply-title, #comments-title {';
			echo ( isset( $single_blog_title['font-family'] ) && 'Raleway' != $single_blog_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_title['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_title['font-size'] ) && '21px' != $single_blog_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_title['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_title['line-height'] ) && '1' != $single_blog_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_title['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_title['color'] ) && '#000' != $single_blog_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_title['color'] ) ) .';' : '';
			echo ( isset( $single_blog_title['font-weight'] ) && '700' != $single_blog_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_title['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_title['letter-spacing'] ) && '0px' != $single_blog_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_title['text-transform'] ) && 'uppercase' != $single_blog_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Tag Font
	$single_blog_tag = configurator_dynamic_css_option( 'single_blog_tag_font', array() );

	if( !empty( $single_blog_tag ) ) {
		echo '.single-post .post-bottom .tag-group, .single-post .post-bottom .tag-group a {';
			echo ( isset( $single_blog_tag['font-family'] ) && 'Raleway' != $single_blog_tag['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_tag['font-size'] ) && '11px' != $single_blog_tag['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_tag['line-height'] ) && '2.1' != $single_blog_tag['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_tag['color'] ) && '#000' != $single_blog_tag['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['color'] ) ) .';' : '';
			echo ( isset( $single_blog_tag['font-weight'] ) && '500' != $single_blog_tag['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_tag['letter-spacing'] ) && '0px' != $single_blog_tag['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_tag['text-transform'] ) && 'uppercase' != $single_blog_tag['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_tag['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Author Font
	$single_blog_author = configurator_dynamic_css_option( 'single_blog_author_font', array() );

	if( !empty( $single_blog_author ) ) {
		echo '.single-post .author-details .authorName {';
			echo ( isset( $single_blog_author['font-family'] ) && 'Raleway' != $single_blog_author['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_author['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_author['font-size'] ) && '11px' != $single_blog_author['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_author['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_author['line-height'] ) && '2.1' != $single_blog_author['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_author['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_author['color'] ) && '#000' != $single_blog_author['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_author['color'] ) ) .';' : '';
			echo ( isset( $single_blog_author['font-weight'] ) && '500' != $single_blog_author['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_author['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_author['letter-spacing'] ) && '0px' != $single_blog_author['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_author['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_author['text-transform'] ) && 'uppercase' != $single_blog_author['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_author['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Author Description Font
	$single_blog_author_description = configurator_dynamic_css_option( 'single_blog_author_description_font', array() );

	if( !empty( $single_blog_author_description ) ) {
		echo '.single-post .author-details .details p {';
			echo ( isset( $single_blog_author_description['font-family'] ) && 'Raleway' != $single_blog_author_description['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_author_description['font-size'] ) && '14px' != $single_blog_author_description['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_author_description['line-height'] ) && '2.1' != $single_blog_author_description['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_author_description['color'] ) && '#000' != $single_blog_author_description['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['color'] ) ) .';' : '';
			echo ( isset( $single_blog_author_description['font-weight'] ) && '500' != $single_blog_author_description['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_author_description['letter-spacing'] ) && '0px' != $single_blog_author_description['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_author_description['text-transform'] ) && 'none' != $single_blog_author_description['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_author_description['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Comment Author Font
	$single_blog_comment_author = configurator_dynamic_css_option( 'single_blog_comment_author_font', array() );

	if( !empty( $single_blog_comment_author ) ) {
		echo '.comment_author_details .fn {';
			echo ( isset( $single_blog_comment_author['font-family'] ) && 'Raleway' != $single_blog_comment_author['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_author['font-size'] ) && '11px' != $single_blog_comment_author['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_author['line-height'] ) && '2.1' != $single_blog_comment_author['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_author['color'] ) && '#af476f' != $single_blog_comment_author['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['color'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_author['font-weight'] ) && '500' != $single_blog_comment_author['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_author['letter-spacing'] ) && '0px' != $single_blog_comment_author['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_author['text-transform'] ) && 'uppercase' != $single_blog_comment_author['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_author['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Comment Meta Font
	$single_blog_comment_meta_font = configurator_dynamic_css_option( 'single_blog_comment_meta_font', array() );

	if( !empty( $single_blog_comment_meta_font ) ) {
		echo '.comment_author_details time a {';
			echo ( isset( $single_blog_comment_meta_font['font-family'] ) && 'Raleway' != $single_blog_comment_meta_font['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_meta_font['font-size'] ) && '11px' != $single_blog_comment_meta_font['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_meta_font['line-height'] ) && '2.1' != $single_blog_comment_meta_font['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_meta_font['color'] ) && '#b2b2b2' != $single_blog_comment_meta_font['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['color'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_meta_font['font-weight'] ) && '500' != $single_blog_comment_meta_font['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_meta_font['letter-spacing'] ) && '0px' != $single_blog_comment_meta_font['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_meta_font['text-transform'] ) && 'uppercase' != $single_blog_comment_meta_font['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_meta_font['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Comment Reply Font
	$single_blog_comment_reply = configurator_dynamic_css_option( 'single_blog_comment_reply_font', array() );

	if( !empty( $single_blog_comment_reply ) ) {
		echo '.comment_author_details .comment-reply-link {';
			echo ( isset( $single_blog_comment_reply['font-family'] ) && 'Raleway' != $single_blog_comment_reply['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['font-size'] ) && '11px' != $single_blog_comment_reply['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['line-height'] ) && '2.1' != $single_blog_comment_reply['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['color'] ) && '#b2b2b2' != $single_blog_comment_reply['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['color'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['font-weight'] ) && '500' != $single_blog_comment_reply['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['letter-spacing'] ) && '0px' != $single_blog_comment_reply['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['text-transform'] ) && 'uppercase' != $single_blog_comment_reply['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Comment Reply Font
	$single_blog_comment_reply = configurator_dynamic_css_option( 'single_blog_comment_reply_font', array() );

	if( !empty( $single_blog_comment_reply ) ) {
		echo '.comment_author_details .comment-reply-link {';
			echo ( isset( $single_blog_comment_reply['font-family'] ) && 'Raleway' != $single_blog_comment_reply['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['font-size'] ) && '11px' != $single_blog_comment_reply['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['line-height'] ) && '2.1' != $single_blog_comment_reply['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['color'] ) && '#b2b2b2' != $single_blog_comment_reply['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['color'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['font-weight'] ) && '500' != $single_blog_comment_reply['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['letter-spacing'] ) && '0px' != $single_blog_comment_reply['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_comment_reply['text-transform'] ) && 'uppercase' != $single_blog_comment_reply['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_comment_reply['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Single Blog Comment Font
	$single_blog_comment = configurator_dynamic_css_option( 'single_blog_comment_font', array() );

	if( !empty( $single_blog_comment ) ) {
		echo '.comment .comment_content p {';
			echo ( isset( $single_blog_comment['font-family'] ) && 'Raleway' != $single_blog_comment['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['font-family'] ) ) .';' : '';
			echo ( isset( $single_blog_comment['font-size'] ) && '12px' != $single_blog_comment['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['font-size'] ) ) .';' : '';
			echo ( isset( $single_blog_comment['line-height'] ) && '2.1' != $single_blog_comment['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['line-height'] ) ) .';' : '';
			echo ( isset( $single_blog_comment['color'] ) && '#000' != $single_blog_comment['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['color'] ) ) .';' : '';
			echo ( isset( $single_blog_comment['font-weight'] ) && '600' != $single_blog_comment['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['font-weight'] ) ) .';' : '';
			echo ( isset( $single_blog_comment['letter-spacing'] ) && '0px' != $single_blog_comment['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['letter-spacing'] ) ) .';' : '';
			echo ( isset( $single_blog_comment['text-transform'] ) && 'none' != $single_blog_comment['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $single_blog_comment['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Sidebar Widget Title Font
	$sidebar_widget_title = configurator_dynamic_css_option( 'sidebar_widget_title_font', array() );

	if( !empty( $sidebar_widget_title ) ) {
		echo '.sidebar .widget .widgettitle {';
			echo ( isset( $sidebar_widget_title['font-family'] ) && 'Montserrat' != $sidebar_widget_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['font-family'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_title['font-size'] ) && '17px' != $sidebar_widget_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['font-size'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_title['line-height'] ) && '1.8' != $sidebar_widget_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['line-height'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_title['color'] ) && '#000' != $sidebar_widget_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['color'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_title['font-weight'] ) && '600' != $sidebar_widget_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['font-weight'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_title['letter-spacing'] ) && '1px' != $sidebar_widget_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_title['text-transform'] ) && 'uppercase' != $sidebar_widget_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Sidebar Widget Content Font
	$sidebar_widget_content = configurator_dynamic_css_option( 'sidebar_widget_content_font', array() );

	if( !empty( $sidebar_widget_content ) ) {
		echo '.sidebar .widget p, .sidebar .widget li {';
			echo ( isset( $sidebar_widget_content['font-family'] ) && 'Raleway' != $sidebar_widget_content['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['font-family'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_content['font-size'] ) && '14px' != $sidebar_widget_content['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['font-size'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_content['line-height'] ) && '1.8' != $sidebar_widget_content['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['line-height'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_content['color'] ) && '#000' != $sidebar_widget_content['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['color'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_content['font-weight'] ) && '400' != $sidebar_widget_content['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['font-weight'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_content['letter-spacing'] ) && '0px' != $sidebar_widget_content['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['letter-spacing'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_content['text-transform'] ) && 'none' != $sidebar_widget_content['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_content['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Sidebar Widget Link Font
	$sidebar_widget_link_font = configurator_dynamic_css_option( 'sidebar_widget_link_font', array() );

	if( !empty( $sidebar_widget_link_font ) ) {
		echo '.sidebar .widget a, .sidebar .widget li a, .sidebar .widget #recentcomments a, .sidebar .widget.widget_rss a, .sidebar .widget.widget_rss .comment-author-link {';
			echo ( isset( $sidebar_widget_link_font['font-family'] ) && 'Raleway' != $sidebar_widget_link_font['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['font-family'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_link_font['font-size'] ) && '14px' != $sidebar_widget_link_font['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['font-size'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_link_font['line-height'] ) && '1.8' != $sidebar_widget_link_font['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['line-height'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_link_font['color'] ) && '#000' != $sidebar_widget_link_font['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['color'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_link_font['font-weight'] ) && '400' != $sidebar_widget_link_font['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['font-weight'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_link_font['letter-spacing'] ) && '0px' != $sidebar_widget_link_font['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['letter-spacing'] ) ) .';' : '';
			echo ( isset( $sidebar_widget_link_font['text-transform'] ) && 'none' != $sidebar_widget_link_font['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $sidebar_widget_link_font['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Footer Widget Title Font
	$footer_widget_title = configurator_dynamic_css_option( 'footer_widget_title_font', array() );

	if( !empty( $footer_widget_title ) ) {
		echo '#footer .widget .widgettitle {';
			echo ( isset( $footer_widget_title['font-family'] ) && 'Montserrat' != $footer_widget_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['font-family'] ) ) .';' : '';
			echo ( isset( $footer_widget_title['font-size'] ) && '17px' != $footer_widget_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['font-size'] ) ) .';' : '';
			echo ( isset( $footer_widget_title['line-height'] ) && '1.8' != $footer_widget_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['line-height'] ) ) .';' : '';
			echo ( isset( $footer_widget_title['color'] ) && '#000' != $footer_widget_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['color'] ) ) .';' : '';
			echo ( isset( $footer_widget_title['font-weight'] ) && '600' != $footer_widget_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['font-weight'] ) ) .';' : '';
			echo ( isset( $footer_widget_title['letter-spacing'] ) && '1px' != $footer_widget_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $footer_widget_title['text-transform'] ) && 'uppercase' != $footer_widget_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $footer_widget_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Footer Widget Content Font
	$footer_widget_content = configurator_dynamic_css_option( 'footer_widget_content_font', array() );

	if( !empty( $footer_widget_content ) ) {
		echo '#footer .widget p, #footer .widget li {';
			echo ( isset( $footer_widget_content['font-family'] ) && 'Raleway' != $footer_widget_content['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['font-family'] ) ) .';' : '';
			echo ( isset( $footer_widget_content['font-size'] ) && '14px' != $footer_widget_content['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['font-size'] ) ) .';' : '';
			echo ( isset( $footer_widget_content['line-height'] ) && '1.8' != $footer_widget_content['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['line-height'] ) ) .';' : '';
			echo ( isset( $footer_widget_content['color'] ) && '#000' != $footer_widget_content['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['color'] ) ) .';' : '';
			echo ( isset( $footer_widget_content['font-weight'] ) && '400' != $footer_widget_content['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['font-weight'] ) ) .';' : '';
			echo ( isset( $footer_widget_content['letter-spacing'] ) && '0px' != $footer_widget_content['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['letter-spacing'] ) ) .';' : '';
			echo ( isset( $footer_widget_content['text-transform'] ) && 'none' != $footer_widget_content['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $footer_widget_content['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Footer Widget Link Font
	$footer_widget_link = configurator_dynamic_css_option( 'footer_widget_link_font', array() );

	if( !empty( $footer_widget_link ) ) {
		echo '#footer .widget a, #footer .widget li a, #footer .widget #recentcomments a, #footer .widget.widget_rss a, #footer .widget.widget_rss .comment-author-link {';
			echo ( isset( $footer_widget_link['font-family'] ) && 'Raleway' != $footer_widget_link['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['font-family'] ) ) .';' : '';
			echo ( isset( $footer_widget_link['font-size'] ) && '14px' != $footer_widget_link['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['font-size'] ) ) .';' : '';
			echo ( isset( $footer_widget_link['line-height'] ) && '1.8' != $footer_widget_link['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['line-height'] ) ) .';' : '';
			echo ( isset( $footer_widget_link['color'] ) && '#000' != $footer_widget_link['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['color'] ) ) .';' : '';
			echo ( isset( $footer_widget_link['font-weight'] ) && '400' != $footer_widget_link['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['font-weight'] ) ) .';' : '';
			echo ( isset( $footer_widget_link['letter-spacing'] ) && '0px' != $footer_widget_link['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['letter-spacing'] ) ) .';' : '';
			echo ( isset( $footer_widget_link['text-transform'] ) && 'none' != $footer_widget_link['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $footer_widget_link['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Product Result Count Font
	$product_result_count = configurator_dynamic_css_option( 'product_result_count_font', array() );

	if( !empty( $product_result_count ) ) {
		echo '.woocommerce-result-count {';
			echo ( isset( $product_result_count['font-family'] ) && 'Montserrat' != $product_result_count['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $product_result_count['font-family'] ) ) .';' : '';
			echo ( isset( $product_result_count['font-size'] ) && '13px' != $product_result_count['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $product_result_count['font-size'] ) ) .';' : '';
			echo ( isset( $product_result_count['line-height'] ) && '1.8' != $product_result_count['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $product_result_count['line-height'] ) ) .';' : '';
			echo ( isset( $product_result_count['color'] ) && '#808080' != $product_result_count['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $product_result_count['color'] ) ) .';' : '';
			echo ( isset( $product_result_count['font-weight'] ) && '400' != $product_result_count['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $product_result_count['font-weight'] ) ) .';' : '';
			echo ( isset( $product_result_count['letter-spacing'] ) && '1px' != $product_result_count['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $product_result_count['letter-spacing'] ) ) .';' : '';
			echo ( isset( $product_result_count['text-transform'] ) && 'uppercase' != $product_result_count['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $product_result_count['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Product Sort Font
	$product_sort = configurator_dynamic_css_option( 'product_sort_font', array() );

	if( !empty( $product_sort ) ) {
		echo '.woocommerce-ordering select {';
			echo ( isset( $product_sort['font-family'] ) && 'Montserrat' != $product_sort['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $product_sort['font-family'] ) ) .';' : '';
			echo ( isset( $product_sort['font-size'] ) && '13px' != $product_sort['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $product_sort['font-size'] ) ) .';' : '';
			echo ( isset( $product_sort['line-height'] ) && '1.8' != $product_sort['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $product_sort['line-height'] ) ) .';' : '';
			echo ( isset( $product_sort['color'] ) && '#333' != $product_sort['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $product_sort['color'] ) ) .';' : '';
			echo ( isset( $product_sort['font-weight'] ) && '400' != $product_sort['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $product_sort['font-weight'] ) ) .';' : '';
			echo ( isset( $product_sort['letter-spacing'] ) && '1px' != $product_sort['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $product_sort['letter-spacing'] ) ) .';' : '';
			echo ( isset( $product_sort['text-transform'] ) && 'uppercase' != $product_sort['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $product_sort['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Product Title Font
	$product_title = configurator_dynamic_css_option( 'product_title_font', array() );

	if( !empty( $product_title ) ) {
		echo '.product-content .title, .product-content .title a {';
			echo ( isset( $product_title['font-family'] ) && 'Raleway' != $product_title['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $product_title['font-family'] ) ) .';' : '';
			echo ( isset( $product_title['font-size'] ) && '18px' != $product_title['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $product_title['font-size'] ) ) .';' : '';
			echo ( isset( $product_title['line-height'] ) && '1.8' != $product_title['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $product_title['line-height'] ) ) .';' : '';
			echo ( isset( $product_title['color'] ) && '#333' != $product_title['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $product_title['color'] ) ) .';' : '';
			echo ( isset( $product_title['font-weight'] ) && '700' != $product_title['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $product_title['font-weight'] ) ) .';' : '';
			echo ( isset( $product_title['letter-spacing'] ) && '1px' != $product_title['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $product_title['letter-spacing'] ) ) .';' : '';
			echo ( isset( $product_title['text-transform'] ) && 'uppercase' != $product_title['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $product_title['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Product Price Font
	$product_price = configurator_dynamic_css_option( 'product_price_font', array() );

	if( !empty( $product_price ) ) {
		echo '.product-content .price .woocommerce-Price-amount, .product-content .price {';
			echo ( isset( $product_price['font-family'] ) && 'Montserrat' != $product_price['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $product_price['font-family'] ) ) .';' : '';
			echo ( isset( $product_price['font-size'] ) && '17px' != $product_price['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $product_price['font-size'] ) ) .';' : '';
			echo ( isset( $product_price['line-height'] ) && '1.8' != $product_price['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $product_price['line-height'] ) ) .';' : '';
			echo ( isset( $product_price['color'] ) && '#333' != $product_price['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $product_price['color'] ) ) .';' : '';
			echo ( isset( $product_price['font-weight'] ) && '700' != $product_price['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $product_price['font-weight'] ) ) .';' : '';
			echo ( isset( $product_price['letter-spacing'] ) && '1px' != $product_price['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $product_price['letter-spacing'] ) ) .';' : '';
			echo ( isset( $product_price['text-transform'] ) && 'uppercase' != $product_price['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $product_price['text-transform'] ) ) .';' : '';
		echo '}';
	}

	// Product Button Font
	$product_btn = configurator_dynamic_css_option( 'product_btn_font', array() );

	if( !empty( $product_btn ) ) {
		echo '.product-content .btn, .product-content .btn.btn-primary.btn-solid, .product-content .btn.btn-gradient.btn-solid, .product-content .btn.btn-black.btn-solid, .product-content .btn.btn-custom.btn-solid, .product-content .btn.btn-outline {';
			echo ( isset( $product_btn['font-family'] ) && 'Montserrat' != $product_btn['font-family'] ) ? 'font-family:	'. stripslashes( wp_strip_all_tags( $product_btn['font-family'] ) ) .';' : '';
			echo ( isset( $product_btn['font-size'] ) && '14px' != $product_btn['font-size'] ) ? 'font-size:	'. stripslashes( wp_strip_all_tags( $product_btn['font-size'] ) ) .';' : '';
			echo ( isset( $product_btn['line-height'] ) && '1.8' != $product_btn['line-height'] ) ? 'line-height:	'. stripslashes( wp_strip_all_tags( $product_btn['line-height'] ) ) .';' : '';
			echo ( isset( $product_btn['color'] ) && '#ffffff' != $product_btn['color'] ) ? 'color:	'. stripslashes( wp_strip_all_tags( $product_btn['color'] ) ) .';' : '';
			echo ( isset( $product_btn['font-weight'] ) && '700' != $product_btn['font-weight'] ) ? 'font-weight:	'. stripslashes( wp_strip_all_tags( $product_btn['font-weight'] ) ) .';' : '';
			echo ( isset( $product_btn['letter-spacing'] ) && '1px' != $product_btn['letter-spacing'] ) ? 'letter-spacing:	'. stripslashes( wp_strip_all_tags( $product_btn['letter-spacing'] ) ) .';' : '';
			echo ( isset( $product_btn['text-transform'] ) && 'uppercase' != $product_btn['text-transform'] ) ? 'text-transform:	'. stripslashes( wp_strip_all_tags( $product_btn['text-transform'] ) ) .';' : '';
		echo '}';
	}

}

// Button Settings

// General
$btn_style          = configurator_dynamic_css_option( 'btn_style', 'btn-solid' );
$btn_color          = configurator_dynamic_css_option( 'btn_color', 'btn-primary' );
$btn_custom_color   = configurator_dynamic_css_option( 'btn_custom_color', '' );
$btn_gradient       = configurator_dynamic_css_option( 'btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$btn_text_color     = configurator_dynamic_css_option( 'btn_text_color', '' );
$btn_letter_spacing = configurator_dynamic_css_option( 'btn_letter_spacing', '' );

if( 'btn-solid' == $btn_style ) {
	if( 'btn-custom' == $btn_color || 'btn-gradient' == $btn_color ) {

		echo '.btn.btn-solid.btn-custom.general-btn, .btn.btn-solid.btn-gradient.general-btn {';

			if( 'btn-custom' == $btn_color && !empty( $btn_custom_color ) ) {
				echo ( !empty( $btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $btn_color && !empty( $btn_gradient ) ) {

				$top = isset( $btn_gradient['top'] ) ? $btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $btn_gradient['bottom'] ) ? $btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

			echo ( !empty( $btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $btn_text_color ) ) .';' : '' );
			echo ( !empty( $btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $btn_letter_spacing ) ) .';' : '' );

		echo '}';
	}
}
else if( 'btn-outline' == $btn_style ) {
	if( 'btn-custom' == $btn_color || 'btn-gradient' == $btn_color ) {

		echo '.btn.btn-outline.btn-custom.general-btn, .btn.btn-outline.btn-gradient.general-btn {';

			if( 'btn-custom' == $btn_color && !empty( $btn_custom_color ) ) {
				echo ( !empty( $btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $btn_color && !empty( $btn_gradient ) ) {

				echo ( isset( $btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $btn_gradient['top'] ) ) .';' : '' );
			}

			echo ( !empty( $btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $btn_text_color ) ) .';' : '' );
			echo ( !empty( $btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $btn_letter_spacing ) ) .';' : '' );

		echo '}';
	}
}

// Shop Normal Button
$shop_normal_btn_style          = configurator_dynamic_css_option( 'shop_normal_btn_style', 'btn-solid' );
$shop_normal_btn_style          = ( 'default' != $shop_normal_btn_style ) ? $shop_normal_btn_style : $btn_style;
$shop_normal_btn_color          = configurator_dynamic_css_option( 'shop_normal_btn_color', 'btn-primary' );
$shop_normal_btn_custom_color   = configurator_dynamic_css_option( 'shop_normal_btn_custom_color', '' );
$shop_normal_btn_gradient       = configurator_dynamic_css_option( 'shop_normal_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$shop_normal_btn_text_color     = configurator_dynamic_css_option( 'shop_normal_btn_text_color', '' );
$shop_normal_btn_letter_spacing = configurator_dynamic_css_option( 'shop_normal_btn_letter_spacing', '' );

if( 'btn-custom' == $shop_normal_btn_color || 'btn-gradient' == $shop_normal_btn_color || !empty( $shop_normal_btn_text_color ) || !empty( $shop_normal_btn_letter_spacing ) ) {

	echo '.btn.'. $shop_normal_btn_style .'.btn-custom.shop-normal-btn, .btn.'. $shop_normal_btn_style .'.btn-gradient.shop-normal-btn {';

		if( 'btn-solid' == $shop_normal_btn_style ) {
			if( 'btn-custom' == $shop_normal_btn_color && !empty( $shop_normal_btn_custom_color ) ) {
				echo ( !empty( $shop_normal_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $shop_normal_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $shop_normal_btn_color && !empty( $shop_normal_btn_gradient ) ) {

				$top = isset( $shop_normal_btn_gradient['top'] ) ? $shop_normal_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $shop_normal_btn_gradient['bottom'] ) ? $shop_normal_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $shop_normal_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $shop_normal_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}
		}
		else if( 'btn-outline' == $shop_normal_btn_style ) {
			if( 'btn-custom' == $shop_normal_btn_color && !empty( $shop_normal_btn_custom_color ) ) {
				echo ( !empty( $shop_normal_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $shop_normal_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $shop_normal_btn_color && !empty( $shop_normal_btn_gradient ) ) {

				echo ( isset( $shop_normal_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $shop_normal_btn_gradient['top'] ) ) .';' : '' );
			}
		}

		echo ( !empty( $shop_normal_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $shop_normal_btn_text_color ) ) .';' : '' );
		echo ( !empty( $shop_normal_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $shop_normal_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}

// Shop Customize Button
$shop_customize_btn_style          = configurator_dynamic_css_option( 'shop_customize_btn_style', 'btn-solid' );
$shop_customize_btn_style          = ( 'default' != $shop_customize_btn_style ) ? $shop_customize_btn_style : $btn_style;
$shop_customize_btn_color          = configurator_dynamic_css_option( 'shop_customize_btn_color', 'btn-primary' );
$shop_customize_btn_custom_color   = configurator_dynamic_css_option( 'shop_customize_btn_custom_color', '' );
$shop_customize_btn_gradient       = configurator_dynamic_css_option( 'shop_customize_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$shop_customize_btn_text_color     = configurator_dynamic_css_option( 'shop_customize_btn_text_color', '' );
$shop_customize_btn_letter_spacing = configurator_dynamic_css_option( 'shop_customize_btn_letter_spacing', '' );


if( 'btn-custom' == $shop_customize_btn_color || 'btn-gradient' == $shop_customize_btn_color || !empty( $shop_customize_btn_text_color ) || !empty( $shop_customize_btn_letter_spacing ) ) {

	echo '.btn.'. $shop_customize_btn_style .'.btn-custom.shop-customize-btn, .btn.'. $shop_customize_btn_style .'.btn-gradient.shop-customize-btn {';

		if( 'btn-solid' == $shop_customize_btn_style ) {		

			if( 'btn-custom' == $shop_customize_btn_color && !empty( $shop_customize_btn_custom_color ) ) {
				echo ( !empty( $shop_customize_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $shop_customize_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $shop_customize_btn_color && !empty( $shop_customize_btn_gradient ) ) {

				$top = isset( $shop_customize_btn_gradient['top'] ) ? $shop_customize_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $shop_customize_btn_gradient['bottom'] ) ? $shop_customize_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $shop_customize_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $shop_customize_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

		}
		else if( 'btn-outline' == $shop_customize_btn_style ) {
			if( 'btn-custom' == $shop_customize_btn_color && !empty( $shop_customize_btn_custom_color ) ) {
				echo ( !empty( $shop_customize_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $shop_customize_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $shop_customize_btn_color && !empty( $shop_customize_btn_gradient ) ) {

				echo ( isset( $shop_customize_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $shop_customize_btn_gradient['top'] ) ) .';' : '' );
			}
		}

		echo ( !empty( $shop_customize_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $shop_customize_btn_text_color ) ) .';' : '' );
		echo ( !empty( $shop_customize_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $shop_customize_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}

// Single Product Cart Button
$single_product_cart_btn_style          = configurator_dynamic_css_option( 'single_product_cart_btn_style', 'btn-solid' );
$single_product_cart_btn_style          = ( 'default' != $single_product_cart_btn_style ) ? $single_product_cart_btn_style : $btn_style;
$single_product_cart_btn_color          = configurator_dynamic_css_option( 'single_product_cart_btn_color', 'btn-primary' );
$single_product_cart_btn_custom_color   = configurator_dynamic_css_option( 'single_product_cart_btn_custom_color', '' );
$single_product_cart_btn_gradient       = configurator_dynamic_css_option( 'single_product_cart_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$single_product_cart_btn_text_color     = configurator_dynamic_css_option( 'single_product_cart_btn_text_color', '' );
$single_product_cart_btn_letter_spacing = configurator_dynamic_css_option( 'single_product_cart_btn_letter_spacing', '' );

if( 'btn-custom' == $single_product_cart_btn_color || 'btn-gradient' == $single_product_cart_btn_color || !empty( $single_product_cart_btn_text_color ) || !empty( $single_product_cart_btn_letter_spacing ) ) {
	
	echo '.btn.'. $single_product_cart_btn_style .'.btn-custom.single-product-cart-btn, .btn.'. $single_product_cart_btn_style .'.btn-gradient.single-product-cart-btn {';

		if( 'btn-solid' == $single_product_cart_btn_style ) {		

			if( 'btn-custom' == $single_product_cart_btn_color && !empty( $single_product_cart_btn_custom_color ) ) {
				echo ( !empty( $single_product_cart_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $single_product_cart_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $single_product_cart_btn_color && !empty( $single_product_cart_btn_gradient ) ) {

				$top = isset( $single_product_cart_btn_gradient['top'] ) ? $single_product_cart_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $single_product_cart_btn_gradient['bottom'] ) ? $single_product_cart_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $single_product_cart_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $single_product_cart_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}
		}
		else if( 'btn-outline' == $single_product_cart_btn_style ) {

			if( 'btn-custom' == $single_product_cart_btn_color && !empty( $single_product_cart_btn_custom_color ) ) {
				echo ( !empty( $single_product_cart_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $single_product_cart_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $single_product_cart_btn_color && !empty( $single_product_cart_btn_gradient ) ) {

				echo ( isset( $single_product_cart_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $single_product_cart_btn_gradient['top'] ) ) .';' : '' );
			}
		}

		echo ( !empty( $single_product_cart_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $single_product_cart_btn_text_color ) ) .';' : '' );			
		echo ( !empty( $single_product_cart_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $single_product_cart_btn_letter_spacing ) ) .';' : '' );

	echo '}';

}

// Related Product Normal Button
$related_product_normal_btn_style          = configurator_dynamic_css_option( 'related_product_normal_btn_style', 'btn-solid' );
$related_product_normal_btn_style          = ( 'default' != $related_product_normal_btn_style ) ? $related_product_normal_btn_style : $btn_style;
$related_product_normal_btn_color          = configurator_dynamic_css_option( 'related_product_normal_btn_color', 'btn-primary' );
$related_product_normal_btn_custom_color   = configurator_dynamic_css_option( 'related_product_normal_btn_custom_color', '' );
$related_product_normal_btn_gradient       = configurator_dynamic_css_option( 'related_product_normal_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$related_product_normal_btn_text_color     = configurator_dynamic_css_option( 'related_product_normal_btn_text_color', '' );
$related_product_normal_btn_letter_spacing = configurator_dynamic_css_option( 'related_product_normal_btn_letter_spacing', '' );


if( 'btn-custom' == $related_product_normal_btn_color || 'btn-gradient' == $related_product_normal_btn_color || !empty( $related_product_normal_btn_text_color ) || !empty( $related_product_normal_btn_letter_spacing ) ) {

	echo '.btn.'. $related_product_normal_btn_style .'.btn-custom.related-product-normal-btn, .btn.'. $related_product_normal_btn_style .'.btn-gradient.related-product-normal-btn {';

		if( 'btn-solid' == $related_product_normal_btn_style ) {		

			if( 'btn-custom' == $related_product_normal_btn_color && !empty( $related_product_normal_btn_custom_color ) ) {
				echo ( !empty( $related_product_normal_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $related_product_normal_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $related_product_normal_btn_color && !empty( $related_product_normal_btn_gradient ) ) {

				$top = isset( $related_product_normal_btn_gradient['top'] ) ? $related_product_normal_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $related_product_normal_btn_gradient['bottom'] ) ? $related_product_normal_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $related_product_normal_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $related_product_normal_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}
		}
		else if( 'btn-outline' == $related_product_normal_btn_style ) {
			if( 'btn-custom' == $related_product_normal_btn_color && !empty( $related_product_normal_btn_custom_color ) ) {
				echo ( !empty( $related_product_normal_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $related_product_normal_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $related_product_normal_btn_color && !empty( $related_product_normal_btn_gradient ) ) {

				echo ( isset( $related_product_normal_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $related_product_normal_btn_gradient['top'] ) ) .';' : '' );
			}
		}

		echo ( !empty( $related_product_normal_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $related_product_normal_btn_text_color ) ) .';' : '' );			
		echo ( !empty( $related_product_normal_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $related_product_normal_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}

// Related Product Customize Button
$related_product_customize_btn_style          = configurator_dynamic_css_option( 'related_product_customize_btn_style', 'btn-solid' );
$related_product_customize_btn_style          = ( 'default' != $related_product_customize_btn_style ) ? $related_product_customize_btn_style : $btn_style;
$related_product_customize_btn_color          = configurator_dynamic_css_option( 'related_product_customize_btn_color', 'btn-primary' );
$related_product_customize_btn_custom_color   = configurator_dynamic_css_option( 'related_product_customize_btn_custom_color', '' );
$related_product_customize_btn_gradient       = configurator_dynamic_css_option( 'related_product_customize_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$related_product_customize_btn_text_color     = configurator_dynamic_css_option( 'related_product_customize_btn_text_color', '' );
$related_product_customize_btn_letter_spacing = configurator_dynamic_css_option( 'related_product_customize_btn_letter_spacing', '' );

if( 'btn-custom' == $related_product_customize_btn_color || 'btn-gradient' == $related_product_customize_btn_color || !empty( $related_product_customize_btn_text_color ) || !empty( $related_product_customize_btn_letter_spacing ) ) {

	echo '.btn.'. $related_product_customize_btn_style .'.btn-custom.related-product-customize-btn, .btn.'. $related_product_customize_btn_style .'.btn-gradient.related-product-customize-btn {';

		if( 'btn-solid' == $related_product_customize_btn_style ) {

			if( 'btn-custom' == $related_product_customize_btn_color && !empty( $related_product_customize_btn_custom_color ) ) {
				echo ( !empty( $related_product_customize_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $related_product_customize_btn_custom_color) ) .';' : '' );
			}
			else if( 'btn-gradient' == $related_product_customize_btn_color && !empty( $related_product_customize_btn_gradient ) ) {

				$top = isset( $related_product_customize_btn_gradient['top'] ) ? $related_product_customize_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $related_product_customize_btn_gradient['bottom'] ) ? $related_product_customize_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $related_product_customize_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $related_product_customize_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

		}
		else if( 'btn-outline' == $related_product_customize_btn_style ) {

			if( 'btn-custom' == $related_product_customize_btn_color && !empty( $related_product_customize_btn_custom_color ) ) {
				echo ( !empty( $related_product_customize_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $related_product_customize_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $related_product_customize_btn_color && !empty( $related_product_customize_btn_gradient ) ) {

				echo ( isset( $related_product_customize_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $related_product_customize_btn_gradient['top'] ) ) .';' : '' );

			}
		}

		echo ( !empty( $related_product_customize_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $related_product_customize_btn_text_color ) ) .';' : '' );
		echo ( !empty( $related_product_customize_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $related_product_customize_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}

// Cart Page Apply Coupon Button
$cart_apply_coupon_btn_style          = configurator_dynamic_css_option( 'cart_apply_coupon_btn_style', 'btn-solid' );
$cart_apply_coupon_btn_style          = ( 'default' != $cart_apply_coupon_btn_style ) ? $cart_apply_coupon_btn_style : $btn_style;
$cart_apply_coupon_btn_color          = configurator_dynamic_css_option( 'cart_apply_coupon_btn_color', 'btn-primary' );
$cart_apply_coupon_btn_custom_color   = configurator_dynamic_css_option( 'cart_apply_coupon_btn_custom_color', '' );
$cart_apply_coupon_btn_gradient       = configurator_dynamic_css_option( 'cart_apply_coupon_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$cart_apply_coupon_btn_text_color     = configurator_dynamic_css_option( 'cart_apply_coupon_btn_text_color', '' );
$cart_apply_coupon_btn_letter_spacing = configurator_dynamic_css_option( 'cart_apply_coupon_btn_letter_spacing', '' );

if( 'btn-custom' == $cart_apply_coupon_btn_color || 'btn-gradient' == $cart_apply_coupon_btn_color || !empty( $cart_apply_coupon_btn_text_color ) || !empty( $cart_apply_coupon_btn_letter_spacing ) ) {

	echo '.btn.'. $cart_apply_coupon_btn_style .'.btn-custom.cart-apply-coupon-btn, .btn.'. $cart_apply_coupon_btn_style .'.btn-gradient.cart-apply-coupon-btn {';

		if( 'btn-solid' == $cart_apply_coupon_btn_style ) {		

			if( 'btn-custom' == $cart_apply_coupon_btn_color && !empty( $cart_apply_coupon_btn_custom_color ) ) {
				echo ( !empty( $cart_apply_coupon_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $cart_apply_coupon_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $cart_apply_coupon_btn_color && !empty( $cart_apply_coupon_btn_gradient ) ) {

				$top = isset( $cart_apply_coupon_btn_gradient['top'] ) ? $cart_apply_coupon_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $cart_apply_coupon_btn_gradient['bottom'] ) ? $cart_apply_coupon_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $cart_apply_coupon_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $cart_apply_coupon_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

		}
		else if( 'btn-outline' == $cart_apply_coupon_btn_style ) {
			if( 'btn-custom' == $cart_apply_coupon_btn_color && !empty( $cart_apply_coupon_btn_custom_color ) ) {
				echo ( !empty( $cart_apply_coupon_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $cart_apply_coupon_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $cart_apply_coupon_btn_color && !empty( $cart_apply_coupon_btn_gradient ) ) {

				echo ( isset( $cart_apply_coupon_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $cart_apply_coupon_btn_gradient['top'] ) ) .';' : '' );
			}
		}

		echo ( !empty( $cart_apply_coupon_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $cart_apply_coupon_btn_text_color ) ) .';' : '' );
		echo ( !empty( $cart_apply_coupon_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $cart_apply_coupon_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}

// Cart Page Update Cart Button
$update_cart_btn_style          = configurator_dynamic_css_option( 'update_cart_btn_style', 'btn-solid' );
$update_cart_btn_style          = ( 'default' != $update_cart_btn_style ) ? $update_cart_btn_style : $btn_style;
$update_cart_btn_color          = configurator_dynamic_css_option( 'update_cart_btn_color', 'btn-primary' );
$update_cart_btn_custom_color   = configurator_dynamic_css_option( 'update_cart_btn_custom_color', '' );
$update_cart_btn_gradient       = configurator_dynamic_css_option( 'update_cart_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$update_cart_btn_text_color     = configurator_dynamic_css_option( 'update_cart_btn_text_color', '' );
$update_cart_btn_letter_spacing = configurator_dynamic_css_option( 'update_cart_btn_letter_spacing', '' );

if( 'btn-custom' == $update_cart_btn_color || 'btn-gradient' == $update_cart_btn_color || !empty( $update_cart_btn_text_color ) || !empty( $update_cart_btn_letter_spacing ) ) {

	echo '.btn.'. $update_cart_btn_style .'.btn-custom.update-cart-btn, .btn.'. $update_cart_btn_style .'.btn-gradient.update-cart-btn {';

		if( 'btn-solid' == $update_cart_btn_style ) {

			if( 'btn-custom' == $update_cart_btn_color && !empty( $update_cart_btn_custom_color ) ) {
				echo ( !empty( $update_cart_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $update_cart_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $update_cart_btn_color && !empty( $update_cart_btn_gradient ) ) {

				$top = isset( $update_cart_btn_gradient['top'] ) ? $update_cart_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $update_cart_btn_gradient['bottom'] ) ? $update_cart_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $update_cart_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $update_cart_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

		}
		else if( 'btn-outline' == $update_cart_btn_style ) {

			if( 'btn-custom' == $update_cart_btn_color && !empty( $update_cart_btn_custom_color ) ) {
				echo ( !empty( $update_cart_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $update_cart_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $update_cart_btn_color && !empty( $update_cart_btn_gradient ) ) {

				echo ( isset( $update_cart_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $update_cart_btn_gradient['top'] ) ) .';' : '' );
			}

		}

		echo ( !empty( $update_cart_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $update_cart_btn_text_color ) ) .';' : '' );
		echo ( !empty( $update_cart_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $update_cart_btn_letter_spacing ) ) .';' : '' );

	echo '}';

}

// Cart Page Checkout Button
$cart_checkout_btn_style          = configurator_dynamic_css_option( 'cart_checkout_btn_style', 'btn-solid' );
$cart_checkout_btn_style          = ( 'default' != $cart_checkout_btn_style ) ? $cart_checkout_btn_style : $btn_style;
$cart_checkout_btn_color          = configurator_dynamic_css_option( 'cart_checkout_btn_color', 'btn-primary' );
$cart_checkout_btn_custom_color   = configurator_dynamic_css_option( 'cart_checkout_btn_custom_color', '' );
$cart_checkout_btn_gradient       = configurator_dynamic_css_option( 'cart_checkout_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$cart_checkout_btn_text_color     = configurator_dynamic_css_option( 'cart_checkout_btn_text_color', '' );
$cart_checkout_btn_letter_spacing = configurator_dynamic_css_option( 'cart_checkout_btn_letter_spacing', '' );

if( 'btn-custom' == $cart_checkout_btn_color || 'btn-gradient' == $cart_checkout_btn_color || !empty( $cart_checkout_btn_text_color ) || !empty( $cart_checkout_btn_letter_spacing ) ) {

	echo '.btn.'. $cart_checkout_btn_style .'.btn-custom.cart-checkout-btn, .btn.'. $cart_checkout_btn_style .'.btn-gradient.cart-checkout-btn {';

		if( 'btn-solid' == $cart_checkout_btn_style ) {
	
			if( 'btn-custom' == $cart_checkout_btn_color && !empty( $cart_checkout_btn_custom_color ) ) {
				echo ( !empty( $cart_checkout_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $cart_checkout_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $cart_checkout_btn_color && !empty( $cart_checkout_btn_gradient ) ) {

				$top = isset( $cart_checkout_btn_gradient['top'] ) ? $cart_checkout_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $cart_checkout_btn_gradient['bottom'] ) ? $cart_checkout_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $cart_checkout_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $cart_checkout_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

		}
		else if( 'btn-outline' == $cart_checkout_btn_style ) {

			if( 'btn-custom' == $cart_checkout_btn_color && !empty( $cart_checkout_btn_custom_color ) ) {
				echo ( !empty( $cart_checkout_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $cart_checkout_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $cart_checkout_btn_color && !empty( $cart_checkout_btn_gradient ) ) {

				echo ( isset( $cart_checkout_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $cart_checkout_btn_gradient['top'] ) ) .';' : '' );
			}

		}

		echo ( !empty( $cart_checkout_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $cart_checkout_btn_text_color ) ) .';' : '' );
		echo ( !empty( $cart_checkout_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $cart_checkout_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}

// Check Out Page Order Button
$checkout_order_btn_style          = configurator_dynamic_css_option( 'checkout_order_btn_style', 'btn-solid' );
$checkout_order_btn_style          = ( 'default' != $checkout_order_btn_style ) ? $checkout_order_btn_style : $btn_style;
$checkout_order_btn_color          = configurator_dynamic_css_option( 'checkout_order_btn_color', 'btn-primary' );
$checkout_order_btn_custom_color   = configurator_dynamic_css_option( 'checkout_order_btn_custom_color', '' );
$checkout_order_btn_gradient       = configurator_dynamic_css_option( 'checkout_order_btn_gradient', array( 'top' => '#8579af', 'bottom' => '#be3658' ) );
$checkout_order_btn_text_color     = configurator_dynamic_css_option( 'checkout_order_btn_text_color', '' );
$checkout_order_btn_letter_spacing = configurator_dynamic_css_option( 'checkout_order_btn_letter_spacing', '' );

if( 'btn-custom' == $checkout_order_btn_color || 'btn-gradient' == $checkout_order_btn_color || !empty( $checkout_order_btn_text_color ) || !empty( $checkout_order_btn_letter_spacing ) ) {

	echo '.btn.'. $checkout_order_btn_style .'.btn-custom.checkout-order-btn, .btn.'. $checkout_order_btn_style .'.btn-gradient.checkout-order-btn {';

		if( 'btn-solid' == $checkout_order_btn_style ) {
	
			if( 'btn-custom' == $checkout_order_btn_color && !empty( $checkout_order_btn_custom_color ) ) {
				echo ( !empty( $checkout_order_btn_custom_color ) ? 'background: '. stripslashes( wp_strip_all_tags( $checkout_order_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $checkout_order_btn_color && !empty( $checkout_order_btn_gradient ) ) {

				$top = isset( $checkout_order_btn_gradient['top'] ) ? $checkout_order_btn_gradient['top'].' 0%, ' : '';
				$bottom = isset( $checkout_order_btn_gradient['bottom'] ) ? $checkout_order_btn_gradient['bottom'].' 100% ' : '';

				echo ( isset( $checkout_order_btn_gradient['top'] ) ? 'background: '. stripslashes( wp_strip_all_tags( $checkout_order_btn_gradient['top'] ) ) .';' : '' );
				echo 'background: -moz-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: -webkit-linear-gradient( left, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
				echo 'background: linear-gradient( to right, ' . stripslashes( wp_strip_all_tags( $top . $bottom ) ) .');';
			}

		}
		else if( 'btn-outline' == $checkout_order_btn_style ) {

			if( 'btn-custom' == $checkout_order_btn_color && !empty( $checkout_order_btn_custom_color ) ) {
				echo ( !empty( $checkout_order_btn_custom_color ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $checkout_order_btn_custom_color ) ) .';' : '' );
			}
			else if( 'btn-gradient' == $checkout_order_btn_color && !empty( $checkout_order_btn_gradient ) ) {

				echo ( isset( $checkout_order_btn_gradient['top'] ) ? 'border: 1px solid '. stripslashes( wp_strip_all_tags( $checkout_order_btn_gradient['top'] ) ) .';' : '' );
			}

		}

		echo ( !empty( $checkout_order_btn_text_color ) ? 'color: '. stripslashes( wp_strip_all_tags( $checkout_order_btn_text_color ) ) .';' : '' );
		echo ( !empty( $checkout_order_btn_letter_spacing ) ? 'letter-spacing: '. stripslashes( wp_strip_all_tags( $checkout_order_btn_letter_spacing ) ) .';' : '' );

	echo '}';
}