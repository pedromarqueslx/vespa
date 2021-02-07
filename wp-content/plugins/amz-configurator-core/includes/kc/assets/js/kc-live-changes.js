console.log( 'testing!' );

var args = {

	'amz_heading' : {
		
		'title' : function( inp, el, atts ){

			console.log( 'working title typing!' );
			
			// el.html( inp.value );

		},
					
	}
}

kc.front.live_changes( args );
