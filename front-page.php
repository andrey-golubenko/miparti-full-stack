<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MIPARTI</title>
    <?php wp_head(); ?>
</head>
<body>
<?php if (wp_is_mobile()) : ?>
    <div id="wrapper">
        <main id="main">
            <div class="mobile_front_wrapper">
                <section class="mobile_front_menu">
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
                                <a href="<?php echo home_url() ; ?>">
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
                </section>
                <section class="mobile_front_slider">
                    <div class="mobile_front_slider_center">
                        <?php
                        $front_slider_mobile = get_post_meta(576,'slider_photos', 1);
                        foreach ($front_slider_mobile as $value){
                            echo  ' <div>
                                    <img src=" ' . $value . ' " alt="photo front page">
                                    </div> ' ;
                        }
                        ?>
                    </div>
                </section>
                <div class="interactive_studio">
                    <div class="interactive_studio_inner">
                        <a class="direction_item" href="<?php echo home_url() . '/studio' ; ?>">
                            <p>ШОУ-БАЛЕТ</p>
                            <hr>
                        </a>
                    </div>

                </div>
                <div class="interactive_school">
                    <div class="interactive_school_inner">
                        <a class="direction_item" href="<?php echo home_url() . '/school' ; ?> ">
                            <p>ШКОЛА ТАНЦА</p>
                            <hr>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php else : ?>
    <div id="wrapper">
        <main id="main">
            <div class="front_wrapper">
                <section class="sliders">
                    <div class="slider_left">
                    <?php
                        $front_slider_left = get_post_meta(572,'slider_photos', 1);
                    foreach ($front_slider_left as $value){
                        echo  ' <div>
                                    <img src=" ' . $value . ' " alt="photo front page">
                                    </div> ' ;
                    }
                    ?>
                    </div>
                    <div class="slider_right">
                    <?php
                        $front_slider_right = get_post_meta(574,'slider_photos', 1);
                        foreach ($front_slider_right as $value){
                            echo  ' <div>
                                        <img src=" ' . $value . ' " alt="photo front page">
                                        </div> ' ;
                        }
                    ?>
                    </div>
                </section>
                <section class="front_content">
                    <div class="clipboard" style="background: url(<?php echo MIPARTI_IMG_DIR . '/bg_body.jpg' ?>) center/cover;">
                        <img src="<?php echo MIPARTI_IMG_DIR . ' /miparti_logo_plus.png' ?>" alt="Miparti logotype">
                    </div>
                    <div class="btn_push_wrapper">
                        <button class="push btn_menu_active">
                            <span class="small_menu_triangle"></span>
                            <span class="btn_push_text">МЕНЮ</span>
                            <span class="btn_cover_text">&#10006;</span>
                        </button>
                    </div>
                    <div class="front_nav_menu">
                        <nav class="front_nav_menu_content">
                            <?php wp_nav_menu([
                                'theme_location'  => 'front',
                                'container'       => false,
                                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                'menu_class'      => '',
                                'link_after'      => '<span class="underline"></span>',
                                'depth'           => 1,
                            ])
                            ?>
                        </nav>
                    </div>
                </section>
                <div class="interactive_studio">
                    <div class="interactive_studio_inner">
                        <a class="direction_item" href="<?php echo home_url() . '/studio' ; ?>">
                            <p>ШОУ-БАЛЕТ</p>
                            <hr>
                        </a>
                        <a class="direction_item" href="<?php echo home_url() . '/studio' ; ?>">
                            <p>концертные выступления</p>
                        </a>
                    </div>
                </div>
                <div class="interactive_school">
                    <div class="interactive_school_inner">
                        <a class="direction_item" href="<?php echo home_url() . '/school' ; ?>">
                            <p>ШКОЛА ТАНЦА</p>
                            <hr>
                        </a>
                        <a class="direction_item" href="<?php echo home_url() . '/school' ; ?>">
                            <p>танцуют ВСЕ от 3 до 99 лет</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>




