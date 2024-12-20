(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.sidebarfilter();
	});

	blonweThemeModule.sidebarfilter = function() {
		
		this.body = document.body;
		
		const container = document.querySelector('#sidebar.filtered-sidebar');
      
		if (container !== null) {
			const button = document.querySelectorAll('.filter-button');
			const close = container.querySelector('.site-close');
			const overlay = document.querySelector('.mobile-filter-overlay');

			let tl = gsap.timeline( { paused: true, reversed: true } );
			tl.set( container, {
			  autoAlpha: 1
			}).to( container, .5, {
			  x:0,
			  ease: 'power4.inOut'
			}).to( overlay, .5, {
			  autoAlpha: 0.6,
			  ease: 'power4.inOut'
			}, "-=.5");

			if (button !== null) {
				for( var i = 0; i < button.length; i++ ) {
					const self = button[i];
		  
					  self.addEventListener('click', (e) => {
						e.preventDefault();
						this.body.classList.add('filter-sidebar-active');
						tl.reversed() ? tl.play() : tl.reverse();
					  }, false);
			  
				}
			}


			overlay.addEventListener('click', (e) => {
			  e.preventDefault();
			  this.body.classList.remove('filter-sidebar-active');
			  tl.reverse();
			})

			close.addEventListener('click', (e) => {
			  e.preventDefault();
			  this.body.classList.remove('filter-sidebar-active');
			  tl.reverse();
			})
			
		}
	}
	
	$(document).ready(function() {
		blonweThemeModule.sidebarfilter();
	});

})(jQuery);
