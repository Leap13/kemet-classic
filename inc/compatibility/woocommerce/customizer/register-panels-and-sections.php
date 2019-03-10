<?php
/**
 * Register customizer panels & sections fro Woocommerce.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

/**
 * WooCommerce
 */
$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-group',
		array(
			'title'    => __( 'WooCommerce', 'kemet' ),
			'panel'    => 'panel-layout',
			'priority' => 60,
		)
	)
);

$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-general',
		array(
			'title'    => __( 'General', 'kemet' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 5,
		)
	)
);
$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-shop',
		array(
			'title'    => __( 'Shop', 'kemet' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 10,
		)
	)
);

$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-shop-single',
		array(
			'title'    => __( 'Single Product', 'kemet' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 15,
		)
	)
);

$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-shop-cart',
		array(
			'title'    => __( 'Cart Page', 'kemet' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 20,
		)
	)
);
