<?php
/**
 * Theme setup
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

if ( ! function_exists( 'theme_add_setting' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 */

	function theme_add_setting() {
		/*
		 * Makes theme available for translation.
		 * Translations can be filed at WordPress.org.
		 */
		load_theme_textdomain( 'quick-start', THEME_DIR . '/languages' );

		/**
		 * Registers custom menu.
		 */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'quick-start' ),
			'secondary'  => __( 'Secondary Menu', 'quick-start' ),
		) );

		/*
		 * This feature adds RSS feed links to HTML <head>.
		 *
		 * @link https://codex.wordpress.org/Automatic_Feed_Links
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enables support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Set the default content width.
		$GLOBALS['content_width'] = 800;

		/*
		 * Lets WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enables support for Post Formats.
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
		) );

		/*
		 * Switches default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Allows shortcodes in widgets.
		 */
		add_filter( 'widget_text', 'do_shortcode' );

		/**
		 * Adds theme support for Custom Logo.
		 */
		add_theme_support( 'custom-logo', array(
			'width'       => 100,
			'height'      => 100,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/**
		 * Adds theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Adds custom background for body.
		 */
		add_theme_support( 'custom-background' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( 'assets/admin/css/editor-style.css' );

		/*
		 * Defines and register starter content to showcase the theme on new sites.
		 */
		$starter_content = array(
			'widgets'   => array(
				// Place three core-defined widgets in the sidebar area.
				'sidebar-1' => array(
					'search',
					'text_about',
				),
			),

			// Indicates the core-defined pages to create and add custom thumbnails to some of them.
			'posts'     => array(
				'home' => array(
					'post_type'    => 'page',
					'post_title'   => __( 'Home', 'quick-start' ),
					'post_content' => __( 'Welcome to your site! This is your homepage, which is what most visitors will see when they come to your site for the first time.',
						'quick-start' ),
				),
				'blog' => array(
					'post_title' => __( 'Blog', 'quick-start' ),
				),
			),

			// Default to a static front page and assign the front and posts pages.
			'options'   => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),

			// Sets up nav menus for each of the two areas registered in the theme.
			'nav_menus' => array(
				// Assign a menu to the "top" location.
				'top' => array(
					'name'  => __( 'Top Menu', 'quick-start' ),
					'items' => array(
						'link_home',
						'page_blog',
					),
				),
			),
		);

		add_theme_support( 'starter-content', $starter_content );
	}

	add_action( 'after_setup_theme', 'theme_add_setting' );

endif;

/**
 * Flushes rewrite rules after theme switch.
 */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
