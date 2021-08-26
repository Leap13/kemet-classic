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
if ( ! class_exists( 'Kemet_Meta_Settings' ) ) {

	/**
	 * Meta Loader
	 */
	class Kemet_Meta_Settings {

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
			add_action( 'enqueue_block_editor_assets', array( $this, 'script_enqueue' ) );
			add_action( 'init', array( $this, 'register_meta' ), 20 );
		}

		/**
		 * register_meta
		 */
		public function register_meta() {
			$default = array(
				'overlay-header' => 'default',
				'sidebar-layout' => 'default',
				'content-layout' => 'default',
				'disable-header' => false,
				'disable-footer' => false,
			);
			register_post_meta(
				'', // Pass an empty string to register the meta key across all existing post types.
				'kemet_meta',
				array(
					'single'        => true,
					'type'          => 'string',
					'show_in_rest'  => array(
						'schema' => array(
							'type'    => 'string',
							'default' => wp_json_encode( $default ),
						),
					),
					'auth_callback' => '__return_true',
				)
			);
		}

		/**
		 * meta_options
		 *
		 * @return array
		 */
		public static function meta_options() {
			$options = array(
				'overlay-header'       => array(
					'type'    => 'kmt-radio',
					'default' => 'default',
					'label'   => __( 'Overlay Header', 'kemet-addons' ),
					'choices' => array(
						'default' => __( 'Default', 'kemet' ),
						'enable'  => __( 'Enable', 'kemet' ),
						'disable' => __( 'Disable', 'kemet' ),
					),
				),
				'sidebar-layout'       => array(
					'type'    => 'kmt-select',
					'label'   => __( 'Sidebar Layout', 'kemet' ),
					'choices' => array(
						'default'       => __( 'Default', 'kemet-addons' ),
						'no-sidebar'    => __( 'No Sidebar', 'kemet-addons' ),
						'left-sidebar'  => __( 'Left Sidebar', 'kemet-addons' ),
						'right-sidebar' => __( 'Right Sidebar', 'kemet-addons' ),
					),
				),
				'content-layout'       => array(
					'type'    => 'kmt-select',
					'label'   => __( 'Sidebar Layout', 'kemet' ),
					'choices' => array(
						'default'                 => __( 'Default', 'kemet-addons' ),
						'boxed-container'         => __( 'Boxed Layout', 'kemet-addons' ),
						'content-boxed-container' => __( 'Boxed Content', 'kemet-addons' ),
						'plain-container'         => __( 'Full Width Content', 'kemet-addons' ),
						'page-builder'            => __( 'Stretched Content', 'kemet-addons' ),
					),
				),
				'disable-featured-img' => array(
					'type'  => 'kmt-switcher',
					'label' => __( 'Disable Featured Image', 'kemet-addons' ),
				),
				'content-padding'      => array(
					'type'           => 'kmt-spacing',
					'label'          => __( 'Content Padding', 'kemet' ),
					'linked_choices' => true,
					'responsive'     => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'kemet' ),
						'bottom' => __( 'Bottom', 'kemet' ),
					),
				),
				'disable-header'       => array(
					'type'  => 'kmt-switcher',
					'label' => __( 'Disable Header', 'kemet-addons' ),
				),
				'disable-footer'       => array(
					'type'  => 'kmt-switcher',
					'label' => __( 'Disable Footer', 'kemet-addons' ),
				),
			);

			return apply_filters( 'kemet_meta_options', $options );
		}

		/**
		 * Enqueue Script for Meta options
		 */
		public function script_enqueue() {
			if ( is_customize_preview() ) {
				return;
			}
			$post_type        = get_post_type();
			$post_type_object = get_post_type_object( get_post_type() );
			if ( is_object( $post_type_object ) ) {
				$post_type_name = $post_type_object->labels->singular_name;
			} else {
				$post_type_name = $post_type;
			}
			$css_prefix = '.min.css';
			$dir        = 'minified';
			if ( SCRIPT_DEBUG ) {
				$css_prefix = '.css';
				$dir        = 'unminified';
			}

			if ( is_rtl() ) {
				$css_prefix = '-rtl.min.css';
				if ( SCRIPT_DEBUG ) {
					$css_prefix = '-rtl.css';
				}
			}
			wp_enqueue_style( 'kemet-meta', KEMET_THEME_URI . 'inc/customizer/custom-controls/assets/css/' . $dir . '/custom-controls' . $css_prefix, array( 'wp-components' ), KEMET_THEME_VERSION );
			wp_enqueue_script(
				'kemet-meta',
				KEMET_THEME_URI . 'inc/meta/assets/js/build/index.js',
				array(
					'wp-edit-post',
					'wp-i18n',
					'wp-components',
					'wp-element',
					'wp-media-utils',
					'wp-block-editor',
				),
				KEMET_THEME_VERSION,
				true
			);

			wp_localize_script(
				'kemet-meta',
				'KemetMetaData',
				array(
					'post_type'      => $post_type,
					'post_type_name' => $post_type_name,
					'options'        => self::meta_options(),
				)
			);
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Kemet_Meta_Settings::get_instance();
