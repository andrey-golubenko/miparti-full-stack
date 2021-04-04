(function ($) {
"use strict";

/************ MENU for All-Pages (besides Front-Page) ************/

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


    const componentMenu = $('.head_menu'); // All MENU
    const mediaQueryHoverMenu = window.matchMedia('(min-width: 1024px)');
    let menuHeight = 0;
    if (mediaQueryHoverMenu.matches) {
        menuHeight = 80;
    }
    else {
        menuHeight = 50;
    }

     /* Pin MENU on a TOP with passive event listener */
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

/********************** MOBILE MENU **********************/


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

/********************** BUTTON-UP **********************/

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


    const docRoot = $('html, body'); // Variable for ALL ScrollS to AnchorS


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


    /***     MAP with MouseSpeedTracker, popup & slider     ***/

/******************** PLANETS  *********************/

// Appearance Transforming planets, during Scroll
    const planetsContent = $('.moving_planets_content');
    // Moving planets is available only if screen-size is < 768px and central-planet is Invisible
    const studioPlanetsMediaQuery = window.matchMedia('(min-width: 768px)');
    const centerIsInvisible = $('#content_spheres').offset().top > document.documentElement.clientHeight; // true, if offset.top of central-planet is more than viewport.height of browser window

    if (studioPlanetsMediaQuery.matches && centerIsInvisible) {
        planetsContent.removeClass('running');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                planetsContent.addClass('running');
            }
            else {
                planetsContent.removeClass('running');
            }
        });
    }

    // Scroll from transforming_planets to world_map
    $('.move_to_map, .content_spheres_bottom_right_tooltip').click(function (e) {
        e.preventDefault();
        docRoot.animate({scrollTop: $('#anchor_from_earth').offset().top}, 800);
    });

/************************************************************************************/
/************************************************************************************/




