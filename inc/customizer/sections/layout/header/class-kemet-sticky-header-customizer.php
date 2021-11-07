<?php
/**
 * Kemet Theme Customizer Register
 *
 * @package Kemet
 */

if ( ! class_exists( 'Kemet_Sticky_Header_Customizer' ) ) :

	/**
	 * Customizer Register
	 */
	class Kemet_Sticky_Header_Customizer extends Kemet_Customizer_Register {

		/**
		 * Register Customizer Options
		 *
		 * @param array $options options.
		 * @return array
		 */
		public function register_options( $options ) {
			$selector        = '.kmt-is-sticky';
			$parent_selector = '#sitehead .kmt-is-sticky';
			$menu_selector   = $selector . ' .main-header-menu';
			$html_selector   = $selector . ' .kmt-custom-html';
			$button_selector = $selector . ' .header-button';
			$sticky_options  = array(
				'sticky-header-tabs' => array(
					'type' => 'kmt-tabs',
					'tabs' => array(
						'general' => array(
							'title'   => __( 'General', 'kemet' ),
							'options' => array(
								'sticky-logo-width'        => array(
									'type'         => 'kmt-slider',
									'responsive'   => true,
									'transport'    => 'postMessage',
									'label'        => __( 'Logo Width', 'kemet' ),
									'unit_choices' => array(
										'px' => array(
											'min'  => 1,
											'step' => 1,
											'max'  => 300,
										),
										'em' => array(
											'min'  => 0.1,
											'step' => 0.1,
											'max'  => 12,
										),
										'%'  => array(
											'min'  => 1,
											'step' => 1,
											'max'  => 100,
										),
									),
									'context'      => array(
										array(
											'setting'  => 'sticky-logo',
											'operator' => 'not_empty',
										),
									),
									'preview'      => array(
										'selector'   => '#sitehead ' . $selector . ' .custom-logo-link.sticky-custom-logo img',
										'property'   => '--logoWidth',
										'responsive' => true,
									),
								),
								'enable-sticky-top'        => array(
									'label'   => __( 'Sticky Top Header', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
								),
								'enable-sticky-main'       => array(
									'label'   => __( 'Sticky Main Header', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
								),
								'enable-sticky-bottom'     => array(
									'label'   => __( 'Sticky Bottom Header', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
								),
								'enable-shrink-main'       => array(
									'label'   => __( 'Enable Main Row Shrinking', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
									'context' => array(
										array(
											'setting' => 'enable-sticky-main',
											'value'   => true,
										),
									),
								),
								'main-row-shrink-height'   => array(
									'type'         => 'kmt-slider',
									'label'        => __( 'Main Row Shrink Height', 'kemet' ),
									'suffix'       => '',
									'unit_choices' => array(
										'px' => array(
											'min'  => 5,
											'step' => 1,
											'max'  => 400,
										),
									),
									'context'      => array(
										array(
											'setting' => 'enable-sticky-main',
											'value'   => true,
										),
										array(
											'setting' => 'enable-shrink-main',
											'value'   => true,
										),
									),
								),
								'sticky-mobile-settings'   => array(
									'type'  => 'kmt-title',
									'label' => __( 'Mobile Sticky', 'kemet' ),
								),
								'enable-sticky-mobile-top' => array(
									'label'   => __( 'Sticky Mobile Top Header', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
								),
								'enable-sticky-mobile-main' => array(
									'label'   => __( 'Sticky Mobile Main Header', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
								),
								'enable-sticky-mobile-bottom' => array(
									'label'   => __( 'Sticky Mobile Bottom Header', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
								),
								'enable-shrink-main-mobile' => array(
									'label'   => __( 'Enable Main Row Shrinking', 'kemet' ),
									'divider' => true,
									'type'    => 'kmt-switcher',
									'context' => array(
										array(
											'setting' => 'enable-sticky-mobile-main',
											'value'   => true,
										),
									),
								),
								'mobile-main-row-shrink-height' => array(
									'type'         => 'kmt-slider',
									'label'        => __( 'Main Row Shrink Height', 'kemet' ),
									'unit_choices' => array(
										'px' => array(
											'min'  => 5,
											'step' => 1,
											'max'  => 400,
										),
									),
									'context'      => array(
										array(
											'setting' => 'enable-sticky-mobile-main',
											'value'   => true,
										),
										array(
											'setting' => 'enable-shrink-main-mobile',
											'value'   => true,
										),
									),
								),
							),
						),
						'design'  => array(
							'title'   => __( 'Design', 'kemet' ),
							'options' => array(
								'sticky-menu-title'        => array(
									'type'  => 'kmt-title',
									'label' => __( 'Menu', 'kemet' ),
								),
								'sticky-menu-link-color'   => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Links Color', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'selector' => $menu_selector . ' > li > a',
											'property' => '--linksColor',
										),
										'hover'      => array(
											'selector' => $menu_selector . ' > li > a',
											'property' => '--linksHoverColor',
										),
									),
								),
								'sticky-menu-bg-color'     => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Background Color', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
											'id'    => 'initial',
										),
									),
									'preview'    => array(
										'responsive' => true,
										'initial'    => array(
											'selector' => $menu_selector,
											'property' => '--backgroundColor',
										),
									),
								),
								'sticky-submenu-title'     => array(
									'type'  => 'kmt-title',
									'label' => __( 'Submenu', 'kemet' ),
								),
								'sticky-submenu-link-color' => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Links Color', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'selector' => $menu_selector . ' > li ul > li > a',
											'property' => '--linksColor',
										),
										'hover'      => array(
											'selector' => $menu_selector . ' > li ul > li > a',
											'property' => '--linksHoverColor',
										),
									),
								),
								'sticky-submenu-bg-color'  => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Background Color', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'selector' => $menu_selector . ' > li ul > li > a',
											'property' => '--backgroundColor',
										),
										'hover'      => array(
											'selector' => $menu_selector . ' > li ul > li > a:hover',
											'property' => '--backgroundColor',
										),
									),
								),
								'sticky-button-title'      => array(
									'type'  => 'kmt-title',
									'label' => __( 'Buttons', 'kemet' ),
								),
								'sticky-button-text-color' => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Text Color', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'selector' => $button_selector,
											'property' => '--buttonColor',
										),
										'hover'      => array(
											'selector' => $button_selector,
											'property' => '--buttonHoverColor',
										),
									),
								),
								'sticky-button-bg-color'   => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Background Color', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'selector' => $button_selector,
											'property' => '--buttonBackgroundColor',
										),
										'hover'      => array(
											'selector' => $button_selector,
											'property' => '--buttonBackgroundHoverColor',
										),
									),
								),
								'sticky-html-title'        => array(
									'type'  => 'kmt-title',
									'label' => __( 'Html', 'kemet' ),
								),
								'sticky-html-text-color'   => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Text', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
											'id'    => 'initial',
										),
									),
									'preview'    => array(
										'responsive' => true,
										'initial'    => array(
											'selector' => $html_selector,
											'property' => '--textColor',
										),
									),
								),
								'sticky-html-link-color'   => array(
									'transport'  => 'postMessage',
									'type'       => 'kmt-color',
									'responsive' => true,
									'label'      => __( 'Link Colors', 'kemet' ),
									'pickers'    => array(
										array(
											'title' => __( 'Initial', 'kemet' ),
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
											'selector' => $html_selector,
											'property' => '--linksColor',
										),
										'hover'      => array(
											'selector' => $html_selector,
											'property' => '--linksHoverColor',
										),
									),
								),
							),
						),
					),
				),

			);

			$sticky_options = array(
				'sticky-logo'           => array(
					'type'           => 'image',
					'section'        => 'section-sticky-header-options',
					'priority'       => 5,
					'label'          => __( 'Logo Image', 'kemet' ),
					'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				),
				'sticky-header-options' => array(
					'section' => 'section-sticky-header-options',
					'type'    => 'kmt-options',
					'data'    => array(
						'options' => $sticky_options,
					),
				),
			);

			return array_merge( $options, $sticky_options );
		}

		/**
		 * Register Customizer Sections
		 *
		 * @param array $sections sections.
		 * @return array
		 */
		public function register_sections( $sections ) {
			$sticky_sections = array(
				'section-sticky-header-options' => array(
					'priority' => 35,
					'title'    => __( 'Sticky Header', 'kemet' ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			return array_merge( $sections, $sticky_sections );

		}
	}

	new Kemet_Sticky_Header_Customizer();
endif;


