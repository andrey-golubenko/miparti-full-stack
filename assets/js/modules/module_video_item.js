
export const replacingItems = function () {

    const videoItemMediaQuery = window.matchMedia('(max-width: 768px)');
    const grandFatherWrappers = document.querySelectorAll('.videos_item_content');
    if (videoItemMediaQuery.matches) {
        for (let bundle of grandFatherWrappers) {
            let movingImageItems = bundle.querySelectorAll('.videos_item_content_images_single');
                // || Array.from(bundle.firstElementChild.lastElementChild.children);
            let imageItemsNewPlace = bundle.lastElementChild;
            for (let imageItem of movingImageItems) {
                imageItemsNewPlace.prepend(imageItem);
            }
        }
    }
};
