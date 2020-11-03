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
$defaults = Kemet_Theme_Options::defaults();
/**
* Option: Footer Widgets Layout Layout
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-layout]', array(
        'default'           => $defaults[ 'footer-layout' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);

$wp_customize->add_control(
    new Kemet_Control_Radio_Image(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-layout]', array(
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
 * Option: Sticky Footer
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[enable-sticky-footer]', array(
        'default'           => kemet_get_option( 'enable-sticky-footer' ),
        'type'              => 'option',
        'description'       => 'This option add a height to your content to keep your footer at the bottom of your page.',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[enable-sticky-footer]', array(
        'section'  => 'section-kemet-footer',
        'label'    => __( 'Enable Sticky Footer', 'kemet' ),
        'priority' => 6,
        'type'     => 'checkbox',
    )
);
/**
* Option: Footer Content Align Center
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[enable-footer-content-center]', array(
        'default'           => $defaults[ 'enable-footer-content-center' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
* Option: Header Inner Background
*/
$fields = array(
    array(
        'id'                => '[footer-bg-obj]',
        'default'           => $defaults[ 'footer-bg-obj' ],
        'type'              => 'option',
        'control_type'      => 'kmt-background',
        'section'           => 'section-kemet-footer',
        'priority'          => 1,
        'transport'         => 'postMessage',
    ),
    
);
$group_settings = array(
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-footer-bg-obj]',
    'type'     => 'kmt-group',
    'label'    => __( 'Footer Background', 'kemet' ),
    'section'  => 'section-kemet-footer',
    'priority' => 15,
    'settings' => array(),
    'dependency'  => array(
        'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
        'conditions' => '!=', 
        'values' => 'disabled',
    ),
);
new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
/**
* Option - Footer Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-padding]', array(
        'default'           => $defaults[ 'footer-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kmt-footer-title-style]', array(
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-title-style]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Footer Widget Title Style', 'kemet' ),
            'section'  => 'section-kemet-footer',
            'priority' => 25,
        )
    )
);
/**
* Option: Widget Title Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-wgt-title-color]', array(
        'default'           => $defaults[ 'footer-wgt-title-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-wgt-title-color]', array(
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
        'default'           =>  $defaults[ 'enable-footer-widget-title-separator' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
    KEMET_THEME_SETTINGS . '[footer-wgt-title-separator-color]', array(
        'default'           => $defaults[ 'footer-wgt-title-separator-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]/' . KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '==/!=', 
            'values' => '1/disabled',
            'operators' => '&&'
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-wgt-title-separator-color]', array(
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
        'default'           => $defaults[ 'footer-widget-title-border-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]/' . KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '==/!=', 
            'values' => '1/disabled',
            'operators' => '&&'
        ),
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
 * Option:Sub Menu Items Typography
 */

