 <?php
/**
 * Bottom Footer Options for Kemet Theme.
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
//
//	/**
//	 * Option: Footer Bar Layout
//	 */
//	$wp_customize->add_setting(
//		KEMET_THEME_SETTINGS . '[footer-sml-layout]', array(
//			'default'           => kemet_get_option( 'footer-sml-layout' ),
//			'type'              => 'option',
//			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
//		)
//	);
//	$wp_customize->add_control(
//		new Kemet_Control_Radio_Image(
//			$wp_customize, KEMET_THEME_SETTINGS . '[footer-sml-layout]', array(
//				'type'     => 'kmt-radio-image',
//				'section'  => 'section-topbar-header',
//				'priority' => 5,
//				'label'    => __( 'Footer Bar Layout', 'kemet' ),
//				'choices'  => array(
//					'disabled'            => array(
//						'label' => __( 'Disabled', 'kemet' ),
//						'path'  => KEMET_THEME_URI . 'assets/images/disabled-footer-76x48.png',
//					),
//					'footer-sml-layout-1' => array(
//						'label' => __( 'Footer Bar Layout 1', 'kemet' ),
//						'path'  => KEMET_THEME_URI . 'assets/images/footer-layout-1-76x48.png',
//					),
//					'footer-sml-layout-2' => array(
//						'label' => __( 'Footer Bar Layout 2', 'kemet' ),
//						'path'  => KEMET_THEME_URI . 'assets/images/footer-layout-2-76x48.png',
//					),
//				),
//			)
//		)
//	);
//
//	/**
//	 * Option: Divider
//	 */
//	$wp_customize->add_control(
//		new Kemet_Control_Divider(
//			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-small-footer-layout-info]', array(
//				'type'     => 'kmt-divider',
//				'section'  => 'section-topbar-header',
//				'priority' => 10,
//				'settings' => array(),
//			)
//		)
//	);


	/**
	 *  Section: Section 1
	 */
	/**
	 * Option: Section 1
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-section-1]', array(
			'default'           => kemet_get_option( 'topbar-section-1' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Sortable(
            $wp_customize, KEMET_THEME_SETTINGS . '[topbar-section-1]', array(
			'type'     => 'kmt-sortable',
			'section'  => 'section-topbar-header',
			'priority' => 15,
			'label'    => __( 'Section 1', 'kemet' ),
			'choices'  => array(
					'menu'    => __( 'Menu', 'kemet' ),
					//'custom' => __( 'Custom', 'kemet' ),
					//'widget'    => __( 'Widget', 'kemet' ),
				),
		)
		)
        
	);

	/**
	 * Option: Section 1 Custom Text
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[top-bar-section-1-credit]', array(
			'default'           => kemet_get_option( 'topbar-section-1-credit' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[topbar-section-1-credit]', array(
			'type'     => 'textarea',
			'section'  => 'section-topbar-header',
			'priority' => 20,
			'label'    => __( 'Section 1 Custom Text', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[topbar-section-1-credit]', array(
				'selector'            => '.kmt-topbar-section-1',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_topbar_section_1_credit' ),
			)
		);
	}

	/**
	 * Option: Section 2
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-section-2]', array(
			'default'           => kemet_get_option( 'topbar-section-2' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[topbar-section-2]', array(
			'type'     => 'select',
			'section'  => 'section-topbar-header',
			'priority' => 25,
			'label'    => __( 'Section 2', 'kemet' ),
			'choices'  => array(
				''       => __( 'None', 'kemet' ),
				'menu'   => __( 'Footer Menu', 'kemet' ),
				'custom' => __( 'Custom Text', 'kemet' ),
				'widget' => __( 'Widget', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Section 2 Custom Text
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-section-2-credit]', array(
			'default'           => kemet_get_option( 'top-bar-section-2-credit' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[topbar-section-2-credit]', array(
			'type'     => 'textarea',
			'section'  => 'section-topbar-header',
			'priority' => 30,
			'label'    => __( 'Section 2 Custom Text', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[topbar-section-2-credit]', array(
				'selector'            => '.kmt-topbar-section-2',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_topbar_section_2_credit' ),
			)
		);
	}

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-topbar-typography]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-topbar-header',
				'priority' => 35,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Top Border
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-divider]', array(
			'default'           => kemet_get_option( 'topbar-divider' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[topbar-divider]', array(
			'type'        => 'number',
			'section'     => 'section-topbar-header',
			'priority'    => 40,
			'label'       => __( 'topbar Bar Top Border', 'kemet' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Footer Top Border Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-divider-color]', array(
			'default'           => '#7a7a7a',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, KEMET_THEME_SETTINGS . '[topbardivider-color]', array(
				'section'  => 'section-topbar-header',
				'priority' => 45,
				'label'    => __( 'topbar Bar Top Border Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Header Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[topbar-layout-width]', array(
			'default'           => kemet_get_option( 'topbar-layout-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[topbar-layout-width]', array(
			'type'     => 'select',
			'section'  => 'section-topbar-header',
			'priority' => 35,
			'label'    => __( 'topbar Bar Width', 'kemet' ),
			'choices'  => array(
				'full'    => __( 'Full Width', 'kemet' ),
				'content' => __( 'Content Width', 'kemet' ),
			),
		)
	);



