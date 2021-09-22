<?php
/**
 * Header Search Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Search_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix    = 'search';
		$selector        = '.kmt-search-menu-icon form .search-field';
		$parent_selector = '.kmt-header-item-search';
		$search_options  = array(
			self::$prefix . '-title'       => array(
				'type'  => 'kmt-title',
				'label' => __( 'Search Styles', 'kemet' ),
			),
			self::$prefix . '-search-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-icon-size'   => array(
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
									'selector'   => $parent_selector . ' .kemet-search-icon',
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							self::$prefix . '-input-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Search Box Width', 'kemet' ),
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
							self::$prefix . '-z-index'     => array(
								'type'      => 'kmt-number',
								'transport' => 'postMessage',
								'label'     => __( 'Search Box Z-index', 'kemet' ),
								'min'       => 1,
								'step'      => 1,
								'max'       => 99999,
								'preview'   => array(
									'selector' => '.kmt-search-menu-icon',
									'property' => 'z-index',
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
								'label'     => __( 'Icon Colors', 'kemet' ),
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
										'selector' => $parent_selector . ' .kemet-search-icon',
										'property' => '--headingLinksColor',
									),
									'hover'   => array(
										'selector' => $parent_selector . ' .kemet-search-icon',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-form-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $parent_selector . ' form',
										'property' => 'background-color',
									),
								),
							),
							self::$prefix . '-input-text-color' => array(
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
							self::$prefix . '-input-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Input Background Color', 'kemet' ),
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
							self::$prefix . '-typography' => array(
								'type'      => 'kmt-typography',
								'transport' => 'postMessage',
								'label'     => __( 'Typography', 'kemet' ),
								'preview'   => array(
									'selector' => $selector,
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
				'title'    => __( 'Search', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $search_sections );

	}
}


new Kemet_Header_Search_Customizer();


