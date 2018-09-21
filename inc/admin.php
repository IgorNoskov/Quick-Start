<?php
/**
 * Theme Admin functions
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

if ( ! function_exists( 'theme_admin_enqueue_scripts' ) ) :
	/**
	 * Enqueues scripts and styles in admin panel.
	 *
	 * @since 1.0.0
	 */
	function theme_admin_enqueue_scripts() {

		// variables for using in js
		$theme_admin_vars = array(
			// internationalization
			'i18n' => array(
				'error_input_required' => __( 'The field is required.', 'quick-start' ),
			),
		);

		wp_localize_script( 'jquery', 'theme_admin_vars', $theme_admin_vars );

	}

	add_action( 'admin_enqueue_scripts', 'theme_admin_enqueue_scripts' );

endif;

if ( ! function_exists( 'theme_enqueue_customizer_control_scripts' ) ) :
	/**
	 * Enqueues customizer control scripts.
	 *
	 * @since 1.0.0
	 */
	function theme_enqueue_customizer_control_scripts() {
		wp_enqueue_script( 'theme-customizer-control', THEME_URI . '/assets/admin/js/theme-customizer-control.js',
			array( 'jquery', 'customize-controls' ), THEME_VERSION, true );
	}

	add_action( 'customize_controls_enqueue_scripts', 'theme_enqueue_customizer_control_scripts' );

endif;

if ( ! function_exists( 'theme_enqueue_customizer_preview_scripts' ) ) :
	/**
	 * Enqueues customizer preview scripts.
	 *
	 * @since 1.0.0
	 */
	function theme_enqueue_customizer_preview_scripts() {
		wp_enqueue_script( 'theme-customizer-preview', THEME_URI . '/assets/admin/js/theme-customizer-preview.js',
			array( 'jquery', 'customize-preview' ), THEME_VERSION, true );
	}

	add_action( 'customize_preview_init', 'theme_enqueue_customizer_preview_scripts' );

endif;
