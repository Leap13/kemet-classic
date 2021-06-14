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
			$header_widgets = array( 'header-widget-1', 'header-widget-2' );

			foreach ( $header_widgets as $widget ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $widget, 'header', 'desktop' ) ) {
					continue;
				}

				Kemet_Dynamic_Css_Generator::widget_css( $widget, 'header' );
			}

			return $dynamic_css;
		}
	}
}

new Kemet_Header_Widget_Dynamic_Css();


