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
				$selector           = '.' . $button;
				$color              = kemet_get_sub_option( $button . '-color', 'initial' );
				$bg_color           = kemet_get_sub_option( $button . '-bg-color', 'initial' );
				$border_color       = kemet_get_sub_option( $button . '-border-color', 'initial' );
				$hover_color        = kemet_get_sub_option( $button . '-color', 'hover' );
				$hover_bg_color     = kemet_get_sub_option( $button . '-bg-color', 'hover' );
				$hover_border_color = kemet_get_sub_option( $button . '-border-color', 'hover' );
				$border_width       = kemet_get_option( $button . '-border-width' );
				$padding            = kemet_get_option( $button . '-padding' );
				$margin             = kemet_get_option( $button . '-margin' );

				$css_output = array(
					$selector => array(
						'--buttonColor'                => esc_attr( $color ),
						'--buttonBackgroundColor'      => esc_attr( $bg_color ),
						'--borderWidth'                => kemet_get_css_value( $border_width, 'px' ),
						'--borderColor'                => esc_attr( $border_color ),
						'--buttonHoverColor'           => esc_attr( $hover_color ),
						'--buttonBackgroundHoverColor' => esc_attr( $hover_bg_color ),
						'--borderHoverColor'           => esc_attr( $hover_border_color ),
						'--padding'                    => kemet_responsive_spacing( $padding, 'all', 'desktop' ),
						'--margin'                     => kemet_responsive_spacing( $margin, 'all', 'desktop' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--padding' => kemet_responsive_spacing( $padding, 'all', 'tablet' ),
						'--margin'  => kemet_responsive_spacing( $margin, 'all', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'--padding' => kemet_responsive_spacing( $padding, 'all', 'mobile' ),
						'--margin'  => kemet_responsive_spacing( $margin, 'all', 'mobile' ),
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
				$title_color   = kemet_get_sub_option( $widget . '-title-color', 'initial' );
				$link_color    = kemet_get_sub_option( $widget . '-link-color', 'initial' );
				$content_color = kemet_get_sub_option( $widget . '-content-color', 'initial' );
				$link_h_color  = kemet_get_sub_option( $widget . '-link-color', 'hover' );

				$css_output = array(
					$selector                    => array(
						'--textColor'         => esc_attr( $content_color ),
						'--headingLinksColor' => esc_attr( $link_color ),
						'--linksHoverColor'   => esc_attr( $link_h_color ),
						'color'               => 'var(--textColor)',
					),
					$selector . ' .widget-title' => array(
						'--headingLinksColor' => esc_attr( $title_color ),
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
				$color            = kemet_get_sub_option( $html . '-color', 'initial' );
				$link_color       = kemet_get_sub_option( $html . '-link-color', 'initial' );
				$link_hover_color = kemet_get_sub_option( $html . '-link-color', 'hover' );

				$css_output = array(
					$selector => array(
						'--textColor'         => esc_attr( $color ),
						'--headingLinksColor' => esc_attr( $link_color ),
						'--linksHoverColor'   => esc_attr( $link_hover_color ),
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
						'--buttonColor'                => esc_attr( $icon_color ),
						'--buttonBackgroundColor'      => esc_attr( $icon_bg_color ),
						'width'                        => kemet_get_css_value( $btn_width, 'px' ),
						'height'                       => kemet_get_css_value( $btn_height, 'px' ),
						'--borderRadius'               => kemet_get_css_value( $btn_radius, 'px' ),
						'--fontSize'                   => kemet_get_css_value( $icon_size, 'px' ),
						'--buttonHoverColor'           => esc_attr( $icon_h_color ),
						'--buttonBackgroundHoverColor' => esc_attr( $icon_bg_h_color ),
					),
				);
				/* Parse CSS from array()*/
				$parse_css = kemet_parse_css( $btn_css_output );

				// Popup Css.
				$popup_selector      = ' #kmt-' . esc_attr( $device ) . '-popup';
				$content_selector    = '.kmt-' . esc_attr( $device ) . '-popup-content';
				$popup_width         = kemet_get_option( $device . '-popup-slide-width' );
				$popup_bg            = kemet_get_option( $device . '-popup-background' );
				$popup_icon_bg_color = kemet_get_option( $device . '-popup-close-btn-color' );
				$popup_css_output    = array(
					'.kmt-popup-left ' . $content_selector . ', .kmt-popup-right ' . $content_selector . '' => array(
						'max-width' => kemet_get_css_value( $popup_width, '%' ),
					),
					$popup_selector . ' .toggle-button-close' => array(
						'--buttonColor' => esc_attr( $popup_icon_bg_color ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $popup_css_output );
				$parse_css .= kemet_get_background_obj( $content_selector, $popup_bg );

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
					'--fontSize'      => kemet_responsive_slider( $font_size, 'desktop' ),
					'--fontFamily'    => kemet_get_font_family( $font_family ),
					'--fontWeight'    => esc_attr( $font_weight ),
					'--letterSpacing' => kemet_responsive_slider( $letter_spacing, 'desktop' ),
					'--lineHeight'    => kemet_responsive_slider( $line_height, 'desktop' ),
					'--textTransform' => esc_attr( $text_transform ),
					'--fontStyle'     => esc_attr( $font_style ),
				),
			);

			/* Parse CSS from array() */
			$parse_css = kemet_parse_css( $css_output );

			$tablet_typo = array(
				$selector => array(
					'--fontSize'      => kemet_responsive_slider( $font_size, 'tablet' ),
					'--letterSpacing' => kemet_responsive_slider( $letter_spacing, 'tablet' ),
					'--lineHeight'    => kemet_responsive_slider( $line_height, 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $tablet_typo, '', '768' );

			$mobile_typo = array(
				$selector => array(
					'--fontSize'      => kemet_responsive_slider( $font_size, 'mobile' ),
					'--letterSpacing' => kemet_responsive_slider( $letter_spacing, 'mobile' ),
					'--lineHeight'    => kemet_responsive_slider( $line_height, 'mobile' ),
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
				$layout           = kemet_get_option( $prefix . '-layout' );
				$layout_color     = kemet_get_option( $prefix . '-layout-color' );

				$css_output = array(
					$selector . ' .kmt-grid-row' => array(
						'--minHeight' => kemet_responsive_slider( $height, 'desktop' ),
					),
					$selector                    => array(
						'border-style'  => esc_attr( 'solid' ),
						'--borderWidth' => kemet_responsive_spacing( $border, 'all', 'desktop' ),
						'--borderColor' => esc_attr( $border_color ),
					),
				);

				if ( 'boxed' === $layout || 'stretched' === $layout ) {
					$css_output[ $selector . ' .header-bar-content' ] = array(
						'--backgroundColor' => esc_attr( $layout_color ),
					);
				}

				/* Parse CSS from array() */
				$parse_css  = kemet_parse_css( $css_output );
				$parse_css .= kemet_get_background_obj( $selector, $background );
				$parse_css .= kemet_get_background_obj( '.kmt-sticky-' . $row . '-bar #sitehead ' . $selector . '.kmt-is-sticky', $stick_background );

				$tablet = array(
					$selector . ' .kmt-grid-row' => array(
						'--minHeight' => kemet_responsive_slider( $height, 'tablet' ),
					),
					$selector                    => array(
						'--borderWidth' => kemet_responsive_spacing( $border, 'all', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' .kmt-grid-row' => array(
						'--minHeight' => kemet_responsive_slider( $height, 'mobile' ),
					),
					$selector                    => array(
						'--borderWidth' => kemet_responsive_spacing( $border, 'all', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				// Header Break Point.
				$header_break_point = kemet_header_break_point();

				$layout_css = array();

				if ( 'full' === $layout ) {
					$layout_css[ $selector . ' .kmt-container' ] = array(
						'max-width'     => '100%',
						'padding-left'  => '35px',
						'padding-right' => '35px',
					);
				}

				if ( 'stretched' === $layout ) {
					$layout_css[ $selector . ' .kmt-container' ] = array(
						'max-width'     => '100%',
						'padding-left'  => '0',
						'padding-right' => '0',
					);
				}

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $layout_css, $header_break_point );

				return $parse_css;
			}
		}
	}
endif;
