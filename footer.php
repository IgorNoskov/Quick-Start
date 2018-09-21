<?php
/**
 * The template for displaying the footer
 *
 * Contains the footer and the closing of the .page div
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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

</div><!-- .site-content -->

<footer id="js-siteFooter" class="site-footer" role="contentinfo">

    <div class="site-footer__inner">

		<?php get_template_part( 'template-parts/footer/site-info' ); ?>

		<?php if ( has_nav_menu( 'secondary' ) ) :
			get_template_part( 'template-parts/navigation/secondary-navigation' );
		endif; ?>

    </div><!-- .site-footer__inner -->

</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
