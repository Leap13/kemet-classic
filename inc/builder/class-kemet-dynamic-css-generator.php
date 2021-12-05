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
				$font_size          = kemet_get_option( $button . '-font-size' );
				$line_height        = kemet_get_option( $button . '-line-height' );
				$letter_spacing     = kemet_get_option( $button . '-letter-spacing' );
				$border_radius      = kemet_get_option( $button . '-radius' );

				$css_output = array(
					$selector => array(
						'--buttonColor'                => esc_attr( $color ),
						'--buttonBackgroundColor'      => esc_attr( $bg_color ),
						'--borderWidth'                => kemet_spacing( $border_width, 'all' ),
						'--borderColor'                => esc_attr( $border_color ),
						'--buttonHoverColor'           => esc_attr( $hover_color ),
						'--buttonBackgroundHoverColor' => esc_attr( $hover_bg_color ),
						'--borderHoverColor'           => esc_attr( $hover_border_color ),
						'--padding'                    => kemet_spacing( $padding, 'all' ),
						'--margin'                     => kemet_spacing( $margin, 'all' ),
						'--fontSize'                   => kemet_slider( $font_size ),
						'--letterSpacing'              => kemet_slider( $letter_spacing ),
						'--lineHeight'                 => kemet_slider( $line_height ),
						'--borderRadius'               => kemet_spacing( $border_radius, 'all' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css = kemet_parse_css( $css_output );

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
				$link_color    = kemet_get_sub_option( $widget . '-link-color', 'initial' );
				$content_color = kemet_get_sub_option( $widget . '-content-color', 'initial' );
				$link_h_color  = kemet_get_sub_option( $widget . '-link-color', 'hover' );
				$margin        = kemet_get_option( $widget . '-margin' );

				$css_output = array(
					$selector => array(
						'margin'            => 'var(--margin)',
						'font-family'       => 'var(--fontFamily)',
						'--textColor'       => esc_attr( $content_color ),
						'--linksColor'      => esc_attr( $link_color ),
						'--linksHoverColor' => esc_attr( $link_h_color ),
						'color'             => 'var(--textColor)',
						'--margin'          => kemet_responsive_spacing( $margin, 'all', 'desktop' ),
					),
				);

				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--margin' => kemet_responsive_spacing( $margin, 'all', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'--margin' => kemet_responsive_spacing( $margin, 'all', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

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
				$margin           = kemet_get_option( $html . '-spacing' );

				$css_output = array(
					$selector => array(
						'color'             => 'var(--textColor)',
						'margin'            => 'var(--margin)',
						'--textColor'       => esc_attr( $color ),
						'--linksColor'      => esc_attr( $link_color ),
						'--linksHoverColor' => esc_attr( $link_hover_color ),
						'--margin'          => kemet_spacing( $margin, 'all' ),
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
				$icon_color        = kemet_get_sub_option( $toggle_button . '-button-icon-color', 'initial', 'var(--linksColor)' );
				$border_color      = kemet_get_sub_option( $toggle_button . '-button-border-color', 'initial' );
				$icon_bg_color     = kemet_get_sub_option( $toggle_button . '-button-icon-bg-color', 'initial' );
				$icon_h_color      = kemet_get_sub_option( $toggle_button . '-button-icon-color', 'hover', 'var(--linksHoverColor)' );
				$icon_bg_h_color   = kemet_get_sub_option( $toggle_button . '-button-icon-bg-color', 'hover' );
				$border_h_color    = kemet_get_sub_option( $toggle_button . '-button-border-color', 'hover' );
				$btn_width         = kemet_get_option( $toggle_button . '-button-width' );
				$btn_height        = kemet_get_option( $toggle_button . '-button-height' );
				$btn_radius        = kemet_get_option( $toggle_button . '-button-border-radius' );
				$toggle_design     = kemet_get_option( $toggle_button . '-toggle-button-design' );
				$toggle_size       = kemet_get_option( $toggle_button . '-button-size' );
				$float_position    = kemet_get_option( $toggle_button . '-button-float-position' );
				$float_vposition   = strpos( $float_position, 'top' ) !== false ? 'top' : 'bottom';
				$float_hposition   = strpos( $float_position, 'left' ) !== false ? 'left' : 'right';
				$vertical_offset   = kemet_get_option( $toggle_button . '-button-vertical-offset' );
				$horizontal_offset = kemet_get_option( $toggle_button . '-button-horizontal-offset' );
				$z_index           = kemet_get_option( $toggle_button . '-button-z-index' );
				$padding           = kemet_get_option( $toggle_button . '-button-padding' );
				$margin            = kemet_get_option( $toggle_button . '-button-margin' );

				$btn_css_output = array(
					$btn_selector . '.toggle-button-fixed' => array(
						'position' => esc_attr( 'fixed' ),
						'z-index'  => esc_attr( $z_index ),
					),
					$btn_selector . '.toggle-button-fixed.float-' . $float_position => array(
						$float_vposition => kemet_slider( $vertical_offset ),
						$float_hposition => kemet_slider( $horizontal_offset ),
					),
					$btn_selector                          => array(
						'display'          => 'flex',
						'align-items'      => 'center',
						'color'            => 'var(--color, var(--textColor) )',
						'background-color' => 'var(--backgroundColor, var(--borderColor))',
						'border'           => 'var(--borderWidth, 1px) var(--borderStyle, solid) var(--borderColor)',
						'border-radius'    => 'var(--borderRadius)',
						'margin'           => 'var(--margin)',
						'--borderRadius'   => kemet_slider( $btn_radius ),
						'--color'          => esc_attr( $icon_color ),
						'--hoverColor'     => esc_attr( $icon_h_color ),
						'--margin'         => kemet_spacing( $margin, 'all' ),
					),
					$btn_selector . ' .kmt-svg-icon'       => array(
						'font-size' => kemet_slider( $toggle_size ),
					),
					$btn_selector . '[data-label="right"]' => array(
						'flex-direction' => 'row-reverse',
					),
					$btn_selector . '[data-label="right"] .kmt-popup-label' => array(
						'margin-left' => '5px',
					),
					$btn_selector . '[data-label="left"] .kmt-popup-label' => array(
						'margin-right' => '5px',
					),
					$btn_selector . ' .kmt-popup-label'    => array(
						'--textTransform' => 'uppercase',
					),
					$btn_selector . ' .icon-menu'          => array(
						'display' => 'flex',
					),
					$btn_selector . ':hover'               => array(
						'color'            => 'var(--hoverColor, var(--themeColor))',
						'background-color' => 'var(--backgroundHoverColor, var(--borderColor))',
						'border'           => 'var(--borderWidth, 1px) var(--borderStyle, solid) var(--borderHoverColor, var(--borderColor))',
					),
					$btn_selector . '[data-style="simple"]' => array(
						'background' => 'transparent',
						'border'     => 'none',
					),
					$btn_selector . '[data-style="solid"]' => array(
						'--backgroundColor'      => esc_attr( $icon_bg_color ),
						'--backgroundHoverColor' => esc_attr( $icon_bg_h_color ),
						'border'                 => 'none',
						'padding'                => kemet_spacing( $padding, 'all' ),
					),
					$btn_selector . '[data-style="outline"]' => array(
						'--buttonColor'      => esc_attr( $icon_color ),
						'--borderColor'      => esc_attr( $border_color ),
						'--borderHoverColor' => esc_attr( $border_h_color ),
						'background'         => 'transparent',
						'padding'            => kemet_spacing( $padding, 'all' ),
					),
				);
				/* Parse CSS from array()*/
				$parse_css = kemet_parse_css( $btn_css_output );

				// Popup Css.
				$popup_selector        = ' #kmt-' . esc_attr( $device ) . '-popup';
				$content_selector      = '.kmt-' . esc_attr( $device ) . '-popup-content';
				$popup_width           = kemet_get_option( $device . '-popup-slide-width' );
				$popup_bg              = kemet_get_option( $device . '-popup-background' );
				$popup_text_color      = kemet_get_sub_option( $device . '-popup-text-color', 'initial' );
				$popup_icon_bg_color   = kemet_get_sub_option( $device . '-popup-close-btn-color', 'initial' );
				$popup_icon_bg_h_color = kemet_get_sub_option( $device . '-popup-close-btn-color', 'hover' );
				$popup_css_output      = array(
					'.kmt-popup-left ' . $content_selector . ', .kmt-popup-right ' . $content_selector . '' => array(
						'max-width' => kemet_slider( $popup_width ),
					),
					$content_selector => array(
						'--textColor' => esc_attr( $popup_text_color ),
					),
					$popup_selector . ' .toggle-button-close' => array(
						'--buttonColor'      => esc_attr( $popup_icon_bg_color ),
						'--buttonHoverColor' => esc_attr( $popup_icon_bg_h_color ),
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
			$typography       = kemet_get_option( $item . '-typography' );
			$weight_and_style = isset( $typography['variation'] ) ? self::get_weight_and_style( $typography['variation'] ) : array();
			$font_size        = isset( $typography['size'] ) ? $typography['size'] : '';
			$font_family      = isset( $typography['family'] ) ? $typography['family'] : '';
			$font_weight      = isset( $weight_and_style['weight'] ) ? $weight_and_style['weight'] : '';
			$text_transform   = isset( $typography['text-transform'] ) ? $typography['text-transform'] : '';
			$text_decoration  = isset( $typography['text-decoration'] ) ? $typography['text-decoration'] : '';
			$font_style       = isset( $weight_and_style['style'] ) ? $weight_and_style['style'] : '';
			$line_height      = isset( $typography['line-height'] ) ? $typography['line-height'] : '';
			$letter_spacing   = isset( $typography['letter-spacing'] ) ? $typography['letter-spacing'] : '';

			$css_output = array(
				$selector => array(
					'--fontSize'       => kemet_responsive_slider( $font_size, 'desktop' ),
					'--fontFamily'     => kemet_get_font_family( $font_family ),
					'--fontWeight'     => esc_attr( $font_weight ),
					'--letterSpacing'  => kemet_responsive_slider( $letter_spacing, 'desktop' ),
					'--lineHeight'     => kemet_responsive_slider( $line_height, 'desktop' ),
					'--textTransform'  => esc_attr( $text_transform ),
					'--fontStyle'      => esc_attr( $font_style ),
					'--textDecoration' => esc_attr( $text_decoration ),
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
		 * get_weight_and_style
		 *
		 * @param  mixed $variation
		 * @return array
		 */
		public static function get_weight_and_style( $variation ) {
			$variation_data = array();
			if ( preg_match( '#(n|i)(\d+?)$#', $variation, $matches ) ) {
				if ( 'i' === $matches[1] ) {
					$variation_data['style'] = 'italic';
				} else {
					$variation_data['style'] = 'normal';
				}

				$variation_data['weight'] = (int) $matches[2] . '00';
			}

			return $variation_data;
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

				$height            = kemet_get_option( $prefix . '-min-height' );
				$background        = kemet_get_option( $prefix . '-background' );
				$border            = kemet_get_option( $prefix . '-border-bottom' );
				$sticky_border     = kemet_get_option( $prefix . '-sticky-border-bottom' );
				$sticky_background = kemet_get_option( $prefix . '-sticky-background' );
				$layout            = kemet_get_option( $prefix . '-layout' );
				$layout_color      = kemet_get_sub_option( $prefix . '-layout-color', 'initial' );

				$css_output = array(
					$selector . ' .kmt-grid-row' => array(
						'--minHeight' => kemet_responsive_slider( $height, 'desktop' ),
					),
					'.kmt-sticky-' . $row . '-bar #sitehead ' . $selector . '.kmt-is-sticky' => array(
						'--borderBottom' => kemet_border( $sticky_border ),
					),
					$selector                    => array(
						'--borderBottom' => kemet_border( $border ),
					),
				);

				if ( 'boxed' === $layout || 'stretched' === $layout ) {
					$css_output[ $selector . ' .header-bar-content' ] = array(
						'--backgroundColor' => esc_attr( $layout_color ),
					);
				}

				/* Parse CSS from array() */
				$parse_css  = kemet_parse_css( $css_output );
				$parse_css .= kemet_get_responsive_background_obj( $selector, $background );
				$parse_css .= kemet_get_responsive_background_obj( '.kmt-sticky-' . $row . '-bar #sitehead ' . $selector . '.kmt-is-sticky', $sticky_background );

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

		/**
		 * Get Header Row Css
		 *
		 * @param string $row row.
		 * @return string
		 */
		public static function footer_row_css( $row ) {
			if ( Kemet_Builder_Helper::is_row_empty( $row, 'footer' ) ) {
				$selector                 = '.site-' . $row . '-footer-wrap';
				$prefix                   = $row . '-footer';
				$global_footer_text_color = kemet_get_sub_option( 'global-footer-text-color', 'initial' );

				$height               = kemet_get_option( $prefix . '-min-height' );
				$columns_padding      = kemet_get_option( $prefix . '-columns-padding' );
				$row_padding          = kemet_get_option( $prefix . '-row-padding' );
				$background           = kemet_get_option( $prefix . '-background' );
				$row_top_border       = kemet_get_option( $prefix . '-top-border-width' );
				$row_bottom_border    = kemet_get_option( $prefix . '-bottom-border-width' );
				$text_color           = kemet_get_sub_option( $prefix . '-font-color', 'text' );
				$links_color          = kemet_get_sub_option( $prefix . '-font-color', 'initial', $global_footer_text_color );
				$links_h_color        = kemet_get_sub_option( $prefix . '-font-color', 'hover' );
				$top_border           = kemet_get_option( $prefix . '-row-border-top' );
				$bottom_border        = kemet_get_option( $prefix . '-row-border-bottom' );
				$columns_border       = kemet_get_option( $prefix . '-columns-border-width' );
				$columns_border_color = kemet_get_sub_option( $prefix . '-columns-border-color', 'initial' );

				$css_output = array(
					$selector                    => array(
						'--textColor'       => esc_attr( $text_color ),
						'--linksColor'      => esc_attr( $links_color ),
						'--linksHoverColor' => esc_attr( $links_h_color ),
						'--rowBorderTop'    => kemet_responsive_border( $top_border, 'desktop' ),
						'--rowBorderBottom' => kemet_responsive_border( $bottom_border, 'desktop' ),
						'--padding-top'     => kemet_responsive_spacing( $row_padding, 'top', 'desktop' ),
						'--padding-bottom'  => kemet_responsive_spacing( $row_padding, 'bottom', 'desktop' ),
					),
					$selector . ' .kmt-grid-row' => array(
						'--minHeight' => kemet_responsive_slider( $height, 'desktop' ),
					),
					$selector . ' .site-' . $row . '-footer-inner-wrap > .site-footer-section' => array(
						'--padding' => kemet_responsive_spacing( $columns_padding, 'all', 'desktop' ),
					),
					$selector . ' .site-' . $row . '-footer-inner-wrap > .site-footer-section:after' => array(
						'--borderLeftWidth' => kemet_responsive_slider( $columns_border, 'desktop' ),
						'--borderLeftColor' => esc_attr( $columns_border_color ),
					),
					$selector . ' .site-footer-section.direction-column' => array(
						'--flexDirection' => 'column',
					),
				);

				/* Parse CSS from array() */
				$parse_css  = kemet_parse_css( $css_output );
				$parse_css .= kemet_get_responsive_background_obj( $selector, $background );

				$tablet = array(
					$selector                             => array(
						'--rowBorderTop'    => kemet_responsive_border( $top_border, 'tablet' ),
						'--rowBorderBottom' => kemet_responsive_border( $bottom_border, 'tablet' ),
						'--padding-top'     => kemet_responsive_spacing( $row_padding, 'top', 'tablet' ),
						'--padding-bottom'  => kemet_responsive_spacing( $row_padding, 'bottom', 'tablet' ),
					),
					$selector . ' .kmt-grid-row'          => array(
						'--minHeight' => kemet_responsive_slider( $height, 'tablet' ),
					),
					$selector . ' > .site-footer-section' => array(
						'--padding' => kemet_responsive_spacing( $columns_padding, 'all', 'tablet' ),
					),
					$selector . ' .site-' . $row . '-footer-inner-wrap > .site-footer-section:after' => array(
						'--borderLeftWidth' => kemet_responsive_slider( $columns_border, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector                             => array(
						'--rowBorderTop'    => kemet_responsive_border( $top_border, 'mobile' ),
						'--rowBorderBottom' => kemet_responsive_border( $bottom_border, 'mobile' ),
						'--padding-top'     => kemet_responsive_spacing( $row_padding, 'top', 'mobile' ),
						'--padding-bottom'  => kemet_responsive_spacing( $row_padding, 'bottom', 'mobile' ),
					),
					$selector . ' .kmt-grid-row'          => array(
						'--minHeight' => kemet_responsive_slider( $height, 'mobile' ),
					),
					$selector . ' > .site-footer-section' => array(
						'--padding' => kemet_responsive_spacing( $columns_padding, 'all', 'mobile' ),
					),
					$selector . ' .site-' . $row . '-footer-inner-wrap > .site-footer-section:after' => array(
						'--borderLeftWidth' => kemet_responsive_slider( $columns_border, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );
				$parse_css .= self::footer_columns_row_css( $row );

				return $parse_css;
			}
		}

		/**
		 * Get Footer Row Css
		 *
		 * @param string $row row.
		 * @return string
		 */
		public static function footer_columns_row_css( $row ) {
			$selector = '.site-' . $row . '-footer-wrap';
			$columns  = kemet_get_option( $row . '-footer-columns' );

			$css_output = array(
				$selector . ' .row-columns-1'              => array(
					'--gridTemplateColummns' => esc_attr( 'minmax(0, 1fr)' ),
				),
				$selector . ' .row-columns-2'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(2, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-3'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(3, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-4'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(4, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-5'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(5, minmax(0, 1fr))' ),
				),
				$selector . ' .row-layout-right-golden'    => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-golden' ) ),
				),
				$selector . ' .row-layout-left-golden'     => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-golden' ) ),
				),
				$selector . ' .row-layout-center-wide'     => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-wide' ) ),
				),
				$selector . ' .row-layout-center-half'     => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-half' ) ),
				),
				$selector . ' .row-layout-right-half'      => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-half' ) ),
				),
				$selector . ' .row-layout-left-half'       => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-half' ) ),
				),
				$selector . ' .row-layout-right-forty'     => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-forty' ) ),
				),
				$selector . ' .row-layout-center-forty'    => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-forty' ) ),
				),
				$selector . ' .row-layout-left-forty'      => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-forty' ) ),
				),
				$selector . ' .row-layout-right-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-five-forty' ) ),
				),
				$selector . ' .row-layout-center-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-five-forty' ) ),
				),
				$selector . ' .row-layout-left-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-five-forty' ) ),
				),
			);

			/* Parse CSS from array() */
			$parse_css = kemet_parse_css( $css_output );

			$tablet = array(
				$selector . ' .row-columns-1'              => array(
					'--gridTemplateColummns' => esc_attr( 'minmax(0, 1fr)' ),
				),
				$selector . ' .row-columns-2'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(2, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-3'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(3, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-4'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(4, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-5'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(5, minmax(0, 1fr))' ),
				),
				$selector . ' .row-layout-tablet-right-golden' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-golden' ) ),
				),
				$selector . ' .row-layout-tablet-left-golden' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-golden' ) ),
				),
				$selector . ' .row-layout-tablet-center-wide' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-wide' ) ),
				),
				$selector . ' .row-layout-tablet-center-half' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-half' ) ),
				),
				$selector . ' .row-layout-tablet-right-half' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-half' ) ),
				),
				$selector . ' .row-layout-tablet-left-half' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-half' ) ),
				),
				$selector . ' .row-layout-tablet-right-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-forty' ) ),
				),
				$selector . ' .row-layout-tablet-center-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-forty' ) ),
				),
				$selector . ' .row-layout-tablet-left-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-forty' ) ),
				),
				$selector . ' .row-layout-tablet-right-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-five-forty' ) ),
				),
				$selector . ' .row-layout-tablet-center-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-five-forty' ) ),
				),
				$selector . ' .row-layout-tablet-left-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-five-forty' ) ),
				),
				$selector . ' .row-layout-tablet-last-row' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'last-row' ) ),
				),
				$selector . ' .row-layout-tablet-first-row' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'first-row' ) ),
				),
				$selector . ' .row-layout-tablet-row'      => array(
					'--gridTemplateColummns' => esc_attr( 'minmax(0, 1fr)' ),
				),
				$selector . ' .row-layout-tablet-last-row>.site-footer-section:last-child' => array(
					'grid-column' => esc_attr( '1 / -1' ),
				),
				$selector . ' .row-layout-tablet-first-row>.site-footer-section:first-child' => array(
					'grid-column' => esc_attr( '1 / -1' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $tablet, '', '768' );

			$mobile = array(
				$selector . ' .row-columns-1'              => array(
					'--gridTemplateColummns' => esc_attr( 'minmax(0, 1fr)' ),
				),
				$selector . ' .row-columns-2'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(2, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-3'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(3, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-4'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(4, minmax(0, 1fr))' ),
				),
				$selector . ' .row-columns-5'              => array(
					'--gridTemplateColummns' => esc_attr( 'repeat(5, minmax(0, 1fr))' ),
				),
				$selector . ' .row-layout-mobile-right-golden' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-golden' ) ),
				),
				$selector . ' .row-layout-mobile-left-golden' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-golden' ) ),
				),
				$selector . ' .row-layout-mobile-center-wide' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-wide' ) ),
				),
				$selector . ' .row-layout-mobile-center-half' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-half' ) ),
				),
				$selector . ' .row-layout-mobile-right-half' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-half' ) ),
				),
				$selector . ' .row-layout-mobile-left-half' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-half' ) ),
				),
				$selector . ' .row-layout-mobile-right-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-forty' ) ),
				),
				$selector . ' .row-layout-mobile-center-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-forty' ) ),
				),
				$selector . ' .row-layout-mobile-left-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-forty' ) ),
				),
				$selector . ' .row-layout-mobile-right-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'right-five-forty' ) ),
				),
				$selector . ' .row-layout-mobile-center-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'center-five-forty' ) ),
				),
				$selector . ' .row-layout-mobile-left-five-forty' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'left-five-forty' ) ),
				),
				$selector . ' .row-layout-mobile-last-row' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'last-row' ) ),
				),
				$selector . ' .row-layout-mobile-first-row' => array(
					'--gridTemplateColummns' => esc_attr( self::get_grid_template_columns( 'first-row' ) ),
				),
				$selector . ' .row-layout-mobile-row'      => array(
					'--gridTemplateColummns' => esc_attr( 'minmax(0, 1fr)' ),
				),
				$selector . ' .row-layout-mobile-first-row>.site-footer-section:first-child' => array(
					'grid-column' => esc_attr( '1 / -1' ),
				),
				$selector . ' .row-layout-mobile-last-row>.site-footer-section:last-child' => array(
					'grid-column' => esc_attr( '1 / -1' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $mobile, '', '544' );

			return $parse_css;
		}

		/**
		 * get_grid_template_columns
		 *
		 * @param  string $layout
		 * @return string
		 */
		public static function get_grid_template_columns( $layout = '' ) {
			$grid_template_columns = '';
			switch ( $layout ) {
				case 'right-golden':
					$grid_template_columns = '1fr 2fr';
					break;
				case 'left-golden':
					$grid_template_columns = '2fr 1fr';
					break;
				case 'left-half':
					$grid_template_columns = '2fr 1fr 1fr';
					break;
				case 'right-half':
					$grid_template_columns = '1fr 2fr 1fr';
					break;
				case 'center-half':
					$grid_template_columns = '1fr 2fr 1fr';
					break;
				case 'center-wide':
					$grid_template_columns = '2fr 6fr 2fr';
					break;
				case 'center-forty':
					$grid_template_columns = '1fr 2fr 2fr 1fr';
					break;
				case 'right-forty':
					$grid_template_columns = '1fr 1fr 1fr 2fr';
					break;
				case 'left-forty':
					$grid_template_columns = '2fr 1fr 1fr 1fr';
					break;
				case 'center-five-forty':
					$grid_template_columns = '1fr 1fr 3fr 1fr 1fr';
					break;
				case 'right-five-forty':
					$grid_template_columns = '1fr 1fr 1fr 1fr 3fr';
					break;
				case 'left-five-forty':
					$grid_template_columns = '3fr 1fr 1fr 1fr 1fr';
					break;
				case 'left-six-heavy':
					$grid_template_columns = '2fr 1fr 1fr 1fr 1fr 1fr';
					break;
				case 'six-six-heavy':
					$grid_template_columns = '1fr 1fr 2fr 2fr 1fr 1fr';
					break;
				case 'right-six-heavy':
					$grid_template_columns = '1fr 1fr 1fr 1fr 1fr 2fr';
					break;
				case 'row':
					$grid_template_columns = 'minmax(0, 1fr)';
					break;
				case 'first-row':
				case 'last-row':
					$grid_template_columns = '1fr 1fr';
					break;
			}
			return $grid_template_columns;
		}
	}
endif;
