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
			Kemet_Dynamic_Css_Generator::button_css( 'mobile-button', 'header', 'mobile' );
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Mobile_Button_Dynamic_Css();

