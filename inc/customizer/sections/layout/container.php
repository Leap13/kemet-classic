<?php
/**
 * General Options for Wiz Theme.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$defaults = Wiz_Theme_Options::defaults();
	/**
	* Option: Site Content Width
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[site-content-width]', array(
			'default'           => $defaults[ 'site-content-width' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'validate_site_width' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[site-content-width]', array(
				'type'        => 'wiz-slider',
				'section'     => 'section-container-layout',
				'priority'    => 5,
				'label'       => __( 'Container Width', 'wiz' ),
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
		WIZ_THEME_SETTINGS . '[site-content-layout]', array(
			'default'           => $defaults[ 'site-content-layout' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[site-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 10,
			'label'    => __( 'Default Container', 'wiz' ),
			'choices'  => array(
				'boxed-container'         => __( 'Boxed Layout', 'wiz' ),
				'content-boxed-container' => __( 'Boxed Content', 'wiz' ),
				'plain-container'         => __( 'Full Width Content', 'wiz' ),
				'page-builder'            => __( 'Stretched Content', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Single Page Content Layout
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[single-page-content-layout]', array(
			'default'           => $defaults[ 'single-page-content-layout' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[single-page-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'label'    => __( 'Pages Container', 'wiz' ),
			'priority' => 15,
			'choices'  => array(
				'default'                 => __( 'Default', 'wiz' ),
				'boxed-container'         => __( 'Boxed Layout', 'wiz' ),
				'content-boxed-container' => __( 'Boxed Content', 'wiz' ),
				'plain-container'         => __( 'Full Width Content', 'wiz' ),
				'page-builder'            => __( 'Stretched Content', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Single Post Content Layout
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[single-post-content-layout]', array(
			'default'           => $defaults[ 'single-post-content-layout' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[single-post-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 20,
			'label'    => __( 'Blog Posts Container', 'wiz' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'wiz' ),
				'boxed-container'         => __( 'Boxed Layout', 'wiz' ),
				'content-boxed-container' => __( 'Boxed Content', 'wiz' ),
				'plain-container'         => __( 'Full Width Content', 'wiz' ),
				'page-builder'            => __( 'Stretched Content', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Archive Post Content Layout
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[archive-post-content-layout]', array(
			'default'           => $defaults[ 'archive-post-content-layout' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[archive-post-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 25,
			'label'    => __( 'Blog Archives Container', 'wiz' ),
			'choices'  => array(
				'default'                 => __( 'Default', 'wiz' ),
				'boxed-container'         => __( 'Boxed Layout', 'wiz' ),
				'content-boxed-container' => __( 'Boxed Content', 'wiz' ),
				'plain-container'         => __( 'Full Width Content', 'wiz' ),
				'page-builder'            => __( 'Stretched Content', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Body Background
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[site-layout-outside-bg-obj]', array(
			'default'           => $defaults[ 'site-layout-outside-bg-obj' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Background(
			$wp_customize, WIZ_THEME_SETTINGS . '[site-layout-outside-bg-obj]', array(
				'type'     => 'wiz-background',
				'section'  => 'section-container-layout',
				'priority' => 35,
				'label'    => __( 'Body Background', 'wiz' ),
			)
		)
	);
   	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Wiz_Control_Title(
			$wp_customize, WIZ_THEME_SETTINGS . '[wiz-site-boxed-title]', array(
				'type'     => 'wiz-title',
				'label'    => __( 'Boxed Layout Content Settings', 'wiz' ),
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
		WIZ_THEME_SETTINGS . '[site-boxed-inner-bg]', array(
			'default'           => $defaults[ 'site-boxed-inner-bg' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Background(
			$wp_customize, WIZ_THEME_SETTINGS . '[site-boxed-inner-bg]', array(
				'type'     => 'wiz-background',
				'section'  => 'section-container-layout',
				'priority' => 40,
				'label'    => __( 'Boxed Background', 'wiz' ),
			)
		)
	);

    /**
    * Option - Content Padding
    */
   $wp_customize->add_setting(
       WIZ_THEME_SETTINGS . '[content-padding]', array(
           'default'           => $defaults[ 'content-padding' ],
           'type'              => 'option',
		   'transport'         => 'postMessage',
           'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
       )
   );
   $wp_customize->add_control(
       new Wiz_Control_Responsive_Spacing(
           $wp_customize, WIZ_THEME_SETTINGS . '[content-padding]', array(
               'type'           => 'wiz-responsive-spacing',
               'section'        => 'section-container-layout',
               'priority'       => 50,
			   'label'          => __( 'Content Padding', 'wiz' ),
			   'description'	   => __('This value will be changed to 0px in the pages built with a page builder','wiz'),
               'linked_choices' => true,
               'unit_choices'   => array( 'px', 'em', '%' ),
               'choices'        => array(
                   'top'    => __( 'Top', 'wiz' ),
				   'bottom' => __( 'Bottom', 'wiz' ),
               ),
           )
       )
   );

   /**
    * Option - Container Inner Spacing
    */
   $wp_customize->add_setting(
       WIZ_THEME_SETTINGS . '[container-inner-spacing]', array(
           'default'           => $defaults[ 'container-inner-spacing' ],
           'type'              => 'option',
           'transport'         => 'postMessage',
           'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
       )
   );
   $wp_customize->add_control(
       new Wiz_Control_Responsive_Spacing(
           $wp_customize, WIZ_THEME_SETTINGS . '[container-inner-spacing]', array(
               'type'           => 'wiz-responsive-spacing',
               'section'        => 'section-container-layout',
               'priority'       => 50,
               'label'          => __( 'Boxed Container Spacing', 'wiz' ),
               'linked_choices' => true,
               'unit_choices'   => array( 'px', 'em', '%' ),
               'choices'        => array(
                   'top'    => __( 'Top', 'wiz' ),
				   'right'  => __( 'Right', 'wiz' ),
				   'bottom' => __( 'Bottom', 'wiz' ),
                   'left'   => __( 'Left', 'wiz' ),
               ),
           )
       )
   );
   
   /**
	* Option: Content separator Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[content-separator-color]', array(
			'default'           => $defaults[ 'content-separator-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[content-separator-color]', array(
				'type'    => 'wiz-color',
				'priority'    => 55,
				'label'   => __( 'Content Separator Color', 'wiz' ),
				'section' => 'section-container-layout',
			)
		)
	);