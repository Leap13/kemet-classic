<?php
/**
 * Header Social_Icons Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2021, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Social_Icons_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix         = 'social-icons';
		$selector             = '.kmt-social-icons';
		$social_icons_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-list'  => array(
								'type'      => 'kmt-social-icons',
								'transport' => 'postMessage',
							),
							self::$prefix . '-label' => array(
								'type'      => 'kmt-text',
								'transport' => 'postMessage',
								'label'     => __( 'Show Icon Label', 'kemet' ),
							),
							self::$prefix . '-style' => array(
								'type'      => 'kmt-radio',
								'default'   => 'simple',
								'transport' => 'postMessage',
								'label'     => __( 'Icons Style', 'kemet' ),
								'choices'   => array(
									'simple'  => __( 'Simple', 'kemet' ),
									'outline' => __( 'Outline', 'kemet' ),
									'solid'   => __( 'Solid', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector,
									'attr'     => 'data-style',
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-icon-size'  => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Icon Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector' => $selector,
									'property' => 'font-size',
								),
							),
							self::$prefix . '-icon-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'divider'   => true,
								'label'     => __( 'Icon Colors', 'kemet' ),
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
										'property' => '--color',
									),
									'hover'   => array(
										'selector' => $selector,
										'property' => '--hover-color',
									),
								),
							),
							self::$prefix . '-bg-icon-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'divider'   => true,
								'label'     => __( 'Icon Background Color', 'kemet' ),
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
										'property' => '--bg-color',
									),
									'hover'   => array(
										'selector' => $selector,
										'property' => '--bg-hover-color',
									),
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-style',
										'value'   => 'solid',
									),
								),
							),
							self::$prefix . '-icons-border' => array(
								'transport'   => 'postMessage',
								'priority'    => 45,
								'secondColor' => true,
								'type'        => 'kmt-border',
								'default'     => array(
									'style' => 'solid',
									'width' => 1,
									'color' => 'var(--borderColor)',
								),
								'label'       => __( 'Border', 'kemet' ),
								'preview'     => array(
									'selector' => '',
									'property' => '--border',
								),
								'context'     => array(
									array(
										'setting' => self::$prefix . '-style',
										'value'   => 'outline',
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
										'max'  => 100,
									),
									'%'  => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector' => $selector,
									'property' => '--border-radius',
								),
								'context'      => array(
									array(
										'setting'  => self::$prefix . '-style',
										'operator' => '!=',
										'value'    => 'outline',
									),
								),
							),
							self::$prefix . '-margin'     => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'divider'        => true,
								'label'          => __( 'Margin', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector,
									'property'   => '--margin',
									'responsive' => true,
								),
							),
						),
					),
				),
			),
		);

		$social_icons_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-header-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $social_icons_options,
				),
			),
		);

		return array_merge( $options, $social_icons_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$social_icons_sections = array(
			'section-header-' . self::$prefix => array(
				'title' => __( 'Social Icons', 'kemet' ),
				'panel' => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $social_icons_sections );

	}
}


new Kemet_Header_Social_Icons_Customizer();


