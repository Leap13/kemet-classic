<?php
/**
 * Kemet Theme Customizer Sanitize.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Customizer Sanitizes
*/
if ( ! class_exists( 'Kemet_Customizer_Sanitizes' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Kemet_Customizer_Sanitizes {

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
		}

		/**
		 * Sanitize Integer
		 *
		 * @param  number $input Customizer setting input number.
		 * @return number        Absolute number.
		 */
		public static function sanitize_integer( $input ) {
			return absint( $input );
		}

		/**
		 * Sanitize Integer
		 *
		 * @param  number $val      Customizer setting input number.
		 * @param  object $setting  Setting object.
		 * @return number           Return number.
		 */
		public static function sanitize_number( $val, $setting ) {

			$input_attrs = $setting->manager->get_control( $setting->id )->input_attrs;

			if ( isset( $input_attrs ) ) {

				$input_attrs['min']  = isset( $input_attrs['min'] ) ? $input_attrs['min'] : 0;
				$input_attrs['step'] = isset( $input_attrs['step'] ) ? $input_attrs['step'] : 1;

				if ( isset( $input_attrs['max'] ) && $val > $input_attrs['max'] ) {
					$val = $input_attrs['max'];
				} elseif ( $val < $input_attrs['min'] ) {
					$val = $input_attrs['min'];
				}

				$dv = $val / $input_attrs['step'];

				$dv = round( $dv );

				$val = $dv * $input_attrs['step'];

				$val = number_format( (float) $val, 2, '.', '' );
				if ( $val == (int) $val ) {
					$val = (int) $val;
				}
			}

			return is_numeric( $val ) ? $val : 0;
		}

		/**
		 * Sanitize Integer
		 *
		 * @param  number $val Customizer setting input number.
		 * @return number        Return number.
		 */
		public static function sanitize_number_n_blank( $val ) {
			return is_numeric( $val ) ? $val : '';
		}

		/**
		 * Sanitize Spacing
		 *
		 * @param  number $val Customizer setting input number.
		 * @return number        Return number.
		 */
		public static function sanitize_spacing( $val ) {

			foreach ( $val as $key => $value ) {
				$val[ $key ] = ( is_numeric( $val[ $key ] ) && $val[ $key ] >= 0 ) ? $val[ $key ] : '';
			}

			return $val;
		}

		/**
		 * Sanitize responsive  Spacing
		 *
		 * @param  number $val Customizer setting input number.
		 * @return number        Return number.
		 */
		public static function sanitize_responsive_spacing( $val ) {

			if ( ! is_array( $val ) ) {
				return;
			}

			return $val;
		}

		/**
		 * Sanitize Responsive Slider
		 *
		 * @param  array|number $val Customizer setting input number.
		 * @param  object       $setting Setting Onject.
		 * @return array        Return number.
		 */
		public static function sanitize_responsive_slider( $val, $setting ) {

			if ( ! is_array( $val ) ) {
				return;
			}

			return $val;
		}

		/**
		 * Sanitize color
		 *
		 * @param  string $color setting input.
		 * @return string        setting input value.
		 */
		public static function sanitize_color( $colors ) {

			if ( empty( $colors ) || ! is_array( $colors ) ) {
				return array();
			}

			return $colors;
		}

	}
}

/**
* Kicking this off by calling 'get_instance()' method
*/
Kemet_Customizer_Sanitizes::get_instance();
