<?php
/**
 * sidebar Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
* Option: Divider
*/
$wp_customize->add_control(
    new Kemet_Control_Divider(
    $wp_customize, KEMET_THEME_SETTINGS . '[divider-section-widgets-width]', array(
    'section' => 'section-widgets',
    'type' => 'kmt-divider',
    'priority' => 1,
    'settings' => array(),
    )
    )
    );
    /**
	 * Option: Widget Background Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[Widget-bg-color]', array(
			'default'           => '',
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[Widget-bg-color]', array(
                'priority'       => 2,
                'section' => 'section-widgets',
				'label'   => __( 'Widget Background Color', 'kemet' ),
			)
		)
    );
    /**
    * Option - widget Spacing
    */
   $wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[widget-padding]', array(
        'default'           => kemet_get_option( 'widget-padding' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Spacing(
        $wp_customize, KEMET_THEME_SETTINGS . '[widget-padding]', array(
            'type'           => 'kmt-responsive-spacing',
            'section'        => 'section-widgets',
            'priority'       => 3,
            'label'          => __( 'widget Padding', 'kemet' ),
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
	 * Option: widget Margin Bottom
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-margin-bottom]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-margin-bottom]', array(
				'type'        => 'kmt-slider',
				'section'     => 'section-widgets',
				'priority'    => 4,
				'label'       => __( 'Widget Margin Bottom', 'kemet' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 0.5,
					'step' => 0.01,
					'max'  => 5,
				),
			)
		)
    );
    /**
	 * Option: Widget Font Family
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-font-family]', array(
			'default'           => kemet_get_option( 'widget-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-font-family]', array(
				'type'        => 'kmt-font-family',
				'kmt_inherit' => __( 'Default System Font', 'kemet' ),
				'section'     => 'section-widgets',
				'priority'    => 5,
				'label'       => __( 'Widget Title Font Family', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[widget-font-weight]',
			)
		)
	);

	/**
	 * Option: Widget Font Weight
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-font-weight]', array(
			'default'           => kemet_get_option( 'widget-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Typography(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-font-weight]', array(
				'type'        => 'kmt-font-weight',
				'kmt_inherit' => __( 'Default', 'kemet' ),
				'section'     => 'section-widgets',
				'priority'    => 6,
				'label'       => __( 'Font Weight Title', 'kemet' ),
				'connect'     => KEMET_THEME_SETTINGS . '[widget-font-family]',
			)
		)
	);

	/**
	 * Option: Widget Text Transform
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-text-transform]', array(
			'default'           => kemet_get_option( 'widget-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[widget-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-widgets',
			'priority' => 7,
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
	 * Option: widget Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-font-size]', array(
			'default'           => kemet_get_option( 'widget-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-font-size]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-widgets',
				'priority'    => 8,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
    );
    /**
         * Option: widget Line Height
         */
        $wp_customize->add_setting(
            KEMET_THEME_SETTINGS . '[widget-line-height]', array(
                'default'           => '',
                'type'              => 'option',
                'transport'         => 'postMessage',
                'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
            )
        );
        $wp_customize->add_control(
            new Kemet_Control_Slider(
                $wp_customize, KEMET_THEME_SETTINGS . '[widget-line-height]', array(
                    'type'        => 'kmt-slider',
                    'section'     => 'section-widgets',
                    'priority'    => 9,
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
      * Option:Widget Title Color
      */
      $wp_customize->add_setting(
        KEMET_THEME_SETTINGS . '[widget-title-color]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'postMessage',
            'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, KEMET_THEME_SETTINGS . '[widget-title-color]', array(
                'label'   => __( 'Widget Title Color', 'kemet' ),
                'priority'       => 10,
                'section' => 'section-widgets',
            )
        )
    );
    /**
	 * Option: Widget Border Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-border-size]', array(
			'default'           => kemet_get_option( 'widget-border-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[widget-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-widgets',
			'priority'    => 11,
			'label'       => __( 'Widget Border Size', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Widget Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[widget-border-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[widget-border-color]', array(
				'section'  => 'section-widgets',
				'priority' => 12,
				'label'    => __( 'Widget Border Color', 'kemet' ),
			)
		)
	);
