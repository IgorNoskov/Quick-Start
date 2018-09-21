<?php
/**
 * Template part for site branding
 *
 * This is the template that displays site logo, name and description.
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

<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
        <div class="site-branding__logo">
			<?php the_custom_logo(); ?>
        </div>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'header_text', true ) ) : ?>

        <div id="js-headerSiteInfo">

			<?php echo ( is_front_page() ) ? '<h1 class="site-branding__heading">' : ''; ?>

            <a class="site-branding__link" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
               title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
                <span id="js-siteName" class="site-branding__name">
                    <?php Theme_Helper::render_blogname(); ?>
                </span>
                <span id="js-siteDescription" class="site-branding__description">
                    <?php Theme_Helper::render_blogdescription(); ?>
                </span>
            </a>

			<?php echo ( is_front_page() ) ? '</h1>' : ''; ?>

        </div>

	<?php endif; ?>

</div>
