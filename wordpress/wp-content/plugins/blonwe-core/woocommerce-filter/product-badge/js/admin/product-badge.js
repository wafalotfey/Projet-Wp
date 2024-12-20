(function ($) {
  "use strict";

	$(document).ready(function() {
		$('.blonwe-color-field').wpColorPicker();

		$('#klb_product_badge_type-label').closest('.rwmb-field').hide();
		$('#klb_product_badge-label').closest('.rwmb-field').hide();
		
		// hide percentage fields
		$( 'input#_klb_product_percentage_check' ).on( 'change', function() {
			if ( $( this ).is( ':checked' ) ) {
				$( 'div.percentage_fields' ).hide();
			} else {
				$( 'div.percentage_fields' ).show();
			}
		}).trigger( 'change' );
	});
	
}(jQuery));