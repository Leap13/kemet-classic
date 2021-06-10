<?php
/**
 * Top Header Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Top_Header_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$top_header_options = array(
			'header-top-controls-tabs' => array(
				'section'  => 'section-top-header-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $top_header_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$top_header_sections = array(
			'section-top-header-builder' => array(
				'priority' => 45,
				'title'    => __( 'Top Header', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $top_header_sections );

	}
}


new Kemet_Top_Header_Customizer();