/*** ВСПОМОГАТЕЛЬНЫЙ ОБЪЕКТ с Информацие по странам к Карте ***/
    const countries_obj = {
        all_canada              :{
            slider_page   : 'canada',
            ru_name       : 'в Канаде',
            selector_name : '#canada, #vancouver, #newfoundland, #banks, #prince_patrick, #eglinton, #mackenzie_king, #king_christian, #ellef_ringnes, #amund_ringnes, #axel_heiberg, #victoria, #prince_of_wales, #prescott, #canada, #cornwallis, #bathurst, #devon, #cbaffin, #bylot, #ellesmere, #southhampton, #newfoundland, #baffin',
            image_name    : 'ca.svg',
            color         : '#CC85B8',
        },
        all_usa                 :{
            slider_page   : 'usa',
            ru_name       : 'в США',
            selector_name : '#usa, #alaska, #haida_gwaii',
            image_name    : 'us.svg',
            color         : '#E9B2D1',
        },
        all_bahamas             :{
            slider_page   : 'bahamas',
            ru_name       : 'на Багамах',
            selector_name : '#bimini, #andros, #inagua, #eleuthera, #grand_bahama',
            image_name    : 'bs.svg',
            color         : '#E9B2D1',
        },
        all_dominican           :{
            slider_page   : 'dominican',
            ru_name       : 'в Доминикане',
            selector_name : '#haiti_dominican_border, #domincan_republic, #haiti',
            image_name    : 'dm.svg',
            color         :  '#DC4F70',
        },
        all_panama              :{
            slider_page   : 'panama',
            ru_name       : 'в Панаме',
            selector_name : '#panama',
            image_name    : 'pa.svg',
            color         : '#EF20CD',
        },
        all_barbados            :{
            slider_page   : 'barbados',
            ru_name       : 'на Барбадосе',
            selector_name : '#st_vincent_barbados',
            image_name    : 'bb.svg',
            color         : '#EAE70B',
        },
        uk                      :{
            slider_page   : 'uk',
            ru_name       : 'в Великобритании',
            selector_name : '#britain, #ulster',
            image_name    : 'gb.svg',
            color         : '#B5DFED',
        },
        all_france              :{
            slider_page   : 'france',
            ru_name       : 'во Франции',
            selector_name : '#france, #corsica',
            image_name    : 'fr.svg',
            color         : '#68D2F3',
        },
        all_italy               :{
            slider_page   : 'italy',
            ru_name       : 'в Италии',
            selector_name : '#italy, #sardinia, #sicily',
            image_name    : 'it.svg',
            color         : '#689FD6',
        },
        all_spain               :{
            slider_page   : 'spain',
            ru_name       : 'в Испании',
            selector_name : '#spain, #majorca',
            image_name    : 'es.svg',
            color         : '#B7E1F9',
        },
        all_portugal            :{
            slider_page   : 'portugal',
            ru_name       : 'в Португалии',
            selector_name : '#portugal',
            image_name    : 'pt.svg',
            color         : '#7BA5CC',
        },
        all_germany             :{
            slider_page   : 'germany',
            ru_name       : 'в Германии',
            selector_name : '#germany',
            image_name    : 'de.svg',
            color         : '#86D5DA',
        },
        all_belgium             :{
            slider_page   : 'belgium',
            ru_name       : 'в Бельгии',
            selector_name : '#belgium',
            image_name    : 'be.svg',
            color         : '#8DB2D6',
        },
        all_netherlands         :{
            slider_page   : 'netherlands',
            ru_name       : 'в Нидерландах',
            selector_name : '#netherlands',
            image_name    : 'nl.svg',
            color         : '#80C7E0',
        },
        all_czech               :{
            slider_page   : 'czech',
            ru_name       : 'в Чехии',
            selector_name : '#czech',
            image_name    : 'cz.svg',
            color         : '#97B4D3',
        },
        all_poland              :{
            slider_page   : 'poland',
            ru_name       : 'в Польше',
            selector_name : '#poland',
            image_name    : 'pl.svg',
            color         : '#75D3F3',
        },
        all_ukraine             :{
            slider_page   : 'ukraine',
            ru_name       : 'в Украине',
            selector_name : '#ukraine',
            image_name    : 'ua.svg',
            color         : '#719BD5',
        },
        all_hungary             :{
            slider_page   : 'hungary',
            ru_name       : 'в Венгрии',
            selector_name : '#hungary',
            image_name    : 'hu.svg',
            color         : '#9BADCF',
        },
        all_slovakia            :{
            slider_page   : 'slovakia',
            ru_name       : 'в Словакии',
            selector_name : '#slovakia',
            image_name    : 'sk.svg',
            color         : '#B2E2FA',
        },
        all_bulgaria            :{
            slider_page   : 'bulgaria',
            ru_name       : 'в Болгарии',
            selector_name : '#bulgaria',
            image_name    : 'bg.svg',
            color         : '#7CC6E9',
        },
        all_egypt               :{
            slider_page   : 'egypt',
            ru_name       : 'в Египте',
            selector_name : '#egypt',
            image_name    : 'eg.svg',
            color         : '#FF8700',
        },
        all_turkey              :{
            slider_page   : 'turkey',
            ru_name       : 'в Турции',
            selector_name : '#turkey',
            image_name    : 'tr.svg',
            color         : '#FF8700',
        },
        all_oman                :{
            slider_page   : 'oman',
            ru_name       : 'в Омане',
            selector_name : '#oman',
            image_name    : 'om.svg',
            color         : '#FF8700',
        },
        all_emirates            :{
            slider_page   : 'emirates',
            ru_name       : 'в Ємиратах',
            selector_name : '#emirates',
            image_name    : 'ae.svg',
            color         : '#FF8700',
        },
        all_india               :{
            slider_page   : 'india',
            ru_name       : 'в Индии',
            selector_name : '#india',
            image_name    : 'in.svg',
            color         : '#FF8700',
        },
        all_russia              :{
            slider_page   : 'russia',
            ru_name       : 'в России',
            selector_name : '#russia, #novaya_zemlya_south, #novaya_zemlya_north, #prince_george, #salisbury, #wilczek, #bell, #komsomolets, #october, #bolshevik, #kotelny, #novaya_sibir, #lyakhovsky, #wrangel, #bering_island, #medny, #attu, #paramushir, #onekotan, #sakhalin, #attu, #amchitka, #adak, #umnak, #unalaska, #st_lawrence_island',
            image_name    : 'ru.svg',
            color         : '#FAA43D',
        },
        all_china               :{
            slider_page   : 'china',
            ru_name       : 'в Китае',
            selector_name : '#china',
            image_name    : 'cn.svg',
            color         : '#F26923',
        },
        all_vietnam             :{
            slider_page   : 'vietnam',
            ru_name       : 'во Вьетнаме',
            selector_name : '#vietnam',
            image_name    : 'vn.svg',
            color         : '#DB3727',
        },
        all_thailand            :{
            slider_page   : 'thailand',
            ru_name       : 'в Таиланде',
            selector_name : '#thailand',
            image_name    : 'th.svg',
            color         : '#D73632',
        }
    };

