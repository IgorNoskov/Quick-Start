<?php
/**
 * The template for displaying archive pages
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

        <header class="page-header">
            <h1 class="page-header__title">
				<?php the_archive_title(); ?>
            </h1>
            <div class="page-header__taxonomy-description">
				<?php the_archive_description(); ?>
            </div>
        </header>

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

<?php get_sidebar(); ?>

<?php get_footer();
