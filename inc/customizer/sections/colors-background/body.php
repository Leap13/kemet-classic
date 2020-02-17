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
	* Option: Header Layout
	*/
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[smart-skin]', array(
			'default'           => $defaults['smart-skin'],
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Radio_Image(
			$wp_customize, KEMET_THEME_SETTINGS . '[smart-skin]', array(
				'section'  => 'section-colors-body',
				'priority' => 1,
				'label'    => __( 'Smart Skin', 'kemet' ),
				'type'     => 'kmt-radio-image',
				'choices'  => array(
					'smart-skin-1' => array(
						'label' => __( 'SS1', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/ss1.png',
					),
				),
			)
		)
	);
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
				'label'    => __( 'T1', 'kemet' ),
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
				'label'    => __( 'T2 Color', 'kemet' ),
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
				'label'    => __( 'B1 Color', 'kemet' ),
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
				'label'    => __( 'FT Color', 'kemet' ),
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
