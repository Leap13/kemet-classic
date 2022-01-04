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
			$items = 'header' === $builder ? apply_filters( 'kemet_' . $device . '_header_items', kemet_get_option( $builder . '-' . $device . '-items' ) ) : kemet_get_option( $builder . '-items' );

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
			$items  = 'header' === $builder ? apply_filters( 'kemet_' . $device . '_header_items', kemet_get_option( $builder . '-' . $device . '-items' ) ) : kemet_get_option( $builder . '-items' );
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
				$items['desktop'] = apply_filters( 'kemet_desktop_header_items', kemet_get_option( 'header-desktop-items', array() ) );
				$items['mobile']  = apply_filters( 'kemet_mobile_header_items', kemet_get_option( 'header-mobile-items', array() ) );
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

			if ( 'footer' === $builder ) {
				$loaded_items = array();
				foreach ( $items as $row => $columns ) {

					if ( is_array( $columns ) && ! empty( $columns ) ) {

						$loaded_items = array_merge( $loaded_items, array_values( $columns ) );
					}
				}

				$current_items = ! empty( $loaded_items ) ? call_user_func_array( 'array_merge', $loaded_items ) : array();
			}

			switch ( $device ) {
				case 'all':
					$current_items = 'header' == $builder ? array_unique( array_merge( $current_items['desktop'], $current_items['mobile'] ) ) : $current_items;
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

		public function merge_array( $array ) {
			var_dump( $array );
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
			echo '<div class="kmt-widget-area-inner">';
			kemet_get_sidebar( $widget_id );
			echo '</div>';
			echo '</div>';
			echo ob_get_clean();
		}

		/**
		 * If in customizer output the editlink.
		 */
		public static function customizer_edit_link() {
			if ( is_customize_preview() ) {
				?>
				<div class="customize-partial-edit-shortcut kmt-custom-partial-edit">
					<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kemet' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kemet' ); ?>" class="customize-partial-edit-shortcut-button edit-buidler-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button>
				</div>
				<?php
			}
		}

		/**
		 * If in customizer output the editlink.
		 */
		public static function customizer_row_edit_link() {
			if ( is_customize_preview() ) {
				?>
				<div class="customize-partial-edit-shortcut kmt-custom-partial-edit-shortcut">
					<button aria-label="<?php esc_attr_e( 'Click to edit this element.', 'kemet' ); ?>" title="<?php esc_attr_e( 'Click to edit this element.', 'kemet' ); ?>" class="customize-partial-edit-shortcut-button item-customizer-focus"><?php echo esc_html__( 'Edit', 'kemet' ); ?></button>
				</div>
				<?php
			}
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
				$custom_html .= '<span>' . __( 'Add Custom HTML', 'kemet' ) . '</span>';
			}
			$custom_html .= '</div>';

			return $custom_html;
		}
	}
endif;
