<?php
/**
 * The template for displaying all single custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

get_header(); ?>

    <main class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/post/content', 'custom' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; ?>

    </main>

<?php get_sidebar(); ?>

<?php get_footer();