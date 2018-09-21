<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

        <header class="page-header">
            <h1 class="page-header__title">
				<?php _e( 'Oops! That page can&rsquo;t be found.', 'quick-start' ); ?>
            </h1>
        </header>

        <div class="content-area">
            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?',
					'quick-start' ); ?></p>

			<?php get_search_form(); ?>
        </div>

    </main>

<?php get_sidebar(); ?>

<?php get_footer();
