<?php
/**
 * Elementor Compatibility File.
 *
 * @package Kemet
 */

namespace Elementor;

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) ) {
	return;
}

/**
 * Kemet Elementor Compatibility
 */
if ( ! class_exists( 'Kemet_Elementor' ) ) :

	/**
	 * Kemet Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class Kemet_Elementor {

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
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp', array( $this, 'elementor_default_setting' ), 20 );
			add_action( 'elementor/preview/init', array( $this, 'elementor_default_setting' ) );
		}

		/**
		 * Elementor Content layout set as Page Builder
		 *
		 * @return void
		 */
		function elementor_default_setting() {

			if ( false == kemet_enable_page_builder_compatibility() || 'post' == get_post_type() ) {
				return;
			}

			// don't modify post meta settings if we are not on Elementor's edit page.
			if ( ! $this->is_elementor_editor() ) {
				return;
			}

			global $post;
			$id = kemet_get_post_id();

			
			$page_builder_flag = get_post_meta( $id, '_kemet_content_layout_flag', true );
			if ( isset( $post ) && empty( $page_builder_flag ) && ( is_admin() || is_singular() ) ) {

				if ( empty( $post->post_content ) && $this->is_elementor_activated( $id ) ) {

					update_post_meta( $id, '_kemet_content_layout_flag', 'disabled' );
					update_post_meta( $id, 'site-post-title', 'disabled' );
					update_post_meta( $id, 'kmt-title-bar-display', 'disabled' );
					update_post_meta( $id, 'kmt-featured-img', 'disabled' );

					$content_layout = get_post_meta( $id, 'site-content-layout', true );
					if ( empty( $content_layout ) || 'default' == $content_layout ) {
						update_post_meta( $id, 'site-content-layout', 'page-builder' );
					}

					$sidebar_layout = get_post_meta( $id, 'site-sidebar-layout', true );
					if ( empty( $sidebar_layout ) || 'default' == $sidebar_layout ) {
						update_post_meta( $id, 'site-sidebar-layout', 'no-sidebar' );
					}

					// In the preview mode, Apply the layouts using filters for Elementor Template Library.
					add_filter(
						'kemet_layout', function() {
							return 'no-sidebar';
						}
					);

					add_filter(
						'kemet_get_content_layout', function () {
							return 'page-builder';
						}
					);
				}
			}
		}

		/**
		 * Check is elementor activated.
		 *
		 * @param int $id Post/Page Id.
		 * @return boolean
		 */
		function is_elementor_activated( $id ) {
			if ( version_compare( ELEMENTOR_VERSION, '1.5.0', '<' ) ) {
				return ( 'builder' === Plugin::$instance->db->get_edit_mode( $id ) );
			} else {
				return Plugin::$instance->db->is_built_with_elementor( $id );
			}
		}

		/**
		 * Check if Elementor Editor is open.
		 *
		 * @return boolean True IF Elementor Editor is loaded, False If Elementor Editor is not loaded.
		 */
		private function is_elementor_editor() {
			if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
				isset( $_REQUEST['elementor-preview'] )
			) {
				return true;
			}

			return false;
		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Elementor::get_instance();
