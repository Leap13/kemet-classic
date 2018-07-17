<?php
/**
 * Site Identity Typography Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpastra.com/
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
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-header-typo-title]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-header-typo',
				'priority' => 5,
				'label'    => __( 'Site Title', 'astra' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Site Title Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-site-title]', array(
			'default'           => astra_get_option( 'font-size-site-title' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-site-title]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-header-typo',
				'priority'    => 10,
				'label'       => __( 'Font Size', 'astra' ),
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
	 * Divider
	 */
	$wp_customize->add_control(
		new Kemet_Control_Divider(
			$wp_customize, KEMET_THEME_SETTINGS . '[divider-section-header-typo-tagline]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-header-typo',
				'priority' => 15,
				'label'    => __( 'Site Tagline', 'astra' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Site Tagline Font Size
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[font-size-site-tagline]', array(
			'default'           => astra_get_option( 'font-size-site-tagline' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive(
			$wp_customize, KEMET_THEME_SETTINGS . '[font-size-site-tagline]', array(
				'type'        => 'ast-responsive',
				'section'     => 'section-header-typo',
				'priority'    => 20,
				'label'       => __( 'Font Size', 'astra' ),
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
				$wp_customize, KEMET_THEME_SETTINGS . '[ast-header-typography-more-feature-divider]', array(
					'type'     => 'ast-divider',
					'section'  => 'section-header-typo',
					'priority' => 25,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Typography
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[ast-header-typography-more-feature-description]', array(
					'type'     => 'ast-description',
					'section'  => 'section-header-typo',
					'priority' => 25,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Typography in Kemet Pro!', 'astra' ) . '</p><a href="' . astra_get_pro_url( 'https://wpastra.com/docs/typography-module/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'astra' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}

