<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Footer_Widget_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Footer_Widget_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		function dynamic_css( $dynamic_css ) {
			$footer_widgets = apply_filters( 'kemet_footer_widget_items', array( 'footer-widget-1', 'footer-widget-2', 'footer-widget-3', 'footer-widget-4', 'footer-widget-5', 'footer-widget-6' ) );

			foreach ( $footer_widgets as $widget ) {
				$prefix   = $widget;
				$selector = '.kmt-' . $prefix . '-item';

				$css_output = array(
					$selector => array(
						'display'          => 'flex',
						'justify-content'  => 'var(--justifyContnet)',
						'align-items'      => 'var(--alignItems)',
						'--justifyContnet' => kemet_get_sub_option( $prefix . '-horizontal-align', 'desktop' ),
						'--alignItems'     => kemet_get_sub_option( $prefix . '-vertical-align', 'desktop' ),
					),
				);

				/* Parse CSS from array() */
				$parse_css = kemet_parse_css( $css_output );

				$tablet = array(
					$selector => array(
						'--justifyContnet' => kemet_get_sub_option( $prefix . '-horizontal-align', 'tablet' ),
						'--alignItems'     => kemet_get_sub_option( $prefix . '-vertical-align', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= kemet_parse_css( $tablet, '', '768' );

				$mobile = array(
					$selector => array(
						'--justifyContnet' => kemet_get_sub_option( $prefix . '-horizontal-align', 'mobile' ),
						'--alignItems'     => kemet_get_sub_option( $prefix . '-vertical-align', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css   .= kemet_parse_css( $mobile, '', '544' );
				$dynamic_css .= $parse_css;
				$dynamic_css .= Kemet_Dynamic_Css_Generator::widget_css( $widget, 'footer' );
			}

			return $dynamic_css;
		}
	}
}

new Kemet_Footer_Widget_Dynamic_Css();


