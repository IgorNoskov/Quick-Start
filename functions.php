<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
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

/**
 * Loads constants.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/constants.php';

/**
 * Setups theme.
 */
require_once THEME_DIR . '/inc/setup.php';

/**
 * Loads widgets.
 */
require_once THEME_DIR . '/inc/widgets.php';

/**
 * Loads admin functions.
 */
require_once THEME_DIR . '/inc/admin.php';

/**
 * Loads enqueue functions.
 */
require_once THEME_DIR . '/inc/enqueue.php';

/**
 * Loads ajax functions.
 */
require_once THEME_DIR . '/inc/ajax.php';

/**
 * Loads template hooks.
 */
require_once THEME_DIR . '/inc/hooks.php';

/**
 * Loads customizer.
 */
require_once THEME_DIR . '/inc/customizer.php';

/**
 * Loads helpers.
 */
require_once THEME_DIR . '/inc/helpers.php';
