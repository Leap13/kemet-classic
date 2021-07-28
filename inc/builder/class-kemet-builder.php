<?php
/**
 * Kemet Builder
 *
 * @package Kemet Theme
 */

/**
 * Kemet Builder
 */
if ( ! class_exists( 'Kemet_Builder' ) ) :

	/**
	 * Kemet Builder
	 */
	class Kemet_Builder {
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
			require KEMET_THEME_DIR . 'inc/builder/class-builder-helper.php';
			require KEMET_THEME_DIR . 'inc/builder/class-kemet-dynamic-css-generator.php';
			require KEMET_THEME_DIR . 'inc/builder/markup/class-kemet-header-markup.php';
			require KEMET_THEME_DIR . 'inc/builder/markup/class-kemet-footer-markup.php';
			require KEMET_THEME_DIR . 'inc/builder/items/header/class-kemet-header-items.php';
			require KEMET_THEME_DIR . 'inc/builder/items/footer/class-kemet-footer-items.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Builder::get_instance();
endif;