/*** КЛАСС-КОНСТРУКТОР, экземляры которого наблюдают за Каждой страной в Карте ***/

    class HoverIntent {
        constructor({
            sensitivity = 0.1, // скорость ниже 0.1px/ms значит "курсор на элементе"
            interval = 100,    // измеряем скорость каждые 100ms
            elem,
            over,
            out
        }) {
            this.sensitivity = sensitivity;
            this.interval = interval;
            this.elem = elem;
            this.over = over;
            this.out = out;
            // убедится, что "this" сохраняет своё значение для обработчиков.
            this.onMouseMove = this.onMouseMove.bind(this);
            this.onMouseOver = this.onMouseOver.bind(this);
            this.onMouseOut = this.onMouseOut.bind(this);
            this.onScroll = this.onScroll.bind(this);
            // и в функции, измеряющей время (вызываемой из setInterval)
            this.trackSpeed = this.trackSpeed.bind(this);

            elem.addEventListener("mouseover", this.onMouseOver);
            elem.addEventListener("mouseout", this.onMouseOut);
            window.addEventListener("scroll", this.onScroll);
        }
        // при сработке обработчика "scroll" последние положения курсора по X и Y (this.lastY & this.lastX) устанавливаются в  "undefined", что потом срабатывает в условии отображения '.indicator' в методе trackSpeed() ниже (для отсутствия сработки при случайном попадании курсора на эллементы во время скрола).
        onScroll () {
            this.lastY = undefined;
            this.lastX = undefined;
        }
        onMouseOver(event) {
            if (this.isOverElement) {
                // Игнорируем событие над элементом, т.к. мы уже измеряем скорость
                return;
            }
            this.isOverElement = true;
            /* после каждого движения измеряем дистанцию между предыдущими и текущими координатами курсора и если скорость меньше sensivity, то она считается медленной */

            this.prevX = event.pageX;
            this.prevY = event.pageY;
            this.prevTime = Date.now();

            this.elem.addEventListener('mousemove', this.onMouseMove);
            this.checkSpeedInterval = setInterval(this.trackSpeed, this.interval);
        }
        onMouseOut(event) {
            // Если ушли с элемента
            if (!event.relatedTarget || !this.elem.contains(event.relatedTarget)) {
                this.isOverElement = false;
                this.elem.removeEventListener('mousemove', this.onMouseMove);
                clearInterval(this.checkSpeedInterval);
                if (this.isHover) { // Если была остановка движения на элементе и затем уход с него то выполнится нижеследующее
                    if (event.relatedTarget === document.querySelector('.indicator_inner')) { return false; } // Если переход с элемента на индикатор, то ВООБЩЕ ничего на происходит (выходим из ф-ции)
                    else {
                        this.out.call(this.elem);
                        this.isHover = false;
                    }
                }
            }
        }
        onMouseMove(event) {
            this.lastX = event.pageX;
            this.lastY = event.pageY;
            this.lastTime = Date.now();
        }
        trackSpeed(event) {
            let speed;
            if (!this.lastTime || this.lastTime == this.prevTime) {
                speed = 0;          // курсор не двигался
            } else {
                speed = Math.sqrt(
                    Math.pow(this.prevX - this.lastX, 2) +
                    Math.pow(this.prevY - this.lastY, 2)
                ) / (this.lastTime - this.prevTime);
            }

            if (speed < this.sensitivity && this.lastY !== undefined && this.lastX !== undefined) { //при 1-вом (авто)scroll - this.lastY и this.lastX = undefined
                clearInterval(this.checkSpeedInterval);
                this.isHover = true;
                // вызов метода 'over' в кот. при создании экземляра Класса передали действия при наведении на элемент. Присвоение констекста эллемента на за кот. наблюдает экземпляр и передача в 'over' аргументов - координат курсора на странице во время сработки события наведения (для использ. в указан. координат вывода индикатора)
                this.over.call(this.elem, this.lastX, this.lastY);
            } else {
                // скорость высокая, запоминаем новые координаты
                this.prevX = this.lastX;
                this.prevY = this.lastY;
                this.prevTime = this.lastTime;
            }
        }
    }

                    /*** ЕСЛИ МОБИЛЬНОЕ УСТРОЙСТВО - НачалО  ***/
    const siteRootUrl= window.location.origin; //при использовании на продакшене убрать '/miparti/' из адресов ниже
    const loadRoundCountries = window.matchMedia('(max-width: 1023px)');
    if (loadRoundCountries.matches) {
        const roundCountries = document.querySelector('.world_map_countries');
        for (let key in countries_obj){
            const innerRoundCountries = `
                <div class="indicator_inner">
                    <a class="round-countries-ajax-popup" href="${siteRootUrl}/miparti/${countries_obj[key].slider_page}">
                        <img data-lazy="${siteRootUrl}/miparti/wp-content/themes/miparti/assets/images/flags/${countries_obj[key].image_name}" alt="" class="indicator_inner_image">
                    </a>
                    <p class="indicator_inner_country">Мы ${countries_obj[key].ru_name}</p>
                </div>`;
            roundCountries.insertAdjacentHTML('beforeend', innerRoundCountries);
        }
    }
    else
                                /*** ЕСЛИ ЛЕПТОП ***/

