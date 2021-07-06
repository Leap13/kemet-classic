<?php
/**
 * Footer Widget Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Widget_Customizer extends Kemet_Customizer_Register {

	/**
	 * Widget Items
	 *
	 * @access private
	 * @var array
	 */
	private static $widget_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$widget_items = apply_filters( 'kemet_footer_widget_items', array( 'kemet-widget-1', 'kemet-widget-2' ) );
		$register_options   = array();
		foreach ( self::$widget_items as $widget ) {
			$prefix         = $widget;
			$num            = explode( 'footer-widget-', $prefix )[1];
			$widget_options = array(
				$prefix . '-controls-tabs' => array(
					'section'  => 'section-' . $prefix,
					'type'     => 'kmt-tabs',
					'priority' => 0,
				),
			);

			$register_options = array_merge( $register_options, $widget_options );
		}

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {

		$register_sections = array();
		foreach ( self::$widget_items as $widget ) {
			$prefix         = $widget;
			$num            = explode( 'footer-widget-', $prefix )[1];
			$widget_section = array(
				'section-' . $prefix => array(
					'priority' => 65,
					'title'    => sprintf( __( 'Widget %s', 'kemet' ), $num ),
					'panel'    => 'panel-footer-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $widget_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Footer_Widget_Customizer();


