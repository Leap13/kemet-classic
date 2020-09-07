<?php
/**
 * Loader Functions
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Enqueue Scripts
 */
if ( ! class_exists( 'Wiz_Enqueue_Scripts' ) ) {

	/**
	 * Theme Enqueue Scripts
	 */
	class Wiz_Enqueue_Scripts {

		/**
		 * Class styles.
		 *
		 * @access public
		 * @var $styles Enqueued styles.
		 */
		public static $styles;

		/**
		 * Class scripts.
		 *
		 * @access public
		 * @var $scripts Enqueued scripts.
		 */
		public static $scripts;

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'wiz_get_fonts', array( $this, 'add_fonts' ), 1 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 1 );
		}

		
		/**
		 * List of all assets.
		 *
		 * @return array assets array.
		 */
		public static function theme_assets() {

			$default_assets = array(

				// handle => location ( in /assets/js/ ) ( without .js ext).
				'js'  => array(
					'wiz-theme-js' => 'style',
				),

				// handle => location ( in /assets/css/ ) ( without .css ext).
				'css' => array(
					'wiz-theme-css' => 'style',
				),
			);

			return apply_filters( 'wiz_theme_assets', $default_assets );
		}

		/**
		 * Add Fonts
		 */
		public function add_fonts() {

			$font_family = wiz_get_option( 'body-font-family' );
			$font_weight = wiz_get_option( 'body-font-weight' );

			Wiz_Fonts::add_font( $font_family, $font_weight );

			// Render headings font.
			$font_family = wiz_get_option( 'headings-font-family' );
			$font_weight = wiz_get_option( 'headings-font-weight' );

			Wiz_Fonts::add_font( $font_family, $font_weight );

			// Render Widget Title Font
			$font_family = wiz_get_option( 'widget-title-font-family' );
			$font_weight = wiz_get_option( 'widget-title-font-wight' );

			Wiz_Fonts::add_font( $font_family, $font_weight );

			// Render Menu Items
			$font_family = wiz_get_option( 'menu-items-font-family' );
			$font_weight = wiz_get_option( 'menu-items-font-wight' );

			// Render SubMenu Items
			$font_family = wiz_get_option( 'sub-menu-items-font-family' );
			$font_weight = wiz_get_option( 'sub-menu-items-font-wight' );

			Wiz_Fonts::add_font( $font_family, $font_weight );
		}

		/**
		 * Enqueue Scripts
		 */
		public function enqueue_scripts() {

			$wiz_enqueue = apply_filters( 'wiz_enqueue_theme_assets', true );

			if ( ! $wiz_enqueue ) {
				return;
			}

			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$js_uri  = WIZ_THEME_URI . 'assets/js/' . $dir_name . '/';
			$css_uri = WIZ_THEME_URI . 'assets/css/' . $dir_name . '/';

			// All assets.
			$all_assets = self::theme_assets();
			$styles     = $all_assets['css'];
			$scripts    = $all_assets['js'];

			if ( is_array( $styles ) && ! empty( $styles ) ) {
				// Register & Enqueue Styles.
				foreach ( $styles as $key => $style ) {

					// Generate CSS URL.
					$css_file = $css_uri . $style . $file_prefix . '.css';

					// Register.
					wp_register_style( $key, $css_file, array(), WIZ_THEME_VERSION, 'all' );

					// Enqueue.
					wp_enqueue_style( $key );

					// RTL support.
					wp_style_add_data( $key, 'rtl', 'replace' );
				}
			}

			if ( is_array( $scripts ) && ! empty( $scripts ) ) {
				// Register & Enqueue Scripts.
				foreach ( $scripts as $key => $script ) {

					// Register.
					wp_register_script( $key, $js_uri . $script . $file_prefix . '.js', array(), WIZ_THEME_VERSION, true );

					// Enqueue.
					wp_enqueue_script( $key );
				}
			}

			// Fonts - Render Fonts.
			Wiz_Fonts::render_fonts();

			/**
			 * Inline styles
			 */
			wp_add_inline_style( 'wiz-theme-css', Wiz_Dynamic_CSS::return_output() );
			wp_add_inline_style( 'wiz-theme-css', Wiz_Dynamic_CSS::return_meta_output( true ) );

			$wiz_localize = array(
				'break_point' => wiz_header_break_point(),    // Header Break Point.
			);

			wp_localize_script( 'wiz-theme-js', 'wiz', apply_filters( 'wiz_theme_js_localize', $wiz_localize ) );

			// Comment assets.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

		}

		/**
		 * Trim CSS
		 *
		 * @param string $css CSS content to trim.
		 * @return string
		 */
		static public function trim_css( $css = '' ) {

			// Trim white space for faster page loading.
			if ( ! empty( $css ) ) {
				$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
				$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
				$css = str_replace( ', ', ',', $css );
			}

			return $css;
		}

	}

	
	new Wiz_Enqueue_Scripts();
}
