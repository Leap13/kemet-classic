<?php
/**
 * Deprecated Filters of Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.23
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Depreciating kemet_color_palletes filter.
add_filter( 'kemet_color_palettes', 'deprecated_kemet_color_palette', 10, 1 );

/**
 * Kemet Color Palettes
 *
 * @since 1.0.23
 * @param array $color_palette  customizer color palettes.
 * @return array  $color_palette updated customizer color palettes.
 */
function deprecated_kemet_color_palette( $color_palette ) {

	$color_palette = kemet_apply_filters_deprecated( 'kemet_color_palletes', array( $color_palette ), '1.0.22', 'kemet_color_palettes', '' );

	return $color_palette;
}


// Deprecating kemet_sigle_post_navigation_enabled filter.
add_filter( 'kemet_single_post_navigation_enabled', 'deprecated_kemet_sigle_post_navigation_enabled', 10, 1 );

/**
 * Kemet Single Post Navigation
 *
 * @since 1.0.27
 * @param boolean $post_nav true | false.
 * @return boolean $post_nav true for enabled | false for disable.
 */
function deprecated_kemet_sigle_post_navigation_enabled( $post_nav ) {

	$post_nav = kemet_apply_filters_deprecated( 'kemet_sigle_post_navigation_enabled', array( $post_nav ), '1.0.27', 'kemet_single_post_navigation_enabled', '' );

	return $post_nav;
}

// Deprecating kemet_primary_header_main_rt_section filter.
add_filter( 'kemet_header_section_elements', 'deprecated_kemet_primary_header_main_rt_section', 10, 2 );

/**
 * Kemet Header elements.
 *
 * @since 1.2.2
 * @param array  $elements List of elements.
 * @param string $header Header section type.
 * @return array
 */
function deprecated_kemet_primary_header_main_rt_section( $elements, $header ) {

	$elements = kemet_apply_filters_deprecated( 'kemet_primary_header_main_rt_section', array( $elements, $header ), '1.2.2', 'kemet_header_section_elements', '' );

	return $elements;
}

if ( ! function_exists( 'kemet_apply_filters_deprecated' ) ) {
	/**
	 * Kemet Filter Deprecated
	 *
	 * @since 1.1.1
	 * @param string $tag         The name of the filter hook.
	 * @param array  $args        Array of additional function arguments to be passed to apply_filters().
	 * @param string $version     The version of WordPress that deprecated the hook.
	 * @param string $replacement Optional. The hook that should have been used. Default false.
	 * @param string $message     Optional. A message regarding the change. Default null.
	 */
	function kemet_apply_filters_deprecated( $tag, $args, $version, $replacement = false, $message = null ) {
		if ( function_exists( 'apply_filters_deprecated' ) ) { /* WP >= 4.6 */
			return apply_filters_deprecated( $tag, $args, $version, $replacement, $message );
		} else {
			return apply_filters_ref_array( $tag, $args );
		}
	}
}

