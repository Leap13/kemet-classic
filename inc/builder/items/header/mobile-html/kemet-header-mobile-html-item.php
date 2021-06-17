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
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 100 );
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
		/**
		 * Add Preview Scripts
		 *
		 * @return void
		 */
		public function preview_scripts() {

			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'kemet-header-mobile-html-customize-preview-js', KEMET_HEADER_MOBILE_HTML_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );

			// Localize variables for HTML JS.
			wp_localize_script(
				'kemet-header-mobile-html-customize-preview-js',
				'kemetMobileHTMLData',
				array(
					'htmlItems' => apply_filters( 'kemet_header_mobile_html_items', array( 'header-mobile-html-1', 'header-mobile-html-2' ) ),
				)
			);
		}

	}
	Kemet_Header_Mobile_Html_Item::get_instance();
}
