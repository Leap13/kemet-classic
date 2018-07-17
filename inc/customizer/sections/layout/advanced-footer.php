<?php
/**
 * Bottom Footer Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpastra.com/
 * @since       Kemet 1.0.12
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Footer Widgets Layout Layout
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[footer-adv]', array(
			'default'           => astra_get_option( 'footer-adv' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new Kemet_Control_Radio_Image(
			$wp_customize, KEMET_THEME_SETTINGS . '[footer-adv]', array(
				'type'    => 'ast-radio-image',
				'label'   => __( 'Footer Widgets Layout', 'astra' ),
				'section' => 'section-footer-adv',
				'choices' => array(
					'disabled' => array(
						'label' => __( 'Disable', 'astra' ),
						'path'  => KEMET_THEME_URI . '/assets/images/no-adv-footer-115x48.png',
					),
					'layout-4' => array(
						'label' => __( 'Layout 4', 'astra' ),
						'path'  => KEMET_THEME_URI . '/assets/images/layout-4-115x48.png',
					),
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
				$wp_customize, KEMET_THEME_SETTINGS . '[ast-footer-widget-more-feature-divider]', array(
					'type'     => 'ast-divider',
					'section'  => 'section-footer-adv',
					'priority' => 20,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Footer Widget
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[ast-footer-widget-more-feature-description]', array(
					'type'     => 'ast-description',
					'section'  => 'section-footer-adv',
					'priority' => 20,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Footer Widgets in Kemet Pro!', 'astra' ) . '</p><a href="' . astra_get_pro_url( 'https://wpastra.com/docs/footer-widgets-astra-pro/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'astra' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}
