<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Search_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Search_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'search', 'header', 'all' ) ) {
				$selector             = '.kmt-search-menu-icon form .search-field';
				$parent_selector      = '.kmt-header-item-search';
				$input_width          = kemet_get_option( 'search-input-width' );
				$icon_size            = kemet_get_option( 'search-icon-size' );
				$icon_color           = kemet_get_sub_option( 'search-icon-color', 'initial' );
				$icon_h_color         = kemet_get_sub_option( 'search-icon-color', 'hover' );
				$text_color           = kemet_get_sub_option( 'search-input-text-color', 'initial' );
				$bg_color             = kemet_get_sub_option( 'search-form-bg-color', 'initial', 'var(--globalBackgroundColor)' );
				$input_bg_color       = kemet_get_sub_option( 'search-input-bg-color', 'initial' );
				$text_focus_color     = kemet_get_sub_option( 'search-input-text-color', 'focus' );
				$input_bg_focus_color = kemet_get_sub_option( 'search-input-bg-color', 'focus' );

				$css_output = array(
					$parent_selector . ' form' => array(
						'background-color' => esc_attr( $bg_color ),
					),
					$parent_selector . ' .kemet-search-icon' => array(
						'--linksColor'      => esc_attr( $icon_color ),
						'--linksHoverColor' => esc_attr( $icon_h_color ),
						'--fontSize'        => kemet_responsive_slider( $icon_size, 'desktop' ),
					),
					$selector                  => array(
						'width'                       => kemet_responsive_slider( $input_width, 'desktop' ),
						'--inputColor'                => esc_attr( $text_color ),
						'--inputBackgroundColor'      => esc_attr( $input_bg_color ),
						'--inputFocusColor'           => esc_attr( $text_focus_color ),
						'--inputFocusBackgroundColor' => esc_attr( $input_bg_focus_color ),
					),
					'.kmt-search-menu-icon'    => array(
						'z-index' => esc_attr( '999' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'width' => kemet_responsive_slider( $input_width, 'tablet' ),
					),
					$parent_selector . ' .kemet-search-icon' => array(
						'--fontSize' => kemet_responsive_slider( $icon_size, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'width' => kemet_responsive_slider( $input_width, 'mobile' ),
					),
					$parent_selector . ' .kemet-search-icon' => array(
						'--fontSize' => kemet_responsive_slider( $icon_size, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$parse_css .= Kemet_Dynamic_Css_Generator::typography_css( 'search', $selector );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Search_Dynamic_Css();

