<?php
/*
 * Template Name: blog
 */
?>

<?php get_header(); ?>

        <section class="blog">
            <div class="blog_content">

                <?php
                //Определяем текущую страницу
                $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                $blog_query = new WP_Query(array(
                    'post_type'     => 'post',
                    'posts_per_page' => 6,
                    'order'         => 'ASC',
                    'paged' => $paged, // передаём текущую страницу сюда!
                ));
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                ?>

                <div class="blog_content_item">
                    <div class="blog_content_item_image">
                        <a href="<?php the_permalink() ; ?>">
                            <img src="<?php echo get_the_post_thumbnail_url() ; ?>" alt="post image">
                        </a>
                    </div>
                    <div class="blog_content_item_heading">
                        <h3><a href="<?php the_permalink() ; ?>"><?php the_title() ; ?></a></h3>
                    </div>
                    <div class="blog_content_item_text">
                        <p><?php echo kama_excerpt( array('maxchar'=>100) ); ?></p>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <div class="blog_pagination container">
                <?php
                // пагинация для произвольного запроса
                $big = 999999999; // уникальное число
                echo paginate_links( array(
                    'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ) /*. '#middle_blog'*/,
                    'format'  => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total'   => $blog_query->max_num_pages,
                    'show_all' => true,
                    'type' => 'list',
                    'prev_next' => true,
                    'prev_text' => '&#8249;',
                    'next_text' => '&#8250;',
                ) );
                ?>
            </div>
        </section>

<?php get_footer() ; ?>
