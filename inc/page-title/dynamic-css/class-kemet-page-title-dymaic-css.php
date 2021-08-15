<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Page_Title_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Page_Title_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			return $dynamic_css;
		}
	}
}

new Kemet_Page_Title_Dynamic_Css();

