<?php
/**
 * Template part for displaying posts
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

$title     = get_the_title() ?: __( 'No title', 'quick-start' );
$permalink = get_permalink(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-preview' ); ?>>

    <h2 class="post-preview__title">
        <a href="<?php echo esc_url( $permalink ); ?>" rel="bookmark">
	        <?php echo $title; ?>
        </a>
    </h2>

	<?php if ( has_post_thumbnail() ) : ?>
        <div class="post-preview__thumbnail-wrapper">
            <a href="<?php echo esc_url( $permalink ); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
            </a>
        </div>
	<?php endif; ?>

    <div class="post-preview__content">
        <div class="post-preview__publish-date">
			<?php echo get_the_date(); ?>
        </div>
        <div class="post-preview__description">
			<?php the_excerpt(); ?>
        </div>
    </div>

</article>
