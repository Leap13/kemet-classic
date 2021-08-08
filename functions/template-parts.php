<?php
/**
 * Template parts
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

add_action( 'kemet_entry_content_single', 'kemet_entry_content_single_template' );
add_action( 'kemet_entry_content_blog', 'kemet_entry_content_blog_template' );
add_action( 'kemet_404_page', 'kemet_404_page_template' );

/**
 * Single post markup
 */
if ( ! function_exists( 'kemet_entry_content_single_template' ) ) {

	/**
	 * Single post markup
	 *
	 * => Used in files:
	 *
	 * /templates/content-single.php
	 */
	function kemet_entry_content_single_template() {
		get_template_part( 'templates/single/single-layout' );
	}
}

/**
 * Blog post list markup for blog & search page
 */
if ( ! function_exists( 'kemet_entry_content_blog_template' ) ) {

	/**
	 * Blog post list markup for blog & search page
	 *
	 * => Used in files:
	 *
	 * /templates/content-blog.php
	 * /templates/content-search.php
	 */
	function kemet_entry_content_blog_template() {
		get_template_part( 'templates/blog/blog-layout' );
	}
}

/**
 * 404 markup
 */
if ( ! function_exists( 'kemet_404_page_template' ) ) {

	/**
	 * 404 markup
	 *
	 * => Used in files:
	 *
	 * /templates/content-404.php
	 */
	function kemet_404_page_template() {
		get_template_part( 'templates/404/404-layout' );
	}
}
