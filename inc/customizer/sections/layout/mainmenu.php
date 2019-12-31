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
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-menu-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Main Menu Settings', 'kemet' ),
				'section'  => 'section-menu-header',
				'priority' => 0,
				'settings' => array(),
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
			'label'    => __( 'Last Custom Menu Item', 'kemet' ),
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
	 * Option: Last Menu Item Left Spacing
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[last-menu-item-spacing]', array(
			'default'           => kemet_get_option( 'last-menu-item-spacing' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Spacing(
			$wp_customize, KEMET_THEME_SETTINGS . '[last-menu-item-spacing]', array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-menu-header',
				'priority'       => 16,
				'label'          => __( 'Last menu Item spacing', 'kemet' ),
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
	 * Option: Search Style
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-style]', array(
			'default'           => 'search-box',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[search-style]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 25,
			'label'    => __( 'Search Style', 'kemet' ),
			'choices'  => array(
				'search-box'    => __( 'Search Box', 'kemet' ),
				'search-icon'   => __( 'Icon', 'kemet' ),
			),
		)
	);	
	/**
	 * Option: Search Box Shadow
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-box-shadow]', array(
			'default'           => false,
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[search-box-shadow]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'priority' => 30,
			'label'    => __( 'Enable Search Box Shadow', 'kemet' ),
		)
	);	
	/**
   	* Option: Search Button Background Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-btn-bg-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-btn-bg-color]', array(
			'label'   => __( 'Search Button Background Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 35,
		  )
		)
	);
	/**
   	* Option: Search Button Hover Background Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-btn-h-bg-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-btn-h-bg-color]', array(
			'label'   => __( 'Search Button Hover', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 40,
		  )
		)
	);
	/**
   	* Option: Search Button Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-btn-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-btn-color]', array(
			'label'   => __( 'Search Button Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 45,
		  )
		)
	);
	/**
	 * Option: Search Form Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-border-size]', array(
			'default'           => kemet_get_option( 'search-border-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[search-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-menu-header',
			'priority'    => 50,
			'label'       => __( 'Search Form Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 15,
			),
		)
	);
	/**
   	* Option: Search Border Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-border-color]', array(
		  'default'           => '#a7a7a7',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-border-color]', array(
			'label'   => __( 'Search Border Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 55,
		  )
		)
	);
	/**
    * Option - Search Background
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-input-bg-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-input-bg-color]', array(
			'label'   => __( 'Search Form Background Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 60,
		  )
		)
	);
	/**
    * Option - Search Font Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-input-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-input-color]', array(
			'label'   => __( 'Search Form Font Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 65,
		  )
		)
	);

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
        'priority'       => 70,
        'section' => 'section-menu-header',
				'label'   => __( 'Menu Background Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option:Menu Items Typography
	 * Option: Font Family
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[menu-items-font-family]', array(
			'default'           => kemet_get_option( 'menu-items-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[menu-items-font-family]', array(
				'type'        => 'kmt-font-family',
				'section'     => 'section-menu-header',
				'priority'    => 75,
				'label'       => __( 'Font Family', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[menu-items-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[menu-items-font-weight]', array(
			'default'           => kemet_get_option( 'menu-items-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[menu-items-font-weight]', array(
				'type'        => 'kmt-font-weight',
				'section'     => 'section-menu-header',
				'priority'    => 80,
				'label'       => __( 'Font Weight', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[menu-items-font-family]',
			)
		)
	);

	/**
	 * Option: Menu Items Text Transform
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[menu-items-text-transform]', array(
			'default'           => kemet_get_option( 'menu-items-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[menu-items-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 85,
			'label'    => __( 'Text Transform', 'kemet' ),
			'choices'  => array(
				''           => __( 'Default', 'kemet' ),
				'none'       => __( 'None', 'kemet' ),
				'capitalize' => __( 'Capitalize', 'kemet' ),
				'uppercase'  => __( 'Uppercase', 'kemet' ),
				'lowercase'  => __( 'Lowercase', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Menu Items Line Height
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[menu-items-line-height]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[menu-items-line-height]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-menu-header',
				'priority'    => 90,
				'label'       => __( 'Line Height', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 0.01,
					'max'  => 5,
				),
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
					'priority'       => 95,
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
				'priority'       => 100,
				'section' => 'section-menu-header',
			)
		)
	);

		/**
		 * Option:Menu Link Bottom Border Color
		*/
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[menu-link-bottom-border-color]', array(
				'default'           => kemet_get_option( 'menu-link-bottom-border-color' ),
				'type'              => 'option',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Kemet_Control_Color(
				$wp_customize, KEMET_THEME_SETTINGS . '[menu-link-bottom-border-color]', array(
					'label'   => __( 'Menu Link Bottom Border Color', 'kemet' ),
					'priority'       => 105,
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
						'priority'       => 110,
						'section' => 'section-menu-header',
					)
				)
			);
	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-submenu-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Submenu Settings', 'kemet' ),
				'section'  => 'section-menu-header',
				'priority' => 115,
				'settings' => array(),
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
        'priority'       => 120,
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
				'priority'       => 125,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
	 * Option:Sub Menu Items Typography
	 * Option: Font Family
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sub-menu-items-font-family]', array(
			'default'           => kemet_get_option( 'sub-menu-items-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[sub-menu-items-font-family]', array(
				'type'        => 'kmt-font-family',
				'section'     => 'section-menu-header',
				'priority'    => 130,
				'label'       => __( 'Submenu Font Family', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[sub-menu-items-font-weight]',
			)
		)
	);

	/**
	 * Option: SubMenu Font Weight
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sub-menu-items-font-weight]', array(
			'default'           => kemet_get_option( 'sub-menu-items-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[sub-menu-items-font-weight]', array(
				'type'        => 'kmt-font-weight',
				'section'     => 'section-menu-header',
				'priority'    => 135,
				'label'       => __( 'Sebmenu Font Weight', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[sub-menu-items-font-family]',
			)
		)
	);

	/**
	 * Option: SubMenu Items Text Transform
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sub-menu-items-text-transform]', array(
			'default'           => kemet_get_option( 'sub-menu-items-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[sub-menu-items-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 140,
			'label'    => __( 'Submenu Text Transform', 'kemet' ),
			'choices'  => array(
				''           => __( 'Default', 'kemet' ),
				'none'       => __( 'None', 'kemet' ),
				'capitalize' => __( 'Capitalize', 'kemet' ),
				'uppercase'  => __( 'Uppercase', 'kemet' ),
				'lowercase'  => __( 'Lowercase', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Menu Items Line Height
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[sub-menu-items-line-height]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[sub-menu-items-line-height]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-menu-header',
				'priority'    => 145,
				'label'       => __( 'Submenu Line Height', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 0.01,
					'max'  => 5,
				),
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
				'priority'       => 100,
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
			'priority'    => 105,
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
				'priority' => 110,
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
				'priority' => 115,
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
				'priority' => 120,
				'label'    => __( 'Submenu Border Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Kemet_Control_Title(
			$wp_customize, KEMET_THEME_SETTINGS . '[kmt-mobile-menu-title]', array(
				'type'     => 'kmt-title',
				'label'    => __( 'Mobile Menu Settings', 'kemet' ),
				'section'  => 'section-menu-header',
				'priority' => 125,
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
			'section'  => 'section-menu-header',
			'priority' => 130,
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
			'priority' => 135,
			'label'    => __( 'Mobile Menu Alignment', 'kemet' ),
			'choices'  => array(
				'inline' => __( 'Inline', 'kemet' ),
				'stack'  => __( 'Stack', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Mobile Menu Style options
	*/
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-icon-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-icon-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-icon-color]', array(
				'label'   => __( 'Mobile Menu Icon Color', 'kemet' ),
				'priority'       => 140,
				'section' => 'section-menu-header',
			)
		)
	);

	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-icon-bg-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-icon-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-icon-bg-color]', array(
        'priority'       => 145,
        'section' => 'section-menu-header',
				'label'   => __( 'Mobile Menu Background Color', 'kemet' ),
			)
		)
	);

		$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-icon-h-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-icon-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-icon-h-color]', array(
				'label'   => __( 'Mobile Menu Icon Hover Color', 'kemet' ),
				'priority'       => 150,
				'section' => 'section-menu-header',
			)
		)
	);

		$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-icon-bg-h-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-icon-bg-h-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-icon-bg-h-color]', array(
        'priority'       => 155,
        'section' => 'section-menu-header',
				'label'   => __( 'Mobile Menu Background Hover Color', 'kemet' ),
			)
		)
	);

		$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-items-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-items-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-items-color]', array(
				'label'   => __( 'Mobile Menu Items Color', 'kemet' ),
				'priority'       => 160,
				'section' => 'section-menu-header',
			)
		)
	);

	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-items-bg-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-items-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-items-bg-color]', array(
        'priority'       => 165,
        'section' => 'section-menu-header',
				'label'   => __( 'Mobile Menu Items Background Color', 'kemet' ),
			)
		)
	);
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[mobile-menu-items-h-color]', array(
			'default'           => kemet_get_option( 'mobile-menu-items-h-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[mobile-menu-items-h-color]', array(
				'label'   => __( 'Mobile Menu Items Hover Color', 'kemet' ),
				'priority'       => 170,
				'section' => 'section-menu-header',
			)
		)
	);

	/**
	 * Option: Main Menu Separator
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[main-menu-separator]', array(
			'default'           => true,
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[main-menu-separator]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'priority' => 175,
			'label'    => __( 'Main Menu Separator', 'kemet' ),
		)
	);

	/**
	 * Option: Separator Style
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[separator-style]', array(
			'default'           => 'vertical-bar',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[separator-style]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 180,
			'label'    => __( 'Separator Style', 'kemet' ),
			'choices'  => array(
				'vertical-bar'    => __( 'Vertical Bar', 'kemet' ),
				'back-slash' => __( 'Back Slash', 'kemet' ),
				'circle' => __( 'Circle', 'kemet' ),
			),
		)
	);
		/**
    * Option - Separator Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[separator-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[separator-color]', array(
			'label'   => __( 'Separator Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 185,
		  )
		)
	);

	/**
	 * Option: Menu Last Items Menu Separator
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[last-items-separator]', array(
			'default'           => true,
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[last-items-separator]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'priority' => 190,
			'label'    => __( 'Menu Last Items Menu Separator', 'kemet' ),
		)
	);
	/**
    * Option - Separator Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[separator-last-items-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[separator-last-items-color]', array(
			'label'   => __( 'Separator Last Items Menu Color', 'kemet' ),
			'section' => 'section-menu-header',
			'priority' => 195,
		  )
		)
	);
