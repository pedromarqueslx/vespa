(function($){

	'use strict';

	// Create Base64 Object
	var pwc = {},

	$result = [],

	encodeStr = function ( str ) {

		// Encode the String
		return $.base64.encode(str);

	},

	decodeStr = function ( encodedString ) {

		// Decode the String
		return $.base64.decode(encodedString);
	},

	updateQueryStringParameter = function ( uri, key, value ) {
		var re = new RegExp("([?&])" + key + "=.*?(&|#|$)", "i");
		if( value === undefined ) {
			if (uri.match(re)) {
				return uri.replace(re, '$1$2');
			} else {
				return uri;
			}
		} else {
			if (uri.match(re)) {
				return uri.replace(re, '$1' + key + "=" + value + '$2');
			} else {
				var separator = uri.indexOf('?') !== -1 ? "&" : "?";    
				return uri + separator + key + "=" + value;
			}
		}  
	},

	showOptions = function( $parent ) {

		$parent.parent().removeClass('hover-hide');

		$parent.find('li').each(function(i) {		    
			var $self = $(this);

			setTimeout(function(){
				$self.removeClass('fadeOutUp').addClass('animated fadeInUp');
			}, i * 100);

		});

	},

	hideOptions = function( $parent ) {

		$parent.find('li').each(function(i) {
			var $self = $(this);

			setTimeout(function(){
				$self.removeClass('fadeInUp').addClass('animated fadeOutUp');
			}, i * 100);

		});

		$parent.parent().addClass('hover-hide');

	},

	applyResponsive = function() {
		
		pwc.$config = $('#configurator-view');		

		pwc.maxWidth  = pwc.entireWidth  - pwc.minLeft;
		pwc.maxHeight = pwc.entireHeight - pwc.minTop;

		var pageHeight = pwc.$config.height() - 104,
			pageWidth  = pwc.$config.width() - 80,
			scaleX = 1,
			scaleY = 1,
			scale = 1;

		if( pageWidth < pwc.maxWidth || (pageHeight < pwc.maxHeight && $(window).width() < 1680 ) ) {

			scaleX = pageWidth / pwc.maxWidth;
			scaleY = pageHeight / pwc.maxHeight;

			scale = ( scaleX > scaleY ) ? scaleY : scaleX;

			pwc.$config.find('.pwc-preview-inner').css('transform', 'scale(' + scale + ')');

		} else {
			pwc.$config.find('.pwc-preview-inner').css('transform', 'scale(1)');
		}

	},

	loadPreview = function( init, $preview ) {

		var $preview = ('undefined' == typeof($preview) ) ?  $('#configurator') : $preview,
			// current active image view on preview
			curImageView  = 'front',
			// preview width and height
			previewWidth = $preview.width(),
			previewHeight = $preview.height();

		// 1. now apply left and top, depends on aligment and set data-init-x and data-init-y
		var $previewImagesCon = $preview.find('.subset');

		$previewImagesCon.each(function(index, el) {

			var $activeImage = $(this),
				x       = $activeImage.data('align-h'),
				y       = $activeImage.data('align-v'),
				z       = $activeImage.data('z-index'),
				offsetX = parseFloat( $activeImage.data('offset-x'), 10 ),
				offsetY = parseFloat( $activeImage.data('offset-y'), 10 ),
				width   = parseFloat( $(this).data('width'), 10 ),
				height  = parseFloat( $(this).data('height'), 10 ),
				valX, valY, entireWidth = 0, entireHeight = 0;

			/*pwc.maxWidth  = pwc.maxWidth  > width  ? pwc.maxWidth  : width;
			pwc.maxHeight = pwc.maxHeight > height ? pwc.maxHeight : height;*/

			$(this).css('position', 'absolute');

			// change image postion & set x and y
			if ( 'left' == x ) {

				valX = 0;
				$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

			} else if ( 'right' == x ) {

				valX = previewWidth - width;
				$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

			} else if ( 'center' == x ) {

				valX = ( previewWidth - width ) / 2;
				$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

			} 

			if ( 'middle' == y ) {
				valY = ( ( previewHeight - height ) / 2 );
				$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });
				
			} else if ( 'top' == y ) {

				valY = 0;
				$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });

			} else if ( 'bottom' == y ) {

				valY = previewHeight - height;
				$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });

			}

			$activeImage.css({'z-index': z });

			$activeImage.attr( { 'data-init-x': valX, 'data-init-y': valY } );			

			/* on calulate on load */
			if( init ) {
				pwc.minLeft = pwc.minLeft < ( valX + offsetX ) ? pwc.minLeft : valX + offsetX;
				pwc.minTop  = pwc.minTop  < ( valY + offsetY ) ? pwc.minTop  : valY + offsetY;

				pwc.$minLeft = pwc.$minLeft < ( valX + offsetX ) ? pwc.$minLeft : $(this);

				entireWidth = valX + offsetX + width;
				entireHeight = valY + offsetY + height;

				pwc.entireWidth  = pwc.entireWidth  > entireWidth  ? pwc.entireWidth  : entireWidth;
				pwc.entireHeight = pwc.entireHeight > entireHeight ? pwc.entireHeight : entireHeight;
			}

		});

		$preview.find('.pwc-preview-inner').removeClass('loading');

		var $hotspot = $preview.find('.pwc-hotspot');

		$hotspot.each(function(index, el) {

			var $activeImage = $(this),
				x       = $activeImage.data('align-h'),
				y       = $activeImage.data('align-v'),
				offsetX = parseFloat( $activeImage.data('offset-x'), 10 ),
				offsetY = parseFloat( $activeImage.data('offset-y'), 10 ),
				width   = $(this).width(),
				height  = $(this).height(),
				valX, valY, entireWidth, entireHeight;

			$(this).css('position', 'absolute');

			// change image postion & set x and y
			if ( 'left' == x ) {

				valX = 0;
				$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

			} else if ( 'right' == x ) {

				valX = previewWidth - width;
				$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

			} else if ( 'center' == x ) {

				valX = ( previewWidth - width ) / 2;
				$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

			} 

			if ( 'middle' == y ) {
				valY = ( ( previewHeight - height ) / 2 );
				$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });
				
			} else if ( 'top' == y ) {

				valY = 0;
				$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });

			} else if ( 'bottom' == y ) {

				valY = previewHeight - height;
				$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });

			}

			$activeImage.data( 'init-x', valX ).data( 'init-y', valY );

		});

	},

	changePreview = function( $activeImage, obj ) {

		var $preview = $('#configurator'),
			// preview width and height
			previewWidth = $preview.width(),
			previewHeight = $preview.height(),
			// Get values and assign it to the variables
			x       = obj.align_h,
			y       = obj.align_v,
			z       = obj.z_index,
			offsetX = parseFloat( obj.pos_x.replace('px', '') ),
			offsetY = parseFloat( obj.pos_y.replace('px', '') ),
			width   = parseFloat( obj.width.replace('px', '') ),
			height  = parseFloat( obj.height.replace('px', '') ),
			valX, valY, entireWidth = 0, entireHeight = 0;

		$activeImage.css('position', 'absolute');

		/*pwc.maxWidth  = pwc.maxWidth  > width  ? pwc.maxWidth  : width;
		pwc.maxHeight = pwc.maxHeight > height ? pwc.maxHeight : height;*/

		// change image postion & set x and y
		if ( 'left' == x ) {

			valX = 0;
			$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

		} else if ( 'right' == x ) {

			valX = previewWidth - width;
			$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

		} else if ( 'center' == x ) {

			valX = ( previewWidth - width ) / 2;
			$activeImage.css({'left': ( valX + offsetX ) + 'px', 'right': 'auto' });

		} 

		if ( 'middle' == y ) {
			valY = ( ( previewHeight - height ) / 2 );
			$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });
			
		} else if ( 'top' == y ) {

			valY = 0;
			$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });

		} else if ( 'bottom' == y ) {

			valY = previewHeight - height;
			$activeImage.css({'top': ( valY + offsetY ) + 'px', 'bottom': 'auto' });

		}

		$activeImage.css({'z-index': z });

		$activeImage.data( 'init-x', valX ).data( 'init-y', valY );

		pwc.minLeft = ( pwc.minLeft < ( valX + offsetX ) ) ? pwc.minLeft : valX + offsetX;
		pwc.minTop  = ( pwc.minTop  < ( valY + offsetY ) ) ? pwc.minTop  : valY + offsetY;

		entireWidth = valX + offsetX + width;
		entireHeight = valY + offsetY + height;

		pwc.entireWidth  = pwc.entireWidth  > entireWidth  ? pwc.entireWidth  : entireWidth;
		pwc.entireHeight = pwc.entireHeight > entireHeight ? pwc.entireHeight : entireHeight;

		// uncomment this for plugin
		applyResponsive();

	},

	calculateTotalPrice = function () {

		var $cartPrice, $totalCart, tPrice = 0, newPrice;
		$('.cart-list').each(function(index, el) {
			newPrice = parseFloat($(el).find('.price').data('price'));
			tPrice += newPrice;			
		});

		// That function directly loads from WooCommerce
		tPrice = accounting.formatMoney( tPrice, lib.symbol, lib.precision, lib.thousand, lib.decimal, lib.format );

		// Append total price value
		$cartPrice = $('#cart-price'),
		$totalCart = $('#total-cart-price');
		if( tPrice ) {
			$cartPrice.find('.price').html( tPrice );
			$cartPrice.show();
		}
		else {
			$cartPrice.hide();
		}

		// add the total price to inpiration list wrapper for creating & updating inspiration list
		$('.inspiration-wrap').data( 'price', tPrice );

		$totalCart.find('.prices .value').html( tPrice );
	},

	addSidebarContent = function( $self ) {

		var changeText,
			removeText,
			uid,
			$template,
			$cartPrice,
			$totalCart,
			multiple = $self.parent().data('multiple'), // undefined, true
			single = $self.parent().data('single'), // undefined, main-parent-key
			key = $self.data('key'),
			layerUid = $self.data('uid'),
			parentUid = $self.parent().data('parent-uid'),
			icon = $self.find('img').attr('src'),
			parentTitle = $self.parent().data('text'),
			childTitle = $self.data('text'),
			price = $self.data('price'),
			desc = $self.find('.li-desc').html();

		if( 'undefined' == typeof( single ) ) {
			uid = ( true == multiple ) ? layerUid : parentUid;
		}
		else {
			uid = single;
		}

		changeText = ( 'undefined' != typeof( pwc_plugin.change_text ) ) ? pwc_plugin.change_text : 'Change';
		removeText = ( 'undefined' != typeof( pwc_plugin.remove_text ) ) ? pwc_plugin.remove_text : 'Remove';

		$template = '<div id="cart-list-'+uid+'" class="cart-list">';
			$template += '<div class="cart-item">';
				if( 'undefined' != typeof(icon) ) {
					$template += '<div class="cart-img"><img src="'+icon+'" alt=""></div>';
				}
				$template += '<div class="cart-content">';
					$template += '<h2 class="title">';
						if( 'undefined' != typeof(parentTitle) ) {
							$template += '<span class="parent-title">'+ parentTitle +'</span>';
						}
						if( 'undefined' != typeof(childTitle) ) {
							$template += '<span class="child-title text">'+ childTitle +'</span>';
						}
					$template += '</h2>';
					if( 'undefined' != typeof(price) ) {
						$template += '<p class="price" data-price="'+price+'">'+accounting.formatMoney( price, lib.symbol, lib.precision, lib.thousand, lib.decimal, lib.format )+'</p>';
					}		
				$template += '</div>';
				$template += '<span class="icon-add-close"></span>';
			$template += '</div>';

			$template += '<div class="content">';
				if( 'undefined' != typeof(desc) ) {
					$template += '<p class="desc">'+desc+'</p>';
				}		
				$template += '<a href="#" data-parent-uid="'+ parentUid +'" class="btn change-btn">'+ changeText +'</a>';
				$template += '<a href="#" data-uid="'+ layerUid +'" class="btn remove-btn">'+ removeText +'</a>';
			$template += '</div>';

		$template += '</div>';

		if( $('#cart-list-'+uid).length == 0 ){
			$('#cart-list-wrap').append($template);					
		}
		else {
			$('#cart-list-'+uid).html($($template).html());	
		}

		calculateTotalPrice();

	},

	arrUnique = function ( list ) {
	    var result = [];
	    $.each(list, function(i, e) {
	        if ($.inArray(e, result) == -1) result.push(e);
	    });
	    return result;
	},

	appendImagetoPreview = function( $self ) {

		var uid             = $self.data('uid'),
			multiple        = $self.parent().data('multiple'),
			single          = $self.parent().data('single'),
			$parent         = $self.parent('.banner-img-list'),
			parentId        = $parent.data('parent-uid'),
			required		= $parent.data('required'),
			required 		= ( 'undefined' == typeof( required ) ) ? false : required,
			$con            = $('#configurator'),
			optionset       = $self.data('open-optionset'),
			style           = $self.data('style'),
			$previewInner   = $con.find('.pwc-preview-inner'),
			imgLength       = $previewInner.length,
			imgLoaded       = 0;

		single = ( 'undefined' == typeof( single ) ) ? '' : single;

		// if( ( ! multiple && $self.hasClass('current') ) || ( required && !$self.siblings().hasClass('current') && $self.hasClass('current') ) ) {			
		// 	return;
		// }

		$previewInner.each(function( index, el ) {

			var type = $(el).data('type'),
				$wrap = $con.find('#pwc-'+type),
				$ImgCon = $wrap.find('[data-uid="'+uid+'"]'),
				object = $self.data(type);

			if( 'undefined' != typeof( object ) ) {

				if( ! $ImgCon.length ) {
					var $newset = $('<div />', {
						class: 'subset',
						style: style,
						'data-parent-uid' : parentId,
						'data-uid' : uid,
						'data-single' : single,
						'data-align-h' : object.align_h,
						'data-align-v' : object.align_v,
						'data-offset-x' : object.pos_x,
						'data-offset-y' : object.pos_y,
						'data-width' : object.width,
						'data-height' : object.height,
						'data-z-index' : object.z_index
					}).html('<img src="'+ object.src +'" width="' + object.width + '" height="' + object.height + '" alt="">').appendTo($wrap);

					if( $newset.find('img').length ) {
						$newset.addClass('image-loading-con');
						$self.addClass('image-loading');
					}

					$newset.find('img').on('load', function(e) {
						e.preventDefault();
						imgLoaded++;

						// if( imgLoaded == imgLength ) {

							$newset.removeClass('image-loading-con').addClass('loaded-con');

							$newset.addClass('active');

							if( ! multiple ) {
								if( !single ) {
									$newset.siblings('[data-parent-uid="'+parentId+'"]').removeClass('active');
								}
								else {
									$newset.siblings('[data-single="'+single+'"]').removeClass('active');
								}
							}

							$self.removeClass('image-loading').addClass('image-loaded');

						// }

					});

					/*if( ! multiple ) {
						$('.subset[data-parent-uid="'+parentId+'"]').not($newset).removeClass('active');
					}*/

					changePreview( $newset, object );

				}
				else {

					var $subset = $('.subset[data-uid="'+uid+'"]');
					if( ! multiple ) {
						if( !single ) {
							$('.subset[data-parent-uid="'+parentId+'"]').removeClass('active');
						}
						else {
							$('.subset[data-single="'+single+'"]').removeClass('active');
						}
					}					

					$subset.addClass('active');
				}
				
			}				
			
		});

	},

	resetComponent = function( str ) {

		var $controlCon = $('.banner-list-con'),
	    	$li = $controlCon.find('.banner-img-list li'),
	    	$subsets = $('#configurator-view .subset'),
	    	$priceCon = $('#cart-list-wrap'),
	    	$str = str.split(',');

	    $str = $str.filter(Boolean);
	    $str = arrUnique($str);

	    // Reset it to empty, it looks nothing clicked
	    $li.removeClass('current');
	    $subsets.removeClass('active');
	    $priceCon.find('div[id]').remove();

	    $.each($str, function( index, value ) {	

	    	var $changeImage = $('.banner-img-list li[data-key="'+value+'"]'),
	    		// Get value when the trigger done that value needs to re-apply
	    		openOptionset = $changeImage.data('open-optionset');

	    	// Remove this data attr to stop bubbling the child element
	    	$changeImage.removeAttr('data-open-optionset');

	    	$changeImage.trigger('click');
	    	// Re-apply the data attr
	    	$changeImage.attr('data-open-optionset', openOptionset);

		});
	},

	setComponentsUrl = function( encodedStr ) {

		var baseUrl = '',
			location = window.location,
			href = location.href,
			$shareWrap = $('#share-wrap'),
			$shareIconCon = $('.share-icon-con'),
			$facebook = $shareIconCon.find('.facebook-link'),
			facebookUrl = $facebook.attr('href'),
			$twitter = $shareIconCon.find('.twitter-link'),
			twitterUrl = $twitter.attr('href'),
			$gplus = $shareIconCon.find('.gplus-link'),
			gplusUrl = $gplus.attr('href'),
			$linkedin = $shareIconCon.find('.linkedin-link'),
			linkedinUrl = $linkedin.attr('href'),
			$pinterest = $shareIconCon.find('.pinterest-link'),
			pinterestUrl = $pinterest.attr('href'),
			$copy = $shareIconCon.find('.copy-link');

		// It build the query string properly
		if( '' != encodedStr ) {
			baseUrl = updateQueryStringParameter( href, 'key', encodedStr );
		} else {
			baseUrl = href;
		}

		// update the share url
		$facebook.attr( 'href', facebookUrl+baseUrl );
		$twitter.attr( 'href', twitterUrl+baseUrl );
		$gplus.attr( 'href', gplusUrl+baseUrl );
		$linkedin.attr( 'href', linkedinUrl+baseUrl );
		$pinterest.attr( 'href', pinterestUrl+baseUrl );
		$copy.attr( 'href', baseUrl );
		$shareWrap.find('.share-link-input').val(baseUrl);
		

		// update the key to save inspiration button
		$('#inspiration-key-popup').data('key', encodedStr);
		$('#total-cart-price-link').data('key', encodedStr);

		// cart url
		var cartLink = $('#total-cart-price-link').attr('href');

		cartLink = updateQueryStringParameter( cartLink, 'key', encodedStr );

		$('#total-cart-price-link, #cart-btn-on-push').attr( 'href', cartLink );

		// add the encoded key to inpiration list wrapper for creating & updating inspiration list
		$('.inspiration-wrap').data( 'key', encodedStr );

	},

	// Save inspiration
	saveInspiration = function( self, type, values ){

		var ajaxurl = pwc_plugin.ajaxurl,
			$con = $('.more-product-con[data-config-id='+ values.configurator_id +']'),
			$tabWrapper = $con.find('.more-product-list');

		$.ajax({
			type: 'post',
            url: ajaxurl,
            data: {
				action : 'pwc_panorama_save_inspiration',
				type : type,
				values : values
            },
			beforeSend: function(){
				$con.addClass('inspiration-loading');
			},
			complete: function() {
			},
		}).done( function( data ) {

			$con.removeClass('inspiration-loading');

			if($con.hasClass('inspiration-loading')){
				return;
			}

			var $data              = $(data),
				$tab               = $data.find('.more-product-list').html(),
				$addNewInspiration = $con.find('.add-new-inspiration'),
				$fieldGroup        = $addNewInspiration.find('.ins-field-group'),
				$insData           = $data.find('#ins-data'),
				error              = $insData.data('error'),
				successText        = $insData.find('span.success').text(),
				errorText          = $insData.find('span.error').text(),
				nameError,
				groupError;

			if( error ) {
				nameError = $insData.find('span.name-error').text();
				groupError = $insData.find('span.group-error').text();

				$con.find('.name-error').text(nameError);
				$con.find('.group-error').text(groupError);

				$con.find('.notice').fadeIn(400).text(errorText).delay(400).fadeOut(400);

			}
			else {
				$con.find('.notice').fadeIn(400).text(successText).delay(400).fadeOut(400);
				$con.find('.form-notice').fadeIn(400).text(successText).delay(400).fadeOut(400);
				$tabWrapper.html($tab);

				$('.owl-carousel-slider').owlCarousel();

				if( 'add-new' == type ) {
					$('.inspiration-wrap').fadeOut(0);

					$fieldGroup.find('.custom-ins-name').val('');
					$fieldGroup.find('.custom-ins-desc').val('');
					$fieldGroup.find('.custom-ins-image').val('');
				}
			}
		
		}).always( function(){
		});
	},

	setupControls = function() {
		$('.banner-img-list').each(function(index, el) {

			var width = 0;
			
			$(this).find('.banner-list-img').each(function(index, el) {
				width += $(this).outerWidth();
			});

			$(this).width( width );

		});
	};

	var defaultKey = $('#default-active-key').val(),
		resetKey = $('#reset-active-key').val(),
		encodedDefaultKey = (defaultKey) ? encodeStr( defaultKey ) : '';

	var newKey, defaultKeyArr, parentUid, single, key, $result = [];

	defaultKeyArr = defaultKey.split(',');
	for ( var i in defaultKeyArr ) {
		parentUid = $('[data-key="'+defaultKeyArr[i]+'"]').parent().data('parent-uid');
		single = $('[data-key="'+defaultKeyArr[i]+'"]').parent().data('single');

		key = ( 'undefined' == typeof(parentUid) ) ? $('[data-key="'+defaultKeyArr[i]+'"]').data('random') : parentUid;
		key = ( 'undefined' == typeof(single) ) ? key : single;

		$result[key] = defaultKeyArr[i];
	}

	var passArrayKeyforActive = function( $self ) {

		// if multiple true pass multiple key other than pass single key to php and change that key values active to true

		var str, obj = {},
			multiple = $self.parent().data('multiple'),
			single = $self.parent().data('single'),
			uid = $self.data('uid'),
			parentUid = $self.parent().data('parent-uid'),
			key = $self.data('key');

		if( 'undefined' == typeof( single ) ) {
			uid = ( true == multiple ) ? uid : parentUid;
		}
		else {
			uid = single;
		}			

		uid = ( 'undefined' == typeof(uid) ) ? $self.data('random') : uid;

		$result[uid] = key;

		var str = "";
		for ( var i in $result ) {
			str += ( '' == str ) ? $result[i] : ',' + $result[i];
		}

		// Pass encoded key to the url
		setComponentsUrl( encodeStr(str) );

	},

	deselectLayer = function( $self ) {

		var $control = $('.banner-list-sec'),
			uid = $self.data('uid'),
			$li = $control.find('[data-uid="'+ uid +'"]'),
			key = $li.data('key'),
			removeUid,
			multiple = $li.parent().data('multiple'), // undefined, true
			single = $li.parent().data('single'), // undefined, main-parent-key
			layerUid = $li.data('uid'),
			parentUid = $li.parent().data('parent-uid'),
			required = $li.parent().data('required'),
			defaultKey,
			activeKey,
			activeKeyArr,
			$result = [],
			str = '';

		if( 'undefined' == typeof( single ) ) {
			removeUid = ( true == multiple ) ? layerUid : parentUid;
		}
		else {
			removeUid = single;
		}
		
		$control.find('li[data-uid="'+uid+'"]').removeClass('current');
		$('#cart-list-'+removeUid).remove();		

		calculateTotalPrice();
		
		$('#configurator-view .subset[data-uid="'+ uid +'"]').removeClass('active');

		// Get active key
		activeKey = $('#total-cart-price-link').data('key');
		defaultKey = $('#default-active-key').val();
		activeKey = ( 'undefined' != typeof( activeKey ) ) ? decodeStr( activeKey ) : defaultKey;
		
		activeKeyArr = activeKey.split(',');

		for ( var i in activeKeyArr ) {
			parentUid = $('[data-key="'+activeKeyArr[i]+'"]').parent().data('parent-uid');
			parentUid = ( 'undefined' == typeof(parentUid) ) ? $('[data-key="'+activeKeyArr[i]+'"]').data('random') : parentUid;
			
			if( key != activeKeyArr[i] ) {
				$result[parentUid] = activeKeyArr[i];
			}
			
		}

		for ( var i in $result ) {
			str += ( '' == str ) ? $result[i] : ',' + $result[i];
		}

		// Pass encoded key to the url
		setComponentsUrl( encodeStr(str) );

	},

	onZoom = function( selector, imageWidth, imageHeight ) {

		// Assign values
		var mLeftDif,
			mRightDif,
			mTopDif,
			mBottomDif,
			directionX,
			directionY,
			windowWidth = $(window).width(),
			windowHeight = $(window).height(),
			horizontal = windowWidth / 2,
			vertical = windowHeight / 2,
			heightDif = ( imageHeight - windowHeight ) / 100,
			widthDif = ( imageWidth - windowWidth ) / 100;

		$( '#wrapper' ).mousemove( '#zoom-image', function( e ) {

			if( e.pageX >= horizontal ) { // moving right
				directionX = 'right';
				mRightDif = Math.round( Math.abs( ( horizontal - e.pageX ) ) );

				$(selector).css({
					left: '-'+mRightDif+'px',
					right: 'auto'
				});
			}
			else { // moving left
				directionX = 'left';
				mLeftDif = Math.round( Math.abs( ( e.pageX - horizontal ) ) );
				$(selector).css({
					left: 'auto',
					right: '-'+mLeftDif+'px'
				});
			}
			if( e.pageY <= vertical ) { // moving top
				directionY = 'top';
				mTopDif = Math.round( Math.abs( ( vertical - e.pageY ) ) );
				$(selector).css({
					top: 'auto',
					bottom: '-'+mTopDif+'px'
				});

			}
			else { // moving bottom
				directionY = 'bottom';
				mBottomDif = Math.round( Math.abs( ( e.pageY - vertical ) ) );
				$(selector).css({
					top: '-'+mBottomDif+'px',
					bottom: 'auto'
				});
			}
			

		});
	};

	$(document).ready(function($) {

		setupControls();

		setComponentsUrl( encodeStr( defaultKey ) );

		calculateTotalPrice();

		$('.banner-img-list').on('click', 'li', function(e) {
			e.preventDefault();

			var $self = $(this),
				uid = $self.data('uid'),
				parentUid = $self.parent().data('parent-uid'),
				$configurator = $('#configurator');



			if( $self.data('text') == 'close' ) {
				if( $self.parent().data('[data-parent-uid]') ) {
					$configurator.find('[data-hotspot-uid="'+parentUid+'"]').addClass('active')
				}
				else {
					$configurator.find('[data-hotspot-uid]').removeClass('active');
				}
				
			}
			else {			
				
				$configurator.find('[data-hotspot-uid="'+uid+'"]').addClass('active').siblings('[data-hotspot-uid]').removeClass('active');
			}

		});

		/* add/change image */
		$('.banner-img-list').on('click', '[data-changeimage]', function(e) {
			e.preventDefault();

			// Append images for preview
			appendImagetoPreview( $(this) );

		});

		$('#left-bar-menu').on('click', '.reset', function(e) {

			e.preventDefault();
			e.stopPropagation();

			resetComponent( resetKey );

		});

		$('#inspiration-con').on('click', '.apply-ins', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var key = $(this).data('key');

			// resetComponent( key );

		});

		$('#left-bar-menu').on('click', '.inspiration-popup', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self = $(this),
				$inspirationWrap = $('.inspiration-wrap');

			$inspirationWrap.removeClass('inspiration-form');

			$inspirationWrap.fadeIn(400);
			$inspirationWrap.find('.update-inspiration').fadeOut(0);
			$inspirationWrap.find('.add-new-inspiration').fadeIn(0);

		});

		// Open Inspiration Popup
		$('.add-new-inspiration-form').on('click', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self = $(this),
				$inspirationWrap = $self.closest('.inspiration-wrap');

			$inspirationWrap.addClass('inspiration-form');

			$inspirationWrap.find('.add-new-inspiration').fadeIn(400);

		});

		// Cancel Inspiration Form
		$('.cancel-inspiration-form').on('click', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self = $(this),
				$inspirationWrap = $self.closest('.inspiration-wrap');

			$inspirationWrap.removeClass('inspiration-form');

			$inspirationWrap.fadeOut(0);

		});

		// Reset Components
		$('.more-product-con').on('click', '.reset-components', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self = $(this),
				$inspirationWrap = $self.closest('.inspiration-wrap'),
				configurator_id = $inspirationWrap.data('config-id'),
				$insList = $self.closest('.ins-list'),
				value = $insList.data('value'),
				key = decodeStr( value.key );

			$inspirationWrap.fadeOut(0);
			resetComponent( key );

		});

		$('#inspiration-key-popup').on('change', '.existing-group', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self = $(this),
				val = $self.val(),
				$groupInput = $('.custom-ins-group');

			if( 0 != val ) {
				$groupInput.val(val);
			}			

		});

		$('#inspiration-key-popup').on('click', '.ins-list', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self = $(this),
				values = $self.data('value'),
				$inspiration = $('#add-new-inspiration'),
				$saveBtn = $inspiration.find('[data-type="update"]');

			$self.toggleClass('selected').siblings().removeClass('selected');
			$self.find('p span').toggleClass('pwc-tick').end().siblings().find('p span').removeClass('pwc-tick');

			if( $self.hasClass('selected')) {
				$saveBtn.fadeIn(0);
			}
			else {
				$saveBtn.fadeOut(0);
			}

			// Apply value to the input for update
			$inspiration.find('.custom-ins-group').val(values.group);
			$inspiration.find('.custom-ins-name').val(values.name);
			$inspiration.find('.custom-ins-desc').val(values.desc);
			$inspiration.find('.custom-ins-icon').val(values.icon);			

		});

		// Add Inspiration
		$('.inspiration-wrap').on('click', '.save-inspiration', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self          = $(this),
				values         = {},
				$con           = $self.parents('.inspiration-wrap'),
				$popup         = $con.find('.inspiration-form'),
				$fieldGroup    = $con.find('.add-new-inspiration .ins-field-group'),
				group          = $fieldGroup.find('.custom-ins-group').val(),
				name           = $fieldGroup.find('.custom-ins-name').val(),
				desc           = $fieldGroup.find('.custom-ins-desc').val(),
				image          = $fieldGroup.find('.custom-ins-image').val(),
				configuratorId = $con.data('config-id'),
				key            = $con.data('key'),
				price          = $con.data('price'),
				type           = $self.data('type');

			values = { 'group': group, 'configurator_id': configuratorId, 'name': name, 'desc': desc, 'price': price, 'key': key, 'image': image };

			// Save inspiration key via ajax
			saveInspiration( $self, type, values );

		});

		// Delete Inspiration List
		$('.more-product-con').on('click', '.delete-inspiration', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self          = $(this),
				$sure = confirm( 'Are you sure? Do you want to remove this inspiration? ' ),
				values,
				$con           = $self.parents('.more-product-con'),
				configuratorId = $con.data('config-id'),
				value          = $self.closest('.ins-list').data('value'),
				type           = $self.data('type');

			values = { 'configurator_id': configuratorId, 'index': value.index, 'group': value.group };

			// Save inspiration key via ajax
			if( $sure ) {
				saveInspiration( $self, type, values );
			}

		});

		// Delete Inspiration Group
		$('.more-product-con').on('click', '.delete-inspiration-group', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self          = $(this),
				$sure = confirm( 'Are you sure? Do you want to remove the inspiration group? ' ),
				values,
				$con           = $self.parents('.more-product-con'),
				configuratorId = $con.data('config-id'),
				group          = $self.data('group'),
				groupIndex          = $self.data('group-index'),
				type           = $self.data('type');

			values = { 'configurator_id': configuratorId, 'group': group, 'group-index': groupIndex };

			// Save inspiration key via ajax
			if( $sure ) {
				saveInspiration( $self, type, values );
			}

		});

		// Reset Inspiration List
		$('.more-product-con').on('click', '.reset-inspiration', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self          = $(this),
				$sure = confirm( 'Are you sure? Do you want to overwrite the inspiration? ' ),
				values,
				$con           = $self.parents('.more-product-con'),
				configuratorId = $con.data('config-id'),
				key            = $con.data('key'),
				value          = $self.closest('.ins-list').data('value'),
				type           = $self.data('type');

			if( undefined != typeof(key) ) {

				values = { 'configurator_id': configuratorId, 'index': value.index, 'group': value.group, 'key': key };

				// Save inspiration key via ajax
				if( $sure ) {
					saveInspiration( $self, type, values );
				}
			}

		});

		// Tab
		$('.more-product-con').on('click', 'li', function(e) {
			e.preventDefault();

			var anchor = $(this).data('anchor'),
				$tab = $(this).parents('.more-product-list');

			$(this).addClass('active').siblings().removeClass('active');

			$tab.find('.tab-content .tab').fadeOut(0);

			$tab.find('.tab-content').find('.'+anchor).fadeIn(400);

			$tab.find('.tab-content').find('.'+anchor).addClass('current').siblings().removeClass('current');

		});

		// Update Form
		$('.more-product-con').on('click', '.update-form', function(e) {

			var $self              = $(this),
				$con               = $('.inspiration-wrap'),
				configuratorId     = $con.data('config-id'),
				values              = $self.closest('.ins-list').data('value'),
				$updateInspiration = $con.find('.update-inspiration'),
				$fieldGroup        = $updateInspiration.find('.ins-field-group'),
				$fieldBtn          = $updateInspiration.find('.ins-field-btn a');

			// Update form values
			$fieldGroup.find('.custom-ins-name').val(values.name);
			$fieldGroup.find('.custom-ins-desc').val(values.desc);
			$fieldGroup.find('.custom-ins-image').val(values.image);

			// Pass the current inspiration list values to the update button for modifying the current inspiration
			$fieldBtn.data('value', values);

			$con.fadeIn(0);
			$con.find('.add-new-inspiration').fadeOut(0);
			$con.find('.inspiration-lists').fadeOut(0);
			$con.find('.update-inspiration').fadeIn(400);

		});

		// Update the inspiration list
		$('.more-product-con').on('click', '.update-inspiration-list', function(e) {

			e.preventDefault();
			e.stopPropagation();

			var $self              = $(this),
				$con               = $self.parents('.more-product-con'),
				$updateInspiration = $con.find('.update-inspiration'),
				$fieldGroup        = $updateInspiration.find('.ins-field-group'),
				configuratorId     = $con.data('config-id'),
				values             = $self.data('value'),
				type               = $self.data('type'),
				name               = $fieldGroup.find('.custom-ins-name').val(),
				desc               = $fieldGroup.find('.custom-ins-desc').val(),
				image              = $fieldGroup.find('.custom-ins-image').val();

			values = { 'group': values.group, 'configurator_id': configuratorId, 'index': values.index, 'name': name, 'desc': desc, 'image': image };

			// Save inspiration key via ajax
			saveInspiration( $self, type, values );

		});

		$('.existing-group').on('change', function(e) {
			e.preventDefault();
			var $self      = $(this),
				value      = $self.val(),
				$con       = $self.parents('.inspiration-wrap'),
				$nameField = $con.find('.custom-ins-group');

			if( 0 != value ) {
				$nameField.val(value);
			}
			else {
				$nameField.val('');
			}

		});

		// Tab
		$('.tab-menu').on('click', '.menu', function(e) {
			e.preventDefault();

			if($(this).parent().hasClass('active')){
				return;
			}

			var anchor = $(this).data('anchor'),
				$tab = $(this).parents('.tab');

			$(this).parent().addClass('active').end().parent().siblings().removeClass('active');

			$tab.find('.tab-content .tab').fadeOut(0);

			$tab.find('.tab-content').find('.'+anchor).fadeIn(400);

		});

		// Copy share Url
		$('#share-wrap').on('click', '.copy-link', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			clipboard.copy(url);

		});

		// Close popup
		$('.popup').on('click', '.close-popup', function(e) {

			e.preventDefault();

			$(this).closest('.popup').fadeOut(400);

		});

		// Trigger share popup
		$('#left-bar-menu').on('click', '.share', function(e) {

			e.preventDefault();

			$('#share-wrap').fadeIn(400);

		});

		var windowWidth = $(window).width();
		$(window).on('resize', function(e) {
			windowWidth = $(window).width();
		});

		$("#cart-list-wrap").on('click', '.change-btn', function(e) {
			e.preventDefault();

			var $self = $(this),
				$control = $('.banner-list-sec'),
				parentUid = $self.data('parent-uid');

			// hide all control
			$control.addClass('hover-hide');
			$control.find('li').removeClass('fadeInUp').addClass('animated fadeOutUp');
			
			$control.find('li[data-uid="'+parentUid+'"]').trigger('click');

			if( windowWidth <= 768 ) {
				$('.right-icon').trigger('click');
			}

		});

		$("#cart-list-wrap").on('click', '.remove-btn', function(e) {
			e.preventDefault();

			deselectLayer( $(this) );

		});

		$('.inner-sec').on('click', '[data-changeimage]', function(e) { // '.inner-sec'
			e.preventDefault();

			var $self = $(this),
				multiple = $self.parent().data('multiple'),
				single = $self.parent().data('single'),
				required;

			if( !$self.hasClass('current') ) {
				if( multiple ) {
					$self.addClass('current');
				}
				else{
					if( 'undefined' == typeof( single ) ) {
						$self.addClass('current').siblings().removeClass('current');
					}
					else {
						$('[data-single="'+single+'"]').find('li[data-uid]').removeClass('current');
						$self.addClass('current');
					}
				}

				// Send the array key
				passArrayKeyforActive( $(this) );
				
				addSidebarContent( $self );
			}
			else {

				required = $self.parent().data('required');
				required = ( 'undefined' == typeof( required ) ) ? false : required;

				if( multiple ) {

					if( required ) {

						if( $self.siblings('li').hasClass('current') ) {
							if( $self.hasClass('current') ) {
								deselectLayer( $(this) );
							}
							else {
								$self.addClass('current');
							}
						}
						else {
							$self.addClass('current');
						}
						
					}
					else {
						if( $self.hasClass('current') ) {
							deselectLayer( $(this) );
						}
						else {
							$self.addClass('current');
						}
					}
				}
				else {
					if( required ) {
						$self.addClass('current');
					}
					else {
						if( $self.hasClass('current') ) {
							deselectLayer( $(this) );
						}
						else {
							$self.addClass('current');
						}
					}
					
					$self.siblings('li').removeClass('current');
				}
			}

		});

	});

	$(window).resize(function () {
		$("#configurator .pwc-preview-inner").height( $(window).height() - 150 );
		loadPreview();
		applyResponsive();		
	});

	$(window).load(function() {

		$("#configurator .pwc-preview-inner").height( $(window).height() - 150 );
		$("#configurator").height( $(window).height() - 150 );

		$(".right-icon").on("click",function(e){
			e.preventDefault();
			$(".right-icon-cart").toggleClass("right-0");
			$('body').toggleClass('body-right');
		});

		$(".right-icon-cart .close-icon").on("click",function(e){
			e.preventDefault();
			$('.right-icon').trigger( "click" );
		});

		$(".left-icon-menu .icon-view").on("click",function(e){
			e.preventDefault();
			$(".left-position-content").toggleClass("left-0");
			$('body').toggleClass('body-left');
		});

		$(".more-product-con .close-icon").on("click",function(e){
			e.preventDefault();
			$('.left-icon-menu .icon-view').trigger( "click" );
		});
		
		$("#cart-list-wrap").on('click', '.icon-add-close, .parent-title, .cart-img', function(e) {
			e.preventDefault();
			$(this).parents('.cart-item').next().slideToggle(400);
			$(this).parents('.cart-item').find('.icon-add-close').toggleClass('close');
		});

		/* Option set (icons in bottom) */
		var $controls = $('.banner-img-list'),
			$configurator = $('#configurator');
		$controls.on('click', '[data-open-optionset]', function(e) {
			e.preventDefault();

			var $self = $(this),
				$parent = $self.parent('.banner-img-list'),
				$optionset = $('[data-optionset="'+ $self.data('open-optionset') +'"]');

			hideOptions( $parent );

			showOptions( $optionset );

			if( $optionset.width() > $(window).width() ) {

				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$(this).closest('.banner-list-con').addClass('show-scroll mobile');
				} else {
					$(this).closest('.banner-list-con').addClass('show-scroll');
				}

			} else {

				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$(this).closest('.banner-list-con').removeClass('show-scroll mobile');
				} else {
					$(this).closest('.banner-list-con').removeClass('show-scroll');
				}
				
			}

		});

		/* hotspot trigger */
		$configurator.on('click', '.pwc-hotspot', function(e) {

			if( $(this).hasClass('active') ) {
				return;
			}

			var uid = $(this).data('hotspot-uid'),
			$parent = $controls.find('[data-uid="' + uid + '"]').parent('.banner-img-list');

			// Add active class
			$configurator.find('.pwc-hotspot').removeClass('active');
			$(this).addClass('active');

			// hide all control
			$controls.parent('.banner-list-sec').addClass('hover-hide');
			$controls.find('li').removeClass('fadeInUp').addClass('animated fadeOutUp');

			// trigger 
			$controls.find('[data-uid="' + uid + '"]').trigger('click');

		});

		$(".owl-carousel").each( function( index, el ) {

			var elem = {};
			elem.Items              = ( typeof ( $(this).data( 'items' ) ) == 'undefined' ) ? 1 : $(this).data( 'items' ), 
			elem.Margin             = ( typeof ( $(this).data( 'margin' ) ) == 'undefined' ) ? 0 : $(this).data( 'margin' ),
			elem.Loop               = ( typeof ( $(this).data( 'loop' ) ) == 'undefined' ) ? false : $(this).data( 'loop' ),
			elem.Center             = ( typeof ( $(this).data( 'center' ) ) == 'undefined' ) ? false : $(this).data( 'center' ),
			elem.MouseDrag          = ( typeof ( $(this).data( 'mouse-drag' ) ) == 'undefined' ) ? true : $(this).data( 'mouse-drag' ),
			elem.TouchDrag          = ( typeof ( $(this).data( 'touch-drag' ) ) == 'undefined' ) ? true : $(this).data( 'touch-drag' ),
			elem.StagePadding       = ( typeof ( $(this).data( 'stage-padding' ) ) == 'undefined' ) ? 0 : $(this).data( 'stage-padding' ),
			elem.StartPosition      = ( typeof ( $(this).data( 'start-position' ) ) == 'undefined' ) ? 0 : $(this).data( 'start-position' ),
			elem.Nav                = ( typeof ( $(this).data( 'nav' ) ) == 'undefined' ) ? true : $(this).data( 'nav' ),
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

			var config = $(this).owlCarousel({
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
				autoplay: elem.Autoplay,
				autoplayTimeout: elem.AutoplayTimeout,
				autoplayHoverPause: elem.AutoplayHoverPause,
				responsive: {0:{'items':1},768:{'items':elem.TabItems},991:{'items': elem.Items },1199:{'items': elem.Items }},
				animateOut: elem.AnimateOut,
				animateIn: elem.AnimateIn,
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
				onInitialized: function() {
					loadPreview( true );
					applyResponsive();
				}
			});
			
		});

		// Append zoom icon
		$('#configurator-view .owl-dots').after('<div class="zoom-icon"><span class="pwc-zoom-in"></span></div>');

		$('#configurator-view .owl-dots, #configurator-view .zoom-icon').wrapAll('<div class="owl-dots-wrapper"></div>');

		$('#configurator-view').on('click', '.zoom-icon span', function(e) {
			e.preventDefault();

			var $elem,
				$innerElement,
				$inner,
				width,
				height;

			$elem = $("#configurator-view .active .pwc-preview-inner").clone();
			$elem.css('transform', 'scale(1.5)');
			$elem.css('height', '100%');
			$innerElement = $('<div />', {id: "zoom-image"}).html($elem);
			$innerElement.wrapInner('<div class="zoom-image-con"><div class="zoom-image-inner"></div></div>');
			$innerElement.find('.subset').wrapInner('<div class="zoom-image-con"><div class="zoom-image-inner"></div></div>');
			$innerElement.appendTo('#wrapper');
			$('<span class="zoom-close pwc-thin-cross"></span>').appendTo('#zoom-image');

			$inner = $('#zoom-image .pwc-preview-inner');
			width = $inner.width()*1.5,
			height = $inner.height()*1.5;

			onZoom( $inner, width, height );

		});

		$('#wrapper').on('click', '.zoom-close', function(e) {
			e.preventDefault();
			$('#zoom-image').remove();
		});

		

		/* Take screenshot */
		$('#left-bar-menu').on('click', '#take-photo', function(e) {
			e.preventDefault();
		
			var $elem 	  = $("#configurator-view .active .pwc-preview-inner"),
				maxWidth  = pwc.entireWidth  - pwc.minLeft,
				maxHeight = pwc.entireHeight - pwc.minTop;

			var $elemCon = $("#configurator-view .active .pwc-preview-inner").clone(),
				$scaledElement = $('<div />', {id: "screenshot-con"}).html($elemCon.html());
				
			$scaledElement.width(maxWidth + 80 ).height(maxHeight + 80);
			$scaledElement.appendTo('body');

			loadPreview( false, $scaledElement );

			html2canvas($scaledElement, {
				onrendered: function(canvas) {
					var theCanvas = canvas,
						today = new Date(),
						date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate(),
						time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
						dateTime = date+' '+time,
						filename;

					filename =  document.title + ' ' + dateTime + '.png'.toLowerCase();

					canvas.toBlob(function(blob) {
						saveAs(blob, filename);
					});

					// window.open( canvas.toDataURL(), '_blank' );

					$scaledElement.remove();

				}
			});

		});

		// select text inputs on click
		$("#share-wrap input[type='text']").on("focus", function () {
			$(this).select();
		});

	});

})(jQuery);