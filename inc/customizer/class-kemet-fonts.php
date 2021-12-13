<?php
/**
 * Helper class for font settings.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Kemet Fonts
 */
final class Kemet_Fonts {

	/**
	 * Get fonts to generate.
	 *
	 * @var array $fonts
	 */
	private static $fonts = array();

	/**
	 * Adds data to the $fonts array for a font to be rendered.
	 *
	 * @param string $name The name key of the font to add.
	 * @param array  $variants An array of weight variants.
	 * @return void
	 */
	public static function add_font( $name, $variants = array() ) {

		if ( 'inherit' == $name ) {
			return;
		}

		if ( is_array( $variants ) ) {
			$key = array_search( 'inherit', $variants );
			if ( false !== $key ) {

				unset( $variants[ $key ] );

				if ( ! in_array( 400, $variants ) ) {
					$variants[] = 400;
				}
			}
		} elseif ( 'inherit' == $variants ) {
			$variants = 400;
		}

		if ( isset( self::$fonts[ $name ] ) ) {
			foreach ( (array) $variants as $variant ) {
				if ( ! in_array( $variant, self::$fonts[ $name ]['variants'] ) ) {
					self::$fonts[ $name ]['variants'][] = $variant;
				}
			}
		} else {
			self::$fonts[ $name ] = array(
				'variants' => (array) $variants,
			);
		}
	}

	/**
	 * add_font_form_typography
	 *
	 * @param  mixed $option
	 * @return void
	 */
	public static function add_font_form_typography( $typography ) {
		$font_family = isset( $typography['family'] ) ? $typography['family'] : '';
		$variation   = isset( $typography['variation'] ) ? $typography['variation'] : '';

		self::add_font( $font_family, $variation );
	}

	/**
	 * Get Fonts
	 */
	public static function get_fonts() {

		do_action( 'kemet_get_fonts' );
		return apply_filters( 'kemet_add_fonts', self::$fonts );
	}

	/**
	 * Renders the <link> tag for all fonts in the $fonts array.
	 *
	 * @return void
	 */
	public static function render_fonts() {

		$font_list = apply_filters( 'kemet_render_fonts', self::get_fonts() );

		$google_fonts = array();
		$font_subset  = array();

		$all_google_fonts = Kemet_Font_Families::get_google_fonts();
		$system_fonts     = Kemet_Font_Families::get_system_fonts();

		foreach ( $font_list as $name => $font ) {
			if ( ! empty( $name ) && ! isset( $system_fonts[ $name ] ) && isset( $all_google_fonts[ $name ] ) ) {

				// Add font variants.
				$google_fonts[ $name ] = $font['variants'];

				// Add Subset.
				$subset = apply_filters( 'kemet_font_subset', '', $name );
				if ( ! empty( $subset ) ) {
					$font_subset[] = $subset;
				}
			}
		}

		$google_font_url = self::google_fonts_url( $google_fonts, $font_subset );
		$load_fonts      = kemet_get_option( 'load-google-fonts-locally' );
		if ( $google_font_url ) {
			if ( $load_fonts && ! is_customize_preview() && ! is_admin() ) {
				$preload_fonts = kemet_get_option( 'preload-google-fonts' );
				if ( $preload_fonts ) {
					self::load_preload_local_fonts( $google_font_url );
				}
				wp_enqueue_style( 'kemet-google-fonts', kemet_get_webfont_url( $google_font_url ), array(), null );
			} else {
				wp_enqueue_style( 'kemet-google-fonts', $google_font_url, array(), null );
			}
		}
	}

	/**
	 * Get the file preloads.
	 *
	 * @param string $url    The URL of the remote webfont.
	 * @param string $format The font-format. If you need to support IE, change this to "woff".
	 */
	public static function load_preload_local_fonts( $url, $format = 'woff2' ) {

		$local_font_files = get_site_option( 'kemet_local_font_files', false );

		if ( is_array( $local_font_files ) && ! empty( $local_font_files ) ) {
			foreach ( $local_font_files as $key => $local_font ) {
				if ( $local_font ) {
					echo '<link rel="preload" href="' . esc_url( $local_font ) . '" as="font" type="font/' . esc_attr( $format ) . '" crossorigin>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
			return;
		}

		// Now preload font data after processing it, as we didn't get stored data.
		$font = new Kemet_WebFont_Loader( $url );
		$font->set_font_format( $format );
		$font->preload_local_fonts();
	}

	/**
	 * Google Font URL
	 * Combine multiple google font in one URL
	 *
	 * @link https://shellcreeper.com/?p=1476
	 * @param array $fonts      Google Fonts array.
	 * @param array $subsets    Font's Subsets array.
	 *
	 * @return string
	 */
	public static function google_fonts_url( $fonts, $subsets = array() ) {

		/* URL */
		$base_url  = 'https://fonts.googleapis.com/css2?';
		$font_args = array();
		$families  = array();
		$weights   = array(
			'italic' => array(),
			'normal' => array(),
		);
		$fonts     = apply_filters( 'kemet_google_fonts', $fonts );

		/* Format Each Font Family in Array */
		foreach ( $fonts as $font_name => $font_weight ) {
			$family      = '';
			$font_name   = str_replace( ' ', '+', $font_name );
			$family      = 'family=' . $font_name;
			$weight_text = 'wght@';
			$wghts       = array();
			if ( ! empty( $font_weight ) && count( $font_weight ) > 1 ) {
				foreach ( $font_weight as  $weight ) {
					$weight_val = (int) $weight[1] * 100;
					if ( 'i' === $weight[0] ) {
						$weights['italic'][] = $weight_val;
					} else {
						$weights['normal'][] = $weight_val;
					}
				}
				sort( $weights['italic'] );
				sort( $weights['normal'] );

				if ( ! empty( $weights['normal'] ) ) {
					$weights['normal'] = array_unique( $weights['normal'] );
					foreach ( $weights['normal'] as $wght ) {
						$wghts[] = ! empty( $weights['italic'] ) ? '0,' . $wght : $wght;
					}
				}

				if ( ! empty( $weights['italic'] ) ) {
					$family           .= ':ital,';
					$weights['italic'] = array_unique( $weights['italic'] );
					foreach ( $weights['italic'] as $wght ) {
						$wghts[] = '1,' . $wght;
					}
				} else {
					$weight_text = ':wght@';
				}

				$weight_text .= implode( ';', $wghts );
				$families[]   = $family . $weight_text;
			} else {
				$families[] = $family;
			}
		}

		if ( ! empty( $families ) ) {
			$base_url .= implode( '&', $families );
			$base_url .= '&display=swap';

			return $base_url;
		}

		return false;
	}
}
