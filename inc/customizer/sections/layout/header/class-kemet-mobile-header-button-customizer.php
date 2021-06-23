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

class Kemet_Header_Mobile_Button_Customizer extends Kemet_Customizer_Register {

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
		self::$button_items = apply_filters( 'kemet_header_mobile_button_items', array( 'header-mobile-button-1', 'header-mobile-button-2' ) );
		$register_options   = array();
		foreach ( self::$button_items as $button ) {
			$prefix           = $button;
			$num              = explode( 'header-mobile-button-', $prefix )[1];
			$button_options   = array(
				$prefix . '-controls-tabs'  => array(
					'section'  => 'section-' . $prefix,
					'type'     => 'kmt-tabs',
					'priority' => 0,
				),
				$prefix . '-label'          => array(
					'type'      => 'text',
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
					'type'      => 'checkbox',
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
					'type'      => 'checkbox',
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
					'type'      => 'checkbox',
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
					'type'      => 'checkbox',
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
				$prefix . '-colors-group'   => array(
					'type'     => 'kmt-group',
					'section'  => 'section-' . $prefix,
					'priority' => 20,
					'label'    => __( 'Colors', 'kemet' ),
					'context'  => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
				),
				$prefix . '-color'          => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
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
				),
				$prefix . '-bg-color'       => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
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
				),
				$prefix . '-border-color'   => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
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
				),
				$prefix . '-h-color'        => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
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
				),
				$prefix . '-h-bg-color'     => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
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
				),
				$prefix . '-h-border-color' => array(
					'parent-id' => $prefix . '-colors-group',
					'section'   => 'section-' . $prefix,
					'priority'  => 5,
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
				),
				$prefix . '-font-size'      => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 25,
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
				),
				$prefix . '-font-family'    => array(
					'type'      => 'kmt-font-family',
					'transport' => 'postMessage',
					'label'     => __( 'Font Family', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 30,
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
					'priority'  => 35,
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
					'priority'  => 40,
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
				),
				$prefix . '-font-style'     => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Font Style', 'kemet' ),
					'section'   => 'section-' . $prefix,
					'priority'  => 45,
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
				),
				$prefix . '-line-height'    => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 50,
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
				),
				$prefix . '-letter-spacing' => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-' . $prefix,
					'priority'     => 55,
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
				),
				$prefix . '-border-width'   => array(
					'type'        => 'kmt-slider',
					'transport'   => 'postMessage',
					'section'     => 'section-' . $prefix,
					'priority'    => 60,
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
				),
				$prefix . '-padding'        => array(
					'type'           => 'kmt-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-' . $prefix,
					'priority'       => 65,
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
				),
				$prefix . '-margin'         => array(
					'type'           => 'kmt-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-' . $prefix,
					'priority'       => 65,
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
			$num            = explode( 'header-mobile-button-', $prefix )[1];
			$button_section = array(
				'section-' . $prefix => array(
					'priority' => 60,
					'title'    => sprintf( __( 'Header Mobile Button %s', 'kemet' ), $num ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $button_section );
		}

		return array_merge( $sections, $register_sections );

	}
}


new Kemet_Header_Mobile_Button_Customizer();


