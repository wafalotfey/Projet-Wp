/* KLB Addons for Elementor v1.0 */

jQuery.noConflict();
!(function ($) {
	"use strict";

	
	/* CAROUSEL*/
	function klb_carousel($scope, $) {
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
	
	/* Countdown */
	function klb_countdown($scope, $) {
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
	
	/* PRODUCT HOVER*/
	function klb_product_hover($scope, $) {
		const product = document.querySelectorAll('.product');

		  if (product !== null) {
			for( var i = 0; i < product.length; i++ ) {
			  const self = product[i];
			  const productWrapper = self.querySelector('.product-wrapper');
			  if (productWrapper !== null) {
				if (productWrapper.classList.contains('with-content-fade')) {
				  const hiddenContent = productWrapper.querySelector('.product-footer');
				  const fadeBlock = self.querySelector('.product-content-fade');
				  let outerHeight = 0;

				  if (hiddenContent || fadeBlock) {
					outerHeight = hiddenContent.offsetHeight;
					fadeBlock.style.marginBottom = `-${outerHeight}px`;
				  }
				}
			  }
			}
		}
	}
	
	/* HOVER BLOCK*/
	function klb_hover_block($scope, $) {
		const block = document.querySelectorAll('.hover-block');
		for( var i = 0; i < block.length; i++ ) {
			const self = block[i];

			const headerContent = self.querySelector('.entry-header');
			const hiddenContent = self.querySelector('.hidden-content');
			const hiddenHeight = hiddenContent.clientHeight;

			self.addEventListener('mouseover', (e) => {
			  headerContent.style.paddingBottom = `${hiddenHeight - 50}px`;
			  hiddenContent.style.opacity = 1;
			  hiddenContent.style.transform = `translateY(0)`;
			})

			self.addEventListener('mouseleave', (e) => {
			  headerContent.style.paddingBottom = 0;
			  hiddenContent.style.opacity = 0;
			  hiddenContent.style.transform = `translateY(25px)`;
			})
		}
	}
	
	/* Audio */
	function klb_audio($scope, $) {
		const container = document.querySelectorAll('.klb-audio-player');
		for( var i = 0; i < container.length; i++ ) {
			const self = container[i];
			var player = self.querySelector('audio');


			player = new MediaElementPlayer(player, {
			  iconSprite: '',
			  //classPrefix: 'mejs-',
			  isVideo: false,
			  setDimensions: false,
			  //alwaysShowControls: true,
			  audioVolume: 'vertical',
			  success: function(mediaElement, originalNode, instance) {
			    const findCurrentItem = (e) => {
			      const playList = Array.from(self.querySelectorAll('.audio-playlist li'));
			
			      return playList.find((event) => event.dataset.audio.split("/").pop() === e);
			    }
			
			    mediaElement.addEventListener('ended', function(e, data) {
			      const srcPath = instance.src.split("/").pop();
			      const currentItem = findCurrentItem(srcPath);
			
			      currentItem.classList.remove('played');
			      currentItem.classList.add('paused');
			    }, false);
			
			    mediaElement.addEventListener('pause', function(e, data) {
			      const srcPath = instance.src.split("/").pop();
			      const currentItem = findCurrentItem(srcPath);
			
			      if (currentItem.classList.contains('played')) {
			        currentItem.classList.remove('played');
			        currentItem.classList.add('paused');
			      }
			    }, false);
			
			    mediaElement.addEventListener('play', function(e, data) {
			      const srcPath = instance.src.split("/").pop();
			      const currentItem = findCurrentItem(srcPath);
			
			      if (currentItem.classList.contains('paused')) {
			        currentItem.classList.remove('paused');
			        currentItem.classList.add('played');
			      } else {
			        currentItem.classList.add('played');
			      }
			    }, false);
			  }
			});





			if (self.classList.contains('playlist')) {
			  const playList = self.querySelectorAll('.audio-playlist li');

			  for ( var i = 0; i < playList.length; i++ ) {
				const that = playList[i];

				const handleClick = (e) => {
				  const audioPath = e.currentTarget.dataset.audio;
				  const inactivePlayed = self.querySelector('.played');
				  const inactivePaused = self.querySelector('.paused');
				  const played = e.currentTarget.classList.contains('played');
				  const paused = e.currentTarget.classList.contains('paused');

				  if (inactivePlayed) {
					inactivePlayed.classList.remove('played');
				  } else if (inactivePaused) {
					inactivePaused.classList.remove('paused');
				  }

				  if (played) {
					e.currentTarget.classList.remove('played');
					e.currentTarget.classList.add('paused');
					player.pause();
				  } else if (paused) {
					player.play();
					e.currentTarget.classList.add('played');
					e.currentTarget.classList.remove('paused');
				  } else {
					e.currentTarget.classList.add('played');
					player.src = audioPath;
					player.play();
				  }
				}

				that.addEventListener('click', handleClick);
			  }
			}
		}
	}


    jQuery(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-home-slider.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-tab-carousel.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-categories2.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-category-banner2.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-client-carousel.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-carousel.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-carousel2.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-vendor-carousel.default', klb_carousel);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-vendor-carousel2.default', klb_carousel);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-carousel3.default', klb_carousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-text-carousel.default', klb_carousel);
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-coupon-carousel.default', klb_carousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-tab-list.default', klb_product_hover);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-grid.default', klb_product_hover);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-banner.default', klb_product_hover);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-special-product.default', klb_countdown);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-list.default', klb_countdown);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-tab-grid.default', klb_countdown);	
        elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-counter.default', klb_countdown);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-product-carousel2.default', klb_countdown);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-coupon-carousel.default', klb_countdown);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-banner-box3.default', klb_hover_block);	
		elementorFrontend.hooks.addAction('frontend/element_ready/blonwe-audio-box.default', klb_audio);	
			

    });

})(jQuery);
