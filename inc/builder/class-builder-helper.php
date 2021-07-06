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
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		public static $loaded_grid = null;

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
		public function __construct() {}

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
			$loaded_items = array();

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
		 * Check if component placed on the builder.
		 *
		 * @param integer $component_id component id.
		 * @param string  $builder_type builder type.
		 * @param string  $device Device type (mobile, desktop and both).
		 * @return bool
		 */
		public static function is_component_loaded( $component_id, $builder_type = 'footer', $device = 'both' ) {

			$loaded_components = array();

			if ( is_null( self::$loaded_grid ) ) {

				$grids['footer_both']    = kemet_get_option( 'footer-desktop-items', array() );

				if ( ! empty( $grids ) ) {

					foreach ( $grids as $grid_row => $row_grids ) {

						$components = array();
						if ( ! empty( $row_grids ) ) {

							foreach ( $row_grids as $row => $grid ) {

								if ( ! in_array( $row, array( 'top', 'bottom', 'main' ) ) ) {
									continue;
								}

								if ( ! is_array( $grid ) ) {
									continue;
								}

								$result = array_values( $grid );

								if ( is_array( $result ) ) {
									$loaded_component = call_user_func_array( 'array_merge', $result );
									$components[]     = is_array( $loaded_component ) ? $loaded_component : array();
								}
							}
						}

						$loaded_components[ $grid_row ] = call_user_func_array( 'array_merge', $components );
					}
				}

				if ( ! empty( $loaded_components ) ) {

					// For All device and builder type.
					$all_components           = call_user_func_array( 'array_merge', array_values( $loaded_components ) );
					$loaded_components['all'] = array_unique( $all_components );
				}

				self::$loaded_grid = $loaded_components;
			}

			$loaded_components = self::$loaded_grid;

			if ( 'all' === $builder_type && ! empty( $loaded_components['all'] ) ) {
				$is_loaded = in_array( $component_id, $loaded_components['all'], true );
			} else {
				$is_loaded = in_array( $component_id, $loaded_components[ $builder_type . '_' . $device ], true );
			}

			return $is_loaded || is_customize_preview();
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
	 * Check if Footer Zone is empty.
	 *
	 * @param string $row row.
	 * @return bool
	 */
	public static function is_footer_row_empty( $row = 'main' ) {
		$sides    = false;
		$elements = kemet_get_option( 'footer-desktop-items' );

		if ( isset( $elements ) && isset( $elements[ $row ] ) ) {
			for ( $i = 1; $i <= 5; $i++ ) {
				if (
					isset( $elements[ $row ][ $row . '_' . $i ] ) &&
					is_array( $elements[ $row ][ $row . '_' . $i ] ) &&
					! empty( $elements[ $row ][ $row . '_' . $i ] )
				) {
					$sides = true;
					break;
				}
			}
		}
		return $sides;
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
