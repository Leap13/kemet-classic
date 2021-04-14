<?php
/**
 * Kemet_After_Setup_Theme initial setup
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! class_exists( 'Kemet_After_Setup_Theme' ) ) {

	/**
	 * Kemet_After_Setup_Theme initial setup
	 */
	class Kemet_After_Setup_Theme {

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
				self::$instance = new self();
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
		 */
		public function setup_theme() {
			do_action( 'kemet_class_loaded' );

			/**
			 * Content Width
			 */
			if ( ! isset( $content_width ) ) {
				$content_width = apply_filters( 'kemet_content_width', 700 );
			}

			/**
			 * Make theme available for translation.
			 */
			load_theme_textdomain( 'kemet', KEMET_THEME_DIR . '/languages' );

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
				'html5',
				array(
					'search-form',
					'gallery',
					'caption',
				)
			);

			// Post formats.
			add_theme_support(
				'post-formats',
				array(
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
				'custom-logo',
				array(
					'width'       => 180,
					'height'      => 60,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			// Customize Selective Refresh Widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/*
			 * Enable support for woocommerce.
			 */
			add_theme_support( 'woocommerce' );

			/**
			 * This theme styles the visual editor to resemble the theme style,
			 * specifically font, colors, icons, and column width.
			 */
			/* Directory and Extension */
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			if ( apply_filters( 'kemet_theme_editor_style', true ) ) {
				add_editor_style( 'assets/css/' . $dir_name . '/editor-style' . $file_prefix . '.css' );
			}
		}
	}
}

Kemet_After_Setup_Theme::get_instance();
