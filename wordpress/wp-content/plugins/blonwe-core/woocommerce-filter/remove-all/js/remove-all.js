jQuery(document).ready(function($) {
	"use strict";
	
	$(document).on('click', '.remove-all', function(event){
		event.preventDefault(); 

        var data = {
			type: 'POST',
			timeout: 3000,
			cache: false,
            action: 'remove_all_from_cart',
			beforeSend: function () {
				$('form.woocommerce-cart-form, .cart-collaterals').addClass( 'processing' );
			},
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			$( document.body ).trigger( 'wc_update_cart' );
			$( document.body ).trigger( 'wc_fragment_refresh' );
        });
    });
	

});