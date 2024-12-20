jQuery(document).ready(function($) {
	"use strict";

	$(document).on('click', '.module-header-tab li:not(active) a', function(event){
		event.preventDefault(); 
		
		var $thisbutton = $(this);
		
		if ($(this).closest('.klb-module').hasClass("module-products-grid type-list")) {
		  var $action = 'tab_view_list';
		  var $find = $(this).closest('.klb-module').find('.klb-products-tab .products');
		} else if ($(this).closest('.klb-module').hasClass("module-products-grid style-6")) {
		  var $action = 'tab_view_grid';
		  var $find = $(this).closest('.klb-module');
		} else if ($(this).closest('.klb-module').hasClass("products-column")) {
		  var $action = 'tab_view_grid2';
		  var $find = $(this).closest('.klb-module').find('.klb-products-tab .products');
		} else {
			var $action = 'tab_view';
			var $find = $(this).closest('.klb-module').find('.klb-products-tab .products');
		}

		
        var data = {
			cache: false,
            action: $action,
			beforeSend: function() {
				$($thisbutton).closest('.klb-module').find('.klb-products-tab').append('<svg class="tab-ajax loader-image preloader quick-view" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
			},
			'catid': $(this).attr('id'),
			'items': $find.data('items'),
			'mobile': $find.data('mobileitems'),
			'tablet': $find.data('tabletitems'),
			'speed': $find.data('speed'),
			'post_count': $find.data('perpage'),
			'dots': $find.data('dots'),
			'arrows': $find.data('arrows'),
			'autoplay': $find.data('autoplay'),
			'autospeed': $find.data('autospeed'),
			'producttype': $find.data('producttype'),
			'productclass': $find.attr('class').replace(/slick-(\S+)/g,''),
			'best_selling': $find.data('best_selling'),
			'featured': $find.data('featured'),
			'on_sale': $find.data('onsale'),
			'stockprogressbar': $find.data('stockprogressbar'),
			'countdown': $find.data('countdown'),
			'stockstatus': $find.data('stockstatus'),
			'shippingclass': $find.data('shippingclass'),
        };
		

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
			$($thisbutton).closest('.klb-module').find('.klb-products-tab').html(response);

		    $thisbutton.closest('.module-header-tab').find('li').removeClass('active');
		    $thisbutton.closest('li').addClass('active');


			blonweThemeModule.siteslider();
			
			if ($('.product-thumbnail-gallery').length) {
			blonweThemeModule.hoverslider();	
			}
			
			blonweThemeModule.productHover();		
			
			blonweThemeModule.countdown();
			
        });
    });	

});