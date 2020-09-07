<?php
/**
 * Admin functions - Functions that add some functionality to WordPress admin panel
 *
 * @package Wiz
 * @since 1.0.0
 */

/**
 * Register menus
 */
if ( ! function_exists( 'wiz_register_menu_locations' ) ) {

	/**
	 * Register menus
	 */
	function wiz_register_menu_locations() {

		/**
		 * Menus
		 */
		register_nav_menus(
			array(
				'primary'     => __( 'Primary Menu', 'wiz' ),
				'top_menu'     => __( 'Top Menu', 'wiz' ),
				'left_menu' => __( 'Left Menu', 'wiz' ),
            	'footer_menu' => __( 'Footer Menu', 'wiz' ),
			)
		);
	}
}

add_action( 'init', 'wiz_register_menu_locations' );
