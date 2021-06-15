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
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_HEADER_SEARCH_BOX_DIR . 'dynamic-css/class-kemet-header-search-box-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
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

			wp_enqueue_script( 'kemet-header-search-box-customize-preview-js', KEMET_HEADER_SEARCH_BOX_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Header_Search_Box_Item::get_instance();
}
