<?php
/**
 * Template Name: No sidebar, full width
 *
 * The template for displaying page without sidebar and full width content.
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

get_header(); ?>

    <main class="site-main site-main_width_full" role="main">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/page/content', 'page' );

		endwhile; ?>

    </main>

<?php get_footer();
