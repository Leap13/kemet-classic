<?php
/**
 * LifterLMS General Options for our theme.
 *
 * @package     Kemet
 * @author      Leap13
 * @copyright   Copyright (c) 2018, Leap13
 * @link        https://leap13.com/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Option: Divider
 */
$wp_customize->add_control(
	new Kemet_Control_Divider(
		$wp_customize, KEMET_THEME_SETTINGS . '[learndash-lesson-content]', array(
			'label'    => __( 'Course Content Table', 'kemet' ),
			'section'  => 'section-learndash',
			'type'     => 'kmt-divider',
			'priority' => 20,
			'settings' => array(),
		)
	)
);
/**
 * Option: Display Serial Number
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[learndash-lesson-serial-number]', array(
		'default'           => kemet_get_option( 'learndash-lesson-serial-number' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[learndash-lesson-serial-number]', array(
		'section'  => 'section-learndash',
		'label'    => __( 'Display Serial Number', 'kemet' ),
		'priority' => 25,
		'type'     => 'checkbox',
	)
);

/**
 * Option: Differentiate Rows
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[learndash-differentiate-rows]', array(
		'default'           => kemet_get_option( 'learndash-differentiate-rows' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[learndash-differentiate-rows]', array(
		'section'  => 'section-learndash',
		'label'    => __( 'Differentiate Rows', 'kemet' ),
		'priority' => 30,
		'type'     => 'checkbox',
	)
);
