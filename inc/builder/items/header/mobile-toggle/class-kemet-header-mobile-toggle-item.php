<?php
/**
 * Kemet Header Mobile Toggle
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_MOBILE_TOGGLE_DIR', KEMET_HEADER_ITEMS_DIR . 'mobile-toggle/' );
define( 'KEMET_HEADER_MOBILE_TOGGLE_URI', KEMET_HEADER_ITEMS_URI . 'mobile-toggle/' );

if ( ! class_exists( 'Kemet_Header_Mobile_Toggle_Item' ) ) {

	/**
	 * Header Mobile Toggle
	 */
	class Kemet_Header_Mobile_Toggle_Item {

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
				require_once KEMET_HEADER_MOBILE_TOGGLE_DIR . 'dynamic-css/class-kemet-header-mobile-toggle-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Header_Mobile_Toggle_Item::get_instance();
}
