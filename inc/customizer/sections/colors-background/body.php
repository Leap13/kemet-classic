<?php
/**
 * Styling Options for Wiz Theme.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$defaults = Wiz_Theme_Options::defaults();
	/**
	 * Option: Theme Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[theme-color]', array(
			'default'           => $defaults[ 'theme-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[theme-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Primary Color', 'wiz' ),
				'description' => __("Used for buttons background (a darker shade from it used for mouseover), and hover color for links." , 'wiz'),
			)
		)
	);
	/**
	 * Option: T1 Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[headings-links-color]', array(
			'default'           => $defaults[ 'headings-links-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[headings-links-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Headings & Links Color', 'wiz' ),
				'description' => __("Used for all titles from H1 to H6, widgets' title, main menu links, and all other body links." , 'wiz'),
			)
		)
	);
	/**
	 * Option: T2 Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[text-meta-color]', array(
			'default'           => $defaults[ 'text-meta-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[text-meta-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Body Text & Meta Color', 'wiz' ),
				'description' => __("Used for body text, meta color, and forms' input text color." , 'wiz'),
			)
		)
	);
	/**
	 * Option: Border Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[global-border-color]', array(
			'default'           => $defaults[ 'global-border-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[global-border-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Border & Separator Color', 'wiz' ),
				'description' => __("Used for all the borders and separators across the website." , 'wiz'),
			)
		)
	);
	/**
	 * Option: B1 Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[global-background-color]', array(
			'default'           => $defaults[ 'global-background-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[global-background-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Background Color', 'wiz' ),
				'description' => __("Used for the body background color, a tint from it used for the input, page title, and widgets' background." , 'wiz'),
			)
		)
	);
	/**
	 * Option: FT Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[global-footer-text-color]', array(
			'default'           => $defaults[ 'global-footer-text-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[global-footer-text-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Footer Text Color', 'wiz' ),
				'description' => __("Used for footer titles, and links. Darker shades from it are used for input fields background, footer buttons, and copyright area." , 'wiz'),
			)
		)
	);
	/**
	 * Option: FB Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[global-footer-bg-color]', array(
			'default'           => $defaults[ 'global-footer-bg-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[global-footer-bg-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Footer Background Color', 'wiz' ),
				'description' => __("Used for the footer background, and a darker shade from it is used for the input fields background, footer buttons, and copyright area." , 'wiz'),
			)
		)
	);
