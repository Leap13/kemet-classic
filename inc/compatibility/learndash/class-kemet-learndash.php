<?php
/**
 * LearnDash Compatibility File.
 *
 * @package Kemet
 */

// If plugin - 'LearnDash' not exist then return.
if ( ! class_exists( 'SFWD_LMS' ) ) {
	return;
}

/**
 * Kemet LearnDash Compatibility
 */
if ( ! class_exists( 'Kemet_LearnDash' ) ) :

	/**
	 * Kemet LearnDash Compatibility
	 */
	class Kemet_LearnDash {

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
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			// Content Layout.
			add_filter( 'kemet_get_content_layout', array( $this, 'content_layout' ) );
			// Sidebar Layout.
			add_filter( 'kemet_layout', array( $this, 'sidebar_layout' ) );
			add_filter( 'wp_enqueue_scripts', array( $this, 'dynamic_css' ) );
			add_filter( 'kemet_theme_defaults', array( $this, 'theme_defaults' ) );
		}

		/**
		 * Register Customizer sections and panel for learnDash
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {

            // @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			/**
			 * Register Sections & Panels
			 */
			require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/customizer/register-panels-and-sections.php';
            require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/customizer/sections/section-container.php';
            require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/customizer/sections/section-sidebar.php';
            // @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Default Values
		 *
		 * @param array $defaults default value.
		 * @return array
		 */
		public function theme_defaults( $defaults ) {
			$defaults['learndash-sidebar-layout'] = 'no-sidebar';
			$defaults['learndash-content-layout'] = 'default';

			return $defaults;
		}

		/**
		 * LearnDash Container
		 *
		 * @param string $sidebar_layout Layout type.
		 *
		 * @return string $sidebar_layout Layout type.
		 */
		public function sidebar_layout( $sidebar_layout ) {
			if ( is_singular( 'sfwd-courses' ) || is_singular( 'sfwd-lessons' ) || is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) || is_singular( 'sfwd-certificates' ) || is_singular( 'sfwd-assignment' ) ) {
				$learndash_sidebar = kemet_get_option( 'learndash-sidebar-layout' );
				$sidebar           = '';
				if ( 'default' !== $learndash_sidebar ) {
					$sidebar_layout = $learndash_sidebar;
				}

				if ( class_exists( 'KFW' ) ) {
					$meta    = get_post_meta( get_the_ID(), 'kemet_page_options', true );
					$sidebar = ( isset( $meta['site-sidebar-layout'] ) && $meta['site-sidebar-layout'] ) ? $meta['site-sidebar-layout'] : 'default';
				}

				if ( 'default' !== $sidebar && ! empty( $sidebar ) ) {
					$sidebar_layout = $sidebar;
				}
			}

			return $sidebar_layout;
		}

		/**
		 * LearnDash Container
		 *
		 * @param string $layout Layout type.
		 *
		 * @return string $layout Layout type.
		 */
		public function content_layout( $layout ) {
			if ( is_singular( 'sfwd-courses' ) || is_singular( 'sfwd-lessons' ) || is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) || is_singular( 'sfwd-certificates' ) || is_singular( 'sfwd-assignment' ) ) {
				$learndash_layout = kemet_get_option( 'learndash-content-layout' );
				$shop_layout      = 'default';

				if ( 'default' !== $learndash_layout ) {
					$layout = $learndash_layout;
				}

				if ( class_exists( 'KFW' ) ) {
					$meta        = get_post_meta( get_the_ID(), 'kemet_page_options', true );
					$shop_layout = ( isset( $meta['site-content-layout'] ) && $meta['site-content-layout'] ) ? $meta['site-content-layout'] : 'default';
				}

				if ( 'default' !== $shop_layout && ! empty( $shop_layout ) ) {
					$layout = $shop_layout;
				}
			}

			return $layout;
		}

		/**
		 * Dynamic CSS
		 *
		 * @return mixed
		 */
		public function dynamic_css() {
			$static_css = array(
				'.learndash-wrapper #learndash_mark_complete_button:hover, .learndash-wrapper .learndash_mark_complete_button:hover, .learndash-wrapper .learndash_mark_complete_button:focus' => array(
					'font-family'    => 'inherit',
					'font-weight'    => '800',
					'text-transform' => 'none',
				),
				'body .learndash-wrapper .ld-button:hover' => array(
					'color' => '#ffffff',
				),
			);

			$static_css = kemet_parse_css( $static_css );
			// Register learndash css.
			wp_register_style( 'kemet-learndash-style', false, array(), KEMET_THEME_VERSION );
			wp_enqueue_style( 'kemet-learndash-style' );
			wp_add_inline_style( 'kemet-learndash-style', $static_css );
		}
	}

endif;

if ( apply_filters( 'kemet_enable_learndash_integration', true ) ) {
	Kemet_Learndash::get_instance();
}
