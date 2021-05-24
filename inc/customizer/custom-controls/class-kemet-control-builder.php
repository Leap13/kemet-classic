<?php
/**
 * Customizer Control: Builder.
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
 * Color control (alpha).
 */
class Kemet_Control_Builder extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-builder';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default']     = $this->setting->default;
		$this->json['input_attrs'] = $this->input_attrs;
	}

	/**
	 * Empty Render Function to prevent errors.
	 */
	public function render_content() {
	}
}
