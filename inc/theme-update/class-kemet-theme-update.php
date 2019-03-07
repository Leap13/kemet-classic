<?php
/**
 * Theme Update
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://kemet.io
 * @since       Kemet 1.0.0
 */

if ( ! class_exists( 'Kemet_Theme_Update' ) ) {

	/**
	 * Kemet_Theme_Update initial setup
	 *
	 * @since 1.0.0
	 */
	class Kemet_Theme_Update {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
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
		 *  Constructor
		 */
		public function __construct() {

			// Theme Updates.
			add_action( 'init', __CLASS__ . '::init' );
		}

		/**
		 * Implement theme update logic.
		 *
		 * @since 1.0.0
		 */
		static public function init() {
			do_action( 'kemet_update_before' );

			// Get auto saved version number.
			$saved_version = kemet_get_option( 'theme-auto-version', false );

			if ( ! $saved_version ) {

				// Get all customizer options.
				$customizer_options = get_option( KEMET_THEME_SETTINGS );

				// Get all customizer options.
				$version_array = array(
					'theme-auto-version' => KEMET_THEME_VERSION,
				);
				$saved_version = KEMET_THEME_VERSION;

				// Merge customizer options with version.
				$theme_options = wp_parse_args( $version_array, $customizer_options );

				// Update auto saved version number.
				update_option( KEMET_THEME_SETTINGS, $theme_options );
			}

			// If equals then return.
			if ( version_compare( $saved_version, KEMET_THEME_VERSION, '=' ) ) {
				return;
			}

			// Not have stored?
			if ( empty( $saved_version ) ) {

				// Get old version.
				$theme_version = get_option( '_kemet_auto_version', KEMET_THEME_VERSION );

				// Remove option.
				delete_option( '_kemet_auto_version' );

			} else {

				// Get latest version.
				$theme_version = KEMET_THEME_VERSION;
			}

			// Get all customizer options.
			$customizer_options = get_option( KEMET_THEME_SETTINGS );

			// Get all customizer options.
			$version_array = array(
				'theme-auto-version' => $theme_version,
			);

			// Merge customizer options with version.
			$theme_options = wp_parse_args( $version_array, $customizer_options );

			// Update auto saved version number.
			update_option( KEMET_THEME_SETTINGS, $theme_options );

			// Update variables.
			Kemet_Theme_Options::refresh();

			do_action( 'kemet_update_after' );

		}

	}

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Theme_Update::get_instance();
