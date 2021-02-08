<?php
/**
 * Template Name: school-timeTable
 */
?>
<?php get_header() ; ?>
        <section class="timetable">

            <div class="timetable_table">

                <div class="timetable_table_day">

                    <div class="timetable_table_heading">
                        <h3 class="week_day">Понедельник</h3>
                    </div>

                    <?php
                    $monday_query = new WP_Query(array(
                        'post_type'      => 'school_time_table',
                        'post_per_page'  => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    while ($monday_query->have_posts()) :
                        $monday_query->the_post();
                        $monday_day = get_post_meta(get_the_ID(), 'monday', true);
                        $team_color_monday = get_post_meta(get_the_ID(), 'team_color', true);
                        if ($monday_day !== '') :
                        ?>
                        <div class="timetable_table_item top_of_item">
                            <div class="subscription_form_link">
                                <a href="#form-popup" class="subscription_form_popup">
                                    <p>Записаться</p>
                                </a>
                            </div>
                        <?php else: ?>
                        <div class="timetable_table_item">
                        <?php endif; ?>
                            <?php
                            if ($monday_day !== '') :
                            ?>
                            <div class="timetable_table_item_text" style="background-color: <?php echo hexToRgb($team_color_monday,0.4, true); ?> ">
                                <time class="post_id_<?php echo get_the_ID() ; ?> get_for_form" datetime="<?php echo $monday_day ; ?>"><?php echo $monday_day ; ?></time>
                                <p class="get_for_form"><?php the_title() ; ?></p>
                            <?php else: ?>
                            <div class="timetable_table_item_text">
                            <?php
                               endif;
                            ?>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>


                <div class="timetable_table_day">

                    <div class="timetable_table_heading">
                        <h3 class="week_day">Вторник</h3>
                    </div>

                    <?php
                    $tuesday_query = new WP_Query(array(
                        'post_type'      => 'school_time_table',
                        'post_per_page'  => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    while ($tuesday_query->have_posts()) :
                        $tuesday_query->the_post();
                        $tuesday_day = get_post_meta(get_the_ID(), 'tuesday', true);
                        $team_color_tuesday = get_post_meta(get_the_ID(), 'team_color', true);
                        if ($tuesday_day !== '') :
                        ?>
                        <div class="timetable_table_item top_of_item" >
                            <div class="subscription_form_link">
                                <a href="#form-popup" class="subscription_form_popup">
                                    <p>Записаться</p>
                                </a>
                            </div>
                        <?php else: ?>
                        <div class="timetable_table_item">
                        <?php endif; ?>
                            <?php
                            if ($tuesday_day !== '') :
                            ?>
                            <div class="timetable_table_item_text" style="background-color: <?php echo hexToRgb($team_color_tuesday, .4, true); ?> ">
                                <time class="post_id_<?php echo get_the_ID() ; ?> get_for_form" datetime="<?php echo $tuesday_day ; ?>"><?php echo $tuesday_day ; ?></time>
                                <p class="get_for_form"><?php the_title() ; ?> </p>
                                <?php
                                    else:
                                ?>
                                <div class="timetable_table_item_text">
                                <?php
                                    endif;
                                ?>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>


                <div class="timetable_table_day">

                    <div class="timetable_table_heading">
                        <h3 class="week_day">Среда</h3>
                    </div>

                    <?php
                    $wednesday_query = new WP_Query(array(
                        'post_type'      => 'school_time_table',
                        'post_per_page'  => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    while ($wednesday_query->have_posts()) :
                    $wednesday_query->the_post();
                    $wednesday_day = get_post_meta(get_the_ID(), 'wednesday', true);
                    $team_color_wednesday = get_post_meta(get_the_ID(), 'team_color', true);
                        if ($wednesday_day !== '') :
                        ?>
                        <div class="timetable_table_item top_of_item">
                            <div class="subscription_form_link">
                                <a href="#form-popup" class="subscription_form_popup">
                                    <p>Записаться</p>
                                </a>
                            </div>
                        <?php else: ?>
                        <div class="timetable_table_item">
                        <?php endif; ?>
                            <?php
                            if ($wednesday_day !== '') :
                            ?>
                            <div class="timetable_table_item_text" style="background-color: <?php echo hexToRgb($team_color_wednesday, .4, true) ; ?> ">
                                <time class="post_id_<?php echo get_the_ID() ; ?> get_for_form" datetime="<?php echo $wednesday_day ; ?>"><?php echo $wednesday_day ; ?></time>
                                <p class="get_for_form"><?php the_title() ; ?></p>
                                <?php
                                    else:
                                ?>
                                <div class="timetable_table_item_text">
                                <?php
                                    endif;
                                ?>
                            </div>
                        </div>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <div class="timetable_table_day">

                    <div class="timetable_table_heading">
                        <h3 class="week_day">Четверг</h3>
                    </div>

                    <?php
                    $thursday_query = new WP_Query(array(
                        'post_type'      => 'school_time_table',
                        'post_per_page'  => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    while ($thursday_query->have_posts()) :
                    $thursday_query->the_post();
                    $thursday_day = get_post_meta(get_the_ID(), 'thursday', true);
                    $team_color_thursday = get_post_meta(get_the_ID(), 'team_color', true);

                    if ($thursday_day !== '') :
                    ?>
                    <div class="timetable_table_item top_of_item">
                        <div class="subscription_form_link">
                            <a href="#form-popup" class="subscription_form_popup">
                                <p>Записаться</p>
                            </a>
                        </div>
                        <?php else: ?>
                    <div class="timetable_table_item">
                        <?php endif; ?>
                        <?php
                        if ($thursday_day !== '') :
                        ?>
                        <div class="timetable_table_item_text" style="background-color: <?php echo hexToRgb($team_color_thursday, .4, true) ; ?> ">
                            <time class="post_id_<?php echo get_the_ID() ; ?> get_for_form" datetime="<?php echo $thursday_day ; ?>"><?php echo $thursday_day ; ?></time>
                            <p class="get_for_form"><?php the_title() ; ?> </p>
                        <?php
                        else:
                        ?>
                        <div class="timetable_table_item_text">
                        <?php
                        endif;
                        ?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>


                <div class="timetable_table_day">

                    <div class="timetable_table_heading">
                        <h3 class="week_day">Пятница</h3>
                    </div>

                    <?php
                    $friday_query = new WP_Query(array(
                        'post_type'      => 'school_time_table',
                        'post_per_page'  => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    while ($friday_query->have_posts()) :
                    $friday_query->the_post();
                    $friday_day = get_post_meta(get_the_ID(), 'friday', true);
                    $team_color_friday = get_post_meta(get_the_ID(), 'team_color', true);
                    if ($friday_day !== '') :
                    ?>
                    <div class="timetable_table_item top_of_item">
                        <div class="subscription_form_link">
                            <a href="#form-popup" class="subscription_form_popup">
                                <p>Записаться</p>
                            </a>
                        </div>
                    <?php else: ?>
                    <div class="timetable_table_item">
                    <?php endif; ?>
                        <?php
                        if ($friday_day !== '') :
                        ?>
                        <div class="timetable_table_item_text" style="background-color: <?php echo hexToRgb($team_color_friday, .4, true)  ?> ">
                            <time class="post_id_<?php echo get_the_ID() ; ?> get_for_form" datetime="<?php echo $friday_day ; ?>"><?php echo $friday_day ; ?></time>
                            <p class="get_for_form"><?php the_title() ; ?> </p>
                        <?php
                        else:
                        ?>
                        <div class="timetable_table_item_text">
                        <?php
                        endif;
                        ?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

                <div class="timetable_table_day">

                    <div class="timetable_table_heading">
                        <h3 class="week_day">Суббота</h3>
                    </div>

                    <?php
                    $saturday_query = new WP_Query(array(
                        'post_type'      => 'school_time_table',
                        'post_per_page'  => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    while ($saturday_query->have_posts()) :
                    $saturday_query->the_post();
                    $saturday_day = get_post_meta(get_the_ID(), 'saturday', true);
                    $team_color_saturday = get_post_meta(get_the_ID(), 'team_color', true);
                    if ($saturday_day !== '') :
                    ?>
                    <div class="timetable_table_item top_of_item">
                        <div class="subscription_form_link">
                            <a href="#form-popup" class="subscription_form_popup">
                                <p>Записаться</p>
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="timetable_table_item">
                        <?php endif; ?>
                        <?php
                        if ($saturday_day !== '') :
                        ?>
                        <div class="timetable_table_item_text" style="background-color: <?php echo hexToRgb($team_color_saturday, .4, true) ?> ">
                            <time class="post_id_<?php echo get_the_ID() ; ?> get_for_form" datetime="<?php echo $saturday_day ; ?>"><?php echo $saturday_day ; ?></time>
                            <p class="get_for_form"><?php the_title() ; ?></p>
                            <?php
                            else:
                            ?>
                            <div class="timetable_table_item_text">
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
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