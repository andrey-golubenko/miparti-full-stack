(function ($) {
    'use strict';

    const docRoot = $('html, body'); // Variable for ALL ScrollS to AnchorS

/******* COMMON SCRIPTS for All-Pages (besides Front-Page) *******/

    // Lazy-Load Images
    // all images in HTML must have src=".../placeholder.svg" or src="" (empty) and data-src="./img_address.png"
    function showImages() {
        const images = document.querySelectorAll('[data-src]');
        const clientHeight = document.documentElement.clientHeight;
        for (let img of images) {
            const coord = img.getBoundingClientRect();
            let realSrc = img.dataset.src;
            if (!realSrc) continue;
            if (coord.top > -clientHeight &&
                coord.top < clientHeight * 2 ||
                coord.bottom > -clientHeight &&
                coord.bottom < clientHeight * 2) {
                img.src = realSrc;
                img.dataset.src = '';
            }
        }
    }
        showImages();
    document.addEventListener('scroll', showImages);

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


/*********** MENU for All-Pages (besides Front-Page) **********/

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

    // Hover For DROP-DOWN Sub-Menu in COMMON MENU only if screen size more than 1024px includes and also FOR Front-Page
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
                  currLink.find('p').not('.menu_current_item p').css({'color':'#fff'});
                  currLink.find('.underline').css({'left':'-500%'});
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
        // For Front-Page
        const frontMenuActiveItem = $('.front_nav_menu_content ul li.nav_link a');
        frontMenuActiveItem.mouseenter(function (e) {
            const currLink = $(e.target.closest('li.nav_link'));
            currLink.find('.underline').css({'left': '0'});
        });
        frontMenuActiveItem.mouseleave(function (e) {
            const currLink = $(e.target.closest('li.nav_link'));
            currLink.find('.underline').css({'left':'-500%'});
        });
    }

/*************** MOBILE MENU ***************/

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

/*************************** VIDEO ITEM *******************/

    // magnific-popup Iframe - video YouTube in iframe
    $('.popup-youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        callbacks: { // disable scrolling page, when popup opened
            open: function() {
                docRoot.addClass('magnificPopupNoScroll');
            },
            close: function() {
                docRoot.removeClass('magnificPopupNoScroll');
            }
        },
        removalDelay: 300,
        mainClass: 'mfp-width-zoom',
        preloader: false,
        fixedContentPos: false,
        closeBtnInside: false,
    });

    // magnific-popup Image - Gallery
    $('div[id$="_bottom_images"]').each(function () {
        const videoItemId = parseInt($(this).attr('id'));
        $(`#side_images_${videoItemId}, #${videoItemId}_bottom_images`).magnificPopup({
            type: 'image',
            delegate: 'a',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });

    // Replacing images in mobile video-item
    const videoItemMediaQuery = window.matchMedia('(max-width: 768px)');
    const grandFatherWrappers = document.querySelectorAll('.videos_item_content');
    if (videoItemMediaQuery.matches) {
        for (let bundle of grandFatherWrappers) {
            let movingImageItems = bundle.querySelectorAll('.videos_item_content_images_single');
            let imageItemsNewPlace = bundle.lastElementChild;
            for (let imageItem of movingImageItems) {
                imageItemsNewPlace.prepend(imageItem);
            }
        }
    }
/***************** PHOTO-Albums TABS ********************/

    const photo_albums = $('h2[class*="photos_link_"]');
    const photo_images = $('div[class*="photos_link_"]');

    // Change attributes in 'albums' (li) & photo-images (tab-content) - (div)
    for (let i = 0; photo_albums.length > i; i++) {
        photo_albums.attr("class", function (index, currentValue, value) {
            value = currentValue + i++;
            return value;
        });
        i = 0;
        photo_images.attr("class", function (index, currentValue, value) {
            value = currentValue + i++;
            return value;
        });
    }
    // Get every element from photo-images (tab-content) - (div) for init magnific-popup gallery
    $(photo_images).each(function( index, element ){
    // this - current iterable element from set
        $(this).magnificPopup({
            type: 'image',
            delegate: 'a',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });


/***  IF without DYNAMIC IMPORT of Init Adaptive-Slider then
      Photo-Tabs __ONLY AFTER Initialization Photo Tabs__
      If init this __BEFORE Init. Slider-on-Albums-List __ then will destroy 'click' on Photo-Tabs ***/

    $('.photos_albums h2').click(function(){
        const clickedClass = this.className.slice(0, 21);
        $('div[class*="photos_link_"]').hide();
        $('div.' + clickedClass).fadeIn(500);
        $('.photos_content').css({'opacity' : 1});
        $('.photos_albums h2').removeClass('active_photos_tab');
        $(this).addClass('active_photos_tab');
    });
    $('h2.photos_link_0').click();

/*** IF without DYNAMIC IMPORT of Init Adaptive-Slider then
     Initialization Slider-on-Albums-List __ONLY BEFORE Initialization Photo-Tabs__
     If init this __AFTER Init. Photo-Tabs __ then will destroy 'click' on Photo-Tabs ***/

    // "ExDynamic import" of Init Adaptive-Slider
    const repayPhotos=()=>{$('.slick-arrow').click(function(){$('.photos_content').animate({opacity:.1})});};
    const sliderMediaQueryTablet = window.matchMedia('(max-width: 1023px)');
    const sliderMediaQueryMobile_L = window.matchMedia('(max-width: 900px)');
    const sliderMediaQueryMobile_M = window.matchMedia('(max-width: 690px)');
    const sliderMediaQueryMobile_S = window.matchMedia('(max-width: 470px)');

    const studioPhotosFourAlbums = document.querySelector('#more_than_four_posts'); // for pages 'photos' & 'school_photos' for init slider, when count of albums is more then 4 (four)

    const initialElement = $('.photos_albums');

    if (sliderMediaQueryTablet.matches || studioPhotosFourAlbums) {
        if (sliderMediaQueryMobile_L.matches) {
            if (sliderMediaQueryMobile_M.matches) {
                if (sliderMediaQueryMobile_S.matches) {
                    initialElement.slick({
                        infinite: true,
                        speed: 700,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        lazyLoad: 'ondemand'
                    });
                    repayPhotos();
                }
                else {
                    initialElement.slick({
                        infinite: true,
                        speed: 700,
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        lazyLoad: 'ondemand'
                    });
                    repayPhotos();
                }
            }
            else {
                initialElement.slick({
                    infinite: true,
                    speed: 800,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    lazyLoad: 'ondemand'
                });
                repayPhotos()
            }
        }
        else {
            initialElement.slick({
                infinite: true,
                speed: 1000,
                slidesToShow: 4,
                slidesToScroll: 4,
                lazyLoad: 'ondemand'
            });
            repayPhotos()
        }
    }


/********************* TIME-TABLE ***********************/

    /*
     * Init Slick-Slider (SS) in this way because of the SS destroy any others
     * eventListeners on sliders items, when SS in mode - 'Responsive Display' ChangE
     * its settings according to breakpoints of window size
    */

    const timeTableMediaQuery = window.matchMedia('(min-width: 769px)');
    const timeTableMediaQueryTablet = window.matchMedia('(max-width: 768px) and (min-width: 404px)');
    const timeTableMediaQueryPhone = window.matchMedia('(max-width: 403px)');
    const parentSection = document.querySelector('section.timetable');
    const elemTimeTableSliderInit = $('.timetable_table');
    const timeTablePopupInit = () => {
        $('.subscription_form_popup').magnificPopup({
            type: 'inline',
            callbacks: { // disable scrolling page, when popup opened
                open: function() {
                    docRoot.addClass('magnificPopupNoScroll');
                },
                close: function() {
                    docRoot.removeClass('magnificPopupNoScroll');
                }
            },
        })
    };

    function handleTimetableLaptop(e) {
        const sliderIsElement = parentSection ? parentSection.querySelector('.slick-list') : 0;
        if (e.matches) {
            if (sliderIsElement) {
                elemTimeTableSliderInit.slick('unslick');
                timeTablePopupInit(); // Time-table popup
            }
        }
    }
    timeTableMediaQuery.addListener(handleTimetableLaptop);
    handleTimetableLaptop(timeTableMediaQuery);

    function handleTimeTableTablet(e) {
        const sliderIsElement = parentSection ? parentSection.querySelector('.slick-list') : 0;
        if (e.matches) {
            if (sliderIsElement){
                elemTimeTableSliderInit.slick('unslick');
                elemTimeTableSliderInit.slick({
                    dots: false,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                });
                timeTablePopupInit(); // Time-table popup
            }
            else
            elemTimeTableSliderInit.slick({
                    dots: false,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                });
            timeTablePopupInit(); // Time-table popup
        }
        else {
            if (sliderIsElement) {
                elemTimeTableSliderInit.slick('unslick');
            }

    /***** THIS FUNCTION INITIALIZES POPUP IN PAGE 'School-Prices' TOO *****/

            timeTablePopupInit(); // Time-table popup

        }
    }
    timeTableMediaQueryTablet.addListener(handleTimeTableTablet);
    handleTimeTableTablet(timeTableMediaQueryTablet);

    function handleTimeTablePhone(e) {
        const sliderIsElement = parentSection ? parentSection.querySelector('.slick-list') : 0;
        if (e.matches) {
            if (sliderIsElement) {
                elemTimeTableSliderInit.slick('unslick');
                elemTimeTableSliderInit.slick({
                    dots: false,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                });
                timeTablePopupInit(); // Time-table popup
            }
            else {
                elemTimeTableSliderInit.slick({
                    dots: false,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                });
                timeTablePopupInit(); // Time-table popup
            }
        }
    }
    timeTableMediaQueryPhone.addListener(handleTimeTablePhone);
    handleTimeTablePhone(timeTableMediaQueryPhone);


/************* DANCE_STAGING - scrolling to anchor ***********/

    // Scroll from dance_staging 'menu' items to corresponding video items
    $('.dance_staging_description_pin').click(function (e) {
        const anchorScrollFrom = parseInt($(e.currentTarget).attr('id'));
        const anchorScrollTo = `#scroll_anchor_to_${anchorScrollFrom}`;
        docRoot.animate({scrollTop: $(anchorScrollTo).offset().top - '80'}, 800);
    });
})(jQuery);