<?php
/**
 * Kemet Theme Meta
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Meta Loader
 */
if ( ! class_exists( 'Kemet_Meta' ) ) {

	/**
	 * Meta Loader
	 */
	class Kemet_Meta {

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
			require_once KEMET_THEME_DIR . 'inc/meta/classes/class-kemet-meta-settings.php';
			require_once KEMET_THEME_DIR . 'inc/meta/classes/class-kemet-meta-partials.php';
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Meta::get_instance();
