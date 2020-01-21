<?php
/**
* Bottom Footer Options for Kemet Theme.
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

/**
* Option: Footer Widgets Layout Layout
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer]', array(
        'default'           => kemet_get_option( 'kemet-footer' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);

$wp_customize->add_control(
    new Kemet_Control_Radio_Image(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer]', array(
            'type'    => 'kmt-radio-image',
            'label'   => __( 'Footer Widgets Layout', 'kemet' ),
            'priority'       => 5,
            'section' => 'section-kemet-footer',
            'choices' => array(
                'disabled' => array(
                    'label' => __( 'Disable', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/disable-footer.png',
                ),
                'layout-1' => array(
                    'label' => __( 'Layout 1', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-1.png',
                ),
                'layout-2' => array(
                    'label' => __( 'Layout 2', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-2.png',
                ),
                'layout-3' => array(
                    'label' => __( 'Layout 3', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-3.png',
                ),
                'layout-4' => array(
                    'label' => __( 'Layout 4', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-4.png',
                ),
                'layout-5' => array(
                    'label' => __( 'Layout 5', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-5.png',
                ),
                'layout-6' => array(
                    'label' => __( 'Layout 6', 'kemet' ),
                    'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-6.png',
                ),
            ),
        )
    )
);

/**
* Option: Footer Content Align Center
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[enable-footer-content-center]', array(
        'default'           => kemet_get_option( 'enable-footer-content-center' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[enable-footer-content-center]', array(
        'type'            => 'checkbox',
        'section'         => 'section-kemet-footer',
        'label'           => __( 'Center Footer Content', 'kemet' ),
        'priority'        => 10,
    )
);

/**
* Option: Footer widget Background
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-bg-obj]', array(
        'default'           => kemet_get_option( 'kemet-footer-bg-obj' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Background(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-bg-obj]', array(
            'type'    => 'kmt-background',
            'section' => 'section-kemet-footer',
            'priority' => 15,
            'label'   => __( 'Footer Background', 'kemet' ),
        )
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
            'section'        => 'section-kemet-footer',
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
 * Option: Title
 */
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-title-style]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Footer Widget Title Style', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 25,
            'settings' => array(),
        )
    )
);
/**
* Option: Widget Title Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-color]', array(
        'default'           => kemet_get_option( 'kemet-footer-wgt-title-color' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-color]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 30,
            'section' => 'section-kemet-footer',
        )
    )
);
/**
 * Option: Enable Widget Title Separator
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]', array(
        'default'           =>  kemet_get_option( 'enable-footer-widget-title-separator' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]', array(
            'section'  => 'section-kemet-footer',
            'type'     => 'checkbox',
            'priority' => 32,
            'label'    => __( 'Enable Widget Title Separator', 'kemet' ),
        )
    )
);
/**
* Option: Widget Title Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-separator-color]', array(
        'default'           => kemet_get_option( 'kemet-footer-wgt-title-separator-color' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-separator-color]', array(
            'label'   => __( 'Separator Color', 'kemet' ),
            'priority'       => 33,
            'section' => 'section-kemet-footer',
        )
    )
);
/**
* Option: Widget Title Border Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-widget-title-border-size]', array(
        'default'           => kemet_get_option( 'footer-widget-title-border-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[footer-widget-title-border-size]', array(
        'type'        => 'number',
        'section'     => 'section-kemet-footer',
        'priority'    => 34,
        'label'       => __( 'Separator Width', 'kemet' ),
        'input_attrs' => array(
            'min'  => 0,
            'step' => 1,
            'max'  => 600,
        ),
    )
);
/**
* Option: Widget Title Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-widget-title-font-size]', array(
        'default'           => kemet_get_option( 'kemet-footer-widget-title-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-widget-title-font-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-kemet-footer',
            'priority'       => 35,
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
* Option: Widget Title Font Family
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-font-family]', array(
        'default'           => kemet_get_option( 'kemet-footer-wgt-title-font-family' ),
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Kemet_Control_Typography(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-font-family]', array(
            'type'     => 'kmt-font-family',
            'label'    => __( 'Font Family', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 40,
            'connect'  => KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-font-weight]',
        )
    )
);

/**
* Option: Widget Title Font Weight
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-font-weight]', array(
        'default'           => kemet_get_option( 'kemet-footer-wgt-title-font-weight' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Typography(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-font-weight]', array(
            'type'     => 'kmt-font-weight',
            'label'    => __( 'Font Weight', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 45,
            'connect'  => KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-font-family]',

        )
    )
);

/**
* Option: Widget Title Text Transform
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-text-transform]', array(
        'default'           => kemet_get_option( 'kemet-footer-wgt-title-text-transform' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-text-transform]', array(
        'section'  => 'section-kemet-footer',
        'label'    => __( 'Text Transform', 'kemet' ),
        'type'     => 'select',
        'priority' => 50,
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
* Option: Widget Title Line Height
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-line-height]', array(
        'default'           => '',
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-wgt-title-line-height]', array(
            'type'        => 'kmt-slider',
            'section'     => 'section-kemet-footer',
            'priority'    => 55,
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
 * Option: Title
 */
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-style]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Footer Widget Content Style', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 60,
            'settings' => array(),
        )
    )
);
/**
* Option: Text Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-text-color]', array(
        'default'           => '',
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-text-color]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 65,
            'section' => 'section-kemet-footer',
        )
    )
);

/**
* Option: Footer Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-font-size]', array(
        'default'           => kemet_get_option( 'footer-font-size' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-font-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-kemet-footer',
            'priority'       => 70,
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
* Option: Footer Font Family
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-font-family]', array(
        'default'           => 'inherit',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Kemet_Control_Typography(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-font-family]', array(
            'type'     => 'kmt-font-family',
            'label'    => __( 'Font Family', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 75,
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
            'section'  => 'section-kemet-footer',
            'priority' => 80,
            'connect'  => KEMET_THEME_SETTINGS . '[footer-font-family]',

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
        'section'  => 'section-kemet-footer',
        'label'    => __( 'Text Transform', 'kemet' ),
        'type'     => 'select',
        'priority' => 85,
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
* Option: Footer Line Height
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-line-height]', array(
        'default'           => kemet_get_option( 'footer-line-height' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-line-height]', array(
            'type'        => 'kmt-slider',
            'section'     => 'section-kemet-footer',
            'priority'    => 90,
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
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-input-title]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Footer Input Fields Style', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 95,
            'settings' => array(),
        )
    )
);
/**
* Option: Footer Input color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-input-color]', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-input-color]', array(
            'section' => 'section-kemet-footer',
            'label'   => __( 'Input Field Text Color', 'kemet' ),
            'priority'       => 100,
        )
    )
);

/**
* Option: Footer Input Background Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-input-bg-color]', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-input-bg-color]', array(
            'priority'       => 115,
            'section' => 'section-kemet-footer',
            'label'   => __( 'Input Field Background Color', 'kemet' ),
        )
    )
);

/**
* Option: Footer Input border Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-input-border-color]', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-input-border-color]', array(
            'priority'       => 120,
            'section' => 'section-kemet-footer',
            'label'   => __( 'Input Field Border Color', 'kemet' ),
        )
    )
);
/**
* Option: Input Field Border Radius
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-input-border-radius]', array(
        'default'           => kemet_get_option( 'footer-input-border-radius' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-input-border-radius]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-kemet-footer',
            'priority'       => 125,
            'label'          => __( 'Input Field Border Radius', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 1,
                    'step' => 1,
                    'max' =>100,
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
 * Option: Input Field Border Size
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-input-border-size]', array(
        'default'           => kemet_get_option( 'footer-input-border-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-input-border-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-kemet-footer',
            'priority'       => 130,
            'label'          => __( 'Input Field Border Size', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 1,
                    'step' => 1,
                    'max' =>100,
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
* Option: Title
*/
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-general-title]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Footer Widget General Style', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 135,
            'settings' => array(),
        )
    )
);
/**
* Option - Widget Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-widget-padding]', array(
        'default'           => kemet_get_option( 'footer-widget-padding' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Spacing(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-widget-padding]', array(
            'type'           => 'kmt-responsive-spacing',
            'section'        => 'section-kemet-footer',
            'priority'       => 140,
            'label'          => __( 'Widget Spacing', 'kemet' ),
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
* Option: Widget Title Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-wgt-bg-color]', array(
        'default'           => kemet_get_option( 'kemet-footer-wgt-bg-color' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-wgt-bg-color]', array(
            'label'   => __( 'Background Color', 'kemet' ),
            'priority'       => 143,
            'section' => 'section-kemet-footer',
        )
    )
);
/**
* Option: Link Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-link-color]', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-link-color]', array(
            'label'   => __( 'Link Color', 'kemet' ),
            'priority'       => 145,
            'section' => 'section-kemet-footer',
        )
    )
);

/**
* Option: Link Hover Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-link-h-color]', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-link-h-color]', array(
            'label'   => __( 'Link Hover Color', 'kemet' ),
            'priority'       => 150,
            'section' => 'section-kemet-footer',
        )
    )
);

/**
* Option: Widget Meta Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kemet-footer-widget-meta-color]', array(
        'default'           => '',
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[kemet-footer-widget-meta-color]', array(
            'label'   => __( 'Widget Meta Color', 'kemet' ),
            'priority'       => 155,
            'section' => 'section-kemet-footer',
        )
    )
);

/**
* Option: Button Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-button-color]', array(
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-color]', array(
            'section' => 'section-kemet-footer',
            'label'   => __( 'Button Text Color', 'kemet' ),
            'priority'       => 160,
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
        'transport'         => 'postMessage', 
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-bg-color]', array(
            'priority'       => 165,
            'section' => 'section-kemet-footer',
            'label'   => __( 'Button Background Color', 'kemet' ),
        )
    )
);
/**
* Option: Button Hover Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-button-h-color]', array(
        'default'           => '',
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-h-color]', array(
            'priority'       => 170,
            'section' => 'section-kemet-footer',
            'label'   => __( 'Button Text Hover Color', 'kemet' ),
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
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-bg-h-color]', array(
            'priority'       => 175,
            'section' => 'section-kemet-footer',
            'label'   => __( 'Button Background Hover Color', 'kemet' ),
        )
    )
);

/**
* Option: Button Radius
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-button-radius]', array(
        'default'           => kemet_get_option( 'footer-button-radius' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-button-radius]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-kemet-footer',
            'priority'       => 180,
            'label'          => __( 'Button Radius', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 1,
                    'step' => 1,
                    'max' =>100,
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
