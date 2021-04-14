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
$defaults = Kemet_Theme_Options::defaults();

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
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-menu-title]',
		array(
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
	KEMET_THEME_SETTINGS . '[disable-primary-nav]',
	array(
		'default'           => $defaults['disable-primary-nav'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[disable-primary-nav]',
	array(
		'type'     => 'checkbox',
		'section'  => 'section-menu-header',
		'label'    => __( 'Disable Main Menu', 'kemet' ),
		'priority' => 5,
	)
);

/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Main Menu Font Size
	*/
	array(
		'id'           => '[menu-font-size]',
		'default'      => $defaults ['menu-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'priority'     => 2,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Font Family
	 */
	array(
		'id'           => '[menu-items-font-family]',
		'default'      => $defaults['menu-items-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[menu-items-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[menu-items-font-weight]',
		'default'      => $defaults['menu-items-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[menu-items-font-family]',
	),
	/**
	* Option: Main Menu Text Transform
	*/
	array(
		'id'           => '[menu-items-text-transform]',
		'default'      => $defaults['menu-items-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Main Menu Font Style
	*/
	array(
		'id'           => '[menu-items-font-style]',
		'default'      => $defaults['menu-items-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: Main Menu Line Height
	*/
	array(
		'id'           => '[menu-items-line-height]',
		'default'      => $defaults ['menu-items-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: Main Menu Letter Spacing
	*/
	array(
		'id'           => '[menu-letter-spacing]',
		'default'      => $defaults ['menu-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-main-menu-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-menu-header',
	'priority'  => 10,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );

/**
* Option: Colors
*/
$fields = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[menu-bg-color]',
		'default'      => $defaults ['menu-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-reponsive-color',
		'label'        => __( 'Menu Background Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[menu-link-color]',
		'default'      => $defaults ['menu-link-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-reponsive-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
			* Option - Hover Color
			*/
		array(
			'id'           => '[menu-link-h-color]',
			'default'      => $defaults ['menu-link-h-color'],
			'type'         => 'option',
			'transport'    => 'postMessage',
			'control_type' => 'kmt-reponsive-color',
			'label'        => __( 'Link Color', 'kemet' ),
			'priority'     => 3,
			'section'      => 'section-menu-header',
			'tab'          => __( 'Hover', 'kemet' ),
		),
	array(
		'id'           => '[menu-link-bottom-border-color]',
		'default'      => $defaults ['menu-link-bottom-border-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Border Color', 'kemet' ),
		'priority'     => 4,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	/**
	* Option - Active Color
	*/
	array(
		'id'           => '[menu-link-active-color]',
		'default'      => $defaults ['menu-link-active-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 5,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Active', 'kemet' ),
	),
	array(
		'id'           => '[menu-link-active-bg-color]',
		'default'      => $defaults ['menu-link-active-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Background Color', 'kemet' ),
		'priority'     => 6,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Active', 'kemet' ),
	),

);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-main-menu-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Main Menu Colors', 'kemet' ),
	'section'   => 'section-menu-header',
	'priority'  => 55,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Link Active Radius
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[menu-link-active-radius]',
	array(
		'default'           => $defaults['menu-link-active-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[menu-link-active-radius]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-menu-header',
			'priority'     => 56,
			'label'        => __( 'Link Active Border Radius', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 100,
				),
				'%'  => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 100,
				),
			),
		)
	)
);

/**
 * Option: Main Menu Alignment
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[menu-alignment]',
	array(
		'default'           => $defaults['menu-alignment'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-layouts]/' . KEMET_THEME_SETTINGS . '[header-layouts]',
			'conditions' => '==/==',
			'values'     => 'header-main-layout-1/header-main-layout-2',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Icon_Select(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[menu-alignment]',
		array(
			'priority' => 60,
			'section'  => 'section-menu-header',
			'label'    => __( 'Main Menu Alignment', 'kemet' ),
			'choices'  => array(
				'menu-left'   => array(
					'icon' => 'dashicons-editor-alignleft',
				),
				'menu-center' => array(
					'icon' => 'dashicons-editor-aligncenter',
				),
				'menu-right'  => array(
					'icon' => 'dashicons-editor-alignright',
				),
			),
		)
	)
);
/**
* Option: Menu Item Border Bottom
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[menu-item-border-bottom]',
	array(
		'default'           => $defaults['menu-item-border-bottom'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[menu-item-border-bottom]',
		array(
			'type'        => 'kmt-slider',
			'section'     => 'section-menu-header',
			'priority'    => 61,
			'label'       => __( 'Link Bottom Border Size on Hover', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	)
);
/**
 * Option: Main Menu Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[main-menu-spacing]',
	array(
		'default'           => $defaults['main-menu-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[main-menu-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-menu-header',
			'priority'       => 61,
			'label'          => __( 'Main Menu Spacing', 'kemet' ),
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
 * Option: Main Menu Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[main-menu-item-spacing]',
	array(
		'default'           => $defaults['main-menu-item-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[main-menu-item-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-menu-header',
			'priority'       => 61,
			'label'          => __( 'Main Menu Item Spacing', 'kemet' ),
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
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-last-custom-menu-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Last Custom Menu Item Settings', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[header-main-rt-section]',
	array(
		'default'           => $defaults['header-main-rt-section'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Sortable(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[header-main-rt-section]',
		array(
			'type'     => 'kmt-sortable',
			'section'  => 'section-menu-header',
			'priority' => 70,
			'label'    => __( 'Last Custom Menu Item/s', 'kemet' ),
			'choices'  => apply_filters(
				'kemet_header_elements',
				array(
					'search'     => __( 'Search', 'kemet' ),
					'text-html'  => __( 'Text / HTML', 'kemet' ),
					'kmt-widget' => __( 'Widget', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[header-display-outside-menu]',
	array(
		'default'           => $defaults['header-display-outside-menu'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[header-layouts]',
			'conditions' => 'notEmpty/!=',
			'values'     => '/header-main-layout-3',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[header-display-outside-menu]',
	array(
		'type'     => 'checkbox',
		'section'  => 'section-menu-header',
		'label'    => __( 'Make It a Standalone Menu', 'kemet' ),
		'priority' => 75,
	)
);
/**
 * Option: Disable The Last Custom Menu on Mobile
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[disable-last-menu-items-on-mobile]',
	array(
		'default'           => $defaults['disable-last-menu-items-on-mobile'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]',
			'conditions' => 'notEmpty',
			'values'     => '',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[disable-last-menu-items-on-mobile]',
	array(
		'type'     => 'checkbox',
		'section'  => 'section-menu-header',
		'label'    => __( 'Disable The Last Custom Menu on Mobile', 'kemet' ),
		'priority' => 80,
	)
);
/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Main Menu Font Size
	*/
	array(
		'id'           => '[last-menu-items-font-size]',
		'default'      => $defaults ['menu-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'priority'     => 2,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Font Family
	 */
	array(
		'id'           => '[last-menu-items-font-family]',
		'default'      => $defaults['last-menu-items-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[last-menu-items-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[last-menu-items-font-weight]',
		'default'      => $defaults['last-menu-items-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[last-menu-items-font-family]',
	),
	/**
	* Option: Main Menu Text Transform
	*/
	array(
		'id'           => '[last-menu-items-text-transform]',
		'default'      => $defaults['last-menu-items-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Main Menu Font Style
	*/
	array(
		'id'           => '[last-menu-items-font-style]',
		'default'      => $defaults['last-menu-items-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: Main Menu Line Height
	*/
	array(
		'id'           => '[last-menu-items-line-height]',
		'default'      => $defaults ['last-menu-items-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: Main Menu Letter Spacing
	*/
	array(
		'id'           => '[last-menu-items-letter-spacing]',
		'default'      => $defaults ['last-menu-items-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-last-menu-items-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-menu-header',
	'priority'  => 81,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Last Custom Menu Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[last-menu-item-spacing]',
	array(
		'default'           => $defaults['last-menu-item-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[last-menu-item-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-menu-header',
			'priority'       => 85,
			'label'          => __( 'Last Custom Menu Spacing', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[header-main-rt-section-html]',
	array(
		'default'           => $defaults['header-main-rt-section-html'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]',
			'conditions' => 'inarray',
			'values'     => 'text-html',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[header-main-rt-section-html]',
	array(
		'type'     => 'textarea',
		'section'  => 'section-menu-header',
		'priority' => 90,
		'label'    => __( 'Last Custom Menu Text/HTML', 'kemet' ),
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		KEMET_THEME_SETTINGS . '[header-main-rt-section-html]',
		array(
			'selector'            => '.main-header-bar .kmt-sitehead-custom-menu-items .kmt-custom-html',
			'container_inclusive' => false,
			'render_callback'     => array( 'Kemet_Customizer_Partials', 'render_header_main_rt_section_html' ),
		)
	);
}

/**
 * Option: Search Item Style
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-style]',
	array(
		'default'           => $defaults['search-style'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]',
			'conditions' => 'inarray',
			'values'     => 'search',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[search-style]',
	array(
		'type'     => 'select',
		'section'  => 'section-menu-header',
		'priority' => 95,
		'label'    => __( 'Search Item Style', 'kemet' ),
		'choices'  => array(
			'search-box'  => __( 'Search Box', 'kemet' ),
			'search-icon' => __( 'Icon', 'kemet' ),
		),
	)
);
/**
 * Option: Search Box Shadow
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-box-shadow]',
	array(
		'default'           => $defaults['search-box-shadow'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[search-style]',
			'conditions' => 'inarray/==',
			'values'     => 'search/search-icon',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[search-box-shadow]',
	array(
		'type'     => 'checkbox',
		'section'  => 'section-menu-header',
		'priority' => 100,
		'label'    => __( 'Search Box Shadow', 'kemet' ),
	)
);
/**
 * Option: Search Box Border Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-border-size]',
	array(
		'default'           => $defaults['search-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[search-style]',
			'conditions' => 'inarray/==',
			'values'     => 'search/search-box',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[search-border-size]',
	array(
		'type'        => 'number',
		'section'     => 'section-menu-header',
		'priority'    => 105,
		'label'       => __( 'Search Box Border Size', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[search-border-color]',
	array(
		'default'           => $defaults['search-border-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]',
			'conditions' => 'inarray',
			'values'     => 'search',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[search-border-color]',
		array(
			'label'    => __( 'Search Box Border Color', 'kemet' ),
			'section'  => 'section-menu-header',
			'priority' => 110,
		)
	)
);
/**
* Option - Search Box Background Color
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-input-bg-color]',
	array(
		'default'           => $defaults['search-input-bg-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[search-style]',
			'conditions' => 'inarray/==',
			'values'     => 'search/search-icon',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[search-input-bg-color]',
		array(
			'label'    => __( 'Search Box Background Color', 'kemet' ),
			'section'  => 'section-menu-header',
			'priority' => 115,
		)
	)
);
/**
* Option - Search Box Font Color
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-input-color]',
	array(
		'default'           => $defaults['search-input-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]',
			'conditions' => 'inarray',
			'values'     => 'search',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[search-input-color]',
		array(
			'label'    => __( 'Search Box Font Color', 'kemet' ),
			'section'  => 'section-menu-header',
			'priority' => 120,
		)
	)
);
/**
* Option: Search Button Background Color
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-btn-bg-color]',
	array(
		'default'           => $defaults['search-btn-bg-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[search-style]',
			'conditions' => 'inarray/==',
			'values'     => 'search/search-box',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[search-btn-bg-color]',
		array(
			'label'    => __( 'Search Box Button Background Color', 'kemet' ),
			'section'  => 'section-menu-header',
			'priority' => 125,
		)
	)
);
/**
* Option: Search Button Hover Background Color
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-btn-h-bg-color]',
	array(
		'default'           => $defaults['search-btn-h-bg-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[search-style]',
			'conditions' => 'inarray/==',
			'values'     => 'search/search-box',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[search-btn-h-bg-color]',
		array(
			'label'    => __( 'Search Box Button Background Hover Color', 'kemet' ),
			'section'  => 'section-menu-header',
			'priority' => 130,
		)
	)
);
/**
* Option: Search Button Color
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[search-btn-color]',
	array(
		'default'           => $defaults['search-btn-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[search-style]',
			'conditions' => 'inarray/==',
			'values'     => 'search/search-box',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[search-btn-color]',
		array(
			'label'    => __( 'Button Text Color', 'kemet' ),
			'section'  => 'section-menu-header',
			'priority' => 135,
		)
	)
);

/**
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-submenu-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Submenu Settings', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[sub-menu-animation]',
	array(
		'default'           => $defaults['sub-menu-animation'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[sub-menu-animation]',
	array(
		'type'     => 'select',
		'section'  => 'section-menu-header',
		'priority' => 142,
		'label'    => __( 'Submenu Animation', 'kemet' ),
		'choices'  => array(
			'none'      => __( 'None', 'kemet' ),
			'fade'      => __( 'Fade', 'kemet' ),
			'fade-move' => __( 'Fade and Move', 'kemet' ),
		),
	)
);
/**
 * Option: Submenu Box Shadow
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[submenu-box-shadow]',
	array(
		'default'           => $defaults['submenu-box-shadow'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[submenu-box-shadow]',
	array(
		'type'     => 'checkbox',
		'section'  => 'section-menu-header',
		'label'    => __( 'Submenu Box Shadow', 'kemet' ),
		'priority' => 143,
	)
);
/**
 * Option: Submenu Width
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[submenu-width]',
	array(
		'default'           => $defaults['submenu-width'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[submenu-width]',
		array(
			'type'        => 'kmt-slider',
			'section'     => 'section-menu-header',
			'priority'    => 145,
			'label'       => __( 'Submenu Width (PX)', 'kemet' ),
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
 */

$fields = array(
	/**
	* Option: Submenu Font Size
	*/
	array(
		'id'           => '[submenu-font-size]',
		'default'      => $defaults ['submenu-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'priority'     => 2,
		'label'        => __( 'Font Size', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 200,
			),
			'em' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
	/**
	 * Option: Font Family
	 */
	array(
		'id'           => '[sub-menu-items-font-family]',
		'default'      => $defaults['sub-menu-items-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[sub-menu-items-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[sub-menu-items-font-weight]',
		'default'      => $defaults['sub-menu-items-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[sub-menu-items-font-family]',
	),
	/**
	* Option: Submenu Text Transform
	*/
	array(
		'id'           => '[sub-menu-items-text-transform]',
		'default'      => $defaults['sub-menu-items-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 5,
		'choices'      => array(
			''           => __( 'Default', 'kemet' ),
			'none'       => __( 'None', 'kemet' ),
			'capitalize' => __( 'Capitalize', 'kemet' ),
			'uppercase'  => __( 'Uppercase', 'kemet' ),
			'lowercase'  => __( 'Lowercase', 'kemet' ),
		),
	),
	/**
	* Option: Main Menu Font Style
	*/
	array(
		'id'           => '[sub-menu-items-font-style]',
		'default'      => $defaults['sub-menu-items-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-menu-header',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: Submenu Line Height
	*/
	array(
		'id'           => '[sub-menu-items-line-height]',
		'default'      => $defaults ['sub-menu-items-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'transport'    => 'postMessage',
		'priority'     => 6,
		'label'        => __( 'Line Height', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
			'em' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		),
	),
	/**
	* Option: Submenu Letter Spacing
	*/
	array(
		'id'           => '[submenu-letter-spacing]',
		'default'      => $defaults ['submenu-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-menu-header',
		'priority'     => 7,
		'label'        => __( 'Letter Spacing', 'kemet' ),
		'unit_choices' => array(
			'px' => array(
				'min'  => 0.1,
				'step' => 0.1,
				'max'  => 10,
			),
		),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-sub-menu-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-menu-header',
	'priority'  => 150,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Colors
*/
$fields = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[submenu-bg-color]',
		'default'      => $defaults ['submenu-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[submenu-link-color]',
		'default'      => $defaults ['submenu-link-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[submenu-top-border-color]',
		'default'      => $defaults ['submenu-top-border-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Top Border Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
			* Option - Hover Color
			*/
		array(
			'id'           => '[submenu-bg-hover-color]',
			'default'      => $defaults ['submenu-bg-hover-color'],
			'type'         => 'option',
			'transport'    => 'postMessage',
			'control_type' => 'kmt-color',
			'label'        => __( 'Background Color', 'kemet' ),
			'priority'     => 4,
			'section'      => 'section-menu-header',
			'tab'          => __( 'Hover', 'kemet' ),
		),
	array(
		'id'           => '[submenu-link-h-color]',
		'default'      => $defaults ['submenu-link-h-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 5,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Hover', 'kemet' ),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-sub-menu-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Submenu Colors', 'kemet' ),
	'section'   => 'section-menu-header',
	'priority'  => 175,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
	/**
 * Option: submenu Top Border Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[submenu-top-border-size]',
	array(
		'default'           => $defaults['submenu-top-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[submenu-top-border-size]',
	array(
		'type'        => 'number',
		'section'     => 'section-menu-header',
		'priority'    => 195,
		'label'       => __( 'Top Border Size(PX)', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[display-submenu-border]',
	array(
		'default'           => $defaults['display-submenu-border'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[display-submenu-border]',
		array(
			'section'  => 'section-menu-header',
			'type'     => 'checkbox',
			'priority' => 200,
			'label'    => __( 'Submenu Separator', 'kemet' ),
		)
	)
);

/**
 * Option: Sub menu Border Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[submenu-border-color]',
	array(
		'default'           => $defaults['submenu-border-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[submenu-border-color]',
		array(
			'section'  => 'section-menu-header',
			'priority' => 205,
			'label'    => __( 'Submenu Separator Color', 'kemet' ),
		)
	)
);

/**
 * Option: SubMenu Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[sub-menu-item-spacing]',
	array(
		'default'           => $defaults['sub-menu-item-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[sub-menu-item-spacing]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-menu-header',
			'priority'       => 206,
			'label'          => __( 'SubMenu Spacing', 'kemet' ),
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
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-mobile-menu-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Responsive Menu Settings', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[display-responsive-menu-point]',
	array(
		'default'           => $defaults['display-responsive-menu-point'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[display-responsive-menu-point]',
		array(
			'type'        => 'kmt-slider',
			'section'     => 'section-menu-header',
			'priority'    => 211,
			'label'       => __( 'Display Responsive Menu at Width', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[header-main-menu-label]',
	array(
		'default'           => $defaults['header-main-menu-label'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[header-main-rt-section]/' . KEMET_THEME_SETTINGS . '[disable-primary-nav]',
			'conditions' => 'notEmpty/==',
			'values'     => '/0',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[header-main-menu-label]',
	array(
		'section'  => 'section-menu-header',
		'priority' => 215,
		'label'    => __( 'Menu Label on Responsive Devices', 'kemet' ),
		'type'     => 'text',
	)
);

/**
 * Option: Responsive Menu Alignment
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[header-main-menu-align]',
	array(
		'default'           => $defaults['header-main-menu-align'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[header-main-menu-align]',
	array(
		'type'     => 'select',
		'section'  => 'section-menu-header',
		'priority' => 220,
		'label'    => __( 'Responsive Menu Alignment', 'kemet' ),
		'choices'  => array(
			'inline' => __( 'Inline', 'kemet' ),
			'stack'  => __( 'Stack', 'kemet' ),
		),
	)
);

/**
* Option: Colors
*/
$fields = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[mobile-menu-icon-color]',
		'default'      => $defaults ['mobile-menu-icon-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Icon Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[mobile-menu-icon-bg-color]',
		'default'      => $defaults ['mobile-menu-icon-bg-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Hover Color
	*/
	array(
		'id'           => '[mobile-menu-icon-h-color]',
		'default'      => $defaults ['mobile-menu-icon-h-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Icon Color', 'kemet' ),
		'priority'     => 4,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	array(
		'id'           => '[mobile-menu-icon-bg-h-color]',
		'default'      => $defaults ['mobile-menu-icon-bg-h-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 5,
		'section'      => 'section-menu-header',
		'tab'          => __( 'Hover', 'kemet' ),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-mobile-menu-icon-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Menu Icon Colors', 'kemet' ),
	'section'   => 'section-menu-header',
	'priority'  => 225,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Border Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[mobile-menu-items-border-size]',
	array(
		'default'           => $defaults['mobile-menu-items-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[mobile-menu-items-border-size]',
	array(
		'type'        => 'number',
		'section'     => 'section-menu-header',
		'priority'    => 260,
		'label'       => __( 'Border Bottom Size', 'kemet' ),
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
	KEMET_THEME_SETTINGS . '[mobile-menu-items-border-color]',
	array(
		'default'           => $defaults['mobile-menu-items-border-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[mobile-menu-items-border-color]',
		array(
			'label'    => __( 'Border Bottom Color', 'kemet' ),
			'priority' => 265,
			'section'  => 'section-menu-header',
		)
	)
);
