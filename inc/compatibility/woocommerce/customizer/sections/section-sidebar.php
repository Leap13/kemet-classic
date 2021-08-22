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

add_filter( 'kemet_sidebar_options', 'kemet_woo_sidebar' );

if ( ! function_exists( 'kemet_woo_sidebar' ) ) {

	/**
	 * kemet_woo_sidebar
	 *
	 * @param  array $options
	 * @return array
	 */
	function kemet_woo_sidebar( $options ) {
		$options['woocommerce-sidebar-title']     = array(
			'type'  => 'kmt-title',
			'label' => __( 'Woocommerce', 'kemet' ),
		);
		$options['woocommerce-sidebar-layout']    = array(
			'type'    => 'kmt-select',
			'label'   => __( 'WooCommerce', 'kemet' ),
			'choices' => array(
				'default'       => __( 'Default', 'kemet' ),
				'no-sidebar'    => __( 'No Sidebar', 'kemet' ),
				'left-sidebar'  => __( 'Left Sidebar', 'kemet' ),
				'right-sidebar' => __( 'Right Sidebar', 'kemet' ),
			),
		);
		$options['single-product-sidebar-layout'] = array(
			'type'    => 'kmt-select',
			'label'   => __( 'WooCommerce', 'kemet' ),
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
