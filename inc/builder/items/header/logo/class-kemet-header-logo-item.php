<?php
/**
 * Kemet Header Logo
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_LOGO_DIR', KEMET_HEADER_ITEMS_DIR . 'logo/' );
define( 'KEMET_HEADER_LOGO_URI', KEMET_HEADER_ITEMS_URI . 'logo/' );

if ( ! class_exists( 'Kemet_Header_Logo_Item' ) ) {

	/**
	 * Header Logo
	 */
	class Kemet_Header_Logo_Item {

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
				require_once KEMET_HEADER_LOGO_DIR . 'dynamic-css/class-kemet-header-logo-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			if ( Kemet_Builder_Helper::is_item_loaded( 'logo', 'header', 'all' ) ) {
				$typography = kemet_get_option( 'site-title-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );

				$typography = kemet_get_option( 'tagline-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}
	}
	Kemet_Header_Logo_Item::get_instance();
}
