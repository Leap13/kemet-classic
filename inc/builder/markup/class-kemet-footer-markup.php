<?php
/**
 * Kemet Footer Markup
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Footer_Markup' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Footer_Markup {
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
		}

		/**
		 * Function to get site Header
		 */
		public function footer_markup() {
			do_action( 'kemet_footer' );
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Footer_Markup::get_instance();
endif;
