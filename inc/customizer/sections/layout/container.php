<?php
/**
 * General Options for Kemet Theme.
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
			$wp_customize, KEMET_THEME_SETTINGS . '[site-content-layout-divider]', array(
				'type'     => 'kmt-divider',
				'priority' => 50,
				'section'  => 'section-container-layout',
				'settings' => array(),
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
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-container-more-feature-divider]', array(
					'type'     => 'kmt-divider',
					'section'  => 'section-container-layout',
					'priority' => 70,
					'settings' => array(),
				)
			)
		);
		/**
		 * Option: Learn More about Container
		 */
		$wp_customize->add_control(
			new Kemet_Control_Description(
				$wp_customize, KEMET_THEME_SETTINGS . '[kmt-container-more-feature-description]', array(
					'type'     => 'kmt-description',
					'section'  => 'section-container-layout',
					'priority' => 70,
					'label'    => '',
					'help'     => '<p>' . __( 'More Options Available for Container in Kemet Pro!', 'kemet' ) . '</p><a href="' . kemet_get_pro_url( 'https://wpkemet.com/docs/site-layout-overview/', 'customizer', 'learn-more', 'upgrade-to-pro' ) . '" class="button button-primary"  target="_blank" rel="noopener">' . __( 'Learn More', 'kemet' ) . '</a>',
					'settings' => array(),
				)
			)
		);
	}