<?php
/**
 * Template Name: school-prices
 */
?>
<?php get_header() ; ?>
        <section class="prices">
            <div class="prices_subSection">
                <h2 class="prices_subSection_heading">Групповые</h2>
                <p class="prices_subSection_heading_desc">занятия</p>
            </div>
            <div class="prices_inner">
                <?php
                $group_prices = new WP_Query(array(
                   'post_type'      => 'school_prices',
                   'post_per_page'  => -1,
                   'order'          => 'ASC'
                ));
                while($group_prices->have_posts()) :
                    $group_prices->the_post();

                if (get_post_meta(get_the_ID(), 'persons_number', 1) === '' && get_post_meta(get_the_ID(), 'per_month_price', 1) != '') :
                ?>

                <div class="prices_inner_item top_of_item">
                    <div class="prices_inner_item_price">
                        <div class="prices_inner_item_number"><?php echo esc_html(get_post_meta(get_the_ID(), 'one_lesson_price', 1)) ; ?></div>
                        <div class="prices_inner_item_text">
                            <p class="prices_inner_item_text_currency">UAH</p>
                            <p class="prices_inner_item_text_text">занятие</p>
                        </div>
                    </div>
                    <div class="prices_inner_item_quantity">
                        <p class="prices_inner_item_quantity_wrapper">
                            <?php
                            $lessons_count = esc_html(get_post_meta(get_the_ID(), 'lesson_count', 1));
                            $lessons_count_separated = explode(' ', $lessons_count);
                            echo '<strong class="get_for_form">' . $lessons_count_separated[0] . '</strong>
                                 <span class="get_for_form"> ' . $lessons_count_separated[1] . '</span>';
                                 ?>
                            <span>/месяц</span>
                        </p>
                    </div>
                    <div class="prices_inner_item_total">
                        <p class="prices_inner_item_total_price">
                            <span><?php echo esc_html(get_post_meta(get_the_ID(), 'per_month_price', 1)) ; ?> UAH</span>
                            <span>месяц</span>
                        </p>
                    </div>

                    <div class="subscription_form_link">
                        <a href="#form-popup" class="subscription_form_popup">
                            <p>Записаться</p>
                        </a>
                    </div>
                </div>
                <?php
                    endif;
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
            <div class="prices_subSection">
                <h2 class="prices_subSection_heading">Индивидуальные</h2>
                <p class="prices_subSection_heading_desc">занятия</p>
            </div>
            <div class="prices_inner">

                <?php
                $individual_prices = new WP_Query(array(
                    'post_type'      => 'school_prices',
                    'post_per_page'  => -1,
                    'order'          => 'ASC'
                ));
                while($individual_prices->have_posts()) :
                $individual_prices->the_post();

                if (get_post_meta(get_the_ID(), 'persons_number', 1) != '' && get_post_meta(get_the_ID(), 'per_month_price', 1) === '') :
                ?>

                <div class="prices_inner_item top_of_item">
                    <div class="prices_inner_item_price">
                        <div class="prices_inner_item_number"><?php echo esc_html(get_post_meta(get_the_ID(), 'one_lesson_price', 1)) ; ?></div>
                        <div class="prices_inner_item_text">
                            <p class="prices_inner_item_text_currency">UAH</p>
                            <p class="prices_inner_item_text_text">занятие</p>
                        </div>
                    </div>
                    <div class="prices_inner_item_total">
                        <p class="prices_inner_item_total_price">
                            <span class="get_for_form"><?php echo esc_html(get_post_meta(get_the_ID(), 'persons_number', 1)) ; ?></span>
                        </p>
                    </div>
                    <div class="subscription_form_link">
                        <a href="#form-popup" class="subscription_form_popup">
                            <p>Записаться</p>
                        </a>
                    </div>
                </div>
                <?php
                    endif;
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
            <div class="prices_subSection">
                <h2 class="prices_subSection_heading">Пробное</h2>
                <p class="prices_subSection_heading_desc">занятие</p>
            </div>
            <div class="prices_inner">
                <div class="prices_inner_item">
                    <div class="prices_inner_item_price">
                        <div class="prices_inner_item_number">00</div>
                        <div class="prices_inner_item_text">
                            <p class="prices_inner_item_text_currency">UAH</p>
                            <p class="prices_inner_item_text_text">занятие</p>
                        </div>
                    </div>
                    <div class="prices_inner_item_total">
                        <p class="prices_inner_item_total_price">
                            <span>БЕСПЛАТНО</span>
                        </p>
                    </div>
                    <div class="subscription_form_link">
                        <a href="#form-popup" class="subscription_form_popup">
                            <p>Записаться</p>
                        </a>
                    </div>
                </div>
            </div>

            <div id="form-popup" class="signUp mfp-hide" style="background: url(<?php echo MIPARTI_IMG_DIR . '/bg_body.jpg' ?>) no-repeat top/cover; filter: brightness(150%);">
                <form class="signUp_form" id="add_subscribe">
                    <p class="signUp_form_heading">Предварительная регистрация</p>
                    <p class="signUp_form_note"><span>*</span> Обязательные для заполнения поля</p>
                    <div class="signUp_form_item">
                        <label class="signUp_form_item_label" for="subscribe_name"><input type="text" name="subscribe_name" id="subscribe_name" class="inputBox"  placeholder="&nbsp;"  /><span class="spanBox">Ваше имя : <span class="spanStar">*</span></span></label>
                    </div>
                    <div class="signUp_form_item">
                        <label class="signUp_form_item_label" for="subscribe_phone"><input type="tel" name="subscribe_phone" id="subscribe_phone" class="inputBox"  placeholder="&nbsp;" /><span class="spanBox">Ваш телефон : <span class="spanStar">*</span></span></label>
                    </div>
                    <div class="signUp_form_item">
                        <label class="signUp_form_item_label" for="subscribe_email"><input type="email" name="subscribe_email" id="subscribe_email" class="inputBox"  placeholder="&nbsp;" /><span class="spanBox">Ваш e-mail : </span></label>
                    </div>

                    <input type="checkbox" name="subscribe_anticheck" id="subscribe_anticheck" style="display: none !important;" value="true" checked="checked"/>
                    <input type="text" name="subscribe_submitted" id="subscribe_submitted" value="" style="display: none !important;"/>

                    <div class="signUp_form_item">
                        <input type="submit" id="submit_subscribe" value="Записаться">
                    </div>
                </form>
            </div>

            <div class="common_description container">
                <div class="common_description_item">
                    <p class="common_description_text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum deleniti deserunt illo omnis, optio sunt voluptatibus. Beatae blanditiis numquam rerum!
                    </p>
                    <p class="common_description_text_full">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis cum ipsa magni nam nemo nostrum, officiis quae quaerat quam reiciendis, reprehenderit sint, totam unde vero. Dignissimos impedit rerum temporibus.
                    </p>
                    <div class="common_description_text_readMore">
                        <p class="common_description_text_note">Читать далее . . .</p>
                        <div class="common_description_text_open">
                            <span class="arrow-text-left"></span>
                            <span class="arrow-text-right"></span>
                        </div>
                    </div>
                </div>
            </div>

        </section>
<?php get_footer() ; ?>

