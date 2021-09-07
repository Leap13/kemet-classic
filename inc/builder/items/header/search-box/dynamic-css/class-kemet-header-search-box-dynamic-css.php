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
				$text_color         = kemet_get_sub_option( 'search-box-text-color', 'initial' );
				$text_focus_color   = kemet_get_sub_option( 'search-box-text-color', 'focus' );
				$icon_color         = kemet_get_sub_option( 'search-box-icon-color', 'initial', $text_color );
				$border_color       = kemet_get_sub_option( 'search-box-border-color', 'initial' );
				$border_focus_color = kemet_get_sub_option( 'search-box-border-color', 'focus' );
				$icon_h_color       = kemet_get_sub_option( 'search-box-icon-color', 'hover' );
				$bg_color           = kemet_get_sub_option( 'search-box-bg-color', 'initial' );
				$bg_focus_color     = kemet_get_sub_option( 'search-box-bg-color', 'focus' );
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
					$parent_selector . ' .kmt-search-box-form .icon-search' => array(
						'color'       => 'var(--iconColor)',
						'font-size'   => 'var(--fontSize)',
						'--iconColor' => esc_attr( $icon_color ),
						'--fontSize'  => kemet_responsive_slider( $icon_size, 'desktop' ),
					),
					$parent_selector . ' .kemet-search-svg-icon-wrap:hover .icon-search' => array(
						'--iconColor' => esc_attr( $icon_h_color ),
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

