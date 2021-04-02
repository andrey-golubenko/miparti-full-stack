<?php

/* В КАСТОМАЙЗЕР ДОБОВЛЯЕМ возмность загрузки кастомных изображений для ШАРОВ для страниц "- Шоу-Балет" и "- Школа Танца" */

add_action( 'customize_register', 'miparti_spheres' );
function miparti_spheres($wp_customize) {
//Вывод в админ. панель изображений ШАРОВ для страниц "Шоу-Балет" и "Школа Танца".

    /*** ПАНЕЛЬ - Шоу-Балет и Школа Танца ***/
    $wp_customize->add_panel('all_spheres', array(
        'title'          => 'Изображения для Планет страниц "Шоу-Балет" и "Школа Танца"',
        'description'    => 'Загрузите Ваши Изображения платен для страниц "Шоу-Балет" и "Школа Танца" :',
        'priority'       => 10,
    ));

    /*** СЕКЦИЯ - Шоу-Балет ***/
    $wp_customize->add_section( 'studio_spheres', array(
        'title'          => 'Изображения для Планет - Шоу-Балет',
        'description'    => 'Загрузите Ваши изображения платен для страницы "Шоу-Балет" :',
        'panel'          => 'all_spheres',
        'priority'       => 10,
    ) );

    /*** ФОТО - Шоу-Балет ***/
    $wp_customize->add_setting ('studio_spheres_photos', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'studio_spheres_photos', array(
        'label'    	=> 'Изображение для Фото :',
        'section'  	=> 'studio_spheres',
        'settings' 	=> 'studio_spheres_photos',
        'mime_type' => 'image',
    ) ) );


    /*** ВИДЕО - Шоу-Балет ***/
    $wp_customize->add_setting ('studio_spheres_videos', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'studio_spheres_videos', array(
        'label'    	=> 'Изображение для Видео :',
        'section'  	=> 'studio_spheres',
        'settings' 	=> 'studio_spheres_videos',
        'mime_type' => 'image',
    ) ) );


    /*** РАЙДЕР - Шоу-Балет ***/
    $wp_customize->add_setting ('studio_spheres_rider', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'studio_spheres_rider', array(
        'label'    	=> 'Изображение для Райдера :',
        'section'  	=> 'studio_spheres',
        'settings' 	=> 'studio_spheres_rider',
        'mime_type' => 'image',
    ) ) );





/*** СЕКЦИЯ - Школа Танца ***/
    $wp_customize->add_section( 'school_spheres', array(
        'title'          => 'Изображения для Планет - Школа Танца',
        'description'    => 'Загрузите Ваши изображения платен для страницы "Школа Танца" :',
        'panel'          => 'all_spheres',
        'priority'       => 20,
    ) );

    /*** ФОТО - Школа Танца ***/
    $wp_customize->add_setting ('school_spheres_photos', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'school_spheres_photos', array(
        'label'    	=> 'Изображение для Фото :',
        'section'  	=> 'school_spheres',
        'settings' 	=> 'school_spheres_photos',
        'mime_type' => 'image',
    ) ) );

    /*** ВИДЕО - Школа Танца ***/
    $wp_customize->add_setting ('school_spheres_videos', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'school_spheres_videos', array(
        'label'    	=> 'Изображение для Видео :',
        'section'  	=> 'school_spheres',
        'settings' 	=> 'school_spheres_videos',
        'mime_type' => 'image',
    ) ) );

    /*** РАСПИСАНИЕ - Школа Танца ***/
    $wp_customize->add_setting ('school_spheres_timeTable', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'school_spheres_timeTable', array(
        'label'    	=> 'Изображение для Расписания :',
        'section'  	=> 'school_spheres',
        'settings' 	=> 'school_spheres_timeTable',
        'mime_type' => 'image',
    ) ) );


    /*** АБОНИМЕНТЫ - Школа Танца ***/
    $wp_customize->add_setting ('school_spheres_prices', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'school_spheres_prices', array(
        'label'    	=> 'Изображение для Абониментов :',
        'section'  	=> 'school_spheres',
        'settings' 	=> 'school_spheres_prices',
        'mime_type' => 'image',
    ) ) );


    /*** ПЕДАГОГИ - Школа Танца ***/
    $wp_customize->add_setting ('school_spheres_educators', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'school_spheres_educators', array(
        'label'    	=> 'Изображение для Педагоги :',
        'section'  	=> 'school_spheres',
        'settings' 	=> 'school_spheres_educators',
        'mime_type' => 'image',
    ) ) );


    /*** ПОСТАНОВКА ТАНЦА - Школа Танца ***/
    $wp_customize->add_setting ('school_spheres_danceStaging', array(
        'default' => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'school_spheres_danceStaging', array(
        'label'    	=> 'Изображение для Постановка Танца :',
        'section'  	=> 'school_spheres',
        'settings' 	=> 'school_spheres_danceStaging',
        'mime_type' => 'image',
    ) ) );

}

