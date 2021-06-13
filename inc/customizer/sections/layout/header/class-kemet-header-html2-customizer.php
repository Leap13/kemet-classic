<?php
/**
 * Header Html2 Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Html2_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$html2_options = array(
            'header-html2-controls-tabs' => array(
				'section'  => 'section-header-html-2',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
        );

		return array_merge( $options, $html2_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$html2_sections = array(
			'section-header-html-2' => array(
				'priority' => 65,
				'title'    => __( 'Header Html 2', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $html2_sections );

	}
}


new Kemet_Header_Html2_Customizer();


