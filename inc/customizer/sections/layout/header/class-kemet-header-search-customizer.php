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
		self::$prefix            = 'search';
		$selector                = '.kmt-search-menu-icon form .search-field';
				$parent_selector = '.kmt-header-item-search';
		$search_options          = array(
			self::$prefix . '-controls-tabs'          => array(
				'section'  => 'section-header-' . self::$prefix,
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			self::$prefix . '-input-width'            => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 5,
				'label'        => __( 'Search Box Width', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 100,
						'step' => 1,
						'max'  => 600,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'general',
					),
				),
			),
			self::$prefix . '-icon-size'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 10,
				'label'        => __( 'Icon Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 5,
						'step' => 1,
						'max'  => 50,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'      => array(
					'selector' => $parent_selector . ' .kemet-search-icon',
					'property' => '--fontSize',
				),
			),
			self::$prefix . '-icon-color'             => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 15,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $parent_selector . ' .kemet-search-icon',
					'property' => '--headingLinksColor',
				),
			),
			self::$prefix . '-icon-h-color'           => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 20,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Icon Hover Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $parent_selector . ' .kemet-search-icon',
					'property' => '--linksHoverColor',
				),
			),
			self::$prefix . '-input-text-color'       => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 30,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--inputColor',
				),
			),
			self::$prefix . '-form-bg-color'          => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 35,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $parent_selector . ' form',
					'property' => 'background-color',
				),
			),
			self::$prefix . '-input-bg-color'         => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 40,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Input Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--inputBackgroundColor',
				),
			),
			self::$prefix . '-input-focus-text-color' => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 42,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Focus Text Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--inputFocusColor',
				),
			),
			self::$prefix . '-input-focus-bg-color'   => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 43,
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Input Focus Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--inputFocusBackgroundColor',
				),
			),
			self::$prefix . '-font-size'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 45,
				'label'        => __( 'Font Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 200,
					),
					'em' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'      => array(
					'selector' => $selector,
					'property' => '--fontSize',
				),
			),
			self::$prefix . '-font-family'            => array(
				'type'      => 'kmt-font-family',
				'transport' => 'postMessage',
				'label'     => __( 'Font Family', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 50,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-font-weight]',
			),
			self::$prefix . '-font-weight'            => array(
				'type'      => 'kmt-font-weight',
				'transport' => 'postMessage',
				'label'     => __( 'Font Weight', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 55,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[ ' . self::$prefix . ' -font-family]',
			),
			self::$prefix . '-text-transform'         => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Text Transform', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 60,
				'choices'   => array(
					''           => __( 'Default', 'kemet' ),
					'none'       => __( 'None', 'kemet' ),
					'capitalize' => __( 'Capitalize', 'kemet' ),
					'uppercase'  => __( 'Uppercase', 'kemet' ),
					'lowercase'  => __( 'Lowercase', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--textTransform',
				),
			),
			self::$prefix . '-font-style'             => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 65,
				'choices'   => array(
					'inherit' => __( 'Inherit', 'kemet' ),
					'normal'  => __( 'Normal', 'kemet' ),
					'italic'  => __( 'Italic', 'kemet' ),
					'oblique' => __( 'Oblique', 'kemet' ),
				),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'   => array(
					'selector' => $selector,
					'property' => '--fontStyle',
				),
			),
			self::$prefix . '-line-height'            => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 70,
				'label'        => __( 'Line Height', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
					'em' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'      => array(
					'selector' => $selector,
					'property' => '--lineHeight',
				),
			),
			self::$prefix . '-letter-spacing'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 75,
				'label'        => __( 'Letter Spacing', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'preview'      => array(
					'selector' => $selector,
					'property' => '--letterSpacing',
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


