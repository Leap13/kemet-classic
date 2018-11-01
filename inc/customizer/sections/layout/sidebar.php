<?php
/**
 * Sidebar Option for Kemet Theme.
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
            * Option: Background Color
            */
           $wp_customize->add_setting(
               KEMET_THEME_SETTINGS . '[sidebar-background-color]', array(
                   'default'           => '',
                   'type'              => 'option',
                   'transport'         => 'postMessage',
                   'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
               )
           );
           $wp_customize->add_control(
               new WP_Customize_Color_Control(
                   $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-background-color]', array(
                       'label'   => __( 'Background Color', 'kemet' ),
                       'priority'       => 1,
                       'section' => 'section-sidebars',
                   )
               )
           );