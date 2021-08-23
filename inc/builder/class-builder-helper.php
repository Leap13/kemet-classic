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
			$items = 'header' === $builder ? kemet_get_option( $builder . '-' . $device . '-items' ) : kemet_get_option( $builder . '-items' );

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
		public static function is_row_empty( $row, $builder, $device = 'desktop' ) {
			$items  = 'header' === $builder ? kemet_get_option( $builder . '-' . $device . '-items' ) : kemet_get_option( $builder . '-items' );
			$result = false;

			if ( isset( $items ) && isset( $items[ $row ] ) ) {

				foreach ( $items[ $row ] as $column => $c_items ) {
					if ( isset( $items[ $row ][ $column ] ) && is_array( $items[ $row ][ $column ] ) && ! empty( $items[ $row ][ $column ] ) ) {
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
			$items         = 'footer' === $builder ? kemet_get_option( 'footer-items', array() ) : array();
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
					$current_items = 'header' == $builder ? array_unique( $current_items[ $device ] ) : $current_items;
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
