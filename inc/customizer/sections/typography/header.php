<?php
/**
 * Site Identity Typography Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
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
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-header-typo-title]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-header-typo',
				'priority' => 5,
				'label'    => __( 'Site Title', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Site Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-site-title]', array(
			'default'           => kemet_get_option( 'font-size-site-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-site-title]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-header-typo',
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
	 * Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-header-typo-tagline]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-header-typo',
				'priority' => 15,
				'label'    => __( 'Site Tagline', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Site Tagline Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-site-tagline]', array(
			'default'           => kemet_get_option( 'font-size-site-tagline' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-site-tagline]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-header-typo',
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

