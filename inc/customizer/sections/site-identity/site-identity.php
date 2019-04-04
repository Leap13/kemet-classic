<?php
/**
 * Favicon Options for Kemet Theme.
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

	/**
	 * Option: Retina logo selector
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[kmt-header-retina-logo]', array(
			'default'           => kemet_get_option( 'kmt-header-retina-logo' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-header-retina-logo]', array(
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
		KEMET_THEME_SETTINGS . '[kmt-header-responsive-logo-width]', array(
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
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-header-responsive-logo-width]', array(
				'type'        => 'kmt-responsive-slider',
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
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-site-logo-divider]', array(
				'type'     => 'kmt-divider',
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
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-site-icon-divider]', array(
				'type'     => 'kmt-divider',
				'section'  => 'title_tagline',
				'priority' => 50,
				'settings' => array(),
			)
		)
	);
    
   /**
    * Option - Site Identity Padding
    */
   $wp_customize->add_setting(
       KEMET_THEME_SETTINGS . '[site-identity-spacing]', array(
           'default'           => kemet_get_option( 'site-identity-spacing' ),
           'type'              => 'option',
           'transport'         => 'postMessage',
           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
       )
   );
   $wp_customize->add_control(
       new Kemet_Control_Responsive_Spacing(
           $wp_customize, KEMET_THEME_SETTINGS . '[site-identity-spacing]', array(
               'type'           => 'kmt-responsive-spacing',
               'section'        => 'title_tagline',
               'priority'       => 50,
               'label'          => __( 'Site Identity Space', 'kemet' ),
               'linked_choices' => true,
               'unit_choices'   => array( 'px', 'em', '%' ),
               'choices'        => array(
                   'top'    => __( 'Top', 'kemet' ),
                   'right'  => __( 'Right', 'kemet' ),
                   'bottom' => __( 'Bottom', 'kemet' ),
                   'left'   => __( 'Left', 'kemet' ),
               ),
           )
       )
   );


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-header-typo-title]', array(
				'type'     => 'kmt-divider',
				'section'  => 'title_tagline',
				'priority' => 55,
				'label'    => __( 'Site Title', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Site Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-title-font-size]', array(
			'default'           => kemet_get_option( 'site-title-font-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-title-font-size]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'title_tagline',
				'priority'    => 60,
				'label'       => __( 'Site Title Font Size', 'kemet' ),
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
	 * Option: Site Title Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-title-color]', array(
			'default'           => kemet_get_option( 'site-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-title-color]', array(
				'label'   => __( 'Site Title Color', 'kemet' ),
				'priority'       => 61,
				'section' => 'title_tagline',
			)
		)
	);

	/**
	 * Option: Site Title Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-title-h-color]', array(
			'default'           => kemet_get_option( 'site-title-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-title-h-color]', array(
				'label'   => __( 'Site Title Hover Color', 'kemet' ),
				'priority'       => 62,
				'section' => 'title_tagline',
			)
		)
	);


	/**
	 * Option: Site Tagline Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-site-tagline]', array(
			'default'           => kemet_get_option( 'font-size-site-tagline' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-site-tagline]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'title_tagline',
				'priority'    => 70,
				'label'       => __( 'Tagline Font Size', 'kemet' ),
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

