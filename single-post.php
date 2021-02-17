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
                <!--<div class="comments_form ">
                    <form class="signUp_form" style="background: url('./assets/images/bg_body.jpg') no-repeat top/cover; filter: brightness(150%);">
                        <p class="signUp_form_heading">Оставить комментарий</p>
                        <p class="signUp_form_note"><span>*</span> Обязательные для заполнения поля</p>
                        <div class="signUp_form_item">
                            <label class="signUp_form_item_label" for="name"><input id="comments_name" class="inputBox" type="text" placeholder="&nbsp;" required /><span class="spanBox">Ваше имя : <span class="spanStar">*</span></span></label>
                        </div>
                        <div class="signUp_form_item">
                            <label class="signUp_form_item_label" for="email"><input id="comments_email" class="inputBox" type="email" placeholder="&nbsp;" required /><span class="spanBox">Ваш e-mail : <span class="spanStar">*</span></span></label>
                        </div>
                        <div class="signUp_form_item">
                            <label class="signUp_form_item_label" for="comments_message"><textarea id="comments_message" class="inputBox" placeholder="&nbsp;" required cols="30" rows="5"></textarea><span class="spanBox">Комментарий : <span class="spanStar">*</span></span></label>
                        </div>
                        <div class="signUp_form_item">
                            <input type="submit" value="Отправить">
                        </div>
                    </form>

                </div>-->
            </div>
        </div>
    </section>
<?php get_footer();