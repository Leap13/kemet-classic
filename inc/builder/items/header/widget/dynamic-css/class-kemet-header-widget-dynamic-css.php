<?php
/**
 * Kemet Add Dynamic Css
 *
 * @package Kemet Theme
 */

if ( ! class_exists( 'Kemet_Header_Widget_Dynamic_Css' ) ) {

	/**
	 * Customizer Register
	 */
	class Kemet_Header_Widget_Dynamic_Css extends Kemet_Add_Dynamic_Css {

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css css.
		 * @return string
		 */
		function dynamic_css( $dynamic_css ) {
			$header_widgets = apply_filters( 'kemet_header_widget_items', array( 'header-widget-1', 'header-widget-2' ) );

			foreach ( $header_widgets as $widget ) {
				$dynamic_css .= Kemet_Dynamic_Css_Generator::widget_css( $widget, 'header' );
			}

			return $dynamic_css;
		}
	}
}

new Kemet_Header_Widget_Dynamic_Css();


