<?php
/**
 * Sticky Header Options for Kemet Theme.
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
     * Option: Enable Sticky Header 
     */
	$wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[enable-sticky]', array(
            'default'           => kemet_get_option( 'enable-sticky' ),
            'type'              => 'option',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
        )
    );
    $wp_customize->add_control(
        KEMET_THEME_SETTINGS . '[enable-sticky]', array(
            'type'            => 'checkbox',
            'section'         => 'section-sticky-header',
            'label'           => __( 'Enable Sticky Header', 'kemet' ),
            'priority'        => 5,
        )
    );

    /**
	 * Option: Sticky Header Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-bg-obj]', array(
			'default'           => kemet_get_option( 'sticky-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-bg-obj]', array(
				'type'    => 'kmt-background',
                'section' => 'section-sticky-header',
                'priority' => 10,
                'label'   => __( 'Sticky Header Background', 'kemet' ),
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );

    /**
	 * Option: Logo Image
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-logo]', array(
			'default'           => kemet_get_option( 'sticky-logo' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-logo]', array(
				'section'        => 'section-sticky-header',
				'priority'       => 15,
				'label'          => __( 'Sticky Logo Image', 'kemet' ),
                'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
                'active_callback' => 'kmt_dep_sticky',
			)
		)
	);
	
	/**
	 * Option: Sticky Logo Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-logo-width]', array(
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
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-logo-width]', array(
				'type'        => 'kmt-responsive-slider',
				'section'     => 'section-sticky-header',
				'priority'    => 16,
				'label'       => __( 'Sticky Logo Width', 'kemet' ),
				'input_attrs' => array(
					'min'  => 50,
					'step' => 1,
					'max'  => 600,
				),
			)
		)
	);
    
    /**
	 * Option: Sticky Text Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-text-color]', array(
			'default'           => kemet_get_option( 'sticky-text-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-text-color]', array(
				'label'   => __( 'Sticky Text Color', 'kemet' ),
				'priority'=> 20,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );
    
    /**
	 * Option: Sticky Text Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-text-h-color]', array(
			'default'           => kemet_get_option( 'sticky-text-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-text-h-color]', array(
				'label'   => __( 'Sticky Text Hover Color', 'kemet' ),
				'priority'=> 25,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );

    /**
	 * Option: Sticky Submenu Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-submenu-bg-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-submenu-bg-color]', array(
                'label'   => __( 'Sticky Submenu Background Color', 'kemet' ),
                'priority'       => 30,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );
    
    /**
	 * Option: Sticky Submenu Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-submenu-color]', array(
			'default'           => kemet_get_option( 'sticky-submenu-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-submenu-color]', array(
				'label'   => __( 'Sticky Submenu Color', 'kemet' ),
				'priority'=> 35,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );
    
    /**
	 * Option: Sticky Submenu Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-submenu-h-color]', array(
			'default'           => kemet_get_option( 'sticky-submenu-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-submenu-h-color]', array(
				'label'   => __( 'Sticky Submenu Hover Color', 'kemet' ),
				'priority'=> 40,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );
    
    /**
	 * Option: Sticky Divider Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-divider-color]', array(
			'default'           => kemet_get_option( 'sticky-divider-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-divider-color]', array(
				'label'   => __( 'Sticky Divider Color', 'kemet' ),
				'priority'=> 45,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );

    /**
	 * Option: Sticky Border Bottom Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sticky-border-bottom-color]', array(
			'default'           => kemet_get_option( 'sticky-border-bottom-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[sticky-border-bottom-color]', array(
				'label'   => __( 'Sticky Border Bottom Color', 'kemet' ),
				'priority'=> 50,
                'section' => 'section-sticky-header',
                'active_callback' => 'kmt_dep_sticky',
			)
		)
    );

    /**
     * Option:Sticky Responsive
     */
    $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[sticky-responsive]',array(
            'default'           => kemet_get_option('sticky-responsive'),
            'type'              => 'option',
            'sanitize_callback' => array('Kemet_Customizer_Sanitizes','sanitize_choices')
        )
    );
    $wp_customize->add_control(
        KEMET_THEME_SETTINGS . '[sticky-responsive]' ,array(
            'priority'   => 55,
            'section'    => 'section-sticky-header',
            'type'     => 'select',
            'label'    => __( 'Sticky Visibility', 'kemet' ),
            'choices'  => array(
                'show-desktop'        => __( 'Desktop', 'kemet' ),
                'show-mobile'         => __( 'Mobile', 'kemet' ),
                'show-desktop-mobile' => __( 'Desktop + Mobile', 'kemet' ),
            ),
            'active_callback' => 'kmt_dep_sticky',
        )
    );
