<?php

add_filter('admin_init', 'add_meta_box_photos', 10, 1);
function add_meta_box_photos() {

    add_meta_box('meta_box_dance_staging_menu', 'Виды постановки танца', 'meta_box_dance_staging_menu', 'dance_staging', 'normal', 'high');

    add_meta_box('meta_box_videos_url_and_description', 'Адрес видео и его Описание', 'meta_box_videos_url_and_description', array('videos_studio', 'videos_school', 'dance_staging'), 'normal', 'high');

    add_meta_box('meta_box_all_photos', 'Фотографии для альбома / для видео', 'meta_box_all_photos', array('photos_studio', 'photos_school', 'videos_studio', 'videos_school', 'dance_staging'), 'normal', 'high');

    add_meta_box('meta_box_school_prices', 'Условия абонемента', 'meta_box_school_prices', 'school_prices', 'normal', 'high');

    add_meta_box('meta_box_school_time_table', 'Цвет, время и день занятий группы', 'meta_box_school_time_table', 'school_time_table', 'normal', 'high');

    add_meta_box('meta_box_school_educators', 'Информация о педагоге', 'meta_box_school_educators', 'school_educators', 'normal', 'high');


}

// Custom fields func. in admin-panel for adding Photos in some post-types
function meta_box_all_photos($post) {
    if ((get_post_type($post->ID) === 'photos_studio') || (get_post_type($post->ID) === 'photos_school')) :
    ?>
        <div class="photos_custom_admin_fields">
    <?php
    else :
    ?>
        <div class="photos_custom_admin_fields" id="six_photos">
    <?php
    endif;
            // output of stored "photos"
        $content_array = get_post_meta($post->ID, 'uploadedPhoto',1);
        if (is_array($content_array)) {
            foreach ($content_array as $value) {
                ?>
                <div class="photos_fields_item">
                    <img src="<?php echo $value; ?>" width="150" height="150" alt="Photos image in admin-bar"/>
                    <div class="photos_fields_item_delete">Удалить<span class="dashicons dashicons-trash"></span></div>
                    <input name="uploadedPhoto[]" type="hidden" value="<?php echo $value; ?>">
                </div>
                <?php
            }
        }
        ?>
        <input name="exist_field_check" type="hidden" value="<?php echo true; ?>">
        <div class="photos_fields_item_add_wrapper">
            <div class="photos_fields_item_add">Добавить новую<span class="dashicons dashicons-plus-alt"></span></div>
        </div>
    </div>
            <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

// Custom fields func. in admin-panel for adding Url and Description in video  dance staging post-type
function meta_box_videos_url_and_description ($post) {

    ?>
    <div class="miparti_video_url_and_description">
        <p class="miparti_video_tooltip"> Введите URL-адрес видео с серсива 'YouTube': </p>
        <p class="miparti_video_tooltip_detail">(для этого на сайте "YouTube", над выбранным видео, найти адресную строку браузера, где полностью скопировать URL-адрес, начиная с https://www.youtube.com/watch?v= . . . и так далее до конца строки)</p>
        <input type="text" class="miparti_video_url" placeholder="Пример: https://www.youtube.com/watch?v= . . . и так далее" name="miparti_video[youTube_url]" value="<?php echo esc_url(get_post_meta($post->ID, 'youTube_url', 1)); ?>" />
        <p class="miparti_video_tooltip">Введите Видомое описание видео:</p>
        <textarea type="text" class="miparti_video_description" name="miparti_video[visible_description]" rows="7"><?php echo esc_textarea(get_post_meta($post->ID, 'visible_description', 1)); ?>
        </textarea>
        <p class="miparti_video_tooltip">Введите Скрытое описание видео:</p>
        <textarea type="text" class="miparti_video_description" name="miparti_video[invisible_description]" rows="7"><?php echo esc_textarea(get_post_meta($post->ID, 'invisible_description', 1)); ?>
        </textarea>
        <input type="hidden" name="miparti_video_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    </div>

    <?php

}

// Custom fields func. in admin-panel for adding Pre-Description (anchor in the top of the section) in dance staging post-type
function meta_box_dance_staging_menu ($post) {

    ?>
        <div class="meta_box_dance_staging_menu">
            <p class="dance_staging_menu_tooltip">
                Введите вид танца для постановки:
            </p>
            <textarea type="text" class="dance_staging_menu_item" name="dance_staging" rows="3">
            <?php echo esc_textarea(get_post_meta($post->ID, 'dance_staging', 1)); ?>
            </textarea>
            <input type="hidden" name="dance_staging_field_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        </div>
    <?php
}

// Custom fields func. in admin-panel for adding prices and conditions in school prices post-type
function meta_box_school_prices ($post) {
    ?>
    <p class="type_lessons_tooltip"> Выберете вид абонимента :</p>
    <div class="school_prices_type_lessons">
        <button class="group_lessons" type="button">Групповой Абонемент</button>
        <button class="individual_lessons" type="button">Индивидуальный Абонемент</button>
    </div>

    <div class="miparti_school_prices">
        <div class="school_prices_visible school_prices_individual_visible">
            <p class="miparti_prices_tooltip">Введите стомость одного занятия&nbsp;:</p>
            <input type="text" class="miparti_prices_item" name="miparti_prices[one_lesson_price]" value="<?php echo esc_attr(get_post_meta($post->ID, 'one_lesson_price', 1)); ?>" /><span class="miparti_prices_tooltip">гривен за одно знятие.</span>
        </div>

        <div class="school_prices_visible">
            <p class="miparti_prices_tooltip"> Введите количество занятий в месяц для Группового абонемента&nbsp;(1 занятие / 2 занятия / 5 занятий):</p>
            <p class="miparti_prices_tooltip_detail">(если абонемент Индивидуальный, то ничего не вводите)</p>
            <input type="text" class="miparti_prices_item" id="group_lessons_value" name="miparti_prices[lesson_count]" value="<?php echo esc_attr(get_post_meta($post->ID, 'lesson_count', 1)); ?>" /><span class="miparti_prices_tooltip">в месяц.</span>
        </div>

        <div class="school_prices_visible">
            <p class="miparti_prices_tooltip"> Введите общую стоимость Группового абонемента в месяц&nbsp;:</p>
            <p class="miparti_prices_tooltip_detail">(если абонимент Индивидуальный, то ничего не вводите)</p>
            <input type="text" class="miparti_prices_item" name="miparti_prices[per_month_price]" value="<?php echo esc_attr(get_post_meta($post->ID, 'per_month_price', 1)); ?>" /><span class="miparti_prices_tooltip">гривен в месяц.</span>
        </div>

        <div class="school_prices_individual_visible">
            <p class="miparti_prices_tooltip"> Введите количество учасников и их наименование (1 человек / пара / 3 человека и т.д.) для Индивидуального абонемента&nbsp;:</p>
            <p class="miparti_prices_tooltip_detail">(если абонемент Групповой, то ничего не вводите)</p>
            <input type="text" class="miparti_prices_item_exception" id="individual_lessons_value" name="miparti_prices[persons_number]" value="<?php echo esc_attr(get_post_meta($post->ID, 'persons_number', 1)); ?>" />
        </div>

        <input type="hidden" name="miparti_prices_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />

    </div>
    <?php
}

function meta_box_school_time_table ($post) {
    $team_color = get_post_meta($post->ID, 'team_color', 1) ? get_post_meta($post->ID, 'team_color', 1) : '#e30D0D';
    $item_time = get_post_meta($post->ID);

    ?>
    <div class="miparti_time_table">

        <p class="time_table_tooltip">Укажите цвет для группы&nbsp;:</p>
            <label for="team_color" class="item_day_label">
            <input type="color" id="team_color" class="team_color" name="miparti_time_table[team_color]" value="<?php echo $team_color; ?>" />цвет группы</label>

        <p class="time_table_tooltip">Укажите время и дни занятий группы&nbsp;:</p>

            <div class="time_table_item">
            <p>Понедельник :</p>
            <label for="monday_time" class="item_time_label">
            <input type="time" id="monday_time" class="item_time" name="miparti_time_table[monday]" value="<?php echo $item_time['monday'][0]; ?>" />часов : минут</label>
        </div>

        <div class="time_table_item">
            <p>Вторник :</p>
            <label for="tuesday_time" class="item_time_label">
            <input type="time" id="tuesday_time" class="item_time" name="miparti_time_table[tuesday]" value="<?php echo $item_time['tuesday'][0]; ?>" />часов : минут</label>
        </div>

        <div class="time_table_item">
            <p>Среда :</p>
            <label for="wednesday_time" class="item_time_label">
            <input type="time" id="wednesday_time" class="item_time" name="miparti_time_table[wednesday]" value="<?php echo $item_time['wednesday'][0]; ?>" />часов : минут</label>
        </div>

        <div class="time_table_item">
            <p>Четверг :</p>
            <label for="thursday_time" class="item_time_label">
            <input type="time" id="thursday_time" class="item_time" name="miparti_time_table[thursday]" value="<?php echo $item_time['thursday'][0]; ?>" />часов : минут</label>
        </div>

        <div class="time_table_item">
            <p>Пятница :</p>
            <label for="friday_time" class="item_time_label">
            <input type="time" id="friday_time" class="item_time" name="miparti_time_table[friday]" value="<?php echo $item_time['friday'][0]; ?>" />часов : минут</label>
        </div>

        <div class="time_table_item">
            <p>Суббота :</p>
            <label for="saturday_time" class="item_time_label">
            <input type="time" id="saturday_time" class="item_time" name="miparti_time_table[saturday]" value="<?php echo $item_time['saturday'][0]; ?>" />часов : минут</label>
        </div>


        <input type="hidden" name="miparti_time_table_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />

    </div>
    <?php
}
// Custom fields func. in admin-panel for adding groups in school time-table post-type

// Custom fields func. in admin-panel for adding Url and Description in video  dance staging post-type
function meta_box_school_educators ($post) {

    ?>
    <div class="miparti_video_url_and_description">

        <p class="miparti_video_tooltip">Введите Видомую информацию о педагоге:</p>
        <textarea type="text" class="miparti_video_description" name="miparti_educators[visible_description]" rows="7"><?php echo esc_textarea(get_post_meta($post->ID, 'visible_description', 1)); ?>
        </textarea>
        <p class="miparti_video_tooltip">Введите Скрытую информацию о педагоге:</p>
        <textarea type="text" class="miparti_video_description" name="miparti_educators[invisible_description]" rows="7"><?php echo esc_textarea(get_post_meta($post->ID, 'invisible_description', 1)); ?>
        </textarea>

          <p class="miparti_video_tooltip"> Введите URL-адрес аккаунта педагога 'Facebook': </p>
        <input type="text" class="miparti_video_url"  name="miparti_educators[facebook_url]" value="<?php echo esc_url(get_post_meta($post->ID, 'facebook_url', 1)); ?>" />
          <p class="miparti_video_tooltip"> Введите URL-адрес аккаунта педагога 'Instagram': </p>
        <input type="text" class="miparti_video_url"  name="miparti_educators[instagram_url]" value="<?php echo esc_url(get_post_meta($post->ID, 'instagram_url', 1)); ?>" />
          <p class="miparti_video_tooltip"> Введите URL-адрес аккаунта педагога 'YouTube': </p>
        <input type="text" class="miparti_video_url"  name="miparti_educators[youTube_url]" value="<?php echo esc_url(get_post_meta($post->ID, 'youTube_url', 1)); ?>" />
        <input type="hidden" name="educators_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    </div>

    <?php

}

// включаем обновление полей при сохранении
add_action('save_post', 'miparti_uploadedPhoto_update', 0);
add_action('save_post', 'miparti_video_description_update', 0);
add_action('save_post', 'miparti_dance_staging_update', 0);
add_action('save_post', 'miparti_school_prices_update', 0);
add_action('save_post', 'miparti_school_time_table_update', 0);
add_action('save_post', 'miparti_school_educators_update', 0);
/* Сохраняем данные, при сохранении поста */
function miparti_uploadedPhoto_update($post_id) {
    //var_dump($_POST);
    if ($_POST['exist_field_check']) { // checking if this field is a field for uploading photos, since when removing in 'js' the components of this field with the 'uploadedPhoto' key, it is impossible to check this using this key. Therefore, an additional field with the key 'exist_field_check' is set for this check.

        if (!wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
        ||  wp_is_post_autosave( $post_id )
        ||  wp_is_post_revision( $post_id )
        ) { return false; }

        /*** Все ОК! Теперь, нужно сохранить/удалить данные ***/
        if ($_POST['uploadedPhoto']) {
            foreach ($_POST['uploadedPhoto'] as $key => $value) {
                if (isset($value)) {
                    update_post_meta($post_id, 'uploadedPhoto', $_POST['uploadedPhoto']);
                }
                else {
                    delete_post_meta($post_id, $key);
                }
            }
        }
        elseif (!$_POST['uploadedPhoto'] && $_POST['exist_field_check']) {
            delete_post_meta($post_id, 'uploadedPhoto');
        }
        return $post_id;
    }
    return false;
}

function miparti_video_description_update ($post_id) {
    if ($_POST['miparti_video']) {
        if (
            empty($_POST['miparti_video'])
        || !wp_verify_nonce($_POST['miparti_video_fields_nonce'], __FILE__)
        ||  wp_is_post_autosave( $post_id )
        ||  wp_is_post_revision( $post_id )
        ) { return false; }

        /*** Все ОК! Теперь, нужно сохранить/удалить данные ***/
		$_POST['miparti_video'] = array_map( 'sanitize_textarea_field', $_POST['miparti_video'] ); // чистим все данные от пробелов по краям

            foreach ($_POST['miparti_video'] as $key => $value) {
                if( empty($value) ){
                    delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
				continue;
			}
			    update_post_meta( $post_id, $key, $value );
            }
        return $post_id;
    }
        return false;
}

function miparti_dance_staging_update ($post_id) {
     if ($_POST['dance_staging']) {
        if (
            empty($_POST['dance_staging'])
        || !wp_verify_nonce($_POST['dance_staging_field_nonce'], __FILE__)
        ||  wp_is_post_autosave( $post_id )
        ||  wp_is_post_revision( $post_id )
        ) { return false; }

        /*** Все ОК! Теперь, нужно сохранить/удалить данные ***/
		//$_POST['dance_staging'] = array_map( 'sanitize_textarea_field', $_POST['dance_staging'] ); // чистим все данные от пробелов по краям


                if (isset($_POST['dance_staging'])) {
                    update_post_meta($post_id, 'dance_staging', $_POST['dance_staging']);
                }
                else {
                    delete_post_meta($post_id, 'dance_staging');
                }

        return $post_id;
    }
        return false;
}

function miparti_school_prices_update ($post_id) {
    if ($_POST['miparti_prices']) {
        if (
            empty($_POST['miparti_prices'])
        || !wp_verify_nonce($_POST['miparti_prices_nonce'], __FILE__)
        ||  wp_is_post_autosave( $post_id )
        ||  wp_is_post_revision( $post_id )
        ) { return false; }

        /*** Все ОК! Теперь, нужно сохранить/удалить данные ***/
		$_POST['miparti_prices'] = array_map( 'sanitize_text_field', $_POST['miparti_prices'] ); // чистим все данные от пробелов по краям

            foreach ($_POST['miparti_prices'] as $key => $value) {
                if( empty($value) ){
                    delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
				continue;
			}
			    update_post_meta( $post_id, $key, $value );
            }
        return $post_id;
    }
        return false;
}

function miparti_school_time_table_update ($post_id) {
    //var_dump($_POST);
    $miparti_time_table = $_POST['miparti_time_table'];
    if ($miparti_time_table) {
        if (
            empty($miparti_time_table)
        || !wp_verify_nonce($_POST['miparti_time_table_nonce'], __FILE__)
        ||  wp_is_post_autosave( $post_id )
        ||  wp_is_post_revision( $post_id )
        ) { return false; }

        foreach ($miparti_time_table as $key => $value) {
            if(empty($value)){
                delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
                continue;
            }

            else {update_post_meta( $post_id, $key, $value );}
        }
        return $post_id;
    }
        return false;
}

function miparti_school_educators_update ($post_id) {
    //var_dump($_POST);
    $miparti_educators = $_POST['miparti_educators'];
    if ($miparti_educators) {
        if (
            empty($miparti_educators)
        || !wp_verify_nonce($_POST['educators_fields_nonce'], __FILE__)
        ||  wp_is_post_autosave( $post_id )
        ||  wp_is_post_revision( $post_id )
        ) { return false; }

        $miparti_educators = array_map( 'sanitize_textarea_field', $_POST['miparti_educators'] );

        foreach ($miparti_educators as $key => $value) {
            if(empty($value)){
                delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
                continue;
            }

            else {update_post_meta( $post_id, $key, $value );}
        }
        return $post_id;
    }
        return false;
}



//МЕНЯЕМ плейсхолдер в поле 'title' админки в КАСТОМНЫХ ТИПАХ ПОСТОВ.
add_filter( 'enter_title_here', 'enter_title_here', 10, 2 );
function enter_title_here( $text, $post ) {
	if ( $post->post_type === 'photos_studio' || $post->post_type === 'photos_school' || $post->post_type === 'videos_studio' || $post->post_type === 'videos_school' || $post->post_type === 'dance_staging' || $post->post_type === 'school_prices' || $post->post_type === 'school_time_table' || $post->post_type === 'school_educators') {
		$text = 'Добавить название';
	}
	return $text;
}
