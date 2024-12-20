(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.siteslider();
	});

	blonweThemeModule.siteslider = function() {
		const block = document.querySelectorAll( '.klb-slider' );

		for( var i = 0; i < block.length; i++ ) {
			const self = block[i];

			const itemsBy = Number(self.dataset.items);
			const itemsByMobile = self.dataset.mobileitems ? self.dataset.mobileitems : 2;
			const itemsByTablet = self.dataset.tabletitems ? self.dataset.tabletitems : 2;
			const slideByItem = self.dataset.slidebyitem ? self.dataset.slidebyitem : 1;
			const slideSpeed = parseInt( self.dataset.speed ) ? parseInt( self.dataset.speed ) : 300;
			const slideInfinite = self.dataset.infinite === 'true' ? true : false;
			const slideArrows = self.dataset.arrows === 'true' ? true : false;
			const slideDots = self.dataset.dots === 'true' ? true : false;
			// Focus select settings
			const slideForNav = self.dataset.asfornav;
			const slideFocusOnSelect = self.dataset.focus === 'true' ? true : false || false;
			// Autoplay settings
			const slideAutoPlay = self.dataset.autoplay === 'true' ? true : false;
			const slideAutoSpeed = parseInt( self.dataset.autospeed ) ? parseInt( self.dataset.autospeed ) : 5000;
			// Centered slide
			const slideCenter = self.dataset.center === 'true' ? true : false || false;
			const slideCenterPadding = self.dataset.centerpadding;
			// Css slide animation
			const slideCssEase = self.dataset.css;
			// Fade effect
			const slideFade = self.dataset.fade === 'true' ? true : false || false;
			// Rtl settings
			const slideRtl = self.dataset.rtl === 'true' ? true : false || false;
			// Vertical
			const slideVertical = self.dataset.vertical === 'true' ? true : false || false;
			const slideVerticalSwip = self.dataset.verticalswip === 'true' ? true : false || false;

			$( self ).on('init', function(event, slick){
			  const items = self.querySelectorAll( '.slider-item' );
			  imagesLoaded( items, (e) => {
				const slideItems = e.elements;
				self.parentNode.classList.add( 'slider-loaded' );
				if ( self.classList.contains( 'arrows-center' ) ) {
				  const centerItems = self.querySelectorAll( '.slider-item' );
				  for( var i = 0; i < centerItems.length; i++ ) {
					const that = centerItems[i];

					let mediaHeight, arrowHeight;
					const media = that.querySelectorAll( '.entry-media' );
					const arrows = self.querySelectorAll( '.slick-arrow' );

					const setArrowHeight = () => {
					  for ( var i = 0; i < media.length; i++ ) {
						mediaHeight = media[i].clientHeight / 2;
					  }
		
					  for ( var i = 0; i < arrows.length; i++ ) {
						if ( arrows[i] != null ) {
						  arrowHeight = arrows[i].clientHeight / 2;
						  arrows[i].style.top = `${mediaHeight - arrowHeight}px`;
						}
					  }
					}

					window.addEventListener( 'load', setArrowHeight );
					window.addEventListener( 'resize', setArrowHeight );
				  }

				  if ( slideItems !== null ) {
					if (self.classList.contains('slick-initialized')) {
					  for( var i = 0; i < slideItems.length; i++ ) {
						const product = slideItems[i].querySelector('.product');
						if (product !== null) {
						  const productWrapper = product.querySelector('.product-wrapper');
						  if (productWrapper.classList.contains('with-content-fade')) {
							const wrapperHeight = productWrapper.offsetHeight;
							const fadeBlock = product.querySelector('.product-content-fade');
							const hiddenContent = productWrapper.querySelector('.product-footer');
							const hiddenContentHeight = hiddenContent.offsetHeight;

							const slickList = self.querySelector('.slick-list');
							fadeBlock.style.marginBottom = `-${hiddenContentHeight}px`;

							product.addEventListener('mouseover', (e) => {
							  slickList.style.paddingTop = `5px`;
							  slickList.style.paddingBottom = `${wrapperHeight + hiddenContentHeight + 10}px`;
							  slickList.style.marginTop = `-5px`;
							  slickList.style.marginBottom = `-${wrapperHeight + hiddenContentHeight + 10}px`;
							})
					
							product.addEventListener('mouseleave', (e) => {
							  slickList.style.paddingBottom = '';
							  slickList.style.marginBottom = '';
							})
						  }
						}
					  }
					}
				  }
				}
			  });
			});

			let args = {
			  arrows: slideArrows,
			  dots: slideDots,
			  asNavFor: slideForNav,
			  autoplay: slideAutoPlay,
			  autoplaySpeed: slideAutoSpeed,
			  centerMode: slideCenter,
			  centerPadding: slideCenterPadding,
			  cssEase: slideCssEase,
			  fade: slideFade || slideRtl,
			  focusOnSelect: slideFocusOnSelect,
			  slidesToShow: itemsBy,
			  slidesToScroll: slideByItem,
			  speed: slideSpeed,
			  infinite: slideInfinite,
			  prevArrow: '<button type="button" class="slick-nav slick-prev slick-button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="17.2,22.4 6.8,12 17.2,1.6 "/></svg></button>',
			  nextArrow: '<button type="button" class="slick-nav slick-next slick-button"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" fill="currentColor"><polyline fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="6.8,22.4 17.2,12 6.8,1.6 "/></svg></button>',
			  rtl: slideRtl,
			  vertical: slideVertical,
			  verticalSwiping: slideVerticalSwip,
			  responsive: [
				{
				  breakpoint: 1440,
				  settings: {
								  slidesToShow: itemsBy <= 6 ? itemsBy : 5,
								}
				}, {
				  breakpoint: 1360,
				  settings: {
								  slidesToShow: itemsBy <= 5 ? itemsBy : 4,
								}
				}, {
				  breakpoint: 1200,
				  settings: {
								  slidesToShow: itemsBy <= 4 ? itemsBy : 3,
								}
				}, {
				  breakpoint: 992,
				  settings: {
								  slidesToShow: itemsByTablet ? itemsByTablet : (itemsBy <= 3 ? itemsBy : 2),
					infinite: true
								}
				}, {
				  breakpoint: 768,
				  settings: {
					arrows: false,
								  slidesToShow: itemsByTablet ? itemsByTablet : (itemsBy <= 3 ? itemsBy : 2),
					vertical: false,
					infinite: true
								}
				}, {
				  breakpoint: 480,
				  settings: {
					arrows: false,
								  slidesToShow: itemsByMobile ? itemsByMobile : (itemsBy <= 2 ? itemsBy : 1),
					vertical: false,
					infinite: true
								}
				}, {
				  breakpoint: 320,
				  settings: {
					arrows: false,
								  slidesToShow: 1,
					vertical: false,
					infinite: true
								}
				}
			  ]
			}

			if (self.classList.contains("animate")) {
			  $(self).on('edge', function(event, slick, direction){
				console.log('edge was hit')
			  });

			  $(self).on('init', function(event, slick, currentSlide){
				$(self).find(".slick-current").addClass("animation-in");
			  });
			}

			$( self ).not( '.slick-initialized' ).slick( args );

			if (self.classList.contains("animate")) {
			  $(self).on('beforeChange', function(event, slick, currentSlide, nextSlide){
				$(self).find(".slider-item").removeClass("animation-in");
				$(slick.$slides[currentSlide]).addClass("animation-out");
			  });

			  $(self).on('afterChange', function(event, slick, currentSlide, nextSlide){
				$(slick.$slides[currentSlide]).addClass("animation-in");
				$(self).find(".slider-item").removeClass("animation-out");
			  });
			}

			if (self.classList.contains("full-screen")) {
			  const globalNotify = document.querySelector('.top-notification');
			  let bodyHeight = window.innerHeight;
			  const notifyHeight = globalNotify.clientHeight;

			  if (globalNotify !== null) {
				const onresize = function() {
				  let bodyHeight = window.innerHeight;
				  const bannerItem = self.querySelectorAll(".klb-banner");
				  for( var i = 0; i < bannerItem.length; i++ ) {
					
					bannerItem[i].style.setProperty("height", `${bodyHeight - notifyHeight}px`)
				  }
				}

				window.addEventListener("load", onresize);
				window.addEventListener("resize", onresize);
			  } else {
				const onresize = function() {
				  let bodyHeight = window.innerHeight;
				  const bannerItem = self.querySelectorAll(".klb-banner");
				  for( var i = 0; i < bannerItem.length; i++ ) {
					
					bannerItem[i].style.setProperty("height", `${bodyHeight}px`)
				  }
				}

				window.addEventListener("load", onresize);
				window.addEventListener("resize", onresize);
			  }
			}
			
		}
	}
	
	$(document).ready(function() {
		blonweThemeModule.siteslider();
	});

})(jQuery);
