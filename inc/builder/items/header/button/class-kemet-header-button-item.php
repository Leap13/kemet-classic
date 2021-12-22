<?php
/**
 * Kemet Header Button
 *
 * @package Kemet
 */

define( 'KEMET_HEADER_BUTTON_DIR', KEMET_HEADER_ITEMS_DIR . 'button/' );
define( 'KEMET_HEADER_BUTTON_URI', KEMET_HEADER_ITEMS_URI . 'button/' );

if ( ! class_exists( 'Kemet_Header_Button_Item' ) ) {

	/**
	 * Header Button
	 */
	class Kemet_Header_Button_Item {

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
				require_once KEMET_HEADER_BUTTON_DIR . 'dynamic-css/class-kemet-header-button-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
			add_filter( 'kemet_theme_defaults', array( $this, 'theme_defaults' ) );
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$header_button = apply_filters( 'kemet_header_button_items', array( 'header-button-1', 'header-button-2' ) );

			foreach ( $header_button as $button ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $button, 'header', 'desktop' ) ) {
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
			$localize_js['buttonItems'] = apply_filters( 'kemet_header_button_items', array( 'header-button-1', 'header-button-2' ) );

			return $localize_js;
		}

		/**
		 * Default Values
		 *
		 * @param array $defaults default value.
		 * @return array
		 */
		public function theme_defaults( $defaults ) {
			$header_button = apply_filters( 'kemet_header_button_items', array( 'header-button-1', 'header-button-2' ) );

			foreach ( $header_button as $button ) {
				$defaults[ $button . '-label' ] = __( 'Click Here', 'kemet' );
				$defaults[ $button . '-url' ]   = '#';
			}
			return $defaults;
		}

	}
	Kemet_Header_Button_Item::get_instance();
}
