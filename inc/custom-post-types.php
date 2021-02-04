<?php	/* РЕГИСТРИРУЕМ типы ПОСТОВ для ввывода
		 * 1) СЛAЙДОВ ГЛАВНОЙ СТРАНИЦЫ ЛевыХ
	     * 2) СЛAЙДОВ ГЛАВНОЙ СТРАНИЦЫ ПравыХ
	     * 3) СЛAЙДОВ ГЛАВНОЙ СТРАНИЦЫ МобильныХ
	     * 4) ФОТО   ШОУ-БАЛЕТ
	     * 5) ВИДЕО  ШОУ-БАЛЕТ
	     * 4) ФОТО   ШКОЛА
	     * 5) ВИДЕО  ШКОЛА
	     *
		 *  */
add_action( 'init', function (){
	register_post_type('front_slider_left', array(
        'label'  => null,
		'labels' => array(
			'name'          => 'Фото Левой части Главной страницы', //основное название для типа записи
			'singular_name' => 'Фото Левой части Главной страницы', //назван для одной записи
			'add_new'       => 'Добавить новое Фото', // для добавления новой записи
			'add_new_item'  => 'Добавление нового фото', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'     => 'Редактирование фото', // для редактирования типа записи
			'view_item'     => 'Просмотр фото Левой части Главной страницы', // для просмотра записи этого типа.
			'search_items'  => 'Искать Фото', // для поиска по этим типам записи
			'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
			'menu_name'     => 'Фото Левой части Главной страницы', // название меню
            'all_items'    => 'Все Фото Левой части Главной страницы', // Все записи. По умолчанию равен menu_name
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false,
		'menu_icon'          => 'dashicons-table-col-before',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'            => ['title', 'thumbnail', 'revisions'],
	) );
	register_post_type('front_slider_right', array(
        'label'  => null,
		'labels' => array(
			'name'          => 'Фото Правой части Главной страницы', //основное название для типа записи
			'singular_name' => 'Фото Правой части Главной страницы', //назван для одной записи
			'add_new'       => 'Добавить новое Фото', // для добавления новой записи
			'add_new_item'  => 'Добавление нового фото', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'     => 'Редактирование фото', // для редактирования типа записи
			'view_item'     => 'Просмотр фото', // для просмотра записи этого типа.
			'search_items'  => 'Искать фото', // для поиска по этим типам записи
			'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
			'menu_name'     => 'Фото Правой части Главной страницы', // название меню
            'all_items'     => 'Все Фото Правой части Главной страницы', // Все записи. По умолчанию равен menu_name
        ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false,
		'menu_icon'          => 'dashicons-table-col-after',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'            => ['title', 'thumbnail', 'revisions'],
	) );
	register_post_type('front_slider_center', array(
        'label'  => null,
		'labels' => array(
			'name'          => 'Фото Мобильной Главной страницы', //основное название для типа записи
			'singular_name' => 'Фото Мобильной Главной страницы', //назван для одной записи
			'add_new'       => 'Добавить новое Фото', // для добавления новой записи
			'add_new_item'  => 'Добавление нового фото', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'     => 'Редактирование фото', // для редактирования типа записи
			'view_item'     => 'Просмотр фото', // для просмотра записи этого типа.
			'search_items'  => 'Искать фото', // для поиска по этим типам записи
			'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
			'menu_name'     => 'Фото Мобильной Главной страницы', // название меню
            'all_items'     => 'Все Фото Мобильной Главной страницы', // Все записи. По умолчанию равен menu_name
        ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false,
		'menu_icon'          => 'dashicons-table-col-delete',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'            => ['title', 'thumbnail', 'revisions'],
	) );
	register_post_type('photos_studio', array(
        'label'  => null,
		'labels' => array(
			'name'          => 'Фото-Альбомы Шоу-Балет', //основное название для типа записи
			'singular_name' => 'Фото-Альбом Шоу-Балет', //назван для одной записи
			'add_new'       => 'Добавить новый Фото-Альбом', // для добавления новой записи
			'add_new_item'  => 'Добавление нового Фото-Альбома', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'     => 'Редактирование Фото-Альбома', // для редактирования типа записи
			'view_item'     => 'Просмотр Фото-Альбома', // для просмотра записи этого типа.
			'search_items'  => 'Искать Фото-Альбом', // для поиска по этим типам записи
			'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
			'menu_name'     => 'Фото-Альбомы Шоу-Балет', // название меню
            'all_items'     => 'Все Фото-Альбомы Шоу-Балет', // Все записи. По умолчанию равен menu_name
        ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false,
		'menu_icon'          => 'dashicons-camera-alt',
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'            => ['title', 'thumbnail', 'revisions'],
	) );
    register_post_type('photos_school', array(
        'label'  => null,
        'labels' => array(
            'name'          => 'Фото-Альбомы Школа Танца', //основное название для типа записи
            'singular_name' => 'Фото-Альбом Школа Танца', //назван для одной записи
            'add_new'       => 'Добавить новый Фото-Альбом', // для добавления новой записи
            'add_new_item'  => 'Добавление нового Фото-Альбома', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'     => 'Редактирование Фото-Альбома', // для редактирования типа записи
            'view_item'     => 'Просмотр Фото-Альбома', // для просмотра записи этого типа.
            'search_items'  => 'Искать Фото-Альбом', // для поиска по этим типам записи
            'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
            'menu_name'     => 'Фото-Альбомы Школа Танца', // название меню
            'all_items'     => 'Все Фото-Альбомы Школа Танца', // Все записи. По умолчанию равен menu_name
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'menu_icon'          => 'dashicons-camera-alt',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'            => ['title', 'thumbnail', 'revisions'],
    ) );
    register_post_type('videos_studio', array(
        'label'  => null,
        'labels' => array(
            'name'          => 'Видео Шоу-Балет', //основное название для типа записи
            'singular_name' => 'Видео Шоу-Балет', //назван для одной записи
            'add_new'       => 'Добавить новое Видео', // для добавления новой записи
            'add_new_item'  => 'Добавление нового Видео', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'     => 'Редактирование Видео', // для редактирования типа записи
            'view_item'     => 'Просмотр Видео', // для просмотра записи этого типа.
            'search_items'  => 'Искать Видео', // для поиска по этим типам записи
            'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
            'menu_name'     => 'Видео Шоу-Балет', // название меню
            'all_items'     => 'Все Видео Шоу-Балет', // Все записи. По умолчанию равен menu_name
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'menu_icon'          => 'dashicons-format-video',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'            => ['title', 'thumbnail', 'revisions'],
    ) );
    register_post_type('videos_school', array(
        'label'  => null,
        'labels' => array(
            'name'          => 'Видео Школа Танца', //основное название для типа записи
            'singular_name' => 'Видео Школа Танца', //назван для одной записи
            'add_new'       => 'Добавить новое Видео', // для добавления новой записи
            'add_new_item'  => 'Добавление нового Видео', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'     => 'Редактирование Видео', // для редактирования типа записи
            'view_item'     => 'Просмотр Видео', // для просмотра записи этого типа.
            'search_items'  => 'Искать Видео', // для поиска по этим типам записи
            'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
            'menu_name'     => 'Видео Школа Танца', // название меню
            'all_items'     => 'Все Видео Школа Танца', // Все записи. По умолчанию равен menu_name
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'menu_icon'          => 'dashicons-format-video',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'            => ['title', 'thumbnail', 'revisions'],
    ) );
    register_post_type('dance_staging', array(
        'label'  => null,
        'labels' => array(
            'name'          => 'Постановка танца', //основное название для типа записи
            'singular_name' => 'Постановка танца', //назван для одной записи
            'add_new'       => 'Добавить новую Постановку танца', // для добавления новой записи
            'add_new_item'  => 'Добавление новой Постановки танца', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'     => 'Редактирование Постановки танца', // для редактирования типа записи
            'view_item'     => 'Просмотр Постановки танца', // для просмотра записи этого типа.
            'search_items'  => 'Искать Постановку танца', // для поиска по этим типам записи
            'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
            'menu_name'     => 'Постановка танца', // название меню
            'all_items'     => 'Все Постановки танца', // Все записи. По умолчанию равен menu_name
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'            => ['title', 'thumbnail', 'revisions'],
    ) );
    register_post_type('school_prices', array(
        'label'  => null,
        'labels' => array(
            'name'          => 'Абонементы', //основное название для типа записи
            'singular_name' => 'Абонемент', //назван для одной записи
            'add_new'       => 'Добавить новый Абонемент', // для добавления новой записи
            'add_new_item'  => 'Добавление нового Абонемента', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'     => 'Редактирование Абонемента', // для редактирования типа записи
            'view_item'     => 'Просмотр Абонемента', // для просмотра записи этого типа.
            'search_items'  => 'Искать Абонемент', // для поиска по этим типам записи
            'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
            'menu_name'     => 'Абонементы', // название меню
            'all_items'     => 'Все Абонементы', // Все записи. По умолчанию равен menu_name
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'menu_icon'          => 'dashicons-money-alt',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'            => ['title', 'revisions'],
    ) );
    register_post_type('school_time_table', array(
        'label'  => null,
        'labels' => array(
            'name'          => 'Расписание', //основное название для типа записи
            'singular_name' => 'Группу', //назван для одной записи
            'add_new'       => 'Добавить новую Группу', // для добавления новой записи
            'add_new_item'  => 'Добавление новой Группы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'     => 'Редактирование Группы', // для редактирования типа записи
            'view_item'     => 'Просмотр Группы', // для просмотра записи этого типа.
            'search_items'  => 'Искать Группу', // для поиска по этим типам записи
            'not_found'     => 'Не найдено', // если в результате поиска ничего не было найдено
            'menu_name'     => 'Расписание', // название меню
            'all_items'     => 'Все Группы', // Все записи. По умолчанию равен menu_name
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => false,
        'menu_icon'          => 'dashicons-calendar-alt',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'            => ['title', 'revisions', 'page-attributes'],
    ) );

});



