<?php
/**
 * Content Spacing Options for our theme.
 *
 * @package     Kemet
 * @author      Leap13
 * @copyright   Copyright (c) 2019, Leap13
 * @link        https://leap13.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[bbpress-sidebar-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'bbPress', 'kemet' ),
			'section'  => 'section-sidebars',
			'priority' => 145,
			'settings' => array(),
		)
	)
);

/**
 * Option: Shop Page
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[bbpress-sidebar-layout]',
	array(
		'default'           => kemet_get_option( 'bbpress-sidebar-layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[bbpress-sidebar-layout]',
	array(
		'type'     => 'select',
		'section'  => 'section-sidebars',
		'priority' => 145,
		'label'    => __( 'bbPress', 'kemet' ),
		'choices'  => array(
			'default'       => __( 'Default', 'kemet' ),
			'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
			'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
			'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
		),
	)
);
