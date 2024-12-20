'use strict';

(function($) {
  // ready
  $(function() {
    klbcp_change_count('first');
    klbcp_check_buttons();
    klbcp_hide_empty();
  });
  
  // found variation
  $(document).on('found_variation', function(e, t) {
    var product_id = $(e['target']).attr('data-product_id');

    $('.klbcp-btn-' + product_id).removeClass('klbcp-btn-added klbcp-added').attr('data-id', t.variation_id);
    $('.klbcp-btn-' + product_id).html(klbcp_vars.button_text);
  });

  // reset data
  $(document).on('reset_data', function(e) {
    var product_id = $(e['target']).attr('data-product_id');

    $('.klbcp-btn-' + product_id).removeClass('klbcp-btn-added klbcp-added').attr('data-id', product_id);

    $('.klbcp-btn-' + product_id).html(klbcp_vars.button_text);
  });

  // add
  $(document).on('click touch', '.klbcp-btn', function(e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.attr('data-id');
    var product_id = $this.attr('data-product_id');
    var product_name = $this.attr('data-product_name');

    if (typeof product_id !== typeof undefined && product_id !== false) {
      id = product_id;
    }
	
    $('.klbcp-message').remove();
	
	$this.addClass('klbcp-adding');
	
setTimeout(function(){
	
	$this.removeClass('klbcp-adding');
	
    if ($this.hasClass('klbcp-btn-added klbcp-added')) {

	  $('body').append('<div class="klbcp-message klbcp-show"><div class="klbcp-message-inner">' + klbcp_vars.message_exists.replace('{name}', 
	  '<strong>' + product_name + '</strong>') + ' <a href="'+ klbcp_vars.page_url + '" class="btn primary"><i class="klb-icon-compare-product-thin"></i> '+ klbcp_vars.view_page_text + '</a><a class="btn primary klbcp-close-message"><i class="klb-icon-xmark"></i> ' + klbcp_vars.close_text + '</a></div></div>');

    } else {
      
      klbcp_add_product(id);

	  $('body').append('<div class="klbcp-message klbcp-show"><div class="klbcp-message-inner">' + klbcp_vars.message_added.replace('{name}', 
	  '<strong>' + product_name + '</strong>') + ' <a href="'+ klbcp_vars.page_url + '" class="btn primary"><i class="klb-icon-compare-product-thin"></i> '+ klbcp_vars.view_page_text + '</a><a class="btn primary klbcp-close-message"><i class="klb-icon-xmark"></i> ' + klbcp_vars.close_text + '</a></div></div>');
    }
}, 700);



  });
  
  // Remove klbcp-show class
  function klbcp_popup_hide() {
    $('.klbcp-message').removeClass('klbcp-show');
  }
  
  // click on area
  $(document).on('click touch', '.klbcp-message', function(e) {
    var klbcompare_content = $('.klbcp-message-inner');

    if ($(e.target).closest(klbcompare_content).length == 0) {
      klbcp_popup_hide();
    }
  });
  
  // Close popup message
  $(document).on('click touch', '.klbcp-close-message', function(e) {
      klbcp_popup_hide();
  });
  

  // remove on page
  $(document).on('click touch', '.compare-page .klbcp-remove', function(e) {
	e.preventDefault();
	var product_id = $(this).attr('data-id');

	klbcp_remove_product(product_id);
	location.reload();
  });

  function klbcp_set_cookie(cname, cvalue, exdays) {
    var d = new Date();

    d.setTime(d.getTime() + (
        exdays * 24 * 60 * 60 * 1000
    ));

    var expires = 'expires=' + d.toUTCString();

    document.cookie = cname + '=' + cvalue + '; ' + expires + '; path=/';
  }

  function klbcp_get_cookie(cname) {
    var name = cname + '=';
    var ca = document.cookie.split(';');

    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];

      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }

      if (c.indexOf(name) == 0) {
        return decodeURIComponent(c.substring(name.length, c.length));
      }
    }

    return '';
  }

  function klbcp_get_products() {
    var cookie_products = klbcp_get_cookie_products();

    if (klbcp_get_cookie(cookie_products) != '') {
      return klbcp_get_cookie(cookie_products);
    } else {
      return '';
    }
  }

  function klbcp_add_product(product_id) {
    var count;
    var limit = false;
    var limit_notice = klbcp_vars.limit_notice;
    var cookie_products = klbcp_get_cookie_products();

    if (klbcp_get_cookie(cookie_products) !== '') {
      var products = klbcp_get_cookie(cookie_products).split(',');

      if (products.length < klbcp_vars.limit) {
        products = $.grep(products, function(value) {
          return value != product_id;
        });

        products.unshift(product_id);

        var products_str = products.join();

        klbcp_set_cookie(cookie_products, products_str, 7);
      } else {
        limit = true;
        limit_notice = limit_notice.replace('{limit}', klbcp_vars.limit);
      }

      count = products.length;
    } else {
      klbcp_set_cookie(cookie_products, product_id, 7);
      count = 1;
    }

    klbcp_change_count(count);
    $(document.body).trigger('klbcp_added', [count]);

    if (limit) {
      $('.klbcp-btn[data-id="' + product_id + '"]').removeClass('klbcp-btn-adding klbcp-adding');
      alert(limit_notice);
    } else {
      $('.klbcp-btn[data-id="' + product_id + '"]').removeClass('klbcp-btn-adding klbcp-adding').addClass('klbcp-btn-added klbcp-added');

      $('.klbcp-btn[data-id="' + product_id + '"]').html(klbcp_vars.button_text_added);
    }
  }

  function klbcp_remove_product(product_id) {
    var count = 0;
    var cookie_products = klbcp_get_cookie_products();

    if (product_id !== 'all') {
      // remove one
      if (klbcp_get_cookie(cookie_products) != '') {
        var products = klbcp_get_cookie(cookie_products).split(',');

        products = $.grep(products, function(value) {
          return value != product_id;
        });

        var products_str = products.join();

        klbcp_set_cookie(cookie_products, products_str, 7);
        count = products.length;
      }

      $('.klbcp-btn[data-id="' + product_id + '"]').removeClass('klbcp-btn-added klbcp-added');

      $('.klbcp-btn[data-id="' + product_id + '"]').html(klbcp_vars.button_text);
    } else {
      // remove all
      if (klbcp_get_cookie(cookie_products) != '') {
        klbcp_set_cookie(cookie_products, '', 7);
        count = 0;
      }

      $('.klbcp-btn').removeClass('klbcp-btn-added klbcp-added');

      $('.klbcp-btn').html(klbcp_vars.button_text);
    }

    klbcp_change_count(count);
    $(document.body).trigger('klbcp_removed', [count]);
  }

  function klbcp_check_buttons() {
    var cookie_products = klbcp_get_cookie_products();

    if (klbcp_get_cookie(cookie_products) != '') {
      var products = klbcp_get_cookie(cookie_products).split(',');

      $('.klbcp-btn').removeClass('klbcp-btn-added klbcp-added');
      $('.klbcp-btn').html(klbcp_vars.button_text);

      products.forEach(function(entry) {
        $('.klbcp-btn-' + entry).addClass('klbcp-btn-added klbcp-added');
        $('.klbcp-btn-' + entry).html(klbcp_vars.button_text_added);
      });
    }
  }



  function klbcp_change_count(count) {
    if (count === 'first') {
      var products = klbcp_get_products();

      if (products != '') {
        var products_arr = products.split(',');

        count = products_arr.length;
      } else {
        count = 0;
      }
    }

	$('.klbcp-count').html(count);

    $(document.body).trigger('klbcp_change_count', [count]);
  }

  function klbcp_hide_empty() {
    $('.klbcp_table > tbody > tr').each(function() {
      var $tr = $(this);
      var _td = 0;
      var _empty = true;

      $tr.children('td').each(function() {
        if ((_td > 0) && ($(this).html().length > 0)) {
          _empty = false;
          return false;
        }
        _td++;
      });

      if (_empty) {
        $tr.addClass('tr-empty').remove();
      }
    });
  }

  function klbcp_get_cookie_products() {
    return klbcp_vars.user_id !== '' ?
        'klbcp_products_' + klbcp_vars.user_id :
        'klbcp_products';
  }
})(jQuery);