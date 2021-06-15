<?php
/**
 * Mobile Header Html2 Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Mobile_Header_Html2_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$html2_options = array(
			'mobile-header-htm2-controls-tabs' => array(
				'section'  => 'section-mobile-header-html-2s',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'header-mobile-html-2'             => array(
				'section'   => 'section-header-mobile-html-2',
				'priority'  => 1,
				'label'     => __( 'Html', 'kemet' ),
				'transport' => 'postMessage',
				'type'      => 'textarea',
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
				'partial'   => array(
					'selector'            => '.kmt-header-mobile-html-2',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'render_html_mobile_2' ),
				),
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
			'section-mobile-header-html-2' => array(
				'priority' => 65,
				'title'    => __( 'Header Html 2', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $html2_sections );

	}
}


new Kemet_Mobile_Header_Html1_Customizer();


