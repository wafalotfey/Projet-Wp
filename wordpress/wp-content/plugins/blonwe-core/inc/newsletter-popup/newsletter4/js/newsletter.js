(function ($) {
  "use strict";
  
	var win = $( window );
	var body = $( 'body' );
	var popup = $( '.klb-newsletter-popup' ),
	popupClose = $( '.klb-newsletter-popup .newsletter-close' ),
	popupExpires = popup.data( 'expires' ),
	popupOverlay = $( '.newsletter-mask' );

	if (!( Cookies.get( 'newsletter-popup-visible' ) ) ) {
		win.on( 'load', function() {
			body.addClass( 'popup-visible' );
		});
	}
	
	$(".klb-newsletter-popup .close-popup-button").on('click', function(){
		body.removeClass( 'popup-visible' );
		Cookies.set( 'newsletter-popup-visible', 'disable', { expires: popupExpires, path: '/' });
		return false;
	});

	popupClose.on('click', function(){
		body.removeClass( 'popup-visible' );
		return false;
	});
	
	popupOverlay.on('click', function(){
		body.removeClass( 'popup-visible' );
		return false;
	});
	
	$(document).ready(function() {
		setTimeout(() => {
			$('.popup-visible .newsletter-image').css({'height': $('.popup-visible .newsletter-inner').outerHeight()});
		}, 500)
		
	});

}(jQuery));
