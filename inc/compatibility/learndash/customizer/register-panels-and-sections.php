<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Kemet
 * @author      Leap13
 * @copyright   Copyright (c) 2018, Leap13
 * @link        https://leap13.com/
 * @since       1.0.0
 */

/**
 * Section
 */
$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-learndash',
		array(
			'priority' => 65,
			'title'    => __( 'LearnDash', 'kemet' ),
			'panel'    => 'panel-layout',
		)
	)
);
