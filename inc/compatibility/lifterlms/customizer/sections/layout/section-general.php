<?php
/**
 * LifterLMS General Options for our theme.
 *
 * @package     Kemet
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2018, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Course Columns
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[llms-course-grid]', array(
			'default'           => array(
				'desktop' => 3,
				'tablet'  => 2,
				'mobile'  => 1,
			),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[llms-course-grid]', array(
				'type'        => 'kmt-responsive-slider',
				'section'     => 'section-lifterlms',
				'label'       => __( 'Course Columns', 'kemet' ),
				'priority'    => 0,
				'input_attrs' => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 6,
				),
			)
		)
	);

	/**
	 * Option: Membership Columns
	 */
	$wp_customize->add_setting(
		KEMET_THEME_SETTINGS . '[llms-membership-grid]', array(
			'default'           => array(
				'desktop' => 3,
				'tablet'  => 2,
				'mobile'  => 1,
			),
			'type'              => 'option',
			'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
		)
	);
	$wp_customize->add_control(
		new Kemet_Control_Responsive_Slider(
			$wp_customize, KEMET_THEME_SETTINGS . '[llms-membership-grid]', array(
				'type'        => 'kmt-responsive-slider',
				'section'     => 'section-lifterlms',
				'label'       => __( 'Membership Columns', 'kemet' ),
				'priority'    => 0,
				'input_attrs' => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 6,
				),
			)
		)
	);
