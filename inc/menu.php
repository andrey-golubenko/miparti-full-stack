<?php
                                /*** МЕНЮ ***/

// МЕНЮ Изменение атрибута id у тега li
add_filter('nav_menu_item_id', 'filter_menu_item_css_id', 10, 4);
function filter_menu_item_css_id ($menu_id, $item, $args, $depth){
    return /*$args->theme_location === 'top' ? '' : */$menu_id = '';}


// МЕНЮ Изменение атрибута class у тега li
add_filter('nav_menu_css_class', 'filter_menu_item_css_classes', 10, 4);
function filter_menu_item_css_classes($classes, $item, $args, $depth){
    if ( $depth === 0 ){ //если 1 уровень вложенности
        if (in_array( 'menu-item-has-children', $item->classes )) { // проверяем есть ли вложенное меню по наличию класса 'menu-item-has-children' и если есть, то добавляем свой класс и класс, кот. генерируется при влож. меню
            $classes = ['nav_link', 'menu-item-has-children'];
        }
        else { // если нет, то только свой класс
            $classes = ['nav_link'];
        }
    }
    elseif ($depth === 1) { // если 2-ой уровень вложенности
        $classes = ['nav_link_sub_menu_item']; // добавляем свой класс
    }
    if(($item->current && $depth === 1) || $item->current){
        $classes [] = 'menu_current_item'; // даём свой класс текущей странице меню
    }
    return $classes;
}


//МЕНЮ Изменение добавление доп. элементов (тегов) перед самими буквами текста в пунктах(е) МЕНЮ
add_filter( 'nav_menu_item_args', 'change_menu_item_args' , 10, 3);
function change_menu_item_args( $args, $item, $depth ) {
    if (  ( in_array( 'menu-item-has-children', $item->classes ) ) && ( $depth === 0 ) ) {
        $args->link_before = '<div class="nav_link_wrapper"><p>';
        $args->link_after = '</p>
                                <div class="nav_link_pin">
                                    <span class="nav_link_arrow_left"></span>
                                    <span class="nav_link_arrow_right"></span>
                                </div>
                            </div>
                            <span class="underline"></span>';
    }
    elseif ( ( !in_array( 'menu-item-has-children', $item->classes ) ) && $depth === 0) {
        $args->link_before = '<p>';
        $args->link_after = '</p><span class="underline"></span>';
    }
    elseif ( ( !in_array( 'menu-item-has-children', $item->classes ) ) && $depth === 1 ) {
        $args->link_before = '<p>';
        $args->link_after = '</p><span class="sub_underline"></span>';
    }
    return $args;
}


//МЕНЮ Изменение класса ссылкам
add_filter('nav_menu_link_attributes','filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth){
    $atts ['class'] = '';
    return $atts;
}
