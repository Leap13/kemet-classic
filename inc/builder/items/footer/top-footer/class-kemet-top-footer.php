<?php
/**
 * Kemet Top Footer
 *
 * @package Kemet
 */

define( 'KEMET_TOP_FOOTER_DIR', KEMET_FOOTER_ITEMS_DIR . 'top-footer/' );
define( 'KEMET_TOP_FOOTER_URI', KEMET_FOOTER_ITEMS_URI . 'top-footer/' );

if ( ! class_exists( 'Kemet_Top_Footer' ) ) {

	/**
	 * Top Footer
	 */
	class Kemet_Top_Footer {

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
				require_once KEMET_TOP_FOOTER_DIR . 'dynamic-css/class-kemet-top-footer-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

	}
	Kemet_Top_Footer::get_instance();
}
