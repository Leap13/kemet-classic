<?php
/**
 * Kemet Footer Markup
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Footer_Markup' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Footer_Markup {
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
			add_action( 'kemet_footer', array( $this, 'footer_markup' ) );
			add_action( 'kemet_top_footer', array( $this, 'top_footer' ) );
			add_action( 'kemet_main_footer', array( $this, 'main_footer' ) );
			add_action( 'kemet_bottom_footer', array( $this, 'bottom_footer' ) );
			add_action( 'kemet_footer_widget', array( $this, 'widget_markup' ), 10, 1 );
			add_filter( 'customize_section_active', array( $this, 'display_sidebar' ), 99, 2 );
			add_filter( 'customizer_widgets_section_args', array( $this, 'customizer_custom_widget_areas' ), 10, 3 );
			add_filter( 'customize_section_active', array( $this, 'display_sidebar' ), 99, 2 );
			add_action( 'kemet_render_footer_column', array( $this, 'render_column' ), 10, 2 );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		}

		/**
		 * Register widget area.
		 *
		 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function widgets_init() {
			$widget_items = apply_filters( 'kemet_footer_widget_items', array( 'footer-widget-1', 'footer-widget-2', 'footer-widget-3', 'footer-widget-4', 'footer-widget-5', 'footer-widget-6' ) );
			foreach ( $widget_items as $widget ) {
				$num = explode( 'footer-widget-', $widget )[1];
				register_sidebar(
					apply_filters(
						'kemet_header_widgets_' . $num,
						array(
							'name'          => esc_html__( 'Footer Widget ' . $num, 'kemet' ),
							'id'            => $widget,
							'before_widget' => '<div id="%1$s" class="widget %2$s">',
							'after_widget'  => '</div>',
							'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
							'after_title'   => '</h4></div></div>',
						)
					)
				);
			}
		}

		/**
		 * Render Builder Colunm
		 *
		 * @param string $column column.
		 * @param string $row row.
		 */
		public function render_column( $column, $row ) {
			if ( Kemet_Builder_Helper::column_has_items( $column, $row, 'footer' ) ) {
				self::render_column_content( $column, $row, 'footer' );
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
		public static function render_column_content( $column, $row, $builder = 'footer' ) {
			$items = kemet_get_option( $builder . '-items' );
			foreach ( $items[ $row ][ $row . '_' . $column ] as $key => $item ) {
				if ( false !== strpos( $item, 'menu' ) || false !== strpos( $item, 'widget' ) || false !== strpos( $item, 'button' ) ) {
					$type = ( false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'html' ) ) || ( false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'button' ) ) ? explode( '-', str_replace( 'mobile-', '', $item ) )[1] : explode( '-', $item )[1];
					get_template_part( 'templates/' . $builder . '/components/' . $type, 'type', array( 'type' => $item ) );
				} else {
					get_template_part( 'templates/' . $builder . '/components/' . $item );
				}
			}
		}

		/**
		 * Filter footer widget areas.
		 *
		 * @param array  $section_args the widget sections args.
		 * @param string $section_id the widget sections id.
		 * @param string $sidebar_id the widget area id.
		 */
		public function customizer_custom_widget_areas( $section_args, $section_id, $sidebar_id ) {
			if ( strpos( $section_id, 'footer-widget-' ) ) {
				$section_args['panel'] = 'panel-footer-builder-group';
			}
			return $section_args;
		}

		/**
		 * Display sidebar as section.
		 *
		 * @param bool   $active ios active.
		 * @param object $section section.
		 * @return bool
		 */
		public function display_sidebar( $active, $section ) {
			if ( strpos( $section->id, 'footer-widget-' ) ) {
				$active = true;
			}
			return $active;
		}

		/**
		 * Function to get site Footer
		 */
		public function footer_markup() {
			get_template_part( 'templates/footer/footer-layout' );
		}

		/**
		 * Widget
		 *
		 * @param string $widget widget type.
		 */
		public function widget_markup( $widget ) {
			Kemet_Builder_Helper::get_custom_widget( $widget );
		}

		/**
		 * Top Footer
		 */
		public function top_footer() {
			if ( self::is_empty_row( 'top' ) ) {
				return;
			}

			set_query_var( 'row', 'top' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'top',
				)
			);
		}

		/**
		 * Checks to see if the row has any content.
		 *
		 * @param string $row the name of the row.
		 * @return bool
		 */
		public static function is_empty_row( $row = 'main' ) {
			$items = kemet_get_option( 'footer-items' );
			foreach ( array( '1', '2', '3', '4', '5' ) as $column ) {
				if ( isset( $items ) && isset( $items[ $row ] ) && isset( $items[ $row ][ $row . '_' . $column ] ) && is_array( $items[ $row ][ $row . '_' . $column ] ) && ! empty( $items[ $row ][ $row . '_' . $column ] ) ) {
					return false;
				}
			}
			return true;
		}

		/**
		 * Main Footer
		 */
		public function main_footer() {
			if ( self::is_empty_row( 'main' ) ) {
				return;
			}

			set_query_var( 'row', 'main' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'main',
				)
			);
		}

		/**
		 * Bottom Footer
		 */
		public function bottom_footer() {
			if ( self::is_empty_row( 'bottom' ) ) {
				return;
			}

			set_query_var( 'row', 'bottom' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'bottom',
				)
			);
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Footer_Markup::get_instance();
endif;
