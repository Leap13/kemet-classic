<?php
/**
 * Bottom Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[topbar-section-1-html]', array(
				'selector'            => '.kemet-top-header-section-1',
				'container_inclusive' => true,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_topbar_section_1_html' ),
			)
		);
	}

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

	/**
	 * Option: Top Bar Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-font-size]', array(
			'default'           => kemet_get_option( 'topbar-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[topbar-font-size]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-topbar-header',
				'priority'    => 35,
				'label'       => __( 'Top Bar Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
					
				),
			)
		)
	);
	
	/**
     * Option:Top Bar Responsive
     */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[topbar-responsive]',array(
            'default'           => kemet_get_option('sticky-responsive'),
            'type'              => 'option',
            'sanitize_callback' => array('Kemet_Customizer_Sanitizes','sanitize_choices')
        )
    );
    $wp_customize->add_control(
        KEMET_THEME_SETTINGS . '[topbar-responsive]' ,array(
            'priority'   => 36,
            'section'    => 'section-topbar-header',
            'type'     => 'select',
            'label'    => __( 'Top Bar Visibility', 'kemet' ),
            'choices'  => array(
                'all-devices'        => __( 'Show On All Devices', 'kemet' ),
                'hide-tablet'        => __( 'Hide On Tablet', 'kemet' ),
                'hide-mobile'        => __( 'Hide On Mobile', 'kemet' ),
                'hide-tablet-mobile' => __( 'Hide On Tablet & Mobile', 'kemet' ),
            ),
        )
    );