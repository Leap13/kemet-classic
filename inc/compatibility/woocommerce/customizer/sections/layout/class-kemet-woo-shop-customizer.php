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
			self::$prefix . '-layout'                     => array(
				'type'    => 'kmt-select',
				'default' => 'shop-grid',
				'label'   => __( 'Shop Layout', 'kemet' ),
				'choices' => array(
					'shop-grid'   => __( 'Boxed', 'kemet' ),
					'hover-style' => __( 'Simple', 'kemet' ),
				),
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
			self::$prefix . 'disable-breadcrumb'          => array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Disable Breadcrumb', 'kemet' ),
			),
			self::$prefix . '-grids'                      => array(
				'type'       => 'kmt-radio',
				'responsive' => true,
				'label'      => __( 'Shop Columns', 'kemet' ),
				'choices'    => array(
					'1' => 'One',
					'2' => 'Two',
					'3' => 'Three',
					'4' => 'Four',
					'5' => 'Five',
					'6' => 'Six',
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
			self::$prefix . '-structure'                  => array(
				'type'  => 'kmt-title',
				'label' => __( 'Product Structure', 'kemet' ),
			),
			self::$prefix . '-product-structure'          => array(
				'type'    => 'kmt-sortable',
				'label'   => __( 'Product Structure', 'kemet' ),
				'choices' => array(
					'title'      => __( 'Title', 'kemet' ),
					'price'      => __( 'Price', 'kemet' ),
					'ratings'    => __( 'Ratings', 'kemet' ),
					'short_desc' => __( 'Short Description', 'kemet' ),
					'add_cart'   => __( 'Add To Cart', 'kemet' ),
					'category'   => __( 'Category', 'kemet' ),
				),
				'context' => array(
					array(
						'setting' => self::$prefix . '-layout',
						'value'   => 'hover-style',
					),
				),
			),
			self::$prefix . '-list-product-structure'     => array(
				'type'    => 'kmt-sortable',
				'label'   => __( 'Product Structure', 'kemet' ),
				'choices' => array(
					'title'      => __( 'Title', 'kemet' ),
					'price'      => __( 'Price', 'kemet' ),
					'ratings'    => __( 'Ratings', 'kemet' ),
					'short_desc' => __( 'Short Description', 'kemet' ),
					'add_cart'   => __( 'Add To Cart', 'kemet' ),
					'category'   => __( 'Category', 'kemet' ),
				),
				'context' => array(
					array(
						'setting' => self::$prefix . '-layout',
						'value'   => 'shop-grid',
					),
				),
			),
			'disable-list-short-desc-in-responsive'       => array(
				'type'    => 'kmt-switcher',
				'label'   => __( 'Disable Short Description In Responsive', 'kemet' ),
				'context' => array(
					array(
						'setting' => self::$prefix . '-layout',
						'value'   => 'hover-style',
					),
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
			),
			self::$prefix . '-product-title-typography'   => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
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
			),
			self::$prefix . '-product-content-typography' => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
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
			),
			self::$prefix . '-product-price-typography'   => array(
				'type'      => 'kmt-typography',
				'transport' => 'postMessage',
				'label'     => __( 'Typography', 'kemet' ),
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
			),
			self::$prefix . '-rating'                     => array(
				'type'  => 'kmt-title',
				'label' => __( 'Product Rating Style', 'kemet' ),
			),
			self::$prefix . '-rating-font-size'           => array(
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

/**
 * Option: Products Per Page
 */
// $wp_customize->add_setting(
// KEMET_THEME_SETTINGS . '[shop-no-of-products]',
// array(
// 'default'           => kemet_get_option( 'shop-no-of-products' ),
// 'type'              => 'option',
// 'sanitize_callback' => array( 'Kemet_Customizer_Sanitizes', 'sanitize_number' ),
// )
// );
// $wp_customize->add_control(
// KEMET_THEME_SETTINGS . '[shop-no-of-products]',
// array(
// 'section'     => 'woocommerce_product_catalog',
// 'label'       => __( 'Products Per Page', 'kemet' ),
// 'type'        => 'number',
// 'priority'    => 10,
// 'input_attrs' => array(
// 'min'  => 1,
// 'step' => 1,
// 'max'  => 50,
// ),
// )
// );
