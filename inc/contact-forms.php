<?php

/* ОБРАБОТКА скрипта ФОРМЫ-подписки */

if (wp_doing_ajax()) { // подключаем хуки, только во время AJAX запроса
    add_action( 'wp_ajax_subscribe_action', 'ajax_action_callback' );
    add_action( 'wp_ajax_nopriv_subscribe_action', 'ajax_action_callback' );
}


function ajax_action_callback() {

// Массив ошибок
    $err_message = array();
// Проверяем nonce. Если проверкане прошла, то блокируем отправку
    if ( ! wp_verify_nonce( $_POST['nonce'], 'subscribe-nonce' ) ) {
        wp_die( 'Данные отправлены с левого адреса' );
    }
// Проверяем на спам. Если скрытое поле заполнено или снят чек, то блокируем отправку
    if ( false === $_POST['subscribe_anticheck'] || ! empty( $_POST['subscribe_submitted'] ) ) {
        wp_die( 'Пошел нахрен, мальчик!(c)' );
    }
// Проверяем поле имени, если пустое, то пишем сообщение в массив ошибок
    if ( empty( $_POST['subscribe_name'] ) || ! isset( $_POST['subscribe_name'] ) ) {
        $err_message['name'] = 'Пожалуйста, введите Ваше имя.';
    } else {
        $subscribe_name = sanitize_text_field( $_POST['subscribe_name'] );
    }
// Проверяем поле номера телефона, если пустое, то пишем сообщение в массив ошибок
    if ( empty( $_POST['subscribe_phone'] ) || ! isset( $_POST['subscribe_phone'] ) ) {
        $err_message['phone'] = 'Пожалуйста, введите Ваш номер телефона.';
    } else {
        $telegram_phone = rawurlencode(': ' . sanitize_text_field( $_POST['subscribe_phone'] )); // for upload number with '+'
        $email_phone = sanitize_text_field( $_POST['subscribe_phone'] );
    }
// Проверяем поле емайла, если не пустое и некоректное, то пишем сообщение в массив ошибок
    if ( $_POST['subscribe_email'] !== '' && !preg_match( '/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i', $_POST['subscribe_email'] ) ) {
        $err_message['email'] = 'Адрес электронной почты некорректен.';
    } else {
        $subscribe_email = ($_POST['subscribe_email'] !== '' ) ? sanitize_email( $_POST['subscribe_email'] ) : 'Не указан.';
    }

// В поле темы письма, пишем сообщение по умолчанию
    $telegram_message = "Хочу записаться " . sanitize_text_field( $_POST['computedData'] ) . "%0A" . "Пожалуйста, свяжитесь со мной.";

    $email_message = "Хочу записаться " . sanitize_text_field( $_POST['computedData'] ) . " Пожалуйста, свяжитесь со мной.";

// В поле темы письма, пишем сообщение по умолчанию
    $subscribe_subject = 'Хочу записаться на занятие !';

// Переменные для Telegram

// Проверяем массив ошибок, если не пустой, то передаем сообщение. Иначе отправляем письмо
    if ( $err_message ) {
        wp_send_json_error( $err_message );
    }
    else {

        /***** ОТПРАВКА СООБЩЕНИЯ В ТЕЛЕГРАМ *****/

        /** Для получения ID чата в адресной строке браузера набираем
        https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее   **/
        // Токен Telegram-bot
        $token = "1557555705:AAF85z6TR9obF_W37VtKVYkCpNHfT8JMq-g";
        // ID чата Telegram в который Telegram-bot отправляет собщения с сайта
        $chat_id = "-269508419";
        $message_data = array(
            "Имя: "       => $subscribe_name,
            "Телефон"     => $telegram_phone, // colon see in definition of $telegram_phone
            "Email: "     => $subscribe_email,
            "Сообщение: " => $telegram_message
        );

        $message_txt = null;
        foreach($message_data as $key => $value) {
            $message_txt .= "<b>".$key."</b>".$value."%0A";
        };

        $sendToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message_txt}");



        /***** ОТПРАВКА СООБЩЕНИЯ НА ПОЧТУ *****/

// Указываем адресат
        $email_to = '';
// Если адресат не указан, то берем данные из настроек сайта
        if ( ! $email_to ) {
            $email_to = get_option( 'admin_email' );
        }
        $body    = "Имя: $subscribe_name\nСообщение: $email_message\nТелефон: $email_phone\nEmail: $subscribe_email";
        $headers = 'From: ' . $subscribe_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email_to;
// Отправляем письмо
        wp_mail( $email_to, $subscribe_subject, $body, $headers );
// Отправляем сообщение об успешной отправке
        $message_success = 'Собщение отправлено. <br> В ближайшее время Мы свяжимся с Вами.';
        wp_send_json_success( $message_success );

// На всякий случай убиваем еще раз процесс ajax
        wp_die();
    }
}