<?php
/**
 * Bottom Header Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Bottom_Header_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$bottom_header_options = array(
			'header-bottom-controls-tabs' => array(
				'section'  => 'section-bottom-header-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $bottom_header_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$bottom_header_sections = array(
			'section-bottom-header-builder' => array(
				'priority' => 50,
				'title'    => __( 'Bottom Header', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $bottom_header_sections );

	}
}


new Kemet_Bottom_Header_Customizer();


