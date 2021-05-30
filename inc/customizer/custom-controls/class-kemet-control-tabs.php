<?php
/**
 * Customizer Control: Tabs.
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
 * Tabs control.
 */
class Kemet_Control_Tabs extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-tabs';

	/**
	 * The control tabs.
	 *
	 * @access public
	 * @var array
	 */
	public $tabs = array();

	/**
	 * The control active tab.
	 *
	 * @access public
	 * @var string
	 */
	public $active_tab = '';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default']    = $this->setting->default;
		$this->json['tabs']       = $this->tabs;
		$this->json['active_tab'] = $this->active_tab;
	}

	/**
	 * Empty Render Function to prevent errors.
	 */
	public function render_content() {
	}
}
