<?php
/**
 * Kemet Footer Items
 *
 * @package Kemet Theme
 */

define( 'KEMET_FOOTER_ITEMS_DIR', KEMET_THEME_DIR . 'inc/builder/items/footer/' );
define( 'KEMET_FOOTER_ITEMS_URI', KEMET_THEME_URI . 'inc/builder/items/footer/' );
/**
 * Kemet Footer Items
 */
if ( ! class_exists( 'Kemet_Footer_Items' ) ) :

	/**
	 * Kemet Footer Items
	 */
	class Kemet_Footer_Items {
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
			require KEMET_FOOTER_ITEMS_DIR . 'top-footer/class-kemet-top-footer.php';
			require KEMET_FOOTER_ITEMS_DIR . 'main-footer/class-kemet-main-footer.php';
			require KEMET_FOOTER_ITEMS_DIR . 'bottom-footer/class-kemet-bottom-footer.php';
			require KEMET_FOOTER_ITEMS_DIR . 'widget/class-kemet-footer-widget-item.php';
			require KEMET_FOOTER_ITEMS_DIR . 'copyright/class-kemet-footer-copyright-item.php';
			require KEMET_FOOTER_ITEMS_DIR . 'menu/class-kemet-footer-menu-item.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Footer_Items::get_instance();
endif;
