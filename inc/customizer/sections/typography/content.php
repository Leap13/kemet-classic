<?php
/**
 * Typography Options for Kemet Theme.
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
	 * Option: Heading 1 (H1) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h1]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-content-typo',
				'priority' => 4,
				'label'    => __( 'Heading 1 (H1)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 1 (H1) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h1]', array(
			'default'           => kemet_get_option( 'font-size-h1' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h1]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-content-typo',
				'priority'    => 5,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	/**
	 * Option: Heading 2 (H2) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h2]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-content-typo',
				'priority' => 9,
				'label'    => __( 'Heading 2 (H2)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 2 (H2) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h2]', array(
			'default'           => kemet_get_option( 'font-size-h2' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h2]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-content-typo',
				'priority'    => 10,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	/**
	 * Option: Heading 3 (H3) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h3]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-content-typo',
				'priority' => 14,
				'label'    => __( 'Heading 3 (H3)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 3 (H3) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h3]', array(
			'default'           => kemet_get_option( 'font-size-h3' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h3]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-content-typo',
				'priority'    => 15,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	/**
	 * Option: Heading 4 (H4) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h4]', array(
				'label'    => __( 'Heading 4 (H4)', 'kemet' ),
				'section'  => 'section-content-typo',
				'type'     => 'ast-divider',
				'priority' => 19,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 4 (H4) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h4]', array(
			'default'           => kemet_get_option( 'font-size-h4' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h4]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-content-typo',
				'priority'    => 20,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	/**
	 * Option: Heading 5 (H5) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h5]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-content-typo',
				'priority' => 24,
				'label'    => __( 'Heading 5 (H5)', 'kemet' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 5 (H5) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h5]', array(
			'default'           => kemet_get_option( 'font-size-h5' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h5]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-content-typo',
				'priority'    => 25,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	/**
	 * Option: Heading 6 (H6) Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-h6]', array(
				'label'    => __( 'Heading 6 (H6)', 'kemet' ),
				'section'  => 'section-content-typo',
				'type'     => 'ast-divider',
				'priority' => 29,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading 6 (H6) Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-h6]', array(
			'default'           => kemet_get_option( 'font-size-h6' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-h6]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-content-typo',
				'priority'    => 30,
				'label'       => __( 'Font Size', 'kemet' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	// Learn More link if Kemet Pro is not activated.
	if ( ! defined( 'KEMET_EXT_VER' ) ) {

		/**
		 * Option: Divider
		 */
		$wp_customize->add_control(
			new Kemet_Control_Divider(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-content-typography-more-feature-divider]', array(
					'type'     => 'ast-divider',
					'section'  => 'section-content-typo',
					'priority' => 35,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Contant Typography
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-content-typography-more-feature-description]', array(
					'type'     => 'ast-description',
					'section'  => 'section-content-typo',
					'priority' => 35,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Typography in Kemet Pro!', 'kemet' ) . '</p><a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/typography-module/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
