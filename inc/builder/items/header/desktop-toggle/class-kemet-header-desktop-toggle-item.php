<?php
/**
 * Kemet Header Desktop Toggle
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_DESKTOP_TOGGLE_DIR', KEMET_HEADER_ITEMS_DIR . 'desktop-toggle/' );
define( 'KEMET_HEADER_DESKTOP_TOGGLE_URI', KEMET_HEADER_ITEMS_URI . 'desktop-toggle/' );

if ( ! class_exists( 'Kemet_Header_Desktop_Toggle_Item' ) ) {

	/**
	 * Header Desktop Toggle
	 */
	class Kemet_Header_Desktop_Toggle_Item {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Instance
		 *
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			if ( ! is_admin() ) {
				require_once KEMET_HEADER_DESKTOP_TOGGLE_DIR . 'dynamic-css/class-kemet-header-desktop-toggle-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Header_Desktop_Toggle_Item::get_instance();
}
