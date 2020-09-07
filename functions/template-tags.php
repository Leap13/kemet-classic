<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Wiz
 */

if ( ! function_exists( 'wiz_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wiz_entry_footer() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';

			/**
			 * Get default strings.
			 *
			 * @see wiz_theme_strings
			 */
			comments_popup_link( wiz_theme_strings( 'string-blog-meta-leave-a-comment', false ), wiz_theme_strings( 'string-blog-meta-one-comment', false ), wiz_theme_strings( 'string-blog-meta-multiple-comment', false ) );
			echo '</span>';
		}

		wiz_edit_post_link(

			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'wiz' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
