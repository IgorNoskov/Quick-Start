<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

    <main class="site-main" role="main">

		<?php if ( ! is_front_page() ) : ?>

            <header class="page-header">
                <h1 class="page-header__title">
					<?php _e( 'Posts', 'quick-start' ); ?>
                </h1>
            </header>

		<?php endif; ?>

        <div class="content-area">

			<?php if ( have_posts() ) : ?>

                <div class="posts-wrapper" id="js-postsWrapper">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/post/content', 'excerpt' );

					endwhile; ?>

                </div>

				<?php Theme_Helper::render_post_pagination();

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif; ?>
        </div>

    </main>

<?php get_sidebar() ?>

<?php get_footer();
