<?php
/**
 * bbPress Compatibility File.
 *
 * @package Kemet
 */

// If plugin - 'bbPress' not exist then return.
if ( ! class_exists( 'bbPress' ) ) {
	return;
}

/**
 * Kemet bbPress Compatibility
 */
if ( ! class_exists( 'Kemet_bbPress' ) ) :

	/**
	 * Kemet bbPress Compatibility
	 */
	class Kemet_bbPress {

		/**
		 * Member Variable
		 *
		 * @var object instance
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
			$this->customize_register();
			// Content Layout.
			add_filter( 'kemet_get_content_layout', array( $this, 'content_layout' ) );
			// Sidebar Layout.
			add_filter( 'kemet_layout', array( $this, 'sidebar_layout' ) );
			add_filter( 'kemet_theme_dynamic_css', array( $this, 'dynamic_css' ) );
			add_filter( 'kemet_theme_defaults', array( $this, 'theme_defaults' ) );
			add_filter( 'kemet_theme_assets', array( $this, 'add_styles' ) );
			add_filter( 'bbp_get_breadcrumb', '__return_false' );
		}

		/**
		 * Default Values
		 *
		 * @param array $defaults default value.
		 * @return array
		 */
		public function theme_defaults( $defaults ) {
			$defaults['bbpress-sidebar-layout']   = 'no-sidebar';
			$defaults['bbpress-container-layout'] = 'default';

			return $defaults;
		}
		/**
		 * Register Customizer sections and panel for bbPress
		 */
		public function customize_register() {

            // @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			/**
			 * Register Sections & Panels
			 */
            require_once KEMET_THEME_DIR . 'inc/compatibility/bbpress/customizer/sections/section-container.php';
            require_once KEMET_THEME_DIR . 'inc/compatibility/bbpress/customizer/sections/section-sidebar.php';
            // @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * bbPress Container
		 *
		 * @param string $sidebar_layout Layout type.
		 *
		 * @return string $sidebar_layout Layout type.
		 */
		public function sidebar_layout( $sidebar_layout ) {
			if ( is_bbpress() ) {
				$bbpress_sidebar = kemet_get_option( 'bbpress-sidebar-layout' );
				$sidebar         = '';
				if ( 'default' !== $bbpress_sidebar ) {
					$sidebar_layout = $bbpress_sidebar;
				}

				$sidebar = kemet_get_meta( 'sidebar-layout' );

				if ( 'default' !== $sidebar && ! empty( $sidebar ) ) {
					$sidebar_layout = $sidebar;
				}
			}

			return $sidebar_layout;
		}

		/**
		 * bbPress Container
		 *
		 * @param string $layout Layout type.
		 *
		 * @return string $layout Layout type.
		 */
		public function content_layout( $layout ) {
			if ( is_bbpress() ) {
				$bbpress_layout = kemet_get_option( 'bbpress-container-layout' );
				$shop_layout    = 'default';

				if ( 'default' !== $bbpress_layout ) {
					$layout = $bbpress_layout;
				}

				$shop_layout = kemet_get_meta( 'content-layout' );

				if ( 'default' !== $shop_layout && ! empty( $shop_layout ) ) {
					$layout = $shop_layout;
				}
			}

			return $layout;
		}

		/**
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css dynamic css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {

			$css_output = array(
				'#bbpress-forums fieldset.bbp-form' => array(
					'border-color' => 'var(--inputBorderColor)',
				),
				'.kmt-single-post #bbpress-forums fieldset.bbp-form input[type=text], .kmt-single-post #bbpress-forums fieldset.bbp-form select, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, #bbpress-forums #bbp-your-profile fieldset select' => array(
					'color'            => 'var(--inputColor)',
					'background-color' => 'var(--inputBackgroundColor)',
					'border-color'     => 'var(--inputBorderColor)',
					'border-radius'    => 'var(--inputBorderRadius)',
					'border-width'     => 'var(--inputBorderWidth)',
					'padding'          => 'var(--padding) !important',
				),
			);

			/* Parse CSS from array() */
			$css_output = kemet_parse_css( $css_output );

			$dynamic_css .= apply_filters( 'kemet_theme_bbpress_dynamic_css', $css_output );

			return $dynamic_css;
		}

		/**
		 * Add bbpress style
		 *
		 * @param object $assets styles.
		 * @return object
		 */
		public function add_styles( $assets ) {
			$assets['css']['kemet-bbpress'] = 'compatibility/bbpress';
			return $assets;
		}
	}

endif;

if ( apply_filters( 'kemet_enable_bbpress_integration', true ) ) {
	Kemet_bbPress::get_instance();
}
