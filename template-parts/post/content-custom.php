<?php
/**
 * Template part for displaying single custom post content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * File Security Check.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>

    <header class="article__header">
		<?php the_title( '<h1 class=article__title">', '</h1>' ); ?>
        <div class="article__publish-date">
			<?php the_date(); ?>
        </div>
        <div class="category-list article__category-list">
	        <?php Theme_Helper::render_category_list( array(
				'taxonomy' => 'custom_category',
				'class'    => 'category-list__item',
			) ); ?>
        </div>
    </header>

    <div class="article__content">
		<?php the_content(); ?>
    </div>

    <div class="article__pagination">
		<?php wp_link_pages(); ?>
    </div>

    <div class="tag-list article__tag-list">
	    <?php Theme_Helper::render_category_list( array(
			'taxonomy' => 'custom_tag',
			'class'    => 'tag-list__item',
		) ); ?>
    </div>

</article>
