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
			'site-sidebar-width'          => array(
				'type'        => 'kmt-slider',
				'transport'   => 'postMessage',
				'section'     => 'sidebar-widgets-sidebar-1',
				'priority'    => 5,
				'label'       => __( 'Sidebar Width(%)', 'kemet' ),
				'input_attrs' => array(
					'min'  => 15,
					'step' => 1,
					'max'  => 50,
				),
				'description' => __( 'Sidebar width will apply only when one of the following sidebar is set.', 'kemet' ),
				'preview'     => array(
					'selector' => '#secondary',
					'property' => 'width',
					'unit'     => '%',
				),
			),
			'site-sidebar-layout'         => array(
				'type'     => 'select',
				'section'  => 'sidebar-widgets-sidebar-1',
				'priority' => 15,
				'label'    => __( 'Default Layout', 'kemet' ),
				'choices'  => array(
					'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
					'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
					'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
				),
			),
			'single-page-sidebar-layout'  => array(
				'type'     => 'select',
				'section'  => 'sidebar-widgets-sidebar-1',
				'priority' => 20,
				'label'    => __( 'Pages', 'kemet' ),
				'choices'  => array(
					'default'       => __( 'Default', 'kemet' ),
					'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
					'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
					'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
				),
			),
			'single-post-sidebar-layout'  => array(
				'type'     => 'select',
				'section'  => 'sidebar-widgets-sidebar-1',
				'priority' => 25,
				'label'    => __( 'Blog Posts', 'kemet' ),
				'choices'  => array(
					'default'       => __( 'Default', 'kemet' ),
					'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
					'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
					'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
				),
			),
			'archive-post-sidebar-layout' => array(
				'type'     => 'select',
				'section'  => 'sidebar-widgets-sidebar-1',
				'priority' => 30,
				'label'    => __( 'Blog Post Archives', 'kemet' ),
				'choices'  => array(
					'default'       => __( 'Default', 'kemet' ),
					'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
					'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
					'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
				),
			),
			'kmt-sidebar-style'           => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Sidebar Content Style', 'kemet' ),
				'section'  => 'sidebar-widgets-sidebar-1',
				'priority' => 40,
			),
			'sidebar-content-font-size'   => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'sidebar-widgets-sidebar-1',
				'priority'     => 45,
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
			'sidebar-text-color'          => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Text Color', 'kemet' ),
				'priority'  => 50,
				'section'   => 'sidebar-widgets-sidebar-1',
				'preview'   => array(
					'selector' => '.sidebar-main',
					'property' => '--textColor',
				),
			),
			'sidebar-link-color'          => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Link Color', 'kemet' ),
				'priority'  => 55,
				'section'   => 'sidebar-widgets-sidebar-1',
				'preview'   => array(
					'selector' => '.sidebar-main a',
					'property' => '--headingLinksColor',
				),
			),
			'sidebar-link-h-color'        => array(
				'transport' => 'postMessage',
				'type'      => 'kmt-color',
				'label'     => __( 'Link Hover Color', 'kemet' ),
				'priority'  => 60,
				'section'   => 'sidebar-widgets-sidebar-1',
				'preview'   => array(
					'selector' => '.sidebar-main a',
					'property' => '--linksHoverColor',
				),
			),
			'sidebar-padding'             => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'sidebar-widgets-sidebar-1',
				'priority'       => 65,
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
			'kmt-sidebar-title'           => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Sidebar Input Fields Style', 'kemet' ),
				'section'  => 'sidebar-widgets-sidebar-1',
				'priority' => 70,
			),
			'sidebar-input-color'         => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Text Color', 'kemet' ),
				'priority'  => 75,
				'section'   => 'sidebar-widgets-sidebar-1',
				'preview'   => array(
					'selector' => $input_selector,
					'property' => '--inputColor',
				),
			),
			'sidebar-input-bg-color'      => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Background Color', 'kemet' ),
				'priority'  => 80,
				'section'   => 'sidebar-widgets-sidebar-1',
				'preview'   => array(
					'selector' => $input_selector,
					'property' => '--inputBackgroundColor',
				),
			),
			'sidebar-input-border-color'  => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Border Color', 'kemet' ),
				'priority'  => 85,
				'section'   => 'sidebar-widgets-sidebar-1',
				'preview'   => array(
					'selector' => $input_selector,
					'property' => '--inputBorderColor',
				),
			),
			'sidebar-input-border-radius' => array(
				'type'         => 'kmt-responsive-slider',
				'transport'    => 'postMessage',
				'section'      => 'sidebar-widgets-sidebar-1',
				'priority'     => 90,
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
		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_section = array(
			'sidebar-widgets-sidebar-1' => array(
				'title'    => __( 'Sidebar', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 30,
			),
		);

		return array_merge( $sections, $register_section );
	}
}

new Kemet_Sidebar_Customizer();
