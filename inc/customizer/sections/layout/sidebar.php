<?php

/**
 * Option: Header Inner Background
 */
$fields = array(
	array(
		'id'           => '[sidebar-bg-obj]',
		'default'      => $defaults['sidebar-bg-obj'],
		'type'         => 'option',
		'control_type' => 'kmt-background',
		'section'      => 'section-sidebars',
		'priority'     => 1,
		'transport'    => 'postMessage',
	),

);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-sidebar-bg-obj]',
	'type'      => 'kmt-group',
	'label'     => __( 'Sidebar Background', 'kemet' ),
	'section'   => 'section-sidebars',
	'priority'  => 35,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Title
*/
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-sidebar-style]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Sidebar Content Style', 'kemet' ),
			'section'  => 'section-sidebars',
			'priority' => 40,
			'settings' => array(),
		)
	)
);

/**
* Option: Heading 6 ( H6 ) Font Size
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[sidebar-content-font-size]',
	array(
		'default'           => $defaults['sidebar-content-font-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[sidebar-content-font-size]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-sidebars',
			'priority'     => 41,
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
		)
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
		'id'           => '[sidebar-text-color]',
		'default'      => $defaults ['sidebar-text-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-sidebars',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[sidebar-link-color]',
		'default'      => $defaults ['sidebar-link-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-sidebars',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	* Option - Hover Color
	*/
	array(
		'id'           => '[sidebar-link-h-color]',
		'default'      => $defaults ['sidebar-link-h-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-sidebars',
		'tab'          => __( 'Hover', 'kemet' ),
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-sidebars-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Content Colors', 'kemet' ),
	'section'   => 'section-sidebars',
	'priority'  => 45,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option - sidebar Spacing
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[sidebar-padding]',
	array(
		'default'           => $defaults['sidebar-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[sidebar-padding]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-sidebars',
			'priority'       => 60,
			'label'          => __( 'Sidebar Padding', 'kemet' ),
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
		KEMET_THEME_SETTINGS . '[kmt-sidebar-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Sidebar Input Fields Style', 'kemet' ),
			'section'  => 'section-sidebars',
			'priority' => 65,
			'settings' => array(),
		)
	)
);
/**
* Option: Colors
*/
$fields         = array(

	/**
	* Option - Color
	*/
	array(
		'id'           => '[sidebar-input-color]',
		'default'      => $defaults ['sidebar-input-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-sidebars',
	),
	array(
		'id'           => '[sidebar-input-bg-color]',
		'default'      => $defaults ['sidebar-input-bg-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-sidebars',
	),
	array(
		'id'           => '[sidebar-input-border-color]',
		'default'      => $defaults ['sidebar-input-border-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-sidebars',
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-sidebars-input-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Input Colors', 'kemet' ),
	'section'   => 'section-sidebars',
	'priority'  => 70,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Input Field Border Radius
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[sidebar-input-border-radius]',
	array(
		'default'           => $defaults['sidebar-input-border-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[sidebar-input-border-radius]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-sidebars',
			'priority'     => 85,
			'label'        => __( 'Input Field Border Radius', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 200,
				),
				'%'  => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 100,
				),
			),
		)
	)
);
/**
* Option: Input Field Border Radius
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[sidebar-input-border-size]',
	array(
		'default'           => $defaults['sidebar-input-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[sidebar-input-border-size]',
		array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-sidebars',
			'priority'     => 90,
			'label'        => __( 'Input Field Border Size', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 200,
				),
			),
		)
	)
);
