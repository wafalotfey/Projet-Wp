(function ($) {
  "use strict";

	function woocommerceProductTab() {
		$( ".product-accordion-tab" ).accordion({
		  header: ".accordion-tab-title",
		  heightStyle: "content"
		});
	}
	
	$(document).ready(function() {
		woocommerceProductTab();
	});
	
}(jQuery));