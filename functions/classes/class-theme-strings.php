<?php
/**
 * Wiz Theme Strings
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

/**
 * Default Strings
 */
if ( ! function_exists( 'wiz_theme_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function wiz_theme_strings( $key, $echo = true ) {

		$defaults = apply_filters(
			'wiz_theme_strings', array(

				// Header.
				'string-header-skip-link'                => __( 'Skip to content', 'wiz' ),

				// 404 Page Strings.
				'string-404-title'                   => __( 'Oops! Looks Like You Got Lost', 'wiz' ),

				// Search Page Strings.
				'string-search-nothing-found'            => __( 'Nothing Found', 'wiz' ),
				'string-search-nothing-found-message'    => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wiz' ),
				'string-full-width-search-message'       => __( 'Start typing and press enter to search', 'wiz' ),
				'string-full-width-search-placeholder'   => __( 'Start Typing&hellip;', 'wiz' ),
				'string-header-cover-search-placeholder' => __( 'Start Typing&hellip;', 'wiz' ),
				'string-search-input-placeholder'        => __( 'Search &hellip;', 'wiz' ),

				// Comment Template Strings.
				'string-comment-reply-link'              => __( 'Reply', 'wiz' ),
				'string-comment-edit-link'               => __( 'Edit', 'wiz' ),
				'string-comment-awaiting-moderation'     => __( 'Your comment is awaiting moderation.', 'wiz' ),
				'string-comment-title-reply'             => __( 'Leave a Comment', 'wiz' ),
				'string-comment-cancel-reply-link'       => __( 'Cancel Reply', 'wiz' ),
				'string-comment-label-submit'            => __( 'Post Comment &raquo;', 'wiz' ),
				'string-comment-label-message'           => __( 'Write your Comment here..', 'wiz' ),
				'string-comment-label-name'              => __( 'Name*', 'wiz' ),
				'string-comment-label-email'             => __( 'Email*', 'wiz' ),
				'string-comment-label-website'           => __( 'Website', 'wiz' ),
				'string-comment-closed'                  => __( 'Comments are closed.', 'wiz' ),
				'string-comment-navigation-title'        => __( 'Comment navigation', 'wiz' ),
				'string-comment-navigation-next'         => __( 'Newer Comments', 'wiz' ),
				'string-comment-navigation-previous'     => __( 'Older Comments', 'wiz' ),

				// Blog Default Strings.
				'string-blog-page-links-before'          => __( 'Pages:', 'wiz' ),
				'string-blog-meta-leave-a-comment'       => __( 'Leave a Comment', 'wiz' ),
				'string-blog-meta-one-comment'           => __( '1 Comment', 'wiz' ),
				'string-blog-meta-multiple-comment'      => __( '% Comments', 'wiz' ),
				'string-blog-navigation-next'            => __( 'Next >', 'wiz' ),
				'string-blog-navigation-previous'        =>  __( '< Previous', 'wiz' ),

				// Single Post Default Strings.
				'string-single-page-links-before'        => __( 'Pages:', 'wiz' ),
				/* translators: 1: Post type label */
				'string-single-navigation-next'          => __( 'Next %s >', 'wiz' ),
				/* translators: 1: Post type label */
				'string-single-navigation-previous'      => __( '< Previous %s', 'wiz' ),

				// Content None.
				'string-content-nothing-found-message'   => __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wiz' ),

			)
		);

		if ( is_rtl() ) {
			$defaults['string-blog-navigation-next']     = __( 'Next >', 'wiz' );
			$defaults['string-blog-navigation-previous'] = __( '< Previous', 'wiz' );

			/* translators: 1: Post type label */
			$defaults['string-single-navigation-next'] = __( 'Next %s >', 'wiz' );
			/* translators: 1: Post type label */
			$defaults['string-single-navigation-previous'] = __( '< Previous %s', 'wiz' );
		}

		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
}
