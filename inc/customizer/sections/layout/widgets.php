<?php
/**
 * Widget Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$defaults = Kemet_Theme_Options::defaults();

/**
 * Option: Title
 */
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[kmt-widget-settings]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Widget Settings', 'kemet' ),
			'section'  => 'section-widgets',
			'priority' => 0,
			'settings' => array(),
		)
	)
);
/**
 * Option - Widgets Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-padding]',
	array(
		'default'           => $defaults['widget-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[widget-padding]',
		array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-widgets',
			'priority'       => 5,
			'label'          => __( 'Spacing', 'kemet' ),
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
 * Option: Widgets Margin Bottom
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-margin-bottom]',
	array(
		'default'           => $defaults['widget-margin-bottom'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[widget-margin-bottom]',
		array(
			'type'        => 'kmt-slider',
			'section'     => 'section-widgets',
			'priority'    => 10,
			'label'       => __( 'Margin Bottom (PX)', 'kemet' ),
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 10,
				'step' => 1,
				'max'  => 100,
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
		KEMET_THEME_SETTINGS . '[kmt-widget-title]',
		array(
			'type'     => 'kmt-title',
			'label'    => __( 'Widget Title Style', 'kemet' ),
			'section'  => 'section-widgets',
			'priority' => 20,
			'settings' => array(),
		)
	)
);
/**
 * Option: Widgets Background Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-bg-color]',
	array(
		'default'           => $defaults['widget-bg-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[widget-bg-color]',
		array(
			'priority' => 23,
			'section'  => 'section-widgets',
			'label'    => __( 'Widget Background Color', 'kemet' ),
		)
	)
);
/**
 * Option:Widgets Title Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-title-color]',
	array(
		'default'           => $defaults['widget-title-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[widget-title-color]',
		array(
			'label'    => __( 'Font Color', 'kemet' ),
			'priority' => 25,
			'section'  => 'section-widgets',
		)
	)
);

/**
 * Option: Widget Typography
 */

$fields = array(
	/**
	 * Option: Widget Font Size
	 */
	array(
		'id'           => '[widget-title-font-size]',
		'default'      => $defaults['widget-title-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-widgets',
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
		'id'           => '[widget-title-font-family]',
		'default'      => $defaults['widget-title-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-widgets',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[widget-title-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[widget-title-font-weight]',
		'default'      => $defaults['widget-title-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-widgets',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[widget-title-font-family]',
	),
	/**
	 * Option: Widget Text Transform
	 */
	array(
		'id'           => '[widget-title-text-transform]',
		'default'      => $defaults['widget-title-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-widgets',
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
	 * Option: Widget Font Style
	 */
	array(
		'id'           => '[widget-title-font-style]',
		'default'      => $defaults['widget-title-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-widgets',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	 * Option: Widget Line Height
	 */
	array(
		'id'           => '[widget-title-line-height]',
		'default'      => $defaults['widget-title-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-widgets',
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
	 * Option: Widget Letter Spacing
	 */
	array(
		'id'           => '[widget-title-letter-spacing]',
		'default'      => $defaults['widget-title-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-widgets',
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
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-widget-title-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-widgets',
	'priority'  => 30,
	'settings'  => array(),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Enable Widget List Separator
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[enable-widget-list-separator]',
	array(
		'default'           => $defaults['enable-widget-list-separator'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[enable-widget-list-separator]',
		array(
			'section'  => 'section-widgets',
			'type'     => 'kmt-switcher',
			'priority' => 55,
			'label'    => __( 'Enable Widget List Separator', 'kemet' ),
		)
	)
);
/**
 * Option: Widget List Border Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-list-border-color]',
	array(
		'default'           => $defaults['widget-list-border-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[enable-widget-list-separator]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[widget-list-border-color]',
		array(
			'section'  => 'section-widgets',
			'priority' => 55,
			'label'    => __( 'Separator Color', 'kemet' ),
		)
	)
);

/**
 * Option: Enable Widget Title Separator
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[enable-widget-title-separator]',
	array(
		'default'           => $defaults['enable-widget-title-separator'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[enable-widget-title-separator]',
		array(
			'section'  => 'section-widgets',
			'type'     => 'kmt-switcher',
			'priority' => 55,
			'label'    => __( 'Enable Widget Title Separator', 'kemet' ),
		)
	)
);
/**
 * Option: Widget Title Border Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-title-border-color]',
	array(
		'default'           => $defaults['widget-title-border-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[enable-widget-title-separator]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize,
		KEMET_THEME_SETTINGS . '[widget-title-border-color]',
		array(
			'section'  => 'section-widgets',
			'priority' => 60,
			'label'    => __( 'Separator Color', 'kemet' ),
		)
	)
);

/**
 * Option: Widget Title Border Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[widget-title-border-size]',
	array(
		'default'           => $defaults['widget-title-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[enable-widget-title-separator]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[widget-title-border-size]',
	array(
		'type'        => 'number',
		'section'     => 'section-widgets',
		'priority'    => 65,
		'label'       => __( 'Separator Width', 'kemet' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 600,
		),
	)
);
