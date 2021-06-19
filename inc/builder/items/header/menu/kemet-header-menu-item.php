<?php
/**
 * Kemet Header Menu
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_MENU_DIR', KEMET_HEADER_ITEMS_DIR . 'menu/' );
define( 'KEMET_HEADER_MENU_URI', KEMET_HEADER_ITEMS_URI . 'menu/' );

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
			add_action( 'kemet_get_fonts', array( $this, 'add_fonts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_HEADER_MENU_DIR . 'dynamic-css/class-kemet-header-menu-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$header_menus = apply_filters( 'kemet_header_menu_items', array( 'primary-menu', 'secondary-menu' ) );

			foreach ( $header_menus as $menu ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $menu, 'header', 'all' ) ) {
					continue;
				}
				$font_family = kemet_get_option( $menu . '-font-family' );
				$font_weight = kemet_get_option( $menu . '-font-weight' );
				Kemet_Fonts::add_font( $font_family, $font_weight );

				$submenu_font_family = kemet_get_option( $menu . '-submenu-font-family' );
				$submenu_font_weight = kemet_get_option( $menu . '-submenu-font-weight' );
				Kemet_Fonts::add_font( $submenu_font_family, $submenu_font_weight );
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

			// Localize variables for HTML JS.
			wp_localize_script(
				'kemet-header-menu-customize-preview-js',
				'kemetMenuData',
				array(
					'menuItems' => apply_filters( 'kemet_header_menu_items', array( 'primary-menu', 'secondary-menu' ) ),
				)
			);
		}

	}
	Kemet_Header_Menu_Item::get_instance();
}
