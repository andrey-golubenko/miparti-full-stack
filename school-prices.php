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
                        Абонемент свободного посещения дает возможность в течение месяца посетить 8 занятий в удобное для Вас время.
                    </p>
                    <p class="common_description_text">
                        Без оплаты офис менеджер не имеет права пропустить клиента на занятие.
                    </p>
                    <p class="common_description_text">
                        Приостановить абонемент можно только на время майских праздников и новогодних каникул ( в установленные администрацией сроки), а так же во время летних отпусков с четким оговариванием начала и конца вашего отпуска.
                    </p>
                    <p class="common_description_text">
                        Деньги, оплаченные за абонемент не возвращаются!
                    </p>
                    <p class="common_description_text">
                        Администрация оставляет за собой право менять хореографа в группах.
                    </p>
                    <p class="common_description_text">
                        Администрация имеет право закрыть группу, если она является экономически нецелесообразной, и предложить занятия в другой группе, где есть места.
                    </p>
                    <p class="common_description_text">
                        Если вы оставляете предоплату за абонемент ( она должна составлять не менее половины стоимости), то оставшаяся сумма в обязательном порядке должна быть оплачена на следующем занятии.
                    </p>
                    <p class="common_description_text">
                        Запрещено посещать клуб в нетрезвом состоянии.
                    </p>
                    <p class="common_description_text">
                        Не допускается посещение занятий клиентами с сильным запахом парфюмов во избежание аллергических реакций у окружающих.
                    </p>
                    <p class="common_description_text">
                        Без разрешения администрации любая видеосъемка в нашем центре запрещена!
                    </p>
                    <p class="common_description_text">
                        Запрещается оставлять в раздевалке танцевальную форму и личные вещи ( кроме реквизита: вееров, восточных поясов, шалей, испанских и цыганских юбок).
                    </p>
                    <p class="common_description_text">
                        P.S. Приведи подругу и получи в подарок – бесплатное занятие – в конец абонемента (если подруга приобрела абонемент).
                    </p>
                    <p class="common_description_text">
                        Если пропускаешь занятие – пришли вместо себя подругу, которая еще не является клиенткой центра.
                    </p>
                    <p class="common_description_text">
                        Помните, мы заботимся о Вас!
                    </p>
                </div>
            </div>
        </section>
<?php get_footer() ; ?>