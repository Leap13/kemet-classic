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
					'--paletteColor1' => '#2872fa',
					'--paletteColor2' => '#1559ed',
					'--paletteColor3' => '#3A4F66',
					'--paletteColor4' => '#192a3d',
					'--paletteColor5' => '#e1e8ed',
					'--paletteColor6' => '#f2f5f7',
					'--paletteColor7' => '#FAFBFC',
					'--paletteColor8' => '#ffffff',
				),
			);

			$parse_css .= kemet_parse_css( $output_css );

			return $parse_css;
		}
	}
}
