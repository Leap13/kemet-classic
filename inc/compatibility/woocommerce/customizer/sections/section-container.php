<?php
/**
 * Container Options for Wiz theme.
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
		WIZ_THEME_SETTINGS . '[woocommerce-content-layout]', array(
			'default'           => wiz_get_option( 'woocommerce-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[woocommerce-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 85,
			'label'    => __( 'Container for WooCommerce', 'wiz' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'wiz' ),
				'boxed-container'         => __( 'Boxed', 'wiz' ),
				'content-boxed-container' => __( 'Content Boxed', 'wiz' ),
				'plain-container'         => __( 'Full Width / Contained', 'wiz' ),
				'page-builder'            => __( 'Full Width / Stretched', 'wiz' ),
			),
		)
	);
