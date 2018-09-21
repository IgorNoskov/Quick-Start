<?php
/**
 * Template Name: Blank
 *
 * The template for displaying page without header, footer, sidebar.
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

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="js-site" class="site">

    <div id="js-siteContent"
         class="site-content site-content_blank">

        <main class="site-main site-main_width_full" role="main">

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

			endwhile; ?>

        </main>

    </div><!-- .site-content -->

</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
