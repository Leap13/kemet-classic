<?php
/**
 * Kemet Dynamic Css Generator
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Dynamic_Css_Generator' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Dynamic_Css_Generator {

		/**
		 * Generate Button Dynamic Css
		 *
		 * @param string $button button name.
		 * @param string $builder builder.
		 * @param string $device device
		 * @return string
		 */
		public static function button_css( $button, $builder = 'header', $device = 'all' ) {
			if ( Kemet_Builder_Helper::is_item_loaded( $button, 'header', $device ) ) {
				error_log( $button );
			}
		}

		/**
		 * Generate Widget Dynamic Css
		 *
		 * @param string $widget widget slug.
		 * @param string $builder builder.
		 * @param string $device device
		 * @return string
		 */
		public static function widget_css( $widget, $builder = 'header', $device = 'all' ) {
			if ( Kemet_Builder_Helper::is_item_loaded( $widget, 'header', $device ) ) {
				error_log( $widget );
			}
		}

		/**
		 * Generate Html Dynamic Css
		 *
		 * @param string $html html slug.
		 * @param string $builder builder.
		 * @param string $device device
		 * @return string
		 */
		public static function html_css( $html, $builder = 'header', $device = 'all' ) {
			if ( Kemet_Builder_Helper::is_item_loaded( $html, 'header', $device ) ) {
				$selector         = '.kmt-' . $html;
				$color            = kemet_get_option( $html . '-color' );
				$link_color       = kemet_get_option( $html . '-link-color' );
				$link_hover_color = kemet_get_option( $html . '-link-hover-color' );
				$font_family      = kemet_get_option( $html . '-font-family' );
				$font_weight      = kemet_get_option( $html . '-font-weight' );
				$css_output       = array(
					$selector              => array(
						'color' => esc_attr( $color ),
					),
					$selector . ' a'       => array(
						'color' => esc_attr( $link_color ),
					),
					$selector . ' a:hover' => array(
						'color' => esc_attr( $link_hover_color ),
					),
					$selector              => array(
						'font-family' => kemet_get_font_family( $font_family ),
					),
					$selector              => array(
						'font-weight' => esc_attr( $font_weight ),
					),
				);

				$parse_css = kemet_parse_css( $css_output );

				return $parse_css;
			}
		}
	}
endif;
