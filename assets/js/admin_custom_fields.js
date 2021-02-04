jQuery(function ($) {

                        /******* Addable Photo Fields *******/
    if ($('.photos_custom_admin_fields').is('#six_photos') && (jQuery('.photos_fields_item').length >= 6)) {
        $('.photos_fields_item_add').css({'background': '#dbe3e2'});
    }
    const photosInAdmin = {
        EVENTS: function() {
            // delete slide images
            $(document).on('click', '.photos_fields_item_delete', function(event) {
                photosInAdmin.UPLOAD_IMG.delete_img(this);
                return false;
                });
            // add slide images
            $(document).on('click', '.photos_fields_item_add', function(event) {
                if ($('.photos_custom_admin_fields').is('#six_photos') && ($('.photos_fields_item').length >= 6)){
                    return false;
                }
                photosInAdmin.UPLOAD_IMG.add_new(this);
                return false;
            });
            },
        UPLOAD_IMG: {
            add_new: function(thisClass) {
                let sendAttachmentToAdmin = wp.media.editor.send.attachment;
                const buttonAdd = $(thisClass);
                wp.media.editor.send.attachment = function(props, attachment) {
                    let newItemHtml = `<div class="photos_fields_item"><img src="` + attachment.url + `" width="150" height="150" alt="Photos image in admin-bar" /><div class="photos_fields_item_delete">Удалить<span class="dashicons dashicons-trash"></span></div><input name="uploadedPhoto[]" type="hidden" value="` + attachment.url + `"></div>`;
                    $('.photos_fields_item_add_wrapper').before(newItemHtml);
                    if ($('.photos_custom_admin_fields').is('#six_photos') && ($('.photos_fields_item').length >= 6)) {
                        $('.photos_fields_item_add').css({'background': '#dbe3e2'});
                    }
                    wp.media.editor.send.attachment = sendAttachmentToAdmin;
                };
                wp.media.editor.open(buttonAdd);
                return false;
            },
            delete_img: function(thisClass) {
                $(thisClass).parent().remove();
                if ($('.photos_custom_admin_fields').is('#six_photos') && ($('.photos_fields_item').length < 6)) {
                    $('.photos_fields_item_add').css({'background': '#16a085'});
                }
            }
        }
    };
    $(document).ready(function() {
        photosInAdmin.EVENTS();
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
    groupCommonValue.not('.school_prices_visible input:first').on('keyup paste', clearingIndividualField);
    function clearingGroupFields () {
        groupCommonValue.not('.school_prices_visible input:first').val(null)
    }
    function clearingIndividualField () {
        amountIndividualParticipant.val(null);
    }

    // Choice of the subscription type
    groupLessonsBtn.click(function (e) {
        if (groupLessonsBtn.hasClass('active_lesson_type')){
            return;
        }
        individualLessonsType.not('.school_prices_visible:first').hide('slow');
        groupLessonsType.slideDown();
        individualLessonsBtn.removeClass('active_lesson_type');
        groupLessonsBtn.addClass('active_lesson_type');
    });
    individualLessonsBtn.click(function (e) {
        if (individualLessonsBtn.hasClass('active_lesson_type')){
            return;
        }
        groupLessonsType.not('.school_prices_visible:first').hide('slow');
        individualLessonsType.slideDown();
        groupLessonsBtn.removeClass('active_lesson_type');
        individualLessonsBtn.addClass('active_lesson_type');
    });


});