(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.productquantity();
	});

	blonweThemeModule.productquantity = function() {
		function qty() {
			var container = $( '.quantity:not(.ajax-quantity)' );
			$("form.cart.grouped_form .input-text.qty").attr("value", "0");
			
			container.each( function() {
			  var self = $( this );
			  var buttons = $( this ).find( '.quantity-button' );
			  buttons.each( function() {
				$(this).on( 'click', function(event) {
				  var qty_input = self.find( '.input-text.qty' );
				  if ( $(qty_input).prop('disabled') ) return;
				  var qty_step = $(qty_input).attr('step') ? parseFloat($(qty_input).attr('step')) : '1';
				  var qty_min = parseFloat($(qty_input).attr('min'));
				  var qty_max = parseFloat($(qty_input).attr('max'));


				  if ( $(this).hasClass('minus') ){
					var vl = parseFloat($(qty_input).val());
					vl = ( (vl - qty_step) < qty_min ) ? qty_min : (vl - qty_step);
					$(qty_input).val(vl);
				  } else if ( $(this).hasClass('plus') ) {
					var vl = parseFloat($(qty_input).val());
					vl = ( (vl + qty_step) > qty_max ) ? qty_max : (vl + qty_step);
					$(qty_input).val(vl);
				  }

				  qty_input.trigger( 'change' );
				});
			  });
			});
		}

		qty();
		$('body').on( 'updated_cart_totals', qty );
	}
	
	$(document).ready(function() {
		blonweThemeModule.productquantity();
	});

})(jQuery);
