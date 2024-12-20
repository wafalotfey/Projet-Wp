(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.hoverslider();
	});

	blonweThemeModule.hoverslider = function() {
		const container = document.querySelectorAll('.product-hover-gallery');

		if (container !== null) {
			for( var i = 0; i < container.length; i++ ) {
			  const self = container[i];
			  const mainImage = self.querySelector('.product-main-image');
			  const gallery = self.querySelector('.product-thumbnail-gallery');

			  if (gallery) {
				const removeActiveGallery = () => {
				  for (var i = 0; i < gallery.children.length; i++) {
					gallery.children[i].classList.remove('active');
				  }
				}
				
				const currentDiv = document.createElement('DIV');
				currentDiv.classList.add('gallery-item', 'main-image');
				if (!currentDiv) {
				  gallery.prepend(currentDiv);
				}

				let dotsFragment = document.createDocumentFragment();
				const dotsWrapper = document.createElement('DIV');
				dotsWrapper.classList.add('hover-gallery-dots');

				const createDots = () => {
				  for (var i = 0; i < gallery.children.length; i++) {
					let dot = dotsWrapper.appendChild(document.createElement('DIV'));
					dot.classList.add('dot');
					self.appendChild(dotsWrapper)
				  }
				  if (!dotsFragment) {
					self.appendChild(dotsFragment);
				  }
				  dotsWrapper.children[0].classList.add('active');
				}
				
				createDots();

				const removeActiveDots = () => {
				  for (var i = 0; i < dotsWrapper.children.length; i++) {
					const mainImage = dotsWrapper.children[i].classList.contains('main-image');
					dotsWrapper.children[i].classList.remove('active');
				  }
				}

				const over = (e) => {
				  console.log(e.target);
				  const selected = Array.prototype.slice.call(gallery.children);
				  const selectedDots = Array.prototype.slice.call(dotsWrapper.children);
				  const index = selected.indexOf( e.target );

				  if (!e.target.classList.contains('main-image')) {
					mainImage.classList.add('disabled');
				  } else {
					mainImage.classList.remove('disabled');
				  }

				  removeActiveGallery();
				  removeActiveDots();
				  e.target.classList.add('active');
				  selectedDots[index].classList.add('active')
				}

				const leave = (e) => {
				  removeActiveDots();
				  removeActiveGallery();
				  dotsWrapper.children[0].classList.add('active');

				  if (mainImage.classList.contains('disabled')) {
					mainImage.classList.remove('disabled');
				  }
				}

				const touchSupported = () => {
				  return "ontouchstart" in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
				}

				if (touchSupported) {
				  gallery.addEventListener('touchstart', (e) => {
					over(e);
				  }, true)

				  gallery.addEventListener('touchstart', (e) => {
					setTimeout(() => {
					  leave(e);
					}, 1500);
				  }, true)
				}

				gallery.addEventListener('mouseover', (e) => {
				  over(e);
				})

				gallery.addEventListener('mouseleave', (e) => {
				  leave(e);
				})
			  }
			}
		}
	}
	
	$(document).ready(function() {
		blonweThemeModule.hoverslider();
	});

})(jQuery);