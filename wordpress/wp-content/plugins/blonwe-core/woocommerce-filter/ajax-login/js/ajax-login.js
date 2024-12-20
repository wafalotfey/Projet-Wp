jQuery(document).ready(function($) {
	"use strict";

	$(document).on('submit', '.woocommerce-form-login', function(event){
		event.preventDefault(); 

		var form = $(this);

		var loginform = $(this).serialize();

        var data = {
			cache: false,
			type: 'POST',
            action: 'ajax_login',
			beforeSend: function() {
				form.find('button.woocommerce-form-login__submit').append('<svg class="loader-image preloader quick-view" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
				form.find('button.woocommerce-form-login__submit').attr('disabled', true);
			},
			logindata: loginform,
			
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {

			if(response?.data?.redirecturl){
				window.location.href = response.data.redirecturl;
				return;
			}
			
			// Remove notices from all sources
			$( '.woocommerce-error, .woocommerce-message' ).remove();
			
			form.find('button.woocommerce-form-login__submit').after('<ul class="woocommerce-error"><li>' + response + '</li></ul>');

		
			$(".loader-image").remove();
			form.find('button.woocommerce-form-login__submit').attr('disabled', false);
        });
    });	
	
	
	$(document).on('submit', '.woocommerce-form-register', function(event){
		event.preventDefault(); 

		var form = $(this);

		var registerform = $(this).serialize();

        var data = {
			cache: false,
			type: 'POST',
            action: 'ajax_register',
			beforeSend: function() {
				form.find('button.woocommerce-form-register__submit').append('<svg class="loader-image preloader quick-view" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
				form.find('button.woocommerce-form-register__submit').attr('disabled', true);
			},
			registerdata: registerform,
			
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {

			if(response?.data?.redirecturl){
				window.location.href = response.data.redirecturl;
				return;
			}
			
			// Remove notices from all sources
			$( '.woocommerce-error, .woocommerce-message' ).remove();
			
			form.find('button.woocommerce-form-register__submit').after('<ul class="woocommerce-error"><li>' + response + '</li></ul>');

		
			$(".loader-image").remove();
			form.find('button.woocommerce-form-register__submit').attr('disabled', false);

        });
    });	

});