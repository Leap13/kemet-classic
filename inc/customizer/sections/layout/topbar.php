<?php
/**
 * Bottom Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// $wp_customize->add_setting(
// 	KEMET_THEME_SETTINGS . '[header-main-rt-section]', array(
// 		'default'           => kemet_get_option( 'header-main-rt-section' ),
// 		'type'              => 'option',
// 		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
// 	)
// );
// $wp_customize->add_control(
// 			new Kemet_Control_Sortable(
// 		$wp_customize, KEMET_THEME_SETTINGS . '[header-main-rt-section]', array(
// 		'type'     => 'kmt-sortable',
// 		'section'  => 'section-topbar-header',
// 		'priority' => 5,
// 		'label'    => __( 'Custom Menu Item', 'kemet' ),
// 		'choices'  => apply_filters(
// 			'kemet_header_elements',
// 			array(
// 				//'none'      => __( 'None', 'kemet' ),
// 				'search'    => __( 'Search', 'kemet' ),
// 				'text-html' => __( 'Text / HTML', 'kemet' ),
// 				'widget'    => __( 'Widget', 'kemet' ),
// 		  // 'woocommerce'    => __( 'Wooooo', 'kemet' ),
// 			),
// 			'primary-header'
// 		),
// 	)
// 					)
// );
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[top-section-1]', array(
		'default'           => kemet_get_option( 'top-section-1' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	)
);
$wp_customize->add_control(
			new Kemet_Control_Sortable(
		$wp_customize, KEMET_THEME_SETTINGS . '[top-section-1]', array(
		'type'     => 'kmt-sortable',
		'section'  => 'section-topbar-header',
		'priority' => 5,
		'label'    => __( 'Top  Section 1', 'kemet' ),
		'choices'  => array(
				//'none'      => __( 'None', 'kemet' ),
				'search'    => __( 'Search', 'kemet' ),
				'menu' => __( 'Menu', 'kemet' ),
				'widget'    => __( 'Widget', 'kemet' ),
		  // 'woocommerce'    => __( 'Wooooo', 'kemet' ),

		),
	)
					)
);
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[top-section-2]', array(
		'default'           => kemet_get_option( 'top-section-2' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	)
);
$wp_customize->add_control(
			new Kemet_Control_Sortable(
		$wp_customize, KEMET_THEME_SETTINGS . '[top-section-2]', array(
		'type'     => 'kmt-sortable',
		'section'  => 'section-topbar-header',
		'priority' => 5,
		'label'    => __( 'Top  Section 2', 'kemet' ),
		'choices'  => 
			array(
				//'none'      => __( 'None', 'kemet' ),
				'search'    => __( 'Search', 'kemet' ),
				'menu' => __( 'Menu', 'kemet' ),
				'widget'    => __( 'Widget', 'kemet' ),
		        'woocommerce'    => __( 'W', 'kemet' ),
		),
	)
					)
);