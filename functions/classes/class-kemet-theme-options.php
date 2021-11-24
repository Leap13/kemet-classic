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
						'popup'  => array( 'popup_content' => array() ),
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
					'primary-menu-box-shadow'              => true,
					'secondary-menu-box-shadow'            => true,
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
					'overlay-header-enable-device'         => array(
						'desktop' => true,
						'mobile'  => true,
					),
					'mobile-popup-layout'                  => 'slide',
					'mobile-popup-slide-side'              => 'right',
					'mobile-popup-content-align'           => 'left',
					'mobile-popup-content-vertical-align'  => 'top',
					'mobile-popup-slide-width'             => array(
						'value' => 90,
						'unit'  => '%',
					),
					'desktop-toggle-button-label-visibility' => array(
						'desktop' => true,
						'tablet'  => false,
						'mobile'  => false,
					),
					'mobile-toggle-button-label-visibility' => array(
						'tablet' => false,
						'mobile' => false,
					),
					'header-button-label'                  => 'button',
					'header-button-url'                    => '',
					'header-button-open-new-tab'           => false,
					'offcanvas-menu-border-bottom-width'   => Kemet_Customizer::responsive_default_value( 1, 'px' ),
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
					'desktop-toggle-button-style'          => 'simple',
					'keep-footer-bottom'                   => true,
					// Blog Single.
					'blog-single-post-structure'           => array(
						'single-image',
						'single-title-meta',
					),
					'blog-excerpt-length'                  => 50,
					'blog-single-width'                    => 'default',
					'blog-single-max-width'                => 1200,
					'blog-single-meta'                     => array(
						'comments',
						'category',
						'author',
					),
					// Kemet Blog.
					'blog-layouts'                         => 'blog-layout-1',
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
					'enable-sidebar-separator'             => true,
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
					'colorPalette'                         => array(
						'color1'          => '#0085ba',
						'color2'          => '#333333',
						'color3'          => '#444140',
						'color4'          => '#eaeaea',
						'color5'          => '#ffffff',
						'color6'          => '#fbfbfb',
						'color7'          => '#222222',
						'current_palette' => 'palette-2',
						'palettes'        => array(
							array(
								'id'     => 'palette-2',
								'type'   => 'system',
								'skin'   => 'light',
								'name'   => 'Kemet Default',
								'color1' => '#0085ba',
								'color2' => '#333333',
								'color3' => '#444140',
								'color4' => '#eaeaea',
								'color5' => '#ffffff',
								'color6' => '#fbfbfb',
								'color7' => '#222222',
							),
							array(
								'id'     => 'palette-7',
								'type'   => 'system',
								'skin'   => 'light',
								'name'   => 'Kemet Palette 1',
								'color1' => '#f67207',
								'color2' => '#1c1c1c',
								'color3' => '#4c4c4c',
								'color4' => '#e3e3e3',
								'color5' => '#fcfcfc',
								'color6' => '#ffffff',
								'color7' => '#2c2c2c',
							),
							array(
								'id'     => 'palette-1',
								'type'   => 'system',
								'skin'   => 'light',
								'name'   => 'Kemet Palette 2',
								'color1' => '#b7d800',
								'color2' => '#1d3e93',
								'color3' => '#626262',
								'color4' => '#ebeef6',
								'color5' => '#f9fafb',
								'color6' => '#f9fafb',
								'color7' => '#151a36',
							),
							array(
								'id'     => 'palette-3',
								'type'   => 'system',
								'skin'   => 'light',
								'name'   => 'Kemet Palette 3',
								'color1' => '#e49135',
								'color2' => '#a63131',
								'color3' => '#4c4c4c',
								'color4' => '#f4e6e6',
								'color5' => '#fcfcfc',
								'color6' => '#ffffff',
								'color7' => '#a63131',
							),
							array(
								'id'     => 'palette-4',
								'type'   => 'system',
								'skin'   => 'dark',
								'name'   => 'Kemet Palette 1',
								'color1' => '#f67206',
								'color2' => '#f7f7f7',
								'color3' => '#c6c6c6',
								'color4' => '#4d4d4d',
								'color5' => '#3b3b3b',
								'color6' => '#cfcfcf',
								'color7' => '#2c2c2c',
							),
							array(
								'id'     => 'palette-5',
								'type'   => 'system',
								'skin'   => 'dark',
								'name'   => 'Kemet Palette 2',
								'color1' => '#8abf3b',
								'color2' => '#ffffff',
								'color3' => '#898d92',
								'color4' => '#2f3940',
								'color5' => '#131b21',
								'color6' => '#898d92',
								'color7' => '#0e121c',
							),
							array(
								'id'     => 'palette-6',
								'type'   => 'system',
								'skin'   => 'dark',
								'name'   => 'Kemet Palette 3',
								'color1' => '#f0db00',
								'color2' => '#ffffff',
								'color3' => '#f1f1f1',
								'color4' => '#3c3c3c',
								'color5' => '#222222',
								'color6' => '#ffffff',
								'color7' => '#1b1b1b',
							),
						),
					),
					'theme-color'                          => array( 'initial' => 'var(--paletteColor1)' ),
					'headings-color'                       => array( 'initial' => 'var(--paletteColor2)' ),
					'links-color'                          => array(
						'initial' => 'var(--paletteColor2)',
						'hover'   => 'var(--paletteColor1)',
					),
					'text-meta-color'                      => array( 'initial' => 'var(--paletteColor3)' ),
					'global-border-color'                  => array( 'initial' => 'var(--paletteColor4)' ),
					'global-background-color'              => array( 'initial' => 'var(--paletteColor5)' ),
					'global-footer-text-color'             => array( 'initial' => 'var(--paletteColor6)' ),
					'global-footer-bg-color'               => array( 'initial' => 'var(--paletteColor7)' ),
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
					'btn-border-size'                      => '',
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
					'blog-grids'                           => array(
						'desktop' => 3,
						'tablet'  => 2,
						'mobile'  => 1,
					),
					// Kemet Footer.
					'footer-copyright-text'                => __( 'Powered by [theme_author] WordPress Theme', 'kemet' ),
					// General.
					'kmt-header-retina-logo'               => '',
					'kmt-header-logo-width'                => '',
					'kmt-header-responsive-logo-width'     => '',
					'display-site-title'                   => true,
					'display-site-tagline'                 => false,
					'logo-title-inline'                    => false,
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
					'site-title-typography'                => array(
						'size' => array(
							'desktop'      => 35,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
					),
					'tagline-typography'                   => array(
						'size' => array(
							'desktop'      => 15,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
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
						'size'        => array(
							'desktop'      => 15,
							'tablet'       => 15,
							'mobile'       => 15,
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.85714285714286,
							'tablet'       => 1.85714285714286,
							'mobile'       => 1.85714285714286,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
						),
					),
					'h1-typography'                        => array(
						'size'        => array(
							'desktop'      => 48,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.7,
							'tablet'       => 1.7,
							'mobile'       => 1.7,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
						),
					),
					'h2-typography'                        => array(
						'size'        => array(
							'desktop'      => 42,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.6,
							'tablet'       => 1.6,
							'mobile'       => 1.6,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
						),
					),
					'h3-typography'                        => array(
						'size'        => array(
							'desktop'      => 30,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.5,
							'tablet'       => 1.5,
							'mobile'       => 1.5,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
						),
					),
					'h4-typography'                        => array(
						'size'        => array(
							'desktop'      => 20,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.4,
							'tablet'       => 1.4,
							'mobile'       => 1.4,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
						),
					),
					'h5-typography'                        => array(
						'size'        => array(
							'desktop'      => 18,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.3,
							'tablet'       => 1.3,
							'mobile'       => 1.3,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
						),
					),
					'h6-typography'                        => array(
						'size'        => array(
							'desktop'      => 15,
							'tablet'       => '',
							'mobile'       => '',
							'desktop-unit' => 'px',
							'tablet-unit'  => 'px',
							'mobile-unit'  => 'px',
						),
						'line-height' => array(
							'desktop'      => 1.2,
							'tablet'       => 1.2,
							'mobile'       => 1.2,
							'desktop-unit' => 'em',
							'tablet-unit'  => 'em',
							'mobile-unit'  => 'em',
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
					// Go top
					'go-top-position'                      => 'right',
					'go-top-side-offset'                   => 50,
					'go-top-bottom-offset'                 => 50,
					'go-top-style'                         => 'arrow-up-alt',
					// Footer.
					'top-footer-bottom-border-width'       => array(
						'desktop'      => 0,
						'tablet'       => 0,
						'mobile'       => 0,
						'desktop_unit' => 'px',
						'tablet_unit'  => 'px',
						'mobile_unit'  => 'px',
					),
					'main-footer-bottom-border-width'      => array(
						'desktop'      => 0,
						'tablet'       => 0,
						'mobile'       => 0,
						'desktop_unit' => 'px',
						'tablet_unit'  => 'px',
						'mobile_unit'  => 'px',
					),
					'bottom-footer-bottom-border-width'    => array(
						'desktop'      => 0,
						'tablet'       => 0,
						'mobile'       => 0,
						'desktop_unit' => 'px',
						'tablet_unit'  => 'px',
						'mobile_unit'  => 'px',
					),
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
