<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Html_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Html_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$header_html = array( 'header-html-1', 'header-html-2' );

			foreach ( $header_html as $html ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $html, 'header', 'desktop' ) ) {
					continue;
				}

				Kemet_Dynamic_Css_Generator::html_css( $html, 'header', 'desktop' );
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Html_Dynamic_Css();


