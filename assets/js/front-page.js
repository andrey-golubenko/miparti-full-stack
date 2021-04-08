(function ($) {
    'use strict';

// Sliders (left and right from FRONT-PAGE)
    $('.slider_left').slick({
        infinite: true,
        fade: true,
        cssEase: 'linear',
        easing: 'linear',
        autoplay: true,
        autoplaySpeed: 5555,
        accessibility: false,
        arrows: false,
        lazyLoad: 'ondemand',
        pauseOnHover: false
    });

    $('.slider_right').slick({
        infinite: true,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5555,
        accessibility: false,
        arrows: false,
        lazyLoad: 'ondemand',
        pauseOnHover: false,
    });

// Sliders (From MOBILE-FRONT-PAGE)
    $('.mobile_front_slider_center').slick({
        infinite: true,
        fade: true,
        cssEase: 'linear',
        easing: 'linear',
        autoplay: true,
        mobileFirst: true,
        pauseOnFocus: false,
        autoplaySpeed: 5555,
        accessibility: false,
        arrows: false,
        lazyLoad: 'ondemand',
        pauseOnHover: false
    });

// MENU button (from front-page)
    const frontMenuBtnPush = $('button.push');
    $('.push').click(function () {
        //переключение между показать и спрятать само меню
        $('nav.front_nav_menu_content').slideToggle().css({'display' : 'flex'});
        if (frontMenuBtnPush.hasClass("btn_menu_active")) {
            $('span.btn_push_text').fadeOut(100);
            setTimeout(() => {
                $('.btn_cover_text').fadeIn(100)
            }, 200);
            frontMenuBtnPush.removeClass('btn_menu_active')
        } else {
            $('.btn_cover_text').fadeOut(100);
            setTimeout(() => {
                $('.btn_push_text').fadeIn(100)
            }, 200);
            frontMenuBtnPush.addClass('btn_menu_active');
        }
    });

// Underline in nav-menu in full-screen version of front-page
    const frontMenuActiveItem = $('.front_nav_menu_content ul li.nav_link a');
    frontMenuActiveItem.mouseenter(function (e) {
        const currLink = $(e.target.closest('li.nav_link'));
        currLink.find('.underline').css({'left': '0'});
    });
    frontMenuActiveItem.mouseleave(function (e) {
        const currLink = $(e.target.closest('li.nav_link'));
        currLink.find('.underline').css({'left':'-500%'});
    });


//Show sub-menu FOR MOBILE Menu
    const mobMenuMediaQuery = window.matchMedia('(max-width: 1023px)');
    if (mobMenuMediaQuery.matches){
        $('.nav_link_pin').click(function (e) {
            e.stopPropagation(); // to disable triggering '<a>', the element clicked is in
            const currentMenuPoint = $(e.target.closest('li.nav_link'));
            const changeArrowClass = currentMenuPoint.find('.nav_link_pin');
            changeArrowClass.toggleClass('arrow_state_change');
            currentMenuPoint.find('ul.sub-menu').slideToggle();
            e.preventDefault();
        });
    }

    // Add Open-class FOR MOBILE Menu
    const componentMenu = $('.head_menu'); // All MENU

    $('.head_menu_icon').click(function () {
        componentMenu.toggleClass('mobile_menu_open');
    });
})(jQuery);