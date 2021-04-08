<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <link rel="preload" href="<?php echo MIPARTI_THEM_ROOT . '/assets/fonts/Lora-Regular.woff2'?>" as="font" type="font/woff2" crossorigin>
    <?php if (is_page_template('studio.php')) : ?>
        <script type="module" src="<?php echo MIPARTI_JS_DIR . '/modules/studio_module_preload.js'?>"></script>
    <?php elseif (is_page_template('school.php')) : ?>
        <script type="module" src="<?php echo MIPARTI_JS_DIR . '/modules/school_module_preload.js'?>"></script>
    <?php elseif (is_page_template('about.php')) : ?>
        <link rel="preload" href="<?php echo MIPARTI_THEM_ROOT . '/assets/fonts/MarckScript-Regular.woff2'?>" as="font" type="font/woff2" crossorigin>
        <script type="module" src="<?php echo MIPARTI_JS_DIR . '/modules/about_module_preload.js'?>"></script>
    <?php endif; wp_head(); ?>
</head>
<body style="background: #C7C7C7">
<div id="wrapper" class="main_wrapper" style="background: url(<?php echo MIPARTI_IMG_DIR . '/bg_body_optimized.jpg' ?>) no-repeat center/cover;">
    <header>
        <div class="head_menu">
            <div class="logo_and_icons_wrapper">
                <a href="<?php echo HOME_URL_ORIGIN . '/about' ; ?>">
                    <div class="link_about">
                        <p class="link_about_text">О НАС</p>
                        <div class="link_about_icons">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </a>
                <div class="logo">
                    <a href="<?php echo HOME_URL_ORIGIN; ?>">
                        <img class="logo_image" src="<?php echo MIPARTI_IMG_DIR . '/miparti_logo_plus.png' ; ?>" alt="">
                    </a>
                </div>
                <div class="head_menu_icon">
                    <div class="head_menu_icon_content">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <p class="head_menu_icon_text">МЕНЮ</p>
                </div>
            </div>
            <nav class="nav_menu">
                <?php wp_nav_menu([
                    'theme_location'  => 'common',
                    'container'       => false,
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'menu_class'      => '',
                    'depth'           => 0,
                ])
                ?>
            </nav>
        </div>
        <?php
            get_template_part('template-parts/breadcrumbs');
        ?>
    </header>
    <main id="main">
        <hr class="separator"/>