<?php
/**
 * Template part for primary navigation
 *
 * This is the template that displays primary navigation.
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

<nav id="js-primaryNavigation" class="primary-navigation" role="navigation"
     aria-label="<?php esc_attr_e( 'Primary menu', 'quick-start' ); ?>">

    <button type="button" class="primary-navigation__btn-close" id="js-buttonCloseSideMenu">&times;</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => false,
		'menu_class'     => 'nav-list',
		'fallback_cb'    => false,
	) ); ?>

</nav>
