<?php
/**
 * Theme Helpers
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
 * Loads helper classes.
 */
require_once THEME_DIR . '/inc/helpers/class-theme-helper.php';
require_once THEME_DIR . '/inc/helpers/class-theme-sanitizer.php';
require_once THEME_DIR . '/inc/helpers/class-theme-validator.php';
