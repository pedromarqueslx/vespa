(function($){

	var amzWishlist = function (e){

		e.preventDefault();

		var $self = $(this),
			postID = $self.data('id'),
			remove = $self.data('remove');

		amzUpdateCookie( postID, $self, remove );

	},

	amzUpdateCookie = function ( postID, $self, remove ){

		var noItemText = wishlist.no_item_text;

		$.ajax({
			type: 'post',
				url: wishlist.ajaxurl,
				beforeSend: function(){
					$self.addClass( 'loading' );
				},
				data: {
					action	:	'woo_wishlist',
					postid	:	postID,
				},
		}).done(function( response ) {

			$self.toggleClass('active');

			if( remove ) {
				$self.parents('.wishlist-item').remove();
				if( $('.wishlist-products').find('.wishlist-item').length == 0 ) {
					$('.wishlist-heading').remove();
					$('.wishlist-products').html('<p>'+noItemText+'</p>');
				}
			}
			
		}).always(function(){
			$self.removeClass( 'loading' );
		});
	};

	$('#main-wrapper').on( 'click' , '.amz-wishlist', amzWishlist );

})( jQuery );