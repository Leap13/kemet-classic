<?php
/**
 * Page Title Options for Kemet Theme.
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
     * Option: Display Page Title
     */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[display-page-title]', array(
			'default'           => kemet_get_option( 'display-page-title' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[display-page-title]', array(
			'type'            => 'checkbox',
			'section'         => 'section-page-title',
			'label'           => __( 'Display Page Title', 'kemet' ),
			'priority'        => 1,
		)
    );
	
	
	/**
     * Option: Display Posts Title
     */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[display-post-title]', array(
			'default'           => kemet_get_option( 'display-post-title' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[display-post-title]', array(
			'type'            => 'checkbox',
			'section'         => 'section-page-title',
			'label'           => __( 'Display Posts Title', 'kemet' ),
			'priority'        => 2,
		)
	);
	
	/**
     * Option: Display Archives Title
     */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[display-archive-title]', array(
			'default'           => kemet_get_option( 'display-archive-title' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[display-archive-title]', array(
			'type'            => 'checkbox',
			'section'         => 'section-page-title',
			'label'           => __( 'Display Archives Title', 'kemet' ),
			'priority'        => 3,
		)
	);
	
    /**
	 * Option: Page Title Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[page-title-bg-obj]', array(
			'default'           => kemet_get_option( 'page-title-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[page-title-bg-obj]', array(
				'section' => 'section-page-title',
				'type'    => 'kmt-background',
                'label'   => __( 'Background', 'kemet' ),
                'priority'       => 4,
                'active_callback' => 'kmt_dep_page_title'
			)
		)
    );
	
	/**
     * Option - Page Title Spacing
     */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[page-title-padding]', array(
			'default'           => kemet_get_option( 'page-title-padding' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Spacing(
			$wp_customize, KEMET_THEME_SETTINGS . '[page-title-padding]', array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-page-title',
				'priority'       => 5,
				'label'          => __( 'Padding', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'active_callback' => 'kmt_dep_page_title'
			)
		)
	);