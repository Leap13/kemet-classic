<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Top_Header_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Top_Header_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$dynamic_css .= Kemet_Dynamic_Css_Generator::header_row_css( 'top' );
			return $dynamic_css;
		}
	}
}

new Kemet_Top_Header_Dynamic_Css();
