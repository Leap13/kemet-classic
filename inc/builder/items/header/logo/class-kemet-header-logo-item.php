<?php
/**
 * Kemet Header Logo
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_LOGO_DIR', KEMET_HEADER_ITEMS_DIR . 'logo/' );
define( 'KEMET_HEADER_LOGO_URI', KEMET_HEADER_ITEMS_URI . 'logo/' );

if ( ! class_exists( 'Kemet_Header_Logo_Item' ) ) {

	/**
	 * Header Logo
	 */
	class Kemet_Header_Logo_Item {

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
				require_once KEMET_HEADER_LOGO_DIR . 'dynamic-css/class-kemet-header-logo-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Header_Logo_Item::get_instance();
}
