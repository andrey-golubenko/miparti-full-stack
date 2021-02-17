<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>
<div class="search_no_results no_find">
		<h3 class="search_no_results_heading"><?php esc_html_e( 'Ничего не найдено' ); ?></h3>
	<div class="search_no_results_content container">
		<?php
		if ( is_search() ) :
		?>
			<p><?php esc_html_e( 'Извините, но соответствий Вашим условиям поиска не найдено.'); ?></p>
			<p><?php esc_html_e( 'Пожалуйста, попробуйте снова, применив другие ключевые слова.'); ?></p>
			<?php
			get_search_form();
		else :
			?>
			<p><?php esc_html_e( 'Кажется мы можем &rsquo;t найти то, что Вы &rsquo;re ищете. Возможно поиск поможет Вам.'); ?></p>
			<?php
			get_search_form();
		endif;
		?>
	</div>
</div>