/*** ПОЛУЧАЕМ в цикле из ВСПОМОГАТЕЛЬНОГО ОБЪЕКТА все элементы DOM, которые будут отслеживаться экземлюрами класса HoverIntent.
    Там же Создаём НовЫЕ ЭкземлярЫ данного Класса с указанием в каждом новом єкземпляре имя-ключа отслежеваемого элемента DOM из переменной и действий при наведении на элемент, а так же ухода с него  ***/

    for (let key in countries_obj){
        const selectedItem = document.querySelector('#' + key);
        const mouseObserver =  new HoverIntent({
            elem : selectedItem,
            // метод в кот. при создании экземляра Класса передаём действия при наведении на элемент. Аргументы - координаты курсора на странице во время сработки события наведения (для использ. в указании координат вывода индикатора) - полученны из контекста Класса (this.lastX, this.lastY)
            over( _actionPointX, _actionPointY) {
                $('#svg_map path').not(countries_obj[key].selector_name).css('fill', '#000');

                $('.inner-ajax-popup').attr(`href`, `${siteRootUrl}/miparti/${countries_obj[key].slider_page}`).html(`<div class="indicator_inner"><img src="${siteRootUrl}/miparti/wp-content/themes/miparti/assets/images/flags/${countries_obj[key].image_name}" alt="" class="indicator_inner_image"><p class="indicator_inner_country">Мы ${countries_obj[key].ru_name}</p></div>`);
                this.addedHeight = (key === 'all_portugal' || key === 'all_vietnam' || key === 'all_barbados') ? 30 : 0;// тернарный опер-ор (отдел. усл-я для Португалии, Вьетнама, Барбадоса из-за их формы на карте)
                $('#indicator').css({'top': _actionPointY - this.addedHeight + 'px', 'left': _actionPointX + 3 + 'px'}).fadeToggle(300);
            },
            out() {
                $('.inner-ajax-popup').attr(`href`, ``).html('');
                $('#indicator').hide();
                $('#svg_map path').css('fill', '#949494');
                for (let key in countries_obj) { // цикл по данным из доп. объекта
                    $(countries_obj[key].selector_name).css('fill', countries_obj[key].color);
                }
            }
        });
    }

    /*** СОЗДАЁМ Доп. экземляр Класса для Индикатора (всплывает при наведении) ***/
    new HoverIntent({
        sensitivity: 10000,
        elem : indicator,
        over () {},
        out () {
            $('.inner-ajax-popup').attr(`href`, ``).html('');
            $('#indicator').hide();
            $('#svg_map path').css('fill', '#949494');
            for (let key in countries_obj) { // цикл по данным из доп. объекта
                $(countries_obj[key].selector_name).css('fill', countries_obj[key].color);
            }
        },
    });

    /*** Загрузка Контента (ФОТО из Всех Стран к КАРТЕ) и вывод в модальном окне по клику ***/
    $('.simple-ajax-popup, .inner-ajax-popup, .round-countries-ajax-popup ').magnificPopup({
        preloader: false,
        type: 'ajax',
        callbacks: {
            parseAjax: function (mfpResponse) {
                mfpResponse.data = $(mfpResponse.data).find('#move_to_popup');
                console.log('Ajax content loaded:', mfpResponse);
            },
            open: function() {
                docRoot.addClass('magnificPopupNoScroll');
            },
            close: function() {
                docRoot.removeClass('magnificPopupNoScroll');
            }
        },
    });
