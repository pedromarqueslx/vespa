( function( window, $ ){
	"use strict";

	window.amz_front = {
		
		$body : $('body'),
		$window : $(window),

		init : function() {

			this.onDocumentReady();
			this.onWindowLoad();

		},

		onDocumentReady: function() {
			var self = this;
			$( document ).ready(function() {
				//console.log( 'document ready!!!' );
				// self.carousel_images();
			});
		},

		onWindowLoad: function() {
			var self = this;
			$( window ).load(function() {
				// console.log( 'window loaded!!!' );
			});
		}

	};

	amz_front.init();

})( window, jQuery );