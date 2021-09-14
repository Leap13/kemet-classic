<?php
/**
 * Mobile Header Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Mobile_Header_Toggle_Button_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix   = 'mobile-toggle-button';
		$selector       = '.' . self::$prefix;
		$button_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-width'  => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Width', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector' => $selector,
									'property' => 'width',
								),
							),
							self::$prefix . '-height' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Height', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector' => $selector,
									'property' => 'height',
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-float'      => array(
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'label'     => __( 'Float', 'kemet' ),
							),
							self::$prefix . '-float-position' => array(
								'type'      => 'kmt-select',
								'default'   => 'top-right',
								'transport' => 'postMessage',
								'label'     => __( 'Position', 'kemet' ),
								'choices'   => array(
									'top-right'    => __( 'Top Right', 'kemet' ),
									'top-left'     => __( 'Top Left', 'kemet' ),
									'bottom-right' => __( 'Bottom Right', 'kemet' ),
									'bottom-left'  => __( 'Bottom Left', 'kemet' ),
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-float',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-vertical-offset' => array(
								'type'         => 'kmt-slider',
								'default'      => 10,
								'transport'    => 'postMessage',
								'label'        => __( 'Vertical Offset', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 300,
									),
								),
								'context'      => array(
									array(
										'setting' => self::$prefix . '-float',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-horizontal-offset' => array(
								'type'         => 'kmt-slider',
								'default'      => 10,
								'transport'    => 'postMessage',
								'label'        => __( 'Horizontal Offset', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 300,
									),
								),
								'context'      => array(
									array(
										'setting' => self::$prefix . '-float',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-z-index'    => array(
								'type'      => 'kmt-number',
								'transport' => 'postMessage',
								'label'     => __( 'Z-index', 'kemet' ),
								'min'       => 1,
								'step'      => 1,
								'max'       => 99999,
								'preview'   => array(
									'selector' => '.toggle-button-fixed',
									'property' => 'z-index',
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-float',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-icon-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Icon Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--buttonColor',
									),
									'hover'   => array(
										'selector' => $selector,
										'property' => '--buttonHoverColor',
									),
								),
							),
							self::$prefix . '-icon-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--buttonBackgroundColor',
									),
									'hover'   => array(
										'selector' => $selector,
										'property' => '--buttonBackgroundHoverColor',
									),
								),
							),
							self::$prefix . '-border-radius' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Border Radius', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector' => $selector,
									'property' => '--borderRadius',
								),
							),
						),
					),
				),
			),
		);

		$button_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $button_options,
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


new Kemet_Mobile_Header_Toggle_Button_Customizer();


