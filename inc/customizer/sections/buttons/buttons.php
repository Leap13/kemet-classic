<?php
/**
 * Buttons for Kemet Theme.
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
	 * Option: Button Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[button-color]', array(
				'section' => 'section-buttons',
				'label'   => __( 'Button Text Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Button Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[button-h-color]', array(
				'section' => 'section-buttons',
				'label'   => __( 'Button Text Hover Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Button Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-bg-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[button-bg-color]', array(
				'section' => 'section-buttons',
				'label'   => __( 'Button Background Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Button Background Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-bg-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[button-bg-h-color]', array(
				'section' => 'section-buttons',
				'label'   => __( 'Button Background Hover Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Button Radius
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-radius]', array(
			'default'           => kemet_get_option( 'button-radius' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[button-radius]', array(
			'section'     => 'section-buttons',
			'label'       => __( 'Button Radius', 'kemet' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 200,
			),
		)
	);

	/**
	 * Option: Vertical Padding
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-v-padding]', array(
			'default'           => kemet_get_option( 'button-v-padding' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[button-v-padding]', array(
			'section'     => 'section-buttons',
			'label'       => __( 'Vertical Padding', 'kemet' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
		)
	);

	/**
	 * Option: Horizontal Padding
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-h-padding]', array(
			'default'           => kemet_get_option( 'button-h-padding' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[button-h-padding]', array(
			'section'     => 'section-buttons',
			'label'       => __( 'Horizontal Padding', 'kemet' ),
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
		)
	);
