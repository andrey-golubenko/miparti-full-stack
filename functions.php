<?php
/* ПОДКЛЮЧАЕМ  ТИПЫ ЗАПИСЕЙ 'main_page_slider_left' and 'main_page_slider_right' И КАСТОМНЫЕ ПОЛЯ К НИМ */
require get_template_directory() . '/inc/custom-post-types.php';

/* ПОДКЛЮЧАЕМ НАСТРОЙКУ МЕНЮ */
require get_template_directory() . '/inc/menu.php';

/* ПОДКЛЮЧАЕМ  BREADCRUMBS ОБРАБОТЧИК */
require get_template_directory() . '/inc/breadcrumbs-handler.php';

/* ПОДКЛЮЧАЕМ  КАСТОМАЙЗЕР */
require get_template_directory() . '/inc/customizer.php';

/* ПОДКЛЮЧАЕМ  КАСТОМНЫЕ ПОЛЯ ДЛЯ ЗАПИСЕЙ - ФОТО И ВИДЕО */
require get_template_directory() . '/inc/custom-fields.php';

/* ПОДКЛЮЧАЕМ  ДВЕ ФОРМЫ ОБРАТНОЙ СВЯЗИ И ПОДПИСКИ И ИХ ОБРАБОТЧИКИ */
require get_template_directory() . '/inc/contact-forms.php';

/* ПОДКЛЮЧАЕМ ФОРМУ ПОИСКА ПО САЙТУ И ФУНКЦИИ К НЕЙ  */
require get_template_directory() . '/inc/search-group.php';

// Устанавливаем КОНСТАНТЫ для ПУТЕЙ располоэжения подключаемых файлов стилей и js (чтоб меньше писать), и других файлов из папки 'assets'
define('MIPARTI_THEM_ROOT', get_template_directory_uri());
define('MIPARTI_CSS_DIR', MIPARTI_THEM_ROOT . '/assets/css');
define('MIPARTI_JS_DIR', MIPARTI_THEM_ROOT . '/assets/js');
define('MIPARTI_IMG_DIR', MIPARTI_THEM_ROOT . '/assets/images');

//РАЗРЕШАЕМ ЗАГРУЗКУ ЗАПРЕЩЁННОГО ФОРМАТА ИЗОБРАЖЕНИЙ
add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
    // разрешаем новые типы
    $mimes['svg']  = 'image/svg+xml';
    $mimes['doc']  = 'application/msword';
    $mimes['woff'] = 'font/woff';
    $mimes['webp'] = 'image/webp';
    $mimes['webm'] = 'video/webm';
    // МОЖЕМ отключить имеющиеся - unset( $mimes['mp4a'] );
    return $mimes;
}

# Для SVG Исправление MIME типа для SVG файлов.
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
    // WP 5.1 +
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    else
        $dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );
    // mime тип был обнулен, поправим его
    // а также проверим право пользователя
    if( $dosvg ){
        // разрешим
        if( current_user_can('manage_options') ){

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        // запретим
        else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }
    return $data;
}

// Убираем админ-бар с основной страници
add_filter('show_admin_bar', '__return_false');

/*** ПОДКЛЮЧАЕМ СКРИПТЫ и СТИЛИ  Кастомных Полей в АДМИНКУ ***/
add_action( 'admin_enqueue_scripts', function(){
    wp_enqueue_style('miparti-admin-custom-fields-styles', MIPARTI_CSS_DIR . '/admin_custom_fields.css');
    wp_enqueue_script('miparti-admin-custom-fields-scripts', MIPARTI_JS_DIR . '/admin_custom_fields.js', array('jquery'), false, true);

}, 99 );
/**** Подключаем СТИЛИ и СКРИПТЫ в ШАБЛОНЫ ****/
add_action('wp_enqueue_scripts', 'miparti_media' );
function miparti_media (){

    /*
     *
     * DIFFERENT STYLES FOR DIFFERENT PAGES
     *
     */

    if (is_page_template(array('school-prices.php', 'school-timeTable.php', 'contacts.php' ) ) ) {
        wp_enqueue_style('contact-forms', MIPARTI_CSS_DIR . '/contact-forms-ajax-request.css');
    }

    wp_enqueue_style('miparti-styles', get_stylesheet_uri());

    /** Оставляем JQ (джейквери) вшитую в WP. JQ и jQ-migrate, которые идут с вёрсткой удаляем, чтобы не было конфликта с плагином (jQ-form) при отправке писем из формы обратной связи. **/
    wp_enqueue_script( 'jquery');

    /*
     *
     * DIFFERENT STYLES FOR DIFFERENT PAGES
     *
     */

    wp_enqueue_script('miparti-libs', MIPARTI_JS_DIR . '/libs.min.js', [], null, true);
    if (is_page_template('studio.php')) {
        wp_enqueue_script('world-map', MIPARTI_JS_DIR . '/world_map.js', [], null, true);
    }
    if (is_page_template(array('school-prices.php', 'school-timeTable.php', 'contacts.php' ) ) ){
        wp_enqueue_script('miparti-contact-forms', MIPARTI_JS_DIR . '/contact-forms.js', [], null, true);
        wp_localize_script('miparti-contact-forms', 'subscribe_object',
            array(
                'ajaxurl'   => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( 'subscribe-nonce' ),
            )
        );
    }

    if( is_singular() && comments_open() && (get_option('thread_comments') == 1) ) {
        wp_enqueue_script('comment-reply', '', ['jquery'], '', true);
    }

    wp_enqueue_script('miparti-main', MIPARTI_JS_DIR . '/main.js', [], null, true);

        /*        wp_enqueue_script( 'miparti-comments', MIPARTI_JS_DIR . '/comments.js', ['jquery'], null, true );*/


    //ОТЛЮЧАЕМ Скрипты из header  и ПЕРЕПОДКЛЮЧАЕМ ИХ В footer
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
};



