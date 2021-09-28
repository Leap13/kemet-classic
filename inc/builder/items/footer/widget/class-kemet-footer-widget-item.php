<?php
/**
 * Kemet Footer Widget
 *
 * @package Kemet
 */

define( 'KEMET_FOOTER_WIDGET_DIR', KEMET_FOOTER_ITEMS_DIR . 'widget/' );
define( 'KEMET_FOOTER_WIDGET_URI', KEMET_FOOTER_ITEMS_URI . 'widget/' );

if ( ! class_exists( 'Kemet_Footer_Widget_Item' ) ) {

	/**
	 * Footer Widget
	 */
	class Kemet_Footer_Widget_Item {

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
				require_once KEMET_FOOTER_WIDGET_DIR . 'dynamic-css/class-kemet-footer-widget-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}
	}
	Kemet_Footer_Widget_Item::get_instance();
}
