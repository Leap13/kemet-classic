<?php
/**
* Content Options for Wiz Theme.
*
* @package     Wiz
* @author      Wiz
* @copyright   Copyright ( c ) 2019, Wiz
* @link        https://wiz.io/
* @since       Wiz 1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$defaults = Wiz_Theme_Options::defaults();
/**
* Option: Title
*/
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-content-styling-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Body Content Style', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[content-text-color]', array(
        'default'           => $defaults[ 'content-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[content-text-color]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 5,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Body Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-body]', array(
        'default'           => $defaults[ 'font-size-body' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-body]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 10,
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
* Option: Font Family
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[body-font-family]', array(
        'default'           => $defaults[ 'body-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[body-font-family]', array(
            'type'        => 'wiz-font-family',
            'section'     => 'section-contents',
            'priority'    => 15,
            'label'       => __( 'Font Family', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[body-font-weight]',
        )
    )
);

/**
* Option: Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[body-font-weight]', array(
        'default'           => $defaults[ 'body-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[body-font-weight]', array(
            'type'        => 'wiz-font-weight',
            'section'     => 'section-contents',
            'priority'    => 20,
            'label'       => __( 'Font Weight', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[body-font-family]',
        )
    )
);

/**
* Option: Body Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[body-text-transform]', array(
        'default'           => $defaults[ 'body-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[body-text-transform]', array(
        'type'     => 'select',
        'section'  => 'section-contents',
        'priority' => 25,
        'label'    => __( 'Text Transform', 'wiz' ),
        'choices'  => array(
            ''           => __( 'Default', 'wiz' ),
            'none'       => __( 'None', 'wiz' ),
            'capitalize' => __( 'Capitalize', 'wiz' ),
            'uppercase'  => __( 'Uppercase', 'wiz' ),
            'lowercase'  => __( 'Lowercase', 'wiz' ),
        ),
    )
);

/**
* Option: Body Line Height
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[body-line-height]', array(
        'default'           => $defaults[ 'body-line-height' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[body-line-height]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 30,
            'label'          => __( 'Line Height', 'wiz' ),
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
        )
    )
);
/**
* Option: Body Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-body]', array(
        'default'           => $defaults[ 'letter-spacing-body' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-body]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 33,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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
* Option: Paragraph Margin Bottom
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[para-margin-bottom]', array(
        'default'           => $defaults[ 'para-margin-bottom' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[para-margin-bottom]', array(
            'type'        => 'wiz-slider',
            'section'     => 'section-contents',
            'priority'    => 35,
            'label'       => __( 'Paragraph Margin Bottom', 'wiz' ),
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
* Option: Content Link Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[content-link-color]', array(
        'default'           => $defaults[ 'content-link-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[content-link-color]', array(
            'label'   => __( 'Link Color', 'wiz' ),
            'priority'       => 40,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Content Link Hover Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[content-link-h-color]', array(
        'default'           => $defaults[ 'content-link-h-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[content-link-h-color]', array(
            'label'   => __( 'Link Hover Color', 'wiz' ),
            'priority'       => 45,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Title
*/
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-styling-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Headings Style', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[headings-font-family]', array(
        'default'           => $defaults[ 'headings-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[headings-font-family]', array(
            'type'     => 'wiz-font-family',
            'label'    => __( 'Font Family', 'wiz' ),
            'section'  => 'section-contents',
            'priority' => 55,
            'connect'  => WIZ_THEME_SETTINGS . '[headings-font-weight]',
        )
    )
);

/**
* Option: Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[headings-font-weight]', array(
        'default'           => $defaults[ 'headings-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[headings-font-weight]', array(
            'type'        => 'wiz-font-weight',
            'wiz_inherit' => __( 'Default', 'wiz' ),
            'section'     => 'section-contents',
            'priority'    => 60,
            'label'       => __( 'Font Weight', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[headings-font-family]',
        )
    )
);

/**
* Option: Headings Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[headings-text-transform]', array(
        'default'           => $defaults[ 'headings-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[headings-text-transform]', array(
        'section'  => 'section-contents',
        'label'    => __( 'Text Transform', 'wiz' ),
        'type'     => 'select',
        'priority' => 65,
        'choices'  => array(
            ''           => __( 'Inherit', 'wiz' ),
            'none'       => __( 'None', 'wiz' ),
            'capitalize' => __( 'Capitalize', 'wiz' ),
            'uppercase'  => __( 'Uppercase', 'wiz' ),
            'lowercase'  => __( 'Lowercase', 'wiz' ),
        ),
    )
);
/**
* Option: Title
*/
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-1]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Heading 1', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[font-color-h1]', array(
        'default'           => $defaults[ 'font-color-h1' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-h1]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 75,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Heading 1 ( H1 ) Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-h1]', array(
        'default'           => $defaults[ 'font-size-h1' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-h1]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 80,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-h1]', array(
        'default'           => $defaults[ 'letter-spacing-h1' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-h1]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 83,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-2]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Heading 2', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[font-color-h2]', array(
        'default'           => $defaults[ 'font-color-h2' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-h2]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 110,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Heading 2 ( H2 ) Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-h2]', array(
        'default'           => $defaults[ 'font-size-h2' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-h2]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 115,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-h2]', array(
        'default'           => $defaults[ 'letter-spacing-h2' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-h2]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 118,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-3]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Heading 3', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[font-color-h3]', array(
        'default'           => $defaults[ 'font-color-h3' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-h3]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 125,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Heading 3 ( H3 ) Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-h3]', array(
        'default'           => $defaults[ 'font-size-h3' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-h3]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 130,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-h3]', array(
        'default'           => $defaults[ 'letter-spacing-h3' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-h3]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 133,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-4]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Heading 4', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[font-color-h4]', array(
        'default'           => $defaults[ 'font-color-h4' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-h4]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 140,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Heading 4 ( H4 ) Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-h4]', array(
        'default'           => $defaults[ 'font-size-h4' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-h4]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 145,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-h4]', array(
        'default'           => $defaults[ 'letter-spacing-h4' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-h4]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 148,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-5]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Heading 5', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[font-color-h5]', array(
        'default'           => $defaults[ 'font-color-h5' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-h5]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 155,
            'section' => 'section-contents',
        )
    )
);

/**
* Option: Heading 5 ( H5 ) Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-h5]', array(
        'default'           => $defaults[ 'font-size-h5' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-h5]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 160,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-h5]', array(
        'default'           => $defaults[ 'letter-spacing-h5' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-h5]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 163,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-heading-6]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Heading 6', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[font-color-h6]', array(
        'default'           => $defaults[ 'font-color-h6' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-h6]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 170,
            'section' => 'section-contents',
        )
    )
);
/**
* Option: Heading 6 ( H6 ) Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-h6]', array(
        'default'           => $defaults[ 'font-size-h6' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-h6]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 175,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-h6]', array(
        'default'           => $defaults[ 'letter-spacing-h6' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-h6]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-contents',
            'priority'       => 178,
            'label'          => __( 'Letter Spacing', 'wiz' ),
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