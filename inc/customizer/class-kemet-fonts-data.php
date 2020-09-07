<?php
/**
 * Helper class for font settings.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Font info class for System and Google fonts.
 */
if ( ! class_exists( 'Wiz_Fonts_Data' ) ) :

	/**
	 * Fonts Data
	 */
	final class Wiz_Fonts_Data {

		/**
		 * Localize Fonts
		 */
		static public function js() {

			$system = json_encode( Wiz_Font_Families::get_system_fonts() );
			$google = json_encode( Wiz_Font_Families::get_google_fonts() );
			$custom = json_encode( Wiz_Font_Families::get_custom_fonts() );
			if ( ! empty( $custom ) ) {
				return 'var KmtFontFamilies = { system: ' . $system . ', custom: ' . $custom . ', google: ' . $google . ' };';
			} else {
				return 'var KmtFontFamilies = { system: ' . $system . ', google: ' . $google . ' };';
			}
		}
	}

endif;

