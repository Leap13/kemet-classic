<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

if ( ! class_exists( 'Kemet_Customizer_Register_Sections_Panels' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Kemet_Customizer_Register_Sections_Panels extends Kemet_Customizer_Config_Base {

		/**
		 * Register Panels and Sections for Customizer.
		 *
		 * @param Array                $configurations Kemet Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Kemet Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$configs = array(

				/**
				 * Layout Panel
				 */
				array(
					'name'     => 'panel-layout',
					'type'     => 'panel',
					'priority' => 10,
					'title'    => __( 'Layoutn', 'kemet' ),
				),

                array(
                    'section'   => 'section-container-layout',
                    'type'      => 'section',
                    'priority'  => 5,
                    'title'     => __( 'Containern', 'kemet' ),
                    'panel'    => 'panel-layout',
                ),

				array(
					'name'     => 'section-site-layout',
					'type'     => 'section',
					'priority' => 5,
					'title'    => __( 'Site Layouttt', 'kemet' ),
					'panel'    => 'panel-layout',
				),

				array(
					'name'     => 'section-container-layout',
					'type'     => 'section',
					'priority' => 10,
					'title'    => __( 'Containerrr', 'kemet' ),
					'panel'    => 'panel-layout',
				),

				/*
				 * Header section
				 *
				 * @since 1.4.0
				 */
				array(
					'name'     => 'section-header-group',
					'type'     => 'section',
					'priority' => 20,
					'title'    => __( 'Headerrr', 'kemet' ),
					'panel'    => 'panel-layout',
				),

				array(
					'name'     => 'ssection-menu-header',
					'type'     => 'section',
					'priority' => 25,
					'title'    => __( 'Main Menu', 'kemet' ),
					'panel'    => 'panel-layout',
				),

				array(
					'name'     => 'section-buttons-fields',
					'type'     => 'section',
					'priority' => 25,
					'title'    => __( 'Buttons & Fields', 'kemet' ),
				),

				// /*
				//  * Update the Site Identity section inside Layout -> Header
				//  *
				//  * @since 1.4.0
				//  */
				// array(
				// 	'name'     => 'title_tagline',
				// 	'type'     => 'section',
				// 	'priority' => 5,
				// 	'title'    => __( 'Site Identity', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-header-group',
				// ),

				// /*
				//  * Update the Primary Header section
				//  *
				//  * @since 1.4.0
				//  */
				// array(
				// 	'name'     => 'section-header',
				// 	'type'     => 'section',
				// 	'priority' => 15,
				// 	'title'    => __( 'Primary Header', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-header-group',
				// ),

				// /*
				//  * Mobile Header section
				//  *
				//  * @since 1.4.0
				//  */
				// array(
				// 	'name'     => 'section-mobile-header',
				// 	'type'     => 'section',
				// 	'priority' => 40,
				// 	'title'    => __( 'Menu Breakpoint', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-header-group',
				// ),
				// array(
				// 	'name'     => 'section-footer-group',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Footer', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'priority' => 55,
				// ),

				// /**
				//  * WooCommerce
				//  */

				// array(
				// 	'name'     => 'section-woo-group',
				// 	'title'    => __( 'WooCommerce', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'type'     => 'section',
				// 	'priority' => 60,
				// ),

				// array(
				// 	'name'     => 'section-woo-general',
				// 	'type'     => 'section',
				// 	'title'    => __( 'General', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-woo-group',
				// 	'priority' => 5,
				// ),

				// array(
				// 	'name'     => 'section-woo-shop',
				// 	'title'    => __( 'Shop', 'kemet' ),
				// 	'type'     => 'section',
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-woo-group',
				// 	'priority' => 10,
				// ),

				// array(
				// 	'name'     => 'section-woo-shop-single',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Single Product', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-woo-group',
				// 	'priority' => 15,
				// ),

				// /**
				//  * Footer Widgets Section
				//  */

				// array(
				// 	'name'     => 'section-footer-adv',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Footer Widgets', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-footer-group',
				// 	'priority' => 5,
				// ),

				// array(
				// 	'name'     => 'section-footer-small',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Footer Bar', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-footer-group',
				// 	'priority' => 10,
				// ),

				// array(
				// 	'name'     => 'section-blog-group',
				// 	'type'     => 'section',
				// 	'priority' => 40,
				// 	'title'    => __( 'Blog', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// ),
				// array(
				// 	'name'     => 'section-blog',
				// 	'type'     => 'section',
				// 	'priority' => 5,
				// 	'title'    => __( 'Blog / Archive', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-blog-group',
				// ),
				// array(
				// 	'name'     => 'section-blog-single',
				// 	'type'     => 'section',
				// 	'priority' => 10,
				// 	'title'    => __( 'Single Post', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// 	'section'  => 'section-blog-group',
				// ),

				// array(
				// 	'name'     => 'section-sidebars',
				// 	'type'     => 'section',
				// 	'priority' => 50,
				// 	'title'    => __( 'Sidebar', 'kemet' ),
				// 	'panel'    => 'panel-layout',
				// ),

				// /**
				//  * Colors Panel
				//  */
				// array(
				// 	'name'     => 'panel-colors-background',
				// 	'type'     => 'panel',
				// 	'priority' => 15,
				// 	'title'    => __( 'Colors & Background', 'kemet' ),
				// ),

				// array(
				// 	'name'     => 'section-colors-body',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Base Colors', 'kemet' ),
				// 	'panel'    => 'panel-colors-background',
				// 	'priority' => 1,
				// ),

				// array(
				// 	'name'     => 'section-colors-footer',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Footer Bar', 'kemet' ),
				// 	'panel'    => 'panel-colors-background',
				// 	'priority' => 60,
				// ),

				// array(
				// 	'name'     => 'section-footer-adv-color-bg',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Footer Widgets', 'kemet' ),
				// 	'panel'    => 'panel-colors-background',
				// 	'priority' => 55,
				// ),

				// /**
				//  * Typography Panel
				//  */
				// array(
				// 	'name'     => 'panel-typography',
				// 	'type'     => 'panel',
				// 	'title'    => __( 'Typography', 'kemet' ),
				// 	'priority' => 20,
				// ),

				// array(
				// 	'name'     => 'section-body-typo',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Base Typography', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// 	'priority' => 1,
				// ),

				// array(
				// 	'name'     => 'section-content-typo',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Content', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// 	'priority' => 35,
				// ),

				// array(
				// 	'name'     => 'section-header-typo',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Header', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// 	'priority' => 20,
				// ),

				// array(
				// 	'name'     => 'section-primary-header-typo',
				// 	'type'     => 'section',
				// 	'title'    => __( 'Primary Header', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// 	'priority' => 21,
				// ),

				// array(
				// 	'name'     => 'section-blog-typo-group',
				// 	'type'     => 'section',
				// 	'priority' => 40,
				// 	'title'    => __( 'Blog', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// ),

				// array(
				// 	'name'     => 'section-archive-typo',
				// 	'type'     => 'section',
				// 	'priority' => 5,
				// 	'title'    => __( 'Blog / Archive', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// 	'section'  => 'section-blog-typo-group',
				// ),

				// array(
				// 	'name'     => 'section-single-typo',
				// 	'type'     => 'section',
				// 	'priority' => 10,
				// 	'title'    => __( 'Single Post', 'kemet' ),
				// 	'panel'    => 'panel-typography',
				// 	'section'  => 'section-blog-typo-group',
				// ),

				// /**
				//  * Buttons Section
				//  */
				// array(
				// 	'name'     => 'section-buttons',
				// 	'type'     => 'section',
				// 	'priority' => 50,
				// 	'title'    => __( 'Buttons', 'kemet' ),
				// ),

				// /**
				//  * Widget Areas Section
				//  */
				// array(
				// 	'name'     => 'section-widget-areas',
				// 	'type'     => 'section',
				// 	'priority' => 55,
				// 	'title'    => __( 'Widget Areas', 'kemet' ),
				// ),

			);

			return array_merge( $configurations, $configs );
		}
	}
}


/**
 * Kicking this off by calling 'get_instance()' method
 */
new Kemet_Customizer_Register_Sections_Panels;