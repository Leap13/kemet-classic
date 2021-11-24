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
			register_post_meta(
				'', // Pass an empty string to register the meta key across all existing post types.
				'kemet_meta',
				array(
					'single'        => true,
					'type'          => 'string',
					'show_in_rest'  => true,
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
				'page-settings-title'         => array(
					'type'  => 'kmt-title',
					'label' => __( 'Page Settings', 'kemet' ),
				),
				'sidebar-layout'              => array(
					'type'    => 'kmt-select',
					'default' => 'default',
					'label'   => __( 'Sidebar Layout', 'kemet' ),
					'choices' => array(
						'default'       => __( 'Default', 'kemet' ),
						'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
						'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
						'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
					),
				),
				'content-layout'              => array(
					'type'    => 'kmt-select',
					'default' => 'default',
					'label'   => __( 'Page Layout', 'kemet' ),
					'choices' => array(
						'default'                 => __( 'Default', 'kemet' ),
						'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
						'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
						'plain-container'         => __( 'Full Width Content', 'kemet' ),
						'page-builder'            => __( 'Stretched Content', 'kemet' ),
					),
				),
				'background'                  => array(
					'type'       => 'kmt-background',
					'responsive' => true,
					'label'      => __( 'Page Background', 'kemet' ),
				),
				'boxed-background'            => array(
					'type'       => 'kmt-background',
					'responsive' => true,
					'label'      => __( 'Page Boxed Background', 'kemet' ),
					'context'    => array(
						array(
							'setting'  => 'content-layout',
							'operator' => 'in_array',
							'value'    => array( 'boxed-container', 'content-boxed-container' ),
						),
					),
				),
				'content-padding'             => array(
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
				'pagetitle-settings-title'    => array(
					'type'  => 'kmt-title',
					'label' => __( 'Page Title Settings', 'kemet' ),
				),
				'page-title-layouts'          => array(
					'label'   => __( 'Page Title Layouts', 'kemet' ),
					'type'    => 'kmt-radio-image',
					'choices' => array(
						'default'             => array(
							'label' => __( 'Default', 'kemet' ),
							'path'  => KEMET_THEME_URI . '/assets/images/default-page-title.png',
						),
						'disable'             => array(
							'label' => __( 'Disable', 'kemet' ),
							'path'  => KEMET_THEME_URI . '/assets/images/disable-page-title.png',
						),
						'page-title-layout-1' => array(
							'label' => __( 'Page Title Layout 1', 'kemet' ),
							'path'  => KEMET_THEME_URI . '/assets/images/page-title-layout-01.png',
						),
						'page-title-layout-2' => array(
							'label' => __( 'Page Title Layout 2', 'kemet' ),
							'path'  => KEMET_THEME_URI . '/assets/images/page-title-layout-02.png',
						),
						'page-title-layout-3' => array(
							'label' => __( 'Page Title Layout 3', 'kemet' ),
							'path'  => KEMET_THEME_URI . '/assets/images/page-title-layout-03.png',
						),
					),
				),
				'sub-title'                   => array(
					'type'  => 'kmt-text',
					'label' => __( 'Subtitle', 'kemet' ),
				),
				'sub-title-color'             => array(
					'type'    => 'kmt-color',
					'label'   => __( 'Subtitle color', 'kemet' ),
					'pickers' => array(
						array(
							'id'    => 'initial',
							'title' => __( 'Initial', 'kemet' ),
						),
					),
				),
				'disable-breadcrumbs'         => array(
					'type'  => 'kmt-switcher',
					'label' => __( 'Disable Breadcrumbs', 'kemet' ),
				),
				'page-elements-title'         => array(
					'type'  => 'kmt-title',
					'label' => __( 'Page Elements', 'kemet' ),
				),
				'overlay-header'              => array(
					'type'    => 'kmt-radio',
					'default' => 'default',
					'label'   => __( 'Overlay Header', 'kemet' ),
					'choices' => array(
						'default' => __( 'Default', 'kemet' ),
						'enable'  => __( 'Enable', 'kemet' ),
						'disable' => __( 'Disable', 'kemet' ),
					),
				),
				'sticky-header'               => array(
					'type'    => 'kmt-radio',
					'default' => 'default',
					'label'   => __( 'Sticky Header', 'kemet' ),
					'choices' => array(
						'default' => __( 'Default', 'kemet' ),
						'enable'  => __( 'Enable', 'kemet' ),
						'disable' => __( 'Disable', 'kemet' ),
					),
				),
				'enable-sticky-top-header'    => array(
					'type'    => 'kmt-switcher',
					'default' => false,
					'label'   => __( 'Stick Top Header', 'kemet' ),
					'context' => array(
						array(
							'setting' => 'sticky-header',
							'value'   => 'enable',
						),
					),
				),
				'disable-sticky-main-header'  => array(
					'type'    => 'kmt-switcher',
					'default' => false,
					'label'   => __( 'Disable Main Header', 'kemet' ),
					'context' => array(
						array(
							'setting' => 'sticky-header',
							'value'   => 'enable',
						),
					),
				),
				'enable-sticky-bottom-header' => array(
					'type'    => 'kmt-switcher',
					'default' => false,
					'label'   => __( 'Stick Bottom Header', 'kemet' ),
					'context' => array(
						array(
							'setting' => 'sticky-header',
							'value'   => 'enable',
						),
					),
				),
				'readymade-headers-desktop'   => array(
					'label'     => __( 'Readymade Desktop Headers', 'kemet' ),
					'type'      => 'kmt-readymade-headers',
					'ref'       => 'header-desktop-items',
					'transport' => 'postMessage',
				),
				'readymade-headers-mobile'    => array(
					'label'     => __( 'Readymade Mobile Headers', 'kemet' ),
					'type'      => 'kmt-readymade-headers',
					'ref'       => 'header-mobile-items',
					'transport' => 'postMessage',
				),
				'disable-header'              => array(
					'type'    => 'kmt-switcher',
					'default' => false,
					'label'   => __( 'Disable Header', 'kemet' ),
				),
				'disable-footer'              => array(
					'type'    => 'kmt-switcher',
					'default' => false,
					'label'   => __( 'Disable Footer', 'kemet' ),
				),
				'disable-featured-img'        => array(
					'type'  => 'kmt-switcher',
					'label' => __( 'Disable Featured Image', 'kemet' ),
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
