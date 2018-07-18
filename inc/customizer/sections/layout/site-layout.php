<?php
/**
 * Site Layout Option for Kemet Theme.
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
	 * Option: Container Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-content-width]', array(
			'default'           => 1200,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'validate_site_width' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-content-width]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-container-layout',
				'priority'    => 10,
				'label'       => __( 'Container Width', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 768,
					'step' => 1,
					'max'  => 1920,
				),
			)
		)
	);
