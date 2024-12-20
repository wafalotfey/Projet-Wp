(function ($) {
  "use strict";
	
	$(document).ready(function() {
		
		this.body = document.body;
		
		const container = document.querySelector('.cart-widget-side');
      
		if (container !== null) {
			const button = document.querySelectorAll('.cart-button');
			const close = container.querySelector('.cart-side-close');
			const overlay = document.querySelector('.cart-side-overlay');

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
						this.body.classList.add('cart-widget-side-active');
						tl.reversed() ? tl.play() : tl.reverse();
					  }, false);
			  
				}
			}

			$( document.body ).on( 'added_to_cart', function() {
				$(".header-desktop .header-action.cart-button").trigger("click");

			});

			overlay.addEventListener('click', (e) => {
			  e.preventDefault();
			  this.body.classList.remove('cart-widget-side-active');
			  tl.reverse();
			})

			close.addEventListener('click', (e) => {
			  e.preventDefault();
			  this.body.classList.remove('cart-widget-side-active');
			  tl.reverse();
			})
			
		}
		
     
	  
	  $('.custom-dropdown-menu').remove();
	  
	});

})(jQuery);
