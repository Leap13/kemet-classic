<?php
/**
 * Page Title Section
 *
 * @package Kemet
 */

if ( ! class_exists( 'Kemet_Page_Title_Partials' ) ) {

	/**
	 * Page Title Section
	 *
	 * @since 1.0.0
	 */
	class Kemet_Page_Title_Partials {

		/**
		 * Member Variable
		 *
		 * @var object instance
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
		 *  Constructor
		 */
		public function __construct() {
			add_filter( 'kemet_title_bar_disable', '__return_false' );
			add_filter( 'woocommerce_show_page_title', '__return_false' );
			add_action( 'kemet_after_header_block', array( $this, 'kemet_page_title_markup' ), 9 );
			add_action( 'kemet_before_header_block', array( $this, 'header_merged_with_title' ) );
			add_filter( 'kemet_the_title_enabled', array( $this, 'page_title_display' ) );
			add_filter( 'kemet_disable_breadcrumbs', array( $this, 'breadcrumbs_display' ) );
		}

		/**
		 * Get current page title
		 *
		 * @return string page title
		 */
		public function kemet_get_current_page_title() {
			$title = '';
			if ( is_author() ) {
				$title = get_the_author();
			} elseif ( is_category() || ( class_exists( 'Woocommerce' ) && is_product_category() ) ) {
				$title = single_cat_title();
			} elseif ( is_tag() ) {
				$title = single_tag_title();
			} else {
				$title = kemet_get_the_title();
			}

			return $title;
		}

		/**
		 * Page title markup
		 *
		 * @return void
		 */
		public function kemet_page_title_markup() {
			$page_title_layout = apply_filters( 'kemet_the_page_title_layout', kemet_get_option( 'page-title-layouts' ) );
			if ( 'disable' != $page_title_layout ) {
				if ( 'page-title-layout-2' !== $page_title_layout ) {
					get_template_part( 'templates/page-title/' . esc_attr( $page_title_layout ) );
				} else {
					get_template_part( 'templates/page-title/page-title-layout-1' );
				}
			}
			$header_merged_title = kemet_get_option( 'merge-with-header' );
			if ( '1' == $header_merged_title && 'disable' != $page_title_layout ) {
				echo '</div>';
			}
		}

		/**
		 * Page title display
		 *
		 * @param boolean $default default value.
		 * @return boolean
		 */
		public function page_title_display( $default ) {
			if ( is_page() ) {
				$default = false;
			}
			return $default;
		}

		/**
		 * Merge page title with main header
		 *
		 * @return void
		 */
		public function header_merged_with_title() {
			$page_title_layout   = apply_filters( 'kemet_the_page_title_layout', kemet_get_option( 'page-title-layouts' ) );
			$header_merged_title = kemet_get_option( 'merge-with-header' );

			if ( '1' == $header_merged_title && 'disable' != $page_title_layout ) {
				$combined = 'kemet-merged-header-title';
				printf(
					'<div class="%1$s">',
					esc_attr( $combined )
				);
			}

		}

		/**
		 * Display breadcrumbs
		 *
		 * @param boolean $default default value.
		 * @return boolean
		 */
		public function breadcrumbs_display( $default ) {
			$display = true;

			if ( ( is_archive() ) && kemet_get_option( 'disable-breadcrumbs-in-archive' ) ) {
				$display = false;
			}

			if ( is_page() && kemet_get_option( 'disable-breadcrumbs-in-single-page' ) ) {
				$display = false;
			}

			if ( is_single() && kemet_get_option( 'disable-breadcrumbs-in-single-post' ) ) {
				$display = false;
			}

			if ( is_404() && kemet_get_option( 'disable-breadcrumbs-in-404-page' ) ) {
				$display = false;
			}

			return $display;
		}
	}
}
Kemet_Page_Title_Partials::get_instance();
