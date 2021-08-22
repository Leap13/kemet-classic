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
			add_filter( 'kemet_customizer_locatize', array( $this, 'preview_localize' ) );
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
				$typography = kemet_get_option( $button . '-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}

		/**
		 * Add Preview Localize
		 *
		 * @return array
		 */
		public function preview_localize( $localize_js ) {
			$localize_js['mobileButtonItems'] = apply_filters( 'kemet_header_mobile_button_items', array( 'header-mobile-button-1', 'header-mobile-button-2' ) );

			return $localize_js;
		}

	}
	Kemet_Header_Mobile_Button_Item::get_instance();
}
