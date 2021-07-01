<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Search_Box_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Search_Box_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'search-box', 'header', 'all' ) ) {
				$selector           = '.kmt-search-box-form .search-field';
				$parent_selector    = '.kmt-header-item-search-box';
				$width              = kemet_get_option( 'search-box-width' );
				$icon_size          = kemet_get_option( 'search-box-icon-size' );
				$text_color         = kemet_get_option( 'search-box-text-color' );
				$text_focus_color   = kemet_get_option( 'search-box-text-focus-color' );
				$icon_color         = kemet_get_option( 'search-box-icon-color', $text_color );
				$border_color       = kemet_get_option( 'search-box-border-color' );
				$border_focus_color = kemet_get_option( 'search-box-border-focus-color' );
				$icon_h_color       = kemet_get_option( 'search-box-icon-h-color' );
				$bg_color           = kemet_get_option( 'search-box-bg-color' );
				$bg_focus_color     = kemet_get_option( 'search-box-bg-focus-color' );
				$border_width       = kemet_get_option( 'search-box-border-width' );

				$css_output = array(
					$selector => array(
						'width'                       => kemet_responsive_slider( $width, 'desktop' ),
						'--inputColor'                => esc_attr( $text_color ),
						'--inputBackgroundColor'      => esc_attr( $bg_color ),
						'--inputBorderWidth'          => kemet_responsive_slider( $border_width, 'desktop' ),
						'--inputBorderColor'          => esc_attr( $border_color ),
						'--inputFocusColor'           => esc_attr( $text_focus_color ),
						'--inputFocusBackgroundColor' => esc_attr( $bg_focus_color ),
						'--inputFocusBorderColor'     => esc_attr( $border_focus_color ),
					),
					$parent_selector . ' .kmt-search-box-form::after' => array(
						'color'        => 'var(--inputColor)',
						'font-size'    => 'var(--fontSize)',
						'--inputColor' => esc_attr( $icon_color ),
						'--fontSize'   => kemet_responsive_slider( $icon_size, 'desktop' ),
					),
					$parent_selector . ' .kmt-search-box-form:hover::after' => array(
						'--inputColor' => esc_attr( $icon_h_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'width'              => kemet_responsive_slider( $width, 'tablet' ),
						'--inputBorderWidth' => kemet_responsive_slider( $border_width, 'tablet' ),
					),
					$parent_selector . ' .kmt-search-box-form::after' => array(
						'--fontSize' => kemet_responsive_slider( $icon_size, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'width'              => kemet_responsive_slider( $width, 'mobile' ),
						'--inputBorderWidth' => kemet_responsive_slider( $border_width, 'mobile' ),
					),
					$parent_selector . ' .kmt-search-box-form::after' => array(
						'--fontSize' => kemet_responsive_slider( $icon_size, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'search-box', $selector );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Search_Box_Dynamic_Css();

