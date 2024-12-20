'use strict';

(function($) {
  var $storage = true;
  var added_ids = [];
  var key = Cookies.get('klbwl_key');

  try {
    $storage = ('sessionStorage' in window && window.sessionStorage !== null);
    window.sessionStorage.setItem('klbwl', 'test');
    window.sessionStorage.removeItem('klbwl');
  } catch (err) {
    $storage = false;
  }

  $(function() {
    if (key === null || key === undefined || key === '') {
      key = klbwl_get_key();
      Cookies.set('klbwl_key', key, {expires: 7});
    }

    // Load data for the first time
    klbwl_load_data();

  });

  $(document).on('klbwl_change_count', function() {
	klbwl_load_count();
  });

  // add to wishlist
  $(document).on('click touch', '.klbwl-btn', function(e) {
    var $this = $(this);
    var id = $this.attr('data-product_id');
    var pid = $this.attr('data-pid');
    var product_id = $this.attr('data-product_id');
    var product_title = $this.attr('data-product_title');

    if (typeof pid !== typeof undefined && pid !== false) {
      id = pid;
    }

    if (typeof product_id !== typeof undefined && product_id !== false) {
      id = product_id;
    }

    var data = {
	  cache: false,
      action: 'wishlist_add', 
	  product_id: id,
    };
		
	  $this.addClass('klbwl-adding');

	  $.post(klbwl_vars.ajax_url, data, function(response) {
		$this.removeClass('klbwl-adding');


		  if (response.content != null) {
			$('#klbwl_wishlist').html(response.content).addClass('klbwl-loaded');
		  }

		  if (response.notice != null) {
			klbwl_notice(response.notice.replace('{name}',
				'<strong>' + product_title + '</strong>'));
		  }

		  klbwl_wishlist_show();
	   

		if (response.count != null) {
		  klbwl_change_count(response.count);
		}
		
		if (response.totalcount != null) {
			$this.closest('.wishlist-button').find('.totalcount').html(response.totalcount);
		}

		if (response.status === 1) {
		  klbwl_refresh_button_id(id);
		}

		if ($storage && response.data) {
		  sessionStorage.setItem('klbwl_data_' + response.data.key,
			  JSON.stringify(response.data));
		}

		if (response.data.ids) {
		  klbwl_refresh_buttons(response.data.ids);
		  klbwl_refresh_ids(response.data.ids);
		}

		$(document.body).trigger('klbwl_add', [id]);
	  });

    e.preventDefault();
  });

  // remove from wishlist
  $(document).on('click touch', '.klbwl-item--remove span', function(e) {
    var $this = $(this);
    var key = $this.closest('.klbwl-popup-inner').data('key');
    var $this_item = $this.closest('.klbwl-item');
    var product_id = $this_item.attr('data-product_id');
    var data = {
      action: 'wishlist_remove', product_id: product_id, key: key,
    };

    $this.addClass('klbwl-removing');

    $.post(klbwl_vars.ajax_url, data, function(response) {
      $this.removeClass('klbwl-removing');
      $this_item.remove();

      if (response.content != null) {
        $('#klbwl_wishlist').html(response.content).addClass('klbwl-loaded');
      }

      if (response.notice != null) {
        klbwl_notice(response.notice);
      }

      if (response.count != null) {
        klbwl_change_count(response.count);
      }

      if ($storage && response.data) {
        sessionStorage.setItem('klbwl_data_' + response.data.key,
            JSON.stringify(response.data));
      }

      if (response.data.ids) {
        klbwl_refresh_buttons(response.data.ids);
        klbwl_refresh_ids(response.data.ids);
      }

      $(document.body).trigger('klbwl_remove', [product_id]);
    });

    e.preventDefault();
  });


  // click on area
  $(document).on('click touch', '.klbwl-popup', function(e) {
    var klbwl_content = $('.klbwl-popup-content');

    if ($(e.target).closest(klbwl_content).length == 0) {
      klbwl_wishlist_hide();
    }
  });

  // close
  $(document).on('click touch', '#klbwl_wishlist .klbwl-popup-close', function(e) {
	klbwl_wishlist_hide();
	e.preventDefault();
  });

  function klbwl_load_count() {
    var data = {
      action: 'wishlist_load_count',
    };

    $.post(klbwl_vars.ajax_url, data, function(response) {
      if (response.count != null) {
        var count = response.count;

		$('.klbwl-wishlist-count').html(count);

        klbwl_change_count(count);
        $(document.body).trigger('klbwl_load_count', [count]);
      }
    });
  }

  function klbwl_wishlist_show() {
    $('#klbwl_wishlist').addClass('klbwl-show');

    $(document.body).trigger('klbwl_wishlist_show');
  }

  function klbwl_wishlist_hide() {
    $('#klbwl_wishlist').removeClass('klbwl-show');
    $(document.body).trigger('klbwl_wishlist_hide');
  }

  function klbwl_change_count(count) {
    $('#klbwl_wishlist .klbwl-count').html(count);

    if (parseInt(count) > 0) {
      $('.klbwl-empty').show();
    } else {
      $('.klbwl-empty').hide();
    }

    $(document.body).trigger('klbwl_change_count', [count]);
  }

  function klbwl_notice(notice) {
    $('.klbwl-notice').html(notice);
    klbwl_notice_show();
    setTimeout(function() {
      klbwl_notice_hide();
    }, 3000);
  }

  function klbwl_notice_show() {
    $('#klbwl_wishlist .klbwl-notice').addClass('klbwl-notice-show');
  }

  function klbwl_notice_hide() {
    $('#klbwl_wishlist .klbwl-notice').removeClass('klbwl-notice-show');
  }

  function klbwl_html_entities(str) {
    return String(str).
        replace(/&/g, '&amp;').
        replace(/</g, '&lt;').
        replace(/>/g, '&gt;').
        replace(/"/g, '&quot;');
  }

  function klbwl_get_key() {
    var result = [];
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charactersLength = characters.length;

    for (var i = 0; i < 6; i++) {
      result.push(
          characters.charAt(Math.floor(Math.random() * charactersLength)));
    }

    return result.join('');
  }

  function klbwl_load_data() {
    if ($storage) {
      try {
        var data = JSON.parse(sessionStorage.getItem('klbwl_data_' + key));

        if (data.ids) {
          klbwl_refresh_buttons(data.ids);
          klbwl_refresh_ids(data.ids);
        }

        if (data.key && (key === null || key === undefined || key === '')) {
          Cookies.set('klbwl_key', data.key, {expires: 7});
        }
      } catch (err) {
        klbwl_get_data();
      }
    } else {
      klbwl_get_data();
    }
  }

  function klbwl_get_data() {
    var data = {
      action: 'klbwl_get_data',
    };

    $.post(klbwl_vars.ajax_url, data, function(response) {
      if (response) {
        if ($storage) {
          sessionStorage.setItem('klbwl_data_' + response.key,
              JSON.stringify(response));
        }

        if (response.ids) {
          klbwl_refresh_buttons(response.ids);
          klbwl_refresh_ids(response.ids);
        }

        if (response.key && (key === null || key === undefined || key === '' || key !==response.key)) {
			Cookies.set('klbwl_key', response.key, {expires: 7});
		}
			
		$(document.body).trigger('klbwl_data_refreshed', [response]);
      }
    });
  }

  function klbwl_refresh_ids(ids) {
    added_ids = ids;
  }

  function klbwl_refresh_buttons(ids) {
    $('.klbwl-btn').removeClass('klbwl-product-in-list');
    $('.klbwl-btn').html(klbwl_vars.button_text);

    $.each(ids, function(key, value) {
      $('.klbwl-btn-' + key).addClass('klbwl-product-in-list');
      $('.klbwl-btn-' + key).html(klbwl_vars.button_text_added);

      if (value.parent !== undefined) {
        $('.klbwl-btn-' + value.parent).addClass('klbwl-product-in-list');
        $('.klbwl-btn-' + value.parent).html(klbwl_vars.button_text_added);
      }
    });

    $(document.body).trigger('klbwl_buttons_refreshed', [ids]);
  }

  function klbwl_refresh_button_id(id) {
    $('.klbwl-btn[data-product_id="' + id + '"]').removeClass('klbwl-product-in-list');
    $('.klbwl-btn[data-product_id="' + id + '"]').html(klbwl_vars.button_text);

    $.each(added_ids, function(key) {
      if (parseInt(key) === parseInt(id)) {
        $('.klbwl-btn[data-product_id="' + id + '"]').addClass('klbwl-product-in-list');
        $('.klbwl-btn[data-product_id="' + id + '"]').html(klbwl_vars.button_text_added);
      }
    });

    $(document.body).trigger('klbwl_refresh_button_id', [id, added_ids]);
  }
})(jQuery);