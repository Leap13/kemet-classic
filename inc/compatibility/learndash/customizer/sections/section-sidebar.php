<?php
/**
 * Content Spacing Options for our theme.
 *
 * @package     Kemet
 * @author      Leap13
 * @copyright   Copyright (c) 2019, Leap13
 * @link        https://leap13.com/
 * @since       Kemet 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'kemet_sidebar_options', 'kemet_learndash_sidebar' );

if ( ! function_exists( 'kemet_learndash_sidebar' ) ) {

	/**
	 * kemet_learndash_sidebar
	 *
	 * @param  array $options
	 * @return array
	 */
	function kemet_learndash_sidebar( $options ) {
		$options['learndash-sidebar-title']  = array(
			'type'  => 'kmt-title',
			'label' => __( 'LearnDash', 'kemet' ),
		);
		$options['learndash-sidebar-layout'] = array(
			'type'    => 'kmt-select',
			'label'   => __( 'LearnDash', 'kemet' ),
			'choices' => array(
				'default'       => __( 'Default', 'kemet' ),
				'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
				'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
				'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
			),
		);

		return $options;
	}
}
