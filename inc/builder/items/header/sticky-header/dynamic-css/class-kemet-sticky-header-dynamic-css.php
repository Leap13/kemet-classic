<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Sticky_Header_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Sticky_Header_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Sticky_Header_Partials::enable_sticky() ) {
				$selector          = '.kmt-is-sticky';
				$sticky_logo_width = kemet_get_option( 'sticky-logo-width' );

				$css_output = array(
					$selector                              => array(
						'position' => esc_attr( 'fixed' ),
						'width'    => esc_attr( '100%' ),
						'z-index'  => esc_attr( '999' ),
					),
					'.custom-logo-link.sticky-custom-logo' => array(
						'display' => esc_attr( 'none' ),
					),
					'.kmt-sticky-logo ' . $selector . ' .custom-logo-link' => array(
						'display' => esc_attr( 'none' ),
					),
					'.kmt-sticky-logo ' . $selector . ' .sticky-custom-logo' => array(
						'display' => esc_attr( 'block' ),
					),
					$selector . ' .header-bar-content'     => array(
						'display' => esc_attr( 'transparent !important' ),
					),
					'.kmt-shrink-effect .kmt-grid-row'     => array(
						'transition' => esc_attr( 'all 0.3s linear' ),
					),
					$selector . ' .custom-logo-link img , ' . $selector . ' .kemet-logo-svg' => array(
						'--logoWidth' => kemet_responsive_slider( $sticky_logo_width, 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector . ' .custom-logo-link img , ' . $selector . ' .kemet-logo-svg' => array(
						'--logoWidth' => kemet_responsive_slider( $sticky_logo_width, 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector . ' .custom-logo-link img , ' . $selector . ' .kemet-logo-svg' => array(
						'--logoWidth' => kemet_responsive_slider( $sticky_logo_width, 'mobile' ),
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

new Kemet_Sticky_Header_Dynamic_Css();

