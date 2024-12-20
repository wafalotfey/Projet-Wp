/* global blonwe_settings */
(function($) {
	blonweThemeModule.$document.on('blonweShopPageInit', function() {
		blonweThemeModule.sortByWidget();
	});

	blonweThemeModule.sortByWidget = function() {
		var $wcOrdering = $('.woocommerce-ordering');

		$wcOrdering.on('change', 'select.orderby', function() {
			var $form = $(this).closest('form');
			$form.find('[name="_pjax"]').remove();

			$.pjax({
				container: '.site-content',
				timeout  : blonwe_settings.pjax_timeout,
				url      : '?' + $form.serialize(),
				scrollTo : false,
				renderCallback: function(context, html, afterRender) {
					context.html(html);
					afterRender();
				}
			});
		});

		$wcOrdering.on('submit', function(e) {
			e.preventDefault(e);
		});
	};

	$(document).ready(function() {
		blonweThemeModule.sortByWidget();
	});
})(jQuery);
