<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section.
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

    <header id="js-siteHeader" class="site-header" role="banner">

        <div class="site-header__inner">

            <button id="js-buttonOpenSideMenu" type="button" class="site-header__btn">&#9776;</button>

			<?php get_template_part( 'template-parts/header/site-branding' ); ?>

			<?php if ( has_nav_menu( 'primary' ) ) :
				get_template_part( 'template-parts/navigation/primary-navigation' );
			endif; ?>

        </div><!-- .site-header__inner -->

    </header><!-- .site-header -->

    <div id="js-siteContent" class="site-content site-content_<?php echo get_theme_mod( 'theme_customizer_site_layout_type',
		'main_left' ); ?>">
