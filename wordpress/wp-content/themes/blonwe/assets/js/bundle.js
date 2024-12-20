(function ($) {
  "use strict";

  const BLONWE_SITE = {
    init() {
      this.dom();
      this.themeSwitch();
      this.themeDropdown();
      this.themeTooltip();
	  this.themeStickyHeader();
      this.themePrimaryMenu();
      this.themeCustomButton();
      this.themeCategoryMenu();
      this.themeSearchOverlay();
      this.themeDrawerMenu();
      this.themeUserAvatar();
      this.themeUserButton();
      this.themeMultiStepCheckout();
      this.themeMobileSearch();
      this.themeMobileCategory();
      this.themeSearchWidth();
	  this.themeVideoScale();
      this.themeSelect2Placeholder();
	  this.themeHoverBlock();
	  this.minicartmobile();
	  this.themeCouponModal();
    },
    dom() {
      this.body = document.body;
      this.overlay = document.querySelector( '.site-overlay' );
    },
    themeSwitch() {
      const button = document.querySelectorAll( '.theme-mode-toggle' );

      if (button !== null) {
        for( var i = 0; i < button.length; i++ ) {
          const self = button[i];
          let theme = localStorage.getItem('theme');

          if (theme === 'dark') document.body.setAttribute('data-theme', 'dark');
          self.addEventListener('click', (e) => {
            e.preventDefault();
            document.body.classList.add('theme-toggled');
            theme = theme === 'dark' ? 'light' : 'dark';
            window.localStorage.setItem('theme', theme);
            document.body.setAttribute('data-theme', theme);
            setTimeout(() => {
              document.body.classList.remove('theme-toggled');
            }, 100)
          })
        }
      }
    },
    themeDropdown() {
      const dropdownElementList = document.querySelectorAll('[data-bs-toggle="dropdown"]');
      const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
    },
    themeTooltip() {
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    },
	themeStickyHeader() {
      const container = document.querySelector( '.site-header' );

      if ( container !== null ) {
        if ( container.classList.contains( 'sticky-header' ) ) {
          var sticky = new Waypoint.Sticky({
            element: $('.site-header.sticky-header .header-main')[0]
          })
        } else if ( container.classList.contains( 'sticky-header-menu' ) ) {
          var sticky = new Waypoint.Sticky({
            element: $('.site-header.sticky-header-menu .header-bottom')[0]
          })
        }
      }
    },
    themePrimaryMenu() {
      const container = document.querySelectorAll( '.klb-menu-nav.primary-menu' );

      if (container !== null) {
        for( var i = 0; i < container.length; i++ ) {
          const self = container[i];

          // container
          const wrapper = self.closest( '.container' );
          let wrapperWidth = wrapper.clientWidth;

          // body width
          let bodyWidth = this.body.clientWidth;

          // mega menu
          const menuItem = self.querySelectorAll( '.klb-menu > .menu-item-has-children.mega-menu' );
          if ( menuItem !== null ) {
            for( var i = 0; i < menuItem.length; i++ ) {
              const that = menuItem[i];
              const subMenu = that.lastElementChild;

              // menu arrow
              let positionLeft = that.offsetLeft;
              let itemWidth = that.clientWidth;

              if (subMenu.classList.contains('sub-menu')) {
                if (that.classList.contains( 'mega-menu-boxed' )) {
                  subMenu.style.setProperty('--triangleLeft', `${positionLeft - (wrapperWidth / 2 - itemWidth / 2) - 2}px`);
                } else {
                  subMenu.style.setProperty('--triangleLeft', `${positionLeft + 5}px`);
                }

                that.addEventListener('mouseover', (e) => {
                  document.body.classList.add('mega-menu-hover');
                })
        
                that.addEventListener('mouseleave', (e) => {
                  document.body.classList.remove('mega-menu-hover');
                })
              }
            }
          }
        }
      }
    },
    themeCustomButton() {
      const container = document.querySelectorAll( '.custom-button-menu' );

      if (container !== null) {
        for( var i = 0; i < container.length; i++ ) {
          const self = container[i];

          self.addEventListener('mouseover', (e) => {
            document.body.classList.add('mega-menu-hover');
          })
  
          self.addEventListener('mouseleave', (e) => {
            document.body.classList.remove('mega-menu-hover');
          })
        }
      }
    },
    themeCategoryMenu() {
      const container = document.querySelector( '.dropdown-categories' );

      if ( container !== null ) {
        const hasChildren = container.querySelectorAll( '#category-menu > .menu-item-has-children' );
        const headerNav = container.closest('.header-row');
        if ( hasChildren !== null ) {
          for( var i = 0; i < hasChildren.length; i++ ) {
            const self = hasChildren[i];
            const subMenu = self.lastElementChild;

            if ( !self.classList.contains( 'mega-menu' ) ) {
              if ( subMenu.classList.contains( 'sub-menu' ) ) {
                const subParent = subMenu.parentNode;

                if ( subParent.classList.contains( 'has-image' ) ) {
                  const menuWidth = subMenu.offsetWidth;
                  subMenu.style.width = menuWidth + ( menuWidth / 1.5 ) + 'px';
                }
              }
            }

            self.addEventListener('mouseover', (e) => {
              headerNav.classList.add('category-menu-hover');
            })
    
            self.addEventListener('mouseleave', (e) => {
              headerNav.classList.remove('category-menu-hover');
            })
          }
        }
      }
    },
    themeSearchOverlay() {
      const container = document.querySelectorAll( '.header-search-overlay' );

      if (container !== null) {
        for( var i = 0; i < container.length; i++ ) {
          const self = container[i];
          const input = self.querySelector( '.search-input' );

          input.addEventListener('focus', () => {
            self.classList.add( 'is-searchable' );
            document.body.classList.add( 'search-overlay-active' );
          })

		  input.addEventListener('blur', () => {
            setTimeout(() => {
              self.classList.remove( 'is-searchable' );
              document.body.classList.remove( 'search-overlay-active' );
            }, 100);
          })
        }
      }
    },
    themeDrawerMenu() {
      const container = document.querySelector( '.site-drawer' );
      if ( container != null || this.overlay !== null ) {
        let tl = gsap.timeline( { paused: true, reversed: true } );
        tl.set( container, {
          autoAlpha: 1
        }).to( container, .5, {
          x:0,
          ease: 'power4.inOut'
        }).to( this.overlay, .5, {
          autoAlpha: 0.6,
          ease: 'power4.inOut'
        }, "-=.5");

        const button = document.querySelectorAll( '.toggle-button' );
		const categoryButton = $( '.klb-mobile-bottom a.categories' );
        const close = document.querySelector( '.site-drawer .site-close' );

        if ( button !== null ) {
          for ( var i = 0; i < button.length; i++ ) {
            const self = button[i];

            self.addEventListener( 'click', ( e ) => {
              e.preventDefault();
              this.body.classList.add('drawer-active');
              tl.play();
            });

          }
        }
		
		if ( categoryButton !== null ) {
			for ( var i = 0; i < categoryButton.length; i++ ) {
				const self = categoryButton[i];

				self.addEventListener( 'click', ( e ) => {
				  e.preventDefault();
				  tl.play();
				});
			}
		}

        close.addEventListener( 'click', (e) => {
          e.preventDefault();
          setTimeout( () => {
            this.body.classList.remove('drawer-active');
          }, 1000);
          tl.reverse(1.5);
        });

        this.overlay.addEventListener( 'click', (e) => {
          e.preventDefault();
          setTimeout( () => {
            this.body.classList.remove('drawer-active');
          }, 1000);
          tl.reverse(1.5);
        });

        const hasChildren = container.querySelectorAll( '.menu-item-has-children' );
        const subMenu = ( e ) => {
          let subUl;
          if ( e.target.tagName === 'A' ) {
            e.preventDefault();
            subUl = e.target.nextElementSibling;
          } else {
            subUl = e.target.previousElementSibling;
          }
          let parentUl = e.target.closest( 'ul' );
          let parentLi = e.target.closest( 'li' );
          let activeLi = parentUl.querySelectorAll( '.menu-item-has-children.active' );

          const closeSubs = () => {
            for ( var i = 0; i < activeLi.length; i++ ) {
              const activeSub = activeLi[i].children[1];
              const childSubs = activeSub.querySelectorAll( '.sub-menu' );
              for ( var i = 0; i < childSubs.length; i++ ) {
                if ( childSubs[i] != null ) {
                  gsap.set( childSubs[i], { height: 0 } );
                }
              }
            }
          }

          const subAnimation = ( element, event ) => {
            gsap.to( element, { duration: .4, height: event, ease: 'power4.inOut', onComplete: closeSubs } );
          }

          if ( !parentLi.classList.contains( 'active' ) ) {
            for ( var i = 0; i < activeLi.length; i++ ) {
              activeLi[i].classList.remove( 'active' );
              const sub = activeLi[i].children[1];
              subAnimation( sub, 0 );
            }
            parentLi.classList.add( 'active' );
            subAnimation( subUl, 'auto' );
          } else {
            parentLi.classList.remove( 'active' );
            subAnimation( subUl, 0 );
          }

        }

        for( var i = 0; i < hasChildren.length; i++ ) {
          const dropdown = document.createElement( 'span' );
          dropdown.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>';
          dropdown.className = 'menu-dropdown';
          hasChildren[i].appendChild( dropdown );

          const link = hasChildren[i].querySelector( 'a[href*="#"]' );
          const sub = hasChildren[i].children[1];
          gsap.set( sub, { height: 0 } );
          dropdown.addEventListener( 'click', subMenu );
		  if(link != null){
			link.addEventListener( 'click', subMenu );
		  }
		  
        }
      }
    },
    themeUserAvatar() {
      const container = document.querySelector('.user-detail');

      if (container !== null) {
        const avatar = container.querySelector('.user-avatar');
        const name = container.querySelector('.entry-name').innerText;

        const fullName = name.split('');
        const initials = fullName.shift().charAt(0) + fullName.pop().charAt(0);

        avatar.innerHTML = initials.toUpperCase();
      }
    },
    themeUserButton() {
      const button = document.querySelector('.user-menu-button');

      if (button !== null) {
        button.addEventListener('click', () => {
          this.body.classList.toggle('my-account-navigation-active');
        })
      }
    },
    themeMultiStepCheckout() {
      const container = document.querySelector('.multistep-checkout-holder');

      if (container !== null) {
        const tabs = container.querySelectorAll('.klb-steps-header li');
        const stepNavigate = container.querySelectorAll('.step-buttons-holder a');
        const panes = [];

        for( var i = 0; i < stepNavigate.length; i++ ) {
          const getIDs = stepNavigate[i].getAttribute('href');
          panes.push(getIDs);

        }

        /* for( var i = 0; i < pane.length; i++ ) {
          const thatPane = pane[i];
          console.log(pane[i]);
          for( var i = 0; i < stepNavigate.length; i++ ) {

            stepNavigate[i].addEventListener('click', (e) => {
              e.preventDefault();
              const clickedID = e.target.getAttribute('href').substring(1);
              const selectedPane = container.querySelector(`[id*="${clickedID}"]`);

              thatPane.style.display = 'none';
              selectedPane.style.display = 'flex';
              console.log(selectedPane);
            })
          }
        } */
      }
    },
    themeMobileSearch() {
      const container = document.querySelector('.klb-mobile-search');
      const button = document.querySelector('.klb-mobile-bottom .search');

      if (container !== null && button !== null) {
        button.addEventListener('click', (e) => {
          e.preventDefault();

          this.body.classList.toggle('mobile-search-active');
          button.classList.toggle('active');
        })
      }
    },
    themeMobileCategory() {
      const container = document.querySelector('.klb-mobile-categories');
      const button = document.querySelector('.klb-mobile-bottom .categories');

      if (container !== null && button !== null) {
        button.addEventListener('click', (e) => {
          e.preventDefault();

          this.body.classList.toggle('mobile-categories-active');
          button.classList.toggle('active');
        })
      }
    },
    themeSearchWidth() {
      const container = document.querySelectorAll('.search-form .form-select.custom-width');

      if (container !== null) {
        for( var i = 0; i < container.length; i++ ) {
          const self = container[i];
          const fakeValue = document.createElement( 'SPAN' );
          fakeValue.classList.add( 'selected-value' );
          const parentDiv = self.parentNode;

          parentDiv.insertBefore(fakeValue, self);

          const closest = self.closest('.input-search-addon');
          const searchInput = closest.nextElementSibling;

          const changeWidth = () => {
            const selectedText = self.options[self.selectedIndex].text;
            fakeValue.innerText = selectedText;
            const fakeWidth = fakeValue.offsetWidth;

            self.style.width = `${fakeWidth + 10}px`;
            searchInput.style.paddingLeft = `${fakeWidth + 25}px`;
          }

          self.onchange = () => {
            changeWidth();
          }

          changeWidth();
        }
      }
    },

	themeVideoScale() {
      const container = document.querySelectorAll('.klb-video-content');
      if (container !== null) {
        for( var i = 0; i < container.length; i++ ) {
          const self = container[i];
          const iframe = self.querySelector('iframe');
          const ratio = 16/9;

          const resize = () => {
            const w = window.innerWidth;
            const h = window.innerHeight; 
            const scale =  ((w / h) > ratio) ? (w / (ratio * h)) : (h * ratio / w);

            iframe.style.transform = 'scale(' + scale + ')';
          }

          iframe.onload = resize();
        }
      }
    },
    themeSelect2Placeholder() {
      var Defaults = $.fn.select2.amd.require('select2/defaults');
  
      $.extend(Defaults.defaults, {
        searchInputPlaceholder: ''
      });
      
      var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');
      var _renderSearchDropdown = SearchDropdown.prototype.render;
      
      SearchDropdown.prototype.render = function(decorated) {
        // invoke parent method
        var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));
        this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));
        return $rendered;
      };
    },
	themeHoverBlock() {
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
    },
	
    minicartmobile: function() {
	  if($(window).width() < 601){
		  var button = $( '.site-header .cart-button > a.custom-dropdown-link' );

		  button.on( 'click', function(e) {
			e.preventDefault();
			if($( '.site-header .cart-button .custom-dropdown-menu' ).hasClass('hide')){
				$( '.site-header .cart-button .custom-dropdown-menu' ).removeClass( 'hide' );
			} else {
				$( '.site-header .cart-button .custom-dropdown-menu' ).addClass( 'hide' );
			}
		  });
	  }
    },
	themeCouponModal() {
      const button = document.querySelectorAll( '.coupon-modal-trigger' );

      if (button !== null) {
        for( var i = 0; i < button.length; i++ ) {
          const self = button[i];

          $( self ).magnificPopup({
            type:'inline',
            callbacks: {
              open: function() {
                const items = this.content;
                imagesLoaded( items, () => {
                  setTimeout( function() {
                    items.addClass('loaded');
                  }, 300);
                });
              },
              close: function() {
                this.content.removeClass('loaded');
              },
            }
          });
        }
      }
    }
	
  };

  BLONWE_SITE.init();
  
	$(document).ready(function() {
		$('.dropdown-categories a.dropdown-toggle').on('click', function (e) {
			e.preventDefault();
			$(".dropdown-menu").collapse('toggle');
		});
	});
	
	$(window).on('load', function(){
		$('.site-loading').fadeOut('slow',function(){$(this).remove();});
	});
	
	$(window).scroll(function() {
        $(this).scrollTop() > 135 ? $("header.site-header").addClass("sticky-header") : $("header.site-header").removeClass("sticky-header")
    });
}(jQuery));