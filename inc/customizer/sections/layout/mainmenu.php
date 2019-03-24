<?php
/**
 * Main Menu Options for Kemet Theme.
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

$header_rt_sections = array(
	'none'      => __( 'None', 'kemet' ),
	'search'    => __( 'Search', 'kemet' ),
	'text-html' => __( 'Text / HTML', 'kemet' ),
	'widget'    => __( 'Widget', 'kemet' ),
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
			'section'  => 'section-menu-header',
			'label'    => __( 'Disable Menu', 'kemet' ),
			'priority' => 5,
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
			'section'  => 'section-menu-header',
			'priority' => 10,
			'label'    => __( 'Custom Menu Item', 'kemet' ),
			'choices'  => apply_filters(
				'kemet_header_elements',
				array(
					'search'    => __( 'Search', 'kemet' ),
					'text-html' => __( 'Text / HTML', 'kemet' ),
					'widget'    => __( 'Widget', 'kemet' ),
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
			'section'  => 'section-menu-header',
			'label'    => __( 'Take custom menu item outside', 'kemet' ),
			'priority' => 15,
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
			'section'  => 'section-menu-header',
			'priority' => 20,
			'label'    => __( 'Custom Menu Text / HTML', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[header-main-rt-section-html]', array(
				'selector'            => '.main-header-bar .kmt-sitehead-custom-menu-items .kmt-custom-html',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_header_main_rt_section_html' ),
			)
		);
	}

/**
	 * Option: Menu Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[menu-bg-color]', array(
			'default'           => kemet_get_option( 'menu-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[menu-bg-color]', array(
        'priority'       => 25,
        'section' => 'section-menu-header',
				'label'   => __( 'Menu Background Color', 'kemet' ),
			)
		)
	);
		/**
		 * Option:Menu Link Color
		*/
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[menu-link-color]', array(
				'default'           => kemet_get_option( 'menu-link-h-color' ),
				'type'              => 'option',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Kemet_Control_Color(
				$wp_customize, KEMET_THEME_SETTINGS . '[menu-link-color]', array(
					'label'   => __( 'Menu Link Color', 'kemet' ),
					'priority'       => 30,
					'section' => 'section-menu-header',
				)
			)
		);
		
	  /**
      * Option:Menu Link Hover Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[menu-link-h-color]', array(
			'default'           => kemet_get_option( 'menu-link-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[menu-link-h-color]', array(
				'label'   => __( 'Menu Link Hover Color', 'kemet' ),
				'priority'       => 35,
				'section' => 'section-menu-header',
			)
		)
	);

		/**
      * Option:Menu Active Link Color
      */
			$wp_customize->add_setting(
				KEMET_THEME_SETTINGS . '[menu-link-active-color]', array(
					'default'           => kemet_get_option( 'menu-link-active-color' ),
					'type'              => 'option',
					'transport'         => 'postMessage',
					'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
				)
			);
			$wp_customize->add_control(
				new Kemet_Control_Color(
					$wp_customize, KEMET_THEME_SETTINGS . '[menu-link-active-color]', array(
						'label'   => __( 'Menu Link Active Color', 'kemet' ),
						'priority'       => 40,
						'section' => 'section-menu-header',
					)
				)
			);

	/**
	 * Option: SubMenu Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[submenu-bg-color]', array(
			'default'           => kemet_get_option( 'submenu-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[submenu-bg-color]', array(
        'priority'       => 45,
        'section' => 'section-menu-header',
				'label'   => __( 'SubMenu Background Color', 'kemet' ),
			)
		)
	);
	/**
      * Option:SubMenu Link Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[submenu-link-color]', array(
			'default'           => kemet_get_option( 'submenu-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[submenu-link-color]', array(
				'label'   => __( 'SubMenu Link Color', 'kemet' ),
				'priority'       => 50,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
      * Option:SubMenu Link Hover Color
      */
	  $wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[submenu-link-h-color]', array(
			'default'           => kemet_get_option( 'submenu-link-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[submenu-link-h-color]', array(
				'label'   => __( 'SubMenu Link Hover Color', 'kemet' ),
				'priority'       => 55,
				'section' => 'section-menu-header',
			)
		)
	);

		/**
	 * Option: submenu Top Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[submenu-top-border-size]', array(
			'default'           => kemet_get_option( 'submenu-top-border-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[submenu-top-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-menu-header',
			'priority'    => 60,
			'label'       => __( 'Submenu Top Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);
	/**
	 * Option: top Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[submenu-top-border-color]', array(
			'default'           =>  kemet_get_option( 'submenu-top-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[submenu-top-border-color]', array(
				'section'  => 'section-menu-header',
				'priority' => 65,
				'label'    => __( 'Submenu Top Border Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: top Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[display-submenu-border]', array(
			'default'           =>  kemet_get_option( 'display-submenu-border' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[display-submenu-border]', array(
				'section'  => 'section-menu-header',
				'type'     => 'checkbox',
				'priority' => 70,
				'label'    => __( 'Display Submenu Border', 'kemet' ),
			)
		)
	);
/**
	 * Option: Sub menu Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[submenu-border-color]', array(
			'default'           =>  kemet_get_option( 'submenu-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[submenu-border-color]', array(
				'section'  => 'section-menu-header',
				'priority' => 75,
				'label'    => __( 'Submenu Border Color', 'kemet' ),
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
			'section'  => 'section-menu-header',
			'priority' => 80,
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
			'section'  => 'section-menu-header',
			'priority' => 85,
			'label'    => __( 'Mobile Menu Alignment', 'kemet' ),
			'choices'  => array(
				'inline' => __( 'Inline', 'kemet' ),
				'stack'  => __( 'Stack', 'kemet' ),
			),
		)
	);
	
  
	









	
	