<?php
/**
 * The template for displaying latest blog posts
 *
 * The template file home.php is used to render
 * the blog posts index, whether it is being used as the
 * front page or on separate static page. If home.php does
 * not exist, WordPress will use index.php.
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
				<?php single_post_title(); ?>
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

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif; ?>

        </div>

    </main>

<?php get_sidebar(); ?>

<?php get_footer();
