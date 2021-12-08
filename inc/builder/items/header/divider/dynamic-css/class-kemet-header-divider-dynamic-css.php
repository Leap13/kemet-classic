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
				$selector               = '.kmt-divider-container';
				$divider_height         = kemet_get_option( 'divider-height' );
				$divider_border         = kemet_get_option( 'divider-width' );
				$divider_margin         = kemet_get_option( 'divider-margin' );

				$css_output = array(
					$selector => array(
						'border-right' => kemet_border( $divider_border ),
						'height'       => kemet_responsive_slider( $divider_height, 'desktop' ),
						'margin'       => kemet_responsive_spacing( $divider_margin, 'all', 'desktop'),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector                  => array(
						'height'       => kemet_responsive_slider( $divider_height, 'tablet' ),
						'margin'      => kemet_responsive_spacing( $divider_margin, 'all', 'tablet'),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector                  => array(
						'height'             => kemet_responsive_slider( $divider_height, 'mobile' ),
						'margin'       => kemet_responsive_spacing( $divider_margin, 'all', 'mobile'),
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

new Kemet_Header_Divider_Dynamic_Css();

