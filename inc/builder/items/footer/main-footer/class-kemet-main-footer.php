<?php
/**
 * Kemet Main Footer
 *
 * @package Kemet
 */

define( 'KEMET_MAIN_FOOTER_DIR', KEMET_FOOTER_ITEMS_DIR . 'main-footer/' );
define( 'KEMET_MAIN_FOOTER_URI', KEMET_FOOTER_ITEMS_URI . 'main-footer/' );

if ( ! class_exists( 'Kemet_Main_Footer' ) ) {

	/**
	 * Main Footer
	 */
	class Kemet_Main_Footer {

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
				require_once KEMET_MAIN_FOOTER_DIR . 'dynamic-css/class-kemet-main-footer-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

	}
	Kemet_Main_Footer::get_instance();
}
