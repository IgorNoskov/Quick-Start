<?php
/**
 * Template part for displaying single post content
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
		<?php the_title( '<h1 class="article__title">', '</h1>' ); ?>

		<?php if ( '' !== get_the_post_thumbnail() ) : ?>
            <div class="article__thumbnail">
				<?php the_post_thumbnail( 'large', array( 'class' => 'article__thumbnail-img' ) ); ?>
            </div>
		<?php endif; ?>

        <div class="article__publish-date">
			<?php echo get_the_date(); ?>
        </div>
        <div class="category-list article__category-list">
	        <?php Theme_Helper::render_category_list( array( 'class' => 'category-list__item' ) ); ?>
        </div>
    </header>

    <div class="article__content">
		<?php the_content(); ?>
    </div>

    <div class="article__pagination">
		<?php wp_link_pages(); ?>
    </div>

    <div class="tag-list article__tag-list">
		<?php echo get_the_tag_list( __( 'Tags: ', 'quick-start' ), ', ' ); ?>
    </div>

</article>
