<?php
/**
 * Bottom Header Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Bottom_Header_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'bottom-header';
		$selector         = '.kmt-bottom-header-wrap .bottom-header-bar';
		$register_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-layout'     => array(
								'type'      => 'kmt-select',
								'default'   => 'content',
								'label'     => __( 'Container Layout', 'kemet' ),
								'transport' => 'postMessage',
								'choices'   => array(
									'full'      => __( 'Full Width', 'kemet' ),
									'content'   => __( 'Content Width', 'kemet' ),
									'boxed'     => __( 'Boxed Content', 'kemet' ),
									'stretched' => __( 'Stretched Content', 'kemet' ),
								),
							),
							self::$prefix . '-min-height' => array(
								'type'         => 'kmt-slider',
								'divider'      => true,
								'responsive'   => true,
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
							self::$prefix . '-sticky-background' => array(
								'type'       => 'kmt-background',
								'divider'    => true,
								'transport'  => 'postMessage',
								'label'      => __( 'Sticky Background', 'kemet' ),
								'responsive' => true,
								'preview'    => array(
									'selector'   => '.kmt-sticky-bottom-bar #sitehead ' . $selector . '.kmt-is-sticky',
									'responsive' => true,
								),
								'context'    => array(
									array(
										'setting' => 'enable-sticky-bottom',
										'value'   => true,
									),
									array(
										'setting' => 'enable-sticky-mobile-bottom',
										'value'   => true,
									),
									'relation' => 'OR',
								),
							),
							self::$prefix . '-layout-color' => array(
								'type'      => 'kmt-color',
								'divider'   => true,
								'transport' => 'postMessage',
								'label'     => __( 'Content Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' .header-bar-content',
										'property' => '--backgroundColor',
									),
								),
								'context'   => array(
									array(
										'setting'  => self::$prefix . '-layout',
										'operator' => 'in_array',
										'value'    => array( 'boxed', 'stretched' ),
									),
								),
							),
							self::$prefix . '-border-bottom' => array(
								'type'      => 'kmt-border',
								'label'     => __( 'Border Bottom', 'kemet' ),
								'transport' => 'postMessage',
								'preview'   => array(
									'selector' => $selector,
									'property' => '--borderBottom',
								),
							),
							self::$prefix . '-sticky-border-bottom' => array(
								'type'      => 'kmt-border',
								'label'     => __( 'Sticky Border Bottom', 'kemet' ),
								'transport' => 'postMessage',
								'preview'   => array(
									'selector' => '.kmt-sticky-bottom-bar #sitehead ' . $selector . '.kmt-is-sticky',
									'property' => '--borderBottom',
								),
								'context'   => array(
									array(
										'setting' => 'enable-sticky-bottom',
										'value'   => true,
									),
									array(
										'setting' => 'enable-sticky-mobile-bottom',
										'value'   => true,
									),
									'relation' => 'OR',
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
		$bottom_header_sections = array(
			'section-' . self::$prefix . '-builder' => array(
				'priority' => 50,
				'title'    => __( 'Bottom Header', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $bottom_header_sections );

	}
}


new Kemet_Bottom_Header_Customizer();


