<?php
/**
 * Kemet Theme Meta
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Meta Loader
 */
if ( ! class_exists( 'Kemet_Meta_Partials' ) ) {

	/**
	 * Meta Loader
	 */
	class Kemet_Meta_Partials {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
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
			add_action( 'wp', array( $this, 'meta_options_hooks' ) );
			add_action( 'load-post.php', array( $this, 'meta_options_hooks' ) );
		}

		/**
		 * Metabox Hooks
		 */
		public function meta_options_hooks() {

			if ( is_singular() || isset( $_GET['post'] ) ) {
				add_filter( 'kemet_content_padding', array( $this, 'content_padding' ) );
				add_filter( 'kemet_featured_image_enabled', array( $this, 'featured_img' ) );
				add_filter( 'kemet_display_header', array( $this, 'display_header' ) );
				add_filter( 'kemet_display_footer', array( $this, 'display_footer' ) );
				add_filter( 'kemet_enable_overlay_header', array( $this, 'overlay_header' ) );
				add_filter( 'kemet_the_page_title_layout', array( $this, 'post_title' ) );
				add_filter( 'kemet_disable_breadcrumbs', array( $this, 'disable_breadcrumbs' ) );
				add_filter( 'kemet_sub_title', array( $this, 'post_sub_title' ) );
				add_filter( 'sub_title_color', array( $this, 'post_sub_title_color' ) );
				add_filter( 'kemet_site_layout_outside_bg', array( $this, 'page_background' ) );
				add_filter( 'kemet_site_boxed_inner_bg', array( $this, 'page_boxed_background' ) );
			}

		}

		/**
		 * page_background
		 *
		 * @param  mixed $default
		 * @return void
		 */
		public function page_background( $default ) {
			$background = kemet_get_meta( 'kemet_meta', 'background' );

			if ( $background ) {
				return $background;
			}

			return $default;
		}

		/**
		 * page_boxed_background
		 *
		 * @param  mixed $default
		 * @return void
		 */
		public function page_boxed_background( $default ) {
			$background = kemet_get_meta( 'kemet_meta', 'boxed-background' );

			if ( $background ) {
				return $background;
			}

			return $default;
		}

		/**
		 * Post / Page SubTitle
		 *
		 * @return string
		 */
		public function post_sub_title() {
			$sub_title = kemet_get_meta( 'kemet_meta', 'sub-title' );

			return $sub_title;
		}

		/**
		 * Post / Page SubTitle Color
		 *
		 * @param string $default default color.
		 * @return string
		 */
		public function post_sub_title_color( $default ) {
			$sub_title_color = kemet_get_meta( 'kemet_meta', 'sub-title-color' );
			if ( ! empty( $sub_title_color['initial'] ) ) {
				$default = $sub_title_color['initial'];
			}
			return $default;
		}

		/**
		 * Breadcrumbs Option
		 *
		 * @param boolean $default default value.
		 * @return boolean
		 */
		public function disable_breadcrumbs( $default ) {
			$disable_breadcrumbs = kemet_get_meta( 'kemet_meta', 'disable-breadcrumbs' );

			if ( $disable_breadcrumbs ) {
				$default = false;
			}

			return $default;
		}

		/**
		 * Disable Post / Page Title
		 *
		 * @param string $defaults default layout.
		 * @return string
		 */
		public function post_title( $defaults ) {
			$meta  = kemet_get_meta( 'kemet_meta', 'page-title-layouts' );
			$title = ( $meta && 'default' != $meta ) ? $meta : $defaults;

			return $title;
		}

		/**
		 * Disable Post / Page Header
		 *
		 * @param boolean $defaults default value.
		 * @return boolean
		 */
		public function display_header( $defaults ) {
			$disable_header = kemet_get_meta( 'kemet_meta', 'disable-header' );

			if ( $disable_header ) {
				$defaults = false;
			}

			return $defaults;
		}

		/**
		 * Post / Page Overlay Header
		 *
		 * @param boolean $defaults default value.
		 * @return boolean
		 */
		public function overlay_header( $defaults ) {
			$overlay_header = kemet_get_meta( 'kemet_meta', 'overlay-header' );

			if ( 'enable' === $overlay_header ) {
				return true;
			}

			if ( 'disable' === $overlay_header ) {
				return false;
			}

			return $defaults;
		}

		/**
		 * Disable Post / Page Footer
		 *
		 * @param boolean $defaults default value.
		 * @return boolean
		 */
		public function display_footer( $defaults ) {
			$disable_footer = kemet_get_meta( 'kemet_meta', 'disable-footer' );

			if ( $disable_footer ) {
				$defaults = false;
			}

			return $defaults;
		}

		/**
		 * Content Padding
		 *
		 * @param object $defaults default spacing.
		 * @return object
		 */
		public function content_padding( $defaults ) {
			$padding = kemet_get_meta( 'kemet_meta', 'content-padding' );

			if ( $padding ) {
				$defaults = $padding;
			}

			return $defaults;
		}

		/**
		 * Disable Post / Page Featured Image
		 *
		 * @param boolean $defaults default value.
		 * @return boolean
		 */
		public function featured_img( $defaults ) {
			$featured_img = kemet_get_meta( 'kemet_meta', 'disable-featured-img' );

			if ( $featured_img ) {
				$defaults = false;
			}

			return $defaults;
		}
	}
}
/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Meta_Partials::get_instance();
