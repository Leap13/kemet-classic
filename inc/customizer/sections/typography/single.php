<?php
/**
 * Typography Options for Kemet Theme.
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
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-header-single-title]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-single-typo',
				'priority' => 5,
				'label'    => __( 'Single Post / Page Title', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Single Post / Page Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-entry-title]', array(
			'default'           => kemet_get_option( 'font-size-entry-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-entry-title]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-single-typo',
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
	 * Option: Single Post / Page Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-color-entry-title]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
			new Kemet_Control_Color(
				$wp_customize, KEMET_THEME_SETTINGS . '[font-color-entry-title]', array(
               'type'    => 'kmt-color',
					'label'   => __( 'Font Color', 'kemet' ),
					'section' => 'section-single-typo',
				)
			)
		);
    
    
    
    
    
    

	// Learn More link if Kemet Pro is not activated.
	if ( ! defined( 'KEMET_EXT_VER' ) ) {

		/**
		 * Option: Divider
		 */
		$wp_customize->add_control(
			new Kemet_Control_Divider(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-sngle-blog-typography-more-feature-divider]', array(
					'type'     => 'kmt-divider',
					'section'  => 'section-single-typo',
					'priority' => 15,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Typography
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-sngle-blog-typography-more-feature-description]', array(
					'type'     => 'kmt-description',
					'section'  => 'section-single-typo',
					'priority' => 15,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Typography in Kemet Pro!', 'kemet' ) . '</p><a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/typography-module/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
