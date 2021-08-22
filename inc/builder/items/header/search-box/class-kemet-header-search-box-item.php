<?php
/**
 * Kemet Header Search Box
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_SEARCH_BOX_DIR', KEMET_HEADER_ITEMS_DIR . 'search-box/' );
define( 'KEMET_HEADER_SEARCH_BOX_URI', KEMET_HEADER_ITEMS_URI . 'search-box/' );

if ( ! class_exists( 'Kemet_Header_Search_Box_Item' ) ) {

	/**
	 * Header Search Box
	 */
	class Kemet_Header_Search_Box_Item {

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
				require_once KEMET_HEADER_SEARCH_BOX_DIR . 'dynamic-css/class-kemet-header-search-box-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			if ( Kemet_Builder_Helper::is_item_loaded( 'search-box', 'header', 'all' ) ) {
				$font_family = kemet_get_option( 'search-box-font-family' );
				$font_weight = kemet_get_option( 'search-box-font-weight' );
				Kemet_Fonts::add_font( $font_family, $font_weight );
			}
		}
	}
	Kemet_Header_Search_Box_Item::get_instance();
}
