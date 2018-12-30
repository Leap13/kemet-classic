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
		'label'    => __( 'Top Section 1', 'kemet' ),
		'choices'  => array(
				'search'    => __( 'Search', 'kemet' ),
				'menu' => __( 'Menu', 'kemet' ),
				'widget'    => __( 'Widget', 'kemet' ),
				'text-html' => __( 'Text / HTML', 'kemet' ),
		),
	)
	)
	);
	/**
	 * Option: Right Section Text / HTML
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[top-section-1-html]', array(
			'default'           => kemet_get_option( 'top-section-1-html' ),
			'type'              => 'option',
			//'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[top-section-1-html]', array(
			'type'     => 'textarea',
			'section'  => 'section-topbar-header',
			'priority' => 10,
			'label'    => __( 'Custom Text / HTML', 'kemet' ),
		)
	);

	// if ( isset( $wp_customize->selective_refresh ) ) {
	// 	$wp_customize->selective_refresh->add_partial(
	// 		KEMET_THEME_SETTINGS . '[topbar-section-1-html]', array(
	// 			'selector'            => '.kmt-above-header-section-1',
	// 			'container_inclusive' => true,
	// 			'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_topbar_section_1_html' ),
	// 		)
	// 	);
	// }





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
		'priority' => 15,
		'label'    => __( 'Top  Section 2', 'kemet' ),
		'choices'  => 
			array(
				'search'    => __( 'Search', 'kemet' ),
				'menu' => __( 'Menu', 'kemet' ),
				'widget'    => __( 'Widget', 'kemet' ),
				'text-html' => __( 'Text / HTML', 'kemet' ),
		),
	)
					)
);

	/**
	 * Option: Right Section Text / HTML
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[top-section-2-html]', array(
			'default'           => kemet_get_option( 'top-section-2-html' ),
			'type'              => 'option',
			//'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[top-section-2-html]', array(
			'type'     => 'textarea',
			'section'  => 'section-topbar-header',
			'priority' => 20,
			'label'    => __( 'Custom Text / HTML', 'kemet' ),
		)
	);