(function ($) {

                        /******* Addable Photos Fields *******/

    const adminSliderBox = $('#meta_box_sliders');
    const adminPhotosBox = $('.photos_custom_admin_fields');
    const buttonAddImage = $('.photos_fields_item_add');


    // disable 'thumbnail'-panel for post-type 'about_us' in admin
    if (adminSliderBox.length !== 0) {$('#postimagediv').css({'display' : 'none'})}
    if (adminPhotosBox.is('#six_photos') && ($('.photos_fields_item').length >= 6)) {
        buttonAddImage.css({'background': '#dbe3e2'});
    }

    const photosInAdmin = {
        imagesEventsCall: function() {
            // delete slide images
            $(document).on('click', '.photos_fields_item_delete', function(event) {
                photosInAdmin.imagesEvents.deleteImage(this);
                return false;
            });
            // add slide images
            $(document).on('click', '.photos_fields_item_add', function(event) {
                if (adminPhotosBox.is('#six_photos') && ($('.photos_fields_item').length >= 6)){
                    return false;
                }
                photosInAdmin.imagesEvents.addNewImage(this);
                return false;
            });
            // exchange slide images
            $(document).on('click', '.photos_fields_item_exchange', function(event) {
                photosInAdmin.imagesEvents.exchangeImage(this);
                return false;
            });
        },
        imagesEvents: {
            addNewImage: function(thisClass) {
                let sendAttachmentToAdmin = wp.media.editor.send.attachment;
                const buttonAdd = $(thisClass);
                wp.media.editor.send.attachment = function(props, attachment) {
                    let sizeLarge = (attachment.sizes && attachment.sizes.large && attachment.sizes.large.url) ? attachment.sizes.large.url : '';
                    let sizeMedium = (attachment.sizes && attachment.sizes.medium && attachment.sizes.medium.url) ? attachment.sizes.medium.url : '';
                    let newItemContext = `<div class="photos_fields_item"><img src="` + attachment.sizes.thumbnail.url + `" width="150" height="150" alt="Photos image in admin-bar" /><div class="photos_fields_item_delete">Удалить<span class="dashicons dashicons-trash"></span></div><div class="photos_fields_item_exchange">Изменить<span class="dashicons dashicons-update-alt"></span></div><input `;
                    if (adminSliderBox.length !== 0) {
                        newItemContext += `name="slider_photos[]"`;
                    }
                    else {
                        newItemContext += `name="uploadedPhoto[]"`;
                    }
                    newItemContext +=  `type="hidden" value="` + attachment.sizes.thumbnail.url + ` ` + sizeMedium + ` ` + sizeLarge + ` ` + attachment.sizes.full.url + `"></div>`;

                    adminPhotosBox.append(newItemContext);

                    if (adminPhotosBox.is('#six_photos') && ($('.photos_fields_item').length >= 6)) {
                        buttonAddImage.css({'background': '#dbe3e2'});
                    }
                    wp.media.editor.send.attachment = sendAttachmentToAdmin;
                };
                wp.media.editor.open(buttonAdd);
                return false;
            },
            deleteImage: function(thisClass) {
                $(thisClass).closest('.photos_fields_item').remove();

                if (adminPhotosBox.is('#six_photos') && ($('.photos_fields_item').length < 6)) {
                    buttonAddImage.css({'background': '#16a085'});
                }
            },
            exchangeImage : function (thisClass) {
                let sendAttachmentToAdmin = wp.media.editor.send.attachment;
                const buttonExchange = $(thisClass);
                wp.media.editor.send.attachment = function(props, attachment) {
                    let sizeLarge = (attachment.sizes && attachment.sizes.large && attachment.sizes.large.url) ? attachment.sizes.large.url : '';
                    let sizeMedium = (attachment.sizes && attachment.sizes.medium && attachment.sizes.medium.url) ? attachment.sizes.medium.url : '';
                    let exchangeContext = `<div class="photos_fields_item"><img src="` + attachment.sizes.thumbnail.url + `" width="150" height="150" alt="Photos image in admin-bar" /><div class="photos_fields_item_delete">Удалить<span class="dashicons dashicons-trash"></span></div><div class="photos_fields_item_exchange">Изменить<span class="dashicons dashicons-update-alt"></span></div><input `;
                    if (adminSliderBox.length !== 0) {
                        exchangeContext += `name="slider_photos[]"`;
                    }
                    else {
                        exchangeContext += `name="uploadedPhoto[]"`;
                    }
                    exchangeContext +=  `type="hidden" value="` + attachment.sizes.thumbnail.url + ` ` + sizeMedium + ` ` + sizeLarge + ` ` + attachment.sizes.full.url + `"></div>`;
                    $(thisClass).parent().replaceWith(exchangeContext);
                    wp.media.editor.send.attachment = sendAttachmentToAdmin;
                };
                wp.media.editor.open(buttonExchange);
                return false;
            }
        }
    };
    $(document).ready(function() {
        photosInAdmin.imagesEventsCall();
    });


                   /******* Selectable Type of Lessons for school_prices *******/

    const groupLessonsType = $('.school_prices_visible') ;
    const individualLessonsType = $('.school_prices_individual_visible');
    const groupLessonsBtn = $('.group_lessons');
    const individualLessonsBtn = $('.individual_lessons');
    const amountIndividualParticipant = $('#individual_lessons_value');
    const groupCommonValue = $('.school_prices_visible input');

    // Show any type of lessons if fields of this type are set
    if ($('#group_lessons_value').val() !== '') {
        groupLessonsType.show('slow');
        groupLessonsBtn.addClass('active_lesson_type');
    }
    else if (amountIndividualParticipant.val() !== '') {
        individualLessonsType.show('slow');
        individualLessonsBtn.addClass('active_lesson_type');
    }

    // Disable to set fields in same time in Group-subscription and in Individual-subscription
    amountIndividualParticipant.on('keyup paste', clearingGroupFields);
    groupCommonValue.not('.school_prices_visible input:first').on('keyup paste', clearingIndividualFields);
    function clearingGroupFields () {
        groupCommonValue.not('.school_prices_visible input:first').val(null)
    }
    function clearingIndividualFields () {
        amountIndividualParticipant.val(null);
    }

    // Choice of the subscription type
    groupLessonsBtn.click(function () {
        if (groupLessonsBtn.hasClass('active_lesson_type')){
            return;
        }
        individualLessonsType.not('.school_prices_visible:first').hide('slow');
        groupLessonsType.slideDown();
        individualLessonsBtn.removeClass('active_lesson_type');
        groupLessonsBtn.addClass('active_lesson_type');
    });
    individualLessonsBtn.click(function () {
        if (individualLessonsBtn.hasClass('active_lesson_type')){
            return;
        }
        groupLessonsType.not('.school_prices_visible:first').hide('slow');
        individualLessonsType.slideDown();
        groupLessonsBtn.removeClass('active_lesson_type');
        individualLessonsBtn.addClass('active_lesson_type');
    });
})(jQuery);