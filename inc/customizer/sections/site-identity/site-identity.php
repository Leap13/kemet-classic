<?php
/**
 * Favicon Options for Kemet Theme.
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

	/**
	 * Option: Retina logo selector
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[ast-header-retina-logo]', array(
			'default'           => kemet_get_option( 'ast-header-retina-logo' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[ast-header-retina-logo]', array(
				'section'        => 'title_tagline',
				'priority'       => 5,
				'label'          => __( 'Retina Logo', 'kemet' ),
				'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			)
		)
	);

	/**
	 * Option: Logo Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[ast-header-responsive-logo-width]', array(
			'default'           => array(
				'desktop' => '',
				'tablet'  => '',
				'mobile'  => '',
			),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[ast-header-responsive-logo-width]', array(
				'type'        => 'ast-responsive-slider',
				'section'     => 'title_tagline',
				'priority'    => 5,
				'label'       => __( 'Logo Width', 'kemet' ),
				'input_attrs' => array(
					'min'  => 50,
					'step' => 1,
					'max'  => 600,
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[ast-site-logo-divider]', array(
				'type'     => 'ast-divider',
				'section'  => 'title_tagline',
				'priority' => 5,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Display Title
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[display-site-title]', array(
			'default'           => kemet_get_option( 'display-site-title' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[display-site-title]', array(
			'type'     => 'checkbox',
			'section'  => 'title_tagline',
			'label'    => __( 'Display Site Title', 'kemet' ),
			'priority' => 6,
		)
	);

	/**
	 * Option: Display Tagline
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[display-site-tagline]', array(
			'default'           => kemet_get_option( 'display-site-tagline' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
			'priority'          => 5,
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[display-site-tagline]', array(
			'type'    => 'checkbox',
			'section' => 'title_tagline',
			'label'   => __( 'Display Site Tagline', 'kemet' ),
		)
	);


	/**
	 * Option: Disable Menu
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[logo-title-inline]', array(
			'default'           => kemet_get_option( 'logo-title-inline' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[logo-title-inline]', array(
			'type'     => 'checkbox',
			'section'  => 'title_tagline',
			'label'    => __( 'Inline Logo & Site Title', 'kemet' ),
			'priority' => 10,
		)
	);

	/**
	 * Option: Divider
	*/
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[ast-site-icon-divider]', array(
				'type'     => 'ast-divider',
				'section'  => 'title_tagline',
				'priority' => 50,
				'settings' => array(),
			)
		)
	);
