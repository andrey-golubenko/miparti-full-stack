<?php
/**
 * Template Name: school-dance-staging
 */
?>
<?php get_header(); ?>
        <section class="dance_staging">

            <div class="dance_staging_description container">
                <p class="dance_staging_description_invariable">
                    <span class="highlighted_symbol">М</span>ы воплотим в жизнь Любые Ваши задумки и Проекты :
                </p>
                <?php
                $dance_staging_top = new WP_Query(array(
                    'post_type'     => 'dance_staging',
                    'post_per_page' => -1,
                    'order'         => 'ASC'
                ));
                while ($dance_staging_top->have_posts()) :
                $dance_staging_top->the_post();
                $post_ID_top = get_the_ID();
                $youTube_url_top = esc_html(get_post_meta($post_ID_top, 'youTube_url', 1));
                $post_thumbnail_top = get_the_post_thumbnail_url();
                $visible_video_text_top = esc_html(get_post_meta($post_ID_top, 'visible_description', 1));
                $uploaded_photos_top = esc_html(get_post_meta($post_ID_top, 'uploadedPhoto', 1));
                ?>
                <p class="dance_staging_description_item">
                <?php
                if (
                     (!empty($post_thumbnail_top) && !empty($uploaded_photos_top))
                  || (!empty($post_thumbnail_top) && !empty($visible_video_text_top))
                  || (!empty($uploaded_photos_top) && !empty($visible_video_text_top))
                ) : // if isset 'post_thumbnail',  'post_visible_text',  'post_photos' in the post, we output post->ID for scrolling from it to the 'video_item' with the same post->ID
                ?>
                    <span class="dance_staging_description_pin" id="<?php echo $post_ID_top; ?>_scroll_anchor_from">
                    <?php else: ?>
                    <span class="dance_staging_description_pin">
                    <?php endif; ?>
                        <span class="dance_staging_arrow_left"></span>
                        <span class="dance_staging_arrow_right"></span>
                    </span>
                    <span class="highlighted_symbol">-</span>
                    <span class="dance_staging_description_item_context">
                        <?php echo esc_html(get_post_meta($post_ID_top, 'dance_staging', 1));
                        ?>
                    </span>
                </p>
                <?php endwhile; wp_reset_postdata(); ?>
                <p class="dance_staging_description_invariable">
                    <span class="highlighted_symbol">«С</span>удовольствием поделимся с Вами своим опытом и подарим частичку своей души.<span class="highlighted_symbol"> »</span>
                </p>
                <p class="dance_staging_description_invariable">
                    <span class="highlighted_symbol">С</span>ветлана Двояшкина и <span class="highlighted_symbol">А</span>лександр Авдеев - руководители центра, танцевальный дуэт «<span class="highlighted_symbol">М</span>ипарти».
                </p>
            </div>

            <?php
            $dance_staging_videos_items = new WP_Query(array(
                'post_type'     => 'dance_staging',
                'post_per_page' => -1,
                'order'         => 'ASC'
            ));
            while ($dance_staging_videos_items->have_posts()) :
                $dance_staging_videos_items->the_post();
                $post_ID_content = get_the_ID();
                $youTube_url = esc_html(get_post_meta($post_ID_content, 'youTube_url', 1));
                $post_thumbnail = get_the_post_thumbnail_url();
                $visible_video_text = esc_html(get_post_meta($post_ID_content, 'visible_description', 1));
                $uploaded_photos = get_post_meta($post_ID_content, 'uploadedPhoto', 1);
                if (
                       (!empty($post_thumbnail) && !empty($uploaded_photos))
                    || (!empty($post_thumbnail) && !empty($visible_video_text))
                    || (!empty($uploaded_photos) && !empty($visible_video_text))
                ) :
                ?>
                <div class="videos_item">

                    <div class="videos_item_heading">
                        <h3 id="scroll_anchor_to_<?php echo $post_ID_content; ?>"><?php echo the_title(); ?></h3>
                    </div>
                    <div class="videos_item_wrapper ">
                        <div class="videos_item_content">
                            <div class="videos_item_content_video" >
                                <div class="videos_item_content_video_inner" style="background: url(<?php echo $post_thumbnail; ?>) no-repeat center/cover;">
                                <?php if ($youTube_url != '') : ?>
                                    <a class="popup-youtube" rel="nofollow" href="<?php echo $youTube_url; ?>"><span></span></a>
                                <?php endif; ?>
                                </div>
                                <div class="videos_item_content_video_images" id="<?php echo $post_ID_content; ?>_bottom_images">
                                    <?php
                                    $uploaded_photos = $uploaded_photos ? $uploaded_photos : []; // подавление ошибки отсутсвия массива в foreach - подстановка пустого масива
                                    foreach ($uploaded_photos as $key => $value) {
                                        $image_source = explode(' ', $value);
                                        $image_source[3] = $image_source[3] ? $image_source[3] : $image_source[1];
                                        $image_source[2] = $image_source[2] ? $image_source[2] : ($image_source[1] ? $image_source[1] : $image_source[3]);
                                        $image_source[1] = $image_source[1] ? $image_source[1] : $image_source[2];
                                        // $image_source[0] - sizes.thumbnail.url
                                        // $image_source[1] - sizes.medium.url
                                        // $image_source[2] - sizes.large.url
                                        // $image_source[3] - sizes.full.url
                                        if ($key <= 2) {
                                            echo '<a href="' . $image_source[2] . '" class="videos_item_content_images_single mobile_move_to_bottom">
                                    <img src="' .  MIPARTI_IMG_DIR . '/img-placeholder.svg" data-src="' . $image_source[0] . '" alt="">
                                    <span class="magnifying_glass">&#8981;</span>
                                </a>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="videos_item_content_images" id="side_images_<?php echo $post_ID_content; ?>">
                                <?php
                                foreach ($uploaded_photos as $key => $value) {
                                    $image_source = explode(' ', $value);
                                    $image_source[3] = $image_source[3] ? $image_source[3] : $image_source[1];
                                    $image_source[2] = $image_source[2] ? $image_source[2] : ($image_source[1] ? $image_source[1] : $image_source[3]);
                                    $image_source[1] = $image_source[1] ? $image_source[1] : $image_source[2];
                                    if ($key > 2) {
                                        echo '<a href="' . $image_source[2] . '" class="videos_item_content_images_single mobile_move_to_bottom">
                                    <img src="' .  MIPARTI_IMG_DIR . '/img-placeholder.svg" data-src="' . $image_source[0] . '" alt="">
                                    <span class="magnifying_glass">&#8981;</span>
                                </a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="videos_item_description">
                            <?php

                                if (!empty($visible_video_text)) :
                            ?>
                            <div class="common_description">
                                <div class="common_description_item">
                                    <div class="common_description_text">
                                        <?php
                                        $visible_paragraphs = explode(PHP_EOL,$visible_video_text);
                                        foreach ($visible_paragraphs as $visible_item) {
                                            echo '<p>' . $visible_item . '</p>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    $invisible_video_text = esc_html(get_post_meta($post_ID_content, 'invisible_description', 1));                                      if (!empty($invisible_video_text)) :
                                    ?>
                                    <div class="common_description_text_full">
                                        <?php
                                        $invisible_paragraphs = explode(PHP_EOL,$invisible_video_text); // use PHP constant 'PHP_EOL' like line-break-delimiter
                                        foreach ($invisible_paragraphs as $invisible_item) {
                                            echo '<p>' . $invisible_item . '</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="common_description_text_readMore">
                                        <p class="common_description_text_note">Читать далее . . .</p>
                                        <div class="common_description_text_open">
                                            <span class="arrow-text-left"></span>
                                            <span class="arrow-text-right"></span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
                endif;
                endwhile;
                wp_reset_postdata();
            ?>
        </section>
<?php get_footer(); ?>
