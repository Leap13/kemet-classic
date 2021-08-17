<?php
/**
 * Footer Menu Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Menu ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Footer_Menu_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'footer-menu';
		$selector         = '#' . self::$prefix;
		$register_options = array(
			self::$prefix . '-title'         => array(
				'type'  => 'kmt-title',
				'label' => __( 'Menu Settings', 'kemet' ),
			),
			self::$prefix . '-tabs'          => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-spacing' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Menu Spacing', 'kemet' ),
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
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
							self::$prefix . '-item-spacing' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'label'          => __( 'Menu Item Spacing', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector' => $selector . ' li > a',
									'property' => '--padding',
									'sides'    => false,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-font-size'   => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							// self::$prefix . '-font-family'                  => array(
							// 'default'   => 'inherit',
							// 'type'      => 'kmt-font-family',
							// 'transport' => 'postMessage',
							// 'label'     => __( 'Font Family', 'kemet' ),
							// 'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-font-weight]',
							// ),
							// self::$prefix . '-font-weight'                  => array(
							// 'default'   => 'inherit',
							// 'type'      => 'kmt-font-weight',
							// 'transport' => 'postMessage',
							// 'label'     => __( 'Font Weight', 'kemet' ),
							// 'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-font-family]',
							// ),
							self::$prefix . '-text-transform' => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Text Transform', 'kemet' ),
								'choices'   => array(
									''           => __( 'Default', 'kemet' ),
									'none'       => __( 'None', 'kemet' ),
									'capitalize' => __( 'Capitalize', 'kemet' ),
									'uppercase'  => __( 'Uppercase', 'kemet' ),
									'lowercase'  => __( 'Lowercase', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector,
									'property' => '--textTransform',
								),
							),
							self::$prefix . '-font-style'  => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Font Style', 'kemet' ),
								'choices'   => array(
									'inherit' => __( 'Inherit', 'kemet' ),
									'normal'  => __( 'Normal', 'kemet' ),
									'italic'  => __( 'Italic', 'kemet' ),
									'oblique' => __( 'Oblique', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector,
									'property' => '--fontStyle',
								),
							),
							self::$prefix . '-line-height' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--lineHeight',
									'responsive' => true,
								),
							),
							self::$prefix . '-letter-spacing' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Letter Spacing', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0.1,
										'step' => 0.1,
										'max'  => 10,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--letterSpacing',
									'responsive' => true,
								),
							),
							self::$prefix . '-bg-color'    => array(
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
										'selector' => $selector,
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-link-color'  => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Link Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
									array(
										'title' => __( 'Active', 'kemet' ),
										'id'    => 'active',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector,
										'property' => '--headingLinksColor',
									),
									'hover'   => array(
										'selector' => $selector,
										'property' => '--linksHoverColor',
									),
									'active'  => array(
										'selector' => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
										'property' => '--headingLinksColor',
									),
								),
							),
							self::$prefix . '-link-h-border-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Link Hover Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' > li > a:hover',
										'property' => '--borderBottomColor',
									),
								),
							),
							self::$prefix . '-link-active-bg-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Active Link Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-link-active-border-radius' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
									'property'   => 'border-radius',
									'responsive' => true,
								),
							),
							self::$prefix . '-link-bottom-border-width-hover' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Link Bottom Border Size on Hover', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => $selector . ' > li > a',
									'property'   => '--borderBottomWidth',
									'responsive' => true,
								),
							),
						),
					),
				),
			),
			self::$prefix . '-submenu-title' => array(
				'type'  => 'kmt-title',
				'label' => __( 'Submenu Settings', 'kemet' ),
			),
			self::$prefix . 'submenu-tabs'   => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-submenu-width' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Submenu Width', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 100,
										'step' => 1,
										'max'  => 500,
									),
								),
								'preview'      => array(
									'selector' => $selector . ' > li ul',
									'property' => 'width',
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-submenu-border-top-width' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Top Border Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 50,
									),
								),
								'preview'      => array(
									'selector' => $selector . ' > li ul',
									'property' => 'border-top-width',
								),
							),
							self::$prefix . '-submenu-font-size' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $selector . ' > li ul > li > a',
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							// self::$prefix . '-submenu-font-family'          => array(
							// 'type'      => 'kmt-font-family',
							// 'default'   => 'inherit',
							// 'transport' => 'postMessage',
							// 'label'     => __( 'Font Family', 'kemet' ),
							// 'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-submenu-font-weight]',
							// ),
							// self::$prefix . '-submenu-font-weight'          => array(
							// 'type'      => 'kmt-font-weight',
							// 'default'   => 'inherit',
							// 'transport' => 'postMessage',
							// 'label'     => __( 'Font Weight', 'kemet' ),
							// 'connect'   => KEMET_THEME_SETTINGS . '[' . self::$prefix . '-submenu-font-family]',
							// ),
							self::$prefix . '-submenu-text-transform' => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Text Transform', 'kemet' ),
								'choices'   => array(
									''           => __( 'Default', 'kemet' ),
									'none'       => __( 'None', 'kemet' ),
									'capitalize' => __( 'Capitalize', 'kemet' ),
									'uppercase'  => __( 'Uppercase', 'kemet' ),
									'lowercase'  => __( 'Lowercase', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector . ' > li ul > li > a',
									'property' => '--textTransform',
								),
							),
							self::$prefix . '-submenu-font-style' => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Font Style', 'kemet' ),
								'choices'   => array(
									'inherit' => __( 'Inherit', 'kemet' ),
									'normal'  => __( 'Normal', 'kemet' ),
									'italic'  => __( 'Italic', 'kemet' ),
									'oblique' => __( 'Oblique', 'kemet' ),
								),
								'preview'   => array(
									'selector' => $selector . ' > li ul > li > a',
									'property' => '--fontStyle',
								),
							),
							self::$prefix . '-submenu-line-height' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
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
								'preview'      => array(
									'selector'   => $selector . ' > li ul > li > a',
									'property'   => '--lineHeight',
									'responsive' => true,
								),
							),
							self::$prefix . '-submenu-letter-spacing' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Letter Spacing', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0.1,
										'step' => 0.1,
										'max'  => 10,
									),
								),
								'preview'      => array(
									'selector'   => $selector . ' > li ul > li > a',
									'property'   => '--letterSpacing',
									'responsive' => true,
								),
							),
							self::$prefix . '-submenu-border-top-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Border Top Color', 'kemet' ),
								'tab'       => __( 'Normal', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' > li ul',
										'property' => '--borderTopColor',
									),
								),
							),
							self::$prefix . '-submenu-bg-color'  => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Background Color', 'kemet' ),
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
										'selector' => $selector . ' > li ul > li > a',
										'property' => '--backgroundColor',
									),
									'hover'   => array(
										'selector' => $selector . ' > li ul > li > a:hover',
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-submenu-link-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Link Color', 'kemet' ),
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
										'selector' => $selector . ' > li ul > li > a',
										'property' => '--headingLinksColor',
									),
									'hover'   => array(
										'selector' => $selector . ' > li ul > li > a:hover',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-submenu-link-separator-color' => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Separator Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Text', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => $selector . ' > li ul > li > a',
										'property' => '--borderBottomColor',
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
				'section' => 'section-' . self::$prefix,
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
		$register_sections = array(
			'section-' . self::$prefix => array(
				'priority' => 85,
				'title'    => __( 'Footer Menu', 'kemet' ),
				'panel'    => 'panel-footer-builder-group',
			),
		);

		return array_merge( $sections, $register_sections );
	}
}


new Kemet_Footer_Menu_Customizer();

