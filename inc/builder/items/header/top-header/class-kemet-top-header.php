<?php
/**
 * Kemet Top Header
 *
 * @package Kemet
 */

define( 'KEMET_TOP_HEADER_DIR', KEMET_HEADER_ITEMS_DIR . 'top-header/' );
define( 'KEMET_TOP_HEADER_URI', KEMET_HEADER_ITEMS_URI . 'top-header/' );

if ( ! class_exists( 'Kemet_Top_Header' ) ) {

	/**
	 * Top Header
	 */
	class Kemet_Top_Header {

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
				require_once KEMET_TOP_HEADER_DIR . 'dynamic-css/class-kemet-top-header-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Top_Header::get_instance();
}
