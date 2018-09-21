<?php
/**
 * Ajax functions
 *
 * @link https://codex.wordpress.org/AJAX_in_Plugins
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

if ( ! function_exists( 'load_more_posts' ) ) :

	/**
	 * Ajax load posts.
	 *
	 * @since 1.0.0
	 */
	function load_more_posts() {
		$args                = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged']       = $_POST['page'] + 1;
		$args['post_status'] = 'publish';

		global $post;

		$posts = get_posts( $args );

		foreach ( $posts as $post ) : setup_postdata( $post );

			get_template_part( 'template-parts/post/content', 'excerpt' );

		endforeach;

		wp_reset_postdata();

		die();
	}

	add_action( 'wp_ajax_load_more_posts', 'load_more_posts' );
	add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );

endif;
