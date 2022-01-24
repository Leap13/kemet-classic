<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Social_Icons_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Social_Icons_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$prefix = 'social-icons';
			if ( Kemet_Builder_Helper::is_item_loaded( $prefix, 'header', 'all' ) ) {
				$selector           = '.kmt-' . $prefix;
				$icon_size          = kemet_get_option( $prefix . '-icon-size' );
				$icon_color         = kemet_get_option( $prefix . '-icon-color' );
				$icon_bg_color      = kemet_get_option( $prefix . '-bg-icon-color' );
				$icon_border        = kemet_get_option( $prefix . '-icon-border' );
				$icon_border_radius = kemet_get_option( $prefix . '-border-radius' );
				$icon_margin        = kemet_get_option( $prefix . '-icon-margin' );
				$icon_padding       = kemet_get_option( $prefix . '-icon-padding' );
				$icons_margin       = kemet_get_option( $prefix . '-margin' );

				$css_output = array(
					$selector . ' .kmt-social-icon' => array(
						'--icon-size'     => kemet_responsive_slider( $icon_size, 'desktop' ),
						'--color'         => kemet_responsive_color( $icon_color, 'initial', 'desktop' ),
						'--hover-color'   => kemet_responsive_color( $icon_color, 'hover', 'desktop' ),
						'--border-radius' => kemet_responsive_slider( $icon_border_radius, 'desktop' ),
						'margin-top'      => kemet_responsive_spacing( $icon_margin, 'top', 'desktop' ),
						'margin-right'    => kemet_responsive_spacing( $icon_margin, 'right', 'desktop' ),
						'margin-bottom'   => kemet_responsive_spacing( $icon_margin, 'bottom', 'desktop' ),
						'margin-left'     => kemet_responsive_spacing( $icon_margin, 'left', 'desktop' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon, ' . $selector . '[data-style="solid"] .kmt-social-icon' => array(
						'padding-top'    => kemet_responsive_spacing( $icon_padding, 'top', 'desktop' ),
						'padding-right'  => kemet_responsive_spacing( $icon_padding, 'right', 'desktop' ),
						'padding-bottom' => kemet_responsive_spacing( $icon_padding, 'bottom', 'desktop' ),
						'padding-left'   => kemet_responsive_spacing( $icon_padding, 'left', 'desktop' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon' => array(
						'border' => kemet_responsive_border( $icon_border, 'desktop' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon:hover' => array(
						'border-color' => kemet_get_sub_responsive_value( $icon_border, 'secondColor', 'desktop' ),
					),
					$selector . '[data-style="solid"] .kmt-social-icon' => array(
						'--bg-color'       => kemet_responsive_color( $icon_bg_color, 'initial', 'desktop' ),
						'--bg-hover-color' => kemet_responsive_color( $icon_bg_color, 'hover', 'desktop' ),
					),
					$selector                       => array(
						'--margin-top'    => kemet_responsive_spacing( $icons_margin, 'top', 'desktop' ),
						'--margin-right'  => kemet_responsive_spacing( $icons_margin, 'right', 'desktop' ),
						'--margin-bottom' => kemet_responsive_spacing( $icons_margin, 'bottom', 'desktop' ),
						'--margin-left'   => kemet_responsive_spacing( $icons_margin, 'left', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector . ' .kmt-social-icon' => array(
						'--icon-size'     => kemet_responsive_slider( $icon_size, 'tablet' ),
						'--color'         => kemet_responsive_color( $icon_color, 'initial', 'tablet' ),
						'--hover-color'   => kemet_responsive_color( $icon_color, 'hover', 'tablet' ),
						'--border-radius' => kemet_responsive_slider( $icon_border_radius, 'tablet' ),
						'margin-top'      => kemet_responsive_spacing( $icon_margin, 'top', 'tablet' ),
						'margin-right'    => kemet_responsive_spacing( $icon_margin, 'right', 'tablet' ),
						'margin-bottom'   => kemet_responsive_spacing( $icon_margin, 'bottom', 'tablet' ),
						'margin-left'     => kemet_responsive_spacing( $icon_margin, 'left', 'tablet' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon, ' . $selector . '[data-style="solid"] .kmt-social-icon' => array(
						'padding-top'    => kemet_responsive_spacing( $icon_padding, 'top', 'tablet' ),
						'padding-right'  => kemet_responsive_spacing( $icon_padding, 'right', 'tablet' ),
						'padding-bottom' => kemet_responsive_spacing( $icon_padding, 'bottom', 'tablet' ),
						'padding-left'   => kemet_responsive_spacing( $icon_padding, 'left', 'tablet' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon' => array(
						'border' => kemet_responsive_border( $icon_border, 'tablet' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon:hover' => array(
						'border-color' => kemet_get_sub_responsive_value( $icon_border, 'secondColor', 'tablet' ),
					),
					$selector . '[data-style="solid"] .kmt-social-icon' => array(
						'--bg-color'       => kemet_responsive_color( $icon_bg_color, 'initial', 'tablet' ),
						'--bg-hover-color' => kemet_responsive_color( $icon_bg_color, 'hover', 'tablet' ),
					),
					$selector                       => array(
						'--margin-top'    => kemet_responsive_spacing( $icons_margin, 'top', 'tablet' ),
						'--margin-right'  => kemet_responsive_spacing( $icons_margin, 'right', 'tablet' ),
						'--margin-bottom' => kemet_responsive_spacing( $icons_margin, 'bottom', 'tablet' ),
						'--margin-left'   => kemet_responsive_spacing( $icons_margin, 'left', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' .kmt-social-icon' => array(
						'--icon-size'     => kemet_responsive_slider( $icon_size, 'mobile' ),
						'--color'         => kemet_responsive_color( $icon_color, 'initial', 'mobile' ),
						'--hover-color'   => kemet_responsive_color( $icon_color, 'hover', 'mobile' ),
						'--border-radius' => kemet_responsive_slider( $icon_border_radius, 'mobile' ),
						'margin-top'      => kemet_responsive_spacing( $icon_margin, 'top', 'mobile' ),
						'margin-right'    => kemet_responsive_spacing( $icon_margin, 'right', 'mobile' ),
						'margin-bottom'   => kemet_responsive_spacing( $icon_margin, 'bottom', 'mobile' ),
						'margin-left'     => kemet_responsive_spacing( $icon_margin, 'left', 'mobile' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon, ' . $selector . '[data-style="solid"] .kmt-social-icon' => array(
						'padding-top'    => kemet_responsive_spacing( $icon_padding, 'top', 'mobile' ),
						'padding-right'  => kemet_responsive_spacing( $icon_padding, 'right', 'mobile' ),
						'padding-bottom' => kemet_responsive_spacing( $icon_padding, 'bottom', 'mobile' ),
						'padding-left'   => kemet_responsive_spacing( $icon_padding, 'left', 'mobile' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon' => array(
						'border' => kemet_responsive_border( $icon_border, 'mobile' ),
					),
					$selector . '[data-style="outline"] .kmt-social-icon:hover' => array(
						'border-color' => kemet_get_sub_responsive_value( $icon_border, 'secondColor', 'mobile' ),
					),
					$selector . '[data-style="solid"] .kmt-social-icon' => array(
						'--bg-color'       => kemet_responsive_color( $icon_bg_color, 'initial', 'mobile' ),
						'--bg-hover-color' => kemet_responsive_color( $icon_bg_color, 'hover', 'mobile' ),
					),
					$selector                       => array(
						'--margin-top'    => kemet_responsive_spacing( $icons_margin, 'top', 'mobile' ),
						'--margin-right'  => kemet_responsive_spacing( $icons_margin, 'right', 'mobile' ),
						'--margin-bottom' => kemet_responsive_spacing( $icons_margin, 'bottom', 'mobile' ),
						'--margin-left'   => kemet_responsive_spacing( $icons_margin, 'left', 'mobile' ),
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

new Kemet_Header_Social_Icons_Dynamic_Css();

