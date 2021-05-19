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
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			// Content Layout.
			add_filter( 'kemet_get_content_layout', array( $this, 'content_layout' ) );
			// Sidebar Layout.
			add_filter( 'kemet_layout', array( $this, 'sidebar_layout' ) );
			add_filter( 'kemet_dynamic_css', array( $this, 'dynamic_css' ) );
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
			$defaults['bbpress-sidebar-layout'] = 'no-sidebar';
			$defaults['bbpress-content-layout'] = 'default';

			return $defaults;
		}
		/**
		 * Register Customizer sections and panel for bbPress
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {

            // @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			/**
			 * Register Sections & Panels
			 */
			require_once KEMET_THEME_DIR . 'inc/compatibility/bbpress/customizer/register-panels-and-sections.php';
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
		 * bbPress Container
		 *
		 * @param string $layout Layout type.
		 *
		 * @return string $layout Layout type.
		 */
		public function content_layout( $layout ) {
			if ( is_bbpress() ) {
				$bbpress_layout = kemet_get_option( 'bbpress-content-layout' );
				$shop_layout    = 'default';

				if ( 'default' !== $bbpress_layout ) {
					$layout = $bbpress_layout;
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
		 * @param  string $dynamic_css dynamic css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {

			$link_color                   = kemet_get_option( 'content-link-color' );
			$theme_color                  = kemet_get_option( 'theme-color' );
			$text_meta_color              = kemet_get_option( 'text-meta-color' );
			$link_h_color                 = kemet_get_option( 'content-link-h-color' );
			$global_border_color          = kemet_get_option( 'global-border-color' );
			$global_bg_color              = kemet_get_option( 'global-background-color' );
			$archive_post_title_font_size = kemet_get_option( 'font-size-page-title' );
			// Input Options.
			$input_font_size      = kemet_get_option( 'inputs-font-size' );
			$input_font_family    = kemet_get_option( 'inputs-font-family' );
			$input_font_weight    = kemet_get_option( 'inputs-font-weight' );
			$input_text_tranform  = kemet_get_option( 'inputs-text-transform' );
			$input_font_style     = kemet_get_option( 'inputs-font-style' );
			$input_line_height    = kemet_get_option( 'inputs-line-height' );
			$input_letter_spacing = kemet_get_option( 'inputs-letter-spacing' );
			$input_bg_color       = kemet_get_option( 'input-bg-color', kemet_color_brightness( $global_bg_color, 0.99, 'dark' ) );
			$input_text_color     = kemet_get_option( 'input-text-color' );
			$input_border_radius  = kemet_get_option( 'input-radius' );
			$input_border_size    = kemet_get_option( 'input-border-size' );
			$input_border_color   = kemet_get_option( 'input-border-color', $global_border_color );
			$input_label_color    = kemet_get_option( 'input-label-color' );
			$input_spacing        = kemet_get_option( 'input-spacing' );

			$css_output = array(
				'#bbpress-forums fieldset.bbp-form' => array(
					'border-color' => esc_attr( $input_border_color ),
				),
				'.kmt-single-post #bbpress-forums fieldset.bbp-form input[type=text], .kmt-single-post #bbpress-forums fieldset.bbp-form select, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, #bbpress-forums #bbp-your-profile fieldset select' => array(
					'color'            => esc_attr( $text_meta_color ),
					'background-color' => esc_attr( $input_bg_color ),
					'border-color'     => esc_attr( $input_border_color ),
					'border-radius'    => kemet_responsive_slider( $input_border_radius, 'desktop' ),
					'border-width'     => kemet_responsive_slider( $input_border_size, 'desktop' ),
					'padding-top'      => kemet_responsive_spacing( $input_spacing, 'top', 'desktop' ),
					'padding-bottom'   => kemet_responsive_spacing( $input_spacing, 'bottom', 'desktop' ),
					'padding-right'    => kemet_responsive_spacing( $input_spacing, 'right', 'desktop' ),
					'padding-left'     => kemet_responsive_spacing( $input_spacing, 'left', 'desktop' ),
					'font-size'        => kemet_responsive_slider( $input_font_size, 'desktop' ),
					'font-family'      => kemet_get_font_family( $input_font_family ),
					'font-weight'      => esc_attr( $input_font_weight ),
					'text-transform'   => esc_attr( $input_text_tranform ),
					'font-style'       => esc_attr( $input_font_style ),
					'line-height'      => kemet_responsive_slider( $input_line_height, 'desktop' ),
					'letter-spacing'   => kemet_responsive_slider( $input_letter_spacing, 'desktop' ),
				),
			);

			/* Parse CSS from array() */
			$css_output = kemet_parse_css( $css_output );

			$tablet_typography = array(
				'.kmt-single-post #bbpress-forums fieldset.bbp-form input[type=text], .kmt-single-post #bbpress-forums fieldset.bbp-form select, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, #bbpress-forums #bbp-your-profile fieldset select' => array(
					'border-radius'  => kemet_responsive_slider( $input_border_radius, 'tablet' ),
					'border-width'   => kemet_responsive_slider( $input_border_size, 'tablet' ),
					'padding-top'    => kemet_responsive_spacing( $input_spacing, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $input_spacing, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $input_spacing, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $input_spacing, 'left', 'tablet' ),
					'font-size'      => kemet_responsive_slider( $input_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $input_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $input_letter_spacing, 'tablet' ),
				),
			);
			/* Parse CSS from array()*/
			$css_output .= kemet_parse_css( $tablet_typography, '', '768' );

			$mobile_typography = array(
				'.kmt-single-post #bbpress-forums fieldset.bbp-form input[type=text], .kmt-single-post #bbpress-forums fieldset.bbp-form select, #bbpress-forums #bbp-your-profile fieldset input, #bbpress-forums #bbp-your-profile fieldset textarea, #bbpress-forums #bbp-your-profile fieldset select' => array(
					'border-radius'  => kemet_responsive_slider( $input_border_radius, 'mobile' ),
					'border-width'   => kemet_responsive_slider( $input_border_size, 'mobile' ),
					'padding-top'    => kemet_responsive_spacing( $input_spacing, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $input_spacing, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $input_spacing, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $input_spacing, 'left', 'mobile' ),
					'font-size'      => kemet_responsive_slider( $input_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $input_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $input_letter_spacing, 'mobile' ),
				),
			);

			/* Parse CSS from array() -> max-width: (mobile-breakpoint) px */
			$css_output .= kemet_parse_css( $mobile_typography, '', '544' );

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
