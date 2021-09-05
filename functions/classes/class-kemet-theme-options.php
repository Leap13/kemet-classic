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
				self::$instance = new self();
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
				'kemet_theme_defaults',
				array(
					// Header Builder
					'header-desktop-items'                 => array(
						'popup'  => array( 'popup_content' => array( 'offcanvas-menu' ) ),
						'top'    => array(
							'top_left'         => array(),
							'top_left_center'  => array(),
							'top_center'       => array(),
							'top_right_center' => array(),
							'top_right'        => array(),
						),
						'main'   => array(
							'main_left'         => array( 'logo' ),
							'main_left_center'  => array(),
							'main_center'       => array(),
							'main_right_center' => array(),
							'main_right'        => array( 'primary-menu' ),
						),
						'bottom' => array(
							'bottom_left'         => array(),
							'bottom_left_center'  => array(),
							'bottom_center'       => array(),
							'bottom_right_center' => array(),
							'bottom_right'        => array(),
						),
					),
					'desktop-popup-layout'                 => 'slide',
					'desktop-popup-slide-side'             => 'right',
					'desktop-popup-content-align'          => 'left',
					'desktop-popup-content-vertical-align' => 'top',
					'desktop-popup-slide-width'            => array(
						'value' => 35,
						'unit'  => '%',
					),
					'header-mobile-items'                  => array(
						'popup'  => array( 'popup_content' => array( 'offcanvas-menu' ) ),
						'top'    =>
						array(
							'top_left'   => array(),
							'top_center' => array(),
							'top_right'  => array(),
						),
						'main'   =>
						array(
							'main_left'   => array( 'logo' ),
							'main_center' => array(),
							'main_right'  => array( 'mobile-toggle' ),
						),
						'bottom' =>
						array(
							'bottom_left'   => array(),
							'bottom_center' => array(),
							'bottom_right'  => array(),
						),
					),
					'mobile-popup-layout'                  => 'slide',
					'mobile-popup-slide-side'              => 'right',
					'mobile-popup-content-align'           => 'left',
					'mobile-popup-content-vertical-align'  => 'top',
					'mobile-popup-slide-width'             => array(
						'value' => 90,
						'unit'  => '%',
					),
					'header-button-label'                  => 'button',
					'header-button-url'                    => '',
					'header-button-open-new-tab'           => false,
					// Footer Builder
					'footer-items'                         => array(
						'top'    => array(
							'top_1' => array(),
							'top_2' => array(),
							'top_3' => array(),
							'top_4' => array(),
							'top_5' => array(),
						),
						'main'   => array(
							'main_1' => array(),
							'main_2' => array(),
							'main_3' => array(),
							'main_4' => array(),
							'main_5' => array(),
						),
						'bottom' => array(
							'bottom_1' => array( 'copyright' ),
							'bottom_2' => array(),
							'bottom_3' => array(),
							'bottom_4' => array(),
							'bottom_5' => array(),
						),
					),
					'top-footer-columns'                   => '5',
					'main-footer-columns'                  => '3',
					'bottom-footer-columns'                => '1',
					// Blog Single.
					'blog-single-post-structure'           => array(
						'single-image',
						'single-title-meta',
					),

					'blog-single-width'                    => 'default',
					'blog-single-max-width'                => 1200,
					'blog-single-meta'                     => array(
						'comments',
						'category',
						'author',
					),
					// Kemet Blog.
					'blog-post-structure'                  => array(
						'image',
						'title-meta',
						'content-readmore',
					),
					'blog-width'                           => 'default',
					'blog-max-width'                       => 1200,
					'blog-post-content'                    => 'excerpt',
					'blog-meta'                            => array(
						'comments',
						'category',
						'author',
					),
					'pagination-padding'                   => '',
					'font-color-entry-title'               => '',
					'comment-button-spacing'               => '',
					'single-post-meta-color'               => '',
					'listing-post-meta-color'              => '',
					'letter-spacing-post-meta'             => '',
					'listing-post-title-color'             => '',
					'main-entry-content-color'             => '',
					'listing-post-title-hover-color'       => '',
					'post-title-font-family'               => 'inherit',
					'readmore-as-button'                   => false,
					'readmore-text-color'                  => '',
					'readmore-padding'                     => '',
					'readmore-bg-color'                    => '',
					'read-more-border-radius'              => '',
					'read-more-border-size'                => '',
					'readmore-border-color'                => '',
					'letter-spacing-page-title'            => '',
					'letter-spacing-entry-title'           => '',
					'page-title-font-family'               => 'inherit',
					// Kemet Colors.
					'smart-skin'                           => '',
					'theme-color'                          => array( 'initial' => '#0085ba' ),
					'headings-links-color'                 => array( 'initial' => '#333333' ),
					'text-meta-color'                      => array( 'initial' => '#444140' ),
					'global-border-color'                  => array( 'initial' => '#eaeaea' ),
					'global-background-color'              => array( 'initial' => '#ffffff' ),
					'global-footer-text-color'             => array( 'initial' => '#fbfbfb' ),
					'global-footer-bg-color'               => array( 'initial' => '#222222' ),

					// Footer Colors.
					'footer-bar-bg-obj'                    => '',
					'enable-sticky-footer'                 => false,
					// Footer Widgets.
					'footer-button-color'                  => '',
					'footer-button-bg-color'               => '',
					'footer-button-border-color'           => '',
					'footer-button-radius'                 => '',
					'footer-button-border-width'           => '',
					// Kemet Buttons & Fields.
					'button-text-color'                    => '',
					'button-bg-color'                      => '',
					'btn-border-color'                     => '',
					'btn-border-size'                      => 0,
					'button-radius'                        => '',
					'button-spacing'                       => '',
					'input-bg-color'                       => '',
					'input-text-color'                     => '',
					'input-border-color'                   => '',
					'input-label-color'                    => '',
					'input-radius'                         => '',
					'input-border-size'                    => '',
					'input-border-color'                   => '',
					'input-border-color'                   => '',
					'input-spacing'                        => '',
					'content-padding'                      => array(
						'desktop'      => array(
							'top'    => '',
							'bottom' => '',
						),
						'tablet'       => array(
							'top'    => '',
							'bottom' => '',
						),
						'mobile'       => array(
							'top'    => '',
							'bottom' => '',
						),
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					// Kemet Footer.
					'footer-copyright-text'                => __( 'Powered by [theme_author] WordPress Theme', 'kemet' ),
					// General.
					'kmt-header-retina-logo'               => '',
					'kmt-header-logo-width'                => '',
					'kmt-header-responsive-logo-width'     => '',
					'display-site-title'                   => 1,
					'display-site-tagline'                 => 0,
					'logo-title-inline'                    => 0,
					'tagline-color'                        => '',
					'site-identity-spacing'                => '',

					// Site Layout.
					'site-content-width'                   => array(
						'value' => 1200,
						'unit'  => 'px',
					),
					'site-layout-outside-bg-obj'           => '',
					// Container.
					'site-title-color'                     => '',
					'site-content-layout'                  => 'plain-container',
					'single-page-content-layout'           => 'default',
					'single-post-content-layout'           => 'default',
					'archive-post-content-layout'          => 'default',
					'site-boxed-inner-bg'                  => '',
					'container-inner-spacing'              => '',
					'content-separator-color'              => '',
					// Typography.
					'site-title-font-size'                 => array(
						'desktop'      => 35,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-site-tagline'               => array(
						'desktop'      => 15,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'site-title-letter-spacing'            => '',
					'tagline-letter-spacing'               => '',
					'font-size-entry-title'                => array(
						'desktop'      => 30,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-size-page-title'                 => array(
						'desktop'      => 30,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'body-typography'                      => array(
						'size'            => array(
							'desktop'      => 15,
							'tablet'       => 15,
							'mobile'       => 15,
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'family'          => '-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif',
						'letter-spacing'  => 'normal',
						'text-transform'  => 'none',
						'text-decoration' => 'none',
					),
					'h1-typography'                        => array(
						'size' => array(
							'desktop'      => 48,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					'h2-typography'                        => array(
						'size' => array(
							'desktop'      => 42,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					'h3-typography'                        => array(
						'size' => array(
							'desktop'      => 30,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					'h4-typography'                        => array(
						'size' => array(
							'desktop'      => 20,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					'h5-typography'                        => array(
						'size' => array(
							'desktop'      => 18,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					'h6-typography'                        => array(
						'size' => array(
							'desktop'      => 15,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					// Content.
					'content-text-color'                   => '',
					'content-link-color'                   => '',
					// Sidebar.
					'site-sidebar-layout'                  => 'right-sidebar',
					'site-sidebar-width'                   => array(
						'value' => 30,
						'unit'  => '%',
					),
					'single-page-sidebar-layout'           => 'default',
					'single-post-sidebar-layout'           => 'default',
					'archive-post-sidebar-layout'          => 'default',
					'sidebar-bg-obj'                       => '',
					'sidebar-text-color'                   => '',
					'sidebar-link-color'                   => '',
					'sidebar-padding'                      => '',
					'sidebar-input-border-color'           => '',
					'sidebar-input-color'                  => '',
					'sidebar-input-bg-color'               => '',
					'sidebar-content-font-size'            => '',
					// Sidebar.
					'footer-layout'                        => 'disabled',
					'sidebar-input-border-radius'          => '',
					'sidebar-input-border-size'            => '',

					// Widgets.
					'widget-padding'                       => '',
					'widget-bg-color'                      => '',
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
