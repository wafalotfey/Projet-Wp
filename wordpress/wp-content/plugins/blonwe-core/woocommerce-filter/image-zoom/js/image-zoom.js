(function ($) {
  "use strict";

	$(document).ready(function() {
		
		if ($(".flex-viewport")[0]){
			$("a.woocommerce-product-gallery__trigger").appendTo(".flex-viewport");
		} else {
			$("a.woocommerce-product-gallery__trigger").appendTo(".woocommerce-product-gallery");
		}
		
		$( '.variations_form' ).on( 'woocommerce_variation_select_change', function() {
			setTimeout(() => {
				$('.woocommerce-product-gallery__image').trigger('zoom.destroy');	
				$('.woocommerce-product-gallery__image').zoom({url: $('.woocommerce-product-gallery__image a').attr("href")});
			}, 500);
		});

		$('.woocommerce-product-gallery__image').zoom();

		$('.product-box-image-zoom').zoom();
		
	});
	
}(jQuery));