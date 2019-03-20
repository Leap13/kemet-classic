<?php
/**
 * Widget Options for Kemet Theme.
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
    * Option - Widgets Spacing
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-padding]', array(
			'default'           => kemet_get_option( 'widget-padding' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Spacing(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-padding]', array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-widgets',
				'priority'       => 5,
				'label'          => __( 'Widget Spacing', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
			)
		)
	);

	/**
	 * Option: Widgets Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[Widget-bg-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[Widget-bg-color]', array(
                'priority'       => 10,
                'section' => 'section-widgets',
				'label'   => __( 'Widget Background Color', 'kemet' ),
			)
		)
	);
    
	/**
	 * Option: Widgets Margin Bottom
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-margin-bottom]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-margin-bottom]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-widgets',
				'priority'    => 15,
				'label'       => __( 'Widget Margin Bottom', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 0.5,
					'step' => 0.01,
					'max'  => 5,
				),
			)
		)
	);

	/**
      * Option:Widgets Title Color
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[widget-title-color]', array(
            'default'           => kemet_get_option( 'widget-title-color' ),
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        )
    );
    $wp_customize->add_control(
        new Kemet_Control_Color(
            $wp_customize, KEMET_THEME_SETTINGS . '[widget-title-color]', array(
                'label'   => __( 'Widget Title Color', 'kemet' ),
                'priority'       => 20,
                'section' => 'section-widgets',
            )
        )
	);

	/**
	 * Option: Widget Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-font-size]', array(
			'default'           => kemet_get_option( 'widget-title-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-title-font-size]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-widgets',
				'priority'    => 25,
				'label'       => __( 'Widget Title Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);
	
	/**
	 * Option: Widget Font Family
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-font-family]', array(
			'default'           => kemet_get_option( 'widget-title-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-title-font-family]', array(
				'type'        => 'kmt-font-family',
				'kmt_inherit' => __( 'Default System Font', 'kemet' ),
				'section'     => 'section-widgets',
				'priority'    => 30,
				'label'       => __( 'Widget Title Font Family', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[widget-title-font-weight]',
			)
		)
	);

	/**
	 * Option: Widget Font Weight
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-font-weight]', array(
			'default'           => kemet_get_option( 'widget-title-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-title-font-weight]', array(
				'type'        => 'kmt-font-weight',
				'kmt_inherit' => __( 'Default', 'kemet' ),
				'section'     => 'section-widgets',
				'priority'    => 35,
				'label'       => __( 'Widget Title Font Weight', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[widget-title-font-family]',
			)
		)
	);

	/**
	 * Option: Widget Text Transform
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-text-transform]', array(
			'default'           => kemet_get_option( 'widget-title-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[widget-title-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-widgets',
			'priority' => 45,
			'label'    => __( 'Widget Title Text Transform', 'kemet' ),
			'choices'  => array(
				''           => __( 'Default', 'kemet' ),
				'none'       => __( 'None', 'kemet' ),
				'capitalize' => __( 'Capitalize', 'kemet' ),
				'uppercase'  => __( 'Uppercase', 'kemet' ),
				'lowercase'  => __( 'Lowercase', 'kemet' ),
			),
		)
	);


    /**
	 * Option: widget Line Height
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-line-height]', array(
			'default'           => kemet_get_option( 'widget-title-line-height' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-title-line-height]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-widgets',
				'priority'    => 50,
				'label'       => __( 'Widget Title Line Height', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 0.01,
					'max'  => 5,
				),
			)
		)
	);	
		
	/**
	 * Option: Widget Title Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-border-size]', array(
			'default'           => kemet_get_option( 'widget-title-border-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[widget-title-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-widgets',
			'priority'    => 55,
			'label'       => __( 'Widget Title Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Widget Title Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-title-border-color]', array(
			'default'           => kemet_get_option( 'widget-title-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-title-border-color]', array(
				'section'  => 'section-widgets',
				'priority' => 60,
				'label'    => __( 'Widget Title Border Color', 'kemet' ),
			)
		)
	);