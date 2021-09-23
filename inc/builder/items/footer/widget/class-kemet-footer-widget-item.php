<?php
/**
 * Kemet Footer Widget
 *
 * @package Kemet
 */

define( 'KEMET_FOOTER_WIDGET_DIR', KEMET_FOOTER_ITEMS_DIR . 'widget/' );
define( 'KEMET_FOOTER_WIDGET_URI', KEMET_FOOTER_ITEMS_URI . 'widget/' );

if ( ! class_exists( 'Kemet_Footer_Widget_Item' ) ) {

	/**
	 * Footer Widget
	 */
	class Kemet_Footer_Widget_Item {

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
			add_action( 'kemet_get_fonts', array( $this, 'add_fonts' ), 1 );
			if ( ! is_admin() ) {
				require_once KEMET_FOOTER_WIDGET_DIR . 'dynamic-css/class-kemet-footer-widget-dynamic-css.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
		}

		/**
		 * Add Google Fonts
		 */
		public function add_fonts() {
			$footer_widgets = apply_filters( 'kemet_footer_widget_items', array( 'footer-widget-1', 'footer-widget-2', 'footer-widget-3', 'footer-widget-4', 'footer-widget-5', 'footer-widget-6' ) );

			foreach ( $footer_widgets as $widget ) {
				if ( ! Kemet_Builder_Helper::is_item_loaded( $widget, 'footer', 'desktop' ) ) {
					continue;
				}
				$typography = kemet_get_option( $widget . '-typography' );
				Kemet_Fonts::add_font_form_typography( $typography );
			}
		}
	}
	Kemet_Footer_Widget_Item::get_instance();
}
