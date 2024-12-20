(function($) {

	$(document).ready(function() {

		// Add active class when find the single-wrapper class
		$(function() {
			var stickytitles = $('.single-sticky-titles');
			var singlewrapper = $(".single-product-wrapper").offset().top;
			$(window).scroll(function() {
				var scroll = $(window).scrollTop();
				if (scroll >= singlewrapper ) {
					stickytitles.addClass('active');
				} else {
					stickytitles.removeClass('active');
				}
			});
		})

		// Append Tabs in sticky-titles
		$('ul.wc-tabs li').each( function() {
			$(".single-sticky-titles .container").append($(this).html());
		});
		
		// Append Klb-Module Section in sticky-titles
		$('.single-product-wrapper section.klb-module').each( function() {
			$('.single-sticky-titles .container').append('<a href="#'+ $(this).attr('id') +'" class="no-tab">'+ $(this).find('h2.entry-title').text() +'</a>');
		});

		// Activate Tab and Scroll to Section
		$(".single-sticky-titles a").click(function(e){
			e.preventDefault(); //Prevents hash to be appended at the end of the current URL.
			$("div.woocommerce-tabs>ul.tabs>li>a[href='" + $(this).attr("href") + "']").click(); //Opens up the particular tab
			$('html, body').animate({
				scrollTop: $($(this).attr("href")).offset().top - 111
			}, 400); //Change to whatever you want, this value is in milliseconds.
		});

	});

})(jQuery);
