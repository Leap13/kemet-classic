<?php
/**
 * Buttons for Kemet Theme.
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
				'priority'    => 5,
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
				'priority'    => 10,
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
				'priority'    => 15,
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
				'priority'    => 20,
			)
		)
	);

		/**
	 * Option: Button Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[btn-border-size]', array(
			'default'           => kemet_get_option( 'btn-border-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[btn-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-buttons',
			'priority'    => 25,
			'label'       => __( 'Button Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

		/**
	 * Option: Button Background Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[btn-border-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[btn-border-color]', array(
				'section' => 'section-buttons',
				'label'   => __( 'Button Border Color', 'kemet' ),
				'priority'    => 30,
			)
		)
	);

		/**
	 * Option: Button Background Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[btn-border-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[btn-border-h-colo]', array(
				'section' => 'section-buttons',
				'label'   => __( 'Button Border Hover color', 'kemet' ),
				'priority'    => 35,
			)
		)
	);

	/**
	 * Option: Button Radius
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[button-radius]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
       new Kemet_Control_Responsive_Slider(
           $wp_customize, KEMET_THEME_SETTINGS . '[button-radius]', array(
               'type'           => 'kmt-responsive-slider',
               'section'        => 'section-buttons',
               'priority'       => 40,
               'label'          => __( 'Button Radius', 'kemet' ),
               'unit_choices'   => array( 'px', 'em' , '%' ),
			   'units_attrs'   => array(
					'px' => array(
						'min' => 1,
						'step' => 1,
						'max' =>300,
					),
					'em' => array(
						'min' => 1,
						'step' => 1,
						'max' => 10,
					),
					'%' => array(
						'min' => 1,
						'step' => 1,
						'max' => 100,
					),
				),
           )
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
			'priority'    => 45,
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
			'priority'    => 50,
			'input_attrs' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
		)
	);
