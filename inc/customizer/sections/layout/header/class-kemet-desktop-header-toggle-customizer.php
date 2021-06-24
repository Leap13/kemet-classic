<?php
/**
 * Desktop Header Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Desktop_Header_Toggle_Button_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix   = 'desktop-toggle-button';
		$button_options = array(
			self::$prefix . '-controls-tabs'     => array(
				'section'  => 'section-' . self::$prefix,
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			self::$prefix . '-float'             => array(
				'type'      => 'kmt-switcher',
				'transport' => 'postMessage',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 1,
				'label'     => __( 'Float', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-float-position'    => array(
				'type'      => 'select',
				'default'   => 'top-right',
				'transport' => 'postMessage',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 2,
				'label'     => __( 'Position', 'kemet' ),
				'choices'   => array(
					'top-right'    => __( 'Top Right', 'kemet' ),
					'top-left'     => __( 'Top Left', 'kemet' ),
					'bottom-right' => __( 'Bottom Right', 'kemet' ),
					'bottom-left'  => __( 'Bottom Left', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
					array(
						'setting' => self::$prefix . '-float',
						'value'   => true,
					),
				),
			),
			self::$prefix . '-vertical-offset'   => array(
				'type'        => 'kmt-slider',
				'default'     => 10,
				'transport'   => 'postMessage',
				'section'     => 'section-' . self::$prefix,
				'priority'    => 3,
				'label'       => __( 'Vertical Offset', 'kemet' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 300,
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
					array(
						'setting' => self::$prefix . '-float',
						'value'   => true,
					),
				),
			),
			self::$prefix . '-horizontal-offset' => array(
				'type'        => 'kmt-slider',
				'default'     => 10,
				'transport'   => 'postMessage',
				'section'     => 'section-' . self::$prefix,
				'priority'    => 4,
				'label'       => __( 'Horizontal Offset', 'kemet' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 300,
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
					array(
						'setting' => self::$prefix . '-float',
						'value'   => true,
					),
				),
			),
			self::$prefix . '-icon-size'         => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-' . self::$prefix,
				'priority'    => 5,
				'label'       => __( 'Icon Size', 'kemet' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 50,
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-colors-group'      => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 10,
				'label'    => __( 'Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-icon-color'        => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 15,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-icon-bg-color'     => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 15,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-icon-h-color'      => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 20,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-icon-bg-h-color'   => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 15,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-border-radius'     => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-' . self::$prefix,
				'priority'    => 5,
				'label'       => __( 'Border Radius', 'kemet' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 200,
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-width'             => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-' . self::$prefix,
				'priority'    => 5,
				'label'       => __( 'Width', 'kemet' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 200,
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-height'            => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'section-' . self::$prefix,
				'priority'    => 5,
				'label'       => __( 'Height', 'kemet' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 200,
				),
				'context'     => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
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
			'section-' . self::$prefix => array(
				'priority' => 85,
				'title'    => __( 'Toggle Button', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $button_sections );

	}
}


new Kemet_Desktop_Header_Toggle_Button_Customizer();


