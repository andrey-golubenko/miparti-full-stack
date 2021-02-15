<?php
/**
 * The template for displaying search pages
 */
?>
<?php get_header(); ?>
<section class="blog">


	<div class="blog_content">
		<?php if ( have_posts() ) :
            $query_search = new WP_Query([
                's'              => $s,
                'posts_per_page' => -1,
                'order'          => 'ASC',
            ]);
            while ($query_search->have_posts()) :
                $query_search->the_post();
            get_template_part( 'template-parts/content', 'search' );
			 endwhile;
            wp_reset_query() ; // чтобы ничего не поломать
			?>
        <?php else :
            get_template_part( 'template-parts/content', 'none' );
        endif; ?>
    </div>
</section>
<?php get_footer();