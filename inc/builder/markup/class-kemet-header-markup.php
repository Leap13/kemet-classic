<?php
/**
 * Kemet Header Markup
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Header_Markup' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Header_Markup {
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
			add_action( 'kemet_sitehead', array( $this, 'desktop_header' ) );
			add_action( 'kemet_main_header', array( $this, 'main_header' ) );
			add_action( 'kemet_render_header_column', array( $this, 'render_column' ), 10, 2 );
		}

		/**
		 * Function to get site Header
		 */
		public function header_markup() {
			do_action( 'kemet_header' );
		}

		/**
		 * Header
		 */
		public function desktop_header() {
			get_template_part( 'templates/header/header-desktop-layout' );
		}

		/**
		 * Main Header
		 */
		public function main_header() {
			set_query_var( 'row', 'main' );
			get_template_part(
				'templates/header/header',
				'row',
				array(
					'row' => 'main',
				)
			);
		}

		/**
		 * Render Builder Colunm
		 *
		 * @param string $column column.
		 * @param string $row row.
		 */
		public function render_column( $column, $row ) {
			if ( Kemet_Builder_Helper::column_has_items( $column, $row, 'header', 'desktop' ) ) {
				self::render_column_content( $column, $row, 'header', 'desktop' );
			}
		}

		/**
		 * Get Column Content
		 *
		 * @param string $column column.
		 * @param string $row row.
		 * @param string $builder builder type.
		 * @param string $device device.
		 */
		public static function render_column_content( $column, $row, $builder = 'header', $device = 'desktop' ) {
			$items = kemet_get_option( $builder . '-' . $device . '-items' );
			foreach ( $items[ $row ][ $row . '_' . $column ] as $key => $item ) {
				get_template_part(
					'templates/' . $builder . '/components',
					'',
					array(
						'item' => $item,
					)
				);
			}
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Header_Markup::get_instance();
endif;
