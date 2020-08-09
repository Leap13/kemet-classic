<?php
/**
* WooCommerce Options for Kemet Theme.
*
* @package     Kemet
* @author      Kemet
* @copyright   Copyright ( c ) 2019, Kemet
* @link        https://kemet.io/
* @since       Kemet 1.1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = Kemet_Theme_Options::defaults();
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

/**
* Option: Shop Columns
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[shop-grids]', array(
        'default'           => kemet_get_option('shop-grids'),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_select' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Select(
        $wp_customize, KEMET_THEME_SETTINGS . '[shop-grids]', array(
            'type'           => 'kmt-responsive-select',
            'section'        => 'section-woo-shop',
            'priority'       => 10,
            'label'          => __( 'Shop Columns', 'kemet' ),
            'choices'   => array(
                '1' => 'One',
                '2' => 'Two',
                '3' => 'Three',
                '4' => 'Four',
                '5' => 'Five',
                '6' => 'Six',
            ),
        )
    )
);

/**
* Option: Products Per Page
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[shop-no-of-products]', array(
        'default'           => kemet_get_option( 'shop-no-of-products' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[shop-no-of-products]', array(
        'section'     => 'section-woo-shop',
        'label'       => __( 'Products Per Page', 'kemet' ),
        'type'        => 'number',
        'priority'    => 15,
        'input_attrs' => array(
            'min'  => 1,
            'step' => 1,
            'max'  => 50,
        ),
    )
);

/**
* Option: Product Hover Style
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[shop-hover-style]', array(
        'default'           => kemet_get_option( 'shop-hover-style' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);

$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[shop-hover-style]', array(
        'type'     => 'select',
        'section'  => 'section-woo-shop',
        'priority' => 20,
        'label'    => __( 'Product Image Hover Style', 'kemet' ),
        'choices'  => apply_filters(
            'kemet_woo_shop_hover_style',
            array(
                ''     => __( 'None', 'kemet' ),
                'swap' => __( 'Swap Images', 'kemet' ),
            )
        ),
    )
);

/**
* Option: Single Post Meta
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[shop-product-structure]', array(
        'default'           => kemet_get_option( 'shop-product-structure' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Sortable(
        $wp_customize, KEMET_THEME_SETTINGS . '[shop-product-structure]', array(
            'type'     => 'kmt-sortable',
            'section'  => 'section-woo-shop',
            'priority' => 60,
            'label'    => __( 'Shop Product Structure', 'kemet' ),
            'choices'  => array(
                'short_desc' => __( 'Short Description', 'kemet' ),
                'add_cart'   => __( 'Add To Cart', 'kemet' ),
                'category'   => __( 'Category', 'kemet' ),
            ),
        )
    )
);

/**
* Option: Shop Archive Content Width
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[shop-archive-width]', array(
        'default'           => kemet_get_option( 'shop-archive-width' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[shop-archive-width]', array(
        'type'     => 'select',
        'section'  => 'section-woo-shop',
        'priority' => 35,
        'label'    => __( 'Shop Archive Content Width', 'kemet' ),
        'choices'  => array(
            'default' => __( 'Default', 'kemet' ),
            'custom'  => __( 'Custom', 'kemet' ),
        ),
    )
);
 /**
* Option:  Product Title Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[product-title-font-size]', array(
        'default'           => kemet_get_option( 'product-title-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[product-title-font-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-woo-shop',
            'priority'       => 221,
            'label'          => __( 'Product Title Font Size', 'kemet' ),
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
* Option:  Product Content Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[product-content-font-size]', array(
        'default'           => kemet_get_option( 'product-content-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[product-content-font-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-woo-shop',
            'priority'       => 222,
            'label'          => __( 'Product Content Font Size', 'kemet' ),
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
* Option:  Product Price Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[product-price-font-size]', array(
        'default'           => kemet_get_option( 'product-price-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[product-price-font-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-woo-shop',
            'priority'       => 223,
            'label'          => __( 'Product Price Font Size', 'kemet' ),
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
* Option: Enter Width
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[shop-archive-max-width]', array(
        'default'           => 1200,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
        'dependency'  => array(
            'controls' =>  KEMET_THEME_SETTINGS . '[shop-archive-width]', 
            'conditions' => '==', 
            'values' => 'custom',
        ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[shop-archive-max-width]', array(
            'type'        => 'kmt-slider',
            'section'     => 'section-woo-shop',
            'priority'    => 40,
            'label'       => __( 'Enter Width', 'kemet' ),
            'suffix'      => '',
            'input_attrs' => array(
                'min'  => 768,
                'step' => 1,
                'max'  => 1920,
            ),
        )
    )
);
