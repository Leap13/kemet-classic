<?php
/**
 * Header Primary Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Primary_Menu_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$primay_menu_options = array(
			'header-primary-menu-controls-tabs' => array(
				'section'  => 'section-header-primay-menu',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $primay_menu_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$primay_menu_sections = array(
			'section-header-primay-menu' => array(
				'priority' => 45,
				'title'    => __( 'Primay Menu', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $primay_menu_sections );

	}
}


new Kemet_Header_Primary_Menu_Customizer();


