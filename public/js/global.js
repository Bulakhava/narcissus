"use strict";

$(function () {
  function toggleMobileMenu() {
    $('.mobile-menu').slideToggle("fast");

    if ($(window).width() <= 683) {
      $('body').toggleClass('overflow');
    }

    $(this).toggleClass('cross');
  }

  $('.burger').on('click', toggleMobileMenu);

  var each = function each(arr, tmpl) {
    return arr.reduce(function (html, el) {
      return html + tmpl(el);
    }, '');
  };

  var imgTmpl = function imgTmpl(src) {
    return "<img src=\"/".concat(src, "\">");
  };

  var galeriaTmpl = function galeriaTmpl(images) {
    return "\n          <div class=\"galleria-overlay\">\n           <a class=\"galleria-close\">X</a>\n              <div class=\"galleria\">\n                  ".concat(each(images, imgTmpl), "\n              </div>\n         </div>");
  };

  function openSlider() {
    $.ajax({
      url: '/catalog/get-gallery-img',
      type: 'post',
      data: {
        id: $(this).data('id')
      },
      success: function success(res) {
        $('body').addClass('overflow').append(galeriaTmpl(JSON.parse(res)));
        Galleria.loadTheme('https://cdnjs.cloudflare.com/ajax/libs/galleria/1.5.7/themes/classic/galleria.classic.min.js');
        Galleria.run('.galleria');
        $('.galleria-close').on('click', closeSlider);
      }
    });
  }

  function closeSlider() {
    $('.galleria-overlay').remove();
    $('body').removeClass('overflow');
  }

  $('.open-slider').on('click', openSlider);

  function postRequest(url, data) {
    return $.ajax({
      url: url,
      type: 'post',
      data: data
    });
  }

  function putLike(e, id_post) {
    postRequest("/post-like/".concat(id_post), {}).pipe(function (res) {
      return JSON.parse(res);
    }).done(function (res) {
      var el = $(e.currentTarget);

      if (res.status === 'added') {
        el.find('.post-likes-count').text(+el.find('.post-likes-count').text() + 1);
        el.find('i').css('color', '#FF586B');
        el.attr('title', 'Отменить');
      } else if (res.status === 'deleted') {
        el.find('.post-likes-count').text(+el.find('.post-likes-count').text() - 1);
        el.find('i').css('color', '#999');
        el.attr('title', 'Нравится');
      }
    });
  }

  function openModalToLogin($this) {
    $this.next().removeClass('hidden');
    $(document).mouseup(closePopup);
  }

  function closePopup(e) {
    if (!$(event.target).closest('.modal-go-to-login').length) {
      $('.modal-go-to-login').addClass('hidden');
    }
  }

  $('.post-likes').on('click', function (e) {
    $(this).data('user_status') === 'authorized' ? putLike(e, $(this).data('id_post')) : openModalToLogin($(this));
  });
  $('.social-item').on('click', function () {
    var url = $(this).data('url') + location.href;
    window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=50,width=500,height=500");
  });

  var tmpl = function tmpl(path) {
    return "<div class=\"big-img_overlay\">\n          <div class=\"image zoomInImg\">\n             <img src=\"".concat(path, "\" class=\"large-img\">\n         </div>\n         </div>");
  };

  function zoomIn() {
    $('body').addClass('overflow').append($(tmpl($(this).data('url'))));
    $('.big-img_overlay').on('click', zoomOut);
  }

  function zoomOut() {
    $('body').removeClass('overflow');
    $(this).remove();
  }

  $('.zumer').on('click', zoomIn);
  $('.open_catalog_navigation').on('click', function () {
    $('.catalog_navigation_list').slideToggle("fast");
  });
});