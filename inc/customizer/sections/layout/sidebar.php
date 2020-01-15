<?php
/**
 * sidebar Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


    /**
     * Option: Sidebar Width
     */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[site-sidebar-width]', array(
            'default'           => 30,
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
        )
    );
    $wp_customize->add_control(
        new Kemet_Control_Slider(
            $wp_customize, KEMET_THEME_SETTINGS . '[site-sidebar-width]', array(
                'type'        => 'kmt-slider',
                'section'     => 'section-sidebars',
                'priority'    => 5,
                'label'       => __( 'Sidebar Width', 'kemet' ),
                'suffix'      => '%',
                'input_attrs' => array(
                    'min'  => 15,
                    'step' => 1,
                    'max'  => 50,
                ),
                'description'  => __('Sidebar width will apply only when one of the following sidebar is set.', 'kemet'),
            )
        )
    );


    /**
     * Option: Default Sidebar Position
     */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[site-sidebar-layout]', array(
            'default'           => kemet_get_option( 'site-sidebar-layout' ),
            'type'              => 'option',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
        )
    );

    $wp_customize->add_control(
        KEMET_THEME_SETTINGS . '[site-sidebar-layout]', array(
            'type'     => 'select',
            'section'  => 'section-sidebars',
            'priority' => 15,
            'label'    => __( 'Default Layout', 'kemet' ),
            'choices'  => array(
                'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
                'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
                'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
            ),
        )
    );

    /**
     * Option: Page
     */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
            'default'           => kemet_get_option( 'single-page-sidebar-layout' ),
            'type'              => 'option',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
        )
    );
    $wp_customize->add_control(
        KEMET_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
            'type'     => 'select',
            'section'  => 'section-sidebars',
            'priority' => 20,
            'label'    => __( 'Pages', 'kemet' ),
            'choices'  => array(
                'default'       => __( 'Default', 'kemet' ),
                'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
                'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
                'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
            ),
        )
    );

    /**
         * Option: Blog Post Archive
         */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
                'default'           => kemet_get_option( 'archive-post-sidebar-layout' ),
                'type'              => 'option',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
            )
        );
        $wp_customize->add_control(
            KEMET_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
                'type'     => 'select',
                'section'  => 'section-sidebars',
                'priority' => 25,
                'label'    => __( 'Blog Post Archives', 'kemet' ),
                'choices'  => array(
                    'default'       => __( 'Default', 'kemet' ),
                    'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
                    'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
                    'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
                ),
            )
        );

    /**
     * Option: Blog Post
     */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
            'default'           => kemet_get_option( 'single-post-sidebar-layout' ),
            'type'              => 'option',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
        )
    );
    $wp_customize->add_control(
        KEMET_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
            'type'     => 'select',
            'section'  => 'section-sidebars',
            'priority' => 30,
            'label'    => __( 'Blog Posts', 'kemet' ),
            'choices'  => array(
                'default'       => __( 'Default', 'kemet' ),
                'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
                'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
                'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
            ),
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
                'priority' => 35,
				'label'   => __( 'Sidebar Background', 'kemet' ),
			)
		)
    );

            /**
         * Option: Text Color
        */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[sidebar-text-color]', array(
                'default'           => '',
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Kemet_Control_Color(
                $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-text-color]', array(
                    'label'   => __( 'Text Color', 'kemet' ),
                    'priority'       => 40,
                    'section' => 'section-sidebars',
                )
            )
        );


        /**
        * Option: Link Color
        */
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[sidebar-link-color]', array(
				'default'           => '',
				'type'              => 'option',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Kemet_Control_Color(
				$wp_customize, KEMET_THEME_SETTINGS . '[sidebar-link-color]', array(
					'label'   => __( 'Link Color', 'kemet' ),
					'priority'       => 45,
					'section' => 'section-sidebars',
				)
			)
        );
        
        /**
        * Option: Link Hover Color
        */
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[sidebar-link-h-color]', array(
				'default'           => '',
				'type'              => 'option',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Kemet_Control_Color(
				$wp_customize, KEMET_THEME_SETTINGS . '[sidebar-link-h-color]', array(
					'label'   => __( 'Link Hover Color', 'kemet' ),
					'priority'       => 50,
					'section' => 'section-sidebars',
				)
			)
        );
        /**
    * Option - sidebar Spacing
    */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[sidebar-padding]', array(
            'default'           => kemet_get_option( 'sidebar-padding' ),
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        )
    );
    $wp_customize->add_control(
        new Kemet_Control_Responsive_Spacing(
            $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-padding]', array(
                'type'           => 'kmt-responsive-spacing',
                'section'        => 'section-sidebars',
                'priority'       => 55,
                'label'          => __( 'sidebar Padding', 'kemet' ),
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
         * Option: Sidebar Input border Color
         */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[sidebar-input-border-color]', array(
                'default'           => kemet_get_option( 'sidebar-input-border-color' ),
                'type'              => 'option',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Kemet_Control_Color(
                $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-input-border-color]', array(
                    'priority'       => 60,
                    'section' => 'section-sidebars',
                    'label'   => __( 'Sidebar Input Border Color', 'kemet' ),
                )
            )
        );

        /**
         * Option: Sidebar Input color
         */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[sidebar-input-color]', array(
                'default'           => kemet_get_option( 'sidebar-input-color' ),
                'type'              => 'option',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Kemet_Control_Color(
                $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-input-color]', array(
                    'section' => 'section-sidebars',
                    'label'   => __( 'Sidebar Input Color', 'kemet' ),
                    'priority'       =>65,
                )
            )
        );
        /**
         * Option: Sidebar Input Background Color
         */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[sidebar-input-bg-color]', array(
                'default'           => kemet_get_option( 'sidebar-input-bg-color' ),
                'type'              => 'option',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Kemet_Control_Color(
                $wp_customize, KEMET_THEME_SETTINGS . '[sidebar-input-bg-color]', array(
                    'priority'       => 70,
                    'section' => 'section-sidebars',
                    'label'   => __( 'Sidebar Input Background Color', 'kemet' ),
                )
            )
        );

        /**
        * Option: Widgets separator Color
        */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[side-bar-widgets-separator-color]', array(
                'default'           => '',
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Kemet_Control_Color(
                $wp_customize, KEMET_THEME_SETTINGS . '[side-bar-widgets-separator-color]', array(
                    'type'    => 'kmt-color',
                    'priority'    => 75,
                    'label'   => __( 'Separator Color', 'kemet' ),
                    'section' => 'section-sidebars',
                )
            )
        );