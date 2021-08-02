<?php
/**
 * Kemet Bottom Footer
 *
 * @package Kemet
 */

define( 'KEMET_BOTTOM_FOOTER_DIR', KEMET_FOOTER_ITEMS_DIR . 'bottom-footer/' );
define( 'KEMET_BOTTOM_FOOTER_URI', KEMET_FOOTER_ITEMS_URI . 'bottom-footer/' );

if ( ! class_exists( 'Kemet_Bottom_Footer' ) ) {

	/**
	 * Bottom Footer
	 */
	class Kemet_Bottom_Footer {

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
				require_once KEMET_BOTTOM_FOOTER_DIR . 'dynamic-css/class-kemet-bottom-footer-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

	}
	Kemet_Bottom_Footer::get_instance();
}
