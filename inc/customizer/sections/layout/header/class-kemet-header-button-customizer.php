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
	 * Button Items
	 *
	 * @access private
	 * @var array
	 */
	private static $button_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$button_items = apply_filters( 'kemet_header_button_items', array( 'header-button-1', 'header-button-2' ) );
		$register_options   = array();
		foreach ( self::$button_items as $button ) {
			$prefix           = $button;
			$num              = explode( 'header-button-', $prefix )[1];
			$selector         = '.' . $button;
			$button_options   = array(
				$prefix . '-controls-tabs'  => array(
					'section'  => 'section-' . $prefix,
					'type'     => 'kmt-tabs',
					'priority' => 0,
				),
				$prefix . '-label'          => array(
					'type'      => 'text',
					'default'   => __( 'Button', 'kemet' ),
					'transport' => 'postMessage',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
					'label'     => __( 'Label', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
				),
				$prefix . '-url'            => array(
					'type'      => 'text',
					'transport' => 'postMessage',
					'section'   => 'section-' . $prefix,
					'priority'  => 10,
					'label'     => __( 'URL', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
				),
				$prefix . '-open-new-tab'   => array(
					'type'      => 'kmt-switcher',
					'transport' => 'postMessage',
					'section'   => 'section-' . $prefix,
					'priority'  => 15,
					'label'     => __( 'Open in New Tab?', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
				),
				$prefix . '-link-nofollow'  => array(
					'type'      => 'kmt-switcher',
					'transport' => 'postMessage',
					'section'   => 'section-' . $prefix,
					'priority'  => 15,
					'label'     => __( 'Set link to nofollow?', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
				),
				$prefix . '-link-sponsored' => array(
					'type'      => 'kmt-switcher',
					'transport' => 'postMessage',
					'section'   => 'section-' . $prefix,
					'priority'  => 15,
					'label'     => __( 'Set link attribute Sponsored?', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
				),
				$prefix . '-link-download'  => array(
					'type'      => 'kmt-switcher',
					'transport' => 'postMessage',
					'section'   => 'section-' . $prefix,
					'priority'  => 15,
					'label'     => __( 'Set link to Download?', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
				),
				$prefix . '-color'          => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 20,
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
					'preview'   => array(
						'selector' => $selector,
						'property' => '--buttonColor',
					),
				),
				$prefix . '-bg-color'       => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 25,
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
					'preview'   => array(
						'selector' => $selector,
						'property' => '--buttonBackgroundColor',
					),
				),
				$prefix . '-border-color'   => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 30,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Border Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector,
						'property' => '--borderColor',
					),
				),
				$prefix . '-h-color'        => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 35,
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
					'preview'   => array(
						'selector' => $selector,
						'property' => '--buttonHoverColor',
					),
				),
				$prefix . '-h-bg-color'     => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 40,
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
					'preview'   => array(
						'selector' => $selector,
						'property' => '--buttonBackgroundHoverColor',
					),
				),
				$prefix . '-h-border-color' => array(
					'section'   => 'section-' . $prefix,
					'priority'  => 45,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Border Color', 'kemet' ),
					'tab'       => __( 'Hover', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector,
						'property' => '--borderHoverColor',
					),
				),
				$prefix . '-font-size'      => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 50,
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
				$prefix . '-font-family'    => array(
					'type'      => 'kmt-font-family',
					'transport' => 'postMessage',
					'label'     => __( 'Font Family', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 55,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
				),
				$prefix . '-font-weight'    => array(
					'type'      => 'kmt-font-weight',
					'transport' => 'postMessage',
					'label'     => __( 'Font Weight', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 60,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-family]',
				),
				$prefix . '-text-transform' => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Text Transform', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 70,
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
				$prefix . '-font-style'     => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Font Style', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 75,
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
				$prefix . '-line-height'    => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 80,
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
				$prefix . '-letter-spacing' => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 85,
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
				$prefix . '-border-width'   => array(
					'type'        => 'kmt-slider',
					'default'     => 1,
					'transport'   => 'postMessage',
					'section'     => 'section-' . $prefix,
					'priority'    => 90,
					'label'       => __( 'Border Size', 'kemet' ),
					'suffix'      => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 50,
					),
					'context'     => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'     => array(
						'selector' => $selector,
						'property' => '--borderWidth',
					),
				),
				$prefix . '-padding'        => array(
					'type'           => 'kmt-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-' . $prefix,
					'priority'       => 95,
					'label'          => __( 'Padding', 'kemet' ),
					'linked_choices' => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'kemet' ),
						'right'  => __( 'Right', 'kemet' ),
						'bottom' => __( 'Bottom', 'kemet' ),
						'left'   => __( 'Left', 'kemet' ),
					),
					'context'        => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
					'preview'        => array(
						'selector' => $selector,
						'property' => '--padding',
						'sides'    => false,
					),
				),
				$prefix . '-margin'         => array(
					'type'           => 'kmt-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-' . $prefix,
					'priority'       => 100,
					'label'          => __( 'Margin', 'kemet' ),
					'linked_choices' => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'kemet' ),
						'right'  => __( 'Right', 'kemet' ),
						'bottom' => __( 'Bottom', 'kemet' ),
						'left'   => __( 'Left', 'kemet' ),
					),
					'context'        => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
					'preview'        => array(
						'selector' => $selector,
						'property' => '--margin',
						'sides'    => false,
					),
				),
			);
			$register_options = array_merge( $register_options, $button_options );
		}

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_sections = array();
		foreach ( self::$button_items as $button ) {
			$prefix         = $button;
			$num            = explode( 'header-button-', $prefix )[1];
			$button_section = array(
				'section-' . $prefix => array(
					'priority' => 60,
					'title'    => sprintf( __( 'Header Button %s', 'kemet' ), $num ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $button_section );
		}

		return array_merge( $sections, $register_sections );

	}
}


new Kemet_Header_Button_Customizer();


