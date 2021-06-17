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
	 * Menu Items
	 *
	 * @access private
	 * @var array
	 */
	private static $menu_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$menu_items = apply_filters( 'kemet_header_menu_items', array( 'primay-menu', 'secondary-menu' ) );
		$register_options = array();
		foreach ( self::$menu_items as $menu ) {
			$prefix       = $menu;
			$title        = ucfirst( explode( '-', $prefix )[0] );
			$menu_options = array(
				$prefix . '-controls-tabs' => array(
					'section'  => 'section-header-' . $prefix,
					'type'     => 'kmt-tabs',
					'priority' => 0,
				),
			);

			$register_options = array_merge( $register_options, $menu_options );
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
		foreach ( self::$menu_items as $menu ) {
			$prefix       = $menu;
			$title        = ucfirst( explode( '-', $prefix )[0] );
			$menu_section = array(
				'section-header-' . $prefix => array(
					'priority' => 65,
					'title'    => sprintf( __( '%s Menu', 'kemet' ), $title ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $menu_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Header_Primary_Menu_Customizer();


