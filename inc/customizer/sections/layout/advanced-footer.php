<?php
/**
 * Bottom Footer Options for Kemet Theme.
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
             * Option: Footer Widgets Layout Layout
             */
            $wp_customize->add_setting(
                    KEMET_THEME_SETTINGS . '[footer-adv]', array(
                            'default'           => kemet_get_option( 'footer-adv' ),
                            'type'              => 'option',
                            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
                    )
            );

            $wp_customize->add_control(
                    new Kemet_Control_Radio_Image(
                            $wp_customize, KEMET_THEME_SETTINGS . '[footer-adv]', array(
                                    'type'    => 'kmt-radio-image',
                                    'label'   => __( 'Footer Widgets Layout', 'kemet' ),
                'priority'       => 1,
                                    'section' => 'section-footer-adv',
                                    'choices' => array(
                                            'disabled' => array(
                                                    'label' => __( 'Disable', 'kemet' ),
                                                    'path'  => KEMET_THEME_URI . '/assets/images/no-adv-footer-115x48.png',
                                            ),
                                            'layout-4' => array(
                                                    'label' => __( 'Layout 4', 'kemet' ),
                                                    'path'  => KEMET_THEME_URI . '/assets/images/layout-4-115x48.png',
                                            ),
                                    ),
                            )
                    )
            );
                
            /**
             * Option: Divider For Typography-divider
             */
            $wp_customize->add_control(
                    new Kemet_Control_Divider(
                            $wp_customize, KEMET_THEME_SETTINGS . '[footer-adv-typography-divider]', array(
                                    'section'  => 'section-footer-adv',
                                    'type'     => 'kmt-divider',
                                    'label'    => __( 'Typography', 'kemet' ),
                                    'priority'       => 4,
                                    'settings' => array(),
                            )
                    )
            );
            
            
            /**
             * Option: Footer Font Family
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-font-family]', array(
                    'default'           => kemet_get_option( 'footer-font-family' ),
                    'type'              => 'option',
                    'sanitize_callback' => 'sanitize_text_field',
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Typography(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-font-family]', array(
                        'type'     => 'kmt-font-family',
                        'label'    => __( 'Font Family', 'kemet' ),
                        'section'  => 'section-footer-adv',
                        'priority' => 5,
                        'connect'  => KEMET_THEME_SETTINGS . '[footer-font-weight]',
                    )
                )
            );
     
    
            /**
             * Option: Footer Font Weight
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-font-weight]', array(
                    'default'           => kemet_get_option( 'footer-font-weight' ),
                    'type'              => 'option',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Typography(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-font-weight]', array(
                        'type'     => 'kmt-font-weight',
                        'label'    => __( 'Font Weight', 'kemet' ),
                        'section'  => 'section-footer-adv',
                        'priority' => 6,
                        'connect'  => KEMET_THEME_SETTINGS . '[Footer-font-family]',

                    )
                )
            );

            /**
             * Option: Footer Text Transform
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-text-transform]', array(
                    'default'           => kemet_get_option( 'footer-text-transform' ),
                    'type'              => 'option',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
                )
            );
            $wp_customize->add_control(
                KEMET_THEME_SETTINGS . '[footer-text-transform]', array(
                    'section'  => 'section-footer-adv',
                    'label'    => __( 'Text Transform', 'kemet' ),
                    'type'     => 'select',
                    'priority' => 7,
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
             * Option: Footer Font Size
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-font-size]', array(
                    'default'           => kemet_get_option( 'footer-font-size' ),
                    'type'              => 'option',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Responsive(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-font-size]', array(
                        'type'        => 'kmt-responsive',
                        'section'     => 'section-footer-adv',
                        'priority'    => 8,
                        'label'       => __( 'Font Size', 'kemet' ),
                        'input_attrs' => array(
                            'min' => 0,
                        ),
                        'units'       => array(
                            'px' => 'px',
                        ),
                    )
                )
            );
            
           
            /**
             * Option: Footer Line Height
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-line-height]', array(
                    'default'           => '',
                    'type'              => 'option',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Slider(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-line-height]', array(
                        'type'        => 'kmt-slider',
                        'section'     => 'section-footer-adv',
                        'priority'    => 9,
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
            * Option: Text Color
            */
           $wp_customize->add_setting(
               KEMET_THEME_SETTINGS . '[footer-text-color]', array(
                   'default'           => '',
                   'type'              => 'option',
                   'transport'         => 'postMessage',
                   'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
               )
           );
           $wp_customize->add_control(
               new WP_Customize_Color_Control(
                   $wp_customize, KEMET_THEME_SETTINGS . '[footer-text-color]', array(
                       'label'   => __( 'Text Color', 'kemet' ),
                       'priority'       => 9,
                       'section' => 'section-footer-adv',
                   )
               )
           );
           
           
           /**
            * Option: Widget Title Color
            */
           $wp_customize->add_setting(
               KEMET_THEME_SETTINGS . '[footer-adv-wgt-title-color]', array(
                   'default'           => '',
                   'type'              => 'option',
                   'transport'         => 'postMessage',
                   'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
               )
            );
           $wp_customize->add_control(
               new WP_Customize_Color_Control(
                   $wp_customize, KEMET_THEME_SETTINGS . '[footer-adv-wgt-title-color]', array(
                       'label'   => __( 'Widget Title Color', 'kemet' ),
                       'priority'       => 9,
                       'section' => 'section-footer-adv',
                   )
               )
            );

            /**
             * Option: Link Color
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-adv-link-color]', array(
                    'default'           => '',
                    'type'              => 'option',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-adv-link-color]', array(
                        'label'   => __( 'Link Color', 'kemet' ),
                        'priority'       => 10,
                        'section' => 'section-footer-adv',
                    )
                )
            );

            /**
             * Option: Link Hover Color
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-adv-link-h-color]', array(
                    'default'           => '',
                    'type'              => 'option',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-adv-link-h-color]', array(
                        'label'   => __( 'Link Hover Color', 'kemet' ),
                        'priority'       => 11,
                        'section' => 'section-footer-adv',
                    )
                )
            );
            
            
           /**
            * Option: Button Text Color
            */
           $wp_customize->add_setting(
                   KEMET_THEME_SETTINGS . '[footer-button-text-color]', array(
                           'default'           => '',
                           'type'              => 'option',
                           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
                   )
           );
           $wp_customize->add_control(
                   new WP_Customize_Color_Control(
                           $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-text-color]', array(
                                   'section' => 'section-footer-adv',
                                   'priority'       => 12,
                                   'label'   => __( 'Button Text Color', 'kemet' ),
                           )
                   )
           );
           
           /**
            * Option: Button Hover Color
            */
           $wp_customize->add_setting(
                   KEMET_THEME_SETTINGS . '[footer-button-text-h-color]', array(
                           'default'           => '',
                           'type'              => 'option',
                           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
                   )
            );
           $wp_customize->add_control(
                   new WP_Customize_Color_Control(
                           $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-text-h-color]', array(
                                   'section' => 'section-footer-adv',
                                   'priority'       => 13,
                                   'label'   => __( 'Button Text Hover Color', 'kemet' ),
                           )
                   )
            );
            
           /**
            * Option: Button Background Color
            */
            $wp_customize->add_setting(
                   KEMET_THEME_SETTINGS . '[footer-button-bg-color]', array(
                           'default'           => '',
                           'type'              => 'option',
                           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
                   )
            );
            $wp_customize->add_control(
                   new WP_Customize_Color_Control(
                           $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-bg-color]', array(
                                   'section' => 'section-footer-adv',
                                   'priority'       => 14,
                                   'label'   => __( 'Button Background Color', 'kemet' ),
                           )
                   )
            );
            
            
           /**
            * Option: Button Background Hover Color
            */
            $wp_customize->add_setting(
                   KEMET_THEME_SETTINGS . '[footer-button-bg-h-color]', array(
                           'default'           => '',
                           'type'              => 'option',
                           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
                   )
            );
            $wp_customize->add_control(
                   new WP_Customize_Color_Control(
                           $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-bg-h-color]', array(
                                   'section' => 'section-footer-adv',
                                   'priority'       => 15,
                                   'label'   => __( 'Button Background Hover Color', 'kemet' ),
                           )
                   )
            );
            
            
           /**
            * Option: Button Radius
            */
            $wp_customize->add_setting(
                   KEMET_THEME_SETTINGS . '[footer-button-border-radius]', array(
                           'default'           => kemet_get_option( 'footer-button-border-radius' ),
                           'type'              => 'option',
                           'transport'         => 'postMessage',
                           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
                   )
            );
            $wp_customize->add_control(
                   KEMET_THEME_SETTINGS . '[footer-button-border-radius]', array(
                           'section'     => 'section-footer-adv',
                           'priority'       => 16,
                           'label'       => __( 'Button Radius', 'kemet' ),
                           'type'        => 'number',
                           'input_attrs' => array(
                                   'min'  => 0,
                                   'step' => 1,
                                   'max'  => 200,
                           ),
                   )
            );
        
            
            /**
             * Option - Footer Spacing
             */
            $wp_customize->add_setting(
                KEMET_THEME_SETTINGS . '[footer-padding]', array(
                    'default'           => kemet_get_option( 'footer-padding' ),
                    'type'              => 'option',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
                )
            );
            $wp_customize->add_control(
                new Kemet_Control_Responsive_Spacing(
                    $wp_customize, KEMET_THEME_SETTINGS . '[footer-padding]', array(
                        'type'           => 'kmt-responsive-spacing',
                        'section'        => 'section-footer-adv',
                        'priority'       => 20,
                        'label'          => __( 'Footer Padding', 'kemet' ),
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
             * Option: Boxed Inner Background
             */
            $wp_customize->add_setting(
                    KEMET_THEME_SETTINGS . '[footer-site-boxed-inner-bg]', array(
                            'default'           => kemet_get_option( 'footer-site-boxed-inner-bg' ),
                            'type'              => 'option',
                            'transport'         => 'postMessage',
                            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
                    )
            );
            $wp_customize->add_control(
                    new Kemet_Control_Background(
                            $wp_customize, KEMET_THEME_SETTINGS . '[footer-site-boxed-inner-bg]', array(
                                    'type'     => 'kmt-background',
                                    'section'  => 'section-footer-adv',
                                    'priority' => 25,
                                    'label'    => __( 'Inner Background', 'kemet' ),
                            )
                    )
            );
            
            
	// Learn More link if Kemet Pro is not activated.
	if ( ! defined( 'KEMET_EXT_VER' ) ) {

		/**
		 * Option: Divider
		 */
		$wp_customize->add_control(
			new Kemet_Control_Divider(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-widget-more-feature-divider]', array(
					'type'     => 'kmt-divider',
					'section'  => 'section-footer-adv',
					'priority' => 20,
					'settings' => array(),
				)
			)
		);
                
		/**
		 * Option: Learn More about Footer Widget
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-widget-more-feature-description]', array(
					'type'     => 'kmt-description',
					'section'  => 'section-footer-adv',
					'priority' => 50,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Footer Widgets in Kemet Pro!', 'kemet' ) . '</p><a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/footer-widgets-kemet-pro/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
        
       