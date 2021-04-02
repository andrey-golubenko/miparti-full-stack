<?php
/**
 * Template Name: about
 */
?>


<?php get_header(); ?>

    <section class="about">

    <div class="about_greeting container">
        <p class="about_greeting_text">
            "...<span class="highlighted_symbol">Д</span>обро&nbsp;пожаловать в галерею пленительных образов, оживающих в танце, в удивительный мир хореографического искусства, которое увлекает и восхищает миллионы людей во всех странах мира, на всех континентах. Мы рады, что среди тысяч миров безграничной сети Internet ты посетил именно Наш. Искренне благодарим за проявленный интерес..."
        </p>
        <p class="about_greeting_text">

            <span class="highlighted_symbol">C</span> любовью, директора Miparti Dance Company&nbsp;Светлана и Александр.
        </p>
    </div>

    <div class="about_slider container">
        <?php
        $about_us_query = new WP_Query(array(
            'post_type'     => 'about_us',
            'post_per-page' => -1,
            'order'         => 'ASC'
        ));
        while ($about_us_query->have_posts()) :
            $about_us_query->the_post();
            $slider_photos = get_post_meta(get_the_ID(), 'slider_photos', 1);
            foreach ($slider_photos as $value){
                $image_source = explode(' ', $value);
                $image_source[3] = $image_source[3] ? $image_source[3] : $image_source[1];
                $image_source[2] = $image_source[2] ? $image_source[2] : ($image_source[1] ? $image_source[1] : $image_source[3]);
                $image_source[1] = $image_source[1] ? $image_source[1] : $image_source[2];
                // $image_source[0] - sizes.thumbnail.url
                // $image_source[1] - sizes.medium.url
                // $image_source[2] - sizes.large.url
                // $image_source[3] - sizes.full.url
                echo  ' <div>
                            <img data-lazy="' . $image_source[1] . '"  alt="">
                        </div> ' ;
            }
            endwhile;
            wp_reset_postdata();
        ?>
    </div>
    <div class="common_description container">
        <div class="common_description_item">
            <p class="common_description_text">
                Основателями Miparti Dance Company являются Лауреаты Международных и Национальных конкурсов, члены Национального союза хореографов Украины, Светлана Двояшкина и Александр Авдеев (танцевальный дуэт "Мипарти").
            </p>
            <p class="common_description_text">
                Светлана и Александр - артисты высшей категории, балетмейстеры, преподаватели хореографических дисциплин Христианского благотворительного фонда содействия развитию культуры и духовного просвещения военнослужащих и молодежи имени Андрея Первозванного.
            </p>
            <p class="common_description_text_full">
                Светлана Двояшкина и Александр Авдеев имеют награды Посла Королевства Норвегия в Украине за сохранение и развитие традиционного народного хореографического искусства Украины и народов мира.
            </p>
            <p class="common_description_text_full">
                Во время обучения в ХГАК (класс Народного артиста Украины, профессора, академика Б.Н. Колногузенко), Светлана Двояшкина и Александр Авдеев зарекомендовали себя как талантливые балетмейстеры и исполнители.
            </p>
            <p class="common_description_text_full">
                - 2000 год дорганизовали танцевальный дуэт «Мипарти», который приобрел популярность и признание во время гастрольных туров под патронатом Президента Украины, которые состоялись в Сумах, Севастополе, Виннице, Ивано - Франковске, Луганске, Донецке, Чернигове, Киеве и других городах Украины. Мастерство С. Двояшкиной и А. Авдеева отмечено высокими оценками профессионального жюри на престижных Международных и Национальных конкурсах, фестивалях хореографического искусства во многих странах мира: Португалии, Испании, Италии, Венгрии, Китае, Болгарии, Польше, Бельгии, Германии, США;
            </p>
            <p class="common_description_text_full">
                - 2001 год, Харьков - дуэт «Мипарти» становится победителем Международного фестиваля - конкурса «Мы молодые», I место;
            </p>
            <p class="common_description_text_full">
                - 2003 год, Киев - I Всеукраинский конкурс артистов эстрады под патронатом Президента Украины Л.Д. Кучмы, 3-е место;
            </p>
            <p class="common_description_text_full">
                - 2003 год, Харьков - «Слобожанская Ярмарка. Новые имена», Гран-при;
            </p>
            <p class="common_description_text_full">
                - 2003 год, Балатон, Венгрия - I место Международного фестиваля народной хореографии и сольного танца «Балатон. Искусство. Молодость»;
            </p>
            <p class="common_description_text_full">
                - 2003 год, Киев - победители I Всеукраинского фестиваля - конкурса народной хореографии им. П. Вирского, названы лучшим дуэтом Украины в народной хореографии;
            </p>
            <p class="common_description_text_full">
                - 2004 год, Ивано-Франковск - лучший дуэт XIV Национального фестиваля «Фест - 2004»;
            </p>
            <p class="common_description_text_full">
                - 2004 год, Киев - I место Международного фестиваля - конкурса танца народов мира «Веселкова Терпсiхора»;
            </p>
            <p class="common_description_text_full">
                - 2005 год город Шеньчжень - Гран-при Международного хореографического конкурса в Китае;
            </p>
            <p class="common_description_text_full">
                - 2006, 2008  года - I место Харьковского открытого конкурса балетмейстеров.
            </p>
            <p class="common_description_text_full">
                В 2008 году - дуэт «Мипарти» организовал молодежный балет, в составе которого артисты ХНАТОБ и студенты  классического отделения ХГАК. Особое внимание уделяется развитию малых хореографических форм, популяризации украинского модерна с этническими мотивами, созданию сюжетных композиций, балетных спектаклей на актуальные темы.
            </p>
            <p class="common_description_text_full">
                Дуэт " Мипарти" показывает высокое мастерство на всех творческих отчетах Харьковской области в Киеве (начиная с 1999 года), представляет Харьков, Украину на мероприятиях международного уровня, сотрудничает со звездами украинской и зарубежной эстрады. Начиная с 2010 год Светлана и Александр принимают участие в постановках спектаклей ХГАУДТ им. Т.Г. Шевченко. Ими была поставлена хореография к спектаклям: "Примадонны", "Зойкина квартира", "Полоумный Журден", "Лев Гурич Синичка или Бенефис дебютантки",  хореография к спектаклю "Волшебное кольцо" ХГАТК им. В.А. Афанасьева,
            </p>
            <p class="common_description_text_full">
                а также к спектаклям «Кабала Святош», «Клинический случай» в Харьковском театре им.Пушкина.
            </p>
            <p class="common_description_text_full">
                В 2011 году Светлана и Александр открыли Центр танца "Miparti" для мужчин, женщин и детей любого возраста и физической подготовки, а также профессионалов, желающих повысить квалификацию и приобрести опыт на практике. Создавая свои шоу программы, танцевальные спектакли, мюзиклы и, синтезируя различные виды классического и современного искусства, развивают  лучшие танцевальные традиции.
            </p>
            <p class="common_description_text_full">
                Начиная с 2017 года на базе центра культурных инициатив были созданы такие проекты, как шоу «Бурлеск», «Капризы»,  «Чикаго» , танцевальный спектакль «Возрождение», а также тематические номера для концертов, проведены мастер классы по различным танцевальным направлениям.
            </p>
            <p class="common_description_text_full">
                Балет «Мипарти» принимает активное участие  в благотворительных концертах, проектах департамента культуры годХарькова, успешно гастролирует в Китае, Индии, Объединённых Арабских Эмиратах, Турции.
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
    <div class="common_description container">
        <div class="common_description_item">
            <p class="common_description_text">
                Хотите устроить незабываемый праздник?
            </p>
            <p class="common_description_text">
                У нас для вас найдутся предложения на любой вкус. Размах мероприятия зависит исключительно от ваших возможностей:
            </p>
            <p class="common_description_text_full">
                - постановка свадебного танца (а так же танцев свидетелей, родителей, танцевальные подарки-сюрпризы для жениха или/и невесты);                                    </p>
            <p class="common_description_text_full">
                - подготовка номеров для корпоративных вечеров;
            </p>
            <p class="common_description_text_full">
                - выступление профессионального балета «Мипарти».
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
    <div class="common_description container">
        <div class="common_description_item">
            <p class="common_description_text">
                Также мы можем предоставить на выбор несколько уникальных полиформатных шоу, с успехом зарекомендовавших себя не только на сцене Харькова, но и за рубежом.
            </p>
            <p class="common_description_text_full">
                Шоу длятся 45 минут и представляют собой цельную законченную постановку с продуманной драматургией. Но, в то же время, каждая их часть – это самодостаточный номер со своим неповторимым стилем, характером и историей, который, соответственно, может быть использован и самостоятельно.
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
    <div class="common_description container">
        <div class="common_description_item">
            <p class="common_description_text">
                А для самых взыскательных клиентов возможна постановка шоу «под ключ».
            </p>
            <p class="common_description_text">
                Нуждаетесь в хореографической помощи?
            </p>
            <p class="common_description_text">
                Мы справимся с задачей, независимо от уровня вашей начальной подготовки:
            </p>
            <p class="common_description_text_full">
                - поставим сольный, дуэтный, групповой номер для профессионалов и аматоров;
            </p>
            <p class="common_description_text_full">
                - предоставим услуги профессионального танцора/танцоров для подготовки и демонстрации номера;
            </p>
            <p class="common_description_text_full">
                - проведем мастер-классы в любом виде хореографии;
            </p>
            <p class="common_description_text_full">
                - подготовим профессиональных артистов и любителей к танцевальным, вокальным конкурсам;
            </p>
            <p class="common_description_text_full">
                - организуем профессиональную танцевальную поддержку артистам, вокалистам;
            </p>
            <p class="common_description_text_full">
                - поможем абитуриентам-хореографам, актерам, режиссерам подготовиться к вступительным экзаменам по нашему профилю.
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
    <div class="common_description container">
        <div class="common_description_item">
            <p class="common_description_text">
                А ещё:
            </p>
            <p class="common_description_text_full">
                - разработаем, изготовим, сдадим в аренду театральные и танцевальные костюмы;
            </p>
            <p class="common_description_text_full">
                - поставим танцевальное шоу на любое количество исполнителей, как на базе балета «Мипарти», так и на базе других коллективов.
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

<?php get_footer(); ?>


