<?php
/**
 * Template Name: studio-videos
 */
?>

<?php get_header(); ?>

    <section class="videos">

        <?php
            $studio_videos_items = new WP_Query(array(
                'post_type'     => 'videos_studio',
                'post_per_page' => -1,
                'order'         => 'ASC'
            ));
            while ($studio_videos_items->have_posts()) :
                $studio_videos_items->the_post();
        ?>
        <div class="videos_item">
            <div class="videos_item_wrapper ">
                <div class="videos_item_content">
                    <div class="videos_item_content_video" >
                        <div class="videos_item_content_video_inner" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) no-repeat center/cover;">
                            <a class="popup-youtube" rel="nofollow" href="<?php echo esc_url(get_post_meta($post->ID, 'youTube_url', 1)); ?>"><span></span></a>
                        </div>
                        <div class="videos_item_content_video_images" id="<?php echo get_the_ID(); ?>_bottom_images">
                        <?php
                        $uploaded_videos = get_post_meta(get_the_ID(), 'uploadedPhoto', 1) ? get_post_meta(get_the_ID(), 'uploadedPhoto', 1) : []; // подавление ошибки отсутсвия массива в foreach - подстановка пустого масива
                        foreach ($uploaded_videos as $key => $value) {
                            $image_source = explode(' ', $value);
                            $image_source[3] = $image_source[3] ? $image_source[3] : $image_source[1];
                            $image_source[2] = $image_source[2] ? $image_source[2] : ($image_source[1] ? $image_source[1] : $image_source[3]);
                            $image_source[1] = $image_source[1] ? $image_source[1] : $image_source[2];
                            // $image_source[0] - sizes.thumbnail.url
                            // $image_source[1] - sizes.medium.url
                            // $image_source[2] - sizes.large.url
                            // $image_source[3] - sizes.full.url
                            if ($key <= 2) {
                                echo '<a href=" ' . $image_source[2] . ' " class="videos_item_content_images_single mobile_move_to_bottom">
                                <img src="' .  MIPARTI_IMG_DIR . '/img-placeholder.svg" data-src="' . $image_source[0] . '" alt="">
                                <span class="magnifying_glass">&#8981;</span>
                            </a>';
                            }
                        }
                        ?>
                        </div>
                    </div>
                    <div class="videos_item_content_images" id="side_images_<?php echo get_the_ID(); ?>">
                        <?php
                        foreach ($uploaded_videos as $key => $value) {
                            $image_source = explode(' ', $value);
                            $image_source[3] = $image_source[3] ? $image_source[3] : $image_source[1];
                            $image_source[2] = $image_source[2] ? $image_source[2] : ($image_source[1] ? $image_source[1] : $image_source[3]);
                            $image_source[1] = $image_source[1] ? $image_source[1] : $image_source[2];
                            if ($key > 2) {
                                echo '<a href=" ' . $image_source[2] . ' " class="videos_item_content_images_single mobile_move_to_bottom">
                                <img src="' .  MIPARTI_IMG_DIR . '/img-placeholder.svg" data-src="' . $image_source[0] . '" alt="">
                                <span class="magnifying_glass">&#8981;</span>
                            </a>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="videos_item_description">
                    <h3><?php the_title() ?></h3>
                    <div class="common_description">
                        <div class="common_description_item">
                            <div class="common_description_text">
                                <?php
                                $visible_video_text = esc_html(get_post_meta(get_the_ID(), 'visible_description', 1));
                                $visible_paragraphs = explode(PHP_EOL,$visible_video_text);
                                foreach ($visible_paragraphs as $visible_item) {
                                    echo '<p>' . $visible_item . '</p>';
                                }
                                ?>
                            </div>
                            <div class="common_description_text_full">
                                <?php
                                $invisible_video_text = esc_html(get_post_meta(get_the_ID(), 'invisible_description', 1));
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </section>

<?php get_footer() ; ?>
