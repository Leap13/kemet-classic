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
							self::$prefix . '-list'        => array(
								'type'      => 'kmt-social-icons',
								'transport' => 'postMessage',
							),
							self::$prefix . '-style'       => array(
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
							self::$prefix . '-color-style' => array(
								'type'      => 'kmt-radio',
								'default'   => 'custom',
								'transport' => 'postMessage',
								'label'     => __( 'Icons Color', 'kemet' ),
								'choices'   => array(
									'custom'   => __( 'Simple', 'kemet' ),
									'official' => __( 'Official', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector,
									'attr'     => 'data-color',
								),
							),
							self::$prefix . '-new-tab'     => array(
								'label'     => __( 'Open links in new tab', 'kemet' ),
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'divider'   => true,
							),
							self::$prefix . '-nofollow'    => array(
								'label'     => __( 'Set links to nofollow', 'kemet' ),
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
							),
							self::$prefix . '-enable-label' => array(
								'label'     => __( 'Enable Icon Label', 'kemet' ),
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'divider'   => true,
							),
							self::$prefix . '-label-visibility' => array(
								'label'     => __( 'Label Visibility', 'kemet' ),
								'type'      => 'kmt-visibility',
								'transport' => 'postMessage',
								'choices'   => array(
									'desktop' => __( 'Desktop', 'kemet' ),
									'tablet'  => __( 'Tablet', 'kemet' ),
									'mobile'  => __( 'Mobile', 'kemet' ),
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-enable-label',
										'value'   => true,
									),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-icon-size'   => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'responsive'   => true,
								'label'        => __( 'Icon Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 200,
									),
								),
								'preview'      => array(
									'selector'   => $selector . ' .kmt-social-icon',
									'property'   => '--icon-size',
									'responsive' => true,
								),
							),
							self::$prefix . '-icon-color'  => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'divider'    => true,
								'responsive' => true,
								'label'      => __( 'Icon Colors', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'initial'    => array(
										'selector' => $selector . ' .kmt-social-icon',
										'property' => '--color',
									),
									'hover'      => array(
										'selector' => $selector . ' .kmt-social-icon',
										'property' => '--hover-color',
									),
									'responsive' => true,
								),
								'context'    => array(
									array(
										'setting' => self::$prefix . '-color-style',
										'value'   => 'custom',
									),
								),
							),
							self::$prefix . '-bg-icon-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'divider'    => true,
								'responsive' => true,
								'label'      => __( 'Icon Background Color', 'kemet' ),
								'pickers'    => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'initial'    => array(
										'selector' => $selector . '[data-style="solid"] .kmt-social-icon',
										'property' => '--bg-color',
									),
									'hover'      => array(
										'selector' => $selector . '[data-style="solid"] .kmt-social-icon',
										'property' => '--bg-hover-color',
									),
									'responsive' => true,
								),
								'context'    => array(
									array(
										'setting' => self::$prefix . '-style',
										'value'   => 'solid',
									),
									array(
										'setting' => self::$prefix . '-color-style',
										'value'   => 'custom',
									),
								),
							),
							self::$prefix . '-icon-border' => array(
								'transport'   => 'postMessage',
								'priority'    => 45,
								'secondColor' => true,
								'responsive'  => true,
								'type'        => 'kmt-border',
								'default'     => array(
									'desktop' => array(
										'style'       => 'solid',
										'width'       => 1,
										'color'       => 'var(--borderColor)',
										'secondColor' => '',
									),
								),
								'label'       => __( 'Border', 'kemet' ),
								'preview'     => array(
									'selector'    => $selector . '[data-style="outline"] .kmt-social-icon',
									'property'    => 'border',
									'secondColor' => true,
									'responsive'  => true,
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
								'responsive'   => true,
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
									'selector'   => $selector . ' .kmt-social-icon',
									'property'   => '--border-radius',
									'responsive' => true,
								),
							),
							self::$prefix . '-icon-padding' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'divider'        => true,
								'label'          => __( 'Icons Padding', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector . '[data-style="outline"] .kmt-social-icon, ' . $selector . '[data-style="solid"] .kmt-social-icon',
									'property'   => 'padding',
									'responsive' => true,
								),
								'context'        => array(
									array(
										'setting'  => self::$prefix . '-style',
										'operator' => 'in_array',
										'value'    => array( 'outline', 'solid' ),
									),
								),
							),
							self::$prefix . '-icon-margin' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Icons Margin', 'kemet' ),
								'linked_choices' => true,
								'divider'        => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector . ' .kmt-social-icon',
									'property'   => 'margin',
									'responsive' => true,
								),
							),
							self::$prefix . '-margin'      => array(
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
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials = array_fill_keys(
			array( self::$prefix . '-list', self::$prefix . '-enable-label', self::$prefix . '-label-visibility', self::$prefix . '-new-tab', self::$prefix . '-nofollow' ),
			array(
				'selector'            => '.kmt-social-icons',
				'container_inclusive' => true,
				'render_callback'     => array( Kemet_Header_Markup::get_instance(), 'social_icons_markup' ),
			)
		);
		return array_merge( $partials, $new_partials );
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


