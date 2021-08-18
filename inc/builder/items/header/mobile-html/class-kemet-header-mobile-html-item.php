<?php
/**
 * Kemet Header Mobile Html
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_MOBILE_HTML_DIR', KEMET_HEADER_ITEMS_DIR . 'mobile-html/' );
define( 'KEMET_HEADER_MOBILE_HTML_URI', KEMET_HEADER_ITEMS_URI . 'mobile-html/' );

if ( ! class_exists( 'Kemet_Header_Mobile_Html_Item' ) ) {

	/**
	 * Header Mobile Html
	 */
	class Kemet_Header_Mobile_Html_Item {

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
				require_once KEMET_HEADER_MOBILE_HTML_DIR . 'dynamic-css/class-kemet-header-mobile-html-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$header_html = apply_filters( 'kemet_header_mobile_html_items', array( 'header-mobile-html-1', 'header-mobile-html-2' ) );

			foreach ( $header_html as $html ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $html, 'header', 'mobile' ) ) {
					continue;
				}
				$font_family = kemet_get_option( $html . '-font-family' );
				$font_weight = kemet_get_option( $html . '-font-weight' );
				Kemet_Fonts::add_font( $font_family, $font_weight );
			}
		}
	}
	Kemet_Header_Mobile_Html_Item::get_instance();
}
