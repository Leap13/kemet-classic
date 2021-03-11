<?php
/**
 * Bottom Footer Options for Kemet Theme.
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
 * Option: Footer Widgets Layout Layout
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-layout]', array(
		'default'           => $defaults['footer-layout'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	new Kemet_Control_Radio_Image(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-layout]', array(
			'type'     => 'kmt-radio-image',
			'label'    => __( 'Footer Widgets Layout', 'kemet' ),
			'priority' => 5,
			'section'  => 'section-kemet-footer',
			'choices'  => array(
				'disabled' => array(
					'label' => __( 'Disable', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/disable-footer.png',
				),
				'layout-1' => array(
					'label' => __( 'Layout 1', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-1.png',
				),
				'layout-2' => array(
					'label' => __( 'Layout 2', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-2.png',
				),
				'layout-3' => array(
					'label' => __( 'Layout 3', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-3.png',
				),
				'layout-4' => array(
					'label' => __( 'Layout 4', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-4.png',
				),
				'layout-5' => array(
					'label' => __( 'Layout 5', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-5.png',
				),
				'layout-6' => array(
					'label' => __( 'Layout 6', 'kemet' ),
					'path'  => KEMET_THEME_URI . '/assets/images/footer-layout-6.png',
				),
			),
		)
	)
);
/**
 * Option: Sticky Footer
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[enable-sticky-footer]', array(
		'default'           => kemet_get_option( 'enable-sticky-footer' ),
		'type'              => 'option',
		'description'       => 'This option add a height to your content to keep your footer at the bottom of your page.',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[enable-sticky-footer]', array(
		'section'  => 'section-kemet-footer',
		'label'    => __( 'Enable Sticky Footer', 'kemet' ),
		'priority' => 6,
		'type'     => 'checkbox',
	)
);
/**
 * Option: Footer Content Align Center
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[enable-footer-content-center]', array(
		'default'           => $defaults['enable-footer-content-center'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[enable-footer-content-center]', array(
		'type'     => 'checkbox',
		'section'  => 'section-kemet-footer',
		'label'    => __( 'Center Footer Content', 'kemet' ),
		'priority' => 10,
	)
);
/**
 * Option: Enable Widget List Separator
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[enable-footer-widget-list-separator]', array(
		'default'           => $defaults['enable-footer-widget-list-separator'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize, KEMET_THEME_SETTINGS . '[enable-footer-widget-list-separator]', array(
			'section'  => 'section-kemet-footer',
			'type'     => 'checkbox',
			'priority' => 11,
			'label'    => __( 'Enable Widget List Separator', 'kemet' ),
		)
	)
);
/**
 * Option: Widget List Border Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-widget-list-border-color]', array(
		'default'           => $defaults['footer-widget-list-border-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[enable-footer-widget-list-separator]',
			'conditions' => '==',
			'values'     => true,
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-widget-list-border-color]', array(
			'section'  => 'section-kemet-footer',
			'priority' => 12,
			'label'    => __( 'Separator Color', 'kemet' ),
		)
	)
);

/**
 * Option: Header Inner Background
 */
