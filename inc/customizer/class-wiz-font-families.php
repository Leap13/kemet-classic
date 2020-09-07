<?php
/**
 * Helper class for font settings.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Font info class for System and Google fonts.
 */
if ( ! class_exists( 'Wiz_Font_Families' ) ) :

	/**
	 * Font info class for System and Google fonts.
	 */
	final class Wiz_Font_Families {

		/**
		 * System Fonts
		 *
		 * @var array
		 */
		public static $system_fonts = array();

		/**
		 * Google Fonts
		 *
		 * @var array
		 */
		public static $google_fonts = array();

		/**
		 * Get System Fonts
		 *
		 *
		 * @return Array All the system fonts in WIZ
		 */
		public static function get_system_fonts() {
			if ( empty( self::$system_fonts ) ) {
				self::$system_fonts = array(
					'Helvetica' => array(
						'fallback' => 'Verdana, Arial, sans-serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Verdana'   => array(
						'fallback' => 'Helvetica, Arial, sans-serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Arial'     => array(
						'fallback' => 'Helvetica, Verdana, sans-serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Times'     => array(
						'fallback' => 'Georgia, serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Georgia'   => array(
						'fallback' => 'Times, serif',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
					'Courier'   => array(
						'fallback' => 'monospace',
						'weights'  => array(
							'300',
							'400',
							'700',
						),
					),
				);
			}

			return apply_filters( 'wiz_system_fonts', self::$system_fonts );
		}

		/**
		 * Custom Fonts
		 *
		 * @since 1.0.0
		 *
		 * @return Array All the custom fonts in KEMEt
		 */
		public static function get_custom_fonts() {
			$custom_fonts = array();

			return apply_filters( 'wiz_custom_fonts', $custom_fonts );
		}

		/**
		 * Google Fonts used in wiz.
		 * Array is generated from the google-fonts.json file.
		 *
		 *
		 * @return Array Array of Google Fonts.
		 */
		public static function get_google_fonts() {

			if ( empty( self::$google_fonts ) ) {

				$google_fonts_file = apply_filters( 'wiz_google_fonts_json_file', WIZ_THEME_DIR . 'assets/fonts/google-fonts.json' );

				if ( ! file_exists( WIZ_THEME_DIR . 'assets/fonts/google-fonts.json' ) ) {
					return array();
				}

				global $wp_filesystem;
				if ( empty( $wp_filesystem ) ) {
					require_once ABSPATH . '/wp-admin/includes/file.php';
					WP_Filesystem();
				}

				$file_contants     = $wp_filesystem->get_contents( $google_fonts_file );
				$google_fonts_json = json_decode( $file_contants, 1 );

				foreach ( $google_fonts_json as $key => $font ) {
					$name = key( $font );
					foreach ( $font[ $name ] as $font_key => $single_font ) {

						if ( 'variants' === $font_key ) {

							foreach ( $single_font as $variant_key => $variant ) {

								if ( 'regular' == $variant ) {
									$font[ $name ][ $font_key ][ $variant_key ] = '400';
								}
							}
						}

						self::$google_fonts[ $name ] = array_values( $font[ $name ] );
					}
				}
			}

			return apply_filters( 'wiz_google_fonts', self::$google_fonts );
		}

	}

endif;
