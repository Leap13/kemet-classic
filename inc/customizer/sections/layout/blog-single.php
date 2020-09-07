<?php
/**
* Single Post Options for Wiz Theme.
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
* Option: Single Post Content Width
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-single-width]', array(
        'default'           => $defaults['blog-single-width'],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[blog-single-width]', array(
        'type'     => 'select',
        'section'  => 'section-blog-single',
        'priority' => 5,
        'label'    => __( 'Single Post Content Width', 'wiz' ),
        'choices'  => array(
            'default' => __( 'Default', 'wiz' ),
            'custom'  => __( 'Custom', 'wiz' ),
        ),
    )
);
/**
* Option: Enter Width
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-single-max-width]', array(
        'default'           => $defaults['blog-single-max-width'],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[blog-single-width]', 
            'conditions' => '==', 
            'values' => 'custom',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[blog-single-max-width]', array(
            'type'        => 'wiz-slider',
            'section'     => 'section-blog-single',
            'priority'    => 10,
            'label'       => __( 'Enter Width', 'wiz' ),
            'suffix'      => '',
            'input_attrs' => array(
                'min'  => 768,
                'step' => 1,
                'max'  => 1920,
            ),
        )
    )
);
/**
* Option: Display Post Structure
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-single-post-structure]', array(
        'default'           => $defaults['blog-single-post-structure'],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_multi_choices' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Sortable(
        $wp_customize, WIZ_THEME_SETTINGS . '[blog-single-post-structure]', array(
            'type'     => 'wiz-sortable',
            'section'  => 'section-blog-single',
            'priority' => 15,
            'label'    => __( 'Single Post Structure', 'wiz' ),
            'choices'  => array(
                'single-image'      => __( 'Featured Image', 'wiz' ),
                'single-title-meta' => __( 'Title & Blog Meta', 'wiz' ),
            ),
        )
    )
);

/**
* Option: Single Post Meta
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[blog-single-meta]', array(
        'default'           => $defaults[ 'blog-single-meta' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_multi_choices' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[blog-single-post-structure]', 
            'conditions' => 'inarray', 
            'values' => 'single-title-meta',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Sortable(
        $wp_customize, WIZ_THEME_SETTINGS . '[blog-single-meta]', array(
            'type'     => 'wiz-sortable',
            'section'  => 'section-blog-single',
            'priority' => 20,
            'label'    => __( 'Single Post Meta', 'wiz' ),
            'choices'  => array(
                'author'   => __( 'Author', 'wiz' ),
                'category' => __( 'Category', 'wiz' ),
                'date'     => __( 'Publish Date', 'wiz' ),
                'comments' => __( 'Comments', 'wiz' ),
                'tag'      => __( 'Tags', 'wiz' ),
            ),
        )
    )
);

/**
* Option: Title
*/
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-single-post-style]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Title and Meta', 'wiz' ),
            'section'  => 'section-blog-single',
            'priority' => 30,
            'settings' => array(),
        )
    )
);
/**
* Option: Single Post / Page Title Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-size-entry-title]', array(
        'default'           => $defaults[ 'font-size-entry-title' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-size-entry-title]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-blog-single',
            'priority'       => 35,
            'label'          => __( 'Title Font Size', 'wiz' ),
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
* Option: Single Post / Page Title Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-entry-title]', array(
        'default'           => $defaults[ 'letter-spacing-entry-title' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-entry-title]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'section-blog-single',
            'priority'       => 38,
            'label'          => __( 'Title Letter Spacing', 'wiz' ),
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
* Option: Single Post / Page Title Font Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[font-color-entry-title]', array(
        'default'           => $defaults[ 'font-color-entry-title' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[font-color-entry-title]', array(
            'type'    => 'wiz-color',
            'priority'    => 40,
            'label'   => __( 'Post Title Font Color', 'wiz' ),
            'section' => 'section-blog-single',
        )
    )
);






