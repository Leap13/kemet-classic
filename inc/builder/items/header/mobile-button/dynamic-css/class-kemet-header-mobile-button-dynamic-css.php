<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Mobile_Button_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Mobile_Button_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		function dynamic_css( $dynamic_css ) {
			$button_items = apply_filters( 'kemet_header_mobile_button_items', array( 'header-mobile-button-1', 'header-mobile-button-2' ) );
			foreach ( $button_items as $button ) {
				$css_output   = Kemet_Dynamic_Css_Generator::button_css( $button, 'header', 'mobile' );
				$dynamic_css .= $css_output;
			}

			return $dynamic_css;
		}
	}
}

new Kemet_Header_Mobile_Button_Dynamic_Css();
