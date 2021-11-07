<?php
/**
 * Styling Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Body_Color_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$register_options = array(
			'colorPalette'             => array(
				'label' => __( 'Global Color Palette', 'kemet' ),
				'type'  => 'kmt-color-palettes',
				'link'  => '',
			),
			'color-schema-title'       => array(
				'type'  => 'kmt-title',
				'label' => __( 'Manage color Scheme', 'kemet' ),
			),
			'theme-color'              => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Primary Color', 'kemet' ),
				'description' => __( 'Buttons background and a hover color for links.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'links-color'              => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Link Colors', 'kemet' ),
				'description' => __( 'Main menu links and all other body links.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
			),
			'headings-color'           => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Headings Color', 'kemet' ),
				'description' => __( "All Headings from H1 to H6 and including widgets' title.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'text-meta-color'          => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Body Text & Meta Color', 'kemet' ),
				'description' => __( "Body text, meta color, and forms' input text color.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-border-color'      => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Border & Separator Color', 'kemet' ),
				'description' => __( 'All the borders and separators across the website.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-background-color'  => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Background Color', 'kemet' ),
				'description' => __( "Body background color and a tint from it used for the input, page title and widgets' background.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-footer-text-color' => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Footer Text Color', 'kemet' ),
				'description' => __( 'Footer titles and links.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-footer-bg-color'   => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Footer Background Color', 'kemet' ),
				'description' => __( 'Footer background, and a darker shade from it is used for the input fields background, footer buttons and copyright area background.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Initial', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
		);

		$register_options = array(
			'colors-options' => array(
				'section' => 'section-colors-body',
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
			'section-colors-body' => array(
				'title'    => __( 'Global Colors', 'kemet' ),
				'priority' => 15,
			),
		);

		return array_merge( $sections, $register_sections );
	}
}

new Kemet_Body_Color_Customizer();

