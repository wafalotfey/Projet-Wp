(function($) {
  'use strict';

    //CURRENT ADDRESS
    var loc = $(location).attr("pathname");
    var real = loc.substring(1);

    //MOBILE MENU TOGGLE
    $(" .mobile-toggler").on("click", function () {
        $(this).next().slideToggle();
        $(this).children().toggleClass("active");
    });

    //HEADER
    $(".header-search-form.product-search").clone().insertBefore(".header-close-menu.close-style");
    $("ul.menu-right-list .cart-wrapper").clone().appendTo("ul.header-wrap-right");

    //FAQ ACCORDIAN TOGGLE
    $(".faq-label").click(function () {
        $(this).toggleClass("active");
        $(this).find(".faq-answer").slideToggle();
        $(this).find(".circled").children().toggleClass("d-none");
    });

    //FAQ QUESTION PELLETE NUMBERING
    $(".faq-set-1>.quest >div").each(function (numb) {
        console.log(numb + 1);
        $(this).find(".faq-label").attr("numbering", "0"+(numb + 1));
    })
    $(".faq-set-2>.quest >div").each(function (numb) {
        console.log(numb + 1);
        $(this).find(".faq-label").attr("numbering", "0"+(numb + 1));
    })

    //SCROLL UP
    $(".scrollup").hide();
    $(window).on("scroll", function () {
        // console.log($(window).scrollTop());
        var scrol = $(window).scrollTop();
        if (scrol <= 500) {
            $(".scrollup").hide();
        } else {
            $(".scrollup").fadeIn(300);
        }
    });

    $(".mouse").click(function () {
        $("html").animate({ scrollTop: 0 }, "slow");
        return false;
    });
	
	if( $('.page-slider').length ){	
		var slider = tns({
			"container": ".page-slider",
			"autoplay": true,
			"loop": false,
			"rewind": true,
			"mouseDrag": true,
			"controls": false,
			"nav": false,
			"autoplayButtonOutput": false,
			"controlsContainer": "#nav-wrapper",
			"autoplayTimeout": 15000
		});

		// NAVIGATIONS
		$(function () {

			$(".next").click(function () {
				slider.goTo("next");
			});

			$(".prev").click(function () {
				slider.goTo("prev");
			});
			
		});
	}
	

    //ABOUT US IMAGE TRIANGLE
    for (var i = 60; i >= 0; i--) {
        $("<div></div>").css({
            "width": `${15 - Math.abs(15 - (0.5 * i))}%`, //1/4 value of initilazed "i"
            "bottom": `${2 * i}px`
        }).appendTo(".triangle");
    }


    /* DYNAMIC <SPAN> IN ADD TO CART BUTTON */
    if ($("body").attr("class") == "aromatic-home1") {
        $(".button.add_to_cart_button").text("").addClass("cta-01").css({ "border-radius": "0" });
    } else {
        $(".button.add_to_cart_button").text("").addClass("cta-02").css({ "border-radius": "0" });
    }
    $(".button.add_to_cart_button").parent().addClass("bt");
	$(".outofstock .button.product_type_simple").addClass("cta-01");
    $("<span>Add to cart</span>").appendTo(".button.add_to_cart_button");

    $(".cart-ft-buttons-cont").addClass("bt");
    $(".cart-ft-buttons-cont").children(".cart-ft-btn-cart").addClass("cta-01").html("<span>View Cart</span>");
    $(".cart-ft-buttons-cont").children(".cart-ft-btn-checkout").addClass("cta-02").html("<span>Checkout</span>");


    //BLOG CLASS INSERTION
    $(".tagcloud,.sidebar .widget_mail .mail-form .wp-block-search__inside-wrapper ").addClass("bt");
    $(".tagcloud").children().addClass("btn-hf");
    $(".sidebar .widget_mail .mail-form .wp-block-search__inside-wrapper ").children("button").addClass("btn-hf");


    //BLOG SINGLE
    $("#commentform>.form-submit").addClass("bt btn-hf p-0");
    //$("#commentform>.form-submit").html(`<button class="btn-hf p-0" style="border-radius:5px;"><input name="submit" type="submit" id="comment-submit" class="xl-btn" value="Post Comments"> </button><input type="hidden" name="comment_post_ID" value="140" id="comment_post_ID"> <input type="hidden" name="comment_parent" id="comment_parent" value="0">`)

    //PRODUCT SINGLE

    $("#st-primary-content .product .summary form.cart button").addClass("bt");
    //$("#st-primary-content .product .summary form.cart button").html(`<a href="shop.html" class="btn-hf">Add to cart</a>`);

    $("#st-primary-content .product .summary .compare.button").addClass("bt");
    $("#st-primary-content .product .summary .compare.button").children().addClass("btn-hf");

    $(".product-details-section .woocommerce-tabs .tabs li").addClass("bt");
    $(".product-details-section .woocommerce-tabs .tabs li").children().addClass("btn-hf");

    $(".widget_product_search form,.sidebar .widget_text.widget.widget_custom_html .widget_banner .banner_wrap .banner_content").addClass("bt");
    $(".widget_product_search form button,.sidebar .widget_text.widget.widget_custom_html .widget_banner .banner_wrap .banner_content a").addClass("btn-hf");



    /* END: DYNAMIC <SPAN> IN ADD TO CART BUTTON */

    Splitting();

    const tilt1 = $(".tilt1").tilt({
        "perspective": "1500",
        "glare": 0.2,
        "scale": 1.01,
        "speed": 300
    });


    /* HAMBURGER ANIMATION */
    $(".hamburger.hamburger-menu").click(function () {
        $("#mobile-m").css({
            "transform": "translateX(0)"
        });

        // $("#mobile-m").addClass("open-navs");
        $(".footer-cart-wrapper,.mouse").toggle();
    });

    $(".header-close-menu").click(function () {
        $("#mobile-m").css({
            "transform": "translateX(-150%)"
        });
        // $("#mobile-m").addClass("open-navs");
        $(".footer-cart-wrapper,.mouse").toggle();
        $(".toggle-lines.menu-toggle").focus();
        $('#mobile-m').hide();
    });

    $(".switcher-tab > button").click(function (e) {
        if (!$(this).hasClass("active-bg")) {
            $(".product-categories,.menu-primary").toggleClass("d-none");
            $(this).parent().children().toggleClass("active-bg");
        }
    });


    //CART ANIMATION
    $(".cart-icon-wrap").click(function () {
        $(".cart-wrapper .cart-modal .cart-container").toggle(1000);
    });

    $(".cart-close").on("click", function () {
        $(".cart-wrapper .cart-modal .cart-container").hide(1000);
        $(".cart-trigger").focus();
    });


    $(".product-details-section .woocommerce-tabs .woocommerce-Tabs-panel--reviews .woocommerce-Reviews #review_form .comment-respond .comment-form .form-submit").html(`<div class="bt"><a href="javascript:void(0)" class="cta-01"><span><input name="submit" type="submit" id="submit" class="submit" value="Submit"></span></a></div> <input type="hidden" name="comment_post_ID" value="142" id="comment_post_ID">
    <input type="hidden" name="comment_parent" id="comment_parent" value="0">`);


    //PRODUCT SINGLE PAGE CLASS ADDITION
    $(".aromatic_psc_frontend_btn").html(`<button id="aromatic_psc_after_add_to_cart"
    class="button aromatic_psc_call_popup bt"><a href='#' class="btn-hf">
    Size Chart </a></button>`);


    //ACCOUNT FORM CLASS ADDITION
    $(".registerform-inner,.loginform-inner").children("h5").addClass("title");
    $(".signpageforms .woocommerce-form p:nth-last-child(2)").addClass("bt").css({ "display": "inline" });
    $(".signpageforms .woocommerce-form p:nth-last-child(2)").children("button").addClass("btn-hf");

    //SHOPPING CART CLASS ADDITION
    $(".coupon").parent().addClass("bt");
    $(".coupon").next("button[type='submit']").addClass("btn-hf");
    $(".coupon,.product-remove").addClass("bt");
    $(".coupon").children("button[type='submit']").addClass("btn-hf");
    $(".product-remove").children().addClass("btn-hf");

    $(".cart-collaterals .wc-proceed-to-checkout").addClass("bt");
    $(".cart-collaterals .wc-proceed-to-checkout").children().addClass("btn-hf");


    // ACCOUNT SIDEMENU REMAIN HOVER
    $(".account-sidemenu a").on("mouseover", function () {
        $(".account-sidemenu a").removeClass("hovered");
        $(this).addClass("hovered");
    });

    //MAGIC INDICATOR
    $("#header-section + .navigation").on("click", "li", function (e) {
        $("#header-section + .navigation li").removeClass("active");
        $(this).addClass("active");
        var click_pos = $(this).attr("data-position");
        $(this).siblings(".indicator").css({ "left": `calc(${click_pos}% - 35px)`, "opacity": "1" });
    });

    $("li.list a").each(function (e) {
        let address = $(this).attr("href");
        console.log(real);
        if (real=== "" || real === "index.html") {
            var indicator_position = 10;
            $(".indicator").css({ "left": `calc(${indicator_position}% - 35px)`, "opacity": "1" });
        }
        else
        if (real === address) {
            var indicator_position = e * 20 + 10;
            $(".indicator").css({ "left": `calc(${indicator_position}% - 35px)`, "opacity": "1" });
        }
    });


    //DRAGGABLE CART
   // $('.footer-cart-wrapper ').draggable({ scroll: true, cursor: "move" });


    //FOCUS TRAPPING

//MOBILE NAVS + CATEGORIES TRAP
var startTrap = function (elem) {	
		//set focus on first input/
        $('.header-close-menu').focus();
	 var e, t, i, n = document.querySelector(".mobile-menu");
		let a = document.querySelector(".header-close-menu"),
			s = n.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),
			o = s[s.length - 1];
		if (!n) return !1;
		for (t = 0, i = (e = n.getElementsByTagName("a")).length; t < i; t++) e[t].addEventListener("focus", c, !0), e[t].addEventListener("blur", c, !0);

		function c() {
			for (var e = this; - 1 === e.className.indexOf("mobile-menu");) "li" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace(" focus", "") : e.className += " focus"), e = e.parentElement
		}
		document.addEventListener("keydown", function(e) {
			("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === a && (o.focus(), e.preventDefault()) : document.activeElement === o && (a.focus(), e.preventDefault()))
		})
};
	

$('.toggle-lines').click(function (e) {
    e.preventDefault(); 
    $('#mobile-m').show();
    startTrap($('#mobile-m'));
});




//CART TRAP

var cartTrap = function (elem) {
    let tabbable = elem.find('select, input, textarea, button, a,button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])').filter(':visible');

    let firstTabbable = tabbable.first();
    let lastTabbable = tabbable.last();
    /*set focus on first input*/
    firstTabbable.focus();

    /*redirect last tab to first input*/
    lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            $(".cart-close").click();
        };
    });
};


