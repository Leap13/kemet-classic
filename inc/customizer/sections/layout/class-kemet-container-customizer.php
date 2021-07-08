<?php
/**
 * General Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Container_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {

		$register_options = array(
			// 'test-tabs-control'           => array(
			// 'type'    => 'kmt-test',
			// 'section' => 'section-container-layout',
			// 'tabs'    => array(
			// 'general' => array(
			// 'title'   => __( 'General', 'kemet' ),
			// 'options' => array(
			// 'test-slider' => array(
			// 'type'      => 'kmt-color',
			// 'default'   => 1,
			// 'section'   => 'section-container-layout',
			// 'transport' => 'postMessage',
			// 'priority'  => 5,
			// 'label'     => __( 'Container Width', 'kemet' ),
			// 'suffix'      => '',
			// 'input_attrs' => array(
			// 'min'  => 768,
			// 'step' => 1,
			// 'max'  => 1920,
			// ),
			// 'preview'   => array(
			// 'selector' => ':root',
			// 'property' => '--contentWidth',
			// ),
			// ),
			// ),
			// ),
			// 'design'  => array(
			// 'title'   => __( 'Design', 'kemet' ),
			// 'options' => array(
			// 'test-color' => array(
			// 'type'      => 'kmt-color',
			// 'default'   => '#fff',
			// 'section'   => 'section-container-layout',
			// 'transport' => 'postMessage',
			// 'priority'  => 55,
			// 'label'     => __( 'Content Separator Color', 'kemet' ),
			// ),
			// ),
			// ),
			// ),
			// ),
			// 'site-content-width'          => array(
			// 'type'        => 'kmt-slider',
			// 'transport'   => 'postMessage',
			// 'section'     => 'section-container-layout',
			// 'priority'    => 5,
			// 'label'       => __( 'Container Width', 'kemet' ),
			// 'suffix'      => '',
			// 'input_attrs' => array(
			// 'min'  => 768,
			// 'step' => 1,
			// 'max'  => 1920,
			// ),
			// 'preview'     => array(
			// 'selector' => ':root',
			// 'property' => '--contentWidth',
			// ),
			// ),
			'site-content-layout'         => array(
				'type'     => 'select',
				'section'  => 'section-container-layout',
				'priority' => 10,
				'label'    => __( 'Default Container', 'kemet' ),
				'choices'  => array(
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'single-page-content-layout'  => array(
				'type'     => 'select',
				'section'  => 'section-container-layout',
				'label'    => __( 'Pages Container', 'kemet' ),
				'priority' => 15,
				'choices'  => array(
					'default'                 => __( 'Default', 'kemet' ),
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'single-post-content-layout'  => array(
				'type'     => 'select',
				'section'  => 'section-container-layout',
				'priority' => 20,
				'label'    => __( 'Blog Posts Container', 'kemet' ),
				'choices'  => array(
					'default'                 => __( 'Default', 'kemet' ),
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'archive-post-content-layout' => array(
				'type'     => 'select',
				'section'  => 'section-container-layout',
				'priority' => 25,
				'label'    => __( 'Blog Archives Container', 'kemet' ),
				'choices'  => array(
					'default'                 => __( 'Default', 'kemet' ),
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'kmt-site-boxed-title'        => array(
				'type'     => 'kmt-title',
				'label'    => __( 'Boxed Layout Content Settings', 'kemet' ),
				'section'  => 'section-container-layout',
				'priority' => 36,
			),
			'content-padding'             => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'section-container-layout',
				'priority'       => 50,
				'label'          => __( 'Content Padding', 'kemet' ),
				'description'    => __( 'This value will be changed to 0px in the pages built with a page builder', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
				),
				'preview'        => array(
					'selector' => '.site-content #primary',
					'property' => 'padding',
				),
			),
			'container-inner-spacing'     => array(
				'type'           => 'kmt-responsive-spacing',
				'transport'      => 'postMessage',
				'section'        => 'section-container-layout',
				'priority'       => 50,
				'label'          => __( 'Boxed Container Spacing', 'kemet' ),
				'linked_choices' => true,
				'unit_choices'   => array( 'px', 'em', '%' ),
				'choices'        => array(
					'top'    => __( 'Top', 'kemet' ),
					'right'  => __( 'Right', 'kemet' ),
					'bottom' => __( 'Bottom', 'kemet' ),
					'left'   => __( 'Left', 'kemet' ),
				),
				'preview'        => array(
					'selector' => '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li',
					'property' => 'padding',
					'sides'    => false,
				),
			),
			'content-separator-color'     => array(
				'type'     => 'kmt-color',
				'priority' => 55,
				'label'    => __( 'Content Separator Color', 'kemet' ),
				'section'  => 'section-container-layout',
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
		$register_section = array(
			'section-container-layout' => array(
				'priority' => 10,
				'title'    => __( 'Container', 'kemet' ),
				'panel'    => 'panel-layout',
			),
		);

		return array_merge( $sections, $register_section );

	}

	/**
	 * Register Panels
	 *
	 * @param array $panels panels.
	 * @return array
	 */
	public function register_panels( $panels ) {
		$register_panel = array(
			'panel-layout' => array(
				'priority' => 25,
				'title'    => __( 'Layout', 'kemet' ),
			),
		);
		return array_merge( $panels, $register_panel );

	}
}

new Kemet_Container_Customizer();
