<?php
/**
 * Header Mobile Button - Dynamic CSS
 *
 * @package Kemet
 */

add_filter( 'kemet_dynamic_css', 'kemet_header_mobile_button_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css css.
 * @return string
 */
function kemet_header_mobile_button_dynamic_css( $dynamic_css ) {
	Kemet_Dynamic_Css_Generator::button_css( 'mobile-button', 'header', 'mobile' );
	return $dynamic_css;
}
