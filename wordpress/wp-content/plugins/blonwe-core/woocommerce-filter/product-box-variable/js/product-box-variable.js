(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		woocommerceProductBoxVariableAjax();
	});

	function woocommerceProductBoxVariableAjax() {
		// Klb Notice
		$('body').append('<div class="klb-notice-ajax"></div>');
	
		
		$('.products .product a.product_type_variable').on('click', function(e) {
			e.preventDefault();
			setTimeout(() => {
				$(this).closest('.product').find('.variations_form button.single_add_to_cart_button').trigger('click');
			}, 10);
		});
		
		// AJax single add to cart
		$('.products .product form.variations_form').on('submit', function(e) {

			e.preventDefault();

			var form = $(this);

			var formData = new FormData(form[0]);
			formData.append('add-to-cart', form.find('[name=add-to-cart]').val() );
			formData.append('klb-product-box-variable', form.find('[name=add-to-cart]').val() );

			// Ajax action.
			$.ajax({
				url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'blonwe_add_to_cart_variable_archive' ),
				data: formData,
				type: 'POST',
				processData: false,
				contentType: false,
				beforeSend: function() {
					form.closest('.product').find('a.product_type_variable').addClass('loading');
				},
				complete: function( response ) {

					response = response.responseJSON;

					// Redirect to cart option
					if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
						window.location = wc_add_to_cart_params.cart_url;
						return;
					}

					if ( ! response ) {
						return;
					}

					if ( response.error && response.product_url ) {
						window.location = response.product_url;
						return;
					}

					var $thisbutton = form.find('.single_add_to_cart_button'); //
					// $thisbutton = null; // uncomment this if you don't want the 'View cart' button

					// Trigger event so themes can refresh other areas.
					$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );

					$(response.fragments.notices_html).appendTo('.klb-notice-ajax').delay(3000).fadeOut(300, function(){ $(this).remove();});

					//Close icon
					$('.woocommerce-message, .woocommerce-error').append('<div class="klb-notice-close"><i class="klb-icon-xmark-thin"></i></div>');
					$('.klb-notice-close').on('click', function(){
						$(this).closest('.woocommerce-message, .woocommerce-error').remove();
					});
					
					form.closest('.product').find('a.product_type_variable').removeClass('loading');

					
				},
				dataType: 'json'
			});
		});
	}
	
	$(document).ready(function() {
		woocommerceProductBoxVariableAjax();
	});
	
}(jQuery));