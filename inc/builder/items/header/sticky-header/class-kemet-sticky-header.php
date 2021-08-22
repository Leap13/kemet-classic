<?php
/**
 * Kemet Sticky Header
 *
 * @package Kemet
 */

define( 'KEMET_STICKY_HEADER_DIR', KEMET_HEADER_ITEMS_DIR . 'sticky-header/' );
define( 'KEMET_STICKY_HEADER_URI', KEMET_HEADER_ITEMS_URI . 'sticky-header/' );

if ( ! class_exists( 'Kemet_Sticky_Header' ) ) {

	/**
	 * Sticky Header
	 */
	class Kemet_Sticky_Header {

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
			require_once KEMET_STICKY_HEADER_DIR . '/class-kemet-sticky-header-partials.php';
			if ( ! is_admin() ) {
				require_once KEMET_STICKY_HEADER_DIR . 'dynamic-css/class-kemet-sticky-header-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Sticky_Header::get_instance();
}
