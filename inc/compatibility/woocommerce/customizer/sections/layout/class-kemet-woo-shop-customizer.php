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
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							self::$prefix . '-title' => array(
								'type'     => 'kmt-title',
								'priority' => 5,
								'label'    => __( 'Shop Settings', 'kemet' ),
							),
							'woocommerce_shop_page_display' => array(
								'type'        => 'kmt-select',
								'priority'    => 5,
								'label'       => __( 'Shop Page Display', 'kemet' ),
								'description' => __( 'Choose what to display on the main shop page.', 'kemet' ),
								'choices'     => array(
									''              => __( 'Products', 'kemet' ),
									'subcategories' => __( 'Categories', 'kemet' ),
									'both'          => __( 'Products and Categories', 'kemet' ),
								),
							),
							'woocommerce_category_archive_display' => array(
								'type'        => 'kmt-select',
								'priority'    => 5,
								'label'       => __( 'Product Category Page Display', 'kemet' ),
								'description' => __( 'Choose what to display on product category pages.', 'kemet' ),
								'choices'     => array(
									''              => __( 'Products', 'kemet' ),
									'subcategories' => __( 'Subcategories', 'kemet' ),
									'both'          => __( 'Products and Subcategories', 'kemet' ),
								),
							),
							'woocommerce_default_catalog_orderby' => array(
								'type'        => 'kmt-select',
								'priority'    => 5,
								'label'       => __( 'Shop page display', 'kemet' ),
								'description' => __( 'How should products be sorted in the catalog by default?', 'kemet' ),
								'choices'     => array(
									'menu_order' => __( 'Default sorting (custom ordering + name)', 'kemet' ),
									'popularity' => __( 'Popularity (sales)', 'kemet' ),
									'rating'     => __( 'Average rating', 'kemet' ),
									'date'       => __( 'Sort by most recent', 'kemet' ),
									'price'      => __( 'Sort by price (asc)', 'kemet' ),
									'price-desc' => __( 'Sort by price (desc)', 'kemet' ),
								),
							),
							self::$prefix . '-kemet-addons-notification' => array(
								'type'     => 'kmt-notification',
								'content'  => __( 'Please install and activate Kemet Addons plugin to get the ability to change the WooCommerce product listing styles.', 'kemet' ),
								'priority' => 5,
							),
							self::$prefix . '-product-structure' => array(
								'type'     => 'kmt-sortable',
								'priority' => 10,
								'label'    => __( 'Product Structure', 'kemet' ),
								'choices'  => array(
									'title'      => __( 'Title', 'kemet' ),
									'price'      => __( 'Price', 'kemet' ),
									'rating'     => __( 'Rating', 'kemet' ),
									'short_desc' => __( 'Short Description', 'kemet' ),
									'category'   => __( 'Category', 'kemet' ),
								),
							),
							self::$prefix . '-no-of-products' => array(
								'type'     => 'kmt-number',
								'priority' => 15,
								'label'    => __( 'Products Per Page', 'kemet' ),
								'min'      => 1,
								'step'     => 1,
								'max'      => 50,
							),
							self::$prefix . '-disable-breadcrumb' => array(
								'type'     => 'kmt-switcher',
								'priority' => 20,
								'label'    => __( 'Disable Breadcrumb', 'kemet' ),
							),
							self::$prefix . '-grids' => array(
								'type'       => 'kmt-radio',
								'priority'   => 20,
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
							self::$prefix . '-archive-width' => array(
								'type'     => 'kmt-select',
								'priority' => 25,
								'label'    => __( 'Shop Archive Content Width', 'kemet' ),
								'choices'  => array(
									'default' => __( 'Default', 'kemet' ),
									'custom'  => __( 'Custom', 'kemet' ),
								),
							),
							self::$prefix . '-archive-max-width' => array(
								'type'         => 'kmt-slider',
								'priority'     => 25,
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
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							self::$prefix . '-shop-design' => array(
								'type'     => 'kmt-title',
								'priority' => 5,
								'label'    => __( 'Layout Style', 'kemet' ),
							),
							self::$prefix . '-categories-link-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 25,
								'transport' => 'postMessage',
								'label'     => __( 'Category Links Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
									array(
										'id'    => 'hover',
										'title' => __( 'Hover', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woocommerce ul.products li.product.product-category .woocommerce-loop-category__title, .woocommerce-page ul.products li.product.product-category .woocommerce-loop-category__title',
										'property' => '--headingColor',
									),
									'hover'   => array(
										'selector' => '.woocommerce ul.products li.product.product-category .woocommerce-loop-category__title, .woocommerce-page ul.products li.product.product-category .woocommerce-loop-category__title',
										'property' => '--linksHoverColor',
									),
								),
								'context'   => array(
									array(
										'setting' => 'woocommerce_shop_page_display',
										'value'   => 'subcategories',
									),
								),
							),
							self::$prefix . '-hover-style' => array(
								'type'     => 'kmt-select',
								'priority' => 10,
								'label'    => __( 'Product Image Hover Style', 'kemet' ),
								'choices'  => apply_filters(
									'kemet_woo_shop_hover_style',
									array(
										''     => __( 'None', 'kemet' ),
										'swap' => __( 'Swap Images', 'kemet' ),
									)
								),
							),
							self::$prefix . '-product-content-alignment' => array(
								'type'     => 'kmt-icon-select',
								'priority' => 20,
								'label'    => __( 'Product Content Alignment', 'kemet' ),
								'choices'  => array(
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
							self::$prefix . '-overlay-bg-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 25,
								'transport' => 'postMessage',
								'label'     => __( 'Overlay Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woo-style1 ul.products li.product .kemet-shop-overlay-buttons',
										'property' => 'background-color',
									),
								),
							),
							self::$prefix . '-icons-style' => array(
								'type'      => 'kmt-radio',
								'priority'  => 30,
								'transport' => 'postMessage',
								'default'   => 'simple',
								'label'     => __( 'Icons Style', 'kemet' ),
								'choices'   => array(
									'simple'  => __( 'Simple', 'kemet' ),
									'outline' => __( 'Outline', 'kemet' ),
									'solid'   => __( 'Solid', 'kemet' ),
								),
								'preview'   => array(
									'selector' => '.kemet-shop-overlay-buttons',
									'attr'     => 'data-style',
								),
							),
							self::$prefix . '-icons-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 35,
								'transport' => 'postMessage',
								'label'     => __( 'Icons Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
									array(
										'id'    => 'hover',
										'title' => __( 'Hover', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woo-style1 ul.products li.product .kemet-shop-overlay-buttons a, .woo-style1 ul.products li.product .kemet-shop-overlay-buttons .yith-wcwl-wishlistexistsbrowse',
										'property' => '--linksColor',
									),
									'hover'   => array(
										'selector' => '.woo-style1 ul.products li.product .kemet-shop-overlay-buttons a, .woo-style1 ul.products li.product .kemet-shop-overlay-buttons .yith-wcwl-wishlistexistsbrowse',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-icons-bg-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 40,
								'transport' => 'postMessage',
								'label'     => __( 'Icons Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
									array(
										'id'    => 'hover',
										'title' => __( 'Hover', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woo-style1 ul.products li.product .kemet-shop-overlay-buttons[data-style=solid]',
										'property' => '--iconsBackgroundColor',
									),
									'hover'   => array(
										'selector' => '.woo-style1 ul.products li.product .kemet-shop-overlay-buttons[data-style=solid]',
										'property' => '--iconsBackgroundHoverColor',
									),
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-icons-style',
										'value'   => 'solid',
									),
								),
							),
							self::$prefix . '-icons-border' => array(
								'transport' => 'postMessage',
								'priority'  => 45,
								'type'      => 'kmt-border',
								'default'   => array(
									'style' => 'solid',
									'width' => 1,
									'color' => 'var(--borderColor)',
								),
								'label'     => __( 'Border', 'kemet' ),
								'preview'   => array(
									'selector' => '.woo-style1 ul.products li.product .kemet-shop-overlay-buttons[data-style=outline]',
									'property' => '--border',
								),
								'context'   => array(
									array(
										'setting' => self::$prefix . '-icons-style',
										'value'   => 'outline',
									),
								),
							),
							self::$prefix . '-product'     => array(
								'type'     => 'kmt-title',
								'priority' => 50,
								'label'    => __( 'Product Title Style', 'kemet' ),
							),
							self::$prefix . '-product-title-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 55,
								'transport' => 'postMessage',
								'label'     => __( 'Font Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
									array(
										'id'    => 'hover',
										'title' => __( 'Hover', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title',
										'property' => '--linksColor',
									),
									'hover'   => array(
										'selector' => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title',
										'property' => '--linksHoverColor',
									),
								),
							),
							self::$prefix . '-product-title-typography' => array(
								'type'      => 'kmt-typography',
								'priority'  => 60,
								'transport' => 'postMessage',
								'label'     => __( 'Typography', 'kemet' ),
								'preview'   => array(
									'selector' => '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title',
								),
							),
							self::$prefix . '-product-title-spacing' => array(
								'type'           => 'kmt-spacing',
								'priority'       => 65,
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
								),
							),
							self::$prefix . '-price'       => array(
								'type'     => 'kmt-title',
								'priority' => 70,
								'label'    => __( 'Product Price Style', 'kemet' ),
							),
							self::$prefix . '-product-price-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 75,
								'transport' => 'postMessage',
								'label'     => __( 'Font Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins',
										'property' => 'color',
									),
								),
							),
							self::$prefix . '-product-price-typography' => array(
								'type'      => 'kmt-typography',
								'priority'  => 80,
								'transport' => 'postMessage',
								'label'     => __( 'Typography', 'kemet' ),
								'preview'   => array(
									'selector' => '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins',
								),
							),
							self::$prefix . '-product-price-spacing' => array(
								'type'           => 'kmt-spacing',
								'priority'       => 85,
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
								),
							),
							self::$prefix . '-rating'      => array(
								'type'     => 'kmt-title',
								'priority' => 90,
								'label'    => __( 'Product Rating Style', 'kemet' ),
							),
							self::$prefix . '-product-rating-font-size' => array(
								'type'         => 'kmt-slider',
								'priority'     => 95,
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
										'max'  => 12,
									),
								),
								'preview'      => array(
									'selector'   => '.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating',
									'property'   => 'font-size',
									'responsive' => true,
								),
							),
							self::$prefix . '-product-rating-spacing' => array(
								'type'           => 'kmt-spacing',
								'priority'       => 100,
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
								),
							),
							self::$prefix . '-product-content' => array(
								'type'     => 'kmt-title',
								'priority' => 105,
								'label'    => __( 'Product Content Style', 'kemet' ),
							),
							self::$prefix . '-product-content-color' => array(
								'type'      => 'kmt-color',
								'priority'  => 110,
								'transport' => 'postMessage',
								'label'     => __( 'Font Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
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
								'priority'  => 115,
								'transport' => 'postMessage',
								'label'     => __( 'Typography', 'kemet' ),
								'preview'   => array(
									'selector' => '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description',
								),
							),
						),
					),
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

