(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit added_to_cart', function () {
		blonweThemeModule.productHover();
	});

	blonweThemeModule.productHover = function() {
		const product = document.querySelectorAll('.product');

		  if (product !== null) {
			for( var i = 0; i < product.length; i++ ) {
			  const self = product[i];
			  const productWrapper = self.querySelector('.product-wrapper');
			  if (productWrapper !== null) {
				if (productWrapper.classList.contains('with-content-fade')) {
				  const hiddenContent = productWrapper.querySelector('.product-footer');
				  const fadeBlock = self.querySelector('.product-content-fade');
				  let outerHeight = 0;

				  if (hiddenContent && fadeBlock) {
					outerHeight = hiddenContent.offsetHeight;
					fadeBlock.style.marginBottom = `-${outerHeight}px`;
				  }
				}
			  }
			}
		}
	}
	
	$(document).ready(function() {
		blonweThemeModule.productHover();
	});

})(jQuery);
