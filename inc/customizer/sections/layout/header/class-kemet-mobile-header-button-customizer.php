<?php
/**
 * Mobile Header Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Mobile_Header_Button_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$button_options = array(
            'mobile-header-button-controls-tabs' => array(
				'section'  => 'section-mobile-header-button',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
        );

		return array_merge( $options, $button_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$button_sections = array(
			'section-mobile-header-button' => array(
				'priority' => 80,
				'title'    => __( 'Button', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $button_sections );

	}
}


new Kemet_Mobile_Header_Button_Customizer();


