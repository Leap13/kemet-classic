<?php
/**
 * Container Options for Kemet theme.
 *
 * @package     Kemet
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2018, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Kemet 1.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[lifterlms-content-divider]', array(
				'section'  => 'section-container-layout',
				'type'     => 'ast-divider',
				'priority' => 66,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Shop Page
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[lifterlms-content-layout]', array(
			'default'           => astra_get_option( 'lifterlms-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[lifterlms-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 66,
			'label'    => __( 'Container for LifterLMS', 'astra' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'astra' ),
				'boxed-container'         => __( 'Boxed', 'astra' ),
				'content-boxed-container' => __( 'Content Boxed', 'astra' ),
				'plain-container'         => __( 'Full Width / Contained', 'astra' ),
				'page-builder'            => __( 'Full Width / Stretched', 'astra' ),
			),
		)
	);
