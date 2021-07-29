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
									'unit'     => '%',
								),
							),
							'site-sidebar-layout'         => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Default Layout', 'kemet' ),
								'choices' => array(
									'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
									'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
									'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
								),
							),
							'single-page-sidebar-layout'  => array(
								'type'    => 'kmt-select',
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
								'label'   => __( 'Blog Post Archives', 'kemet' ),
								'choices' => array(
									'default'       => __( 'Default', 'kemet' ),
									'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
									'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
									'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
								),
							),
							'sidebar-padding'             => array(
								'type'           => 'kmt-responsive-spacing',
								'transport'      => 'postMessage',
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
									'selector' => 'div.sidebar-main',
									'property' => 'padding',
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'sidebar-content-font-size' => array(
								'type'         => 'kmt-responsive-slider',
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
									'selector' => $selector,
									'property' => '--fontSize',
								),
							),
							'sidebar-text-color'        => array(
								'transport' => 'postMessage',
								'type'      => 'kmt-color',
								'label'     => __( 'Text Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
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
								'label'     => __( 'Link Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
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
										'property' => '--headingLinksColor',
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
						'title' => __( 'Color', 'kemet' ),
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
						'title' => __( 'Color', 'kemet' ),
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
						'title' => __( 'Color', 'kemet' ),
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
				'type'         => 'kmt-responsive-slider',
				'responsive'   => true,
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
					'selector' => $input_selector,
					'property' => '--inputBorderRadius',
				),
			),
		);

		$section_name     = kemet_has_widget_editor() ? 'kemet-sidebar-widgets-sidebar-1' : 'sidebar-widgets-sidebar-1';
		$register_options = array(
			'site-sidebar-options' => array(
				'section' => $section_name,
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
