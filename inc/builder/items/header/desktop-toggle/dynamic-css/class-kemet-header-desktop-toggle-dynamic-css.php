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
			if ( Kemet_Builder_Helper::is_item_loaded( 'desktop-toggle', 'header', 'desktop' ) ) {
				error_log( 'desktop-toggle' );
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Desktop_Toggle_Dynamic_Css();