$fields = array(
	array(
		'id'           => '[footer-bg-obj]',
		'default'      => $defaults['footer-bg-obj'],
		'type'         => 'option',
		'control_type' => 'kmt-background',
		'section'      => 'section-kemet-footer',
		'priority'     => 1,
		'transport'    => 'postMessage',
	),

);
$group_settings = array(
	'parent_id'  => KEMET_THEME_SETTINGS . '[kmt-footer-bg-obj]',
	'type'       => 'kmt-group',
	'label'      => __( 'Footer Background', 'kemet' ),
	'section'    => 'section-kemet-footer',
	'priority'   => 15,
	'settings'   => array(),
	'dependency' => array(
		'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
		'conditions' => '!=',
		'values'     => 'disabled',
	),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option - Footer Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-padding]', array(
		'default'           => $defaults['footer-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-padding]', array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-kemet-footer',
			'priority'       => 20,
			'label'          => __( 'Footer Padding', 'kemet' ),
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
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[kmt-footer-title-style]', array(
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
		'sanitize_callback' => 'wp_kses',
	)
);
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-title-style]', array(
			'type'     => 'kmt-title',
			'label'    => __( 'Footer Widget Title Style', 'kemet' ),
			'section'  => 'section-kemet-footer',
			'priority' => 25,
		)
	)
);
/**
 * Option: Widget Title Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-wgt-title-color]', array(
		'default'           => $defaults['footer-wgt-title-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-wgt-title-color]', array(
			'label'    => __( 'Font Color', 'kemet' ),
			'priority' => 30,
			'section'  => 'section-kemet-footer',
		)
	)
);
/**
 * Option: Enable Widget Title Separator
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]', array(
		'default'           => $defaults['enable-footer-widget-title-separator'],
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_checkbox' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize, KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]', array(
			'section'  => 'section-kemet-footer',
			'type'     => 'checkbox',
			'priority' => 32,
			'label'    => __( 'Enable Widget Title Separator', 'kemet' ),
		)
	)
);
/**
 * Option: Widget Title Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-wgt-title-separator-color]', array(
		'default'           => $defaults['footer-wgt-title-separator-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]/' . KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '==/!=',
			'values'     => '1/disabled',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-wgt-title-separator-color]', array(
			'label'    => __( 'Separator Color', 'kemet' ),
			'priority' => 33,
			'section'  => 'section-kemet-footer',
		)
	)
);
/**
 * Option: Widget Title Border Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-widget-title-border-size]', array(
		'default'           => $defaults['footer-widget-title-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[enable-footer-widget-title-separator]/' . KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '==/!=',
			'values'     => '1/disabled',
			'operators'  => '&&',
		),
	)
);
$wp_customize->add_control(
	KEMET_THEME_SETTINGS . '[footer-widget-title-border-size]', array(
		'type'        => 'number',
		'section'     => 'section-kemet-footer',
		'priority'    => 34,
		'label'       => __( 'Separator Width', 'kemet' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 600,
		),
	)
);
/**
 * Option:Sub Menu Items Typography
 */

