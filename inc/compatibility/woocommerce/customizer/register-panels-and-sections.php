<?php
/**
 * Register customizer panels & sections fro Woocommerce.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpastra.com/
 * @since       Kemet 1.1.0
 */

/**
 * WooCommerce
 */
$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-group',
		array(
			'title'    => __( 'WooCommerce', 'astra' ),
			'panel'    => 'panel-layout',
			'priority' => 60,
		)
	)
);

$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-general',
		array(
			'title'    => __( 'General', 'astra' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 5,
		)
	)
);
$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-shop',
		array(
			'title'    => __( 'Shop', 'astra' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 10,
		)
	)
);

$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-shop-single',
		array(
			'title'    => __( 'Single Product', 'astra' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 15,
		)
	)
);

$wp_customize->add_section(
	new Kemet_WP_Customize_Section(
		$wp_customize, 'section-woo-shop-cart',
		array(
			'title'    => __( 'Cart Page', 'astra' ),
			'panel'    => 'panel-layout',
			'section'  => 'section-woo-group',
			'priority' => 20,
		)
	)
);
