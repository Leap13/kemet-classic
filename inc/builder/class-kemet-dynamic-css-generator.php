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

				$css_output = array(
					$selector              => array(
						'color'       => esc_attr( $color ),
						'font-family' => kemet_get_font_family( $font_family ),
						'font-weight' => esc_attr( $font_weight ),
					),
					$selector . ' a'       => array(
						'color' => esc_attr( $link_color ),
					),
					$selector . ' a:hover' => array(
						'color' => esc_attr( $link_hover_color ),
					),
				);

				$parse_css = kemet_parse_css( $css_output );

				return $parse_css;
			}
		}

		/**
		 * Generate Toggle Button Dynamic Css
		 *
		 * @param string $toggle_button toggle button slug.
		 * @param string $builder builder.
		 * @param string $device device
		 * @return string
		 */
		public static function toggle_button_css( $toggle_button, $builder = 'header', $device = 'all' ) {
			if ( Kemet_Builder_Helper::is_item_loaded( $toggle_button, 'header', $device ) ) {
				// Toggle Button Css
				$btn_selector   = '.' . $toggle_button . '-toggle-button';
				$btn_css_output = array();
				$parse_css      = kemet_parse_css( $btn_css_output );
				// Popup Css
				$popup_selector      = ' #kmt-' . esc_attr( $device ) . '-popup';
				$content_selector    = '.kmt-' . esc_attr( $device ) . '-popup-content';
				$popup_width         = kemet_get_option( $device . '-popup-slide-width' );
				$popup_bg_color      = kemet_get_option( $device . '-popup-bg-color' );
				$popup_icon_bg_color = kemet_get_option( $device . '-popup-close-btn-color' );
				$popup_css_output    = array(
					'.kmt-popup-left ' . $content_selector . ', .kmt-popup-right ' . $content_selector . '' => array(
						'max-width' => kemet_get_css_value( $popup_width, '%' ),
					),
					$content_selector => array(
						'background-color' => esc_attr( $popup_bg_color ),
					),
					$popup_selector . ' .toggle-button-close' => array(
						'color' => esc_attr( $popup_icon_bg_color ),
					),
				);

				$parse_css .= kemet_parse_css( $popup_css_output );

				return $parse_css;
			}
		}

		/**
		 * Generate Typography Css
		 *
		 * @param string $item item name.
		 * @param string $selector selector.
		 * @return string
		 */
		public static function typography_css( $item, $selector ) {
			$font_size      = kemet_get_option( $item . '-font-size' );
			$font_family    = kemet_get_option( $item . '-font-family' );
			$font_weight    = kemet_get_option( $item . '-font-weight' );
			$text_transform = kemet_get_option( $item . '-text-transform' );
			$font_style     = kemet_get_option( $item . '-font-style' );
			$line_height    = kemet_get_option( $item . '-line-height' );
			$letter_spacing = kemet_get_option( $item . '-letter-spacing' );

			$css_output = array(
				$selector => array(
					'font-size'      => kemet_responsive_slider( $font_size, 'desktop' ),
					'font-family'    => kemet_get_font_family( $font_family ),
					'font-weight'    => esc_attr( $font_weight ),
					'letter-spacing' => kemet_responsive_slider( $letter_spacing, 'desktop' ),
					'line-height'    => kemet_responsive_slider( $line_height, 'desktop' ),
					'text-transform' => esc_attr( $text_transform ),
					'font-style'     => esc_attr( $font_style ),
				),
			);

			/* Parse CSS from array() */
			$parse_css = kemet_parse_css( $css_output );

			$tablet_typo = array(
				$selector => array(
					'font-size'      => kemet_responsive_slider( $font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $line_height, 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $tablet_typo, '', '768' );

			$mobile_typo = array(
				$selector => array(
					'font-size'      => kemet_responsive_slider( $font_size, 'desktop' ),
					'letter-spacing' => kemet_responsive_slider( $letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $line_height, 'mobile' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $mobile_typo, '', '544' );

			return $parse_css;
		}
	}
endif;
