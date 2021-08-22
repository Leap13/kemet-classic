<?php
/**
 * Page Title Section
 *
 * @package Kemet
 */

define( 'KEMET_PAGE_TITLE_DIR', KEMET_THEME_DIR . 'inc/page-title/' );
define( 'KEMET_PAGE_TITLE_URL', KEMET_THEME_URI . 'inc/page-title/' );

if ( ! class_exists( 'Kemet_Page_Title' ) ) {

	/**
	 * Page Title Section
	 *
	 * @since 1.0.0
	 */
	class Kemet_Page_Title {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
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
		 *  Constructor
		 */
		public function __construct() {

			require_once KEMET_PAGE_TITLE_DIR . 'classes/class-kemet-page-title-partials.php';
			require_once KEMET_PAGE_TITLE_DIR . 'classes/class-kemet-breadcrumb-trail.php';

			if ( ! is_admin() ) {
				require_once KEMET_PAGE_TITLE_DIR . 'dynamic-css/class-kemet-page-title-dymaic-css.php';
			}
		}
	}
	Kemet_Page_Title::get_instance();
}
