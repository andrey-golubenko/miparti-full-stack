<?php
function miparti_the_breadcrumb(){
	global $post;
	if(!is_home()){
		echo '<span class="breadcrumbs_items_source"> 
                  <a href=" '.site_url().' ">
                      <span class="breadcrumbs_items_context">Главная <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span>
                      </span>
                  </a>
              </span>';
		if(is_single()){ // записи
			echo '<span class="breadcrumbs_items_source">
                      <span class="breadcrumbs_items_context"> ' . get_the_category_list(', ') . '
                           <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span>
                      </span>
                  </span>';
			echo '<span class="breadcrumbs_items_location">' . the_title() . '</span>';
		}
		elseif (is_page()) { // страницы
			if ($post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '
                        <span class="breadcrumbs_items_source"> 
                            <a href=" '.get_permalink($page->ID).' ">
                              <span class="breadcrumbs_items_context">' . get_the_title($page->ID) . ' <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span>
                              </span>
                            </a>
                        </span>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb;
			}
			echo the_title();
		}
		elseif (is_category()) { // категории
			global $wp_query;
			$obj_cat = $wp_query->get_queried_object();
			$current_cat = $obj_cat->term_id;
			$current_cat = get_category($current_cat);
			$parent_cat = get_category($current_cat->parent);
			if ($current_cat->parent != 0)
				echo(get_category_parents((int)$parent_cat, TRUE, ' <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span> '));
			echo single_cat_title(' <span class="breadcrumbs_items_location"> ') . '</span>';
		}
		elseif (is_search()) { // страницы поиска
			echo 'Результаты поиска для "' . get_search_query() . '"';
		}
		elseif (is_tag()) { // теги (метки)
			echo ' <span class="breadcrumbs_items_location">' . single_tag_title('', false)  . '</span>';
		}
		elseif (is_day()) { // архивы (по дням)
			echo '<span class="breadcrumbs_items_source"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . ' <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span></a></span>  ';
			echo '<span class="breadcrumbs_items_source"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . ' <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span></a></span></a></span> ';
			echo '<span class="breadcrumbs_items_location">' . get_the_time('d') . '</span>';
		}
		elseif (is_month()) { // архивы (по месяцам)
			echo '<span class="breadcrumbs_items_source"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . ' <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span></a></span>';
			echo '<span class="breadcrumbs_items_location">' . get_the_time('F') . '</span> ';
		}
		elseif (is_year()) { // архивы (по годам)
			echo ' <span class="breadcrumbs_items_location">' . get_the_time('Y') . '</span>';
		}
		elseif (is_author()) { // авторы
			global $author;
			$userdata = get_userdata($author);
			echo ' <span class="breadcrumbs_items_location">Опубликовал(а) ' . $userdata->display_name . '</span>';
		}
		elseif (is_404()) { // если страницы не существует
			echo 'Ошибка 404';
		}

		if (get_query_var('paged')) // номер текущей страницы
			echo ' (' . get_query_var('paged').'-я страница)';

	} else { // главная
		$pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
		if($pageNum>1)
			echo '<span class="breadcrumbs_items_source"><a href="'.site_url().'">Главная <span class="arrow_svg_wrapper"><svg xmlns="http://www.w3.org/2000/svg" class="breadcrumbs_arrow" viewBox="0 0 24 24"><path d="M22 12l-20 12 7.289-12-7.289-12z"/></svg></span></a></span><span class="breadcrumbs_items_location"> '.$pageNum.'-я страница</span>';
		else
			echo '<span class="breadcrumbs_items_location">Вы находитесь на Главной странице</span>>';
	}
}