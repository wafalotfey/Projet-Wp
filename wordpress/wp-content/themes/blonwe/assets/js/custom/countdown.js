(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.countdown();
	});

	blonweThemeModule.countdown = function() {
		$('.klb-countdown').each(function() {
			let $this = $(this);
			let finalDate = $(this).data('date');
			let $days = $this.find('.days');
			let $hours = $this.find('.hours');
			let $minutes = $this.find('.minutes');
			let $second = $this.find('.second');
			$this.countdown(finalDate, function(event) {
			  $days.html(event.strftime('%D'));
			  $hours.html(event.strftime('%H'));
			  $minutes.html(event.strftime('%M'));
			  $second.html(event.strftime('%S'));
			});
		});
	}
	
	$(document).ready(function() {
		blonweThemeModule.countdown();
	});

})(jQuery);
