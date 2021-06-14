<?php
/**
 * Kemet Header Menu
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_MENU_DIR', KEMET_THEME_DIR . 'inc/builder/items/menu/' );
define( 'KEMET_HEADER_MENU_URI', KEMET_THEME_URI . 'inc/builder/items/menu/' );

if ( ! class_exists( 'Kemet_Header_Menu_Item' ) ) {

	/**
	 * Header Menu
	 */
	class Kemet_Header_Menu_Item {

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
				require_once KEMET_HEADER_MENU_DIR . 'dynamic-css/dynamic.css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
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

			wp_enqueue_script( 'kemet-header-menu-customize-preview-js', KEMET_HEADER_MENU_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Header_Menu_Item::get_instance();
}
