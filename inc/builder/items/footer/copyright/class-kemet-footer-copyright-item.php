<?php
/**
 * Kemet Header Search
 *
 * @package Kemet
 */

define( 'KEMET_FOOTER_COPYRIGHT_DIR', KEMET_FOOTER_ITEMS_DIR . 'copyright/' );
define( 'KEMET_FOOTER_COPYRIGHT_URI', KEMET_FOOTER_ITEMS_URI . 'copyright/' );

if ( ! class_exists( 'Kemet_Footer_Copyright_Item' ) ) {

	/**
	 * Header Search
	 */
	class Kemet_Footer_Copyright_Item {

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
				require_once KEMET_FOOTER_COPYRIGHT_DIR . 'dynamic-css/class-kemet-footer-copyright-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			if ( Kemet_Builder_Helper::is_item_loaded( 'copyright', 'footer' ) ) {
				$typography = kemet_get_option( 'copyright-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}

	}
	Kemet_Footer_Copyright_Item::get_instance();
}
