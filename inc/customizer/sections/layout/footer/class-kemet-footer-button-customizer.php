<?php
/**
 * Footer Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Button_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$footer_button_options = array(
			'footer-button-controls-tabs' => array(
				'section'  => 'section-footer-button',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'footer-button-label'         => array(
				'type'     => 'text',
				'section'  => 'section-footer-button',
				'priority' => 5,
				'label'    => __( 'Label', 'kemet-addons' ),
			),
			'footer-button-url'           => array(
				'type'     => 'text',
				'section'  => 'section-footer-button',
				'priority' => 10,
				'label'    => __( 'URL', 'kemet-addons' ),
			),
			'footer-button-open-new-tab'  => array(
				'type'     => 'checkbox',
				'section'  => 'section-footer-button',
				'priority' => 15,
				'label'    => __( 'Open in New Tab?', 'kemet-addons' ),
			),
		);

		return array_merge( $options, $footer_button_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$button_sections = array(
			'section-footer-button' => array(
				'priority' => 40,
				'title'    => __( 'Button', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $button_sections );

	}
}


new Kemet_Footer_Button_Customizer();


