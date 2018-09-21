<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
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

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();

			if ( '1' === $comments_number ) :
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'quick-start' ), get_the_title() );
			else :
				printf(
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'quick-start'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			endif; ?>

        </h2>

        <div class="comment-list">
	        <?php wp_list_comments( array(
				'avatar_size' => 32,
				'style'       => 'div',
				'short_ping'  => true,
				'reply_text'  => __( 'Reply', 'quick-start' ),
	        ) ); ?>
        </div>

		<?php the_comments_pagination( array(
			'prev_text' => __( 'Previous', 'quick-start' ),
			'next_text' => __( 'Next', 'quick-start' ),
		) );

	endif;

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <p class="no-comments"><?php _e( 'Comments are closed.', 'quick-start' ); ?></p>

	<?php endif;

	comment_form(); ?>

</div>
