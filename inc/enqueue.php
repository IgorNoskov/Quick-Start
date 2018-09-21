<?php
/**
 * Theme Enqueue functions
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

if ( ! function_exists( 'theme_register_scripts' ) ) :

	/**
	 * Registers theme styles and scripts.
	 *
	 * @since 1.0.0
	 */
	function theme_register_scripts() {

		// registers stylesheets
		$register_styles = array(
			'public-theme-styles' => array(
				'src' => THEME_URI . '/assets/public/css/public-theme-styles.min.css',
			),
		);

		foreach ( $register_styles as $name => $props ) {
			$deps  = isset( $props['deps'] ) ? $props['deps'] : array();
			$ver   = isset( $props['ver'] ) ? $props['ver'] : THEME_VERSION;
			$media = isset( $props['media'] ) ? $props['media'] : 'all';

			wp_register_style( $name, $props['src'], $deps, $ver, $media );
		}

		// registers scripts
		$register_scripts = array(
			'public-theme-scripts' => array(
				'src'       => THEME_URI . '/assets/public/js/public-theme-scripts.min.js',
				'deps'      => array( 'jquery' ),
				'in_footer' => true,
			),
		);

		foreach ( $register_scripts as $name => $props ) {
			$deps      = isset( $props['deps'] ) ?: array();
			$ver       = isset( $props['ver'] ) ?: THEME_VERSION;
			$in_footer = isset( $props['in_footer'] ) ?: false;
			wp_register_script( $name, $props['src'], $deps, $ver, $in_footer );
		}
	}

endif;

if ( ! function_exists( 'theme_enqueue_scripts' ) ) :
	/**
	 * Enqueues scripts and styles.
	 *
	 * @since 1.0.0
	 */
	function theme_enqueue_scripts() {

		theme_register_scripts();

		// enqueue stylesheets
		wp_enqueue_style( 'public-theme-styles' );

		// enqueue scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'public-theme-scripts' );

		// enqueue comment reply script on singular pages
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// variables for using in js
		$theme_vars = array(
			// internationalization
			'i18n'      => array(
				'button_loading_text' => __( 'Loading...', 'quick-start' ),
			),
			'theme_uri' => THEME_URI,
			'ajaxurl'   => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'public-theme-scripts', 'theme_vars', $theme_vars );

	}

	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

endif;
