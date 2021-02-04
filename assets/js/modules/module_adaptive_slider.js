
export const adaptiveSlider = function (itemSliderInit) {
    const sliderMediaQueryTablet = window.matchMedia('(max-width: 1023px)');
    const sliderMediaQueryMobile_L = window.matchMedia('(max-width: 900px)');
    const sliderMediaQueryMobile_M = window.matchMedia('(max-width: 690px)');
    const sliderMediaQueryMobile_S = window.matchMedia('(max-width: 470px)');

    const studioPhotosFourAlbums = document.querySelector('#more_than_four_posts'); // for pages 'studio_photos' & 'school_photos' for init slider, when count of albums is more then 4 (four)

    if (sliderMediaQueryTablet.matches || studioPhotosFourAlbums) {
        if (sliderMediaQueryMobile_L.matches) {
            if (sliderMediaQueryMobile_M.matches) {
                if (sliderMediaQueryMobile_S.matches) {
                    jQuery(itemSliderInit).slick({
                        infinite: true,
                        speed: 700,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    });
                    return;
                }
                jQuery(itemSliderInit).slick({
                    infinite: true,
                    speed: 700,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                });
                return;
            }
            jQuery(itemSliderInit).slick({
                infinite: true,
                speed: 800,
                slidesToShow: 3,
                slidesToScroll: 3,
            });
            return;
        }
        jQuery(itemSliderInit).slick({
            infinite: true,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 4,
        });
    }
};
