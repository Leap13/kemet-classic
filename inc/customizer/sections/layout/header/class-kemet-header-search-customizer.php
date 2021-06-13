<?php
/**
 * Header Search Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Search_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$search_options = array(
			'header-search-controls-tabs' => array(
				'section'  => 'section-header-search-menu',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $search_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$search_sections = array(
			'section-header-search-menu' => array(
				'priority' => 55,
				'title'    => __( 'Search', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $search_sections );

	}
}


new Kemet_Header_Search_Customizer();


