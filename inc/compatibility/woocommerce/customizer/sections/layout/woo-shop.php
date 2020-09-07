<?php
/**
* WooCommerce Options for Wiz Theme.
*
* @package     Wiz
* @author      Wiz
* @copyright   Copyright ( c ) 2019, Wiz
* @link        https://wiz.io/
* @since       Wiz 1.1.0
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
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-shop-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Shop Settings', 'wiz' ),
            'section'  => 'woocommerce_product_catalog',
            'priority' => 10,
            'settings' => array(),
        )
    )
);
/**
* Option: Blog - Disable Breadcrumb
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[disable-shop-breadcrumb]', array(
        'default'           => $defaults[ 'disable-shop-breadcrumb' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[disable-shop-breadcrumb]', array(
        'type'    => 'checkbox',
        'section' => 'woocommerce_product_catalog',
        'label'   => __( 'Disable Breadcrumb', 'wiz' ),
        'priority'          => 10,
    )
);
/**
* Option: Shop Columns
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[shop-grids]', array(
        'default'           => wiz_get_option('shop-grids'),
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_select' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Select(
        $wp_customize, WIZ_THEME_SETTINGS . '[shop-grids]', array(
            'type'           => 'wiz-responsive-select',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 10,
            'label'          => __( 'Shop Columns', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[shop-no-of-products]', array(
        'default'           => wiz_get_option( 'shop-no-of-products' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[shop-no-of-products]', array(
        'section'     => 'woocommerce_product_catalog',
        'label'       => __( 'Products Per Page', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[shop-hover-style]', array(
        'default'           => wiz_get_option( 'shop-hover-style' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);

$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[shop-hover-style]', array(
        'type'     => 'select',
        'section'  => 'woocommerce_product_catalog',
        'priority' => 20,
        'label'    => __( 'Product Image Hover Style', 'wiz' ),
        'choices'  => apply_filters(
            'wiz_woo_shop_hover_style',
            array(
                ''     => __( 'None', 'wiz' ),
                'swap' => __( 'Swap Images', 'wiz' ),
            )
        ),
    )
);

/**
* Option: Single Post Meta
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[shop-product-structure]', array(
        'default'           => wiz_get_option( 'shop-product-structure' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_multi_choices' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Sortable(
        $wp_customize, WIZ_THEME_SETTINGS . '[shop-product-structure]', array(
            'type'     => 'wiz-sortable',
            'section'  => 'woocommerce_product_catalog',
            'priority' => 60,
            'label'    => __( 'Shop Product Structure', 'wiz' ),
            'choices'  => array(
                'short_desc' => __( 'Short Description', 'wiz' ),
                'add_cart'   => __( 'Add To Cart', 'wiz' ),
                'category'   => __( 'Category', 'wiz' ),
            ),
        )
    )
);

/**
* Option: Shop Archive Content Width
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[shop-archive-width]', array(
        'default'           => wiz_get_option( 'shop-archive-width' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[shop-archive-width]', array(
        'type'     => 'select',
        'section'  => 'woocommerce_product_catalog',
        'priority' => 35,
        'label'    => __( 'Shop Archive Content Width', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[shop-archive-max-width]', array(
        'default'           => 1200,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
        'dependency'  => array(
            'controls' =>  WIZ_THEME_SETTINGS . '[shop-archive-width]', 
            'conditions' => '==', 
            'values' => 'custom',
        ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[shop-archive-max-width]', array(
            'type'        => 'wiz-slider',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 36,
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
 * Option: Title
 */
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-product-title-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Product Title Style', 'wiz' ),
            'section'  => 'woocommerce_product_catalog',
            'priority' => 37,
            'settings' => array(),
        )
    )
);
/**
* Option: Content Text Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-title-text-color]', array(
        'default'           => $defaults[ 'product-title-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-title-text-color]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 37,
            'section' => 'woocommerce_product_catalog',
        )
    )
);
 /**
* Option:  Product Title Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-title-font-size]', array(
        'default'           => wiz_get_option( 'product-title-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-title-font-size]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 37,
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
    WIZ_THEME_SETTINGS . '[product-title-font-family]', array(
        'default'           => $defaults[ 'product-title-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-title-font-family]', array(
            'type'        => 'wiz-font-family',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 37,
            'label'       => __( 'Font Family', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[product-title-font-weight]',
        )
    )
);

/**
* Option: Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-title-font-weight]', array(
        'default'           => $defaults[ 'product-title-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-title-font-weight]', array(
            'type'        => 'wiz-font-weight',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 37,
            'label'       => __( 'Font Weight', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[product-title-font-family]',
        )
    )
);

/**
* Option: Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-title-text-transform]', array(
        'default'           => $defaults[ 'product-title-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[product-title-text-transform]', array(
        'type'     => 'select',
        'section'  => 'woocommerce_product_catalog',
        'priority' => 37,
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
* Option: Line Height
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-title-line-height]', array(
        'default'           => $defaults[ 'product-title-line-height' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-title-line-height]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 37,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-product-title]', array(
        'default'           => $defaults[ 'letter-spacing-product-title' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-product-title]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 37,
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
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-product-content-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Product Content Style', 'wiz' ),
            'section'  => 'woocommerce_product_catalog',
            'priority' => 38,
            'settings' => array(),
        )
    )
);
/**
* Option: Content Text Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-content-text-color]', array(
        'default'           => $defaults[ 'product-content-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-content-text-color]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 38,
            'section' => 'woocommerce_product_catalog',
        )
    )
);

 /**
* Option:  Product Content Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-content-font-size]', array(
        'default'           => wiz_get_option( 'product-content-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-content-font-size]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 38,
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
    WIZ_THEME_SETTINGS . '[product-content-font-family]', array(
        'default'           => $defaults[ 'product-content-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-content-font-family]', array(
            'type'        => 'wiz-font-family',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 38,
            'label'       => __( 'Font Family', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[product-content-font-weight]',
        )
    )
);

/**
* Option: Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-content-font-weight]', array(
        'default'           => $defaults[ 'product-content-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-content-font-weight]', array(
            'type'        => 'wiz-font-weight',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 38,
            'label'       => __( 'Font Weight', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[product-content-font-family]',
        )
    )
);

/**
* Option: Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-content-text-transform]', array(
        'default'           => $defaults[ 'product-content-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[product-content-text-transform]', array(
        'type'     => 'select',
        'section'  => 'woocommerce_product_catalog',
        'priority' => 38,
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
* Option: Line Height
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-content-line-height]', array(
        'default'           => $defaults[ 'product-content-line-height' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-content-line-height]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 38,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-product-content]', array(
        'default'           => $defaults[ 'letter-spacing-product-content' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-product-content]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 38,
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
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-product-price-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Product Price Style', 'wiz' ),
            'section'  => 'woocommerce_product_catalog',
            'priority' => 39,
            'settings' => array(),
        )
    )
);
/**
* Option: Content Text Color
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-price-text-color]', array(
        'default'           => $defaults[ 'product-price-text-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Color(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-price-text-color]', array(
            'label'   => __( 'Font Color', 'wiz' ),
            'priority'       => 39,
            'section' => 'woocommerce_product_catalog',
        )
    )
);

 /**
* Option:  Product Price Font Size
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-price-font-size]', array(
        'default'           => wiz_get_option( 'product-price-font-size' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-price-font-size]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 39,
            'label'          => __( 'Product Price Font Size', 'wiz' ),
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
    WIZ_THEME_SETTINGS . '[product-price-font-family]', array(
        'default'           => $defaults[ 'product-price-font-family' ],
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-price-font-family]', array(
            'type'        => 'wiz-font-family',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 39,
            'label'       => __( 'Font Family', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[product-price-font-weight]',
        )
    )
);

/**
* Option: Font Weight
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-price-font-weight]', array(
        'default'           => $defaults[ 'product-price-font-weight' ],
        'type'              => 'option',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Typography(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-price-font-weight]', array(
            'type'        => 'wiz-font-weight',
            'section'     => 'woocommerce_product_catalog',
            'priority'    => 39,
            'label'       => __( 'Font Weight', 'wiz' ),
            'connect'     => WIZ_THEME_SETTINGS . '[product-price-font-family]',
        )
    )
);

/**
* Option: Text Transform
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-price-text-transform]', array(
        'default'           => $defaults[ 'product-price-text-transform' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);
$wp_customize->add_control(
    WIZ_THEME_SETTINGS . '[product-price-text-transform]', array(
        'type'     => 'select',
        'section'  => 'woocommerce_product_catalog',
        'priority' => 39,
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
* Option: Line Height
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[product-price-line-height]', array(
        'default'           => $defaults[ 'product-price-line-height' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[product-price-line-height]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 39,
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
* Option: Letter Spacing
*/
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[letter-spacing-product-price]', array(
        'default'           => $defaults[ 'letter-spacing-product-price' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Wiz_Control_Responsive_Slider(
        $wp_customize, WIZ_THEME_SETTINGS . '[letter-spacing-product-price]', array(
            'type'           => 'wiz-responsive-slider',
            'section'        => 'woocommerce_product_catalog',
            'priority'       => 39,
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
