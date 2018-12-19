$(function () {

   function toggleMobileMenu() {
        $('.mobile-menu').slideToggle("fast");
        $('body').toggleClass('overflow');
        $(this).toggleClass('cross');
    }

    $('.burger').on('click', toggleMobileMenu);
});