<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

	/**
	 * Layout Panel
	 */
	$wp_customize->add_panel(
		new Kemet_WP_Customize_Panel(
			$wp_customize, 'panel-layout',
			array(
				'priority' => 10,
				'title'    => __( 'Layout', 'kemet' ),
			)
		)
	);

	// Layout Panel Container
	$wp_customize->add_section(
		'section-container-layout', array(
			'priority' => 10,
			'panel'    => 'panel-layout',
			'title'    => __( 'Container', 'kemet' ),
		)
	);

	// Layout Panel Header
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-header-group',
			array(
				'title'    => __( 'Header', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 15,
			)
		)
	);

	// Layout Panel Header Header
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-header',
				array(
					'title'    => __( 'Header', 'kemet' ),
					'panel'    => 'panel-layout',
					'section'  => 'section-header-group',
					'priority' => 5,
				)
		)
	);

	// Layout Panel Header Main Menu
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-menu-header', array(
					'title'    => __( 'Main Menu', 'kemet' ),
					'panel'    => 'panel-layout',
					'section'  => 'section-header-group',
					'priority' => 10,
				)
		)
	);

	// Layout Panel Footer
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-footer-group',
			array(
				'title'    => __( 'Footer', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 20,
			)
		)
	);
	
	// Layout Panel Footer Footer Widgets
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-kemet-footer',
			array(
				'title'    => __( 'Footer Widgets', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-footer-group',
				'priority' => 5,
			)
		)
	);

	// Layout Panel Footer Footer Bar
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-footer-copyright',
			array(
				'title'    => __( 'Footer Bar', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-footer-group',
				'priority' => 10,
			)
		)
	);


	// Layout Panel Content
	$wp_customize->add_section(
		'section-contents', array(
			'title'    => __( 'Content', 'kemet' ),
			'panel'    => 'panel-layout',
			'priority' => 25,
		)
	);

	// Layout Panel Sidebar
	$wp_customize->add_section(
		'section-sidebars', array(
			'title'    => __( 'Sidebar', 'kemet' ),
			'panel'    => 'panel-layout',
			'priority' => 30,
		)
	);

	// Layout Panel Widgets
	$wp_customize->add_section(
		'section-widgets', array(
			'title'    => __( 'Widgets', 'kemet' ),
			'panel'    => 'panel-layout',
			'priority' => 35,
		)
	);
	// Blog
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-blog-group',
			array(
				'priority' => 40,
				'title'    => __( 'Blog', 'kemet' ),
				'panel'    => 'panel-layout',
			)
		)
	);
	//Blog/Archive
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-blog',
			array(
				'priority' => 5,
				'title'    => __( 'Blog/Archive', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-blog-group',
			)
		)
	);
	//Single Post
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-blog-single',
			array(
				'priority' => 10,
				'title'    => __( 'Single Post', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-blog-group',
			)
		)
	);
	
	// Layout Panel Woocommerce
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-woo-group',
			array(
				'title'    => __( 'WooCommerce', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 45,
			)
		)
	);

	// Layout Panel Woocommerce Shop
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-woo-shop',
			array(
				'title'    => __( 'Shop', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-woo-group',
				'priority' => 5,
			)
		)
	);

	// Layout Panel Woocommerce Single Product
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-woo-shop-single',
			array(
				'title'    => __( 'Single Product', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-woo-group',
				'priority' => 10,
			)
		)
	);
	
    // Base Colors Main Panel
	$wp_customize->add_section(
		'section-colors-body', array(
			'title'    => __( 'Global Colors', 'kemet' ),
			'priority' => 15,
		)
	);

	/**
	 * Buttons Section
	 */
	$wp_customize->add_section(
		'section-buttons-fields', array(
			'priority' => 50,
			'title'    => __( 'Buttons & Fields', 'kemet' ),
		)
	);

	$wp_customize->add_section( new Kemet_Customizer_Notification( $wp_customize, 'kemet_upsell_section_test', array(
		'title'    => esc_html__( 'Kemet Addons Available', 'kemet' ),
		'description'      => 'To Get More Options',
		'slug'      => 'kemet-addons',
		'priority' => 0,
	) ) );