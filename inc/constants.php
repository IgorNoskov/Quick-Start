<?php
/**
 * Theme Constants
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
 * Theme version.
 */
define( 'THEME_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );


/**
 * Sets the path to the parent theme directory.
 */
define( 'THEME_DIR', get_template_directory() );


/**
 * Sets the path to the parent theme directory URI.
 */
define( 'THEME_URI', get_template_directory_uri() );
