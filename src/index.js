(function () {
  console.log('ready');
  const burger = jQuery(".burger"),
    burgerSpan = jQuery(".burger span"),
    nav = jQuery('#site-navigation'),
    body = jQuery('body');

  burger.on("click", function () {
    burgerSpan.toggleClass("active");
    nav.toggleClass("active");
    body.toggleClass("fixed-page");
  });

  setTimeout(function () {
    if (getCookie('popupCookie') != 'submited') {
      jQuery('.cookies').css("display", "block").hide().fadeIn(2000);
    }

    jQuery('a.submit').click(function () {
      jQuery('.cookies').fadeOut();
      //sets the coookie to five minutes if the popup is submited (whole numbers = days)
      setCookie('popupCookie', 'submited', 7);
    });
  }, 5000);

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }


  //single-page woo
  jQuery(document).on("click", '.cart-qty.plus, .cart-qty.minus', function (e) {
    e.preventDefault();
    console.log(e);

    const input = jQuery(this).parent().find('.input-text.qty.text');
    const input_val = parseInt(input.val());
    if (jQuery(this).hasClass('plus')) {
      input.val(input_val + 1);
      input.attr('value', input_val + 1)
    }
    else {
      const new_val = input_val - 1;
      if (new_val > 0) {
        input.val(input_val - 1);
        input.attr('value', input_val - 1)
      }
    }

    input.trigger("change");
  });
  let timeout;
  jQuery('.woocommerce').on('change', 'input.qty', function () {
    if (timeout !== undefined) {
      clearTimeout(timeout);
    }
    timeout = setTimeout(function () {
      jQuery("[name='update_cart']").trigger("click"); // trigger cart update
    }, 50); // 1 second delay, half a second (500) seems comfortable too
  });
  jQuery('.feedback__items').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    infinite: false,
    swipe: true,
    responsive: [
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  })


  jQuery(document).ready(function () {
    jQuery('#checkout_apply_coupon').click(function (ev) {
      ev.preventDefault();
      var code = jQuery('#checkout_coupon_code').val();
      var data = {
        action: 'ajaxapplucoupon',
        coupon_code: code
      };

      jQuery.post(wc_checkout_params.ajax_url, data, function (returned_data) {
        if (returned_data.result == 'error') {
          console.log(returned_data);

          alert('error');
          jQuery('p.resoult-coupon').html(returned_data.message);
        } else {
          setTimeout(function () {
            jQuery(document.body).trigger('update_checkout');
          }, 500);
        }
      })
    });
  });

  jQuery(document).on('click', '.question', function (e) {
    console.log(jQuery(this).parent().siblings().children('div.answer').is(':visible'));
    if (jQuery(this).parent().siblings().children('div.answer').is(':visible')) {
      jQuery(this).parent().siblings().children('.question').children('button').removeClass('active')
      jQuery(this).parent().siblings().children('div.answer').slideUp(200);
    }
    jQuery(this).children('button').toggleClass('active')
    jQuery(this).siblings('div.answer').slideToggle(200)
  })

})(jQuery);