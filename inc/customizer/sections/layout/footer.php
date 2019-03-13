<?php
/**
 * Bottom Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Footer Bar Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[copyright-footer-layout]', array(
			'default'           => kemet_get_option( 'copyright-footer-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Radio_Image(
			$wp_customize, KEMET_THEME_SETTINGS . '[copyright-footer-layout]', array(
				'type'     => 'kmt-radio-image',
				'section'  => 'section-footer-copyright',
				'priority' => 5,
				'label'    => __( 'Footer Bar Layout', 'kemet' ),
				'choices'  => array(
					'disabled'            => array(
						'label' => __( 'Disabled', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/disable-copyright-area.png',
					),
					'copyright-footer-layout-1' => array(
						'label' => __( 'Footer Bar Layout 1', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/copyright-area-layout-1.png',
					),
					'copyright-footer-layout-2' => array(
						'label' => __( 'Footer Bar Layout 2', 'kemet' ),
						'path'  => KEMET_THEME_URI . 'assets/images/copyright-area-layout-2.png',
					),
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-footer-copyright-layout-info]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-footer-copyright',
				'priority' => 10,
				'settings' => array(),
			)
		)
	);


	/**
	 *  Section: Section 1
	 */
	/**
	 * Option: Section 1
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-1]', array(
			'default'           => kemet_get_option( 'footer-copyright-section-1' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-1]', array(
			'type'     => 'select',
			'section'  => 'section-footer-copyright',
			'priority' => 15,
			'label'    => __( 'Section 1', 'kemet' ),
			'choices'  => array(
				''       => __( 'None', 'kemet' ),
				'menu'   => __( 'Footer Menu', 'kemet' ),
				'custom' => __( 'Custom Text', 'kemet' ),
				'widget' => __( 'Widget', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Section 1 Custom Text
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-1-credit]', array(
			'default'           => kemet_get_option( 'footer-copyright-section-1-credit' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-1-credit]', array(
			'type'     => 'textarea',
			'section'  => 'section-footer-copyright',
			'priority' => 20,
			'label'    => __( 'Section 1 Custom Text', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[footer-copyright-section-1-credit]', array(
				'selector'            => '.kmt-footer-copyright-section-1',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_footer_sml_section_1_credit' ),
			)
		);
	}

	/**
	 * Option: Section 2
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-2]', array(
			'default'           => kemet_get_option( 'footer-copyright-section-2' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-2]', array(
			'type'     => 'select',
			'section'  => 'section-footer-copyright',
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
		KEMET_THEME_SETTINGS . '[footer-copyright-section-2-credit]', array(
			'default'           => kemet_get_option( 'footer-copyright-section-2-credit' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-copyright-section-2-credit]', array(
			'type'     => 'textarea',
			'section'  => 'section-footer-copyright',
			'priority' => 30,
			'label'    => __( 'Section 2 Custom Text', 'kemet' ),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			KEMET_THEME_SETTINGS . '[footer-copyright-section-2-credit]', array(
				'selector'            => '.kmt-footer-copyright-section-2',
				'container_inclusive' => false,
				'render_callback'     => array( 'Kemet_Customizer_Partials', '_render_footer_sml_section_2_credit' ),
			)
		);
	}

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[section-kmt-footer-copyright-typography]', array(
				'type'     => 'kmt-divider',
				'section'  => 'section-footer-copyright',
				'priority' => 35,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Top Border
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-copyright-divider]', array(
			'default'           => kemet_get_option( 'footer-copyright-divider' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-copyright-divider]', array(
			'type'        => 'number',
			'section'     => 'section-footer-copyright',
			'priority'    => 40,
			'label'       => __( 'Footer Bar Top Border', 'kemet' ),
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
		KEMET_THEME_SETTINGS . '[footer-copyright-divider-color]', array(
			'default'           => '#7a7a7a',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-copyright-divider-color]', array(
				'section'  => 'section-footer-copyright',
				'priority' => 45,
				'label'    => __( 'Footer Bar Top Border Color', 'kemet' ),
			)
		)
	);

	/**
	 * Option: Header Width
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-layout-width]', array(
			'default'           => kemet_get_option( 'footer-layout-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		KEMET_THEME_SETTINGS . '[footer-layout-width]', array(
			'type'     => 'select',
			'section'  => 'section-footer-copyright',
			'priority' => 35,
			'label'    => __( 'Footer Bar Width', 'kemet' ),
			'choices'  => array(
				'full'    => __( 'Full Width', 'kemet' ),
				'content' => __( 'Content Width', 'kemet' ),
			),
		)
	);

	/**
	 * Option: Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-color]', array(
				'label'   => __( 'Text Color', 'kemet' ),
				'section' => 'section-footer-copyright',
				'priority' => 36,
			)
		)
	);

	/**
	* Option: Footer Font Size
	*/
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-copyright-font-size]', array(
			'default'           => kemet_get_option( 'footer-copyright-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-copyright-font-size]', array(
				'type'        => 'kmt-responsive',
				'section'     => 'section-footer-copyright',
				'priority'    => 40,
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
	 * Option: Link Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-link-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-link-color]', array(
				'label'   => __( 'Link Color', 'kemet' ),
				'section' => 'section-footer-copyright',
			)
		)
	);

	/**
	 * Option: Link Hover Color
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-link-h-color]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Color(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-link-h-color]', array(
				'label'   => __( 'Link Hover Color', 'kemet' ),
				'section' => 'section-footer-copyright',
				'priority' => 37,
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-footer-image]', array(
				'section'  => 'section-footer-copyright',
				'priority' => 38,
				'type'     => 'kmt-divider',
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Background
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-bg-obj]', array(
			'default'           => kemet_get_option( 'footer-bg-obj' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_background_obj' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Background(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-bg-obj]', array(
				'type'    => 'kmt-background',
				'section' => 'section-footer-copyright',
				'priority' => 39,
				'label'   => __( 'Background', 'kemet' ),
			)
		)
	);
