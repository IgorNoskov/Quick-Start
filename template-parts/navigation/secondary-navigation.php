<?php
/**
 * Template part for secondary navigation
 *
 * This is the template that displays secondary navigation.
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

<div class="secondary-navigation">

	<?php wp_nav_menu( array(
		'theme_location' => 'secondary',
		'container'      => false,
		'menu_class'     => 'secondary-navigation__nav-list',
		'fallback_cb'    => false,
	) ); ?>

</div>
