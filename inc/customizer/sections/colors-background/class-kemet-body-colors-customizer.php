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
			'colorPalette' => array(
					'label' => __( 'Global Color Palette', 'kemet' ),
					'type'  => 'kmt-color-palettes',
				
				),
			'theme-color'              => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Primary Color', 'kemet' ),
				'description' => __( 'Used for buttons background (a darker shade from it used for mouseover), and hover color for links.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'headings-color'     => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Headings Color', 'kemet' ),
				'description' => __( "Used for all titles from H1 to H6, widgets' title.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'links-color'     => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Headings & Links Color', 'kemet' ),
				'description' => __( "Main menu links, and all other body links.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
					array(
						'title' => __( 'Hover', 'kemet' ),
						'id'    => 'hover',
					),
				),
			),
			'text-meta-color'          => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Body Text & Meta Color', 'kemet' ),
				'description' => __( "Used for body text, meta color, and forms' input text color.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-border-color'      => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Border & Separator Color', 'kemet' ),
				'description' => __( 'Used for all the borders and separators across the website.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-background-color'  => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Background Color', 'kemet' ),
				'description' => __( "Used for the body background color, a tint from it used for the input, page title, and widgets' background.", 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-footer-text-color' => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Footer Text Color', 'kemet' ),
				'description' => __( 'Used for footer titles, and links. Darker shades from it are used for input fields background, footer buttons, and copyright area.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
						'id'    => 'initial',
					),
				),
			),
			'global-footer-bg-color'   => array(
				'type'        => 'kmt-color',
				'label'       => __( 'Footer Background Color', 'kemet' ),
				'description' => __( 'Used for the footer background, and a darker shade from it is used for the input fields background, footer buttons, and copyright area.', 'kemet' ),
				'pickers'     => array(
					array(
						'title' => __( 'Color', 'kemet' ),
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

