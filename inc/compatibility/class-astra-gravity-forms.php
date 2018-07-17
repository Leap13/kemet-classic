<?php
/**
 * Gravity Forms File.
 *
 * @package Kemet
 */

// If plugin - 'Gravity Forms' not exist then return.
if ( ! class_exists( 'GFForms' ) ) {
	return;
}

/**
 * Kemet Gravity Forms
 */
if ( ! class_exists( 'Kemet_Gravity_Forms' ) ) :

	/**
	 * Kemet Gravity Forms
	 *
	 * @since 1.0.0
	 */
	class Kemet_Gravity_Forms {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_filter( 'kemet_theme_assets', array( $this, 'add_styles' ) );
		}

		/**
		 * Add assets in theme
		 *
		 * @param array $assets list of theme assets (JS & CSS).
		 * @return array List of updated assets.
		 * @since 1.0.0
		 */
		function add_styles( $assets ) {
			$assets['css']['kemet-gravity-forms'] = 'compatibility/gravity-forms';
			return $assets;
		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Gravity_Forms::get_instance();
