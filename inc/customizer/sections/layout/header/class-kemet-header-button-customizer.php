<?php
/**
 * Header Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Button_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix          = 'header-button';
		$header_button_options = array(
			self::$prefix . '-controls-tabs' => array(
				'section'  => 'section-' . self::$prefix,
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			self::$prefix . '-label'         => array(
				'type'     => 'text',
				'section'  => 'section-' . self::$prefix,
				'priority' => 5,
				'label'    => __( 'Label', 'kemet-addons' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-url'           => array(
				'type'     => 'text',
				'section'  => 'section-' . self::$prefix,
				'priority' => 10,
				'label'    => __( 'URL', 'kemet-addons' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-open-new-tab'  => array(
				'type'     => 'checkbox',
				'section'  => 'section-' . self::$prefix,
				'priority' => 15,
				'label'    => __( 'Open in New Tab?', 'kemet-addons' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-colors-group'  => array(
				'type'     => 'kmt-group',
				'section'  => 'section-' . self::$prefix,
				'priority' => 20,
				'label'    => __( 'Colors', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-color'         => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 5,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'tab'       => __( 'Normal', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-bg-color'      => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 5,
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
			self::$prefix . '-h-color'       => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 5,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'tab'       => __( 'Hover', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-h-bg-color'    => array(
				'parent-id' => self::$prefix . '-colors-group',
				'section'   => 'section-' . self::$prefix,
				'priority'  => 5,
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
		);

		return array_merge( $options, $header_button_options );
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
				'priority' => 40,
				'title'    => __( 'Button', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $button_sections );

	}
}


new Kemet_Header_Button_Customizer();


