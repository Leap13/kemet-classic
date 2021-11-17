<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Overlay_Header_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Overlay_Header_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			$prefix         = 'overlay-header';
			$overlay_header = apply_filters( 'kemet_enable_overlay_header', kemet_get_option( $prefix . '-enable' ) );

			if ( $overlay_header ) {
				$enable_device = kemet_get_option( $prefix . '-enable-device' );
				$selector      = '.kmt-' . $prefix;
				if ( $enable_device['desktop'] && ! $enable_device['mobile'] ) {
					$selector = $selector . ':not(.kmt-header-break-point)';
				} elseif ( ! $enable_device['desktop'] && $enable_device['mobile'] ) {
					$selector = $selector . '.kmt-header-break-point';
				}
				$selector = $selector . ' #sitehead';

				$css_output = array(
					$selector => array(
						'position' => esc_attr( 'absolute' ),
						'left'     => esc_attr( 0 ),
						'right'    => esc_attr( 0 ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$dynamic_css .= $parse_css;
			}
			return $dynamic_css;
		}
	}
}

new Kemet_Overlay_Header_Dynamic_Css();

