<?php
/**
 * Template Name: contacts
 */
?>

<?php get_header(); ?>

        <section class="contacts_content">
            <div class="common_col_widget_contacts ">
                <ul>
                    <li>
                        <div class="contacts_subtitle">
                            <p class="contacts_subtitle_text">Адресс :</p>
                        </div>
                        <div class="contacts_text">
                            <span class="icon_address">
                            <svg width="35" height="35" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M12.3143 9.21662H10.5582L11.3054 8.13762C12.7167 6.25649 12.5124 3.16444 10.8687 1.52093C9.98071 0.63272 8.7997 0.143494 7.54341 0.143494C6.28736 0.143494 5.10635 0.63272 4.21814 1.52093C2.57439 3.16444 2.37011 6.25674 3.77575 8.13027L4.5281 9.21687H2.68572L0 14.8568H15L12.3143 9.21662ZM7.58681 3.08596C8.53314 3.08596 9.30339 3.85622 9.30339 4.80255C9.30339 5.74888 8.53314 6.51913 7.58681 6.51913C6.64048 6.51913 5.87023 5.74888 5.87023 4.80255C5.87023 3.85622 6.64024 3.08596 7.58681 3.08596ZM2.99568 9.70707H4.86774L7.54341 13.5711L10.2188 9.70707H12.0043L14.2231 14.3664H0.776877L2.99568 9.70707Z" fill="#EAC15A"/></svg>
                        </span>
                            <span class="text_address">Украина, город Харьков,<br> улица Скрыпника, 5</span>
                        </div>
                    </li>

                    <li>
                        <div class="contacts_subtitle">
                            <p class="contacts_subtitle_text">
                                Телефоны :
                            </p>
                        </div>
                        <a class="contacts_text" href="tel:// +38 (050) 298-36-21">
                            <span class="icon">&#x260e;</span>
                            <span class="text">+38 (050) 298-36-21</span>
                        </a>
                        <a class="contacts_text" href="tel:// +38 (096) 969-31-96">
                            <span class="icon">&#x260e;</span>
                            <span class="text"> +38 (096) 969-31-96</span>
                        </a>
                        <a class="contacts_text" href="tel:// +38 (093) 326-25-89">
                            <span class="icon">&#x260e;</span>
                            <span class="text">+38 (093) 326-25-89</span>
                        </a>
                    </li>
                    <li>
                        <div class="contacts_subtitle">
                            <p class="contacts_subtitle_text">
                                E-mail :
                            </p>
                        </div>
                        <a class="contacts_text" href="mailto:mipartidance@gmail.com">
                            <span class="icon">&#x2709;</span>
                            <span class="text">mipartidance@gmail.com</span>
                        </a>
                    </li>
                </ul>
            </div>




        </section>
        <section class="contacts_visual container">

            <div class="contacts_visual_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1282.3514621413697!2d36.2387887191286!3d49.998178902732654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0e8a914fc29%3A0xe600616ad3090ee2!2z0YPQuy4g0KHQutGA0LjQv9C90LjQutCwLCA1LCDQpdCw0YDRjNC60L7Qsiwg0KXQsNGA0YzQutC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNjEwMDA!5e0!3m2!1sru!2sua!4v1598885662986!5m2!1sru!2sua" style="border: 1px solid #000;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>

            <div class="contacts_visual_form" style="background: url(<?php echo MIPARTI_IMG_DIR . '/bg_body.jpg' ?>) no-repeat top/cover; filter: brightness(150%);">
                <form class="signUp_form">
                    <p class="signUp_form_heading">Предварительная регистрация</p>
                    <p class="signUp_form_note"><span>*</span> Обязательные для заполнения поля</p>
                    <div class="signUp_form_item">
                        <label class="signUp_form_item_label" for="name"><input id="name" class="inputBox" type="text" placeholder="&nbsp;" required /><span class="spanBox">Ваше имя : <span class="spanStar">*</span></span></label>
                    </div>
                    <div class="signUp_form_item">
                        <label class="signUp_form_item_label" for="tel"><input id="tel" class="inputBox" type="tel" placeholder="&nbsp;" required /><span class="spanBox">Ваш телефон : <span class="spanStar">*</span></span></label>
                    </div>
                    <div class="signUp_form_item">
                        <label class="signUp_form_item_label" for="email"><input id="email" class="inputBox" type="email" placeholder="&nbsp;" /><span class="spanBox">Ваш e-mail : </span></label>
                    </div>

                    <div class="signUp_form_item">
                        <input type="submit" value="Зарегистрироваться">
                    </div>
                </form>

            </div>
        </section>

<?php get_footer() ; ?>
