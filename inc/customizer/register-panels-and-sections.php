<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

	/**
	 * General Panel
	 */
	$wp_customize->add_panel(
		new Kemet_WP_Customize_Panel(
			$wp_customize, 'panel-general',
			array(
				'priority' => 10,
				'title'    => __( 'General', 'kemet' ),
			)
		)
	);

	$wp_customize->add_section(
		'section-general-layout', array(
			'priority' => 5,
			'panel'    => 'panel-general',
			'title'    => __( 'Layout', 'kemet' ),
		)
	);
    
   $wp_customize->add_section(
		'section-general-default-sidebar', array(
			'priority' => 5,
			'panel'    => 'panel-general',
			'title'    => __( 'Default Sidebar', 'kemet' ),
		)
	);

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

	$wp_customize->add_section(
		'section-site-layout', array(
			'priority' => 5,
			'panel'    => 'panel-layout',
			'title'    => __( 'Site Layout', 'kemet' ),
		)
	);

	$wp_customize->add_section(
		'section-container-layout', array(
			'priority' => 10,
			'panel'    => 'panel-layout',
			'title'    => __( 'Container', 'kemet' ),
		)
	);

	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-header',
			apply_filters(
				'kemet_customizer_primary_header_layout',
				array(
					'title'    => __( 'Primary Header', 'kemet' ),
					'panel'    => 'panel-layout',
					'priority' => 20,
				)
			)
		)
	);
    
   $wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-topbar-header', array(
					'title'    => __( 'Top Bar Header', 'kemet' ),
					'panel'    => 'panel-layout',
					'priority' => 21,
				)
		)
	);

	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-footer-group',
			array(
				'title'    => __( 'Footer', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 55,
			)
		)
	);

	/**
	 * WooCommerce
	 */
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-woo-group',
			array(
				'title'    => __( 'WooCommerce', 'kemet' ),
				'panel'    => 'panel-layout',
				'priority' => 60,
			)
		)
	);

	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-woo-general',
			array(
				'title'    => __( 'General', 'kemet' ),
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
				'title'    => __( 'Shop', 'kemet' ),
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
				'title'    => __( 'Single Product', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-woo-group',
				'priority' => 15,
			)
		)
	);

	/**
	 * Footer Widgets Section
	 */
	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-footer-adv',
			array(
				'title'    => __( 'Footer Widgets', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-footer-group',
				'priority' => 5,
			)
		)
	);

	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-footer-small',
			array(
				'title'    => __( 'Footer Bar', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-footer-group',
				'priority' => 10,
			)
		)
	);

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

	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-blog',
			array(
				'priority' => 5,
				'title'    => __( 'Blog / Archive', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-blog-group',
			)
		)
	);

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

	$wp_customize->add_section(
		'section-sidebars', array(
			'title'    => __( 'Sidebar', 'kemet' ),
			'panel'    => 'panel-layout',
			'priority' => 50,
		)
	);

	$wp_customize->add_section(
		'section-widgets', array(
			'title'    => __( 'widget', 'kemet' ),
			'panel'    => 'panel-layout',
			'priority' => 51,
		)
	);

	/**
	 * Colors Panel
	 */
	$wp_customize->add_panel(
		'panel-colors-background', array(
			'priority' => 15,
			'title'    => __( 'Colors & Background', 'kemet' ),
		)
	);

	$wp_customize->add_section(
		'section-colors-body', array(
			'title'    => __( 'Base Colors', 'kemet' ),
			'panel'    => 'panel-colors-background',
			'priority' => 1,
		)
	);

	$wp_customize->add_section(
		'section-colors-footer', array(
			'title'    => __( 'Footer Bar', 'kemet' ),
			'panel'    => 'panel-colors-background',
			'priority' => 60,
		)
	);

	$wp_customize->add_section(
		'section-footer-adv-color-bg', array(
			'title'    => __( 'Footer Widgets', 'kemet' ),
			'panel'    => 'panel-colors-background',
			'priority' => 55,
		)
	);

	/**
	 * Typography Panel
	 */
	$wp_customize->add_panel(
		'panel-typography', array(
			'priority' => 20,
			'title'    => __( 'Typography', 'kemet' ),
		)
	);

	$wp_customize->add_section(
		'section-body-typo', array(
			'title'    => __( 'Base Typography', 'kemet' ),
			'panel'    => 'panel-typography',
			'priority' => 1,
		)
	);

	$wp_customize->add_section(
		'section-content-typo', array(
			'title'    => __( 'Content', 'kemet' ),
			'panel'    => 'panel-typography',
			'priority' => 35,
		)
	);

	$wp_customize->add_section(
		new Kemet_WP_Customize_Section(
			$wp_customize, 'section-header-typo',
			apply_filters(
				'kemet_customizer_primary_header_typo',
				array(
					'title'    => __( 'Header', 'kemet' ),
					'panel'    => 'panel-typography',
					'priority' => 20,
				)
			)
		)
	);

	$wp_customize->add_section(
		'section-archive-typo', array(
			'title'    => __( 'Blog / Archive', 'kemet' ),
			'panel'    => 'panel-typography',
			'priority' => 40,
		)
	);

	$wp_customize->add_section(
		'section-single-typo', array(
			'title'    => __( 'Single Page / Post', 'kemet' ),
			'panel'    => 'panel-typography',
			'priority' => 45,
		)
	);

	/**
	 * Buttons Section
	 */
	$wp_customize->add_section(
		'section-buttons', array(
			'priority' => 50,
			'title'    => __( 'Buttons', 'kemet' ),
		)
	);

	/**
	 * Widget Areas Section
	 */
	$wp_customize->add_section(
		'section-widget-areas', array(
			'priority' => 55,
			'title'    => __( 'Widget Areas', 'kemet' ),
		)
	);
