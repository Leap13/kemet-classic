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
			add_action( 'enqueue_block_editor_assets', array( $this, 'script_enqueue' ) );
		}

		/**
		 * Enqueue Script for Meta options
		 */
		public function script_enqueue() {
			if ( is_customize_preview() ) {
				return;
			}
			wp_enqueue_script(
				'kemet-meta',
				KEMET_THEME_URI . 'inc/meta/assets/js/build/index.js',
				array(
					'wp-edit-post',
					'wp-i18n',
					'wp-components',
					'wp-element',
					'wp-media-utils',
					'wp-block-editor',
				),
				KEMET_THEME_VERSION,
				true
			);

			wp_localize_script(
				'kemet-meta',
				'KemetMetaData',
				array(
					'version' => KEMET_THEME_VERSION,
				)
			);
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Meta::get_instance();
