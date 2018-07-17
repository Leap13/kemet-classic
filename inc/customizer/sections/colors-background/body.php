<?php
/**
 * Styling Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	/**
	 * Option: Theme Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[theme-color]', array(
			'default'           => '#0274be',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[theme-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Theme Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Link Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[link-color]', array(
			'default'           => '#0274be',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[link-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 5,
				'label'    => __( 'Link Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Text Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[text-color]', array(
			'default'           => '#3a3a3a',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[text-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 10,
				'label'    => __( 'Text Color', 'kemet' ),
			)
		)
	);


	/**
	 * Option: Link Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[link-h-color]', array(
			'default'           => '#3a3a3a',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[link-h-color]', array(
				'section'  => 'section-colors-body',
				'priority' => 15,
				'label'    => __( 'Link Hover Color', 'kemet' ),
			)
		)
	);


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-outside-bg-color]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-colors-body',
				'priority' => 20,
				'settings' => array(),
			)
		)
	);
