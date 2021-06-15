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
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_HEADER_HTML_DIR . 'dynamic-css/class-kemet-header-html-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
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

			wp_enqueue_script( 'kemet-header-html-customize-preview-js', KEMET_HEADER_HTML_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Header_Html_Item::get_instance();
}
