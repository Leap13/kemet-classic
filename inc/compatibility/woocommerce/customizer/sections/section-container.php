<?php
/**
 * Container Options for Kemet theme.
 *
 * @package     Kemet
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2018, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Kemet 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


	/**
	 * Option: Shop Page
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[woocommerce-content-layout]', array(
			'default'           => astra_get_option( 'woocommerce-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[woocommerce-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 85,
			'label'    => __( 'Container for WooCommerce', 'astra' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'astra' ),
				'boxed-container'         => __( 'Boxed', 'astra' ),
				'content-boxed-container' => __( 'Content Boxed', 'astra' ),
				'plain-container'         => __( 'Full Width / Contained', 'astra' ),
				'page-builder'            => __( 'Full Width / Stretched', 'astra' ),
			),
		)
	);
