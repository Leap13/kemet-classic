<?php
/**
 * Content Spacing Options for our theme.
 *
 * @package     Kemet
 * @author      Leap13
 * @copyright   Copyright (c) 2018, Leap13
 * @link        https://leap13.com/
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option: Divider
 */
$wp_customize->add_control(
	new Kemet_Control_Divider(
		$wp_customize, KEMET_THEME_SETTINGS . '[learndash-sidebar-layout-divider]', array(
			'section'  => 'section-sidebars',
			'type'     => 'kmt-divider',
			'priority' => 5,
			'settings' => array(),
		)
	)
);

/**
 * Option: LearnDash
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[learndash-sidebar-layout]', array(
		'default'           => kemet_get_option( 'learndash-sidebar-layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[learndash-sidebar-layout]', array(
		'type'        => 'select',
		'section'     => 'section-sidebars',
		'priority'    => 5,
		'label'       => __( 'LearnDash', 'kemet' ),
		'description' => __( 'This layout will apply on all single course, lesson, topic and quiz.', 'kemet' ),
		'choices'     => array(
			'default'       => __( 'Default', 'kemet' ),
			'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
			'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
			'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
		),
	)
);
