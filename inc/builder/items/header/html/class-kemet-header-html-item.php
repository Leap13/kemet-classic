<?php
/**
 * Kemet Header Html
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_HTML_DIR', KEMET_HEADER_ITEMS_DIR . 'html/' );
define( 'KEMET_HEADER_HTML_URI', KEMET_HEADER_ITEMS_URI . 'html/' );

if ( ! class_exists( 'Kemet_Header_Html_Item' ) ) {

	/**
	 * Header Html
	 */
	class Kemet_Header_Html_Item {

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
				require_once KEMET_HEADER_HTML_DIR . 'dynamic-css/class-kemet-header-html-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$header_html = apply_filters( 'kemet_header_html_items', array( 'header-html-1', 'header-html-2' ) );

			foreach ( $header_html as $html ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $html, 'header', 'desktop' ) ) {
					continue;
				}
				$typography = kemet_get_option( $html . '-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}
	}
	Kemet_Header_Html_Item::get_instance();
}
