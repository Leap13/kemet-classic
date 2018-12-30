<?php
/**
 * sidebar Options for Kemet Theme.
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
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-footer-image]', array(
				'section'  => 'section-sidebars',
				'priority' => 0,
				'type'     => 'kmt-divider',
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: sidebar Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sidebar-bg-obj]', array(
			'default'           => kemet_get_option( 'sidebar-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[sidebar-bg-obj]', array(
				'type'    => 'kmt-background',
                'section' => 'section-sidebars',
                'priority' => 2,
				'label'   => __( 'Background', 'kemet' ),
			)
		)
    );