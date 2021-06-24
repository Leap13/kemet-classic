<?php
/**
 * Kemet Header Items
 *
 * @package Kemet Theme
 */

define( 'KEMET_HEADER_ITEMS_DIR', KEMET_THEME_DIR . 'inc/builder/items/header/' );
define( 'KEMET_HEADER_ITEMS_URI', KEMET_THEME_URI . 'inc/builder/items/header/' );
/**
 * Kemet Header Items
 */
if ( ! class_exists( 'Kemet_Header_Items' ) ) :

	/**
	 * Kemet Header Items
	 */
	class Kemet_Header_Items {
		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
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
			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require KEMET_HEADER_ITEMS_DIR . 'menu/class-kemet-header-menu-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'button/class-kemet-header-button-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'mobile-button/class-kemet-header-mobile-button-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'widget/class-kemet-header-widget-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'html/class-kemet-header-html-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'mobile-html/class-kemet-header-mobile-html-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'search/class-kemet-header-search-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'search-box/class-kemet-header-search-box-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'logo/class-kemet-header-logo-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'mobile-toggle/class-kemet-header-mobile-toggle-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'desktop-toggle/class-kemet-header-desktop-toggle-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'top-header/class-kemet-top-header.php';
			require KEMET_HEADER_ITEMS_DIR . 'main-header/class-kemet-main-header.php';
			require KEMET_HEADER_ITEMS_DIR . 'bottom-header/class-kemet-bottom-header.php';
			require KEMET_HEADER_ITEMS_DIR . 'offcanvas-menu/class-kemet-header-off-canvas-menu-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'overlay-header/class-kemet-overlay-header.php';
			require KEMET_HEADER_ITEMS_DIR . 'sticky-header/class-kemet-sticky-header.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Header_Items::get_instance();
endif;
