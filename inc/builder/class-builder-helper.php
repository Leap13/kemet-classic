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
			$items = kemet_get_option( $builder . '-' . $device . '-items' );

			if ( isset( $items ) && isset( $items[ $row ] ) && isset( $items[ $row ][ $row . '_' . $column ] ) && is_array( $items[ $row ][ $row . '_' . $column ] ) && ! empty( $items[ $row ][ $row . '_' . $column ] ) ) {
				return true;
			}
			return false;
		}

		/**
		 * Get Widget
		 *
		 * @param string $widget_id
		 * @return string
		 */
		public static function get_custom_widget( $widget_id = '' ) {
			ob_start();
			echo '<div class="kmt-' . esc_attr( $widget_id ) . '-area">';
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
			$custom_html         = '<div class="' . esc_attr( $class ) . '">';
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
