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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$defaults = Kemet_Theme_Options::defaults();
	/**
	 * Option: Theme Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[theme-color]', array(
			'default'           => $defaults[ 'theme-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[theme-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Primary Color', 'kemet' ),
			)
		)
	);
	/**
	 * Option: T1 Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[t1-color]', array(
			'default'           => $defaults[ 't1-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[t1-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Main Headings', 'kemet' ),
			)
		)
	);
	/**
	 * Option: T2 Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[t2-color]', array(
			'default'           => $defaults[ 't2-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[t2-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Body Content', 'kemet' ),
			)
		)
	);
	/**
	 * Option: Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[global-border-color]', array(
			'default'           => $defaults[ 'global-border-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[global-border-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Borders/Separators', 'kemet' ),
			)
		)
	);
	/**
	 * Option: B1 Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[b1-color]', array(
			'default'           => $defaults[ 'b1-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[b1-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Footer Content', 'kemet' ),
			)
		)
	);
	/**
	 * Option: FT Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[ft-color]', array(
			'default'           => $defaults[ 'ft-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[ft-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Footer Background', 'kemet' ),
			)
		)
	);
	/**
	 * Option: FB Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[fb-color]', array(
			'default'           => $defaults[ 'fb-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[fb-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'FB Color', 'kemet' ),
			)
		)
	);
