(function ($) {
  "use strict";

	blonweThemeModule.loginform = function() {
		
		const tab = document.querySelectorAll('.login-page-tab li');
		const form = document.querySelector('.login-form-container');

		if (tab !== null && form !== null) {
			const removeClass = () => {
			  for ( var i = 0; i < tab.length; i++ ) {
				if ( tab[i].children[0].classList.contains( 'active' ) ) {
				  tab[i].children[0].classList.remove('active');
				}
			  }
			}

			for ( var i = 0; i < tab.length; i++ ) {
			  const button = tab[i].children[0];
			  button.addEventListener( 'click', (event) => {
				event.preventDefault();
				if ( !event.target.classList.contains( 'active' ) ) {
				  removeClass();
				  event.target.classList.add( 'active' );
				  form.classList.toggle( 'show-register-form' );
				}
			  });
			}

			if(window.location.hash == '#register'){
				$( '.login-page-tab li a' ).removeClass();
				$( '.login-page-tab li:last-child a' ).addClass( 'active' );
				 form.classList.toggle( 'show-register-form' );
			}

		}


	}
	
	$(document).ready(function() {
		blonweThemeModule.loginform();
	});

})(jQuery);
