(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.stickysidebar();
	});

	blonweThemeModule.stickysidebar = function() {
		const sticky = document.querySelectorAll( '.sticky' );

		if ( sticky !== null ) {
			for ( var i = 0; i < sticky.length; i++ ) {
			  const self = sticky;

			  $( self ).theiaStickySidebar({
				// Settings
				additionalMarginTop: 30
			  });
			}
		}
	}
	
	$(document).ready(function() {
		blonweThemeModule.stickysidebar();
	});

})(jQuery);
