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
			'site-content-width'          => array(
				'type'         => 'kmt-slider',
				'transport'    => 'postMessage',
				'label'        => __( 'Container Width', 'kemet' ),
				'unit_choices' => array(
					'px' => array(
						'min'  => 768,
						'step' => 1,
						'max'  => 1920,
					),
				),
				'preview'      => array(
					'selector' => ':root',
					'property' => '--contentWidth',
				),
			),
			'site-content-layout'         => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Default Container', 'kemet' ),
				'choices' => array(
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'single-page-content-layout'  => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Pages Container', 'kemet' ),
				'choices' => array(
					'default'                 => __( 'Default', 'kemet' ),
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'single-post-content-layout'  => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Blog Posts Container', 'kemet' ),
				'choices' => array(
					'default'                 => __( 'Default', 'kemet' ),
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'archive-post-content-layout' => array(
				'type'    => 'kmt-select',
				'label'   => __( 'Blog Archives Container', 'kemet' ),
				'choices' => array(
					'default'                 => __( 'Default', 'kemet' ),
					'boxed-container'         => __( 'Boxed Layout', 'kemet' ),
					'content-boxed-container' => __( 'Boxed Content', 'kemet' ),
					'plain-container'         => __( 'Full Width Content', 'kemet' ),
					'page-builder'            => __( 'Stretched Content', 'kemet' ),
				),
			),
			'kmt-site-boxed-title'        => array(
				'type'  => 'kmt-title',
				'label' => __( 'Boxed Layout Content Settings', 'kemet' ),
			),
			'site-content-tabs'           => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'content-padding'         => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Content Padding', 'kemet' ),
								'description'    => __( 'This value will be changed to 0px in the pages built with a page builder', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => '.site-content #primary',
									'property'   => 'padding',
									'responsive' => true,
								),
							),
							'container-inner-spacing' => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
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
									'selector'   => '.kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container ,.single-post.kmt-separate-container .kmt-comment-list li',
									'property'   => 'padding',
									'sides'      => false,
									'responsive' => true,
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'site-layout-outside-bg-obj' => array(
								'type'       => 'kmt-background',
								'transport'  => 'postMessage',
								'responsive' => true,
								'label'      => __( 'Body Background', 'kemet' ),
								'preview'    => array(
									'selector'   => '.kmt-sticky-footer #content, body, .kmt-separate-container , .entry-layout.blog-large-modern .entry-content',
									'responsive' => true,
								),
							),
							'site-boxed-inner-bg'        => array(
								'type'       => 'kmt-background',
								'transport'  => 'postMessage',
								'responsive' => true,
								'label'      => __( 'Boxed Background', 'kemet' ),
								'preview'    => array(
									'selector'   => '.kmt-separate-container .kmt-article-post,.kmt-separate-container .kmt-article-single ,.kmt-separate-container .comment-respond ,.kmt-separate-container .kmt-author-box-info , .kmt-separate-container .kmt-woocommerce-container ,.kmt-separate-container .kmt-comment-list li ,.kmt-separate-container .comments-count-wrapper ,.kmt-separate-container.kmt-two-container #secondary div.widget',
									'responsive' => true,
								),
							),
							'content-separator-color'    => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Content Separator Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => 'body:not(.kmt-separate-container) .kmt-article-post:not(.product) > div,.kmt-separate-container .kmt-article-post ,body #primary,body #secondary, .single-post:not(.kmt-separate-container) .post-navigation ,.single-post:not(.kmt-separate-container) .comments-area ,.single-post:not(.kmt-separate-container) .kmt-author-box-info , .single-post:not(.kmt-separate-container) .comments-area .kmt-comment , .kmt-left-sidebar #secondary , .kmt-left-sidebar #primary',
										'property' => 'border-color',
									),
								),
							),
						),
					),
				),
			),
		);

		$register_options = array(
			'site-content-options' => array(
				'section' => 'section-container-layout',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => apply_filters( 'kemet_container_options', $register_options ),
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
