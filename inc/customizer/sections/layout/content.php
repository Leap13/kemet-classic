<?php
/**
 * Content Options for Kemet Theme.
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
		* Option: Content Text Color
		*/
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[content-text-color]', array(
				'default'           => kemet_get_option( 'content-text-color' ),
				'type'              => 'option',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Kemet_Control_Color(
				$wp_customize, KEMET_THEME_SETTINGS . '[content-text-color]', array(
					'label'   => __( 'Text Color', 'kemet' ),
					'priority'       => 5,
					'section' => 'section-contents',
				)
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
					'priority'    => 10,
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
				'priority'    => 15,
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
				'priority'    => 20,
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
			'priority' => 25,
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
				'priority'    => 30,
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
				'priority'    => 35,
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
      * Option: Content Link Color
      */
			$wp_customize->add_setting(
				KEMET_THEME_SETTINGS . '[content-link-color]', array(
					'default'           => kemet_get_option( 'content-link-color' ),
					'type'              => 'option',
					'transport'         => 'postMessage',
					'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
				)
			);
			$wp_customize->add_control(
				new Kemet_Control_Color(
					$wp_customize, KEMET_THEME_SETTINGS . '[content-link-color]', array(
						'label'   => __( 'link Color', 'kemet' ),
						'priority'       => 40,
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
					'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
				)
			);
			$wp_customize->add_control(
				new Kemet_Control_Color(
					$wp_customize, KEMET_THEME_SETTINGS . '[content-link-h-color]', array(
						'label'   => __( 'Link Hover Color', 'kemet' ),
						'priority'       => 45,
						'section' => 'section-contents',
					)
				)
			);



	/**
	 * Option: Body & Content Divider
	 */
	// $wp_customize->add_control(
	// 	new Kemet_Control_Divider(
	// 		$wp_customize, KEMET_THEME_SETTINGS . '[divider-base-typo]', array(
	// 			'type'     => 'kmt-divider',
	// 			'section'  => 'section-contents',
	// 			'priority' => 47,
	// 			'label'    => __( '8888', 'kemet' ),
	// 			'settings' => array(),
	// 		)
	// 	)
	// );

	/**
	 * Option: Body & Content Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-headings-typo]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 50,
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
				'priority' => 75,
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
				'priority' => 80,
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
			'priority' => 95,
			'choices'  => array(
				''           => __( 'Inherit', 'kemet' ),
				'none'       => __( 'None', 'kemet' ),
				'capitalize' => __( 'Capitalize', 'kemet' ),
				'uppercase'  => __( 'Uppercase', 'kemet' ),
				'lowercase'  => __( 'Lowercase', 'kemet' ),
			),
		)
	);
/**
	 * Option: Heading 1 (H1) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h1]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 95,
				'label'    => __( 'Heading 1 (H1)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 1 (H1) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h1]', array(
			'default'           => kemet_get_option( 'font-size-h1' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h1]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 196,
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
      * Option: Heading 1 Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-h1]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-color-h1]', array(
				'label'   => __( 'Font Color', 'kemet' ),
				'priority'       => 197,
				'section' => 'section-contents',
			)
		)
	);

	/**
	 * Option: Heading 2 (H2) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h2]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 98,
				'label'    => __( 'Heading 2 (H2)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 2 (H2) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h2]', array(
			'default'           => kemet_get_option( 'font-size-h2' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h2]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 99,
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
      * Option: Heading 2 Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-h2]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-color-h2]', array(
				'label'   => __( 'Font Color', 'kemet' ),
				'priority'       => 90,
				'section' => 'section-contents',
			)
		)
	);

	/**
	 * Option: Heading 3 (H3) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h3]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 91,
				'label'    => __( 'Heading 3 (H3)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 3 (H3) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h3]', array(
			'default'           => kemet_get_option( 'font-size-h3' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h3]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 92,
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
      * Option: Heading 3 Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-h3]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-color-h3]', array(
				'label'   => __( 'Font Color', 'kemet' ),
				'priority'       => 93,
				'section' => 'section-contents',
			)
		)
	);

	/**
	 * Option: Heading 4 (H4) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h4]', array(
				'label'    => __( 'Heading 4 (H4)', 'kemet' ),
				'section'  => 'section-contents',
				'type'     => 'kmt-divider',
				'priority' => 94,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 4 (H4) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h4]', array(
			'default'           => kemet_get_option( 'font-size-h4' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h4]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 95,
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
      * Option: Heading 4 Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-h4]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-color-h4]', array(
				'label'   => __( 'Font Color', 'kemet' ),
				'priority'       => 96,
				'section' => 'section-contents',
			)
		)
	);

	/**
	 * Option: Heading 5 (H5) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h5]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-contents',
				'priority' => 97,
				'label'    => __( 'Heading 5 (H5)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 5 (H5) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h5]', array(
			'default'           => kemet_get_option( 'font-size-h5' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h5]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 98,
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
      * Option: Heading 5 Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-h5]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-color-h5]', array(
				'label'   => __( 'Font Color', 'kemet' ),
				'priority'       => 99,
				'section' => 'section-contents',
			)
		)
	);

	/**
	 * Option: Heading 6 (H6) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h6]', array(
				'label'    => __( 'Heading 6 (H6)', 'kemet' ),
				'section'  => 'section-contents',
				'type'     => 'kmt-divider',
				'priority' => 90,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 6 (H6) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h6]', array(
			'default'           => kemet_get_option( 'font-size-h6' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h6]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-contents',
				'priority'    => 92,
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
      * Option: Heading 6 Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-h6]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-color-h6]', array(
				'label'   => __( 'Font Color', 'kemet' ),
				'priority'       => 93,
				'section' => 'section-contents',
			)
		)
	);

