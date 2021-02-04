<?php
/**
 * Template Name: studio-photos
 */
?>
<?php get_header(); ?>
        <section class="studio_photos">
            <?php // if count of posts is more than four then we define id="more_than_four_posts" for init slider
            $count_photos_studio_posts = wp_count_posts('photos_studio')->publish;
            if ($count_photos_studio_posts > 4 ) :
            ?>
                <div class="studio_photos_albums" id="more_than_four_posts">
            <?php
            elseif ($count_photos_studio_posts <= 4) :
            ?>
                <div class="studio_photos_albums">
            <?php
                endif;
            ?>
                <?php
                $studio_photo_albums = new WP_Query(array(
                    'post_type'     => 'photos_studio',
                    'post_per_page' => -1,
                    'order'         => 'ASC'
                ));
                while ($studio_photo_albums->have_posts()) :
                    $studio_photo_albums->the_post();
                ?>
                <h2 class="studio_photos_link_">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Album preview">
                    <span class="studio_photos_albums_description"><?php the_title();?></span>
                </h2>
                <?php
                    endwhile; wp_reset_postdata();
                ?>
            </div>
            <div class="studio_photos_content container">

                <?php
                $studio_photo_album_photos = new WP_Query(array(
                    'post_type'     => 'photos_studio',
                    'post_per_page' => -1,
                    'order'         => 'ASC'
                ));
                while ($studio_photo_album_photos->have_posts()) :
                $studio_photo_album_photos->the_post();
                ?>

                <div class="studio_photos_link_">
                    <?php
                    $uploadedPhotos = get_post_meta(get_the_ID(), 'uploadedPhoto', 1);
                    foreach ($uploadedPhotos as $value) {
                        echo '<div class="studio_photos_content_image">
                                  <a href=" ' . $value . ' ">
                                  <img src=" ' . $value . ' "  alt="">
                            <span class="magnifying_glass">&#8981;</span>
                        </a>
                    </div>';
                    }
                    ?>
                </div>
                <?php
                endwhile; wp_reset_postdata();
                ?>
            </div>
        </section>
<?php get_footer() ; ?>
