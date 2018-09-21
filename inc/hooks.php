<?php
/**
 * Theme Hooks
 *
 * @link https://codex.wordpress.org/Plugin_API/Hooks
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

if ( ! function_exists( 'theme_excerpt_more' ) ) :
	/**
	 * Replaces [...] on ... in an excerpts.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more
	 *
	 * @return string
	 */
	function theme_excerpt_more( $more ) {
		return '&hellip;';
	}

endif;

add_filter( 'excerpt_more', 'theme_excerpt_more' );

if ( ! function_exists( 'theme_taxonomy_filter' ) ) :
	/**
	 * Adds custom post types in query.
	 *
	 * It allows to use the_posts_pagination() for custom post types.
	 *
	 * @since 1.0.0
	 *
	 * @param object $query
	 *
	 * @return object
	 */
	function theme_taxonomy_filter( $query ) {

		if ( $query->is_tax && empty( $query->query_vars['suppress_filters'] ) ) {
			$custom_post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'names', 'and' );
			$query->set( 'post_type', array_merge( array( 'post', 'page' ), $custom_post_types ) );
		}

		return $query;
	}

	add_filter( 'pre_get_posts', 'theme_taxonomy_filter' );

endif;