//ДОБОВЛЯЕМ ко ВСЕМ или НЕКОТОРЫМ подключенным СКРИПТАМ отрибут 'deffer' и/или 'async'.
add_filter( 'script_loader_tag', function ( $tag, $handle, $src ){
    //Ко многим подключонным скриптам
    $handlers = ['miparti-main', 'world-map', 'miparti-libs', 'jquery-migrate', 'wp-embed', 'comment-reply', 'miparti-admin', 'miparti-contact-forms'];
    foreach($handlers as $defer_script){
        if( $defer_script === $handle){
            return str_replace( ' src', ' defer src', $tag );
        }
    }
    return $tag;
}, 10, 3 );
// REMOVE EMOJI ICONS (УДАЛИТЬ ИКОНКИ эмоджи ИЗ АДМИНКИ)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
//На ХУК "after_setup_theme - после установки темы" вешаем свою ф-цию в которой находятся ф-ции,  которые
// 1) регистрирует МЕНЮ,
// 2) самостоят. генерирует тег "title" в "header",
// 3) даёт возможность установки картинки в постах, и Т.Д.
add_action('after_setup_theme', 'miparti_after_setup');
function miparti_after_setup (){
    register_nav_menus([
        'front' => 'Для Главной страници',
        'common' => 'Для всех страниц, кроме главной',
    ]);         //регстрация меню
    add_theme_support('title-tag');//самостоят. генерация тега title в header
    add_theme_support('post-thumbnails');//возможность установки картинок во всех типах постов
    set_post_thumbnail_size(740, 400);//размеры картинок для Больш постов
    add_image_size( 'miparti-small-recent-post', 96, 100, true ); //размеры картинок для Малых постов в САЙДБАРЕ
    add_theme_support('html5', array( 'search_form', 'comment-form', 'comment-list', 'gallery', 'caption') ); //Включает поддержку html5 разметки для списка комментариев, формы комментариев, формы поиска, галереи, фигур и т.д. Где нужно включить разметку указывается во втором параметре.
    add_theme_support('post-formats', [ 'aside', 'image', 'video', 'gallery' ]);//Указывает формат посту
}


//УБИРАЕМ НАЗВАНИЕ САЙТА (кот. ф-ция дописывает через тире) из заголовка в header на остальных стрaницах (кроме Главной).
add_filter( 'document_title_parts', function( $parts ){
    if( isset($parts['site']) ) unset($parts['site']);
    return $parts;
});

/**
 * Преобразование HEX в RGB (Для страницы 'school-timeTable' - Расписание : цвет группы)
 *
 * @parm string $hex          Цвет
 * @parm bool $return_string  Результат в виде строки или массива
 * @return array|string|bool  В случаи ошибки false
 */
function hexToRgb($hex, $opacity = false, $return_string = false) {
    $hex = trim($hex, ' #');

    $size = strlen($hex);
    if ($size == 3 || $size == 4) {
        $parts = str_split($hex, 1);
        $hex = '';
        foreach ($parts as $row) {
            $hex .= $row . $row;
        }
    }

    $dec = hexdec($hex);
    $rgb = array();
    if ($size == 3 || $size == 6) {
        $rgb['red']   = 0xFF & ($dec >> 0x10);
        $rgb['green'] = 0xFF & ($dec >> 0x8);
        $rgb['blue']  = 0xFF & $dec;

        if ($return_string && $opacity) {
            return 'rgba(' . implode(',', $rgb) . ',' . $opacity . ')';
        }
        elseif ($return_string) {
            return 'rgb(' . implode(',', $rgb) . ')';
        }

    } elseif ($size == 4 || $size == 8) {
        $rgb['red']   = 0xFF & ($dec >> 0x16);
        $rgb['green'] = 0xFF & ($dec >> 0x10);
        $rgb['blue']  = 0xFF & ($dec >> 0x8);
        $rgb['alpha'] = 0xFF & $dec;

        if ($return_string) {
            $rgb['alpha'] = round(($rgb['alpha'] / (255 / 100)) / 100, 2);
            return 'rgba(' . implode(',', $rgb) . ')';
        } else {
            $rgb['alpha'] = 127 - ($rgb['alpha'] >> 1);
        }
    } else {
        return false;
    }

    return $rgb;
}