$fields = array(
	/**
	 * Option: Footer Font Size
	 */
	array(
		'id'           => '[footer-widget-title-font-size]',
		'default'      => $defaults['footer-widget-title-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-kemet-footer',
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
		'id'           => '[footer-wgt-title-font-family]',
		'default'      => $defaults['footer-wgt-title-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-kemet-footer',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[footer-wgt-title-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[footer-wgt-title-font-weight]',
		'default'      => $defaults['footer-wgt-title-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-kemet-footer',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[footer-wgt-title-font-family]',
	),
	/**
	 * Option: Footer Text Transform
	 */
	array(
		'id'           => '[footer-wgt-title-text-transform]',
		'default'      => $defaults['footer-wgt-title-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-kemet-footer',
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
	* Option: Footer Font Style
	*/
	array(
		'id'           => '[footer-wgt-title-font-style]',
		'default'      => $defaults['footer-wgt-title-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-kemet-footer',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	 * Option: Footer Line Height
	 */
	array(
		'id'           => '[footer-wgt-title-line-height]',
		'default'      => $defaults['footer-wgt-title-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-kemet-footer',
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
	 * Option: Footer Letter Spacing
	 */
	array(
		'id'           => '[footer-widget-title-letter-spacing]',
		'default'      => $defaults['footer-widget-title-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-kemet-footer',
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
	'parent_id'  => KEMET_THEME_SETTINGS . '[kmt-footer-widgets-typography]',
	'type'       => 'kmt-group',
	'label'      => __( 'Typography', 'kemet' ),
	'section'    => 'section-kemet-footer',
	'priority'   => 35,
	'settings'   => array(),
	'dependency' => array(
		'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
		'conditions' => '!=',
		'values'     => 'disabled',
	),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Title
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[kmt-footer-style]', array(
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
		'sanitize_callback' => 'wp_kses',
	)
);
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-style]', array(
			'type'     => 'kmt-title',
			'label'    => __( 'Footer Widget Content Style', 'kemet' ),
			'section'  => 'section-kemet-footer',
			'priority' => 60,
			'settings' => array(),
		)
	)
);
/**
 * Option: Text Color
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-text-color]', array(
		'default'           => $defaults['footer-text-color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Color(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-text-color]', array(
			'label'    => __( 'Font Color', 'kemet' ),
			'priority' => 65,
			'section'  => 'section-kemet-footer',
		)
	)
);

/**
 * Option:Footer Items Typography
 */

$fields = array(
	/**
	 * Option: Footer Font Size
	 */
	array(
		'id'           => '[footer-font-size]',
		'default'      => $defaults['footer-font-size'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-kemet-footer',
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
		'id'           => '[footer-font-family]',
		'default'      => $defaults['footer-font-family'],
		'type'         => 'option',
		'control_type' => 'kmt-font-family',
		'label'        => __( 'Font Family', 'kemet' ),
		'section'      => 'section-kemet-footer',
		'priority'     => 3,
		'connect'      => KEMET_THEME_SETTINGS . '[footer-font-weight]',
	),
	/**
	 * Option: Font Weight
	 */
	array(
		'id'           => '[footer-font-weight]',
		'default'      => $defaults['footer-font-weight'],
		'type'         => 'option',
		'control_type' => 'kmt-font-weight',
		'label'        => __( 'Font Weight', 'kemet' ),
		'section'      => 'section-kemet-footer',
		'priority'     => 4,
		'connect'      => KEMET_THEME_SETTINGS . '[footer-font-family]',
	),
	/**
	 * Option: Footer Text Transform
	 */
	array(
		'id'           => '[footer-text-transform]',
		'default'      => $defaults['footer-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-kemet-footer',
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
	 * Option: Footer Font Style
	 */
	array(
		'id'           => '[footer-font-style]',
		'default'      => $defaults['footer-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-kemet-footer',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	 * Option: Footer Line Height
	 */
	array(
		'id'           => '[footer-line-height]',
		'default'      => $defaults['footer-line-height'],
		'type'         => 'option',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-kemet-footer',
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
	 * Option: Footer Letter Spacing
	 */
	array(
		'id'           => '[footer-letter-spacing]',
		'default'      => $defaults['footer-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-kemet-footer',
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
	'parent_id'  => KEMET_THEME_SETTINGS . '[kmt-footer-widgets-content-typography]',
	'type'       => 'kmt-group',
	'label'      => __( 'Typography', 'kemet' ),
	'section'    => 'section-kemet-footer',
	'priority'   => 70,
	'settings'   => array(),
	'dependency' => array(
		'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
		'conditions' => '!=',
		'values'     => 'disabled',
	),
);

new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Title
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[kmt-footer-input-title]', array(
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
		'sanitize_callback' => 'wp_kses',
	)
);
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-input-title]', array(
			'type'     => 'kmt-title',
			'label'    => __( 'Footer Input Fields Style', 'kemet' ),
			'section'  => 'section-kemet-footer',
			'priority' => 95,
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
		'id'           => '[footer-input-color]',
		'default'      => $defaults['footer-input-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Text Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-kemet-footer',
	),
	array(
		'id'           => '[footer-input-bg-color]',
		'default'      => $defaults['footer-input-bg-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-kemet-footer',
	),
	array(
		'id'           => '[footer-input-border-color]',
		'default'      => $defaults['footer-input-border-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-kemet-footer',
	),
);
$group_settings = array(
	'parent_id'  => KEMET_THEME_SETTINGS . '[kmt-footer-widget-input-colors]',
	'type'       => 'kmt-group',
	'label'      => __( 'Input Colors', 'kemet' ),
	'section'    => 'section-kemet-footer',
	'priority'   => 100,
	'settings'   => array(),
	'dependency' => array(
		'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
		'conditions' => '!=',
		'values'     => 'disabled',
	),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Input Field Border Radius
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-input-border-radius]', array(
		'default'           => $defaults['footer-input-border-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-input-border-radius]', array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-kemet-footer',
			'priority'     => 125,
			'label'        => __( 'Input Field Border Radius', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 100,
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
 * Option: Input Field Border Size
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-input-border-size]', array(
		'default'           => $defaults['footer-input-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-input-border-size]', array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-kemet-footer',
			'priority'     => 130,
			'label'        => __( 'Input Field Border Size', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 100,
				),
			),
		)
	)
);
/**
 * Option - Widget Padding
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-widget-input-padding]', array(
		'default'           => $defaults['footer-widget-input-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-widget-input-padding]', array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-kemet-footer',
			'priority'       => 131,
			'label'          => __( 'Padding', 'kemet' ),
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
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[kmt-footer-general-title]', array(
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
		'sanitize_callback' => 'wp_kses',
	)
);
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize, KEMET_THEME_SETTINGS . '[kmt-footer-general-title]', array(
			'type'     => 'kmt-title',
			'label'    => __( 'Footer Widget General Style', 'kemet' ),
			'section'  => 'section-kemet-footer',
			'priority' => 135,
			'settings' => array(),
		)
	)
);
/**
 * Option - Widget Spacing
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-widget-padding]', array(
		'default'           => $defaults['footer-widget-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-widget-padding]', array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-kemet-footer',
			'priority'       => 140,
			'label'          => __( 'Widget Spacing', 'kemet' ),
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
 * Option - Widget Padding
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-inner-widget-padding]', array(
		'default'           => $defaults['footer-inner-widget-padding'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-inner-widget-padding]', array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-kemet-footer',
			'priority'       => 143,
			'label'          => __( 'Widget Padding', 'kemet' ),
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
 * Option: Colors
 */
$fields = array(

	/**
	 * Option - Color
	 */
	array(
		'id'           => '[footer-wgt-bg-color]',
		'default'      => $defaults['footer-wgt-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 1,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[footer-link-color]',
		'default'      => $defaults['footer-link-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[footer-widget-meta-color]',
		'default'      => $defaults['footer-widget-meta-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Meta Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[footer-button-color]',
		'default'      => $defaults['footer-button-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Button Text Color', 'kemet' ),
		'priority'     => 4,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	array(
		'id'           => '[footer-button-bg-color]',
		'default'      => $defaults['footer-button-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Button Background Color', 'kemet' ),
		'priority'     => 5,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Normal', 'kemet' ),
	),
	/**
	 * Option - Hover Color
	 */
	array(
		'id'           => '[footer-link-h-color]',
		'default'      => $defaults['footer-link-h-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Link Color', 'kemet' ),
		'priority'     => 6,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	array(
		'id'           => '[footer-button-h-color]',
		'default'      => $defaults['footer-button-h-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Button Text Color', 'kemet' ),
		'priority'     => 7,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Hover', 'kemet' ),
	),
	array(
		'id'           => '[footer-button-bg-h-color]',
		'default'      => $defaults['footer-button-bg-h-color'],
		'type'         => 'option',
		'control_type' => 'kmt-color',
		'label'        => __( 'Button Background Color', 'kemet' ),
		'priority'     => 8,
		'section'      => 'section-kemet-footer',
		'tab'          => __( 'Hover', 'kemet' ),
	),
);
$group_settings = array(
	'parent_id'  => KEMET_THEME_SETTINGS . '[kmt-footer-widget-buttons-meta-colors]',
	'type'       => 'kmt-group',
	'label'      => __( 'Colors', 'kemet' ),
	'section'    => 'section-kemet-footer',
	'priority'   => 144,
	'settings'   => array(),
	'dependency' => array(
		'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
		'conditions' => '!=',
		'values'     => 'disabled',
	),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
 * Option: Button Radius
 */
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[footer-button-radius]', array(
		'default'           => $defaults['footer-button-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		'dependency'        => array(
			'controls'   => KEMET_THEME_SETTINGS . '[footer-layout]',
			'conditions' => '!=',
			'values'     => 'disabled',
		),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[footer-button-radius]', array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-kemet-footer',
			'priority'     => 180,
			'label'        => __( 'Button Radius', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 100,
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
