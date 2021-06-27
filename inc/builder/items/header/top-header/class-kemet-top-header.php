<?php
/**
 * Kemet Top Header
 *
 * @package Kemet
 */

define( 'KEMET_TOP_HEADER_DIR', KEMET_HEADER_ITEMS_DIR . 'top-header/' );
define( 'KEMET_TOP_HEADER_URI', KEMET_HEADER_ITEMS_URI . 'top-header/' );

if ( ! class_exists( 'Kemet_Top_Header' ) ) {

	/**
	 * Top Header
	 */
	class Kemet_Top_Header {

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
			// add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_TOP_HEADER_DIR . 'dynamic-css/class-kemet-top-header-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
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

			wp_enqueue_script( 'kemet-top-header-customize-preview-js', KEMET_TOP_HEADER_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Top_Header::get_instance();
}
