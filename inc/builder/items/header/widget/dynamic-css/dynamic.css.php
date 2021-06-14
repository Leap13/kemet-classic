<?php
/**
 * Header Button - Dynamic CSS
 *
 * @package Kemet
 */

add_filter( 'kemet_dynamic_css', 'kemet_header_widget_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css css.
 * @return string
 */
function kemet_header_widget_dynamic_css( $dynamic_css ) {
	$header_widgets = array( 'header-widget-1', 'header-widget-2' );

	foreach ( $header_widgets as $widget ) {
		if ( ! Kemet_Builder_Helper::is_item_loaded( $widget, 'header', 'desktop' ) ) {
			continue;
		}

		Kemet_Dynamic_Css_Generator::widget_css( $widget, 'header' );
	}

	return $dynamic_css;
}
