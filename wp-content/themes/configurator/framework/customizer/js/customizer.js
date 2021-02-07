/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	'use strict';

	wp.customize( 'search_text', function( value ) {
		value.bind( function( to ) {
			$('.topSearchForm input[name="s"]').val( to );
		} );
	} );

	wp.customize( 'form_style', function( value ) {
		value.bind( function( to ) {
			var $body = $('body');
			$body.removeClass( 'form-square' );
			$body.removeClass( 'form-line' );
			$body.removeClass( 'form-rounded' );
			$body.addClass( 'form-'+to );
		} );
	} );

	wp.customize( 'facebook', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.facebook').attr( 'href', to );
		} );
	} );

	wp.customize( 'twitter', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.twitter').attr( 'href', to );
		} );
	} );

	wp.customize( 'gplus', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.gplus').attr( 'href', to );
		} );
	} );

	wp.customize( 'linkedin', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.linkedin').attr( 'href', to );
		} );
	} );

	wp.customize( 'dribbble', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.dribbble').attr( 'href', to );
		} );
	} );

	wp.customize( 'flickr', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.flickr').attr( 'href', to );
		} );
	} );

	wp.customize( 'pinterest', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.pinterest').attr( 'href', to );
		} );
	} );

	wp.customize( 'tumblr', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.tumblr').attr( 'href', to );
		} );
	} );

	wp.customize( 'rss', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.rss').attr( 'href', to );
		} );
	} );

	wp.customize( 'instagram', function( value ) {
		value.bind( function( to ) {
			$('.header-elem .social-icons a.instagram').attr( 'href', to );
		} );
	} );

	wp.customize( 'footer_fixed', function( value ) {
		value.bind( function( to ) {
			if( 'no' == to ) {
				$('#footer').removeClass('footer-fixed');
			}
			else {
				$('#footer').addClass('footer-fixed');
			}
		} );
	} );

	wp.customize( 'footer_style', function( value ) {
		value.bind( function( to ) {
			if( 'light' == to ) {
				$('#footer').addClass('footer-light').removeClass('footer-dark');
			}
			else {
				$('#footer').addClass('footer-dark').removeClass('footer-light');
			}
		} );
	} );

	wp.customize( 'shop_style', function( value ) {
		value.bind( function( to ) {
			var $wooProducts = $('.woo-products');
			$wooProducts.removeClass( 'shop-grid shop-list' );
			$wooProducts.addClass( 'shop-'+to );
		} );
	} );

	wp.customize( 'shop_btn_on_hover', function( value ) {
		value.bind( function( to ) {
			if( 'no' == to ) {
				$('body.archive .woo-products li').removeClass('btn-on-hover');
			}
			else {
				$('body.archive .woo-products li').addClass('btn-on-hover');
			}
		} );
	} );

	wp.customize( 'single_product_related_product_style', function( value ) {
		value.bind( function( to ) {
			var $related = $('.related');
			$related.removeClass( 'product-grid product-list' );
			$related.addClass( to );
		} );
	} );

	wp.customize( 'single_product_related_product_column', function( value ) {
		value.bind( function( to ) {
			var $related = $('.related');
			$related.removeClass( 'col2 col3 col4' );
			$related.addClass( to );
		} );
	} );

	wp.customize( 'shop_related_on_hover', function( value ) {
		value.bind( function( to ) {
			if( 'no' == to ) {
				$('body.single-product .woo-products li').removeClass('btn-on-hover');
			}
			else {
				$('body.single-product .woo-products li').addClass('btn-on-hover');
			}
		} );
	} );

	wp.customize( 'single_comment_form_btn_text', function( value ) {
		value.bind( function( to ) {
			$('#commentform #submit').val( to );
		} );
	} );

	// Top Header change class
	wp.customize( 'top_section_style', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.pageTopCon' ).addClass( 'top-sec-dark' );
			} else {
				$( '.pageTopCon' ).removeClass( 'top-sec-dark' );
			}
		} );
	} );

	wp.customize( 'top_header_mobile', function( value ) {
		value.bind( function( to ) {
			if( 'hide' == to ) {
				$( '.pageTopCon' ).addClass( 'top-header-mobile-hide' );
			} else {
				$( '.pageTopCon' ).removeClass( 'top-header-mobile-hide' );
			}

		} );
	} );

	wp.customize( 'top_email', function( value ) {
		value.bind( function( to ) {
			$( '.top-header-email-text' ).attr( 'href', 'mailto:' + to ).find('.top-header-email-text').text( to );
			
		} );
	} );


	// Header Background change class
	wp.customize( 'header_background_style', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-wrap' ).addClass( 'dark' );
			} else {
				$( '.header-wrap' ).removeClass( 'dark' );
			}
		} );
	} );


	// Header Border change class
	wp.customize( 'header_line', function( value ) {
		value.bind( function( to ) {
			if( 'no' == to ) {
				$( '.header-wrap' ).addClass( 'header-line-no' );
			} else {
				$( '.header-wrap' ).removeClass( 'header-line-no' );
			}
		} );
	} );

	// Header Border change class
	wp.customize( 'transparent_header_opacity', function( value ) {
		value.bind( function( to ) {
			$( '.transparent-header' ).removeClass('opacity-0 opacity-10 opacity-20 opacity-30 opacity-40 opacity-50 opacity-60 opacity-70 opacity-80 opacity-90').addClass( 'opacity-' + to );
		} );
	} );


	// Sticky Header change class
	wp.customize( 'sticky_header', function( value ) {
		value.bind( function( to ) {
			console.log( to );
			if( 'scroll_up' == to ) {
				$( '.header-con' ).addClass( 'pix-sticky-header pix-sticky-header-scroll-up' );
			} else if( 'enable' == to ) {
				$( '.header-con' ).removeClass( 'pix-sticky-header-scroll-up' ).addClass( 'pix-sticky-header' );
			} else {
				$( '.header-con' ).removeClass( 'pix-sticky-header pix-sticky-header-scroll-up' );
			}
		} );
	} );

	// Sticky Header Background change class
	wp.customize( 'header_sticky_color', function( value ) {
		value.bind( function( to ) {
			if( 'light' == to ) {
				$( '.header-con' ).removeClass( 'sticky-dark' ).addClass( 'sticky-light' );
			} else {
				$( '.header-con' ).removeClass( 'sticky-light' ).addClass( 'sticky-dark' );
			}
		} );
	} );

	// Header Menu Color change class
	wp.customize( 'main_menu', function( value ) {
		value.bind( function( to ) {
			if( 'light' == to ) {
				$( '.header-con' ).removeClass( 'menu-dark' ).addClass( 'menu-light' );
			} else {
				$( '.header-con' ).removeClass( 'menu-light' ).addClass( 'menu-dark' );
			}
		} );
	} );

	// Header Sub Menu Color change class
	wp.customize( 'dropdown_menu_style', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-con' ).addClass( 'sub-menu-dark' );
			} else {
				$( '.header-con' ).removeClass( 'sub-menu-dark' );
			}
		} );
	} );
	
	/* Button Settings */

	// Shop Normal Button
	
	wp.customize( 'shop_normal_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.shop-normal-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'shop_normal_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.shop-normal-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'shop_normal_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.shop-normal-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'shop_normal_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.shop-normal-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'shop_normal_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'shop_normal_btn_gradient' ).get(),
				custom = wp.customize( 'shop_normal_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				shop_normal_btn_style = wp.customize( 'shop_normal_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.shop-normal-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != shop_normal_btn_style ) ? shop_normal_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'shop_normal_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				shop_normal_btn_style = wp.customize( 'shop_normal_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				shop_normal_btn_color = wp.customize( 'shop_normal_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.shop-normal-btn');

			current_btn_style = ( 'default' != shop_normal_btn_style ) ? shop_normal_btn_style : btn_style;
			current_btn_color = ( 'default' != shop_normal_btn_color ) ? shop_normal_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'shop_normal_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				shop_normal_btn_style = wp.customize( 'shop_normal_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				shop_normal_btn_color = wp.customize( 'shop_normal_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.shop-normal-btn');

			current_btn_style = ( 'default' != shop_normal_btn_style ) ? shop_normal_btn_style : btn_style;
			current_btn_color = ( 'default' != shop_normal_btn_color ) ? shop_normal_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'shop_normal_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.shop-normal-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'shop_normal_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.shop-normal-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Shop Customize Button
	
	wp.customize( 'shop_customize_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.shop-customize-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'shop_customize_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.shop-customize-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'shop_customize_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.shop-customize-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'shop_customize_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.shop-customize-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'shop_customize_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'shop_customize_btn_gradient' ).get(),
				custom = wp.customize( 'shop_customize_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				shop_customize_btn_style = wp.customize( 'shop_customize_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.shop-customize-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != shop_customize_btn_style ) ? shop_customize_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'shop_customize_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				shop_customize_btn_style = wp.customize( 'shop_customize_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				shop_customize_btn_color = wp.customize( 'shop_customize_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.shop-customize-btn');

			current_btn_style = ( 'default' != shop_customize_btn_style ) ? shop_customize_btn_style : btn_style;
			current_btn_color = ( 'default' != shop_customize_btn_color ) ? shop_customize_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'shop_customize_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				shop_customize_btn_style = wp.customize( 'shop_customize_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				shop_customize_btn_color = wp.customize( 'shop_customize_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.shop-customize-btn');

			current_btn_style = ( 'default' != shop_customize_btn_style ) ? shop_customize_btn_style : btn_style;
			current_btn_color = ( 'default' != shop_customize_btn_color ) ? shop_customize_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'shop_customize_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.shop-customize-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'shop_customize_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.shop-customize-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Single Product Cart Button
	
	wp.customize( 'single_product_cart_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.single-product-cart-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.single-product-cart-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'single_product_cart_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.single-product-cart-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.single-product-cart-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'single_product_cart_btn_gradient' ).get(),
				custom = wp.customize( 'single_product_cart_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				single_product_cart_btn_style = wp.customize( 'single_product_cart_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.single-product-cart-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != single_product_cart_btn_style ) ? single_product_cart_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				single_product_cart_btn_style = wp.customize( 'single_product_cart_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				single_product_cart_btn_color = wp.customize( 'single_product_cart_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.single-product-cart-btn');

			current_btn_style = ( 'default' != single_product_cart_btn_style ) ? single_product_cart_btn_style : btn_style;
			current_btn_color = ( 'default' != single_product_cart_btn_color ) ? single_product_cart_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				single_product_cart_btn_style = wp.customize( 'single_product_cart_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				single_product_cart_btn_color = wp.customize( 'single_product_cart_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.single-product-cart-btn');

			current_btn_style = ( 'default' != single_product_cart_btn_style ) ? single_product_cart_btn_style : btn_style;
			current_btn_color = ( 'default' != single_product_cart_btn_color ) ? single_product_cart_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.single-product-cart-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.single-product-cart-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );

	wp.customize( 'single_product_cart_btn_overlap', function( value ) {
		value.bind( function( to ) {

			var $form = $('form.cart');

			$form.removeClass('overlap no-overlap').addClass(to);
			
		} );
	} );


	// Related Product Normal Button
	
	wp.customize( 'related_product_normal_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.related-product-normal-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.related-product-normal-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'related_product_normal_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.related-product-normal-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.related-product-normal-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'related_product_normal_btn_gradient' ).get(),
				custom = wp.customize( 'related_product_normal_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				related_product_normal_btn_style = wp.customize( 'related_product_normal_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.related-product-normal-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != related_product_normal_btn_style ) ? related_product_normal_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				related_product_normal_btn_style = wp.customize( 'related_product_normal_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				related_product_normal_btn_color = wp.customize( 'related_product_normal_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.related-product-normal-btn');

			current_btn_style = ( 'default' != related_product_normal_btn_style ) ? related_product_normal_btn_style : btn_style;
			current_btn_color = ( 'default' != related_product_normal_btn_color ) ? related_product_normal_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				related_product_normal_btn_style = wp.customize( 'related_product_normal_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				related_product_normal_btn_color = wp.customize( 'related_product_normal_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.related-product-normal-btn');

			current_btn_style = ( 'default' != related_product_normal_btn_style ) ? related_product_normal_btn_style : btn_style;
			current_btn_color = ( 'default' != related_product_normal_btn_color ) ? related_product_normal_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.related-product-normal-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'related_product_normal_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.related-product-normal-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Related Product Customize Button
	
	wp.customize( 'related_product_customize_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.related-product-customize-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.related-product-customize-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'related_product_customize_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.related-product-customize-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.related-product-customize-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'related_product_customize_btn_gradient' ).get(),
				custom = wp.customize( 'related_product_customize_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				related_product_customize_btn_style = wp.customize( 'related_product_customize_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.related-product-customize-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != related_product_customize_btn_style ) ? related_product_customize_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				related_product_customize_btn_style = wp.customize( 'related_product_customize_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				related_product_customize_btn_color = wp.customize( 'related_product_customize_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.related-product-customize-btn');

			current_btn_style = ( 'default' != related_product_customize_btn_style ) ? related_product_customize_btn_style : btn_style;
			current_btn_color = ( 'default' != related_product_customize_btn_color ) ? related_product_customize_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				related_product_customize_btn_style = wp.customize( 'related_product_customize_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				related_product_customize_btn_color = wp.customize( 'related_product_customize_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.related-product-customize-btn');

			current_btn_style = ( 'default' != related_product_customize_btn_style ) ? related_product_customize_btn_style : btn_style;
			current_btn_color = ( 'default' != related_product_customize_btn_color ) ? related_product_customize_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.related-product-customize-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'related_product_customize_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.related-product-customize-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Cart Page Apply Coupon Button
	
	wp.customize( 'cart_apply_coupon_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.cart-apply-coupon-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.cart-apply-coupon-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.cart-apply-coupon-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.cart-apply-coupon-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'cart_apply_coupon_btn_gradient' ).get(),
				custom = wp.customize( 'cart_apply_coupon_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				cart_apply_coupon_btn_style = wp.customize( 'cart_apply_coupon_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.cart-apply-coupon-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != cart_apply_coupon_btn_style ) ? cart_apply_coupon_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				cart_apply_coupon_btn_style = wp.customize( 'cart_apply_coupon_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				cart_apply_coupon_btn_color = wp.customize( 'cart_apply_coupon_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.cart-apply-coupon-btn');

			current_btn_style = ( 'default' != cart_apply_coupon_btn_style ) ? cart_apply_coupon_btn_style : btn_style;
			current_btn_color = ( 'default' != cart_apply_coupon_btn_color ) ? cart_apply_coupon_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				cart_apply_coupon_btn_style = wp.customize( 'cart_apply_coupon_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				cart_apply_coupon_btn_color = wp.customize( 'cart_apply_coupon_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.cart-apply-coupon-btn');

			current_btn_style = ( 'default' != cart_apply_coupon_btn_style ) ? cart_apply_coupon_btn_style : btn_style;
			current_btn_color = ( 'default' != cart_apply_coupon_btn_color ) ? cart_apply_coupon_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.cart-apply-coupon-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'cart_apply_coupon_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.cart-apply-coupon-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Cart Page Update Cart Button
	
	wp.customize( 'update_cart_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.update-cart-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'update_cart_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.update-cart-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'update_cart_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.update-cart-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'update_cart_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.update-cart-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'update_cart_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'update_cart_btn_gradient' ).get(),
				custom = wp.customize( 'update_cart_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				update_cart_btn_style = wp.customize( 'update_cart_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.update-cart-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != update_cart_btn_style ) ? update_cart_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'update_cart_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				update_cart_btn_style = wp.customize( 'update_cart_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				update_cart_btn_color = wp.customize( 'update_cart_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.update-cart-btn');

			current_btn_style = ( 'default' != update_cart_btn_style ) ? update_cart_btn_style : btn_style;
			current_btn_color = ( 'default' != update_cart_btn_color ) ? update_cart_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'update_cart_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				update_cart_btn_style = wp.customize( 'update_cart_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				update_cart_btn_color = wp.customize( 'update_cart_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.update-cart-btn');

			current_btn_style = ( 'default' != update_cart_btn_style ) ? update_cart_btn_style : btn_style;
			current_btn_color = ( 'default' != update_cart_btn_color ) ? update_cart_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'update_cart_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.update-cart-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'update_cart_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.update-cart-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Cart Page Checkout Button
	
	wp.customize( 'cart_checkout_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.cart-checkout-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.cart-checkout-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'cart_checkout_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.cart-checkout-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.cart-checkout-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'cart_checkout_btn_gradient' ).get(),
				custom = wp.customize( 'cart_checkout_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				cart_checkout_btn_style = wp.customize( 'cart_checkout_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.cart-checkout-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != cart_checkout_btn_style ) ? cart_checkout_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				cart_checkout_btn_style = wp.customize( 'cart_checkout_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				cart_checkout_btn_color = wp.customize( 'cart_checkout_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.cart-checkout-btn');

			current_btn_style = ( 'default' != cart_checkout_btn_style ) ? cart_checkout_btn_style : btn_style;
			current_btn_color = ( 'default' != cart_checkout_btn_color ) ? cart_checkout_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				cart_checkout_btn_style = wp.customize( 'cart_checkout_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				cart_checkout_btn_color = wp.customize( 'cart_checkout_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.cart-checkout-btn');

			current_btn_style = ( 'default' != cart_checkout_btn_style ) ? cart_checkout_btn_style : btn_style;
			current_btn_color = ( 'default' != cart_checkout_btn_color ) ? cart_checkout_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.cart-checkout-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'cart_checkout_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.cart-checkout-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	// Check Out Page Order Button
	
	wp.customize( 'checkout_order_btn_style', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(),
				current,
				$btn = $('.checkout-order-btn');

			$btn.removeClass( 'btn-solid btn-outline' );
			
			current = ( 'default' != to ) ? to : btn_style;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'checkout_order_btn_text_style', function( value ) {
		value.bind( function( to ) {

			var btn_text_style = wp.customize( 'btn_text_style' ).get(),
				current,
				$btn = $('.checkout-order-btn');

			$btn.removeClass( 'btn-uppercase btn-lowercase btn-capitalize' );

			current = ( 'default' != to ) ? to : btn_text_style;
			$btn.addClass( current );

		} );
	} );

	wp.customize( 'checkout_order_btn_size', function( value ) {
		value.bind( function( to ) {

			var btn_size = wp.customize( 'btn_size' ).get(),
				current,
				$btn = $('.checkout-order-btn');

			$btn.removeClass( 'btn-xs btn-sm btn-md btn-lg' );
			
			current = ( 'default' != to ) ? to : btn_size;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'checkout_order_btn_type', function( value ) {
		value.bind( function( to ) {

			var btn_type = wp.customize( 'btn_type' ).get(),
				current,
				$btn = $('.checkout-order-btn');

			$btn.removeClass( 'btn-oval btn-rectangle' );
			
			current = ( 'default' != to ) ? to : btn_type;
			$btn.addClass( current );
			
		} );
	} );

	wp.customize( 'checkout_order_btn_color', function( value ) {
		value.bind( function( to ) {

			var btn_color = wp.customize( 'btn_color' ).get(),
				gradient = wp.customize( 'checkout_order_btn_gradient' ).get(),
				custom = wp.customize( 'checkout_order_btn_custom_color' ).get(),
				btn_style = wp.customize( 'btn_style' ).get(), // general
				checkout_order_btn_style = wp.customize( 'checkout_order_btn_style' ).get(),
				current,
				current_btn_style,
				$btn = $('.checkout-order-btn');

			$btn.removeClass( 'btn-gradient btn-black btn-white btn-primary btn-custom' );

			current = ( 'default' != to ) ? to : btn_color;
			current_btn_style = ( 'default' != checkout_order_btn_style ) ? checkout_order_btn_style : btn_style;

			$btn.addClass( current );

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						background: custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
						background: gradient.top,
					    background: '-moz-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ gradient.top +' 0%, '+ gradient.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ gradient.top +', endColorstr='+ gradient.bottom +',GradientType=1 )'
					});
				}
				else {
					$btn.css({
						background: ''
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current && '' != custom && undefined != custom ) {
					$btn.css({
						border: '1px solid '+custom
					});
				}
				else if( 'btn-gradient' == current && '' != gradient && undefined != gradient ) {

					$btn.css({
					    border: '1px solid '+gradient.top
					});
				}
				else {
					$btn.css({
						border: ''
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'checkout_order_btn_custom_color', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				checkout_order_btn_style = wp.customize( 'checkout_order_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				checkout_order_btn_color = wp.customize( 'checkout_order_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.checkout-order-btn');

			current_btn_style = ( 'default' != checkout_order_btn_style ) ? checkout_order_btn_style : btn_style;
			current_btn_color = ( 'default' != checkout_order_btn_color ) ? checkout_order_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						background: to
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-custom' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'checkout_order_btn_gradient', function( value ) {
		value.bind( function( to ) {

			var btn_style = wp.customize( 'btn_style' ).get(), // general
				checkout_order_btn_style = wp.customize( 'checkout_order_btn_style' ).get(),
				btn_color = wp.customize( 'btn_color' ).get(), // general
				checkout_order_btn_color = wp.customize( 'checkout_order_btn_color' ).get(),
				current_btn_style,
				current_btn_color,
				$btn = $('.checkout-order-btn');

			current_btn_style = ( 'default' != checkout_order_btn_style ) ? checkout_order_btn_style : btn_style;
			current_btn_color = ( 'default' != checkout_order_btn_color ) ? checkout_order_btn_color : btn_color;

			if( 'btn-solid' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						background: to.top,
					    background: '-moz-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: '-webkit-linear-gradient(left, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    background: 'linear-gradient(to right, '+ to.top +' 0%, '+ to.bottom +' 100%)',
					    filter: 'progid:DXImageTransform.Microsoft.gradient( startColorstr='+ to.top +', endColorstr='+ to.bottom +',GradientType=1 )'
					});
				}
			}
			else if( 'btn-outline' == current_btn_style ) {
				if( 'btn-gradient' == current_btn_color ) {
					$btn.css({
						border: '1px solid '+to.top
					});
				}
			}
			
			
		} );
	} );

	wp.customize( 'checkout_order_btn_text_color', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.checkout-order-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					color: to
				});
			}
			else {
				$btn.css({
					color: ''
				});
			}
			
		} );
	} );

	wp.customize( 'checkout_order_btn_letter_spacing', function( value ) {
		value.bind( function( to ) {

			var $btn = $('.checkout-order-btn');

			if( '' != to && undefined != to ) {
				$btn.css({
					'letter-spacing': to
				});
			}
			else {
				$btn.css({
					'letter-spacing': ''
				});
			}
			
		} );
	} );


	/* Wordpress Default */
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
} )( jQuery );