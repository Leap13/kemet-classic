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
		$selector               = '#' . self::$prefix;
		$offcanvas_menu_options = array(
			self::$prefix . '-menu-title'                => array(
				'type'  => 'kmt-title',
				'label' => __( 'Menu Settings', 'kemet' ),
			),
			self::$prefix . '-tabs'                      => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-item-spacing'                => array(
								'transport'      => 'postMessage',
								'type'           => 'kmt-spacing',
								'responsive'     => true,
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
									'selector'   => $selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap',
									'property'   => '--padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-link-bg-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'label'      => __( 'Link Background Color', 'kemet' ),
								'responsive' => true,
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $selector . ' li > a, ' . $selector . ' li > .kmt-menu-item-wrap',
										'property' => '--backgroundColor',
									),
									'hover'      => array(
										'selector' => $selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover',
										'property' => '--backgroundColor',
									),
								),
							),
							self::$prefix . '-link-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'label'      => __( 'Link Color', 'kemet' ),
								'responsive' => true,
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $selector,
										'property' => '--headingLinksColor',
									),
									'hover'      => array(
										'selector' => $selector,
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-link-border-color' => array(
								'transport'  => 'postMessage',
								'type'       => 'kmt-color',
								'label'      => __( 'Link Border Color', 'kemet' ),
								'responsive' => true,
								'pickers'    => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'    => array(
									'responsive' => true,
									'initial'    => array(
										'selector' => $selector,
										'property' => '--borderBottomColor',
									),
									'hover'      => array(
										'selector' => $selector . ' li > a:hover, ' . $selector . ' li > .kmt-menu-item-wrap:hover',
										'property' => '--borderBottomColor',
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
							self::$prefix . '-border-bottom-width' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'default'      => Kemet_Customizer::responsive_default_value( 1, 'px' ),
								'transport'    => 'postMessage',
								'label'        => __( 'Link Bottom Border Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--borderBottomWidth',
									'responsive' => true,
								),
							),
						),
					),
				),
			),
			self::$prefix . '-submenu-title'             => array(
				'type'  => 'kmt-title',
				'label' => __( 'Submenu Settings', 'kemet' ),
			),
			self::$prefix . '-submenu-link-bg-color'     => array(
				'transport'  => 'postMessage',
				'type'       => 'kmt-color',
				'label'      => __( 'Link Background Color', 'kemet' ),
				'responsive' => true,
				'pickers'    => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'    => array(
					'responsive' => true,
					'initial'    => array(
						'selector' => $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap',
						'property' => '--backgroundColor',
					),
					'hover'      => array(
						'selector' => $selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover',
						'property' => '--backgroundColor',
					),
				),
			),
			self::$prefix . '-submenu-link-color'        => array(
				'transport'  => 'postMessage',
				'type'       => 'kmt-color',
				'label'      => __( 'Link Color', 'kemet' ),
				'responsive' => true,
				'pickers'    => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'    => array(
					'responsive' => true,
					'initial'    => array(
						'selector' => $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap',
						'property' => '--headingLinksColor',
					),
					'hover'      => array(
						'selector' => $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap',
						'property' => '--linksHoverColor',
					),
				),
			),
			self::$prefix . '-submenu-link-border-color' => array(
				'transport'  => 'postMessage',
				'type'       => 'kmt-color',
				'label'      => __( 'Link Border Color', 'kemet' ),
				'responsive' => true,
				'pickers'    => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
				'preview'    => array(
					'responsive' => true,
					'initial'    => array(
						'selector' => $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap',
						'property' => '--borderBottomColor',
					),
					'hover'      => array(
						'selector' => $selector . ' > li ul > li > a:hover, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap:hover',
						'property' => '--borderBottomColor',
					),
				),
			),
			self::$prefix . '-submenu-typography'        => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => $selector . ' > li ul > li > a, ' . $selector . ' > li ul > li > .kmt-menu-item-wrap',
				),
			),
		);

		$offcanvas_menu_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-header-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $offcanvas_menu_options,
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


