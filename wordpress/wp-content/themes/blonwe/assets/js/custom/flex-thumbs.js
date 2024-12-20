jQuery(document).ready(function($) {
	"use strict";

	blonweThemeModule.blonweFlexThumb = function() {
		if (!$(".flex-control-nav")[0]){
			return;
		}

		if ($(".single-product .product-gallery").hasClass("vertical") && $(window).width() > 992) {
			var direction = 'vertical';
			var itemwidth = 0;
		} else {
			var direction = 'horizontal';
			var itemwidth = 80;
		}

		$(".flex-control-nav" ).wrapAll( "<div class='klb-flexslider-thumbnail "+direction+"'></div>" );

		  var columns = (window.innerWidth < 600) ? 4 :(window.innerWidth < 900) ? 6 : $('.woocommerce-product-gallery.woocommerce-product-gallery--with-images').attr('data-columns');

		  $('.klb-flexslider-thumbnail').flexslider({
			selector: ".flex-control-thumbs > li", 
			animation: "slide",
			animationLoop: false,
			directionNav: true,
			direction: direction,
			controlNav: false,
			itemWidth: itemwidth,
			itemMargin: 5,
			slideshow: false,
			minItems: columns,
			maxItems: columns,
			prevText: '<button type="button" class="slick-nav slick-prev slick-button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="17.2,22.4 6.8,12 17.2,1.6 "/></svg></button>',           
			nextText: '<button type="button" class="slick-nav slick-next slick-button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="6.8,22.4 17.2,12 6.8,1.6 "/></svg></button>',		
			
			start: function(slider){
				if(slider.count < 7){
					$('.klb-flexslider-thumbnail.vertical .flex-direction-nav').remove();
				}
			},
			after: function (slider) {
				if(slider.currentSlide === slider.count - 6 || slider.currentSlide > slider.count - 6) {
					$('.vertical .flex-next').css('pointer-events','none');
					$('.vertical .flex-nav-next').addClass('disabled');
				} else {
					$('.vertical .flex-next').css('pointer-events','');
					$('.vertical .flex-nav-next').removeClass('disabled');
				}
			},
		  });
		
		$(".woocommerce-product-gallery__trigger").prependTo(".woocommerce-product-gallery > .flex-viewport");
		$(".klb-product360-btn").prependTo(".woocommerce-product-gallery > .flex-viewport");
		$(".klb-single-video").prependTo(".woocommerce-product-gallery > .flex-viewport");
		
		$('.woocommerce-product-gallery__wrapper > div:not([data-thumb])').each(function() {
			$(this).prependTo(".flex-viewport");
		});
	}
	
	$(document).ready(function() {
		setTimeout(() => {
			blonweThemeModule.blonweFlexThumb();
		}, 100);
	});

});
