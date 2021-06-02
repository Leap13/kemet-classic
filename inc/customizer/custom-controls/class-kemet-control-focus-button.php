<?php
/**
 * Customizer Control: Focus Button.
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
 * Focus Button control.
 */
class Kemet_Control_Focus_Button extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-focus-button';

	/**
	 * The control parameters.
	 *
	 * @access public
	 * @var string
	 */
	public $button_params = array();

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default']       = $this->setting->default;
		$this->json['button_params'] = $this->button_params;
	}

	/**
	 * Empty Render Function to prevent errors.
	 */
	public function render_content() {
	}
}
