(function ($) {
  "use strict";

	$(document).on('blonweShopPageInit', function () {
		blonweThemeModule.popuplogin();
	});

	blonweThemeModule.popuplogin = function() {
				
      const container = document.querySelector( '.authentication-modal' );
      const button = document.querySelectorAll( '.login-button.popup a' );

      if ( container !== null && button !== null ) {
        const close = container.querySelector( '.site-close' );
        for( var i = 0; i < button.length; i++ ) {
          const self = button[i];

          self.addEventListener( 'click', (e) => {
            e.preventDefault();
            container.classList.add( 'is-active' );
          })
        }

        close.addEventListener( 'click', (e) => {
          e.preventDefault();
          if ( container.classList.contains( 'is-active' ) ) {
            container.classList.remove( 'is-active' );
          }
        })
      }
	  
	}
	
	$(document).ready(function() {
		blonweThemeModule.popuplogin();
	});

})(jQuery);
