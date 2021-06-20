<?php
/**
 * Top Header Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Top_Header_Customizer extends Kemet_Customizer_Register {

	/**
	 * prefix
	 *
	 * @access private
	 * @var string
	 */
	private static $prefix;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$prefix     = 'top-header';
		$register_options = array(
			self::$prefix . '-controls-tabs'           => array(
				'section'  => 'section-' . self::$prefix . '-builder',
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			self::$prefix . '-min-height'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-' . self::$prefix . '-builder',
				'priority'     => 5,
				'label'        => __( 'Min Height', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 500,
					),
					'em' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-background-group'        => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix . '-builder',
				'priority' => 6,
				'label'    => __( 'Background', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-background'              => array(
				'parent-id' => self::$prefix . '-background-group',
				'type'      => 'kmt-background',
				'transport' => 'postMessage',
				'section'   => 'section-' . self::$prefix . '-builder',
				'priority'  => 10,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-border-width'            => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'section-' . self::$prefix . '-builder',
				'priority'       => 15,
				'label'          => __( 'Border', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'context'        => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-border-color'            => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'priority'  => 20,
				'section'   => 'section-' . self::$prefix . '-builder',
				'label'     => __( 'Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-sticky-title'            => array(
				'type'     => 'kmt-title',
				'section'  => 'section-' . self::$prefix . '-builder',
				'priority' => 25,
				'label'    => __( 'Sticky Header Option', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-sticky-background-group' => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix . '-builder',
				'priority' => 30,
				'label'    => __( 'Background', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-sticky-background'       => array(
				'parent-id' => self::$prefix . '-sticky-background-group',
				'type'      => 'kmt-background',
				'transport' => 'postMessage',
				'section'   => 'section-' . self::$prefix . '-builder',
				'priority'  => 1,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
		);

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$top_header_sections = array(
			'section-' . self::$prefix . '-builder' => array(
				'priority' => 45,
				'title'    => __( 'Top Header', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $top_header_sections );

	}
}


new Kemet_Top_Header_Customizer();