// ПОСЛЕ загрузки данных с другой страницы подключаем к загруженным данным Слайдер
$(document).ajaxComplete(function (event, request, settings) {
    $('.inner_popup p').slick({
        infinite: true,
        cssEase: 'linear',
        easing: 'linear',
        autoplay: false,
        autoplaySpeed: 2800,
        accessibility: false,
        arrows: true,
        pauseOnHover: false,
        lazyLoad: 'ondemand'
    })
});

                /*** ЕСЛИ МОБИЛЬНОЕ УСТРОЙСТВО - Продолжение (Инициализация Слайдера), только после инициализации на эллементах PO-PUP ***/

    // "ExDynamic import" of Init Adaptive-Slider
    const sliderMediaQueryTablet = window.matchMedia('(max-width: 1023px)');
    const sliderMediaQueryMobile_L = window.matchMedia('(max-width: 900px)');
    const sliderMediaQueryMobile_M = window.matchMedia('(max-width: 690px)');
    const sliderMediaQueryMobile_S = window.matchMedia('(max-width: 470px)');

    const studioPhotosFourAlbums = document.querySelector('#more_than_four_posts'); // for pages 'studio_photos' & 'school_photos' for init slider, when count of albums is more then 4 (four)

    const initialItem =  $('.world_map_countries');

    if (sliderMediaQueryTablet.matches || studioPhotosFourAlbums) {
        if (sliderMediaQueryMobile_L.matches) {
            if (sliderMediaQueryMobile_M.matches) {
                if (sliderMediaQueryMobile_S.matches) {
                    initialItem.slick({
                        infinite: true,
                        speed: 700,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        lazyLoad: 'ondemand'
                    });
                }
                else {
                    initialItem.slick({
                        infinite: true,
                        speed: 700,
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        lazyLoad: 'ondemand'
                    });
                }
            }
            else {
                initialItem.slick({
                    infinite: true,
                    speed: 800,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    lazyLoad: 'ondemand'
                });
            }
        }
        else {
            initialItem.slick({
                infinite: true,
                speed: 1000,
                slidesToShow: 4,
                slidesToScroll: 4,
                lazyLoad: 'ondemand'
            });
        }
    }

                            /*** END OF MAP ***/
})(jQuery);