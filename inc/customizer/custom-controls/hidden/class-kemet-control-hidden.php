<?php
/**
 * Customizer Control: icon-select
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * A text control with validation for CSS units.
 */
class Kemet_Control_Hidden extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @since  1.0.0
	 * @var string
	 */
	public $type = 'kmt-hidden';


	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 * @since  1.0.0
	 */
	public function to_json() {
		parent::to_json();
		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}
}
