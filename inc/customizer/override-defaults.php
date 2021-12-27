<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Override Sections
 */
$wp_customize->get_section( 'title_tagline' )->priority = 20;
$wp_customize->get_section( 'title_tagline' )->panel    = 'panel-header-builder-group';
/**
 * Override Settings
 */
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
$wp_customize->get_setting( 'custom_logo' )->transport      = 'postMessage';

if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->get_setting( 'woocommerce_demo_store_notice' )->default = esc_html__( '“Free Shipping on All Orders Until February 28. Hurry Up!”.', 'kemet' );
	$wp_customize->remove_control( 'woocommerce_shop_page_display' );
	$wp_customize->remove_control( 'woocommerce_category_archive_display' );
	$wp_customize->remove_control( 'woocommerce_default_catalog_orderby' );
}

/**
 * Override Controls
 */
$wp_customize->get_control( 'custom_logo' )->priority      = 60;
$wp_customize->get_control( 'site_icon' )->priority        = 95;
$wp_customize->get_control( 'header_textcolor' )->priority = 8;

$wp_customize->remove_control( 'blogname' );
$wp_customize->remove_control( 'blogdescription' );
