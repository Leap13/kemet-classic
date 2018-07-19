<?php
/**
 * Container Options for Kemet theme.
 *
 * @package     Kemet
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2018, Brainstorm Force
 * @link        http://www.brainstormforce.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option: Divider
 */
$wp_customize->add_control(
	new Kemet_Control_Divider(
		$wp_customize, KEMET_THEME_SETTINGS . '[learndash-content-divider]', array(
			'section'  => 'section-container-layout',
			'type'     => 'kmt-divider',
			'priority' => 68,
			'settings' => array(),
		)
	)
);

/**
 * Option: Shop Page
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[learndash-content-layout]', array(
		'default'           => kemet_get_option( 'learndash-content-layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[learndash-content-layout]', array(
		'type'        => 'select',
		'section'     => 'section-container-layout',
		'priority'    => 68,
		'label'       => __( 'Container for LearnDash', 'kemet' ),
		'description' => __( 'Will be applied to All Single Courses, Topics, Lessons and Quizzes. Does not work on pages created with LearnDash shortcodes.', 'kemet' ),
		'choices'     => array(
			'default'                 => __( 'Default', 'kemet' ),
			'boxed-container'         => __( 'Boxed', 'kemet' ),
			'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
			'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
			'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
		),
	)
);
