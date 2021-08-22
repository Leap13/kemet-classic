<?php
/**
 * Kemet Bottom Header
 *
 * @package Kemet
 */

define( 'KEMET_OVERLAY_HEADER_DIR', KEMET_HEADER_ITEMS_DIR . 'overlay-header/' );
define( 'KEMET_OVERLAY_HEADER_URI', KEMET_HEADER_ITEMS_URI . 'overlay-header/' );

if ( ! class_exists( 'Kemet_Overlay_Header' ) ) {

	/**
	 * Bottom Header
	 */
	class Kemet_Overlay_Header {

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
				require_once KEMET_OVERLAY_HEADER_DIR . 'dynamic-css/class-kemet-overlay-header-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Overlay_Header::get_instance();
}
