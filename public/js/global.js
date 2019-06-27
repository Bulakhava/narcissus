"use strict";

$(function () {
  function toggleMobileMenu() {
    $('.mobile-menu').slideToggle("fast");
    $('body').toggleClass('overflow');
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
  var topNav = $('.top-navigation'),
      container = $('.container');

  function fixMenu() {
    var st = $(this).scrollTop();

    if (st > 99 && !topNav.hasClass('top-navigation_fixed')) {
      topNav.addClass('top-navigation_fixed');
      container.addClass('pT-105');
    }

    if (st <= 99 && topNav.hasClass('top-navigation_fixed')) {
      topNav.removeClass('top-navigation_fixed');
      container.removeClass('pT-105');
    }
  }

  $(window).on('load', function () {
    fixMenu();
  });
  $window.scroll(fixMenu);





});
