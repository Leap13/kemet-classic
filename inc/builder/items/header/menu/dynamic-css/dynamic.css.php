<?php
/**
 * Header Menu - Dynamic CSS
 *
 * @package Kemet
 */

add_filter( 'kemet_dynamic_css', 'kemet_header_menu_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css css.
 * @return string
 */
function kemet_header_menu_dynamic_css( $dynamic_css ) {
	$header_menus = array( 'primary-menu', 'secondary-menu' );

	foreach ( $header_menus as $menu ) {
		if ( ! Kemet_Builder_Helper::is_item_loaded( $menu, 'header', 'desktop' ) ) {
			continue;
		}
	}
	return $dynamic_css;
}
