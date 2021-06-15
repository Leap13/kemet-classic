<?php
/**
 * Kemet Header Desktop Toggle
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_DESKTOP_TOGGLE_DIR', KEMET_HEADER_ITEMS_DIR . 'desktop-toggle/' );
define( 'KEMET_HEADER_DESKTOP_TOGGLE_URI', KEMET_HEADER_ITEMS_URI . 'desktop-toggle/' );

if ( ! class_exists( 'Kemet_Header_Desktop_Toggle_Item' ) ) {

	/**
	 * Header Desktop Toggle
	 */
	class Kemet_Header_Desktop_Toggle_Item {

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
				require_once KEMET_HEADER_DESKTOP_TOGGLE_DIR . 'dynamic-css/class-kemet-header-desktop-toggle-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
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

			wp_enqueue_script( 'kemet-header-desktop-toggle-customize-preview-js', KEMET_HEADER_DESKTOP_TOGGLE_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Header_Desktop_Toggle_Item::get_instance();
}
