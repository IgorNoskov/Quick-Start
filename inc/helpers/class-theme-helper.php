<?php
/**
 * Theme helper
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0.0
 * @version 1.0.0
 */


/**
 * Theme helper class.
 *
 * @since 1.0.0
 */
class Theme_Helper {
	/**
	 * Renders the site title for the selective refresh partial.
	 *
	 * @since 1.0.0
	 */
	public static function render_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Renders the site tagline for the selective refresh partial.
	 *
	 * @since 1.0.0
	 */
	public static function render_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Renders theme post pagination.
	 *
	 * @since 1.0.0
	 */
	public static function render_post_pagination() {
		$pagination_type = get_theme_mod( 'theme_customizer_post_pagination_type' );

		if ( $pagination_type === 'default' ) {
			the_posts_pagination();
		} else {
			global $wp_query;

			if ( $wp_query->max_num_pages > 1 ) :

				wp_localize_script( 'public-theme-scripts', 'theme_post_pagination_vars', array(
					'query'        => json_encode( $wp_query->query_vars ),
					'current_page' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
					'max_page'     => $wp_query->max_num_pages,
				) );

				wp_enqueue_script( 'theme_post_pagination_vars' ); ?>

                <div>
                    <button id="js-loadMorePosts" class="button">
						<?php _e( 'Show more', 'quick-start' ); ?>
                    </button>
                </div>

			<?php endif;
		}
	}

	/**
	 * Renders theme category list for default and custom taxonomy.
	 *
	 * @since 1.0.0
	 *
	 * @param string|array $params Optional. Default empty.
	 */
	public static function render_category_list( $params = '' ) {
		$post_type = get_post_type();

		$custom_post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'names', 'and' );

		$default_params = array(
			'class'    => '',
			'taxonomy' => '',
		);

		$output = '';
		$params = wp_parse_args( $params, $default_params );

		if ( $post_type === 'post' ) {
			$categories = get_the_category();

			if ( $categories ) {
				$category_array = [];

				foreach ( $categories as $category ) {
					$category_array[] = '<a href="' . get_category_link( $category->term_id ) . '" class="' . esc_attr( $params['class'] ) . '">' . $category->name . '</a>';
				}

				$output .= esc_html__( 'Categories: ', 'quick-start' );
				$output .= implode( ', ', $category_array );
			}

		} elseif ( in_array( $post_type, $custom_post_types ) ) {
			$post_id = get_the_ID();

			$terms = get_terms( array(
				'taxonomy'   => $params['taxonomy'],
				'object_ids' => $post_id,
			) );

			if ( $terms ) {
				$terms_array = [];

				foreach ( $terms as $term ) {
					$terms_array[] = '<a href="' . get_term_link( $term->term_id,
							$term->taxonomy ) . '" class="' . esc_attr( $params['class'] ) . '">' . $term->name . '</a>';
				}

				$output .= esc_html__( 'Taxonomies: ', 'quick-start' );
				$output .= implode( ', ', $terms_array );
			}
		}

		echo $output;
	}
}
