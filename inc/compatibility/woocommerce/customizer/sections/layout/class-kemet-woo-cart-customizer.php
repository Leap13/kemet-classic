<?php
/**
 * Woocommerce cart item options
 *
 * @package Kemet
 */

class Kemet_Woo_Cart_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'woo-cart';
		$selector         = '';
		$register_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'shop-cart-icon'              => array(
								'type'      => 'kmt-radio',
								'transport' => 'postMessage',
								'label'     => __( 'Icon Display', 'kemet' ),
								'choices'   => array(
									'icon-cart' => __( 'Cart', 'kemet' ),
									'icon-bag'  => __( 'Bag', 'kemet' ),
								),
							),
							'disable-cart-if-empty'       => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Disable Cart If Empty', 'kemet' ),
							),
							'cart-icon-display'           => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Display', 'kemet' ),
								'choices' => array(
									'icon'             => __( 'Icon Only', 'kemet' ),
									'icon-total'       => __( 'Icon & Cart Total', 'kemet' ),
									'icon-count'       => __( 'Icon & Cart Count', 'kemet' ),
									'icon-count-total' => __( 'Icon & Cart Count + Total', 'kemet' ),
								),
							),
							'cart-icon-size'              => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Icon Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 10,
										'step' => 1,
										'max'  => 50,
									),
								),
							),
							'cart-icon-center-vertically' => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Center Vertically', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0,
										'step' => 1,
										'max'  => 100,
									),
								),
							),
							'cart-dropdown-width'         => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Cart Dropdown Width', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 200,
										'step' => 1,
										'max'  => 600,
									),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'cart-dropdown-bg-color'     => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Cart Dropdown Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Color', 'kemet' ),
									),
								),
							),
							'cart-dropdown-border-size'  => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Cart Dropdown Border Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 1,
										'step' => 1,
										'max'  => 100,
									),
								),
							),
							'cart-dropdown-border-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Cart Dropdown Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Color', 'kemet' ),
									),
								),
							),
						),
					),
				),
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
				'priority' => 50,
				'title'    => __( 'Cart Header Item', 'kemet' ),
				'panel'    => 'woocommerce',
			),
		);

		return array_merge( $sections, $register_sections );

	}
}

new Kemet_Woo_Cart_Customizer();