// ОБРЕЗКА ТЕКСТА (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
function kama_excerpt( $args = '' ){
    global $post;
    if( is_string($args) )
        parse_str( $args, $args );
    $rg = (object) array_merge( array(
        'maxchar'     => 350,   // Макс. количество символов.
        'text'        => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
        // Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется
        // все до <!--more--> вместе с HTML.
        'autop'       => false,  // Заменить переносы строк на <p> и <br> или нет?
        'save_tags'   => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
        'more_text'   => '', //'Читать далее...', // Текст ссылки `Читать дальше`.
        'ignore_more' => false, // нужно ли игнорировать <!--more--> в контенте
    ), $args );

    $rg = apply_filters( 'kama_excerpt_args', $rg );
    if( ! $rg->text )
        $rg->text = $post->post_excerpt ?: $post->post_content;
    $text = $rg->text;
    // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
    $text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text );
    // убираем шоткоды: [singlepic id=3]. Учитывает markdown
    $text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text );
    $text = trim( $text );

    // <!--more-->
    if( ! $rg->ignore_more  &&  strpos( $text, '<!--more-->') ){
        preg_match('/(.*)<!--more-->/s', $text, $mm );
        $text = trim( $mm[1] );
        $text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
    }
    // text, excerpt, content
    else {
        $text = trim( strip_tags($text, $rg->save_tags) );
        // Обрезаем
        if( mb_strlen($text) > $rg->maxchar ){
            $text = mb_substr( $text, 0, $rg->maxchar );
            $text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1', $text ); // кил последнее слово, оно 99% неполное
            $text .= '&nbsp;&nbsp;<a href="'. get_permalink($post->ID) .'"><b> . . . </b></a>';
        }
    }
    // сохраняем переносы строк. Упрощенный аналог wpautop()
    if( $rg->autop ){
        $text = preg_replace(
            array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
            array('',     '</p><p>',  '<br />', '</p>'),
            $text
        );
    }
    $text = apply_filters( 'kama_excerpt', $text, $rg );
    if( isset($text_append) )
        $text .= $text_append;
    return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
}


//РЕГИСТРАЦИЯ САЙДБАРА
add_action( 'widgets_init', 'miparti_register_widgets' );
function miparti_register_widgets(){
    register_sidebar( array(
        'name'          => sprintf(__('Sidebar %d'), 1 ),
        'id'            => "sidebar_single_blog",
        'description'   => 'Сайдбар для страници отображения одиночных постов',
        'class'         => '',
        'before_widget' => '<div id="%1$s" class="sidebar-box ftco-animate %2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h3>',
        'after_title'   => "</h3>",
    ) );
}






## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0
if( 'disable_gutenberg' ){
    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
    // отключим подключение базовых css стилей для блоков
    // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );
    // Move the Privacy Policy help notice back under the title field.
    add_action( 'admin_init', function(){
        remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
        add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    } );
}
## Удаление файлов license.txt и readme.html для защиты
if( is_admin() && ! defined('DOING_AJAX') ){
    $license_file = ABSPATH .'/license.txt';
    $readme_file = ABSPATH .'/readme.html';
    if( file_exists($license_file) && current_user_can('manage_options') ){
        $deleted = unlink($license_file) && unlink($readme_file);
        if( ! $deleted  )
            $GLOBALS['readmedel'] = 'Не удалось удалить файлы: license.txt и readme.html из папки `'. ABSPATH .'`. Удалите их вручную!';
        else
            $GLOBALS['readmedel'] = 'Файлы: license.txt и readme.html удалены из из папки `'. ABSPATH .'`.';
        add_action( 'admin_notices', function(){  echo '<div class="error is-dismissible"><p>'. $GLOBALS['readmedel'] .'</p></div>'; } );
    }
}
## Полное Удаление версии WP
## Также нужно удалить файл readme.html в корне сайта
remove_action('wp_head', 'wp_generator'); // из заголовка
add_filter('the_generator', '__return_empty_string'); // из фидов и URL
add_filter( 'script_loader_src', 'remove_wp_version_strings' ); // из версий скриптов
add_filter( 'style_loader_src', 'remove_wp_version_strings' ); // из версий стилей
function remove_wp_version_strings( $src ) {
    parse_str( parse_url($src, PHP_URL_QUERY), $query );
    if ( !empty($query['ver']) && $query['ver'] === $GLOBALS['wp_version'] ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
// Изменим вывод ошибок на странице авторизации
add_filter('login_errors', 'login_obscure_func');
function login_obscure_func(){
    return 'Ошибка: вы ввели неправильный логин или пароль.';
}
## ЗАКРОЕМ возможность публикации через xmlrpc.php (через почту)
add_filter('xmlrpc_enabled', '__return_false');


