<?php
/**
 * Main Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Main_Footer_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$main_footer_options = array(
			'footer-main-controls-tabs' => array(
				'section'  => 'section-main-footer-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			// 'kmt-row-layout' => array (
			// 	'section'  => 'section-main-footer-builder',
			// 	'title'       => __( 'Layout', 'kemet' ),
			// 	'type'  => 'kmt-row-layout',
			// 	'layout'     => Kemet_Footer_Markup::$footer_row_layouts,
			// 	// 'input_attrs' => array(
			// 	// 		'responsive' => true,
			// 	// 		'footer'     => 'main',
			// 	// 		'layout'     => Kemet_Footer_Markup::$footer_row_layouts,
			// 	// 	),


			// )
		);

		return array_merge( $options, $main_footer_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$main_footer_sections = array(
			'section-main-footer-builder' => array(
				'priority' => 50,
				'title'    => __( 'Main Footer', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);


		return array_merge( $sections, $main_footer_sections );

	}
}


new Kemet_Main_Footer_Customizer();


