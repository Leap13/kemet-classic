<?php
/**
 * Go Top Button Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Go_Top_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'go-top';
		$selector         = '.kmt-go-top-button';
		$register_options = array(
			self::$prefix . '-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-display'     => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Go Top Button', 'kemet' ),
							),
							self::$prefix . '-style'       => array(
								'type'    => 'kmt-icon-select',
								'label'   => __( 'Go Top Icon', 'kemet' ),
								'choices' => array(
									'arrow-up'      => array(
										'icon' => 'dashicons-arrow-up',
									),
									'arrow-up-alt'  => array(
										'icon' => 'dashicons-arrow-up-alt',
									),
									'arrow-up-alt2' => array(
										'icon' => 'dashicons-arrow-up-alt2',
									),
								),
								'context' => array(
									array(
										'setting' => 'go-top-display',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-position'    => array(
								'type'    => 'kmt-radio',
								'divider' => true,
								'label'   => __( 'Go Top Position', 'kemet' ),
								'choices' => array(
									'left'  => __( 'Left', 'kemet' ),
									'right' => __( 'Right', 'kemet' ),
								),
								'context' => array(
									array(
										'setting' => 'go-top-display',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-icon-size'   => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'label'        => __( 'Go Top Icon Size', 'kemet' ),
								'transport'    => 'postMessage',
								'responsive'   => true,
								'unit_choices' => array(
									'px' => array(
										'min'  => 5,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => '#kmt-go-top, #kmt-go-top span',
									'property'   => 'font-size',
									'responsive' => true,
								),
								'context'      => array(
									array(
										'setting' => 'go-top-display',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-side-offset' => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'label'        => __( 'Side Offset', 'kemet' ),
								'transport'    => 'postMessage',
								'responsive'   => true,
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector'   => '.kmt-go-top-button.go-top-right, .kmt-go-top-button.go-top-left',
									'property'   => '--sideOffset',
									'responsive' => true,
								),
								'context'      => array(
									array(
										'setting'    => 'go-top-display',
										'value'      => true,
										'responsive' => true,
									),
								),
							),
							self::$prefix . '-bottom-offset' => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'label'        => __( 'Bottom Offset', 'kemet' ),
								'transport'    => 'postMessage',
								'responsive'   => true,
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector'   => '.kmt-go-top-button',
									'property'   => 'bottom',
									'responsive' => true,
								),
								'context'      => array(
									array(
										'setting' => 'go-top-display',
										'value'   => true,
									),
								),
							),
							self::$prefix . '-radius'      => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'label'        => __( 'Button Radius', 'kemet' ),
								'transport'    => 'postMessage',
								'responsive'   => true,
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => '.kmt-go-top-button',
									'property'   => 'border-radius',
									'responsive' => true,
								),
								'context'      => array(
									array(
										'setting' => 'go-top-display',
										'value'   => true,
									),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'go-top-icon-color'   => array(
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
										'selector' => '.kmt-go-top-button span',
										'property' => 'color',
									),
									'hover'   => array(
										'selector' => '.kmt-go-top-button:hover span',
										'property' => 'color',
									),
								),
							),
							'go-top-icon-bgcolor' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Icon BackgroundColor', 'kemet' ),
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
										'selector' => '#kmt-go-top',
										'property' => 'background-color',
									),
									'hover'   => array(
										'selector' => '#kmt-go-top:hover',
										'property' => 'background-color',
									),
								),
							),
							'go-top-border'       => array(
								'transport'   => 'postMessage',
								'secondColor' => true,
								'divider'     => true,
								'type'        => 'kmt-border',
								'label'       => __( 'Border', 'kemet' ),
								'preview'     => array(
									'selector' => '#kmt-go-top',
									'property' => 'border',
								),
							),
						),
					),
				),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $register_options,
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
		$register_section = array(
			'section-' . self::$prefix => array(
				'title'    => __( 'Go Top Button', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 55,
				'infoLink' => esc_url( 'https://kemet.io/docs/go-top-button/' ),
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Go_Top_Customizer();
