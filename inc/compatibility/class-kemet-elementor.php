<?php
/**
 * Elementor Compatibility File.
 *
 * @package Kemet
 */

namespace Elementor; // phpcs:ignore

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
	 * @since 1.0.5
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
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp', array( $this, 'elementor_default_setting' ), 20 );
			add_action( 'elementor/preview/init', array( $this, 'elementor_default_setting' ) );
			add_action( 'elementor/preview/enqueue_styles', array( $this, 'elementor_overlay_zindex' ) );
			add_action( 'rest_request_after_callbacks', array( $this, 'theme_color_support' ), 999, 3 );
			add_filter( 'kemet_theme_dynamic_css', array( $this, 'dynamic_css' ) );
		}

		public function dynamic_css( $dynamic_css ) {
			$btn_border_size    = kemet_get_option( 'btn-border-size' );
			$btn_border_color   = kemet_get_sub_option( 'btn-border-color', 'initial' );
			$btn_border_h_color = kemet_get_sub_option( 'btn-border-color', 'hover' );
			$btn_effect         = kemet_get_option( 'button-effect' );
			$btn_hover_effect   = kemet_get_option( 'button-hover-effect' );
			$btn_padding        = kemet_get_option( 'button-spacing' );
			$btn_border_radius  = kemet_get_option( 'button-radius' );

			$css_content = array(
				'.elementor-button-wrapper .elementor-button' => array(
					'--borderHoverColor' => esc_attr( $btn_border_h_color ),
					'--borderRadius'     => kemet_responsive_spacing( $btn_border_radius, 'all', 'desktop' ),
					'--borderStyle'      => 'solid',
					'--borderColor'      => esc_attr( $btn_border_color ),
					'--borderWidth'      => kemet_spacing( $btn_border_size, 'all' ),
					'--padding-top'      => kemet_responsive_spacing( $btn_padding, 'top', 'desktop' ),
					'--padding-left'     => kemet_responsive_spacing( $btn_padding, 'left', 'desktop' ),
					'--padding-bottom'   => kemet_responsive_spacing( $btn_padding, 'bottom', 'desktop' ),
					'--padding-right'    => kemet_responsive_spacing( $btn_padding, 'right', 'desktop' ),
					'--buttonShadow'     => $btn_effect ? '2px 2px 10px -3px var(--buttonBackgroundColor)' : 'none',
				),
				'.elementor-button-wrapper .elementor-button:hover' => array(
					'box-shadow'     => 'var(--buttonShadow)',
					'--buttonShadow' => $btn_hover_effect ? '2px 2px 10px -3px var(--buttonBackgroundHoverColor,var(--buttonBackgroundColor))' : 'none',
				),
				':root' => array(
					'--e-global-color-kemet_color1' => 'var(--paletteColor1)',
					'--e-global-color-kemet_color2' => 'var(--paletteColor2)',
					'--e-global-color-kemet_color3' => 'var(--paletteColor3)',
					'--e-global-color-kemet_color4' => 'var(--paletteColor4)',
					'--e-global-color-kemet_color5' => 'var(--paletteColor5)',
					'--e-global-color-kemet_color6' => 'var(--paletteColor6)',
					'--e-global-color-kemet_color7' => 'var(--paletteColor7)',
				),
			);

			$parse_css = kemet_parse_css( $css_content );

			$tablet = array(
				'.elementor-button-wrapper .elementor-button' => array(
					'--borderRadius'   => kemet_responsive_spacing( $btn_border_radius, 'all', 'tablet' ),
					'--padding-top'    => kemet_responsive_spacing( $btn_padding, 'top', 'tablet' ),
					'--padding-left'   => kemet_responsive_spacing( $btn_padding, 'left', 'tablet' ),
					'--padding-bottom' => kemet_responsive_spacing( $btn_padding, 'bottom', 'tablet' ),
					'--padding-right'  => kemet_responsive_spacing( $btn_padding, 'right', 'tablet' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $tablet, '', '768' );

			$mobile = array(
				'.elementor-button-wrapper .elementor-button' => array(
					'--borderRadius'   => kemet_responsive_spacing( $btn_border_radius, 'all', 'mobile' ),
					'--padding-top'    => kemet_responsive_spacing( $btn_padding, 'top', 'mobile' ),
					'--padding-left'   => kemet_responsive_spacing( $btn_padding, 'left', 'mobile' ),
					'--padding-bottom' => kemet_responsive_spacing( $btn_padding, 'bottom', 'mobile' ),
					'--padding-right'  => kemet_responsive_spacing( $btn_padding, 'right', 'mobile' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= kemet_parse_css( $mobile, '', '544' );

			$parse_css .= \Kemet_Dynamic_Css_Generator::typography_css( 'buttons', '.elementor-button-wrapper .elementor-button' );

			return $dynamic_css . $parse_css;
		}

		public function theme_color_support( $response, $handler, $request ) {
			$route   = $request->get_route();
			$rest_id = substr( $route, strrpos( $route, '/' ) + 1 );

			$color_pallets = array(
				'kemet_color1' => array(
					'id'    => 'kemet_color1',
					'title' => __( 'Theme Color Palette 1', 'kemet' ),
					'value' => 'var(--paletteColor1)',
				),
				'kemet_color2' => array(
					'id'    => 'kemet_color2',
					'title' => __( 'Theme Color Palette 2', 'kemet' ),
					'value' => 'var(--paletteColor2)',
				),
				'kemet_color3' => array(
					'id'    => 'kemet_color3',
					'title' => __( 'Theme Color Palette 3', 'kemet' ),
					'value' => 'var(--paletteColor3)',
				),
				'kemet_color4' => array(
					'id'    => 'kemet_color4',
					'title' => __( 'Theme Color Palette 4', 'kemet' ),
					'value' => 'var(--paletteColor4)',
				),
				'kemet_color5' => array(
					'id'    => 'kemet_color5',
					'title' => __( 'Theme Color Palette 5', 'kemet' ),
					'value' => 'var(--paletteColor5)',
				),
				'kemet_color6' => array(
					'id'    => 'kemet_color6',
					'title' => __( 'Theme Color Palette 6', 'kemet' ),
					'value' => 'var(--paletteColor6)',
				),
				'kemet_color7' => array(
					'id'    => 'kemet_color7',
					'title' => __( 'Theme Color Palette 7', 'kemet' ),
					'value' => 'var(--paletteColor7)',
				),
			);

			if ( isset( $color_pallets[ $rest_id ] ) ) {
				return new \WP_REST_Response( $color_pallets[ $rest_id ] );
			}

			if ( '/elementor/v1/globals' === $route ) {
				$data         = $response->get_data();
				$color_pallet = kemet_get_option( 'colorPalette' );
				foreach ( $color_pallets as $key => $value ) {
					$color_key      = str_replace( 'kemet_', '', $key );
					$value['value'] = $color_pallet[ $color_key ];

					$data['colors'][ $key ] = $value;
				}
				$response->set_data( $data );
			}

			return $response;
		}

		/**
		 * Elementor Default content layout
		 *
		 * @return mixed
		 */
		public function elementor_default_setting() {

			if ( false == kemet_enable_page_builder() || 'post' == get_post_type() ) {
				return;
			}

			// don't modify post meta settings if we are not on Elementor's edit page.
			if ( ! $this->is_elementor_editor() ) {
				return;
			}

			global $post;
			$id = kemet_get_post_id();

			if ( isset( $post ) && ( is_admin() || is_singular() ) ) {

				if ( $this->is_elementor_activated( $id ) ) {
					kemet_update_meta( 'kemet_meta', 'content-layout', 'page-builder' );
					add_filter( 'kemet_get_content_layout', array( $this, 'elementor_default_content_layout' ) );
				}
			}
		}

		/**
		 * Beaver Builder default content layout
		 *
		 * @param string $layout page layout.
		 * @return string
		 */
		public function elementor_default_content_layout( $layout ) {
			return 'page-builder';
		}

		/**
		 * Elementor css
		 *
		 * @return mixed
		 */
		public function elementor_overlay_zindex() {

			// return if we are not on Elementor's edit page.
			if ( ! $this->is_elementor_editor() ) {
				return;
			}

			?>
			<style type="text/css" id="kmt-elementor-overlay-css">
				.elementor-editor-active .elementor-element > .elementor-element-overlay {
					z-index: 9999;
				}
			</style>

			<?php
		}

		/**
		 * Check if page build with elementor
		 *
		 * @param integer $id page id.
		 * @return boolean
		 */
		public function is_elementor_activated( $id ) {

			if ( version_compare( ELEMENTOR_VERSION, '1.5.0', '<' ) ) {

				return ( 'builder' === Plugin::$instance->db->get_edit_mode( $id ) );
			} else {

				return Plugin::$instance->db->is_built_with_elementor( $id );
			}
		}

		/**
		 * Check if page edit with elementor
		 *
		 * @return boolean
		 */
		private function is_elementor_editor() {
			if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
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
