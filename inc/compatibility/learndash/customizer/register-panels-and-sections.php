<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Kemet
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2018, Brainstorm Force
 * @link        http://www.brainstormforce.com
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
