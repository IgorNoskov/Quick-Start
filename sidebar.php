<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0
 * @version 1.0
 */

/**
 * File Security Check.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>

<aside class="site-aside" role="complementary" aria-label="<?php esc_attr_e( 'Site sidebar', 'quick-start' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
