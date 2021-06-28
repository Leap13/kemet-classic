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
			'theme-color'              => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Primary Color', 'kemet' ),
				'description' => __( 'Used for buttons background (a darker shade from it used for mouseover), and hover color for links.', 'kemet' ),
			),
			'headings-links-color'     => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Headings & Links Color', 'kemet' ),
				'description' => __( "Used for all titles from H1 to H6, widgets' title, main menu links, and all other body links.", 'kemet' ),
			),
			'text-meta-color'          => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Body Text & Meta Color', 'kemet' ),
				'description' => __( "Used for body text, meta color, and forms' input text color.", 'kemet' ),
			),
			'global-border-color'      => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Border & Separator Color', 'kemet' ),
				'description' => __( 'Used for all the borders and separators across the website.', 'kemet' ),
			),
			'global-background-color'  => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Background Color', 'kemet' ),
				'description' => __( "Used for the body background color, a tint from it used for the input, page title, and widgets' background.", 'kemet' ),
			),
			'global-footer-text-color' => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Footer Text Color', 'kemet' ),
				'description' => __( 'Used for footer titles, and links. Darker shades from it are used for input fields background, footer buttons, and copyright area.', 'kemet' ),
			),
			'global-footer-bg-color'   => array(
				'type'        => 'kmt-color',
				'section'     => 'section-colors-body',
				'priority'    => 5,
				'label'       => __( 'Footer Background Color', 'kemet' ),
				'description' => __( 'Used for the footer background, and a darker shade from it is used for the input fields background, footer buttons, and copyright area.', 'kemet' ),
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

