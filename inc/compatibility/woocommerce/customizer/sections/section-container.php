<?php
/**
 * Container Options for Kemet theme.
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

add_filter( 'kemet_container_options', 'kemet_woo_container_layout' );

if ( ! function_exists( 'kemet_woo_container_layout' ) ) {

	/**
	 * kemet_woo_container_layout
	 *
	 * @param  array $options
	 * @return array
	 */
	function kemet_woo_container_layout( $options ) {
		$options['woo-container-title']          = array(
			'type'  => 'kmt-title',
			'label' => __( 'Woocommerce', 'kemet' ),
		);
		$options['woocommerce-container-layout'] = array(
			'type'    => 'kmt-select',
			'label'   => __( 'Container for WooCommerce', 'kemet' ),
			'choices' => array(
				'default'                 => __( 'Default', 'kemet' ),
				'boxed-container'         => __( 'Boxed', 'kemet' ),
				'content-boxed-container' => __( 'Content Boxed', 'kemet' ),
				'plain-container'         => __( 'Full Width / Contained', 'kemet' ),
				'page-builder'            => __( 'Full Width / Stretched', 'kemet' ),
			),
		);

		return $options;
	}
}
