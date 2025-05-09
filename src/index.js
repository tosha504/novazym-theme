(function () {
  console.log('ready');
  const burger = jQuery(".burger"),
    burgerSpan = jQuery(".burger span"),
    nav = jQuery('.header__nav'),
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