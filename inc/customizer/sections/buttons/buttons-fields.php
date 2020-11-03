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
* Option: Blog - Buttons Font Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[buttons-font-size]', array(
        'default'           => $defaults[ 'buttons-font-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[buttons-font-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-buttons-fields',
            'priority'       => 2,
            'label'          => __( 'Buttons Font Size', 'kemet' ),
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
* Option: Colors
*/
$fields = array(
      
    /**
    * Option - Color
    */
      array(
        'id'                => '[button-color]',
        'default'           => $defaults ['button-color'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Text Color', 'kemet' ),
        'priority'          => 1,
        'section'           => 'section-buttons-fields',
        'tab'               => __('Normal' , 'kemet')
    ),  
     /**
    * Option - Background Color
    */
      array(
        'id'                => '[button-bg-color]',
        'default'           => $defaults ['button-bg-color'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Background Color', 'kemet' ),
        'priority'          => 1,
        'section'           => 'section-buttons-fields',
        'tab'               => __('Normal' , 'kemet')
    ),
     /**
    * Option - Color
    */
      array(
        'id'                => '[btn-border-color]',
        'default'           => $defaults ['btn-border-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Color', 'kemet' ),
        'priority'          => 1,
        'section'           => 'section-buttons-fields',
        'tab'               => __('Normal' , 'kemet')
    ),
    /**
    * Option - Hover Color
    */
      array(
        'id'                => '[button-h-color]',
        'default'           => $defaults ['button-h-color'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Text Color', 'kemet' ),
        'priority'          => 2,
        'section'           => 'section-buttons-fields',
        'tab'               => __('Hover' , 'kemet')
    ),  
     /**
    * Option - Background Hover Color
    */
      array(
        'id'                => '[button-bg-h-color]',
        'default'           => $defaults ['button-bg-h-color'] ,
        'type'              => 'option',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Background Color', 'kemet' ),
        'priority'          => 2,
        'section'           => 'section-buttons-fields',
        'tab'               => __('Hover' , 'kemet')
    ),  
     /**
    * Option - Hover Color
    */
      array(
        'id'                => '[btn-border-h-color]',
        'default'           => $defaults ['btn-border-h-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Border Color', 'kemet' ),
        'priority'          => 2,
        'section'           => 'section-buttons-fields',
        'tab'               => __('Hover' , 'kemet')
    ),       
);
$group_settings = array(
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-buttons-colors]',
    'type'     => 'kmt-group',
    'label'    => __( 'Buttons Colors', 'kemet' ),
    'section'  => 'section-buttons-fields',
    'priority' => 5,
    'settings' => array(),
);
new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
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
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-buttons-fields',
            'priority'       => 25,
            'label'          => __( 'Border Radius', 'kemet' ),
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
* Option: Button Border Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[btn-border-size]', array(
        'default'           => $defaults[ 'btn-border-size' ],
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
        'default'           => $defaults[ 'button-spacing' ],
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
* Option: Colors
*/
$fields = array(
      
    /**
    * Option - Color
    */
      array(
        'id'                => '[input-text-color]',
        'default'           => $defaults ['input-text-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Text Color', 'kemet' ),
        'priority'          => 1,
        'section'           => 'section-buttons-fields',
    ),  
     /**
    * Option - Hover Color
    */
      array(
        'id'                => '[input-bg-color]',
        'default'           => $defaults ['input-bg-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Background Color', 'kemet' ),
        'priority'          => 2,
        'section'           => 'section-buttons-fields',
    ),
    /**
    * Option - Hover Color
    */
      array(
        'id'                => '[input-border-color]',
        'default'           => $defaults ['input-border-color'] ,
        'type'              => 'option',
        'transport'         => 'postMessage',
        'control_type'      => 'kmt-color',
        'label'             => __( 'Border Color', 'kemet' ),
        'priority'          => 3,
        'section'           => 'section-buttons-fields',
    ),    
);
$group_settings = array(
    'parent_id'       => KEMET_THEME_SETTINGS . '[kmt-site-buttons-colors]',
    'type'     => 'kmt-group',
    'label'    => __( 'Input Colors', 'kemet' ),
    'section'  => 'section-buttons-fields',
    'priority' => 55,
    'settings' => array(),
);
new Kemet_Generate_Control_Group($wp_customize, $group_settings , $fields);
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
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-buttons-fields',
            'priority'       => 65,
            'label'          => __( 'Border Radius', 'kemet' ),
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
* Option: Input Border Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[input-border-size]', array(
        'default'           => $defaults[ 'input-border-size' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[input-border-size]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-buttons-fields',
            'priority'       => 70,
            'label'          => __( 'Border Size', 'kemet' ),
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
* Option - Button Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[input-spacing]', array(
        'default'           => $defaults[ 'input-spacing' ],
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