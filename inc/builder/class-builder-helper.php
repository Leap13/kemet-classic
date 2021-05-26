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
	}
endif;
