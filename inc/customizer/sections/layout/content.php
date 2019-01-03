<?php
/**
 * content Options for Kemet Theme.
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
				'priority' => 1,
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
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-text-color]', array(
				'label'   => __( 'Text Color', 'kemet' ),
				'priority'       => 2,
				'section' => 'section-contents',
			)
		)
	);
	/**
      * Option: Content Link Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[content-link-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-link-color]', array(
				'label'   => __( 'link Color', 'kemet' ),
				'priority'       => 3,
				'section' => 'section-contents',
			)
		)
	);
	/**
      * Option: Content Link Hover Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[content-link-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-link-h-color]', array(
				'label'   => __( 'link Hover Color', 'kemet' ),
				'priority'       => 4,
				'section' => 'section-contents',
			)
		)
	);