<?php
/**
 * General Options for Kemet Theme.
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

$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-content-widthh]', array(
			'default'           => 1200,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'validate_site_widthh' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-content-widthh]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-container-layout',
				'priority'    => 10,
				'label'       => __( 'Container Widthh', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 768,
					'step' => 1,
					'max'  => 1920,
				),
			)
		)
	);
    
   /**
	 * Option: Site Content Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-content-layout]', array(
			'default'           => kemet_get_option( 'site-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[site-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 50,
			'label'    => __( 'Default Container', 'kemet' ),
			'choices'  => array(
				'boxed-container'         => __( 'Boxed', 'kemet' ),
				'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
				'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
				'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Single Page Content Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[single-page-content-layout]', array(
			'default'           => kemet_get_option( 'single-page-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[single-page-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'label'    => __( 'Container for Pages', 'kemet' ),
			'priority' => 55,
			'choices'  => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed', 'kemet' ),
				'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
				'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
				'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Single Post Content Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[single-post-content-layout]', array(
			'default'           => kemet_get_option( 'single-post-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[single-post-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 60,
			'label'    => __( 'Container for Blog Posts', 'kemet' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed', 'kemet' ),
				'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
				'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
				'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Archive Post Content Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[archive-post-content-layout]', array(
			'default'           => kemet_get_option( 'archive-post-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[archive-post-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 65,
			'label'    => __( 'Container for Blog Archives', 'kemet' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed', 'kemet' ),
				'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
				'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
				'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Body Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-layout-outside-bg-obj]', array(
			'default'           => kemet_get_option( 'site-layout-outside-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-layout-outside-bg-obj]', array(
				'type'     => 'kmt-background',
				'section'  => 'section-container-layout',
				'priority' => 70,
				'label'    => __( 'Body Background', 'kemet' ),
			)
		)
	);
    	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-content-layout-divider]', array(
				'type'     => 'kmt-divider',
				'priority' => 50,
				'section'  => 'section-container-layout',
				'settings' => array(),
			)
		)
	);
   
   /**
    * Option: Boxed Inner Background
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-boxed-inner-bg]', array(
			'default'           => kemet_get_option( 'site-boxed-inner-bg' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-boxed-inner-bg]', array(
				'type'     => 'kmt-background',
				'section'  => 'section-container-layout',
				'priority' => 70,
				'label'    => __( 'Inner Background', 'kemet' ),
			)
		)
	);
    
   /**
    * Option - Container Inner Spacing
    */
   $wp_customize->add_setting(
       KEMET_THEME_SETTINGS . '[container-inner-spacing]', array(
           'default'           => kemet_get_option( 'container-inner-spacing' ),
           'type'              => 'option',
           'transport'         => 'postMessage',
           'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
       )
   );
   $wp_customize->add_control(
       new Kemet_Control_Responsive_Spacing(
           $wp_customize, KEMET_THEME_SETTINGS . '[container-inner-spacing]', array(
               'type'           => 'kmt-responsive-spacing',
               'section'        => 'section-container-layout',
               'priority'       => 70,
               'label'          => __( 'Inner Container Spacing', 'kemet' ),
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
			$wp_customize, KEMET_THEME_SETTINGS . '[site-content-layout-divider]', array(
				'type'     => 'kmt-divider',
				'priority' => 50,
				'section'  => 'section-container-layout',
				'settings' => array(),
			)
		)
	);
