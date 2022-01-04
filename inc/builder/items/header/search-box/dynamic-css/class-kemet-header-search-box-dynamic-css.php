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
				$height             = kemet_get_option( 'search-box-height' );
				$text_color         = kemet_get_option( 'search-box-text-color' );
				$text_focus_color   = kemet_get_option( 'search-box-text-color' );
				$icon_color         = kemet_get_option( 'search-box-icon-color' );
				$border_color       = kemet_get_option( 'search-box-border-color' );
				$border_focus_color = kemet_get_option( 'search-box-border-color' );
				$icon_h_color       = kemet_get_option( 'search-box-icon-color' );
				$bg_color           = kemet_get_option( 'search-box-bg-color' );
				$bg_focus_color     = kemet_get_option( 'search-box-bg-color' );
				$border_width       = kemet_get_option( 'search-box-border-width' );
				$border_radius      = kemet_get_option( 'search-box-radius' );
				$margin             = kemet_get_option( 'search-box-margin' );

				$css_output = array(
					$parent_selector => array(
						'margin-top'    => kemet_responsive_spacing( $margin, 'top', 'desktop' ),
						'margin-right'  => kemet_responsive_spacing( $margin, 'right', 'desktop' ),
						'margin-bottom' => kemet_responsive_spacing( $margin, 'bottom', 'desktop' ),
						'margin-left'   => kemet_responsive_spacing( $margin, 'left', 'desktop' ),
					),
					$selector        => array(
						'border-radius'               => 'var(--borderRadius)',
						'width'                       => kemet_responsive_slider( $width, 'desktop' ),
						'height'                      => kemet_responsive_slider( $height, 'desktop' ),
						'--inputColor'                => kemet_responsive_color( $text_color, 'initial', 'desktop' ),
						'--inputBackgroundColor'      => kemet_responsive_color( $bg_color, 'initial', 'desktop' ),
						'--inputBorderWidth'          => kemet_responsive_slider( $border_width, 'desktop' ),
						'--inputBorderColor'          => kemet_responsive_color( $border_color, 'initial', 'desktop' ),
						'--inputFocusColor'           => kemet_responsive_color( $text_focus_color, 'focus', 'desktop' ),
						'--inputFocusBackgroundColor' => kemet_responsive_color( $bg_focus_color, 'focus', 'desktop' ),
						'--inputFocusBorderColor'     => kemet_responsive_color( $border_focus_color, 'focus', 'desktop' ),
						'--border-radius-top'         => kemet_responsive_spacing( $border_radius, 'top', 'desktop' ),
						'--border-radius-right'       => kemet_responsive_spacing( $border_radius, 'right', 'desktop' ),
						'--border-radius-bottom'      => kemet_responsive_spacing( $border_radius, 'bottom', 'desktop' ),
						'--border-radius-left'        => kemet_responsive_spacing( $border_radius, 'left', 'desktop' ),
					),
					$parent_selector . ' .kmt-search-box-form .icon-search' => array(
						'color'       => 'var(--iconColor)',
						'font-size'   => 'var(--fontSize)',
						'--iconColor' => kemet_responsive_color( $icon_color, 'initial', 'desktop' ),
					),
					$parent_selector . ' .kemet-search-svg-icon-wrap:hover .icon-search' => array(
						'--iconColor' => kemet_responsive_color( $icon_h_color, 'hover', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$parent_selector => array(
						'margin-top'    => kemet_responsive_spacing( $margin, 'top', 'tablet' ),
						'margin-right'  => kemet_responsive_spacing( $margin, 'right', 'tablet' ),
						'margin-bottom' => kemet_responsive_spacing( $margin, 'bottom', 'tablet' ),
						'margin-left'   => kemet_responsive_spacing( $margin, 'left', 'tablet' ),
					),
					$selector        => array(
						'width'                       => kemet_responsive_slider( $width, 'tablet' ),
						'height'                      => kemet_responsive_slider( $height, 'tablet' ),
						'--inputBorderWidth'          => kemet_responsive_slider( $border_width, 'tablet' ),
						'--border-radius-top'         => kemet_responsive_spacing( $border_radius, 'top', 'tablet' ),
						'--border-radius-right'       => kemet_responsive_spacing( $border_radius, 'right', 'tablet' ),
						'--border-radius-bottom'      => kemet_responsive_spacing( $border_radius, 'bottom', 'tablet' ),
						'--border-radius-left'        => kemet_responsive_spacing( $border_radius, 'left', 'tablet' ),
						'--inputColor'                => kemet_responsive_color( $text_color, 'initial', 'tablet' ),
						'--inputBackgroundColor'      => kemet_responsive_color( $bg_color, 'initial', 'tablet' ),
						'--inputBorderColor'          => kemet_responsive_color( $border_color, 'initial', 'tablet' ),
						'--inputFocusColor'           => kemet_responsive_color( $text_focus_color, 'focus', 'tablet' ),
						'--inputFocusBackgroundColor' => kemet_responsive_color( $bg_focus_color, 'focus', 'tablet' ),
						'--inputFocusBorderColor'     => kemet_responsive_color( $border_focus_color, 'focus', 'tablet' ),
					),
					$parent_selector . ' .kmt-search-box-form .icon-search' => array(
						'--iconColor' => kemet_responsive_color( $icon_color, 'initial', 'tablet' ),
					),
					$parent_selector . ' .kemet-search-svg-icon-wrap:hover .icon-search' => array(
						'--iconColor' => kemet_responsive_color( $icon_h_color, 'hover', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$parent_selector => array(
						'margin-top'    => kemet_responsive_spacing( $margin, 'top', 'mobile' ),
						'margin-right'  => kemet_responsive_spacing( $margin, 'right', 'mobile' ),
						'margin-bottom' => kemet_responsive_spacing( $margin, 'bottom', 'mobile' ),
						'margin-left'   => kemet_responsive_spacing( $margin, 'left', 'mobile' ),
					),
					$selector        => array(
						'width'                       => kemet_responsive_slider( $width, 'mobile' ),
						'height'                      => kemet_responsive_slider( $height, 'mobile' ),
						'--inputBorderWidth'          => kemet_responsive_slider( $border_width, 'mobile' ),
						'--border-radius-top'         => kemet_responsive_spacing( $border_radius, 'top', 'mobile' ),
						'--border-radius-right'       => kemet_responsive_spacing( $border_radius, 'right', 'mobile' ),
						'--border-radius-bottom'      => kemet_responsive_spacing( $border_radius, 'bottom', 'mobile' ),
						'--border-radius-left'        => kemet_responsive_spacing( $border_radius, 'left', 'mobile' ),
						'--inputColor'                => kemet_responsive_color( $text_color, 'initial', 'mobile' ),
						'--inputBackgroundColor'      => kemet_responsive_color( $bg_color, 'initial', 'mobile' ),
						'--inputBorderColor'          => kemet_responsive_color( $border_color, 'initial', 'mobile' ),
						'--inputFocusColor'           => kemet_responsive_color( $text_focus_color, 'focus', 'mobile' ),
						'--inputFocusBackgroundColor' => kemet_responsive_color( $bg_focus_color, 'focus', 'mobile' ),
						'--inputFocusBorderColor'     => kemet_responsive_color( $border_focus_color, 'focus', 'mobile' ),
					),
					$parent_selector . ' .kmt-search-box-form .icon-search' => array(
						'--iconColor' => kemet_responsive_color( $icon_color, 'initial', 'mobile' ),
					),
					$parent_selector . ' .kemet-search-svg-icon-wrap:hover .icon-search' => array(
						'--iconColor' => kemet_responsive_color( $icon_h_color, 'hover', 'mobile' ),
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

