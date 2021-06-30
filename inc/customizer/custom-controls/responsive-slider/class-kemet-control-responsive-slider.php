<?php
/**
 * Customizer Control: slider.
 *
 * Creates a jQuery slider control.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Responsive Slider control (range).
 */
class Kemet_Control_Responsive_Slider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-responsive-slider';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $suffix = '';
	/**
	 * The unit type.
	 *
	 * @access public
	 * @var array
	 */
	public $unit_choices = array();

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$val = maybe_unserialize( $this->value() );

		if ( ! is_array( $val ) || is_numeric( $val ) ) {

			$val = array(
				'desktop'      => '',
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
		}

		$this->json['value']        = $val;
		$this->json['link']         = $this->get_link();
		$this->json['id']           = $this->id;
		$this->json['label']        = esc_html( $this->label );
		$this->json['suffix']       = $this->suffix;
		$this->json['unit_choices'] = $this->unit_choices;

		$responsive = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		if ( is_array( $val ) ) {
			$responsive['desktop'] = is_numeric( $val['desktop'] ) ? $val['desktop'] : '';
			$responsive['tablet']  = is_numeric( $val['tablet'] ) ? $val['tablet'] : '';
			$responsive['mobile']  = is_numeric( $val['mobile'] ) ? $val['mobile'] : '';
		} else {
			$responsive['desktop'] = is_numeric( $val ) ? $val : '';
		}

		foreach ( $responsive as $key => $value ) {
				$value              = isset( $input_attrs['min'] ) && ( ! empty( $value ) ) && ( $input_attrs['min'] > $value ) ? $input_attrs['min'] : $value;
				$value              = isset( $input_attrs['max'] ) && ( ! empty( $value ) ) && ( $input_attrs['max'] < $value ) ? $input_attrs['max'] : $value;
				$responsive[ $key ] = $value;
		}

		return $responsive;
	}
}
