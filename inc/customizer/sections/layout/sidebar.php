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
            
            
            /**
             * Option: Divider
             */
            $wp_customize->add_control(
                   new Kemet_Control_Divider(
                           $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-layout-divider]', array(
                                   'section'  => 'section-sidebars',
                                   'type'     => 'kmt-divider',
                                   'label'    => __('Widget Title Typography', 'kemet'),
                                   'priority' => 3,
                                   'settings' => array(),
                           )
                   )
            );
            
            /**
             * Option: Sidebar Widget Title Font Family
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-family]', array(
                    'default'           => kemet_get_option( 'sidebar-widget-title-font-family' ),
                    'type'              => 'option',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Typography(
                    $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-family]', array(
                        'type'     => 'kmt-font-family',
                        'label'    => __( 'Font Family', 'kemet' ),
                        'section'  => 'section-sidebars',
                        'priority' => 4,
                        'connect'  => KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-weight]',
                        
                    )
                )
            );
            
            
            /**
             * Option: Sidebar Widget Title Font weight
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-weight]', array(
                    'default'           => kemet_get_option( 'sidebar-widget-title-font-weight' ),
                    'type'              => 'option',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Typography(
                    $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-weight]', array(
                        'type'     => 'kmt-font-weight',
                        'label'    => __( 'Font Weight', 'kemet' ),
                        'section'  => 'section-sidebars',
                        'priority' => 5,
                        'connect'  => KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-family]',

                    )
                )
            );

            
            /**
             * Option: Sidebar Widget Title Text Transform
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[sidebar-widget-title-text-transform]', array(
                    'default'           => kemet_get_option( 'sidebar-widget-title-text-transform' ),
                    'type'              => 'option',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
                )
            );
            $wp_customize->add_control(
                KEMET_THEME_SETTINGS . '[sidebar-widget-title-text-transform]', array(
                    'section'  => 'section-sidebars',
                    'label'    => __( 'Text Transform', 'kemet' ),
                    'type'     => 'select',
                    'priority' => 6,
                    'choices'  => array(
                        ''           => __( 'Inherit', 'kemet' ),
                        'none'       => __( 'None', 'kemet' ),
                        'capitalize' => __( 'Capitalize', 'kemet' ),
                        'uppercase'  => __( 'Uppercase', 'kemet' ),
                        'lowercase'  => __( 'Lowercase', 'kemet' ),
                    ),
                )
            );
        
            
            /**
             * Option: Sidebar Widget Title Font Size
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-size]', array(
                    'default'           => kemet_get_option( 'sidebar-widget-title-font-size' ),
                    'type'              => 'option',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Responsive(
                    $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-widget-title-font-size]', array(
                        'type'        => 'kmt-responsive',
                        'section'     => 'section-sidebars',
                        'priority'    => 7,
                        'label'       => __( 'Font Size', 'kemet' ),
                        'input_attrs' => array(
                            'min' => 0,
                        ),
                        'units'       => array(
                            'px' => 'px',
                            'em' => 'em',
                        ),
                    )
                )
            );
            
           
            /**
             * Option: Sidebar Widget Title Line Height
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[sidebar-widget-title-line-height]', array(
                    'default'           => '',
                    'type'              => 'option',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Slider(
                    $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-widget-title-line-height]', array(
                        'type'        => 'kmt-slider',
                        'section'     => 'section-sidebars',
                        'priority'    => 8,
                        'label'       => __( 'Line Height', 'kemet' ),
                        'suffix'      => '',
                        'input_attrs' => array(
                            'min'  => 1,
                            'step' => 0.01,
                            'max'  => 5,
                        ),
                    )
                )
            );

            
            /**
            * Option: Sidebar Widget Title Text Color
            */
            $wp_customize->add_setting(
               KEMET_THEME_SETTINGS . '[sidebar-widget-title-text-color]', array(
                   'default'           => '',
                   'type'              => 'option',
                   'transport'         => 'postMessage',
                   'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
               )
            );
            $wp_customize->add_control(
               new WP_Customize_Color_Control(
                   $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-widget-title-text-color]', array(
                       'label'   => __( 'Text Color', 'kemet' ),
                       'priority'       => 9,
                       'section' => 'section-sidebars',
                   )
               )
            );
           