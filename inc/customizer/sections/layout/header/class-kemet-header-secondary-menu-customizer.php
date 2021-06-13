<?php
/**
 * Header Secondary Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Secondary_Menu_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$secondary_menu_options = array(
			'header-secondary-menu-controls-tabs' => array(
				'section'  => 'section-header-secondary-menu',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $secondary_menu_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$secondary_menu_sections = array(
			'section-header-secondary-menu' => array(
				'priority' => 50,
				'title'    => __( 'Secondary', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $secondary_menu_sections );

	}
}


new Kemet_Header_Secondary_Menu_Customizer();


