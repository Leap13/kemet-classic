<?php
/**
* Header Options for Kemet Theme.
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
    /**
     * Get WP menus
     *
     * @since 1.3.7
     */
    function get_wp_menus() {
        $menus 		= array( esc_html__( 'Select Your Menu', 'oceanwp' ) );
        $get_menus 	= get_terms( 'nav_menu', array( 'hide_empty' => true ) );
        foreach ( $get_menus as $menu) {
            $menus[$menu->term_id] = $menu->name;
        }
        return $menus;
    }
/**
* Option: Header Layout
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[header-layouts]', array(
        'default'           => kemet_get_option( 'header-layouts' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
    )
);

$wp_customize->add_control(
    new Kemet_Control_Radio_Image(
        $wp_customize, KEMET_THEME_SETTINGS . '[header-layouts]', array(
            'section'  => 'section-header',
            'priority' => 5,
            'label'    => __( 'Header Layout', 'kemet' ),
            'type'     => 'kmt-radio-image',
            'choices'  => array(
                'header-main-layout-1' => array(
                    'label' => __( 'Header 1', 'kemet' ),
                    'path'  => KEMET_THEME_URI . 'assets/images/header-layout-01.png',
                ),
                'header-main-layout-2' => array(
                    'label' => __( 'Header 2', 'kemet' ),
                    'path'  => KEMET_THEME_URI . 'assets/images/header-layout-02.png',
                ),
                'header-main-layout-3' => array(
                    'label' => __( 'Header 3', 'kemet' ),
                    'path'  => KEMET_THEME_URI . 'assets/images/header-layout-03.png',
                ),
                'header-main-layout-4' => array(
                    'label' => __( 'Header 4', 'kemet' ),
                    'path'  => KEMET_THEME_URI . 'assets/images/header-layout-04.png',
                ),
            ),
        )
    )
);
/**
* Option: Header 3 Right Section
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[header-right-section]', array(
		'default'           => kemet_get_option( 'header-right-section' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[header-right-section]', array(
        'type'     => 'select',
        'section'  => 'section-header',
        'priority' => 7,
        'label'    => __( 'Right Section Content', 'kemet' ),
        'choices'  => array(
            'none'    => __( 'None', 'kemet' ),
            'search'    => __( 'Search', 'kemet' ),
            'menu' => __( 'Menu', 'kemet' ),
            'widget'    => __( 'Widget', 'kemet' ),
        ),
    )
);
/**
* Option: Right Section Menu
*/
$wp_customize->add_setting(
	KEMET_THEME_SETTINGS . '[header-right-section-menu]', array(
		'default'           => kemet_get_option( 'header-right-section-menu' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
    KEMET_THEME_SETTINGS . '[header-right-section-menu]', array(
        'type'     => 'select',
        'section'  => 'section-header',
        'priority' => 7,
        'label'    => __( 'Right Section Menu', 'kemet' ),
        'choices'  => get_wp_menus(),
    )
);

/**
* Option: header Background
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[header-bg-obj]', array(
        'default'           => kemet_get_option('header-bg-obj'),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Background(
        $wp_customize, KEMET_THEME_SETTINGS . '[header-bg-obj]', array(
            'type'    => 'kmt-background',
            'section' => 'section-header',
            'priority' => 20,
            'label'   => __( 'Header Background', 'kemet' ),
        )
    )
);
/**
* Option - header Spacing
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[header-padding]', array(
        'default'           => kemet_get_option( 'header-padding' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Spacing(
        $wp_customize, KEMET_THEME_SETTINGS . '[header-padding]', array(
            'type'           => 'kmt-responsive-spacing',
            'section'        => 'section-header',
            'priority'       => 25,
            'label'          => __( 'Header Spacing', 'kemet' ),
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

// if ( isset( $wp_customize->selective_refresh ) ) {
// 	$wp_customize->selective_refresh->add_partial(
// 		KEMET_THEME_SETTINGS . '[header-main-rt-section-html]', array(
// 			'selector'            => '.main-header-bar .kmt-sitehead-custom-menu-items .kmt-custom-html',
// 			'container_inclusive' => false,
// 			'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_header_main_rt_section_html' ),
// 		 )
// 	 );
// }

/**
* Option: Bottom Border Size
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[header-main-sep]', array(
        'default'           => '',
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Responsive_Slider(
        $wp_customize, KEMET_THEME_SETTINGS . '[header-main-sep]', array(
            'type'           => 'kmt-responsive-slider',
            'section'        => 'section-header',
            'priority'       => 30,
            'label'          => __( 'Bottom Border Size', 'kemet' ),
            'unit_choices'   => array(
                'px' => array(
                    'min' => 1,
                    'step' => 1,
                    'max' => 15,
                ),
            ),
        )
    )
);
/**
* Option: Border Color
*/
$wp_customize->add_setting(
    KEMET_THEME_SETTINGS . '[header-main-sep-color]', array(
        'default'           => kemet_get_option( 'header-main-sep-color' ),
        'type'              => 'option',
        'transport'         => 'postMessage',
        'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
    )
);
$wp_customize->add_control(
    new Kemet_Control_Color(
        $wp_customize, KEMET_THEME_SETTINGS . '[header-main-sep-color]', array(
            'section'  => 'section-header',
            'priority' => 35,
            'label'    => __( 'Border Color', 'kemet' ),
        )
    )
);