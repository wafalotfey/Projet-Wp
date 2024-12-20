(function ($) {
  "use strict";
  
	$(document).on('click', '.buy_now_button', function(event){
		
		if ( $( this ).prev().is('.disabled') ) {
			event.preventDefault();

			if ( $( this ).prev().is('.wc-variation-is-unavailable') ) {
				window.alert( wc_add_to_cart_variation_params.i18n_unavailable_text );
			} else if ( $( this ).prev().is('.wc-variation-selection-needed') ) {
				window.alert( wc_add_to_cart_variation_params.i18n_make_a_selection_text );
			}
		}
		
		
	});
	

	
}(jQuery));