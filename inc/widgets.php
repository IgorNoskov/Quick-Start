<?php
/**
 * Register widgets and sidebar areas
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

if ( ! function_exists( 'theme_widgets_init' ) ) :
	/**
	 * Registered widgets and sidebars area.
	 *
	 * @since 1.0.0
	 */
	function theme_widgets_init() {

		/**
		 * Registered sidebars.
		 */

		register_sidebar( array(
			'name'          => __( 'Blog Sidebar', 'quick-start' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.',
				'quick-start' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		/**
		 * Loaded widgets.
		 */
		require_once THEME_DIR . '/inc/widgets/class-theme-example-widget.php';

		/**
		 * Registered widgets.
		 */
		register_widget( 'Theme_Example_Widget' );
	}

	add_action( 'widgets_init', 'theme_widgets_init' );

endif;
