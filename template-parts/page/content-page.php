<?php
/**
 * Template part for displaying page content
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

	<?php if ( ! is_front_page() ) : ?>

        <header class="article__header">
			<?php the_title( '<h1 class="article__title">', '</h1>' ); ?>
        </header>

	<?php endif; ?>

    <div class="article__content">
		<?php the_content(); ?>
    </div>

</article>
