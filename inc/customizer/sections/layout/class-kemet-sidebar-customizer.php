<?php
/**
 * Sidebar Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Sidebar_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$selector         = '#secondary .sidebar-main';
		$input_selector   = '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select';
		$register_options = array(
			'site-sidebar-tabs'           => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'site-sidebar-width'          => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Sidebar Width(%)', 'kemet' ),
								'unit_choices' => array(
									'%' => array(
										'min'  => 15,
										'step' => 1,
										'max'  => 50,
									),
								),
								'description'  => __( 'Sidebar width will apply only when one of the following sidebar is set.', 'kemet' ),
								'preview'      => array(
									'selector' => '#secondary',
									'property' => 'width',
								),
							),
							'site-sidebar-layout'         => array(
								'type'    => 'kmt-select',
								'divider' => true,
								'label'   => __( 'Default Layout', 'kemet' ),
								'choices' => array(
									'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
									'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
									'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
								),
							),
							'single-page-sidebar-layout'  => array(
								'type'    => 'kmt-select',
								'divider' => true,
								'label'   => __( 'Pages', 'kemet' ),
								'choices' => array(
									'default'       => __( 'Default', 'kemet' ),
									'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
									'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
									'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
								),
							),
							'single-post-sidebar-layout'  => array(
								'type'    => 'kmt-select',
								'divider' => true,
								'label'   => __( 'Blog Posts', 'kemet' ),
								'choices' => array(
									'default'       => __( 'Default', 'kemet' ),
									'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
									'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
									'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
								),
							),
							'archive-post-sidebar-layout' => array(
								'type'    => 'kmt-select',
								'divider' => true,
								'label'   => __( 'Blog Post Archives', 'kemet' ),
								'choices' => array(
									'default'       => __( 'Default', 'kemet' ),
									'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
									'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
									'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
								),
							),
							'enable-sticky-sidebar'       => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Sticky Sidebar', 'kemet' ),
							),
							'only-stick-last-widget'      => array(
								'type'    => 'kmt-switcher',
								'label'   => __( 'Only Stick Last Widget', 'kemet' ),
								'context' => array(
									array(
										'setting' => 'enable-sticky-sidebar',
										'value'   => true,
									),
								),
							),
							'sidebar-padding'             => array(
								'type'           => 'kmt-spacing',
								'divider'        => true,
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Sidebar Padding', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => 'div.sidebar-main',
									'property'   => 'padding',
									'responsive' => true,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'sidebar-content-font-size' => array(
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
										'max'  => 12,
									),
								),
								'preview'      => array(
									'selector'   => $selector,
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							'sidebar-text-color'        => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'divider'   => true,
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.sidebar-main',
										'property' => '--textColor',
									),
								),
							),
							'sidebar-link-color'        => array(
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
										'selector' => '.sidebar-main a',
										'property' => '--linksColor',
									),
									'hover'   => array(
										'selector' => '.sidebar-main a',
										'property' => '--linksHoverColor',
									),
								),
							),
						),
					),
				),
			),
			'kmt-sidebar-title'           => array(
				'type'  => 'kmt-title',
				'label' => __( 'Sidebar Input Fields Style', 'kemet' ),
			),
			'sidebar-input-color'         => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Text Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => $input_selector,
						'property' => '--inputColor',
					),
				),
			),
			'sidebar-input-bg-color'      => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Background Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => $input_selector,
						'property' => '--inputBackgroundColor',
					),
				),
			),
			'sidebar-input-border-color'  => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Border Color', 'kemet' ),
				'pickers'   => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => $input_selector,
						'property' => '--inputBorderColor',
					),
				),
			),
			'sidebar-input-border-radius' => array(
				'type'         => 'kmt-slider',
				'responsive'   => true,
				'divider'      => true,
				'transport'    => 'postMessage',
				'label'        => __( 'Input Field Border Radius', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 200,
					),
					'%'  => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),
				'preview'      => array(
					'selector'   => $input_selector,
					'property'   => '--inputBorderRadius',
					'responsive' => true,
				),
			),
		);

		$section_name     = kemet_has_widget_editor() ? 'kemet-sidebar-widgets-sidebar-1' : 'sidebar-widgets-sidebar-1';
		$register_options = array(
			'site-sidebar-options' => array(
				'section' => $section_name,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => apply_filters( 'kemet_sidebar_options', $register_options ),
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
		$section_name     = kemet_has_widget_editor() ? 'kemet-sidebar-widgets-sidebar-1' : 'sidebar-widgets-sidebar-1';
		$register_section = array(
			$section_name => array(
				'title'    => __( 'Sidebar', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 30,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Sidebar_Customizer();
