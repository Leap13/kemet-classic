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
			$prefix   = $menu;
			$title    = ucfirst( explode( '-', $prefix )[0] );
			$selector = has_nav_menu( $menu ) ? '#' . $prefix : '#' . $prefix . ' > ul';

			$menu_options = array(
				$prefix . '-title'                     => array(
					'type'  => 'kmt-title',
					'label' => __( 'Menu Settings', 'kemet' ),
				),
				$prefix . '-items-hover-effect'        => array(
					'type'      => 'kmt-select',
					'default'   => 'none',
					'label'     => __( 'Hover Effect', 'kemet' ),
					'choices'   => array(
						'none'   => __( 'None', 'kemet' ),
						'underline-stroke' => __( 'Underline Stroke', 'kemet' ),
						'underline-fill' => __( 'Underline Fill', 'kemet' ),
						'underline-dots' => __( 'Underline Dots', 'kemet' ),
						'textcolor-fill' => __( 'Text Color Fill', 'kemet' ),
						'drawing-circle' => __( 'Top Bottom Lines', 'kemet' ),
					),
					'preview'   => array(
						'selector' => $selector,
						'attr'     => 'data-effect',
					),
				),
				$prefix . '-typography'                => array(
					'type'      => 'kmt-typography',
					'transport' => 'postMessage',
					'label'     => __( 'Typography', 'kemet' ),
					'preview'   => array(
						'selector' => $selector . ' > li > a',
					),
				),
				$prefix . '-bg-color'                  => array(
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'divider'   => true,
					'label'     => __( 'Background Color', 'kemet' ),
					'pickers'   => array(
						array(
							'title' => __( 'Initial', 'kemet' ),
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
				$prefix . '-link-color'                => array(
					'transport' => 'postMessage',
					'type'      => 'kmt-color',
					'label'     => __( 'Links Color', 'kemet' ),
					'pickers'   => array(
						array(
							'title' => __( 'Initial', 'kemet' ),
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
							'property' => '--linksColor',
						),
						'hover'   => array(
							'selector' => $selector,
							'property' => '--linksHoverColor',
						),
						'active'  => array(
							'selector' => $selector . ' > .current-menu-item > a, ' . $selector . ' > .current-menu-ancestor > a, ' . $selector . ' > .current_page_item > a',
							'property' => '--linksColor',
						),
					),
				),
				$prefix . '-link-active-bg-color'      => array(
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
				$prefix . '-link-active-border-radius' => array(
					'type'         => 'kmt-slider',
					'responsive'   => true,
					'divider'      => true,
					'transport'    => 'postMessage',
					'label'        => __( 'Link Active Border Radius', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 0,
							'step' => 1,
							'max'  => 50,
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
				$prefix . '-link-border-hover'         => array(
					'transport' => 'postMessage',
					'type'      => 'kmt-border',
					'divider'   => true,
					'label'     => __( 'Link Border on Hover', 'kemet' ),
					'preview'   => array(
						'selector' => $selector . ' > li > a',
						'property' => '--effectBorder',
					),
				),
				$prefix . '-spacing'                   => array(
					'type'           => 'kmt-spacing',
					'transport'      => 'postMessage',
					'responsive'     => true,
					'divider'        => true,
					'label'          => __( 'Menu Padding', 'kemet' ),
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
				$prefix . '-item-spacing'              => array(
					'type'           => 'kmt-spacing',
					'transport'      => 'postMessage',
					'label'          => __( 'Menu Item Padding', 'kemet' ),
					'linked_choices' => true,
					'responsive'     => true,
					'divider'        => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'kemet' ),
						'right'  => __( 'Right', 'kemet' ),
						'bottom' => __( 'Bottom', 'kemet' ),
						'left'   => __( 'Left', 'kemet' ),
					),
					'preview'        => array(
						'selector'   => $selector . ' li > a',
						'property'   => '--padding',
						'sides'      => false,
						'responsive' => true,
					),
				),
				$prefix . '-margin'                    => array(
					'type'           => 'kmt-spacing',
					'transport'      => 'postMessage',
					'responsive'     => true,
					'divider'        => true,
					'label'          => __( 'Menu Margin', 'kemet' ),
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
						'property'   => '--margin',
						'sides'      => false,
						'responsive' => true,
					),
				),
				$prefix . '-submenu-title'             => array(
					'type'  => 'kmt-title',
					'label' => __( 'Submenu Settings', 'kemet' ),
				),
				$prefix . 'submenu-tabs'               => array(
					'type' => 'kmt-tabs',
					'tabs' => array(
						'general' => array(
							'title'   => __( 'General', 'kemet' ),
							'options' => array(
								$prefix . '-submenu-width' => array(
									'type'         => 'kmt-slider',
									'transport'    => 'postMessage',
									'default'      => array(
										'value' => 240,
										'unit'  => 'px',
									),
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
								$prefix . '-submenu-effect' => array(
									'type'    => 'kmt-radio',
									'default' => 'none',
									'label'   => __( 'Dropdown Reveal', 'kemet' ),
									'choices' => array(
										'none'      => __( 'None', 'kemet' ),
										'fade'      => __( 'Fade', 'kemet' ),
										'fade-up'   => __( 'Fade Up', 'kemet' ),
										'fade-down' => __( 'Fade Down', 'kemet' ),
									),
								),
								$prefix . '-submenu-typography' => array(
									'type'      => 'kmt-typography',
									'transport' => 'postMessage',
									'label'     => __( 'Typography', 'kemet' ),
									'preview'   => array(
										'selector' => $selector . ' > li ul > li > a',
									),
								),
								$prefix . '-submenu-bg-color' => array(
									'transport' => 'postMessage',
									'divider'   => true,
									'type'      => 'kmt-color',
									'label'     => __( 'Background Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
								$prefix . '-submenu-link-color' => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Links Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'property' => '--linksColor',
										),
										'hover'   => array(
											'selector' => $selector . ' > li ul > li > a:hover',
											'property' => '--linksHoverColor',
										),
									),
								),
								$prefix . '-submenu-link-separator-color' => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Separator Color', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
								$prefix . '-submenu-border-top-width' => array(
									'type'         => 'kmt-slider',
									'divider'      => true,
									'transport'    => 'postMessage',
									'label'        => __( 'Border Width', 'kemet' ),
									'unit_choices' => array(
										'px' => array(
											'min'  => 0,
											'step' => 1,
											'max'  => 30,
										),
									),
									'preview'      => array(
										'selector' => $selector . ' > li ul',
										'property' => 'border-top-width',
									),
								),
								$prefix . '-submenu-border-top-color' => array(
									'transport' => 'postMessage',
									'type'      => 'kmt-color',
									'label'     => __( 'Border Color', 'kemet' ),
									'tab'       => __( 'Normal', 'kemet' ),
									'pickers'   => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
								$prefix . '-submenu-link-border' => array(
									'transport' => 'postMessage',
									'divider'   => true,
									'type'      => 'kmt-border',
									'label'     => __( 'Items Border', 'kemet' ),
									'preview'   => array(
										'selector' => $selector . ' > li ul > li > a',
										'property' => '--borderBottom',
									),
								),
								$prefix . '-box-shadow' => array(
									'type'    => 'kmt-switcher',
									'divider' => true,
									'label'   => __( 'Submenu Box Shadow', 'kemet' ),
								),
							),
						),
					),
				),
			);

			$menu_options = array(
				$prefix . '-options' => array(
					'section' => 'section-header-' . $prefix,
					'type'    => 'kmt-options',
					'data'    => array(
						'options' => $menu_options,
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


