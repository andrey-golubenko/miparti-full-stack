<?php
/**
 * Template Name: countries-images
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MIPARTI</title>
</head>
    <body>
        <main id="main">
            <div id="move_to_popup">
                <div class="inner_popup">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>