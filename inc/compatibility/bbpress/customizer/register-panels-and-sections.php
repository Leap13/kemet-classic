<?php
/**
 * Register customizer panels & sections for Learndash.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Learndash Section
 */
$wp_customize->add_section(
	'section-learndash-fields',
	array(
		'priority' => 80,
		'title'    => __( 'LearnDash', 'kemet' ),
	)
);


