<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Footer_Copyright_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Footer_Copyright_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {
			if ( Kemet_Builder_Helper::is_item_loaded( 'copyright', 'footer' ) ) {
				$prefix                   = 'footer-copyright';
				$selector                 = '.kmt-' . $prefix;
				$global_footer_text_color = kemet_get_sub_option( 'global-footer-text-color', 'initial' );
				$color                    = kemet_get_sub_option( $prefix . '-color', 'initial', kemet_color_brightness( $global_footer_text_color, 0.8, 'dark' ) );
				$link_color               = kemet_get_sub_option( $prefix . '-link-color', 'initial', $global_footer_text_color );
				$link_hover_color         = kemet_get_sub_option( $prefix . '-link-color', 'hover' );
				$margin                   = kemet_get_option( $prefix . '-spacing' );

				$css_output = array(
					$selector => array(
						'margin'              => 'var(--margin)',
						'color'               => 'var(--footerTextColor)',
						'--footerTextColor'   => esc_attr( $color ),
						'--headingLinksColor' => esc_attr( $link_color ),
						'--linksHoverColor'   => esc_attr( $link_hover_color ),
						'--justifyContnet'    => kemet_get_sub_option( $prefix . '-horizontal-align', 'desktop' ),
						'--alignItems'        => kemet_get_sub_option( $prefix . '-vertical-align', 'desktop' ),
						'--margin'            => kemet_responsive_spacing( $margin, 'all', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--justifyContnet' => kemet_get_sub_option( $prefix . '-horizontal-align', 'tablet' ),
						'--alignItems'     => kemet_get_sub_option( $prefix . '-vertical-align', 'tablet' ),
						'--margin'         => kemet_responsive_spacing( $margin, 'all', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'--justifyContnet' => kemet_get_sub_option( $prefix . '-horizontal-align', 'mobile' ),
						'--alignItems'     => kemet_get_sub_option( $prefix . '-vertical-align', 'mobile' ),
						'--margin'         => kemet_responsive_spacing( $margin, 'all', 'mobile' ),
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

new Kemet_Footer_Copyright_Dynamic_Css();

