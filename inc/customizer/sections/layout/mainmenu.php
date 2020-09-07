<?php
/**
 * Main Menu Options for Wiz Theme.
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

$header_rt_sections = array(
	'none'      => __( 'None', 'wiz' ),
	'search'    => __( 'Search', 'wiz' ),
	'text-html' => __( 'Text / HTML', 'wiz' ),
	'widget'    => __( 'Widget', 'wiz' ),
);
	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Wiz_Control_Title(
			$wp_customize, WIZ_THEME_SETTINGS . '[wiz-menu-title]', array(
				'type'     => 'wiz-title',
				'label'    => __( 'Main Menu Settings', 'wiz' ),
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
		WIZ_THEME_SETTINGS . '[disable-primary-nav]', array(
			'default'           => $defaults[ 'disable-primary-nav' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[disable-primary-nav]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'label'    => __( 'Disable Main Menu', 'wiz' ),
			'priority' => 5,
		)
	);

	/**
	* Option: Menu Font Size
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-font-size]', array(
			'default'           => $defaults[ 'menu-font-size' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-font-size]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-menu-header',
				'priority'       => 10,
				'label'          => __( 'Font Size', 'wiz' ),
				'unit_choices'   => array(
					'px' => array(
						'min' => 1,
						'step' => 1,
						'max' =>200,
					),
					'em' => array(
						'min' => 0.1,
						'step' => 0.1,
						'max' => 10,
					),
				),
			)
		)
	);
	/**
	 * Option:Menu Items Typography
	 * Option: Font Family
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-items-font-family]', array(
			'default'           => $defaults[ 'menu-items-font-family' ],
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Wiz_Control_Typography(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-items-font-family]', array(
				'type'        => 'wiz-font-family',
				'section'     => 'section-menu-header',
				'priority'    => 15,
				'label'       => __( 'Font Family', 'wiz' ),
				'connect'     => WIZ_THEME_SETTINGS . '[menu-items-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-items-font-weight]', array(
			'default'           => $defaults[ 'menu-items-font-weight' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Typography(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-items-font-weight]', array(
				'type'        => 'wiz-font-weight',
				'section'     => 'section-menu-header',
				'priority'    => 20,
				'label'       => __( 'Font Weight', 'wiz' ),
				'connect'     => WIZ_THEME_SETTINGS . '[menu-items-font-family]',
			)
		)
	);

	/**
	 * Option: Menu Items Text Transform
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-items-text-transform]', array(
			'default'           => $defaults[ 'menu-items-text-transform' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[menu-items-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 25,
			'label'    => __( 'Text Transform', 'wiz' ),
			'choices'  => array(
				''           => __( 'Default', 'wiz' ),
				'none'       => __( 'None', 'wiz' ),
				'capitalize' => __( 'Capitalize', 'wiz' ),
				'uppercase'  => __( 'Uppercase', 'wiz' ),
				'lowercase'  => __( 'Lowercase', 'wiz' ),
			),
		)
	);
	/**
	 * Option: Menu Items Line Height
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-items-line-height]', array(
			'default'           => $defaults[ 'menu-items-line-height' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-items-line-height]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-menu-header',
				'priority'       => 30,
				'label'          => __( 'Line Height', 'wiz' ),
				'unit_choices'   => array(
					'px' => array(
						'min' => 0,
						'step' => 1,
						'max' =>100,
					),
					'em' => array(
						'min' => 0,
						'step' => 1,
						'max' => 10,
					),
					'%' => array(
						'min' => 0,
						'step' => 1,
						'max' => 100,
					),
				),
			)
		)
	);
	/**
	* Option: Menu Letter Spacing
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-letter-spacing]', array(
			'default'           => $defaults[ 'menu-letter-spacing' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-letter-spacing]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-menu-header',
				'priority'       => 33,
				'label'          => __( 'Letter Spacing', 'wiz' ),
				'unit_choices'   => array(
					'px' => array(
						'min' => 0.1,
						'step' => 0.1,
						'max' => 10,
					),
				),
			)
		)
	);	
	/**
	 * Option: Menu Background Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-bg-color]', array(
			'default'           => $defaults[ 'menu-bg-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-bg-color]', array(
        'priority'       => 35,
        'section' => 'section-menu-header',
				'label'   => __( 'Background Color', 'wiz' ),
			)
		)
	);
	/**
		 * Option:Menu Link Color
		*/
		$wp_customize->add_setting(
			WIZ_THEME_SETTINGS . '[menu-link-color]', array(
				'default'           => $defaults[ 'menu-link-h-color' ],
				'type'              => 'option',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
			)
		);
		$wp_customize->add_control(
			new Wiz_Control_Color(
				$wp_customize, WIZ_THEME_SETTINGS . '[menu-link-color]', array(
					'label'   => __( 'Link Color', 'wiz' ),
					'priority'       => 40,
					'section' => 'section-menu-header',
				)
			)
		);
		
	  /**
      * Option:Menu Link Hover Color
      */
	  $wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-link-h-color]', array(
			'default'           => $defaults[ 'menu-link-h-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-link-h-color]', array(
				'label'   => __( 'Link Hover Color', 'wiz' ),
				'priority'       => 45,
				'section' => 'section-menu-header',
			)
		)
	);

	/**
	 * Option:Menu Link Bottom Border Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-link-bottom-border-color]', array(
			'default'           => $defaults[ 'menu-link-bottom-border-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-link-bottom-border-color]', array(
				'label'   => __( 'Link Bottom Border Color on Hover', 'wiz' ),
				'priority'       => 50,
				'section' => 'section-menu-header',
			)
		)
	);

	/**
	 * Option:Menu Active Link Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-link-active-color]', array(
			'default'           => $defaults[ 'menu-link-active-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-link-active-color]', array(
				'label'   => __( 'Link Active Color', 'wiz' ),
				'priority'       => 55,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
	 * Option:Menu Active Link Bg Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[menu-link-active-bg-color]', array(
			'default'           => $defaults[ 'menu-link-active-bg-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-link-active-bg-color]', array(
				'label'   => __( 'Link Active Background Color', 'wiz' ),
				'priority'       => 55,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
     * Option: Main Menu Alignment
     */
    $wp_customize->add_setting(
			WIZ_THEME_SETTINGS . '[menu-alignment]',array(
					'default'           => $defaults['menu-alignment'],
					'type'              => 'option',
					'sanitize_callback' => array('Wiz_Customizer_Sanitizes','sanitize_choices'),
					'dependency'  => array(
						'controls' =>  WIZ_THEME_SETTINGS . '[header-layouts]/'.WIZ_THEME_SETTINGS . '[header-layouts]', 
						'conditions' => '==/==', 
						'values' => 'header-main-layout-1/header-main-layout-2',
					), 
			)
	);
	$wp_customize->add_control(
		new Wiz_Control_Icon_Select(
			$wp_customize, WIZ_THEME_SETTINGS . '[menu-alignment]', array(
				'priority'       => 60,
				'section' => 'section-menu-header',
				'label'   => __( 'Main Menu Alignment', 'wiz' ),
				'choices'  => array(
					'menu-left' => array(
						'icon' => 'dashicons-editor-alignleft'
					),
					'menu-center' => array(
						'icon' => 'dashicons-editor-aligncenter'
					),
					'menu-right' => array(
						'icon' => 'dashicons-editor-alignright'
					),	
				),
			)
		)
	);
	/**
	 * Option: Main Menu Spacing
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[main-menu-spacing]', array(
			'default'           => $defaults[ 'main-menu-spacing' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Spacing(
			$wp_customize, WIZ_THEME_SETTINGS . '[main-menu-spacing]', array(
				'type'           => 'wiz-responsive-spacing',
				'section'        => 'section-menu-header',
				'priority'       => 61,
				'label'          => __( 'Main Menu Spacing', 'wiz' ),
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
	 * Option: Main Menu Spacing
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[main-menu-item-spacing]', array(
			'default'           => $defaults[ 'main-menu-item-spacing' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Spacing(
			$wp_customize, WIZ_THEME_SETTINGS . '[main-menu-item-spacing]', array(
				'type'           => 'wiz-responsive-spacing',
				'section'        => 'section-menu-header',
				'priority'       => 61,
				'label'          => __( 'Main Menu Item Spacing', 'wiz' ),
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
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Wiz_Control_Title(
			$wp_customize, WIZ_THEME_SETTINGS . '[wiz-last-custom-menu-title]', array(
				'type'     => 'wiz-title',
				'label'    => __( 'Last Custom Menu Settings', 'wiz' ),
				'section'  => 'section-menu-header',
				'priority' => 65,
				'settings' => array(),
			)
		)
	);
	/**
	 * Last Custom Menu Item/s
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[header-main-rt-section]', array(
			'default'           => $defaults[ 'header-main-rt-section' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
         new Wiz_Control_Sortable(
            $wp_customize, WIZ_THEME_SETTINGS . '[header-main-rt-section]', array(
			'type'     => 'wiz-sortable',
			'section'  => 'section-menu-header',
			'priority' => 70,
			'label'    => __( 'Last Custom Menu Item/s', 'wiz' ),
			'choices'  => apply_filters(
				'wiz_header_elements',
				array(
					'search'    => __( 'Search', 'wiz' ),
					'text-html' => __( 'Text / HTML', 'wiz' ),
					'widget'    => __( 'Widget', 'wiz' ),
				),
				'primary-header'
			),
		)
                        )
	);
	/**
	 * Option: Make It a Standalone Menu
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[header-display-outside-menu]', array(
			'default'           => $defaults[ 'header-display-outside-menu' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[header-layouts]', 
				'conditions' => 'notEmpty/!=', 
				'values' => '/header-main-layout-3',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[header-display-outside-menu]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'label'    => __( 'Make It a Standalone Menu', 'wiz' ),
			'priority' => 75,
		)
	);
	/**
	 * Option: Disable The Last Custom Menu on Mobile
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[disable-last-menu-items-on-mobile]', array(
			'default'           => $defaults[ 'disable-last-menu-items-on-mobile' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]', 
				'conditions' => 'notEmpty', 
				'values' => '',
			)
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[disable-last-menu-items-on-mobile]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'label'    => __( 'Disable The Last Custom Menu on Mobile', 'wiz' ),
			'priority' => 80,
		)
	);

	/**
	 * Option: Last Custom Menu Spacing
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[last-menu-item-spacing]', array(
			'default'           => $defaults[ 'last-menu-item-spacing' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Spacing(
			$wp_customize, WIZ_THEME_SETTINGS . '[last-menu-item-spacing]', array(
				'type'           => 'wiz-responsive-spacing',
				'section'        => 'section-menu-header',
				'priority'       => 85,
				'label'          => __( 'Last Custom Menu Spacing', 'wiz' ),
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
	 * Option: Right Section Text / HTML
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'default'           => $defaults[ 'header-main-rt-section-html' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_html' ),
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]', 
				'conditions' => 'inarray', 
				'values' => 'text-html',
			),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'type'     => 'textarea',
			'section'  => 'section-menu-header',
			'priority' => 90,
			'label'    => __( 'Last Custom Menu Text/HTML', 'wiz' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			WIZ_THEME_SETTINGS . '[header-main-rt-section-html]', array(
				'selector'            => '.main-header-bar .wiz-sitehead-custom-menu-items .wiz-custom-html',
				'container_inclusive' => false,
				'render_callback'     => array( 'Wiz_Customizer_Partials', '_render_header_main_rt_section_html' ),
			)
		);
	}

	/**
	 * Option: Search Box Style
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-style]', array(
			'default'           => $defaults[ 'search-style' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]', 
				'conditions' => 'inarray', 
				'values' => 'search',
			),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[search-style]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 95,
			'label'    => __( 'Search Box Style', 'wiz' ),
			'choices'  => array(
				'search-box'    => __( 'Search Box', 'wiz' ),
				'search-icon'   => __( 'Icon', 'wiz' ),
			),
		)
	);	
	/**
	 * Option: Search Box Shadow
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-box-shadow]', array(
			'default'           => $defaults[ 'search-box-shadow' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[search-style]', 
				'conditions' => 'inarray/==', 
				'values' => 'search/search-icon',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[search-box-shadow]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'priority' => 100,
			'label'    => __( 'Search Box Shadow', 'wiz' ),
		)
	);
	/**
	 * Option: Search Box Border Size
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-border-size]', array(
			'default'           => $defaults[ 'search-border-size' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[search-style]', 
				'conditions' => 'inarray/==', 
				'values' => 'search/search-box',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[search-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-menu-header',
			'priority'    => 105,
			'label'       => __( 'Search Box Border Size', 'wiz' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 15,
			),
		)
	);
	/**
   	* Option: Search Box Border Color
    */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-border-color]', array(
		  'default'           => $defaults[ 'search-border-color' ],
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		  'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]', 
				'conditions' => 'inarray', 
				'values' => 'search',
			),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
		  $wp_customize, WIZ_THEME_SETTINGS . '[search-border-color]', array(
			'label'   => __( 'Search Box Border Color', 'wiz' ),
			'section' => 'section-menu-header',
			'priority' => 110,
		  )
		)
	);	
	/**
    * Option - Search Box Background Color
    */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-input-bg-color]', array(
		  'default'           => $defaults[ 'search-input-bg-color' ],
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		  'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[search-style]', 
				'conditions' => 'inarray/==', 
				'values' => 'search/search-icon',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
		  $wp_customize, WIZ_THEME_SETTINGS . '[search-input-bg-color]', array(
			'label'   => __( 'Search Box Background Color', 'wiz' ),
			'section' => 'section-menu-header',
			'priority' => 115,
		  )
		)
	);
	/**
    * Option - Search Box Font Color
    */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-input-color]', array(
		  'default'           => $defaults[ 'search-input-color' ],
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		  'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]', 
				'conditions' => 'inarray', 
				'values' => 'search',
			),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
		  $wp_customize, WIZ_THEME_SETTINGS . '[search-input-color]', array(
			'label'   => __( 'Search Box Font Color', 'wiz' ),
			'section' => 'section-menu-header',
			'priority' => 120,
		  )
		)
	);
	/**
   	* Option: Search Button Background Color
    */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-btn-bg-color]', array(
		  'default'           => $defaults[ 'search-btn-bg-color' ],
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		  'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[search-style]', 
				'conditions' => 'inarray/==', 
				'values' => 'search/search-box',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
		  $wp_customize, WIZ_THEME_SETTINGS . '[search-btn-bg-color]', array(
			'label'   => __( 'Search Box Button Background Color', 'wiz' ),
			'section' => 'section-menu-header',
			'priority' => 125,
		  )
		)
	);
	/**
   	* Option: Search Button Hover Background Color
    */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-btn-h-bg-color]', array(
		  'default'           => $defaults[ 'search-btn-h-bg-color' ],
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		  'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[search-style]', 
				'conditions' => 'inarray/==', 
				'values' => 'search/search-box',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
		  $wp_customize, WIZ_THEME_SETTINGS . '[search-btn-h-bg-color]', array(
			'label'   => __( 'Search Box Button Background Hover Color', 'wiz' ),
			'section' => 'section-menu-header',
			'priority' => 130,
		  )
		)
	);
	/**
   	* Option: Search Button Color
    */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[search-btn-color]', array(
		  'default'           => $defaults[ 'search-btn-color' ],
		  'type'              => 'option',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		  'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[search-style]', 
				'conditions' => 'inarray/==', 
				'values' => 'search/search-box',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
		  $wp_customize, WIZ_THEME_SETTINGS . '[search-btn-color]', array(
			'label'   => __( 'Button Text Color', 'wiz' ),
			'section' => 'section-menu-header',
			'priority' => 135,
		  )
		)
	);
		
	/**
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Wiz_Control_Title(
			$wp_customize, WIZ_THEME_SETTINGS . '[wiz-submenu-title]', array(
				'type'     => 'wiz-title',
				'label'    => __( 'Submenu Settings', 'wiz' ),
				'section'  => 'section-menu-header',
				'priority' => 140,
				'settings' => array(),
			)
		)
	);
	 
	/**
	* Option: Submenu Animation
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sub-menu-animation]', array(
			'default'           => $defaults[ 'sub-menu-animation' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[sub-menu-animation]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 142,
			'label'    => __( 'Submenu Animation', 'wiz' ),
			'choices'  => array(
				'none'    => __( 'None', 'wiz' ),
				'fade' => __( 'Fade', 'wiz' ),
				'fade-move' => __( 'Fade and Move', 'wiz' ),
			),	
		)
	);
	/**
	 * Option: Submenu Box Shadow
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-box-shadow]', array(
			'default'           => $defaults[ 'submenu-box-shadow' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[submenu-box-shadow]', array(
			'type'     => 'checkbox',
			'section'  => 'section-menu-header',
			'label'    => __( 'Submenu Box Shadow', 'wiz' ),
			'priority' => 143,
		)
	);
	/**
	 * Option: Submenu Width
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-width]', array(
			'default'           => $defaults[ 'submenu-width' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-width]', array(
				'type'        => 'wiz-slider',
				'section'     => 'section-menu-header',
				'priority'    => 145,
				'label'       => __( 'Submenu Width (PX)', 'wiz' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 500,
				),
			)
		)
	);
	/**
	 * Option:Sub Menu Items Typography
	 * Option: Font Family
	 */
	/**
	* Option: Submenu Font Size
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-font-size]', array(
			'default'           => $defaults[ 'submenu-font-size' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-font-size]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-menu-header',
				'priority'       => 150,
				'label'          => __( 'Font Size', 'wiz' ),
				'unit_choices'   => array(
					'px' => array(
						'min' => 1,
						'step' => 1,
						'max' =>200,
					),
					'em' => array(
						'min' => 0.1,
						'step' => 0.1,
						'max' => 10,
					),
				),
			)
		)
	);
	/**
	* Option: Font Family
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sub-menu-items-font-family]', array(
			'default'           => $defaults[ 'sub-menu-items-font-family' ],
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Wiz_Control_Typography(
			$wp_customize, WIZ_THEME_SETTINGS . '[sub-menu-items-font-family]', array(
				'type'        => 'wiz-font-family',
				'section'     => 'section-menu-header',
				'priority'    => 155,
				'label'       => __( 'Font Family', 'wiz' ),
				'connect'     => WIZ_THEME_SETTINGS . '[sub-menu-items-font-weight]',
			)
		)
	);

	/**
	 * Option: SubMenu Font Weight
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sub-menu-items-font-weight]', array(
			'default'           => $defaults[ 'sub-menu-items-font-weight' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Typography(
			$wp_customize, WIZ_THEME_SETTINGS . '[sub-menu-items-font-weight]', array(
				'type'        => 'wiz-font-weight',
				'section'     => 'section-menu-header',
				'priority'    => 160,
				'label'       => __( 'Font Weight', 'wiz' ),
				'connect'     => WIZ_THEME_SETTINGS . '[sub-menu-items-font-family]',
			)
		)
	);

	/**
	 * Option: SubMenu Items Text Transform
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sub-menu-items-text-transform]', array(
			'default'           => $defaults[ 'sub-menu-items-text-transform' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[sub-menu-items-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 165,
			'label'    => __( 'Text Transform', 'wiz' ),
			'choices'  => array(
				''           => __( 'Default', 'wiz' ),
				'none'       => __( 'None', 'wiz' ),
				'capitalize' => __( 'Capitalize', 'wiz' ),
				'uppercase'  => __( 'Uppercase', 'wiz' ),
				'lowercase'  => __( 'Lowercase', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Menu Items Line Height
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sub-menu-items-line-height]', array(
			'default'           => $defaults[ 'sub-menu-items-line-height' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[sub-menu-items-line-height]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-menu-header',
				'priority'       => 170,
				'label'          => __( 'Line Height', 'wiz' ),
				'unit_choices'   => array(
					'px' => array(
						'min' => 0,
						'step' => 1,
						'max' =>100,
					),
					'em' => array(
						'min' => 0,
						'step' => 1,
						'max' => 10,
					),
					'%' => array(
						'min' => 0,
						'step' => 1,
						'max' => 100,
					),
				),
			)
		)
	);
	/**
	* Option: SubMenu Font Size
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-letter-spacing]', array(
			'default'           => $defaults[ 'submenu-letter-spacing' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-letter-spacing]', array(
				'type'           => 'wiz-responsive-slider',
				'section'        => 'section-menu-header',
				'priority'       => 173,
				'label'          => __( 'Letter Spacing', 'wiz' ),
				'unit_choices'   => array(
					'px' => array(
						'min' => 0.1,
						'step' => 0.1,
						'max' => 10,
					),
				),
			)
		)
	);
	/**
	 * Option: SubMenu Background Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-bg-color]', array(
			'default'           => $defaults[ 'submenu-bg-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-bg-color]', array(
        'priority'       => 175,
        'section' => 'section-menu-header',
				'label'   => __( 'Background Color', 'wiz' ),
			)
		)
	);
	/**
      * Option:SubMenu Link Color
      */
	  $wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-link-color]', array(
			'default'           => $defaults[ 'submenu-link-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-link-color]', array(
				'label'   => __( 'Link Color', 'wiz' ),
				'priority'       => 180,
				'section' => 'section-menu-header',
			)
		)
	);
	
	/**
      * Option:SubMenu Link Hover Color
      */
	  $wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-link-h-color]', array(
			'default'           => $defaults[ 'submenu-link-h-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-link-h-color]', array(
				'label'   => __( 'Link Hover Color', 'wiz' ),
				'priority'       => 185,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
	 * Option: top Border Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-top-border-color]', array(
			'default'           =>  $defaults[ 'submenu-top-border-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-top-border-color]', array(
				'section'  => 'section-menu-header',
				'priority' => 190,
				'label'    => __( 'Top Border Color', 'wiz' ),
			)
		)
	);
		/**
	 * Option: submenu Top Border Size
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-top-border-size]', array(
			'default'           => $defaults[ 'submenu-top-border-size' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[submenu-top-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-menu-header',
			'priority'    => 195,
			'label'       => __( 'Top Border Size(PX)', 'wiz' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Display Submenu Separator
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[display-submenu-border]', array(
			'default'           =>  $defaults[ 'display-submenu-border' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[display-submenu-border]', array(
				'section'  => 'section-menu-header',
				'type'     => 'checkbox',
				'priority' => 200,
				'label'    => __( 'Submenu Separator', 'wiz' ),
			)
		)
	);

	/**
	 * Option: Sub menu Border Color
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[submenu-border-color]', array(
			'default'           =>  $defaults[ 'submenu-border-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[submenu-border-color]', array(
				'section'  => 'section-menu-header',
				'priority' => 205,
				'label'    => __( 'Submenu Separator Color', 'wiz' ),
			)
		)
	);

	/**
	 * Option: SubMenu Spacing
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[sub-menu-item-spacing]', array(
			'default'           => $defaults[ 'sub-menu-item-spacing' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Responsive_Spacing(
			$wp_customize, WIZ_THEME_SETTINGS . '[sub-menu-item-spacing]', array(
				'type'           => 'wiz-responsive-spacing',
				'section'        => 'section-menu-header',
				'priority'       => 206,
				'label'          => __( 'SubMenu Spacing', 'wiz' ),
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
	 * Option: Title
	 */
	$wp_customize->add_control(
		new Wiz_Control_Title(
			$wp_customize, WIZ_THEME_SETTINGS . '[wiz-mobile-menu-title]', array(
				'type'     => 'wiz-title',
				'label'    => __( 'Responsive Menu Settings', 'wiz' ),
				'section'  => 'section-menu-header',
				'priority' => 210,
				'settings' => array(),
			)
		)
	);

	/**
	* Option: Display Responsive Menu at Width
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[display-responsive-menu-point]', array(
			'default'           => $defaults[ 'display-responsive-menu-point' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Slider(
			$wp_customize, WIZ_THEME_SETTINGS . '[display-responsive-menu-point]', array(
				'type'        => 'wiz-slider',
				'section'     => 'section-menu-header',
				'priority'    => 211,
				'label'       => __( 'Display Responsive Menu at Width', 'wiz' ),
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 1920,
				),
			)
		)
	);

    /**
	 * Option: Mobile Menu Label
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[header-main-menu-label]', array(
			'default'           => $defaults[ 'header-main-menu-label' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
			'dependency'  => array(
				'controls' =>  WIZ_THEME_SETTINGS . '[header-main-rt-section]/' . WIZ_THEME_SETTINGS . '[disable-primary-nav]', 
				'conditions' => 'notEmpty/==', 
				'values' => '/0',
				'operators' => '&&'
			),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[header-main-menu-label]', array(
			'section'  => 'section-menu-header',
			'priority' => 215,
			'label'    => __( 'Menu Label on Responsive Devices', 'wiz' ),
			'type'     => 'text',
		)
	);

	/**
	 * Option: Responsive Menu Alignment
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[header-main-menu-align]', array(
			'default'           => $defaults[ 'header-main-menu-align' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[header-main-menu-align]', array(
			'type'     => 'select',
			'section'  => 'section-menu-header',
			'priority' => 220,
			'label'    => __( 'Responsive Menu Alignment', 'wiz' ),
			'choices'  => array(
				'inline' => __( 'Inline', 'wiz' ),
				'stack'  => __( 'Stack', 'wiz' ),
			),
		)
	);

	/**
	 * Option: Mobile Menu Style options
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-icon-color]', array(
			'default'           => $defaults[ 'mobile-menu-icon-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-icon-color]', array(
				'label'   => __( 'Menu Icon Color', 'wiz' ),
				'priority'       => 225,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
	 * Option: Menu Icon Background Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-icon-bg-color]', array(
			'default'           => $defaults[ 'mobile-menu-icon-bg-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-icon-bg-color]', array(
        'priority'       => 230,
        'section' => 'section-menu-header',
				'label'   => __( 'Menu Icon Background Color', 'wiz' ),
			)
		)
	);
	/**
	 * Option: Menu Icon Hover Color
	*/
		$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-icon-h-color]', array(
			'default'           => $defaults[ 'mobile-menu-icon-h-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-icon-h-color]', array(
				'label'   => __( 'Menu Icon Hover Color', 'wiz' ),
				'priority'       => 235,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
	 * Option: Menu Icon Background Hover Color
	*/
	$wp_customize->add_setting(
	WIZ_THEME_SETTINGS . '[mobile-menu-icon-bg-h-color]', array(
		'default'           => $defaults[ 'mobile-menu-icon-bg-h-color' ],
		'type'              => 'option',
		'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-icon-bg-h-color]', array(
        'priority'       => 240,
        'section' => 'section-menu-header',
				'label'   => __( 'Menu Icon Background Hover Color', 'wiz' ),
			)
		)
	);
	/**
	 * Option: Menu Links Color
	*/
		$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-items-color]', array(
			'default'           => $defaults[ 'mobile-menu-items-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-items-color]', array(
				'label'   => __( 'Menu Links Color', 'wiz' ),
				'priority'       => 245,
				'section' => 'section-menu-header',
			)
		)
	);
	/**
	 * Option: Menu Links Background Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-items-bg-color]', array(
			'default'           => $defaults[ 'mobile-menu-items-bg-color' ],
			'type'              => 'option',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-items-bg-color]', array(
				'priority'       => 250,
				'section' => 'section-menu-header',
				'label'   => __( 'Menu Links Background Color', 'wiz' ),
			)
		)
	);
	/**
	 * Option: Menu Links Hover Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-items-h-color]', array(
			'default'           => $defaults[ 'mobile-menu-items-h-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-items-h-color]', array(
				'label'   => __( 'Menu Links Hover Color', 'wiz' ),
				'priority'       => 255,
				'section' => 'section-menu-header',
			)
		)
	);

	/**
	 * Option: Border Size
	 */
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-items-border-size]', array(
			'default'           => $defaults[ 'mobile-menu-items-border-size' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		WIZ_THEME_SETTINGS . '[mobile-menu-items-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-menu-header',
			'priority'    => 260,
			'label'       => __( 'Border Bottom Size', 'wiz' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 15,
			),
		)
	);

	/**
	 * Option:Menu Mobile Menu Border Color
	*/
	$wp_customize->add_setting(
		WIZ_THEME_SETTINGS . '[mobile-menu-items-border-color]', array(
			'default'           => $defaults[ 'mobile-menu-items-border-color' ],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Wiz_Control_Color(
			$wp_customize, WIZ_THEME_SETTINGS . '[mobile-menu-items-border-color]', array(
				'label'   => __( 'Border Bottom Color', 'wiz' ),
				'priority'       => 265,
				'section' => 'section-menu-header',
			)
		)
	);