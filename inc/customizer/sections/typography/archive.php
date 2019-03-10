<?php
/**
 * Typography Options for Kemet Theme.
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
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-archive-summary-box-typo]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-archive-typo',
				'priority' => 0,
				'label'    => __( 'Archive Summary Box Title', 'kemet' ),
				'settings' => array(),
			)
		)
	);
	/**
	 * Option: Archive Summary Box Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-archive-summary-title]', array(
			'default'           => kemet_get_option( 'font-size-archive-summary-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-archive-summary-title]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-archive-typo',
				'priority'    => 4,
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-archive-typo-archive-title]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-archive-typo',
				'priority' => 5,
				'label'    => __( 'Blog Post Title', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Blog - Post Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-page-title]', array(
			'default'           => kemet_get_option( 'font-size-page-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-page-title]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-archive-typo',
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
