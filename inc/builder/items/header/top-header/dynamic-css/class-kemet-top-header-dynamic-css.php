<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Top_Header_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Top_Header_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_row_empty( 'top', 'header', 'desktop' ) || Kemet_Builder_Helper::is_row_empty( 'top', 'header', 'mobile' ) ) {
				$selector = '.kmt-top-header-wrap .top-header-bar';
				$prefix   = 'top-header';

				$height           = kemet_get_option( $prefix . '-min-height' );
				$background       = kemet_get_option( $prefix . '-background' );
				$border           = kemet_get_option( $prefix . '-border-width' );
				$border_color     = kemet_get_option( $prefix . '-border-color' );
				$stick_background = kemet_get_option( $prefix . '-sticky-background' );

				$css_output = array(
					$selector => array(
						'border-style'        => esc_attr( 'solid' ),
						'min-height'          => kemet_responsive_slider( $height, 'desktop' ),
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
					$selector => array(
						'min-height'          => kemet_responsive_slider( $height, 'tablet' ),
						'border-top-width'    => kemet_responsive_spacing( $border, 'top', 'tablet' ),
						'border-right-width'  => kemet_responsive_spacing( $border, 'right', 'tablet' ),
						'border-bottom-width' => kemet_responsive_spacing( $border, 'bottom', 'tablet' ),
						'border-left-width'   => kemet_responsive_spacing( $border, 'left', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'min-height'          => kemet_responsive_slider( $height, 'mobile' ),
						'border-top-width'    => kemet_responsive_spacing( $border, 'top', 'mobile' ),
						'border-right-width'  => kemet_responsive_spacing( $border, 'right', 'mobile' ),
						'border-bottom-width' => kemet_responsive_spacing( $border, 'bottom', 'mobile' ),
						'border-left-width'   => kemet_responsive_spacing( $border, 'left', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css   .= kemet_parse_css( $mobile, '', '544' );
				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Top_Header_Dynamic_Css();

