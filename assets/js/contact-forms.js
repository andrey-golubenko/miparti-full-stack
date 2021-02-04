jQuery (function ($) {
    'use strict';


/************************************************************************************/
/*********************************** SUBSCRIBE - Form *******************************/
/************************************************************************************/

    const popupInit = $('.subscription_form_popup');
    let selectedItemData;
    popupInit.click ( function (e) {

        // fixing clicked item -> fixing element in which the item is -> find in the element items to retrieve text from them
        let clickedItems = $($(e.target).closest('div.top_of_item')).find('.get_for_form');

       // check of elements.length (from clickedItems) and count of classes for first item in set (1 - in the prices-page, 2 - in the timetable-page)
        // for timetable-page
       if (clickedItems.length === 2 && clickedItems[0].classList.length === 2) {
       // get common class of the items which include in the clicked team from first item in set (<time>)
           const classRelatedClickedItem = $(clickedItems[0]).attr('class').slice(0,11);
       // get all items with common class (<time>) and with text (lessons time)
           const getTime = $('time.' + classRelatedClickedItem);
       // get item with text about day of a week for each item with common class (<time>)
           const getDay = $(getTime).closest('div.timetable_table_day').find('h3.week_day');

       // set in variable text from each pair of time - week_day by iterate sets getTime and getDay
           selectedItemData = 'в группу' + ' *** '+ $(clickedItems[1]).text() +' ***   --->  | ';
           $.each(getTime, function (index, value) {
               selectedItemData += $(getTime[index]).text() + ' - ' + $(getDay[index]).text()  + ' | ';
           });
           selectedItemData = selectedItemData.slice(0, -3) + '.';
       }
       // for price-page
       else if (clickedItems.length === 2) {
           selectedItemData = 'на Групповые занятия - ' + clickedItems.text() + ' в месяц.';
       }
       // for price-page
       else if (clickedItems.length === 1) {
           selectedItemData = 'на Индивидуальные занятия - ' + clickedItems.text() + ' на занятии.';
       }
       // for price-page
       else selectedItemData = 'на Пробное зантяие - бесплатно.';
        return selectedItemData;
    });

    const subscribeForm = $('#add_subscribe');
    const subscribeSubmitBtn = $('#submit_subscribe');

    // Сброс значений полей
    $('#add_subscribe input').on('blur', function () {
        $('#add_subscribe input').removeClass('error');
        $('.error-name,.error-email,.error-phone,.message-success').remove();
        subscribeSubmitBtn.val('Записаться').removeClass('submit_info');
    });


    $(subscribeForm).submit(function (event) {
        event.preventDefault();
        subscribeSubmitBtn.val('Отправляем . . .').addClass('submit_info');
        const dataOfForm = new FormData(add_subscribe);
        dataOfForm.append('action','subscribe_action');
        dataOfForm.append('nonce', subscribe_object.nonce);
        if (selectedItemData) {
            dataOfForm.append('computedData', selectedItemData);
        }

        $.ajax({
            url: subscribe_object.ajaxurl, // object from function.php - the 'gates' to server handler for ajax-request which means (http://...site-url.../wp-include/admin-ajax.php). Then ajax-request redirect to our file-handler.php to actions - wp_ajax_ & wp_ajax_nopriv_ and so on.
            type: "POST",
            data: dataOfForm,
            processData: false,
            contentType: false,
            success: function (response, status, jqXHR) {
                if (response.success === true) {
                    //  On successful sending display message
                    subscribeForm.after('<p class="message-success">' + response.data + '</p>');
                    subscribeSubmitBtn.val('Записаться').removeClass('submit_info');
                    //  On successful sending, reset the field values
                    subscribeForm[0].reset();
                }
                else {
                    // If the fields are not filled, display messages and change the label on the button
                    $.each(response.data, function (key, val) {
                        // noinspection JSJQueryEfficiency
                        $('#subscribe_' + key).addClass('error');
                        // noinspection JSJQueryEfficiency
                        $('#subscribe_' + key).before('<span class="error-' + key + '">' + val + '</span>');
                    });
                    subscribeSubmitBtn.val('Что-то пошло не так . . .').addClass('submit_info');
                }
            },
            error: function (request, status, error) {
                subscribeSubmitBtn.val('Что-то пошло не так . . .').addClass('submit_info');
            }
        });
    });

/************************************************************************************/
/************************************************************************************/

});