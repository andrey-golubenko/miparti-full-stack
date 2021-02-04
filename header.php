<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MIPARTI</title>
    <?php wp_head(); ?>
</head>
<body>
<div id="wrapper" class="main_wrapper" style="background: url(<?php echo MIPARTI_IMG_DIR . '/bg_body.jpg' ?>) no-repeat center/cover;">
    <header>
        <div class="head_menu">
            <div class="logo_and_icons_wrapper">
                <a href="<?php echo home_url() . '/about' ; ?>">
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
                    <a href="<?php echo home_url(); ?>">
                        <img class="logo_image" src="<?php echo MIPARTI_IMG_DIR . '/miparti_logo_plus.png' ; ?>" alt="Miparti Company">
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
            if( is_archive() ){
                get_template_part('template-parts/breadcrumbs-archive');
            }
            else get_template_part('template-parts/breadcrumbs');
        ?>
    </header>
    <main id="main">
        <hr class="separator"/>