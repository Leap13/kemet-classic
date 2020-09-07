<?php
/**
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

if ( ! class_exists( 'Wiz_Setup' ) ) {

	/**
	 * Wiz_Setup initial setup
	 */
	class Wiz_Setup {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup_theme' ), 2 );
		}

		/**
		 * Setup theme
		 *
		 */
		function setup_theme() {

			do_action( 'wiz_class_loaded' );

			/**
			 * Content Width
			 */
			if ( ! isset( $content_width ) ) {
				$content_width = apply_filters( 'wiz_content_width', 700 );
			}

			/**
			 * Make theme available for translation.
			 */
			load_theme_textdomain( 'wiz', WIZ_THEME_DIR . '/languages' );

			/**
			 * Theme Support
			 */

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			add_theme_support(
				'html5', array(
					'search-form',
					'gallery',
					'caption',
				)
			);

			// Post formats.
			add_theme_support(
				'post-formats', array(
					'gallery',
					'image',
					'link',
					'quote',
					'video',
					'audio',
					'status',
					'aside',
				)
			);

			// Add theme support for Custom Logo.
			add_theme_support(
				'custom-logo', array(
					'width'       => 180,
					'height'      => 60,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			// Customize Selective Refresh Widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * This theme styles the visual editor to resemble the theme style,
			 * specifically font, colors, icons, and column width.
			 */
			/* Directory and Extension */
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			if ( apply_filters( 'wiz_theme_editor_style', true ) ) {
				add_editor_style( 'assets/css/' . $dir_name . '/editor-style' . $file_prefix . '.css' );
			}

			if ( apply_filters( 'wiz_fullwidth_oembed', true ) ) {
				// Filters the oEmbed process to run the responsive_oembed_wrapper() function.
				add_filter( 'embed_oembed_html', array( $this, 'responsive_oembed_wrapper' ), 10, 3 );
				add_filter( 'oembed_result', array( $this, 'responsive_oembed_wrapper' ), 10, 3 );
			}

			// WooCommerce.
			add_theme_support( 'woocommerce' );
		}

		/**
		 * Adds a responsive embed wrapper around oEmbed content
		 *
		 * @return string       Updated embed markup.
		 */
		function responsive_oembed_wrapper( $html, $url, $attr ) {

			$add_wiz_oembed_wrapper = apply_filters( 'wiz_responsive_oembed_wrapper_enable', true );

			$allowed_providers = apply_filters(
				'wiz_allowed_fullwidth_oembed_providers', array(
					'vimeo.com',
					'youtube.com',
				)
			);

			if ( wiz_strposa( $url, $allowed_providers ) ) {
				if ( $add_wiz_oembed_wrapper ) {
					$html = ( '' !== $html ) ? '<div class="wiz-oembed-container">' . $html . '</div>' : '';
				}
			}

			return $html;
		}
	}
}

Wiz_Setup::get_instance();
