<?php
/**
 * Sticky Header Partials
 *
 * @package Kemet
 */

if ( ! class_exists( 'Kemet_Sticky_Header_Partials' ) ) {

	/**
	 * Sticky Header Partials
	 */
	class Kemet_Sticky_Header_Partials {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Instance
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
			add_action( 'kemet_header', array( $this, 'sticky_header_logo' ), 1 );
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'kemet_header_class', array( $this, 'header_classes' ), 10, 1 );
			add_filter( 'kemet_theme_js_localize', array( $this, 'js_localize' ) );
			add_filter( 'kemet_header_main_row_classes', array( $this, 'main_row_classes' ) );
			add_filter( 'kemet_mobile_header_main_row_classes', array( $this, 'mobile_main_row_classes' ) );
			if ( class_exists( 'Kemet_Style_Generator' ) ) {
				add_action( 'kemet_get_css_files', array( $this, 'add_js' ) );
			} else {
				add_filter( 'kemet_theme_assets', array( $this, 'add_styles' ) );
			}
		}

		/**
		 * Sticky Header Enable
		 *
		 * @return boolean
		 */
		public static function enable_sticky() {
			$sticky_rows = array( 'top', 'main', 'bottom' );

			foreach ( $sticky_rows as $row ) {
				if ( kemet_get_option( 'enable-sticky-' . $row ) || kemet_get_option( 'enable-sticky-mobile-' . $row ) ) {
					return true;
				}
			}

			return false;
		}
		/**
		 * Header classes
		 *
		 * @param array $classes array of classes.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Sticky Header.
			$sticky_top = kemet_get_option( 'enable-sticky-top' );
			if ( $sticky_top ) {
				$classes[] = 'kmt-sticky-top-bar';
			}
			$sticky_main = kemet_get_option( 'enable-sticky-main' );
			if ( $sticky_main ) {
				$classes[] = 'kmt-sticky-main-bar';
			}
			$sticky_bottom = kemet_get_option( 'enable-sticky-bottom' );
			if ( $sticky_bottom ) {
				$classes[] = 'kmt-sticky-bottom-bar';
			}
			return $classes;
		}

		/**
		 * Main Row Classes
		 *
		 * @param array $classes array of classes.
		 * @return array
		 */
		public function main_row_classes( $classes ) {
			$shrink      = kemet_get_option( 'enable-shrink-main' );
			$main_sticky = kemet_get_option( 'enable-sticky-main' );

			if ( $shrink && $main_sticky ) {
				$classes[] = 'kmt-shrink-effect';
			}

			return $classes;
		}

		/**
		 * Main Row Classes
		 *
		 * @param array $classes array of classes.
		 * @return array
		 */
		public function mobile_main_row_classes( $classes ) {
			$shrink      = kemet_get_option( 'enable-shrink-main-mobile' );
			$main_sticky = kemet_get_option( 'enable-sticky-mobile-main' );

			if ( $shrink && $main_sticky ) {
				$classes[] = 'kmt-shrink-effect';
			}

			return $classes;
		}
		/**
		 * Sticky header logo
		 *
		 * @return void
		 */
		public function sticky_header_logo() {
			if ( self::enable_sticky() ) {
				// Logo For None Effect.
				add_filter( 'kemet_has_custom_logo', '__return_true' );
				add_filter( 'get_custom_logo', array( $this, 'kemet_sticky_header_logo' ), 10, 2 );
			}
		}

		/**
		 * Sticky header markup
		 *
		 * @param string $html logo html.
		 * @return string
		 */
		public function kemet_sticky_header_logo( $html ) {
			if ( self::enable_sticky() ) {
				$sticky_logo = kemet_get_option( 'sticky-logo' );
				add_filter( 'wp_get_attachment_image_attributes', array( $this, 'replace_sticky_header_attr' ), 10, 3 );
				$custom_logo_id = attachment_url_to_postid( $sticky_logo );
				$size           = 'full';
				$html           = sprintf(
					'<a href="%1$s" class="custom-logo-link sticky-custom-logo" rel="home" itemprop="url">%2$s</a>',
					esc_url( home_url( '/' ) ),
					wp_get_attachment_image(
						apply_filters( 'kemet_sticky_logo_id', $custom_logo_id ), // Attachment id.
						$size, // Attachment size.
						false, // Attachment icon.
						array(
							'class' => 'custom-logo',
						)
					)
				);
				$html          .= sprintf(
					'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
					esc_url( home_url( '/' ) ),
					wp_get_attachment_image(
						apply_filters( 'kemet_custom_logo_id', get_theme_mod( 'custom_logo' ) ), // Attachment id.
						'kmt-logo-size', // Attachment size.
						false, // Attachment icon.
						array(
							'class' => 'custom-logo',
						)
					)
				);
			}
			return $html;
		}

		/**
		 * Replace sticky header attributes
		 *
		 * @param object $attr
		 * @param object $attachment
		 * @param mixed  $size
		 * @return object
		 */
		public function replace_sticky_header_attr( $attr, $attachment, $size ) {
			if ( self::enable_sticky() ) {
				$sticky_logo    = kemet_get_option( 'sticky-logo' );
				$custom_logo_id = attachment_url_to_postid( $sticky_logo );
				if ( $custom_logo_id == $attachment->ID ) {
					$attach_data = array();
					if ( ! is_customize_preview() ) {
						$attach_data = wp_get_attachment_image_src( $attachment->ID, 'full' );
						if ( isset( $attach_data[0] ) ) {
							$attr['src'] = $attach_data[0];
						}
					}
					$attr['srcset'] = '';

					if ( '' !== $sticky_logo ) {
						$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						$cutom_logo_url = $cutom_logo[0];
						$attr['srcset'] = $cutom_logo_url;
					}
					$attr['srcset'] = $cutom_logo_url;
				}
			}
			return $attr;
		}

		/**
		 * Add sticky header classes to header
		 *
		 * @param array $classes header classes.
		 * @return array
		 */
		public function header_classes( $classes ) {
			if ( self::enable_sticky() ) {
				$sticky_logo = kemet_get_option( 'sticky-logo' );
				if ( '' !== $sticky_logo ) {
					$classes[] = 'kmt-sticky-logo';
				}
			}
			return $classes;
		}

		/**
		 * Sticky Header JS
		 *
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		public function js_localize( $localize ) {

			$localize['stickyTop']          = kemet_get_option( 'enable-sticky-top' ) ? 'on' : 'off';
			$localize['stickyMain']         = kemet_get_option( 'enable-sticky-main' ) ? 'on' : 'off';
			$localize['stickyBottom']       = kemet_get_option( 'enable-sticky-bottom' ) ? 'on' : 'off';
			$localize['enableShrink']       = kemet_get_option( 'enable-shrink-main' ) ? 'on' : 'off';
			$localize['enableStickyMobile'] = kemet_get_option( 'enable-sticky-mobile' ) ? 'on' : 'off';
			$shrink_height                  = kemet_get_option( 'main-row-shrink-height' );
			$shrink_height                  = '' !== $shrink_height ? $shrink_height['value'] : '';
			$localize['shrinkHeight']       = $shrink_height;
			$localize['stickyMobileTop']    = kemet_get_option( 'enable-sticky-mobile-top' ) ? 'on' : 'off';
			$localize['stickyMobileMain']   = kemet_get_option( 'enable-sticky-mobile-main' ) ? 'on' : 'off';
			$localize['stickyMobileBottom'] = kemet_get_option( 'enable-sticky-mobile-bottom' ) ? 'on' : 'off';
			$localize['enableMobileShrink'] = kemet_get_option( 'enable-shrink-main-mobile' ) ? 'on' : 'off';
			$mobile_shrink_height           = kemet_get_option( 'mobile-main-row-shrink-height' );
			$mobile_shrink_height           = '' !== $mobile_shrink_height ? $mobile_shrink_height['value'] : '';
			$localize['shrinkMobileHeight'] = $mobile_shrink_height;
			return $localize;
		}

		/**
		 * Add assets in theme
		 *
		 * @param array $assets list of theme assets (JS & CSS).
		 * @return array List of updated assets.
		 */
		public function add_styles( $assets ) {
			if ( self::enable_sticky() ) {
				$assets['js']['sticky-header'] = 'sticky-header';
			}

			return $assets;
		}

		/**
		 * add_js
		 */
		public function add_js() {
			$js_prefix = '.min.js';
			$dir       = 'minified';
			if ( SCRIPT_DEBUG ) {
				$js_prefix = '.js';
				$dir       = 'unminified';
			}

			if ( self::enable_sticky() ) {
				Kemet_Style_Generator::kmt_add_js( KEMET_THEME_URI . 'assets/js/' . $dir . '/sticky-header' . $js_prefix );
			}

		}
	}
}
Kemet_Sticky_Header_Partials::get_instance();
