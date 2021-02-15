<div class="blog_content_item">
    <?php
    if (get_the_post_thumbnail_url()) :
    ?>
    <div class="blog_content_item_image">
        <a href="<?php the_permalink() ; ?>">
            <img src="<?php echo get_the_post_thumbnail_url() ; ?>" alt="post image">
        </a>
    </div>
    <?php endif; ?>
    <div class="blog_content_item_heading">
        <h3><a href="<?php the_permalink() ; ?>"><?php the_title() ; ?></a></h3>
    </div>
    <div class="blog_content_item_text">
        <p><?php echo kama_excerpt( array('maxchar'=>500) ); ?></p>
    </div>
</div>