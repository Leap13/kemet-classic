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
		
			$colorPalette =kemet_get_option('colorPalette');
			$output_css = array(
				':root' => array(
					'--paletteColor1' => $colorPalette['color1'],
					'--paletteColor2' => $colorPalette['color2'],
					'--paletteColor3' => $colorPalette['color3'],
					'--paletteColor4' => $colorPalette['color4'],
					'--paletteColor5' => $colorPalette['color5'],
					'--paletteColor6' => $colorPalette['color6'],
					'--paletteColor7' => $colorPalette['color7'],
					'--paletteColor8' => $colorPalette['color8'],
				),
			);

			$parse_css .= kemet_parse_css( $output_css );

			return $parse_css;
		}
	}
}
