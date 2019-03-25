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
 * Theme Options
 */
if ( ! class_exists( 'Kemet_Theme_Options' ) ) {
	/**
	 * Theme Options
	 */
	class Kemet_Theme_Options {
		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;
		/**
		 * Post id.
		 *
		 * @var $instance Post id.
		 */
		public static $post_id = null;
		/**
		 * A static option variable.
		 *
		 * @access private
		 * @var mixed $db_options
		 */
		private static $db_options;
		/**
		 * Initiator
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

			// Refresh options variables after customizer save.
			add_action( 'after_setup_theme', array( $this, 'refresh' ) );

		}

		/**
		 * Set default theme option values
		 *
		 * @return default values of the theme.
		 */
		public static function defaults() {
			// Defaults list of options.
			return apply_filters(
				'kemet_theme_defaults', array(
					// Blog Single.
					'blog-single-post-structure'       => array(
						'single-image',
						'single-title-meta',
					),

					'blog-single-width'                => 'default',
					'blog-single-max-width'            => 1200,
					'blog-single-meta'                 => array(
						'comments',
						'category',
						'author',
					),
					// Kemet Blog.
					'blog-post-structure'              => array(
						'image',
						'title-meta',
					),
					'blog-width'                       => 'default',
					'blog-max-width'                   => 1200,
					'blog-post-content'                => 'excerpt',
					'blog-meta'                        => array(
						'comments',
						'category',
						'author',
					),
					// Kemet Colors.
					'text-color'                       => '#797979',
					'link-color'                       => '#4a4a4a',
					'theme-color'                      => '#191919',
					'link-h-color'                     => '#000000',

					// Footer Colors.
					'footer-bg-obj'                    => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
					),
					'footer-color'                     => '',
					'footer-link-color'                => '',
					'footer-link-h-color'              => '',
					// Footer Widgets.
					'kemet-footer-bg-obj'                => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
					),
					'kemet-footer-text-color'            => '',
					'kemet-footer-link-color'            => '',
					'kemet-footer-link-h-color'          => '',
					'kemet-footer-wgt-title-color'       => '',
					'enable-footer-content-center'       => 0,
					// Kemet Buttons.
					'button-color'                     => '',
					'button-h-color'                   => '',
					'button-bg-color'                  => '',
					'button-bg-h-color'                => '',
					'button-radius'                    => 2,
					'button-v-padding'                 => 10,
					'button-h-padding'                 => 40,
					// Kemet Footer 
					'copyright-footer-layout'                => 'copyright-footer-layout-1',
					'footer-copyright-section-1'             => 'custom',
					'footer-copyright-section-1-credit'      => __( 'Powered by [theme_author]', 'kemet' ),
					'footer-copyright-section-2'             => '',
					'footer-copyright-section-2-credit'      => __( 'Powered by [theme_author]', 'kemet' ),
					'footer-copyright-dist-equal-align'      => true,
					'footer-copyright-divider'               => 1,
					'footer-copyright-divider-color'         => '#7a7a7a',
					'footer-layout-width'              => 'content',
					// General.
					'kmt-header-retina-logo'           => '',
					'kmt-header-logo-width'            => '',
					'kmt-header-responsive-logo-width' => array(
						'desktop' => '',
						'tablet'  => '',
						'mobile'  => '',
					),
					'display-site-title'               => 1,
					'display-site-tagline'             => 0,
					'logo-title-inline'                => 0,
					// Header 
					'disable-primary-nav'              => false,
					'header-layouts'                   => 'header-main-layout-1',
					'header-main-rt-section'           => '',
					'header-display-outside-menu'      => false,
					'display-submenu-border'           => true,
					'topbar-section-1'                 => array(
                  'search' => '',
						'menu'  => '',
                 'widget'  => '',
						'text-area'  => '',     
               ),
					'topbar-section-1-html'      	   => '<button>' . __( 'Contact Us', 'kemet' ) . '</button>',
					'topbar-section-2'                 => '',
					'topbar-section-2-html'      	   => '<button>' . __( 'Contact Us', 'kemet' ) . '</button>',
					'header-main-rt-section-html'      => '<button>' . __( 'Contact Us', 'kemet' ) . '</button>',
					'header-main-sep'                  => 1,
					'header-main-sep-color'            => '',
					'header-main-layout-width'         => 'content',
					'header-main-menu-label'           => '',
					'header-main-menu-align'           => 'inline',
					// Site Layout.
					'site-content-width'               => 1140,
					'site-layout-outside-bg-obj'       => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
					),
					// Container.
					'site-content-layout'              => 'plain-container',
					'single-page-content-layout'       => 'default',
					'single-post-content-layout'       => 'default',
					'archive-post-content-layout'      => 'default',
					// Typography.
					'body-font-family'                 => '',
					'body-font-weight'                 => '',
					'font-size-body'                   => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),

					'body-line-height'                 => '',
					'para-margin-bottom'               => '',
					'body-text-transform'              => '',
					'headings-font-family'             => '',
					'headings-font-weight'             => '',
					'headings-text-transform'          => '',
					'font-size-site-title'             => array(
						'desktop'      => 35,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-site-tagline'           => array(
						'desktop'      => 15,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-entry-title'            => array(
						'desktop'      => 30,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-archive-summary-title'  => array(
						'desktop'      => 40,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-page-title'             => array(
						'desktop'      => 30,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-h1'                     => array(
						'desktop'      => 48,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-h2'                     => array(
						'desktop'      => 42,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-h3'                     => array(
						'desktop'      => 30,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-h4'                     => array(
						'desktop'      => 20,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-h5'                     => array(
						'desktop'      => 18,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-h6'                     => array(
						'desktop'      => 15,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),

					// Sidebar.
					'site-sidebar-layout'              => 'right-sidebar',
					'site-sidebar-width'               => 30,
					'single-page-sidebar-layout'       => 'default',
					'single-post-sidebar-layout'       => 'default',
					'archive-post-sidebar-layout'      => 'default',

					// Sidebar.
					'kemet-footer'                       => 'disabled',

					//header
					'enable-transparent'  => 0,

					//Sticky Header
					'enable-sticky'   => 0,
					'enable-sticky-shadow' => 0,
					'sticky-responsive' => 'all-devices'
				)
			);
		}
		/**
		 * Get theme options from static array()
		 *
		 * @return array    Return array of theme options.
		 */
		public static function get_options() {
			return self::$db_options;
		}
		/**
		 * Update theme static option array.
		 */
		public static function refresh() {
			self::$db_options = wp_parse_args(
				get_option( KEMET_THEME_SETTINGS ),
				self::defaults()
			);
		}
	}
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Theme_Options::get_instance();
