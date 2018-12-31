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
	 * Option: Button Background Color
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