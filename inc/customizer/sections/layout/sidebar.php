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
           
            /**
             * Option - Sidebar Spacing
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[sidebar-spacing]', array(
                    'default'           => kemet_get_option( 'sidebar-spacing' ),
                    'type'              => 'option',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Responsive_Spacing(
                    $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-spacing]', array(
                        'type'           => 'kmt-responsive-spacing',
                        'section'        => 'section-sidebars',
                        'priority'       => 2,
                        'label'          => __( 'Sidebar Padding', 'kemet' ),
                        'linked_choices' => true,
                        'unit_choices'   => array( 'px', 'em', '%' ),
                        'choices'        => array(
                            'top'    => __( 'Top', 'kemet' ),
                            'right'  => __( 'Right', 'kemet' ),
                            'bottom' => __( 'Bottom', 'kemet' ),
                            'left'   => __( 'Left', 'kemet' ),
                        ),
                    )
                )
            );