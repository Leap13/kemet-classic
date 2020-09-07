<?php
/**
 * WooCommerce Options for Wiz Theme.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Disable Breadcrumb
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[enable-cart-upsells]', array(
			'default'           => wiz_get_option( 'enable-cart-upsells' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[enable-cart-upsells]', array(
			'section'  => 'section-woo-shop-cart',
			'label'    => __( 'Enable Upsells', 'wiz' ),
			'priority' => 10,
			'type'     => 'checkbox',
		)
	);
