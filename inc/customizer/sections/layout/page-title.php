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
     * Option: display Page Title
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
	 * Option: Page Title Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[page-title-bg-color]', array(
			'default'           => kemet_get_option( 'page-title-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[page-title-bg-color]', array(
                'section' => 'section-page-title',
                'label'   => __( 'Background Color', 'kemet' ),
                'priority'       => 2,
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
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[page-title-padding]', array(
            'section'        => 'section-page-title',
            'priority'       => 3,
            'label'          => __( 'Vertical Padding', 'kemet' ),
            'linked_choices' => true,
            'type'        => 'number',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
            ),
            'active_callback' => 'kmt_dep_page_title'
        )
    );