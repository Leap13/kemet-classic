<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Divider_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Divider_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'divider', 'header', 'all' ) ) {
				$selector       = '.kmt-divider-container';
				$divider_size   = kemet_get_option( 'divider-size' );
				$divider_border = kemet_get_option( 'divider-width' );
				$divider_margin = kemet_get_option( 'divider-margin' );

				$css_output = array(
					$selector                         => array(
						'margin-top'    => kemet_responsive_spacing( $divider_margin, 'top', 'desktop' ),
						'margin-right'  => kemet_responsive_spacing( $divider_margin, 'right', 'desktop' ),
						'margin-bottom' => kemet_responsive_spacing( $divider_margin, 'bottom', 'desktop' ),
						'margin-left'   => kemet_responsive_spacing( $divider_margin, 'left', 'desktop' ),
						'--border'      => kemet_border( $divider_border ),
						'--size'        => kemet_responsive_slider( $divider_size, 'desktop' ),
					),
					$selector . '.divider-vertical'   => array(
						'border-right' => 'var(--border, 1px solid var(--borderColor))',
						'height'       => 'var(--size, 25px)',
					),
					$selector . '.divider-horizontal' => array(
						'border-top' => 'var(--border, 1px solid var(--borderColor))',
						'width'      => 'var(--size, 25px)',
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'margin-top'    => kemet_responsive_spacing( $divider_margin, 'top', 'tablet' ),
						'margin-right'  => kemet_responsive_spacing( $divider_margin, 'right', 'tablet' ),
						'margin-bottom' => kemet_responsive_spacing( $divider_margin, 'bottom', 'tablet' ),
						'margin-left'   => kemet_responsive_spacing( $divider_margin, 'left', 'tablet' ),
						'--size'        => kemet_responsive_slider( $divider_size, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'margin-top'    => kemet_responsive_spacing( $divider_margin, 'top', 'mobile' ),
						'margin-right'  => kemet_responsive_spacing( $divider_margin, 'right', 'mobile' ),
						'margin-bottom' => kemet_responsive_spacing( $divider_margin, 'bottom', 'mobile' ),
						'margin-left'   => kemet_responsive_spacing( $divider_margin, 'left', 'mobile' ),
						'--size'        => kemet_responsive_slider( $divider_size, 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $mobile, '', '544' );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Header_Divider_Dynamic_Css();

