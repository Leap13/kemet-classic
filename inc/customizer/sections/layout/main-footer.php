<?php
/**
* Bottom Footer Options for Wiz Theme.
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
* Option: Footer Widgets Layout Layout
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-layout]', array(
        'default'           => $defaults[ 'footer-layout' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);

$wp_customize->add_control(
    new Wiz_Control_Radio_Image(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-layout]', array(
            'type'    => 'wiz-radio-image',
            'label'   => __( 'Footer Widgets Layout', 'wiz' ),
            'priority'       => 5,
            'section' => 'section-wiz-footer',
            'choices' => array(
                'disabled' => array(
                    'label' => __( 'Disable', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/disable-footer.png',
                ),
                'layout-1' => array(
                    'label' => __( 'Layout 1', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/footer-layout-1.png',
                ),
                'layout-2' => array(
                    'label' => __( 'Layout 2', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/footer-layout-2.png',
                ),
                'layout-3' => array(
                    'label' => __( 'Layout 3', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/footer-layout-3.png',
                ),
                'layout-4' => array(
                    'label' => __( 'Layout 4', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/footer-layout-4.png',
                ),
                'layout-5' => array(
                    'label' => __( 'Layout 5', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/footer-layout-5.png',
                ),
                'layout-6' => array(
                    'label' => __( 'Layout 6', 'wiz' ),
                    'path'  => WIZ_THEME_URI . '/assets/images/footer-layout-6.png',
                ),
            ),
        )
    )
);
/**
 * Option: Sticky Footer
 */
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[enable-sticky-footer]', array(
        'default'           => wiz_get_option( 'enable-sticky-footer' ),
        'type'              => 'option',
        'description'       => 'This option add a height to your content to keep your footer at the bottom of your page.',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[enable-sticky-footer]', array(
        'section'  => 'section-wiz-footer',
        'label'    => __( 'Enable Sticky Footer', 'wiz' ),
        'priority' => 6,
        'type'     => 'checkbox',
    )
);
/**
* Option: Footer Content Align Center
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[enable-footer-content-center]', array(
        'default'           => $defaults[ 'enable-footer-content-center' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[enable-footer-content-center]', array(
        'type'            => 'checkbox',
        'section'         => 'section-wiz-footer',
        'label'           => __( 'Center Footer Content', 'wiz' ),
        'priority'        => 10,
    )
);

/**
* Option: Footer widget Background
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-bg-obj]', array(
        'default'           => $defaults[ 'footer-bg-obj' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_background_obj' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Background(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-bg-obj]', array(
            'type'    => 'wiz-background',
            'section' => 'section-wiz-footer',
            'priority' => 15,
            'label'   => __( 'Footer Background', 'wiz' ),
        )
    )
);
/**
* Option - Footer Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-padding]', array(
        'default'           => $defaults[ 'footer-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Spacing(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-padding]', array(
            'type'           => 'wiz-responsive-spacing',
            'section'        => 'section-wiz-footer',
            'priority'       => 20,
            'label'          => __( 'Footer Padding', 'wiz' ),
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
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[wiz-footer-title-style]', array(
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-footer-title-style]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Footer Widget Title Style', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 25,
        )
    )
);
/**
* Option: Widget Title Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-color]', array(
        'default'           => $defaults[ 'footer-wgt-title-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-wgt-title-color]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 30,
            'section' => 'section-wiz-footer',
        )
    )
);
/**
 * Option: Enable Widget Title Separator
 */
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[enable-footer-widget-title-separator]', array(
        'default'           =>  $defaults[ 'enable-footer-widget-title-separator' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[enable-footer-widget-title-separator]', array(
            'section'  => 'section-wiz-footer',
            'type'     => 'checkbox',
            'priority' => 32,
            'label'    => __( 'Enable Widget Title Separator', 'wiz' ),
        )
    )
);
/**
* Option: Widget Title Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-separator-color]', array(
        'default'           => $defaults[ 'footer-wgt-title-separator-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[enable-footer-widget-title-separator]/' . WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '==/!=', 
            'values' => '1/disabled',
            'operators' => '&&'
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-wgt-title-separator-color]', array(
            'label'   => __( 'Separator Color', 'wiz' ),
            'priority'       => 33,
            'section' => 'section-wiz-footer',
        )
    )
);
/**
* Option: Widget Title Border Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-widget-title-border-size]', array(
        'default'           => $defaults[ 'footer-widget-title-border-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[enable-footer-widget-title-separator]/' . WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '==/!=', 
            'values' => '1/disabled',
            'operators' => '&&'
        ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[footer-widget-title-border-size]', array(
        'type'        => 'number',
        'section'     => 'section-wiz-footer',
        'priority'    => 34,
        'label'       => __( 'Separator Width', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[footer-widget-title-font-size]', array(
        'default'           => $defaults[ 'footer-widget-title-font-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-widget-title-font-size]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 35,
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
* Option: Widget Title Font Family
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-font-family]', array(
        'default'           => $defaults[ 'footer-wgt-title-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-wgt-title-font-family]', array(
            'type'     => 'wiz-font-family',
            'label'    => __( 'Font Family', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 40,
            'connect'  => WIZ_THEME_SETTINGS . '[footer-wgt-title-font-weight]',
        )
    )
);

/**
* Option: Widget Title Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-font-weight]', array(
        'default'           => $defaults[ 'footer-wgt-title-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-wgt-title-font-weight]', array(
            'type'     => 'wiz-font-weight',
            'label'    => __( 'Font Weight', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 45,
            'connect'  => WIZ_THEME_SETTINGS . '[footer-wgt-title-font-family]',

        )
    )
);

/**
* Option: Widget Title Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-text-transform]', array(
        'default'           => $defaults[ 'footer-wgt-title-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-text-transform]', array(
        'section'  => 'section-wiz-footer',
        'label'    => __( 'Text Transform', 'wiz' ),
        'type'     => 'select',
        'priority' => 50,
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
* Option: Widget Title Line Height
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-title-line-height]', array(
        'default'           => $defaults[ 'footer-wgt-title-line-height' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-wgt-title-line-height]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 55,
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
* Option: Widget Title Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-widget-title-letter-spacing]', array(
        'default'           => $defaults[ 'footer-widget-title-letter-spacing' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-widget-title-letter-spacing]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 58,
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
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[wiz-footer-style]', array(
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-footer-style]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Footer Widget Content Style', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 60,
            'settings' => array(),
        )
    )
);
/**
* Option: Text Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-text-color]', array(
        'default'           => $defaults[ 'footer-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-text-color]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 65,
            'section' => 'section-wiz-footer',
        )
    )
);

/**
* Option: Footer Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-font-size]', array(
        'default'           => $defaults[ 'footer-font-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-font-size]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 70,
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
* Option: Footer Font Family
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-font-family]', array(
        'default'           => $defaults[ 'footer-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-font-family]', array(
            'type'     => 'wiz-font-family',
            'label'    => __( 'Font Family', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 75,
            'connect'  => WIZ_THEME_SETTINGS . '[footer-font-weight]',
        )
    )
);

/**
* Option: Footer Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-font-weight]', array(
        'default'           => $defaults[ 'footer-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-font-weight]', array(
            'type'     => 'wiz-font-weight',
            'label'    => __( 'Font Weight', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 80,
            'connect'  => WIZ_THEME_SETTINGS . '[footer-font-family]',

        )
    )
);

/**
* Option: Footer Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-text-transform]', array(
        'default'           => $defaults[ 'footer-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[footer-text-transform]', array(
        'section'  => 'section-wiz-footer',
        'label'    => __( 'Text Transform', 'wiz' ),
        'type'     => 'select',
        'priority' => 85,
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
* Option: Footer Line Height
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-line-height]', array(
        'default'           => $defaults[ 'footer-line-height' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-line-height]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 90,
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
* Option: Widget Title Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-letter-spacing]', array(
        'default'           => $defaults[ 'footer-letter-spacing' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-letter-spacing]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 93,
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
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[wiz-footer-input-title]', array(
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-footer-input-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Footer Input Fields Style', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 95,
            'settings' => array(),
        )
    )
);
/**
* Option: Footer Input color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-input-color]', array(
        'default'           => $defaults[ 'footer-input-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-input-color]', array(
            'section' => 'section-wiz-footer',
            'label'   => __( 'Input Field Text Color', 'wiz' ),
            'priority'       => 100,
        )
    )
);

/**
* Option: Footer Input Background Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-input-bg-color]', array(
        'default'           => $defaults[ 'footer-input-bg-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-input-bg-color]', array(
            'priority'       => 115,
            'section' => 'section-wiz-footer',
            'label'   => __( 'Input Field Background Color', 'wiz' ),
        )
    )
);

/**
* Option: Footer Input border Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-input-border-color]', array(
        'default'           => $defaults[ 'footer-input-border-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-input-border-color]', array(
            'priority'       => 120,
            'section' => 'section-wiz-footer',
            'label'   => __( 'Input Field Border Color', 'wiz' ),
        )
    )
);
/**
* Option: Input Field Border Radius
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-input-border-radius]', array(
        'default'           => $defaults[ 'footer-input-border-radius' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-input-border-radius]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 125,
            'label'          => __( 'Input Field Border Radius', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[footer-input-border-size]', array(
        'default'           => $defaults[ 'footer-input-border-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-input-border-size]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 130,
            'label'          => __( 'Input Field Border Size', 'wiz' ),
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
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[wiz-footer-general-title]', array(
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-footer-general-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Footer Widget General Style', 'wiz' ),
            'section'  => 'section-wiz-footer',
            'priority' => 135,
            'settings' => array(),
        )
    )
);
/**
* Option - Widget Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-widget-padding]', array(
        'default'           => $defaults[ 'footer-widget-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Spacing(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-widget-padding]', array(
            'type'           => 'wiz-responsive-spacing',
            'section'        => 'section-wiz-footer',
            'priority'       => 140,
            'label'          => __( 'Widget Spacing', 'wiz' ),
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
* Option - Widget Padding
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-inner-widget-padding]', array(
        'default'           => $defaults[ 'footer-inner-widget-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Spacing(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-inner-widget-padding]', array(
            'type'           => 'wiz-responsive-spacing',
            'section'        => 'section-wiz-footer',
            'priority'       => 143,
            'label'          => __( 'Widget Padding', 'wiz' ),
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
* Option: Widget Background Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-wgt-bg-color]', array(
        'default'           => $defaults[ 'footer-wgt-bg-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-wgt-bg-color]', array(
            'label'   => __( 'Background Color', 'wiz' ),
            'priority'       => 143,
            'section' => 'section-wiz-footer',
        )
    )
);
/**
* Option: Link Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-link-color]', array(
        'default'           => $defaults[ 'footer-link-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-link-color]', array(
            'label'   => __( 'Link Color', 'wiz' ),
            'priority'       => 145,
            'section' => 'section-wiz-footer',
        )
    )
);

/**
* Option: Link Hover Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-link-h-color]', array(
        'default'           => $defaults[ 'footer-link-h-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-link-h-color]', array(
            'label'   => __( 'Link Hover Color', 'wiz' ),
            'priority'       => 150,
            'section' => 'section-wiz-footer',
        )
    )
);

/**
* Option: Widget Meta Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-widget-meta-color]', array(
        'default'           => $defaults[ 'footer-widget-meta-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-widget-meta-color]', array(
            'label'   => __( 'Widget Meta Color', 'wiz' ),
            'priority'       => 155,
            'section' => 'section-wiz-footer',
        )
    )
);

/**
* Option: Button Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-button-color]', array(
        'default'           => $defaults[ 'footer-button-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-button-color]', array(
            'section' => 'section-wiz-footer',
            'label'   => __( 'Button Text Color', 'wiz' ),
            'priority'       => 160,
        )
    )
);
/**
* Option: Button Background Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-button-bg-color]', array(
        'default'           => $defaults[ 'footer-button-bg-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage', 
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-button-bg-color]', array(
            'priority'       => 165,
            'section' => 'section-wiz-footer',
            'label'   => __( 'Button Background Color', 'wiz' ),
        )
    )
);
/**
* Option: Button Hover Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-button-h-color]', array(
        'default'           => $defaults[ 'footer-button-h-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-button-h-color]', array(
            'priority'       => 170,
            'section' => 'section-wiz-footer',
            'label'   => __( 'Button Text Hover Color', 'wiz' ),
        )
    )
);



/**
* Option: Button Background Hover Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-button-bg-h-color]', array(
        'default'           => $defaults[ 'footer-button-bg-h-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-button-bg-h-color]', array(
            'priority'       => 175,
            'section' => 'section-wiz-footer',
            'label'   => __( 'Button Background Hover Color', 'wiz' ),
        )
    )
);

/**
* Option: Button Radius
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[footer-button-radius]', array(
        'default'           => $defaults[ 'footer-button-radius' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[footer-button-radius]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-wiz-footer',
            'priority'       => 180,
            'label'          => __( 'Button Radius', 'wiz' ),
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
