<?php
/**
 * Header Mobile Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Mobile_Menu_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$offcanvas_menu_options = array(
			'header-offcanvas-menu-controls-tabs' => array(
				'section'  => 'section-header-offcanvas-menu',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
		);

		return array_merge( $options, $offcanvas_menu_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$offcanvas_menu_sections = array(
			'section-header-offcanvas-menu' => array(
				'priority' => 70,
				'title'    => __( 'Off-Canvas Menu', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $offcanvas_menu_sections );

	}
}


new Kemet_Header_Mobile_Menu_Customizer();


