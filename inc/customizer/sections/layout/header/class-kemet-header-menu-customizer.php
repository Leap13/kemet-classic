<?php
/**
 * Header Primary Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Header_Primary_Menu_Customizer extends Kemet_Customizer_Register {

	/**
	 * Menu Items
	 *
	 * @access private
	 * @var array
	 */
	private static $menu_items;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$menu_items = apply_filters( 'kemet_header_menu_items', array( 'primary-menu', 'secondary-menu' ) );
		$register_options = array();
		foreach ( self::$menu_items as $menu ) {
			$prefix       = $menu;
			$title        = ucfirst( explode( '-', $prefix )[0] );
			$selector     = '#' . $prefix;
			$menu_options = array(
				$prefix . '-controls-tabs'                => array(
					'section'  => 'section-header-' . $prefix,
					'type'     => 'kmt-tabs',
					'priority' => 0,
				),
				$prefix . '-font-size'                    => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 5,
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
				$prefix . '-font-family'                  => array(
					'default'   => 'inherit',
					'type'      => 'kmt-font-family',
					'transport' => 'postMessage',
					'label'     => __( 'Font Family', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 10,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-weight]',
				),
				$prefix . '-font-weight'                  => array(
					'default'   => 'inherit',
					'type'      => 'kmt-font-weight',
					'transport' => 'postMessage',
					'label'     => __( 'Font Weight', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 15,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-font-family]',
				),
				$prefix . '-text-transform'               => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Text Transform', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 20,
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
				$prefix . '-font-style'                   => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Font Style', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 25,
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
				$prefix . '-line-height'                  => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 30,
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
				$prefix . '-letter-spacing'               => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 35,
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
				$prefix . '-bg-color'                     => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 40,
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
						'selector' => $selector,
						'property' => '--backgroundColor',
					),
				),
				$prefix . '-link-color'                   => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 45,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector,
						'property' => '--headingLinksColor',
					),
				),
				$prefix . '-link-h-color'                 => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 55,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Hover Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector,
						'property' => '--linksHoverColor',
					),
				),
				$prefix . '-link-h-border-color'          => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 60,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Hover Border Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > li > a:hover',
						'property' => '--borderBottomColor',
					),
				),
				$prefix . '-link-active-bg-color'         => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 65,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Active Link Background Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
						'property' => '--backgroundColor',
					),
				),
				$prefix . '-link-active-color'            => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 70,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Active Link Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
						'property' => '--headingLinksColor',
					),
				),
				$prefix . '-link-active-border-radius'    => array(
					'type'         => 'kmt-responsive-slider',
					'section'      => 'section-header-' . $prefix,
					'transport'    => 'postMessage',
					'priority'     => 75,
					'label'        => __( 'Link Active Border Radius', 'kemet' ),
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
					'context'      => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'      => array(
						'selector' => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
						'property' => 'border-radius',
					),
				),
				$prefix . '-link-bottom-border-width-hover' => array(
					'type'         => 'kmt-responsive-slider',
					'section'      => 'section-header-' . $prefix,
					'transport'    => 'postMessage',
					'priority'     => 80,
					'label'        => __( 'Link Bottom Border Size on Hover', 'kemet' ),
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
					'preview'      => array(
						'selector' => $selector . ' > li > a',
						'property' => '--borderBottomWidth',
					),
				),
				$prefix . '-spacing'                      => array(
					'type'           => 'kmt-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-header-' . $prefix,
					'priority'       => 85,
					'label'          => __( 'Menu Spacing', 'kemet' ),
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
				$prefix . '-item-spacing'                 => array(
					'type'           => 'kmt-responsive-spacing',
					'transport'      => 'postMessage',
					'section'        => 'section-header-' . $prefix,
					'priority'       => 90,
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
					'preview'        => array(
						'selector' => $selector . ' li > a',
						'property' => '--padding',
						'sides'    => false,
					),
				),
				$prefix . '-submenu-title'                => array(
					'type'     => 'kmt-title',
					'section'  => 'section-header-' . $prefix,
					'priority' => 95,
					'label'    => __( 'Submenu Settings', 'kemet' ),
				),
				$prefix . '-submenu-width'                => array(
					'type'        => 'kmt-slider',
					'section'     => 'section-header-' . $prefix,
					'priority'    => 100,
					'transport'   => 'postMessage',
					'label'       => __( 'Submenu Width', 'kemet' ),
					'suffix'      => 'px',
					'input_attrs' => array(
						'min'  => 100,
						'step' => 1,
						'max'  => 500,
					),
					'context'     => array(
						array(
							'setting' => 'tab',
							'value'   => 'general',
						),
					),
					'preview'     => array(
						'selector' => $selector . ' > li ul',
						'property' => 'width',
					),
				),
				$prefix . '-submenu-border-top-width'     => array(
					'type'        => 'kmt-slider',
					'transport'   => 'postMessage',
					'section'     => 'section-header-' . $prefix,
					'priority'    => 105,
					'label'       => __( 'Top Border Size', 'kemet' ),
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
						'selector' => $selector . ' > li ul',
						'property' => 'border-top-width',
					),
				),
				$prefix . '-submenu-font-size'            => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 110,
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
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--fontSize',
					),
				),
				$prefix . '-submenu-font-family'          => array(
					'type'      => 'kmt-font-family',
					'default'   => 'inherit',
					'transport' => 'postMessage',
					'label'     => __( 'Font Family', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 115,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-submenu-font-weight]',
				),
				$prefix . '-submenu-font-weight'          => array(
					'type'      => 'kmt-font-weight',
					'default'   => 'inherit',
					'transport' => 'postMessage',
					'label'     => __( 'Font Weight', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 120,
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'connect'   => KEMET_THEME_SETTINGS . '[' . $prefix . '-submenu-font-family]',
				),
				$prefix . '-submenu-text-transform'       => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Text Transform', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 125,
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
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--textTransform',
					),
				),
				$prefix . '-submenu-font-style'           => array(
					'type'      => 'select',
					'transport' => 'postMessage',
					'label'     => __( 'Font Style', 'kemet' ),
					'section'   => 'section-header-' . $prefix,
					'priority'  => 130,
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
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--fontStyle',
					),
				),
				$prefix . '-submenu-line-height'          => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 135,
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
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--lineHeight',
					),
				),
				$prefix . '-submenu-letter-spacing'       => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-header-' . $prefix,
					'priority'     => 140,
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
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--letterSpacing',
					),
				),
				$prefix . '-submenu-border-top-color'     => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 145,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Border Top Color', 'kemet' ),
					'tab'       => __( 'Normal', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > li ul',
						'property' => '--borderTopColor',
					),
				),
				$prefix . '-submenu-bg-color'             => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 150,
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
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--backgroundColor',
					),
				),
				$prefix . '-submenu-link-color'           => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 155,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--headingLinksColor',
					),
				),
				$prefix . '-submenu-link-separator-color' => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 160,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Separator Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > li ul > li > a',
						'property' => '--borderBottomColor',
					),
				),
				$prefix . '-submenu-h-bg-color'           => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 165,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Background Hover Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > li ul > li > a:hover',
						'property' => '--backgroundColor',
					),
				),
				$prefix . '-submenu-link-h-color'         => array(
					'section'   => 'section-header-' . $prefix,
					'priority'  => 170,
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Link Hover Color', 'kemet' ),
					'context'   => array(
						array(
							'setting' => 'tab',
							'value'   => 'design',
						),
					),
					'preview'   => array(
						'selector' => $selector . ' > li ul > li > a:hover',
						'property' => '--linksHoverColor',
					),
				),
			);

			$register_options = array_merge( $register_options, $menu_options );
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
		foreach ( self::$menu_items as $menu ) {
			$prefix       = $menu;
			$title        = ucfirst( explode( '-', $prefix )[0] );
			$menu_section = array(
				'section-header-' . $prefix => array(
					'priority' => 65,
					'title'    => sprintf( __( '%s Menu', 'kemet' ), $title ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			$register_sections = array_merge( $register_sections, $menu_section );
		}

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Header_Primary_Menu_Customizer();


