/* configurator Custom Scripts */

/* Theme Scripts */
(function($){
	'use strict';

	String.prototype.decodeHTML = function() {
		return $("<div>", {html: "" + this}).html();
	};

	//WOO DROP DOWN
	var $main = $("#wrapper"),
		$mainCon = $("#main-wrapper"),
		responsive_viewport = $(window).width(),
		contentNode = $main.get(0),
		viewport,

	/*
	 * Get Viewport Dimensions
	 * returns object with viewport dimensions to match css in width and height properties
	 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
	*/
	updateViewportDimensions = function () {
		var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
		return { width:x,height:y }
	},

	viewport = updateViewportDimensions(),

	loadGravatars = function () {
		// set the viewport using the function above
		viewport = updateViewportDimensions();
		// if the viewport is tablet or larger, we load in the gravatars
		if (viewport.width >= 768) {
			jQuery('.comment img[data-gravatar]').each(function(){
				jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
			});
		}
	},

	amzIncrementQty = function () {
		var $qty = $(this).next('.qty'),
			val = parseInt( $qty.val() );

			$qty.val( val + 1 ).change();
	},

	amzDecrementQty = function () {
		var $qty = $(this).prev('.qty'),
			val = parseInt( $qty.val() );
			
		if ( val > 1 ) {
			$qty.val( val - 1 ).change();
		}
	},

	woo_drop_down = function (){
		/* WOO COMMERCE Cart */
		var $cartBtn = $('.cart-trigger'),
			$cartDropdown = $('.cart-trigger').find('.woo-cart-dropdown');

		if($cartBtn.length > 0 && $cartDropdown.length > 0){

			$cartBtn.mouseover(function(){
				$(this).find('.woo-cart-dropdown').stop().fadeIn();
			}).mouseout(function(){
				$(this).find('.woo-cart-dropdown').stop().fadeOut();
			});

		}
	},
	
	// Ajaxify Remove item in flyin cart
	AjaxifyRemoveIteminCart = function(e){

		e.preventDefault();

		var $wooCart = $('.woo-cart-dropdown'),
			$cartContent = $wooCart.find('.woo-cart-content'),
			$cartLoader = $wooCart.find('.spinner');

		$.ajax({
			type: "POST",
			url: pixLike.ajaxurl,
			data: {
				'action'   : 'configurator_cart_remove_item',
				'item_key': $(this).data('cart_item_key'),
			},
			cache: false,
			headers: {'cache-control': 'no-cache'},
			beforeSend: function() {
				// Show flyin cart loader & hide content
				$cartLoader.show();
				$(this).parent('li').addClass('removing');
			}
		}).done(function(data){
			var $data = $(data),
				status = $data.find('#status').html(),
				cartCount = $data.find('#amz-cart-count').html(),
				wcNotice = $data.find('#amz-wc-notice').html(),
				wccart = $data.find('#amz-mini-cart').html();

				console.log(data);

				$(this).parent('li').removeClass('removing');

			if ( status != 1 ) {
				$cartLoader.hide();
				return;
			}

			// Update cart count in menu.
			$('body').find('.pix-item-icon').html( cartCount );

			// Update flyin cart if no error notice found
			if( ! $data.find('.woocommerce-error').length ) {
				$cartContent.html( wccart );
			}

			$cartLoader.hide();
		});

	},

	// Submit Contact Form
	submitContactForm = function( $self ) {

		var $form = $self,
			template = $form.find('.email-template').html(),
			field = $self.serializeArray(),
			values = $self.data(values),
            response = $('#g-recaptcha-response').val();

		$.ajax({
			type: "POST",
			url: pix_configurator.ajaxurl,
			data: {
				'action' 	: 'configurator_contact_form',
				'template'	: template,
				'field'  	: field,
				'values' 	: values,
				'response' 	: response
			},
			cache: false,
			headers: {'cache-control': 'no-cache'},
			beforeSend: function() {
			}
		}).done(function(data){

			var data = $.parseJSON(data),
				notice  = data.notice;
			
			$form.find('.notice').text(notice);

			if( 'yes' == values.recaptcha ) {
				grecaptcha.reset();
			}
		});

	},

	init = function() {

		/* getting viewport width */
		var responsive_viewport = $(window).width();
		
		loadGravatars();			


		/* WMPL Language Menu */
		var $langBtn = $('#lang-list.lang-dropdown.translated');

		if($langBtn.length > 0){

			$langBtn.mouseover(function(){
				var $langDropdown = $(this).find('.lang-dropdown-inner');
				$langDropdown.stop().slideDown();
			}).mouseout(function(){
				var $langDropdown = $(this).find('.lang-dropdown-inner');
				$langDropdown.stop().slideUp();
			});

		}

		//Mobile Menu
		var mMenuStatus = 0,
			$mMenu = $('.mobile-menu-nav'),
			$pixOverlay = $('<div />', {class: 'pix-overlay'});
			
		$('.pix-menu .pix-menu-trigger').on('click', function(e) {
			var $this = $(this);
			if(mMenuStatus == 0){
				$this.parent().addClass('pix-menu-open').removeClass('pix-menu-close');
				$('#content-pusher').addClass('content-pushed');
				//Add Overlay
				$pixOverlay.hide().appendTo('body').fadeIn(300);            

				//Show Menu
				$mMenu.addClass('mobile-nav').addClass('moved');
				$('.left-main-menu').addClass('moved');

				mMenuStatus = 1;    

				//Add Click event to overlay
				$pixOverlay.off().on('click', function(e) {
					e.preventDefault();
					if(mMenuStatus == 1){
						$this.parent().removeClass('pix-menu-open').addClass('pix-menu-close');
						$('#content-pusher').removeClass('content-pushed');
						$mMenu.removeClass('mobile-nav').removeClass('moved');
						$('.left-main-menu').removeClass('moved');
						$pixOverlay.fadeOut(300, function() {
							$(this).remove();
						});
						mMenuStatus = 0;
					}
				});

				

			}else{
				$mMenu.removeClass('mobile-nav').removeClass('moved');
				$('.left-main-menu').removeClass('moved');
				$pixOverlay.fadeOut(300, function() {
					$(this).remove();
				});
				mMenuStatus = 0;
				$this.parent().removeClass('pix-menu-open').addClass('pix-menu-close');
				$('#content-pusher').removeClass('content-pushed');
			}

			e.preventDefault();
		});

		/* Responsive video */
		$(".container, .posts, .pix-blog-video,.wp-video, .pix-post-video").fitVids();

		/* open share in popup window */
		$('.port-share-btn a, .share-social a').on('click', function(e){
			e.preventDefault();
			var newwindow = window.open($(this).attr('href'),'','height=450,width=700');
			if (window.focus) {newwindow.focus()}
				return false;
		});
		
		$('.main-nav .menu-item-has-children .pix-dropdown-arrow').on('click',function(e) {
			e.preventDefault();
			$(this).next('ul').stop().slideToggle();
		});	

		$(window).resize(function(event) {

			var responsive_viewport = $(window).width(),
				$sideHeader = $('.left-main-menu'),$container = $('.portfolio-contents'),
			$portfolioInnerText = $container.find('.portfolio-inner-text');

			// initialize isotope

			if($portfolioInnerText.length > 0 ){
				$portfolioInnerText.css('height', $container.find('.element').first().height());
			};

			// Single portfolio affix 
			var $affix = $('.single-portfolio-affix'),
				$singlePortAffixWrap =  $('.single-portfolio-affix-wrap'),
				$footer = $('#footer');

			if( $affix.length > 0 ) {
		
				if (responsive_viewport >= 991) {

						$('.single-portfolio-affix-container').height( $('.single-portfolio-item').height() - 50 );

						$singlePortAffixWrap.waypoint('destroy');
						$footer.waypoint('destroy');

						$singlePortAffixWrap.waypoint({
							handler: function(direction) {
								$('.single-portfolio-affix').toggleClass('sticky-top'); //change position to fixed by adding 'sticky-top' class
							}
						});

						$footer.waypoint({
							offset: $('.single-portfolio-affix').height() + 180, //calculate menu's height and margin before footer
							handler: function(direction) {
								if( direction === 'down' ) {
									$('.single-portfolio-affix').removeClass('sticky-top'); //remove 'sticky-top' class
									$singlePortAffixWrap.addClass('sticky-bottom'); //change position to absolute for the wrapper
								} else if ( direction === 'up' ) {
									$('.single-portfolio-affix').addClass('sticky-top'); //remove 'sticky-top' class
									$singlePortAffixWrap.removeClass('sticky-bottom'); //change position to absolute for the wrapper
								}
							}
						});
					
				} else {
					/* Single portfolio affix */									
					$('.single-portfolio-affix-container').height( 'auto' );
					$singlePortAffixWrap.waypoint('destroy');
					$footer.waypoint('destroy');
				}

			}

			if (responsive_viewport >= 991) {
				$mainCon.css('margin-bottom',$('.footer-fixed').height()+'px');

			}else{
				$mainCon.css('margin-bottom','0px');				
			}
			
			if(responsive_viewport <= 991){
				$mMenu.addClass('mobile-nav');
				
			}else{
				$mMenu.removeClass('mobile-nav');
			}
			
		});

	},

	afterPageLoad = function(){

		// Ajax remove cart
		var $wooCartDropdown = $('.woo-cart-dropdown'),
			$cartContent = $wooCartDropdown.find('.woo-cart-content'),
			$cartLoader = $wooCartDropdown.find('.spinner');
		$wooCartDropdown.on('click', '.remove', AjaxifyRemoveIteminCart);

		//WooCommerce update minicart
		$( document.body ).on( 'added_to_cart', function(){
		
			$.ajax({
				url: woocommerce_params.ajax_url,
				type: 'post',
				data: { 
					'action': 'configurator_update_mini_cart'
				},
				beforeSend: function(){				
					//$cartContent.html('');
					$cartLoader.show();

				},
			}).done(function(data) {
				$cartContent.html(data);
			}).always(function(){
				$cartLoader.hide();
			});
		});

		/* Search button */
		var $searchHeader = $('.header .search-btn'), 
			$search = $searchHeader.find('.topSearchForm');

		//if search is present in header then add events
		if($search.length > 0){

			$searchHeader.off().on('click', function(e) {
				var self = $(this),
					$search = self.find('.topSearchForm');

				self.toggleClass('color');
				$search.toggleClass('show');

				setTimeout( function() { $search.find('input').focus(); }, 300 );
				

				e.preventDefault();
				e.stopPropagation();
			});

			$search.off().on('click', function(e) {
       			e.stopPropagation();
			});

			$(document).on('click', function(e) {								
					$search.removeClass('show');
					$searchHeader.removeClass('color');
			});
		}
		
		// Increment / Decrement Qty input
		$('.woocommerce-cart, .config-cart-form').on('click', '.amz-increament-qty', amzIncrementQty);

		$('.woocommerce-cart, .config-cart-form').on('click', '.amz-decreament-qty', amzDecrementQty);

		if (responsive_viewport >= 991) {
			$mainCon.css('margin-bottom',$('.footer-fixed').height()+'px');
		}else{
			$mainCon.css('margin-bottom','0px');
		}

		$('.main-nav').onePageNav({
			currentClass: 'current-menu-item',
			changeHash: true,
			filter: ':not(.external)',
		});

		//Woo DropDown
		woo_drop_down();

		/* Sticky Header */
		var $headerCon = $('.header-con.pix-sticky-header');
		if($headerCon.length > 0){

			$headerCon.waypoint('sticky', {
				offset: -($('.header-wrap').height()+30)
			});

		}

		var lastScrollTop = 0;
		$(window).scroll(function(){

			var scrollTopVal = $(this).scrollTop();
			
			if( $(this).scrollTop() > 100 ){
				$("#back-top").fadeIn();
			}else{
				$("#back-top").fadeOut();
			}

			var $headerConScrollUp = $('.header-con.pix-sticky-header.pix-sticky-header-scroll-up');

			if($headerConScrollUp.length > 0){

				if ( scrollTopVal > lastScrollTop ){
					$headerConScrollUp.addClass('hide-sticky-header');
				} else {
					$headerConScrollUp.removeClass('hide-sticky-header');
				}

				lastScrollTop = scrollTopVal;

			}

		});

		var $elem = $('.pix-animate-cre');

		$elem.each(function(){
			var $singleElement = $(this);

			// Get data-attr from element
			var animateTrans = $singleElement.data('trans') ? $singleElement.data('trans') : 'fadeIn';
			var animateDelay = $singleElement.data('delay') ? $singleElement.data('delay') : '';
			var animateDuration = $singleElement.data('duration') ? $singleElement.data('duration') : '';

			if(animateDelay != ''){
				$singleElement.css('animation-delay', animateDelay);
			}

			if(animateDuration != ''){
				$singleElement.css('animation-duration', animateDuration);
			}

			if($singleElement.parent('.portfolio-container')){

				$singleElement.waypoint(function() {
					if ($singleElement.hasClass('animated ' + animateTrans)) return;

					$singleElement.css('opacity','1').addClass('animated '+ animateTrans);

				},
				{
					offset: '100%',
					triggerOnce: true
				});

			} else {

				$singleElement.waypoint(function() {
					if ($singleElement.hasClass('animated ' + animateTrans)) return;
					$singleElement.css('opacity','1').addClass('animated '+ animateTrans);

				},
				{
					offset: '90%',
					triggerOnce: true
				});

			}

			
		});
		
		// Owl Carousel
		$(".configurator-primary-slider").each( function( index, el ) {
			var $self = $(this);
			$self.owlCarousel({
				navText: ['',''],
				items: 1,
				loop: true,
				rtl: ( pix_configurator.rtl === 'true' ) ? true : false,
				onInitialized: function(){
					$self.find('.slide-title, .slide-content, .pix_button').removeClass('animated fadeInUp');
					$self.find('.active .slide-title, .active .slide-content, .active .pix_button').addClass('animated fadeInUp');

					var header = $self.find('.active .slider-content').data('header');

					if( header == 'white' ) {
						$('.header-wrap').addClass('dark');
						$('.pageTopCon').addClass('top-sec-dark');
					} else if( header == 'black' ) {
						$('.header-wrap').removeClass('dark');
						$('.pageTopCon').removeClass('top-sec-dark');
					}

				},
				onTranslated: function(){
					$self.find('.slide-title, .slide-content, .pix_button').removeClass('animated fadeInUp');
					$self.find('.active .slide-title, .active .slide-content, .active .pix_button').addClass('animated fadeInUp');

					var header = $self.find('.active .slider-content').data('header');

					if( header == 'white' ) {
						$('.header-wrap').addClass('dark');
						$('.pageTopCon').addClass('top-sec-dark');
					} else if( header == 'black' ) {
						$('.header-wrap').removeClass('dark');
						$('.pageTopCon').removeClass('top-sec-dark');
					}

				}
			});
		});

		// review current stars
		$('.amz-reviews').on('click', '.stars', function(e) {
			$(this).addClass('amz-active');
		});



		// Contact form
		$('.contact-form').on('submit', function(e) {
			e.preventDefault();

			var $self = $(this);

			// Submit Contact Form
			submitContactForm( $self );
		});
			

		$(".owl-carousel-slider").each( function( index, el ) {

			var elem = {};
			elem.Items              = ( typeof ( $(this).data( 'items' ) ) == 'undefined' ) ? 3 : $(this).data( 'items' ), 
			elem.Margin             = ( typeof ( $(this).data( 'margin' ) ) == 'undefined' ) ? 30 : $(this).data( 'margin' ),
			elem.Loop               = ( typeof ( $(this).data( 'loop' ) ) == 'undefined' ) ? false : $(this).data( 'loop' ),
			elem.Center             = ( typeof ( $(this).data( 'center' ) ) == 'undefined' ) ? false : $(this).data( 'center' ),
			elem.AutoHeight         = ( typeof ( $(this).data( 'auto-height' ) ) == 'undefined' ) ? true : $(this).data( 'auto-height' ),
			elem.MouseDrag          = ( typeof ( $(this).data( 'mouse-drag' ) ) == 'undefined' ) ? true : $(this).data( 'mouse-drag' ),
			elem.TouchDrag          = ( typeof ( $(this).data( 'touch-drag' ) ) == 'undefined' ) ? true : $(this).data( 'touch-drag' ),
			elem.StagePadding       = ( typeof ( $(this).data( 'stage-padding' ) ) == 'undefined' ) ? 0 : $(this).data( 'stage-padding' ),
			elem.StartPosition      = ( typeof ( $(this).data( 'start-position' ) ) == 'undefined' ) ? 0 : $(this).data( 'start-position' ),
			elem.Nav                = ( typeof ( $(this).data( 'nav' ) ) == 'undefined' ) ? false : $(this).data( 'nav' ),
			elem.Dots               = ( typeof ( $(this).data( 'dots' ) ) == 'undefined' ) ? true : $(this).data( 'dots' ),
			elem.Autoplay           = ( typeof ( $(this).data( 'autoplay' ) ) == 'undefined' ) ? false : $(this).data( 'autoplay' ),
			elem.AutoplayTimeout    = ( typeof ( $(this).data( 'autoplay-timeout' ) ) == 'undefined' ) ? 5000 : $(this).data( 'autoplay-timeout' ),
			elem.AutoplayHoverPause = ( typeof ( $(this).data( 'autoplay-hover-pause' ) ) == 'undefined' ) ? true : $(this).data( 'autoplay-hover-pause' ),
			elem.AnimateOut         = ( typeof ( $(this).data( 'animate-out' ) ) == 'undefined' ) ? false : $(this).data( 'animate-out' ),
			elem.AnimateIn          = ( typeof ( $(this).data( 'animate-in' ) ) == 'undefined' ) ? false : $(this).data( 'animate-in' );

			if ( elem.Items >= 2 ) {
				elem.TabItems = 2;
			} else {
				elem.TabItems = 1;
			}

			$(this).owlCarousel({
				navText: ['',''],
				items: elem.Items,
				margin: elem.Margin,
				loop: elem.Loop,
				center: elem.Center,
				mouseDrag: elem.MouseDrag,
				touchDrag: elem.TouchDrag,
				stagePadding: elem.StagePadding,
				startPosition: elem.StartPosition,
				nav: elem.Nav,
				dots: elem.Dots,
				autoHeight: elem.AutoHeight,
				rtl: ( pix_configurator.rtl === 'true' ) ? true : false,
				autoplay: elem.Autoplay,
				autoplayTimeout: elem.AutoplayTimeout,
				autoplayHoverPause: elem.AutoplayHoverPause,
				responsive: {0:{'items':1},768:{'items':elem.TabItems},991:{'items': elem.Items },1199:{'items': elem.Items }},
				animateOut: elem.AnimateOut,
				animateIn: elem.AnimateIn,
				navElement: 'a',
				onChanged: function() {
					if ( elem.Items > 1  && elem.AnimateIn ) {
						var $item = $(this.$element[0]).find('.owl-item'),
							$curItem = $(this.$element[0]).find('.owl-item.active'),
							$prevItem = $curItem.first().prev(),
							$nextItem = $curItem.last().next();

						$(this.$element[0]).find('.owl-item').removeClass('animated '+ elem.AnimateIn);
						$prevItem.addClass('animated '+ elem.AnimateIn);
						$nextItem.addClass('animated '+ elem.AnimateIn);
					}
				},
			});
			
		});


		// Login Form
		var loginForm = function( self ){

			var ajaxurl = pix_configurator.ajaxurl,
				$form = self.parents('.login-form'),
				username = $form.find('.username').val(),
				password = $form.find('.password').val(),
				remember = $form.find('.remember_me').prop('checked');

			$.ajax({
				type: 'post',
	            url: ajaxurl,
	            data: {
					action : 'configurator_ajax_login_form',
					username : username,
					password : password,
					remember : remember
	            },
				beforeSend: function(){
					self.addClass('btn-loading');
				},
				complete: function() {
					afterContentLoad();
				},
			}).done( function( data ) {
				self.removeClass('btn-loading');

				var data = $.parseJSON(data),
					error = data.error;

				if( 1 == error ) {
					var username = data.username,
						password = data.password;

					// Insert error content	
					$form.find('.username-notice').text(username);
					$form.find('.password-notice').text(password);

				}
				else {
					var success = data.success,
						redirect = data.redirect;

					$form.find('.success').text(success).delay(400).fadeOut(400);

					// Redirect
					$(location).attr('href',redirect);
				}

			}).always( function(){
			});
		};

		$('.login-form').on('click', '.submit-login-form', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Call login ajax function
			loginForm( self );
		});


		// Forgot Form
		var forgotForm = function( self ){

			var ajaxurl = pix_configurator.ajaxurl,
				$form = self.parents('.forgot-form'),
				user_login = $form.find('.user_login').val();

			$.ajax({
				type: 'post',
	            url: ajaxurl,
	            data: {
					action : 'configurator_ajax_forgot_form',
					user_login : user_login
	            },
				beforeSend: function(){
					self.addClass('btn-loading');
				},
				complete: function() {
					afterContentLoad();
				},
			}).done( function( data ) {
				self.removeClass('btn-loading');

				var data = $.parseJSON(data),
					error = data.error,
					notice = data.notice;

				if( 1 == error ) {
					var forgot_login = data.forgot_login;

					// Insert error content	
					$form.find('.user-login-notice').text(notice);

				}
				else {
					var success = data.success,
						redirect = data.redirect;

					$form.find('.success').text(success).delay(400).fadeOut(400);
				}

			}).always( function(){
			});
		};

		$('.forgot-form').on('click', '.submit-forgot-form', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Call login ajax function
			forgotForm( self );
		});


		// Forgot Form
		var resetForm = function( self ){

			var ajaxurl = pix_configurator.ajaxurl,
				$form = self.parents('.reset-form'),
				login = self.data('login'),
				password = $form.find('.password').val(),
				key = $form.data('key');

			$.ajax({
				type: 'post',
	            url: ajaxurl,
	            data: {
					action : 'configurator_ajax_reset_form',
					login : login,
					password : password,
					key : key
	            },
				beforeSend: function(){
					self.addClass('btn-loading');
				},
				complete: function() {
					afterContentLoad();
				},
			}).done( function( data ) {
				self.removeClass('btn-loading');

				var data = $.parseJSON(data),
					error = data.error,
					notice = data.notice;

				if( 1 == error ) {
					var forgot_login = data.forgot_login;

					// Insert error content	
					$form.find('.user-login-notice').text(notice);

				}
				else {
					var redirect = data.redirect;

					// Redirect
					$(location).attr('href',redirect);

					// Insert error content	
					$form.parent().next('.login-form-con').find('.reset-notice').text(notice);
				}

			}).always( function(){
			});
		};

		$('.reset-form').on('click', '.submit-reset-form', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Call login ajax function
			resetForm( self );
		});

		// Update Profile
		var updateProfile = function( self ){

			var ajaxurl = pix_configurator.ajaxurl,
				$form = self.parents('.update-form'),
				userInfo = $form.serializeArray();

			$.ajax({
				type: 'post',
	            url: ajaxurl,
	            data: {
					action : 'configurator_ajax_update_form',
					user_info : userInfo
	            },
				beforeSend: function(){
					self.addClass('btn-loading');
				},
				complete: function() {
				},
			}).done( function( data ) {

				console.log(data);
				
				self.removeClass('btn-loading');

				var data = $.parseJSON(data),
					error = data.error;

				if( true == error ) {
					var username_notice = data.username_notice,
						password_notice = data.password_notice;

					// Insert error content
					$form.find('.username-notice').text(username_notice);
					$form.find('.password-notice').text(password_notice);

				}
				else {
					var success = data.succcess_notice;

					$form.find('.success').text(success);
				}

			}).always( function(){
			});
		};

		$('.my-account-con').on('click', '.submit-update-form', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Call register ajax function
			updateProfile( self );
		});


		// Register Form
		var registerForm = function( self ){

			var ajaxurl = pix_configurator.ajaxurl,
				$form = self.parents('.register-form'),
				username = $form.find('.username').val(),
				email = $form.find('.email').val();

			$.ajax({
				type: 'post',
	            url: ajaxurl,
	            data: {
					action : 'configurator_ajax_register_form',
					username : username,
					email : email
	            },
				beforeSend: function(){
					self.addClass('btn-loading');
				},
				complete: function() {
					afterContentLoad();
				},
			}).done( function( data ) {
				self.removeClass('btn-loading');

				var data = $.parseJSON(data),
					error = data.error;

				if( 1 == error ) {
					var username_notice = data.username_notice,
						email_notice = data.email_notice,
						general_notice = data.general_notice;

					// Insert error content	
					$form.find('.general-notice').addClass('error').removeClass('success').text(general_notice);
					$form.find('.username-notice').text(username_notice);
					$form.find('.email-notice').text(email_notice);

				}
				else {
					var success = data.succcess_notice,
						redirect = data.redirect;

					$form.find('.general-notice').addClass('success').removeClass('error').text(success).delay(400).fadeOut(400);

					// Redirect
					$(location).attr('href',redirect);
				}

			}).always( function(){
			});
		};

		$('.register-form').on('click', '.submit-register-form', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Call register ajax function
			registerForm( self );
		});

		$('.login-form').on('click', '.forgot-password', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Switch form
			self.parents('.login-form-con').fadeOut(400);
			self.parents('.login-form-con').next('.forgot-password-con').fadeIn(400);
		});

		$('.login-form').on('click', '.change-password', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this);

			// Switch form
			self.parents('.login-form-con').fadeOut(400);
			self.parents('.login-form-con').next().next('.change-password-con').fadeIn(400);
		});

		// Checkbox
        $('.login-form').on('click', '.form-checkbox label', function( e ) {

        	e.preventDefault();
        	e.stopPropagation();

        	var self = $(this);

        	// Trigger checkbox
        	self.next('.remember-me').trigger('click');

        });

        // Trigger checkbox
        $('.login-form').on('click', '.remember-me', function( e ) {

        	e.preventDefault();
        	e.stopPropagation();

        	var self = $(this),
        		$form = self.parents('.login-form'),
        		$checkbox = self.parent().find('.remember_me'),
        		val = $checkbox.prop('checked');

        	if( false == val ) {
        		$checkbox.prop('checked',true);
        	}
        	else{
        		$checkbox.prop('checked',false);
        	}

        	self.toggleClass('active');

        });

        $('.show-login-form').on('click', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var self = $(this),
				$forgotPasswordCon = self.parents('.forgot-password-con'),
				$changePasswordCon = self.parents('.change-password-con');

			// Switch form
			$forgotPasswordCon.fadeOut(0);
			$changePasswordCon.fadeOut(0);
			$('.login-form-con').fadeIn(0);
		});

	};

	$(window).load(function() {		

		afterPageLoad();
		if( $('body').hasClass('pix-preload-enabled') ){

			var $preLoaderCon = $('#preloader-con');
			$preLoaderCon.fadeOut(function(){
				//$mainCon.fadeIn(500);
				var trans = $main.data('preloadtrans');
				$main.removeClass().addClass('animated ' + trans);				
				$('body').delay(750).removeClass('pix-preloader-enabled');
			});

			$(document).on("click", 'a:not(.noajax, .woocommerce a, .btn, .button, .popup-gallery, .popup-video, [href$=".png"], [href$=".jpg"], [href$=".jpeg"], [href$=".svg"], [href$=".mp4"], [href$=".webm"], [href$=".ogg"], [href$=".mp3"], [href^="#"], [href=""], [href*="wp-login"], [href*="wp-admin"], .dot-nav-noajax, .pix-dropdown-arrow)', function(e) {

				if ( ( e.shiftKey || e.ctrlKey || e.metaKey || '_blank' == $.trim( $(this).attr('target') ) ) ) { 
					return;
				}

				$('body').addClass('pix-preloader-enabled');
				$preLoaderCon.fadeIn();

			});
			
		}	

		$('.mobile-menu-nav li.menu-item-has-children').on('click', '.pix-dropdown-arrow, a[href="#"], a[href=""]', function (e) {
			e.preventDefault();
			e.stopPropagation();
			var $li = $(this).parent('li');

			$li.find('.sub-menu').first().stop().slideToggle();

			if( $(this).hasClass('pix-dropdown-arrow') ){
				$(this).toggleClass('pix-bottom-arrow');
			} else {
				$li.find('.pix-dropdown-arrow').toggleClass('pix-bottom-arrow');
			}
			
		});

		var changeHashInURL = ($('body').hasClass('pix-ajaxify')) ? false : true;
		$('.mobile-menu-inner').onePageNav({
			currentClass: 'current-menu-item',
			changeHash: changeHashInURL,
			filter: ':not(.external)',
			begin: function() { 
				if($('.mobile-menu-nav').hasClass('mobile-nav')){
					$('.pix-menu-trigger').trigger('click');
				}
			},
		});

	});

	init();

	$('#pix-header-search-form').on('submit',
		function(e){
			e.preventDefault();
			var host = pix_configurator.rootUrl + "?s=", searchUrl;
			searchUrl = host + $(this).find('.pix-search').val();

			if($(window).scrollTop() > 10){
				$("body,html").animate({ scrollTop:0 },300,function(){
					history.pushState({}, '', searchUrl);
					loadPage(searchUrl);
				});
			}else{
				history.pushState({}, '', searchUrl);
				loadPage(searchUrl);
			}	
		}
	);

	/*----------------------------------------------------
	/* Make all anchor links smooth scrolling
	/*--------------------------------------------------*/
	jQuery(document).ready(function($) {

		// Form validation
		$.validate({
			inlineErrorMessageCallback: function( $input, errorMessage, config ) {
				if( errorMessage ) {
					$input.parents('.field-group').find('.error').text( errorMessage );
				}
				else {
					$input.parents('.field-group').find('.error').text('');
				}				
			}
		});

		$('.main-nav').each(function(){
			var navHtml = $(this).html();
			$('.mobile-menu-inner').prepend(navHtml);
		});

		// scroll handler
		var scrollToAnchor = function( id, event ) {
			// grab the element to scroll to based on the name
			var elem = $("a[name='"+ id +"']");
			// if that didn't work, look for an element with our ID
			if ( typeof( elem.offset() ) === "undefined" ) {
				elem = $("#"+id);
			}
			// if the destination element exists
			if ( typeof( elem.offset() ) !== "undefined" ) {
				// cancel default event propagation
				event.preventDefault();
				var scroll_to = elem.offset().top;
				// do the scroll
				$('html, body').animate({
					scrollTop: scroll_to
				}, 600, 'swing', function() { if (scroll_to > 46) window.location.hash = id; } );
			}
		};
		// bind to click event
		$("a.scroll-to, .scroll-to a").on( 'click', function( event ) {
			// only do this if it's an anchor link
			var href = $(this).attr("href");
			if ( href.match("#") && href !== '#' && $(this).parents(".tabs").length !== 1 ) {
				// scroll to the location
				var parts = href.split('#'),
					url = parts[0],
					target = parts[1];
			if ((!url || url == window.location.href.split('#')[0]) && target)
				scrollToAnchor( target, event );
			}
		});

		$('.go-back').on('click', 'a', function(e) {
			e.preventDefault();
			window.history.back();
		});

		
	}); 

})(jQuery);
