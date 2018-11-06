<?php
/**
 * Header Options for Kemet Theme.
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

$header_rt_sections = array(
	'none'      => __( 'None', 'kemet' ),
	'search'    => __( 'Search', 'kemet' ),
	'text-html' => __( 'Text / HTML', 'kemet' ),
	'widget'    => __( 'Widget', 'kemet' ),
);


	/**
	 * Option: Header Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-layouts]', array(
			'default'           => kemet_get_option( 'header-layouts' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Radio_Image(
			$wp_customize, KEMET_THEME_SETTINGS . '[header-layouts]', array(
				'section'  => 'section-header',
				'priority' => 5,
				'label'    => __( 'Header', 'kemet' ),
				'type'     => 'kmt-radio-image',
				'choices'  => array(
					'header-main-layout-1' => array(
						'label' => __( 'Logo Left', 'kemet' ),
						'path'  => KEMET_THEME_URI . '/assets/images/header-layout-1-60x60.png',
					),
					'header-main-layout-2' => array(
						'label' => __( 'Logo Center', 'kemet' ),
						'path'  => KEMET_THEME_URI . '/assets/images/header-layout-2-60x60.png',
					),
					'header-main-layout-3' => array(
						'label' => __( 'Logo Right', 'kemet' ),
						'path'  => KEMET_THEME_URI . '/assets/images/header-layout-3-60x60.png',
					),     
               'header-main-layout-4' => array(
						'label' => __( 'Right Left Menu', 'kemet' ),
						'path'  => KEMET_THEME_URI . '/assets/images/header-layout-3-60x60.png',
					),
				),
			)
		)
	);

	/**
	 * Option: Disable Menu
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[disable-primary-nav]', array(
			'default'           => kemet_get_option( 'disable-primary-nav' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[disable-primary-nav]', array(
			'type'     => 'checkbox',
			'section'  => 'section-header',
			'label'    => __( 'Disable Menu', 'kemet' ),
			'priority' => 5,
		)
	);
	/**
	 * Option: Custom Menu Item
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-rt-section]', array(
			'default'           => kemet_get_option( 'header-main-rt-section' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-main-rt-section]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 5,
			'label'    => __( 'Custom Menu Item', 'kemet' ),
			'choices'  => $header_rt_sections,
		)
	);

	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-rt-section]', array(
			'default'           => kemet_get_option( 'header-main-rt-section' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
                new Kemet_Control_Sortable(
            $wp_customize, KEMET_THEME_SETTINGS . '[header-main-rt-section]', array(
			'type'     => 'kmt-sortable',
			'section'  => 'section-header',
			'priority' => 5,
			'label'    => __( 'Custom Menu Item', 'kemet' ),
			'choices'  => apply_filters(
				'kemet_header_section_elements',
				array(
					//'none'      => __( 'None', 'kemet' ),
					'search'    => __( 'Search', 'kemet' ),
					'text-html' => __( 'Text / HTML', 'kemet' ),
					'widget'    => __( 'Widget', 'kemet' ),
               'woocommerce'    => __( 'Wooooo', 'kemet' ),
				),
				'primary-header'
			),
		)
                        )
	);

	/**
	 * Option: Display outside menu
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-display-outside-menu]', array(
			'default'           => kemet_get_option( 'header-display-outside-menu' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-display-outside-menu]', array(
			'type'     => 'checkbox',
			'section'  => 'section-header',
			'label'    => __( 'Take custom menu item outside', 'kemet' ),
			'priority' => 5,
		)
	);


	/**
	 * Option: Right Section Text / HTML
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'default'           => kemet_get_option( 'header-main-rt-section-html' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'type'     => 'textarea',
			'section'  => 'section-header',
			'priority' => 10,
			'label'    => __( 'Custom Menu Text / HTML', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[header-main-rt-section-html]', array(
				'selector'            => '.main-header-bar .kmt-masthead-custom-menu-items .kmt-custom-html',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_header_main_rt_section_html' ),
			)
		);
	}

	/**
	 * Option: Bottom Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-sep]', array(
			'default'           => kemet_get_option( 'header-main-sep' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-main-sep]', array(
			'type'        => 'number',
			'section'     => 'section-header',
			'priority'    => 25,
			'label'       => __( 'Bottom Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Bottom Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-sep-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[header-main-sep-color]', array(
				'section'  => 'section-header',
				'priority' => 30,
				'label'    => __( 'Bottom Border Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Header Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-layout-width]', array(
			'default'           => kemet_get_option( 'header-main-layout-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-main-layout-width]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 35,
			'label'    => __( 'Header Width', 'kemet' ),
			'choices'  => array(
				'full'    => __( 'Full Width', 'kemet' ),
				'content' => __( 'Content Width', 'kemet' ),
			),
		)
	);


	/**
	 * Option: Mobile Menu Label Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[header-main-menu-label-divider]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-header',
				'priority' => 55,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Mobile Menu Label
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-menu-label]', array(
			'default'           => kemet_get_option( 'header-main-menu-label' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-main-menu-label]', array(
			'section'  => 'section-header',
			'priority' => 60,
			'label'    => __( 'Menu Label on Small Devices', 'kemet' ),
			'type'     => 'text',
		)
	);

	/**
	 * Option: Mobile Menu Alignment
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-menu-align]', array(
			'default'           => kemet_get_option( 'header-main-menu-align' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[header-main-menu-align]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 65,
			'label'    => __( 'Mobile Header Alignment', 'kemet' ),
			'choices'  => array(
				'inline' => __( 'Inline', 'kemet' ),
				'stack'  => __( 'Stack', 'kemet' ),
			),
		)
	);
