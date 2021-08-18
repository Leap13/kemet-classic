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
				$typography = kemet_get_option( $menu . '-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );

				$typography = kemet_get_option( $menu . '-submenu-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}
	}
	Kemet_Header_Menu_Item::get_instance();
}
