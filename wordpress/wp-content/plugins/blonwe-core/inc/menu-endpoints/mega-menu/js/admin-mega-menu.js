(function ($) {
  "use strict";
	
	function replaceLabels($menuItem) {
		var $menuItems = $('#menu-to-edit .menu-item-title');

		if ($menuItems.length > 0) {

			$menuItems.each(function () {
				if ($(this).text() === 'Elementor Template') {

					var $menuItem = $(this).closest('.menu-item');

					$menuItem.find('.item-type').text('Mega Menu');
					$menuItem.find('.menu-item-settings .edit-menu-item-title').closest('label').hide();
					$menuItem.find('.field-url').hide();
					$menuItem.find('.field-css-classes').hide();
					$menuItem.find('.field-description').hide();
					$menuItem.find('.blonwe-field-iconfield').hide();
					
					if($("#locations-sidebar-menu").prop('checked') != true){
						$menuItem.find('.blonwe-field-elementor-template-width').hide();
					}

				}
			});
		}
	}

	$(document).ready(function () {
		replaceLabels();
	});

	$(document).ajaxComplete(function (event, request, settings) {
		if (typeof settings != 'undefined' && typeof settings.data == 'string' && settings.data.indexOf('action=add-menu-item') !== -1) {
			replaceLabels();

			setTimeout(function () {
				replaceLabels();
			}, 500)

		}
	});
	

})(jQuery);
