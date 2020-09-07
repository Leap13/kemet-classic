<?php
/**
 * Content Spacing Options for our theme.
 *
 * @package     Wiz
 * @author      Leap13
 * @copyright   Copyright (c) 2019, Leap13
 * @link        https://leap13.com/
 * @since       Wiz 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Shop Page
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[woocommerce-sidebar-layout]', array(
			'default'           => wiz_get_option( 'woocommerce-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[woocommerce-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 125,
			'label'    => __( 'WooCommerce', 'wiz' ),
			'choices'  => array(
				'default'       => __( 'Default', 'wiz' ),
				'no-sidebar'    => __( 'No Sidebar', 'wiz' ),
				'left-sidebar'  => __( 'Left Sidebar', 'wiz' ),
				'right-sidebar' => __( 'Right Sidebar', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Single Product
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[single-product-sidebar-layout]', array(
			'default'           => wiz_get_option( 'single-product-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[single-product-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 135,
			'label'    => __( 'Single Product', 'wiz' ),
			'choices'  => array(
				'default'       => __( 'Default', 'wiz' ),
				'no-sidebar'    => __( 'No Sidebar', 'wiz' ),
				'left-sidebar'  => __( 'Left Sidebar', 'wiz' ),
				'right-sidebar' => __( 'Right Sidebar', 'wiz' ),
			),
		)
	);

