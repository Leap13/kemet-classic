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
				$global_border_color = kemet_get_option( 'global-border-color' );

				$selector        = '.kmt-search-box-form .search-field';
				$parent_selector = '.kmt-header-item-search-box';
				$width           = kemet_get_option( 'search-box-width' );
				$icon_size       = kemet_get_option( 'search-box-icon-size' );
				$text_color      = kemet_get_option( 'search-box-text-color' );
				$icon_color      = kemet_get_option( 'search-box-icon-color', $text_color );
				$icon_h_color    = kemet_get_option( 'search-box-icon-h-color' );
				$bg_color        = kemet_get_option( 'search-box-bg-color' );
				$border_width    = kemet_get_option( 'search-box-border-width' );
				$border_color    = kemet_get_option( 'search-box-border-color', $global_border_color );

				$css_output = array(
					$selector => array(
						'width'            => kemet_responsive_slider( $width, 'desktop' ),
						'color'            => esc_attr( $text_color ),
						'background-color' => esc_attr( $bg_color ),
						'border-width'     => kemet_responsive_slider( $border_width, 'desktop' ),
						'border-color'     => esc_attr( $border_color ),
					),
					$parent_selector . ' .kmt-search-box-form::after' => array(
						'color'     => esc_attr( $icon_color ),
						'font-size' => kemet_responsive_slider( $icon_size, 'desktop' ),
					),
					$parent_selector . ' .kmt-search-box-form:hover::after' => array(
						'color' => esc_attr( $icon_h_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'width'        => kemet_responsive_slider( $width, 'tablet' ),
						'border-width' => kemet_responsive_slider( $border_width, 'tablet' ),
					),
					$parent_selector . ' .kmt-search-box-form::after' => array(
						'font-size' => kemet_responsive_slider( $icon_size, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'width'        => kemet_responsive_slider( $width, 'mobile' ),
						'border-width' => kemet_responsive_slider( $border_width, 'mobile' ),
					),
					$parent_selector . ' .kmt-search-box-form::after' => array(
						'font-size' => kemet_responsive_slider( $icon_size, 'mobile' ),
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

