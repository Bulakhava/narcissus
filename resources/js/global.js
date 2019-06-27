$(function () {

   function toggleMobileMenu() {
        $('.mobile-menu').slideToggle("fast");
        $('body').toggleClass('overflow');
        $(this).toggleClass('cross');
    }

    $('.burger').on('click', toggleMobileMenu);

     const each = (arr, tmpl) => arr.reduce((html, el) => html + tmpl(el), '');
     const imgTmpl = src => `<img src="/${src}">`;

     const galeriaTmpl = (images) => `
          <div class="galleria-overlay">
           <a class="galleria-close">X</a>
              <div class="galleria">
                  ${each(images, imgTmpl)}
              </div>
         </div>`;

    function openSlider() {
        $.ajax({
            url: '/catalog/get-gallery-img',
            type: 'post',
            data: {
                id: $(this).data('id')
            },
            success: function (res) {
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
