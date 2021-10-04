<?php
/**
 * Kemet Footer Menu
 *
 * @package Kemet
 */

define( 'KEMET_FOOTER_MENU_DIR', KEMET_FOOTER_ITEMS_DIR . 'menu/' );
define( 'KEMET_FOOTER_MENU_URI', KEMET_FOOTER_ITEMS_URI . 'menu/' );

if ( ! class_exists( 'Kemet_Footer_Menu_Item' ) ) {

	/**
	 * Footer Menu
	 */
	class Kemet_Footer_Menu_Item {

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
			add_action( 'kemet_get_fonts', array( $this, 'add_fonts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_FOOTER_MENU_DIR . 'dynamic-css/class-kemet-footer-menu-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$prefix = 'footer-menu';
			if ( Kemet_Builder_Helper::is_item_loaded( $prefix, 'footer' ) ) {
				$typography = kemet_get_option( $prefix . '-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}
	}
	Kemet_Footer_Menu_Item::get_instance();
}
