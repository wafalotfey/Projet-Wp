var minicartslider = {};

jQuery(document).ready(function($) {
	"use strict";
	
	$( document.body ).on( 'added_to_cart removed_from_cart', function(){
		setTimeout(() => {
			minicartslider();
		}, 1000);
	});


	minicartslider = function() {
      const container = document.querySelectorAll( '.site-scroll' );

      for( var i = 0; i < container.length; i++ ) {
        const ps = new PerfectScrollbar( container[i], {
          suppressScrollX: true,
          wheelPropagation: true
        });

        ps.update();
      }
	}
	

	minicartslider();
	setTimeout(() => {
		minicartslider();
	}, 1000)

});