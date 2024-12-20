jQuery(document).ready(function($) {
	"use strict";
	
	$(document).on('click', '.klb-load-more', function(event){
		event.preventDefault(); 
        var data = {
			cache: false,
            action: 'load_more',
			beforeSend: function() {
				$('.content-wrapper .primary-column .products').append('<svg class="loader-image preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
			},
			'current_page': loadmore.current_page,
			'per_page': loadmore.per_page,
			'term_id': loadmore.term_id,
			'taxonomy': loadmore.taxonomy,
			'filter_cat': loadmore.filter_cat,
			'layered_nav': loadmore.layered_nav,
			'on_sale': loadmore.on_sale,
			'orderby': loadmore.orderby,
			'shop_view': loadmore.shop_view,
			'min_price': loadmore.min_price,
			'max_price': loadmore.max_price,
			'is_search': loadmore.is_search,
			's': loadmore.s,
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(loadmore.ajaxurl, data, function(response) {
            $('.content-wrapper .primary-column .products').append(response);

			if ( loadmore.current_page == loadmore.max_page ){
				$('.site-content .primary-column .products').after('<div class="no-more-products"><div class="button">' + loadmore.no_more_products + '</div></div>');
				$('.klb-load-more').remove();
				$(".loader-image").remove();
				return false;
			}
			
			loadmore.current_page++;
			
			if ( loadmore.current_page == loadmore.max_page ){
				$('.klb-load-more').remove();
				$('.content-wrapper .primary-column .products').after('<div class="no-more-products"><div class="button">' + loadmore.no_more_products + '</div></div>');
			}
			
			$(".loader-image").remove();

			blonweThemeModule.productHover();

	 		const addtocartquantity = document.querySelector('.cart-with-quantity');
			if (addtocartquantity !== null) {
				blonweThemeModule.addtocartquantity();
			}
			
			const hoverslider = document.querySelector('.product-thumbnail-gallery');
			if (hoverslider !== null) {
				blonweThemeModule.hoverslider();
			}
			
			
			
        });
    });	

});