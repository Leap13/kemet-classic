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
				$icon_color           = kemet_get_option( 'search-icon-color' );
				$icon_h_color         = kemet_get_option( 'search-icon-color' );
				$text_color           = kemet_get_option( 'search-input-text-color' );
				$bg_color             = kemet_get_option( 'search-form-bg-color' );
				$input_bg_color       = kemet_get_option( 'search-input-bg-color' );
				$text_focus_color     = kemet_get_option( 'search-input-text-color' );
				$input_bg_focus_color = kemet_get_option( 'search-input-bg-color' );

				$css_output = array(
					$parent_selector . ' form' => array(
						'background-color' => kemet_responsive_color( $bg_color, 'initial', 'desktop' ),
					),
					$parent_selector . ' .kemet-search-icon' => array(
						'--linksColor'      => kemet_responsive_color( $icon_color, 'initial', 'desktop' ),
						'--linksHoverColor' => kemet_responsive_color( $icon_h_color, 'hover', 'desktop' ),
						'--fontSize'        => kemet_responsive_slider( $icon_size, 'desktop' ),
					),
					$selector                  => array(
						'width'                       => kemet_responsive_slider( $input_width, 'desktop' ),
						'--inputColor'                => kemet_responsive_color( $text_color, 'initial', 'desktop' ),
						'--inputBackgroundColor'      => kemet_responsive_color( $input_bg_color, 'initial', 'desktop' ),
						'--inputFocusColor'           => kemet_responsive_color( $text_focus_color, 'focus', 'desktop' ),
						'--inputFocusBackgroundColor' => kemet_responsive_color( $input_bg_focus_color, 'focus', 'desktop' ),
					),
					'.kmt-search-menu-icon'    => array(
						'z-index' => esc_attr( '999' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$parent_selector . ' form' => array(
						'background-color' => kemet_responsive_color( $bg_color, 'initial', 'tablet' ),
					),
					$selector                  => array(
						'width'                       => kemet_responsive_slider( $input_width, 'tablet' ),
						'--inputColor'                => kemet_responsive_color( $text_color, 'initial', 'tablet' ),
						'--inputBackgroundColor'      => kemet_responsive_color( $input_bg_color, 'initial', 'tablet' ),
						'--inputFocusColor'           => kemet_responsive_color( $text_focus_color, 'focus', 'tablet' ),
						'--inputFocusBackgroundColor' => kemet_responsive_color( $input_bg_focus_color, 'focus', 'tablet' ),
					),
					$parent_selector . ' .kemet-search-icon' => array(
						'--linksColor'      => kemet_responsive_color( $icon_color, 'initial', 'tablet' ),
						'--linksHoverColor' => kemet_responsive_color( $icon_h_color, 'hover', 'tablet' ),
						'--fontSize'        => kemet_responsive_slider( $icon_size, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$parent_selector . ' form' => array(
						'background-color' => kemet_responsive_color( $bg_color, 'initial', 'mobile' ),
					),
					$selector                  => array(
						'width'                       => kemet_responsive_slider( $input_width, 'mobile' ),
						'--inputColor'                => kemet_responsive_color( $text_color, 'initial', 'mobile' ),
						'--inputBackgroundColor'      => kemet_responsive_color( $input_bg_color, 'initial', 'mobile' ),
						'--inputFocusColor'           => kemet_responsive_color( $text_focus_color, 'focus', 'mobile' ),
						'--inputFocusBackgroundColor' => kemet_responsive_color( $input_bg_focus_color, 'focus', 'mobile' ),
					),
					$parent_selector . ' .kemet-search-icon' => array(
						'--linksColor'      => kemet_responsive_color( $icon_color, 'initial', 'mobile' ),
						'--linksHoverColor' => kemet_responsive_color( $icon_h_color, 'hover', 'mobile' ),
						'--fontSize'        => kemet_responsive_slider( $icon_size, 'mobile' ),
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

