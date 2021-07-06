<?php
/**
 * Top Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Top_Footer_Customizer extends Kemet_Customizer_Register {
	


	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$column_count = range( 1, Kemet_Footer_Markup::$num_of_footer_columns );
		$column_count = array_combine( $column_count, $column_count );

		$top_footer_options = array(
			'footer-top-controls-tabs' => array(
				'section'  => 'section-top-footer-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'fbt-row-column' => array (
				'section'  => 'section-top-footer-builder',
				'default'     => kemet_get_option( 'fbt-row-column' ),
				'priority'  => 2,
				'label'       => __( 'Column', 'kemet' ),
				'choices'   => $column_count,
				'type'  => 'select',
				'partial'   => array(
					'selector'            => '.site-top-footer-wrap',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'top_footer' ),
				),
			),
			// 'fbt-row-layout' => array (
			// 	'section'  => 'section-top-footer-builder',
			// 	'label'       => __( 'Layout', 'kemet' ),
			// 	'default'     => kemet_get_option( 'fbt-footer-layout' ),
			// 	'priority'    => 3,
			// 	'type'  => 'select',
			// 	'choices'   => $column_count,
			// 	'transport' => 'postMessage',
			// 	'type'  => 'kmt-row-layout',
			// 	'layout'     => Kemet_Footer_Markup::$footer_row_layouts,
			// 	// 'context' => array(
			// 	// 		'responsive' => true,
			// 	// 		'footer'     => 'top',
			// 	// 		'layout'     => Kemet_Footer_Markup::$footer_row_layout,
			// 	// 	),

			// 		// 'input_attrs' => array(
			// 		// 	'responsive' => true,
			// 		// 	'footer'     => 'top',
			// 		// 	'layout'     => Kemet_Footer_Markup::$footer_row_layouts,
			// 		// ),

			// 	'transport'   => 'postMessage',


			// 		),
		);

		return array_merge( $options, $top_footer_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$top_footer_sections = array(
			'section-top-footer-builder' => array(
				'priority' => 50,
				'title'    => __( 'Top Footer', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);


		return array_merge( $sections, $top_footer_sections );

	}
}


new Kemet_Top_Footer_Customizer();


