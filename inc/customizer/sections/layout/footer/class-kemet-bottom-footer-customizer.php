<?php
/**
 * Bottom Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Bottom_Footer_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {

		$column_count = range( 1, Kemet_Footer_Markup::$num_of_footer_columns );
		$column_count = array_combine( $column_count, $column_count );

		$bottom_footer_options = array(
			'footer-bottom-controls-tabs' => array(
				'section'  => 'section-bottom-footer-builder',
				'type'     => 'kmt-tabs',
				'priority' => 2,
			),
			'fbb-footer-column' => array (
				'section'  => 'section-bottom-footer-builder',
				'label'       => __( 'Column', 'kemet' ),
				'default'     => kemet_get_option( 'fbb-row-column' ),
				'priority'    => 3,
				'type'  => 'select',
				'choices'   => $column_count,
				'transport' => 'postMessage',
				'partial'   => array(
					'selector'            => '.site-bottom-footer-wrap',
					'container_inclusive' => false,
					'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'bottom_footer' ),
				),
				),

				'fbb-footer-layout'  =>  array (
					'default'  => kemet_get_option( 'fbb-footer-layout' ),
					'type'     => 'select',
					//'type'     => 'kmt-row-layout',
					'section'  => 'section-bottom-footer-builder',
					'priority' => 4,
					'label'    =>  __( 'Layout', 'kemet' ),
					'choices'   => $column_count,
					'context' => array(
				 		'responsive' => true,
				 		'footer'     => 'bottom',
				 		'layout'     => Kemet_Footer_Markup::$footer_row_layouts,
				 	),
					 'transport'   => 'postMessage',

				),

		);

		return array_merge( $options, $bottom_footer_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$bottom_footer_sections = array(
			'section-bottom-footer-builder' => array(
				'priority' => 50,
				'title'    => __( 'Bottom Footer', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);


			

		return array_merge( $sections, $bottom_footer_sections );

	}
}


new Kemet_Bottom_Footer_Customizer();


