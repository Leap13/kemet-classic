<?php
/**
 * Header Widget1 Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Widget1_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$widget1_options = array(
            'header-widget1-controls-tabs' => array(
				'section'  => 'section-header-widget-1',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
        );

		return array_merge( $options, $widget1_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$widget1_sections = array(
			'section-header-widget-1' => array(
				'priority' => 75,
				'title'    => __( 'Header Widget 1', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $widget1_sections );

	}
}


new Kemet_Header_Widget1_Customizer();


