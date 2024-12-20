(function ($) {
  "use strict";

	$(document).ready(function () {
		const container = document.querySelector( '.location-modal' );
		const button = document.querySelectorAll( '.location-button' );
		const overlay = document.querySelector('.location-modal .klb-modal-overlay');
		const body = document.body;

		if ( container !== null && button !== null ) {
			const close = container.querySelector( '.site-close' );
			for( var i = 0; i < button.length; i++ ) {
			  const self = button[i];

			  self.addEventListener( 'click', (e) => {
				e.preventDefault();
				container.classList.add( 'is-active' );
				body.style.overflow = "hidden";
			  })
			}

			close.addEventListener( 'click', (e) => {
			  e.preventDefault();
			  if ( container.classList.contains( 'is-active' ) ) {
				container.classList.remove( 'is-active' );
				body.style.overflow = "";
			  }
			})

			overlay.addEventListener( 'click', (e) => {
			  e.preventDefault();
			  if ( container.classList.contains( 'is-active' ) ) {
				container.classList.remove( 'is-active' );
				body.style.overflow = "";
			  }
			})
		}
	 
	  
		$('.klb-modal-root.location-modal .location-list ul .location-item > a').on( 'click', function(e) {
			e.preventDefault();
			$.cookie("location", $(this).data('slug'));
			location.reload(true); 
			/* console.log("select", e.params.data.text); */
		});
	  
		/* popup location */
		if ( !( Cookies.get( 'location' ) ) && locationfilter.popup == 1) {
			$( ".location-button" ).trigger( "click" );
		}
		
		/* Location search */
		if (container !== null) {
			const liveSearch = () => {
			  let searchQuery = container.querySelector('.location-input').value;
			  const locations = container.querySelectorAll('.location-list .location-name');

			  for (var i = 0; i < locations.length; i++) {
				const self = locations[i];
				const parent = self.closest('LI');

				if (self.textContent.toLowerCase().includes(searchQuery.toLowerCase())) {
				  parent.classList.remove("d-none");
				} else {
				  parent.classList.add("d-none");
				}
			  }
			}

			let typingTimer;               
			let typeInterval = 400;
			let searchInput = container.querySelector('.location-input');

			searchInput.addEventListener('keyup', () => {
			  clearTimeout(typingTimer);
			  typingTimer = setTimeout(liveSearch, typeInterval);
			})
		}
	  
	
	});

})(jQuery);
