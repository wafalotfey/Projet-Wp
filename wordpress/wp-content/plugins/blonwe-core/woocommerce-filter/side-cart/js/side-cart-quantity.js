jQuery(document).ready(function($) {
	"use strict";
	
	$(document).on('click', '.cart-widget-side .quantity-button.plus', function(event){
		event.preventDefault(); 

		var clicked = $(this);
		
		// plus
		var qty_input = $(this).closest('.product').find('.input-text.qty')
		var qty_step = $(qty_input).attr('step') ? parseFloat($(qty_input).attr('step')) : '1';
		var qty_min = parseFloat($(qty_input).attr('min'));
		var qty_max = parseFloat($(qty_input).attr('max'));
		var vl = parseFloat($(qty_input).val());
		
		vl = ( (vl + qty_step) > qty_max ) ? qty_max : (vl + qty_step);
		$(qty_input).val(vl);
		

        var data = {
			type: 'POST',
			timeout: 3000,
			cache: false,
            action: 'sidecart_quantity_button',
			beforeSend: function () {
				clicked.css('pointer-events','none');
				clicked.append('<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>')
			},
			id: clicked.closest('.product').find('a.remove').attr('data-product_id'),
			quantity : clicked.prev().val(),
			name : clicked.closest('.product').find('.input-text.qty').attr('name'),
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			$( document.body ).trigger( 'wc_fragment_refresh' );
			$('svg.preloader.added').remove();
			clicked.css('pointer-events','');
        });
    });
	
	$(document).on('click', '.cart-widget-side .quantity-button.minus', function(event){
		event.preventDefault(); 
		var clicked = $(this);

		var qty_input = $(this).closest('.product').find('.input-text.qty')
		var qty_step = $(qty_input).attr('step') ? parseFloat($(qty_input).attr('step')) : '1';
		var qty_min = parseFloat($(qty_input).attr('min'));
		var qty_max = parseFloat($(qty_input).attr('max'));
		var vl = parseFloat($(qty_input).val());
		
		vl = ( (vl - qty_step) < qty_min ) ? qty_min : (vl - qty_step);
		$(qty_input).val(vl);

        var data = {
			type: 'POST',
			timeout: 3000,
			cache: false,
            action: 'quantity_button',
			beforeSend: function () {
				clicked.css('pointer-events','none');
				clicked.append('<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>')
			},
			id: $(this).closest('.product-button-group').find('a.button').attr('data-product_id'),
			quantity : clicked.next().val(),
			name : clicked.closest('.product').find('.input-text.qty').attr('name'),
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
		
			$( document.body ).trigger( 'wc_fragment_refresh' );
			$('svg.preloader.added').remove();
			clicked.css('pointer-events','');
        });
    });

	var searchinput = $('.cart-widget-side .quantity input.qty');
	var timeout;

	$(document).on('keyup', searchinput, function(event){
		event.preventDefault();

		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			var data = {
				cache: false,
				type: 'POST',
				timeout: 3000,
				cache: false,
				action: 'sidecart_quantity_button',
				beforeSend: function () {
					$(event.target).css('pointer-events','none');
					$(event.target).closest('.product').find('.quantity').append('<svg class="loader-image preloader added" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>')
				},
				id: $(this).closest('.product-button-group').find('a.button').attr('data-product_id'),
				quantity : $(event.target).val(),
				name : $(event.target).closest('.product').find('.input-text.qty').attr('name'),

				
			};

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			$.post(MyAjax.ajaxurl, data, function(response) {

				$( document.body ).trigger( 'wc_fragment_refresh' );
				$('svg.preloader.added').remove();
				$(event.target).css('pointer-events','');

			});
		}, 400);	
		
    });

});