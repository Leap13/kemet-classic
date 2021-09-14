<?php
/**
 * WooCommerce Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.1.0
 */

class Kemet_Woo_Shop_Customizer extends Kemet_Customizer_Register {

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
		self::$prefix     = 'woo-shop';
		$selector         = '';
		$register_options = array(
			self::$prefix . '-title'                      => array(
				'type'  => 'kmt-title',
				'label' => __( 'Shop Settings', 'kemet' ),
			),
			self::$prefix . '-product-structure'          => array(
				'type'    => 'kmt-sortable',
				'label'   => __( 'Product Structure', 'kemet' ),
				'choices' => array(
					'short_desc' => __( 'Short Description', 'kemet' ),
					'add_cart'   => __( 'Add To Cart', 'kemet' ),
					'category'   => __( 'Category', 'kemet' ),
				),
			),
			self::$prefix . '-no-of-products'             => array(
				'type'  => 'kmt-number',
				'label' => __( 'Products Per Page', 'kemet' ),
				'min'   => 1,
				'step'  => 1,
				'max'   => 50,
			),
			self::$prefix . '-product-content-alignment'  => array(
				'type'    => 'kmt-icon-select',
				'label'   => __( 'Product Content Alignment', 'kemet' ),
				'choices' => array(
					'left'   => array(
						'icon' => 'dashicons-editor-alignleft',
					),
					'center' => array(
						'icon' => 'dashicons-editor-aligncenter',
					),
					'right'  => array(
						'icon' => 'dashicons-editor-alignright',
					),
				),
			),
			self::$prefix . '-disable-breadcrumb'         => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Disable Breadcrumb', 'kemet' ),
			),
			self::$prefix . '-grids'                      => array(
				'type'       => 'kmt-radio',
				'responsive' => true,
				'label'      => __( 'Shop Columns', 'kemet' ),
				'choices'    => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
			),
			self::$prefix . '-archive-width'              => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Shop Archive Content Width', 'kemet' ),
				'choices' => array(
					'default' => __( 'Default', 'kemet' ),
					'custom'  => __( 'Custom', 'kemet' ),
				),
			),
			self::$prefix . '-archive-max-width'          => array(
				'type'         => 'kmt-slider',
				'transport'    => 'postMessage',
				'label'        => __( 'Enter Width', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 768,
						'step' => 1,
						'max'  => 1920,
					),
				),
				'preview'      => array(
					'selector' => '.kmt-woo-shop-archive .site-content > .kmt-container',
					'property' => 'max-width',
				),
				'context'      => array(
					array(
						'setting' => self::$prefix . '-archive-width',
						'value'   => 'custom',
					),
				),
			),
			self::$prefix . '-hover-style'                => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Product Image Hover Style', 'kemet' ),
				'choices' => apply_filters(
					'kemet_woo_shop_hover_style',
					array(
						''     => __( 'None', 'kemet' ),
						'swap' => __( 'Swap Images', 'kemet' ),
					)
				),
			),
			self::$prefix . '-product'                    => array(
				'type'  => 'kmt-title',
				'label' => __( 'Product Title Style', 'kemet' ),
			),
			self::$prefix . '-product-title-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'id'    => 'initial',
						'title' => __( 'Color', 'kemet' ),
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title',
						'property' => '--headingLinksColor',
					),
				),
			),
			self::$prefix . '-product-title-typography'   => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title',
				),
			),
			self::$prefix . '-product-title-spacing'      => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'label'          => __( 'Spacing', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title',
					'property'   => 'margin',
					'responsive' => true,
					'sides'      => false,
				),
			),
			self::$prefix . '-product-content'            => array(
				'type'  => 'kmt-title',
				'label' => __( 'Product Content Style', 'kemet' ),
			),
			self::$prefix . '-product-content-color'      => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'id'    => 'initial',
						'title' => __( 'Color', 'kemet' ),
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description',
						'property' => 'color',
					),
				),
			),
			self::$prefix . '-product-content-typography' => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description',
				),
			),
			self::$prefix . '-price'                      => array(
				'type'  => 'kmt-title',
				'label' => __( 'Product Title Style', 'kemet' ),
			),
			self::$prefix . '-product-price-color'        => array(
				'type'      => 'kmt-color',
				'transport' => 'postMessage',
				'label'     => __( 'Font Color', 'kemet' ),
				'pickers'   => array(
					array(
						'id'    => 'initial',
						'title' => __( 'Color', 'kemet' ),
					),
				),
				'preview'   => array(
					'initial' => array(
						'selector' => '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins',
						'property' => 'color',
					),
				),
			),
			self::$prefix . '-product-price-typography'   => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
				'preview'   => array(
					'selector' => '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins',
				),
			),
			self::$prefix . '-product-price-spacing'      => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'label'          => __( 'Spacing', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins',
					'property'   => 'margin',
					'responsive' => true,
					'sides'      => false,
				),
			),
			self::$prefix . '-rating'                     => array(
				'type'  => 'kmt-title',
				'label' => __( 'Product Rating Style', 'kemet' ),
			),
			self::$prefix . '-product-rating-font-size'   => array(
				'type'         => 'kmt-slider',
				'transport'    => 'postMessage',
				'responsive'   => true,
				'label'        => __( 'Font Size', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 1,
						'step' => 1,
						'max'  => 200,
					),
					'em' => array(
						'min'  => 0.1,
						'step' => 0.1,
						'max'  => 10,
					),
				),
				'preview'      => array(
					'selector'   => '.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating',
					'property'   => 'font-size',
					'responsive' => true,
				),
			),
			self::$prefix . '-product-rating-spacing'     => array(
				'type'           => 'kmt-spacing',
				'transport'      => 'postMessage',
				'responsive'     => true,
				'label'          => __( 'Spacing', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector'   => '.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating',
					'property'   => 'margin',
					'responsive' => true,
					'responsive' => false,
				),
			),
		);

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'woocommerce_product_catalog',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => apply_filters( 'woo_shop_options', $register_options ),
				),
			),
		);

		return array_merge( $options, $register_options );
	}
}

new Kemet_Woo_Shop_Customizer();