$fields = array(
    /**
    * Option: Footer Font Size
    */
    array(
        'id'                => '[footer-widget-title-font-size]',
        'default'           => $defaults ['footer-widget-title-font-size'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-kemet-footer',
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
        'id'                => '[footer-wgt-title-font-family]',
        'default'           => $defaults[ 'footer-wgt-title-font-family' ],
        'type'              => 'option',
        'control_type'      => 'kmt-font-family',
        'label'             => __( 'Font Family', 'kemet' ),
        'section'           => 'section-kemet-footer',
        'priority'          => 3,
        'connect'           => KEMET_THEME_SETTINGS . '[footer-wgt-title-font-weight]',
    ),
    /**
     * Option: Font Weight
     */
    array(
        'id'                => '[footer-wgt-title-font-weight]',
        'default'           => $defaults[ 'footer-wgt-title-font-weight' ],
        'type'              => 'option',
        'control_type'      => 'kmt-font-weight',
        'label'             => __( 'Font Weight', 'kemet' ),
        'section'           => 'section-kemet-footer',
        'priority'          => 4,
        'connect'           => KEMET_THEME_SETTINGS . '[footer-wgt-title-font-family]',
    ),
    /**
    * Option: Footer Text Transform
    */
    array(
        'id'                => '[footer-wgt-title-text-transform]',
        'default'           => $defaults[ 'footer-wgt-title-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-select',
        'label'             => __( 'Text Transform', 'kemet' ),
        'section'           => 'section-kemet-footer',
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
    * Option: Footer Line Height
    */
    array(
        'id'                => '[footer-wgt-title-line-height]',
        'default'           => $defaults ['footer-wgt-title-line-height'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-kemet-footer',
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
    * Option: Footer Letter Spacing
    */
    array(
        'id'                => '[footer-widget-title-letter-spacing]',
        'default'           => $defaults ['footer-widget-title-letter-spacing'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-kemet-footer',
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
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-footer-widgets-typography]',
    'type'     => 'kmt-group',
    'label'    => __( 'Typography', 'kemet' ),
    'section'  => 'section-kemet-footer',
    'priority' => 35,
    'settings' => array(),
    'dependency'  => array(
        'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
        'conditions' => '!=', 
        'values' => 'disabled',
    ),
);

new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
/**
 * Option: Title
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kmt-footer-style]', array(
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
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
    KEMET_THEME_SETTINGS . '[footer-text-color]', array(
        'default'           => $defaults[ 'footer-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-text-color]', array(
            'label'   => __( 'Font Color', 'kemet' ),
            'priority'       => 65,
            'section' => 'section-kemet-footer',
        )
    )
);

/**
 * Option:Footer Items Typography
 */

$fields = array(
    /**
    * Option: Footer Font Size
    */
    array(
        'id'                => '[footer-font-size]',
        'default'           => $defaults ['footer-font-size'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-kemet-footer',
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
        'id'                => '[footer-font-family]',
        'default'           => $defaults[ 'footer-font-family' ],
        'type'              => 'option',
        'control_type'      => 'kmt-font-family',
        'label'             => __( 'Font Family', 'kemet' ),
        'section'           => 'section-kemet-footer',
        'priority'          => 3,
        'connect'           => KEMET_THEME_SETTINGS . '[footer-font-weight]',
    ),
    /**
     * Option: Font Weight
     */
    array(
        'id'                => '[footer-font-weight]',
        'default'           => $defaults[ 'footer-font-weight' ],
        'type'              => 'option',
        'control_type'      => 'kmt-font-weight',
        'label'             => __( 'Font Weight', 'kemet' ),
        'section'           => 'section-kemet-footer',
        'priority'          => 4,
        'connect'           => KEMET_THEME_SETTINGS . '[footer-font-family]',
    ),
    /**
    * Option: Footer Text Transform
    */
    array(
        'id'                => '[footer-text-transform]',
        'default'           => $defaults[ 'footer-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-select',
        'label'             => __( 'Text Transform', 'kemet' ),
        'section'           => 'section-kemet-footer',
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
    * Option: Footer Line Height
    */
    array(
        'id'                => '[footer-line-height]',
        'default'           => $defaults ['footer-line-height'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-kemet-footer',
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
    * Option: Footer Letter Spacing
    */
    array(
        'id'                => '[footer-letter-spacing]',
        'default'           => $defaults ['footer-letter-spacing'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-responsive-slider',
        'section'           => 'section-kemet-footer',
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
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-footer-widgets-content-typography]',
    'type'     => 'kmt-group',
    'label'    => __( 'Typography', 'kemet' ),
    'section'  => 'section-kemet-footer',
    'priority' => 70,
    'settings' => array(),
    'dependency'  => array(
        'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
        'conditions' => '!=', 
        'values' => 'disabled',
    ),
);

new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
/**
* Option: Title
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kmt-footer-input-title]', array(
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
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
        'default'           => $defaults[ 'footer-input-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-input-bg-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-input-border-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-input-border-radius' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-input-border-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[kmt-footer-general-title]', array(
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
        'sanitize_callback' 	=> 'wp_kses',
    )
);
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
        'default'           => $defaults[ 'footer-widget-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
* Option - Widget Padding
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-inner-widget-padding]', array(
        'default'           => $defaults[ 'footer-inner-widget-padding' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Spacing(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-inner-widget-padding]', array(
            'type'           => 'kmt-responsive-spacing',
            'section'        => 'section-kemet-footer',
            'priority'       => 143,
            'label'          => __( 'Widget Padding', 'kemet' ),
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
* Option: Widget Background Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[footer-wgt-bg-color]', array(
        'default'           => $defaults[ 'footer-wgt-bg-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-wgt-bg-color]', array(
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
    KEMET_THEME_SETTINGS . '[footer-link-color]', array(
        'default'           => $defaults[ 'footer-link-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-link-color]', array(
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
    KEMET_THEME_SETTINGS . '[footer-link-h-color]', array(
        'default'           => $defaults[ 'footer-link-h-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-link-h-color]', array(
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
    KEMET_THEME_SETTINGS . '[footer-widget-meta-color]', array(
        'default'           => $defaults[ 'footer-widget-meta-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[footer-widget-meta-color]', array(
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
        'default'           => $defaults[ 'footer-button-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-button-bg-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage', 
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-button-h-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-button-bg-h-color' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
        'default'           => $defaults[ 'footer-button-radius' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[footer-layout]', 
            'conditions' => '!=', 
            'values' => 'disabled',
        ),
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
