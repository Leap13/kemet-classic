<?php
/**
 * Header Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Button_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$header_button_options = array(
			'header-button-controls-tabs' => array(
				'section'  => 'section-header-button',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'header-button-label'         => array(
				'type'     => 'text',
				'section'  => 'section-header-button',
				'priority' => 5,
				'label'    => __( 'Label', 'kemet-addons' ),
			),
			'header-button-url'           => array(
				'type'     => 'text',
				'section'  => 'section-header-button',
				'priority' => 10,
				'label'    => __( 'URL', 'kemet-addons' ),
			),
			'header-button-open-new-tab'  => array(
				'type'     => 'checkbox',
				'section'  => 'section-header-button',
				'priority' => 15,
				'label'    => __( 'Open in New Tab?', 'kemet-addons' ),
			),
		);

		return array_merge( $options, $header_button_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$mobile_popup_sections = array(
			'section-header-button' => array(
				'priority' => 40,
				'title'    => __( 'Button', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $mobile_popup_sections );

	}
}


new Kemet_Header_Button_Customizer();


