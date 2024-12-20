jQuery(document).ready(function($) {
	"use strict";

	$(document).on('click', '.reviews-slot .ratings-summary a', function(event){
		event.preventDefault();
		
		if($(this).data('rating_count') < 1){
			return;
		}
		
        var data = {
			cache: false,
            action: 'comment_rating',
			beforeSend: function() {
				$('ol.commentlist').append('<svg class="loader-image preloader comment-rating" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>');
			},
			'rating': $(this).data('rating'),
			'product_id': $(this).data('product_id'),
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			
            $('ol.commentlist').html(response);

			$(".loader-image").remove();

        });
    });	

});