<?php
/**
 * Header Search Box Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Search_Box_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$search_options = array(
			'header-search-controls-tabs' => array(
				'section'  => 'section-header-search-box',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			'search-box-width'            => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-search-box',
				'priority'     => 5,
				'label'        => __( 'Enter Width', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 100,
						'step' => 1,
						'max'  => 600,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			'search-box-text-color'       => array(
				'section'   => 'section-header-search-box',
				'priority'  => 10,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-bg-color'         => array(
				'section'   => 'section-header-search-box',
				'priority'  => 15,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-border-width'     => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-search-box',
				'priority'     => 20,
				'label'        => __( 'Border Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-border-color'     => array(
				'section'   => 'section-header-search-box',
				'priority'  => 25,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-font-family'      => array(
				'type'      => 'kmt-font-family',
				'transport' => 'postMessage',
				'label'     => __( 'Font Family', 'kemet' ),
				'section'   => 'section-header-search-box',
				'priority'  => 30,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[search-box-font-weight]',
			),
			'search-box-font-weight'      => array(
				'type'      => 'kmt-font-weight',
				'transport' => 'postMessage',
				'label'     => __( 'Font Weight', 'kemet' ),
				'section'   => 'section-header-search-box',
				'priority'  => 35,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[search-box-font-family]',
			),
			'search-box-text-transform'   => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Text Transform', 'kemet' ),
				'section'   => 'section-header-search-box',
				'priority'  => 40,
				'choices'   => array(
					''           => __( 'Default', 'kemet' ),
					'none'       => __( 'None', 'kemet' ),
					'capitalize' => __( 'Capitalize', 'kemet' ),
					'uppercase'  => __( 'Uppercase', 'kemet' ),
					'lowercase'  => __( 'Lowercase', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-font-style'       => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-header-search-box',
				'priority'  => 45,
				'choices'   => array(
					'inherit' => __( 'Inherit', 'kemet' ),
					'normal'  => __( 'Normal', 'kemet' ),
					'italic'  => __( 'Italic', 'kemet' ),
					'oblique' => __( 'Oblique', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-line-height'      => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-search-box',
				'priority'     => 50,
				'label'        => __( 'Line Height', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
					'em' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			'search-box-letter-spacing'   => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-search-box',
				'priority'     => 55,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
		);

		return array_merge( $options, $search_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$search_sections = array(
			'section-header-search-box' => array(
				'priority' => 55,
				'title'    => __( 'Search Box', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $search_sections );

	}
}


new Kemet_Header_Search_Box_Customizer();


