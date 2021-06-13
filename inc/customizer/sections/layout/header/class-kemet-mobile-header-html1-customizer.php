<?php
/**
 * Mobile Header Html1 Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Mobile_Header_Html1_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$html1_options = array(
            'mobile-header-html-controls-tabs' => array(
				'section'  => 'section-mobile-header-html-1',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
        );

		return array_merge( $options, $html1_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$html1_sections = array(
			'section-mobile-header-html-1' => array(
				'priority' => 65,
				'title'    => __( 'Header Html 1', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $html1_sections );

	}
}


new Kemet_Mobile_Header_Html1_Customizer();


