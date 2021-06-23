<?php
/**
 * Kemet Bottom Header
 *
 * @package Kemet
 */

define( 'KEMET_OVERLAY_HEADER_DIR', KEMET_HEADER_ITEMS_DIR . 'overlay-header/' );
define( 'KEMET_OVERLAY_HEADER_URI', KEMET_HEADER_ITEMS_URI . 'overlay-header/' );

if ( ! class_exists( 'Kemet_Overlay_Header' ) ) {

	/**
	 * Bottom Header
	 */
	class Kemet_Overlay_Header {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Instance
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
		 * Constructor
		 */
		public function __construct() {
			add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_OVERLAY_HEADER_DIR . 'dynamic-css/class-kemet-overlay-header-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Preview Scripts
		 *
		 * @return void
		 */
		public function preview_scripts() {

			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'kemet-overlay-header-customize-preview-js', KEMET_OVERLAY_HEADER_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );
		}

	}
	Kemet_Overlay_Header::get_instance();
}
