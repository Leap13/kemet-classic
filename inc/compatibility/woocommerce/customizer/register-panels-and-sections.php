<?php
/**
 * Register customizer panels & sections fro Woocommerce.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

/**
 * WooCommerce
 */

$wp_customize->get_section( 'woocommerce_store_notice' )->priority = 5;

$wp_customize->add_section(
	new Wiz_WP_Customize_Section(
		$wp_customize, 'section-woo-general',
		array(
			'title'    => __( 'General', 'wiz' ),
			'panel'    => 'woocommerce',
			'priority' => 10,
		)
	)
);

$wp_customize->add_section(
	new Wiz_WP_Customize_Section(
		$wp_customize, 'section-woo-cart-menu-items',
		array(
			'title'    => __( 'Cart Menu Item', 'wiz' ),
			'panel'    => 'woocommerce',
			'priority' => 15,
		)
	)
);

$wp_customize->get_section( 'woocommerce_product_catalog' )->priority = 20;
$wp_customize->get_section( 'woocommerce_product_catalog' )->title = __( 'Shop', 'wiz' );

$wp_customize->add_section(
	new Wiz_WP_Customize_Section(
		$wp_customize, 'section-woo-shop-single',
		array(
			'title'    => __( 'Single Product', 'wiz' ),
			'panel'    => 'woocommerce',
			'priority' => 25,
		)
	)
);

$wp_customize->add_section(
	new Wiz_WP_Customize_Section(
		$wp_customize, 'section-woo-shop-cart',
		array(
			'title'    => __( 'Cart Page', 'wiz' ),
			'panel'  => 'woocommerce',
			'priority' => 30,
		)
	)
);

$wp_customize->get_section( 'woocommerce_checkout' )->priority = 35;

$wp_customize->get_section( 'woocommerce_product_images' )->priority = 40;