$('.cart-trigger').on("click",function (e) {
    // e.preventDefault();
    cartTrap($('.cart-container'));
});


//CATEGORY TRAP
var catTrap = function (elem) {
    let tabbable = elem.find('select, input, textarea, button, a, [href],[tabindex]:not([tabindex="-1"])').filter(':visible');

    let firstTabbable = tabbable.first();
    let lastTabbable = tabbable.last();

    $('.product-categories-list li:first-of-type a').focus();

    lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            firstTabbable.focus();
        }
    });

    firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            lastTabbable.focus();
        }
    });

    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            $(".header-close-menu").click();
        };
    });
};


$('.cat-menu-bt').click(function (e) {
    // e.preventDefault();
    catTrap($('#mobile-m'));
});
	
	
	 /*------------------------------------
        Sticky Menu 
    --------------------------------------*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 10) {
            $(".is-sticky-on").removeClass("sticky-menu");
        } else {
            $(".is-sticky-on").addClass("sticky-menu");
        }
    });
		
	 /*------------------------------------
        Footer Animation
    --------------------------------------*/
	$(window).on('load', function() {
		$(".footer .widget a").addClass("slide-horizontal");
	});	
	
	Splitting({
	  /* target: String selector, Element, Array of Elements, or NodeList */
	  target: ".footer .widget a",
	  /* by: String of the plugin name */
	  by: "chars",
	  /* key: Optional String to prefix the CSS variables */
	  key: null
	});
	
}(jQuery));

