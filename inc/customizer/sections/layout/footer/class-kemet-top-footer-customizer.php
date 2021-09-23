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
		self::$prefix     = 'top-footer';
		$selector         = '.site-' . self::$prefix . '-wrap';
		$register_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-columns'     => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-radio',
								'label'     => __( 'Columns', 'kemet' ),
								'choices'   => array(
									'1' => __( '1', 'kemet' ),
									'2' => __( '2', 'kemet' ),
									'3' => __( '3', 'kemet' ),
									'4' => __( '4', 'kemet' ),
									'5' => __( '5', 'kemet' ),
								),
							),
							self::$prefix . '-layout'      => array(
								'type'      => 'kmt-row-layout',
								'divider'   => true,
								'label'     => __( 'Layout', 'kemet' ),
								'transport' => 'postMessage',
								'row'       => 'top',
								'context'   => array(
									array(
										'setting'  => self::$prefix . '-columns',
										'operator' => '!=',
										'value'    => '1',
									),
								),
							),
							self::$prefix . '-min-height'  => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'divider'      => true,
								'transport'    => 'postMessage',
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
										'max'  => 12,
									),
								),
								'preview'      => array(
									'selector'   => $selector . ' .kmt-grid-row',
									'property'   => '--minHeight',
									'responsive' => true,
								),
							),
							self::$prefix . '-columns-direction' => array(
								'default'   => 'row',
								'divider'   => true,
								'transport' => 'postMessage',
								'type'      => 'kmt-radio',
								'label'     => __( 'Column Direction', 'kemet' ),
								'choices'   => array(
									'row'    => __( 'Row', 'kemet' ),
									'column' => __( 'Column', 'kemet' ),
								),
							),
							self::$prefix . '-columns-padding' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Columns Spacing', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector . ' .site-' . self::$prefix . '-inner-wrap > .site-footer-section',
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
							self::$prefix . '-row-padding' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'divider'        => true,
								'label'          => __( 'Row Spacing', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => $selector,
									'property'   => '--padding',
									'sides'      => true,
									'responsive' => true,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-background' => array(
								'type'       => 'kmt-background',
								'transport'  => 'postMessage',
								'label'      => __( 'Background', 'kemet' ),
								'responsive' => true,
								'preview'    => array(
									'selector'   => $selector,
									'responsive' => true,
								),
							),
							self::$prefix . '-row-title'  => array(
								'type'  => 'kmt-title',
								'label' => __( 'Row Settings', 'kemet' ),
							),
							self::$prefix . '-top-border-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Top Border', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
									'em' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 12,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--borderTopWidth',
									'responsive' => true,
								),
							),
							self::$prefix . '-bottom-border-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Bottom Border', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
									'em' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 12,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--borderBottomWidth',
									'responsive' => true,
								),
							),
							self::$prefix . '-row-border-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Top', 'kemet' ),
										'id'    => 'top',
									),
									array(
										'title' => __( 'Bottom', 'kemet' ),
										'id'    => 'bottom',
									),
								),
								'preview'   => array(
									'top'    => array(
										'selector' => $selector,
										'property' => '--borderTopColor',
									),
									'bottom' => array(
										'selector' => $selector,
										'property' => '--borderBottomColor',
									),
								),
							),
							self::$prefix . '-columns-title' => array(
								'type'  => 'kmt-title',
								'label' => __( 'Columns Settings', 'kemet' ),
							),
							self::$prefix . '-columns-border-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Border', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
									'em' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 12,
									),
								),
								'preview'      => array(
									'selector'   => $selector . ' .site-' . self::$prefix . '-inner-wrap > .site-footer-section:after',
									'property'   => '--borderLeftWidth',
									'responsive' => true,
								),
							),
							self::$prefix . '-columns-border-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .site-' . self::$prefix . '-inner-wrap > .site-footer-section:after',
										'property' => '--borderLeftColor',
									),
								),
							),
						),
					),
				),
			),

		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix . '-builder',
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
		$top_footer_sections = array(
			'section-' . self::$prefix . '-builder' => array(
				'priority' => 45,
				'title'    => __( 'Top Footer', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $top_footer_sections );

	}

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials = array_fill_keys(
			array( self::$prefix . '-columns-direction', self::$prefix . '-columns', self::$prefix . '-layout' ),
			array(
				'selector'            => '#colophon',
				'container_inclusive' => true,
				'render_callback'     => array( Kemet_Footer_Markup::get_instance(), 'footer_markup' ),
			)
		);
		return array_merge( $partials, $new_partials );
	}
}

new Kemet_Top_Footer_Customizer();
