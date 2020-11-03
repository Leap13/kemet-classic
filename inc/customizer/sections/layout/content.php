<?php
/**
* Content Options for Kemet Theme.
*
* @package     Kemet
* @author      Kemet
* @copyright   Copyright ( c ) 2019, Kemet
* @link        https://kemet.io/
* @since       Kemet 1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$defaults = Kemet_Theme_Options::defaults();
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-content-styling-title]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Body Content Style', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 0,
            'settings' => array(),
        )
    )
);
/**
* Option: Content Text Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[content-text-color]', array(
        'default'           => $defaults[ 'content-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[content-text-color]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 5,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Typography
*/
$fields = array(
    /**
    * Option: Title Font Size
    */
      array(
        'id'                => '[font-size-body]',
        'default'           => $defaults ['font-size-body'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-contents',
        'priority'          => 2,
        'label'          => __( 'Font Size', 'kemet' ),
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
    ),
     /**
     * Option: Font Family
     */
    array(
        'id'                => '[body-font-family]',
        'default'           => $defaults[ 'body-font-family' ],
        'type'              => 'option',
        'control_type'      => 'kmt-font-family',
        'label'             => __( 'Font Family', 'kemet' ),
        'section'           => 'section-contents',
        'priority'          => 3,
        'connect'           => KEMET_THEME_SETTINGS . '[body-font-weight]',
    ),
     /**
     * Option: Font Weight
     */
    array(
        'id'                => '[body-font-weight]',
        'default'           => $defaults[ 'body-font-weight' ],
        'type'              => 'option',
        'control_type'      => 'kmt-font-weight',
        'label'             => __( 'Font Weight', 'kemet' ),
        'section'           => 'section-contents',
        'priority'          => 4,
        'connect'           => KEMET_THEME_SETTINGS . '[body-font-family]',
    ),
    /**
    * Option: Body Text Transform
    */
    array(
        'id'                => '[body-text-transform]',
        'default'           => $defaults[ 'body-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-select',
        'label'             => __( 'Text Transform', 'kemet' ),
        'section'           => 'section-contents',
        'priority'          => 5,
        'choices'  => array(
            ''           => __( 'Default', 'kemet' ),
            'none'       => __( 'None', 'kemet' ),
            'capitalize' => __( 'Capitalize', 'kemet' ),
            'uppercase'  => __( 'Uppercase', 'kemet' ),
            'lowercase'  => __( 'Lowercase', 'kemet' ),
        ),
    ),
    /**
    * Option: Body Line Height
    */
      array(
        'id'                => '[body-line-height]',
        'default'           => $defaults ['body-line-height'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-contents',
        'transport'         => 'postMessage',
        'priority'          => 6,
        'label'          => __( 'Line Height', 'kemet' ),
        'unit_choices'   => array(
            'px' => array(
                'min' => 0,
                'step' => 1,
                'max' =>100,
            ),
            'em' => array(
                'min' => 0,
                'step' => 1,
                'max' => 10,
            ),
            '%' => array(
                'min' => 0,
                'step' => 1,
                'max' => 100,
            ),
        ),
    ),
    /**
    * Option: Body Letter Spacing
    */
    array(
        'id'                => '[letter-spacing-body]',
        'default'           => $defaults ['letter-spacing-body'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-contents',
        'priority'       => 7,
        'label'          => __( 'Letter Spacing', 'kemet' ),
        'unit_choices'   => array(
            'px' => array(
                'min' => 0.1,
                'step' => 0.1,
                'max' => 10,
            ),
        ),
    ),
);
$group_settings = array(
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-content-typography]',
    'type'     => 'kmt-group',
    'label'    => __( 'Typography', 'kemet' ),
    'section'  => 'section-contents',
    'priority' => 1,
    'settings' => array(),
);

new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
/**
* Option: Paragraph Margin Bottom
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[para-margin-bottom]', array(
        'default'           => $defaults[ 'para-margin-bottom' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[para-margin-bottom]', array(
            'type'        => 'kmt-slider',
            'section'     => 'section-contents',
            'priority'    => 35,
            'label'       => __( 'Paragraph Margin Bottom', 'kemet' ),
            'suffix'      => '',
            'input_attrs' => array(
                'min'  => 0.5,
                'step' => 0.01,
                'max'  => 5,
            ),
        )
    )
);
/**
* Option: Colors
*/
$fields = array(
    
    /**
    * Option - Color
    */
    array(
        'id'                => '[content-link-color]',
        'default'           => $defaults ['content-link-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Link Color', 'kemet' ),
        'priority'          => 1,
        'section'           => 'section-contents',
        'tab'               => __( 'Normal', 'kemet' ),
    ),  
    /**
    * Option - Hover Color
    */
    array(
        'id'                => '[content-link-h-color]',
        'default'           => $defaults ['content-link-h-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Link Color', 'kemet' ),
        'priority'          => 2,
        'section'           => 'section-contents',
        'tab'               => __( 'Hover', 'kemet' ),
    ),    
);
$group_settings = array(
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-content-link-colors]',
    'type'     => 'kmt-group',
    'label'    => __( 'Link Colors', 'kemet' ),
    'section'  => 'section-contents',
    'priority' => 40,
    'settings' => array(),
);
new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-styling-title]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Headings Style', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 46,
            'settings' => array(),
        )
    )
);

