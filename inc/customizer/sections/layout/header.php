<?php
/**
 * Header Options for Kemet Theme.
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
				'label'    => __( 'Header Layout', 'kemet' ),
				'type'     => 'kmt-radio-image',
				'choices'  => array(
					'header-main-layout-1' => array(
						'label' => __( 'Logo Left', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/header-layout-01.png',
					),
					'header-main-layout-2' => array(
						'label' => __( 'Logo Center', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/header-layout-02.png',
					),
					'header-main-layout-3' => array(
						'label' => __( 'Logo Right', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/header-layout-03.png',
					),     
					'header-main-layout-4' => array(
							'label' => __( 'Right Left Menu', 'kemet' ),
							'path'  => KEMET_THEME_URI . 'assets/images/header-layout-04.png',
						),
					),
			)
		)
	);

		/**
     * Option: Transparent header
     */
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[enable-transparent]', array(
				'default'           => kemet_get_option( 'enable-transparent' ),
				'type'              => 'option',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			KEMET_THEME_SETTINGS . '[enable-transparent]', array(
				'type'            => 'checkbox',
				'section'         => 'section-header',
				'label'           => __( 'Enable Transparent Header', 'kemet' ),
				'priority'        => 10,
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
				'priority' => 20,
				'label'    => __( 'Header Width', 'kemet' ),
				'choices'  => array(
					'full'    => __( 'Full Width', 'kemet' ),
					'content' => __( 'Content Width', 'kemet' ),
				),
			)
		);

		/**
		 * Option: header Background
		 */
		$wp_customize->add_setting(
			KEMET_THEME_SETTINGS . '[header-bg-obj]', array(
				'default'           => kemet_get_option( 'header-bg-obj' ),
				'type'              => 'option',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
			)
		);
		$wp_customize->add_control(
			new Kemet_Control_Background(
				$wp_customize, KEMET_THEME_SETTINGS . '[header-bg-obj]', array(
				'type'    => 'kmt-background',
				'section' => 'section-header',
				'priority' => 20,
				'label'   => __( 'Header Background', 'kemet' ),
				)
			)
		);
		/**
    * Option - header Spacing
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-padding]', array(
			'default'           => kemet_get_option( 'header-padding' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Spacing(
			$wp_customize, KEMET_THEME_SETTINGS . '[header-padding]', array(
				'type'           => 'kmt-responsive-spacing',
				'section'        => 'section-header',
				'priority'       => 25,
				'label'          => __( 'Header Spacing', 'kemet' ),
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

	// if ( isset( $wp_customize->selective_refresh ) ) {
	// 	$wp_customize->selective_refresh->add_partial(
	// 		KEMET_THEME_SETTINGS . '[header-main-rt-section-html]', array(
	// 			'selector'            => '.main-header-bar .kmt-sitehead-custom-menu-items .kmt-custom-html',
	// 			'container_inclusive' => false,
	// 			'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_header_main_rt_section_html' ),
	// 		)
	// 	);
	// }

	/**
	 * Option: Bottom Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-sep]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
       new Kemet_Control_Responsive_Slider(
           $wp_customize, KEMET_THEME_SETTINGS . '[header-main-sep]', array(
               'type'           => 'kmt-responsive-slider',
               'section'        => 'section-header',
               'priority'       => 30,
               'label'          => __( 'Bottom Border Size', 'kemet' ),
			   'unit_choices'   => array(
					'px' => array(
						'min' => 1,
						'step' => 1,
						'max' =>300,
					),
					'em' => array(
						'min' => 1,
						'step' => 1,
						'max' => 10,
					),
				),
           )
       )
   );
	/**
	 * Option: Bottom Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[header-main-sep-color]', array(
			'default'           => kemet_get_option( 'header-main-sep-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[header-main-sep-color]', array(
				'section'  => 'section-header',
				'priority' => 35,
				'label'    => __( 'Bottom Border Color', 'kemet' ),
			)
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
			'section'  => 'section-header',
			'priority' => 16,
			'label'    => __( 'Enable Search Box Shadow', 'kemet-addons' ),
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
			'label'   => __( 'Search Button Background Color', 'kemet-addons' ),
			'section' => 'section-header',
			'priority' => 16,
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
			'label'   => __( 'Search Button Hover', 'kemet-addons' ),
			'section' => 'section-header',
			'priority' => 16,
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
			'label'   => __( 'Search Button Color', 'kemet-addons' ),
			'section' => 'section-header',
			'priority' => 16,
		  )
		)
	);
	if(kemet_get_option('search-style') == 'search-box'){
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
			'section'     => 'section-header',
			'priority'    => 17,
			'label'       => __( 'Search Form Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 15,
			),
		)
	);
}
	/**
   	* Option: Search Border Color
    */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[search-border-color]', array(
		  'default'           => '',
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
		  $wp_customize, KEMET_THEME_SETTINGS . '[search-border-color]', array(
			'label'   => __( 'Search Border Color', 'kemet-addons' ),
			'section' => 'section-header',
			'priority' => 16,
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
			'label'   => __( 'Search Form Background Color', 'kemet-addons' ),
			'section' => 'section-header',
			'priority' => 17,
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
			'label'   => __( 'Search Form Font Color', 'kemet-addons' ),
			'section' => 'section-header',
			'priority' => 17,
		  )
		)
	);