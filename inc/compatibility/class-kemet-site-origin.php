<?php
/**
 * Site Origin Compatibility File.
 *
 * @package Kemet
 */

// If plugin - 'Site Origin' not exist then return.
if ( ! class_exists( 'SiteOrigin_Panels_Settings' ) ) {
	return;
}

/**
 * Kemet Site Origin Compatibility
 */
if ( ! class_exists( 'Kemet_Site_Origin' ) ) :

	/**
	 * Kemet Site Origin Compatibility
	 *
	 * @since 1.0.0
	 */
	class Kemet_Site_Origin {

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
			$assets['css']['kemet-site-origin'] = 'compatibility/site-origin';
			return $assets;
		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Site_Origin::get_instance();
