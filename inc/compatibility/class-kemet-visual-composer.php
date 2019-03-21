<?php
/**
 * Visual Composer Compatibility File.
 *
 * @package Kemet
 */

// If plugin - 'Visual Composer' not exist then return.
if ( ! class_exists( 'Vc_Manager' ) ) {
	return;
}

/**
 * Kemet Visual Composer Compatibility
 */
if ( ! class_exists( 'Kemet_Visual_Composer' ) ) :

	/**
	 * Kemet Visual Composer Compatibility
	 *
	 * @since 1.0.0
	 */
	class Kemet_Visual_Composer {

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
			add_action( 'wp', array( $this, 'vc_default_setting' ), 20 );
			add_action( 'do_meta_boxes', array( $this, 'vc_default_setting' ), 20 );
			add_action( 'vc_frontend_editor_render', array( $this, 'vc_frontend_default_setting' ) );
		}

		/**
		 * VC Updated meta settings
		 *
		 * @since 1.0.0
		 * @param int $id Post id.
		 * @return void
		 */
		function vc_update_meta_setting( $id ) {

			if ( false == kemet_enable_page_builder_compatibility() || 'post' == get_post_type() ) {
				return;
			}

			update_post_meta( $id, '_kemet_content_layout_flag', 'disabled' );
			update_post_meta( $id, 'site-post-title', 'disabled' );
			update_post_meta( $id, 'kmt-title-bar-display', 'disabled' );
			update_post_meta( $id, 'kmt-featured-img', 'disabled' );

			$content_layout = get_post_meta( $id, 'site-content-layout', true );
			if ( empty( $content_layout ) || 'default' == $content_layout ) {
				update_post_meta( $id, 'site-content-layout', 'plain-container' );
			}

			$sidebar_layout = get_post_meta( $id, 'site-sidebar-layout', true );
			if ( empty( $sidebar_layout ) || 'default' == $sidebar_layout ) {
				update_post_meta( $id, 'site-sidebar-layout', 'no-sidebar' );
			}
		}

		/**
		 * Set frontend default setting.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function vc_frontend_default_setting() {

			global $post;
			$id                = kemet_get_post_id();
			$page_builder_flag = get_post_meta( $id, '_kemet_content_layout_flag', true );

			if ( empty( $page_builder_flag ) ) {
				if ( $id > 0 && empty( $post->post_content ) ) {
					$this->vc_update_meta_setting( $id );
				}
			}
		}

		/**
		 * Set default setting.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function vc_default_setting() {

			global $post;
			$id = kemet_get_post_id();

			$page_builder_flag = get_post_meta( $id, '_kemet_content_layout_flag', true );

			if ( isset( $post ) && empty( $page_builder_flag ) && ( is_admin() || is_singular() ) ) {
				$vc_active = get_post_meta( $id, '_wpb_vc_js_status', true );
				if ( 'true' == $vc_active || has_shortcode( $post->post_content, 'vc_row' ) ) {
					$this->vc_update_meta_setting( $id );
				}
			}
		}
	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Visual_Composer::get_instance();