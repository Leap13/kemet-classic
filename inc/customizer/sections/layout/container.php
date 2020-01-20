<?php
/**
 * General Options for Kemet Theme.
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
	* Option: Site Content Width
	*/
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[site-content-width]', array(
			'default'           => kemet_get_option( 'site-content-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'validate_site_width' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[site-content-width]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-container-layout',
				'priority'    => 5,
				'label'       => __( 'Container Width', 'kemet' ),
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
			'priority' => 10,
			'label'    => __( 'Default Container', 'kemet' ),
			'choices'  => array(
				'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
				'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
				'plain-container'         => __( 'Full Width Content', 'kemet' ),
				'page-builder'            => __( 'Stretched Content', 'kemet' ),
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
			'priority' => 15,
			'choices'  => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
				'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
				'plain-container'         => __( 'Full Width Content', 'kemet' ),
				'page-builder'            => __( 'Stretched Content', 'kemet' ),
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
			'priority' => 20,
			'label'    => __( 'Container for Blog Posts', 'kemet' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
				'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
				'plain-container'         => __( 'Full Width Content', 'kemet' ),
				'page-builder'            => __( 'Stretched Content', 'kemet' ),
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
			'priority' => 25,
			'label'    => __( 'Container for Blog Archives', 'kemet' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
				'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
				'plain-container'         => __( 'Full Width Content', 'kemet' ),
				'page-builder'            => __( 'Stretched Content', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-site-body-bg-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Body', 'kemet' ),
				'section'  => 'section-container-layout',
				'priority' => 30,
				'settings' => array(),
			)
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
				'priority' => 35,
				'label'    => __( 'Body Background', 'kemet' ),
			)
		)
	);
   	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-site-boxed-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Boxed Inner', 'kemet' ),
				'section'  => 'section-container-layout',
				'priority' => 36,
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
				'priority' => 40,
				'label'    => __( 'Boxed Inner Background', 'kemet' ),
			)
		)
	);
		/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-site-body-spacing-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Body Spacing', 'kemet' ),
				'section'  => 'section-container-layout',
				'priority' => 45,
				'settings' => array(),
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
               'priority'       => 50,
               'label'          => __( 'Inner Container Spacing', 'kemet' ),
               'linked_choices' => true,
               'unit_choices'   => array( 'px', 'em', '%' ),
               'choices'        => array(
                   'top'    => __( 'Top', 'kemet' ),
                   'right'  => __( 'Right', 'kemet' ),
                   'left'   => __( 'Left', 'kemet' ),
               ),
           )
       )
   );

   /**
	* Option: Content separator Color
	*/
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[content-separator-color]', array(
			'default'           => kemet_get_option( 'content-separator-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[content-separator-color]', array(
				'type'    => 'kmt-color',
				'priority'    => 55,
				'label'   => __( 'Content separator Color', 'kemet' ),
				'section' => 'section-container-layout',
			)
		)
	);