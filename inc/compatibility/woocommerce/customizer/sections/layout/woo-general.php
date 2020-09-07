<?php
/**
 * WooCommerce General Options for Wiz Theme.
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

/**
 * Option: Title
 */
$wp_customize->add_control(
    new Wiz_Control_Title(
        $wp_customize, WIZ_THEME_SETTINGS . '[wiz-rating-title]', array(
            'type'     => 'wiz-title',
            'label'    => __( 'Rating Style', 'wiz' ),
            'section'  => 'section-woo-general',
            'priority' => 15,
            'settings' => array(),
        )
    )
);
/**
 * Option: Rating color
 */
$wp_customize->add_setting(
    WIZ_THEME_SETTINGS . '[rating-color]', array(
        'default'           => $defaults[ 'rating-color' ],
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Wiz_Customizer_Sanitizes', 'sanitize_hex_color' ),
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize, WIZ_THEME_SETTINGS . '[rating-color]', array(
            'section' => 'section-woo-general',
            'label'   => __( 'Rating color', 'wiz' ),
            'priority'=> 15,
        )
    )
);