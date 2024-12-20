(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.sitescroll();
	});

	blonweThemeModule.sitescroll = function() {
		const container = document.querySelectorAll( '.site-scroll' );

		for( var i = 0; i < container.length; i++ ) {
			const ps = new PerfectScrollbar( container[i], {
			  suppressScrollX: true,
			  wheelPropagation: true
			});

			ps.update();
		}
	}
	
	$(document).ready(function() {
		blonweThemeModule.sitescroll();
	});

})(jQuery);
