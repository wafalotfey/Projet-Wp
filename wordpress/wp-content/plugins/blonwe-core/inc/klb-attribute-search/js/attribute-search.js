(function ($) {
  "use strict";


	$(document).on('change', 'form#klb-attribute-filter select', function(){

		var mythis = $(this);
		
		var attrname = $(this).attr('name');
		
		if ($(this).hasClass("child-attr")) {
			return;
		}
		
		if(!$(this).closest('form').find('#child_'+ attrname).length){
			return;
		}

        var data = {
			cache: false,
            action: 'klb_models_output',
			beforeSend: function () {
				$(mythis).closest('form').append('<div class="attribute-filter-loader"></div>');
			},
			selected_id : $(this).find('option:selected').attr("id"),
			attribute_name : $(this).find('option:selected').val(),
			parent_id : $(this).attr("id"),
			tax : $(this).attr("tax"),
			
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {

			$(mythis).closest('form').find('#child_'+data.parent_id).html(response);
			$(mythis).closest('form').find('#child_'+data.parent_id).removeAttr('disabled');

			// remove the loader
			$('.attribute-filter-loader').remove();
        });

    });


	$(document).on('change', 'form#klb-attribute-filter select', function(){

		var sameselect = $(this).attr('name');
		
		if($(this).closest('form').find('select[name="'+ sameselect +'"]').length > 1){
			var total = '';
			var selectfield = $(this).closest('form').find('select[name="'+ sameselect +'"]').length;
		
			$(this).closest('form').find('select[name="'+ sameselect +'"]').each(function(index){
				if($(this).val() && $(this).val() != '0'){
					total += $(this).val();
				}
				var last_item = index === selectfield - 1;
								
				if (!last_item) {
					total += ',';
				}
			});
			
			var str = total.replace(/,\s*$/, "");

			var textValue = $(this).closest('form').find('#klb_'+ sameselect +'').val(str);
		}
	});
		
	$(document).on('submit', 'form#klb-attribute-filter', function(){
		$(this).find(':input').filter(function() { return !this.value; }).attr('disabled', 'disabled');
		
		$(this).find('select:not([disabled]').each(function(){
			
			var selectname = $(this).attr('name');
			
			if($(this).closest('form').find('select[name="'+ selectname +'"]').length > 1){
				$(this).closest('form').find('select[name="'+ selectname +'"]').attr('disabled', 'disabled');
			}
		});
		
		return true; // make sure that the form is still submitted
	});
	
}(jQuery));