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

	}

	new Kemet_Admin_Settings();
}
