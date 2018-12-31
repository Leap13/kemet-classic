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
    $wp_customize, KEMET_THEME_SETTINGS . '[divider-section-widgets-width]', array(
    'section' => 'section-widgets',
    'type' => 'kmt-divider',
    'priority' => 10,
    'settings' => array(),
    )
    )
    );
    /**
	 * Option: Button Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[Widget-bg-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[Widget-bg-color]', array(
                'priority'       => 18,
                'section' => 'section-widgets',
				'label'   => __( 'Widget Background Color', 'kemet' ),
			)
		)
	);