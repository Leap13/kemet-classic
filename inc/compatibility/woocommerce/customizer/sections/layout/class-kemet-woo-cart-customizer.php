<?php
/**
 * WooCommerce cart item options
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
							'shop-cart-icon'        => array(
								'type'      => 'kmt-icon-select',
								'transport' => 'postMessage',
								'label'     => __( 'Icon Display', 'kemet' ),
								'choices'   => array(
									'cart'  => array(
										'icon' => 'kmt-cart',
									),
									'bag'   => array(
										'icon' => 'kmt-bag',
									),
									'dcart' => array(
										'icon' => 'kmt-dcart',
									),
								),
							),
							'disable-cart-if-empty' => array(
								'type'      => 'kmt-switcher',
								'transport' => 'postMessage',
								'label'     => __( 'Disable Cart If Empty', 'kemet' ),
							),
							'cart-icon-display'     => array(
								'type'      => 'kmt-select',
								'transport' => 'postMessage',
								'label'     => __( 'Display', 'kemet' ),
								'choices'   => array(
									'icon'             => __( 'Icon Only', 'kemet' ),
									'icon-total'       => __( 'Icon & Cart Total', 'kemet' ),
									'icon-count'       => __( 'Icon & Cart Count', 'kemet' ),
									'icon-count-total' => __( 'Icon & Cart Count + Total', 'kemet' ),
								),
							),
							'cart-icon-size'        => array(
								'type'         => 'kmt-slider',
								'transport'    => 'postMessage',
								'label'        => __( 'Icon Size', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 10,
										'step' => 1,
										'max'  => 25,
									),
								),
								'preview'      => array(
									'selector' => '.kmt-cart-menu-wrap .count .kmt-svg-icon svg',
									'property' => 'width',
								),
							),
							'cart-dropdown-width'   => array(
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
								'preview'      => array(
									'selector' => '.kmt-site-header-cart .widget_shopping_cart',
									'property' => 'width',
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'cart-icon-color'            => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Cart Icon Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Initial', 'kemet' ),
										'id'    => 'initial',
									),
									array(
										'title' => __( 'Hover', 'kemet' ),
										'id'    => 'hover',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kmt-site-header-cart-li a.cart-container',
										'property' => '--linksColor',
									),
									'hover'   => array(
										'selector' => '.kmt-site-header-cart-li  a.cart-container:hover',
										'property' => '--linksHoverColor',
									),
								),

							),
							'cart-dropdown-bg-color'     => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Cart Dropdown Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kmt-site-header-cart .widget_shopping_cart',
										'property' => 'background-color',
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
								'preview'      => array(
									'selector' => '.kmt-site-header-cart .widget_shopping_cart',
									'property' => 'border-width',
								),
							),
							'cart-dropdown-border-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Cart Dropdown Border Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kmt-site-header-cart .widget_shopping_cart',
										'property' => '--borderColor',
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
				'panel'    => 'panel-header-builder-group',
			),
		);

		return array_merge( $sections, $register_sections );

	}

	/**
	 * Add Partials
	 *
	 * @param array $partials partials.
	 * @return array
	 */
	public function add_partials( $partials ) {
		$new_partials = array_fill_keys(
			array( 'cart-icon-display', 'shop-cart-icon', 'disable-cart-if-empty' ),
			array(
				'selector'            => '#kmt-site-header-cart',
				'container_inclusive' => false,
				'render_callback'     => array( Kemet_Woocommerce::get_instance(), 'woo_mini_cart_markup' ),
			)
		);
		return array_merge( $partials, $new_partials );
	}
}

new Kemet_Woo_Cart_Customizer();
