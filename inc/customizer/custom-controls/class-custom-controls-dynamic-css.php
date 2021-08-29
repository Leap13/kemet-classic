<?php
/**
 * Custom controls style
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://leap13.com
 */

if ( ! class_exists( 'Kemet_Custom_Controls_Dynamic_Css' ) ) {
	/**
	 * Custom controls
	 */
	class Kemet_Custom_Controls_Dynamic_Css {
		/**
		 * Dynamic css
		 *
		 * @return string
		 */
		public static function dynamic_css() {
			$parse_css = '';

			$output_css = array(
				':root' => array(
					'--paletteColor1' => '',
					'--paletteColor2' => '',
					'--paletteColor3' => '',
					'--paletteColor4' => '',
					'--paletteColor5' => '',
					'--paletteColor6' => '',
				),
			);

			$parse_css .= kemet_parse_css( $output_css );

			return $parse_css;
		}
	}
}
