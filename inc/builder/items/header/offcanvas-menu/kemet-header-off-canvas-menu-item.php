<?php
/**
 * Kemet Header Off_Canvas_Menu
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_OFF_CANVAS_MENU_DIR', KEMET_HEADER_ITEMS_DIR . 'offcanvas-menu/' );
define( 'KEMET_HEADER_OFF_CANVAS_MENU_URI', KEMET_HEADER_ITEMS_URI . 'offcanvas-menu/' );

if ( ! class_exists( 'Kemet_Header_Off_Canvas_Menu_Item' ) ) {

	/**
	 * Header Off_Canvas_Menu
	 */
	class Kemet_Header_Off_Canvas_Menu_Item {

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
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 99 );
			add_action( 'kemet_get_fonts', array( $this, 'add_fonts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_HEADER_OFF_CANVAS_MENU_DIR . 'dynamic-css/class-kemet-header-off-canvas-menu-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$prefix = 'offcanvas-menu';
			if ( Kemet_Builder_Helper::is_item_loaded( $prefix, 'header', 'all' ) ) {
				$font_family = kemet_get_option( $prefix . '-font-family' );
				$font_weight = kemet_get_option( $prefix . '-font-weight' );
				Kemet_Fonts::add_font( $font_family, $font_weight );

				$font_family = kemet_get_option( $prefix . '-submenu-font-family' );
				$font_weight = kemet_get_option( $prefix . '-submenu-font-weight' );
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

			wp_enqueue_script( 'kemet-header-off-canvas-customize-preview-js', KEMET_HEADER_OFF_CANVAS_MENU_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Header_Off_Canvas_Menu_Item::get_instance();
}
