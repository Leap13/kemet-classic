<?php
/**
 * Header Mobile Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Mobile_Menu_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix           = 'offcanvas-menu';
		$offcanvas_menu_options = array(
			self::$prefix . '-controls-tabs'               => array(
				'section'  => 'section-header-' . self::$prefix,
				'type'     => 'kmt-tabs',
				'priority' => 0,
			),
			self::$prefix . '-link-bg-color'               => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 1,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-link-color'                  => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 10,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-link-border-color'           => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 15,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-link-h-bg-color'             => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 20,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Hover Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-link-h-color'                => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 25,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Hover Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-link-h-border-color'         => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 30,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Hover Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-font-size'                   => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 35,
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
			self::$prefix . '-font-family'                 => array(
				'default'   => 'inherit',
				'type'      => 'kmt-font-family',
				'transport' => 'postMessage',
				'label'     => __( 'Font Family', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 40,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-font-weight]',
			),
			self::$prefix . '-font-weight'                 => array(
				'default'   => 'inherit',
				'type'      => 'kmt-font-weight',
				'transport' => 'postMessage',
				'label'     => __( 'Font Weight', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 45,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-font-family]',
			),
			self::$prefix . '-text-transform'              => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Text Transform', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 50,
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
			self::$prefix . '-font-style'                  => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 55,
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
			self::$prefix . '-line-height'                 => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 60,
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
			self::$prefix . '-letter-spacing'              => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 65,
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
			self::$prefix . '-border-bottom-width'         => array(
				'type'         => 'kmt-responsive-slider',
				'default'      => Kemet_Customizer::responsive_default_value( 1, 'px' ),
				'section'      => 'section-header-' . self::$prefix,
				'transport'    => 'postMessage',
				'priority'     => 70,
				'label'        => __( 'Link Bottom Border Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					),
				),
				'context'      => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-title'               => array(
				'type'     => 'kmt-title',
				'section'  => 'section-header-' . self::$prefix,
				'priority' => 75,
				'label'    => __( 'Submenu Settings', 'kemet' ),
				'context'  => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-bg-color'       => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 80,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-color'          => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 90,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-border-color'   => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 95,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-h-bg-color'     => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 100,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Hover Background Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-h-color'        => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 105,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Hover Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-link-h-border-color' => array(
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 110,
				'transport' => 'postMessage',
				'type'      => 'kmt-reponsive-color',
				'label'     => __( 'Link Hover Border Color', 'kemet' ),
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
			),
			self::$prefix . '-submenu-font-size'           => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 115,
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
			self::$prefix . '-submenu-font-family'         => array(
				'type'      => 'kmt-font-family',
				'transport' => 'postMessage',
				'label'     => __( 'Font Family', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 120,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-submenu-font-weight]',
			),
			self::$prefix . '-submenu-font-weight'         => array(
				'type'      => 'kmt-font-weight',
				'transport' => 'postMessage',
				'label'     => __( 'Font Weight', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 125,
				'context'   => array(
					array(
						'setting' => 'tab',
						'value'   => 'design',
					),
				),
				'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-submenu-font-family]',
			),
			self::$prefix . '-submenu-text-transform'      => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Text Transform', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 130,
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
			self::$prefix . '-submenu-font-style'          => array(
				'type'      => 'select',
				'transport' => 'postMessage',
				'label'     => __( 'Font Style', 'kemet' ),
				'section'   => 'section-header-' . self::$prefix,
				'priority'  => 135,
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
			self::$prefix . '-submenu-line-height'         => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 140,
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
			self::$prefix . '-submenu-letter-spacing'      => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'section-header-' . self::$prefix,
				'priority'     => 145,
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
			self::$prefix . '-item-spacing'                => array(
				'section'        => 'section-header-' . self::$prefix,
				'priority'       => 150,
				'transport'      => 'postMessage',
				'type'           => 'kmt-responsive-spacing',
				'label'          => __( 'Menu Item Spacing', 'kemet' ),
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

		return array_merge( $options, $offcanvas_menu_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$offcanvas_menu_sections = array(
			'section-header-' . self::$prefix => array(
				'priority' => 70,
				'title'    => __( 'Off-Canvas Menu', 'kemet' ),
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $offcanvas_menu_sections );

	}
}


new Kemet_Header_Mobile_Menu_Customizer();


