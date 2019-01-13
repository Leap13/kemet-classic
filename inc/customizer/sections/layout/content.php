<?php
/**
 * Content Options for Kemet Theme.
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-content-image]', array(
				'section'  => 'section-contents',
				'priority' => 0,
				'type'     => 'kmt-divider',
				'settings' => array(),
			)
		)
	);

	/**
      * Option: Content Text Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[content-text-color]', array(
			'default'           => kemet_get_option( 'content-text-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-text-color]', array(
				'label'   => __( 'Text Color', 'kemet' ),
				'priority'       => 1,
				'section' => 'section-contents',
			)
		)
    );
    /**
      * Option: Content Link Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[content-link-color]', array(
			'default'           => kemet_get_option( 'content-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-link-color]', array(
				'label'   => __( 'link Color', 'kemet' ),
				'priority'       => 2,
				'section' => 'section-contents',
			)
        )
    );
    /**
      * Option: Content Link Hover Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[content-link-h-color]', array(
			'default'           => kemet_get_option( 'content-link-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-link-h-color]', array(
				'label'   => __( 'Link Hover Color', 'kemet' ),
				'priority'       => 3,
				'section' => 'section-contents',
			)
		)
	);

/**
	 * Option: Body & Content Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-base-typo]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 4,
				'label'    => __( 'Body & Content', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Font Family
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[body-font-family]', array(
			'default'           => kemet_get_option( 'body-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[body-font-family]', array(
				'type'        => 'kmt-font-family',
				'kmt_inherit' => __( 'Default System Font', 'kemet' ),
				'section'     => 'section-contents',
				'priority'    => 5,
				'label'       => __( 'Font Family', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[body-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[body-font-weight]', array(
			'default'           => kemet_get_option( 'body-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[body-font-weight]', array(
				'type'        => 'kmt-font-weight',
				'kmt_inherit' => __( 'Default', 'kemet' ),
				'section'     => 'section-contents',
				'priority'    => 10,
				'label'       => __( 'Font Weight', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[body-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[body-text-transform]', array(
			'default'           => kemet_get_option( 'body-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[body-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-contents',
			'priority' => 15,
			'label'    => __( 'Text Transform', 'kemet' ),
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-body]', array(
			'default'           => kemet_get_option( 'font-size-body' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-body]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 20,
				'label'       => __( 'Font Size', 'kemet' ),
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
	 * Option: Body Line Height
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[body-line-height]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[body-line-height]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-contents',
				'priority'    => 25,
				'label'       => __( 'Line Height', 'kemet' ),
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
	 * Option: Paragraph Margin Bottom
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[para-margin-bottom]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[para-margin-bottom]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-contents',
				'priority'    => 25,
				'label'       => __( 'Paragraph Margin Bottom', 'kemet' ),
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
	 * Option: Body & Content Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-headings-typo]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 30,
				'label'    => __( 'Headings', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Headings Font Family
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[headings-font-family]', array(
			'default'           => kemet_get_option( 'headings-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[headings-font-family]', array(
				'type'     => 'kmt-font-family',
				'label'    => __( 'Font Family', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 35,
				'connect'  => KEMET_THEME_SETTINGS . '[headings-font-weight]',
			)
		)
	);

	/**
	 * Option: Headings Font Weight
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[headings-font-weight]', array(
			'default'           => kemet_get_option( 'headings-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[headings-font-weight]', array(
				'type'     => 'kmt-font-weight',
				'label'    => __( 'Font Weight', 'kemet' ),
				'section'  => 'section-contents',
				'priority' => 40,
				'connect'  => KEMET_THEME_SETTINGS . '[headings-font-family]',
			)
		)
	);

	/**
	 * Option: Headings Text Transform
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[headings-text-transform]', array(
			'default'           => kemet_get_option( 'headings-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[headings-text-transform]', array(
			'section'  => 'section-contents',
			'label'    => __( 'Text Transform', 'kemet' ),
			'type'     => 'select',
			'priority' => 45,
			'choices'  => array(
				''           => __( 'Inherit', 'kemet' ),
				'none'       => __( 'None', 'kemet' ),
				'capitalize' => __( 'Capitalize', 'kemet' ),
				'uppercase'  => __( 'Uppercase', 'kemet' ),
				'lowercase'  => __( 'Lowercase', 'kemet' ),
			),
		)
	);

