<?php
/**
 * sidebar Options for Wiz Theme.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$defaults = Wiz_Theme_Options::defaults();

    /**
     * Option: Sidebar Width
     */
    $wp_customize->add_setting(
        WIZ_THEME_SETTINGS . '[site-sidebar-width]', array(
            'default'           => $defaults[ 'site-sidebar-width' ],
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
        )
    );
    $wp_customize->add_control(
        new Wiz_Control_Slider(
            $wp_customize, WIZ_THEME_SETTINGS . '[site-sidebar-width]', array(
                'type'        => 'wiz-slider',
                'section'     => 'section-sidebars',
                'priority'    => 5,
                'label'       => __( 'Sidebar Width(%)', 'wiz' ),
                'input_attrs' => array(
                    'min'  => 15,
                    'step' => 1,
                    'max'  => 50,
                ),
                'description'  => __('Sidebar width will apply only when one of the following sidebar is set.', 'wiz'),
            )
        )
    );


    /**
     * Option: Default Sidebar Position
     */
    $wp_customize->add_setting(
        WIZ_THEME_SETTINGS . '[site-sidebar-layout]', array(
            'default'           => $defaults[ 'site-sidebar-layout' ],
            'type'              => 'option',
            'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
        )
    );

    $wp_customize->add_control(
        WIZ_THEME_SETTINGS . '[site-sidebar-layout]', array(
            'type'     => 'select',
            'section'  => 'section-sidebars',
            'priority' => 15,
            'label'    => __( 'Default Layout', 'wiz' ),
            'choices'  => array(
                'no-sidebar'    => __( 'No Sidebar', 'wiz' ),
                'left-sidebar'  => __( 'Left Sidebar', 'wiz' ),
                'right-sidebar' => __( 'Right Sidebar', 'wiz' ),
            ),
        )
    );

    /**
     * Option: Page
     */
    $wp_customize->add_setting(
        WIZ_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
            'default'           => $defaults[ 'single-page-sidebar-layout' ],
            'type'              => 'option',
            'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
        )
    );
    $wp_customize->add_control(
        WIZ_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
            'type'     => 'select',
            'section'  => 'section-sidebars',
            'priority' => 20,
            'label'    => __( 'Pages', 'wiz' ),
            'choices'  => array(
                'default'       => __( 'Default', 'wiz' ),
                'no-sidebar'    => __( 'No Sidebar', 'wiz' ),
                'left-sidebar'  => __( 'Left Sidebar', 'wiz' ),
                'right-sidebar' => __( 'Right Sidebar', 'wiz' ),
            ),
        )
    );

    /**
     * Option: Blog Post
     */
    $wp_customize->add_setting(
        WIZ_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
            'default'           => $defaults[ 'single-post-sidebar-layout' ],
            'type'              => 'option',
            'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
        )
    );
    $wp_customize->add_control(
        WIZ_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
            'type'     => 'select',
            'section'  => 'section-sidebars',
            'priority' => 25,
            'label'    => __( 'Blog Posts', 'wiz' ),
            'choices'  => array(
                'default'       => __( 'Default', 'wiz' ),
                'no-sidebar'    => __( 'No Sidebar', 'wiz' ),
                'left-sidebar'  => __( 'Left Sidebar', 'wiz' ),
                'right-sidebar' => __( 'Right Sidebar', 'wiz' ),
            ),
        )
    );

        /**
         * Option: Blog Post Archive
         */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
                'default'           => $defaults[ 'archive-post-sidebar-layout' ],
                'type'              => 'option',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
            )
        );
        $wp_customize->add_control(
            WIZ_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
                'type'     => 'select',
                'section'  => 'section-sidebars',
                'priority' => 30,
                'label'    => __( 'Blog Post Archives', 'wiz' ),
                'choices'  => array(
                    'default'       => __( 'Default', 'wiz' ),
                    'no-sidebar'    => __( 'No Sidebar', 'wiz' ),
                    'left-sidebar'  => __( 'Left Sidebar', 'wiz' ),
                    'right-sidebar' => __( 'Right Sidebar', 'wiz' ),
                ),
            )
        );

    /**
	 * Option: sidebar Background
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sidebar-bg-obj]', array(
			'default'           => $defaults[ 'sidebar-bg-obj' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Background(
			$wp_customize, WIZ_THEME_SETTINGS . '[sidebar-bg-obj]', array(
				'type'    => 'wiz-background',
                'section' => 'section-sidebars',
                'priority' => 35,
				'label'   => __( 'Sidebar Background', 'wiz' ),
			)
		)
    );

        /**
        * Option: Title
        */
        $wp_customize->add_control(
            new Wiz_Control_Title(
                $wp_customize, WIZ_THEME_SETTINGS . '[wiz-sidebar-style]', array(
                    'type'     => 'wiz-title',
                    'label'    => __( 'Sidebar Content Style', 'wiz' ),
                    'section'  => 'section-sidebars',
                    'priority' => 40,
                    'settings' => array(),
                )
            )
        );

        /**
        * Option: Heading 6 ( H6 ) Font Size
        */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-content-font-size]', array(
                'default'           => $defaults[ 'sidebar-content-font-size' ],
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Responsive_Slider(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-content-font-size]', array(
                    'type'           => 'wiz-responsive-slider',
                    'section'        => 'section-sidebars',
                    'priority'       => 41,
                    'label'          => __( 'Font Size', 'wiz' ),
                    'unit_choices'   => array(
                        'px' => array(
                            'min' => 1,
                            'step' => 1,
                            'max' =>200,
                        ),
                        'em' => array(
                            'min' => 0.1,
                            'step' => 0.1,
                            'max' => 10,
                        ),
                    ),
                )
            )
        );
        /**
         * Option: Text Color
        */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-text-color]', array(
                'default'           => $defaults[ 'sidebar-text-color' ],
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Color(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-text-color]', array(
                    'label'   => __( 'Text Color', 'wiz' ),
                    'priority'       => 45,
                    'section' => 'section-sidebars',
                )
            )
        );


        /**
        * Option: Link Color
        */
		$wp_customize->add_setting(
			WIZ_THEME_SETTINGS . '[sidebar-link-color]', array(
				'default'           => $defaults[ 'sidebar-link-color' ],
				'type'              => 'option',
				'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Wiz_Control_Color(
				$wp_customize, WIZ_THEME_SETTINGS . '[sidebar-link-color]', array(
					'label'   => __( 'Link Color', 'wiz' ),
					'priority'       => 50,
					'section' => 'section-sidebars',
				)
			)
        );
        
        /**
        * Option: Link Hover Color
        */
		$wp_customize->add_setting(
			WIZ_THEME_SETTINGS . '[sidebar-link-h-color]', array(
				'default'           => $defaults[ 'sidebar-link-h-color' ],
				'type'              => 'option',
				'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Wiz_Control_Color(
				$wp_customize, WIZ_THEME_SETTINGS . '[sidebar-link-h-color]', array(
					'label'   => __( 'Link Hover Color', 'wiz' ),
					'priority'       => 55,
					'section' => 'section-sidebars',
				)
			)
        );
        /**
    * Option - sidebar Spacing
    */
    $wp_customize->add_setting(
        WIZ_THEME_SETTINGS . '[sidebar-padding]', array(
            'default'           => $defaults[ 'sidebar-padding' ],
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        )
    );
    $wp_customize->add_control(
        new Wiz_Control_Responsive_Spacing(
            $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-padding]', array(
                'type'           => 'wiz-responsive-spacing',
                'section'        => 'section-sidebars',
                'priority'       => 60,
                'label'          => __( 'Sidebar Padding', 'wiz' ),
                'linked_choices' => true,
                'unit_choices'   => array( 'px', 'em', '%' ),
                'choices'        => array(
                    'top'    => __( 'Top', 'wiz' ),
                    'right'  => __( 'Right', 'wiz' ),
                    'bottom' => __( 'Bottom', 'wiz' ),
                    'left'   => __( 'Left', 'wiz' ),
                ),
            )
        )
    );
        /**
        * Option: Title
        */
        $wp_customize->add_control(
            new Wiz_Control_Title(
                $wp_customize, WIZ_THEME_SETTINGS . '[wiz-sidebar-title]', array(
                    'type'     => 'wiz-title',
                    'label'    => __( 'Sidebar Input Fields Style', 'wiz' ),
                    'section'  => 'section-sidebars',
                    'priority' => 65,
                    'settings' => array(),
                )
            )
        );
        /**
         * Option: Sidebar Input color
         */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-input-color]', array(
                'default'           => $defaults[ 'sidebar-input-color' ],
                'type'              => 'option',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Color(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-input-color]', array(
                    'section' => 'section-sidebars',
                    'label'   => __( 'Input Field Text Color', 'wiz' ),
                    'priority'       =>70,
                )
            )
        );
        /**
         * Option: Sidebar Input Background Color
         */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-input-bg-color]', array(
                'default'           => $defaults[ 'sidebar-input-bg-color' ],
                'type'              => 'option',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Color(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-input-bg-color]', array(
                    'priority'       => 75,
                    'section' => 'section-sidebars',
                    'label'   => __( 'Input Field Background Color', 'wiz' ),
                )
            )
        );
        /**
         * Option: Sidebar Input border Color
         */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-input-border-color]', array(
                'default'           => $defaults[ 'sidebar-input-border-color' ],
                'type'              => 'option',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Color(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-input-border-color]', array(
                    'priority'       => 80,
                    'section' => 'section-sidebars',
                    'label'   => __( 'Sidebar Input Border Color', 'wiz' ),
                )
            )
        );
        /**
        * Option: Input Field Border Radius
        */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-input-border-radius]', array(
                'default'           => $defaults[ 'sidebar-input-border-radius' ],
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Responsive_Slider(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-input-border-radius]', array(
                    'type'           => 'wiz-responsive-slider',
                    'section'        => 'section-sidebars',
                    'priority'       => 85,
                    'label'          => __( 'Input Field Border Radius', 'wiz' ),
                    'unit_choices'   => array(
                        'px' => array(
                            'min' => 1,
                            'step' => 1,
                            'max' =>200,
                        ),
                        'em' => array(
                            'min' => 0.1,
                            'step' => 0.1,
                            'max' => 10,
                        ),
                        '%' => array(
                            'min' => 1,
                            'step' => 1,
                            'max' => 100,
                        ),
                    ),
                )
            )
        );
        /**
        * Option: Input Field Border Radius
        */
        $wp_customize->add_setting(
            WIZ_THEME_SETTINGS . '[sidebar-input-border-size]', array(
                'default'           => $defaults[ 'sidebar-input-border-size' ],
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
            )
        );
        $wp_customize->add_control(
            new Wiz_Control_Responsive_Slider(
                $wp_customize, WIZ_THEME_SETTINGS . '[sidebar-input-border-size]', array(
                    'type'           => 'wiz-responsive-slider',
                    'section'        => 'section-sidebars',
                    'priority'       => 90,
                    'label'          => __( 'Input Field Border Size', 'wiz' ),
                    'unit_choices'   => array(
                        'px' => array(
                            'min' => 1,
                            'step' => 1,
                            'max' =>200,
                        ),
                        'em' => array(
                            'min' => 0.1,
                            'step' => 0.1,
                            'max' => 10,
                        ),
                    ),
                )
            )
        );