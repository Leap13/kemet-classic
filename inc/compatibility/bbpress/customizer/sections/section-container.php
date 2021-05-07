<?php
/**
 * Container Options for Kemet theme.
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
		KEMET_THEME_SETTINGS . '[bbpress-content-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'bbPress', 'kemet' ),
			'section'  => 'section-container-layout',
			'priority' => 95,
			'settings' => array(),
		)
	)
);

/**
 * Option: Shop Page
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[bbpress-content-layout]',
	array(
		'default'           => kemet_get_option( 'bbpress-content-layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[bbpress-content-layout]',
	array(
		'type'     => 'select',
		'section'  => 'section-container-layout',
		'priority' => 95,
		'label'    => __( 'Container for bbPress', 'kemet' ),
		'choices'  => array(
			'default'                 => __( 'Default', 'kemet' ),
			'boxed-container'         => __( 'Boxed', 'kemet' ),
			'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
			'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
			'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
		),
	)
);
