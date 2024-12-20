(function ($) {
  "use strict";

	$(document).ready(function() {
	
		const container = document.querySelector('.single-product-sticky');
		  let scrollpos = window.scrollY;

		  if (container !== null) {
			const header = document.querySelector('.site-header');
			const add_class_on_scroll = () => container.classList.add('active');
			const remove_class_on_scroll = () => container.classList.remove('active');
			const headerHeight = header.offsetHeight;
			const scrollChange = headerHeight;

			

			window.addEventListener('scroll', function() { 
			  scrollpos = window.scrollY;
			
			  if (scrollpos >= scrollChange) { add_class_on_scroll() }
			  else { remove_class_on_scroll() }
			  
			})
		  }

		
	});
	
}(jQuery));