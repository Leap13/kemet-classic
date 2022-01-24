<?php
/**
 * Kemet Header Social Icons
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_SOCIAL_ICONS_DIR', KEMET_HEADER_ITEMS_DIR . 'social-icons/' );
define( 'KEMET_HEADER_SOCIAL_ICONS_URI', KEMET_HEADER_ITEMS_URI . 'social-icons/' );

if ( ! class_exists( 'Kemet_Header_Social_Icons_Item' ) ) {

	/**
	 * Header Social Icons
	 */
	class Kemet_Header_Social_Icons_Item {

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
				require_once KEMET_HEADER_SOCIAL_ICONS_DIR . 'dynamic-css/class-kemet-header-social-icons-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Header_Social_Icons_Item::get_instance();
}
