(function ($) {


/********** MENU for All-Pages (besides Front-Page) **************/

    const componentMenu = $('.head_menu'); // All MENU
    const mediaQueryHoverMenu = window.matchMedia('(min-width: 1024px)');
    let menuHeight = 0;
    if (mediaQueryHoverMenu.matches) {
        menuHeight = 80;
    }
    else {
        menuHeight = 50;
    }

    // Pin MENU on a TOP with passive event listener
    const pinMenu = () => {
        if (window.pageYOffset > menuHeight && !componentMenu.hasClass('mobile_menu_open')){
            componentMenu.addClass('fixing_menu');
        }
        else {
            componentMenu.removeClass('fixing_menu');
        }
    };
    pinMenu();
    window.addEventListener('scroll', pinMenu, {passive: true});

    // Hover For DROP-DOWN Sub-Menu in COMMON MENU only if screen size more than 1024px includes
    if (mediaQueryHoverMenu.matches) {
        $('.nav_menu ul li.nav_link a p, .nav_menu ul li.nav_link a .nav_link_pin').mouseenter(function (e) {
            const currLink = $(e.target.closest('li.nav_link'));
            currLink.find('p:first').css({'color': '#eac15a'});
            currLink.find('.underline').css({'left': '0'});
            currLink.find('.nav_link_arrow_left').css({
                'background-color': '#eac15a',
                'transform-origin': 'center center',
                'transform': 'rotate(-45deg)'
            });
            currLink.find('.nav_link_arrow_right').css({
                'background-color': '#eac15a',
                'transform-origin': 'center center',
                'transform': 'rotate(45deg)'
            });
            currLink.find('ul.sub-menu').slideDown(500);
        });
        $('.nav_menu ul li.nav_link').mouseleave(function (e) {
            const currLink = $(e.target.closest('li.nav_link'));
            currLink.find('p').not('.menu_current_item p').css({'color': '#fff'});
            currLink.find('.underline').css({'left': '-500%'});
            currLink.find('.nav_link_arrow_left').css({
                'background-color': '#fff',
                'transform-origin': 'center center',
                'transform': 'rotate(45deg)'
            });
            currLink.find('.nav_link_arrow_right').css({
                'background-color': '#fff',
                'transform-origin': 'center center',
                'transform': 'rotate(-45deg)'
            });
            $('ul.sub-menu').slideUp(500);
        });
    }

    /************************************************************************************/
    /***************************************** MOBILE MENU ******************************/
    /************************************************************************************/


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
    $('.head_menu_icon').click(function () {
        componentMenu.toggleClass('mobile_menu_open');
    });


    // Button UP
    $('footer').append('<div class="up_btn"></div>');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.up_btn').css({ 'bottom': '-120px', 'right': '-120px'});
        } else {
            $('.up_btn').css({ 'bottom': '-220px', 'right': '-220px'});
        }
    });
    $('.up_btn').on('click',function() {
        $('html, body').animate({ scrollTop: 0 }, 500);
        return false;
    });

    // Open full description-text (in section description)
    $('.common_description').click(function (e) {
        const curTarget = $(e.target).attr('class');
        const curItem = $(e.target.closest('.common_description_item'));
        const changeClass = curItem.find('.common_description_text_readMore');
        const changeText = curItem.find('.common_description_text_note');
        if (curTarget !== 'arrow-text-left' && curTarget !== 'arrow-text-right' && curTarget !== 'common_description_text_open' ) { return false; }
        curItem.find('.common_description_text_full').slideToggle();
        changeClass.toggleClass('open_full_text');
        if (changeClass.is('.open_full_text')) {
            changeText.text('Свернуть . . .');
        }
        else {
            changeText.text('Читать делее . . .');
        }
    });

    $('.about_slider').slick({
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        speed: 1000,
        accessibility: false,
        lazyLoad: 'ondemand'
    });

})(jQuery);
