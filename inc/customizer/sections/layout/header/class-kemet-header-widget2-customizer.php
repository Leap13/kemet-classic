<?php
/**
 * Header Widget2 Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Widget2_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$widget2_options = array(
            'header-widget2-controls-tabs' => array(
				'section'  => 'section-header-widget-2',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
        );

		return array_merge( $options, $widget2_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$widget2_sections = array(
			'section-header-widget-2' => array(
				'priority' => 75,
				'title'    => __( 'Header Widget 1', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $widget2_sections );

	}
}


new Kemet_Header_Widget2_Customizer();