/**
* Option: Headings Font Family
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[headings-font-family]', array(
        'default'           => $defaults[ 'headings-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Kemet_Control_Typography(
        $wp_customize, KEMET_THEME_SETTINGS . '[headings-font-family]', array(
            'type'     => 'kmt-font-family',
            'label'    => __( 'Font Family', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 55,
            'connect'  => KEMET_THEME_SETTINGS . '[headings-font-weight]',
        )
    )
);

/**
* Option: Font Weight
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[headings-font-weight]', array(
        'default'           => $defaults[ 'headings-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Typography(
        $wp_customize, KEMET_THEME_SETTINGS . '[headings-font-weight]', array(
            'type'        => 'kmt-font-weight',
            'kmt_inherit' => __( 'Default', 'kemet' ),
            'section'     => 'section-contents',
            'priority'    => 60,
            'label'       => __( 'Font Weight', 'kemet' ),
            'connect'     => KEMET_THEME_SETTINGS . '[headings-font-family]',
        )
    )
);

/**
* Option: Headings Text Transform
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[headings-text-transform]', array(
        'default'           => $defaults[ 'headings-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[headings-text-transform]', array(
        'section'  => 'section-contents',
        'label'    => __( 'Text Transform', 'kemet' ),
        'type'     => 'select',
        'priority' => 65,
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
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-1]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Heading 1', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 70,
            'settings' => array(),
        )
    )
);
/**
* Option: Heading 1 Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-color-h1]', array(
        'default'           => $defaults[ 'font-color-h1' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-color-h1]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 75,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Heading 1 ( H1 ) Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-size-h1]', array(
        'default'           => $defaults[ 'font-size-h1' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-size-h1]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 80,
            'label'          => __( 'Font Size', 'kemet' ),
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[letter-spacing-h1]', array(
        'default'           => $defaults[ 'letter-spacing-h1' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[letter-spacing-h1]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 83,
            'label'          => __( 'Letter Spacing', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-2]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Heading 2', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 105,
            'settings' => array(),
        )
    )
);
/**
* Option: Heading 2 Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-color-h2]', array(
        'default'           => $defaults[ 'font-color-h2' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-color-h2]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 110,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Heading 2 ( H2 ) Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-size-h2]', array(
        'default'           => $defaults[ 'font-size-h2' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-size-h2]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 115,
            'label'          => __( 'Font Size', 'kemet' ),
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[letter-spacing-h2]', array(
        'default'           => $defaults[ 'letter-spacing-h2' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[letter-spacing-h2]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 118,
            'label'          => __( 'Letter Spacing', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-3]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Heading 3', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 120,
            'settings' => array(),
        )
    )
);
/**
* Option: Heading 3 Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-color-h3]', array(
        'default'           => $defaults[ 'font-color-h3' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-color-h3]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 125,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Heading 3 ( H3 ) Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-size-h3]', array(
        'default'           => $defaults[ 'font-size-h3' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-size-h3]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 130,
            'label'          => __( 'Font Size', 'kemet' ),
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[letter-spacing-h3]', array(
        'default'           => $defaults[ 'letter-spacing-h3' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[letter-spacing-h3]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 133,
            'label'          => __( 'Letter Spacing', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-4]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Heading 4', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 135,
            'settings' => array(),
        )
    )
);
/**
* Option: Heading 4 Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-color-h4]', array(
        'default'           => $defaults[ 'font-color-h4' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-color-h4]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 140,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Heading 4 ( H4 ) Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-size-h4]', array(
        'default'           => $defaults[ 'font-size-h4' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-size-h4]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 145,
            'label'          => __( 'Font Size', 'kemet' ),
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[letter-spacing-h4]', array(
        'default'           => $defaults[ 'letter-spacing-h4' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[letter-spacing-h4]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 148,
            'label'          => __( 'Letter Spacing', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-5]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Heading 5', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 150,
            'settings' => array(),
        )
    )
);
/**
* Option: Heading 5 Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-color-h5]', array(
        'default'           => $defaults[ 'font-color-h5' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-color-h5]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 155,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Heading 5 ( H5 ) Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-size-h5]', array(
        'default'           => $defaults[ 'font-size-h5' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-size-h5]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 160,
            'label'          => __( 'Font Size', 'kemet' ),
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[letter-spacing-h5]', array(
        'default'           => $defaults[ 'letter-spacing-h5' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[letter-spacing-h5]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 163,
            'label'          => __( 'Letter Spacing', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-heading-6]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Heading 6', 'kemet' ),
            'section'  => 'section-contents',
            'priority' => 165,
            'settings' => array(),
        )
    )
);
/**
* Option: Heading 6 Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-color-h6]', array(
        'default'           => $defaults[ 'font-color-h6' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-color-h6]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 170,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Heading 6 ( H6 ) Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[font-size-h6]', array(
        'default'           => $defaults[ 'font-size-h6' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[font-size-h6]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 175,
            'label'          => __( 'Font Size', 'kemet' ),
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[letter-spacing-h6]', array(
        'default'           => $defaults[ 'letter-spacing-h6' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[letter-spacing-h6]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 178,
            'label'          => __( 'Letter Spacing', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 10,
                ),
            ),
        )
    )
);