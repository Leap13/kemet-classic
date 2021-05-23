<?php
/**
 * Admin settings helper
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kemet_Admin_Settings' ) ) {

	/**
	 * Kemet Admin Settings
	 */
	class Kemet_Admin_Settings {


		/**
		 * View all actions
		 *
		 * @var array $view_actions
		 */
		public static $view_actions = array();

		/**
		 * Menu page title
		 *
		 * @var array $menu_page_title
		 */
		public static $menu_page_title = 'Kemet Theme';

		/**
		 * Page title
		 *
		 * @var array $page_title
		 */
		public static $page_title = 'Kemet';

		/**
		 * Plugin slug
		 *
		 * @var array $plugin_slug
		 */
		public static $plugin_slug = 'kemet';

		/**
		 * Constructor
		 */
		public function __construct() {
			if ( ! is_admin() ) {
				return;
			}
			add_action( 'admin_menu', array( $this, 'register_kemet_custom_menu_page' ), 1 );
			add_action( 'admin_menu', array( $this, 'remove_kemet_submenu_menu' ), 99 );
			add_action( 'after_setup_theme', __CLASS__ . '::init_admin_settings', 99 );
		}

		/**
		 * Add Kemet menu Item
		 *
		 * @return void
		 */
		function register_kemet_custom_menu_page() {
			if ( apply_filters( 'enable_kemet_admin_menu_item', false ) ) {
				add_menu_page( __( 'Kemet Panel', 'kemet' ), __( 'Kemet', 'kemet' ), 'manage_options', 'kemet_panel', null, null );
			}
		}

		/**
		 * Rwmove Kemet submenu Item
		 *
		 * @return void
		 */
		function remove_kemet_submenu_menu() {
			if ( apply_filters( 'enable_kemet_admin_menu_item', false ) ) {
				remove_submenu_page( 'kemet_panel', 'kemet_panel' );
			}
		}

		/**
		 * Admin settings init
		 */
		public static function init_admin_settings() {
			add_action( 'admin_enqueue_scripts', __CLASS__ . '::admin_scripts' );
			add_action( 'customize_controls_enqueue_scripts', __CLASS__ . '::customizer_scripts' );
		}

		/**
		 * Load the scripts and styles in the customizer controls.
		 */
		public static function customizer_scripts() {
			$color_palettes = wp_json_encode( kemet_color_palette() );
			wp_add_inline_script( 'wp-color-picker', 'jQuery.wp.wpColorPicker.prototype.options.palettes = ' . $color_palettes . ';' );
		}

		/**
		 * Enqueues the needed CSS/JS for Backend.
		 */
		public static function admin_scripts() {
			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$assets_js_uri = KEMET_THEME_URI . 'assets/js/' . $dir_name . '/';

			wp_enqueue_script( 'kemet-color-alpha', $assets_js_uri . 'wp-color-picker-alpha' . $file_prefix . '.js', array( 'jquery', 'customize-base', 'wp-color-picker' ), KEMET_THEME_VERSION, true );
		}
	}

	new Kemet_Admin_Settings();
}
