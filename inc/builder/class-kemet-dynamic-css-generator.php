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
				$selector           = 'a.button.' . $button;
				$color              = kemet_get_option( $button . '-color' );
				$bg_color           = kemet_get_option( $button . '-bg-color' );
				$border_color       = kemet_get_option( $button . '-border-color' );
				$hover_color        = kemet_get_option( $button . '-h-color' );
				$hover_bg_color     = kemet_get_option( $button . '-h-bg-color' );
				$hover_border_color = kemet_get_option( $button . '-h-border-color' );
				$border_width       = kemet_get_option( $button . '-border-width' );
				$padding            = kemet_get_option( $button . '-padding' );
				$margin             = kemet_get_option( $button . '-margin' );

				$css_output = array(
					$selector            => array(
						'color'            => esc_attr( $color ),
						'background-color' => esc_attr( $bg_color ),
						'border-style'     => esc_attr( 'solid' ),
						'border-width'     => kemet_get_css_value( $border_width, 'px' ),
						'border-color'     => esc_attr( $border_color ),
						'padding-top'      => kemet_responsive_spacing( $padding, 'top', 'desktop' ),
						'padding-right'    => kemet_responsive_spacing( $padding, 'right', 'desktop' ),
						'padding-bottom'   => kemet_responsive_spacing( $padding, 'bottom', 'desktop' ),
						'padding-left'     => kemet_responsive_spacing( $padding, 'left', 'desktop' ),
						'margin-top'       => kemet_responsive_spacing( $margin, 'top', 'desktop' ),
						'margin-right'     => kemet_responsive_spacing( $margin, 'right', 'desktop' ),
						'margin-bottom'    => kemet_responsive_spacing( $margin, 'bottom', 'desktop' ),
						'margin-left'      => kemet_responsive_spacing( $margin, 'left', 'desktop' ),
					),
					$selector . ':hover' => array(
						'color'            => esc_attr( $hover_color ),
						'background-color' => esc_attr( $hover_bg_color ),
						'border-color'     => esc_attr( $hover_border_color ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'padding-top'    => kemet_responsive_spacing( $padding, 'top', 'tablet' ),
						'padding-right'  => kemet_responsive_spacing( $padding, 'right', 'tablet' ),
						'padding-bottom' => kemet_responsive_spacing( $padding, 'bottom', 'tablet' ),
						'padding-left'   => kemet_responsive_spacing( $padding, 'left', 'tablet' ),
						'margin-top'     => kemet_responsive_spacing( $margin, 'top', 'tablet' ),
						'margin-right'   => kemet_responsive_spacing( $margin, 'right', 'tablet' ),
						'margin-bottom'  => kemet_responsive_spacing( $margin, 'bottom', 'tablet' ),
						'margin-left'    => kemet_responsive_spacing( $margin, 'left', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'padding-top'    => kemet_responsive_spacing( $padding, 'top', 'mobile' ),
						'padding-right'  => kemet_responsive_spacing( $padding, 'right', 'mobile' ),
						'padding-bottom' => kemet_responsive_spacing( $padding, 'bottom', 'mobile' ),
						'padding-left'   => kemet_responsive_spacing( $padding, 'left', 'mobile' ),
						'margin-top'     => kemet_responsive_spacing( $margin, 'top', 'mobile' ),
						'margin-right'   => kemet_responsive_spacing( $margin, 'right', 'mobile' ),
						'margin-bottom'  => kemet_responsive_spacing( $margin, 'bottom', 'mobile' ),
						'margin-left'    => kemet_responsive_spacing( $margin, 'left', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= self::typography_css( $button, $selector );

				return $parse_css;
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
				$selector      = '.kmt-' . $widget . '-area';
				$title_color   = kemet_get_option( $widget . '-title-color' );
				$link_color    = kemet_get_option( $widget . '-link-color' );
				$content_color = kemet_get_option( $widget . '-content-color' );
				$link_h_color  = kemet_get_option( $widget . '-link-h-color' );

				$css_output = array(
					$selector . ' .widget-title'           => array(
						'color' => esc_attr( $title_color ),
					),
					$selector . ' .widget-content'         => array(
						'color' => esc_attr( $content_color ),
					),
					$selector . ' .widget-content a'       => array(
						'color' => esc_attr( $link_color ),
					),
					$selector . ' .widget-content a:hover' => array(
						'color' => esc_attr( $link_h_color ),
					),
				);

				$parse_css  = kemet_parse_css( $css_output );
				$parse_css .= self::typography_css( $widget, $selector );
				return $parse_css;
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

				$css_output = array(
					$selector              => array(
						'color' => esc_attr( $color ),
					),
					$selector . ' a'       => array(
						'color' => esc_attr( $link_color ),
					),
					$selector . ' a:hover' => array(
						'color' => esc_attr( $link_hover_color ),
					),
				);

				$parse_css  = kemet_parse_css( $css_output );
				$parse_css .= self::typography_css( $html, $selector );
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
				// Toggle Button Css.
				$btn_selector      = '.' . $toggle_button . '-button';
				$icon_color        = kemet_get_option( $toggle_button . '-button-icon-color' );
				$icon_bg_color     = kemet_get_option( $toggle_button . '-button-icon-bg-color' );
				$icon_h_color      = kemet_get_option( $toggle_button . '-button-icon-h-color' );
				$icon_bg_h_color   = kemet_get_option( $toggle_button . '-button-icon-bg-h-color' );
				$icon_size         = kemet_get_option( $toggle_button . '-button-icon-size' );
				$btn_width         = kemet_get_option( $toggle_button . '-button-width' );
				$btn_height        = kemet_get_option( $toggle_button . '-button-height' );
				$btn_radius        = kemet_get_option( $toggle_button . '-button-border-radius' );
				$float_position    = kemet_get_option( $toggle_button . '-button-float-position' );
				$float_vposition   = strpos( $float_position, 'top' ) !== false ? 'top' : 'bottom';
				$float_hposition   = strpos( $float_position, 'left' ) !== false ? 'left' : 'right';
				$vertical_offset   = kemet_get_option( $toggle_button . '-button-vertical-offset' );
				$horizontal_offset = kemet_get_option( $toggle_button . '-button-horizontal-offset' );

				$btn_css_output = array(
					$btn_selector . '.toggle-button-fixed' => array(
						'position' => esc_attr( 'fixed' ),
					),
					$btn_selector . '.toggle-button-fixed.float-' . $float_position => array(
						$float_vposition => kemet_get_css_value( $vertical_offset, 'px' ),
						$float_hposition => kemet_get_css_value( $horizontal_offset, 'px' ),
					),
					$btn_selector                          => array(
						'color'            => esc_attr( $icon_color ),
						'background-color' => esc_attr( $icon_bg_color ),
						'width'            => kemet_get_css_value( $btn_width, 'px' ),
						'height'           => kemet_get_css_value( $btn_height, 'px' ),
						'border-radius'    => kemet_get_css_value( $btn_radius, 'px' ),
					),
					$btn_selector . ' .toggle-button-icon' => array(
						'font-size' => kemet_get_css_value( $icon_size, 'px' ),
					),
					$btn_selector . ':hover, ' . $btn_selector . ':focus, ' . $btn_selector . '.toggled' => array(
						'color'            => esc_attr( $icon_h_color ),
						'background-color' => esc_attr( $icon_bg_h_color ),
					),
				);
				/* Parse CSS from array()*/
				$parse_css = kemet_parse_css( $btn_css_output );

				// Popup Css.
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

				/* Parse CSS from array()*/
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
					'font-size'      => kemet_responsive_slider( $font_size, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $letter_spacing, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $line_height, 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $tablet_typo, '', '768' );

			$mobile_typo = array(
				$selector => array(
					'font-size'      => kemet_responsive_slider( $font_size, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $letter_spacing, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $line_height, 'mobile' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $mobile_typo, '', '544' );

			return $parse_css;
		}

		/**
		 * Get Header Row Css
		 *
		 * @param string $row row.
		 * @return string
		 */
		public static function header_row_css( $row ) {
			if ( Kemet_Builder_Helper::is_row_empty( $row, 'header', 'desktop' ) || Kemet_Builder_Helper::is_row_empty( $row, 'header', 'mobile' ) ) {
				$selector = '.kmt-' . $row . '-header-wrap .' . $row . '-header-bar';
				$prefix   = $row . '-header';

				$height           = kemet_get_option( $prefix . '-min-height' );
				$background       = kemet_get_option( $prefix . '-background' );
				$border           = kemet_get_option( $prefix . '-border-width' );
				$border_color     = kemet_get_option( $prefix . '-border-color' );
				$stick_background = kemet_get_option( $prefix . '-sticky-background' );

				$css_output = array(
					$selector . ' .kmt-grid-row' => array(
						'min-height' => kemet_responsive_slider( $height, 'desktop' ),
					),
					$selector                    => array(
						'border-style'        => esc_attr( 'solid' ),
						'border-top-width'    => kemet_responsive_spacing( $border, 'top', 'desktop' ),
						'border-right-width'  => kemet_responsive_spacing( $border, 'right', 'desktop' ),
						'border-bottom-width' => kemet_responsive_spacing( $border, 'bottom', 'desktop' ),
						'border-left-width'   => kemet_responsive_spacing( $border, 'left', 'desktop' ),
						'border-color'        => esc_attr( $border_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css  = kemet_parse_css( $css_output );
				$parse_css .= kemet_get_background_obj( $selector, $background );
				$parse_css .= kemet_get_background_obj( $selector . '.kmt-is-sticky', $stick_background );

				$tablet = array(
					$selector . ' .kmt-grid-row' => array(
						'min-height' => kemet_responsive_slider( $height, 'desktop' ),
					),
					$selector                    => array(
						'border-top-width'    => kemet_responsive_spacing( $border, 'top', 'tablet' ),
						'border-right-width'  => kemet_responsive_spacing( $border, 'right', 'tablet' ),
						'border-bottom-width' => kemet_responsive_spacing( $border, 'bottom', 'tablet' ),
						'border-left-width'   => kemet_responsive_spacing( $border, 'left', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' .kmt-grid-row' => array(
						'min-height' => kemet_responsive_slider( $height, 'desktop' ),
					),
					$selector                    => array(
						'border-top-width'    => kemet_responsive_spacing( $border, 'top', 'mobile' ),
						'border-right-width'  => kemet_responsive_spacing( $border, 'right', 'mobile' ),
						'border-bottom-width' => kemet_responsive_spacing( $border, 'bottom', 'mobile' ),
						'border-left-width'   => kemet_responsive_spacing( $border, 'left', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				return $parse_css;
			}
		}
	}
endif;
