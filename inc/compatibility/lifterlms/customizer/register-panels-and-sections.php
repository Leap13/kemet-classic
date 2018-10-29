<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Kemet
 * @author      Leap13
 * @copyright   Copyright (c) 2018, Leap13
 * @link        https://leap13.com/
 * @since       Kemet 1.0.0
 */

	/**
	 * Section
	 */
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-lifterlms',
			array(
				'priority' => 65,
				'title'    => __( 'LifterLMS', 'kemet' ),
				'panel'    => 'panel-layout',
			)
		)
	);
