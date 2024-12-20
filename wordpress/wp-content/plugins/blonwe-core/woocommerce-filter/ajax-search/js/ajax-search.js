jQuery(document).ready(function($) {
	"use strict";
	
	$('header form.search-form, .search-holder-form form.search-form, .klb-mobile-search form.search-form').addClass('klb-ajax-search');

	var searchform = $('form.klb-ajax-search');
	var searchselect = $('form.klb-ajax-search select');
	var searchinput = $('form.klb-ajax-search input[type="search"]');
	var searchbutton = $('form.klb-ajax-search button');
	var timeout;

	$(document).on('change', 'form.klb-ajax-search select', function(){
		$(this).closest('form.klb-ajax-search').find('input[type="search"]').keyup();
	});
	
	$(document).on('keyup', searchinput, function(event){
		event.preventDefault();

		if($(event.target).val().length < 3){
			return false;
		}
		
		if(timeout) {
			clearTimeout(timeout);
		}
		timeout = setTimeout(function() {
			var data = {
				cache: false,
				type: 'POST',
				action: 'ajax_search',
				beforeSend: function() {
					$(event.target).closest(searchform).find(searchbutton).append('<svg class="loader-image preloader" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
					$(event.target).closest(searchform).addClass('search-loading');
				},
				keyword: $(event.target).val(),
				selected_cat: $(event.target).closest(searchform).find('option:selected').val(),
				
			};

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			$.post(blonwesearch.ajaxurl, data, function(response) {

				$(".klb-search-results").remove();
				$(".header-search-results").remove();
				$(event.target).closest(searchform).find(searchinput).after('<div class="klb-search-results">' + response + '</div>');

				$(searchform).removeClass('search-loading');
				$(".loader-image").remove();

			});
		}, 500);	
		
    });	
	
	// hide search result box if click outside
	$(document).on('click touch', function(e) {
		// check if ajax is enabled
		if ($('.klb-search-results').length) {
			// show search result when click input
			if($(e.target).is('select')){
				$('.klb-search-results').show();
				return false;
			}
			
			if($(e.target).is('[type="search"]')){
				$('.klb-search-results').show();
				return false;
			}
			
			// hide search result box if click outside
			if ($(e.target).closest($('.klb-search-results')).length == 0) {
				$('.klb-search-results').hide();
			}
		}
	});
	

});