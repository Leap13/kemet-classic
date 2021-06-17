<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Desktop_Toggle_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Desktop_Toggle_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$css_output   = Kemet_Dynamic_Css_Generator::toggle_button_css( 'desktop-toggle', 'header', 'desktop' );
			$dynamic_css .= $css_output;

			return $dynamic_css;
		}
	}
}

new Kemet_Header_Desktop_Toggle_Dynamic_Css();

