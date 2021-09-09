<?php
/**
 * Single Post Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Blog_Single_Customizer extends Kemet_Customizer_Register {

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		$single_blog_options = array(
			'single-blog-controls-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'blog-single-width'          => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Single Post Content Width', 'kemet' ),
								'choices' => array(
									'default' => __( 'Default', 'kemet' ),
									'custom'  => __( 'Custom', 'kemet' ),
								),
							),
							'blog-single-max-width'      => array(
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
									'selector' => '.single-post .site-content > .kmt-container',
									'property' => 'max-width',
								),
								'context'      => array(
									array(
										'setting' => 'blog-single-width',
										'value'   => 'custom',
									),
								),
							),
							'blog-single-post-structure' => array(
								'type'    => 'kmt-sortable',
								'label'   => __( 'Single Post Structure', 'kemet' ),
								'choices' => array(
									'single-image'      => __( 'Featured Image', 'kemet' ),
									'single-title-meta' => __( 'Title & Blog Meta', 'kemet' ),
								),
							),
							'blog-single-meta'           => array(
								'type'    => 'kmt-sortable',
								'label'   => __( 'Single Post Meta', 'kemet' ),
								'choices' => array(
									'author'   => __( 'Author', 'kemet' ),
									'category' => __( 'Category', 'kemet' ),
									'date'     => __( 'Publish Date', 'kemet' ),
									'comments' => __( 'Comments', 'kemet' ),
									'tag'      => __( 'Tags', 'kemet' ),
								),
								'context' => array(
									array(
										'setting'  => 'blog-single-post-structure',
										'operator' => 'contain',
										'value'    => 'single-title-meta',
									),
								),
							),
							'enable-page-title-content-area' => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Post Title in Content Area', 'kemet' ),
							),
							'prev-next-links'            => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Disable Next / Prev Links', 'kemet' ),
							),
							'enable-author-box'          => array(
								'type'  => 'kmt-switcher',
								'label' => __( 'Enable Author Box', 'kemet' ),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'font-size-entry-title'      => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Title Font Size', 'kemet' ),
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
									'selector'   => '.kmt-single-post .entry-header .entry-title',
									'property'   => '--fontSize',
									'responsive' => true,
								),
							),
							'letter-spacing-entry-title' => array(
								'type'         => 'kmt-slider',
								'responsive'   => true,
								'transport'    => 'postMessage',
								'label'        => __( 'Title Letter Spacing', 'kemet' ),
								'unit_choices' => array(
									'px' => array(
										'min'  => 0.1,
										'step' => 0.1,
										'max'  => 10,
									),
								),
								'preview'      => array(
									'selector'   => '.kmt-single-post .entry-header .entry-title',
									'property'   => '--letterSpacing',
									'responsive' => true,
								),
							),
							'font-color-entry-title'     => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Post Title Font Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kmt-single-post .entry-header .entry-title',
										'property' => '--headingLinksColor',
									),
								),
							),
							'single-post-meta-color'     => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Post Meta Color', 'kemet' ),
								'pickers'   => array(
									array(
										'title' => __( 'Color', 'kemet' ),
										'id'    => 'initial',
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.kmt-single-post .entry-meta,.kmt-single-post .entry-meta *',
										'property' => '--headingLinksColor',
									),
								),
							),
							'comment-button-spacing'     => array(
								'type'           => 'kmt-spacing',
								'transport'      => 'postMessage',
								'responsive'     => true,
								'label'          => __( 'Comment Button Margin', 'kemet' ),
								'linked_choices' => true,
								'unit_choices'   => array( 'px', 'em', '%' ),
								'choices'        => array(
									'top'    => __( 'Top', 'kemet' ),
									'right'  => __( 'Right', 'kemet' ),
									'bottom' => __( 'Bottom', 'kemet' ),
									'left'   => __( 'Left', 'kemet' ),
								),
								'preview'        => array(
									'selector'   => '.comments-area .form-submit input[type="submit"]',
									'property'   => '--margin',
									'sides'      => false,
									'responsive' => true,
								),
							),
						),
					),
				),
			),
		);

		$single_blog_options = array(
			'blog-single-options' => array(
				'section' => 'section-blog-single',
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $single_blog_options,
				),
			),
		);

		return array_merge( $options, $single_blog_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$single_blog_sections = array(
			'section-blog-single' => array(
				'priority' => 10,
				'title'    => __( 'Single Post', 'kemet' ),
				'panel'    => 'panel-layout',
				'section'  => 'section-blog-group',
			),
		);

		return array_merge( $sections, $single_blog_sections );

	}
}


new Kemet_Blog_Single_Customizer();


