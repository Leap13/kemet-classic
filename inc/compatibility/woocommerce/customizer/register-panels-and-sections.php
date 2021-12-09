<?php
/**
 * Register customizer panels & sections fro WooCommerce.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * WooCommerce
 */

$wp_customize->get_section( 'woocommerce_store_notice' )->priority    = 5;
$wp_customize->get_section( 'woocommerce_product_catalog' )->priority = 20;
$wp_customize->get_section( 'woocommerce_product_catalog' )->title    = __( 'Shop', 'kemet' );
$wp_customize->get_section( 'woocommerce_checkout' )->priority        = 35;
$wp_customize->get_section( 'woocommerce_product_images' )->priority  = 40;

