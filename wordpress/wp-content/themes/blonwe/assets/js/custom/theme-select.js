(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.themeselect();
	});
	
	blonweThemeModule.themeselect = function() {
      const block = document.querySelectorAll( '.theme-select' );
      for( var i = 0; i < block.length; i++ ) {
        const self = block[i];

        const placeholder = self.dataset.placeholder;
        const search = self.dataset.search === "true" ? null : Infinity;
        const searchPlaceholder = self.dataset.searchplaceholder;

        $(self).select2({
          placeholder,
          allowClear: true,
          minimumResultsForSearch: search,
          searchInputPlaceholder: searchPlaceholder
        });
      }
	}
	$(document).ready(function() {
		blonweThemeModule.themeselect();
	});

})(jQuery);
