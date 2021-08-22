<?php
/**
 * WooCommerce Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Woo_Shop_Single_Customizer extends Kemet_Customizer_Register {

	/**
	 * prefix
	 *
	 * @access private
	 * @var string
	 */
	private static $prefix;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$prefix     = 'woo-shop-single';
		$selector         = '';
		$register_options = array(
			self::$prefix . '-disable-breadcrumb' => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Disable Breadcrumb', 'kemet' ),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $register_options,
				),
			),
		);

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_sections = array(
			'section-' . self::$prefix => array(
				'priority' => 25,
				'title'    => __( 'Single Product', 'kemet' ),
				'panel'    => 'woocommerce',
			),
		);

		return array_merge( $sections, $register_sections );

	}
}

new Kemet_Woo_Shop_Single_Customizer();

