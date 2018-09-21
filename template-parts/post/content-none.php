<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

?>

<?php
if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

    <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.',
			'quick-start' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php else : ?>

    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
			'quick-start' ); ?></p>

	<?php get_search_form();

endif; ?>
