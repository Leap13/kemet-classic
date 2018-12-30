<?php
/**
 * sidebar Options for Kemet Theme.
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-footer-image]', array(
				'section'  => 'section-sidebars',
				'priority' => 0,
				'type'     => 'kmt-divider',
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: sidebar Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sidebar-bg-obj]', array(
			'default'           => kemet_get_option( 'sidebar-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[sidebar-bg-obj]', array(
				'type'    => 'kmt-background',
                'section' => 'section-sidebars',
                'priority' => 2,
				'label'   => __( 'Background', 'kemet' ),
			)
		)
	);
		/**
	 * Option: Primary Content Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-sidebar-width]', array(
			'default'           => 30,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-sidebar-width]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-sidebars',
				'priority'    => 3,
				'label'       => __( 'Sidebar Width', 'kemet' ),
				'suffix'      => '%',
				'input_attrs' => array(
					'min'  => 15,
					'step' => 1,
					'max'  => 50,
				),
			)
		)
	);
    
    	$wp_customize->add_control(
		new Kemet_Control_Description(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-sidebar-width-description]', array(
				'type'     => 'kmt-description',
				'section'  => 'section-sidebars',
				'priority' => 4,
				'label'    => '',
				'help'     => __( 'Sidebar width will apply only when one of the following sidebar is set.', 'kemet' ),
				'settings' => array(),
			)
		)
	);

    
	/**
	 * Option: Default Sidebar Position
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-sidebar-layout]', array(
			'default'           => kemet_get_option( 'site-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[site-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 5,
			'label'    => __( 'Default Layout', 'kemet' ),
			'choices'  => array(
				'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
				'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
				'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
			),
		)
	);

    /**
	 * Option: Page
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
			'default'           => kemet_get_option( 'single-page-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 6,
			'label'    => __( 'Pages', 'kemet' ),
			'choices'  => array(
				'default'       => __( 'Default', 'kemet' ),
				'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
				'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
				'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Blog Post
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
			'default'           => kemet_get_option( 'single-post-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 7,
			'label'    => __( 'Blog Posts', 'kemet' ),
			'choices'  => array(
				'default'       => __( 'Default', 'kemet' ),
				'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
				'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
				'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Blog Post Archive
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
			'default'           => kemet_get_option( 'archive-post-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 8,
			'label'    => __( 'Blog Post Archives', 'kemet' ),
			'choices'  => array(
				'default'       => __( 'Default', 'kemet' ),
				'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
				'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
				'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
			),
		)
		
	);



