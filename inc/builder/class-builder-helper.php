<?php
/**
 * Kemet Builder Helper
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Builder_Helper' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Builder_Helper {

		/**
		 *  No. Of. Footer Columns.
		 *
		 * @var int
		 */
		public static $num_of_footer_columns;

		/**
		 * Footer Row layout
		 *
		 * @var array
		 */
		public static $footer_row_layouts;

		/**
		 * Member Variable
		 *
		 * @var grid_size_mapping
		 */
		public static $grid_size_mapping = array(
			'6-equal'    => 'repeat( 6, 1fr )',
			'5-equal'    => 'repeat( 5, 1fr )',
			'4-equal'    => 'repeat( 4, 1fr )',
			'4-lheavy'   => '2fr 1fr 1fr 1fr',
			'4-rheavy'   => '1fr 1fr 1fr 2fr',
			'3-equal'    => 'repeat( 3, 1fr )',
			'3-lheavy'   => '2fr 1fr 1fr',
			'3-rheavy'   => '1fr 1fr 2fr',
			'3-cheavy'   => '1fr 2fr 1fr',
			'3-cwide'    => '1fr 3fr 1fr',
			'3-firstrow' => '1fr 1fr',
			'3-lastrow'  => '1fr 1fr',
			'2-equal'    => 'repeat( 2, 1fr )',
			'2-lheavy'   => '2fr 1fr',
			'2-rheavy'   => '1fr 2fr',
			'2-full'     => '2fr',
			'full'       => '1fr',
		);

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
			self::$num_of_footer_columns = apply_filters( 'kemet_footer_column_count', 6 );

			self::$footer_row_layouts = apply_filters(
			'kemet_footer_row_layout',
			array(
				'desktop'    => array(
					'6' => array(
						'6-equal' => array(
							'icon' => 'sixcol',
						),
					),
					'5' => array(
						'5-equal' => array(
							'icon' => 'fivecol',
						),
					),
					'4' => array(
						'4-equal'  => array(
							'icon' => 'fourcol',
						),
						'4-lheavy' => array(
							'icon' => 'lfourforty',
						),
						'4-rheavy' => array(
							'icon' => 'rfourforty',
						),
					),
					'3' => array(
						'3-equal'  => array(
							'icon' => 'threecol',
						),
						'3-lheavy' => array(
							'icon' => 'lefthalf',
						),
						'3-rheavy' => array(
							'icon' => 'righthalf',
						),
						'3-cheavy' => array(
							'icon' => 'centerhalf',
						),
						'3-cwide'  => array(
							'icon' => 'widecenter',
						),
					),
					'2' => array(
						'2-equal'  => array(
							'icon' => 'twocol',
						),
						'2-lheavy' => array(
							'icon' => 'twoleftgolden',
						),
						'2-rheavy' => array(
							'icon' => 'tworightgolden',
						),
					),
					'1' => array(
						'full' => array(
							'icon' => 'row',
						),
					),
				),
				'tablet'     => array(
					'6' => array(
						'6-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'sixcol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowsix',
						),
					),
					'5' => array(
						'5-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'fivecol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowfive',
						),
					),
					'4' => array(
						'4-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'fourcol',
						),
						'2-equal' => array(
							'tooltip' => __( 'Two Column Grid', 'kemet' ),
							'icon'    => 'grid',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowfour',
						),
					),
					'3' => array(
						'3-equal'    => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'threecol',
						),
						'3-lheavy'   => array(
							'tooltip' => __( 'Left Heavy 50/25/25', 'kemet' ),
							'icon'    => 'lefthalf',
						),
						'3-rheavy'   => array(
							'tooltip' => __( 'Right Heavy 25/25/50', 'kemet' ),
							'icon'    => 'righthalf',
						),
						'3-cheavy'   => array(
							'tooltip' => __( 'Center Heavy 25/50/25', 'kemet' ),
							'icon'    => 'centerhalf',
						),
						'3-cwide'    => array(
							'tooltip' => __( 'Wide Center 20/60/20', 'kemet' ),
							'icon'    => 'widecenter',
						),
						'3-firstrow' => array(
							'tooltip' => __( 'First Row, Next Columns 100 - 50/50', 'kemet' ),
							'icon'    => 'firstrow',
						),
						'3-lastrow'  => array(
							'tooltip' => __( 'Last Row, Previous Columns 50/50 - 100', 'kemet' ),
							'icon'    => 'lastrow',
						),
						'full'       => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowthree',
						),
					),
					'2' => array(
						'2-equal'  => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'twocol',
						),
						'2-lheavy' => array(
							'tooltip' => __( 'Left Heavy 66/33', 'kemet' ),
							'icon'    => 'twoleftgolden',
						),
						'2-rheavy' => array(
							'tooltip' => __( 'Right Heavy 33/66', 'kemet' ),
							'icon'    => 'tworightgolden',
						),
						'full'     => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserow',
						),
					),
					'1' => array(
						'full' => array(
							'tooltip' => __( 'Single Row', 'kemet' ),
							'icon'    => 'row',
						),
					),
				),
				'mobile'     => array(
					'6' => array(
						'6-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'sixcol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowsix',
						),
					),
					'5' => array(
						'5-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'fivecol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowfive',
						),
					),
					'4' => array(
						'4-equal' => array(
							'icon' => 'fourcol',
						),
						'2-equal' => array(
							'icon' => 'grid',
						),
						'full'    => array(
							'icon' => 'collapserowfour',
						),
					),
					'3' => array(
						'3-equal'    => array(
							'icon' => 'threecol',
						),
						'3-lheavy'   => array(
							'icon' => 'lefthalf',
						),
						'3-rheavy'   => array(
							'icon' => 'righthalf',
						),
						'3-cheavy'   => array(
							'icon' => 'centerhalf',
						),
						'3-cwide'    => array(
							'icon' => 'widecenter',
						),
						'3-firstrow' => array(
							'icon' => 'firstrow',
						),
						'3-lastrow'  => array(
							'icon' => 'lastrow',
						),
						'full'       => array(
							'icon' => 'collapserowthree',
						),
					),
					'2' => array(
						'2-equal'  => array(
							'icon' => 'twocol',
						),
						'2-lheavy' => array(
							'icon' => 'twoleftgolden',
						),
						'2-rheavy' => array(
							'icon' => 'tworightgolden',
						),
						'full'     => array(
							'icon' => 'collapserow',
						),
					),
					'1' => array(
						'full' => array(
							'icon' => 'row',
						),
					),
				),
				'responsive' => true,
			)
		);



		}

		/**
		 * Check if column has items
		 *
		 * @param string $column column.
		 * @param string $row row.
		 * @param string $builder builder type.
		 * @param string $device device.
		 * @return boolean
		 */
		public static function column_has_items( $column, $row, $builder = 'header', $device = 'desktop' ) {
			$items = kemet_get_option( $builder . '-' . $device . '-items' );

			if ( isset( $items ) && isset( $items[ $row ] ) && isset( $items[ $row ][ $row . '_' . $column ] ) && is_array( $items[ $row ][ $row . '_' . $column ] ) && ! empty( $items[ $row ][ $row . '_' . $column ] ) ) {
				return true;
			}
			return false;
		}

		/**
		 * Row Empty
		 *
		 * @param string $row row.
		 * @param string $builder builder type.
		 * @param string $device device.
		 * @return boolean
		 */
		public static function is_row_empty( $row, $builder, $device ) {
			$items  = kemet_get_option( $builder . '-' . $device . '-items' );
			$result = false;

			if ( isset( $items ) && isset( $items[ $row ] ) ) {

				foreach ( $items[ $row ] as $column => $c_items ) {
					if ( isset( $items[ $row ][ $column ] ) && is_array( $items[ $row ][ $column ] ) && ! empty( $items[ $row ][ $column ] ) ) {
						error_log( wp_json_encode( $items[ $row ][ $column ] ) );
						$result = true;
					}
				}
			}

			return $result || is_customize_preview();
		}
		/**
		 * Check if builder item loaded
		 *
		 * @param string $item item type.
		 * @param string $builder builder.
		 * @param string $device device.
		 * @return boolean
		 */
		public static function is_item_loaded( $item, $builder = 'header', $device = 'all' ) {
			$items         = array();
			$current_items = array();

			if ( 'header' == $builder ) {
				$items['desktop'] = kemet_get_option( 'header-desktop-items', array() );
				$items['mobile']  = kemet_get_option( 'header-mobile-items', array() );
				foreach ( $items as $d_items => $rows ) {
					$loaded_items = array();
					foreach ( $rows as $row => $columns ) {

						if ( is_array( $columns ) && ! empty( $columns ) ) {
							$loaded_items = array_merge( $loaded_items, array_values( $columns ) );
						}
					}

					$current_items[ $d_items ] = ! empty( $loaded_items ) ? call_user_func_array( 'array_merge', $loaded_items ) : array();
				}
			}
			switch ( $device ) {
				case 'all':
					$current_items = 'header' == $builder ? array_unique( array_merge( $current_items['desktop'], $current_items['mobile'] ) ) : $items;
					break;

				default:
					$current_items = array_unique( $current_items[ $device ] );
					break;
			}

			if ( in_array( $item, $current_items, true ) ) {
				return true;
			}

			return false || is_customize_preview();
		}

		/**
		 * Get Widget
		 *
		 * @param string $widget_id
		 * @return string
		 */
		public static function get_custom_widget( $widget_id = '' ) {
			ob_start();
			echo '<div class="kmt-widget-area kmt-' . esc_attr( $widget_id ) . '-area">';
			kemet_get_sidebar( $widget_id );
			echo '</div>';
			echo ob_get_clean();
		}

		/**
		 * Get custom HTML added by user.
		 *
		 * @param  string $option_name Option name.
		 * @return String TEXT/HTML added by user in options panel.
		 */
		public static function kemet_get_custom_html( $option_name = '', $class = 'kmt-custom-html' ) {
			$custom_html         = '';
			$custom_html_content = kemet_get_option( $option_name );
			$custom_html         = '<div class="kmt-custom-html ' . esc_attr( $class ) . '">';
			if ( ! empty( $custom_html_content ) ) {
				$custom_html .= do_shortcode( $custom_html_content );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				$custom_html .= '<a href="' . esc_url( admin_url( 'customize.php?autofocus[control]=' . KEMET_THEME_SETTINGS . '[' . $option_name . ']' ) ) . '">' . __( 'Add Custom HTML', 'kemet' ) . '</a>';
			}
			$custom_html .= '</div>';

			return $custom_html;
		}
	}
endif;
