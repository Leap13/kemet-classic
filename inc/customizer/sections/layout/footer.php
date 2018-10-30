<?php
/**
 * Bottom Footer Options for Kemet Theme.
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
	 * Option: Footer Bar Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-layout]', array(
			'default'           => kemet_get_option( 'footer-sml-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Radio_Image(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-sml-layout]', array(
				'type'     => 'kmt-radio-image',
				'section'  => 'section-footer-small',
				'priority' => 5,
				'label'    => __( 'Footer Bar Layout', 'kemet' ),
				'choices'  => array(
					'disabled'            => array(
						'label' => __( 'Disabled', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/disabled-footer-76x48.png',
					),
					'footer-sml-layout-1' => array(
						'label' => __( 'Footer Bar Layout 1', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/footer-layout-1-76x48.png',
					),
					'footer-sml-layout-2' => array(
						'label' => __( 'Footer Bar Layout 2', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/footer-layout-2-76x48.png',
					),
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-small-footer-layout-info]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-footer-small',
				'priority' => 10,
				'settings' => array(),
			)
		)
	);


	/**
	 * Option: Section 1
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-section-1]', array(
			'default'           => kemet_get_option( 'footer-sml-section-1' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-sml-section-1]', array(
			'type'     => 'select',
			'section'  => 'section-footer-small',
			'priority' => 15,
			'label'    => __( 'Section 1', 'kemet' ),
			'choices'  => array(
				''       => __( 'None', 'kemet' ),
				'menu'   => __( 'Footer Menu', 'kemet' ),
				'custom' => __( 'Custom Text', 'kemet' ),
				'widget' => __( 'Widget', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Section 1 Custom Text
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-section-1-credit]', array(
			'default'           => kemet_get_option( 'footer-sml-section-1-credit' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-sml-section-1-credit]', array(
			'type'     => 'textarea',
			'section'  => 'section-footer-small',
			'priority' => 20,
			'label'    => __( 'Section 1 Custom Text', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[footer-sml-section-1-credit]', array(
				'selector'            => '.kmt-small-footer-section-1',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_footer_sml_section_1_credit' ),
			)
		);
	}

	/**
	 * Option: Section 2
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-section-2]', array(
			'default'           => kemet_get_option( 'footer-sml-section-2' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-sml-section-2]', array(
			'type'     => 'select',
			'section'  => 'section-footer-small',
			'priority' => 25,
			'label'    => __( 'Section 2', 'kemet' ),
			'choices'  => array(
				''       => __( 'None', 'kemet' ),
				'menu'   => __( 'Footer Menu', 'kemet' ),
				'custom' => __( 'Custom Text', 'kemet' ),
				'widget' => __( 'Widget', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Section 2 Custom Text
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-section-2-credit]', array(
			'default'           => kemet_get_option( 'footer-sml-section-2-credit' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-sml-section-2-credit]', array(
			'type'     => 'textarea',
			'section'  => 'section-footer-small',
			'priority' => 30,
			'label'    => __( 'Section 2 Custom Text', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[footer-sml-section-2-credit]', array(
				'selector'            => '.kmt-small-footer-section-2',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_footer_sml_section_2_credit' ),
			)
		);
	}
        
        /**
         * Option: Divider For Typography
         */
        $wp_customize->add_control(
               new Kemet_Control_Divider(
                       $wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-small-footer-layout-info]', array(
                               'section'  => 'section-footer-small',
                               'type'     => 'kmt-divider',
                               'label'    => __( 'Typography', 'kemet' ),
                               'priority'       => 31,
                               'settings' => array(),
                       )
               )
        );


        /**
         * Option: Footer Font Family
         */
        $wp_customize->add_setting(
           KEMET_THEME_SETTINGS . '[footer-bar-font-family]', array(
               'default'           => kemet_get_option( 'footer-bar-font-family' ),
               'type'              => 'option',
               'sanitize_callback' => 'sanitize_text_field',
           )
        );
        $wp_customize->add_control(
           new Kemet_Control_Typography(
               $wp_customize, KEMET_THEME_SETTINGS . '[footer-bar-font-family]', array(
                   'type'     => 'kmt-font-family',
                   'label'    => __( 'Font Family', 'kemet' ),
                   'section'  => 'section-footer-small',
                   'priority' => 32,
                   'connect'  => KEMET_THEME_SETTINGS . '[footer-bar-font-weight]',
               )
           )
        );


        /**
         * Option: Footer Font Weight
         */
        $wp_customize->add_setting(
           KEMET_THEME_SETTINGS . '[footer-bar-font-weight]', array(
               'default'           => kemet_get_option( 'footer-bar-font-weight' ),
               'type'              => 'option',
               'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
           )
        );
        $wp_customize->add_control(
           new Kemet_Control_Typography(
               $wp_customize, KEMET_THEME_SETTINGS . '[footer-bar-font-weight]', array(
                   'type'     => 'kmt-font-weight',
                   'label'    => __( 'Font Weight', 'kemet' ),
                   'section'  => 'section-footer-small',
                   'priority' => 33,
                   'connect'  => KEMET_THEME_SETTINGS . '[footer-bar-font-family]',

               )
           )
        );

        /**
         * Option: Footer Text Transform
         */
        $wp_customize->add_setting(
           KEMET_THEME_SETTINGS . '[footer-bar-text-transform]', array(
               'default'           => kemet_get_option( 'footer-bar-text-transform' ),
               'type'              => 'option',
               'transport'         => 'postMessage',
               'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
           )
        );
        $wp_customize->add_control(
           KEMET_THEME_SETTINGS . '[footer-bar-text-transform]', array(
               'section'  => 'section-footer-small',
               'label'    => __( 'Text Transform', 'kemet' ),
               'type'     => 'select',
               'priority' => 34,
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
         * Option: Footer Font Size
         */
        $wp_customize->add_setting(
           KEMET_THEME_SETTINGS . '[footer-bar-font-size]', array(
               'default'           => kemet_get_option( 'footer-bar-font-size' ),
               'type'              => 'option',
               'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
           )
        );
        $wp_customize->add_control(
           new Kemet_Control_Responsive(
               $wp_customize, KEMET_THEME_SETTINGS . '[footer-bar-font-size]', array(
                   'type'        => 'kmt-responsive',
                   'section'     => 'section-footer-small',
                   'priority'    => 34,
                   'label'       => __( 'Font Size', 'kemet' ),
                   'input_attrs' => array(
                       'min' => 0,
                   ),
                   'units'       => array(
                       'px' => 'px',
                   ),
               )
           )
        );


        
	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-small-footer-typography]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-footer-small',
				'priority' => 35,
				'settings' => array(),
			)
		)
	);
        
        
        /**
	 * Option: Header Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-layout-width]', array(
			'default'           => kemet_get_option( 'footer-layout-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-layout-width]', array(
			'type'     => 'select',
			'section'  => 'section-footer-small',
			'priority' => 35,
			'label'    => __( 'Footer Bar Width', 'kemet' ),
			'choices'  => array(
				'full'    => __( 'Full Width', 'kemet' ),
				'content' => __( 'Content Width', 'kemet' ),
			),
		)
	);

        
	/**
	 * Option: Footer Top Border Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-divider]', array(
			'default'           => kemet_get_option( 'footer-sml-divider' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-sml-divider]', array(
			'type'        => 'number',
			'section'     => 'section-footer-small',
			'priority'    => 40,
			'label'       => __( 'Footer Bar Top Border Width', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

        /**
	 * Option: Footer Bar Text Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-bar-text-color]', array(
			'default'           => '#7a7a7a',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-bar-text-color]', array(
				'section'  => 'section-footer-small',
				'priority' => 46,
				'label'    => __( 'Footer Text Color', 'kemet' ),
			)
		)
	);

        
	/**
	 * Option: Footer Top Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-sml-divider-color]', array(
			'default'           => '#7a7a7a',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-sml-divider-color]', array(
				'section'  => 'section-footer-small',
				'priority' => 45,
				'label'    => __( 'Footer Bar Top Border Color', 'kemet' ),
			)
		)
	);

        
        /**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-small-footer-layout-info]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-footer-small',
				'priority' => 60,
				'settings' => array(),
			)
		)
	);
        
        /**
	 * Option: Footer Bar Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-bar-bg-obj]', array(
			'default'           => kemet_get_option( 'footer-bar-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-bar-bg-obj]', array(
				'type'    => 'kmt-background',
				'section' => 'section-footer-small',
                                'priority' => 65,
				'label'   => __( 'Background', 'kemet' ),
			)
		)
	);
