<?php
/***** ВИДЖЕТ ПОИСКА *****/
//ИЗМЕНЯЕМ HTML ФОРМЫ ПОСИКА (в том числе и в ВИДЖЕТЕ ПОИСКА)
add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {
    $form = '
        <div class="single_news_sideBar_search">
        <form role="search" method="get" id="searchForm" action="' . home_url( '/' ) . '" class="search_form">
            <div class="search_form_item">
                <label class="search_form_item_label" for="search_request"><input type="text" value="' . get_search_query() . '" name="s" id="s" class="inputBox"  placeholder="&nbsp;" required /><span class="spanBox">Введите поисковый запрос</span></label>
                <span class="search_glass">&#8981;</span>
            </div>
        </form>
    </div>';
    return $form;
}
//ФИЛЬТР ПАГИНАЦИИ ДЛЯ ВИДЖЕТА ПОИСКА
// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'widget_nav_template', 10, 2 );
function widget_nav_template( $template, $class ){
    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

/** ФУНКЦИЯ для ПОДСВЕТКИ СЛОВ ПОИСКА в WordPress **/
add_filter( 'the_content', 'kama_search_backlight' );
add_filter( 'kama_excerpt', 'kama_search_backlight' );
add_filter( 'the_title', 'kama_search_backlight' );
function kama_search_backlight( $text ){
// Настройки -----------
    $styles = ['',
        'color: #000; background: #99ff66;',
        'color: #000; background: #ffcc66;',
        'color: #000; background: #99ccff;',
        'color: #000; background: #ff9999;',
        'color: #000; background: #FF7EFF;',
    ];
// только для страниц поиска...
    if ( ! is_search() )
        return $text;
    $query_terms = get_query_var('search_terms');
    if( empty($query_terms) )
        $query_terms = array_filter( [ get_query_var('s') ] );
    if( empty($query_terms) )
        return $text;
    $n = 0;
    foreach( $query_terms as $term ){
        $n++;
        $term = preg_quote( $term, '/' );
        $text = preg_replace_callback( "/$term/iu", function($match) use ($styles,$n){
            return '<span style="'. $styles[ $n ] .'">'. $match[0] .'</span>';
        },
            $text );
    }
    return $text;
}
