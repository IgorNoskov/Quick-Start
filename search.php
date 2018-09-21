<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

				<?php if ( have_posts() ) :
					printf( __( 'Search Results for: %s', 'quick-start' ), '<span>' . get_search_query() . '</span>' );
				else :
					_e( 'Nothing Found', 'quick-start' );
				endif; ?>

            </h1>
        </header>

        <div class="content-area">

			<?php if ( have_posts() ) : ?>

                <div class="posts-wrapper" id="js-postsWrapper">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/post/content', 'excerpt' );

					endwhile; ?>

                </div>

				<?php Theme_Helper::render_post_pagination();

			else : ?>

                <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
						'quick-start' ); ?></p>

				<?php get_search_form();

			endif; ?>

        </div>

    </main>

<?php get_sidebar(); ?>

<?php get_footer();
