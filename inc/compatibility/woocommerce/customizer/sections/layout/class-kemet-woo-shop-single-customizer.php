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
		self::$prefix     = 'woo-single';
		$selector         = '';
		$register_options = array(
			self::$prefix . '-disable-breadcrumb'       => array(
				'type'    => 'kmt-switcher',
				'default' => false,
				'label'   => __( 'Disable Breadcrumb', 'kemet' ),
			),
			self::$prefix . '-enable-navigation'        => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Enable Product Navigation', 'kemet' ),
			),
			self::$prefix . '-gallery-style'            => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Gallery Style', 'kemet' ),
				'choices' => array(
					'horizontal' => __( 'Below Product Image', 'kemet' ),
					'vertical'   => __( 'Beside Product Image', 'kemet' ),
				),
			),
			self::$prefix . '-image-width'              => array(
				'type'         => 'kmt-slider',
				'label'        => __( 'Image Width', 'kemet' ),
				'unit_choices' => array(
					'%' => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 100,
					),
				),
			),
			self::$prefix . '-related-products'         => array(
				'type'  => 'kmt-title',
				'label' => __( 'Related Products Settings', 'kemet' ),
			),
			self::$prefix . '-disable-related-products' => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Disable Related Products', 'kemet' ),
			),
			self::$prefix . '-related-products-count'   => array(
				'type'    => 'kmt-number',
				'label'   => __( 'Related Products Count', 'kemet' ),
				'min'     => 1,
				'step'    => 1,
				'max'     => 100,
				'context' => array(
					array(
						'setting' => self::$prefix . '-disable-related-products',
						'value'   => false,
					),
				),
			),
			self::$prefix . '-related-products-columns' => array(
				'type'    => 'kmt-radio',
				'label'   => __( 'Related Products Columns', 'kemet' ),
				'choices' => array(
					'1' => __( '1', 'kemet' ),
					'2' => __( '2', 'kemet' ),
					'3' => __( '3', 'kemet' ),
					'4' => __( '4', 'kemet' ),
					'5' => __( '5', 'kemet' ),
					'6' => __( '6', 'kemet' ),
				),
				'context' => array(
					array(
						'setting' => self::$prefix . '-disable-related-products',
						'value'   => false,
					),
				),
			),
			self::$prefix . '-up-sell-products'         => array(
				'type'  => 'kmt-title',
				'label' => __( 'Related Products Settings', 'kemet' ),
			),
			self::$prefix . '-disable-up-sell-products' => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Disable Related Products', 'kemet' ),
			),
			self::$prefix . '-up-sell-products-count'   => array(
				'type'    => 'kmt-number',
				'label'   => __( 'Related Products Count', 'kemet' ),
				'min'     => 1,
				'step'    => 1,
				'max'     => 100,
				'context' => array(
					array(
						'setting' => self::$prefix . '-disable-up-sell-products',
						'value'   => false,
					),
				),
			),
			self::$prefix . '-up-sell-products-columns' => array(
				'type'    => 'kmt-radio',
				'label'   => __( 'Related Products Columns', 'kemet' ),
				'choices' => array(
					'1' => __( '1', 'kemet' ),
					'2' => __( '2', 'kemet' ),
					'3' => __( '3', 'kemet' ),
					'4' => __( '4', 'kemet' ),
					'5' => __( '5', 'kemet' ),
					'6' => __( '6', 'kemet' ),
				),
				'context' => array(
					array(
						'setting' => self::$prefix . '-disable-up-sell-products',
						'value'   => false,
					),
				),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => apply_filters( 'woo_shop_single_options', $register_options ),
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

