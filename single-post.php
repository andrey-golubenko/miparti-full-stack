<?php get_header();?>
    <section class="single_news">
        <div class="single_news_wrapper">
            <?php get_sidebar() ; ?>
            <div class="single_news_content">
                <div class="single_news_image" style="background: url(<?php echo get_the_post_thumbnail_url() ; ?>) no-repeat top/cover;"></div>
                <div class="single_news_heading">
                    <h2><?php the_title() ; ?></h2>
                </div>
                <div class="single_news_text">
                  <?php the_content() ; ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();