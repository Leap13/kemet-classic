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
		self::$prefix    = 'search-box';
		$selector        = '.kmt-search-box-form .search-field';
		$parent_selector = '.kmt-header-item-search-box';
		$search_options  = array(
			self::$prefix . '-icon-tabs'   => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-icon-size' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Icon Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 5,
										'step' => 1,
										'max'  => 50,
									),
								),
								'preview'      => array(
									'selector'   => $parent_selector . ' .kmt-search-box-form::after',
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-icon-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Icon Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $parent_selector . ' .kmt-search-box-form::after',
										'property' => '--inputColor',
									),
									'hover'   => array(
										'selector' => $parent_selector . ' .kmt-search-box-form:hover::after',
										'property' => '--inputColor',
									),
								),
							),
						),
					),
				),
			),
			self::$prefix . '-search-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Enter Width', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 100,
										'step' => 1,
										'max'  => 600,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => 'width',
									'responsive' => true,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-typography' => array(
								'type'      => 'kmt-typography',
								'transport' => 'postMessage',
								'label'     => __( 'Font Typography', 'kemet' ),
								'preview'   => array(
									'selector' => $selector,
								),
							),
							self::$prefix . '-border-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Border Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--inputBorderWidth',
									'responsive' => true,
								),
							),
							self::$prefix . '-text-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Focus', 'kemet' ),
										'id'    => 'focus',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--inputColor',
									),
									'focus'   => array(
										'selector' => $selector,
										'property' => '--inputFocusColor',
									),
								),
							),
							self::$prefix . '-bg-color'   => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Focus', 'kemet' ),
										'id'    => 'focus',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--inputBackgroundColor',
									),
									'focus'   => array(
										'selector' => $selector,
										'property' => '--inputFocusBackgroundColor',
									),
								),
							),
							self::$prefix . '-border-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Focus', 'kemet' ),
										'id'    => 'focus',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--inputBorderColor',
									),
									'focus'   => array(
										'selector' => $selector,
										'property' => '--inputFocusBorderColor',
									),
								),
							),
						),
					),
				),
			),
		);

		$search_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-header-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $search_options,
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
			'section-header-' . self::$prefix => array(
				'priority' => 55,
				'title'    => __( 'Search Box', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $search_sections );

	}
}


new Kemet_Header_Search_Box_Customizer();


