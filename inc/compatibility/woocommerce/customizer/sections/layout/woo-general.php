<?php
/**
 * WooCommerce General Options for Kemet Theme.
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
$defaults = Kemet_Theme_Options::defaults();

/**
 * Option: Title
 */
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-rating-title]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Rating Style', 'kemet-addons' ),
            'section'  => 'section-woo-general',
            'priority' => 15,
            'settings' => array(),
        )
    )
);
/**
 * Option: Rating color
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[rating-color]', array(
        'default'           => $defaults[ 'rating-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize, KEMET_THEME_SETTINGS . '[rating-color]', array(
            'section' => 'section-woo-general',
            'label'   => __( 'Rating color', 'kemet-addons' ),
            'priority'=> 15,
        )
    )
);

/**
 * Option: Title
 */
$wp_customize->add_control(
    new Kemet_Control_Title(
        $wp_customize, KEMET_THEME_SETTINGS . '[kmt-cart-dropdown-title]', array(
            'type'     => 'kmt-title',
            'label'    => __( 'Cart Dropdowns Settings', 'kemet-addons' ),
            'section'  => 'section-woo-general',
            'priority' => 20,
            'settings' => array(),
        )
    )
);
/**
* Option: Cart Dropdown Width (px)
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[cart-dropdown-width]', array(
        'default'           => $defaults['cart-dropdown-width'],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[cart-dropdown-width]', array(
            'type'        => 'kmt-slider',
            'section'     => 'section-woo-general',
            'priority'    => 20,
            'label'       => __( 'Cart Dropdowns Width (px)', 'kemet' ),
            'suffix'      => '',
            'input_attrs' => array(
                'min'  => 50,
                'step' => 1,
                'max'  => 600,
            ),
        )
    )
);
/**
 * Option: Cart Dropdown Background Color
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[cart-dropdown-bg-color]', array(
        'default'           => $defaults[ 'cart-dropdown-bg-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize, KEMET_THEME_SETTINGS . '[cart-dropdown-bg-color]', array(
            'section' => 'section-woo-general',
            'label'   => __( 'Cart Dropdown Background Color', 'kemet-addons' ),
            'priority'=> 25,
        )
    )
);
/**
* Option: Cart Dropdown Border Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[cart-dropdown-border-size]', array(
        'default'           => $defaults['cart-dropdown-border-size'],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[cart-dropdown-border-size]', array(
            'type'        => 'kmt-slider',
            'section'     => 'section-woo-general',
            'priority'    => 30,
            'label'       => __( 'Cart Dropdown Border Size', 'kemet' ),
            'suffix'      => '',
            'input_attrs' => array(
                'min'  => 1,
                'step' => 1,
                'max'  => 100,
            ),
        )
    )
);
/**
 * Option: Cart Dropdown Border Color
 */
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[cart-dropdown-border-color]', array(
        'default'           => $defaults[ 'cart-dropdown-border-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize, KEMET_THEME_SETTINGS . '[cart-dropdown-border-color]', array(
            'section' => 'section-woo-general',
            'label'   => __( 'Cart Dropdown Border Color', 'kemet-addons' ),
            'priority'=> 35,
        )
    )
);