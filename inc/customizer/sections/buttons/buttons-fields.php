<?php
/**
 * Buttons for Kemet Theme.
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
		$wp_customize, KEMET_THEME_SETTINGS . '[kmt-buttons]', array(
			'type'     => 'kmt-title',
			'label'    => __( 'Buttons Style', 'kemet' ),
			'section'  => 'section-buttons-fields',
			'priority' => 1,
			'settings' => array(),
		)
	)
);
/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Title Font Size
	*/
	  array(
		  'id'           => '[buttons-font-size]',
		  'default'      => $defaults ['buttons-font-size'],
		  'type'         => 'option',
		  'transport'    => 'postMessage',
		  'control_type' => 'kmt-responsive-slider',
		  'section'      => 'section-buttons-fields',
		  'priority'     => 1,
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
	   'id'           => '[buttons-font-family]',
	   'default'      => $defaults['buttons-font-family'],
	   'type'         => 'option',
	   'control_type' => 'kmt-font-family',
	   'label'        => __( 'Font Family', 'kemet' ),
	   'section'      => 'section-buttons-fields',
	   'priority'     => 3,
	   'connect'      => KEMET_THEME_SETTINGS . '[buttons-font-weight]',
   ),
	/**
	* Option: Font Weight
	*/
   array(
	   'id'           => '[buttons-font-weight]',
	   'default'      => $defaults['buttons-font-weight'],
	   'type'         => 'option',
	   'control_type' => 'kmt-font-weight',
	   'label'        => __( 'Font Weight', 'kemet' ),
	   'section'      => 'section-buttons-fields',
	   'priority'     => 4,
	   'connect'      => KEMET_THEME_SETTINGS . '[buttons-font-family]',
   ),
	/**
	* Option: Buttons Text Transform
	*/
	array(
		'id'           => '[buttons-text-transform]',
		'default'      => $defaults['buttons-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-buttons-fields',
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
	* Option: Buttons Font Style
	*/
	array(
		'id'           => '[buttons-font-style]',
		'default'      => $defaults['buttons-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-buttons-fields',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: Buttons Line Height
	*/
	  array(
		  'id'           => '[buttons-line-height]',
		  'default'      => $defaults ['buttons-line-height'],
		  'type'         => 'option',
		  'control_type' => 'kmt-responsive-slider',
		  'section'      => 'section-buttons-fields',
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
	* Option: Buttons Letter Spacing
	*/
	array(
		'id'           => '[buttons-letter-spacing]',
		'default'      => $defaults ['buttons-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-buttons-fields',
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
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-buttons-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-buttons-fields',
	'priority'  => 5,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Blog - Buttons Font Size
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[buttons-font-size]', array(
		'default'           => $defaults['buttons-font-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
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
		  'id'           => '[button-color]',
		  'default'      => $defaults ['button-color'],
		  'type'         => 'option',
		  'control_type' => 'kmt-color',
		  'label'        => __( 'Text Color', 'kemet' ),
		  'priority'     => 1,
		  'section'      => 'section-buttons-fields',
		  'tab'          => __( 'Normal', 'kemet' ),
	  ),
	/**
		* Option - Background Color
		*/
		  array(
			  'id'           => '[button-bg-color]',
			  'default'      => $defaults ['button-bg-color'],
			  'type'         => 'option',
			  'control_type' => 'kmt-color',
			  'label'        => __( 'Background Color', 'kemet' ),
			  'priority'     => 1,
			  'section'      => 'section-buttons-fields',
			  'tab'          => __( 'Normal', 'kemet' ),
		  ),
	/**
	* Option - Color
	*/
	  array(
		  'id'           => '[btn-border-color]',
		  'default'      => $defaults ['btn-border-color'],
		  'type'         => 'option',
		  'transport'    => 'postMessage',
		  'control_type' => 'kmt-color',
		  'label'        => __( 'Border Color', 'kemet' ),
		  'priority'     => 1,
		  'section'      => 'section-buttons-fields',
		  'tab'          => __( 'Normal', 'kemet' ),
	  ),
	/**
	* Option - Hover Color
	*/
	  array(
		  'id'           => '[button-h-color]',
		  'default'      => $defaults ['button-h-color'],
		  'type'         => 'option',
		  'control_type' => 'kmt-color',
		  'label'        => __( 'Text Color', 'kemet' ),
		  'priority'     => 2,
		  'section'      => 'section-buttons-fields',
		  'tab'          => __( 'Hover', 'kemet' ),
	  ),
	/**
		* Option - Background Hover Color
		*/
		  array(
			  'id'           => '[button-bg-h-color]',
			  'default'      => $defaults ['button-bg-h-color'],
			  'type'         => 'option',
			  'control_type' => 'kmt-color',
			  'label'        => __( 'Background Color', 'kemet' ),
			  'priority'     => 2,
			  'section'      => 'section-buttons-fields',
			  'tab'          => __( 'Hover', 'kemet' ),
		  ),
	/**
		* Option - Hover Color
		*/
		  array(
			  'id'           => '[btn-border-h-color]',
			  'default'      => $defaults ['btn-border-h-color'],
			  'type'         => 'option',
			  'transport'    => 'postMessage',
			  'control_type' => 'kmt-color',
			  'label'        => __( 'Border Color', 'kemet' ),
			  'priority'     => 2,
			  'section'      => 'section-buttons-fields',
			  'tab'          => __( 'Hover', 'kemet' ),
		  ),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-buttons-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Buttons Colors', 'kemet' ),
	'section'   => 'section-buttons-fields',
	'priority'  => 5,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Button Radius
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[button-radius]', array(
		'default'           => $defaults['button-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[button-radius]', array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-buttons-fields',
			'priority'     => 25,
			'label'        => __( 'Border Radius', 'kemet' ),
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
* Option: Button Border Size
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[btn-border-size]', array(
		'default'           => $defaults['btn-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[btn-border-size]', array(
			'type'        => 'kmt-slider',
			'section'     => 'section-buttons-fields',
			'priority'    => 30,
			'label'       => __( 'Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	)
);
/**
* Option - Button Spacing
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[button-spacing]', array(
		'default'           => $defaults['button-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize, KEMET_THEME_SETTINGS . '[button-spacing]', array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-buttons-fields',
			'priority'       => 45,
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
$wp_customize->add_control(
	new Kemet_Control_Title(
		$wp_customize, KEMET_THEME_SETTINGS . '[kmt-input-color]', array(
			'type'     => 'kmt-title',
			'label'    => __( 'Input Fields Style', 'kemet' ),
			'section'  => 'section-buttons-fields',
			'priority' => 50,
			'settings' => array(),
		)
	)
);
/**
* Option: Typography
*/
$fields = array(
	/**
	* Option: Title Font Size
	*/
	  array(
		  'id'           => '[inputs-font-size]',
		  'default'      => $defaults ['inputs-font-size'],
		  'type'         => 'option',
		  'transport'    => 'postMessage',
		  'control_type' => 'kmt-responsive-slider',
		  'section'      => 'section-buttons-fields',
		  'priority'     => 1,
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
	   'id'           => '[inputs-font-family]',
	   'default'      => $defaults['inputs-font-family'],
	   'type'         => 'option',
	   'control_type' => 'kmt-font-family',
	   'label'        => __( 'Font Family', 'kemet' ),
	   'section'      => 'section-buttons-fields',
	   'priority'     => 3,
	   'connect'      => KEMET_THEME_SETTINGS . '[inputs-font-weight]',
   ),
	/**
	* Option: Font Weight
	*/
   array(
	   'id'           => '[inputs-font-weight]',
	   'default'      => $defaults['inputs-font-weight'],
	   'type'         => 'option',
	   'control_type' => 'kmt-font-weight',
	   'label'        => __( 'Font Weight', 'kemet' ),
	   'section'      => 'section-buttons-fields',
	   'priority'     => 4,
	   'connect'      => KEMET_THEME_SETTINGS . '[inputs-font-family]',
   ),
	/**
	* Option: inputs Text Transform
	*/
	array(
		'id'           => '[inputs-text-transform]',
		'default'      => $defaults['inputs-text-transform'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Text Transform', 'kemet' ),
		'section'      => 'section-buttons-fields',
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
	* Option: inputs Font Style
	*/
	array(
		'id'           => '[inputs-font-style]',
		'default'      => $defaults['inputs-font-style'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-select',
		'label'        => __( 'Font Style', 'kemet' ),
		'section'      => 'section-buttons-fields',
		'priority'     => 5,
		'choices'      => array(
			'inherit' => __( 'Inherit', 'kemet' ),
			'normal'  => __( 'Normal', 'kemet' ),
			'italic'  => __( 'Italic', 'kemet' ),
			'oblique' => __( 'Oblique', 'kemet' ),
		),
	),
	/**
	* Option: inputs Line Height
	*/
	  array(
		  'id'           => '[inputs-line-height]',
		  'default'      => $defaults ['inputs-line-height'],
		  'type'         => 'option',
		  'control_type' => 'kmt-responsive-slider',
		  'section'      => 'section-buttons-fields',
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
	* Option: inputs Letter Spacing
	*/
	array(
		'id'           => '[inputs-letter-spacing]',
		'default'      => $defaults ['inputs-letter-spacing'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-responsive-slider',
		'section'      => 'section-buttons-fields',
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
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-inputs-typography]',
	'type'      => 'kmt-group',
	'label'     => __( 'Typography', 'kemet' ),
	'section'   => 'section-buttons-fields',
	'priority'  => 51,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Colors
*/
$fields         = array(

	/**
	* Option - Color
	*/
	  array(
		  'id'           => '[input-text-color]',
		  'default'      => $defaults ['input-text-color'],
		  'type'         => 'option',
		  'transport'    => 'postMessage',
		  'control_type' => 'kmt-color',
		  'label'        => __( 'Text Color', 'kemet' ),
		  'priority'     => 1,
		  'section'      => 'section-buttons-fields',
	  ),
	array(
		'id'           => '[input-bg-color]',
		'default'      => $defaults ['input-bg-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Background Color', 'kemet' ),
		'priority'     => 2,
		'section'      => 'section-buttons-fields',
	),
	array(
		'id'           => '[input-border-color]',
		'default'      => $defaults ['input-border-color'],
		'type'         => 'option',
		'transport'    => 'postMessage',
		'control_type' => 'kmt-color',
		'label'        => __( 'Border Color', 'kemet' ),
		'priority'     => 3,
		'section'      => 'section-buttons-fields',
	),
);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-site-input-colors]',
	'type'      => 'kmt-group',
	'label'     => __( 'Input Colors', 'kemet' ),
	'section'   => 'section-buttons-fields',
	'priority'  => 55,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
/**
* Option: Input Radius
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[input-radius]', array(
		'default'           => $defaults['input-radius'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[input-radius]', array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-buttons-fields',
			'priority'     => 65,
			'label'        => __( 'Border Radius', 'kemet' ),
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
* Option: Input Border Size
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[input-border-size]', array(
		'default'           => $defaults['input-border-size'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Slider(
		$wp_customize, KEMET_THEME_SETTINGS . '[input-border-size]', array(
			'type'         => 'kmt-responsive-slider',
			'section'      => 'section-buttons-fields',
			'priority'     => 70,
			'label'        => __( 'Border Size', 'kemet' ),
			'unit_choices' => array(
				'px' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 100,
				),
			),
		)
	)
);

/**
* Option - Button Spacing
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[input-spacing]', array(
		'default'           => $defaults['input-spacing'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
	)
);
$wp_customize->add_control(
	new Kemet_Control_Responsive_Spacing(
		$wp_customize, KEMET_THEME_SETTINGS . '[input-spacing]', array(
			'type'           => 'kmt-responsive-spacing',
			'section'        => 'section-buttons-fields',
			'priority'       => 85,
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
