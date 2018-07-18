<?php
/**
 * Styling Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.15
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-color]', array(
				'label'   => __( 'Text Color', 'kemet' ),
				'section' => 'section-colors-footer',
			)
		)
	);

	/**
	 * Option: Link Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-link-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-link-color]', array(
				'label'   => __( 'Link Color', 'kemet' ),
				'section' => 'section-colors-footer',
			)
		)
	);

	/**
	 * Option: Link Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-link-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-link-h-color]', array(
				'label'   => __( 'Link Hover Color', 'kemet' ),
				'section' => 'section-colors-footer',
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-footer-image]', array(
				'section'  => 'section-colors-footer',
				'type'     => 'kmt-divider',
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-bg-obj]', array(
			'default'           => kemet_get_option( 'footer-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-bg-obj]', array(
				'type'    => 'kmt-background',
				'section' => 'section-colors-footer',
				'label'   => __( 'Background', 'kemet' ),
			)
		)
	);
