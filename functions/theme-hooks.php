<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

/**
 *
 * Example:
 * <code>
 *      // Declare support for all hook types
 *      add_theme_support( 'wiz_hooks', array( 'all' ) );
 *
 *      // Declare support for certain hook types only
 *      add_theme_support( 'wiz_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support(
	'wiz_hooks', array(

		/**
		 * As a Theme developer, use the 'all' parameter, to declare support for all
		 * hook types.
		 * Please make sure you then actually reference all the hooks in this file,
		 * Plugin developers depend on it!
		 */
		'all',

		/**
		 * Themes can also choose to only support certain hook types.
		 * Please make sure you then actually reference all the hooks in this type
		 * family.
		 *
		 * When the 'all' parameter was set, specific hook types do not need to be
		 * added explicitly.
		 */
		'html',
		'body',
		'head',
		'header',
		'content',
		'entry',
		'comments',
		'sidebars',
		'sidebar',
		'footer',

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of THA supplied by the theme
	 * supports Core hooks.
	 */
	)
);

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 *      if ( current_theme_supports( 'wiz_hooks', 'header' ) )
 *          add_action( 'wiz_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool  $bool true.
 * @param array $args The hook type being checked.
 * @param array $registered All registered hook types.
 *
 * @return bool
 */
function wiz_current_theme_supports( $bool, $args, $registered ) {
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-wiz_hooks', 'wiz_current_theme_supports', 10, 3 );

/**
 * HTML <head> hooks
 *
 * $wiz_supports[] = 'head';
 */
function wiz_head_top() {
	do_action( 'wiz_head_top' );
}

/**
 * Site Header
 */
function wiz_header() {
	do_action( 'wiz_header' );
}

/**
 * After Header
 */
function wiz_after_header_block() {
	do_action( 'wiz_after_header_block' );
}

/**
 * Before Header
 */
function wiz_before_header_block() {
	do_action( 'wiz_before_header_block' );
}
 
/**
 * sitehead Top
 */
function wiz_sitehead_top() {
	do_action( 'wiz_sitehead_top' );
}

/**
 * sitehead
 */
function wiz_sitehead() {
	do_action( 'wiz_sitehead' );
}

/**
 * sitehead Bottom
 */
function wiz_sitehead_bottom() {
	do_action( 'wiz_sitehead_bottom' );
}

/**
 * Main Header bar top
 */
function wiz_main_header_bar_top() {
	do_action( 'wiz_main_header_bar_top' );
}

/**
 * Main Header bar bottom
 */
function wiz_main_header_bar_bottom() {
	do_action( 'wiz_main_header_bar_bottom' );
}

/**
 * Main Header Content
 */
function wiz_sitehead_content() {
	do_action( 'wiz_sitehead_content' );
}
/**
 * Main toggle button before
 */
function wiz_sitehead_toggle_buttons_before() {
	do_action( 'wiz_sitehead_toggle_buttons_before' );
}

/**
 * Main toggle buttons
 */
function wiz_sitehead_toggle_buttons() {
	do_action( 'wiz_sitehead_toggle_buttons' );
}

/**
 * Main toggle button after
 */
function wiz_sitehead_toggle_buttons_after() {
	do_action( 'wiz_sitehead_toggle_buttons_after' );
}


/**
 * Content while before
 */
function wiz_content_while_before() {
	do_action( 'wiz_content_while_before' );
}

/**
 * Content loop
 */
function wiz_content_loop() {
	do_action( 'wiz_content_loop' );
}

/**
 * Conten Page Loop.
 *
 * Called from page.php
 */
function wiz_content_page_loop() {
	do_action( 'wiz_content_page_loop' );
}

/**
 * Content while after
 */
function wiz_content_while_after() {
	do_action( 'wiz_content_while_after' );
}

/**
 * Semantic <entry> hooks
 *
 * $wiz_supports[] = 'entry';
 */
function wiz_entry_before() {
	do_action( 'wiz_entry_before' );
}

/**
 * Entry after
 */
function wiz_entry_after() {
	do_action( 'wiz_entry_after' );
}

/**
 * Entry content before
 */
function wiz_entry_content_before() {
	do_action( 'wiz_entry_content_before' );
}

/**
 * Entry content after
 */
function wiz_entry_content_after() {
	do_action( 'wiz_entry_content_after' );
}

/**
 * Entry Top
 */
function wiz_entry_top() {
	do_action( 'wiz_entry_top' );
}

/**
 * Entry bottom
 */
function wiz_entry_bottom() {
	do_action( 'wiz_entry_bottom' );
}

/**
 * Single Post Header Before
 */
function wiz_single_header_before() {
	do_action( 'wiz_single_header_before' );
}

/**
 * Single Post Header After
 */
function wiz_single_header_after() {
	do_action( 'wiz_single_header_after' );
}

/**
 * Single Post Header Top
 */
function wiz_single_header_top() {
	do_action( 'wiz_single_header_top' );
}

/**
 * Single Post Header Bottom
 */
function wiz_single_header_bottom() {
	do_action( 'wiz_single_header_bottom' );
}

/**
 * Entry content blog
 */
function wiz_entry_content_blog() {
	do_action( 'wiz_entry_content_blog' );
}

/**
 * Blog featured post section
 */
function wiz_blog_post_featured_format() {
	do_action( 'wiz_blog_post_featured_format' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $wiz_supports[] = 'sidebar';
 */
function wiz_sidebars_before() {
	do_action( 'wiz_sidebars_before' );
}

/**
 * Semantic <footer> hooks
 *
 * $wiz_supports[] = 'footer';
 */
function wiz_footer() {
	do_action( 'wiz_footer' );
}

/**
 * Footer top
 */
function wiz_footer_content_top() {
	do_action( 'wiz_footer_content_top' );
}

/**
 * Footer
 */
function wiz_footer_content() {
	do_action( 'wiz_footer_content' );
}

/**
 * Footer bottom
 */
function wiz_footer_content_bottom() {
	do_action( 'wiz_footer_content_bottom' );
}

/**
 * Archive header
 */
function wiz_archive_top_info() {
	do_action( 'wiz_archive_top_info' );
}

/**
 * Pagination
 */
function wiz_pagination() {
	do_action( 'wiz_pagination' );
}

/**
 * Entry content single
 */
function wiz_entry_content_single() {
	do_action( 'wiz_entry_content_single' );
}

/**
 * 404
 */
function wiz_404_page() {
	do_action( 'wiz_404_page' );
}

/**
 * 404 Page content template action.
 */
function wiz_404_content_template() {
	do_action( 'wiz_404_content_template' );
}
/**
 * Body Bottom
 */
function wiz_body_bottom() {
	do_action( 'wiz_body_bottom' );
}
/**
 *  Backward compatibility
 */
if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}