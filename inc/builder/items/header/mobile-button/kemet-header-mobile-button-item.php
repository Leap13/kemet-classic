<?php
/**
 * Kemet Header Mobile Button
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_MOBILE_BUTTON_DIR', KEMET_HEADER_ITEMS_DIR . 'mobile-button/' );
define( 'KEMET_HEADER_MOBILE_BUTTON_URI', KEMET_HEADER_ITEMS_URI . 'mobile-button/' );

if ( ! class_exists( 'Kemet_Header_Mobile_Button_Item' ) ) {

	/**
	 * Header Mobile Button
	 */
	class Kemet_Header_Mobile_Button_Item {

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
			add_action( 'kemet_get_fonts', array( $this, 'add_fonts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_HEADER_MOBILE_BUTTON_DIR . 'dynamic-css/class-kemet-header-mobile-button-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$header_button = apply_filters( 'kemet_header_mobile_button_items', array( 'header-mobile-button-1', 'header-mobile-button-2' ) );

			foreach ( $header_button as $button ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $button, 'header', 'mobile' ) ) {
					continue;
				}
				$font_family = kemet_get_option( $button . '-font-family' );
				$font_weight = kemet_get_option( $button . '-font-weight' );
				Kemet_Fonts::add_font( $font_family, $font_weight );
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

			wp_enqueue_script( 'kemet-header-mobile-button-customize-preview-js', KEMET_HEADER_MOBILE_BUTTON_URI . 'assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'kemet-customizer-preview-js' ), KEMET_THEME_VERSION, true );

			// Localize variables for button JS.
			wp_localize_script(
				'kemet-header-mobile-button-customize-preview-js',
				'kemetMobileButtonData',
				array(
					'mobileButtonItems' => apply_filters( 'kemet_header_mobile_button_items', array( 'header-mobile-button-1', 'header-mobile-button-2' ) ),
				)
			);
		}

	}
	Kemet_Header_Mobile_Button_Item::get_instance();
}