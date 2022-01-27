<?php
/**
 * Kemet Theme Options
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Options Loader
 */
if ( ! class_exists( 'Kemet_Options' ) ) {

	/**
	 * Options Loader
	 */
	class Kemet_Options {

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
		 *  Constructor
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_script' ) );
		}

		/**
		 * Customizer Scripts
		 */
		public function enqueue_admin_script() {
			$js_prefix  = '.min.js';
			$css_prefix = '.min.css';
			$dir        = 'minified';
			if ( SCRIPT_DEBUG ) {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				$dir        = 'unminified';
			}

			if ( is_rtl() ) {
				$css_prefix = '-rtl.min.css';
				if ( SCRIPT_DEBUG ) {
					$css_prefix = '-rtl.css';
				}
			}

			wp_enqueue_media();

			wp_enqueue_script(
				'kemet-react-custom-control-script',
				KEMET_THEME_URI . 'inc/react-options/build/index.js',
				array(
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
				'kemet-react-custom-control-script',
				'kemetReactControls',
				array(
					'ajaxurl'              => admin_url( 'admin-ajax.php' ),
					'theme_url'            => KEMET_THEME_URI,
					'setting'              => KEMET_THEME_SETTINGS . '[setting_name]',
					'plugin_manager_nonce' => wp_create_nonce( 'kemet-plugins-manager' ),
					'plugins_status'       => Kemet_Panel_Plugins_Data::get_instance()->plugins_status(),
					'plugins_data'         => Kemet_Panel_Plugins_Data::get_instance()->get_plugins_data(),
					'kemet_addons_url'     => admin_url( 'admin.php?page=kemet_panel&tab=kemet-addons' ),
				)
			);

			wp_enqueue_style( 'kemet-custom-control-css', KEMET_THEME_URI . 'inc/react-options/css/' . $dir . '/style' . $css_prefix, array( 'wp-components' ), KEMET_THEME_VERSION );
			/**
			 * Inline styles
			 */
			wp_add_inline_style( 'kemet-custom-control-css', apply_filters( 'kemet_custom_control_dynamic_css', Kemet_Custom_Controls_Dynamic_Css::dynamic_css() ) );
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Options::get_instance();
