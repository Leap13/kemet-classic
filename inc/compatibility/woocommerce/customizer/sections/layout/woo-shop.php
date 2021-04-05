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
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-shop-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Shop Settings', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[disable-shop-breadcrumb]',
	array(
		'default'           => $defaults['disable-shop-breadcrumb'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[disable-shop-breadcrumb]',
	array(
		'type'     => 'checkbox',
		'section'  => 'woocommerce_product_catalog',
		'label'    => __( 'Disable Breadcrumb', 'kemet' ),
		'priority' => 10,
	)
);
/**
 * Option: Products Per Page
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[shop-no-of-products]',
	array(
		'default'           => kemet_get_option( 'shop-no-of-products' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[shop-no-of-products]',
	array(
		'section'     => 'woocommerce_product_catalog',
		'label'       => __( 'Products Per Page', 'kemet' ),
		'type'        => 'number',
		'priority'    => 10,
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 50,
		),
	)
);
/**
 * Option: Shop Columns
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[shop-grids]',
	array(
		'default'           => kemet_get_option( 'shop-grids' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_select' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Select(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[shop-grids]',
		array(
			'type'     => 'kmt-responsive-select',
			'section'  => 'woocommerce_product_catalog',
			'priority' => 15,
			'label'    => __( 'Shop Columns', 'kemet' ),
			'choices'  => array(
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
 * Option: Shop Archive Content Width
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[shop-archive-width]',
	array(
		'default'           => kemet_get_option( 'shop-archive-width' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[shop-archive-width]',
	array(
		'type'     => 'select',
		'section'  => 'woocommerce_product_catalog',
		'priority' => 17,
		'label'    => __( 'Shop Archive Content Width', 'kemet' ),
		'choices'  => array(
			'default' => __( 'Default', 'kemet' ),
			'custom'  => __( 'Custom', 'kemet' ),
		),
	)
);
/**
 * Option: Enter Width
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[shop-archive-max-width]',
	array(
		'default'           => 1200,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[shop-archive-width]',
			'conditions' => '==',
			'values'     => 'custom',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[shop-archive-max-width]',
		array(
			'type'        => 'kmt-slider',
			'section'     => 'woocommerce_product_catalog',
			'priority'    => 18,
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
/**
 * Option: Product Hover Style
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[shop-hover-style]',
	array(
		'default'           => kemet_get_option( 'shop-hover-style' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[shop-hover-style]',
	array(
		'type'     => 'select',
		'section'  => 'woocommerce_product_catalog',
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
	KEMET_THEME_SETTINGS . '[shop-product-structure]',
	array(
		'default'           => kemet_get_option( 'shop-product-structure' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Sortable(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[shop-product-structure]',
		array(
			'type'     => 'kmt-sortable',
			'section'  => 'woocommerce_product_catalog',
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
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-product-title-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Product Title Style', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[product-title-text-color]',
	array(
		'default'           => $defaults['product-title-text-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-title-text-color]',
		array(
			'label'    => __( 'Font Color', 'kemet' ),
			'priority' => 37,
			'section'  => 'woocommerce_product_catalog',
		)
	)
);

/**
 * Option: Product Title Typography
 */

$fields = array(
	/**
	 * Option: Product Title Font Size
	 */
	array(
		'id'           => '[product-title-font-size]',
		'default'      => $defaults['product-title-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 2,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Font Family
	 */
	array(
		'id'           => '[product-title-font-family]',
		'default'      => $defaults['product-title-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[product-title-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[product-title-font-weight]',
		'default'      => $defaults['product-title-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[product-title-font-family]',
	),
	/**
	 * Option: Product Title Text Transform
	 */
	array(
		'id'           => '[product-title-text-transform]',
		'default'      => $defaults['product-title-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Product Title Font Style
	*/
	array(
		'id'           => '[product-title-font-style]',
		'default'      => $defaults['product-title-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-blog',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	 * Option: Product Title Line Height
	 */
	array(
		'id'           => '[product-title-line-height]',
		'default'      => $defaults['product-title-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Product Title Letter Spacing
	 */
	array(
		'id'           => '[letter-spacing-product-title]',
		'default'      => $defaults['letter-spacing-product-title'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-product-title-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'woocommerce_product_catalog',
	'priority'  => 37,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );

/**
 * Option - Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[product-title-spacing]',
	array(
		'default'           => $defaults['product-title-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-title-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'woocommerce_product_catalog',
			'priority'       => 37,
			'label'          => __( 'Spacing', 'kemet' ),
			'linked_choices' => true,
			'unit_choices'   => array( 'px' ),
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
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-product-content-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Product Content Style', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[product-content-text-color]',
	array(
		'default'           => $defaults['product-content-text-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-content-text-color]',
		array(
			'label'    => __( 'Font Color', 'kemet' ),
			'priority' => 38,
			'section'  => 'woocommerce_product_catalog',
		)
	)
);

/**
 * Option: Product Content Typography
 */

$fields = array(
	/**
	 * Option: Product Content Font Size
	 */
	array(
		'id'           => '[product-content-font-size]',
		'default'      => $defaults['product-content-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 2,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Font Family
	 */
	array(
		'id'           => '[product-content-font-family]',
		'default'      => $defaults['product-content-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[product-content-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[product-content-font-weight]',
		'default'      => $defaults['product-content-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[product-content-font-family]',
	),
	/**
	 * Option: Product Content Text Transform
	 */
	array(
		'id'           => '[product-content-text-transform]',
		'default'      => $defaults['product-content-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Product Content Font Style
	*/
	array(
		'id'           => '[product-content-font-style]',
		'default'      => $defaults['product-content-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	 * Option: Product Content Line Height
	 */
	array(
		'id'           => '[product-content-line-height]',
		'default'      => $defaults['product-content-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Product Content Letter Spacing
	 */
	array(
		'id'           => '[letter-spacing-product-content]',
		'default'      => $defaults['letter-spacing-product-content'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-product-content-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'woocommerce_product_catalog',
	'priority'  => 38,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-product-price-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Product Price Style', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[product-price-text-color]',
	array(
		'default'           => $defaults['product-price-text-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-price-text-color]',
		array(
			'label'    => __( 'Font Color', 'kemet' ),
			'priority' => 39,
			'section'  => 'woocommerce_product_catalog',
		)
	)
);

/**
 * Option: Product Price Typography
 */

$fields = array(
	/**
	 * Option: Product Price Font Size
	 */
	array(
		'id'           => '[product-price-font-size]',
		'default'      => $defaults['product-price-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 2,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Font Family
	 */
	array(
		'id'           => '[product-price-font-family]',
		'default'      => $defaults['product-price-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[product-price-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[product-price-font-weight]',
		'default'      => $defaults['product-price-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[product-price-font-family]',
	),
	/**
	 * Option: Product Price Text Transform
	 */
	array(
		'id'           => '[product-price-text-transform]',
		'default'      => $defaults['product-price-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Product Price Font Style
	*/
	array(
		'id'           => '[product-price-font-style]',
		'default'      => $defaults['product-price-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	 * Option: Product Price Line Height
	 */
	array(
		'id'           => '[product-price-line-height]',
		'default'      => $defaults['product-price-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Product Price Letter Spacing
	 */
	array(
		'id'           => '[letter-spacing-product-price]',
		'default'      => $defaults['letter-spacing-product-price'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'woocommerce_product_catalog',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-product-price-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'woocommerce_product_catalog',
	'priority'  => 39,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );

/**
 * Option - Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[product-price-spacing]',
	array(
		'default'           => $defaults['product-price-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-price-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'woocommerce_product_catalog',
			'priority'       => 39,
			'label'          => __( 'Spacing', 'kemet' ),
			'linked_choices' => true,
			'unit_choices'   => array( 'px' ),
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
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kemet-product-rating-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Product Rating Style', 'kemet' ),
			'section'  => 'woocommerce_product_catalog',
			'priority' => 39,
			'settings' => array(),
		)
	)
);

/**
 * Option: Rating Font Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[product-rating-font-size]',
	array(
		'default'           => $defaults['product-rating-font-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-rating-font-size]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'woocommerce_product_catalog',
			'priority'     => 39,
			'label'        => __( 'Font Size', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 200,
				),
				'em' => array(
					'min'  => 0.1,
					'step' => 0.1,
					'max'  => 10,
				),
			),
		)
	)
);
/**
 * Option - Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[product-rating-spacing]',
	array(
		'default'           => $defaults['product-rating-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[product-rating-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'woocommerce_product_catalog',
			'priority'       => 39,
			'label'          => __( 'Spacing', 'kemet' ),
			'linked_choices' => true,
			'unit_choices'   => array( 'px' ),
			'choices'        => array(
				'top'    => __( 'Top', 'kemet' ),
				'right'  => __( 'Right', 'kemet' ),
				'bottom' => __( 'Bottom', 'kemet' ),
				'left'   => __( 'Left', 'kemet' ),
			),
		)
	)
);
