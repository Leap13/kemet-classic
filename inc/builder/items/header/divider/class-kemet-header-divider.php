<?php
/**
 * Kemet Header Divider
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_DIVIDER_DIR', KEMET_HEADER_ITEMS_DIR . 'divider/' );

if ( ! class_exists( 'Kemet_Header_Divider' ) ) {

	/**
	 * Header Divider
	 */
	class Kemet_Header_Divider {

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
				require_once KEMET_HEADER_DIVIDER_DIR . 'dynamic-css/class-kemet-header-divider-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

	}
	Kemet_Header_Divider::get_instance();
}
