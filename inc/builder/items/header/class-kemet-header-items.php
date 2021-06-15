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
			require KEMET_HEADER_ITEMS_DIR . 'menu/kemet-header-menu-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'button/kemet-header-button-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'mobile-button/kemet-header-mobile-button-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'widget/kemet-header-widget-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'html/kemet-header-html-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'mobile-html/kemet-header-mobile-html-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'search/kemet-header-search-item.php';
			require KEMET_HEADER_ITEMS_DIR . 'search-box/kemet-header-search-box-item.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Header_Items::get_instance();
endif;
